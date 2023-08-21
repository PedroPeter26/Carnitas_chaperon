<?php
session_start();
include '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

if(empty($_SESSION['idUsuario']))
{
    header("location: login.php");
}

$sentencia = $pdo->prepare("SELECT * FROM USUARIOS WHERE tipo = 'admin' AND status = 'activo'");
$sentencia->execute();
$usuarios = $sentencia;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css2/indjona.css">
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

        .tabla_u
        {
            margin-top: 8%;
            padding: 2em;
            font-family: 'Lilita One', sans-serif;
            border-radius: 20px;
        }

        #actu
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
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
        .navbar-brand:hover
        {
            color: white;
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
    <title>USUARIOS ADMINISTRADORES</title>
</head>
<body>
<nav class="navbar navbar-expand-lg barranav">
    <div class="container-fluid">
        <a class="navbar-brand" href="validacionAdmin.php">
            <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-7" style="color: white;">
            <!--<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ordenar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li>
                        <a class="dropdown-item" href="productos_pllevar.php">
                        Comida Rapida
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="comedor.php">Comida Comedor</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="administradores.php">Usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="../class/cerrarsesion.php">Cerrar sesión</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="table-responsive tabla_u" style="margin-top: 100px;">
        <h1>
            ADMINISTRADORES &nbsp;
            <a class="btn btn-success btn-lg" href="registrarseAdmin.php">
                Agregar
            </a>
        </h1>
        <br>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($usuarios as $usuario)
                {
                ?>
                    <tr>
                        <td><?php echo $usuario['user']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellido']; ?></td>
                        <td><?php echo $usuario['correo']; ?></td>
                        <td>
                            <a class="btn btn-info" method="POST" href="perfilUsuario_admin.php?id=<?php echo $usuario['user_id']; ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="../class/eliminarUsuario.php?id=<?php echo $usuario['user_id']; ?>">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>