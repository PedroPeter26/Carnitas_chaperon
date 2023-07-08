<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/menusencillo.css">
    <title>Menú</title>
</head>
<body style="background-color: #F4F6F6;">
    <!--BARRA DE NAV 1-->
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
        <img src="../img/logo.png" alt="Logo" width="35" height="50">&nbsp; &nbsp;&nbsp;CARNITAS EL CHAPERON
        </a>
        <button type="button" class="btn btn-outline-secondary iniciarsesionnav" data-bs-toggle="modal" data-bs-target="#iniciarsesion" style="margin-top: 5px;">Iniciar sesión</button>
        </div>
    </nav>
    <!--BARRA DE NAV 2-->
    <nav class="barranav2">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6 text-center">
                <a class="menuyubi" href="menusencillo.html">Menú</a>
            </div>
            <div class="col-6 col-md-6 col-lg-6 text-center">
                <a class="menuyubi" href="" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
            </div>
        </div>
    </nav>
    <!-- MODAL: INICIAR SESIÓN-->
    <div class="modal fade" id="iniciarsesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header titulomodalnav">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar sesión</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <!--TABS: PRODUCTOS-->
    <nav style="margin-top: 125px; position:fixed; width: 100%; z-index: 1200; background-color: #F4F6F6;">
        <ul class="nav nav-underline nav-fill">
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
                <a class="nav-link" href="#Otros" data-bs-toggle="tab">Otros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
            </li>
        </ul>
    </nav>

    <!--CONTENIDO DE LOS TABS: TODOS LOS PRODUCTOS SECCIONADOS-->
    <div class="tab-content" style="padding-top: 190px;">
        <!--CONTENIDO 1: CARNITAS-->
        <div class="tab-pane fade show active" id="Carnitas" style="text-align: justify;">
            <div class="container principal">
                <div class="row align-items-start">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Carnitas</h1>
                    </div>
                    <!--1/2 kg de carne-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: 1/2 de carne-->
                        <div class="card contenidocards" style="width: 18rem;">
                            <img src="../img/mediokg.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title producto" style="font-family: Comic Sans MS;">½kg de carne<b style="float: right;">$150.00</b></h5><hr>
                            <p class="card-text desc">
                                Carnes a elegir:
                                <select name="Carnes"> <!--Carnes a elegir-->
                                    <option value="1">Carnitas</option>
                                    <option value="2">Buche</option>
                                    <option value="3">Cuerito</option>
                                    <option value="4">Costilla</option>
                                    <option value="5">Adobada</option>
                                    <option value="6">Trompo</option>
                                    <option value="7">Surtido</option>
                                </select><br><br>
                                Incluye:
                                <ul class="desc">
                                    <li>½ kg de carne a elegir</li>
                                    <li>2 bolsas de verdura</li>
                                    <li>2 bolsas de salsa</li>
                                    <li>1 bolsa de tostadas</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor <u>(incluye tortillas)</u>: <b>$170</b></p>
                            </div>
                        </div>
                    </div>
                    <!--1 kg de carne-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: 1 kg de carne-->
                        <div class="card contenidocards" style="width: 18rem;">
                            <img src="../img/kg.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                                <h5 class="card-title producto" style="font-family: Comic Sans MS;">1 kg de carne<b style="float: right;">$300.00</b></h5><hr>
                                <p class="card-text desc">
                                    Carnes a elegir:
                                    <select name="Carnes"> <!--Carnes a elegir-->
                                        <option value="1">Carnitas</option>
                                        <option value="2">Buche</option>
                                        <option value="3">Cuerito</option>
                                        <option value="4">Costilla</option>
                                        <option value="5">Adobada</option>
                                        <option value="6">Trompo</option>
                                        <option value="7">Surtido</option>
                                    </select><br><br>
                                    Incluye:
                                    <ul class="desc">
                                        <li>1 kg de carne a elegir</li>
                                        <li>4 bolsas de verdura</li>
                                        <li>4 bolsas de salsa</li>
                                        <li>2 bolsa de tostadas</li>
                                    </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor <u>(incluye tortillas)</u>: <b>$340</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENIDO 2: TACOS-->
        <div class="tab-pane fade" id="Tacos" style="text-align: justify;">
            <div class="container">
                <div class="row align-items-start">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Tacos</h1>
                    </div>
                    <!--Orden de tacos-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: orden de tacos-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/tacos.jpeg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Orden de tacos<b style="float: right;">$80.00</b></h5><hr>
                            <p class="card-text desc">
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
                                <ul class="desc">
                                    <li>4 tacos de la carne a elegir</li>
                                    <li>1 bolsa de verdura</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$80.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Arma tu orden de tacos-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: arma tu orden-->
                        <div class="card contenidocards" style="width: 18rem; height: auto;">
                            <img src="../img/armatuorden.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Arma tu orden<b style="float: right;">$80.00</b></h5><hr>
                            <p class="card-text desc">
                                Taco 1:
                                <select name="Carnes"> <!--Carnes a elegir T1-->
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
                                Taco 2:
                                <select name="Carnes"> <!--Carnes a elegir T2-->
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
                                Taco 3:
                                <select name="Carnes"> <!--Carnes a elegir T3-->
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
                                Taco 4:
                                <select name="Carnes"> <!--Carnes a elegir T4-->
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
                                <ul class="desc">
                                    <li>4 tacos</li>
                                    <li>1 bolsa de verdura</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$80.00</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENIDO 3: LONCHES-->
        <div class="tab-pane fade" id="Lonches" style="text-align: justify;">
            <div class="container">
                <div class="row align-items-start">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Lonches</h1>
                    </div>
                    <!--Lonche sencillo-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: lonche sencillo-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchesencillo.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Lonche sencillo<b style="float: right;">$70.00</b></h5><hr>
                            <p class="card-text desc">
                                Carnes a elegir:
                                <select name="Carnes"> <!--Carnes a elegir-->
                                    <option value="1">Carnitas</option>
                                    <option value="2">Buche</option>
                                    <option value="3">Cuerito</option>
                                    <option value="4">Costilla</option>
                                    <option value="5">Adobada</option>
                                    <option value="6">Trompo</option>
                                    <option value="7">Surtido</option>
                                </select><br><br>
                                Incluye:
                                <ul class="desc">
                                    <li>1 lonche de la carne a elegir <b>sin aguacate</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$70.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Lonche mixto-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: lonche mixto-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Lonche mixto<b style="float: right;">$80.00</b></h5><hr>
                            <p class="card-text desc">
                                Carnes a elegir:
                                <select name="Carnes"> <!--Carnes a elegir-->
                                    <option value="1">Carnitas</option>
                                    <option value="2">Buche</option>
                                    <option value="3">Cuerito</option>
                                    <option value="4">Costilla</option>
                                    <option value="5">Adobada</option>
                                    <option value="6">Trompo</option>
                                    <option value="7">Surtido</option>
                                </select><br><br>
                                Incluye:
                                <ul class="desc">
                                    <li>1 lonche de la carne a elegir <b>con aguacate</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$80.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Lonche especial-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 3: lonche especial-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Lonche especial<b style="float: right;">$100.00</b></h5><hr>
                            <p class="card-text desc">
                                Carnes a elegir:
                                <select name="Carnes"> <!--Carnes a elegir-->
                                    <option value="1">Carnitas</option>
                                    <option value="2">Buche</option>
                                    <option value="3">Cuerito</option>
                                    <option value="4">Costilla</option>
                                    <option value="5">Adobada</option>
                                    <option value="6">Trompo</option>
                                    <option value="7">Surtido</option>
                                </select><br><br>
                                Incluye:
                                <ul class="desc">
                                    <li>1 lonche de la carne a elegir <b>con aguacate, queso y jamón</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$100.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Lonche aguacate, queso y jamón-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 4: lonche aguacate, queso y jamón-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Lonche aguacate, queso y jamón<b style="float: right;">$65.00</b></h5><hr>
                            <p class="card-text desc">
                                Incluye:
                                <ul class="desc">
                                    <li>1 lonche de <b>aguacate, queso y jamón</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$65.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Lonche de aguacate-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 5: lonche de aguacate-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Lonche aguacate<b style="float: right;">$50.00</b></h5><hr>
                            <p class="card-text desc">
                                Incluye:
                                <ul class="desc">
                                    <li>1 lonche <b>de aguacate</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$50.00</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENIDO 4: GRINGAS-->
        <div class="tab-pane fade" id="Gringas" style="text-align: justify;">
            <div class="container">
                <div class="row align-items-start">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Gringas</h1>
                    </div>
                    <!--Gringa-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: Gringa normal-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchesencillo.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Gringa<b style="float: right;">$100.00</b></h5><hr>
                            <p class="card-text desc">
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
                                <ul class="desc">
                                    <li>1 gringa <b>de la carne a elegir</b>.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$100.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Arma tu gringa-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: arma tu gringa-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Arma tu gringa<b style="float: right;">$100.00</b></h5><hr>
                            <p class="card-text desc">
                                1/2 gringa de:
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
                                1/2 gringa de:
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
                                <ul class="desc">
                                    <li>1 gringa (<b>1/2 gringa de una carne y 1/2 gringa de otra carne</b>).</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$100.00</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENIDO 5: OTROS-->
        <div class="tab-pane fade" id="Otros" style="text-align: justify;">
            <div class="container">
                <div class="row align-items-start">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Otros</h1>
                    </div>
                    <!--Chamorros-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: Chamorros-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchesencillo.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Chamorro<b style="float: right;">$90.00</b></h5><hr>
                            <p class="card-text desc">
                                Incluye:
                                <ul class="desc">
                                    <li>1 chamorro.</li>
                                    <li>2 bolsas de verdura</li>
                                    <li>2 bolsas de salsa</li>
                                    <li>1 bolsa de tostadas</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor <u>(incluye tortillas)</u>: <b>$100.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Arma tu gringa-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: arma tu gringa-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/lonchemixto.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Arma tu gringa<b style="float: right;">$100.00</b></h5><hr>
                            <p class="card-text desc">
                                1/2 gringa de:
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
                                1/2 gringa de:
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
                                <ul class="desc">
                                    <li>1 gringa (<b>1/2 gringa de una carne y 1/2 gringa de otra carne</b>).</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$100.00</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <!--SCRIPTS IMPORTADOS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>
</body>
</html>
