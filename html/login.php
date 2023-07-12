<?php 
if(empty($_SESSION['id']))
{
    header('../class/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        #contenedor
        {
            width: 50%;
            margin: auto;
        }

        .formulario
        {
            margin-top: 15%;
        }

        .boton 
        {
            background-color: #D2691E;
        }

        body
        {
            margin-top: 60px;
            background-color: whitesmoke;
        }

        .barranav
        {
            display: flex;
            height: 70px;
            background-color: #E59866;
            align-items: center;
            justify-content: center;
            font-family: fantasy;
            font-size: 30px;
            color: brown;
            text-shadow: 2px 2px white;
            margin: auto;
            position:fixed;
            top:0;
            width: 100%;
            z-index: 1200;
        }

        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .barranav
            {
                font-size: 26px;
            }
        }
    </style>
    <title>INICIA SESION</title>
</head>
<body>
    <!--BARRA DE NAV 1-->
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand " href="index.html">
        <img src="../img/logo.png" alt="Logo" width="35" height="50">&nbsp; &nbsp;&nbsp;CARNITAS EL CHAPERON
        </a>
        </div>
    </nav>
    <div class="container" id="contenedor">
    <div class="formulario">
        <h2 align="center">INICIAR SESION</h2>
        <hr>
        <form action="" method="POST">
            <?php 
            include '../class/bd.php';
            include '../class/iniciosesion.php'
            ?>
            <div class="mb-3">
                <label class="control-label" for="usuario">Usuario</label>
                <input type="mail" name="usuario" placeholder="Escribe el correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" placeholder="Escribe la contraseña" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <input class="btn btn-lg boton" type="submit" name="inicio" value="Iniciar sesion">
            </div>
        </form> 
    </div>   
    </div>

</body>
</html>