<<<<<<< Updated upstream
<<<<<<< Updated upstream
<?php
$id = $_GET['id'];
include 'database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

if (!$id)
{
    echo "No se ha seleccionado el usuario";
    exit;
}

$sentencia = $pdo->prepare("UPDATE USUARIOS SET status = 'inactivo' WHERE user_id = '$id'");
$sentencia->execute();
$resultado = $sentencia;

if(!$resultado)
{
    echo "Error al eliminar";
    return;
}

header("Location: ../views/administradores.php");
=======
=======
>>>>>>> Stashed changes
<?php
session_start();
$id = $_GET['id'];
include 'database.php';
$db = new Database();
$db->conectarDB();
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

session_destroy();
header("Location: ../index.php");
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
?>