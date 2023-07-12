    <?php
    session_start();
    extract($_POST);


    if (!empty($_POST['inicio']))
    {
        if(!empty($_POST['usuario']) && !empty($_POST['contraseña']))
        {
            $sql=$db->query("select * from usuarios where correo='$usuario' and password='$contraseña'");
            if($datos=$sql->fetch_object())
            {
                $_SESSION['id']=$datos->user_id;
                $_SESSION['nombre']=$datos->nombre;
                $_SESSION['apellido']=$datos->apellido;
                header('location: ../html/usuario_sesion.php');
            }
            else
            {
                echo "<div class='alert alert-danger'>Hubo un error al iniciar sesion. Intente de nuevo.</div>";
            }
        }
        else
        {
            echo "Usuario y/o contraseña son incorrectos. Por favor revisa e intenta de nuevo.";
        }
    }
    ?>