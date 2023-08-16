<<<<<<< Updated upstream
=======
<?PHP
require '../../class/config.php';
include '../../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
>>>>>>> Stashed changes
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
    <title>Reportes diarios</title>
</head>
<body>
    <!--BARRA DE NAV-->
    <?php include "../sidebaradmin.php"; ?>

    <!--CONTENIDO-->
    <div class="content-wrapper" style="background-color: white;">
    <div class="container contenido p-4">
        <h1>REPORTE POR MÉTODO DE PAGO</h1>
        <br>

            <!--FORMULARIO-->
<<<<<<< Updated upstream
            <div class="container">
                <form class="row mb-3" method="post" id="reporteForm">
                    <h4>Ingresa los datos</h4>
=======
            <div class="container rounded-div pt-3 pb-3 pe-4 ps-4 mb-5" style="background-color: #EFEDED;">
            <h3>Ingresa los datos</h3>
                <form class="row mb-3" method="post" id="reporteForm">
>>>>>>> Stashed changes
                    <br>
                    <div class="col-6 col-md-6 col-lg-6 mb-3">
                        <label for="inicio" class="form-label">Fecha inicial:</label>
                        <input type="date" name="inicio" class="form-control" id="inicio" value="<?php echo isset($_POST['inicio']) ? $_POST['inicio'] : ''; ?>" required>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6 mb-3">
                        <label for="fin" class="form-label">Fecha final:</label>
                        <input type="date" name="fin" class="form-control" id="fin" value="<?php echo isset($_POST['fin']) ? $_POST['fin'] : ''; ?>" required>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="pago" class="form-label">Método de pago:</label>
                        <select class="form-select" name="pago" id="pago" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="Efectivo" <?php if (isset($_POST['pago']) && $_POST['pago'] == 'Efectivo') echo 'selected'; ?> >Efectivo</option>
                            <option value="Tarjeta" <?php if (isset($_POST['pago']) && $_POST['pago'] == 'Tarjeta') echo 'selected'; ?> >Tarjeta</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="orden" class="form-label">Orden:</label>
                        <select class="form-select" name="orden" id="orden" required>
                            <option disabled selected>Selecciona una opción</option>
<<<<<<< Updated upstream
                            <option value="online" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'online') echo 'selected'; ?> >Online</option>
                            <option value="comedor" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'comedor') echo 'selected'; ?> >Comedor</option>
                            <option value="pllevar" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'pllevar') echo 'selected'; ?> >Para llevar</option>
                            <option value="todas" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'todas') echo 'selected'; ?> >Todas</option>
                        </select>
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Buscar" name="buscar">
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
=======
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
>>>>>>> Stashed changes
                        <input class="btn btn-dark" type="submit" value="Borrar datos" name="borrar" onclick="setDefaultOption(); setDefaultOption2()">
                    </div>

                </form>
            </div>
<<<<<<< Updated upstream

=======
            
>>>>>>> Stashed changes
            <!--MOSTRAR LOS RESULTADOS DEL REPORTE-->
            <?php
                //condicionamos que si ya se hizo post con el botón de buscar me muestre todo lo demas, en caso contrario, no se mostrará la tabla
                if (!empty($_POST['buscar']))
                {
                    //guardamos en las siguientes variables los datos que se necesitan para hacer la conexion a la bd
<<<<<<< Updated upstream
                    include '../../class/database.php';
                    $db = new Database();
=======
                    $host="localhost";
                    $dbname="bdcarnitaschaperon";
                    $username="root";
                    $password="";
>>>>>>> Stashed changes
                        
                    try
                    {
                        if(!empty($_POST['inicio']) && !empty($_POST['fin']) && !empty($_POST['pago'])) //si si se recibieron se muestra la tabla con los puros encabezados
                        {
                            $fecha_i = $_POST['inicio'];
                            $fecha_f = $_POST['fin'];
                            $pago = $_POST['pago'];
                            //con el obj $conn hacemos la conexion a la bd donde le pasamos las variables que antes establecimos
<<<<<<< Updated upstream
                            $db->conectarDB();
                            $pdo = $db->getConexion();
=======
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
>>>>>>> Stashed changes

                            if (isset($_POST['orden'])) 
                            {
                                $tipoOrden = $_POST['orden'];
                            
                                // Dependiendo del valor seleccionado en el select, llamamos al procedimiento almacenado correspondiente
                                switch ($tipoOrden)
                                {
                                    case 'online':
                                        $sql = "CALL REPORTE_FILTRO_METODO_DE_PAGO_ONLINE('$fecha_i', '$fecha_f', '$pago')";
<<<<<<< Updated upstream
                                        $stmt = $pdo->query($sql);
=======
                                        $stmt = $conn->query($sql);
>>>>>>> Stashed changes
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de pago con <u>" .$pago. "</u></h3>";
                                            
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

                                                $totalDiarioOnline=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['FECHA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
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
                                            
                                            
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                        }

                                        break;
                                    case 'comedor':
                                        $sql = "CALL REPORTE_FILTRO_METODO_DE_PAGO_COMEDOR('$fecha_i', '$fecha_f', '$pago')";
<<<<<<< Updated upstream
                                        $stmt = $pdo->query($sql);
=======
                                        $stmt = $conn->query($sql);
>>>>>>> Stashed changes
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de pago con <u>" .$pago. "</u></h3>";
                                            
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

                                                $totalDiarioComedor=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['FECHA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
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
                                            
                                            
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                        }

                                        break;
                                    case 'pllevar':
                                        $sql = "CALL REPORTE_FILTRO_METODO_DE_PAGO_PLLEVAR('$fecha_i', '$fecha_f', '$pago')";
<<<<<<< Updated upstream
                                        $stmt = $pdo->query($sql);
=======
                                        $stmt = $conn->query($sql);
>>>>>>> Stashed changes
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de pago con <u>" .$pago. "</u></h3>";
                                            
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

                                                $totalDiarioPllevar=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['FECHA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
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
                                            
                                            
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                        }

                                        break;
                                    case 'todas':
                                        $sql = "CALL REPORTE_FILTRO_METODO_DE_PAGO_TODAS('$fecha_i', '$fecha_f', '$pago')";
<<<<<<< Updated upstream
                                        $stmt = $pdo->query($sql);
=======
                                        $stmt = $conn->query($sql);
>>>>>>> Stashed changes
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de pago con <u>" .$pago. "</u></h3>";
                                            
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Fecha</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Orden</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                                $totalAnualTodos=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['FECHA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>" . $registro['TIPO DE ORDEN'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                                        echo "</tr>";

                                                        $totalAnualTodos += (float)$registro['SUBTOTAL DINERO'];
                                                    endwhile;

                                                    //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                                    echo " <tr>
                                                                <td colspan='4'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalAnualTodos, 2) . "<b></td>
                                                            </tr>";

                                                    echo "</tbody>
                                                    </table>";
                                                echo "</div>";
                                            echo "</div>";
                                            
                                            
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-secondary' id='alert1'>No se encontraron registros.</div>";
                                        }
                                            break;
                                        default:
                                        echo "<div class='alert alert-danger' id='alert3'>Elige un tipo de orden.</div>";
                                        break;
                                }

                            }
                            
                        }

                        else
                        {
                            echo "<div class='alert alert-danger' id='alert2'>Elige un rango de fechas.</div>";
                        }
                    }
                    
                    catch (PDOException $e)
                    {
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

                function setDefaultOption2() {
                    // Obtener el elemento select
                    var selectElement2 = document.getElementById('pago');
                    
                    // Establecer la opción predeterminada
                    selectElement2.value = 'Selecciona una opción';
                }

                // Esperar a que el documento esté listo
                $(document).ready(function () {
                    // Asociar el evento click al botón "Borrar datos"
                    $("input[name='borrar']").on("click", function (event) {
                        event.preventDefault(); // Prevenir que el formulario se envíe

                        borrarTabla();
                        eliminarSeleccionCamposYSelect();
                        setDefaultOption2();
                    });
                });
            </script>

    </div>
    </div>

    <?php include "../footeradmin.php"; ?>
</body>
</html>