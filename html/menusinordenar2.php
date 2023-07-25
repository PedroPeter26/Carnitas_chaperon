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
            top:0;
            width: 100%;
            z-index: 1200;
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
                font-size: 26px;
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
        .modals
        {
            align-items: center;
            top: 15px;
            height: auto;
            font-family: 'Belanosima', sans-serif;
            z-index: 1400;
            overflow-y: scroll;
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
        /*MODAL UBICACION*/
        .modalubi
        {
            display: flex;
            max-width: 70% !important;
            text-align: center;
            align-self: auto;
            z-index: 1300;

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
            width: 80%; /* Ajusta el ancho del modal al 90% de la ventana */
            height: 80%; /* Ajusta la altura del modal al 90% de la ventana */
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
    </style>
    <title>Menú</title>
</head>
<body style="background-color: #EFE2CF;">
    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="menusinordenar.php">Menú</a>
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
                <a class="nav-link" href="#Otros" data-bs-toggle="tab">Otros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
            </li>
        </ul>
    </nav>

    <!--CONTENIDO DEL MENÚ (TODA LA COMIDA)-->
    <div class="container tab-content contenido">
        <!--CARNITAS-->
        <div class="tab-pane fade show active" id="Carnitas" style="text-align: justify;">
                <div class="container principal">
                    <!--CARNITAS-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Carnitas">Carnitas</h2>
                        <!--CARD 1: 1/2 kg-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/mediokg.jpg" class="img-fluid rounded-start" alt="1/2 kg de carnitas" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1/2 kg de carnitas</h5>
                                            <p class="card-text">$150.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#productos">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--MODAL 1: 1/2 KG-->
                        <div class="modal modals" tabindex="-1" id="productos">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">1/2 kg de carnitas</h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="../img/mediokg.jpg" class="img-fluid rounded-start rounded-end imgmodal" alt="1/2 kg de carnitas">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4>1/2 kg de carnitas</h4>
                                                <h5><b>$150.00</b></h5><br>
                                                Incluye:
                                                <ul>
                                                    <li>2 bolsas de verdura</li>
                                                    <li>2 bolsas de salsa</li>
                                                    <li>1 bolsa de tostadas</li>
                                                </ul>
                                                <small>Precio en comedor: <br> <b>$170</b> (Incluye tortillas)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: 1 kg-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/kg.jpg" class="img-fluid rounded-start" alt="1 kg de carnitas" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1 kg de carnitas</h5>
                                            <p class="card-text">$300.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modal1kg">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--MODAL 2: 1 KG-->
                        <div class="modal modals" tabindex="-1" id="modal1kg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">1 kg de carnitas</h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="../img/kg.jpg" class="img-fluid rounded-start rounded-end imgmodal" alt="1/2 kg de carnitas">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4>1 kg de carnitas</h4>
                                                <h5><b>$300.00</b></h5><br>
                                                Incluye:
                                                <ul>
                                                    <li>4 bolsas de verdura</li>
                                                    <li>4 bolsas de salsa</li>
                                                    <li>2 bolsa de tostadas</li>
                                                </ul>
                                                <small>Precio en comedor: <br> <b>$340</b> (Incluye tortillas)</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--MODAL: PRODUCTOS-->
        <div class="modal modals" tabindex="-1" id="productos">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: #EFE2CF;">
                    <div class="modal-header">
                        <h5 class="modal-title">1/2 kg de carnitas</h5>
                    </div>
                    <div class="modal-body" style="background-color: white;">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                <img src="../img/mediokg.jpg" class="img-fluid rounded-start rounded-end imgmodal" alt="1/2 kg de carnitas">
                            </div>
                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                <h4>1/2 kg de carnitas</h4>
                                <h5><b>$150.00</b></h5><br>
                                Incluye:
                                <ul>
                                    <li>2 bolsas de verdura</li>
                                    <li>2 bolsas de salsa</li>
                                    <li>1 bolsa de tostadas</li>
                                </ul>
                                <small>Precio en comedor: <br> <b>$170</b> (Incluye tortillas)</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!--TACOS-->
        <div class="tab-pane fade" id="Tacos" style="text-align: justify;">
                <div class="container principal">
                    <!--TACOS-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Tacos">Tacos</h2>
                        <!--CARD 1: Orden de tacos-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/tacos.jpeg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Orden de tacos</h5>
                                            <p class="card-text">$80.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#ordendetacos">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--MODAL 1: Orden de tacos-->
                        <div class="modal modals" tabindex="-1" id="ordendetacos">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Orden de tacos</h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="../img/kg.jpg" class="img-fluid rounded-start rounded-end imgmodal" alt="Orden de tacos">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4>Orden de tacos</h4>
                                                <h5><b>$80.00</b></h5><br>
                                                Carnes a elegir:
                                                <select name="Carnes"> <!--Carnes a elegir-->
                                                    <option value="1">Carnitas</option>
                                                    <option value="2">Buche</option>
                                                    <option value="3">Cuerito</option>
                                                    <option value="4">Costilla</option>
                                                    <option value="5">Adobada</option>
                                                    <option value="6">Trompo</option>
                                                    <option value="7">Surtido</option>
                                                    <option value="8">Bistec</option>
                                                    <option value="9">Suadero</option>
                                                </select><br><br>
                                                Incluye:
                                                <ul>
                                                    <li>4 tacos</li>
                                                    <li>1 bolsa de verdura</li>
                                                    <li>1 bolsa de salsa</li>
                                                </ul>
                                                <small>Precio en comedor: <b>$80</b></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: Arma tu orden de tacos-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class=" col-xs-5 col-5 col-md-5 col-lg-4">
                                        <img src="../img/armatuorden.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-xs-7 col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Arma tu orden de tacos</h5>
                                            <p class="card-text">$80.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#armatuorden">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--MODAL 2: Arma tu orden de tacos-->
                        <div class="modal modals" tabindex="-1" id="armatuorden">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #EFE2CF;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Arma tu orden de tacos</h5>
                                    </div>
                                    <div class="modal-body" style="background-color: white; overflow-y: auto;">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                                <img src="../img/kg.jpg" class="img-fluid rounded-start rounded-end imgmodal" alt="Arma tu orden de tacos">
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                                <h4>Arma tu orden de tacos</h4>
                                                <h5><b>$80.00</b></h5>
                                                Taco 1:
                                                <select name="Carnes"> <!--Carnes a elegir-->
                                                    <option value="1">Carnitas</option>
                                                    <option value="2">Buche</option>
                                                    <option value="3">Cuerito</option>
                                                    <option value="4">Costilla</option>
                                                    <option value="5">Adobada</option>
                                                    <option value="6">Trompo</option>
                                                    <option value="7">Surtido</option>
                                                    <option value="8">Bistec</option>
                                                    <option value="9">Suadero</option>
                                                </select><br>
                                                Taco 2:
                                                <select name="Carnes"> <!--Carnes a elegir-->
                                                    <option value="1">Carnitas</option>
                                                    <option value="2">Buche</option>
                                                    <option value="3">Cuerito</option>
                                                    <option value="4">Costilla</option>
                                                    <option value="5">Adobada</option>
                                                    <option value="6">Trompo</option>
                                                    <option value="7">Surtido</option>
                                                    <option value="8">Bistec</option>
                                                    <option value="9">Suadero</option>
                                                </select><br>
                                                Taco 3:
                                                <select name="Carnes"> <!--Carnes a elegir-->
                                                    <option value="1">Carnitas</option>
                                                    <option value="2">Buche</option>
                                                    <option value="3">Cuerito</option>
                                                    <option value="4">Costilla</option>
                                                    <option value="5">Adobada</option>
                                                    <option value="6">Trompo</option>
                                                    <option value="7">Surtido</option>
                                                    <option value="8">Bistec</option>
                                                    <option value="9">Suadero</option>
                                                </select><br>
                                                Taco 4:
                                                <select name="Carnes"> <!--Carnes a elegir-->
                                                    <option value="1">Carnitas</option>
                                                    <option value="2">Buche</option>
                                                    <option value="3">Cuerito</option>
                                                    <option value="4">Costilla</option>
                                                    <option value="5">Adobada</option>
                                                    <option value="6">Trompo</option>
                                                    <option value="7">Surtido</option>
                                                    <option value="8">Bistec</option>
                                                    <option value="9">Suadero</option>
                                                </select><br>
                                                Incluye:
                                                <ul>
                                                    <li>4 tacos de la carne a elegir</li>
                                                    <li>1 bolsa de verdura</li>
                                                    <li>1 bolsa de salsa</li>
                                                </ul>
                                                <small>Precio en comedor: <b>$80</b></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--LONCHES-->
        <div class="tab-pane fade" id="Lonches" style="text-align: justify;">
                <div class="container principal">
                    <!--LONCHES-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Lonches">Lonches</h2>
                        <!--CARD 1: Lonche sencillo-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/lonchesencillo.jpg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Lonche sencillo</h5>
                                            <p class="card-text">$70.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: mixto-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/lonchemixto.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Lonche mixto</h5>
                                            <p class="card-text">$80.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: especial-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/lonchemixto.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Lonche especial</h5>
                                            <p class="card-text">$100.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 4: aguacate, queso y jamón-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/lonchemixto.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Lonche de aguacate, queso y jamón</h5>
                                            <p class="card-text">$65.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 5: aguacate-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/lonchemixto.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Lonche de aguacate</h5>
                                            <p class="card-text">$50.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--GRINGAS-->
        <div class="tab-pane fade" id="Gringas" style="text-align: justify;">
                <div class="container principal">
                    <!--GRINGAS-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Gringas">Gringas</h2>
                        <!--CARD 1: Gringa-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/gringas2.jpg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Gringa</h5>
                                            <p class="card-text">$100.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: Arma tu gringa-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/gringas.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Arma tu gringa</h5>
                                            <p class="card-text">$100.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--CHICHARRONES-->
        <div class="tab-pane fade" id="Chicharrones" style="text-align: justify;">
                <div class="container principal">
                    <!--CHICHARRONES-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Chicharrones">Chicharrones</h2>
                        <!--CARD 1: peya-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/peya.jpg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1 kg de peya</h5>
                                            <p class="card-text">$200.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: botanero-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/botanero.jpeg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1 kg de botanero</h5>
                                            <p class="card-text">$300.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: botanero light-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/botanerolight.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1 kg de botanero light</h5>
                                            <p class="card-text">$300.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 4: durito-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/durito.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">1 kg de durito</h5>
                                            <p class="card-text">$300.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--OTROS-->
        <div class="tab-pane fade" id="Otros" style="text-align: justify;">
                <div class="container principal">
                    <!--OTROS-->
                    <div class="row mb-5">
                        <h2 class="mb-4" id="Otros">Otros</h2>
                        <!--CARD 1: chamorros-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/chamorro.jpg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Chamorros</h5>
                                            <p class="card-text">$90.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: manitas-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/manitas.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Manitas</h5>
                                            <p class="card-text">$60.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: quesadillas-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4">
                                        <img src="../img/quesadillas.jpg" class="img-fluid rounded-start" alt="Orden de tacos" style="height: 150px; width: 180px;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Quesadillas</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!--BEBIDAS-->
        <div class="tab-pane fade" id="Bebidas" style="text-align: justify;">
                <div class="container principal">
                    <!--Cervezas-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Cervezas</h2>
                        <!--CARD 1: cervezas $30-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/medias30.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Cervezas</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: cervezas $35-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/medias35.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Cervezas</h5>
                                            <p class="card-text">$35.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: caguama-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/caguamatec.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Cerveza familiar</h5>
                                            <p class="card-text">$60.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Bebidas preparadas con alcohol-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Bebidas preparadas</h2>
                        <!--CARD 1: michelada-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/michelada.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Michelada</h5>
                                            <p class="card-text">$80.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: chelada-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/chelado.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Chelado</h5>
                                            <p class="card-text">$70.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Bebidas de sabor-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Bebidas de sabor</h2>
                        <!--CARD 1: refrescos-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/cocadesechable.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Refresco</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: refresco desechable-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/cocadesechable.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Coca cola desechable</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: refresco chico-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/cocachica.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Coca cola chica</h5>
                                            <p class="card-text">$20.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 4: agua de jamaica-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/aguajamaica.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Agua Ciel de jamaica</h5>
                                            <p class="card-text">$25.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 5: agua natural-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/aguaciel.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Agua Ciel natural</h5>
                                            <p class="card-text">$15.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 6: agua mineral-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/topochico2.png" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Agua mineral Topo Chico</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 7: jugo del valle fruit-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/jugobotella.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Jugo del Valle Fruit</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 8: frutsi-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/frutsi.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Frutsi</h5>
                                            <p class="card-text">$15.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 9: jugo del valle de caja-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/jugodecaja.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Jugo del Valle</h5>
                                            <p class="card-text">$15.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 10: agua fresca-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/aguas.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Agua fresca</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Bebidas preparadas sin alcohol-->
                    <div class="row mb-5">
                        <h2 class="mb-4">Bebidas preparadas sin alcohol</h2>
                        <!--CARD 1: limonada mineral-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/limonadamineral.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Limonada mineral</h5>
                                            <p class="card-text">$40.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 2: agua celis-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/aguacelis.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Agua celis</h5>
                                            <p class="card-text">$30.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 3: vaso preparado con agua mineral-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/vasoprepconaguamin.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Vaso preparado con agua mineral</h5>
                                            <p class="card-text">$65.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 4: vaso preparado-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/vasoprep.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Vaso preparado</h5>
                                            <p class="card-text">$35.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARD 5: vaso limón y sal-->
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                    <div class="col-5 col-md-5 col-lg-4 d-flex justify-content-center align-items-center rounded-start"  style="background-color: white;">
                                        <img src="../img/chelado.jpg" class="img-fluid rounded-start" alt="orden de tacos" style="width: auto; height: auto;">
                                    </div>
                                    <div class="col-7 col-md-7 col-lg-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Vaso limón y sal</h5>
                                            <p class="card-text">$5.00</p>
                                            <p class="card-text"><small class="text-body-secondary"><a href="" style="text-decoration: none; color: black;">Más información</a></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

</body>
</html>