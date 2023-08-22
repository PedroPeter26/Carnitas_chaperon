<?php
require '../class/config.php';
include '../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['orden_id'])) {
    $orden_id = $_POST['orden_id'];
    
    if (isset($_POST['marcar_proceso'])) {
        // Cambiar el estado de la orden a "Proceso" en la base de datos
        // Ejecutar una consulta SQL para realizar la actualización
        $update_sql = $pdo->prepare("UPDATE ORDENES SET status = 'Proceso' WHERE orden_id = :orden_id");
        $update_sql->bindParam(':orden_id', $orden_id);
        $update_sql->execute();
        // Redirigir de vuelta a la página de órdenes después de la actualización
        header('Location: ordenes_online.php');
        exit();
    } elseif (isset($_POST['finalizar_orden'])) {
        // Cambiar el estado de la orden a "Finalizado" en la base de datos
        // Ejecutar una consulta SQL para realizar la actualización
        $update_sql = $pdo->prepare("UPDATE ORDENES SET status = 'Finalizado' WHERE orden_id = :orden_id");
        $update_sql->bindParam(':orden_id', $orden_id);
        $update_sql->execute();
        // Redirigir de vuelta a la página de órdenes después de la actualización
        header('Location: ordenes_online.php');
        exit();
    }
}
?>