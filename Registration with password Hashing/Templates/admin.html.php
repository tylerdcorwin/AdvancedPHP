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
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-head"><h3>Current Users</h3></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Email</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td> <?php echo $userInfo['user_id']; ?></td>
                                <td> <?php echo $userInfo['email']; ?></td>
                                <td> <?php echo $userInfo['created']; ?></td>
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-info" href="logout.php">Log out</a>
                </div>
            </div>
            <div class="col-md-4"></div>
            
        </div>
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
