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
        .formulario
        {
            font-family: 'Lilita One', sans-serif;
        }
        .boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
            width: 100%;
        }
        .cardi
        {
            margin-top: 3%;
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
                font-size: 100%;
            }

            #contenedor
            {
                width: 90%;
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
    <!--
<nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="../index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            </div>
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
        </form> 
    </div>
    <br><br>
    </div>
            -->
    <div class="contenct-wrapper">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center cardi">
                <div class="col-md-4 col-12 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <h5 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Crea una cuenta para ordenar en la página de Carnitas Chaperon</span></h5><br>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" action="" method="POST">
                                    <fieldset class="form-group position-relative">
                                    <div class="input-group">
                                        <input type="text" name="nombre" placeholder="Nombre(s)" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                    <div class="input-group">
                                        <input type="text" name="apellido" placeholder="Apellidos" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                    <div class="input-group">
                                        <input type="text" name="user" placeholder="Nombre de usuario" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                    <div class="input-group">
                                        <input type="text" name="correo" placeholder="Correo" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative has-icon-left">
                                    <div class="input-group">
                                        <input type="password" name="pass" placeholder="Contraseña" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <button class="btn btn-lg btn-block boton formulario" type="submit" name="registro">
                                        Crear cuenta
                                    </button>
                                    <div>
                                        <br>
                                        <p class="formulario">¿Ya tienes una cuenta?  <a href="login.php" align="center" style="color:brown; text-decoration: none;">Iniciar sesión</a></p>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>