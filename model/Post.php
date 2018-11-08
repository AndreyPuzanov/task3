<?php

class Post extends ActiveRecord
{
    public $data = [];

    protected $rules = [
        'user_id' => [
            'Type' => 'int',
            'Length' => 11,
        ],
        'content' => [
            'Length' => 255,
        ],
        'category_id' => [
            'Type' => 'int',
            'Length' => 11,
        ],
    ];

    public function __construct()
    {
        $this->db = Db::getConnection();
        ActiveRecord::$className = __CLASS__;
    }

    public function getData(string $key = '')
    {
        return $this->data[$key];
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

        $result = $this->save($sql, $params);
        return $result;
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