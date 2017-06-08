<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
                        
        <?php        
        include './autoload.php';
        
                        
        $util = new Util();        
        
        $validate = new Validation();
        $errors = [];
        $msg = '';
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');     
       
        if ($util->isPostRequest()){
            if (!$validate ->isValidEmail($email)){
                $errors[] = 'Invalid Email';
            }
            if ($password === ''){
                $errors[] = 'Password required';
            }
            if (!count($errors)){
                $reg = new Registration();
                $email = filter_input(INPUT_POST, 'email');
                $password = filter_input(INPUT_POST, 'password');     
                $user_id = $reg -> login($email, $password);
                if ( $user_id > 0 ){
                session_start();
                $_SESSION['user_id'] = $user_id;            
                $util->redirect('admin.php');
                
                }else{
                    $msg = 'Login failed';
                }
            }
        }
        include './Templates/errors.html.php';
        include './Templates/messages.html.php';
        include_once './Templates/login.html.php';
        ?>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="signup.php" class="btn btn-primary">Sign Up</a>
        </div>
        <div class="col-md-4"></div>
        
    </body>
</html>
