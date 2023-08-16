<?php
<<<<<<< Updated upstream
<<<<<<<< Updated upstream:html/pago_Pllevar.php
    require '../class/config.php';
    require '../class/database.php';
========
    require '../../class/config.php';
    require '../../class/database.php';
>>>>>>>> Stashed changes:views/ordenes/pago_Pllevar.php
=======
    require '../../class/config.php';
    require '../../class/database.php';
>>>>>>> Stashed changes
    $db = new Database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

<<<<<<< Updated upstream
    print_r($_SESSION);
=======
    //print_r($_SESSION);
>>>>>>> Stashed changes

    $lista_carrito = array();

    if($productos !=  null)
    {
        foreach ($productos as $clave => $cantidad)
        {
<<<<<<< Updated upstream
            $sql = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad as cantidad from PRODUCTOS where producto_id=?  and status='Activo'");
=======
            $sql = $pdo->prepare("select producto_id, nombre, precio_app, $cantidad as cantidad from productos where producto_id=?  and status='Activo'");
>>>>>>> Stashed changes
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include "../headadmin.php"; ?>
    <style>
        #boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
<<<<<<< Updated upstream
<<<<<<<< Updated upstream:html/pago_Pllevar.php
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
========
>>>>>>>> Stashed changes:views/ordenes/pago_Pllevar.php
=======
>>>>>>> Stashed changes
            width: 100%;
        }
    </style>
    <title>PARA LLEVAR</title>
</head>
<body>

    <?php include '../sidebaradmin.php'; ?>
    
    <div class="content-wrapper" style="background-color: white; margin-top: 4%; padding: 2%;">

    <div class="container">

        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <h4>Detalles de pago</h4>
                <div id="paypal-button-container"></div>
                <a href="pago_efectivo.php" class="btn btn-lg" id="boton">PAGO EN EFECTIVO</a>
            </div>

            <div class="col-6 offset-1">
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

    <?php include '../footeradmin.php'; ?>

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
                let URL = '../../class/captura_pllevar.php'
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