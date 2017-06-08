<?php

/**
 * DB is the general class to connection to our database
 *
 * @author GForti
 */


class DB {
    
    protected $db = null;
    protected $dbConfig = array();
   
     
    /**
    * The contructor requires.
    *    
    * @param {Array} [$dbConfig] - Database config
    */    
    public function __construct($dbConfig) {
        $this->setDbConfig($dbConfig);      
    }
    
    protected function getDbConfig() {
        return $this->dbConfig;
    }

    protected function setDbConfig($dbConfig) {
        $this->dbConfig = $dbConfig;
    }
    
    /**
    * A method to get our database connection.
    *    
    * @return PDO
    */           
    public function getDB() { 
        if ( null != $this->db ) {
            return $this->db;
        }
        try {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {          
           $this->closeDB();
           throw new Exception($ex->getMessage());
        }
        return $this->db;        
    }
    
    /**
    * A method to close our database connection.
    *    
    * @return void
    */  
     public function closeDB() {        
        $this->db = null;        
    }
    
    
}
