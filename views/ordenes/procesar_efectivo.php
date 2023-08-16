<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'database.php';
    $db = new Database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    $mesa_id = isset($_POST['mesa_id']) ? $_POST['mesa_id'] : null;
    $monto_efectivo = isset($_POST['monto_efectivo']) ? $_POST['monto_efectivo'] : null;

    if ($mesa_id === null || $monto_efectivo === null) {
        echo "Error: Datos insuficientes para procesar el pago en efectivo.";
        exit;
    }

    $total = floatval($_POST['total']);
    if ($monto_efectivo < $total) {
        echo "Error: El monto en efectivo es menor al total a pagar.";
        exit;
    }

    $cambio = $monto_efectivo - $total;

    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d');
    $hora_inicio = date('H:i:s');
    $hora_fin = date('H:i:s');

    // Insertar la orden en la base de datos
    $sql = "INSERT INTO ORDENES (mesa, forma_pago, fecha, hora_inicio, hora_fin, tipo_orden, `status`) VALUES (:mesa_id, 'Efectivo', :fecha, :hora_inicio, :hora_fin, 2, 'Proceso')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':hora_inicio', $hora_inicio, PDO::PARAM_STR);
    $stmt->bindParam(':hora_fin', $hora_fin, PDO::PARAM_STR);
    $stmt->execute();

    $orden_id = $pdo->lastInsertId();

    $productos = isset($_POST['productos']) ? $_POST['productos'] : array();
    foreach ($productos as $producto_id => $cantidad) {

        $sqlDetalle = "SELECT producto_id, nombre, precio_com FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Comedor') AND status = 'Activo'";
        $stmtDetalle = $pdo->prepare($sqlDetalle);
        $stmtDetalle->execute([$producto_id]);
        $row_prod = $stmtDetalle->fetch(PDO::FETCH_ASSOC);
        
        $precio_com = $row_prod['precio_com'];

        $sqlInsertDetalle = "INSERT INTO DETALLE_ORDEN (orden, producto, cantidad) VALUES (?,?,?)";
        $stmtInsertDetalle = $pdo->prepare($sqlInsertDetalle);
        $stmtInsertDetalle->execute([$orden_id, $producto_id, $cantidad]);
    }
    $sql_update = $pdo->prepare("UPDATE ORDENES SET `status` = 'Finalizado' WHERE orden_id = ?");
    $sql_update->execute([$orden_id]);

    echo json_encode(['ok' => true, 'cambio' => $cambio, 'message' => 'Pago exitoso!', 'orden_id' => $orden_id]);

    $db->desconectarDB();
} else {
    echo "Acceso no permitido.";
}
?>