<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php
        include '../class/database.php';
        $db = new Database();
        $db->conectarDB();
        $pdo = $db->getConexion();
        extract($_POST);
        $db->verifica("$usuario",$password);
        $db->desconectarDB();
        ?>
    </div>
</body>
</html>