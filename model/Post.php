<?php

class Post extends ActiveRecord
{
    protected $table;
    public $data = [];
    protected $map;

    public function __construct()
    {
        $this->db = Db::getConnection();
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

        $sql = $this->generate('INSERT', $this->getTable(), $this->getColumns($this->getTable()), $params);

        if($this->validate($this->generate('SELECT', $this->getTable(), $this->getColumns($this->getTable())), $params))
        {
            $result = $this->save($sql, $params);
            return $result;
        } else {
            return false;
        }


    }

    public function getUser()
    {
        $user = new User();
        $user->load($this->getData('user_id'));
        return $user;
    }

    public function getCategory()
    {
        $category = new Category();
        $category->load($this->getData('category_id'));
        return $category;
    }
}