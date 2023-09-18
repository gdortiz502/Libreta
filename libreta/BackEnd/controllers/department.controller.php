<?php

    class DepartmentController{

        public static function ctrShowDepartment($item, $value){

            $table = "departamento";

            $response = DepartmentModel::mdlShowDepartment($table, $item, $value);

            return $response;

        }

        public static function ctrInsertDepartment(){

            if(isset($_POST["txtDescripcionDepartamento"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtDescripcionDepartamento"])){

                    $table = "departamento";
    
                    $data = array(
                        "Descripcion" => $_POST["txtDescripcionDepartamento"]
                    );
    
                    $response = CountriesModel::mdlInsertCountries($table, $data);
    
                    if($response == "ok"){
    

                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El departamento ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "departments";
    
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
    
                                window.location = "departments  ";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        public static function ctrEditDepartment(){

            if(isset($_POST["txtEditDescripcionDepartment"])){

                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚüÜ., ]+$/', $_POST["txtEditDescripcionDepartment"])){

                    $table = "departamento";
    
                    $data = array(
                        "IdDepartamento" => $_POST["txtEditIdDepartamento"],
                        "Descripcion" => $_POST["txtEditDescripcionDepartment"]
                    );
    
                    $response = DepartmentModel::mdlEditDepartment($table, $data);
    
                    if($response == "ok"){
    
                        echo'<script>

                        swal.fire({
                            icon: "success",
                            title: "El departamento ha sido editado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "departments";
    
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
    
                                window.location = "departments";
    
                                }
                            })
    
                      </script>';
    
                }

            }

        }

        static public function ctrUpdateDepartment(){

            if(isset($_GET["IdDepartamento"])){
    
                $table ="departamento";

                $value = $_GET["estatus"];

                if ($value == 1) {

                    $estatus = 0;
                }else {
                    
                    $estatus = 1;

                }

                $data = array(
                    "IdDepartamento" => $_GET["IdDepartamento"],
                    "Estatus" =>  $estatus
                );
    
                $response = DepartmentModel::mdlUpdateDepartment($table, $data);
    
                if($response == "ok"){

                    echo'<script>

                    swal.fire({
                        icon: "success",
                        title: "El departamento ha sido modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                    if (result.value) {

                                    window.location = "departments";

                                    }
                                })

                    </script>';

                    
                }else{

                    echo '<script>alert('.$response.')</script>';

                }
            }
            
        }

    }