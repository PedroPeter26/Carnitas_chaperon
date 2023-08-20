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
}
