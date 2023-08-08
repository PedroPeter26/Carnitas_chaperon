<?php
require 'databaseInt.php';
require 'config.php';

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset( $_POST['id']) ? $_POST['id'] : 0;

    if($action == 'agregar'){
        $cantidad = isset( $_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id, $cantidad);
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else if($action == 'eliminar') {
        $datos['ok'] = eliminar($id);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id, $cantidad){
    $res = 0;
    if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $db = new Database();
            $db->conectarBD();
            $pdo = $db->getConexion();

            $sentencia=$pdo->prepare("SELECT precio_app FROM productos WHERE producto_id = ? AND productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido' AND status = 'Activo' LIMIT 1");
             $sentencia->execute([$id]);
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            $precio_app = $row['precio_app'];
            $res = $cantidad * $precio_app;

            return $res;
        } else {
            return $res;
        }
    }
}

function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }
    else {
        return false;
    }
}