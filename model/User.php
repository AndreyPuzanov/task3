<?php 

class User extends ModelUser
{
    public function create($userName , $email)
    {
        $sql = 'INSERT INTO User(user_name, email,status) VALUES (:user_name, :email, 1)';
        $params = [
            'user_name' => $userName,
            'email' => $email,
        ];
        
		return $this->save($sql, $params);
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM user';

        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}