<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$id = $_GET['id'];

$query = $pdo->prepare("UPDATE PRODUCTOS SET `status` = 'Inactivo' WHERE producto_id = ?");
if($query->execute([$id])) {
    echo "<h3>¡Producto eliminado exitosamente!</h3>";
    echo "<a class='btn btn-primary' href='../views/prodcrud.php'>Regresar</a>";
} else {
    echo "<h3>Error al eliminar producto...</h3>";
    echo "<a class='btn btn-primary' href='../views/prodcrud.php'>Regresar</a>";
}