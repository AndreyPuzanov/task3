<?php 

class Category extends ActiveRecord
{
    public $data = [];
    protected $rules = [
        'cat_name' => [
            'Type' => 'varchar',
            'Max-length' => 50,
            'Min-length' => 5,
        ],
    ];

    public function __construct()
    {
        $this->db = Db::getConnection();
        ActiveRecord::$className = __CLASS__;
    }

    public function addData($categoryName)
    {
        $params = [
            'cat_name' => $categoryName,
        ];

        $this->data = $params;
        $errors = $this->validate($this->data, $this->rules);
        echo '<hr><p>Ошибки :</p>';
        var_dump($errors);
        //$sql = $this->generate('INSERT',$this->getTable(),$this->getColumns($this->getTable()),$params);
		//return $this->save($sql, $params);
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
    }
}