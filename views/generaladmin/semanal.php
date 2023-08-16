<?php
    // Conectar a la base de datos utilizando PDO
    include '../../class/database.php';
    $db = new database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    try {
        // Configura PDO para reportar errores
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        date_default_timezone_set('America/Monterrey'); // Zona horaria de Torreón

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
                GROUP BY T.nombre;";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas semanales</title>
    <?php include '../headadmin.php'; ?>
    <?php include '../footeradmin.php'; ?>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="wrapper">
        <!-- Aquí puedes colocar el contenido de tu página -->
        <!-- Por ejemplo, la barra de navegación, la barra lateral, etc. -->
        <div class="content-wrapper">
            <br>

            <!--GRAFICA DE BARRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAS-->

            <!--CARD DE LA GRÁFICA DE BARRAS-->
            <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gráfica de ventas semanales</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
            </div>
            <br>

            <!--Consulta los datos de la base de datos-->
            <?php
                try {
                    // ... (código de conexión a la base de datos y manejo de excepciones)

                    $sql = "SELECT WEEK(O.fecha) AS semana, 
                    DATE_FORMAT(MIN(O.fecha), '%d %b') AS fecha_inicio, 
                    DATE_FORMAT(MAX(O.fecha), '%d %b') AS fecha_fin,
                    COUNT(O.orden_id) AS total_ventas
                    FROM ORDENES O
                    WHERE O.status = 'Finalizado'
                    AND YEAR(O.fecha) = YEAR(NOW())
                    AND MONTH(O.fecha) = MONTH(NOW())
                    GROUP BY WEEK(O.fecha)
                    ORDER BY WEEK(O.fecha);";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $etiquetas = [];
                $datos = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $etiquetas[] = $row["fecha_inicio"] . " - " . $row["fecha_fin"] ;
                    $datos[] = $row["total_ventas"];
                }

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

            ?>

            <!--GRÁFICA DE BARRAS SEMANALES-->
            <script>
                // Crear la gráfica de barras
                var ctx = document.getElementById('barChart').getContext('2d');
                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($etiquetas); ?>,
                        datasets: [{
                            label: 'Ventas por semana',
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

            <!--GRAFICA DE PASTEEEEEEEEEEEEEEEEEEEEEL (CARD)-->

            <!--CARD DE LA GRÁFICA DE PASTEL-->
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gráfica de porcentaje ventas por categoría (semanal)</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php if ($showChart) : ?>
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
    <?php endif; ?>

<?php $db->desconectarDB() ?>
</body>
</html>