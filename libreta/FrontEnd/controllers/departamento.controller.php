<?php

    class DepartmentController{

        public static function ctrShowDepartment($item, $value){

            $table = 'departamento';

            $response = DepartmentModel::mdlShowDepartment($table, $item, $value);

            return $response;

        }

    }