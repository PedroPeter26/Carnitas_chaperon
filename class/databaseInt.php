<?php
class database
{
    public $PDOlocal;
    private $user="root";
    private $password="";
    private $server="mysql:host=localhost;dbname=carnitasdb";

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

    function seleccionar($consulta)
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


    function ExisteUsuario($usuario)
    {
        try
        {
            $query = "SELECT * FROM USUARIOS WHERE user = '$usuario'";
            $resultado = $this->PDOlocal->query($query);

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
                   
                $resultado = $this->PDOlocal->query($cadena);

                if($resultado)
                {
                    echo "<br>";
                    echo "<div class='alert alert-success'>¡Cliente registrado exitosamente!</div>";
                    echo "<script>window.location.href='../html/login.php'</script>";
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
            $consulta = $this->PDOlocal->query($query);
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
                    header("refresh:2; ../html/home.php");
                }
                else 
                {
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    echo "<div class='alert alert-success'>";
                    echo "<H2 align='center'>Bienvenido ".$_SESSION["usuario"]."</H2>";
                    echo "</div>";
                    header("refresh:2; ../html/validacionAdmin.php");
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

    function editarUsuario($nombre, $apellido, $usuario, $correo, $id)
    {
        $sentencia = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', user = '$usuario', correo = '$correo' WHERE user_id = '$id'";
        $resultado = $this->PDOlocal->query($sentencia);

        if($resultado)
        {
            echo "
            <div class='alert alert-success mt-3' role='alert'>
                Información de usuario actualizada con éxito.
            </div>";
        }
        else
        {
            echo "
            <div class='alert alert-danger mt-3' role='alert'>
                Hubo un error al actualizar la informacion del usuario. Intente de nuevo más tarde.
            </div>";
        }
    }

    function verificarPassword($idUsuario, $password)
    {
        $query = "SELECT * FROM usuarios WHERE user_id = '$idUsuario'";
        $consulta = $this->PDOlocal->query($query);
        $renglon=$consulta->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password,$renglon['password']))
        {
            return true;
        }
    }

    function cambiarPassword($idUsuario, $password)
    {
        $nueva = password_hash($password, PASSWORD_DEFAULT);
        $sentencia = "UPDATE usuarios SET password = '$nueva' WHERE user_id = '$idUsuario'";
        $resultado = $this->PDOlocal->query($sentencia);

        if($resultado)
        {
            echo '
            <div class="alert alert-success mt-3" role="alert">
                Contraseña actualizada correctamente.
            </div>';
        }
    }
}
?>
