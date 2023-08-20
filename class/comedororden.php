<?php
require 'database.php';
$database = new database();
$database->ConectarDB();
require 'configcom.php';

if (isset($_POST['producto_id']) && isset($_POST['mesa_id'])) {

    $producto_id = $_POST['producto_id'];
    $mesa_id = $_POST['mesa_id'];

    if (!isset($_SESSION['carrito'][$mesa_id])) {
        $_SESSION['carrito'][$mesa_id] = array();
    }

    if (isset($_SESSION['carrito'][$mesa_id]['productos'][$producto_id])) {
        $_SESSION['carrito'][$mesa_id]['productos'][$producto_id] += 1;
    } else {
        $_SESSION['carrito'][$mesa_id]['productos'][$producto_id] = 1;
    }

    $datos['numero'] = count($_SESSION['carrito'][$mesa_id]['productos']);
    $datos['ok'] = true;

    // Actualizar el estado de la mesa en la base de datos
    if ($datos['numero'] > 0) {
        $estado = 'Ocupada';
    } else {
        $estado = 'Disponible';
    }

    $sqlActualizarEstado = "UPDATE MESAS SET estado = :estado WHERE mesa_id = :mesa_id";
    $stmtActualizarEstado = $database->getConexion()->prepare($sqlActualizarEstado);
    $stmtActualizarEstado->bindParam(':estado', $estado, PDO::PARAM_STR);
    $stmtActualizarEstado->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
    $stmtActualizarEstado->execute();

} else {
    $datos['ok'] = false;
}

echo json_encode($datos);
?>
