<?php 
        include 'database.php';
        $db=new Database();
        $db->conectarDB();
        extract($_POST);

        if(isset($_POST["registro"]))
        {
        $db->ExisteUsuario($user);
        }
        $db->desconectarBD();
?>
<!--NO SE UTILIZO-->