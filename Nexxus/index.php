<?php
require_once 'model/database.php';

$controller = 'tarefa';

if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // obtém o controller
    $controller = strtolower($_REQUEST['c']);
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // instancia o controller
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // chama a action
    call_user_func( array( $controller, $action ) );
}