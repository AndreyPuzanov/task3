<?php

abstract class ActiveRecord implements Model
{
    public $db;

    static public $className = '';

    public function getTable()
    {
        return get_class($this);
    }

    public function getColumns($table)
    {
        $data = $this->query('SHOW COLUMNS FROM '.$table)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $key => $value) {
            $column[] = $value['Field'];
        }
        return $column;
    }

    public function query($sql, $params = [])
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

    static public function getAll()
    {
        $db = Db::getConnection();

        $result = array();
        $data = $db->query('SELECT * FROM ' . self::$className)->fetchAll(PDO::FETCH_ASSOC);

        foreach( $data as $row )
        {
            $class = new self::$className;
            $class->load($row['id']);
            $result[] = $class;
        }
        return $result;
    }

    public function load(int $id)
    {
        $params = [
            'id' => $id,
        ];
        $this->data = $this->query($this->generate('SELECT', $this->getTable(), $this->getColumns($this->getTable()), $params))->fetch(PDO::FETCH_ASSOC);
    }

    public function save($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key, $val);
            }
        }else {
            throw new Exception('gde dannie ???');
        }
        $stmt->execute();
        return $stmt;
    }

    public function validate()
    {
        return new Validation($this->rules,$this->data);
    }


    public function number()
    {
        return $this->query('SELECT COUNT(*) FROM ' . $this->getTable())->fetch(PDO::FETCH_NUM);
    }

    public function generate($type ,$table ,$map, $params = [])
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