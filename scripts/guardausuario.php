<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Save client</title>
</head>
<body>
    <div class="container">
        <?php
        include '../class/database.php';
        $db = new Database();
        $db->conectarDB();

        extract($_POST);
        $hash = password_hash($passw, PASSWORD_DEFAULT);
        $cadena = "INSERT INTO usuarios(usuario, password) VALUES ('$usuario', '$hash')";

        $db->ejecutaSQL($cadena);
        $db->desconectarDB();
        echo "<div class='alert alert-success'>Usuario registrado</div>";
        header("refresh: 3; ../views/formlogin.php");
        ?>
    </div>
</body>
</html>