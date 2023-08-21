<?php
require 'class/config.php';
include 'class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/5.3/components/dropdowns/#single-button "></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>


    <!--FUENTE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Bricolage+Grotesque:opsz,wght@10..48,500&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <title>Carnitas Chaperon</title>
    <style>
        nav {
            background-color: #212429;
        }

        a.barra1 {
            text-decoration: none;
            color: gold;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        a.barra1:hover {
            color: goldenrod;
        }

        .enlaceboton:hover {
            color: white;
            background-color: goldenrod;
        }

        .fondo-bg {
            position: fixed;
            background: url(img/fondoindex.jpg);
            background-size: cover;
            background-color: #ff7a00;
            top: 0;
            height: 700px;
            width: 100%;
            z-index: -2;
            overflow-x: hidden;
        }

        h1,
        h6 {
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        .white-bg {
            position: absolute;
            top: 0px;
            background-color: white;
            min-height: 850px;
            margin: 500px 0px;
            width: 100%;
            height: max-content;
            z-index: -2;
        }

        .content {
            position: absolute;
            top: 0;
            background-color: transparent;
        }

        a {
            font-family: 'Bricolage Grotesque', sans-serif;
            text-decoration: none;
        }

        .navbar-container {
            position: sticky;
            z-index: 1;
            top: 0;
            height: 50px;
            width: 100%;
            /* Make sure it's above other elements */
        }

        .content-container {
            position: relative;
            z-index: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* Alinea verticalmente */
            height: 100%;
            top: 180px;
            /* Altura igual al 100% del viewport */
        }

        .logo {
            width: 30%;
            margin-top: -50px;
        }

        .letras {
            margin-top: 0px;
        }

        .modal-backdrop {
            z-index: -10;
        }

        @media (min-width: 700px) {
            .logo {
                width: 20%;
            }
        }

        @media (max-width: 750px) {
            .logo {
                width: 20%;
                margin-top: -1800px;
            }
        }

        @media screen and (max-width: 650px) {
            .white-bg {
                margin: 500px 0px;
            }

            .logo {
                width: 45%;
                margin-top: 1px;

            }

            .letras {
                margin-top: -10px;
            }
        }

        @media screen and (max-width: 576px) {
            .logo {
                margin-top: -30px;
                width: 50%;
            }

            .letras {
                margin-top: -5px;
            }
        }

        footer {
            background-color: #212429;
            color: white;
            text-align: center;
            font-family: 'Bricolage Grotesque', sans-serif;
            width: 100%;
        }

        .paquetes {
            height: 80%;
            width: 80%;
        }
    </style>
</head>

<body>

    <!-- BARRA -->
    <div class="navbar-container" style="position:fixed;">
        <!--BARRA DE NAV 1-->
            <nav class="navbar navbar-expand-md navbar-light barranav sticky-top">
                <div class="container-fluid" style="width: 90%;">
                    <a class="navbar-brand" style="color: white;" href="index2.php">
                        <img src="img/logo.png" alt="Logo" width="35" height="50"> <span style="font-family: 'Bricolage Grotesque', sans-serif;">CARNITAS CHAPERON</span>
                    </a>
                    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                            <li>
                                <a class="dropdown-item rounded-2" href="views/checkout.php">Carrito <span id="num_cart" class="badge bg-warning"><?php echo $num_cart ?></span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item rounded-2" href="views/ordenar.php">Ordenar</a></li>
                            <hr class="dropdown-divider">
                            <li class="dropstart"> <!--ABRE LOS ELEMENTOS PARA LA IZQUEIRDA-->
                                <a class="dropdown-item rounded-2 dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuario
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li>
                                        <a class="dropdown-item" href="views/perfil_usuario.php">
                                            Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="views/historial_de_compras.php">
                                            Historial de compras
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="class/cerrarsesion.php">Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    </div>

    <!-- CONTENIDO-->
    <div class="content-container">

        <!-- CONTENEDOR PRINCIPAL-->
        <div class="fondo-bg"></div> <!--FONDO DEL DIV-->
        <!--CONTENIDO ENCIMA DE LA IMAGEN-->
        <div class="col-12 d-flex justify-content-center" style="align-items: center;">
            <img src="img/logo.png" alt="Chaperon" class="logo">
        </div>
        <div class="col-12 d-flex justify-content-center" style="align-items: center;">
            <h1 class="text-white letras" style="font-family: 'Bricolage Grotesque', sans-serif;">Carnitas Chaperon</h1>
        </div>

        <div class="white-bg">
            <!--SECCIÓN DE PROMOCIÓN-->
            <section id="about">
                <div class="container pb-5" style="font-family: 'Bricolage Grotesque', sans-serif;">
                    <!--CAROUSSEL-->
                    <div class="mx-auto my-5" style="width: 70%;">
                        <h3 style="font-weight: lighter; color:gray">¡Visítanos!</h3><br>
                        <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/carta.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/armatuorden.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/comida1.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            </button>
                        </div>
                    </div>

                    <hr class="mx-auto" style="color: goldenrod; width:100%;"><br>

                    <!--PAQUETES-->
                    <div class="row align-items-center mb-5 mx-auto">
                        <div class="col-12">
                            <h3 style="font-weight: lighter; color:gray">¡Disfruta de nuestras promociones!</h3><br>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-5" style="text-align: center;">
                            <img src="img/1.png" alt="Paquete 1" class="paquetes">
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-5" style="text-align: center;">
                            <img src="img/2.png" alt="Paquete 2" class="paquetes">
                        </div>
                        <br>
                        <div class="col-12 col-md-6 col-lg-6 mb-5" style="text-align: center;">
                            <img src="img/3.png" alt="Paquete 3" class="paquetes">
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 mb-5" style="text-align: center;">
                            <img src="img/4.png" alt="Paquete 4" class="paquetes">
                        </div>
                    </div>


                    <hr class="mx-auto" style="color: goldenrod; width:100%;"><br>

                    <!--HORARIO-->
                    <div class="row align-items-center">
                        <div class="col-md-6 order-1 order-md-1 order-lg-1">
                            <h6 style="font-weight: lighter; color:gray">¡Estamos abiertos!</h6>
                            <h2>Horario:</h2>
                            <p><b>Lunes - Domingo : </b><span class="pl-2">10:00 a.m - 06:00 p.m</span></p>
                        </div>
                        <div class="col-md-6 order-2 order-md-2 order-lg-2">
                            <div class="row">
                                <div class="col">
                                    <img alt="" src="img/ambiente2.jpg" class="w-100 rounded shadow">
                                </div>
                                <div class="col">
                                    <img alt="" src="img/ambiente1.jpg" class="w-100 rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <hr class="mx-auto" style="color: goldenrod; width:100%;"><br><br>

                    <!--DIRECCION-->
                    <div class="row align-items-center">
                        <div class="col-md-6 order-1 order-md-2 order-lg-2">
                            <h6 style="font-weight: lighter; color:gray">¡Visítanos!</h6>
                            <h2>Dirección:</h2>
                            <p><span class="pl-2">Carr. Torreón - Matamoros 159, Oscar Flores Tapia, 27086 Torreón, Coah.</span></p>
                        </div>
                        <div class="col-md-6 order-1 order-md-1 order-lg-1">
                            <div class="row">
                                <div class="col">
                                    <img alt="" src="img/fachada2.jpg" class="w-100 rounded shadow">
                                </div>
                                <div class="col">
                                    <img alt="" src="img/fachada.jpg" class="w-100 rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--FOOTER-->
            <footer class="mt-5">
                <div class="container">
                    <br>
                    <p>&copy; 2023 Carnitas Chaperon. Todos los derechos reservados.</p>
                    <p>¡Síguenos en redes sociales!</p>
                    <a href="https://www.facebook.com/CarnitasElChaperon/" style="color: gold; margin: 0 10px;"><i class="fab fa-facebook-f"></i></a>
                </div>
            </footer>
        </div>

        <script>
            $('.navbar-dark').on('click', function() {
                $('.collapse').collapse('hide');
            });
        </script>

</body>

</html>