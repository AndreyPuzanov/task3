<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach($data as $key => $value): ?>
        <a href="/<?php echo $key+1; ?>"> post <?php echo $key+1; ?></a>
        <p>Category : <?php echo $value['cat_name']; ?></p>
        <p>User name : <?php echo $value['user_name']; ?></p>
        <p>Content : <?php echo $value['content']; ?></p>
        <p>Created at : <?php echo $value['created_at']; ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>