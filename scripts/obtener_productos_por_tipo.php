<?php
// Obtener los productos por tipo desde la base de datos
if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
    require_once '../class/database.php';
    $database = new database();
    $database->ConectarDB();

    $tipo = $_GET['tipo'];
    $sql = "SELECT * FROM PRODUCTOS WHERE tipo = :tipo";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $database->desconectarDB();

    // Generar el HTML de los productos por tipo
    foreach ($productos as $producto) {
        echo '<div class="mb-3">';
        echo '<span class="nombre">' . $producto['nombre'] . '</span>';
        echo '<span class="precio">$' . number_format($producto['precio_com'], 2) . '</span>';
        echo '<button class="btn btn-success" onclick="agregarProducto(' . $producto['producto_id'] . ')">Agregar</button>';
        echo '</div>';
    }
}
?>