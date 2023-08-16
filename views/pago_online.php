<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
require '../class/config.php';

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){

    $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad AS Cantidad FROM productos WHERE producto_id = ? AND (productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido') AND status = 'Activo'");
    $sentencia->execute([$clave]);
    $lista_carrito[]=$sentencia->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: ordenar.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <style>
        @font-face
        {
            font-family: 'Lilita One';
            src: url(./LilitaOne-Regular.ttf);
        }
        .lilita
        {
            font-family: 'Lilita One';
        }
        .bg-header
        {
            background-color: #FCF0C8;
        }
        .bg-redmarron
        {
            background-color: #630A10;
        }

        .content-section
        {
        background-color: #FACE7F;
        padding: 20px;
        margin-bottom: 20px;
        }

    </style>

    <title>Checkout</title>
</head>
<body>

    <header class="d-flex align-items-center justify-content-center lilita bg-header">

    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                <?php
                    if (isset($_SESSION["usuario"]))
                    {
                    echo "<li>
                            <a class='dropdown-item rounded-2' href='checkout_online.php'>Carrito <span id='num_cart' class='badge bg-danger'>$num_cart</span></a>
                            </li>";
                    echo '<li><hr class="dropdown-divider"></li>';
                    echo "<li><a class='dropdown-item rounded-2' href='ordenar.php'>Ordenar</a></li>";
                    echo '<li class="dropdown">
                    <a class="dropdown-item rounded-2 dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="perfil_usuario.php">
                                Perfil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="historial_de_compras.php">
                                Historial
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" style="color: red;" href="../class/cerrarsesion.php">Cerrar sesión</a>
                        </li>
                    </ul>
                    </li>';
                    }
                ?>
            </ul>
            </div>
        </div>
    </nav>

    </header>

    <!-- Contenido principal -->
  <div class="container mt-5">

    <div class="row">
        <div class="col-12 col-lg-6 mt-5">
            <h4 class="lilita">Detalles de pago:</h4>
            <div id="paypal-button-container"></div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="table-responsive">
                <table class="table mt-5">
                    <thead class="table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacía</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach($lista_carrito as $producto){
                                $_id = $producto['producto_id'];
                                $nombre = $producto['nombre'];
                                $precio_app = $producto['precio_app'];
                                $cantidad = $producto['Cantidad'];
                                $subtotal = $cantidad * $precio_app;
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
                        <?php } ?>

                        <tr>
                            <td></td>
                            <td colspan="">
                                <p class="h3" id="total"><?php echo 'Total: ' . MONEDA . number_format($total, 2, '.', ','); ?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
  </div>

  </div>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>">
    </script>

<script>
        paypal.Buttons({
            style:{
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

            onApprove: function (data, actions) {
                let URL = '../class/captura1.php'
                actions.order.capture().then(function (detalles){
                    console.log(detalles);

                    let url = '../class/captura1.php'
                    return fetch(url, {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body : JSON.stringify({
                            detalles: detalles
                        })
                    })
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