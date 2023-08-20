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
        .formulario
        {
            padding: 2em;
            font-family: 'Lilita One', sans-serif;
        }
        .cardi
        {
            background: rgb(231,155,190);
            background: linear-gradient(45deg, rgba(231,155,190,0.3757878151260504) 0%, rgba(249,218,167,0.5494572829131652) 72%);
        }
        .cardi input
        {
            background: transparent;
            border:none;
            border-bottom:1px solid;
            border-color: black;
            border-radius: 0;
        }
        .cardi2
        {
            margin-top: 8%;
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
            color: white;
            
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .navbar-brand
            {
                font-size: 100%;
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
                <li><a class="dropdown-item rounded-2" href="perfil_usuario.php">Perfil</a></li>
                <li><a class="dropdown-item" style="color: red;" href="../class/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <!--
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
	    </form>
    </div>
</div>
        -->

        <div class="contenct-wrapper">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center cardi2">
                <div class="col-md-6 col-12 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0 cardi">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1">
                                    <img height="100" id="imag" alt="Carnitas Chaperon" src="../img/logo.png">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Carnitas Chaperon</span></h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-4">
                            <form class="form-horizontal form-simple" action="" method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword1" name="actual" placeholder="Contraseña actual" class="form-control form-control-lg input-lg" required>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword2" name="nueva" placeholder="Contraseña nueva" class="form-control form-control-lg input-lg" required>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword3" name="repite" placeholder="Repite la nueva contraseña" class="form-control form-control-lg input-lg" required>
                                </div>
                            </fieldset>
                            <br>
                            <div class="card-footer text-end">
                            <button type="submit" name="cambiar" class="btn btn-danger" id="cambios" >Guardar</button>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--
    <div class="contenct-wrapper">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center cardi">
                <div class="col-md-8 col-12 p-0" style="margin-top: 8%;">
                    <div class="card border-grey border-lighten-3 m-0 formulario">
                        <H2 class="card-title text-muted pt-2"><span>Tu cuenta</span></H2><br>
                        <div class="card-content">
                            <div class="card-body">
                            <form class="form-horizontal form-simple" action="" method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword1" name="actual" placeholder="Contraseña actual" class="form-control form-control-lg input-lg" required>
                                <button id="ShowPassword1" class="btn btn-danger" type="button" onclick="mostrarPassword1()"> <span class="fa fa-eye-slash icon"></span></button>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword2" name="nueva" placeholder="Contraseña nueva" class="form-control form-control-lg input-lg" required>
                                <button id="ShowPassword2" class="btn btn-danger" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon"></span></button>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <div class="input-group">
                                <input type="password" id="txtPassword3" name="repite" placeholder="Repite la nueva contraseña" class="form-control form-control-lg input-lg" required>
                                <button id="ShowPassword3" class="btn btn-danger" type="button" onclick="mostrarPassword3()"> <span class="fa fa-eye-slash icon"></span></button>
                                </div>
                            </fieldset>
                            <br>
                            <button type="submit" name="cambiar" class="btn btn-danger" id="cambios" >Guardar</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
                        -->
</body>
</html>
