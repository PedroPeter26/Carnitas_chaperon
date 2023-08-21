<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
    <div class="container">
    <h1>Editor de Productos</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Agregar">Agregar producto</button>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio aplicacion</th>
                <th>Precio comedor</th>
                <th>Tipo producto</th>
                <th>Descripcion</th>
                <th>Disponibilidad</th>
                <th>Status</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT PRODUCTOS.nombre AS producto_nombre, precio_app, precio_com, TIPOS.nombre AS tipo_nombre, descripcion, disponibilidad, status, img FROM PRODUCTOS INNER JOIN TIPOS ON PRODUCTOS.tipo = TIPOS.id_tipo WHERE (PRODUCTOS.disponibilidad = 'Ambos' OR PRODUCTOS.disponibilidad = 'Rapido') AND status = 'Activo'";
            $tabla = $db->seleccionar($consulta);

            foreach ($tabla as $registro) {
                echo "<tr>";
                echo "<td> $registro->producto_nombre </td>";
                echo "<td> $registro->precio_app </td>";
                echo "<td> $registro->precio_com </td>";
                echo "<td> $registro->tipo_nombre </td>";
                echo "<td> $registro->descripcion </td>";
                echo "<td> $registro->disponibilidad </td>";
                echo "<td> $registro->status </td>";
                echo "<td> <img src='$registro->img' style='width: 100px; height:100px;'> </td>";
                echo "<td> <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#Editar'>Editar</button> </td>";
                echo "<td> <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#Eliminar'>Eliminar</button> </td>";
                echo "</tr>";
            }            
            ?>
        </tbody>
    </table>
    </div>

    <!-- Modal de agregar -->
    <?php
        $querytipos = "SELECT * FROM TIPOS";
        $tiposprod = $db->seleccionar($querytipos);
    ?>
    <div class="modal fade" id="Agregar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AgregarLabel">Agregar nuevo producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="precioapp" class="col-form-label">Precio aplicación:</label>
                            <input type="number" step="0.1" class="form-control" name="precioapp"></input>
                        </div>
                        <div class="mb-3">
                            <label for="preciocom" class="col-form-label">Precio comedor:</label>
                            <input type="number" step="0.1" class="form-control" name="preciocom"></input>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="col-form-label">Tipo:</label>
                            <select class="form-control" name="tipo">
                                <?php
                                    foreach ($tiposprod as $tipo) {
                                        echo "<option value='$tipo->id_tipo'>$tipo->nombre</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="dispo" class="col-form-label">Disponibilidad:</label>
                            <select class="form-control" name="dispo">
                                <option value="Comedor">Comedor</option>
                                <option value="Rapido">Rapido</option>
                                <option value="Ambos">Ambos</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Modal de editar-->
    <div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditarLabel">Editar producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="precioapp" class="col-form-label">Precio aplicación:</label>
                            <input type="number" step="0.1" class="form-control" name="precioapp"></input>
                        </div>
                        <div class="mb-3">
                            <label for="preciocom" class="col-form-label">Precio comedor:</label>
                            <input type="number" step="0.1" class="form-control" name="preciocom"></input>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="col-form-label">Tipo:</label>
                            <select class="form-control" name="tipo">
                                <?php
                                    foreach ($tiposprod as $tipo) {
                                        echo "<option value='$tipo->id_tipo'>$tipo->nombre</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="dispo" class="col-form-label">Disponibilidad:</label>
                            <select class="form-control" name="dispo">
                                <option value="Comedor">Comedor</option>
                                <option value="Rapido">Rapido</option>
                                <option value="Ambos">Ambos</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Modal eliminar-->
    <div class="modal fade" id="Eliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditarLabel">¿Desea eliminar el producto?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-danger">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>