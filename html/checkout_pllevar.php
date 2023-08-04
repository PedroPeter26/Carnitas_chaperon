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
        .barranav
        {
            height: 70px;
            background-image: url(../img/barranav1.jpg);
            background-size:contain;
            width: 100%;
            font-family: 'Lilita One', sans-serif;
            color: white;
        }
        .navbar-brand
        {
            font-family: 'Lilita One', sans-serif;
            font-size: 30px;
            color: white;
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
        /*BOTÓN DE INICIAR SESIÓN DE LA BARRA DE NAV 1*/
        button.iniciarsesionnav
        {
            float: right;
            border: 1px solid white;
            color: white;
            text-justify: center;
            align-items: center;
            border-radius: 10px;
            margin: 0 auto;
            align-content: center;
        }
        /*MODAL UBICACION*/
        .modalubi
        {
            display: flex;
            max-width: 70% !important;
            text-align: center;
            align-self: auto;
        }
        .contenedormodal /*UBI*/
        {
            width: inherit; /* Hereda el ancho del contenedor padre (modal) */
            height: inherit; /* Hereda el alto del contenedor padre (modal) */
        }
        .map-container
        {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Proporción 16:9 (dividir la altura por el ancho y multiplicar por 100) */
        }
        .map-container iframe
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        @media (max-width: 768px)
        {
            .modalubi
            {
            width: 80%; /* Ajusta el ancho del modal al 80% de la ventana */
            height: 80%; /* Ajusta la altura del modal al 80% de la ventana */
            }
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .modalubi
            {
                width: 90%; /* Ajusta el ancho del modal al 90% de la ventana */
                height: 90%; /* Ajusta la altura del modal al 90% de la ventana */
                margin: 0 auto;
            }
        }
        /*COLOR DE LOS TABS NO ACTIVOS*/
        .nav-link:not(.active)
        {
            color: brown;
        }
        .contenido
        {
            margin-top: 30px;
        }
        h2
        {
            font-family: 'Lilita One', cursive;
        }
        h5, p
        {
            font-family: 'Belanosima', sans-serif;
        }
        .nav-link:active
        {
            color: black;
        }
        .cards
        {
            background-color: #FCF4E9;
            height: 150px;
        }
        .imgmodal
        {
            height: 300px;
            width: 400px;
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .imgmodal
            {
                height: 200px;
                width: 200px;
            }
        }
        #eliminaModal
        {
            margin-top: 70px;
        }
    </style>
    <title>PARA LLEVAR</title>
</head>
<body>
<nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="validacionAdmin.php">
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
                    <a class="nav-link" style="color: white;" href="ParaLlevar.php">Regresar</a>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../class/cerrarsesion.php">Cerrar sesión</a>
                </li>
            </ul>
            </div>
        </div>
</nav>
    
    <div class="container contenedor">
        <div class="table-responsive" style="margin-top: 100px;">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                      <th>Producto</th>
                      <th>Precio Unitario</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                      <th></th>
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
                        <td><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></td>
                        <td>
                            <input type="number" min="1" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                        </td>
                        <td>
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                            </div>
                        </td>
                        <td>
                            <a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>

                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="H3">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                        </td>
                    </tr>
                </tbody>
                <?php 
                    }
                ?>
            </table>
        </div>

        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="pago_Pllevar.php" class="btn btn-dark btn-lg">Realizar pago</a>
            </div>
        </div>
    </div>

    <!--MODAL-->
    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminaModalLabel">¡Atención!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar el producto de la lista?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
    </div>
    
    <script>
        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event)
        {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value = id
        })

        function actualizaCantidad (cantidad, id)
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

        function eliminar()
        {
            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value

            let url = '../class/actualizar_orden.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
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
                    location.reload()
                }
            })
        }
    </script>

</body>
</html>