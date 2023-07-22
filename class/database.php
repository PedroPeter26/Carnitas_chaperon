<?php
class Database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "";
<<<<<<< Updated upstream
    private $server = "mysql:host=localhost; dbname=depaclients";
=======
    private $server = "mysql:host=localhost; dbname=bdcarnitaschaperon";
>>>>>>> Stashed changes

    function conectarDB()
    {
        try
        {
            $this->PDOLocal = new PDO($this->server, $this->user, $this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function desconectarDB()
    {
        try
        {
            $this->PDOLocal = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

<<<<<<< Updated upstream
=======
    function getConexion()
    {
        return $this->PDOLocal;
    }

>>>>>>> Stashed changes
    function seleccionar($consulta)
    {
        try
        {
            $resultado = $this->PDOLocal->query($consulta);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function ejecutaSQL($consulta){
        try
        {
            $this->PDOLocal->query($consulta);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
<<<<<<< Updated upstream

    function verifica($usuario, $contra)
    {
        try
        {
            $pase = false;
            $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $consulta = $this->PDOLocal->query($query);
            while($renglon = $consulta->fetch(PDO::FETCH_ASSOC))
            {
                if(password_verify($contra, $renglon['password']))
                {
                    $pase = true;
                }
            }
            if($pase)
            {
                session_start();
                $_SESSION["usuario"] = $usuario;
                echo "<div class='alert alert-success'>";
                echo "<h2 align='center'>Bienvenido ".$_SESSION["usuario"]."</h2>";
                echo "</div>";
                header("refresh:2; ../index.php");
            }
            else
            {
                echo "<div class='alert alert-danger'>";
                echo "<h2 align='center'>Usuario o password incorrecto</h2>";
                echo "</div>";
                header("refresh:2; ../views/formlogin.php");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function cerrarsesion()
    {
        session_start();
        session_destroy();
        header("Location: ../index.php");
    }
=======
>>>>>>> Stashed changes
}
?>