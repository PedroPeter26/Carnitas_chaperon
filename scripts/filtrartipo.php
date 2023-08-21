<?php
include '../class/database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();
require '../class/config.php';
if (isset($_GET['tipo'])) {
    $tipoSeleccionado = $_GET['tipo'];

    // Consulta SQL para obtener productos del tipo seleccionado
    $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE tipo = ? AND (disponibilidad = 'Ambos' OR disponibilidad = 'Rapido') AND status = 'Activo'");
    $sentencia->execute([$tipoSeleccionado]);
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Genera el HTML de la lista de productos filtrados
    foreach ($listaProductos as $producto) {
        echo '<div class="col-3">';
        $id = $producto['producto_id'];
        echo '<div class="card">';
        echo '<img title="Titulo producto" alt="Título" class="card-img-top" src="' . $producto['img'] . '">';
        echo '<div class="card-body">';
        echo '<span>' . $producto['nombre'] . '</span>';
        echo '<h5 class="card-title">$' . $producto['precio_app'] . '</h5>';
        echo '<button class="btn btn-outline-primary" type="button" onclick="addProducto(' . $producto['producto_id'] . ')">Agregar al carrito</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    $sentencia = $pdo->prepare("SELECT * FROM PRODUCTOS WHERE tipo = 'TIPO1' AND (disponibilidad = 'Ambos' OR disponibilidad = 'Rapido') AND status = 'Activo'");
    $sentencia->execute([$tipoSeleccionado]);
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Genera el HTML de la lista de productos filtrados
    foreach ($listaProductos as $producto) {
        echo '<div class="col-3">';
        $id = $producto['producto_id'];
        echo '<div class="card">';
        echo '<img title="Titulo producto" alt="Título" class="card-img-top" src="' . $producto['img'] . '">';
        echo '<div class="card-body">';
        echo '<span>' . $producto['nombre'] . '</span>';
        echo '<h5 class="card-title">$' . $producto['precio_app'] . '</h5>';
        echo '<button class="btn btn-outline-primary" type="button" onclick="addProducto(' . $producto['producto_id'] . ')">Agregar al carrito</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>

<script>
    function addProducto(producto_id) {
        let url = '../class/carrito.php'
        let formData = new FormData()
        formData.append('producto_id', producto_id)

        fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
    }
</script>