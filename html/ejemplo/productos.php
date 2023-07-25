<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
    <?php
    // Obtener el ID de la mesa desde la URL.
    if (isset($_GET['mesa'])) {
        $mesa_id = $_GET['mesa'];
    } else {
        echo "<div class='alert alert-danger'-success>
                No hay productos en la orden aún.
            </div>";
        exit;
    }
    ?>

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
                            
                            $consulta = "SELECT * FROM productos WHERE disponibilidad <> 'Rapido'";
                            $stmt = $db->seleccionar($consulta);
                            $stmt->execute();
                            $listaproductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                                <input type="hidden" name="producto_id" value="<?php echo $producto['producto_id']; ?>">
                                                <button type="submit" name="btnAcción" value="Agregar">Agregar</button>
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