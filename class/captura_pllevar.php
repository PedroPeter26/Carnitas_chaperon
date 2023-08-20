<?php
require 'config.php';
include 'database.php';
$db = new database();
$db->ConectarDB();
$pdo = $db->getConexion();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);
echo '</pre>';

if (is_array($datos)) 
{
    if ($row = $sql->fetch(PDO::FETCH_ASSOC)) 
    {

        $fecha = $datos['detalles']['update_time'];
        $fecha_nueva = date('Y-m-d', strtotime($fecha));
        $hora_actual = date("H:i:s", strtotime($fecha));

        $sql = $pdo->prepare("CALL InsertarordenRAPIDO('Tarjeta');");
        $sql->execute();
    }
    else 
    {
        echo "La variable de sesión \$_SESSION['usuario'] no está definida.";
    }

    if($id > 0) {
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null){
            foreach($productos as $clave => $cantidad){
        
            $sentencia = $pdo->prepare("SELECT producto_id, nombre, precio_app, $cantidad AS Cantidad FROM PRODUCTOS WHERE producto_id = ? AND (productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido') AND status = 'Activo'");
            $sentencia->execute([$clave]);
            $row_prod=$sentencia->fetch(PDO::FETCH_ASSOC);

            $precio_app = $row_prod['precio_app'];

            $sql_insert = $pdo->prepare("INSERT INTO DETALLE_ORDEN (orden, producto, cantidad) VALUES (?,?,?)");
            $sql_insert->execute([$id, $clave, $cantidad]);
            }
        }

        unset($_SESSION['carrito']);
        echo "<div class='alert alert-success'>Compra exitosa!</div>";
        header("refresh: 2; ../views/ordenar.php");
    }
}