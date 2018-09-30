<?php

class Post extends ModelPost
{
    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getPostById(int $post_id)
    {
        $sql = 'SELECT * FROM Post 
                INNER JOIN User on Post.user_id = User.id 
                INNER JOIN Category on Post.category_id = Category.id 
                WHERE Post.id = :post_id';
        $params = [
            'post_id' => $post_id,
        ];

        $result = $this->load($sql, $params);
		return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPosts(){
        $sql = 'SELECT * FROM Post 
                INNER JOIN User on Post.user_id = User.id 
                INNER JOIN Category on Post.category_id = Category.id';

        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}