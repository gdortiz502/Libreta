<?php

    require_once '../controllers/users.controller.php';
    require_once '../models/users.model.php';

    class AjaxUsuarios{

        public $IdUsuario;

        public function ShowUsuarioAjax(){

            $item = 'IdUsuario';

            $value = $this->IdUsuario;

            $response = UsersControllers::ctrShowUsers($item, $value);

            echo json_encode($response);

        }

        public $Correo;

        public function ShowCorreoAjax(){

            $item = 'Correo';

            $value = $this->Correo;

            $response = UsersControllers::ctrShowUsers($item, $value);

            echo json_encode($response);

        }

        public $IdRol;

        public function ShowRolAjax(){

            $item = 'IdRol';

            $value = $this->IdRol;

            $response = UsersControllers::ctrShowRoles($item, $value);

            echo json_encode($response);

        }

    }

    if(isset($_POST['IdUsuario'])){

        $contactos = new AjaxUsuarios();
        $contactos -> IdUsuario = $_POST['IdUsuario'];
        $contactos -> ShowUsuarioAjax();

    }

    if(isset($_POST['IdRol'])){

        $contactos = new AjaxUsuarios();
        $contactos -> IdRol = $_POST['IdRol'];
        $contactos -> ShowRolAjax();

    }

    if(isset($_POST['Correo'])){

        $contactos = new AjaxUsuarios();
        $contactos -> Correo = $_POST['Correo'];
        $contactos -> ShowCorreoAjax();

    }

    

