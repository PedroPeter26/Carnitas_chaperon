<?php
// Iniciar la sesión para utilizar $_SESSION.
session_start();

// Verificar si se recibieron los datos necesarios del formulario.
if (isset($_POST['mesa_id']) && isset($_POST['producto_id']) && isset($_POST['btnAcción']) && $_POST['btnAcción'] === 'Agregar') {
    $mesa_id = $_POST['mesa_id'];
    $producto_id = $_POST['producto_id'];

    // Obtener el carrito actual de la sesión o crear uno nuevo.
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();

    // Agregar el producto al carrito de la mesa correspondiente.
    if (!isset($carrito[$mesa_id])) {
        $carrito[$mesa_id] = array();
    }
    $carrito[$mesa_id][] = $producto_id;

    // Guardar el carrito actualizado en la sesión.
    $_SESSION['carrito'] = $carrito;

    // Redirigir al usuario nuevamente a la página "productos.php" para mostrar los productos.
    header('Location: productos.php?mesa=' . $mesa_id);
    exit(); // Finalizar el script después de redirigir.
} else {
    // Manejar el caso en el que los datos del formulario no sean válidos o no se hayan recibido.
    // Por ejemplo, podrías redirigir al usuario a una página de error o volver a la página anterior.
}
?>
