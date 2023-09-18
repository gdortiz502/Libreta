<?php

  $item = 'IdContacto';

  $value = $_GET["IdContacto"];

  $response = PhonebookController::ctrShowPhonebook($item, $value);

  $itemSede = 'IdSede';

  $valueSede = $response["Sede"];

  $responseSede = SedesController::ctrShowSedes($itemSede, $valueSede);

  $itemDepartamento = 'IdDepartamento';

  $valueDepartamento = $response["Departamento"];

  $responseDepartamento = DepartmentController::ctrShowDepartment($itemDepartamento, $valueDepartamento);

  $itemEmpresa = 'IdEmpresa';

  $valueEmpresa = $response["Empresa"];

  $responseEmpresa = EmpresaController::ctrShowEmpresa($itemEmpresa, $valueEmpresa);

  $itemPais = 'IdPais';

  $valuePais = $responseSede["Pais"];

  $responsePais = PaisController::ctrShowPais($itemPais, $valuePais);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Datos del Contacto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active"> Agenda Telefónica</li>
              <li class="breadcrumb-item active"> <?php echo $response["PrimerNombre"]." ".$response["PrimerApellido"]?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container">
        <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
              <h3 class="d-inline-block d-sm-none"><?php echo $response["PrimerNombre"]." ".$response["SegundoNombre"]." ".$response["PrimerApellido"]." ".$response["SegundoApellido"] ?></h3>
              <div class="col-12 text-center">
                <?php
                
                  if($response["Imagen"] != ''){

                    echo '<img src="../backend/'.$response["Imagen"].'" class="rounded img-circle" alt="Product Image" style="max-width:300px!important; overflow: hidden, importa !important;">';

                  }else{

                    echo '<img src="../backend/views/img/user.png" class="rounded" alt="Product Image" style="max-width:300px!important; overflow: hidden, importa !important;"">';

                  }
                
                ?>
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <a href="home" class="float-right text-muted"><i class="fa fa-reply"></i> Regresar</a>
              <h3 class="my-3"><?php echo $response["PrimerNombre"]." ".$response["SegundoNombre"]." ".$response["PrimerApellido"]." ".$response["SegundoApellido"] ?></h3>
              <p class="text-muted"><b>Puesto: </b> <?php echo $response["Puesto"] ?> </p>
              <hr>
              <ul class="ml-4 fa-ul text-muted">
                <li class=""><span class="fa-li"><i class="fas fa-hashtag"></i></span><b> Código:</b> <?php echo $response["Codigo"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-phone"></i></span> <b>Extensión:</b> <?php echo $response["Extension"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-mobile"></i></span> <b>Teléfono:</b> <?php echo $response["Telefono"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-envelope"></i></span> <b>Correo:</b> <a href="mailto:<?php echo $response["Correo"] ?>"><?php echo $response["Correo"] ?></a></li>
                <li class=""><span class="fa-li"><i class="fas fa-map-pin"></i></span> <b>Sede: </b><?php echo $responseSede["Descripcion"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-user-cog"></i></span> <b>Departamento:</b> <?php echo $responseDepartamento["Descripcion"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-building"></i></span> <b>Empresa:</b> <?php echo $responseEmpresa["Descripcion"] ?></li>
                <li class=""><span class="fa-li"><i class="fas fa-globe"></i></span> <b>Pais:</b> <?php echo $responsePais["Descripcion"] ?></li>
              </ul>
              <hr>
              <b>Comentarios:</b>
              <p><?php echo $response["Observaciones"] ?></p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->