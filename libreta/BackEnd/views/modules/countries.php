<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paises</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Paises</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <?php
            
              if ($_SESSION["Rol"] == 1) {
                echo '<div class="card-header">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#insertCountry"><i class="fas fa-plus"></i> Nuevo</button>
            </div>';
              }
            
            ?>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Descripción</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $item = null;

                        $value = null;

                        $response = CountriesController::ctrShowCountries($item, $value);

                        foreach ($response as $key => $value) {

                            if($value["Estatus"] == 1){

                                $status = '<span class="btn btn-xs btn-success">Activo</span>';

                                $btnEditar = '<button class="btn btn-danger btn-xs btnDeleteCountry" IdPais="'.$value['IdPais'].'"><i class="fas fa-trash"></i></button>';

                            }else{

                                $status = '<span class="btn btn-xs btn-danger">Inactivo</span>';

                                $btnEditar = '<button class="btn btn-success btn-xs btnActivarCountry" IdPais="'.$value['IdPais'].'"><i class="fas fa-check"></i></button>';
                            
                            }
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowCountry" IdPais="'.$value['IdPais'].'" data-toggle="modal" data-target="#showCountry"><i class="fas fa-eye"></i></button>';

                                        if ($_SESSION["Rol"] == 1) {
                                          echo '<button class="btn btn-warning btn-xs btnEditCountry" IdPais="'.$value['IdPais'].'" data-toggle="modal" data-target="#editCountry"><i class="fas fa-edit"></i></button>
                                          '.$btnEditar.'';
                                        }
                                    echo '</td>                                 
                                    <td>'.$value["Descripcion"].'</td>
                                    <td>'.$status.'</td>
                                  </tr>';

                        }
                    
                    ?>
                </tbody>
            </table>
            </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="showCountry">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver Empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <b class="text-muted">Descripcion</b>
                    <p id="showDescriptionCountry"></p>
                </div>
                <div class="col-12">
                    <b class="text-muted">Estatus</b>
                    <p id="showEstatusContries"></p>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="insertCountry">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nuevo pais</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtDescripcionPais">Descripción</label>
                        <input type="text" class="form-control form-control-border" name="txtDescripcionPais" id="txtDescripcionPais" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $insertCountry = new CountriesController();
                $insertCountry -> ctrInsertCountries();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editCountry">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar pais</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtEditDescripcionPais">Descripción</label>
                        <input type="hidden" id="txtEditIdPais" name="txtEditIdPais">
                        <input type="text" class="form-control form-control-border" name="txtEditDescripcionPais" id="txtEditDescripcionPais" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $editCountry = new CountriesController();
                $editCountry -> ctrEditCountry();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <?php
  
    $updateCountry = new CountriesController();
    $updateCountry -> ctrUpdateCountry();
  
  ?>