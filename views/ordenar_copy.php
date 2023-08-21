<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
require '../class/config.php';

$sentenciaTipos = $pdo->prepare("SELECT * FROM TIPOS");
$sentenciaTipos->execute();
$listaTipos = $sentenciaTipos->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Ordenar</title>
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                <a class="btn btn-warning" href="../checkout.php">Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="ordenar.php">Ordenar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="menu1.php">Menú</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="../scripts/logout.php">Cerrar sesión</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    </header>
    
    <!-- Nav Bar de comidas -->

    <!-- Contenido principal -->
    <div class="container mt-5">
    <div class="content-section mt-5">
            <form id="filtroForm" method="get"> <!-- Asegúrate de usar el método "get" en el formulario -->
                <select class="form-select mb-3" id="tipo_filtro" name="tipo_filtro">
                    <option value="">Todos los tipos</option>
                    <?php foreach($listaTipos as $tipo): ?>
                        <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-warning btn-lg" id="btnAplicarFiltro">Filtrar</button>
            </form>

        <?php
            $tipoFiltro = isset($_GET['tipo_filtro']) ? $_GET['tipo_filtro'] : '';

            if (!empty($tipoFiltro)) {
                $sql = "SELECT * FROM PRODUCTOS WHERE (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo' AND tipo = :tipo";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':tipo', $tipoFiltro, PDO::PARAM_STR);
            } else {
                $sql = "SELECT * FROM PRODUCTOS WHERE (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo'";
                $stmt = $pdo->prepare($sql);
            }
            
            $stmt->execute();
            $listaProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row">
            <?php foreach($listaProductos as $producto){ ?>
                <div class="col-3">
                    <?php $id = $producto['producto_id'];?>
                    <div class="card">
                        <img
                        title="Titulo producto"
                        alt="Título"
                        class="card-img-top"
                        src="<?php echo $producto['img'];?>"
                        >
                        <div class="card-body">
                            <span><?php echo $producto['nombre'];?></span>
                            <h5 class="card-title">$<?php echo $producto['precio_app']?></h5>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prodAgregado"
                            onclick="addProducto(<?php echo $producto['producto_id']; ?>)">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

        <div class="modal fade" id="prodAgregado" tabindex="-1" aria-labelledby="prodAgregadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prodAgregadoLabel">¡Producto agregado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Se ha agregdo un nuevo producto a la orden.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
                </div>
            </div>
        </div>

  <script>
    document.getElementById('btnAplicarFiltro').addEventListener('click', function() {
        const tipoFiltro = document.getElementById('tipo_filtro').value;
        let url = 'ordenar_copy.php';
        
        // Agrega el filtro de tipo de producto a la URL si está seleccionado
        if (tipoFiltro) {
            url += '?tipo_filtro=' + tipoFiltro;
        }
        
        // Redirecciona a la página con el filtro aplicado
        window.location.href = url;
    });


    function addProducto(producto_id) {
        let url = '../class/carrito.php'
        let formData = new FormData()
        formData.append('producto_id', producto_id)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }
  </script>

</body>
</html>