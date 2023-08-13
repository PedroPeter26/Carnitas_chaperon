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
                $sql = "SELECT noti, user_id, USUARIOS.nombre as 'n', orden_id as 'o', notification_dataadmin.description as dd, PRODUCTOS.nombre as p, SUM(DETALLE_ORDEN.cantidad) as c, PRODUCTOS.precio_app as precio, SUM(PRODUCTOS.precio_app * DETALLE_ORDEN.cantidad) as subtotal
                FROM USUARIOS 
                JOIN ORDENES ON USUARIOS.user_id = ORDENES.cliente 
                JOIN notification_data ON notification_data.orden = ORDENES.orden_id 
                JOIN notification_dataadmin ON notification_dataadmin.noti = notification_data.id 
                JOIN DETALLE_ORDEN ON DETALLE_ORDEN.orden = ORDENES.orden_id 
                JOIN PRODUCTOS ON PRODUCTOS.producto_id = DETALLE_ORDEN.producto 
                WHERE ORDENES.status = 'Proceso' GROUP BY PRODUCTOS.nombre 
                ORDER BY o DESC";

                $sql = $pdo->prepare($sql);
                $sql->execute();
                $orders = $sql->fetchAll(PDO::FETCH_ASSOC);

                $currentOrder = null;
                $total = 0;

                if ($orders) {
                    foreach ($orders as $order) {
                        if ($currentOrder !== $order['o']) {
                            if ($currentOrder !== null) {
                                echo '<p>Total de la Orden: $' . number_format($total,2) . '</p>'; // Muestro el total de la orden
                                echo '<hr class="dropdown-divider"></hr>';
                                echo "</div>";
                                $total = 0; // Se reinicia el total para la que sigue
                            }

                            $currentOrder = $order['o'];

                            echo "<div class='border p-4' style='background-color: red;'";
                            echo "<h2>Orden " . $order['o'] . "</h2>";
                            echo "<h3>Cliente: " . $order['n'] . "</h3>";
                            echo '<hr class="dropdown-divider"></hr>';
                        }

                        echo '<a class="dropdown-item">' . $order['p'] . ' ---------------- ' . $order['c'] . ' ---------------- ' . $order['subtotal'] . '</a>';
                        $total += $order['subtotal'];
                    }

                    echo '<p>Total de la Orden: ' . $total . '</p>'; // Muestro el total de la última orden
                    echo '<hr class="dropdown-divider"></hr><br>';
                    echo "</div>";
                
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