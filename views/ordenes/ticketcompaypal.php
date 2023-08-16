<!DOCTYPE html>
<html>
<head>
    <title>Ticket de Compra - PayPal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Ticket de Compra - PayPal</h1>
        <?php
        // Conexión a la base de datos y obtención de los detalles de la orden
        require '../../class/database.php';
        $db = new Database();
        $db->conectarDB();
        $pdo = $db->getConexion();
        require '../../class/configcom.php';

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
                echo '<h2>Número de Orden: ' . $orden_id . '</h2>';
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>';
                $total = 0;
                foreach ($detalles as $detalle) {
                    $producto_nombre = $detalle['nombre'];
                    $cantidad = $detalle['cantidad'];
                    $precio_com = $detalle['precio_com'];
                    $subtotal = $cantidad * $precio_com;
                    $total += $subtotal;
                    echo '<tr>
                            <td>' . $producto_nombre . '</td>
                            <td>' . $cantidad . '</td>
                            <td>' . MONEDA . number_format($subtotal, 2, '.', ',') . '</td>
                        </tr>';
                }
                echo '</tbody>
                      </table>';
                echo '<h3>Total a Pagar: ' . MONEDA . number_format($total, 2, '.', ',') . '</h3>';

                echo '<a href="comedor.php" class="btn btn-secondary">Regresar al Comedor</a>';
            }
        }

        $db->desconectarDB();
        ?>
    </div>
</body>
</html>