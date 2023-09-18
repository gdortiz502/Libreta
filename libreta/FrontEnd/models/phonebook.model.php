<?php

    require_once 'connection.php';

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

        public static function mdlSearchPhonebook($item, $value){

            $stmt = Connection::Connect()->prepare("SELECT a.PrimerNombre AS PrimerNombre,
                                                           a.PrimerApellido AS PrimerApellido,
                                                           a.Puesto AS Puesto,
                                                           a.Codigo AS Codigo,
                                                           a.Extension AS Extension,
                                                           a.Telefono AS Telefono,
                                                           a.Correo AS Correo,
                                                           a.IdContacto AS IdContacto,
                                                           a.Imagen AS Imagen,
                                                           d.Descripcion AS Departamento,
                                                           s.Descripcion AS Sede
                                                    FROM agenda a
                                                    INNER JOIN departamento d ON a.Departamento = d.IdDepartamento
                                                    INNER JOIN sede s ON a.Sede = s.IdSede
                                                    WHERE a.$item LIKE '%$value%' OR
                                                    a.Puesto LIKE '%$value%' OR
                                                    d.Descripcion LIKE '%$value%' OR
                                                    s.Descripcion LIKE '%$value%'");


            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt = null;

        }
        
    }