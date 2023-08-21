<?php
require 'database.php';
require 'configp.php';

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $id = isset( $_POST['_id']) ? $_POST['_id'] : 0;

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

function agregar($_id, $cantidad){
    $res = 0;
    if($_id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$_id])){
            $_SESSION['carrito']['productos'][$_id] = $cantidad;

            $db = new Database();
            $db->conectarDB();
            $pdo = $db->getConexion();

            $sentencia=$pdo->prepare("SELECT precio_app FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo' LIMIT 1");
            $sentencia->execute([$_id]);
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            $precio_app = $row['precio_app'];
            $res = $cantidad * $precio_app;

            return $res;
        } else {
            return $res;
        }
    }
}

function eliminar($_id){
    if($_id > 0){
        if(isset($_SESSION['carrito']['productos'][$_id])){
            unset($_SESSION['carrito']['productos'][$_id]);
            return true;
        }
    }
    else {
        return false;
    }
}