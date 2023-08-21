<?php
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
    <?php include '../headadmin.php'; ?>
    <title>Reporte diario</title>
</head>

<body>
    <!--BARRA DE NAV-->
    <?php include '../sidebaradmin.php'; ?>

    <!--CONTENIDO-->
    <div class="content-wrapper" style="background-color: white;">
        <div class="container contenido p-4">
            <h1>REPORTE DIARIO</h1>
            <br>

            <!--FORMULARIO-->
            <div class="container rounded-div pt-3 pb-3 pe-4 ps-4 mb-5" style="background-color: #EFEDED;">
                <h3>Ingresa los datos</h3>
                <form class="row mb-3" method="post" id="reporteForm">
                    <br>
                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="inicio" class="form-label">Fecha:</label>
                        <input type="date" name="inicio" class="form-control" id="inicio" value="<?php echo isset($_POST['inicio']) ? $_POST['inicio'] : ''; ?>" required>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="orden" class="form-label">Orden: <small>(Tipo de orden)</small> </label> 
                        <select class="form-select" name="orden" id="orden" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="online" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'online') echo 'selected'; ?>>Online</option>
                            <option value="comedor" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'comedor') echo 'selected'; ?>>Comedor</option>
                            <option value="pllevar" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'pllevar') echo 'selected'; ?>>Para llevar</option>
                            <option value="todas" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'todas') echo 'selected'; ?>>Todas</option>
                        </select>
                    </div>

                    <div class="col-6 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Buscar" name="buscar">
                    </div>

                    <div class="col-6 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Borrar datos" name="borrar" onclick="setDefaultOption()">
                    </div>

                </form>
            </div>

            <!--MOSTRAR LOS RESULTADOS DEL REPORTE-->
            <?php
            if (!empty($_POST['buscar'])) {
                try {
                    if (!empty($_POST['inicio']))
                    {
                        $fecha_o = $_POST['inicio'];

                        if (isset($_POST['orden'])) {
                            $tipoOrden = $_POST['orden'];

                            // Dependiendo del valor seleccionado en el select, llamamos al procedimiento almacenado correspondiente
                            switch ($tipoOrden) {
                                case 'online':
                                    $sql = $pdo->prepare("CALL REPORTE_DINERO_DIARIO_ONLINE('$fecha_o')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte del <u>" . $fecha_o . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th style='width: 20%;'>Categoría</th>
                                                        <th style='width: 20%;'>Producto</th>
                                                        <th style='width: 20%;'>Precio</th>
                                                        <th style='width: 20%;'>Cantidad</th>
                                                        <th style='width: 20%;'>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalDiarioOnline = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td  style='width: 20%;'>" . $registro['CATEGORIA'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalDiarioOnline += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalDiarioOnline, 2) . "</b></td>
                                                            </tr>";

                                        echo "</tbody>
                                                    </table>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                    }

                                    break;
                                case 'comedor':
                                    $sql = $pdo->prepare("CALL REPORTE_DINERO_DIARIO_COMEDOR('$fecha_o')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte del <u>" . $fecha_o . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th style='width: 20%;'>Categoría</th>
                                                        <th style='width: 20%;'>Producto</th>
                                                        <th style='width: 20%;'>Precio</th>
                                                        <th style='width: 20%;'>Cantidad</th>
                                                        <th style='width: 20%;'>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalDiarioComedor = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td style='width: 20%;'>" . $registro['CATEGORIA'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalDiarioComedor += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalDiarioComedor, 2) . "</b></td>
                                                            </tr>";

                                        echo "</tbody>
                                                    </table>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                    }

                                    break;
                                case 'pllevar':
                                    $sql = $pdo->prepare("CALL REPORTE_DINERO_DIARIO_PLLEVAR('$fecha_o')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte del <u>" . $fecha_o . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th style='width: 20%;'>Categoría</th>
                                                        <th style='width: 20%;'>Producto</th>
                                                        <th style='width: 20%;'>Precio</th>
                                                        <th style='width: 20%;'>Cantidad</th>
                                                        <th style='width: 20%;'>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalDiarioPllevar = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td style='width: 20%;'>" . $registro['CATEGORIA'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td style='width: 20%;'>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalDiarioPllevar += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalDiarioPllevar, 2) . "</b></td>
                                                            </tr>";

                                        echo "</tbody>
                                                    </table>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                    }

                                    break;
                                case 'todas':
                                    $sql = $pdo->prepare("CALL REPORTE_DINERO_DIARIO_TODOS('$fecha_o')");
                                    $sql->execute();
                                    $num = $sql->rowCount();


                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte del <u>" . $fecha_o . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th style='width: 20%;'>Categoría</th>
                                                        <th style='width: 25%;'>Producto</th>
                                                        <th style='width: 15%;'>Orden</th>
                                                        <th style='width: 10%;'>Precio</th>
                                                        <th style='width: 10%;'>Cantidad</th>
                                                        <th style='width: 20%;'>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalDiarioTodos = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td style='width: 20%;'>" . $registro['CATEGORIA'] . "</td>"; 
                                            echo "<td style='width: 25%;'>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td style='width: 15%;'>" . $registro['ORDEN'] . "</td>";
                                            echo "<td style='width: 10%;'>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td style='width: 10%;'>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td style='width: 20%;'>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalDiarioTodos += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                    <td colspan='5' style='text-align:right'><b>TOTAL:</b></td>
                                                    <td><b>$" . number_format($totalDiarioTodos, 2) . "<b></td>
                                                </tr>";

                                        echo "</tbody>
                                                    </table>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                    }
                                    break;
                                default:
                                    echo "<div class='alert alert-danger' id='alert3'>Elige un tipo de orden.</div>";
                                    break;
                            }
                        }
                        else {
                        echo "<div class='alert alert-danger' id='alert2'>Elige un tipo de orden.</div>";
                        }
                    }
                } catch (PDOException $e) {
                    echo ("Error occurred:" . $e->getMessage());
                }
            }
            ?>

            <!--SCRIPT PARA ELIMINAR LOS DATOS CUANDO SE PRESIONE BORRAR-->
            <script>
                // Función para borrar la tabla con los registros
                function borrarTabla() {
                    $("#tablaContainer").empty();
                }

                // Función para eliminar la selección de los campos de fechas y restablecer el select
                function eliminarSeleccionCamposYSelect() {
                    $('input[type="date"]').prop('value', null);
                }

                function setDefaultOption() {
                    // Obtener el elemento select
                    var selectElement = document.getElementById('orden');

                    // Establecer la opción predeterminada
                    selectElement.value = 'Selecciona una opción';
                }

                // Función para ocultar los divs con los IDs "alert3" y "alert2"
                function ocultarAlertas() {
                    $("#alert3").hide();
                    $("#alert2").hide();
                }

                // Esperar a que el documento esté listo
                $(document).ready(function() {
                    // Asociar el evento click al botón "Borrar datos"
                    $("input[name='borrar']").on("click", function(event) {
                        event.preventDefault(); // Prevenir que el formulario se envíe

                        borrarTabla();
                        eliminarSeleccionCamposYSelect();
                        ocultarAlertas();
                    });
                });
            </script>

        </div>
    </div>

    <?php include '../footeradmin.php'; ?>

</body>
</html>