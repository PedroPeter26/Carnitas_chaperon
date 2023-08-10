<?PHP
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <?php include "../headadmin.php"; ?>
    <title>Productos</title>
    <style>
        .cardcarnes,
        .cardtacos {
            border: none;
            height: 65px;
        }

        @media screen and (max-width: 576px)

        /*Pantalla pequeña*/
            {
            .cardtacos {
                border: none;
                height: 75px;
                font-size: 17px;
            }
        }
    </style>
</head>

<body>
    <!--BARRA DE NAV-->
    <?php include "../sidebaradmin.php"; ?>

    <div class="content-wrapper p-4" style="background-color: white;">
        <!--TABS: PRODUCTOS-->
        <nav class="navbar sticky-top" id="navbarToggle" style="width: 100%; background-color: white;">
            <ul class="nav nav-underline nav-fill ms-3 me-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#Carnitas" data-bs-toggle="tab">Carnitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Tacos" data-bs-toggle="tab">Tacos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Lonches" data-bs-toggle="tab">Lonches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Gringas" data-bs-toggle="tab">Gringas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Chicharrones" data-bs-toggle="tab">Chicharrones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Paquetes" data-bs-toggle="tab">Paquetes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Complementos" data-bs-toggle="tab">Complementos</a>
                </li>
            </ul>
        </nav>

        <!--CONTENIDO-->
        <div class="container tab-content contenido">
            <!--CARNITAS-->
            <div class="tab-pane fade show active" id="Carnitas" style="text-align: justify;">
                <div class="container principal">
                    <!--CARNITAS-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Carnitas">Carnitas</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO1'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--TACOS-->
            <div class="tab-pane fade" id="Tacos" style="text-align: justify;">
                <div class="container principal">
                    <!--TACOS-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Tacos</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO2'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardtacos" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--LONCHES-->
            <div class="tab-pane fade" id="Lonches" style="text-align: justify;">
                <div class="container principal">
                    <!--LONCHES-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Lonches</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO3'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--GRINGAS-->
            <div class="tab-pane fade" id="Gringas" style="text-align: justify;">
                <div class="container principal">
                    <!--GRINGAS-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Gringas</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO4'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--CHICHARRONES-->
            <div class="tab-pane fade" id="Chicharrones" style="text-align: justify;">
                <div class="container principal">
                    <!--CHICHARRONES-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Chicharrones</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO5'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--PAQUETES-->
            <div class="tab-pane fade" id="Paquetes" style="text-align: justify;">
                <div class="container principal">
                    <!--PAQUETES-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Paquetes</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO6'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--BEBIDAS-->
            <div class="tab-pane fade" id="Bebidas" style="text-align: justify;">
                <div class="container principal">
                    <!--BEBIDAS-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Bebidas</h2>
                        <!--CARD-->
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO7'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--COMPLEMENTOS-->
            <div class="tab-pane fade" id="Complementos" style="text-align: justify;">
                <div class="container principal">
                    <!--COMPLEMENTOS-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Complementos</h2>
                        <!--CARD-->
                        <?php
                        $consulta = "SELECT * FROM productos where tipo='TIPO8'";
                        $resultados = $db->seleccionar2($consulta);
                        $resultados->execute();
                        $listaproductos = $resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                        foreach ($listaproductos as $producto) {
                        ?>
                            <div class="col-6 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../footeradmin.php"; ?>

</body>

</html>