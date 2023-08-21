<?php
require_once '../class/Database.php';

// Verificar si se ha seleccionado un producto válido
if (isset($_GET['producto_id']) && is_numeric($_GET['producto_id'])) {
    $producto_id = $_GET['producto_id'];

    // Crear una instancia de la clase Database y conectar a la base de datos
    $database = new Database();
    $database->conectarDB();

    // Consultar información del producto desde la base de datos
    $sql = "SELECT * FROM PRODUCTOS WHERE producto_id = :producto_id";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cerrar la conexión a la base de datos
    $database->desconectarDB();

    // Enviar la información del producto en formato JSON
    header('Content-Type: application/json');
    echo json_encode($producto);
} else {
    // Si no se seleccionó un producto válido, devolver un mensaje de error
    header('HTTP/1.1 400 Bad Request');
    echo 'Error: Producto no encontrado.';
}
