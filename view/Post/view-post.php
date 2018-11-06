<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<<<<<<< HEAD
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
=======
    <?php foreach($post->getCategory($post->getData('category_id')) as $val): ?>
        <p>Category : <?php echo $val['cat_name']; ?></p>
    <?php endforeach; ?>

    <?php foreach($post->getUser($post->getData('user_id')) as $val): ?>
        <p>User-name: <?php echo $val['user_name']; ?></p>
        <p>User-email : <?php echo $val['email']; ?></p>
    <?php endforeach; ?>

>>>>>>> 753394e06add5683bd7542ade1350d28e6511275
    <p>Content : <?php echo $post->getData('content'); ?></p>
    <p>Created at : <?php echo $post->getData('created_at'); ?></p>
</body>
</html>