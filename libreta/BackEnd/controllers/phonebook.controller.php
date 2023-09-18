<?php

use PhonebookController as GlobalPhonebookController;

    class PhonebookController{

        public static function ctrShowPhonebook($item, $value){

            $table = "agenda";

            $response = PhonebookModel::mdlShowPhonebook($table, $item, $value);

            return $response;

        }

        public static function ctrInsertContact(){

            if(isset($_POST["txtPrimerNombreContacto"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtPrimerNombreContacto"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtSegundoNombreContacto"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtTercerNombreContacto"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtPrimerApellidoContacto"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtSegundoApellidoContacto"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtApellidoCasadaContacto"]) ||
                   preg_match('/^[0-9]+$/', $_POST["txtCodigoContacto"]) || 
                   preg_match('/^[0-9]+$/', $_POST["txtExtensionContacto"]) ||
                   preg_match('/^[0-9]+$/', $_POST["txtTelefonoContacto"]) ||
                   preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9 ]+$/', $_POST["txtPuestoContacto"]) ||
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtCorreoUsuario"])){

                    $table = "agenda";

                    $route = "views/img/user.png";

                    if ($_FILES["imgUserPhonebook"]["tmp_name"] != "" ) {
                        if(isset($_FILES["imgUserPhonebook"]["tmp_name"])){

                            list($ancho, $alto) = getimagesize($_FILES["imgUserPhonebook"]["tmp_name"]);
    
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
    
                            /*=============================================
                            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                            =============================================*/
    
                            $fecha = date('d-m-Y');
    
                            $directorio = "views/img/".$_POST["txtPrimerNombreContacto"]."_".$fecha;
    
                            mkdir($directorio, 0755);
    
                            /*=============================================
                            DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                            =============================================*/
    
                            if($_FILES["imgUserPhonebook"]["type"] == "image/jpeg"){
    
                                /*=============================================
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                =============================================*/
    
                                $aleatorio = mt_rand(100,999);
    
                                $route = "views/img/".$_POST["txtPrimerNombreContacto"]."_".$fecha."/".$aleatorio.".jpg";
    
                                $origen = imagecreatefromjpeg($_FILES["imgUserPhonebook"]["tmp_name"]);						
    
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                                imagejpeg($destino, $route);
    
                            }
    
                            if($_FILES["imgUserPhonebook"]["type"] == "image/png"){
    
                                /*=============================================
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                =============================================*/
    
                                $aleatorio = mt_rand(100,999);
    
                                $route = "views/img/".$_POST["txtPrimerNombreContacto"]."_".$fecha."/".$aleatorio.".png";
    
                                $origen = imagecreatefrompng($_FILES["imgUserPhonebook"]["tmp_name"]);						
    
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                                imagepng($destino, $route);
    
                            }
    
                        }
                    }
    
                    $NombreCompleto = ''.$_POST["txtPrimerNombreContacto"].' 
                                       '.$_POST["txtSegundoNombreContacto"].' 
                                       '.$_POST["txtTercerNombreContacto"].' 
                                       '.$_POST["txtPrimerApellidoContacto"].' 
                                       '.$_POST["txtSegundoApellidoContacto"].' 
                                       '.$_POST["txtApellidoCasadaContacto"].'';

                    $data = array(
                        "PrimerNombre" => $_POST["txtPrimerNombreContacto"],
                        "SegundoNombre" => $_POST["txtSegundoNombreContacto"],
                        "TercerNombre" => $_POST["txtTercerNombreContacto"],
                        "PrimerApellido" => $_POST["txtPrimerApellidoContacto"],
                        "SegundoApellido" => $_POST["txtSegundoApellidoContacto"],
                        "ApellidoCasado" => $_POST["txtApellidoCasadaContacto"],
                        "NombreCompleto" => $NombreCompleto,
                        "FechaNacimiento" => $_POST["txtFechaContacto"],
                        "Correo" => $_POST["txtCorreoUsuario"],
                        "Codigo" => $_POST["txtCodigoContacto"],
                        "Extension" => $_POST["txtExtensionContacto"],
                        "Telefono" => $_POST["txtTelefonoContacto"],
                        "Sede" => $_POST["ddSedeContacto"],
                        "Departamento" => $_POST["ddDepartamentoSelect"],
                        "Empresa" => $_POST["ddEmpresaContacto"],
                        "Puesto" => $_POST["txtPuestoContacto"],
                        "Imagen" => $route,
                        "Observaciones" => $_POST["txtObservacionesContacto"]
                    );
    
                    $respuesta = PhonebookModel::mdlInsertContact($table, $data);
    
                    if($respuesta == "ok"){

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El contacto ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "phonebook";
    
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
    
                                window.location = "phonebook";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditContact(){

            if(isset($_POST["txtEditNombre"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditSegundoNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditTercerNombre"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditPrimerApellido"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditSegundoApellido"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÜü]+$/', $_POST["txtEditApellidoCasado"]) ||
                   preg_match('/^[0-9]+$/', $_POST["txtEditCodigo"]) || 
                   preg_match('/^[0-9]+$/', $_POST["txtEditExtension"]) ||
                   preg_match('/^[0-9]+$/', $_POST["txtEditTelefono"]) ||
                   preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9 ]+$/', $_POST["txtEditPuesto"]) ||
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtEditCorreo"])){

                    $table = "agenda";

                    $route = "";

                    if ($_FILES["imgUserPhonebookEdit"]["tmp_name"] != "" ) {
                        if(isset($_FILES["imgUserPhonebookEdit"]["tmp_name"])){

                            list($ancho, $alto) = getimagesize($_FILES["imgUserPhonebookEdit"]["tmp_name"]);
    
                            $nuevoAncho = 500;
                            $nuevoAlto = 500;
    
                            /*=============================================
                            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                            =============================================*/
    
                            $fecha = date('d-m-Y');
    
                            $directorio = "views/img/".$_POST["txtEditNombre"]."_".$fecha;
    
                            mkdir($directorio, 0755);
    
                            /*=============================================
                            DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                            =============================================*/
    
                            if($_FILES["imgUserPhonebookEdit"]["type"] == "image/jpeg"){
    
                                /*=============================================
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                =============================================*/
    
                                $aleatorio = mt_rand(100,999);
    
                                $route = "views/img/".$_POST["txtEditNombre"]."_".$fecha."/".$aleatorio.".jpg";
    
                                $origen = imagecreatefromjpeg($_FILES["imgUserPhonebookEdit"]["tmp_name"]);						
    
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                                imagejpeg($destino, $route);
    
                            }
    
                            if($_FILES["imgUserPhonebookEdit"]["type"] == "image/png"){
    
                                /*=============================================
                                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                                =============================================*/
    
                                $aleatorio = mt_rand(100,999);
    
                                $route = "views/img/".$_POST["txtEditNombre"]."_".$fecha."/".$aleatorio.".png";
    
                                $origen = imagecreatefrompng($_FILES["imgUserPhonebookEdit"]["tmp_name"]);						
    
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                                imagepng($destino, $route);
    
                            }
    
                        }
                    }else{
                        $route = $_POST["imgUserEditActual"];
                    }
    
                    $NombreCompleto = ''.$_POST["txtEditNombre"].' 
                                       '.$_POST["txtEditSegundoNombre"].' 
                                       '.$_POST["txtEditTercerNombre"].' 
                                       '.$_POST["txtEditPrimerApellido"].' 
                                       '.$_POST["txtEditSegundoApellido"].' 
                                       '.$_POST["txtEditApellidoCasado"].'';

                    $data = array(
                        "IdContacto" => $_POST["txtEditIdContact"],
                        "PrimerNombre" => $_POST["txtEditNombre"],
                        "SegundoNombre" => $_POST["txtEditSegundoNombre"],
                        "TercerNombre" => $_POST["txtEditTercerNombre"],
                        "PrimerApellido" => $_POST["txtEditPrimerApellido"],
                        "SegundoApellido" => $_POST["txtEditSegundoApellido"],
                        "ApellidoCasado" => $_POST["txtEditApellidoCasado"],
                        "NombreCompleto" => $NombreCompleto,
                        "FechaNacimiento" => $_POST["txtEditFechaNacimiento"],
                        "Correo" => $_POST["txtEditCorreo"],
                        "Codigo" => $_POST["txtEditCodigo"],
                        "Extension" => $_POST["txtEditExtension"],
                        "Telefono" => $_POST["txtEditTelefono"],
                        "Sede" => $_POST["ddEditSede"],
                        "Departamento" => $_POST["ddEditDepartamento"],
                        "Empresa" => $_POST["ddEditEmpresa"],
                        "Puesto" => $_POST["txtEditPuesto"],
                        "Imagen" => $route,
                        "Observaciones" => $_POST["txtEditObservaciones"]
                    );
    
                    $respuesta = PhonebookModel::mdlUpdateContact($table, $data);
    
                    if($respuesta == "ok"){

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El contacto ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "phonebook";
    
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
    
                                window.location = "phonebook";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrDeleteContact(){

            if(isset($_GET["IdContacto"])){
    
                $table ="agenda";


                $data = array(
                    "IdContacto" => $_GET["IdContacto"]
                );
    
                $response = PhonebookModel::mdlDeleteContact($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "El contacto se ha eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "phonebook";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }