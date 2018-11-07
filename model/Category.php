<?php 

class Category extends ActiveRecord
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

    public function setData($categoryName)
    {
        $params = [
            'cat_name' => $categoryName,
            'status' => 0,
        ];
        $sql = $this->generate('INSERT',$this->table,$this->map,$params);
		return $this->save($sql, $params);
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