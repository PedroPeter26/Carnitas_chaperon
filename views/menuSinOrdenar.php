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
        .barranav
        {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size:contain;
            width: 100%;
            font-family: 'Lilita One', sans-serif;
            color: white;
        }
        .navbar-brand
        {
            font-family: 'Lilita One', sans-serif;
            font-size: 30px;
            color: white;
        }
        .navbar-brand:hover
        {
            color: white;
        }
        a.color
        {
            color: white;
        }
        a.color:hover
        {
            color: white;
            font-size: 20px;
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .navbar-brand
            {
                font-size: 100%;
            }
        }
        /*BOTÓN DE INICIAR SESIÓN DE LA BARRA DE NAV 1*/
        button.iniciarsesionnav
        {
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
        .modalubi
        {
            display: flex;
            max-width: 70% !important;
            text-align: center;
            align-self: auto;
        }
        .contenedormodal /*UBI*/
        {
            width: inherit; /* Hereda el ancho del contenedor padre (modal) */
            height: inherit; /* Hereda el alto del contenedor padre (modal) */
        }
        .map-container
        {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Proporción 16:9 (dividir la altura por el ancho y multiplicar por 100) */
        }
        .map-container iframe
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        @media (max-width: 768px)
        {
            .modalubi
            {
            width: 80%; /* Ajusta el ancho del modal al 80% de la ventana */
            height: 80%; /* Ajusta la altura del modal al 80% de la ventana */
            }
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .modalubi
            {
                width: 90%; /* Ajusta el ancho del modal al 90% de la ventana */
                height: 90%; /* Ajusta la altura del modal al 90% de la ventana */
                margin: 0 auto;
            }
        }
        /*COLOR DE LOS TABS NO ACTIVOS*/
        .nav-link:not(.active)
        {
            color: brown;
        }
        .contenido
        {
            margin-top: 30px;
        }
        h2
        {
            font-family: 'Lilita One', cursive;
        }
        h5, p
        {
            font-family: 'Belanosima', sans-serif;
        }
        .nav-link:active
        {
            color: black;
        }
        .cards
        {
            background-color: #FCF4E9;
            height: 150px;
        }
        .imgmodal
        {
            height: 300px;
            width: 400px;
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .imgmodal
            {
                height: 200px;
                width: 200px;
            }
        }
    </style>
    <title>Menú</title>
</head>
<body style="background-color: #EFE2CF;">

<nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
            <?php
                if (isset($_SESSION["usuario"]))
                {
                echo "<li>
                        <a class='dropdown-item rounded-2' href='views/checkout_online.php'>Carrito <span id='num_cart' class='badge bg-danger'>$num_cart</span></a>
                        </li>";
                echo '<li><hr class="dropdown-divider"></li>';
                echo "<li><a class='dropdown-item rounded-2' href='views/ordenar.php'>Ordenar</a></li>";
                }
                ?>
                <li>
                <a class="dropdown-item rounded-2" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                </li>
                <?php
                    if (isset($_SESSION["usuario"]))
                    {
                    echo '<li>
                    <a class="dropdown-item rounded-2" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="views/perfil_usuario.php">
                                Perfil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="views/historial_de_compras.php">
                                Historial
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="class/cerrarsesion.php">Cerrar sesión</a>
                        </li>
                    </ul>
                    </li>';
                    }
                    else
                    {
                    echo '<li>
                    <a class="dropdown-item rounded-2" href="views/menuSinOrdenar.php">Menú</a>
                    </li>';
                    echo '<li><hr class="dropdown-divider"></li>';
                    echo '<li>
                    <a class="dropdown-item rounded-2" href="views/login.php">Iniciar sesión</a>
                    </li>';
                    }
                ?>
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
                <!--CARNITAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Carnitas</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO1' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--TACOS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Tacos</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO2' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--LONCHES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Lonches</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where disponibilidad<>'Comedor' and tipo='TIPO3' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--GRINGAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Gringas</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO4' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--CHICHARRONES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Chicharrones</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO5' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--CHICHARRONES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Paquetes</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO6' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--BEBIDAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Bebidas</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO7' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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
                <!--EXTRAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Extras</h2>
                    <!--CARD-->
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM PRODUCTOS where tipo='TIPO8' and status='Activo'");
                        $sentencia->execute();
                        $listaproductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
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
                                            if ($producto['disponibilidad'] == 'Comedor')
                                            {
                                                echo "<b>No aplica para llevar.</b>";
                                            } 
                                            else
                                            {
                                                echo "<b>$" . $producto['precio_app'] . "</b>";
                                            }
                                            ?>
                                        </p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">Más información</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--MODAL: PRODUCTOS-->
                        <div class="modal fade modalproductos" id="<?php echo $producto['producto_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #EFE2CF;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                            </div>
                                            <div class="modal-body" style="background-color: white;">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                        <img src="<?php echo $producto['img'];?>" class="img-fluid rounded-start rounded-end imgmodal" alt="<?php echo $producto['nombre'];?>">
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                        <h4><?php echo $producto['nombre'];?></h4>
                                                        <h5><b>
                                                            <?php 
                                                                if ($producto['disponibilidad'] == 'Comedor')
                                                                {
                                                                    echo "<b>No aplica para llevar.</b>";
                                                                } 
                                                                else
                                                                {
                                                                    echo "<b>$" . $producto['precio_app'] . "</b>";
                                                                }
                                                            ?>  
                                                        </b></h5><br>
                                                        Descripción:
                                                        <p style="text-align: justify"><?php echo $producto['descripcion'];?></p>
                                                        <small>
                                                            <?php 
                                                                if ($producto['disponibilidad'] <> 'Rapido')
                                                                {
                                                                    echo "Precio en comedor: <b>$" . $producto['precio_com'] . "</b>";
                                                                }
                                                                else
                                                                {
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

</body>
</html>