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
    <style>
        .box {
            display: inline-flex;
            /* Mostrar en la misma línea */
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }

        .icon {
            width: 20px;
            height: 20px;
            border-radius: 3px;
            margin-right: 10px;
        }

        .message {
            font-size: 16px;
        }
    </style>
<<<<<<< Updated upstream
=======
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZqK5f5JSMVRg8M8Ax3n3MCIyJTQUh4nCf2a0X+Hp6z1LyLvJ5m9h5n2mwVU6BvLE" crossorigin="anonymous"></script>
>>>>>>> Stashed changes
    <?php include '../headadmin.php'; ?>
    <?php include '../footeradmin.php'; ?>
</head>

<body>
    <?php include '../sidebaradmin.php'; ?>

    <div class="content-wrapper">

        <h2 class="p-4">Órdenes Online</h2>
<<<<<<< Updated upstream
        <div class="container">
    <div class="row">
        <div class="col-4">
            <div class="box ps-2 pb-4">
                <div class="icon bg-warning"></div>
                <div class="message">
                    Órdenes pendientes
=======

        <!--ACCORDION PARA LOS FILTROS-->
        <div class="accordion accordion-flush mb-3 ms-3 me-3" id=" accordionFlushExample">
            <!--ITEM 1-->
            <div class="accordion-item">
                <!--ENCABEZADO DEL PRIMER ITEM-->
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span style="font-size: 18px;"> Buscar ordenes por usuario </span>
                    </button>
                </h2>
                <!--CONTENIDO DEL PRIMER ITEM (FILTRO POR PRECIO)-->
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="padding: 20px;">
                        <!--FORM PARA BUSCAR USUARIOS POR USER-->
                        <div class="container rounded-div pt-3 pb-3 pe-4 ps-4" style="background-color: #EFEDED;">
                            <h3>Buscar órdenes </h3>
                            <form action="ordenes_online.php" method="POST">
                                <div class="row">
                                    <div class="col-4 col-md-6 col-lg-6">
                                        <label for="user" class="form-label">User: <small>(Solo se busca por user)</small> </label>
                                        <input type="text" id="user" name="user" class="form-control" placeholder="Escribe el user del usuario...">
                                    </div>
                                    <div class="d-grid gap-2 col-4 col-md-3 col-lg-3 mt-auto" >
                                        <input class="btn btn-dark col-12" type="submit" name="buscar" value="Buscar">
                                    </div>
                                    <div class="d-grid gap-2 col-4 col-md-3 col-lg-3 mt-auto">
                                        <a href="usuarios.php">
                                            <input type="submit" class="btn btn-dark col-12" name="borrar" id="borrar" value="Limpiar" onclick="setDefaultOption2()">
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>

<<<<<<< Updated upstream
        <div class="col-4">
            <div class="box ps-2 pb-4">
                <div class="icon bg-info"></div>
                <div class="message">
                    Órdenes en proceso
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="box ps-2 pb-4">
                <div class="icon bg-success"></div>
                <div class="message">
                    Órdenes finalizadas
                </div>
            </div>
        </div>
    </div>
</div>
=======



        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="box ps-2 pb-4">
                        <div class="icon bg-warning"></div>
                        <div class="message">
                            Órdenes pendientes
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box ps-2 pb-4">
                        <div class="icon bg-info"></div>
                        <div class="message">
                            Órdenes en proceso
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box ps-2 pb-4">
                        <div class="icon bg-success"></div>
                        <div class="message">
                            Órdenes finalizadas
                        </div>
                    </div>
                </div>
            </div>
        </div>
>>>>>>> Stashed changes


        <div class="row mb-5">

            <!--CONSULTA A LA BD DE LOS CARDS-->
            <?php
<<<<<<< Updated upstream
            $sql = $pdo->prepare("SELECT
                        ORDENES.orden_id AS ORDEN_ID,
                        USUARIOS.user AS CLIENTE,
                        ORDENES.hora_inicio AS HORA_INICIO,
                        ORDENES.fecha AS FECHA, 
                        ORDENES.status as ESTADO /*Hasta aquí son datos del card*/
                        FROM ORDENES
                        INNER JOIN USUARIOS ON ORDENES.cliente = USUARIOS.user_id
                        WHERE ORDENES.tipo_orden = 1
                        GROUP BY ORDENES.orden_id
                        ORDER BY ORDENES.orden_id DESC;
                        ");
=======
            if (!empty($_POST['buscar'])) {
                $userToSearch = $_POST['user'];

                $sql = $pdo->prepare("SELECT
                ORDENES.orden_id AS ORDEN_ID,
                USUARIOS.user AS CLIENTE,
                ORDENES.hora_inicio AS HORA_INICIO,
                ORDENES.fecha AS FECHA, 
                ORDENES.status as ESTADO /*Hasta aquí son datos del card*/
                FROM ORDENES
                INNER JOIN USUARIOS ON ORDENES.cliente = USUARIOS.user_id
                WHERE ORDENES.tipo_orden = 1
                AND user = :userToSearch
                GROUP BY ORDENES.orden_id
                ORDER BY ORDENES.orden_id DESC;
                ");
                $sql->bindParam(':userToSearch', $userToSearch);
            } else {
                $sql = $pdo->prepare("SELECT
                ORDENES.orden_id AS ORDEN_ID,
                USUARIOS.user AS CLIENTE,
                ORDENES.hora_inicio AS HORA_INICIO,
                ORDENES.fecha AS FECHA, 
                ORDENES.status as ESTADO /*Hasta aquí son datos del card*/
                FROM ORDENES
                INNER JOIN USUARIOS ON ORDENES.cliente = USUARIOS.user_id
                WHERE ORDENES.tipo_orden = 1
                GROUP BY ORDENES.orden_id
                ORDER BY ORDENES.orden_id DESC;
                ");
            }

>>>>>>> Stashed changes
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $orden) {

                // Consulta para obtener los detalles de productos para la orden actual
                $sql_products = $pdo->prepare("SELECT
                        PRODUCTOS.nombre AS PRODUCTO,
                        DETALLE_ORDEN.cantidad AS CANTIDAD,
                        PRODUCTOS.precio_app AS PRECIO,
                        (DETALLE_ORDEN.cantidad * PRODUCTOS.precio_app) AS SUBTOTAL
                        FROM DETALLE_ORDEN
                        INNER JOIN PRODUCTOS ON DETALLE_ORDEN.producto = PRODUCTOS.producto_id
                        WHERE DETALLE_ORDEN.orden = :orden_id
                        ");
                $sql_products->bindParam(':orden_id', $orden['ORDEN_ID']);
                $sql_products->execute();
                $products = $sql_products->fetchAll(PDO::FETCH_ASSOC); /*GUARDAMOS EN $products LA LISTA DE PRODUCTOS QUE CONSUMIO ESA ORDEN*/
            ?>

                <?php
                if ($orden['ESTADO'] == 'Pendiente') {
                ?>

                    <!--CARDS DE LAS ORDENES DE ACUERDO A LA CONSULTA Y AL FOREACH-->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card ms-4 me-4 pt-3 bg-warning">
                            <div class="card-header">
                                <h4>Orden ID: <?php echo $orden['ORDEN_ID']; ?></h4>
                                <p>Fecha: <?php echo $orden['FECHA']; ?> </p>
                                <p>Hora: <?php echo $orden['HORA_INICIO']; ?></p>
                            </div>
                            <div class="card-body">
                                <h5>Cliente: <b> <?php echo $orden['CLIENTE']; ?> </b> </h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle<?php echo $orden['ORDEN_ID']; ?>" data-bs-toggle="modal">Ver detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

                <?php
                if ($orden['ESTADO'] == 'Proceso') {
                ?>

                    <!--CARDS DE LAS ORDENES DE ACUERDO A LA CONSULTA Y AL FOREACH-->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card ms-4 me-4 pt-3 bg-info">
                            <div class="card-header">
                                <h4>Orden ID: <?php echo $orden['ORDEN_ID']; ?></h4>
                                <p>Fecha: <?php echo $orden['FECHA']; ?> </p>
                                <p>Hora: <?php echo $orden['HORA_INICIO']; ?></p>
                            </div>
                            <div class="card-body">
                                <h5>Cliente: <b> <?php echo $orden['CLIENTE']; ?> </b> </h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle<?php echo $orden['ORDEN_ID']; ?>" data-bs-toggle="modal">Ver detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

                <?php
                if ($orden['ESTADO'] == 'Finalizado') {
                ?>

                    <!--CARDS DE LAS ORDENES DE ACUERDO A LA CONSULTA Y AL FOREACH-->
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card ms-4 me-4 pt-3 bg-success">
                            <div class="card-header">
                                <h4>Orden ID: <?php echo $orden['ORDEN_ID']; ?></h4>
                                <p>Fecha: <?php echo $orden['FECHA']; ?> </p>
                                <p>Hora: <?php echo $orden['HORA_INICIO']; ?></p>
                            </div>
                            <div class="card-body">
                                <h5>Cliente: <b> <?php echo $orden['CLIENTE']; ?> </b> </h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle<?php echo $orden['ORDEN_ID']; ?>" data-bs-toggle="modal">Ver detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

                <!--MODAL 1: DETALLE DE LA ORDEN-->
                <!-- Modal for the order <?php echo $orden['ORDEN_ID']; ?> -->
                <div class="modal fade" id="exampleModalToggle<?php echo $orden['ORDEN_ID']; ?>" aria-hidden="true" role="dialog" aria-labelledby="myModalLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">DETALLE DE LA ORDEN</h1>
                                    </div>
                                    <div class="col-12">
                                        <small>Estado de la orden: <b><?php echo $orden['ESTADO'] ?> </b></small>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class='table table-striped table-warning table-hover'>
                                    <thead>
                                        <tr>
                                            <th style='width: 40%;'>Producto</th>
                                            <th style='width: 25%;'>Precio</th>
                                            <th style='width: 10%;'>Cantidad</th>
                                            <th style='width: 25%;'>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) { ?>
                                            <tr>
                                                <td style='width: 40%;'><?php echo $product['PRODUCTO']; ?></td>
                                                <td style='width: 25%;'>$<?php echo $product['PRECIO']; ?></td>
                                                <td style='width: 10%;'><?php echo $product['CANTIDAD']; ?></td>
                                                <td style='width: 25%;'>$<?php echo $product['SUBTOTAL']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <?php
                                if (($orden['ESTADO'] == 'Pendiente') || ($orden['ESTADO'] == 'Proceso')) {
                                ?>
                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2<?php echo $orden['ORDEN_ID']; ?>" data-bs-toggle="modal">Actualizar estado</button>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>


                <!--MODAL 2: ACTUALIZAR ESTADO DE LA ORDEN-->
                <!-- Modal for the order <?php echo $orden['ORDEN_ID']; ?> -->
                <div class="modal fade" id="exampleModalToggle2<?php echo $orden['ORDEN_ID']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <i class="fas fa-exclamation-triangle m-2" style="color: #FFC107;"></i>
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Advertencia</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: justify; align-items: center; justify-content: center;">
                                <span>
                                    Asegurese de querer continuar, de lo contrario pulse en "Regresar".
                                </span>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning me-auto" data-bs-target="#exampleModalToggle<?php echo $orden['ORDEN_ID']; ?>" data-bs-toggle="modal">Regresar</button>
                                <?php
                                if ($orden['ESTADO'] == 'Pendiente') {
                                ?>
                                    <form action="ordenes_online.php" method="post">
                                        <button class="btn btn-success ms-auto" type="submit" name="proceso" id="proceso" value="proceso" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Marcar en proceso</button>
                                    </form>
                                <?php
                                } else if ($orden['ESTADO'] == 'Proceso') {
                                ?>
                                    <form action="ordenes_online.php" method="post">
                                        <button class="btn btn-success ms-auto" type="submit" name="finalizar" id="finalizar" value="finalizar" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Finalizar orden</button>
                                    </form>
                                <?php
                                }
                                ?>

                                <?php
                                $orden_id = $orden['ORDEN_ID'];
                                $tipo_orden = 'Online';
                                try {
                                    //Falta corrección
                                    if (isset($_POST['proceso'])) {
                                        $sql = $pdo->prepare("CALL actualizarstatus_orden_proceso('$tipo_orden', '$orden_id', '')");
                                        $sql->execute();
                                        echo "<div class='alert alert-secondary' id='alert1'><h2 align='center'>Se actualizó con éxito.</h2></div>";
                                    } else if (isset($_POST['finalizar'])) {
                                        $sql = $pdo->prepare("CALL actualizarstatus_orden_finalizado('$tipo_orden', '$orden_id', '')");
                                        $sql->execute();
                                        echo "<div class='alert alert-secondary' id='alert1'><h2 align='center'>Se finalizó con éxito.</h2></div>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                ?>

                                <script>
                                    // Esperar 3 segundos y luego ocultar el div
                                    setTimeout(function() {
                                        var alert1 = document.getElementById('alert1');
                                        alert1.style.display = 'none';
                                    }, 3000); // 3000 milisegundos = 3 segundos
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>
    <br>
    </div>

</body>

</html>