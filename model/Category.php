<?php 

class Category extends ActiveRecord
{
    protected $table = 'Category';
    protected $map = [
        'id',
        'cat_name',
        'status',
    ];

    public function setData($categoryName)
    {
        $params = [
            'cat_name' => $categoryName,
            'status' => 0,
        ];
        $sql = $this->genterate('INSERT',$this->table,$this->map,$params);
		return $this->save($sql, $params);
    }

    public function getCategories()
    {
        $sql = $this->genterate('SELECT',$this->table,$this->map);
        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}