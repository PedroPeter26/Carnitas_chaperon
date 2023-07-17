<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <title>Iniciar sesion</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg barranav">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
                </a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <form action="../scripts/verificalogin.php" method="POST" class="login">
                <h2>Iniciar sesión</h2>
                <br>
                <div class="mb-3">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Usuario" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required>
                </div>
                <input type="submit" value="Entrar" class="btn btn-primary mb-3">
                <br>
                <a href="altausuario.php">¿No tienes una cuenta? Registrate</a>
            </form>
        </div>
    </div>
</body>
</html>