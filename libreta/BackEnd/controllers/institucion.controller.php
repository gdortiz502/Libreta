<?php

    class InstitucionController{

        public static function ctrShowInstitucion($item, $value){

            $table = "institucion";

            $response = InstitucionModel::mdlShowInstitucion($table, $item, $value);

            return $response;

        }

    }