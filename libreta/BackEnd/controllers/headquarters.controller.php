<?php

    class HeadquartersController{

        public static function ctrShowHeadquarter($item, $value){

            $table = "sede";

            $response = HeadquartersModel::mdlShowHeadquarters($table, $item, $value);

            return $response;

        }

        public static function ctrInserHeadquarter(){

            if(isset($_POST["txtDescripcionSede"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtDescripcionSede"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ.,- ]+$/', $_POST["txtDireccionSede"])){

                    $table = "sede";
    
                    $data = array(
                        "Descripcion" => $_POST["txtDescripcionSede"],
                        "Direccion" => $_POST["txtDireccionSede"],
                        "Pais" => $_POST["ddPaisSede"]
                    );
    
                    $response = HeadquartersModel::mdlInsertHeadquarters($table, $data);
    
                    if($response == "ok"){
    

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "La sede ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "headquarters";
    
                                        }
                                    })
    
                        </script>';
    
                    }else{
                        var_dump($response);
                    }
    
    
                }else{
    
                    echo'<script>
    
                        swal.fire({
                              icon: "error",
                              title: "La descripción no puede ir vacia o llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {
    
                                window.location = "headquarters  ";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditHeadquarter(){

            if(isset($_POST["txtEditDescripcionSede"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtEditDescripcionSede"]) ||
                   preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtDireccionEditSede"])){

                    $table = "sede";
    
                    $data = array(
                        "IdSede" => $_POST["txtIdEditSede"],
                        "Descripcion" => $_POST["txtEditDescripcionSede"],
                        "Direccion" => $_POST["txtDireccionEditSede"],
                        "Pais" => $_POST["ddPaisSedeEdit"]
                    );
    
                    $response = HeadquartersModel::mdlEditHeadquarters($table, $data);
    
                    if($response == "ok"){
    
                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "La sede ha sido editada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "headquarters";
    
                                        }
                                    })
    
                        </script>';
    
                    }else{
                        var_dump($response);
                    }
    
    
                }else{
    
                    echo'<script>
    
                        swal.fire({
                              icon: "error",
                              title: "La descripción no puede ir vacia o llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {
    
                                window.location = "headquarters";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrUpdateHeadquarter(){

            if(isset($_GET["IdSede"])){
    
                $table ="sede";

                $value = $_GET["estatus"];

                if ($value == 1) {

                    $estatus = 0;
                }else {
                    
                    $estatus = 1;

                }

                $data = array(
                    "IdSede" => $_GET["IdSede"],
                    "Estatus" =>  $estatus
                );
    
                $response = HeadquartersModel::mdlUpdateHeadquarters($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "La sede ha sido modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "headquarters";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }