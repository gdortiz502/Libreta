<?php

    require_once 'controllers/plantilla.controller.php';
    require_once 'controllers/users.controller.php';
    require_once 'controllers/phonebook.controller.php';
    require_once 'controllers/countries.controller.php';
    require_once 'controllers/company.controller.php';
    require_once 'controllers/department.controller.php';
    require_once 'controllers/headquarters.controller.php';
    require_once 'controllers/institucion.controller.php';

    require_once 'models/users.model.php';
    require_once 'models/phonebook.model.php';
    require_once 'models/countries.model.php';
    require_once 'models/company.model.php';
    require_once 'models/department.model.php';
    require_once 'models/headquarters.model.php';
    require_once 'models/institucion.model.php';

    $plantilla = new PlantillaController();
    $plantilla -> ctrMostrarPlantilla();