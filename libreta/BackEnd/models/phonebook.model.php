<?php

    require_once 'conexion.php';

    class PhonebookModel{

        public static function mdlShowPhonebook($table, $item, $value){

            if($item != null){

                $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
    
                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
    
                $stmt -> execute();
    
                return $stmt -> fetch();
    
            }else{
    
                $stmt = Connection::Connect()->prepare("SELECT * FROM $table");
    
                $stmt -> execute();
    
                return $stmt -> fetchAll();
    
            }

            $stmt = null;

        }

        public static function mdlInsertContact($tabla, $datos){

            $stmt = Connection::Connect()->prepare("INSERT INTO $tabla(PrimerNombre,
                                                                       SegundoNombre,
                                                                       TercerNombre,
                                                                       PrimerApellido,
                                                                       SegundoApellido,
                                                                       ApellidoCasado,
                                                                       NombreCompleto,
                                                                       FechaNacimiento,
                                                                       Correo,
                                                                       Codigo,
                                                                       Extension,
                                                                       Telefono,
                                                                       Sede,
                                                                       Departamento,
                                                                       Empresa,
                                                                       Puesto,
                                                                       Imagen,
                                                                       Observaciones) 
                                                          VALUES (:PrimerNombre,
                                                                  :SegundoNombre,
                                                                  :TercerNombre,
                                                                  :PrimerApellido,
                                                                  :SegundoApellido,
                                                                  :ApellidoCasado,
                                                                  :NombreCompleto,
                                                                  :FechaNacimiento,
                                                                  :Correo,
                                                                  :Codigo,
                                                                  :Extension,
                                                                  :Telefono,
                                                                  :Sede,
                                                                  :Departamento,
                                                                  :Empresa,
                                                                  :Puesto,
                                                                  :Imagen,
                                                                  :Observaciones)");

            $stmt -> bindParam(":PrimerNombre", $datos["PrimerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoNombre", $datos["SegundoNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":TercerNombre", $datos["TercerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerApellido", $datos["PrimerApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoApellido", $datos["SegundoApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":ApellidoCasado", $datos["ApellidoCasado"], PDO::PARAM_STR);
            $stmt -> bindParam(":NombreCompleto", $datos["NombreCompleto"], PDO::PARAM_STR);
            $stmt -> bindParam(":FechaNacimiento", $datos["FechaNacimiento"], PDO::PARAM_STR);
            $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Extension", $datos["Extension"], PDO::PARAM_STR);
            $stmt -> bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
            $stmt -> bindParam(":Sede", $datos["Sede"], PDO::PARAM_STR);
            $stmt -> bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
            $stmt -> bindParam(":Empresa", $datos["Empresa"], PDO::PARAM_STR);
            $stmt -> bindParam(":Puesto", $datos["Puesto"], PDO::PARAM_STR);
            $stmt -> bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
            $stmt -> bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlUpdateContact($tabla, $datos){

            $stmt = Connection::Connect()->prepare("UPDATE $tabla SET PrimerNombre = :PrimerNombre,
                                                                      SegundoNombre = :SegundoNombre,
                                                                       TercerNombre = :TercerNombre,
                                                                       PrimerApellido = :PrimerApellido,
                                                                       SegundoApellido = :SegundoApellido,
                                                                       ApellidoCasado = :ApellidoCasado,
                                                                       NombreCompleto = :NombreCompleto,
                                                                       FechaNacimiento = :FechaNacimiento,
                                                                       Correo = :Correo,
                                                                       Codigo = :Codigo,
                                                                       Extension = :Extension,
                                                                       Telefono = :Telefono,
                                                                       Sede = :Sede,
                                                                       Departamento = :Departamento,
                                                                       Empresa = :Empresa,
                                                                       Puesto = :Puesto,
                                                                       Imagen = :Imagen,
                                                                       Observaciones = :Observaciones 
                                                          WHERE IdContacto = :IdContacto");

            $stmt -> bindParam(":IdContacto", $datos["IdContacto"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerNombre", $datos["PrimerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoNombre", $datos["SegundoNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":TercerNombre", $datos["TercerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerApellido", $datos["PrimerApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoApellido", $datos["SegundoApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":ApellidoCasado", $datos["ApellidoCasado"], PDO::PARAM_STR);
            $stmt -> bindParam(":NombreCompleto", $datos["NombreCompleto"], PDO::PARAM_STR);
            $stmt -> bindParam(":FechaNacimiento", $datos["FechaNacimiento"], PDO::PARAM_STR);
            $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Extension", $datos["Extension"], PDO::PARAM_STR);
            $stmt -> bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
            $stmt -> bindParam(":Sede", $datos["Sede"], PDO::PARAM_STR);
            $stmt -> bindParam(":Departamento", $datos["Departamento"], PDO::PARAM_STR);
            $stmt -> bindParam(":Empresa", $datos["Empresa"], PDO::PARAM_STR);
            $stmt -> bindParam(":Puesto", $datos["Puesto"], PDO::PARAM_STR);
            $stmt -> bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
            $stmt -> bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlDeleteContact($tabla, $datos){

            $stmt = Connection::Connect()->prepare("DELETE FROM $tabla WHERE IdContacto = :IdContacto");

            $stmt -> bindParam(":IdContacto", $datos["IdContacto"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

    }