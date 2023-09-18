<?php

    class PhonebookController{

        public static function ctrShowPhonebook($item, $value){

            $table = 'agenda';

            $response = PhonebookModel::mdlShowPhonebook($table, $item, $value);

            return $response;

        }

        public static function ctrSearchPhonebook($item, $value){

            $response = PhonebookModel::mdlSearchPhonebook($item, $value);

            return $response;

        }

    }