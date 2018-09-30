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

    public function save()
    {
        
    }

    public function validate()
    {
        
    }
}