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
    <title>Reportes de cantidad de productos vendidos</title>
</head>
<body>
    <!--BARRA DE NAV-->
    <?php include "../sidebaradmin.php"; ?>

    <!--CONTENIDO-->
    <div class="content-wrapper" style="background-color: white;">
    <div class="container contenido p-4">
        <h1>POR CANTIDAD DE PRODUCTOS SEGÚN FECHA</h1>
        <br>

            <!--FORMULARIO-->
            <div class="container">
                <form class="row mb-3" method="post" id="reporteForm">
                        <h4>Ingresa los datos</h4>
                        <br>
                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="inicio" class="form-label">Fecha:</label>
                        <input type="date" name="inicio" class="form-control" id="inicio" value="<?php echo isset($_POST['inicio']) ? $_POST['inicio'] : ''; ?>" required>
                    </div>

                    <div class="col-6 col-md-6 col-lg-6">
                        <label for="orden" class="form-label">Orden:</label>
                        <select class="form-select" name="orden" id="orden" required>
                            <option disabled selected>Selecciona una opción</option>
                            <option value="online" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'online') echo 'selected'; ?> >Online</option>
                            <option value="comedor" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'comedor') echo 'selected'; ?> >Comedor</option>
                            <option value="para llevar" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'para llevar') echo 'selected'; ?> >Para llevar</option>
                            <option value="todas" <?php if (isset($_POST['orden']) && $_POST['orden'] == 'todas') echo 'selected'; ?> >Todas</option>
                        </select>
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Buscar" name="buscar">
                    </div>

                    <div class="col-12 d-grid gap-2 mt-3">
                        <input class="btn btn-dark" type="submit" value="Borrar datos" name="borrar" onclick="setDefaultOption()">
                    </div>

                </form>
            </div>

            <!--MOSTRAR LOS RESULTADOS DEL REPORTE-->
            <?php
                //condicionamos que si ya se hizo post con el botón de buscar me muestre todo lo demas, en caso contrario, no se mostrará la tabla
                if (!empty($_POST['buscar']))
                {
                    //guardamos en las siguientes variables los datos que se necesitan para hacer la conexion a la bd
                    include '../../class/database.php';
                    $db = new Database();
                        
                    try
                    {
                        if(!empty($_POST['inicio'])) //si si se recibieron se muestra la tabla con los puros encabezados
                        {
                            $fecha_o = $_POST['inicio'];
                            $orden = $_POST['orden'];
                            //con el obj $conn hacemos la conexion a la bd donde le pasamos las variables que antes establecimos
                            $db->conectarDB();
                            $pdo = $db->getConexion();

                            $sql = "CALL PRODUCTO_VENDIDOS_DIARIO('$orden', '$fecha_o')";
                            $stmt = $pdo->query($sql);
                            $num= $stmt->rowCount();

                            // Recuperar los resultados en un array asociativo
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $num = count($resultados);

                            if ($num > 0) //si el numero de registros es mayor a 0, entonces mostramos la tabla
                            {
                                echo "<div class='container' id='tablaContainer'>";
                                echo "<h3 class='mt-5' style='font-family: \"Lilita One\", sans-serif;'> Reporte del <u>" .$fecha_o. "</u></h3>";
                                
                                echo "<div class='table-responsive'>";
                                    echo "<table class='table table-hover' id='tablaRegistros'>
                                    <thead class='table-dark'>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    $totalProductos=0;
                                    
                                        //comenzamos a mostrar los registros que se encontraron con el PA con el while como el foreach
                                        foreach ($resultados as $registro)
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $registro['CATEGORIA'] . "</td>";
                                            echo "<td>" . $registro['PRODUCTO'] . "</td>";
                                            echo "<td>" . $registro['CANTIDAD'] . "</td>";
                                            echo "</tr>";

                                            $totalProductos += (float)$registro['CANTIDAD'];
                                        }

                                        echo " <tr>
                                                    <td colspan='1'></td>
                                                    <td style='text-align:right'><b>PRODUCTOS TOTALES:</b></td>
                                                    <td><b>" .$totalProductos . "</b></td>
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
                        }
                        
                        else
                        {
                            echo "<div class='alert alert-danger' id='alert2'>Llena los campos necesarios para realizar el reporte.</div>";
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

                // Esperar a que el documento esté listo
                $(document).ready(function () {
                    // Asociar el evento click al botón "Borrar datos"
                    $("input[name='borrar']").on("click", function (event) {
                        event.preventDefault(); // Prevenir que el formulario se envíe

                        borrarTabla();
                        eliminarSeleccionCamposYSelect();
                    });
                });
            </script>

    </div>
    </div>

    <?php include "../footeradmin.php"; ?>
</body>
</html>