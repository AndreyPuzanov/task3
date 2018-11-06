<?php 

class Category extends ActiveRecord
{
    protected $table = 'Category';
    public $data = [];
    protected $map = [
        'id',
        'cat_name',
        'status',
    ];

    public function setData($categoryName)
    {
        $params = [
            'cat_name' => $categoryName,
            'status' => 0,
        ];
        $sql = $this->genterate('INSERT',$this->table,$this->map,$params);
		return $this->save($sql, $params);
    }

    public function getCategories()
    {
        $sql = $this->genterate('SELECT',$this->table,$this->map);
        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function _load(int $id = 0)
    {
        if($id == 0){
            $this->data = $this->load($this->generate('SELECT', $this->table, $this->map))->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $params = [
                'id' => $id,
            ];
            $this->data = $this->load($this->generate('SELECT', $this->table, $this->map, $params))->fetchAll(PDO::FETCH_ASSOC);
        }
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