<?php
define("CLIENT_ID", "AREdZpT5NlDYilXC7_Gtu1Kkh0TYbiq8g_aZIFDbY_BP5cL560tGybzSOALa34knXCwwUFz7XYAfIRZ7");
define('CURRENCY', 'MXN');

define("MONEDA", "$");

session_start();

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>