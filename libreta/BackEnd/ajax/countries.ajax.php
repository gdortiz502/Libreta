<?php

    require_once '../controllers/countries.controller.php';
    require_once '../models/countries.model.php';

    class AjaxCountries{

        public $IdCountry;

        public function ShowCountryAjax(){

            $item = 'IdPais';

            $value = $this->IdCountry;

            $response = CountriesController::ctrShowCountries($item, $value);

            echo json_encode($response);


        }

    }

    if(isset($_POST['IdCountry'])){

        $clientes = new AjaxCountries();
        $clientes -> IdCountry = $_POST['IdCountry'];
        $clientes -> ShowCountryAjax();

    }

