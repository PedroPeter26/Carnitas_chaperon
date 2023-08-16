<?php
require '../../class/config.php';
include '../../class/database.php';
$db = new database();
$db->conectarDB();
$pdo = $db->getConexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes Online</title>
    <?php include '../headadmin.php'; ?>
    <!-- Incluye los archivos de estilo y scripts necesarios aquí -->
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="content-wrapper">
        <br>
        <div class="row">
            <?php
            try {
                $sql = $pdo->prepare("SELECT
                ORDENES.orden_id,
                USUARIOS.user AS Cliente,
                PRODUCTOS.nombre AS Nombre_Producto,
                ORDENES.hora_inicio as 'hi',
                ORDENES.fecha,
                PRODUCTOS.precio_app,
                SUM(DETALLE_ORDEN.cantidad) AS Cantidad_Total,
                (PRODUCTOS.precio_app * SUM(DETALLE_ORDEN.cantidad)) AS Subtotal
                FROM ORDENES
                INNER JOIN USUARIOS ON ORDENES.cliente = USUARIOS.user_id
                INNER JOIN DETALLE_ORDEN ON ORDENES.orden_id = DETALLE_ORDEN.orden
                INNER JOIN PRODUCTOS ON DETALLE_ORDEN.producto = PRODUCTOS.producto_id
                WHERE ORDENES.status = 'Proceso'
                GROUP BY ORDENES.orden_id
                ORDER BY ORDENES.orden_id DESC;
            ");

                $sql->execute();

                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $orden_id = $row["orden_id"];
                    $fecha_orden = $row["fecha"];
                    $nombre_usuario = $row["Cliente"];
                    $hora_inicio = $row["hi"];
                    $total = 0;
            ?>


                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card ms-4 me-4 p-3">
                            <div class="card-header">
                                <h4>Orden ID: <?php echo $orden_id; ?></h4>
                                <p>Fecha de Orden: <?php echo $fecha_orden; ?> Hora: <?php echo $hora_inicio ?></p>
                            </div>
                            <div class="card-body">
                                <h5>Cliente: <b> <?php echo $nombre_usuario; ?> </b> </h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $orden_id; ?>">
                                        Abrir modal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para la orden <?php echo $orden_id; ?> -->
                    <div class="modal fade " id="exampleModalToggle<?php echo $orden_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <!-- Contenido del modal aquí -->
                    </div>

            <?php
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detalle de la orden</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($result as $row1) {
                                $producto = $row1["Nombre_Producto"];
                                $precio = $row1["precio_app"];
                                $cantidad = $row1["Cantidad_Total"];
                                $subtotal = $row1["Subtotal"];
                            }
                            echo "<table class='table table-striped table-warning table-hover '>
                            <thead>
                            <tr>
                            <th scope='col'>Producto</th><th scope='col'>Precio</th><th scope='col'>Cantidad</th><th scope='col'>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>";
                            echo "<tr>
                            <td>$producto</td>
                            <td>$precio</td>
                            <td>$cantidad</td>
                            <td>$subtotal</td>
                            </tr>";
                            echo "</tbody>               
                            </table>";
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Hide this modal and show the first with the button below.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Más información</button>
        </div>
        <br>
    </div>

    <?php include '../footeradmin.php'; ?>
    <!-- Incluye los scripts necesarios aquí -->
</body>

</html>