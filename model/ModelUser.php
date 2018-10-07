<?php

abstract class ModelUser implements Model
{
    public $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function load($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
            }
        }
		$stmt->execute();
		return $stmt;
    }

    public function save($sql, $params = [])
    {
        if($this->validate($params)){
            $stmt = $this->db->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    $stmt->bindValue(':'.$key, $val);
                }
            }
            $stmt->execute();
            return $stmt;
        }
    }

    public function validate($params = [])
    {
        $sql = 'SELECT * FROM user WHERE user_name = :user_name AND email = :email';
        $res = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$res->bindValue(':'.$key, $val);
            }
        }
		$res->execute();
		return $res;
    }
}