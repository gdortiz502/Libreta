<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Página Principal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Página Principal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php

                $item = null;
                $value = null;

                $responsePhonebook = PhonebookController::ctrShowPhonebook($item, $value);
              
                echo '<h3>'.count($responsePhonebook).'</h3>';

              ?>               

              <p>Contactos</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="phonebook" class="small-box-footer">
              Más Información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php

                $responseDepartment = DepartmentController::ctrShowDepartment($item, $value);
              
                echo '<h3>'.count($responseDepartment).'</h3>';

              ?>

              <p>Departamentos</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-cog"></i>
            </div>
            <a href="departments" class="small-box-footer">
              Más Información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php

                $responseCompany = CompanyController::ctrShowCompany($item, $value);
              
                echo '<h3>'.count($responseCompany).'</h3>';

              ?>

              <p>Empresas</p>
            </div>
            <div class="icon">
              <i class="fas fa-building"></i>
            </div>
            <a href="company" class="small-box-footer">
              Más Información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php

                $responseHeadquarter = HeadquartersController::ctrShowHeadquarter($item, $value);
              
                echo '<h3>'.count($responseHeadquarter).'</h3>';

              ?>

              <p>Sedes</p>
            </div>
            <div class="icon">
              <i class="fas fa-map-pin"></i>
            </div>
            <a href="headquarters" class="small-box-footer">
              Más Información <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cumpleañeros del Mes <i class="fas fa-gift"></i></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">Día</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Empresa</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
               
                $mesActual = date("m");

                if(count($responsePhonebook) > 0){
                  foreach ($responsePhonebook as $key => $value) {

                    $itemE = 'IdEmpresa';
                    $valueE = $value["Empresa"];

                    $responseC = CompanyController::ctrShowCompany($itemE, $valueE);
                  
                    $fecha = date_create($value["FechaNacimiento"]);
                    $mes = date_format($fecha, 'm');
                    $dia = date_format($fecha, 'd');
  
                    if ($mes == $mesActual) {
                      
                      echo '<tr>
                            <td>'.$dia.'</td>
                            <td>'.$value["NombreCompleto"].'</td>
                            <td>'.$value["Puesto"].'</td>
                            <td>'.$responseC["Descripcion"].'</td>
                          </tr>';
  
                    }
  
                  }
                }else{
                  echo '<tr class="text-center"><td colspan="4">No Hay cumpleañeros el día de hoy</td></tr>';
                }
              
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->