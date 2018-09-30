<?php

abstract class ModelCategory implements Model
{
    protected $data = [];
    protected $isNew = false;

    public function load($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				if (is_int($val)) {
					$type = PDO::PARAM_INT;
				} else {
					$type = PDO::PARAM_STR;
				}
				$stmt->bindValue(':'.$key, $val, $type);
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