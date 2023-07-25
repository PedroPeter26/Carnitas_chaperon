<?php
session_start(); // Asegurarse de iniciar la sesión para acceder a $_SESSION.

if (isset($_GET['mesa'])) {
    $mesa_id = $_GET['mesa'];
} else {
    echo "<div class='alert alert-danger' role='alert'>
                Agrega el id de una mesa.
            </div>";
    exit; // Salir del script si no hay mesa_id válido.
}

// Obtener el carrito de la mesa específica.
$carrito = array();
if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
}

// Obtener los IDs de los productos agregados a la mesa específica.
$productos_agregados = array();
if (isset($carrito[$mesa_id])) {
    $productos_agregados = $carrito[$mesa_id];
}

// Aquí, obtendrías los datos completos de los productos desde tu base de datos y los mostrarías según los IDs de los productos agregados a la mesa.
// Suponiendo que tienes una tabla "productos" en tu base de datos con los campos 'producto_id', 'nombre' y 'precio_com'.
// Debes obtener los detalles de cada producto agregado al carrito.
// Puedes hacerlo con una consulta SQL para obtener todos los detalles de los productos en una sola consulta.
// En este ejemplo, usaremos una función "obtenerProducto" para simular la obtención de los detalles de los productos.
// Asegúrate de reemplazar "obtenerProducto" con el método real que uses para obtener los datos de la base de datos.

function obtenerProducto($producto_id) {
    include '../../class/databaseInt.php';
    $db = new Database();
    $db->conectarBD();
    // Modifica la consulta para obtener el producto por su ID.
    $consulta = "SELECT * FROM productos WHERE id = :producto_id";
    $resultados = $db->seleccionar($consulta, array(':producto_id' => $producto_id));
    $productosBD = $resultados->fetch(PDO::FETCH_ASSOC);

    // Verificar si el producto fue encontrado y devolver los detalles del producto.
    if ($productosBD) {
        return $productosBD;
    } else {
        return false; // Producto no encontrado.
    }


    // Verificar si el producto_id existe en $productosBD y devolver los detalles del producto.
    if (isset($productosBD[$producto_id]))
    {
        return $productosBD[$producto_id];
    }
    else
    {
        return false; // Producto no encontrado.
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrito de la Mesa <?php echo $mesa_id; ?></title>
</head>
<body>
    <h1>Carrito de la Mesa <?php echo $mesa_id; ?></h1>
    <table>
        <tr>
            <th>Nombre del Producto</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach ($productos_agregados as $producto_id) {
            // Obtener los detalles del producto desde la base de datos.
            $producto = obtenerProducto($producto_id);

            if ($producto !== false) {
                // Mostrar los detalles del producto en la tabla.
                echo '<tr>';
                echo '<td>' . $producto['Nombre'] . '</td>';
                echo '<td>$' . $producto['Precio'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</body>
</html>
