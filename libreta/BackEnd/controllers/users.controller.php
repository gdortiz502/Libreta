<?php

    class UsersControllers{

        public static function ctrSigInUser(){

            if(isset($_POST["txtUsuarioLogin"])){

                if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtUsuarioLogin"]) &&
                   preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtPasswordLogin"])){

                    $encriptar = crypt($_POST["txtPasswordLogin"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    $tabla = "usuarios";

                    $item = "Correo";

                    $valor = $_POST["txtUsuarioLogin"];

                    $respuesta = UsersModel::mdlShowUser($tabla, $item, $valor);

                    if($respuesta["Correo"] == $_POST["txtUsuarioLogin"] && $respuesta["Password"] == $encriptar){

                        if($respuesta["Estatus"] == 1){
    
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION["id"] = $respuesta["IdUsuario"];
                            $_SESSION["nombre"] = $respuesta["Display"];
                            $_SESSION["Correo"] = $respuesta["Correo"];
                            $_SESSION["Password"] = $respuesta["Password"];
                            $_SESSION["Rol"] = $respuesta["Rol"];
    
                            echo '<script>
    
                                window.location = "home";
    
                            </script>';
			
                        }else{
    
                            echo '<br>
                                <div class="alert alert-danger">El usuario aún no esta activado</div>';

                        }		
    
                    }else{
    
                        echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

                    }

                }

            }

        }

        public static function ctrShowUsers($item, $valor){

            $tabla = "usuarios";

            $respuesta = UsersModel::mdlShowUser($tabla, $item, $valor);

            return $respuesta;

        }

        public static function ctrShowRoles($item, $valor){

            $tabla = "rol";

            $respuesta = UsersModel::mdlShowUser($tabla, $item, $valor);

            return $respuesta;

        }

        public static function ctrInsertUser(){

            if(isset($_POST["txtPrimerNombreUsuario"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtPrimerNombreUsuario"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtSegundoNombreUsuario"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtTercerNombreUsuario"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtPrimerApellidoUsuario"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtSegundoApellidoUsuario"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtApellidoCasadaUsuario"]) ||
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtCorreoUsuario"])){

                    $table = "usuarios";

                    $encriptar = crypt($_POST["txtPasswordUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    
                    $display = ''.$_POST["txtPrimerNombreContacto"].' '.$_POST["txtPrimerApellidoUsuario"].'';

                    $data = array(
                        "PrimerNombre" => $_POST["txtPrimerNombreUsuario"],
                        "SegundoNombre" => $_POST["txtSegundoNombreUsuario"],
                        "TercerNombre" => $_POST["txtTercerNombreUsuario"],
                        "PrimerApellido" => $_POST["txtPrimerApellidoUsuario"],
                        "SegundoApellido" => $_POST["txtSegundoApellidoUsuario"],
                        "ApellidoCasada" => $_POST["txtApellidoCasadaUsuario"],
                        "Correo" => $_POST["txtCorreoUsuario"],
                        "Password" => $encriptar,
                        "Display" => $display,
                        "Rol" => $_POST["ddRolUsuario"]
                    );
    
                    $respuesta = UsersModel::mdlInsertUser($table, $data);
    
                    if($respuesta == "ok"){

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El usuario ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "users";
    
                                        }
                                    })
    
                        </script>';
    
                    }else{
                        var_dump($respuesta);
                    }
    
    
                }else{
    
                    echo'<script>
    
                        swal.fire({
                              icon: "error",
                              title: "Los campos no puenden llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {
    
                                window.location = "users";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditUser(){

            if(isset($_POST["txtEditPrimerNombre"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditPrimerNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditSegundoNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditTercerNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditPrimerApellido"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditSegundoApellido"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditApellidoCasada"]) ||
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtEditCorreo"])){

                    $table = "usuarios";

                    if (isset($_POST["txtEditPassword"])) {
                        
                        $encriptar = crypt($_POST["txtEditPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    }else{
                        
                        $encriptar = $_POST["txtPasswordActual"];

                    }
                    
                    $display = ''.$_POST["txtEditPrimerNombre"].' '.$_POST["txtEditPrimerApellido"].'';

                    $data = array(
                        "IdUsuario" => $_POST["txtIdUsuario"],
                        "PrimerNombre" => $_POST["txtEditPrimerNombre"],
                        "SegundoNombre" => $_POST["txtEditSegundoNombre"],
                        "TercerNombre" => $_POST["txtEditTercerNombre"],
                        "PrimerApellido" => $_POST["txtEditPrimerApellido"],
                        "SegundoApellido" => $_POST["txtEditSegundoApellido"],
                        "ApellidoCasado" => $_POST["txtEditApellidoCasada"],
                        "Correo" => $_POST["txtEditCorreo"],
                        "Password" => $encriptar,
                        "Display" => $display,
                        "Rol" => $_POST["ddEditRol"]
                    );
    
                    $respuesta = UsersModel::mdlUpdateUser($table, $data);
    
                    if($respuesta == "ok"){

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El usuario ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "users";
    
                                        }
                                    })
    
                        </script>';
    
                    }else{
                        var_dump($respuesta);
                    }
    
    
                }else{
    
                    echo'<script>
    
                        swal.fire({
                              icon: "error",
                              title: "Los campos no puenden llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {
    
                                window.location = "users";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrDeleteUser(){

            if(isset($_GET["IdUsuario"])){
    
                $table ="usuarios";

                $value = $_GET["estatus"];

                if ($value == 1) {

                    $estatus = 0;
                
                }else {
                    
                    $estatus = 1;

                }

                $data = array(
                    "IdUsuario" => $_GET["IdUsuario"],
                    "Estatus" =>  $estatus
                );
    
                $response = UsersModel::mdlDeleteUser($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "El usuario ha sido modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "users";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }