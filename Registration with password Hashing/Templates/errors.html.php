<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li class="bg-danger"> <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </body>
</html>
