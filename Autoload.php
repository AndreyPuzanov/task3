<?php

spl_autoload_register( function($class_name){
    switch($class_name){
        case 'Db' :
        case 'Router' :
            require_once 'lib/' . $class_name . '.php';
            break;

        case 'Model' :
        case 'ModelUser' :
        case 'ModelPost' :
        case 'ModelСategory' :
        case 'Category' :
        case 'Post' :
        case 'User' :
            require_once 'model/' . $class_name . '.php';
            break;
    }
});