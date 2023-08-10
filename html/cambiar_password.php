<?php
session_start();
include '../class/database.php';
$db=new Database();
$db->ConectarDB();
$pdo = $db->getConexion();

if(empty($_SESSION['usuario']))
{
 header("location: login.php");
}

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
            margin-top: 15%;
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
        #cambios
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
                width: 60%;
                margin: auto;
            }
        }
    </style>
    <title>MI USUARIO</title>
</head>
<body>
    <!--BARRA DE NAV 1-->
    <!--
    <nav class="barranav">
        <div class="container-fluid">
        <a class="navbar-brand " href="../index.php">
        <img src="../img/logo.png" alt="Logo" width="35" height="50">&nbsp; &nbsp;&nbsp;CARNITAS EL CHAPERON
        </a>
        </div>
    </nav>-->
    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-9" style="color: white;">
                <!--
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="perfil_usuario.php">Regresar</a>
                </li>
                <?php
                    if (isset($_SESSION["usuario"])) 
                    {
                        echo "
                        <li class='nav-item dropdown'>
                            <button class='btn dropdown-toggle' style='color: white;' href='#' id='navbarScrollingDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Usuario
                            </button>
                            <ul class='dropdown-menu' aria-labelledby='navbarScrollingDropdown'>
                                <li>
                                    <a class='dropdown-item' href='../class/cerrarsesion.php'>Cerrar sesión</a>
                                </li>
                            </ul>
                        </li>";
                    } 
                    else 
                    {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' style='color: white;' href='login.php'>Iniciar sesión</a>";
                        echo "</li>";
                    }
                ?>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="contenedor">
    <div class="formulario">
        <h2 align="center">CAMBIO DE CONTRASEÑA</h2>
        <hr>
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
            if(isset($_POST['cambiar']))
            {
                $actual = $_POST['actual'];
                $nueva = $_POST['nueva'];
                $repite = $_POST['repite'];

                if(strlen($nueva) < 8)
                {
                    echo'
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña nueva debe tener al menos 8 caracteres.
                    </div>';
                    return;
                }

                if($nueva !== $repite) 
                {
                    echo'
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña repetida debe coincidir con la nueva.
                    </div>';
                    return;
                }

                $passwordVerificada = $db->verificarPassword($idUsuario, $actual);
                
                if(!$passwordVerificada)
                {
                    echo'
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

</body>
</html>
