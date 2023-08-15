<?PHP
require '../../class/config.php';
include '../../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZqK5f5JSMVRg8M8Ax3n3MCIyJTQUh4nCf2a0X+Hp6z1LyLvJ5m9h5n2mwVU6BvLE" crossorigin="anonymous"></script>

    <?php include "../headadmin.php"; ?>
    <?php include "../footeradmin.php"; ?>
    <title>Usuarios</title>
</head>

<body>
    <!--BARRA DE NAV-->
    <?php include "../sidebaradmin.php"; ?>

    <!-- CONTENIDO -->
    <div class="content-wrapper" style="background-color: white;">
        <div class="container contenido p-4">
            <h1>USUARIOS REGISTRADOS</h1>
            <br>

            <!--FORM PARA BUSCAR USUARIOS POR USER-->
            <div class="container rounded-div pt-3 pb-3 pe-4 ps-4 mb-5" style="background-color: #EFEDED;">
                <h3>Buscar usuarios</h3>
                <form action="usuarios.php" method="POST">
                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6">
                            <label for="user" class="form-label">User: <small>(Solo se busca por user)</small> </label>
                            <input type="text" id="user" name="user" class="form-control" placeholder="Escribe el user del usuario...">
                        </div>
                        <div class="d-grid gap-2 col-3 col-md-3 col-lg-3" style="margin-top: 32px">
                            <input class="btn btn-dark" type="submit" name="buscar" value="Buscar">
                        </div>
                        <div class="d-grid gap-2 col-3 col-md-3 col-lg-3" style="margin-top: 32px">
                            <a href="usuarios.php">
                                <input type="submit" class="btn btn-dark col-12" name="borrar" id="borrar" value="Limpiar" onclick="setDefaultOption2()">
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- MOSTRAR LOS USUARIOS REGISTRADOS O RESULTADOS DE BÚSQUEDA -->
            <?php

            if (!empty($_POST['buscar'])) {
                $userToSearch = $_POST['user'];

                $sql = $pdo->prepare("SELECT * FROM USUARIOS WHERE user = :userToSearch AND tipo <> 'admin'");
                $sql->bindParam(':userToSearch', $userToSearch);
            } else {
                $sql = $pdo->prepare("SELECT * FROM USUARIOS WHERE tipo <> 'admin'");
            }

            $sql->execute();
            $num = $sql->rowCount();

            if ($num > 0) {
                // Muestra la tabla de usuarios o resultados de búsqueda
                echo "<div class='container' id='tablaContainer'>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover' id='tablaRegistros'>
                            <thead class='table-dark'>
                                <tr'>
                                    <th style='width: 25%'>Nombre</th>
                                    <th style='width: 25%'>Apellido</th>
                                    <th style='width: 25%'>User</th>
                                    <th style='width: 25%'>Correo</th>
                                </tr>
                            </thead>
                            <tbody>";

                //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :
                    echo "<tr>";
                    echo "<td style='width: 25%'>" . $registro['nombre'] . "</td>";
                    echo "<td style='width: 25%'>" . $registro['apellido'] . "</td>";
                    echo "<td style='width: 25%'>" . $registro['user'] . "</td>";
                    echo "<td style='width: 25%'>" . $registro['correo'] . "</td>";
                    echo "</tr>";
                endwhile;

                echo "</tbody>
                            </table>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
            }

            $db->desconectarDB();
            ?>
        </div>
    </div>

</body>

</html>