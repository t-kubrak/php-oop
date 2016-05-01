<?php
/**
 * Database: one connection allowed
 */
class Database
{
    private $_connection;
    // Store single instance
    private static $_instance;

    /*
     * Get an instance of the Database
     * @return Database
     */
    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        $this->_connection = new mysqli("localhost", "dbAdmin", "asd123", "php_oop");
        
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    private function __clone()
    {
    }

    public function getConnection() {
        return $this->_connection;
    }
}