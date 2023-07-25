<!DOCTYPE html>
<html>
<head>
    <title>Administrar Comedor</title>
</head>
<body>
    <?php
    // Aquí, en lugar de un bucle, obtendrías los datos de las mesas desde tu base de datos.
    // Supongamos que obtienes los datos y los almacenas en un array llamado $mesas.
    $mesas = array(10, 11, 12, 13, 14, 15, 20, 21, 22, 23, 30, 31, 32, 40, 41, 42);

    // Mostrar una tarjeta para cada mesa con el botón "Ocupar".
    foreach ($mesas as $mesa) {
        echo '<div>';
        echo 'Mesa: ' . $mesa;
        echo '<a href="productos.php?mesa=' . $mesa . '">Ocupar</a>';
        echo '</div>';
    }
    ?>
</body>
</html>
