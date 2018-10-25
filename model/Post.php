<?php

class Post extends ActiveRecord
{
    protected $table = 'Post';
    protected $map = [
        'id',
        'user_id' ,
        'content' ,
        'status' ,
        'created_at' ,
        'update_at' ,
        'category_id' ,
    ];


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
        $params = [
            'user_id' => $user_id,
            'content' => $content,
            'status' => 0,
            'category_id' => $category_id,
        ];

        $sql = $this->genterate('INSERT',$this->table,$this->map,$params);
        if($this->validate($this->genterate('SELECT',$this->table,$this->map,$params), $params))
        {
            $result = $this->save($sql, $params);
        }
		return $result;
    }
}