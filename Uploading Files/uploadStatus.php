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
        <?php
        include './autoload.php';
        //include_once './navBar.html.php';

        $filehandler = new Filehandler();
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-head">
                        <h3>Uploaded File</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        try {
                            $fileName = $filehandler->upLoad('upfile');
                        } catch (RuntimeException $e) {
                            $error = $e->getMessage();                          
                        }
                        ?>
                        <?php if (isset($fileName)) : ?>
                        <h4><?php echo $fileName; ?><br/> has uploaded successfully. <br/><br/> Page will Redirect after 5 seconds</h4>
                        <?php else: ?>
                            <p><?php echo $error; echo '<br/>Page will redirect after 5 seconds';?></p>
                        <?php
                        endif;
                        //I was getting an error with the navBar so i used the html refresh to redirect after 5sec
                        ?>    
                    </div>
                </div>
            </div>



            <meta http-equiv="refresh" content="5; url=http://localhost/ADVPHP/PHPAdvClassSpring2017-master/week4/Lab4/Upload/upload.php" />

    </body>
</html>
