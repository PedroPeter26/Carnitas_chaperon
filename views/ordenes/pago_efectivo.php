<?php
    require '../../class/config.php';
    require '../../class/database.php';
    $db = new Database();
    $db->conectarDB();
    $pdo = $db->getConexion();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    //print_r($_SESSION);

    $lista_carrito = array();

    if($productos !=  null)
    {
        foreach ($productos as $clave => $cantidad)
        {
            $sql = $pdo->prepare("select producto_id, nombre, precio_app, $cantidad as cantidad from PRODUCTOS where producto_id=?  and status='Activo'");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }


    //session_destroy();
    $sql = $pdo->prepare("select producto_id, nombre, precio_app, $cantidad as cantidad from PRODUCTOS where producto_id='$clave' and status='Activo'");
    $sql->execute();
    $orden = $sql->fetch(PDO::FETCH_ASSOC);

    $total = 0;
    $subtotal = $orden['precio_app'] * $cantidad;
    $total += $subtotal;
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
    <style>
        #boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
        }
    </style>
    <?php include "../headadmin.php"; ?>
    <title>PARA LLEVAR</title>
    </script>
</head>
<body>

<?php include '../sidebaradmin.php'; ?>
    
    <div class="content-wrapper"  style="background-color: white; margin-top: 4%; padding: 2%;">

    <div class="container">
        <div class="row">
             <div class="col-12 col-md-5 col-lg-5 formulario">
                <div id="formulario">
                    <h4 align="center">DETALLES DE PAGO</h4>
                    <BR>
                    <form action="" method="POST">
                    <div class="mb-3">
                        <label for="monto_pagar" class="form-label">MONTO A PAGAR:</label>
                        <input type="number" id="paga" name="monto_pagar" class="form-control" oninput="restar()" value="<?php echo number_format($total, 2, '.', ','); ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="monto_dado" class="form-label">MONTO DADO:</label>
                        <input type="number" id="recibe" name="monto_dado" class="form-control" oninput="restar()" required>
                    </div>
                    <div class="mb-3">
                        <label for="cambio" class="form-label">CAMBIO DEL CLIENTE:</label>
                        <input type="number" name="cambio" id="cambio" class="form-control" disabled>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" name="pagar" class="btn btn-lg" id="boton" value="PAGAR">
                    </div>
                    <?php
                        if(isset($_POST['pagar']))
                        {
                            if($_POST['monto_pagar'] > $_POST['monto_dado'])
                            {
                                echo '<div class="alert alert-danger mt-3" role="alert">
                                    No se puede realizar este pago. La cantidad de dinero es menor.
                                </div>';
                            }
                            else
                            {
                                $tipo_ord = 3;
                                $cadena = $pdo->prepare("CALL InsertarOrdenRAPIDO ('Efectivo');");
                                $cadena->execute();
                                $id = $pdo->lastInsertId();

                                if($productos != null)
                                {
                                    foreach($productos as $clave => $cantidad)
                                    {
                                    $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido') AND status = 'Activo'");
                                    $sentencia->execute([$clave]);
                                    $row_prod=$sentencia->fetch(PDO::FETCH_ASSOC);
                        
                                    $precio_app = $row_prod['precio_app'];
                        
                                    $sql_insert = $pdo->prepare("INSERT INTO DETALLE_ORDEN (orden, producto, cantidad) VALUES (?,?,?)");
                                    $sql_insert->execute([$id, $clave, $cantidad]);
                                    }
                                }
                            }

                            unset($_SESSION['carrito']);
                            echo '<div class="alert alert-success mt-3" role="alert">
                            ¡Pago realizado exitosamente!
                            </div>';
                        }
                    ?>
                    </form>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-6 offset-1">
                <div class="table-responsive tabla">
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
                                    <div>
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

        function restar() 
        {
            try
            {
                var a = parseFloat(document.getElementById("recibe").value) || 0,
                b = parseFloat(document.getElementById("paga").value) || 0;

                document.getElementById("cambio").value = a-b;
            }
            catch(e) {}
        }
    </script>

</body>
</html>