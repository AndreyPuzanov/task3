<?php 

class User extends ActiveRecord
{
    public $data = [];
    public $errors = [];
    protected $rules = [
        'user_name' => [
            'type' => 'varchar',
            'maxLength' => 15,
            'minLength' => 5,
        ],
        'email' => [
            'type' => 'email',
            'maxLength' => 29,
            'minLength' => 5,
        ],
        'status' => [
            'type' => 'int',
            'maxLength' => 2,
            'minLength' => 1,
        ],
    ];

    public function __construct()
    {
        $this->db = Db::getConnection();
        ActiveRecord::$className = __CLASS__;
    }
    
    public function addData($userName , $email)
    {
        $data = [
            'user_name' => $userName,
            'email' => $email,
            'status' => 1,
        ];

        $this->data = $data;

        $valid = $this->validate($this->data, $this->rules);
        if(empty($valid->errors)){
            $this->data = $valid->valid_data;
            $sql = $this->generate('INSERT',$this->getTable(),$this->getColumns($this->getTable()),$this->data);
            return $this->save($sql, $data);
        } else {
            $this->errors = $valid->errors;
        }
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
    }
}