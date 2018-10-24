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

    public function genterate($type ,$table ,$map, $params = [])
    {
        if($type == 'SELECT'){
            if(!empty($params)){
                $sql = $type;
                foreach($map as $key){
                    $sql .= ' ' . '`' . $key . '`' . ',';
                }
                $sql = trim($sql, ',');
                $sql .= ' FROM ' . $table . ' WHERE ';
                foreach($params as $key => $val){
                    $sql .= ' ' . $key . ' = ' . "'" . $val . "'";
                    if(count($params) > 1){
                        $sql .= ' AND ';
                    }
                }
                $sql = trim($sql, ' AND ');
            } else {
                $sql = $type;
                foreach($map as $key){
                    $sql .= ' ' . $key . ',';
                }
                $sql = trim($sql, ',');
                $sql .= ' FROM ' . $table;
                // $resul = $this->load($res)->fetchAll(PDO::FETCH_ASSOC);
                // var_dump($resul);
            }
        } elseif ($type == 'DELETE'){
            $sql = $type;
            $sql .= ' FROM ' . $table . ' WHERE ';
            foreach($params as $key => $val){
                $sql .= ' ' . $key . ' = ' . "'" . $val . "'";
                if(count($params) > 1){
                    $sql .= ' AND ';
                }
            }
            $sql = rtrim($sql, ' AND ');
        } elseif ($type == 'INSERT'){
            $sql = $type . ' INTO ' . $table . ' (';
            foreach($map as $key){
                if($key == 'id'){
                    continue;
                }
                $sql .= ' ' . '`' . $key . '`' . ',';
            }
            $sql = trim($sql, ',');
            $sql .= ') VALUES (';
            foreach($map as $key){
                if($key == 'id'){
                    continue;
                } elseif ($key == 'created_at' or $key == 'update_at'){
                    $sql .= ' ' . 'NOW()'  . ',';
                    continue;
                }
                $sql .= ' ' . ':' . $key  . ',';
            }
            $sql = trim($sql, ',');
            $sql .= ')';

        }

        return $sql;
    }
}