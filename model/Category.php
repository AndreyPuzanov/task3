<?php 

class Category extends ActiveRecord
{
    public $data = [];
    protected $rules = [
        'cat_name' => [
            'type' => 'varchar',
            'maxLength' => 15,
            'minLength' => 5,
        ],
        'email' => [
            'type' => 'email',
            'maxLength' => 30,
            'minLength' => 10,
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
            'email' => 'aavcxv@dasd.sa',
        ];

        $this->data = $params;
        $valid = $this->validate($this->data, $this->rules);
        echo '<hr><p>Ошибки :</p>';
        echo '<pre>';
        print_r($valid->errors);
        //$sql = $this->generate('INSERT',$this->getTable(),$this->getColumns($this->getTable()),$params);
		//return $this->save($sql, $params);
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
    }
}