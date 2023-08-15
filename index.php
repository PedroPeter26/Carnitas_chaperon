<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>
</body>
</html>
