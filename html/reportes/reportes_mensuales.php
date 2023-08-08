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
    <style>
        body
        {
            background-color: #FFEFCF;
        }
        .barranav {
            height: 70px;
            background-image: url(../../img/barranav1.jpg);
            background-size: contain;
            width: 100%;
            font-family: 'Lilita One', sans-serif;
            color: white;
        }

        .navbar-brand {
            font-family: 'Lilita One', sans-serif;
            font-size: 30px;
            color: white;
        }

        .navbar-brand:hover {
            color: white;
        }

        a.color {
            color: white;
        }

        a.color:hover {
            color: white;
            font-size: 20px;
        }
        .contenido
        {
            margin-top: 20px;
            width: 70%;
            justify-content: center;
        }

        h1
        {
            font-family: 'Lilita One', sans-serif;
        }
    </style>
    <title>Reportes mensuales</title>
</head>
<body>
    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
        </div>
    </nav>

    <!--CONTENIDO-->
    <div class="container contenido">
        <h1>REPORTE MENSUAL</h1>
        <br>

            <!--FORMULARIO-->
            <div class="container">
                <form class="row mb-3" method="post" id="reporteForm">
                        <h4>Ingresa los datos</h4><br>

                    <div class="col-6 col-md-6 col-lg-4">
                        <label for="mes" class="form-label">Mes:</label>
                        <select class="form-select" name="mes" id="mes" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="Enero" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Enero' ? 'selected' : ''; ?>>Enero</option>
                            <option value="Febrero" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Febrero' ? 'selected' : ''; ?>>Febrero</option>
                            <option value="Marzo" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Marzo' ? 'selected' : ''; ?>>Marzo</option>
                            <option value="Abril" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Abril' ? 'selected' : ''; ?>>Abril</option>
                            <option value="Mayo" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Mayo' ? 'selected' : ''; ?>>Mayo</option>
                            <option value="Junio" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Junio' ? 'selected' : ''; ?>>Junio</option>
                            <option value="Julio" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Julio' ? 'selected' : ''; ?>>Julio</option>
                            <option value="Agosto" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Agosto' ? 'selected' : ''; ?>>Agosto</option>
                            <option value="Septiembre" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Septiembre' ? 'selected' : ''; ?>>Septiembre</option>
                            <option value="Octubre" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Octubre' ? 'selected' : ''; ?>>Octubre</option>
                            <option value="Noviembre" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Noviembre' ? 'selected' : ''; ?>>Noviembre</option>
                            <option value="Diciembre" <?php echo isset($_POST['mes']) && $_POST['mes'] === 'Diciembre' ? 'selected' : ''; ?>>Diciembre</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-6 col-lg-4">
                        <label for="año">Año:</label> <br>
                        <input class="mt-2" style="width: 100%; height: 35px; border:none;" type="number" id="año" name="año" min="2000" max="3000" step="1" placeholder="Ingresa un año" value="<?php echo isset($_POST['año']) ? $_POST['año'] : ''; ?>" required>
                    </div>

                    <div class="offset-3 col-6 offset-md-3 col-md-6 offset-lg-0 col-lg-4">
                        <label for="orden" class="form-label">Orden:</label>
                        <select class="form-select" name="orden" id="orden" required>
                            <option disabled selected>Selecciona una opción</option>
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
                        <input class="btn btn-dark" type="submit" value="Borrar datos" name="borrar" onclick="setDefaultOption(); setDefaultOption2(); setDefaultOption3()">
                    </div>

                </form>
            </div>

            <!--MOSTRAR LOS RESULTADOS DEL REPORTE-->
            <?php
                //condicionamos que si ya se hizo post con el botón de buscar me muestre todo lo demas, en caso contrario, no se mostrará la tabla
                if (!empty($_POST['buscar']))
                {
                    //guardamos en las siguientes variables los datos que se necesitan para hacer la conexion a la bd
                    $host="localhost";
                    $dbname="bdcarnitaschaperon";
                    $username="root";
                    $password="";
                    //en las siguientes variables guardamos lo
                    $mes = $_POST['mes'];
                    $año = $_POST['año'];
                        
                    try
                    {
                        if(!empty($mes) && !empty($año)) //si si se recibieron se muestra la tabla con los puros encabezados
                        {
                            //con el obj $conn hacemos la conexion a la bd donde le pasamos las variables que antes establecimos
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                            if (isset($_POST['orden'])) 
                            {
                                $tipoOrden = $_POST['orden'];
                            
                                // Dependiendo del valor seleccionado en el select, llamamos al procedimiento almacenado correspondiente
                                switch ($tipoOrden)
                                {
                                    case 'online':
                                        $sql = "CALL REPORTE_DINERO_MENSUAL_ONLINE('$mes', '$año')";
                                        $stmt = $conn->query($sql);
                                        $num= $stmt->rowCount();

                                        if ($num > 0)
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" .$mes. " de " .$año. "</u></h3>";                                            
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Categoría</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                                $totalMensualOnline=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['CATEGORIA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                                        echo "</tr>";

                                                        $totalMensualOnline += (float)$registro['SUBTOTAL DINERO'];
                                                    endwhile;

                                                    //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                                    echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalMensualOnline, 2) . "</b></td>
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
                                        $sql = "CALL REPORTE_DINERO_MENSUAL_COMEDOR('$mes', '$año')";
                                        $stmt = $conn->query($sql);
                                        $num= $stmt->rowCount();

                                        if ($num > 0)
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" .$mes. " de " .$año. "</u></h3>";                                            
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Categoría</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                                $totalMensualComedor=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['CATEGORIA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                                        echo "</tr>";

                                                        $totalMensualComedor += (float)$registro['SUBTOTAL DINERO'];
                                                    endwhile;

                                                    //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                                    echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalMensualComedor, 2) . "</b></td>
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
                                        $sql = "CALL REPORTE_DINERO_MENSUAL_PLLEVAR('$mes', '$año')";
                                        $stmt = $conn->query($sql);
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" .$mes. " de " .$año. "</u></h3>";
                                            
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Categoría</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                                $totalMensualPllevar=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['CATEGORIA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['PRECIO'] . "</td>";
                                                        echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                                        echo "</tr>";

                                                        $totalMensualPllevar += (float)$registro['SUBTOTAL DINERO'];
                                                    endwhile;

                                                    //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                                    echo " <tr>
                                                                <td colspan='3'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalMensualPllevar, 2) . "</b></td>
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
                                        $sql = "CALL REPORTE_DINERO_MENSUAL_TODOS('$mes', '$año')";
                                        $stmt = $conn->query($sql);
                                        $num= $stmt->rowCount();

                                        if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                                        {
                                            echo "<div class='container' id='tablaContainer'>";
                                            echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte de <u>" .$mes. " de " .$año. "</u></h3>";                                            
                                            echo "<div class='table-responsive'>";
                                                echo "<table class='table table-hover' id='tablaRegistros'>
                                                <thead class='table-dark'>
                                                    <tr'>
                                                        <th>Categoría</th>
                                                        <th>Producto</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";

                                                $totalMensualTodos=0;
                                                
                                                    //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                                    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)):

                                                        echo "<tr>";
                                                        echo "<td>" . $registro['CATEGORIA'] . "</td>";
                                                        echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                                        echo "<td>$" . $registro['SUBTOTAL DINERO'] . "</td>";
                                                        echo "</tr>";

                                                        $totalMensualTodos += (float)$registro['SUBTOTAL DINERO'];
                                                    endwhile;

                                                    //imprimir el total al final de la tabla, despues de imprimir todos los registros
                                                    echo " <tr>
                                                                <td colspan='1'></td>
                                                                <td style='text-align:right'><b>TOTAL:</b></td>
                                                                <td><b>$" . number_format($totalMensualTodos, 2) . "<b></td>
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
                    var selectElement2 = document.getElementById('año');
                    $('input[type="number"]').prop('value', null);
                    
                }

                function setDefaultOption3() {
                    // Obtener el elemento select
                    var selectElement3 = document.getElementById('mes');
                    selectElement3.value = 'Selecciona una opción';
                    
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

</body>
</html>