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

    function ExisteUsuario($usuario)
    {
        try
        {
            $query = "SELECT * FROM USUARIOS WHERE user = '$usuario'";

            $resultado = $this->PDOLocal->query($query);

            if($resultado->fetch(PDO::FETCH_ASSOC))
            {
                echo "<br><div class='alert alert-danger'>";
                echo "<H6 align='center'>Este usuario ya existe actualmente.</H6>";
                echo "</div>";
            }
            else
            {
                extract($_POST);

                $tipo="client";
                $hash = password_hash($contraseña, PASSWORD_DEFAULT);

                $cadena = "insert into usuarios(nombre, apellido, user, tipo, correo, password) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash')";
                   
                $resultado = $this->PDOLocal->query($cadena);

                if($resultado)
                {
                    echo "<br>";
                    echo "<div class='alert alert-success'>¡Cliente registrado exitosamente!</div>";
                    echo "<script>window.location.href='../views/login.php'</script>";
                }
                else 
                {
                    echo "<br>";
                    echo "<div class='alert alert-danger'>Hubo un error al registrarse. Intente de nuevo.</div>";
                }
            }
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function verifica($usuario,$contraseña)
    {
        try
        {

            $pase = false;
            $query = "select * from usuarios where user = '$usuario'";
            $consulta = $this->PDOLocal->query($query);
            $renglon=$consulta->fetch(PDO::FETCH_ASSOC);

            if($renglon)
            {
                if(password_verify($contraseña,$renglon['password']))
                {
                    $pase=true;
                }
            }

            if($pase)
            {
                if($renglon['tipo']=="client")
                {
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    echo "<div class='alert alert-success'>";
                    echo "<H2 align='center'>Bienvenido ".$_SESSION["usuario"]."</H2>";
                    echo "</div>";
                    header("refresh:2; ../index.php");
                }
                else 
                {
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    echo "<div class='alert alert-success'>";
                    echo "<H2 align='center'>Bienvenido ".$_SESSION["usuario"]."</H2>";
                    echo "</div>";
                    header("refresh:2; ../views/validacionAdmin.php");
                }
            }
            else
            {
                echo "<div class='alert alert-danger'>";
                echo "<H6 align='center'>Usuario o contraseña incorrecta.</H6>";
                echo "</div>";
            }
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location:../index.php");
    }
}
?>