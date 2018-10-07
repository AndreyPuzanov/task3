<?php

abstract class ModelPost implements Model
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
        $sql = 'SELECT * FROM Post WHERE user_id = :user_id AND content = :content AND category_id = :category_id';
        $res = $this->db->prepare($sql);
        array_pop($params);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$res->bindValue(':'.$key, $val);
            }
        }
		$res->execute();
		return $res;
    }
}