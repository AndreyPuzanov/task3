<?php

$db = Db::getConnection();

$result = $db->query('SELECT * FROM User')->fetchAll(PDO::FETCH_ASSOC);
$res = $db->query('SELECT * FROM Category')->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Показать посты пользователя</p>
    <form action="/post" method="POST">
        <select name="name">
            <option disabled>Выберете пользователя</option>
            <?php foreach ($result as $key => $value): ?>
                <option value="<?php echo $value['user_name'];?>">
                    <?php echo $value['user_name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <select name="category">
            <option disabled>Выберете категорию</option>
            <?php foreach ($res as $key => $value): ?>
                <option value="<?php echo $value['cat_name'];?>">
                    <?php echo $value['cat_name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Submit">  
    </form>
    <hr>
    <a href="/add-user">add new user</a>
    <br>
    <a href="/add-category">Add new category</a>
    <br>
    <a href="/add-post">Add new post</a>
    <br>
    <a href="/posts">all posts</a>
</body>
</html>