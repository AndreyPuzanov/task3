<?php 

class User 
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getId($userName)
    {
        $sql = 'SELECT id FROM User WHERE user_name = :name';
        $result = $this->db->prepare($sql);
        $result->bindParam(':name', $userName);
        $result->execute();

		return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function add($userName, $userEmail)
    {
        $sql = 'INSERT INTO User(name, email, status) VALUES (:userName, :userEmail , 1)';
        $result = $this->db->prepare($sql);
        $result->bindParam(':userName', $userName);
        $result->bindParam(':userEmail',  $userEmail);
        $result->execute();

		return $result;
    }
}