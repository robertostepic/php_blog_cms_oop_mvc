<?php

namespace CMS\Config;

class DB extends \PDO {
    private $dbHost     = "localhost"; 
    private $dbName     = "cms"; 
    private $dbUsername = "root"; 
    private $dbPassword = ""; 
     
    public function __construct() { 
        parent::__construct("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName . ";", $this->dbUsername, $this->dbPassword);
        $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}