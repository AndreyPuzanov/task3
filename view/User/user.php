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
    <form action="/add-user" method="POST">
        <?php if(!empty($newUser->errors)): ?>
            <?php foreach ($newUser->errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <input type="text" name="name" placeholder="input user name">
        <input type="text" name="email" placeholder="input user email">
        <input type="submit" name="btn-user" value="Submit">  
    </form>
</body>
</html>
