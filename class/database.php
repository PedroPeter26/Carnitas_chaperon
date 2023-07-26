<?php
class Database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "";
    private $server = "mysql:host=localhost; dbname=bdcarnitaschaperon";

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

    function getConexion()
    {
        return $this->PDOLocal;
    }

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
}
?>