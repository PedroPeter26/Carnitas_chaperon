<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <title>Registro</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg barranav">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
                </a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>Registrate</h1>
        <br>
        <form action="../scripts/guardausuario.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Escriba su usuario" required autofocus>
            </div>
            <div class="mb-3">
                <label for="passw" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="passw" placeholder="Escriba su contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>