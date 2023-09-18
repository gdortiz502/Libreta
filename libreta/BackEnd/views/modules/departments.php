<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departamentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Departamentos</li>
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
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#insertDepartement"><i class="fas fa-plus"></i> Nuevo</button>
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

                        $response = DepartmentController::ctrShowDepartment($item, $value);

                        foreach ($response as $key => $value) {

                            if($value["Estatus"] == 1){

                                $status = '<span class="btn btn-xs btn-success">Activo</span>';

                                $btnEditar = '<button class="btn btn-danger btn-xs btnDeleteCompany" IdDepartment="'.$value['IdDepartamento'].'"><i class="fas fa-trash"></i></button>';

                            }else{

                                $status = '<span class="btn btn-xs btn-danger">Inactivo</span>';

                                $btnEditar = '<button class="btn btn-success btn-xs btnActivarDepartamento" IdDepartment="'.$value['IdDepartamento'].'"><i class="fas fa-check"></i></button>';
                            
                            }
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowDepartment" IdDepartment="'.$value['IdDepartamento'].'" data-toggle="modal" data-target="#showDepartment"><i class="fas fa-eye"></i></button>';
                                        
                                        if ($_SESSION["Rol"] == 1) {
                                          echo '<button class="btn btn-warning btn-xs btnEditDepartment" IdDepartment="'.$value['IdDepartamento'].'" data-toggle="modal" data-target="#editDepartment"><i class="fas fa-edit"></i></button>
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

  <div class="modal fade" id="showDepartment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver departamento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <b class="text-muted">Descripcion</b>
                    <p id="showDescriptionDepartment"></p>
                </div>
                <div class="col-12">
                    <b class="text-muted">Estatus</b>
                    <p id="showEstatusDepartment"></p>
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

  <div class="modal fade" id="insertDepartement">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nuevo Departamento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtDescripcionDepartamento">Descripción</label>
                        <input type="text" class="form-control form-control-border" name="txtDescripcionDepartamento" id="txtDescripcionDepartamento" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $insertDepartment = new DepartmentController();
                $insertDepartment -> ctrInsertDepartment();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editDepartment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar departamento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtEditDescripcionDepartment">Descripción</label>
                        <input type="hidden" id="txtEditIdDepartamento" name="txtEditIdDepartamento">
                        <input type="text" class="form-control form-control-border" name="txtEditDescripcionDepartment" id="txtEditDescripcionDepartment" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $editDepartment = new DepartmentController();
                $editDepartment -> ctrEditDepartment();

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
  
    $updateDepartment = new DepartmentController();
    $updateDepartment -> ctrUpdateDepartment();
  
  ?>