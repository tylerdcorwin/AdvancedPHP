<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <ul class="nav nav-tabs">
            <li role="presentation">
                <a <?php echo ($page == 'one') ? "class='active'" : ""; ?>
                    href="upload.php">File Uploader</a></li>
            <li role="presentation">
                <a <?php echo ($page == 'two') ? "class='active'" : ""; ?>
                    href="view.php">View Files</a></li>
                  
        </ul>        
    </body>
</html>
