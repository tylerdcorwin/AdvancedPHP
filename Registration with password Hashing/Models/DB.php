<?php

class DB {

    protected $db = null;
    private $dbConfig = array();

    /**
     * The contructor requires.
     *    
     * @param {Array} [$dbConfig] - Database config
     */

    public function __construct($dbConfig) {
        $this->setDbConfig($dbConfig);
    }

    private function getDbConfig() {
        return $this->dbConfig;
    }

    private function setDbConfig($dbConfig) {
        if (is_array($dbConfig)) {
            $this->dbConfig = $dbConfig;
        } else {
            throw new ArrayException('$dbConfig must be an array!');
        }
    }

    /**
     * A method to get our database connection.
     *    
     * @return PDO
     */

    public function getDB() {
        if (null != $this->db) {
            return $this->db;
        }
        try {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        } catch (Exception $ex) {
            $this->closeDB();
            throw new DBException($ex->getMessage());
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
