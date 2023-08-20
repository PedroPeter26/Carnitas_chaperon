<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <title>Carnitas Chaperon</title>
</head>
<body>
    <!--BARRA DE NAV 1-->
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                <li><a class="dropdown-item rounded-2" href="views/menusencillo.php">Menú</a></li>
                <li><a class="dropdown-item rounded-2" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item rounded-2" href="#">Iniciar sesión</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- MODAL: INICIAR SESIÓN-->
    <div class="modal fade" id="iniciarsesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header titulomodalnav">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar sesión</h1>
            <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body textomodalnav">
            <form action="">
                <label class="form-label" for="usuario">Usuario:</label>
                <input class="form-control" type="text" name="usuario">
                <label class="form-label" for="contraseña">Contraseña:</label>
                <input class="form-control" type="password" name="contraseña">
                <br>¿Aún no tienes una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#registrarse">Registrate</a><br>
            </form>
            </div>
            <div class="modal-footer textomodalnav">
            <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
        </div>
    </div>

    <!-- MODAL: REGISTRARSE-->
    <div class="modal fade" id="registrarse" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" style="z-index: 1400;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header titulomodalnav">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrate</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" class="textomodalnav">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" name="nombre">
                <label class="form-label" for="apellido">Apellido:</label>
                <input class="form-control" type="text" name="apellido">
                <label class="form-label" for="correo">Correo:</label>
                <input class="form-control" type="email" name="correo">
                <label class="form-label" for="contraseña">Contraseña:</label>
                <input class="form-control" type="password" name="contraseña">
                <br>¿Ya tienes una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#iniciarsesion">Inicia sesión</a><br>
            </form>
            </div>
            <div class="modal-footer textomodalnav">
            <button type="submit" class="btn btn-primary">Registrarme</button>
            </div>
        </div>
        </div>
    </div>

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
                <div class="carousel-caption d-none d-md-block" style="color: #FF3131;">
                    <h5>Carnitas el Chaperon</h5>
                    <p>Las carnitas más ricas de toda la ciudad</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="img/gringa.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="color: #FF3131;">
                    <h5>Haz tu pedido en línea</h5>
                </div>
                </div>
                <div class="carousel-item">
                <a href="" data-bs-toggle="modal" data-bs-target="#alta"><img src="img/fachada1.jpg" class="d-block w-100" alt="..."></a>
                <div class="carousel-caption d-none d-md-block" style="color: #FF3131;">
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
            <!--ESPACIO DE 50PX-->
            <div class="col-12 col-md-12 col-lg-12 espacio"></div>
            <!--TITULO: PROMOCIONES-->
            <div class="col-12 col-md-12 col-lg-12">
                <h1 class="tprom" style="text-align: center;">Promociones</h1>
                <hr style="border: 1px solid #E59866; background-color: #E59866; height: 3px;">
            </div>
            <br>
            <div class="row divdecard">
                <div class="col-12 col-md-6 contenidocards">
                    <a href=""><img src="img/1.png" style="width: 100%; padding: 25px; margin: 0;" class="rounded"></a>
                </div>
                <div class="col-12 col-md-6 contenidocards">
                    <a href=""><img src="img/2.png" style="width: 100%; padding: 25px; margin: 0;" class="rounded"></a>
                </div>
                <div class="col-12 col-md-6 contenidocards">
                    <a href=""><img src="img/3.png" style="width: 100%; padding: 25px; margin: 0;" class="rounded"></a>
                </div>
                <div class="col-12 col-md-6 contenidocards">
                    <a href=""><img src="img/4.png" style="width: 100%; padding: 25px; margin: 0;" class="rounded"></a>
                </div>
            </div>
        </div>
    </div>
    
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
>>>>>>> Stashed changes
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>
    <script src=""></script>

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

        a.barra2 {
            text-decoration: none;
            color: white;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        a.barra2:hover {
            color: goldenrod;
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
            width: 25%;
        }

        .modalubi {
            display: flex;
            max-width: 70% !important;
            text-align: center;
            align-self: auto;
            z-index: 5 !important;

        }

        .contenedormodal /UBI/ {
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

        .modal-backdrop {
            z-index: -10;
        }

        @media (min-width: 700px) {
            .modalubi {
                width: 80%;
                /* Ajusta el ancho del modal al 90% de la ventana */
                height: 80%;
                /* Ajusta la altura del modal al 90% de la ventana */
            }

            .logo {
                width: 20%;
            }
        }

        @media screen and (max-width: 650px) {
            .modalubi {
                width: 90%;
                /* Ajusta el ancho del modal al 90% de la ventana */
                height: 90%;
                /* Ajusta la altura del modal al 90% de la ventana */
                margin: 0 auto;
            }

            .white-bg {
                margin: 500px 0px;
            }

            .logo {
                width: 45%;
            }
        }

        footer {
            background-color: #212429;
            color: white;
            text-align: center;
            font-family: 'Bricolage Grotesque', sans-serif;
            width: 100%;
        }

        .separadorvertical {
            background-color: gold;

        }
    </style>
</head>

<body>

    <!-- BARRAS -->
    <div class="navbar-container" style="position:fixed;">
        <!-- BARRA 1 -->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.png" alt="Logo" width="5%">
                </a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link barra1" href="views/registrarse.php">¡Registrate para ordenar en línea!</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- BARRA 2 -->
        <nav class="sticky-top" style="border-top: 1px solid grey;">
            <div class="d-flex align-items-center container py-2">
                <a href="views/menusinordenar.php" class="barra2 pe-5">Menú</a>
                <a href="" class="barra2" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                <a href="views/login.php" type="button" class="btn btn-light ms-auto me-5 py-1 enlaceboton" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Iniciar sesión</a>
            </div>
        </nav>

        <!--MODAL DE LA UBICACIÓN-->
        <div class="modal fade" id="alta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    </div>

    <!-- CONTENIDO-->
    <div class="content-container">

        <!-- CONTENEDOR PRINCIPAL-->
        <div class="fondo-bg"></div> <!--FONDO DEL DIV-->
        <!--CONTENIDO ENCIMA DE LA IMAGEN-->
        <div class="col-12 d-flex justify-content-center" style="align-items: center;">
            <img src="img/logo.png" alt="Chaperon" class="logo" style="top: 200px;">
        </div>
        <div class="col-12 d-flex justify-content-center" style="align-items: center;">
            <h1 class="text-white" style="font-family: 'Bricolage Grotesque', sans-serif;">Carnitas Chaperon</h1>
        </div>

        <div class="white-bg">
            <!--SECCIÓN DE PROMOCIÓN-->
            <section id="about">
                <div class="container pb-5" style="font-family: 'Bricolage Grotesque', sans-serif;">
                    <!--BELLEZA CULINARIA-->
                    <div class="row align-items-center py-5">
                        <div class="col-md-6">
                            <h6 style="font-weight: lighter; color:gray">¡Haz tu pedido ya!</h6>
                            <h2 style="text-align: justify;">¡Bienvenidos!</h2>
                            <p style="text-align: justify;"><span class="pl-2">Sumérgete en una experiencia culinaria excepcional mientras te deleitas con nuestra amplia variedad de delicias inspiradas en el cerdo. ¡Te esperamos!</span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <img alt="" src="img/chamorro.jpeg" class="w-100 rounded shadow">
                                </div>
                                <div class="col">
                                    <img alt="" src="img/chicharron.jpeg" class="w-100 rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mx-auto" style="color: goldenrod; width:100%;"><br>

                    <!--HORARIO-->
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 style="font-weight: lighter; color:gray">¡Estamos abiertos!</h6>
                            <h2>Horario:</h2>
                            <p><b>Lunes - Domingo : </b><span class="pl-2">10:00 a.m - 06:00 p.m</span></p>
                        </div>
                        <div class="col-md-6 order-1 order-sm-first">
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

                    <br><hr class="mx-auto" style="color: goldenrod; width:100%;"><br><br>

                    <!--DIRECCION-->
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 style="font-weight: lighter; color:gray">¡Visítanos!</h6>
                            <h2>Dirección:</h2>
                            <p><span class="pl-2">Carr. Torreón - Matamoros 159, Oscar Flores Tapia, 27086 Torreón, Coah.</span></p>
                        </div>
                        <div class="col-md-6">
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
            <footer class="mt-5">
                <div class="container">
                    <br>
                    <p>&copy; 2023 Carnitas Chaperon. Todos los derechos reservados.</p>
                    <p>¡Síguenos en redes sociales!</p>
                    <a href="https://www.facebook.com/CarnitasElChaperon/" style="color: gold; margin: 0 10px;"><i class="fab fa-facebook-f"></i></a>
                </div>
            </footer>
        </div>
</body>

</html>
