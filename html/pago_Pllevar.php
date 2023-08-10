<?php
    require '../class/config.php';
    require '../class/database.php';
    $db = new Database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    print_r($_SESSION);

    $lista_carrito = array();

    if($productos !=  null)
    {
        foreach ($productos as $clave => $cantidad)
        {
            $sql = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad as cantidad from PRODUCTOS where producto_id=?  and status='Activo'");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
    else
    {
        header("Location: ../index.php");
        exit();
    }

    //session_destroy();
            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap');
        body
        {
            background-color: #ffefcf;
        }
        html, body
        {
            max-width: 100% !important;
        }
        .barranav
        {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size:contain;
            position:fixed;
            top:0;
            width: 100%;
            z-index: 1200;
            font-family: 'Lilita One', sans-serif;
            color: white;
        }
        .navbar-brand
        {
            font-family: 'Lilita One', sans-serif;
            font-size: 30px;
            
        }
        .navbar-brand:hover
        {
            color: white;
        }
        a.color
        {
            color: white;
        }
        a.color:hover
        {
            color: white;
            font-size: 20px;
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .navbar-brand
            {
                font-size: 26px;
            }
        }
        .cont a
        {
            margin-bottom: 2em;
            margin-right: 2em;
        }
        .contenedor
        {
            width: 100%;
            margin-top: 65px;
        }
        .carrito
        {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: auto;
            position: sticky !important;
            top: 0;
            transition: .3s;
            /* Estilos para ocultar */
            margin-right: -100%;
            opacity: 0;
        }
        #eliminaModal
        {
            margin-top: 70px;
        }
    </style>
    <title>PARA LLEVAR</title>
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="checkout_pllevar.php">
                        Orden<span id="num_cart" class="badge"><?php echo $num_cart; ?></span>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../class/cerrarsesion.php">Cerrar sesión</a>
                </li>
            </ul>
            </div>
        </div>
</nav>
    
    <div class="container contenedor">

        <div class="row">
            <div class="col-6">
                <h4>Detalles de pago</h4>
                <div id="paypal-button-container"></div>
            </div>

            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                            <th>Producto</th>
                            <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($lista_carrito == null)
                            {
                                echo '<tr>
                                    <td colspan="5" class="text-center">
                                        <b>Lista Vacía</b>
                                    </td>
                                    </tr>';
                            }
                            else
                            {
                                $total = 0;
                                foreach($lista_carrito as $producto)
                                {
                                    $_id = $producto['producto_id'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio_app'];
                                    $cantidad = $producto['cantidad'];
                                    $subtotal = $cantidad * $precio;
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
                            <?php 
                                }
                            ?>

                            <tr>
                                <td></td>
                                <td>
                                    <p class="h3" id="total"> TOTAL: <?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                                </td>
                            </tr>
                        </tbody>
                        <?php 
                            }
                        ?>
                    </table>
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
                let URL = '../class/captura_pllevar.php'
                actions.order.capture().then(function (detalles){
                    console.log(detalles)

                    let url = '../class/captura_pllevar.php'
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