<?php 

class User extends ActiveRecord
{   
    protected $table = 'User';
    protected $map = [
        'id',
        'user_name',
        'email',
        'status',
    ];

    public function create($userName , $email)
    {
        $params = [
            'user_name' => $userName,
            'email' => $email,
            'status' => 0,
        ];

        $sql = $this->genterate('INSERT',$this->table,$this->map,$params);
        return $this->save($sql, $params, $table);
    }

    public function getUsers()
    {
        $sql = $this->genterate('SELECT',$this->table,$this->map);
        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}