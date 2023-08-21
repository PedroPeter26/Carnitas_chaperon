<?php
include '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
require '../class/config.php';
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
        .navbar-container {
            position: sticky;
            z-index: 1;
            top: 0;
            height: 50px;
            width: 100%;
            /* Make sure it's above other elements */
        }
        nav {
            background-color: #212429;
        }

        a.barra1 {
            text-decoration: none;
            color: gold;
            font-family: 'Bricolage Grotesque', sans-serif;
        }

        a.barra1:hover {
            color: goldenrod;
        }

        @font-face {
            font-family: 'Lilita One';
            src: url(./LilitaOne-Regular.ttf);
        }

        .lilita {
            font-family: 'Lilita One';
        }

        .bg-header {
            background-color: #FCF0C8;
        }

        .bg-redmarron {
            background-color: #630A10;
        }

        .content-section {
            background-color: #FACE7F;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>

    <title>Ordenar</title>
</head>

<body>

        <!-- BARRA -->
    <div class="navbar-container" style="position:fixed;">
        <!--BARRA DE NAV 1-->
            <nav class="navbar navbar-expand-md navbar-light barranav sticky-top">
                <div class="container-fluid" style="width: 90%;">
                    <a class="navbar-brand" style="color: white;" href="index2.php">
                        <img src="../img/logo.png" alt="Logo" width="35" height="50"> <span style="font-family: 'Bricolage Grotesque', sans-serif;">CARNITAS CHAPERON</span>
                    </a>
                    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="true">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav dropdown-menu position-static gap-1 p-2 rounded-3 ms-auto shadow w-220px">
                            <li>
                                <a class="dropdown-item rounded-2" href="checkout.php">Carrito <span id="num_cart" class="badge bg-warning"><?php echo $num_cart ?></span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item rounded-2" href="views/ordenar.php">Ordenar</a></li>
                            <hr class="dropdown-divider">
                            <li class="dropstart"> <!--ABRE LOS ELEMENTOS PARA LA IZQUEIRDA-->
                                <a class="dropdown-item rounded-2 dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuario
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    <li>
                                        <a class="dropdown-item" href="views/perfil_usuario.php">
                                            Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="views/historial_de_compras.php">
                                            Historial de compras
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="class/cerrarsesion.php">Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    </div>

    <!-- Nav Bar de comidas -->

    <!-- Contenido principal -->
    <div class="container mt-5">
        <div class="content-section">
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo'");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <div class="row">
                <?php foreach ($listaProductos as $producto) { ?>
                    <div class="col-3">
                        <?php $id = $producto['producto_id']; ?>
                        <div class="card">
                            <img title="Titulo producto" alt="Título" class="card-img-top" src="<?php echo $producto['img']; ?>">
                            <div class="card-body">
                                <span><?php echo $producto['nombre']; ?></span>
                                <h5 class="card-title">$<?php echo $producto['precio_app'] ?></h5>
                                <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>)">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>

    <script>
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