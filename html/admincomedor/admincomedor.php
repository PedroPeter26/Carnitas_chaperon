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
            background-image: url(../../img/barranav1.jpg);
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
        .contenido
        {
            margin-top: 30px;
        }
        h5
        {
            font-family: 'Belanosima', cursive;
            font-size: 25px;
        }
        .contenidocards /*El card en sí ne pantalla grande*/
        {
            text-align: justify;
            height: auto;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
        }
        .contenidocards:hover /*Cuando el cursor pasa por encima de los cards*/
        {
            transform: scale(1.05);
        }
        @media screen and (max-width: 576px) /*El card en sí en pantalla pequeña*/
        {
            .contenidocards
            {
                text-align: justify;
                height: auto;
            }
        }
    </style>
    <title>Mesas</title>
</head>
<body style="background-color: #EFE2CF;">
    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <li class="nav-item">
                <a class="nav-link" style="color: white; float:right;" href="">Cerrar sesión</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!--CUERPO-->
    <div class="container contenido">
        <h3 style="font-family: 'Belanosima', cursive; font-size: 40px; text-align: center;">MESAS</h3><hr class="mb-4">
        <!--MESAS-->
        <div class="row">
            <!--Mesas-->
            <?php
                include '../../class/databaseInt.php';
                $db = new Database();
                $db->conectarBD();
                
                $consulta="SELECT * FROM mesas";
                $resultados = $db->seleccionar($consulta);
                $resultados->execute();
                $listamesas=$resultados->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php
                foreach ($listamesas as $mesa)
                {
            ?>
            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                <div class="card contenidocards" style="width: 18rem; background-color: #F9EFE1;">
                    <img src="../../img/mesa.jpeg" class="card-img-top p-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mesa <?php echo $mesa['numero_mesa']; ?></h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                            <a href="productos.php?mesa=<?php echo $mesa['numero_mesa']; ?>" class="btn btn-dark justify-content-md-end" type="submit">Atender</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>