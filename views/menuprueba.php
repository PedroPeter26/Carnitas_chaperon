<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

        <style>
            .card {
                max-height: 400px;
            }
            .card-img-top {
                object-fit: fill;
                max-height: 200px;
            }
        </style>
        
    </head>
  <body>
    <h1>Hello, world!</h1>

    <?php
         $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido'");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class="row">
            <?php foreach($listaProductos as $producto){ ?>
                <div class="col-12 col-md-6 col-lg-4">
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
                            <button class="btn btn-primary" name="btnAccion" type="button" data-bs-toggle="modal" data-bs-target="#<?php echo $producto['producto_id'];?>">
                                Más información
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="<?php echo $producto['producto_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle-<?php echo $producto['producto_id'];?>"><?php echo $producto['nombre'];?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3><?php echo $producto['nombre'];?></h3>
                                <h5>Comedor: $<?php echo $producto['precio_com'];?></h5><br>
                                <h5>Para llevar y app: $<?php echo $producto['precio_app'];?></h5><br>
                                <h4>Descripción</h4>
                                <span><?php echo $producto['descripcion'];?></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>



        </div>

  </body>
</html>