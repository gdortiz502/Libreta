<?php

    require_once 'connection.php';

    class InstitucionModel{

        public static function mdlShowInstitucion($table){

            $stmt = Connection::Connect()->prepare("SELECT * FROM $table");

            $stmt -> execute();

            return $stmt -> fetch();

            $stmt = null;

        }

    }

    