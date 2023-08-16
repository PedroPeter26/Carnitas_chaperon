<?php 
<<<<<<< Updated upstream
        include 'database.php';
=======
        include '../class/databaseInt.php';
>>>>>>> Stashed changes
        $db=new Database();
        $db->conectarDB();
        extract($_POST);

        if(isset($_POST["registro"]))
        {
        $db->ExisteUsuario($user, $contra);
        }
        $db->desconectarDB();
?>
<!--NO SE UTILIZO-->