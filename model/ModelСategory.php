<?php

abstract class ModelСategory implements Model
{
    protected $data = [];
    protected $isNew = false;
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
        $sql = 'SELECT * FROM Category WHERE cat_name = :cat_name';
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