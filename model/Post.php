<?php

class Post extends ActiveRecord
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

    public function getAllPosts()
    {
        $sql = 'SELECT * FROM Post 
                INNER JOIN User on Post.user_id = User.id 
                INNER JOIN Category on Post.category_id = Category.id';

        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $content, $category_id)
    {
        $date = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO Post(user_id, content, status, created_at, category_id) 
                VALUES (:user_id, :content, 1, NOW(), :category_id)';

        $params = [
            'user_id' => $user_id,
            'content' => $content,
            'category_id' => $category_id,
        ];

        if($this->validate('SELECT * FROM Post WHERE user_id = :user_id AND content = :content AND category_id = :category_id', $params))
        {
            $result = $this->save($sql, $params);
        }
		return $result;
    }
}