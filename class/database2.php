<?php
    class Database
    {
        private $PDO_local;
        private $user = "doadmin";
        private $password = "AVNS_CAXxqCkNwe5dZ1mPL_z";
        private $server = "dbaas-db-10589007-do-user-14423112-0.b.db.ondigitalocean.com";
        private $port=25060;
        private $database = "BDCarnitasChaperon";
        private $sslmode = "REQUIRED";

        function conectarBD()
        {
            try
            {
                $dsn = "mysql:host={$this->server};port={$this->port};dbname={$this->database};sslmode={$this->sslmode}";
                 $this->PDO_local = new PDO($dsn, $this->user, $this->password);
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
            }
        }

        function desconectarBD()
        {
            try
            {
                $this->PDO_local = null;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
            }
        }
    }
?>