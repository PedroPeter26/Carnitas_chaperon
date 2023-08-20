<?php
require 'config.php';
include 'database.php';

if (isset($_POST['producto_id'])){

    $id = $_POST['producto_id'];
    if(isset($_SESSION['carrito']['productos'][$id])){
        $_SESSION['carrito']['productos'][$id] += 1;
    } else{
        $_SESSION['carrito']['productos'][$id] = 1;
    }

    $datos['numero'] = count($_SESSION['carrito']['productos']);
    $datos['ok'] = true;

} else{
    $datos['ok'] = false;
}

echo json_encode($datos);