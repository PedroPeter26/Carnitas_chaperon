<?php
    // Obtener el ID de la mesa desde la URL.
    if (isset($_GET['mesa']))
    {
        $mesa_id = $_GET['mesa'];
    }
    else
    {
        echo "<div class='alert alert-danger'-success>
                No se eligió una mesa aún.
            </div>";
        exit;
    }
    ?>

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
    <title>Productos</title>
    <style>
        .barranav
        {
            height: 70px;
            background-image: url(../../img/barranav1.jpg);
            background-size:contain;
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
        /*COLOR DE LOS TABS NO ACTIVOS*/
        .nav-link:not(.active)
        {
            color: brown;
        }
        .contenido
        {
            margin-top: 30px;
        }
        h5
        {
            font-family: 'Belanosima', sans-serif;
            font-size: 19px;
        }
        p
        {
            font-family: 'Belanosima', sans-serif;
            font-size: 16px;
        }
        .cardcarnes, .cardtacos
        {
            border: none;
            height: 150px;
            background-color: #FCF4E9;
        }
        @media screen and (max-width: 576px) /*Pantalla pequeña*/
        {
            .cardtacos
            {
                border: none;
                height: 165px;
                background-color: #FCF4E9;
            }
        }
        
    </style>
</head>
<body style="background-color: #EFE2CF;">
    <!--BARRA DE NAV-->
    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search" name="producto">
                    <input href="buscarproducto.php" class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" value="Buscar" name="verificar">
                </form>
            </ul>
            </div>
        </div>
    </nav>

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
                        <h2 class="mb-4" id="Carnitas">Carnitas</h2>
                        <!--CARD-->
                        <?php
                            include '../../class/databaseInt.php';
                            $db = new Database();
                            $db->conectarBD();
                            
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO1'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO2'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO3'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO4'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO5'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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
                        <!--CARD-->
                        <?php
                            $consulta="SELECT * FROM productos where disponibilidad<>'Rapido' and tipo='TIPO7'";
                            $resultados = $db->seleccionar($consulta);
                            $resultados->execute();
                            $listaproductos=$resultados->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php
                            foreach ($listaproductos as $producto)
                            {
                        ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card mb-3 cardcarnes" style="max-width: 540px;">
                                    <div class="row g-0 rounded">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                                <p class="card-text">$<?php echo $producto['precio_com']; ?></p>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end p-2">

                                            <form action="carrito.php" method="post">

                                                <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo $producto['producto_id']; ?>">
                                                <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                                <input type="hidden" name="precio" id="precio" value="$<?php echo $producto['precio_com']; ?>">

                                                <button class="btn btn-dark btn-sm justify-content-md-end" type="submit" style="height: 40px;" name="btnAccion" value="Agregar">Agregar</button>
                                            </form>
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

</body>
</html>