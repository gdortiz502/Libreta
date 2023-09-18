<?php
  $itemI = null;
  $valueI = null;

  $responseI = InstitucionController::ctrShowInstitucion($itemI, $valueI);

  $logo = $responseI["Logo"];



?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="home" class="navbar-brand">
        <img src="../<?php echo $responseI["Logo"] ?>" alt="Logo CODACA" class="brand-image elevation-3" style="opacity: .8">
      </a>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="home" class="nav-link">Inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->