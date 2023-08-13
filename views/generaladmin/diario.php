<?php
require '../../class/config.php';
include '../../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas diarias</title>
    <?php include '../headadmin.php'; ?>
</head>
<body>
    <?php include '../sidebaradmin.php'; ?>

    

    <?php include '../footeradmin.php'; ?>
    <?php $db -> desconectarDB() ?>
</body>
</html>