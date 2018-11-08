<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/">back</a>
    <hr>
    <?php foreach ($posts as $post): ?>
        <a href="post/<?php echo $post->getData('id')?>"><?php echo $post->getData('id')?></a>
        <p>User : <?php echo $post->getUser()->getData('user_name'); ?></p>
        <p>Category : <?php echo $post->getCategory()->getData('cat_name'); ?></p>
        <p>Content : <?php echo $post->getData('content')?></p>
        <p>Created at : <?php echo $post->getData('created_at')?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>