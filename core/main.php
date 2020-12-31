<?php
    require_once "autoload.php";
    class Main
    {
        private $host = "localhost";
        private $user = "root";
        private $pass ="";
        private $database = "crm4gym";
        protected $conn;
        protected $errmsg;

        /**
         * Undocumented function
         */
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