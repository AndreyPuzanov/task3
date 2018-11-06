<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php for ($i = 1; $i <= $post->number();$i++): ?>
        <?php $post->_load($i); ?>
        <a href="post/<?php echo $post->getData('id')?>"><?php echo $post->getData('id')?></a>
        <p>User :
            <?php
                $user = $post->getUser();
                echo $user->getData('user_name');
            ?>
        </p>
        <p>Category :
            <?php
                $category = $post->getCategory();
                echo $category->getData('cat_name');
            ?>
        </p>
        <p>Content : <?php echo $post->getData('content')?></p>
        <p>Created at : <?php echo $post->getData('created_at')?></p>
        <hr>
    <?php endfor; ?>
</body>
</html>