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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include '../headadmin.php'; ?>
    <title>Reportes diarios</title>
</head>

<body>
    <!--BARRA DE NAV-->
    <?php include '../sidebaradmin.php'; ?>

    <!--CONTENIDO-->
    <div class="content-wrapper" style="background-color: white;">
        <div class="container p-4">
            <h1>Órdenes Online</h1>
            <?php
            try {
                $sql = "SELECT noti, user_id, usuarios.nombre as 'n', orden_id as 'o', notification_dataadmin.description as dd, productos.nombre as p, detalle_orden.cantidad as c, productos.precio_app as precio, (productos.precio_app * detalle_orden.cantidad) as subtotal, SUM('subtotal') as total from usuarios 
                join ordenes on usuarios.user_id = ordenes.cliente join notification_data on notification_data.orden = ordenes.orden_id join notification_dataadmin on notification_dataadmin.noti = notification_data.id join detalle_orden on detalle_orden.orden = ordenes.orden_id join productos on productos.producto_id = detalle_orden.producto 
                where ordenes.status = 'Proceso' order by o desc";
                $sql = $pdo->prepare($sql);
                $sql->execute();
                $detalles = $sql->fetchAll(PDO::FETCH_ASSOC);

                $sql1 = "SELECT noti, user_id, usuarios.nombre as 'n', orden_id as 'o', notification_dataadmin.description as dd, productos.nombre as p, detalle_orden.cantidad as c, productos.precio_app as precio, (productos.precio_app * detalle_orden.cantidad) as subtotal, SUM('subtotal') as total from usuarios 
                join ordenes on usuarios.user_id = ordenes.cliente join notification_data on notification_data.orden = ordenes.orden_id join notification_dataadmin on notification_dataadmin.noti = notification_data.id join detalle_orden on detalle_orden.orden = ordenes.orden_id join productos on productos.producto_id = detalle_orden.producto 
                where ordenes.status = 'Proceso' order by o desc";
                $sql1 = $pdo->prepare($sql1);
                $sql1->execute();
                $users = $sql1->fetchAll(PDO::FETCH_ASSOC);

                if ($users) {
                    foreach ($users as $user) {
                        echo "<div class='border p-4' style='background-color= #CBCBCB;'>";
                        echo "<h2>Orden " . $user['o'] . "</h2>";
                        echo "<h3>Cliente: " . $user['n'] . "</h3>";
                        foreach ($detalles as $order) {
                            echo '<hr class="dropdown-divider"></hr>';
                            echo '<a class="dropdown-item">' . $order['p'] . ' ---------------- ' . $order['c'] . ' ---------------- ' . $order['subtotal'] . '</a>';
                            echo '<hr class="dropdown-divider"></hr>';
                        }
                        echo "</div>";
                    }
                } else {
                    echo '<a class="dropdown-item">No hay órdenes pendientes.</a>';
                }
            } catch (PDOException $e) {
                echo '<a class="dropdown-item text-danger">Error: ' . $e->getMessage() . '</a>';
            }
            ?>
        </div>
    </div>

    <?php include '../footeradmin.php'; ?>
    <?php $db->desconectarDB(); ?>
</body>

</html>