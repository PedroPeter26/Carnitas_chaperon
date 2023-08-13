<?php
include '../class/database.php';
$db = new Database();
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
    <style>
        #productosContainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .barranav {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size: contain;
            width: 100%;
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
            font-size: 20px;
        }

        @media screen and (max-width: 576px)

        /*Pantalla pequeña*/
            {
            .navbar-brand {
                font-size: 100%;
            }
        }

        /*BOTÓN DE INICIAR SESIÓN DE LA BARRA DE NAV 1*/
        button.iniciarsesionnav {
            float: right;
            border: 1px solid white;
            color: white;
            text-justify: center;
            align-items: center;
            border-radius: 10px;
            margin: 0 auto;
            align-content: center;
        }

        /*MODAL UBICACION*/
        .modalubi {
            display: flex;
            max-width: 70% !important;
            text-align: center;
            align-self: auto;
        }

        .contenedormodal

        /*UBI*/
            {
            width: inherit;
            /* Hereda el ancho del contenedor padre (modal) */
            height: inherit;
            /* Hereda el alto del contenedor padre (modal) */
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            /* Proporción 16:9 (dividir la altura por el ancho y multiplicar por 100) */
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .modalubi {
                width: 80%;
                /* Ajusta el ancho del modal al 80% de la ventana */
                height: 80%;
                /* Ajusta la altura del modal al 80% de la ventana */
            }
        }

        @media screen and (max-width: 576px)

        /*Pantalla pequeña*/
            {
            .modalubi {
                width: 90%;
                /* Ajusta el ancho del modal al 90% de la ventana */
                height: 90%;
                /* Ajusta la altura del modal al 90% de la ventana */
                margin: 0 auto;
            }
        }

        /*COLOR DE LOS TABS NO ACTIVOS*/
        .nav-link:not(.active) {
            color: brown;
        }

        .contenido {
            margin-top: 30px;
        }

        h2 {
            font-family: 'Lilita One', cursive;
        }

        h5,
        p {
            font-family: 'Belanosima', sans-serif;
        }

        .nav-link:active {
            color: black;
        }

        .cards {
            background-color: #FCF4E9;
            height: 150px;
        }

        .imgmodal {
            height: 300px;
            width: 400px;
        }

        @media screen and (max-width: 576px)

        /*Pantalla pequeña*/
            {
            .imgmodal {
                height: 200px;
                width: 200px;
            }
        }
    </style>
    <title>Menú</title>
</head>

<body style="background-color: #ffefcf;">

    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="menusinordenar5.php">Regresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="" data-bs-toggle="modal" data-bs-target="#ubi">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="login.php">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--MODAL DE LA UBICACIÓN-->
    <div class="modal fade" id="ubi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1300;">
        <div class="modal-dialog modal-lg modalubi d-flex flex-column bd-highlight mb-3 mt-130">
            <div class="modal-content">
                <div class="modal-header titulomodalnav">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubicación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body map-container">
                    <!--MAPA-->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14400.397610338885!2d-103.35858221134589!3d25.535065606318522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fc4bc9259d303%3A0x5ef7783b2f06f08!2sCarnitas%20Tacos%20Y%20Lunches%20El%20Chaperon!5e0!3m2!1ses!2smx!4v1687797463276!5m2!1ses!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="modal-footer titulomodalnav">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!--TABS: PRODUCTOS-->
    <nav style="top: 70px; width: 100%; background-color: #F9EFE1;">
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
                <a class="nav-link" href="#Extras" data-bs-toggle="tab">Extras</a>
            </li>
        </ul>
    </nav>

    <!--CONTENIDO-->
    <div class="container tab-content contenido">
        <!--.1 CARNITAS-->
        <div class="tab-pane fade show active" id="Carnitas" style="text-align: justify;">
            <div class="container principal">
                <h2 class="mb-4">Carnitas</h2>

                <!--ACCORDION PARA LOS FILTROS-->
                <div class="accordion accordion-flush" id=" accordionFlushExample">
                    <!--ITEM 1-->
                    <div class="accordion-item">
                        <!--ENCABEZADO DEL PRIMER ITEM-->
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <span style="font-size: 18px;"> Filtrar por precio </span>
                            </button>
                        </h2>
                        <!--CONTENIDO DEL PRIMER ITEM (FILTRO POR PRECIO)-->
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="padding: 20px;">
                                <!--EL DIV DEL FILTRO-->
                                <div class="row mt-2 mb-3 ps-3 pe-3">
                                    <h3>Filtro por precio</h3>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        Precio mínimo: <input type="number" id="minPrecioCarnitas" class="form-control">
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-4">
                                        Precio máximo: <input type="number" id="maxPrecioCarnitas" class="form-control">
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Carnitas')" style="height: 38px;">Aplicar</button>
                                    </div>

                                    <div class="col-6 col-md-6 offset-lg-2 col-lg-4 d-grid gap-2 mt-5">
                                        <label for="">Precio menor a mayor</label>
                                        <button class="btn btn-dark" onclick="ordenarProductosPorPrecio('Carnitas')" style="height: 38px;">Ordenar</button>
                                    </div>

                                    <div class="col-6 col-md-6 col-lg-4 d-grid gap-2 mt-5">
                                        <label for="">Precio mayor a menor</label>
                                        <button class="btn btn-dark" onclick="ordenarProductosPorPrecioDescendente('Carnitas')" style="height: 38px;">Ordenar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CARNITAS-->
                <div class="row mb-5 mt-4" id="productosContainer">
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO1' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6 cardcarnes2">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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

            </div>
        </div>

        <!--2. TACOS-->
        <div class="tab-pane fade" id="Tacos" style="text-align: justify;">
            <div class="container principal">
                <h2 class="mb-4">Tacos</h2>

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioTacos" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioTacos" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Tacos')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--TACOS-->
                <div class="row mb-5">
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO2' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--3. LONCHES-->
        <div class="tab-pane fade" id="Lonches" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioLonches" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioLonches" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Lonches')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--LONCHES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Lonches</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO3' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--4. GRINGAS-->
        <div class="tab-pane fade" id="Gringas" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioGringas" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioGringas" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Gringas')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--GRINGAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Gringas</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO4' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--5. CHICHARRONES-->
        <div class="tab-pane fade" id="Chicharrones" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioChicharrones" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioChicharrones" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Chicharrones')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--CHICHARRONES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Chicharrones</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO5' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--6. PAQUETES-->
        <div class="tab-pane fade" id="Paquetes" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioPaquetes" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioPaquetes" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Paquetes')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--CHICHARRONES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Paquetes</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO6' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--7. BEBIDAS-->
        <div class="tab-pane fade" id="Bebidas" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioBebidas" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioBebidas" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Bebidas')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--BEBIDAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Bebidas</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO7' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>

        <!--8. EXTRAS-->
        <div class="tab-pane fade" id="Extras" style="text-align: justify;">
            <div class="container principal">

                <!--FILTROS-->
                <div class="row mb-3 b-5" style="padding: 20px; background-color: #FF7A00;">
                    <h3>Filtros</h3>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio mínimo: <input type="number" id="minPrecioExtras" class="form-control">
                    </div>
                    <div class="col-6 col-md-6 col-lg-4">
                        Precio máximo: <input type="number" id="maxPrecioExtras" class="form-control">
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 d-grid gap-2">
                        <button class="btn btn-dark mt-4" onclick="aplicarFiltroPrecio('Extras')" style="height: 38px;">Aplicar</button>
                    </div>
                </div>

                <!--EXTRAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Extras</h2>
                    <!--CARD-->
                    <?php
                    $sentencia = $pdo->prepare("SELECT * FROM productos where tipo='TIPO8' and status='Activo'");
                    $sentencia->execute();
                    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                    foreach ($listaproductos as $producto) {
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                            <p class="card-text">
                                                <?php
                                                if ($producto['disponibilidad'] == 'Comedor') {
                                                    echo "<b>No aplica para llevar.</b>";
                                                } else {
                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                }
                                                ?>
                                            </p>
                                            <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id']; ?>">Más información</a>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre']; ?>">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4><?php echo $producto['nombre']; ?></h4>
                                                <h5><b>
                                                        <?php
                                                        if ($producto['disponibilidad'] == 'Comedor') {
                                                            echo "<b>No aplica para llevar.</b>";
                                                        } else {
                                                            echo "<b>$" . $producto['precio_app'] . "</b>";
                                                        }
                                                        ?>
                                                    </b></h5><br>
                                                Descripción:
                                                <p style="text-align: justify"><?php echo $producto['descripcion']; ?></p>
                                                <small>
                                                    <?php
                                                    if ($producto['disponibilidad'] <> 'Rapido') {
                                                        echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                    } else {
                                                        echo "<b>No aplica para comedor.</b>";
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
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
            </div>
        </div>
    </div>

    <!--FILTRO DE BUSCAR POR PRECIOS-->
    <script>
        // Función para aplicar el filtro de precio en una categoría
        function aplicarFiltroPrecio(categoria) {
            const minPrecio = parseFloat(document.getElementById(`minPrecio${categoria}`).value);
            const maxPrecio = parseFloat(document.getElementById(`maxPrecio${categoria}`).value);
            const productos = document.querySelectorAll(`#${categoria} .cardcarnes`);

            productos.forEach(producto => {
                const precioProducto = parseFloat(producto.querySelector('.card-text b').innerText.trim().substr(1));

                if ((isNaN(minPrecio) || precioProducto >= minPrecio) &&
                    (isNaN(maxPrecio) || precioProducto <= maxPrecio)) {
                    producto.style.display = 'block';
                } else {
                    producto.style.display = 'none';
                }
            });
        }
    </script>

    <!--ORDENAR PRECIO - A + -->
    <script>
        function ordenarProductosPorPrecio(categoria) {
            const productosContainer = document.querySelector(`#${categoria} #productosContainer`);
            const productos = Array.from(productosContainer.querySelectorAll('.cardcarnes2'));

            // Ordenar los productos por precio ascendente
            productos.sort((a, b) => {
                const precioA = parseFloat(a.querySelector('.card-text b').innerText.trim().substr(1));
                const precioB = parseFloat(b.querySelector('.card-text b').innerText.trim().substr(1));
                return precioA - precioB;
            });

            // Vaciar el contenedor y añadir los productos ordenados
            productosContainer.innerHTML = '';
            productos.forEach(producto => {
                productosContainer.appendChild(producto);
            });
        }
    </script>

    <!--ORDENAR PRECIO + A - -->
    <script>
        function ordenarProductosPorPrecioDescendente(categoria) {
            const productosContainer = document.querySelector(`#${categoria} #productosContainer`);
            const productos = Array.from(productosContainer.querySelectorAll('.cardcarnes2'));

            // Ordenar los productos por precio descendente
            productos.sort((a, b) => {
                const precioA = parseFloat(a.querySelector('.card-text b').innerText.trim().substr(1));
                const precioB = parseFloat(b.querySelector('.card-text b').innerText.trim().substr(1));
                return precioB - precioA;
            });

            // Vaciar el contenedor y añadir los productos ordenados
            productosContainer.innerHTML = '';
            productos.forEach(producto => {
                productosContainer.appendChild(producto);
            });
        }
    </script>

</body>
</html>