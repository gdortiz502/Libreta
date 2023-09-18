<?php

  session_start();

  $itemInstitucion = null;
  $valueInstitucion = null;

  $responseInstitucion = InstitucionController::ctrShowInstitucion($itemInstitucion, $valueInstitucion);

  $logo = $responseInstitucion["Logo"];

  $nombre = $responseInstitucion["Nombre"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda Telefónica | <?php echo $nombre ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/9165fb6e34.js" crossorigin="anonymous"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="views/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="views/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/css/adminlte.min.css">
  <!--SweetAlert 2-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--TOASTR-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- jQuery -->
  <script src="views/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="views/js/jquery.dataTables.min.js"></script>
  <script src="views/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/js/dataTables.responsive.min.js"></script>
  <script src="views/js/responsive.bootstrap4.min.js"></script>
  <script src="views/js/dataTables.buttons.min.js"></script>
  <script src="views/js/buttons.bootstrap4.min.js"></script>
  <script src="views/js/jszip.min.js"></script>
  <script src="views/js/pdfmake.min.js"></script>
  <script src="views/js/vfs_fonts.js"></script>
  <script src="views/js/buttons.html5.min.js"></script>
  <script src="views/js/buttons.print.min.js"></script>
  <script src="views/js/buttons.colVis.min.js"></script> 
  <!-- bs-custom-file-input -->
  <script src="views/js/bs-custom-file-input.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="views/css/select2.min.css">
  <!-- Select2 -->
  <script src="views/js/select2.full.min.js"></script>
  <!--TOASTR-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Page specific script -->
  <script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <!--TOASTR-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<!-- Site wrapper -->

<?php
  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

    echo '<body class="hold-transition sidebar-mini">
      <div class="wrapper">';

      include 'modules/navbar.php';

      include 'modules/sidebar.php';

      if(isset($_GET["ruta"])){

        if($_GET["ruta"] == "home" ||
           $_GET["ruta"] == "phonebook" ||
           $_GET["ruta"] == "countries" ||
           $_GET["ruta"] == "company" ||
           $_GET["ruta"] == "departments" ||
           $_GET["ruta"] == "headquarters" ||
           $_GET["ruta"] == "users" ||
           $_GET["ruta"] == "logout"){
            
            include 'modules/'.$_GET["ruta"].'.php';

        }else{

            include 'modules/404.php';

        }

    }else{

        echo '<script>window.location = "home"</script>';

    }

    include 'modules/footer.php';

    echo '</div>';

  }else{

    include 'modules/login.php';

  }

?>

<!-- ./wrapper -->
<script src="views/js/template.js"></script>
<script src="views/js/phonebook.js"></script>
<script src="views/js/countries.js"></script>
<script src="views/js/company.js"></script>
<script src="views/js/department.js"></script>
<script src="views/js/headquarters.js"></script>
<script src="views/js/users.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();

    $('.select2').select2();
  });
</script>
</body>
</html>
