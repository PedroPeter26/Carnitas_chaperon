<?php
session_start();
include '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

if (empty($_SESSION['usuario'])) {
    header("Location: login.php");
}
$pagina_anterior = "perfil_usuario.php";

$idUsuario = $_SESSION['idUsuario'];
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
            margin-top: 15%;
            margin-bottom: 5%;
            padding: 2em;
            background-color: whitesmoke;
            border-radius: 20px;
        }

        .formulario input {
            background-color: whitesmoke;
        }

        #cambios {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
        }

        @media screen and (max-width: 576px) {
            #contenedor {
                width: 90%;
                margin: auto;
            }
        }

        @media screen and (min-width: 577px) {
            #contenedor {
                width: 60%;
                margin: auto;
            }
        }

        @media screen and (min-width: 900px) {
            #contenedor {
                width: 60%;
                margin: auto;
            }
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
            margin-top: 120px;
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
    <title>Cambiar contraseña</title>
</head>

<body>
    <!-- BARRA -->
    <div class="navbar-container" style="position:fixed; width:100%; top: 0;">
        <!--BARRA DE NAV 1-->
        <nav class="navbar navbar-expand-md navbar-light barranav sticky-top">
            <div class="container-fluid" style="width: 90%;">
                <a class="navbar-brand" style="color: white;" href="index.php">
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
                <h2 align="center">Cambiar contraseña</h2>
                <br>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="actual" class="form-label">Contraseña actual</label>
                        <input type="password" name="actual" class="form-control" id="actual" placeholder="Escribe tu contraseña actual" required>
                    </div>
                    <div class="mb-3">
                        <label for="nueva" class="form-label">Contraseña nueva</label>
                        <input type="password" name="nueva" class="form-control" id="nueva" placeholder="Escribe tu contraseña nueva" required>
                    </div>
                    <div class="mb-3">
                        <label for="repite" class="form-label">Repite la nueva contraseña</label>
                        <input type="password" name="repite" class="form-control" id="repite" placeholder="Retipe la contraseña nueva" required>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" name="cambiar" class="btn btn-lg" id="cambios" value="Cambiar contraseña">
                    </div>
                    <?php
                    if (isset($_POST['cambiar'])) {
                        $actual = $_POST['actual'];
                        $nueva = $_POST['nueva'];
                        $repite = $_POST['repite'];

                        if (strlen($nueva) < 8) {
                            echo '
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña nueva debe tener al menos 8 caracteres.
                    </div>';
                            return;
                        }

                        if ($nueva !== $repite) {
                            echo '
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña repetida debe coincidir con la nueva.
                    </div>';
                            return;
                        }

                        $passwordVerificada = $db->verificarPassword($idUsuario, $actual);

                        if (!$passwordVerificada) {
                            echo '
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña actual es incorrecta.
                    </div>';
                            return;
                        }

                        $db->cambiarPassword($idUsuario, $repite);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>