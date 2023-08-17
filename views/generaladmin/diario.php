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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas diarias</title>
    <?php include '../headadmin.php'; ?>
    <?php include '../footeradmin.php'; ?>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <?php
    try {
        // Configura PDO para reportar errores
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Calcular inicio y fin de la semana actual
        $today = date('Y-m-d');
        $startOfWeek = date('Y-m-d', strtotime('this week', strtotime($today)));
        $endOfWeek = date('Y-m-d', strtotime('next week', strtotime($today)) - 1);

        // Consulta los datos de la base de datos
        $sql = "SELECT T.nombre AS categoria, COUNT(DO.producto) AS total_ventas
                    FROM DETALLE_ORDEN DO
                    INNER JOIN PRODUCTOS P ON DO.producto = P.producto_id
                    INNER JOIN TIPOS T ON P.tipo = T.id_tipo
                    INNER JOIN ORDENES O ON DO.orden = O.orden_id
                    WHERE O.status='Finalizado' AND WEEK(O.fecha) = WEEK(NOW())
                    GROUP BY T.nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $categorias = [];
        $ventas = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categorias[] = $row["categoria"];
            $ventas[] = $row["total_ventas"];
        }

        // Validar si hay datos de ventas para mostrar la gráfica
        $showChart = count($categorias) > 0;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <div class="content-wrapper">
        <br>

        <!--CARDS-->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!--VENTAS ONLINE-->
                    <div class="col-4">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #CCD1D1;">
                            <div class="inner">
                                <?php

                                $sql = $pdo->prepare("CALL DINERO_DIARIO_ONLINE(@TotalDiarioOnline);");
                                $sql->execute();
                                $r = $pdo->query("SELECT @TotalDiarioOnline as 'Total Diario Online';")->fetch(PDO::FETCH_ASSOC);
                                $totalDiarioOnline = $r['Total Diario Online'];
                                if ($totalDiarioOnline == null) {
                                    echo "<h3>$0.00</h3>";
                                } else {
                                    echo "<h3>$ " . $totalDiarioOnline . "</h3>";
                                }
                                ?>
                                <p>Ventas online</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- VENTAS COMEDOR -->
                    <div class="col-4">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #B2BABB;">
                            <div class="inner">
                                <?php
                                $sql = $pdo->prepare("CALL DINERO_DIARIO_COMEDOR(@TotalDiarioComedor);");
                                $sql->execute();
                                $r = $pdo->query("SELECT @TotalDiarioComedor as 'Total Diario Comedor';")->fetch(PDO::FETCH_ASSOC);
                                $totalDiarioComedor = $r['Total Diario Comedor'];
                                if ($totalDiarioComedor == null) {
                                    echo "<h3>$0.00</h3>";
                                } else {
                                    echo "<h3>$ " . $totalDiarioComedor . "</h3>";
                                }
                                $conn = null; //Termina la conexión con la bd
                                ?>
                                <p>Ventas comedor</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- VENTAS PARA LLEVAR -->
                    <div class="col-4">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #99A3A4;">
                            <div class="inner">
                                <?php

                                $sql = $pdo->prepare("CALL DINERO_DIARIO_PLLEVAR(@TotalDiarioPllevar);");
                                $sql->execute();
                                $r = $pdo->query("SELECT @TotalDiarioPllevar as 'Total Diario Para llevar';")->fetch(PDO::FETCH_ASSOC);
                                $totalDiarioPllevar = $r['Total Diario Para llevar'];
                                if ($totalDiarioPllevar == null) {
                                    echo "<h3>$0.00</h3>";
                                } else {
                                    echo "<h3>$ " . $totalDiarioPllevar . "</h3>";
                                }
                                $conn = null; //Termina la conexión con la bd
                                ?>

                                <p>Ventas para llevar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <!--GRAFICA DE BARRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAS-->

        <!--CARD DE LA GRÁFICA DE BARRAS-->
        <div class="col-12 col-md-12 col-lg-12" id="barras">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfica de ventas diarias</h3>
                </div>
                <div class="card-body">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div><br>

        <!--CONSULTA A LA BD DE BARRAS-->
        <?php
        try {
            // Configura PDO para reportar errores
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta los datos de la base de datos
            try {
                // Crear un arreglo con los nombres de los días de la semana en español
                $nombreDias = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                // Llenar los arreglos con valores por defecto de 0 para todos los días de la semana
                $etiquetas = $nombreDias;
                $datos = array_fill(0, count($nombreDias), 0);

                $sql = "SELECT DAYNAME(fecha) AS dia_semana, COUNT(orden_id) AS total
                                    FROM ORDENES
                                    WHERE status = 'Finalizado'
                                    AND YEARWEEK(fecha) = YEARWEEK(CURDATE())
                                    GROUP BY dia_semana;";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dia_semana = $row["dia_semana"];
                    $total = $row["total"];

                    // Encontrar el índice del día de la semana en el arreglo
                    $indice = array_search($dia_semana, $nombreDias);

                    // Actualizar el total en el arreglo de datos
                    $datos[$indice] = $total;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            // Arreglo de traducción de nombres de días de la semana en inglés a español
            $diasSemanaTraduccion = [
                'Monday' => 'Lunes',
                'Tuesday' => 'Martes',
                'Wednesday' => 'Miércoles',
                'Thursday' => 'Jueves',
                'Friday' => 'Viernes',
                'Saturday' => 'Sábado',
                'Sunday' => 'Domingo',
            ];

            // Formatear las etiquetas (días de la semana) para mostrar el nombre en español
            $etiquetasFormateadas = array_map(function ($dia) use ($diasSemanaTraduccion) {
                return $diasSemanaTraduccion[$dia];
            }, $etiquetas);
        } catch (PDOException $e) {
            echo ("Error occurred:" . $e->getMessage());
        }
        ?>

        <!--GRÁFICA DE BARRAS-->
        <script>
            // Crear la gráfica de barras
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($etiquetasFormateadas); ?>,
                    datasets: [{
                        label: 'Ventas por día',
                        data: <?php echo json_encode($datos); ?>,
                        backgroundColor: 'rgba(30, 144, 255, 0.7)',
                        borderColor: 'rgba(30, 144, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        </script>



        <!--GRAFICA DE PASTEL-->
        <div class="col-12 col-md-12 col-lg-12" id="pastel">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfica de porcentaje ventas por categoría (diario)</h3>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- CONSULTA A MYSQL DE PASTEL -->
        <?php
        try {
            // Configura PDO para reportar errores
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Me realiza la consulta a mysql donde:
            //me cuenta el total de productos de cada categoría para así poder hacer la gráfica según lo que se vendió
            $sql = "SELECT T.nombre AS categoria, SUM(DO.cantidad) AS total_ventas
                        FROM DETALLE_ORDEN DO
                        INNER JOIN PRODUCTOS P ON DO.producto = P.producto_id
                        INNER JOIN TIPOS T ON P.tipo = T.id_tipo
                        INNER JOIN ORDENES O ON DO.orden = O.orden_id
                        WHERE O.status = 'Finalizado' AND DATE(O.fecha) = CURDATE()
                        GROUP BY T.nombre;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $showChart = false; // Definir la variable por defecto

            $categorias = [];
            $ventas = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorias[] = $row["categoria"];
                $ventas[] = $row["total_ventas"];
            }

            // Validar si hay datos de ventas para mostrar la gráfica
            $showChart = count($categorias) > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

        <!-- GRÁFICA DE PASTEL-->
        <?php
        if ($showChart) :
        ?>

            <script>
                // Calcular el total de ventas
                var totalVentas = <?php echo array_sum($ventas); ?>;

                // Calcular los porcentajes
                var porcentajes = <?php echo json_encode($ventas); ?>;
                porcentajes = porcentajes.map(function(valor) {
                    return (valor * 100 / totalVentas).toFixed(2);
                });

                // Crear la gráfica de pastel
                var ctx = document.getElementById('pieChart').getContext('2d');
                var pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: <?php echo json_encode($categorias); ?>,
                        datasets: [{
                            data: porcentajes,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(159, 226, 191)',
                                'rgba(204, 204, 255)',
                                'rgba(250, 215, 160',
                                'rgba(242, 215, 213)',
                                'rgba(213, 216, 220)',
                                // Agrega más colores aquí
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(115, 198, 182)',
                                'rgba(187, 143, 206)',
                                'rgba(248, 196, 113)',
                                'rgba(230, 176, 170)',
                                'rgba(171, 178, 185)',
                                // Agrega más colores aquí
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            </script>

        <?php
        else:
        ?>
            <style>
            #pastel{
                display: none;
            }
        </style>
        <?php
        endif;
        ?>


        <?php $db->desconectarDB() ?>

    </div>

</body>

</html>