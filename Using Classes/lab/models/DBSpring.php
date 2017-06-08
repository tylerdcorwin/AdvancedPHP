<?php

/**
 * Description of DBSpring
 *
 * @author GFORTI
 */
class DBSpring extends DBconnect {
    //put your code here
    
    function __construct() {
       
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2017');
        $this->setPassword('');
        $this->setUser('root');
    }
    

}
