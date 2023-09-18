<?php

    require_once '../controllers/phonebook.controller.php';
    require_once '../models/phonebook.model.php';

    class AjaxContact{

        public $IdContact;

        public function ShowContactAjax(){

            $item = 'IdContacto';

            $value = $this->IdContact;

            $response = PhonebookController::ctrShowPhonebook($item, $value);

            echo json_encode($response);


        }

    }

    if(isset($_POST['IdContact'])){

        $contactos = new AjaxContact();
        $contactos -> IdContact = $_POST['IdContact'];
        $contactos -> ShowContactAjax();

    }

