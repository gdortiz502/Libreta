<?php

    class CountriesController{

        public static function ctrShowCountries($item, $value){

            $table = "pais";

            $response = CountriesModel::mdlShowCountries($table, $item, $value);

            return $response;

        }

        public static function ctrInsertCountries(){

            if(isset($_POST["txtDescripcionPais"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ ]+$/', $_POST["txtDescripcionPais"])){

                    $table = "pais";
    
                    $data = array(
                        "Descripcion" => $_POST["txtDescripcionPais"]
                    );
    
                    $response = CountriesModel::mdlInsertCountries($table, $data);
    
                    if($response == "ok"){
    

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El pais ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "countries";
    
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
    
                                window.location = "countries";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditCountry(){

            if(isset($_POST["txtEditDescripcionPais"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ ]+$/', $_POST["txtEditDescripcionPais"])){

                    $table = "pais";
    
                    $data = array(
                        "IdPais" => $_POST["txtEditIdPais"],
                        "Descripcion" => $_POST["txtEditDescripcionPais"]
                    );
    
                    $response = CountriesModel::mdlEditCountry($table, $data);
    
                    if($response == "ok"){
    
                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El pais ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "countries";
    
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
    
                                window.location = "countries";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrUpdateCountry(){

            if(isset($_GET["IdPais"])){
    
                $table ="pais";

                $value = $_GET["estatus"];

                if ($value == 1) {

                    $estatus = 0;
                }else {
                    
                    $estatus = 1;

                }

                $data = array(
                    "IdPais" => $_GET["IdPais"],
                    "Estatus" =>  $estatus
                );
    
                $response = CountriesModel::mdlUpdateCountry($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "El pais ha sido modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "countries";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }