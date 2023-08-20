<?php
if (isset($_GET['mesa_id'])) {
    $mesa_id = $_GET['mesa_id'];
    
    require '../class/database.php';
    $database = new database();
    $database->ConectarDB();
    
    $sql = "SELECT numero_mesa, estado FROM MESAS WHERE mesa_id = :mesa_id";
    $stmt = $database->getConexion()->prepare($sql);
    $stmt->bindParam(':mesa_id', $mesa_id, PDO::PARAM_INT);
    $stmt->execute();
    
    $mesa = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $database->desconectarDB();
}

// Obtén la lista de tipos de producto
$database->conectarDB();
$sentenciaTipos = $database->getConexion()->prepare("SELECT * FROM TIPOS");
$sentenciaTipos->execute();
$listaTipos = $sentenciaTipos->fetchAll(PDO::FETCH_ASSOC);
$database->desconectarDB();

// Obtén la lista de productos según el filtro de tipo seleccionado
$database->conectarDB();
$tipoFiltro = isset($_GET['tipo_filtro']) ? $_GET['tipo_filtro'] : '';
if ($tipoFiltro) {
    $sqlProductos = "SELECT * FROM PRODUCTOS WHERE tipo = :tipo AND (disponibilidad = 'Ambos' OR disponibilidad = 'Comedor') AND status = 'Activo'";
    $stmtProductos = $database->getConexion()->prepare($sqlProductos);
    $stmtProductos->bindParam(':tipo', $tipoFiltro, PDO::PARAM_STR);
} else {
    $sqlProductos = "SELECT * FROM PRODUCTOS WHERE (disponibilidad = 'Ambos' OR disponibilidad = 'Comedor') AND status = 'Activo'";
    $stmtProductos = $database->getConexion()->prepare($sqlProductos);
}
$stmtProductos->execute();
$listaProductos = $stmtProductos->fetchAll(PDO::FETCH_ASSOC);
$database->desconectarDB();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atender Mesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>
<body>
    <?php if (isset($mesa)) : ?>
        <?php require '../class/configcom.php'; ?>
        <div class="container">
            <h1>Atendiendo Mesa: <?php echo $mesa['numero_mesa']; ?></h1>
            <a href="comedor.php" class="btn btn-secondary">Regresar al Comedor</a>
            <a class="btn btn-warning" href="checkout_comedor.php?mesa_id=<?php echo $mesa_id; ?>">Orden</a>
            <p id="estado-mesa">Estado de la mesa: <?php echo $mesa['estado']; ?></p>

        </div>

        <div class="container">
            <div class="content-section">
                <form action="pagocomedor.php" method="post">
                    <input type="hidden" name="mesa_id" value="<?php echo $mesa_id; ?>">
                    
                    <!-- Agrega el filtro de tipo de producto -->
                    <select class="form-select mb-3" id="tipo_filtro" name="tipo_filtro">
                        <option value="">Todos los tipos</option>
                        <?php foreach($listaTipos as $tipo): ?>
                            <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <!-- Cambia el tipo de botón para evitar el envío del formulario -->
                    <button type="button" class="btn btn-warning btn-lg" id="btnAplicarFiltro">Filtrar</button>
                    
                    <div class="row mt-3">
                        <?php foreach($listaProductos as $producto): ?>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <span><?php echo $producto['nombre']; ?></span>
                                        <h5 class="card-title">$<?php echo $producto['precio_com']; ?></h5>
                                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prodAgregado" onclick="addProducto(<?php echo $producto['producto_id']; ?>, <?php echo $mesa_id; ?>)">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="prodAgregado" tabindex="-1" aria-labelledby="prodAgregadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prodAgregadoLabel">¡Producto agregado!</h5>
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

        <script>
            document.getElementById('btnAplicarFiltro').addEventListener('click', function() {
                const tipoFiltro = document.getElementById('tipo_filtro').value;
                let url = 'atender_mesa.php?mesa_id=<?php echo $mesa_id; ?>';
                
                // Agrega el filtro de tipo de producto a la URL si está seleccionado
                if (tipoFiltro) {
                    url += '&tipo_filtro=' + tipoFiltro;
                }
                
                // Redirecciona a la página con el filtro aplicado
                window.location.href = url;
            });

            function addProducto(producto_id, mesa_id) {
                let url = '../class/comedororden.php'
                let formData = new FormData()
                formData.append('producto_id', producto_id)
                formData.append('mesa_id', mesa_id);

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_ord")
                        elemento.innerHTML = data.numero
                    }
                })
            }
        </script>
    <?php else : ?>
        <p>No se ha seleccionado una mesa válida</p>
    <?php endif; ?>

</body>
</html>