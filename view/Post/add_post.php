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
    <form action="/add-post" method="POST">
        <p>User :</p>
        <select name="user_id" required>
            <option disabled>Выберете пользователя</option>
            <?php foreach ($result as $key => $value): ?>
                <option value="<?php echo $value['id'];?>">
                    <?php echo $value['user_name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <p>Category :</p>
        <select name="category_id" required>
            <option disabled>Выберете категорию</option>
            <?php foreach ($res as $key => $value): ?>
                <option value="<?php echo $value['id'];?>">
                    <?php echo $value['cat_name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <p>Content :</p>
        <textarea name="content" required></textarea>
        <br>
        <input type="submit" value="Submit">  
    </form>
</body>
</html>