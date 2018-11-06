<?php 

class User extends ActiveRecord
{   
    protected $table = 'User';
    public $data = [];
    protected $map = [
        'id',
        'user_name',
        'email',
        'status',
    ];

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