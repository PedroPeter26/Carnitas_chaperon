<?php
class database
{
    private $PDOlocal;
    private $user = "doadmin";
    private $password = "AVNS_n6A8URvjvM1RSnjp_CK";
    private $server = "mysql:host=db-chaperon1-do-user-14423112-0.b.db.ondigitalocean.com;port=25060;dbname=ChaperonTest;sslmode=REQUIRED";

    function ConectarDB()
    {
        try {
            $this->PDOlocal = new PDO($this->server, $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function desconectarDB()
    {
        try {
            $this->PDOlocal = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getConexion()
    {
        return $this->PDOlocal;
    }

    function seleccionar($consulta)
    {
        try {
            $resultado = $this->PDOlocal->query($consulta);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function ejecutaSQL($consulta)
    {
        try {
            $this->PDOlocal->query($consulta);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function ExisteUsuario($usuario)
    {
        try {
            $query = "SELECT * FROM USUARIOS WHERE user = '$usuario'";

            $resultado = $this->PDOlocal->query($query);

            if ($resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<br><div class='alert alert-danger'>";
                echo "<H6 align='center'>Este usuario ya existe actualmente.</H6>";
                echo "</div>";
            } else {
                extract($_POST);

                $tipo = "client";
                $status='activo';
                $hash = password_hash($contraseña, PASSWORD_DEFAULT);

                $cadena = "INSERT INTO USUARIOS(nombre, apellido, user, tipo, correo, password, status) values('$nombre','$apellido', '$user', '$tipo', '$correo','$hash', '$status')";

                $resultado = $this->PDOlocal->query($cadena);

                if ($resultado) {
                    echo "<br>";
                    echo "<div class='alert alert-success'>Usuario registrado exitosamente!</div>";
                    echo "<script>window.location.href='../views/login.php'</script>";
                } else {
                    echo "<br>";
                    echo "<div class='alert alert-danger'>Hubo un error al registrarse. Intente de nuevo.</div>";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function verifica($usuario, $pass)
    {
        try {
            $pase = false;
            $query = "SELECT * FROM USUARIOS where user = '$usuario' AND status = 'Activo'";
            $consulta = $this->PDOlocal->query($query);
            $renglon = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($renglon) {
                if (password_verify($pass, $renglon['password'])) {
                    $pase = true;
                }
            }

            if ($pase) {
                if ($renglon['tipo'] == "client") {
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["idUsuario"] = $renglon['user_id'];
                    header("Location: ../index.php");
                } else {
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["idUsuario"] = $renglon['user_id'];
                    header("Location: ../indexadmin.php");
                }
                exit(); // Importante: detener la ejecución del script después de las redirecciones
            } else {
                echo "<div class='alert alert-danger'>";
                echo "<H6 align='center'>Usuario o contraseña incorrecta.</H6>";
                header("Refresh: 2; ../views/login.php");
                echo "</div>";
            }
        } catch (PDOException $e) {
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
        $sentencia = "UPDATE USUARIOS SET nombre = '$nombre', apellido = '$apellido', user = '$usuario', correo = '$correo' WHERE user_id = '$id'";
        $resultado = $this->PDOlocal->query($sentencia);

        if($resultado)
        {
            echo "
            <div class='alert alert-success mt-3' role='alert' style='text-align:center;'>
                Información de usuario actualizada con éxito.
            </div>";
        }
        else
        {
            echo "
            <div class='alert alert-danger mt-3' role='alert' style='text-align:center;'>
                Hubo un error al actualizar la informacion del usuario. Intente de nuevo más tarde.
            </div>";
        }
    }

    function verificarPassword($idUsuario, $password)
    {
        $query = "SELECT * FROM USUARIOS WHERE user_id = '$idUsuario'";
        $consulta = $this->PDOlocal->query($query);
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
        $sentencia = "UPDATE USUARIOS SET password = '$nueva' WHERE user_id = '$idUsuario'";
        $resultado = $this->PDOlocal->query($sentencia);

        if($resultado)
        {
            echo '
            <div class="alert alert-success mt-3" role="alert" style="text-align: center;">
                Contraseña actualizada correctamente.
            </div>';
        }
    }
}
