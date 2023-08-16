<?php 
class database
{
<<<<<<< Updated upstream
<<<<<<< Updated upstream
    private $PDOLocal;
    private $user = "doadmin";
    private $password = "AVNS_n6A8URvjvM1RSnjp_CK";
    private $server = "mysql:host=db-chaperon1-do-user-14423112-0.b.db.ondigitalocean.com;port=25060;dbname=ChaperonTest;sslmode=REQUIRED";

=======
    public $PDOlocal;
    private $user="root";
    private $password="";
    private $server="mysql:host=localhost;dbname=bdcarnitaschaperon";
>>>>>>> Stashed changes

=======
    public $PDOlocal;
    private $user="root";
    private $password="";
    private $server="mysql:host=localhost;dbname=bdcarnitaschaperon";

>>>>>>> Stashed changes
    function ConectarDB()
    {
        try
        {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $this->PDOLocal=new PDO($this->server, $this->user, $this->password);
=======
            $this->PDOlocal=new PDO($this->server, $this->user, $this->password);
>>>>>>> Stashed changes
=======
            $this->PDOlocal=new PDO($this->server, $this->user, $this->password);
>>>>>>> Stashed changes
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function getConexion()
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        return $this->PDOLocal;
=======
        return $this->PDOlocal;
>>>>>>> Stashed changes
=======
        return $this->PDOlocal;
>>>>>>> Stashed changes
    }

    function desconectarDB() //SE PUEDE HACER EN EL CONSTRUCTOR PARA QUE SE CONECTE SOLO CADA VEZ QUE SE INSTANCIE
    {
        try
        {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $this->PDOLocal=null;
=======
            $this->PDOlocal=null;
>>>>>>> Stashed changes
=======
            $this->PDOlocal=null;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $resultado = $this->PDOLocal->query($consulta);
=======
            $resultado = $this->PDOlocal->query($consulta);
>>>>>>> Stashed changes
=======
            $resultado = $this->PDOlocal->query($consulta);
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $this->PDOLocal->query($consulta);
=======
            $this->PDOlocal->query($consulta);
>>>>>>> Stashed changes
=======
            $this->PDOlocal->query($consulta);
>>>>>>> Stashed changes
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function ExisteUsuario($usuario, $contra)
    {
        try
        {
            $query = "SELECT * FROM USUARIOS WHERE user = '$usuario'";
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $resultado = $this->PDOLocal->query($query);
=======
            $resultado = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
=======
            $resultado = $this->PDOlocal->query($query);
>>>>>>> Stashed changes

            if($resultado->fetch(PDO::FETCH_ASSOC))
            {
                echo "<br><div class='alert alert-danger'>";
                echo "<H6 align='center'>Este usuario ya existe actualmente.</H6>";
                echo "</div>";
            }
            else
            {
                extract($_POST);

                if(strlen($contra) < 8)
                {
                    echo'
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña debe tener al menos 8 caracteres.
                    </div>';
                }
                else
                {
                    $tipo="client";
                    $status="activo";

                    $hash = password_hash($contra, PASSWORD_DEFAULT);

<<<<<<< Updated upstream
<<<<<<< Updated upstream
                    $cadena = "INSERT INTO USUARIOS(nombre, apellido, user, tipo, correo, password, status) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash', '$status')";
                    
                    $resultado = $this->PDOLocal->query($cadena);
=======
                    $cadena = "INSERT INTO usuarios(nombre, apellido, user, tipo, correo, password, status) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash', '$status')";
                    
                    $resultado = $this->PDOlocal->query($cadena);
>>>>>>> Stashed changes
=======
                    $cadena = "INSERT INTO usuarios(nombre, apellido, user, tipo, correo, password, status) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash', '$status')";
                    
                    $resultado = $this->PDOlocal->query($cadena);
>>>>>>> Stashed changes

                    if($resultado)
                    {
                        echo "<br>";
                        echo "<div class='alert alert-success'>¡Cliente registrado exitosamente!</div>";
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                        echo "<script>window.location.href='../html/login.php'</script>";
=======
                        echo "<script>window.location.href='../views/login.php'</script>";
>>>>>>> Stashed changes
=======
                        echo "<script>window.location.href='../views/login.php'</script>";
>>>>>>> Stashed changes
                    }
                    else 
                    {
                        echo "<br>";
                        echo "<div class='alert alert-danger'>Hubo un error al registrarse. Intente de nuevo.</div>";
                    }
                }
            }
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function ExisteAdmin($usuario, $contra)
    {
        try
        {
            $query = "SELECT * FROM USUARIOS WHERE user = '$usuario'";
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $resultado = $this->PDOLocal->query($query);
=======
            $resultado = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
=======
            $resultado = $this->PDOlocal->query($query);
>>>>>>> Stashed changes

            if($resultado->fetch(PDO::FETCH_ASSOC))
            {
                echo "<br><div class='alert alert-danger'>";
                echo "<H6 align='center'>Este usuario ya existe actualmente.</H6>";
                echo "</div>";
            }
            else
            {
                extract($_POST);

                if(strlen($contra) < 8)
                {
                    echo'
                    <div class="alert alert-danger mt-3" role="alert">
                        La contraseña debe tener al menos 8 caracteres.
                    </div>';
                }
                else
                {
                    $tipo="admin";
                    $status="activo";

                    $hash = password_hash($contra, PASSWORD_DEFAULT);

                    $cadena = "insert into usuarios(nombre, apellido, user, tipo, correo, password, status) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash', '$status')";
                    
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                    $resultado = $this->PDOLocal->query($cadena);
=======
                    $resultado = $this->PDOlocal->query($cadena);
>>>>>>> Stashed changes
=======
                    $resultado = $this->PDOlocal->query($cadena);
>>>>>>> Stashed changes

                    if($resultado)
                    {
                        echo "<br>";
                        echo "<div class='alert alert-success'>¡Cliente registrado exitosamente!</div>";
                    }
                    else 
                    {
                        echo "<br>";
                        echo "<div class='alert alert-danger'>Hubo un error al registrarse. Intente de nuevo.</div>";
                    }
                }
            }
        }
        catch (PDOException $e)
        {
        echo $e->getMessage();
        }
    }

    function verifica($usuario,$pass)
    {
        try
        {
            $pase = false;
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $query = "SELECT * FROM USUARIOS where user = '$usuario'";
            $consulta = $this->PDOLocal->query($query);
=======
            $query = "SELECT * FROM usuarios where user = '$usuario' AND status = 'activo'";
            $consulta = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
=======
            $query = "SELECT * FROM usuarios where user = '$usuario' AND status = 'activo'";
            $consulta = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
            $renglon=$consulta->fetch(PDO::FETCH_ASSOC);

            if($renglon)
            {
                if(password_verify($pass, $renglon['password']))
                {
                    $pase = true;
                }
            }

            if($pase)
            {
                if($renglon['tipo']=="client")
                {
                session_start();
                $_SESSION["usuario"]=$usuario;
                $_SESSION["idUsuario"]=$renglon['user_id'];
                echo "<div class='alert alert-success'>
                <H2 align='center'>Bienvenido ".$_SESSION["usuario"]."</H2>
                </div>";
                header("refresh:2; ../index.php");
                }
                else 
                {
                session_start();
                $_SESSION["usuario"]=$usuario;
                $_SESSION["idUsuario"]=$renglon['user_id'];
                echo "<div class='alert alert-success'>";
                echo "<H2 align='center'>Bienvenido ".$_SESSION["usuario"]."</H2>";
                echo "</div>";
                header("refresh:2; ../indexadmin.php");
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        $sentencia = "UPDATE USUARIOS SET nombre = '$nombre', apellido = '$apellido', user = '$usuario', correo = '$correo' WHERE user_id = '$id'";
        $resultado = $this->PDOLocal->query($sentencia);
=======
        $sentencia = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', user = '$usuario', correo = '$correo' WHERE user_id = '$id'";
        $resultado = $this->PDOlocal->query($sentencia);
>>>>>>> Stashed changes
=======
        $sentencia = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', user = '$usuario', correo = '$correo' WHERE user_id = '$id'";
        $resultado = $this->PDOlocal->query($sentencia);
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        $query = "SELECT * FROM USUARIOS WHERE user_id = '$idUsuario'";
        $consulta = $this->PDOLocal->query($query);
=======
        $query = "SELECT * FROM usuarios WHERE user_id = '$idUsuario'";
        $consulta = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
=======
        $query = "SELECT * FROM usuarios WHERE user_id = '$idUsuario'";
        $consulta = $this->PDOlocal->query($query);
>>>>>>> Stashed changes
        $renglon=$consulta->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password,$renglon['password']))
        {
            $pase = true;
            return $pase;
        }
    }

    function cambiarPassword($idUsuario, $password)
    {
        $nueva = password_hash($password, PASSWORD_DEFAULT);
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        $sentencia = "UPDATE USUARIOS SET password = '$nueva' WHERE user_id = '$idUsuario'";
        $resultado = $this->PDOLocal->query($sentencia);
=======
        $sentencia = "UPDATE usuarios SET password = '$nueva' WHERE user_id = '$idUsuario'";
        $resultado = $this->PDOlocal->query($sentencia);
>>>>>>> Stashed changes
=======
        $sentencia = "UPDATE usuarios SET password = '$nueva' WHERE user_id = '$idUsuario'";
        $resultado = $this->PDOlocal->query($sentencia);
>>>>>>> Stashed changes

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