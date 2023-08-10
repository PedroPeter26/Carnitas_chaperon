<?php
// Configuración de la base de datos
include '../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();
// Configuración de la base de datos
try {
    $sql = "SELECT notification_dataadmin.description as dd FROM notification_dataadmin join notification_data on notification_dataadmin.noti = notification_data.id where notification_data.status = 'Proceso' ORDER BY noti desc limit 1";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $notifications = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = "SELECT noti, user_id, nombre as 'n', orden_id as 'o' from usuarios join ordenes on usuarios.user_id = ordenes.cliente 
    join notification_data on notification_data.orden = ordenes.orden_id join notification_dataadmin on notification_dataadmin.noti = notification_data.id
    where notification_data.status = 'Proceso' order by noti desc limit 10";
    $sql1 = $pdo->prepare($sql1);
    $sql1->execute();
    $users = $sql1->fetchAll(PDO::FETCH_ASSOC);

    if ($notifications) {
        foreach ($notifications as $notification) {
            foreach($users as $user){
                echo '<a class="dropdown-item">' . $notification['dd'] . ' Usuario: ' . $user['n'] . '. Orden: ' . $user['o'] . '</a>';
                echo '<hr class="dropdown-divider"></hr>';
            }
        }
    } else {
        echo '<a class="dropdown-item">No notifications found.</a>';
    }
} catch (PDOException $e) {
    echo '<a class="dropdown-item text-danger">Error: ' . $e->getMessage() . '</a>';
}

$db -> desconectarDB();
?>