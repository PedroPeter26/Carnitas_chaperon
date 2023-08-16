<?php
require_once '../class/databaseInt.php';
$database = new Database();
$database->conectarBD();

// Consulta SQL para obtener las mesas y su estado
$sql = "SELECT mesa_id, numero_mesa, estado FROM Mesas";
$stmt = $database->getConexion()->query($sql);
$mesas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$database->desconectarBD();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atender Mesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h1>Mesas</h1>

    <div class="container">
        <div class="row">
            <?php foreach ($mesas as $mesa) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mesa <?php echo $mesa['numero_mesa']; ?></h5>
                            <p class="card-text">Estado: <?php echo $mesa['estado']; ?></p>
                            <a href="atenderMesa.php?mesa_id=<?php echo $mesa['mesa_id']; ?>" class="btn btn-primary">Atender Mesa</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>