<?php
session_start();
include '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

$pagina_anterior = "perfil_usuario.php";

if (empty($_SESSION["usuario"])) {
    header("Location: login.php");
} else {
    $id = $_GET['id'];
    $sentencia = $pdo->prepare("SELECT user_id, nombre, apellido, user, correo FROM USUARIOS WHERE user_id = '$id'");
    $sentencia->execute();
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
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
        <!--FUENTE-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Bricolage+Grotesque:opsz,wght@10..48,500&family=Lilita+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap');

            html,
            body {
                max-width: 100% !important;
            }

            #contenedor {
                width: 40%;
                margin: auto;
            }

            .formulario {
                margin-top: 30%;
                padding: 2em;
                font-family: 'Lilita One', sans-serif;
                background-color: whitesmoke;
                border-radius: 20px;
            }

            .formulario input {
                background-color: whitesmoke;
            }

            #actu {
                background-color: #D44000;
                font-family: 'Lilita One', sans-serif;
            }

            nav {
                background-color: #212429;
                font-family: 'Bricolage Grotesque', sans-serif;
            }

            a.barra1 {
                text-decoration: none;
                color: gold;
            }

            a.barra1:hover {
                color: goldenrod;
            }

            .contenedorprincipal {
                margin-top: 100px;
                margin-bottom: 40px;
                width: 80%;
                font-family: 'Bricolage Grotesque', sans-serif;
            }

            .navbar-container {
                position: sticky;
                z-index: 2;
                top: 0;
                width: 100%;
                /* Make sure it's above other elements */
            }
        </style>
        <title>Editar usuario</title>
    </head>

    <body>
        <!-- BARRA -->
        <div class="navbar-container" style="position:fixed; width:100%; top: 0;">
            <!--BARRA DE NAV 1-->
            <nav class="navbar navbar-expand-md navbar-light barranav sticky-top">
                <div class="container-fluid" style="width: 90%;">
                    <a class="navbar-brand" style="color: white;" href="index2.php">
                        <img src="../img/logo.png" alt="Logo" width="35" height="50"> <span style="font-family: 'Bricolage Grotesque', sans-serif;">CARNITAS CHAPERON</span>
                    </a>
                    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                            <li><a class="dropdown-item" href="../class/cerrarsesion.php"><b>Cerrar sesión</b></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container contenedorprincipal">
            <a href="<?php echo $pagina_anterior ?>"> <button type="submit" class="btn btn-dark bg-sm"><i class="right fas fa-angle-left" style="color: white; font-size: 25px; text-align:center;"></i></button> </a> <br> <br>
            <div class="row">
                <div class="col-12 col-md-12 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 p-5 rounded" style="background-color: #E5E5E5;">
                    <h2 align="center">Editar usuario</h2>
                    <br>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $usuario['apellido']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="user">Nombre de usuario</label>
                            <input type="text" name="user" class="form-control" value="<?php echo $usuario['user']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="correo">Correo</label>
                            <input type="mail" name="correo" class="form-control" value="<?php echo $usuario['correo']; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <input style="font-family: 'Bricolage Grotesque', sans-serif;" class="btn btn-danger" type="submit" id="actu" name="registro" value="Actualizar cuenta">
                        </div>
                    <?php
                    extract($_POST);

                    $id_user = $usuario['user_id'];
                    if (isset($_POST['registro'])) {
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $user = $_POST['user'];
                        $correo = $_POST['correo'];

                        $db->editarUsuario($nombre, $apellido, $user, $correo, $id_user);
                    }
                }
                $db->desconectarDB();
                    ?>
                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>