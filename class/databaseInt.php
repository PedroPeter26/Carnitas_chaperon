<?php 
    class Database
    {
        private $PDOlocal; //$PDO local;
        private $user="root" ;
        private $password="";
        private $server="mysql:host=localhost; dbname=bdcarnitaschaperon";

        public 

        function ConectarBD()
        {
            try
            {
                $this->PDOlocal=new PDO($this->server, $this->user, $this->password);
            }
            catch (PDOException $e)
            {
            echo $e->getMessage();
            }
        }

        function desconectarBD() //SE PUEDE HACER EN EL CONSTRUCTOR PARA QUE SE CONECTE SOLO CADA VEZ QUE SE INSTANCIE
        {
            try
            {
                $this->PDOlocal=null;
            }
            catch (PDOException $e)
            {
            echo $e->getMessage();
            }
        }

        function seleccionar2($consulta)
        {
            try
            {
                $resultado = $this->PDOlocal->query($consulta);
                $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
                return $fila;
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
                $resultado = $this->PDOlocal->query($consulta);
                return $resultado;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }


        function ejecutarSQL($consulta)
        {
            try
            {
                $this->PDOlocal->query($consulta);
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>