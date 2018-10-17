<?php 

class User extends ActiveRecord
{
    public function create($userName , $email)
    {
        $sql = 'INSERT INTO User(user_name, email,status) VALUES (:user_name, :email, 1)';
        $params = [
            'user_name' => $userName,
            'email' => $email,
        ];

        if($this->validate('SELECT * FROM user WHERE user_name = :user_name AND email = :email', $params)){
            return $this->save($sql, $params, $table);
        }
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM user';

        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}