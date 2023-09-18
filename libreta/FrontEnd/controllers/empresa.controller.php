<?php

    class EmpresaController{

        public static function ctrShowEmpresa($item, $value){

            $table = 'empresa';

            $response = EmpresaModel::mdlShowEmpresa($table, $item, $value);

            return $response;

        }

    }