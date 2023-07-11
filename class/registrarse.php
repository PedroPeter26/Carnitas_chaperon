<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .logo 
        {
            width: 50%;
            height:600px;
            margin-right: 10%;
            margin-left: 5%;
            margin-top: 3%;
        }

        .formulario
        {
            margin-top: 5%;
            width: 50%;
        }

        #contenedor
        {
            width: 100%;
            display: inline-flex;
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
    <title>REGISTRARSE</title>
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
        <div class="logo">
            <img src="../img/carnitaschap_logo.png" alt="Carnitas Chaperon" class="cerdito" align="left" width="90%" height="90%">
        </div>
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
                <label class="control-label" for="correo">Correo</label>
                <input type="mail" name="correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="control-label" for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <input class="btn btn-lg boton" type="submit" name="registro" value="Registrarme">
            </div>
        </form> 
    </div>

        <?php 
        include '../class/databaseInt.php';
        $db=new Database();
        $db->ConectarBD();

        extract($_POST);

        if(!empty($_POST['registro']))
        {
                $tipo="client";
                $hash = password_hash($contraseña, PASSWORD_DEFAULT);
                $cadena = "insert into usuarios(nombre, apellido, tipo, correo, password) values('$nombre','$apellido', '$tipo', '$correo','$hash')";
                $db->ejecutarSQL($cadena);

                if($db==true)
                {
                    echo "<br>";
                    echo "<div class='alert alert-success'>¡Cliente registrado exitosamente!</div>";
                    header("refresh:3 ; index.php");
                }
                else
                {
                    echo "<br>";
                    echo "<div class='alert alert-danger'>Hubo un error al registrarse. Intente de nuevo.</div>";
                }
        }

        
        ?>
    </div>
</body>
</html>