<?php

    require_once '../controllers/phonebook.controller.php';
    require_once '../models/phonebook.model.php';

    class AjaxPhonebook{

        public $NombreContacto;

        public function ShowContactAjax(){

            $item = 'NombreCompleto';

            $valor = $this->NombreContacto;

            $respuesta = PhonebookController::ctrSearchPhonebook($item, $valor);

            echo json_encode($respuesta);


        }

    }

    if(isset($_POST['NombreContacto'])){

        $orden = new AjaxPhonebook();
        $orden -> NombreContacto = $_POST['NombreContacto'];
        $orden -> ShowContactAjax();

    }

