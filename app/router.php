<?php

$action = "home";
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}

route($routesMap, $action);
