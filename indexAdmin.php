<?php
require 'class/config.php';
include 'class/database.php';
$db = new Database();
$db->conectarDB();
$pdo = $db->getConexion();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=TU_API_KEY&callback=initMap" async defer></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- Incluye los scripts de AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/adminlte@3.1.0/dist/js/adminlte.min.js"></script>

  <title>Administración</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="indexadmin.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
    <a type="button" class="btn btn-block col-2 btn-dark" href="class/cerrarsesion.php">Cerrar sesión</a>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container-->
  <aside class="main-sidebar elevation-4 position-fixed" style="background-color: #ff7a00;">

    <a href="indexadmin.php" class="brand-link mt-2">
      <img src="img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: black;"> <b>Carnitas&nbsp;el&nbsp;Chaperon</b></span>
    </a>

    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
      <div class="os-resize-observer-host observed">
        <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
      </div>
      <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
        <div class="os-resize-observer"></div>
      </div>
      <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 742px;"></div>
      <div class="os-padding">
        <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
          <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <hr class="border-1 opacity-100" style="background-color: black; width:auto">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block" style="color: black;">Administrador</a>
                </div>
              </div>
              <hr class="border-1 opacity-100" style="background-color: black; width:auto">

              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Reportes
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                      <li class="nav-item">
                        <a href="views/reportes/reportes_diarios.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reporte diario</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_semanales.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reporte semanal</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_mensuales.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes mensuales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_anuales.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes anuales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_segun_fecha.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por rango de fechas</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_segun_tipo_comida_fechas.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por tipo de comida</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_segun_producto.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes según producto</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_metodo_pago.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por método de pago</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="views/reportes/reportes_cantidad_productos.php" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes de cantidad de productos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Órdenes del comedor
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="views/ordenes/productos_pllevar.php" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Órdenes para llevar
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="views/ordenes/ordenes_online.php" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-th"></i>
                      <p class="ms-auto">
                        Órdenes online
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Productos
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Añadir productos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Editar productos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: black;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Eliminar productos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li><br><br><br><br><br><br></li>
                </ul>
              </nav>

            </div>
          </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
          </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="height: 46.4665%; transform: translate(0px, 0px);"></div>
          </div>
        </div>
        <div class="os-scrollbar-corner"></div>
      </div>

  </aside>

  <div class="content-wrapper" style="background-color: white;">
    <br>
    <br>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $host = "localhost";
                $dbname = "BDCarnitasChaperon";
                $username = "root";
                $password = "";

                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                $cadena = "CALL DINERO_DIARIO(@TotalDiario);";
                $stmt = $conn->query($cadena);
                $stmt->closeCursor();
                $r = $conn->query("SELECT @TotalDiario as 'Total Diario';")->fetch(PDO::FETCH_ASSOC);
                $totalDiario = $r['Total Diario'];
                if ($totalDiario == null) {
                  echo "<h3>$0.00</h3>";
                } else {
                  echo "<h3>$ " . $totalDiario . "</h3>";
                }
                $conn = null; //Termina la conexión con la bd
                ?>
                <p>Ventas diarias</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="views/generaladmin/diario.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $fechaActual = new DateTime(); // Obtenemos la fecha actual

                // Obtenemos el número del día de la semana (0 para domingo, 6 para sábado)
                $diaSemana = $fechaActual->format("w");

                // Calculamos la fecha de inicio de la semana (restamos los días correspondientes al día de la semana)
                $primerDiaSemana = clone $fechaActual;
                $primerDiaSemana->sub(new DateInterval('P' . $diaSemana . 'D'));
                $primerDiaSemanaOficial = $primerDiaSemana->format("Y-m-d");

                $host = "localhost";
                $dbname = "BDCarnitasChaperon";
                $username = "root";
                $password = "";

                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                $cadena = "CALL DINERO_SEMANAL('$primerDiaSemanaOficial', @TotalSemanal);";
                $stmt = $conn->query($cadena);
                $stmt->closeCursor();
                $r = $conn->query("SELECT @TotalSemanal as 'Total Semanal';")->fetch(PDO::FETCH_ASSOC);
                $totalSemanal = $r['Total Semanal'];

                echo "<h3>$ " . $totalSemanal . "</h3>";
                $conn = null; //Termina la conexión con la bd
                ?>
                <p>Venta semanal</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="views/generaladmin/semanal.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $fechaActual = new DateTime(); // Obtenemos la fecha actual

                // Obtenemos el mes actual
                $mes = $fechaActual->format("m");

                // Obtenemos el año actual
                $año = $fechaActual->format("Y");

                $host = "localhost";
                $dbname = "bdcarnitaschaperon";
                $username = "root";
                $password = "";

                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                $cadena = "CALL DINERO_MENSUAL('$mes', '$año', @TotalMensual);";
                $stmt = $conn->query($cadena);
                $stmt->closeCursor();
                $r = $conn->query("SELECT @TotalMensual as 'Total Mensual';")->fetch(PDO::FETCH_ASSOC);
                $totalMensual = $r['Total Mensual'];

                echo "<h3>$ " . $totalMensual . "</h3>";
                $conn = null; //Termina la conexión con la bd
                ?>

                <p>Venta mensual</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="views/generaladmin/mensual.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $host = "localhost";
                $dbname = "bdcarnitaschaperon";
                $username = "root";
                $password = "";

                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para obtener el resultado de la vista
                $consulta = "SELECT USUARIOS FROM CANTIDAD_USUARIOS";

                // Ejecutar la consulta y obtener el resultado como un entero
                $resultado = $conn->query($consulta)->fetchColumn();

                // Imprimir el resultado
                echo "<h3> " . $resultado . "</h3>";
                $conn = null; //Termina la conexión con la bd
                ?>

                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="views/generaladmin/usuarios.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- Prueba gráfica horas-->
          <div class="col-12 col-md-12 col-lg-12 mt-4 mb-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gráfica de órdenes finalizadas por hora (mensual)</h3>
              </div>
              <div class="card-body">
                <div class="col-12">
                  <canvas id="horaPicoChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <?php
          $horas = range(10, 18); // Hours from 10:00 a.m. to 6:00 p.m.

          $labels = array_map(function ($hora) {
            return sprintf('%02d:00', $hora); // Formatear la hora en formato HH:00
          }, $horas);


          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "BDCarnitasChaperon";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $currentMonth = date('Y-m'); // Get the current year and month (e.g., 2023-08)

            $sql = "SELECT HOUR(hora_inicio) AS hora, COUNT(*) AS cantidad_ordenes
            FROM ORDENES
            WHERE TIME(hora_inicio) >= '10:00:00' AND TIME(hora_inicio) <= '18:00:00'
              AND ORDENES.status = 'Finalizado' AND MONTH(ORDENES.fecha) = MONTH(CURRENT_DATE())
            GROUP BY HOUR(hora_inicio)
            ORDER BY HOUR(hora_inicio);";

            $stmt = $conn->prepare($sql);
            //$stmt->bindParam(':currentMonth', $currentMonth); // No es necesario enlazar este parámetro
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $cantidades = array_fill_keys($horas, 0);
            foreach ($result as $row) {
              $hora = $row['hora'];
              $cantidades[$hora] = $row['cantidad_ordenes'];
            }
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          $conn = null;
          ?>


        </div>
      </div>


      <script>
        // Configure the chart context
        var ctx = document.getElementById('horaPicoChart').getContext('2d');

        var horaPicoChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($labels); ?>, // Usar el nuevo array de etiquetas
            datasets: [{
              label: 'Cantidad de Órdenes',
              data: <?php echo json_encode(array_values($cantidades)); ?>,
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderWidth: 1,
              pointRadius: 4,
              pointBackgroundColor: 'rgba(75, 192, 192, 1)',
              fill: true
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>

</body>

</html>