<?php

abstract class ActiveRecord implements Model
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
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function validate($sql,$params = [])
    {
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