<?php
class Database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "";
    private $server = "mysql:host=localhost; dbname=BDCarnitasChaperon";

    function conectarDB()
    {
        try
        {
            $this->PDOLocal = new PDO($this->server,$this->user,$this->password);
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
    function seleccionar($consulta)
    {
        try
        {
            $resultado = $this->PDOLocal->query($consulta);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            /*Leer doc: configuración en tiempo de ejecucion*/
            return $fila;
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

}
