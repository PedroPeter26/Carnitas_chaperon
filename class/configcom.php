<?php
define("CLIENT_ID", "AREdZpT5NlDYilXC7_Gtu1Kkh0TYbiq8g_aZIFDbY_BP5cL560tGybzSOALa34knXCwwUFz7XYAfIRZ7");
define('CURRENCY', 'MXN');

define("MONEDA", "$");

$num_ord = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $mesa_carrito) {
        if (isset($mesa_carrito['productos'])) {
            $num_ord += count($mesa_carrito['productos']);
        }
    }
}
?>