<?php 
session_start();
include '../class/database.php';
$db=new Database();
$db->ConectarDB();
$pdo = $db->getConexion();

if(empty($_SESSION["idUsuario"]))
{
    header("location:login.php");
}
else
{
    $id = $_SESSION["idUsuario"];
    $sentencia = $pdo->prepare("SELECT * FROM USUARIOS WHERE user_id = '$id'");
    $sentencia->execute();
    $usuarios = $sentencia->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
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
        #contenedor
        {
            width: 40%;
            margin: auto;
        }

        .formulario
        {
            margin-top: 10%;
            margin-bottom: 5%;
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
                width: 80%;
                margin-left: 5%;
            }
        }
    </style>
    <title>MI USUARIO</title>
</head>
<body>
<nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                <li><a class="dropdown-item rounded-2" href="../index.php">Home</a></li>
                <li><a class="dropdown-item" href="historial_de_compras.php">Historial</a></li>
                <li><a class="dropdown-item" style="color: red;" href="../class/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="contenedor">
    <div class="formulario">
        <h2 align="center">DATOS DEL USUARIO</h2>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="control-label" for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $usuarios['nombre'];?>" id="nombre">
            </div>
            <div class="mb-3">
                <label class="control-label" for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $usuarios['apellido'];?>" id="apellido">
            </div>
            <div class="mb-3">
                <label class="control-label" for="user">Nombre de usuario</label>
                <input type="text" name="user" class="form-control" value="<?php echo $usuarios['user'];?>" id="user">
            </div>
            <div class="mb-3">
                <label class="control-label" for="correo">Correo</label>
                <input type="mail" name="correo" class="form-control" value="<?php echo $usuarios['correo'];?>" id="correo">
            </div>
            <div class="mb-3">
                <label class="control-label" for="pass">Contraseña</label>
                <input type="password" name="pass" class="form-control" value="<?php echo $usuarios['password'];?>" id="pass"><br>
            </div>
            <div class="d-grid gap-2">
                <a class="btn btn-lg boton" type="submit" name="editar" href="editarUsuario.php?id=<?php echo $usuarios['user_id']; ?>">Editar datos de la cuenta</a>
                <a href="cambiar_password.php" class="btn btn-lg boton">Cambiar contraseña</a>
            </div>
        </form> 
    </div>
</div>

</body>
</html>