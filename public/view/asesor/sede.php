<?php
    //require_once "public/model/conection.php";
    require_once "C:\\xampp\htdocs\MedicalSystem\public\model\conection.php";
    $controller = "sede";

    if(!isset($_REQUEST['c'])){
        //require_once "public/controller/$controller-controller.php";
        require_once "C:\\xampp\htdocs\MedicalSystem\public\controller\\$controller-controller.php";
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;
        $controller->Index();    
    }else{
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
        require_once "C:\\xampp\htdocs\MedicalSystem\public\controller\\$controller-controller.php";
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;
    
    // Llama la accion
        call_user_func(array( $controller, $accion ));
    }
?>
