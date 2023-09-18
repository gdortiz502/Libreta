<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Empresas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Empresas</li>
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
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#insertCompany"><i class="fas fa-plus"></i> Nuevo</button>
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

                        $response = CompanyController::ctrShowCompany($item, $value);

                        foreach ($response as $key => $value) {

                            if($value["Estatus"] == 1){

                                $status = '<span class="btn btn-xs btn-success">Activo</span>';

                                $btnEditar = '<button class="btn btn-danger btn-xs btnDeleteCompany" IdCompany="'.$value['IdEmpresa'].'"><i class="fas fa-trash"></i></button>';

                            }else{

                                $status = '<span class="btn btn-xs btn-danger">Inactivo</span>';

                                $btnEditar = '<button class="btn btn-success btn-xs btnActivarCompany" IdCompany="'.$value['IdEmpresa'].'"><i class="fas fa-check"></i></button>';
                            
                            }
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowCompany" IdCompany="'.$value['IdEmpresa'].'" data-toggle="modal" data-target="#showCompany"><i class="fas fa-eye"></i></button>';

                                        if ($_SESSION["Rol"] == 1) {
                                          echo '<button class="btn btn-warning btn-xs btnEditCompany" IdCompany="'.$value['IdEmpresa'].'" data-toggle="modal" data-target="#editCompany"><i class="fas fa-edit"></i></button>
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

  <div class="modal fade" id="showCompany">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver pais</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <b class="text-muted">Descripcion</b>
                    <p id="showDescriptionCompany"></p>
                </div>
                <div class="col-12">
                    <b class="text-muted">Estatus</b>
                    <p id="showEstatusCompany"></p>
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

  <div class="modal fade" id="insertCompany">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nueva Empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtDescripcionEmpresa">Descripción</label>
                        <input type="text" class="form-control form-control-border" name="txtDescripcionEmpresa" id="txtDescripcionEmpresa" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $insertCompany = new CompanyController();
                $insertCompany -> ctrInserCompany();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editCompany">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtEditDescripcionEmpresa">Descripción</label>
                        <input type="hidden" id="txtEditIdEmpresa" name="txtEditIdEmpresa">
                        <input type="text" class="form-control form-control-border" name="txtEditDescripcionEmpresa" id="txtEditDescripcionEmpresa" placeholder="Descripcion">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

                $editCountry = new CompanyController();
                $editCountry -> ctrEditCompany();

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
  
    $updateCompany = new CompanyController();
    $updateCompany -> ctrUpdateCompany();
  
  ?>