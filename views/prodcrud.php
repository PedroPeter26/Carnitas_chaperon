<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();

$comando = $pdo->prepare("SELECT PRODUCTOS.producto_id, PRODUCTOS.nombre, PRODUCTOS.precio_app, PRODUCTOS.precio_com, TIPOS.nombre AS tipo_nombre, PRODUCTOS.descripcion, PRODUCTOS.disponibilidad, PRODUCTOS.`status`, PRODUCTOS.img FROM PRODUCTOS INNER JOIN TIPOS ON PRODUCTOS.tipo = TIPOS.id_tipo WHERE PRODUCTOS.`status` = 'Activo'");

// Obtener valores de búsqueda
$filtroTipo = isset($_GET['filtroTipo']) ? $_GET['filtroTipo'] : '';
$busquedaNombre = isset($_GET['busquedaNombre']) ? $_GET['busquedaNombre'] : '';

if (!empty($filtroTipo)) {
    $comando = $pdo->prepare("SELECT PRODUCTOS.producto_id, PRODUCTOS.nombre, PRODUCTOS.precio_app, PRODUCTOS.precio_com, TIPOS.nombre AS tipo_nombre, PRODUCTOS.descripcion, PRODUCTOS.disponibilidad, PRODUCTOS.`status`, PRODUCTOS.img FROM PRODUCTOS INNER JOIN TIPOS ON PRODUCTOS.tipo = TIPOS.id_tipo WHERE PRODUCTOS.`status` = 'Activo' AND TIPOS.nombre = :filtroTipo");
    $comando->bindParam(":filtroTipo", $filtroTipo, PDO::PARAM_STR);
}

if (!empty($busquedaNombre)) {
    $comando = $pdo->prepare("SELECT PRODUCTOS.producto_id, PRODUCTOS.nombre, PRODUCTOS.precio_app, PRODUCTOS.precio_com, TIPOS.nombre AS tipo_nombre, PRODUCTOS.descripcion, PRODUCTOS.disponibilidad, PRODUCTOS.`status`, PRODUCTOS.img FROM PRODUCTOS INNER JOIN TIPOS ON PRODUCTOS.tipo = TIPOS.id_tipo WHERE PRODUCTOS.`status` = 'Activo' AND PRODUCTOS.nombre LIKE :busquedaNombre");
    $busquedaNombre = "%" . $busquedaNombre . "%";
    $comando->bindParam(":busquedaNombre", $busquedaNombre, PDO::PARAM_STR);
}

$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <?php
    include "headfooteradmin2.php";
    ?>
</head>

<body>
    <?php include "sidebaradmin2.php" ?>
    <div class="content-wrapper p-3" style="top: 0;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="newprod.php" class="btn btn-primary float-right">
                        <h4>Crear nuevo producto</h4>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form action="" method="GET">
                        <label for="busquedaNombre">Buscar por nombre:</label>
                        <input type="text" name="busquedaNombre" id="busquedaNombre" value="<?php echo isset($_GET['busquedaNombre']) ? htmlspecialchars($_GET['busquedaNombre']) : ''; ?>">
                        <button type="submit" class="btn btn-primary">Buscar por nombre</button>
                    </form>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <form action="" method="GET">
                        <label for="filtroTipo">Filtrar por tipo:</label>
                        <select name="filtroTipo" id="filtroTipo">
                            <?php
                            $tiposQuery = $pdo->query("SELECT id_tipo, nombre FROM TIPOS");
                            $tipos = $tiposQuery->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($tipos as $tipo) {
                                echo "<option value='{$tipo['nombre']}'>{$tipo['nombre']}</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio aplicación</th>
                                <th>Precio comedor</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Disponibilidad</th>
                                <th>Imagen</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                                echo "<tr>";
                                echo "<td>{$row['nombre']}</td>";
                                echo "<td>{$row['precio_app']}</td>";
                                echo "<td>{$row['precio_com']}</td>";
                                echo "<td>{$row['tipo_nombre']}</td>";
                                echo "<td>{$row['descripcion']}</td>";
                                echo "<td>{$row['disponibilidad']}</td>";
                                echo "<td><img style='width: 100px; height: 100px;' src='{$row['img']}'></td>";
                                echo "<td><a href='editarprod.php?id={$row['producto_id']}' class='btn btn-warning'>Editar</a></td>";
                                echo "<td><a href='eliminarprod.php?id={$row['producto_id']}' class='btn btn-danger'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>