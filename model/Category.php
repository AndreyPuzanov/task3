<?php 

class Category
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getId($categoryName)
    {
        $result = $this->db->prepare("SELECT id FROM Category WHERE cat_name = :name");
        $result->bindParam(':name', $categoryName);
        $result->execute();

		return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function add($categoryName)
    {
        $sql = 'INSERT INTO Category(name, status) VALUES (:name, 1)';
        $result = $this->db->prepare($sql);
        $result->bindParam(':name', $categoryName);
        $result->execute();

		return $result;
    }
}