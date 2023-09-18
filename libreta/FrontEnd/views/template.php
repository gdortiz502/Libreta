<?php

  $itemInstitucion = null;
  $valueInstitucion = null;

  $responseInstitucion = InstitucionController::ctrShowInstitucion($itemInstitucion, $valueInstitucion);

  $logo = $responseInstitucion["Logo"];

  $nombre = $responseInstitucion["Nombre"];

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda Telefónica | <?php echo $nombre ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/9165fb6e34.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="views/css/adminlte.min.css">
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="views/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/js/adminlte.min.js"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <?php

    include 'modules/navbar.php';

    if(isset($_GET["route"])){

      if($_GET["route"] == "home" ||
         $_GET["route"] == "contact"){
          
          include 'modules/'.$_GET["route"].'.php';

      }else{

          include 'modules/404.php';

      }

  }else{

      echo '<script>window.location = "home"</script>';

  }

    include 'modules/footer.php';
  
  ?>

  

</div>
<!-- ./wrapper -->

<script src="views/js/template.js"></script>
</body>
</html>
