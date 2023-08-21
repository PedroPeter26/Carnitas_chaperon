<?php
require 'database.php';
require 'configcom.php';

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset( $_POST['_id']) ? $_POST['_id'] : 0;

    if($action == 'agregar'){
        $cantidad = isset( $_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $mesa_id = isset( $_POST['mesa_id']) ? $_POST['mesa_id'] : 0;
        $respuesta = agregar($id, $cantidad, $mesa_id);
        if ($respuesta > 0) {
            $datos['ok'] = true;
        } else {
            $datos['ok'] = false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta, 2, '.', ',');
    } else if($action == 'eliminar') {
        $mesa_id = isset( $_POST['mesa_id']) ? $_POST['mesa_id'] : 0;
        $datos['ok'] = eliminar($id, $mesa_id);
    } else {
        $datos['ok'] = false;
    }
} else {
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($_id, $cantidad, $mesa_id){
    $res = 0;
    if($_id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito'][$mesa_id]['productos'][$_id])){
            $_SESSION['carrito'][$mesa_id]['productos'][$_id] = $cantidad;

            $db = new Database();
            $db->conectarDB();
            $pdo = $db->getConexion();

            $sentencia=$pdo->prepare("SELECT precio_com FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Comedor') AND status = 'Activo' LIMIT 1");
             $sentencia->execute([$_id]);
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            $precio_com = $row['precio_com'];
            $res = $cantidad * $precio_com;

            return $res;
        } else {
            return $res;
        }
    }
}

function eliminar($_id, $mesa_id){
    if($_id > 0 && $mesa_id > 0){
        if(isset($_SESSION['carrito'][$mesa_id]['productos'][$_id])){
            unset($_SESSION['carrito'][$mesa_id]['productos'][$_id]);
            return true;
        }
    }
    else {
        return false;
    }
}