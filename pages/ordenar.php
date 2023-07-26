<?php
include '../class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<!-- file:///C:/xampp/htdocs/Carnitas_chaperon-jonathan/pages/ordenar.php -->
    <style>
        @font-face
        {
            font-family: 'Lilita One';
            src: url(./LilitaOne-Regular.ttf);
        }
        .lilita
        {
            font-family: 'Lilita One';
        }
        .bg-header
        {
            background-color: #FCF0C8;
        }
        .bg-redmarron
        {
            background-color: #630A10;
        }

        .content-section
        {
        background-color: #FACE7F;
        padding: 20px;
        margin-bottom: 20px;
        }

    </style>

    <title>Ordenar</title>
</head>
<body>

    <header class="d-flex align-items-center justify-content-center lilita bg-header">

    <nav class="navbar navbar-expand-lg barranav">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" alt="Logo" width="35" height="50"> CARNITAS&nbsp;EL&nbsp;CHAPERON
            </a>
            <button class="navbar-toggler iniciarsesionnav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills align-content-end offset-8" style="color: white;">
                <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>-->
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../views/menusencillo.php">Menú</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="#" data-bs-toggle="modal" data-bs-target="#alta">Ubicación</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="../views/formlogin.php">Iniciar sesión</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    </header>
    
    <!-- Nav Bar de comidas -->

    <!-- Contenido principal -->
  <div class="container mt-5">
    <div class="content-section">
    <form>
            <div class="mb-3">
                <div class="alert alert-success">
                    pantalla de mensajes
                    <a href="#" class="badge badge-warning">Ver carrito</a>
                </div><br>
                <label for="tipoComida" class="form-label">Seleccione el tipo de comida:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Seleccionar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Carnes</a></li>
                        <li><a class="dropdown-item" href="#">Tacos</a></li>
                        <li><a class="dropdown-item" href="#">Lonches</a></li>
                        <li><a class="dropdown-item" href="#">Gringas</a></li>
                        <li><a class="dropdown-item" href="#">Chicharrones</a></li>
                        <li><a class="dropdown-item" href="#">Paquetes</a></li>
                        <li><a class="dropdown-item" href="#">Bebidas</a></li>
                        <li><a class="dropdown-item" href="#">Complementos</a></li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
         $sentencia=$pdo->prepare("SELECT * FROM productos WHERE productos.disponibilidad = 'Ambos' OR productos.disponibilidad = 'Rapido'");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row">
            <?php foreach($listaProductos as $producto){ ?>
                <div class="col-3">
                    <div class="card">
                        <img
                        title="Titulo producto"
                        alt="Título"
                        class="card-img-top"
                        src="<?php echo $producto['img'];?>"
                        >
                        <div class="card-body">
                            <span><?php echo $producto['nombre'];?></span>
                            <h5 class="card-title">$<?php echo $producto['precio_app']?></h5>
                            <button class="btn btn-primary"
                            name="btnAccion"
                            value="Agregar"
                            type="submit">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

  </div>

</body>
</html>