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
    <?php include "../headadmin.php"; ?>

    <title>Reportes según tipo de comida</title>
</head>

<body>
    <!--BARRA DE NAV-->
    <?php include "../sidebaradmin.php"; ?>

    <!--CONTENIDO-->
    <div class="content-wrapper" style="background-color: white;">
        <div class="container contenido p-4">
            <h1>POR TIPO DE COMIDA</h1>
            <br>

            <!--FORMULARIO-->
            <div class="container">
                <form class="row mb-3" method="post" id="reporteForm">
                    <h4>Ingresa los datos</h4>
                    <br>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="tipocomida" class="form-label">Comida:</label>
                        <select class="form-select" name="tipocomida" id="tipocomida" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="Carnes" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Carnes') echo 'selected'; ?>>Carnes</option>
                            <option value="Tacos" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Tacos') echo 'selected'; ?>>Tacos</option>
                            <option value="Lonches" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Lonches') echo 'selected'; ?>>Lonches</option>
                            <option value="Gringas" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Gringas') echo 'selected'; ?>>Gringas</option>
                            <option value="Chicharrones" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Chicharrones') echo 'selected'; ?>>Chicharrones</option>
                            <option value="Paquetes" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Paquetes') echo 'selected'; ?>>Paquetes</option>
                            <option value="Bebidas" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Bebidas') echo 'selected'; ?>>Bebidas</option>
                            <option value="Complementos" <?php if (isset($_POST['tipocomida']) && $_POST['tipocomida'] == 'Complementos') echo 'selected'; ?>>Complementos</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="orden" class="form-label">Orden:</label>
                        <select class="form-select" name="orden" id="orden" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="online" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'online') echo 'selected'; ?>>Online</option>
                            <option value="comedor" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'comedor') echo 'selected'; ?>>Comedor</option>
                            <option value="pllevar" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'pllevar') echo 'selected'; ?>>Para llevar</option>
                            <option value="todas" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'todas') echo 'selected'; ?>>Todas</option>
                        </select>
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Buscar" name="buscar">
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Borrar datos" name="borrar" onclick="setDefaultOption(); setDefaultOption2()">
                    </div>

                </form>
            </div>

            <!--MOSTRAR LOS RESULTADOS DEL REPORTE-->
            <?php
            //condicionamos que si ya se hizo post con el botón de buscar me muestre todo lo demas, en caso contrario, no se mostrará la tabla
            if (!empty($_POST['buscar'])) {
                //guardamos en las siguientes variables los datos que se necesitan para hacer la conexion a la bd                        
                try {
                    if (!empty($_POST['tipocomida'])) //si si se recibieron se muestra la tabla con los puros encabezados
                    {
                        $tipoComida = $_POST['tipocomida'];

                        //con el obj $conn hacemos la conexion a la bd donde le pasamos las variables que antes establecimos

                        if (isset($_POST['orden'])) {
                            $tipoOrden = $_POST['orden'];

                            // Dependiendo del valor seleccionado en el select, llamamos al procedimiento almacenado correspondiente
                            switch ($tipoOrden) {
                                case 'online':
                                    $sql = "CALL REPORTE_FILTRO_COMIDA_ONLINE('$tipoComida')";
                                    $sql = $pdo->prepare("CALL REPORTE_FILTRO_COMIDA_ONLINE('$tipoComida')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" . $tipoComida . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Fecha</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalSegunComidaOnline = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td>" . $registro['FECHA'] . "</td>";
                                            echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalSegunComidaOnline += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalSegunComidaOnline, 2) . "</b></td>
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
                                    $sql = $pdo->prepare("CALL REPORTE_FILTRO_COMIDA_COMEDOR('$tipoComida')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" . $tipoComida . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Fecha</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalSegunComidaComedor = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td>" . $registro['FECHA'] . "</td>";
                                            echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalSegunComidaComedor += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalSegunComidaComedor, 2) . "</b></td>
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
                                    $sql = $pdo->prepare("CALL REPORTE_FILTRO_COMIDA_PLLEVAR('$tipoComida')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" . $tipoComida . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Fecha</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalSegunComidaPllevar = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td>" . $registro['FECHA'] . "</td>";
                                            echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td>$" . $registro['PRECIO'] . "</td>";
                                            echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                            echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalSegunComidaPllevar += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalSegunComidaPllevar, 2) . "</b></td>
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
                                    $sql = $pdo->prepare("CALL REPORTE_FILTRO_COMIDA_TODAS('$tipoComida')");
                                    $sql->execute();
                                    $num = $sql->rowCount();

                                    if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                    {
                                        echo "<div class='container' id='tablaContainer'>";
                                        echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" . $tipoComida . "</u></h3>";

                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Fecha</th>
                                                        <th>Producto</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                        $totalSegunComidaTodos = 0;

                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        while ($registro = $sql->fetch(PDO::FETCH_ASSOC)) :

                                            echo "<tr>";
                                            echo "<td>" . $registro['FECHA'] . "</td>";
                                            echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                            echo "</tr>";

                                            $totalSegunComidaTodos += (float)$registro['SUBTOTAL DINERO'];
                                        endwhile;

                                        //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                        echo " <tr>
                                                                <td colspan='1'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalSegunComidaTodos, 2) . "</b></td>
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
                    } else {
                        echo "<div class='alert alert-danger' id='alert2'>Llena los campos requeridos.</div>";
                    }
                } catch (PDOException $e) {
                    echo ("Error occurred:" . $e->getMessage());
                }
            }
            $db->desconectarDB();

            ?>

            <!--SCRIPT PARA ELIMINAR LOS DATOS CUANDO SE PRESIONE BORRAR-->
            <script>
                // Función para borrar la tabla con los registros
                function borrarTabla() {
                    $("#tablaContainer").empty();
                }

                function setDefaultOption() {
                    // Obtener el elemento select
                    var selectElement = document.getElementById('tipocomida');

                    // Establecer la opción predeterminada (puedes cambiar 'Carnes' por la opción que quieras)
                    selectElement.value = 'Selecciona una opción';
                }

                function setDefaultOption2() {
                    // Obtener el elemento select
                    var selectElement2 = document.getElementById('orden');

                    // Establecer la opción predeterminada (puedes cambiar 'Carnes' por la opción que quieras)
                    selectElement2.value = 'Selecciona una opción';
                }

                // Esperar a que el documento esté listo
                $(document).ready(function() {
                    // Asociar el evento click al botón "Borrar datos"
                    $("input[name='borrar']").on("click", function(event) {
                        event.preventDefault(); // Prevenir que el formulario se envíe

                        borrarTabla();
                    });
                });
            </script>

        </div>
    </div>

    <?php include "../footeradmin.php"; ?>
</body>

</html>