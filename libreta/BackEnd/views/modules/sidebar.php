<?php

  $itemInstitucion = null;
  $valueInstitucion = null;

  $responseInstitucion = InstitucionController::ctrShowInstitucion($itemInstitucion, $valueInstitucion);

  $logo = $responseInstitucion["Logo"];

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
      <img src="../<?php echo $logo; ?>" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8; width: 100px; height: 50px">
      <span class="brand-text font-weight-light">AGENDA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="views/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home" class="nav-link" id="home">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="phonebook" class="nav-link" id="phonebook">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Agenda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="departments" class="nav-link" id="departments">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Departamentos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="company" class="nav-link" id="company">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Empresa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="countries" class="nav-link" id="countries">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Pais
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="headquarters" class="nav-link" id="headquarters">
              <i class="nav-icon fas fa-map-pin"></i>
              <p>
                Sede
              </p>
            </a>
          </li>
          <?php
          
            if ($_SESSION["Rol"] == 1) {
              ?>
              <li class="nav-item">
                <a href="users" class="nav-link" id="users">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                  </p>
                </a>
              </li>
              <?php
            }
          
          ?>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>