<?php
$id = $_GET['id'];
include 'databaseInt.php';
$db = new Database();
$db->conectarBD();
$pdo = $db->getConexion();

if (!$id)
{
    echo "No se ha seleccionado el usuario";
    exit;
}

$sentencia = $pdo->prepare("UPDATE usuarios SET status = 'inactivo' WHERE user_id = '$id'");
$sentencia->execute();
$resultado = $sentencia;

if(!$resultado)
{
    echo "Error al eliminar";
    return;
}

header("Location: ../html/administradores.php");
?>