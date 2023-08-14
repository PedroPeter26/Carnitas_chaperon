<?php
    require '../class/config.php';
    require '../class/databaseInt.php';
    $db = new Database();
    $db->conectarBD();
    $pdo = $db->getConexion();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    //print_r($_SESSION);

    $lista_carrito = array();

    if($productos !=  null)
    {
        foreach ($productos as $clave => $cantidad)
        {
            $sql = $pdo->prepare("select producto_id, nombre, precio_app, $cantidad as cantidad from productos where producto_id=?  and status='Activo'");
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
    $sql = $pdo->prepare("select producto_id, nombre, precio_app, $cantidad as cantidad from productos where producto_id='$clave' and status='Activo'");
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
                font-size: 100%;
            }

            #contenedor
            {
                width: 90%;
                margin: auto;
            }
        }
        @media screen and (min-width: 577px) /*Pantalla pequeña*/
        {
            #contenedor
            {
                width: 60%;
                margin: auto;
            }
        }
        @media screen and (min-width: 900px) /*Pantalla pequeña*/
        {
            #contenedor
            {
                width: 60%;
                margin: auto;
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
            margin-top: 10%;
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
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button 
        { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        .formulario
        {
            margin-bottom: 5%;
            padding: 2em;
            font-family: 'Lilita One', sans-serif;
            background-color: whitesmoke;
            border-radius: 20px;
        }
        .formulario input
        {
            background-color: whitesmoke;
        }
        #boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
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
            <div class="col-12 col-md-5 col-lg-5 formulario">
                <div id="formulario">
                    <BR>
                    <h2 align="center">DETALLES DE PAGO</h2>
                    <hr>
                    <form action="" method="POST">
                    <div class="mb-3">
                        <label for="monto_pagar" id="paga" class="form-label">MONTO A PAGAR:</label>
                        <input type="number" name="monto_pagar" class="form-control" value="<?php echo number_format($total, 2, '.', ','); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="monto_dado" id="recibe" class="form-label">MONTO DADO:</label>
                        <input type="number" name="monto_dado" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cambio" id="regresa" class="form-label">CAMBIO DEL CLIENTE:</label>
                        <input type="number" name="cambio" class="form-control" required>
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
                                $cadena = "INSERT INTO ORDENES (cliente, mesa, forma_pago, fecha, hora_inicio, hora_fin, TIPO_ORDEN, status) VALUES (NULL, NULL, 'efectivo', curdate(), curtime(), curtime(), '$tipo_ord', 'finalizado');";
                                $resultado = $db->ejecutarSQL($cadena);

                                $cadena = "INSERT INTO ORDENES (cliente, mesa, forma_pago, fecha, hora_inicio, hora_fin, TIPO_ORDEN, status) VALUES (NULL, NULL, 'efectivo', curdate(), curtime(), curtime(), '$tipo_ord', 'finalizado');";
                                $resultado = $db->ejecutarSQL($cadena);

                                echo '<div class="alert alert-danger mt-3" role="alert">
                                    No se puede realizar este pago. La cantidad de dinero es menor.
                                </div>';
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-6 offset-1">
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
                                    <div></div>
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


        function actualizaCambio (cantidad, id)
        {
            let url = '../class/actualizar_orden.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('cantidad', cantidad)
            formData.append('id', id)
            

            fetch(url,
            {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then (data => {
                if(data.ok)
                {
                    let divsubtotal = document.getElementById('subtotal_' + id)
                    divsubtotal.innerHTML = data.sub

                    let total = 0.00
                    let list =document.getElementsByName('subtotal[]')

                    for(let i = 0; i < list.length; i++)
                    {
                        total += parseFloat(list[i].innerHTML.replace(/[$,]/g, '')) 
                    }

                    total = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2
                    }).format(total)
                    document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                }
            })
        }
    </script>

</body>
</html>