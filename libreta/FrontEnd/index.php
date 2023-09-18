<?php

    require_once 'controllers/template.controller.php';
    require_once 'controllers/phonebook.controller.php';
    require_once 'controllers/sedes.controller.php';
    require_once 'controllers/empresa.controller.php';
    require_once 'controllers/departamento.controller.php';
    require_once 'controllers/pais.controller.php';
    require_once 'controllers/institucion.controller.php';

    require_once 'models/phonebook.model.php';
    require_once 'models/sedes.model.php';
    require_once 'models/empresa.model.php';
    require_once 'models/departamento.model.php';
    require_once 'models/pais.model.php';
    require_once 'models/institucion.model.php';

    $template = new TemplateController();
    $template -> ctrShowTemplate();