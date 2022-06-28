<?php

$action = "home";
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}
try {
    $handler = getRouteHandler($routesMap, $action);
    list($controller, $method) = $handler;
    $controller->$method();
} catch(Exception $error) {
    // реакція на unknown route  знаходиться на рівень вище
    die('Sorry, internal application error happened: ' . $error->getMessage());
}

