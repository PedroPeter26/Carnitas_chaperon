<?php
require '../class/config.php';
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){

    $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo'");
    $sentencia->execute([$clave]);
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

    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-6" style="color: white;">
                <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../index.php">Regresar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="ordenar.php">Ordenar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="menuSinOrdenar.php">Menú</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                </li>
                <?php
                    if (isset($_SESSION["usuario"]))
                    {
                    echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="perfil_usuario.php">
                                Perfil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../class/cerrarsesion.php">Cerrar sesión</a>
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
    <div class="table-responsive">
        <table class="table mt-5">
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
                    <td><?php echo MONEDA . $precio_app; ?></td>
                    <td>
                        <input type="number" min="1" max="30" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                    </td>
                    <td>
                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                        <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <a id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
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
                <a href="pago_online.php" class="btn btn-warning btn-lg">Realizar pago</a>
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
            ¿Desea eliminar el producto del carrito?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
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
        
        let url = '../class/actualizar_carrito.php'
        let formData = new FormData()
        formData.append('action', 'agregar')
        formData.append('_id', _id)
        formData.append('cantidad', cantidad)

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

    function eliminar() {

        let botonElimina = document.getElementById('btn-elimina')
        let _id = botonElimina.value

        let url = '../class/actualizar_carrito.php'
        let formData = new FormData()
        formData.append('action', 'eliminar')
        formData.append('_id', _id)

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