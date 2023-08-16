<?php
require '../class/config.php';
require '../class/database.php';

$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$idCliente = $_SESSION["idUsuario"];
$sql = $pdo->prepare("SELECT num_usuario, orden, fecha, hora FROM BITACORA_HISTORIAL WHERE num_usuario = '$idCliente' GROUP BY orden ORDER BY orden DESC");
$sql->execute();
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

        body {
            background-color: #ffefcf;
        }

        html,
        body {
            max-width: 100% !important;
        }

        .barranav {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size: contain;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1200;
            font-family: 'Lilita One', sans-serif;
            color: white;
        }

        .navbar-brand {
            font-family: 'Lilita One', sans-serif;
            font-size: 30px;
            color: white;

        }

        .navbar-brand:hover {
            color: white;
        }

        a.color {
            color: white;
        }

        a.color:hover {
            color: white;
        }

        @media screen and (max-width: 576px)

        /*Pantalla pequeña*/
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
    </style>
    <title>HISTORIAL DE COMPRAS</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px" style="margin-right: 2%">
                    <li>
                        <a class="dropdown-item rounded-2" href="../index.php">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION["usuario"])) {
                        echo '<li class="dropdown">
                        <a class="dropdown-item rounded-2 dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuario</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li>
                                <a class="dropdown-item" href="perfil_usuario.php">
                                    Perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="../class/cerrarsesion.php">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container contenedor" style="margin-top: 8%;">
        <h2 class="HC">HISTORIAL DE COMPRAS</h2>
        <hr>

        <?php
        $historial = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($historial as $row) {
        ?>
            <div class="card mb-3" style="margin-bottom: 1em;">
                <div class="card-header">
                    Folio de Orden: <?php echo $row['orden']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fecha: <?php echo $row['fecha'], "<br>Hora: ", $row['hora']; ?> </h5><br>
                    <a href="#" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#<?php echo $row['orden']; ?>">Ver detalles de compra</a>
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
                                <strong>Fecha: </strong><?php echo $row['fecha']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Hora: </strong><?php echo $row['hora']; ?>
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
                                        foreach ($assoc as $detalle) {
                                            $total = 0;
                                            $precio = $detalle['precio_app'];
                                            $cantidad = $detalle['cantidad'];
                                            $subtotal_ = $precio * $cantidad;
                                            $total += $detalle['TOTAL'];
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