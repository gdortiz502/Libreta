<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agenda Telefónica</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Inicio</a></li>
              <li class="breadcrumb-item active">Agenda Telefónica</li>
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
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#insertContact"><i class="fas fa-plus"></i> Nuevo</button>
                </div>';
                }
            
            ?>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Codigo</th>
                        <th>Extension</th>
                        <th>Telefono</th>
                        <th>Sede</th>
                        <th>Departamento</th>
                        <th>Pais</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $item = null;

                        $value = null;

                        $response = PhonebookController::ctrShowPhonebook($item, $value);

                        foreach ($response as $key => $value) {

                            $itemSede = 'IdSede';

                            $valueSede = $value["Sede"];

                            $responseSede = HeadquartersController::ctrShowHeadquarter($itemSede, $valueSede);

                            $itemDepartamento = 'IdDepartamento';

                            $valueDepartamento = $value["Departamento"];

                            $responseDepartamento = DepartmentController::ctrShowDepartment($itemDepartamento, $valueDepartamento);

                            $itemPais = 'IdPais';

                            $valuePais = $responseSede["Pais"];

                            $responsePais = CountriesController::ctrShowCountries($itemPais, $valuePais);
                            
                            echo '<tr>
                                    <td>
                                        <button class="btn btn-primary btn-xs btnShowContact" IdContacto="'.$value["IdContacto"].'" data-toggle="modal" data-target="#showContact"><i class="fas fa-eye"></i></button>';

                                        if ($_SESSION["Rol"] == 1) {
                                            echo '<button class="btn btn-danger btn-xs btnDeleteContact" IdContacto="'.$value["IdContacto"].'"><i class="fas fa-trash"></i></button>
                                            <button class="btn btn-warning btn-xs btnEditContact" IdContacto="'.$value["IdContacto"].'" data-toggle="modal" data-target="#editContact"><i class="fas fa-edit"></i></button>';
                                        }
                                    
                                        echo '</td>                                 
                                    <td>'.$value["NombreCompleto"].'</td>
                                    <td>'.$value["Puesto"].'</td>
                                    <td>'.$value["Codigo"].'</td>
                                    <td>'.$value["Extension"].'</td>
                                    <td>'.$value["Telefono"].'</td>
                                    <td>'.$responseSede["Descripcion"].'</td>
                                    <td>'.$responseDepartamento["Descripcion"].'</td>
                                    <td>'.$responsePais["Descripcion"].'</td>
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

  <div class="modal fade" id="showContact">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ver Contacto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <img id="showImgContact" width="200px" height="200px" src="" alt="">
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <b class="text-muted">Primer Nombre</b>
                                    <p id="showPrimerNombreContact"></p>
                                </div>
                                <div class="col-4">
                                    <b class="text-muted">Segundo Nombre</b>
                                    <p id="showSegundoNombreContact"></p>
                                </div>
                                <div class="col-4">
                                    <b class="text-muted">Tercer Nombre</b>
                                    <p id="showTercerNombreContact"></p>
                                </div>
                                <div class="col-4">
                                    <b class="text-muted">Primer Apellido</b>
                                    <p id="showPrimerApellidoContact"></p>
                                </div>
                                <div class="col-4">
                                    <b class="text-muted">Segundo Apellido</b>
                                    <p id="showSegundoApellidoContact"></p>
                                </div>
                                <div class="col-4">
                                    <b class="text-muted">Apellido de Casada</b>
                                    <p id="showApellidoCasadoContact"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <b class="text-muted mt-2 mb-0">Detalles del Contacto</b>
                    <hr class="m-0">
                </div>
                <div class="col-3">
                    <b class="text-muted">Fecha de Nacimiento</b>
                    <p id="showFechaContacts"></p>
                </div>
                <div class="col-4">
                    <b class="text-muted">Correo</b>
                    <p id="showCorreoContacto"></p>
                </div>
                <div class="col-2">
                    <b class="text-muted">Codigo</b>
                    <p id="showCodigoContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Extension</b>
                    <p id="showExtensionContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Telefono</b>
                    <p id="showTelefonoContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Sede</b>
                    <p id="showSedeContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Departamento</b>
                    <p id="showDepartamentoContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Empresa</b>
                    <p id="showEmpresaContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Pais</b>
                    <p id="showPaisContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Puesto</b>
                    <p id="showPuestoContacto"></p>
                </div>
                <div class="col-3">
                    <b class="text-muted">Observaciones</b>
                    <p id="showObservacionesContacto"></p>
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
                <div class="col-4">
                    <img style="cursor:pointer" id="imgUser" src="views/img/user.png" width="200px" height="200px" alt="">
                    <div class="form-group mt-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgUserPhonebook" name="imgUserPhonebook">
                            <label class="custom-file-label" for="customFile">Seleccionar</label>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtPrimerNombreContacto">Primer Nombre</label>
                                <input type="text" required class="form-control form-control-border" name="txtPrimerNombreContacto" id="txtPrimerNombreContacto" placeholder="Primer Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtSegundoNombreContacto">Segundo Nombre</label>
                                <input type="text" class="form-control form-control-border" name="txtSegundoNombreContacto" id="txtSegundoNombreContacto" placeholder="Segundo Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtTercerNombreContacto">Tercer Nombre</label>
                                <input type="text" class="form-control form-control-border" name="txtTercerNombreContacto" id="txtTercerNombreContacto" placeholder="Tercer Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtPrimerApellidoContacto">Primer Apellido</label>
                                <input type="text" required class="form-control form-control-border" name="txtPrimerApellidoContacto" id="txtPrimerApellidoContacto" placeholder="Primer Apellido">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtSegundoApellidoContacto">Segundo Apellido</label>
                                <input type="text" class="form-control form-control-border" name="txtSegundoApellidoContacto" id="txtSegundoApellidoContacto" placeholder="Segundo Apellido">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtApellidoCasadaContacto">Apellido de Casada</label>
                                <input type="text" class="form-control form-control-border" name="txtApellidoCasadaContacto" id="txtApellidoCasadaContacto" placeholder="Apellido de Casada">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-muted m-0">Datos del Contacto</p>
                    <hr class="mt-0">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtFechaContacto">Fecha de Nacimiento</label>
                        <input type="date" class="form-control form-control-border" name="txtFechaContacto" id="txtFechaContacto">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtCorreoUsuario">Correo</label>
                        <input type="text" class="form-control form-control-border" name="txtCorreoUsuario" id="" placeholder="Correo">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtCodigoContacto">Codigo</label>
                        <input type="text" class="form-control form-control-border" name="txtCodigoContacto" id="txtCodigoContacto" placeholder="Código">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtExtensionContacto">Extension</label>
                        <input type="text" class="form-control form-control-border" name="txtExtensionContacto" id="txtExtensionContacto" placeholder="Extensión">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtTelefonoContacto">Telefono</label>
                        <input type="text" class="form-control form-control-border" name="txtTelefonoContacto" id="txtTelefonoContacto" placeholder="Telefono">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtPuestoContacto">Puesto</label>
                        <input type="text" class="form-control form-control-border" name="txtPuestoContacto" id="txtPuestoContacto" placeholder="Puesto">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddSedeContacto">Sede</label>
                        <select class="form-control" id="ddSedeContacto" name="ddSedeContacto" style="width: 100%;">
                        
                            <option value="">-- Seleccione --</option>

                            <?php

                                $itemSede = null;

                                $valueSede = null;

                                $responseSede = HeadquartersController::ctrShowHeadquarter($itemSede, $valueSede);

                                foreach ($responseSede as $key => $value) {
                                    
                                    if($value["Estatus"] != 0){
                                        echo '<option value="'.$value["IdSede"].'">'.$value["Descripcion"].'</option>';
                                    }

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddDepartamentoSelect">Departamento</label>
                        <select class="form-control" id="ddDepartamentoSelect" name="ddDepartamentoSelect" style="width: 100%;">
                            <option value="">-- Seleccione --</option>
                            <?php

                                $itemDepartment = null;

                                $valueDepartment = null;

                                $responseDepartment = DepartmentController::ctrShowDepartment($itemDepartment, $valueDepartment);

                                foreach ($responseDepartment as $key => $value) {
                                    
                                    if ($value["Estatus"] != 0) {
                                        echo '<option value="'.$value["IdDepartamento"].'">'.$value["Descripcion"].'</option>';
                                    }

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddEmpresaContacto">Empresa</label>
                        <select class="form-control" id="ddEmpresaContacto" name="ddEmpresaContacto" style="width: 100%;">
                            <option value="">-- Seleccione --</option>
                            <?php

                                $itemCompany = null;

                                $valueCompany = null;

                                $responseCompany = CompanyController::ctrShowCompany($itemCompany, $valueCompany);

                                foreach ($responseCompany as $key => $value) {
                                    
                                    if ($value["Estatus"] != 0) {
                                        echo '<option value="'.$value["IdEmpresa"].'">'.$value["Descripcion"].'</option>';
                                    }

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                
                    <div class="form-group">
                        <label for="txtObservacionesContacto">Observaciones</label>
                        <textarea class="form-control" name="txtObservacionesContacto" id="txtObservacionesContacto" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

            $insertContact = new PhonebookController();
            $insertContact -> ctrInsertContact();

            ?>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="editContact">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Contacto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4">
                    <img style="cursor:pointer" id="imgUserEdit" src="views/img/user.png" width="200px" height="200px" alt="">
                    <div class="form-group mt-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgUserPhonebookEdit" name="imgUserPhonebookEdit">
                            <input type="hidden" name="imgUserEditActual" id="imgUserEditActual">
                            <label class="custom-file-label" for="customFile">Seleccionar</label>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditNombre">Primer Nombre</label>
                                <input type="text" required class="form-control form-control-border" name="txtEditNombre" id="txtEditNombre" placeholder="Primer Nombre">
                                <input type="hidden" name="txtEditIdContact" id="txtEditIdContact">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditSegundoNombre">Segundo Nombre</label>
                                <input type="text" class="form-control form-control-border" name="txtEditSegundoNombre" id="txtEditSegundoNombre" placeholder="Segundo Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditTercerNombre">Tercer Nombre</label>
                                <input type="text" class="form-control form-control-border" name="txtEditTercerNombre" id="txtEditTercerNombre" placeholder="Tercer Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditPrimerApellido">Primer Apellido</label>
                                <input type="text" required class="form-control form-control-border" name="txtEditPrimerApellido" id="txtEditPrimerApellido" placeholder="Primer Apellido">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditSegundoApellido">Segundo Apellido</label>
                                <input type="text" class="form-control form-control-border" name="txtEditSegundoApellido" id="txtEditSegundoApellido" placeholder="Segundo Apellido">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEditApellidoCasado">Apellido de Casada</label>
                                <input type="text" class="form-control form-control-border" name="txtApellidoCasadaContacto" id="txtApellidoCasadaContacto" placeholder="Apellido de Casada">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-muted m-0">Datos del Contacto</p>
                    <hr class="mt-0">
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditFechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control form-control-border" name="txtEditFechaNacimiento" id="txtEditFechaNacimiento">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditCorreo">Correo</label>
                        <input type="text" class="form-control form-control-border" name="txtEditCorreo" id="txtEditCorreo" placeholder="Correo">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditCodigo">Codigo</label>
                        <input type="text" class="form-control form-control-border" name="txtEditCodigo" id="txtEditCodigo" placeholder="Código">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditExtension">Extension</label>
                        <input type="text" class="form-control form-control-border" name="txtEditExtension" id="txtEditExtension" placeholder="Extensión">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditTelefono">Telefono</label>
                        <input type="text" class="form-control form-control-border" name="txtEditTelefono" id="txtEditTelefono" placeholder="Telefono">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="txtEditPuesto">Puesto</label>
                        <input type="text" class="form-control form-control-border" name="txtEditPuesto" id="txtEditPuesto" placeholder="Puesto">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddEditSede">Sede</label>
                        <select class="form-control" id="ddEditSede" name="ddEditSede" style="width: 100%;">
                        
                            <option value="">-- Seleccione --</option>

                            <?php

                                $itemSede = null;

                                $valueSede = null;

                                $responseSede = HeadquartersController::ctrShowHeadquarter($itemSede, $valueSede);

                                foreach ($responseSede as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdSede"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddEditDepartamento">Departamento</label>
                        <select class="form-control" id="ddEditDepartamento" name="ddEditDepartamento" style="width: 100%;">
                            <option value="">-- Seleccione --</option>
                            <?php

                                $itemDepartment = null;

                                $valueDepartment = null;

                                $responseDepartment = DepartmentController::ctrShowDepartment($itemDepartment, $valueDepartment);

                                foreach ($responseDepartment as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdDepartamento"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="ddEditEmpresa">Empresa</label>
                        <select class="form-control" id="ddEditEmpresa" name="ddEditEmpresa" style="width: 100%;">
                            <option value="">-- Seleccione --</option>
                            <?php

                                $itemCompany = null;

                                $valueCompany = null;

                                $responseCompany = CompanyController::ctrShowCompany($itemCompany, $valueCompany);

                                foreach ($responseCompany as $key => $value) {
                                    
                                    echo '<option value="'.$value["IdEmpresa"].'">'.$value["Descripcion"].'</option>';

                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                
                    <div class="form-group">
                        <label for="txtEditObservaciones">Observaciones</label>
                        <textarea class="form-control" name="txtEditObservaciones" id="txtEditObservaciones" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <?php

            $editContact = new PhonebookController();
            $editContact -> ctrEditContact();

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
  
    $deleteContact = new PhonebookController();
    $deleteContact -> ctrDeleteContact();
    
  ?>