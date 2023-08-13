<?php
// Conectar a la base de datos utilizando PDO
include 'class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();

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
            WHERE O.status='Finalizado' AND O.fecha BETWEEN :startOfWeek AND :endOfWeek
            GROUP BY T.nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':startOfWeek', $startOfWeek);
    $stmt->bindValue(':endOfWeek', $endOfWeek);
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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gráfica de ventas por categoría</title>
    <!-- Incluye los estilos de AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/adminlte@3.1.0/dist/css/adminlte.min.css">
    <!-- Incluye la librería Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Aquí puedes colocar el contenido de tu página -->
        <!-- Por ejemplo, la barra de navegación, la barra lateral, etc. -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <!-- Aquí crearemos la gráfica de pastel -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Gráfica de ventas por categoría</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

</body>

</html>