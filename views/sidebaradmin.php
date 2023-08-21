<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark sticky-top">
  <!-- Left navbar links-->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../../indexadmin.php" class="nav-link">Home</a>
    </li>
    <div class="dropdown m-1">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Notificaciones
      </button>
      <div class="dropdown-menu" aria-labelledby="notificationDropdown" id="table">
        <?php
        // Configuración de la base de datos
        $db = new database();
        $db->ConectarDB();
        $pdo = $db->getConexion();
        // Configuración de la base de datos
        try {
          $sql = "SELECT notification_dataadmin.description as dd
          FROM notification_dataadmin 
          join notification_data on notification_dataadmin.noti = notification_data.id 
          JOIN ORDENES ON ORDENES.orden_id = notification_data.orden
          where ORDENES.status='Pendiente' 
          ORDER BY noti desc 
          limit 1";
          $sql = $pdo->prepare($sql);
          $sql->execute();
          $notifications = $sql->fetchAll(PDO::FETCH_ASSOC);

          $sql1 = "SELECT noti, user_id, user as 'n', orden_id as 'o' 
          from USUARIOS 
          join ORDENES on USUARIOS.user_id = ORDENES.cliente 
          join notification_data on notification_data.orden = ORDENES.orden_id
          join notification_dataadmin on notification_dataadmin.noti = notification_data.id
          where ORDENES.status='Pendiente' 
          order by noti desc 
          limit 3";
          $sql1 = $pdo->prepare($sql1);
          $sql1->execute();
          $users = $sql1->fetchAll(PDO::FETCH_ASSOC);

          if ($notifications) {
            foreach ($notifications as $notification) {
              foreach ($users as $user) {
                echo '<a class="dropdown-item">' . $notification['dd'] . ' Usuario: ' . $user['n'] . '. Orden: ' . $user['o'] . '</a>';
              }
            }
          } else {
            echo '<a class="dropdown-item">No hay ordenes pendientes.</a>';
          }
        } catch (PDOException $e) {
          echo '<a class="dropdown-item text-danger">Error: ' . $e->getMessage() . '</a>';
        }

        $db->desconectarDB();
        ?>
      </div>
    </div>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu 
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
      </li> -->
  </ul>
  <!-- notis y cerrar sesión-->
  <a href="../../class/cerrarsesion.php">
    <button type="button" class="btn btn-block col-2 btn-dark">Cerrar sesión</button>
  </a>
</nav>
<!-- /.navbar -->
<!--<script type="text/javascript">
    function tiempoReal() {
      var tabla = $.ajax({
        url: '../scripts/notifications.php',
        dataType: 'text',
        async: false
      }).responseText;

      document.getElementById("table").innerHTML = tabla;
    }
    setInterval(tiempoReal, 1000);
  </script>-->


<aside class="main-sidebar position-fixed elevation-4" style="background-color: #ff7a00;">

  <a href="../../indexadmin.php" class="brand-link">
    <img src="../../img\logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style="color: black;">Carnitas&nbsp;el&nbsp;Chaperon</span>
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

              <div class="info">
                <a href="#" class="d-block" style="color: black;">
                  <div class="icon">
                    <i class="fas fa-user pr-3"></i>Administrador
                  </div>
                </a>
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
                      <a href="../../views/reportes/reportes_diarios.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reporte diario</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_semanales.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes semanales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_mensuales.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes mensuales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_anuales.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes anuales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_segun_fecha.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes por rango de fechas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_segun_tipo_comida.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes por el tipo de comida</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_segun_producto.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes según producto</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_metodo_pago.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes por método de pago</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../views/reportes/reportes_cantidad_productos.php" class="nav-link" style="color: black;">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Reportes de cantidad de productos</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="../../views/comedor.php" class="nav-link" style="color: black;">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Órdenes del comedor
                      <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../views/productos_pllevar.php" class="nav-link" style="color: black;">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Órdenes para llevar
                      <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../views/ordenes_online.php" class="nav-link" style="color: black;">
                    <i class="nav-icon fas fa-th"></i>
                    <p class="ms-auto">
                      Órdenes online
                      <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="../../views/prodcrud.php" class="nav-link" style="color: black;">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Productos
                      </p>
                    </a>
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