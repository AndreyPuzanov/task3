<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach($post->getData() as $key => $value): ?>

        <a href="<?php echo 'post/'.$value['id']; ?>"> post <?php echo $value['id']; ?></a>

        <?php foreach($post->getCategory($value['category_id']) as $val): ?>
            <p>Category : <?php echo $val['cat_name']; ?></p>
        <?php endforeach; ?>

        <?php foreach($post->getUser($value['user_id']) as $val): ?>
            <p>User-name: <?php echo $val['user_name']; ?></p>
            <p>User-email : <?php echo $val['email']; ?></p>
        <?php endforeach; ?>
        <p>Content : <?php echo $value['content']; ?></p>
        <p>Created at : <?php echo $value['created_at']; ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>