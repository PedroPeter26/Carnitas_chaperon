<?php
require_once '../class/DatabaseInt.php';

// Verificar si se ha seleccionado una mesa válida
if (isset($_GET['mesa_id']) && is_numeric($_GET['mesa_id'])) {
    $mesa_id = $_GET['mesa_id'];

    // Crear una instancia de la clase Database y conectar a la base de datos
    $database = new Database();
    $database->conectarBD();

    // Consultar información de la mesa seleccionada desde la base de datos
    $sql = "SELECT * FROM Mesas WHERE mesa_id = :mesa_id";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
    $stmt->execute();
    $mesa = $stmt->fetch(PDO::FETCH_ASSOC);

    // Consultar los productos asociados a la mesa desde la tabla "Detalle_Orden"
    $sql = "SELECT * FROM DETALLE_ORDEN WHERE orden = :orden_id";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->bindParam(':orden_id', $mesa['orden_id'], PDO::PARAM_INT);
    $stmt->execute();
    $productos_mesa = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consultar la lista de productos por tipo
    $sql = "SELECT * FROM PRODUCTOS WHERE disponibilidad IN ('Comedor', 'Ambos') ORDER BY tipo";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->execute();
    $productos_tipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cerrar la conexión a la base de datos
    $database->desconectarBD();
} else {
    // Si no se seleccionó una mesa válida, redireccionar a la página principal
    header("Location: comedor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendiendo Mesa <?php echo $mesa['numero_mesa']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="../scripts/funciones.js"></script>
</head>

<body>
    <h1>Atendiendo Mesa <?php echo $mesa['numero_mesa']; ?></h1>

    <div class="container">
        <div class="row">
            <!-- Panel de productos -->
            <div class="col-md-6">
                <h2>Productos por Tipo</h2>
                <!-- Mostrar un dropdown para seleccionar el tipo de producto -->
                <select id="selectTipo" class="form-select mb-3" onchange="cargarProductosPorTipo()">
                    <option value="">Seleccione un tipo</option>
                    <?php
                    // Variable auxiliar para guardar el tipo anterior
                    $tipo_anterior = '';

                    foreach ($productos_tipos as $producto) {
                        if ($tipo_anterior != $producto['tipo']) {
                            echo '<option value="' . $producto['tipo'] . '">' . $producto['tipo'] . '</option>';
                        }
                        $tipo_anterior = $producto['tipo'];
                    }
                    ?>
                </select>

                <!-- Mostrar los productos en función del tipo seleccionado -->
                <div id="productosPorTipo"></div>
            </div>

            <!-- Lista de productos agregados -->
            <div class="col-md-6">
                <h2>Productos Agregados</h2>
                <div id="productosAgregados">
                    <!-- Aquí se mostrarán los productos agregados -->
                </div>
                <p><strong>Total a pagar:</strong> <span id="totalPagar">$0.00</span></p>
                <button class="btn btn-danger" onclick="borrarProductos()">Borrar orden</button>
                <button class="btn btn-secondary">Regresar</button>
                <button class="btn btn-success">Finalizar</button>
            </div>
        </div>
    </div>

</body>

</html>