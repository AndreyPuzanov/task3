<?php 
/**
* database
*/
class Db
{ 
    public static function getConnection() {
		$config = require ROOT.'/config/db.php';
        $db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
        return $db;
	}
}
