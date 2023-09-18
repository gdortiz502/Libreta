<?php

    require_once 'conexion.php';

    class CompanyModel{

        public static function mdlShowCompany($table, $item, $value){

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

        public static function mdlInsertCompany($table, $data){

            $stmt = Connection::Connect()->prepare("INSERT INTO $table(Descripcion) 
                                                          VALUES (:Descripcion)");

            $stmt -> bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlEditCompany($table, $data){

            $stmt = Connection::Connect()->prepare("UPDATE $table SET Descripcion = :Descripcion WHERE IdEmpresa = :IdEmpresa");

            $stmt -> bindParam(":IdEmpresa", $data["IdEmpresa"], PDO::PARAM_INT);
            $stmt -> bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlUpdateCompany($tabla, $datos){

            $stmt = Connection::Connect()->prepare("UPDATE $tabla SET Estatus = :Estatus WHERE IdEmpresa = :IdEmpresa");

            $stmt -> bindParam(":IdEmpresa", $datos["IdEmpresa"], PDO::PARAM_INT);
            $stmt -> bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

    }

    