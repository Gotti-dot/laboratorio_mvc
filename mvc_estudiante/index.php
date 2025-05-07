<?php
require_once 'model/database.php';
$controller = 'estudiante';

if(isset($_REQUEST['c'])){
    //obtener
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    //instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords ($controller).'Controller';
    $controller = new $controller;
    //llamar a la accion
    call_user_func(array($controller, $accion));
}else{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    $controller->Index();

    }
?>