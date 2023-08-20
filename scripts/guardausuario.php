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
        $db = new database();
        $db->ConectarDB();

        extract($_POST);

        $db->ExisteUsuario($user);
        $db->desconectarDB();
        header("refresh: 3; ../views/login.php");
        ?>
    </div>
</body>
</html>