<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function debug($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

require_once 'Autoload.php';

define('ROOT', dirname(__FILE__));

$router = new Router();
$router->run();
