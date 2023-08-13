<?php
// Conectar a la base de datos utilizando PDO
include '../../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();

try {
    // Configura PDO para reportar errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta los datos de la base de datos
    $sql = "SELECT DATE_FORMAT(fecha, '%Y-%m') AS mes, COUNT(orden_id) AS total FROM ORDENES WHERE status='Finalizado' GROUP BY mes ORDER BY mes;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $etiquetas = [];
    $datos = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $etiquetas[] = $row["mes"];
        $datos[] = $row["total"];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$db->desconectarDB();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas mensuales</title>
    <?php include '../headadmin.php'; ?>
    <?php include '../footeradmin.php'; ?>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="content-wrapper">
        <div><br></div>
        <!--CARD DE LA GRÁFICA-->
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfica de ventas mensuales</h3>
                </div>
                <div class="card-body">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Pastelll -->
        <?php
        try {
            // Configura PDO para reportar errores
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Calcular inicio y fin de la semana actual
            $today = date('Y-m-d');
            $startOfMonth = date('Y-m-d', strtotime('this month', strtotime($today)));
            $endOfMonth = date('Y-m-d', strtotime('next month', strtotime($today)) - 1);

            // Consulta los datos de la base de datos
            $sql = "SELECT T.nombre AS categoria, COUNT(DO.producto) AS total_ventas
            FROM DETALLE_ORDEN DO
            INNER JOIN PRODUCTOS P ON DO.producto = P.producto_id
            INNER JOIN TIPOS T ON P.tipo = T.id_tipo
            INNER JOIN ORDENES O ON DO.orden = O.orden_id
            WHERE O.status='Finalizado' AND O.fecha BETWEEN :startOfMonth AND :endOfMonth
            GROUP BY T.nombre";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':startOfMonth', $startOfMonth);
            $stmt->bindValue(':endOfMonth', $endOfMonth);
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

        $db->desconectarDB();
        ?>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfica de porcentaje ventas por categoría</h3>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <?php
        // Arreglo de traducción de nombres de meses en inglés a español
        $mesesTraduccion = [
            'January' => 'Enero',
            'February' => 'Febrero',
            'March' => 'Marzo',
            'April' => 'Abril',
            'May' => 'Mayo',
            'June' => 'Junio',
            'July' => 'Julio',
            'August' => 'Agosto',
            'September' => 'Septiembre',
            'October' => 'Octubre',
            'November' => 'Noviembre',
            'December' => 'Diciembre',
        ];

        // Formatear las etiquetas (meses) para mostrar el nombre del mes en español
        $etiquetasFormateadas = array_map(function ($mes) use ($mesesTraduccion) {
            $fecha = DateTime::createFromFormat('Y-m', $mes);
            $nombreMes = $fecha->format('F'); // Obtener el nombre del mes en inglés
            return $mesesTraduccion[$nombreMes] . ' ' . $fecha->format('Y');
        }, $etiquetas);
        ?>

        <script>
            // Crear la gráfica de barras
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($etiquetasFormateadas); ?>,
                    datasets: [{
                        label: 'Ventas por año',
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

        <!-- Script pastel -->
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
                                // Agrega más colores aquí
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
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

    </div>

    <?php $db->desconectarDB() ?>
</body>

</html>