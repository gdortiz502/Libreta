<?php

    class PaisController{

        public static function ctrShowPais($item, $value){

            $table = 'pais';

            $response = PaisModel::mdlShowPais($table, $item, $value);

            return $response;

        }

    }