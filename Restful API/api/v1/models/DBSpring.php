<?php

/**
 * Description of DBSpring
 *
 * @author GFORTI
 */
class DBSpring extends DB {
    
     public function __construct() {
        $dbConfig = array( 
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>'');
        parent::__construct($dbConfig);
    }
    
}
