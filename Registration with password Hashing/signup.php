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

        $reg = new Registration();
        $util = new Util();
        $validate = new Validation();
        $errors = [];
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

        if ($util->isPostRequest()) {
            if (!$validate->isValidEmail($email) || $email === '') {
                $errors[] = 'Invalid Email';
            }
            if ($password === '') {
                $errors[] = 'Password Required';
            }
            if ($confirmPassword === '') {
                $errors[] = 'Confirm Password';
            }
            if ($password !== $confirmPassword) {
                $errors[] = 'Passwords Dont Match';
            }
            if (!count($errors)) {
                if ($reg->emailExists($email)) {
                    $msg = 'Email Already In Use, Please Login';
                }
                if ($reg->signup($email, $password)) {
                    $msg = 'Registration Confirmed';
                    $email = '';
                    $password = '';
                    $confirmPassword = '';
                } else {
                    $msg = 'Registration Failed';
                    //var_dump($reg);                            
                }
            }
        }
        include_once './Templates/signup.html.php';
        include './Templates/errors.html.php';
        include './Templates/messages.html.php';
        ?>
        <div class="col-md-4"></div>
        <div class="col-md-4">        
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
        <div class="col-md-4"></div>
    </body>
</html>
