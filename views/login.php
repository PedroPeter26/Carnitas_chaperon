<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        function mostrarPassword(){
                var cambio = document.getElementById("txtPassword");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            } 
            
            $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&display=swap');
        body
        {
            background-color: #ffefcf;
        }
        html, body
        {
            max-width: 100% !important;
        }
        .formulario
        {
            padding: 2%;
            font-family: 'Lilita One', sans-serif;
        }

        .boton
        {
            background-color: #D44000;
            font-family: 'Lilita One', sans-serif;
            width: 100%;
        }
        .cardi
        {
            margin-top: 3%;
        }
    </style>
    <title>INICIA SESION</title>
</head>
<body>
    <!--
    <nav class="navbar navbar-expand-lg barranav sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50">  CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
        </div>
    </nav>

    <div class="container" id="contenedor">
    <div class="formulario">
        <br>
        <h2 align="center">INICIAR SESION</h2>
        <br>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="control-label" for="username">Usuario</label>
                <div>
                <input type="text" name="username" placeholder="Escribe nombre de usuario" class="form-control" required>
                </div>
                <div></div>
            </div>
            <div class="mb-3">
                <label class="control-label" for="pass">Contraseña</label>
                <input type="password" name="pass" placeholder="Escribe la contraseña" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-lg boton" type="submit" name="inicio">Iniciar sesion</button>
            </div>
            <br>
            <p>¿No tienes una cuenta aun?<a href="registrarse.php" align="center" color="">Registrate</a></p>
            -->
    <div class="contenct-wrapper">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center cardi">
                <div class="col-md-4 col-12 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1">
                                    <img height="100" id="imag" alt="Carnitas Chaperon" src="../img/logo.png">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Ingresa a la página de Carnitas Chaperon</span></h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" style="width: 100%;" action="../scripts/verificalogin.php" method="POST">
                                    <fieldset class="form-group position-relative">
                                    <div class="input-group">
                                        <button class="btn" disabled><span class="fa-solid fa-user"></span></button>
                                        <input type="text" name="username" placeholder="Usuario" class="form-control form-control-lg input-lg" required>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative has-icon-left">
                                    <div class="input-group">
                                    <button class="btn" disabled><span class="fa-solid fa-key"></span></button>
                                    <input type="password" id="txtPassword" name="pass" placeholder="Contraseña" class="form-control form-control-lg input-lg" required>
                                    <button id="ShowPassword" class="btn btn-danger" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span></button>
                                    </div>
                                    </fieldset>
                                    <br>
                                    <button class="btn btn-lg btn-block boton formulario" type="submit" name="inicio">
                                        Iniciar sesión
                                    </button>
                                    <div>
                                        <br>
                                        <p class="formulario">¿No tienes una cuenta aún?  <a href="registrarse.php" align="center" style="color:brown; text-decoration: none;">Registrate</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>