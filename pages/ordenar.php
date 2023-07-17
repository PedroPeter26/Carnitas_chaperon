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

        .product-card
        {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        }

        .product-card img
        {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
        }

        .product-card .product-name
        {
        font-weight: bold;
        }

        .product-card .price
        {
        float: left;
        }

        .product-card .add-to-cart
        {
        float: right;
        }

        .navbar.sticky-top 
        {
          z-index: 99;
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

    <nav class="navbar navbar-dark bg-redmarron lilita sticky-top">
        <div class="container-fluid justify-content-center">
          <span class="navbar-brand">Carnitas chaperón</span>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvashamburguesa">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-white bg-redmarron" tabindex="-1" id="offcanvashamburguesa" aria-labelledby="offcanvasNavbarDarkLabel">

            <div class="offcanvas-header">
              <h5 class="offcanvas-title">Comidas</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Tacos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Lonches</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
    </nav>

    <!-- Contenido principal -->
<div class="container mt-4">
    <div class="content-section">
      <h2 class="lilita">Tacos</h2>
      <div class="row">

        <div class="card mb-3 col-md-6" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../img/orden_adobada.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Orden de tacos</h5>
                <p class="card-text">$80.00</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ordenTacosModal">Añadir</button>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-3 col-md-6" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../img/orden_4tacos.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Arma tu orden</h5>
                <p class="card-text">$80.00</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#armaOrdenModal">Añadir</button>
              </div>
            </div>
          </div>
        </div>

      </div>

      </div>
    </div>

          <!-- Primer Modal -->
      <div class="modal fade" id="ordenTacosModal" tabindex="-1" aria-labelledby="ordenTacosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="ordenTacosModalLabel">Orden de tacos</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="procesar_orden.php">
                <div class="mb-3">
                  <label for="ingredienteSelect" class="form-label">Ingrediente</label>
                  <select class="form-select" id="ingredienteSelect" name="ingrediente">
                    <option value="carnitas">Carnitas</option>
                    <option value="buche">Buche</option>
                    <option value="cuerito">Cuerito</option>
                    <option value="trompo">Trompo</option>
                    <option value="costilla">Costilla</option>
                    <option value="adobada">Adobada</option>
                    <option value="bistec">Bistec</option>
                    <option value="suadero">Suadero</option>
                    <option value="surtido">Surtido</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="cantidadSelect" class="form-label">Cantidad</label>
                  <select class="form-select" id="cantidadSelect" name="cantidad">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Segundo Modal -->
        <div class="modal fade" id="armaOrdenModal" tabindex="-1" aria-labelledby="armaOrdenModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="armaOrdenModalLabel">Arma tu orden</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="procesar_orden.php">
                  <div class="mb-3">
                    <label for="taco1Select" class="form-label">Taco 1</label>
                    <select class="form-select" id="taco1Select" name="taco1">
                      <option value="carnitas">Carnitas</option>
                      <option value="buche">Buche</option>
                      <option value="cuerito">Cuerito</option>
                      <option value="trompo">Trompo</option>
                      <option value="costilla">Costilla</option>
                      <option value="adobada">Adobada</option>
                      <option value="bistec">Bistec</option>
                      <option value="suadero">Suadero</option>
                      <option value="surtido">Surtido</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="taco2Select" class="form-label">Taco 2</label>
                    <select class="form-select" id="taco2Select" name="taco2">
                      <option value="carnitas">Carnitas</option>
                      <option value="buche">Buche</option>
                      <option value="cuerito">Cuerito</option>
                      <option value="trompo">Trompo</option>
                      <option value="costilla">Costilla</option>
                      <option value="adobada">Adobada</option>
                      <option value="bistec">Bistec</option>
                      <option value="suadero">Suadero</option>
                      <option value="surtido">Surtido</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="taco3Select" class="form-label">Taco 3</label>
                    <select class="form-select" id="taco3Select" name="taco3">
                      <option value="carnitas">Carnitas</option>
                      <option value="buche">Buche</option>
                      <option value="cuerito">Cuerito</option>
                      <option value="trompo">Trompo</option>
                      <option value="costilla">Costilla</option>
                      <option value="adobada">Adobada</option>
                      <option value="bistec">Bistec</option>
                      <option value="suadero">Suadero</option>
                      <option value="surtido">Surtido</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="taco4Select" class="form-label">Taco 4</label>
                    <select class="form-select" id="taco4Select" name="taco4">
                      <option value="carnitas">Carnitas</option>
                      <option value="buche">Buche</option>
                      <option value="cuerito">Cuerito</option>
                      <option value="trompo">Trompo</option>
                      <option value="costilla">Costilla</option>
                      <option value="adobada">Adobada</option>
                      <option value="bistec">Bistec</option>
                      <option value="suadero">Suadero</option>
                      <option value="surtido">Surtido</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
              </div>
            </div>
          </div>
        </div>


    <br>

    <div class="content-section">
        <h2>Lonches</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/lonche1.jpg" alt="lonch">
              <div class="product-name">Lonche sencillo</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/lonche1.jpg" alt="lonchmix">
              <div class="product-name">Lonche mixto</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/lonche1.jpg" alt="lonchaguacate">
              <div class="product-name">Lonche de aguacate</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/lonche1.jpg" alt="lonchesp">
              <div class="product-name">Lonche especial</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Gringas</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="gringa1">
              <div class="product-name">Gringa</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="gringa2">
              <div class="product-name">Gringa 2 carnes</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Carnes</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/carne.jpeg" alt="1kgcarne">
              <div class="product-name">1 Kg de Carne</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/carne.jpeg" alt="1/2kgcarne">
              <div class="product-name">1/2 Kg de carne</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Chicharrones</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="pella">
              <div class="product-name">Chicharrón de pella</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="botanero">
              <div class="product-name">Chicharrón botanero</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="durito">
              <div class="product-name">Chicharrón durito</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Paquetes</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="Taco 1">
              <div class="product-name">Paquete 1</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="Taco 2">
              <div class="product-name">Paquete 2</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="Taco 1">
              <div class="product-name">Paquete 3</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="Taco 2">
              <div class="product-name">Paquete 4</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Bebidas</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/michelada.jpg" alt="michelada">
              <div class="product-name">Michelada</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/celis.jpg" alt="celis">
              <div class="product-name">Celis</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Otros</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="../img/chamorro.jpeg" alt="chamorro">
              <div class="product-name">Chamorro</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="manitas">
              <div class="product-name">Manitas</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="quesadilla">
              <div class="product-name">Quesadilla</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

    <br>

    <div class="content-section">
        <h2>Complementos</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="verdura">
              <div class="product-name">Verdura extra</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="tostadas">
              <div class="product-name">Tostadas extra</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="cebollita">
              <div class="product-name">Cebollita habanera extra</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="salsaaceite">
              <div class="product-name">Salsa de aceite extra</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco1.jpg" alt="1 kilo">
              <div class="product-name">1KG de Torillas</div>
              <div class="price">$10.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-card">
              <img src="ruta_imagen_taco2.jpg" alt="1/2 kilo">
              <div class="product-name">1/2 KG Tortillas</div>
              <div class="price">$12.00</div>
              <button class="add-to-cart btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </div>
    </div>

</body>
</html>