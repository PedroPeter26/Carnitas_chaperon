<?php
require_once '../class/database.php';
$database = new database();
$database->ConectarDB();

// Consulta SQL para obtener las mesas y su estado
$sql = "SELECT mesa_id, numero_mesa, estado FROM MESAS";
$stmt = $database->getConexion()->query($sql);
$mesas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$database->desconectarDB();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Atender Mesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php include 'headfooteradmin2.php'; ?>
</head>

<body>
    <?php include 'sidebaradmin2.php'; ?>

    <div class="content-wrapper p-5">
        <div class="container">
            <h1>Mesas</h1>
            <div class="row">
                <?php foreach ($mesas as $mesa) : ?>

                    <?php
                    if ($mesa['estado'] == 'Disponible') {
                    ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="card" style="background-color: #D7D7D6;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <h2 class="card-title">Mesa <?php echo $mesa['numero_mesa']; ?></h2>
                                            <p class="card-text">Estado: <?php echo $mesa['estado']; ?></p>
                                            <div class="d-grid gap-2 col-12 d-md-flex mx-auto align-items-end">
                                                <a href="atender_mesa.php?mesa_id=<?php echo $mesa['mesa_id']; ?>" class="btn btn-dark ms-auto" style="text-align: end;">
                                                    <?php
                                                    if ($mesa['estado'] == 'Disponible') {
                                                        echo "Atender mesa";
                                                    } else if ($mesa['estado'] == 'Ocupada') {
                                                        echo "Ver orden";
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($mesa['estado'] == 'Ocupada') {
                    ?>

                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="card" style="background-color: #A5A5A5;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-12">
                                            <h2 class="card-title">Mesa <?php echo $mesa['numero_mesa']; ?></h2>
                                            <p class="card-text">Estado: <?php echo $mesa['estado']; ?></p>
                                            <div class="d-grid gap-2 col-12 d-md-flex mx-auto align-items-end">
                                                <a href="atender_mesa.php?mesa_id=<?php echo $mesa['mesa_id']; ?>" class="btn btn-dark ms-auto" style="text-align: end;">

                                                    <?php
                                                    if ($mesa['estado'] == 'Disponible') {
                                                        echo "Atender mesa";
                                                    } else if ($mesa['estado'] == 'Ocupada') {
                                                        echo "Ver orden";
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>

                <?php endforeach; ?>
            </div>
        </div>
    </div>



</body>

</html>