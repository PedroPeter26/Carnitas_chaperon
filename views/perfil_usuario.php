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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            background: rgb(231,180,155);
            background: linear-gradient(45deg, rgba(231,180,155,0.5858718487394958) 0%, rgba(249,245,167,0.6446953781512605) 72%);
            padding: 2em;
        }

        .formulario input
        {
            background-color: inherit;
            border:none;
            border-bottom:1px solid;
            border-color: black;
            border-radius: 0;
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
            color: white;
            
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

    <!--
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
                <a class="btn btn-lg btn-danger"  name="elimina" href="../class/eliminarUsuario.php?id=<?php echo $id ?>">Eliminar cuenta</a>
            </div>
        </form> 
    </div>
</div>
-->

<div class="contenct-wrapper">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center cardi">
                <div class="col-md-8 col-12 p-0" style="margin-top: 8%;">
                    <div class="card border-grey border-lighten-3 m-0 formulario">
                        <H2 class="card-title text-muted pt-2"><span>Tu cuenta</span></H2><br>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" action="" method="POST">
                                    <fieldset class="form-group position-relative">
                                        <label class="control-label" for="nombre">Nombre</label>
                                        <input type="text" name="nombre" placeholder="Nombre(s)" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['nombre'];?>" required>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                        <label class="control-label" for="apellido">Apellido</label>
                                        <input type="text" name="apellido" placeholder="Apellidos" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['apellido'];?>" required>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                        <label class="control-label" for="user">Usuario</label>
                                        <input type="text" name="user" placeholder="Nombre de usuario" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['user'];?>" required>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative">
                                        <label class="control-label" for="correo">Correo</label>
                                        <input type="text" name="correo" placeholder="Correo" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['correo'];?>" required>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <label class="control-label" for="pass">Contraseña</label>
                                        <input type="password" name="pass" placeholder="Contraseña" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['password'];?>" required>
                                    </fieldset>
                                    <br>
                                    <BR>
                                    <div>
                                    <button class="btn btn-lg boton" type="button" name="editar" data-bs-toggle="modal" data-bs-target="#actualizarcuenta" style="margin-right: 2%;">Editar datos de la cuenta</button>
                                    <a href="cambiar_password.php" class="btn btn-lg boton" style="margin-right: 2%;">Cambiar contraseña</a>
                                    <button class="btn btn-lg btn-danger" name="elimina" href="../class/eliminarUsuario.php?id=<?php echo $id ?>" style="margin-right: 2%;">Eliminar cuenta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal: datos del usuario -->
        <div class="modal fade" id="actualizarcuenta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="actualizarcuentaLabel" aria-hidden="true" style="z-index: 1400;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="actualizarcuentaLabel">Actualizar datos de la cuenta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-simple" action="" method="POST">
                            <fieldset class="form-group position-relative">
                                <label class="control-label" for="nombre">Nombre</label>
                                <input type="text" name="nombre" placeholder="Nombre(s)" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['nombre'];?>" required>
                            </fieldset>
                            <fieldset class="form-group position-relative">
                                <label class="control-label" for="apellido">Apellido</label>
                                <input type="text" name="apellido" placeholder="Apellidos" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['apellido'];?>" required>
                            </fieldset>
                            <fieldset class="form-group position-relative">
                                <label class="control-label" for="user">Usuario</label>
                                <input type="text" name="user" placeholder="Nombre de usuario" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['user'];?>" required>
                            </fieldset>
                            <fieldset class="form-group position-relative">
                                <label class="control-label" for="correo">Correo</label>
                                <input type="text" name="correo" placeholder="Correo" class="form-control form-control-lg input-lg" value="<?php echo $usuarios['correo'];?>" required>
                            </fieldset>
                            <br>
                            <button type="submit" class="btn btn-danger" name="registro">Guardar</button>
                            <?php 
                            extract($_POST);

                            $id_user = $usuarios['user_id']; 
                            if(isset($_POST['registro']))
                            {
                                $nombre = $_POST['nombre'];
                                $apellido = $_POST['apellido'];
                                $user = $_POST['user'];
                                $correo = $_POST['correo'];

                                $db->editarUsuario($nombre, $apellido, $user, $correo, $id_user);
                                header("refresh:1;");
                            }
                            $db->desconectarDB();
                            ?>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div> <!-- div de modal: datos del usuario-->
</div> <!-- se cierra el primer div -->
</body>
</html>