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
    </head>
    <body>
        <?php
        include './autoload.php';
        
        $msg = new Message();
        $msg->addMessage('test', ' this is a test1');
        $msg->addMessage('test2', ' this is a test2');
        
        var_dump($msg->getAllMessages());
        
        $errMsg = new ErrorMessage();
        $errMsg->addMessage('testErr1', ' this is an error message');
        $errMsg->addMessage('testErr2', ' this is an error message 2');
        
        var_dump($errMsg->getAllMessages());
        
        $sucMsg = new SuccessMessage();
        $sucMsg->addMessage('test success1', ' this is a success message');
        $sucMsg->addMessage('test success2', ' this is a success message2');
        
        var_dump($sucMsg->getAllMessages());
        
        $msg->removeMessage('test');
        
        var_dump($msg->getAllMessages());
        
        ?>
    </body>
</html>
