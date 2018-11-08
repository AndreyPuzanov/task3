<?php 

class User extends ActiveRecord
{
    public $data = [];

    public function __construct()
    {
        $this->db = Db::getConnection();
        ActiveRecord::$className = __CLASS__;
    }
    
    public function setData($userName , $email)
    {
        $params = [
            'user_name' => $userName,
            'email' => $email,
            'status' => 0,
        ];

        $sql = $this->generate('INSERT',$this->getTable(),$this->getColumns($this->getTable()),$params);
        return $this->save($sql, $params, $this->getTable());
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
    }
}