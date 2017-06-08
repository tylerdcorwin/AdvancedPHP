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
        <h1>Add Addresses</h1>
        
        <?php
        include './models/dbconnect.php';
        include './models/util.php';
        include './models/validation.php';
        include './models/addressCRUD.php';


        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $addressline1 = filter_input(INPUT_POST, 'addressline1');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $birthday = filter_input(INPUT_POST, 'birthday');
        
        $states = returnStates();

        $errors = [];
        if (isPostRequest()) {

            if (empty($fullname)) {
                $errors[] = 'Full Name is required';
            }
            if (isValidEmail($email) == false || empty($email)) {
                $errors[] = 'Email is not Valid';
            }
            if (empty($addressline1)) {
                $errors[] = 'Address is required';
            }
            if (empty($city)) {
                $errors[] = 'City is required';
            }
            if (empty($state)) {
                $errors[] = 'State is required';
            }
            if (empty($zip) || !isValidZIP($zip)) {
                $errors[] = 'Zip is not Valid';
            }
            if (empty($birthday) || !isValidDate($birthday)) {
                $errors[] = 'Birthday is not Valid';
            }
            
            if (count($errors) === 0){
                if (createAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday)){
                    $message = 'Address Added';
                }
                else{
                    $errors[] = 'Address was not added';
                }
                
            }
        }
        
        $address = readAllAddress();
        ?>               
        <?php include './templates/errors.html.php'; ?>
        <?php include './templates/add-address.html.php'; ?>
        <?php include './templates/messages.html.php'; ?>
        <br/><br/>
        <a href="view-address.php" class="btn btn-primary">View Address</a>
    </body>
</html>
