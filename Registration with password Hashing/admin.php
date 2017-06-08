<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        include './autoload.php';
        include './Templates/accessRequired.html.php';
        
        $reg = new Registration();
        $userInfo = $reg ->getInfo($_SESSION['user_id']);
        
        include './Templates/admin.html.php';
        
        ?>
        
        
    </body>
</html>
