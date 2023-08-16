<?php
require_once '../../class/database.php';
$database = new Database();
$database->conectarDB();

// Consulta SQL para obtener las mesas y su estado
$sql = "SELECT mesa_id, numero_mesa, estado FROM MESAS";
$stmt = $database->getConexion()->query($sql);
$mesas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$database->desconectarDB();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include "../headadmin.php"; ?>
    <title>Atender Mesas</title>
</head>
<body>
    <?php include '../sidebaradmin.php'; ?>
    
    <div class="content-wrapper p-4"  style="background-color: white;">

    <div class="container">
    <h1>Mesas</h1>
        <div class="row">
            <?php foreach ($mesas as $mesa) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mesa <?php echo $mesa['numero_mesa']; ?></h5>
                            <p class="card-text">Estado: <?php echo $mesa['estado']; ?></p>
                            <a href="atender_mesa.php?mesa_id=<?php echo $mesa['mesa_id']; ?>" class="btn btn-primary">Atender Mesa</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include '../footeradmin.php'; ?>

    </div>

</body>
</html>