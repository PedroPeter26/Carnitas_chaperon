<?php
// Iniciar la sesión para utilizar $_SESSION.
session_start();

// Verificar si se recibieron los datos necesarios del formulario.
if (isset($_POST['mesa_id']) && isset($_POST['btnAcción']) && $_POST['btnAcción'] === 'Agregar')
{
    $mesa_id = $_POST['mesa_id'];

    // Obtener el carrito actual de la sesión o crear uno nuevo.
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();

    // Agregar el producto al carrito de la mesa correspondiente.
    if (!isset($carrito[$mesa_id]))
    {
        $carrito[$mesa_id] = array();
    }
    $carrito[$mesa_id][] = $producto_id;

    // Guardar el carrito actualizado en la sesión.
    $_SESSION['carrito'] = $carrito;

    // Redirigir al usuario nuevamente a la página "productos.php" para mostrar los productos.
    header('Location: productos.php?mesa=' . $mesa_id);
    exit(); // Finalizar el script después de redirigir.
}
else
{
    // Manejar el caso en el que los datos del formulario no sean válidos o no se hayan recibido.
    // Por ejemplo, podrías redirigir al usuario a una página de error o volver a la página anterior.
}
?>



<?php
    session_start();

    // Verificamos si se ha enviado el ID de la mesa desde el formulario
    if (isset($_POST['mesa_id'])) {
        // Sanitizamos el valor recibido para evitar posibles ataques
        $mesa_id = filter_var($_POST['mesa_id'], FILTER_SANITIZE_NUMBER_INT);

        // Resto del código de "carrito.php" usando la nueva variable de sesión
        if (isset($_POST['btnAccion'])) {
            switch ($_POST['btnAccion']) {
                case 'Agregar':
                    if(is_numeric ($_POST['id']))
                    {
                        $ID = $_POST['id'];
                    }
                    if(is_string ($_POST['nombre']))
                    {
                        $NOMBRE = $_POST['nombre'];
                    }
                    if(is_numeric($_POST['cantidad']))
                    {
                        $CANTIDAD = $_POST['cantidad'];
                    }
                    if(is_numeric($_POST['precio']))
                    {
                        $PRECIO = $_POST['precio'];
                    }

                    if (isset($_POST['precio']))
                    {
                        $PRECIO = floatval(str_replace('$', '', $_POST['precio']));
                    }
                    else
                    {
                        $PRECIO = 0; // Set a default price or handle the case when price is missing.
                    }

                    if (!isset($_SESSION['CARRITO'][$_POST['mesa_id']]))
                    {
                        $producto = array(
                            'ID' => $ID,
                            'NOMBRE' => $NOMBRE,
                            'CANTIDAD' => $CANTIDAD,
                            'PRECIO' => $PRECIO,
                        );
                        $_SESSION['CARRITO'][$_POST['mesa_id']] = array($producto); // Creamos un nuevo array para esta mesa con el primer producto
                    }
                    else
                    {
                        $producto = array(
                            'ID' => $ID,
                            'NOMBRE' => $NOMBRE,
                            'CANTIDAD' => $CANTIDAD,
                            'PRECIO' => $PRECIO,
                        );
                        $_SESSION['CARRITO'][$_POST['mesa_id']][] = $producto; // Agregamos el nuevo producto al carrito específico de la mesa
                    }
                    break;
                    

                case 'Eliminar':

                    if (isset($_SESSION['CARRITO'][$_POST['mesa_id']]))
                    {
                        $ID = $_POST['id'];
                        
                        foreach ($_SESSION['CARRITO'][$_POST['mesa_id']] as $indice => $producto)
                        {
                            if ($producto['ID'] == $ID)
                            {
                                unset($_SESSION['CARRITO'][$_POST['mesa_id']][$indice]);
                                echo "<script>alert('Producto borrado.');</script>";
                                break; // Agrega un "break" para salir del bucle una vez que se ha eliminado el producto.
                            }
                        }
                    }
                    
                break;
            }
        }
    }
    else
    {
        // Si no se ha recibido el ID de la mesa, muestra una alerta
        echo "<script>alert('El ID de la mesa no se ha recibido correctamente.');</script>";
    }
?>
