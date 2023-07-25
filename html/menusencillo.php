<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/menusencillo.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>
    <title>Menú</title>
</head>
<body style="background-color: #F4F6F6;">
    <!--BARRA DE NAV 1-->
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="../img/logo.png" alt="Logo" width="35" height="50">
        <span>Carnitas Chaperon</span>
        </a>
        <button type="button" class="btn btn-outline-secondary iniciarsesionnav" data-bs-toggle="modal" data-bs-target="#iniciarsesion" style="margin-top: 5px;">Iniciar sesión</button>
        </div>
    </nav>
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
    <nav style="margin-top: 70px; position:fixed; width: 100%; z-index: 1200; background-color: #F4F6F6;">
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
                <a class="nav-link" href="#Otros" data-bs-toggle="tab">Otros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
            </li>
        </ul>
    </nav>

    <!--CONTENIDO DE LOS TABS: TODOS LOS PRODUCTOS SECCIONADOS-->
    <div class="tab-content" style="padding-top: 140px;">
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
                            <img src="../img/gringas2.jpg" class="card-img-top imagenescards">
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
                            <img src="../img/gringas.jpg" class="card-img-top imagenescards">
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
                            <img src="../img/chamorro.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Chamorros<b style="float: right;">$90.00</b></h5><hr>
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
                    <!--Manitas-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: manitas-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/manitas.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Manitas<b style="float: right;">$60.00</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 manita.</li>
                                    <li>2 bolsas de verdura</li>
                                    <li>2 bolsas de salsa</li>
                                    <li>1 bolsa de tostadas</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor <u>(incluye tortillas)</u>: <b>$60.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Quesadillas-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 3: quesadillas-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/quesadillas.jpg" class="card-img-top imagenescards">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Quesadillas<b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 quesadilla.</li>
                                    <li>1 bolsa de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$30.00</b></p>
                            </div>
                        </div>
                    </div>
                    <!--TITULO: CHICHARRONES-->
                    <div class="col-12 col-md-12 col-lg-12 p-2 mt-5">
                        <h1 class="tprom" style="text-align: center;">Chicharrones</h1>
                    </div>
                    <!--Peya-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 4: peya-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/peya.jpg" class="card-img-top imagenescards" style="height: 200px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Peya<b style="float: right;">$200.00 kg</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 kg de chicharrón peya.</li>
                                    <li>4 bolsas de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$200.00 kg</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Botanero-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 4: botanero-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/botanero.jpeg" class="card-img-top imagenescards" style="height: 200px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Botanero<b style="float: right;">$300.00 kg</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 kg de chicharrón botanero.</li>
                                    <li>4 bolsas de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$300.00 kg</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Botanero light-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 6: botanero light-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/botanerolight.jpg" class="card-img-top imagenescards" style="height: 200px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Light<b style="float: right;">$300.00 kg</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 kg de chicharrón botanero light.</li>
                                    <li>4 bolsas de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$300.00 kg</b></p>
                            </div>
                        </div>
                    </div>
                    <!--Durito-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 7: durito-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/durito.jpg" class="card-img-top imagenescards" style="height: 200px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Durito<b style="float: right;">$300.00 kg</b></h5><hr>
                            <p class="card-text desc">
                            Incluye:
                                <ul class="desc">
                                    <li>1 kg de botanero light.</li>
                                    <li>4 bolsas de salsa</li>
                                </ul>
                            </p>
                            <p class="preciocomedor">Precio en comedor: <b>$300.00 kg</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTENIDO 6: BEBIDAS-->
        <div class="tab-pane fade" id="Bebidas" style="text-align: justify;">
            <div class="container">
                <!--CERVEZAS-->
                <div class="row align-items-start p-3">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Cervezas</h1>
                    </div>
                    <!--Medias $30-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: medias $30-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/medias30.jpg" class="card-img-top imagenescards" style="height: 200px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Medias 355 ml<b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">
                                <u><b style="text-align: center;">Solo consumo en comedor.</b></u><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="1">Indio</option>
                                    <option value="2">Tecate light</option>
                                    <option value="3">XX lager</option>
                                </select><br><br>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Medias $35-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: medias $35-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/medias35.jpg" class="card-img-top imagenescards" style="height: 187px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Medias 355 ml<b style="float: right;">$35.00</b></h5><hr>
                            <p class="card-text desc">
                                <u><b style="text-align: center;">Solo consumo en comedor.</b></u><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="1">XX ultra</option>
                                    <option value="2">Amstel ultra</option>
                                    <option value="3">Bohemia oscura</option>
                                    <option value="4">Heineken</option>
                                </select><br><br>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Caguama-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 3: caguama-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/caguamatec.jpg" class="card-img-top imagenescards" style="height: 185px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Cerveza 940 ml<b style="float: right;">$60.00</b></h5><hr>
                            <p class="card-text desc">
                                <u><b style="text-align: center;">Solo consumo en comedor.</b></u><br><br>
                                Descripción: <br>
                                Caguama <b>Tecate light</b>, 940 ml. <br><br>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--BEBIDAS PREPARADAS-->
                <div class="row align-items-start p-3">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Bebidas preparadas</h1>
                    </div>
                    <!--Michelada-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: michelada-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/michelada.jpg" class="card-img-top imagenescards" style="height: 180px;">
                            <div class="card-body">
                            <h5 class="card-title productoT text-center" style="font-family: Comic Sans MS;">Michelada 1 lt</h5><hr>
                            <p class="card-text desc">
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="1">Indio</option>
                                    <option value="2">Tecate light</option>
                                    <option value="3">XX lager</option>
                                </select>
                                <b style="float: right;">$80.00</b><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="4">XX ultra</option>
                                    <option value="5">Amstel ultra</option>
                                    <option value="6">Bohemia oscura</option>
                                    <option value="7">Heineken</option>
                                </select>
                                <b style="float: right;">$85.00</b>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Clamacheve-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: clamacheve-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/clamacheve.jpg" class="card-img-top imagenescards" style="height: 180px;">
                            <div class="card-body">
                            <h5 class="card-title productoT text-center" style="font-family: Comic Sans MS;">Clamacheve 500 ml</h5><hr>
                            <p class="card-text desc">
                            <u><b style="text-align: center;">Solo consumo en comedor.</b></u><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="1">Indio</option>
                                    <option value="2">Tecate light</option>
                                    <option value="3">XX lager</option>
                                </select>
                                <b style="float: right;">$70.00</b><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="4">XX ultra</option>
                                    <option value="5">Amstel ultra</option>
                                    <option value="6">Bohemia oscura</option>
                                    <option value="7">Heineken</option>
                                </select>
                                <b style="float: right;">$75.00</b> <br><br>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Chelado-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 3: chelado-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/chelado.jpg" class="card-img-top imagenescards" style="height: 180px;">
                            <div class="card-body">
                            <h5 class="card-title productoT text-center" style="font-family: Comic Sans MS;">Chelado 1 lt</h5><hr>
                            <p class="card-text desc">
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="1">Indio</option>
                                    <option value="2">Tecate light</option>
                                    <option value="3">XX lager</option>
                                </select>
                                <b style="float: right;">$70.00</b><br><br>
                                Cervezas a elegir:
                                <select name="Cervezas"> <!--Cervezas a elegir-->
                                    <option value="4">XX ultra</option>
                                    <option value="5">Amstel ultra</option>
                                    <option value="6">Bohemia oscura</option>
                                    <option value="7">Heineken</option>
                                </select>
                                <b style="float: right;">$75.00</b>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--BEBIDAS DE SABOR-->
                <div class="row align-items-start p-3">
                    <!--TITULO: PRODUCTO-->
                    <div class="col-12 col-md-12 col-lg-12 p-2">
                        <h1 class="tprom" style="text-align: center;">Bebidas de sabor</h1>
                    </div>
                    <!--Refrescos-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 1: refrescos-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/refrescos.jpg" class="card-img-top imagenescards" style="height: 180px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Refresco 500ml <b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">
                            <u><b>Solo consumo en comedor.</b></u><br><br>
                                Sabores a elegir:
                                <select class="form-select" name="Refrescos"> <!--Sabores a elegir-->
                                    <option value="1">Coca Cola</option>
                                    <option value="2">Coca Cola Light</option>
                                    <option value="3">Fanta de fresa</option>
                                    <option value="4">Fanta de naranja</option>
                                    <option value="5">Sidral Mundet</option>
                                    <option value="6">Fresca</option>
                                    <option value="7">Sprite</option>
                                </select><br>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Refresco desechable-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 2: refresco desechable-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/cocadesechable.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Refresco 500 ml<b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">Coca cola desechable 500 ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Refresco chico-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 3: refresco chico-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/cocachica.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Refresco 235ml <b style="float: right;">$20.00</b></h5><hr>
                            <p class="card-text desc">Coca cola de 235 ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Agua jamaica-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 4: agua jamaica-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/aguajamaica.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Agua de jamaica<b style="float: right;">$25.00</b></h5><hr>
                            <p class="card-text desc">Agua de jamaica ciel 600ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Agua natural-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 5: Agua natural-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/aguaciel.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Agua natuural<b style="float: right;">$15.00</b></h5><hr>
                            <p class="card-text desc">Agua natural ciel 600 ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Agua mineral-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 6: agua mineral-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/topochico.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Agua mineral<b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">Agua mineral Topo Chico 600 ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Jugo del valle botella 600 ml-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 7: jugo botella-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/jugobotella.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Jugo del valle <b style="float: right;">$30.00</b></h5><hr>
                            <p class="card-text desc">Jugo del Valle Fruit de 600 ml</p>
                            </div>
                        </div>
                    </div>
                    <!--Frutsi-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 8: frutsi-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/frutsi.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Frutsi 200ml <b style="float: right;">$15.00</b></h5><hr>
                            <p class="card-text desc">
                                Sabores a elegir:
                                <select name="Sabores"> <!--Sabores a elegir-->
                                    <option value="1">Cereza</option>
                                    <option value="2">Uva</option>
                                </select>
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Jugo del valle de caja -->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 9: jugo de caja-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/jugodecaja.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Jugo del Valle <b style="float: right;">$15.00</b></h5><hr>
                            <p class="card-text desc">
                                Sabores a elegir:
                                <select name="Sabores"> <!--Sabores a elegir-->
                                    <option value="1">Manzana</option>
                                    <option value="2">Mango</option>
                                    <option value="3">Durazno</option>
                                </select> <br><br>
                                Jugo del valle de 200 ml
                            </p>
                            </div>
                        </div>
                    </div>
                    <!--Aguas-->
                    <div class="col-12 col-md-4 col-lg-4 divdecard p-3">
                        <!--CARD 10: aguas-->
                        <div class="card contenidocards" style="width: 18rem; top: 0px;">
                            <img src="../img/aguas.jpg" class="card-img-top imagenescards" style="height: 160px;">
                            <div class="card-body">
                            <h5 class="card-title productoT" style="font-family: Comic Sans MS;">Agua fresca<b style="float: right;">$35.00</b></h5><hr>
                            <p class="card-text desc">
                                Sabores a elegir:
                                <select class="form-select" name="Sabores"> <!--Sabores a elegir-->
                                    <option value="1">Limón</option>
                                    <option value="2">Horchata</option>
                                </select> <br>
                                Agua fresca de 1 lt
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>