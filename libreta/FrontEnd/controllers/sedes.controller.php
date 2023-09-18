<?php

    class SedesController{

        public static function ctrShowSedes($item, $value){

            $table = 'sede';

            $response = SedesModel::mdlShowSedes($table, $item, $value);

            return $response;

        }

    }