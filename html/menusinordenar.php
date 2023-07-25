<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
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
    </style>
    <title>Menú</title>
</head>
<body style="background-color: #EFE2CF;">

    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="menusinordenar.php">Menú</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="" data-bs-toggle="modal" data-bs-target="#ubi">Ubicación</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="login.php">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--MODAL DE LA UBICACIÓN-->
    <div class="modal fade" id="ubi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1300;">
        <div class="modal-dialog modal-lg modalubi d-flex flex-column bd-highlight mb-3 mt-130">
        <div class="modal-content">
            <div class="modal-header titulomodalnav">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubicación</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body map-container">
                <!--MAPA-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14400.397610338885!2d-103.35858221134589!3d25.535065606318522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fc4bc9259d303%3A0x5ef7783b2f06f08!2sCarnitas%20Tacos%20Y%20Lunches%20El%20Chaperon!5e0!3m2!1ses!2smx!4v1687797463276!5m2!1ses!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="modal-footer titulomodalnav">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>

    <!--TABS: PRODUCTOS-->
    <nav style="top: 70px; width: 100%; background-color: #F9EFE1;">
        <ul class="nav nav-underline nav-fill ms-3 me-3">
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
                <a class="nav-link" href="#Bebidas" data-bs-toggle="tab">Bebidas</a>
            </li>
        </ul>
    </nav>

    <!--CONTENIDO-->
    <div class="container tab-content contenido">
        <!--CARNITAS-->
        <div class="tab-pane fade show active" id="Carnitas" style="text-align: justify;">
            <div class="container principal">
                <!--CARNITAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Carnitas</h2>
                    <!--CARD-->
                    <?php
                        include '../class/databaseInt.php';
                        $db = new Database();
                        $db->conectarBD();
                        
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO1' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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

        <!--TACOS-->
        <div class="tab-pane fade" id="Tacos" style="text-align: justify;">
            <div class="container principal">
                <!--TACOS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Tacos</h2>
                    <!--CARD-->
                    <?php
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO2' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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

        <!--LONCHES-->
        <div class="tab-pane fade" id="Lonches" style="text-align: justify;">
            <div class="container principal">
                <!--LONCHES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Lonches</h2>
                    <!--CARD-->
                    <?php
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO3' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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

        <!--GRINGAS-->
        <div class="tab-pane fade" id="Gringas" style="text-align: justify;">
            <div class="container principal">
                <!--GRINGAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Gringas</h2>
                    <!--CARD-->
                    <?php
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO4' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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

        <!--CHICHARRONES-->
        <div class="tab-pane fade" id="Chicharrones" style="text-align: justify;">
            <div class="container principal">
                <!--CHICHARRONES-->
                <div class="row mb-5">
                    <h2 class="mb-4">Chicharrones</h2>
                    <!--CARD-->
                    <?php
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO5' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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

        <!--BEBIDAS-->
        <div class="tab-pane fade" id="Bebidas" style="text-align: justify;">
            <div class="container principal">
                <!--BEBIDAS-->
                <div class="row mb-5">
                    <h2 class="mb-4">Bebidas</h2>
                    <!--CARD-->
                    <?php
                        $consulta="SELECT * FROM productos where disponibilidad<>'Comedor' and tipo='TIPO7' and status='Activo'";
                        $resultados = $db->seleccionar($consulta);
                        $resultados->execute();
                        $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                        foreach ($listaproductos as $producto)
                        {
                            // Convertir el array del producto en una cadena JSON
                            $producto_json = json_encode($producto);
                    ?>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                            <div class="row g-0 rounded" style="background-color: #FCF4E9; height: 150px;">
                                <div class="col-5 col-md-5 col-lg-4">
                                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-start" alt="<?php echo $producto['nombre']; ?>" style="height: 150px; width: 180px;">
                                </div>
                                <div class="col-7 col-md-7 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                        <p class="card-text">$<?php echo $producto['precio_app']; ?></p>
                                        <!-- Agregar el atributo data-bs-producto con la información del producto -->
                                        <p class="card-text">
                                            <small class="text-body-secondary">
                                            <a href="#" style="text-decoration: none; color: black;" data-bs-toggle="modal" data-bs-target="#modalproductos" data-bs-producto='<?php echo $producto_json; ?>'>Más información</a>
                                            </small>
                                        </p>
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
    </div>

    <!--MODAL: PRODUCTOS-->
    <div class="modal fade modalproductos" id="modalproductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #EFE2CF;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-producto-nombre"></h5>
                        </div>
                        <div class="modal-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 justify-content-center d-flex align-items-center p-2">
                                    <img id="modal-producto-imagen" class="img-fluid rounded-start rounded-end imgmodal" alt="">
                                </div>
                                <div class="col-12 col-md-12 col-lg-6" style="padding: 30px; padding-left: 50px;">
                                    <h4 id="modal-producto-name"></h4>
                                    <h5><b id="modal-producto-precio"></b></h5><br>
                                    Descripción:
                                    <p id="modal-producto-descripcion" style="text-align: justify"></p>
                                    <small>Precio en comedor: <b id="modal-producto-precio-comedor"></b></small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-ok" type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
    </div>

    <!--CREAR INSTANCIA PARA PODER MANDAR LOS DETALLES DE CADA PRODUCTO CORRECTAMENTE AL MDOAL-->
    <script>
        // Crear una instancia del modal
        var modalProductos = new bootstrap.Modal(document.getElementById('modalproductos'));

        // Función para mostrar la información del producto en el modal cuando se hace clic en "Más información"
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var producto = JSON.parse(link.getAttribute('data-bs-producto'));

                // Actualiza el contenido del modal con los detalles del producto
                document.getElementById('modal-producto-nombre').innerText = producto.nombre;
                document.getElementById('modal-producto-name').innerText = producto.nombre;
                document.getElementById('modal-producto-precio').innerText = '$' + producto.precio_app;
                document.getElementById('modal-producto-descripcion').innerText = producto.descripcion;
                document.getElementById('modal-producto-precio-comedor').innerText = '$' + producto.precio_com;
                document.getElementById('modal-producto-imagen').src = producto.img;
                document.getElementById('modal-producto-imagen').alt = producto.nombre;

                // Muestra el modal
                modalProductos.show();
            });
        });

        // Agregar el evento click al botón "OK"
        document.getElementById('btn-ok').addEventListener('click', function() {
            // Aquí puedes realizar las acciones que desees antes de ocultar el modal
            // Por ejemplo, guardar datos, enviar una solicitud al servidor, etc.

            // Luego, oculta el modal
            modalProductos.hide();
        });
    </script>

</body>
</html>