<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--FUENTE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Bricolage+Grotesque:opsz,wght@10..48,500&family=Lilita+One&display=swap" rel="stylesheet">

    <title>Registrar usuario</title>
    <style>
        @media screen and (max-width: 576px) {
            .navbar-brand {
                font-size: 26px;
            }
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

        .inputs {
            background-color: #E5E5E5;
            border: 1px solid black;
        }

        .form-control:focus {
            border-color: black;
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.25);
        }

        .reg {
            text-decoration: none;
            color: goldenrod;
        }
    </style>
</head>

<body>
    <!-- BARRAS -->
    <div class="navbar-container" style="position:fixed;">
        <!-- BARRA 1 -->
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="Logo" width="5%">
                    <span style="font-size: 26px; font-family: 'Bricolage Grotesque', sans-serif;">Carnitas chaperon</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="container contenedorprincipal">
        <div class="row">
            <div class="col-12 col-md-12 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 p-5 rounded" style="background-color: #E5E5E5;">
                <h2 align="center">Regístrate</h2>
                <br>
                <form action="../scripts/guardausuario.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="nombre">Nombre:</label>
                        <input type="text" name="nombre" placeholder="Escribe tu nombre" class="form-control inputs" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="apellido">Apellido:</label>
                        <input type="text" name="apellido" placeholder="Escribe tu apellido" class="form-control inputs" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user">Nombre de usuario:</label>
                        <input type="text" name="user" placeholder="Escribe tu usuario" class="form-control inputs" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="correo">Correo:</label>
                        <input type="mail" name="correo" placeholder="Escribe tu correo" class="form-control inputs" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="contraseña">Contraseña:</label>
                        <input type="password" name="contraseña" placeholder="Escribe tu contraseña" class="form-control inputs" required>
                    </div>
                    <div class="d-grid gap-2 mt-5">
                        <button type="submit" class="btn btn-dark" name="registro">Crear cuenta</button>
                    </div>
                    <div class="col-12 mt-5" style="justify-content: center;">
                        <p style="justify-content: center;">Ya tienes una cuenta? <a href="login.php" class="reg">Inicia sesión</a></p>
                    </div>

                    <?php
                    include '../class/database.php';
                    $db = new database();
                    $db->ConectarDB();
                    $pdo = $db->getConexion();

                    extract($_POST);

                    if (isset($_POST['registro'])) {
                        $db->ExisteUsuario($user);
                    }
                    $db->desconectarDB();
                    ?>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>