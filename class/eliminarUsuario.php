<?php
session_start();
$id = $_GET['id'];
include 'database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

if (!$id)
{
    echo "No se ha seleccionado el usuario";
    exit;
}

$sentencia = $pdo->prepare("UPDATE USUARIOS SET status = 'Inactivo' WHERE user_id = '$id'");
$sentencia->execute();
$resultado = $sentencia;

if(!$resultado)
{
    echo "Error al eliminar";
    return;
}

session_destroy();
header("Location: ../index.php");
?>