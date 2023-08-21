<!DOCTYPE html>
<html>
<head>
    <title>Ticket de Compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Ticket de Compra</h1>
        <?php
        // Conexión a la base de datos y obtención de los detalles de la orden
        require '../class/database.php';
        $db = new Database();
        $db->conectarDB();
        $pdo = $db->getConexion();
        require '../class/configcom.php';

        $orden_id = isset($_GET['orden_id']) ? $_GET['orden_id'] : null;

        if ($orden_id === null) {
            echo "Error: Número de orden inválido.";
        } else {
            // Obtener detalles de la orden y la mesa
            $sql = "SELECT O.orden_id, O.mesa, D.producto, D.cantidad, P.nombre, P.precio_com
                    FROM ORDENES O
                    INNER JOIN DETALLE_ORDEN D ON O.orden_id = D.orden
                    INNER JOIN PRODUCTOS P ON D.producto = P.producto_id
                    WHERE O.orden_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$orden_id]);
            $detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($detalles)) {
                echo "No se encontraron detalles de la orden.";
            }
            else {
                // Obtener detalles de la orden y la mesa
                $sql = "SELECT O.orden_id, O.mesa
                        FROM ORDENES O
                        WHERE O.orden_id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$orden_id]);
                $orden = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if (empty($orden)) {
                    echo "No se encontraron detalles de la orden.";
                } else {
                    echo '<h2>Número de Orden: ' . $orden['orden_id'] . '</h2>';
                    echo '<h3>Mesa: ' . $orden['mesa'] . '</h3>';
                    echo '<table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>';
                    foreach ($_SESSION['carrito'][$orden['mesa']]['productos'] as $producto_id => $cantidad) {
                        // Obtener detalles del producto
                        $sqlProducto = "SELECT nombre, precio_com FROM PRODUCTOS WHERE producto_id = ?";
                        $stmtProducto = $pdo->prepare($sqlProducto);
                        $stmtProducto->execute([$producto_id]);
                        $producto = $stmtProducto->fetch(PDO::FETCH_ASSOC);
            
                        $subtotal = $cantidad * $producto['precio_com'];
            
                        echo '<tr>
                                <td>' . $producto['nombre'] . '</td>
                                <td>' . $cantidad . '</td>
                                <td>' . MONEDA . number_format($subtotal, 2, '.', ',') . '</td>
                            </tr>';
                    }
                    echo '</tbody>
                          </table>';
                    echo '<h3>Total a Pagar: ' . MONEDA . number_format($_SESSION['carrito'][$orden['mesa']]['total'], 2, '.', ',') . '</h3>';

                    unset($_SESSION['carrito'][$orden['mesa']]);
                    echo '<a href="comedor.php" class="btn btn-secondary mt-3">Regresar al Comedor</a>';
                }
            }
        }

        $db->desconectarDB();
        ?>
    </div>
</body>
</html>
