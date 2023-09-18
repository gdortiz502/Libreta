<?php

    require_once '../controllers/headquarters.controller.php';
    require_once '../models/headquarters.model.php';

    class AjaxHeadquarter{

        public $IdSede;

        public function ShowHeadquarterAjax(){

            $item = 'IdSede';

            $value = $this->IdSede;

            $response = HeadquartersController::ctrShowHeadquarter($item, $value);

            echo json_encode($response);


        }

    }

    if(isset($_POST['IdSede'])){

        $clientes = new AjaxHeadquarter();
        $clientes -> IdSede = $_POST['IdSede'];
        $clientes -> ShowHeadquarterAjax();

    }

