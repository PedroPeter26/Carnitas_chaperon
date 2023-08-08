<?php 
        include '../class/databaseInt.php';
        $db=new Database();
        $db->conectarBD();
        extract($_POST);

        if(isset($_POST["registro"]))
        {
        $db->ExisteUsuario($user);
        }
        $db->desconectarBD();
?>
<!--NO SE UTILIZO-->