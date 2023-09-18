<?php

    require_once 'conexion.php';

    class HeadquartersModel{

        public static function mdlShowHeadquarters($table, $item, $value){

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

        public static function mdlInsertHeadquarters($table, $data){

            $stmt = Connection::Connect()->prepare("INSERT INTO $table(Descripcion, Direccion, Pais) 
                                                          VALUES (:Descripcion, :Direccion, :Pais)");

            $stmt -> bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);
            $stmt -> bindParam(":Direccion", $data["Direccion"], PDO::PARAM_STR);
            $stmt -> bindParam(":Pais", $data["Pais"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlEditHeadquarters($table, $data){

            $stmt = Connection::Connect()->prepare("UPDATE $table SET Descripcion = :Descripcion, Direccion = :Direccion, Pais = :Pais 
                                                    WHERE IdSede = :IdSede");

            $stmt -> bindParam(":IdSede", $data["IdSede"], PDO::PARAM_INT);
            $stmt -> bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);
            $stmt -> bindParam(":Direccion", $data["Direccion"], PDO::PARAM_STR);
            $stmt -> bindParam(":Pais", $data["Pais"], PDO::PARAM_INT);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

        public static function mdlUpdateHeadquarters($tabla, $datos){

            $stmt = Connection::Connect()->prepare("UPDATE $tabla SET Estatus = :Estatus WHERE IdSede = :IdSede");

            $stmt -> bindParam(":IdSede", $datos["IdSede"], PDO::PARAM_INT);
            $stmt -> bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);

            if($stmt -> execute()){
                
                return "ok";
            
            }else{

                return $stmt -> errorInfo();

            }

            $stmt = null;

        }

    }

    