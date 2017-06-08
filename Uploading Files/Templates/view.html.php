<!DOCTYPE html>

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
        //include '../autoload.php';
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
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-head"><h3>Current Files</h3></div>
                    <div class="panel-body" style="width:750px">
                        <ol>
                            <?php foreach($directory as $fileInfo) : 
                                if($fileInfo -> isFile()) : ?>
                                    
                            <li><a href="viewDetails.php?filePath=<?php echo $fileInfo -> getPathname() ?>"> <?php echo $fileInfo ?></a>                               
                                <form action="#" method="POST">
                                    <input type="hidden" name="file" value="<?php echo $fileInfo -> getPathname();?>" />
                                    <input type="submit" name="submit" value="Delete" />
                                </form>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; 
                            echo $fileInfo ->getPathname();
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        

    </body>
</html>
