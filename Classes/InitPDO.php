<?php
    include_once "Classes/Config.php";

    class InitPDO {
        private $database;

        public function __construct() {
            // #TODO: Make config file to store database data.
            $username = Config::DATABASE_USERNAME;
            $password = Config::DATABASE_PASSWORD;
            
            $databaseName = Config::DATABASE_NAME;
            $host = Config::DATABASE_HOST;
            $cdn = "mysql:dbname={$databaseName};host={$host}";
        
            $this->database = new PDO($cdn, $username, $password);
        }

        public function GetDatabase() {
            return $this->database;
        }
    }
    