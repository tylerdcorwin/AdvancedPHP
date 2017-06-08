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
        $file_path = filter_input(INPUT_GET, 'filePath');
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file_path);
        $folder = './uploads';
        if (!is_dir($folder)) {
            die('Folder <strong>' . $folder . '</strong> does not exist');
        }
        $file = filter_input(INPUT_POST, 'file');
        $util = new Util();
        if (is_file($file)) {
            unlink($file);
        }
        $directory = new DirectoryIterator($folder);
        ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-head"><h2>File Details</h2></div>
                    <div class="panel-body">

                        <!--Downloads and file Size-->
                        <h4><a href="<?php echo $file_path; ?>" download>Download</a></h4>
                        <h4>File Size: <?php echo filesize($file_path); ?> KB</h4>

                        <!--Get file path and info-->
                        <?php
                        $filePath = new SplFileInfo($file_path);
                        $pathinfo = pathinfo($file_path);
                        $extension = $pathinfo['extension'];
                        ?>
                        <h4>File Date: <?php echo date("l F j, Y, g:i a", $filePath->getMTime()); ?></h4>
                        <h4>File Type: <?php echo $extension; ?></h4>                                                
                        <h4>File Name:<?php echo $filePath->getFilename(); ?></h4>

                        <!--Check extension type and display image if any-->
                        <?php if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif'): ?>
                            <img height="400px" src="<?php echo $file_path; ?>" />
                        <?php endif; ?>  
                        <?php if ($extension == 'txt'): ?>
                            <?php
                            $file = new SplFileObject($file_path, "r");
                            $contents = $file->fread($file->getSize());
                            ?>
                            <textarea readonly=""><?php echo $contents; ?></textarea>
                        <?php endif; ?>

                        <!--Iframe throws off the div's but seems to still work Object keeps the div's happy-->
                        <?php if ($extension == 'pdf' || $extension == 'html'): ?>
                            <object src="<?php echo $file_path; ?>"><embed height="500px" width="650px" src="<?php echo $file_path; ?>"></embed></object>                                                    
                        <?php endif; ?>

                        <?php
                        if ($filePath->isFile()) :
                            ?>
                            <form action="./view.php" method="POST">
                                <input type="hidden" name="file" value="<?php echo $filePath->getPathname(); ?>" />
                                <input type="submit" name="submit" value="Delete" />
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
