<?php
include 'database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
require 'config.php';

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);
echo '</pre>';

if (is_array($datos)) {
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];

        $sql = $pdo->prepare("SELECT user_id FROM USUARIOS WHERE user = ?");
        $sql->execute([$usuario]);

        if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $row['user_id'];

            $fecha = $datos['detalles']['update_time'];
            $fecha_nueva = date('Y-m-d', strtotime($fecha));
            $hora_actual = date("H:i:s", strtotime($fecha));

            $sql = $pdo->prepare("INSERT INTO ORDENES (cliente, mesa, forma_pago, fecha, hora_inicio, hora_fin, tipo_orden, status) VALUES (?,?,?,?,?,?,?,?)");
            $sql->execute([$user_id, null, 'Tarjeta', $fecha_nueva, $hora_actual, $hora_actual, 1, 'Pendiente']);
            $id = $pdo->lastInsertId();
        } else {
            echo "El usuario en la sesión no corresponde a un user_id válido en la tabla USUARIOS.";
        }
    } else {
        echo "La variable de sesión \$_SESSION['usuario'] no está definida.";
    }

    if($id > 0) {
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null){
            foreach($productos as $clave => $cantidad){
        
            $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo'");
            $sentencia->execute([$clave]);
            $row_prod=$sentencia->fetch(PDO::FETCH_ASSOC);

            $precio_app = $row_prod['precio_app'];

            $sql_insert = $pdo->prepare("INSERT INTO DETALLE_ORDEN (orden, producto, cantidad) VALUES (?,?,?)");
            $sql_insert->execute([$id, $clave, $cantidad]);
            }
        }

        unset($_SESSION['carrito']);
        //echo "<div class='alert alert-success'>Compra exitosa!</div>";
        //header("refresh: 2; ordenar.php");
    }
}
