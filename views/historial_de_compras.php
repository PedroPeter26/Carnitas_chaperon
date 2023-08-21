<?php
require '../class/config.php';
require '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

$user = $_SESSION["usuario"];

// Step 1: Retrieve user_id based on the user value
$userQuery = $pdo->prepare("SELECT user_id FROM USUARIOS WHERE user = :user");
$userQuery->bindParam(':user', $user, PDO::PARAM_STR);
$userQuery->execute();
$userRow = $userQuery->fetch(PDO::FETCH_ASSOC);

if ($userRow) {
    $user_id = $userRow['user_id'];

    // Step 2: Use the user_id in the main query
    $sql = $pdo->prepare("SELECT BITACORA_HISTORIAL.num_usuario, BITACORA_HISTORIAL.orden, BITACORA_HISTORIAL.fecha, ORDENES.status
    FROM BITACORA_HISTORIAL 
    JOIN ORDENES on ORDENES.orden_id = BITACORA_HISTORIAL.orden
    WHERE num_usuario = :user_id GROUP BY orden, fecha ORDER BY orden DESC");
    $sql->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $sql->execute();
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap');

        html,
        body {
            max-width: 100% !important;
        }

        a.color {
            color: white;
        }

        a.color:hover {
            color: white;
        }

        @media screen and (max-width: 576px)

            {
            .navbar-brand {
                font-size: 100%;
            }
        }

        .cont a {
            margin-bottom: 2em;
            margin-right: 2em;
        }

        .card {
            width: 100%;
            font-family: 'Lilita One', sans-serif;
            font-size: 100%;
        }

        .HC {
            font-family: 'Lilita One', sans-serif;
        }

        nav {
            background-color: #212429;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        a.barra1 {
            text-decoration: none;
            color: gold;
        }

        a.barra1:hover {
            color: goldenrod;
        }

        .contenedorprincipal {
            margin-top: 100px;
            margin-bottom: 40px;
            width: 80%;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        .navbar-container {
            position: sticky;
            z-index: 2;
            top: 0;
            width: 100%;
            /* Make sure it's above other elements */
        }
    </style>
    <title>Historial de compras</title>
</head>

<body>
    <!-- BARRA -->
    <div class="navbar-container" style="position:fixed; width:100%; top: 0;">
        <!--BARRA DE NAV 1-->
        <nav class="navbar navbar-expand-md navbar-light barranav sticky-top">
            <div class="container-fluid" style="width: 90%;">
                <a class="navbar-brand" style="color: white;" href="../index.php">
                    <img src="../img/logo.png" alt="Logo" width="35" height="50"> <span style="font-family: 'Bricolage Grotesque', sans-serif;">CARNITAS CHAPERON</span>
                </a>
                <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                        <li><a class="dropdown-item" href="../class/cerrarsesion.php"><b>Cerrar sesión</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container contenedorprincipal" style="margin-top: 8%;">
        <h2 class="HC">Historial de compras</h2>
        <hr>

        <?php
        $processedOrden = array();

        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $orden = $row['orden'];

        ?>
            <div class="card mb-3" style="margin-bottom: 1em;">
                <div class="card-header d-flex">
                    <h3>Folio de Orden: <?php echo $row['orden']; ?></h3>
                </div>
                <div class="card-body">
                    <h6>Estado de la orden: <b><?php echo $row['status']; ?> </b></h6><br>
                    <h5 class="card-title">Fecha: <?php echo $row['fecha']; ?> </h5> <br>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $row['orden']; ?>">Ver detalles de compra</a>
                </div>
            </div>
            <?php
            $orden = $row['orden'];
            $consulta = $pdo->prepare("SELECT PRODUCTOS.nombre, PRODUCTOS.precio_app, DETALLE_ORDEN.cantidad, (SELECT SUM(PRODUCTOS.precio_app * DETALLE_ORDEN.cantidad) FROM PRODUCTOS INNER JOIN DETALLE_ORDEN ON PRODUCTOS.producto_id = DETALLE_ORDEN.producto WHERE DETALLE_ORDEN.orden = '$orden') AS TOTAL FROM PRODUCTOS
            INNER JOIN DETALLE_ORDEN ON PRODUCTOS.producto_id = DETALLE_ORDEN.producto
            INNER JOIN ORDENES ON ORDENES.orden_id = DETALLE_ORDEN.orden
            WHERE DETALLE_ORDEN.orden = '$orden'");
            $consulta->execute();
            $assoc = $consulta->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="modal fade" id="<?php echo $row['orden']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #EFE2CF;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle-<?php echo $row['orden']; ?>">DETALLE DE LA ORDEN</h5>
                        </div>
                        <div class="modal-body" style="background-color: white;">
                            <p>
                                <strong>Fecha: </strong><?php echo $row['fecha']; ?>
                            </p>
                            <p><strong>Folio de orden: </strong> <?php echo $row['orden']; ?> </p>
                            <br>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($assoc as $detalle) {
                                            $precio = $detalle['precio_app'];
                                            $cantidad = $detalle['cantidad'];
                                            $subtotal_ = $precio * $cantidad;
                                            $total += $subtotal_;
                                        ?>
                                            <tr>
                                                <td> <?php echo $detalle['nombre']; ?> </td>
                                                <td> <?php echo $detalle['cantidad']; ?> </td>
                                                <td> $<?php echo $detalle['precio_app']; ?> </td>
                                                <td> <?php echo MONEDA . number_format($subtotal_, 2, '.', ','); ?> </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <p align="right" style="padding-right: 8%"><b>TOTAL: <?php echo MONEDA . number_format($total, 2, '.', ','); ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-ok" type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>