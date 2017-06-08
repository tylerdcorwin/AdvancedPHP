<?php

session_start();

$reg = new Registration();
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] <= 0){
    exit('Please log in');
    
}



?>