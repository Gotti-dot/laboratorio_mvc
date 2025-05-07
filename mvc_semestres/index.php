<?php
require_once 'model/database.php';
$controller = 'semestre';

if(isset($_REQUEST['c'])){
    //obtener el controlador a cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instamciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    // Llamar a la accion
    call_user_func(array($controller, $accion));
}else {
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    $controller->Index();
}

?>