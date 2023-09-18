<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agenda Telefónica</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active"> Agenda Telefónica</li>
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
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 mb-2">
              <div class="input-group mb-3">
                <input type="text" class="form-control" id="btnSearchContact">
                <div class="input-group-append">
                  <span class="input-group-text bg-teal" ><i class="fas fa-search"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row showContacts">

          </div>
          <div class="row contactos">
            <?php

              $item = null;

              $value = null;

              $response = PhonebookController::ctrShowPhonebook($item, $value);

              if ($response != null) {
                
              

              foreach ($response as $key => $value) {

                $itemSede = 'IdSede';

                $valueSede = $value["Sede"];

                $responseSede = SedesController::ctrShowSedes($itemSede, $valueSede);

                $itemDepartamento = 'IdDepartamento';

                $valueDepartamento = $value["Departamento"];

                $responseDepartamento = DepartmentController::ctrShowDepartment($itemDepartamento, $valueDepartamento);

            ?>

              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    <i class="fas fa-building"></i> <?php echo $responseDepartamento["Descripcion"]." - ".$responseSede["Descripcion"] ?>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-8">
                        <h2 class="lead"><b><?php echo $value["PrimerNombre"]." ".$value["PrimerApellido"] ?> </b></h2>
                        <p class="text-muted text-sm"><b>Puesto: </b> <?php echo $value["Puesto"] ?> </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-hashtag"></i></span> Código: <?php echo $value["Codigo"] ?></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Extensión: <?php echo $value["Extension"] ?></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-mobile"></i></span> Teléfono: <?php echo $value["Telefono"] ?></li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Correo: <a href="mailto:<?php echo $value["Correo"] ?>"><?php echo $value["Correo"] ?></a></li>
                        </ul>
                      </div>
                      <div class="col-4 text-center">
                        <?php 

                          if($value["Imagen"] == ""){

                            echo '<img src="../backend/views/img/user.png" alt="user-avatar" class="img-circle img-fluid" style="max-width:100px!important; overflow: hidden!important;max-heigth:100px!important;">';

                          }else{

                            echo '<img src="../backend/'.$value["Imagen"].'" alt="user-avatar" class="img-circle img-fluid" style="max-width:100px!important; overflow:hidden!important;max-heigth:100px!important;">';

                          }
                        
                        ?>
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <a href="index.php?route=contact&IdContacto=<?php echo $value["IdContacto"]?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> Ver Contacto
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            
            <?php

              }
            }else{

              echo '<div class="col-12 mb-2">
              <h3 class="text-center text-muted">Aún no hay contactos</h3>
            </div>';

            }
            
            ?>
            
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