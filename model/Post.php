<?php

class Post extends ActiveRecord
{
    protected $table = 'Post';
    public $data = [];
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

    public function setData($user_id, $content, $category_id)
    {
        $params = [
            'user_id' => $user_id,
            'content' => $content,
            'status' => 0,
            'category_id' => $category_id,
        ];

        $sql = $this->generate('INSERT',$this->table,$this->map,$params);
        if($this->validate($this->generate('SELECT',$this->table,$this->map,$params), $params))
        {
            $result = $this->save($sql, $params);
        }
		return $result;
    }

    public function getUser(int $id)
    {
        $this->table = 'User';
        $this->map = [
            'id',
            'user_name',
            'email',
            'status',
        ];

        $params = [
            'id' => $id,
        ];
        return $this->load($this->generate('SELECT', $this->table, $this->map, $params))->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory(int $id)
    {
        $this->table = 'Category';
        $this->map =  [
            'id',
            'cat_name',
            'status',
        ];

        $params = [
            'id' => $id,
        ];
        return $this->load($this->generate('SELECT', $this->table, $this->map, $params))->fetchAll(PDO::FETCH_ASSOC);
    }
}