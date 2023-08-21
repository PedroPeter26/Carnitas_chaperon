<?php
include 'database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
require 'configcom.php';

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

$mesa_id = isset($datos['mesa_id']) ? $datos['mesa_id'] : null;

echo '<pre>';
print_r($datos);
echo '</pre>';

if (is_array($datos)) {
    try {
        date_default_timezone_set('America/Mexico_City');
        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d', strtotime($fecha));
        $hora_actual = date("H:i:s", strtotime($fecha));

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare("INSERT INTO ORDENES (mesa, forma_pago, fecha, hora_inicio, hora_fin, tipo_orden, `status`) VALUES (?,?,?,?,?,?,?)");
        $sql->execute([$mesa_id, 'Tarjeta', $fecha_nueva, $hora_actual, $hora_actual, 2, 'Proceso']);
        $id = $pdo->lastInsertId();

        if ($id > 0) {
            $productos = isset($_SESSION['carrito'][$mesa_id]['productos']) ? $_SESSION['carrito'][$mesa_id]['productos'] : null;

            if ($productos != null) {
                foreach ($productos as $clave => $cantidad) {
                    $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_com, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Comedor') AND status = 'Activo'");
                    $sentencia->execute([$clave]);
                    $row_prod = $sentencia->fetch(PDO::FETCH_ASSOC);
                    
                    $precio_com = $row_prod['precio_com'];

                    $sql_insert = $pdo->prepare("INSERT INTO DETALLE_ORDEN (orden, producto, cantidad) VALUES (?,?,?)");
                    $sql_insert->execute([$id, $clave, $cantidad]);
                }
            }
            $sql_update = $pdo->prepare("UPDATE ORDENES SET `status` = 'Finalizado' WHERE orden_id = ?");
            $sql_update->execute([$id]);

            unset($_SESSION['carrito']);
            //echo "<div class='alert alert-success'>Compra exitosa!</div>";
            //header("refresh: 2; ordenar.php");
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
