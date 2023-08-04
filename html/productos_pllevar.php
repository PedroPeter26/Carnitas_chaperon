<?php
    require '../class/config.php';
    require '../class/databaseInt.php';
    $db = new Database();
    $db->conectarBD();
    $pdo = $db->getConexion();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;


    $sql = $pdo->prepare("select producto_id, nombre, precio_app from productos where status='Activo'");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    //session_destroy();
    //print_r($_SESSION);
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
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
            width: 100%;
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
                    <a class="btn btn-danger" style="color: white;" href="checkout_pllevar.php">
                        Orden <span id="num_cart" class="badge"><?php echo $num_cart; ?></span>
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../class/cerrarsesion.php">Cerrar sesión</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="contenedor">
        <!--TABS: PRODUCTOS-->
        <nav style="margin-top: 70px; position:fixed; width: 100%; z-index: 1200; background-color: #F4F6F6;">
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
        <div class="tab-content" style="padding-top: 10em;">

        <!--Productos (TAB CARNITAS)-->
        <div class="tab-pane fade show active" id="Carnitas">
            <div class="container cont">
                <div class="row">
                <?php
                    $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO1' and productos.disponibilidad = 'Ambos' and status='Activo'");
                    $sentencia->execute();
                    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    
                ?>
                <?php
                    foreach ($listaProductos as $producto)
                    {
                ?>
                        <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                            <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                <?php 
                                $id = $producto['producto_id'];
                                ?>
                                <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                    <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ',');?></p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB TACOS)-->
        <div class="tab-pane fade show" id="Tacos">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO2' and productos.disponibilidad = 'Ambos' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB LONCHES)-->
        <div class="tab-pane fade show" id="Lonches">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO3' and productos.disponibilidad = 'Ambos' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB GRINGAS)-->
        <div class="tab-pane fade show" id="Gringas">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO4' and productos.disponibilidad = 'Ambos' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB CHICHARRONES)-->
        <div class="tab-pane fade show" id="Chicharrones">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO5' and productos.disponibilidad = 'Ambos' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB PAQUETES)-->
        <div class="tab-pane fade show" id="Paquetes">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO6' and productos.disponibilidad = 'Rapido' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB BEBIDAS)-->
        <div class="tab-pane fade show" id="Bebidas">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO7' and productos.disponibilidad = 'Ambos' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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

        <!--Productos (TAB COMPLEMENTOS)-->
        <div class="tab-pane fade show" id="Complementos">
            <div class="container cont">
                <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.tipo = 'TIPO8' and productos.disponibilidad = 'Rapido' and status='Activo'");
                        $sentencia->execute();
                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            
                    ?>
                    <?php
                        foreach ($listaProductos as $producto)
                        {
                    ?>
                            <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center align-items-center mb-4">
                                <div class="card contenidocards" style="width: 18rem; top: 0px;">
                                    <?php 
                                        $id = $producto['producto_id'];
                                    ?>
                                    <img src="<?php echo $producto['img'];?>" class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre'];?></h5>
                                        <p class="card-text">Precio: <?php echo MONEDA . number_format($producto['precio_app'], 2, '.', ','); ?></p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button class="btn btn-dark justify-content-md-end" type="button" onclick="addProducto(<?php echo $producto['producto_id']; ?>, '<?php echo hash_hmac('sha1', $id, KEY_TOKEN); ?>')">Agregar</button>
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
    </div>
    </div>

    
    <script>
        function addProducto(id, token)
        {
            let url = '../class/ordenrapido.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url,
            {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then (data => {
                if(data.ok)
                {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>

</body>
</html>