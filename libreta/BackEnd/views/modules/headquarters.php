<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sedes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Sedes</li>
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
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#inserHeadquarter"><i class="fas fa-plus"></i> Nuevo</button>
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
                        <th>Direccion</th>
                        <th>Pais</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $item = null;

                        $value = null;

                        $response = HeadquartersController::ctrShowHeadquarter($item, $value);


                        foreach ($response as $key => $value) {

                            $itemCountry = 'IdPais';

                            $valueCountry = $value["Pais"];

                            $responseCountry = CountriesController::ctrShowCountries($itemCountry, $valueCountry);

                            if($value["Estatus"] == 1){

                                $status = '<span class="btn btn-xs btn-success">Activo</span>';

                                $btnEditar = '<button class="btn btn-danger btn-xs btnDeleteHeadquarter" IdSede="'.$value['IdSede'].'"><i class="fas fa-trash"></i></button>';

                            }else{

                                $status = '<span class="btn btn-xs btn-danger">Inactivo</span>';

                                $btnEditar = '<button class="btn btn-success btn-xs btnActivarHeadquarter" IdSede="'.$value['IdSede'].'"><i class="fas fa-check"></i></button>';
                            
                            }
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowHeadquarter" IdSede="'.$value['IdSede'].'" data-toggle="modal" data-target="#showHeadquarter"><i class="fas fa-eye"></i></button>';
                                        if ($_SESSION["Rol"] == 1) {
                                          echo '<button class="btn btn-warning btn-xs btnEditHeadQuarter" IdSede="'.$value['IdSede'].'" data-toggle="modal" data-target="#editHeadquarter"><i class="fas fa-edit"></i></button>
                                          '.$btnEditar.'';
                                        }
                                    echo '</td>                                 
                                    <td>'.$value["Descripcion"].'</td>
                                    <td>'.$value["Direccion"].'</td>
                                    <td>'.$responseCountry["Descripcion"].'</td>
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

  <div class="modal fade" id="showHeadquarter">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver sede</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <b class="text-muted">Descripcion</b>
                    <p id="showDescripcionHeadquarter"></p>
                </div>
                <div class="col-6">
                    <b class="text-muted">Pais</b>
                    <p id="showPaisHeadquarter"></p>
                </div>
                <div class="col-12">
                    <b class="text-muted">Direccion</b>
                    <p id="showDireccionHeadquarter"></p>
                </div>
                <div class="col-12">
                    <b class="text-muted">Estatus</b>
                    <p id="showEstatusHeadquarter"></p>
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

  <div class="modal fade" id="inserHeadquarter">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nueva Sede</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtDescripcionSede">Descripción</label>
                        <input type="text" class="form-control form-control-border" name="txtDescripcionSede" id="txtDescripcionSede" placeholder="Descripcion">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="ddPaisSede">Pais</label>
                        <select class="custom-select form-control-border form-control-sm m-0" id="ddPaisSede" name="ddPaisSede">
                            <option value="">-- Seleccione --</option>
                            <?php
                            
                                $itemDDCountry = null;

                                $valueDDCountry = null;

                                $responseDDCountry = CountriesController::ctrShowCountries($itemDDCountry, $valueDDCountry);

                                foreach ($responseDDCountry as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdPais"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtDireccionSede">Direccion</label>
                        <textarea class="form-control" rows="3" placeholder="Direccion ..." name="txtDireccionSede" id="txtDireccionSede"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $inserHeadquarter = new HeadquartersController();
                $inserHeadquarter -> ctrInserHeadquarter();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editHeadquarter">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar sede</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtEditDescripcionSede">Descripción</label>
                        <input type="text" class="form-control form-control-border" name="txtEditDescripcionSede" id="txtEditDescripcionSede" placeholder="Descripcion">
                        <input type="hidden" name="txtIdEditSede" id="txtIdEditSede">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="ddPaisSedeEdit">Pais</label>
                        <select class="custom-select form-control-border form-control-sm m-0" id="ddPaisSedeEdit" name="ddPaisSedeEdit">
                            <option value="">-- Seleccione --</option>
                            <?php
                            
                                $itemDDCountry = null;

                                $valueDDCountry = null;

                                $responseDDCountry = CountriesController::ctrShowCountries($itemDDCountry, $valueDDCountry);

                                foreach ($responseDDCountry as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdPais"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtDireccionEditSede">Direccion</label>
                        <textarea class="form-control" rows="3" placeholder="Direccion ..." name="txtDireccionEditSede" id="txtDireccionEditSede"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $editSede = new HeadquartersController();
                $editSede -> ctrEditHeadquarter();

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
  
    $updateHeadquarter = new HeadquartersController();
    $updateHeadquarter -> ctrUpdateHeadquarter();
  
  ?>