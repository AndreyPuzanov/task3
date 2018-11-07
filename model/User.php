<?php 

class User extends ActiveRecord
{
    protected $table;
    public $data = [];
    protected $map;

    public function __construct()
    {
        $this->db = Db::getConnection();
        $this->table = $this->getTable();
        $this->map = $this->getColumns($this->table);
    }
    
    public function setData($userName , $email)
    {
        $params = [
            'user_name' => $userName,
            'email' => $email,
            'status' => 0,
        ];

        $sql = $this->generate('INSERT',$this->table,$this->map,$params);
        return $this->save($sql, $params, $this->table);
    }

    public function getData(string $key = '')
    {
        if($key !== ''){
            foreach($this->data as $res => $val){
                return $val[$key];
            }
        } else {
            return $this->data;
        }
    }
}