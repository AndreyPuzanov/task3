<?php 

class Category extends ActiveRecord
{
    public function create($categoryName)
    {
        $sql = 'INSERT INTO Category(cat_name, status) VALUES (:cat_name, 1)';
        $params = [
            'cat_name' => $categoryName,
        ];
        
		return $this->save($sql, $params);
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM Category';

        return $this->load($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}