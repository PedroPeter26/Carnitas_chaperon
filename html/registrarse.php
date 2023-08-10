<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
        #contenedor
        {
            width: 40%;
            margin: auto;
        }

        .formulario
        {
            margin-top: 18%;
            padding: 2em;
            font-family: 'Lilita One', sans-serif;
            background-color: whitesmoke;
            border-radius: 20px;
        }

        .formulario input
        {
            background-color: whitesmoke;
        }

        .boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
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
            
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .navbar-brand
            {
                font-size: 26px;
            }

            #contenedor
            {
                width: 80%;
                margin: auto;
            }
        }
        @media screen and (min-width: 577px) /*Pantalla pequeña*/
        {
            #contenedor
            {
                width: 60%;
                margin: auto;
            }
        }
        @media screen and (min-width: 900px) /*Pantalla pequeña*/
        {
            #contenedor
            {
                width: 40%;
                margin: auto;
            }
        }
    </style>
    <title>REGISTRARSE</title>
</head>
<body>
    <!--BARRA DE NAV 1-->
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand " href="../index.php">
        <img src="../img/logo.png" alt="Logo" width="35" height="50">&nbsp; &nbsp;&nbsp;CARNITAS EL CHAPERON
        </a>
        </div>
    </nav>
    <div class="container" id="contenedor">
    <div class="formulario">
        <h2 align="center">REGISTRARSE</h2>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="user">Nombre de usuario</label>
                <input type="text" name="user" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="correo">Correo</label>
                <input type="mail" name="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="pass">Contraseña</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-lg boton" type="submit" name="registro">Crear Cuenta</button>
            </div>
            <?php
                include '../class/database.php';
                $db=new Database();
                $db->ConectarDB();

                extract($_POST);

                if(isset($_POST['registro']))
                {
                    $db->ExisteUsuario($user,$pass);
                }
                $db->desconectarDB();
            ?>
        </form> 
    </div>
    </div>
</body>
</html>