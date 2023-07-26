// Función para cargar los productos por tipo mediante AJAX
function cargarProductosPorTipo() {
    var tipoSeleccionado = document.getElementById("selectTipo").value;

    // Realizar una petición AJAX para obtener los productos del tipo seleccionado
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Actualizar el contenido del div con los productos
            document.getElementById("productosPorTipo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../scripts/obtener_productos_por_tipo.php?tipo=" + tipoSeleccionado, true);
    xhttp.send();
}

// Función para agregar el producto a la orden
function agregarProducto(producto_id) {
    // Puedes hacer una petición AJAX aquí para agregar el producto a la orden en la base de datos
    // Por simplicidad, solo mostraremos una alerta con el producto seleccionado
    alert('Producto ID: ' + producto_id + ' agregado a la orden.');

    // es del producto desde la base de datos)
    var nombreProducto = "Producto " + producto_id;
    var precioProducto = 50.00;

    // Crear un nuevo elemento div para mostrar el producto agregado
    var productoAgregado = document.createElement("div");
    productoAgregado.classList.add("mb-3");
    productoAgregado.innerHTML = '<span class="nombre">' + nombreProducto + '</span>' +
        '<span class="precio">$' + precioProducto.toFixed(2) + '</span>' +
        '<button class="btn btn-danger" onclick="borrarProducto(' + producto_id + ')">Borrar</button>';
    document.getElementById("productosAgregados").appendChild(productoAgregado);
    calcularTotal();
}


// Función para borrar todos los productos agregados
function borrarProductos() {
    if (confirm("¿Está seguro que desea borrar todos los productos de la orden?")) {
        document.getElementById("productosAgregados").innerHTML = "";
        document.getElementById("totalPagar").textContent = "$0.00";
    }
}

// Función para calcular el total a pagar
function calcularTotal() {
    var preciosProductos = document.getElementsByClassName("precio");
    var totalPagar = 0;
    for (var i = 0; i < preciosProductos.length; i++) {
        var precioProducto = parseFloat(preciosProductos[i].textContent.replace("$", ""));
        totalPagar += precioProducto;
    }
    // Actualizar el valor del elemento con el id "totalPagar" con el total calculado
    document.getElementById("totalPagar").textContent = "$" + totalPagar.toFixed(2);
}

