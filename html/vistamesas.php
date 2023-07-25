<?php
// Asegúrate de incluir el archivo de configuración con la conexión a la base de datos (config.php)
require_once 'databaseInt.php';

// Verificamos si se proporcionó un identificador de mesa válido en la URL
if (isset($_GET['mesa_id']) && is_numeric($_GET['mesa_id'])) {
    $mesa_id = $_GET['mesa_id'];

    try {
        // Realizar la consulta para obtener los productos de la mesa seleccionada
        $sql = "SELECT p.nombre AS producto_nombre, d.cantidad, p.precio_unitario
                FROM DETALLE_ORDEN d
                JOIN PRODUCTOS p ON d.producto = p.producto_id
                WHERE d.orden IN (SELECT orden_id FROM ORDENES WHERE mesa = :mesa_id)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
        $stmt->execute();

        // Verificar si hay productos asociados a la mesa
        if ($stmt->rowCount() > 0) {
            // Mostramos la lista de productos
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <title>Lista de Productos por Mesa</title>
                <!-- Agrega tus enlaces CSS y JS aquí si los necesitas -->
            </head>
            <body>
                <h1>Lista de Productos por Mesa</h1>
                <h2>Productos de la Mesa <?php echo $mesa_id; ?>:</h2>
                <ul>
                    <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $producto_nombre = $row['producto_nombre'];
                        $cantidad = $row['cantidad'];
                        $precio_unitario = $row['precio_unitario'];

                        // Mostramos la información de cada producto
                        echo "<li>$cantidad x $producto_nombre ($precio_unitario MXN c/u)</li>";
                    }
                    ?>
                </ul>
            </body>
            </html>
            <?php
        } else {
            // Si no hay productos asociados a la mesa, mostramos un mensaje indicando que está vacía.
            echo "<p>La Mesa $mesa_id no tiene productos ordenados.</p>";
        }
    } catch (PDOException $e) {
        // Manejo de errores en caso de que falle la consulta
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    // Si no se proporcionó un identificador de mesa válido, mostramos un mensaje de error.
    echo "<p>Error: Identificador de mesa no válido.</p>";
}
?>