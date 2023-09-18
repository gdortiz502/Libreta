<?php

    require_once 'conexion.php';

    class UsersModel{

        public static function mdlShowUser($tabla, $item, $valor){

            if($item != null){

                $stmt = Connection::Connect()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
    
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    
                $stmt -> execute();
    
                return $stmt -> fetch();
    
            }else{
    
                $stmt = Connection::Connect()->prepare("SELECT * FROM $tabla");
    
                $stmt -> execute();
    
                return $stmt -> fetchAll();
    
            }

            $stmt = null;

        }

        public static function mdlInsertUser($tabla, $datos){

            $stmt = Connection::Connect()->prepare("INSERT INTO $tabla(PrimerNombre,
                                                                       SegundoNombre,
                                                                       TercerNombre,
                                                                       PrimerApellido,
                                                                       SegundoApellido,
                                                                       ApellidoCasada,
                                                                       Correo,
                                                                       Password,
                                                                       Display,
                                                                       Rol) 
                                                          VALUES (:PrimerNombre,
                                                                  :SegundoNombre,
                                                                  :TercerNombre,
                                                                  :PrimerApellido,
                                                                  :SegundoApellido,
                                                                  :ApellidoCasada,
                                                                  :Correo,
                                                                  :Password,
                                                                  :Display,
                                                                  :Rol)");

            $stmt -> bindParam(":PrimerNombre", $datos["PrimerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoNombre", $datos["SegundoNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":TercerNombre", $datos["TercerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerApellido", $datos["PrimerApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoApellido", $datos["SegundoApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":ApellidoCasada", $datos["ApellidoCasada"], PDO::PARAM_STR);
            $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
            $stmt -> bindParam(":Display", $datos["Display"], PDO::PARAM_STR);
            $stmt -> bindParam(":Rol", $datos["Rol"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlUpdateUser($tabla, $datos){

            $stmt = Connection::Connect()->prepare("UPDATE $tabla SET PrimerNombre = :PrimerNombre,
                                                                      SegundoNombre = :SegundoNombre,
                                                                       TercerNombre = :TercerNombre,
                                                                       PrimerApellido = :PrimerApellido,
                                                                       SegundoApellido = :SegundoApellido,
                                                                       ApellidoCasada = :ApellidoCasada,
                                                                       Correo = :Correo,
                                                                       Password = :Password,
                                                                       Display = :Display,
                                                                       Rol = :Rol 
                                                          WHERE IdUsuario = :IdUsuario");

            $stmt -> bindParam(":IdUsuario", $datos["IdUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerNombre", $datos["PrimerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoNombre", $datos["SegundoNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":TercerNombre", $datos["TercerNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":PrimerApellido", $datos["PrimerApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":SegundoApellido", $datos["SegundoApellido"], PDO::PARAM_STR);
            $stmt -> bindParam(":ApellidoCasada", $datos["ApellidoCasado"], PDO::PARAM_STR);
            $stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
            $stmt -> bindParam(":Display", $datos["Display"], PDO::PARAM_STR);
            $stmt -> bindParam(":Rol", $datos["Rol"], PDO::PARAM_INT);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlDeleteUser($tabla, $datos){

            $stmt = Connection::Connect()->prepare("UPDATE $tabla SET Estatus = :Estatus WHERE IdUsuario = :IdUsuario");

            $stmt -> bindParam(":IdUsuario", $datos["IdUsuario"], PDO::PARAM_INT);
            $stmt -> bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

    }