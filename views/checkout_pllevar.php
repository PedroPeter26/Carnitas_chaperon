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
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include "../headadmin.php"; ?>
    <title>PARA LLEVAR</title>
</head>
<body>
    <?php include '../sidebaradmin.php'; ?>
    
    <div class="content-wrapper p-4"  style="background-color: white;">

    <div class="container">

        <H3>PRODUCTOS DE LA ORDEN</H3>
        <div class="table-responsive" style="margin-top: 5%;">
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

        <?php if($lista_carrito != null) { ?>
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="pago_Pllevar.php" class="btn btn-dark btn-lg">Realizar pago</a>
            </div>
        </div>
        <?php } ?>
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

    <?php include '../footeradmin.php'; ?>

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
            let url = '../../class/actualizar_orden.php'
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

            let url = '../../class/actualizar_orden.php'
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