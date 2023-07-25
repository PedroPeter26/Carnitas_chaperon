<?php
session_start(); // Asegurarse de iniciar la sesión para acceder a $_SESSION.

if (isset($_POST['mesa_id'])) {
    $mesa_id = $_POST['mesa_id'];
} else {
    echo "<div class='alert alert-danger' role='alert'>
                Agrega el id de una mesa.
            </div>";
    exit; // Salir del script si no hay mesa_id válido.
}

// Obtener el carrito de la mesa específica.
$carrito = array();
if (isset($_SESSION['CARRITO']))
{
    $carrito = $_SESSION['CARRITO'];
}

// Obtener los IDs de los productos agregados a la mesa específica.
$productos_agregados = array();
if (isset($carrito[$mesa_id]))
{
    $productos_agregados = $carrito[$mesa_id];
}

function obtenerProducto($producto_id)
{
    include '../../class/databaseInt.php';
    $db = new Database();
    $db->conectarBD();
    // Modifica la consulta para obtener el producto por su ID.
    $consulta = "SELECT * FROM productos WHERE id = :producto_id";
    $resultados = $db->seleccionar($consulta, array(':producto_id' => $producto_id));
    $producto = $resultados->fetch(PDO::FETCH_ASSOC);

    // Verificar si el producto fue encontrado y devolver los detalles del producto.
    if ($producto) {
        return $producto;
    } else {
        return false; // Producto no encontrado.
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Resto del código HEAD -->
</head>
<body style="background-color: #EFE2CF;">
    <!-- Resto del código HTML -->

    <div class="container"> 
        <h3>Orden de la mesa <?php echo $mesa_id; ?></h3>

        <?php if (!empty($productos_agregados)) { ?>
            <table class="table table-light table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 40%;">Producto</th>
                        <th style="width: 15%;" class="text-center">Precio</th>
                        <th style="width: 10%;" class="text-center">Cantidad</th>
                        <th style="width: 20%;" class="text-center">Total</th>
                        <th style="width: 15%;" class="text-center">Eliminar</th>
                    </tr>

                    <?php
                        $TOTAL = 0; 
                        foreach ($productos_agregados as $producto_id) {
                            // Obtener los detalles del producto desde la base de datos.
                            $producto = obtenerProducto($producto_id);
                            if ($producto) {
                                $precioSinDolarSign = str_replace('$', '', $producto['PRECIO']);
                                $totalPrecio = floatval($precioSinDolarSign) * intval($producto['CANTIDAD']);
                                $TOTAL += $totalPrecio;
                    ?>
                    <tr>
                        <td style="width: 40%;"><?php echo $producto['NOMBRE']; ?></td>
                        <td style="width: 15%;" class="text-center"><?php echo $producto['PRECIO']; ?></td>
                        <td style="width: 10%;" class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
                        <td style="width: 20%;" class="text-center">$<?php echo number_format($totalPrecio, 2); ?></td>
                        <td style="width: 15%;" class="text-center">
                            <form action="carrito.php" method="post">
                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                    <tr>
                        <td colspan="3" align="right"><h5>Total</h5></td>
                        <td align="right"><h5>$<?php echo number_format($TOTAL, 2); ?></h5></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-danger">
                No hay productos en la orden.
            </div>
        <?php } ?>

        <?php
            if (isset($_SESSION['CARRITO'][$mesa_id])) {
                echo "NO. DE ARTÍCULOS: " . count($_SESSION['CARRITO'][$mesa_id]);
            } else {
                echo "NO. DE ARTÍCULOS: 0";
            }
        ?>
    </div>
</body>
</html>
