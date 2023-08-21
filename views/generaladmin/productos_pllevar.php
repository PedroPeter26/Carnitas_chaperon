<?php
require '../../class/config.php';
require '../../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

$PRODUCTOS = isset($_SESSION['carrito']['PRODUCTOS']) ? $_SESSION['carrito']['PRODUCTOS'] : null;

$sql = $pdo->prepare("SELECT producto_id, nombre, precio_app from PRODUCTOS where status='Activo'");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
    <!--FUENTE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Bricolage+Grotesque:opsz,wght@10..48,500&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <?php include "../headadmin.php"; ?>
    <title>Órdenes para llevar</title>
    <style>
        .nav-link:not(.active) {
            color: brown;
        }
    </style>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="content-wrapper p-4" style="background-color: white;">


        <div class="container contenido">
            <!--TABS: PRODUCTOS-->
            <nav style="margin-bottom: 4%;">
                <ul class="nav nav-underline nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Carnitas" data-bs-toggle="tab">Carnitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Tacos" data-bs-toggle="tab">Tacos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Lonches" data-bs-toggle="tab">Lonches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Gringas" data-bs-toggle="tab">Gringas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Chicharrones" data-bs-toggle="tab">Chicharrones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Paquetes" data-bs-toggle="tab">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Complementos" data-bs-toggle="tab">Complementos</a>
                    </li>
                </ul>
            </nav>

            <!--Contenido Tabs-->
            <div class="tab-content">
                <div class="row">
                    <div class="col-9 col-md-9 col-lg-9 p-2">
                        <h3 style="font-family: 'Bricolage Grotesque', sans-serif;">Orden para llevar</h3> <br>
                    </div>
                    <div class="col-3 col-md-3 col-lg-3 align-items-end">
                        <a class="btn btn-dark" href="checkout_pllevar.php">Ver orden</a>
                    </div>
                </div>


                <!--PRODUCTOS (TAB CARNITAS)-->
                <div class="tab-pane fade show active" id="Carnitas">
                    <div class="container cont">
                        <div class="row">

                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO1' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB TACOS)-->
                <div class="tab-pane fade show" id="Tacos">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO2' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaPRODUCTOS = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaPRODUCTOS as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB LONCHES)-->
                <div class="tab-pane fade show" id="Lonches">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO3' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB GRINGAS)-->
                <div class="tab-pane fade show" id="Gringas">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO4' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB CHICHARRONES)-->
                <div class="tab-pane fade show" id="Chicharrones">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO5' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB PAQUETES)-->
                <div class="tab-pane fade show" id="Paquetes">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO6' and PRODUCTOS.disponibilidad = 'Rapido' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB BEBIDAS)-->
                <div class="tab-pane fade show" id="Bebidas">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO7' and PRODUCTOS.disponibilidad = 'Ambos' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!--PRODUCTOS (TAB COMPLEMENTOS)-->
                <div class="tab-pane fade show" id="Complementos">
                    <div class="container cont">
                        <div class="row">
                            <?php
                            $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTOS.tipo = 'TIPO8' and PRODUCTOS.disponibilidad = 'Rapido' and status='Activo'");
                            $sentencia->execute();
                            $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php
                            foreach ($listaproductos as $producto) {
                            ?>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="card mb-3 rounded-3" style="border: 2px solid black; max-width: 540px;">
                                        <?php
                                        $id = $producto['producto_id'];
                                        ?>
                                        <div class="row g-0 rounded" style="height: 150px;">
                                            <div class="col-5 col-md-5 col-lg-4">
                                                <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                            </div>
                                            <div class="col-7 col-md-7 col-lg-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b><?php echo $producto['nombre']; ?></b></h5>
                                                    <p class="card-text pt-3">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')" data-bs-toggle="modal" data-bs-target="#prodAgregado">Agregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="modal fade" style="margin-top: 10%;" id="prodAgregado" tabindex="-1" aria-labelledby="prodAgregadoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="prodAgregadoLabel">¡Atención!</h5>
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
            </div>
        </div>

        <?php include '../footeradmin.php'; ?>

    </div>


    <script>
        function addProducto(id, token) {
            let url = '../../class/ordenrapido.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

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