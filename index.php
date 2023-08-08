<?php
require 'class/config.php';
include 'class/databaseInt.php';
$db = new Database();
$db->conectarBD();
$pdo = $db->getConexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <title>Carnitas Chaperon</title>
</head>
<body>
    <!--BARRA DE NAV 1
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand " href="index.php">
        <img src="img/logo.png" alt="Logo" width="35" height="50">CARNITAS&nbsp;EL&nbsp;CHAPERON
        </a>
        <button type="button" class="btn btn-outline-secondary iniciarsesionnav" data-bs-toggle="modal" data-bs-target="#iniciarsesion" style="margin-top: 5px;">Iniciar sesión</button>
        </div>
    </nav>-->
    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-6" style="color: white;">
                <!--
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <?php
                if (isset($_SESSION["usuario"]))
                {
                echo "<li class='nav-item'>
                        <a class='btn btn-warning' href='html/checkout_online.php'>Carrito <span id='num_cart' class='badge bg-secondary'>$num_cart</span></a>
                        </li>";
                echo "<li class='nav-item'>
                        <a class='nav-link' style='color: white;' href='html/ordenar.php'>Ordenar</a>
                        </li>";
                }
                ?>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="html/menuSinOrdenar.php">Menú</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                </li>
                <?php
                    if (isset($_SESSION["usuario"]))
                    {
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="html/perfil_usuario.php">
                                Perfil
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
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" style="color: white;" href="html/login.php">Iniciar sesión</a>';
                    echo '</li>';
                    }
                ?>
            </ul>
            </div>
        </div>
    </nav>

    <!--BARRA DE NAV 2
    <nav class="barranav2">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-center">
                <a class="menuyubi" href="menusencillo.php">Menú</a>
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-center">
                <a class="menuyubi" href="" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
            </div>
        </div>
    </nav> -->
    <!--MODAL DE LA UBICACIÓN-->
    <div class="modal fade" id="alta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1300;">
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
    <!--CUERPO-->
    <!--PRESENTACIÓN: IMAGENES-->
    <div class="col-12">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner eslogan">
                        <div class="carousel-item active">
                        <img src="img/comida1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Carnitas el Chaperon</h5>
                            <p>Las carnitas más ricas de toda la ciudad</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="img/gringa.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Haz tu pedido en línea</h5>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <a href="" data-bs-toggle="modal" data-bs-target="#alta"><img src="img/fachada1.jpg" class="d-block w-100" alt="..."></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¡TE ESPERAMOS!</h5>
                            <p>Horario de 10:00 a.m a 6:00 p.m</p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    </button>
                </div>
            </div>
    <div class="container principal"> 
        <div class="row">
            <!--PRESENTACIÓN: TEXTO
            <div class="col-xs-12 col-12 col-md-6 col-lg-6 presentacion">
                <h1 class="titulo">CARNITAS EL CHAPERON</h1><br><br>
                <h2 class="eslogan">Las carnitas más ricas de toda la ciudad</h2><br>
                <h3 class="ven"><u>Haz tu pedido en línea</u></h3><br>
                <h3 class="teesperamos">¡TE ESPERAMOS!</h3><br><br>
                <p class="ven">Carr. Torreón - Matamoros 159, Oscar Flores Tapia, 27086 Torreón, Coah.</p>
                <p class="ven">En un horario de 10:00 a.m a 6:00 p.m</p>

            </div>-->
            <!--ESPACIO DE 50PX-->
            <div class="col-12 col-md-12 col-lg-12 espacio"></div>
            <!--TITULO: PROMOCIONES-->
            <div class="col-12 col-md-12 col-lg-12">
                <h1 class="tprom" style="text-align: center;">Promociones</h1>
                <hr style="border: 1px solid #E59866; background-color: #E59866; height: 3px;">
            </div>
            <!--PAQUETE 1-->
            <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                <!--CARD 1-->
                <div class="card contenidocards" style="width: 18rem;">
                    <img src="img/paquetes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Paquete 1</h5>
                    <p class="card-text">
                        Incluye:
                        <ul>
                            <li>1 kg de carnitas</li>
                            <li>1 kg de tortillas</li>
                            <li>1 refresco de 2L</li>
                            <br><br>
                        </ul>
                    </p>
                    <a href="#" class="btn btn-primary botoncards">Comprar</a>
                    </div>
                </div>
            </div>
            <!--PAQUETE 2-->
            <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                <!--CARD 2-->
                <div class="card contenidocards" style="width: 18rem;">
                    <img src="img/paquetes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Paquete 2</h5>
                    <p class="card-text">
                        Incluye:
                        <ul>
                            <li>½ kg de carnitas</li>
                            <li>¼ kg de buche</li>
                            <li>1 kg de tortillas</li>
                            <li>1 refresco de 2L</li>
                            <br>
                        </ul>
                    </p>
                    <a href="#" class="btn btn-primary botoncards">Comprar</a>
                    </div>
                </div>
            </div>
            <!--PAQUETE 3-->
            <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                <!--CARD 3-->
                <div class="card contenidocards justify-content: flex-end;
                " style="width: 18rem;">
                    <img src="img/paquetes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Paquete 3</h5>
                    <p class="card-text">
                        Incluye:
                        <ul>
                            <li>1 chamorro</li>
                            <li>½ de tortillas</li>
                            <li>¼ chicharrón botanero</li>
                            <br><br>
                        </ul>
                    </p>
                    <a href="#" class="btn btn-primary botoncards">Comprar</a>
                    </div>
                </div>
            </div>
            <!--PAQUETE 4-->
            <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                <!--CARD 4-->
                <div class="card contenidocards" style="width: 18rem;">
                    <img src="img/paquetes.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Paquete 4</h5>
                    <p class="card-text">
                        Incluye:
                        <ul>
                            <li>¼ buche</li>
                            <li>¼ chicharrón botanero</li>
                            <li>1 kg carnitas</li>
                            <li>1 kg de tortillas</li>
                            <li>1 refresco de 2L</li>
                        </ul>
                    </p>
                    <a href="#" class="btn btn-primary botoncards d-flex justify-content-end">Comprar</a>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>
</body>
</html>