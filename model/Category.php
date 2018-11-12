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
            'maxLength' => 29,
            'minLength' => 5,
        ],
        'login' => [
            'type' => 'varchar',
            'maxLength' => 15,
            'minLength' => 5,
        ],
        'id' => [
            'type' => 'int',
            'maxLength' => 10,
            'minLength' => 1,
        ],
    ];

    public function __construct()
    {
        $this->db = Db::getConnection();
        ActiveRecord::$className = __CLASS__;
    }

    public function addData($categoryName, $email, $login)
    {
        $params = [
            'cat_name' => $categoryName,
            'email' => $email,
            'login' => $login,
            'id' => 'aaaa',
        ];

        $this->data = $params;
        $valid = $this->validate($this->data, $this->rules);
        echo '<hr><p>Ошибки :</p>';
        echo '<pre>';
        print_r($valid->errors);
        echo '<hr><p>valid data :</p>';
        print_r($valid->valid_data);
        echo '</pre>';
        //$sql = $this->generate('INSERT',$this->getTable(),$this->getColumns($this->getTable()),$params);
		//return $this->save($sql, $params);
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
    }
}