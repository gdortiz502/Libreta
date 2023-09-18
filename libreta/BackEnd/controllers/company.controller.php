<?php

    class CompanyController{

        public static function ctrShowCompany($item, $value){

            $table = "empresa";

            $response = CompanyModel::mdlShowCompany($table, $item, $value);

            return $response;

        }

        public static function ctrInserCompany(){

            if(isset($_POST["txtDescripcionEmpresa"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtDescripcionEmpresa"])){

                    $table = "empresa";
    
                    $data = array(
                        "Descripcion" => $_POST["txtDescripcionEmpresa"]
                    );
    
                    $response = CountriesModel::mdlInsertCountries($table, $data);
    
                    if($response == "ok"){
    

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "La empresa ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "company";
    
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
    
                                window.location = "company";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditCompany(){

            if(isset($_POST["txtEditDescripcionEmpresa"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtEditDescripcionEmpresa"])){

                    $table = "empresa";
    
                    $data = array(
                        "IdEmpresa" => $_POST["txtEditIdEmpresa"],
                        "Descripcion" => $_POST["txtEditDescripcionEmpresa"]
                    );
    
                    $response = CompanyModel::mdlEditCompany($table, $data);
    
                    if($response == "ok"){
    
                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "La empresa ha sido editada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "company";
    
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
    
                                window.location = "company";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrUpdateCompany(){

            if(isset($_GET["IdCompany"])){
    
                $table ="empresa";

                $value = $_GET["estatus"];

                if ($value == 1) {

                    $estatus = 0;
                }else {
                    
                    $estatus = 1;

                }

                $data = array(
                    "IdEmpresa" => $_GET["IdCompany"],
                    "Estatus" =>  $estatus
                );
    
                $response = CompanyModel::mdlUpdateCompany($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "La empresa ha sido modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "company";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }