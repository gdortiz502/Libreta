<?php

    require_once '../controllers/department.controller.php';
    require_once '../models/department.model.php';

    class AjaxDepartment{

        public $IdDepartment;

        public function ShowDepartmentAjax(){

            $item = 'IdDepartamento';

            $value = $this->IdDepartment;

            $response = DepartmentController::ctrShowDepartment($item, $value);

            echo json_encode($response);


        }

    }

    if(isset($_POST['IdDepartment'])){

        $clientes = new AjaxDepartment();
        $clientes -> IdDepartment = $_POST['IdDepartment'];
        $clientes -> ShowDepartmentAjax();

    }

