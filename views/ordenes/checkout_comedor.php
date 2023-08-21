<?php
include '../../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
require '../../class/configcom.php';

$mesa_id = isset($_GET['mesa_id']) ? $_GET['mesa_id'] : null;
if ($mesa_id === null) {
    echo "Error: No se proporcionó el parámetro mesa_id en la URL.";
    exit;
}

$pagina_anterior = "atender_mesa.php?mesa_id=" . $mesa_id;
$productos = isset($_SESSION['carrito'][$mesa_id]['productos']) ? $_SESSION['carrito'][$mesa_id]['productos'] : null;
$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){

    $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_com, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Comedor') AND status = 'Activo' AND $mesa_id = ?");
    $sentencia->execute([$clave, $mesa_id]);
    $lista_carrito[]=$sentencia->fetch(PDO::FETCH_ASSOC);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
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

    <title>Checkout comedor</title>
</head>
<body>
    <!-- Contenido principal -->
  <div class="container">
  <?php echo '<a href="' . $pagina_anterior . '" class="btn btn-success">Volver</a>'; ?>
    <div class="table-responsive">
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if($lista_carrito == null) {
                    echo '<tr><td colspan="5" class="text-center"><b>Orden vacía</b></td></tr>';
                    $estado = 'Disponible';
            
                    $sqlActualizarEstado = "UPDATE MESAS SET estado = :estado WHERE mesa_id = :mesa_id";
                    $stmtActualizarEstado = $pdo->prepare($sqlActualizarEstado);
                    $stmtActualizarEstado->bindParam(':estado', $estado, PDO::PARAM_STR);
                    $stmtActualizarEstado->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
                    $stmtActualizarEstado->execute();
                } else {
                    $total = 0;
                    foreach($lista_carrito as $producto){
                        $_id = $producto['producto_id'];
                        $nombre = $producto['nombre'];
                        $precio_com = $producto['precio_com'];
                        $cantidad = $producto['Cantidad'];
                        $subtotal = $cantidad * $precio_com;
                        $total += $subtotal;
                    ?>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo MONEDA . $precio_com; ?></td>
                    <td>
                        <input type="number" min="1" max="30" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onkeydown="return limitarInput(event)" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                    </td>
                    <td>
                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                        <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <a id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal" href="?mesa_id=<?php echo $mesa_id; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>

                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">
                        <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                    </td>
                </tr>

            </tbody>
            <?php } ?>
        </table>
    </div>

    <?php if($lista_carrito != null) { ?>
        <div class="row">
            <div class="col-md-5 offset-md-7 d-grid gap-2">
                <a href="pagocomedor.php?mesa_id=<?php echo $mesa_id; ?>" class="btn btn-warning btn-lg">Realizar pago</a>
            </div>
        </div>
    <?php } ?>
    
  </div>

  </div>

  <!-- Modal -->
    <div class="modal fade mt-5" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="eliminaModalLabel">¡Atención!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ¿Desea eliminar el producto de la orden?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <!--<button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button> -->
            <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar(<?php echo $mesa_id; ?>)">Eliminar</button>


        </div>
        </div>
    </div>
    </div>

  <script>

    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
        buttonElimina.value = id
    })

    function actualizaCantidad(cantidad, _id) {

        console.log('Cantidad:', cantidad);
        console.log('ID:', _id);
        
        let url = '../class/actualizarordencom.php'
        let formData = new FormData()
        formData.append('action', 'agregar')
        formData.append('_id', _id)
        formData.append('cantidad', cantidad)
        formData.append('mesa_id', <?php echo $mesa_id; ?>);

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            console.log('Respuesta:', data);
            if (data.ok) {

                let divsubtotal = document.getElementById('subtotal_' + _id)
                divsubtotal.innerHTML = data.sub

                let total = 0.00
                let list = document.getElementsByName('subtotal[]')

                for(let i = 0; i < list.length; i++){
                    total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                }

                total = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 2
                }).format(total)
                document.getElementById('total').innerHTML = '<?php echo MONEDA;?>' + total

            }
        })
    }

    function eliminar(mesa_id) {

        let botonElimina = document.getElementById('btn-elimina')
        let _id = botonElimina.value

        let url = '../class/actualizarordencom.php'
        let formData = new FormData()
        formData.append('action', 'eliminar')
        formData.append('_id', _id)
        formData.append('mesa_id', mesa_id)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                location.reload()
            }
        })
    }
  </script>

</body>
</html>