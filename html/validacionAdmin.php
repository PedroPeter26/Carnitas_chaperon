<?php
session_start();
include '../class/databaseInt.php';
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
    <link rel="stylesheet" href="css/css2/indjona.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap');
        body
        {
            background-color: #ffefcf;
        }
        html, body
        {
            max-width: 100% !important;
        }
        .barranav
        {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size:contain;
            position:fixed;
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
    </style>
    <title>ADMIN</title>
</head>
<body>
<nav class="navbar navbar-expand-lg barranav">
    <div class="container-fluid">
        <a class="navbar-brand" href="validacionAdmin.php">
            <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
        </a>
        <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-7" style="color: white;">
            <!--<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ordenar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li>
                        <a class="dropdown-item" href="productos_pllevar.php">
                        Comida Rapida
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="comedor.php">Comida Comedor</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="administradores.php">Usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="../class/cerrarsesion.php">Cerrar sesión</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
    <br><br><br>
        <div class='alert alert-warning'><h2>Bienvenido Admin</h2></div>

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
</body>
</html>