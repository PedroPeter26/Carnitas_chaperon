<?php
session_start();
include '../../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
require '../../class/configcom.php';

$mesa_id = isset($_GET['mesa_id']) ? $_GET['mesa_id'] : null;
$productos = isset($_SESSION['carrito'][$mesa_id]['productos']) ? $_SESSION['carrito'][$mesa_id]['productos'] : null;
$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {

        $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_com, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Comedor') AND status = 'Activo'");
        $sentencia->execute([$clave]);
        $lista_carrito[] = $sentencia->fetch(PDO::FETCH_ASSOC);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: 'Lilita One';
            src: url(./LilitaOne-Regular.ttf);
        }

        .lilita {
            font-family: 'Lilita One';
        }

        .bg-header {
            background-color: #FCF0C8;
        }

        .bg-redmarron {
            background-color: #630A10;
        }

        .content-section {
            background-color: #FACE7F;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
    <?php include '../headadmin.php'; ?>
    <?php include '../footeradmin.php'; ?>
    <title>Checkout com</title>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="content-wrapper p-5">
        <!-- Contenido principal -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <a href="checkout_comedor.php?mesa_id=<?php echo $mesa_id; ?>" class="btn btn-warning">Regresar a la orden</a>
                    <div class="table-responsive">
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($lista_carrito == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>Lista vacía</b></td></tr>';
                                } else {
                                    $total = 0;
                                    foreach ($lista_carrito as $producto) {
                                        $_id = $producto['producto_id'];
                                        $nombre = $producto['nombre'];
                                        $precio_com = $producto['precio_com'];
                                        $cantidad = $producto['Cantidad'];
                                        $subtotal = $cantidad * $precio_com;
                                        $total += $subtotal;
                                ?>
                                        <tr>
                                            <td><?php echo $nombre; ?></td>
                                            <td>
                                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                                    <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    $_SESSION['carrito'][$mesa_id]['total'] = $total; ?>

                                    <tr>
                                        <td colspan="2">
                                            <p class="h3 text-end" id="total"><?php echo 'Total: ' . MONEDA . number_format($total, 2, '.', ','); ?></p>
                                        </td>
                                    </tr>

                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>

                <div class="col-12 col-lg-6 mt-5">
                    <h4 class="lilita">Detalles de pago:</h4>
                    <div id="paypal-button-container">
                        
                    </div>

                    <h4 class="lilita">Pago en efectivo:</h4>
                    <form id="efectivoForm" action="../class/procesar_efectivo.php" method="POST">
                        <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <?php
                        if (isset($_SESSION['carrito'][$mesa_id]) && isset($_SESSION['carrito'][$mesa_id]['productos'])) {
                            foreach ($_SESSION['carrito'][$mesa_id]['productos'] as $producto_id => $cantidad) {
                                echo '<input type="hidden" name="productos[' . $producto_id . ']" value="' . $cantidad . '">';
                            }
                        }
                        ?>
                        <div class="mb-3">
                            <label for="monto_efectivo" class="form-label">Monto en efectivo:</label>
                            <input type="number" class="form-control" name="monto_efectivo" min="<?php echo $total; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>">
    </script>

    <script>
        document.getElementById('efectivoForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch('../class/procesar_efectivo.php', {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let cambio = data.cambio;
                        alert(`Pago exitoso! Cambio a entregar: ${cambio}`);
                        window.location.href = `ticketcomefectivo.php?orden_id=${data.orden_id}`;
                    } else {
                        alert('Error al procesar el pago');
                    }
                });
        });
    </script>


    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                let URL = '../class/capturacomedor.php'
                actions.order.capture().then(function(detalles) {
                    console.log(detalles);

                    let url = '../class/capturacomedor.php'
                    return fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles,
                            mesa_id: '<?php echo $mesa_id; ?>'
                        })
                    }).then(function() {
                        // Mostrar el mensaje de "Compra exitosa!"
                        let successMessage = document.createElement('div');
                        successMessage.classList.add('alert', 'alert-success');
                        successMessage.textContent = 'Compra exitosa!';
                        document.body.appendChild(successMessage);

                        // Redireccionar a ordenar.php después de 2 segundos
                        setTimeout(function() {
                            window.location.href = 'comedor.php';
                        }, 2000);
                    });
                });
            },

            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>