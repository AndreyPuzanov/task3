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

        if($this->validate($this->generate('SELECT',$this->table,$this->map,$params), $params)) {
            $result = $this->save($sql, $params);
        }

        return $result;
    }

    public function getUser()
    {
        $user = new User();
        $user->_load($this->getData('user_id'));
        return $user;
    }

    public function getCategory()
    {
        $category = new Category();
        $category->_load($this->getData('category_id'));
        return $category;
    }
}