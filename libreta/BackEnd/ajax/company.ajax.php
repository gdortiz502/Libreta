<?php

    require_once '../controllers/company.controller.php';
    require_once '../models/company.model.php';

    class AjaxCompany{

        public $IdCompany;

        public function ShowCompanyAjax(){

            $item = 'IdEmpresa';

            $value = $this->IdCompany;

            $response = CompanyController::ctrShowCompany($item, $value);

            echo json_encode($response);


        }

    }

    if(isset($_POST['IdCompany'])){

        $clientes = new AjaxCompany();
        $clientes -> IdCompany = $_POST['IdCompany'];
        $clientes -> ShowCompanyAjax();

    }

