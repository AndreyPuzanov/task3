<?php

require_once 'Autoload.php';

define('ROOT', dirname(__FILE__));

$router = new Router();
$router->run();
