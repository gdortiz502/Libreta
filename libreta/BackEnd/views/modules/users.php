<?php

    if ($_SESSION["Rol"] != 1) {
        echo '<script>window.location = "home"</script>';
    }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#insertContact"><i class="fas fa-plus"></i> Nuevo</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estatus</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $item = null;

                        $value = null;

                        $response = UsersControllers::ctrShowUsers($item, $value);

                        foreach ($response as $key => $value) {

                            $itemRol = 'IdRol';

                            $valueRol = $value["Rol"];

                            $responseSede = UsersControllers::ctrShowRoles($itemRol, $valueRol);

                            if ($value["Estatus"] == 0) {
                                $estatus = '<span class="btn btn-xs btn-danger">Inactivo</span>';
                                $boton = '<button class="btn btn-success btn-xs btnActivarUsuario" IdUsuario="'.$value["IdUsuario"].'"><i class="fas fa-check"></i></button>';
                            }else{
                                $estatus = '<span class="btn btn-xs btn-success">Activo</span>';
                                $boton = '<button class="btn btn-danger btn-xs btnDeleteUser" IdUsuario="'.$value["IdUsuario"].'"><i class="fas fa-trash"></i></button>';
                            }
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowUser" IdUsuario="'.$value["IdUsuario"].'" data-toggle="modal" data-target="#showUser"><i class="fas fa-eye"></i></button>';
                                            if ($_SESSION["Rol"] == 1) {
                                                echo '<button class="btn btn-warning btn-xs btnEditUser" IdUsuario="'.$value["IdUsuario"].'" data-toggle="modal" data-target="#editUser"><i class="fas fa-edit"></i></button>'.
                                                $boton;
                                            }
                                    echo '</td>                                 
                                    <td>'.$value["Display"].'</td>
                                    <td>'.$value["Correo"].'</td>
                                    <td>'.$estatus.'</td>
                                    <td>'.$responseSede["Descripcion"].'</td>
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

  <div class="modal fade" id="showUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4">
                    <b class="text-muted">Primer Nombre</b>
                    <p id="showPrimerNombreUsuario"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Segundo Nombre</b>
                    <p id="showSegundoNombreContacto"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Tercer Nombre</b>
                    <p id="showTercerNombreUsuario"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Primer Apellido</b>
                    <p id="showPrimerApellidoUsuario"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Segundo Apellido</b>
                    <p id="showSegundoApellidoUsuario"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Apellido de Casada</b>
                    <p id="showApellidoCasadoUsuario"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Correo</b>
                    <p id="showCorreoUsuario"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Estatus</b>
                    <p id="ShowEstatusUsuario"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Rol</b>
                    <p id="showRolUsuario"></p>
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

  <div class="modal fade" id="insertContact">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nuevo Contacto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtPrimerNombreUsuario">Primer Nombre</label>
                        <input required type="text" required class="form-control form-control-border" name="txtPrimerNombreUsuario" id="txtPrimerNombreUsuario" placeholder="Primer Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtSegundoNombreUsuario">Segundo Nombre</label>
                        <input type="text" class="form-control form-control-border" name="txtSegundoNombreUsuario" id="txtSegundoNombreUsuario" placeholder="Segundo Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtTercerNombreUsuario">Tercer Nombre</label>
                        <input type="text" class="form-control form-control-border" name="txtTercerNombreUsuario" id="txtTercerNombreUsuario" placeholder="Tercer Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtPrimerApellidoUsuario">Primer Apellido</label>
                        <input required type="text" required class="form-control form-control-border" name="txtPrimerApellidoUsuario" id="txtPrimerApellidoUsuario" placeholder="Primer Apellido">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtSegundoApellidoUsuario">Segundo Apellido</label>
                        <input type="text" class="form-control form-control-border" name="txtSegundoApellidoUsuario" id="txtSegundoApellidoUsuario" placeholder="Segundo Apellido">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtApellidoCasadaUsuario">Apellido de Casada</label>
                        <input type="text" class="form-control form-control-border" name="txtApellidoCasadaUsuario" id="txtApellidoCasadaUsuario" placeholder="Apellido de Casada">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtCorreoUsuario">Correo</label>
                        <input required type="text" class="form-control form-control-border" name="txtCorreoUsuario" id="txtCorreoUsuario" placeholder="Correo">
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="txtPasswordUsuario">Contraseña</label>
                        <input type="password" class="form-control form-control-border" name="txtPasswordUsuario" id="txtPasswordUsuario" placeholder="Password">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddRolUsuario">Rol</label>
                        <select class="form-control" id="ddRolUsuario" name="ddRolUsuario" style="width: 100%;">
                        
                            <option value="">-- Seleccione --</option>

                            <?php

                                $itemRol = null;

                                $valueRol = null;

                                $responseRol = UsersControllers::ctrShowRoles($itemRol, $valueRol);

                                foreach ($responseRol as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdRol"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

            $insertContact = new UsersControllers();
            $insertContact -> ctrInsertUser();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditPrimerNombre">Primer Nombre</label>
                        <input type="hidden" id="txtIdUsuario" name="txtIdUsuario">
                        <input required type="text" required class="form-control form-control-border" name="txtEditPrimerNombre" id="txtEditPrimerNombre" placeholder="Primer Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditSegundoNombre">Segundo Nombre</label>
                        <input type="text" class="form-control form-control-border" name="txtEditSegundoNombre" id="txtEditSegundoNombre" placeholder="Segundo Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditTercerNombre">Tercer Nombre</label>
                        <input type="text" class="form-control form-control-border" name="txtEditTercerNombre" id="txtEditTercerNombre" placeholder="Tercer Nombre">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditPrimerApellido">Primer Apellido</label>
                        <input required type="text" required class="form-control form-control-border" name="txtEditPrimerApellido" id="txtEditPrimerApellido" placeholder="Primer Apellido">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditSegundoApellido">Segundo Apellido</label>
                        <input type="text" class="form-control form-control-border" name="txtEditSegundoApellido" id="txtEditSegundoApellido" placeholder="Segundo Apellido">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="txtEditApellidoCasada">Apellido de Casada</label>
                        <input type="text" class="form-control form-control-border" name="txtEditApellidoCasada" id="txtEditApellidoCasada" placeholder="Apellido de Casada">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtEditCorreo">Correo</label>
                        <input required type="text" class="form-control form-control-border" name="txtEditCorreo" id="txtEditCorreo" placeholder="Correo">
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="txtEditPassword">Contraseña</label>
                        <input type="password" class="form-control form-control-border" name="txtEditPassword" id="txtEditPassword" placeholder="Password">
                        <input type="hidden" id="txtPasswordActual" name="txtPasswordActual">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddEditRol">Rol</label>
                        <select class="form-control" id="ddEditRol" name="ddEditRol" style="width: 100%;">
                        
                            <option value="">-- Seleccione --</option>

                            <?php

                                $itemRol = null;

                                $valueRol = null;

                                $responseRol = UsersControllers::ctrShowRoles($itemRol, $valueRol);

                                foreach ($responseRol as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdRol"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

            $editUser = new UsersControllers();
            $editUser -> ctrEditUser();

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
  
    $deleteUser = new UsersControllers();
    $deleteUser -> ctrDeleteUser();
    
  ?>