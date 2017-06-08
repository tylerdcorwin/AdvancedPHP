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
        <?php $page = 'one'; include_once('./navBar.html.php'); ?>

        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel" style="background-color: #cccccc">
                    <div class="panel-head" style="background-color: #99ccff; text-align: center">
                        
                        <h3>File Uploader</h3>
                            
                        
                    </div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" action="uploadStatus.php" method="POST" class="form-group">
                            <!-- MAX_FILE_SIZE must precede the file input field -->
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
                            <!-- Name of input element determines name in $_FILES array -->
                            <h4>Send this file:</h4>                            
                            <input name="upfile" type="file" class="btn btn-info"/>
                            <input type="submit" value="Send File" class="btn btn-info"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>

        <!-- The data encoding type, enctype, MUST be specified as below -->


        <?php
        ?>
    </body>
</html>
