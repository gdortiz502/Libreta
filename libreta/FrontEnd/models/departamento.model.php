<?php

    require_once 'connection.php';

    class DepartmentModel{

        public static function mdlShowDepartment($table, $item, $value){

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
        
    }