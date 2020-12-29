<?php
    require_once "autoload.php";
    class Database
    {
        private $host = "localhost";
        private $user = "root";
        private $pass ="";
        private $database = "crm4gym";
        private $conn;
        private $sql;

        public function __construct()
        {
            $this->dbConnect();            
        }

        private function dbConnect()
        {
            try
            {
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }            
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
            }
        }
    }
?>