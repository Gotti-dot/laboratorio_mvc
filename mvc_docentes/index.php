<?php
require_once 'model/database.php';
$controller = 'docente';

if(isset($_REQUEST['c'])){
    // Obtener el controlador
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    // Llamar a la acción
    call_user_func(array($controller, $accion));
}else{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    $controller->Index();
}
?>