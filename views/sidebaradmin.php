  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../indexadmin.php" class="nav-link">Home</a>
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
    <button type="button" class="btn btn-block col-2 btn-dark">Cerrar sesión</button>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar position-fixed" style="background-color: #ff7a00;">

    <a href="indexadmin.php" class="brand-link">
      <img src="../../img\logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: #864000;">Carnitas&nbsp;el&nbsp;Chaperon</span>
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
              <hr class="border-1 opacity-100" style="background-color: #864000; width:auto">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="../../dist\img\user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block" style="color: #864000;">Administrador</a>
                </div>
              </div>
              <hr class="border-1 opacity-100" style="background-color: #864000; width:auto">

              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: #864000;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Reportes
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                      <li class="nav-item">
                        <a href="reportes_diarios.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reporte diario</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_semanales.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes semanales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_mensuales.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes mensuales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_anuales.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes anuales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_segun_fecha.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por rango de fechas</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_segun_tipo_comida.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por el tipo de comida</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_segun_tipo_comida_fechas.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por tipo de comida por rango de fecha</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_segun_producto.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes según producto</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_metodo_pago.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes por método de pago</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="reportes_cantidad_productos.php" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reportes de cantidad de productos</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link" style="color: #864000;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Órdenes del comedor
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link" style="color: #864000;">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Órdenes para llevar
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link" style="color: #864000;">
                      <i class="nav-icon fas fa-th"></i>
                      <p class="ms-auto">
                        Órdenes online
                        <!--<span class="right badge badge-danger">New</span>-->
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="color: #864000;">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>
                        Productos
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Añadir productos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: #864000;">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Editar productos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" style="color: #864000;">
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