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
        private $query;

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

        /**
         * Undocumented function
         *
         * @param [type] $em
         * @param [type] $pw
         * @return void
         */
        public function signin($em, $pw)
        {
            $this->sql = $this->conn->prepare("SELECT * FROM auth WHERE auth_email = :email");
            $this->query = $this->sql->bindparam(':email', $em);

            $this->query->execute();

            if($this->query->rowCount() == 1)
            {
                $data = $this->query->fetch(PDO::FETCH_OBJ);
                if(password_verify($pw, $data->auth_password))
                {
                    $_SESSION['user_id'] = $data->auth_id;
                    $_SESSION['role'] = $data->auth_role; 
                    return 1;
                }
                else
                {
                    $_SESSION['err'] = "Login Failed. Incorrect Username / Password";
                    return 0;
                }
            }
            else
            {
                $_SESSION['err'] = "Account does not exist.";
                return 0;
            }
        }

        /**
         * registerUser Method
         *
         * @param [string] $fullname
         * @param [string] $email
         * @param [string] $pass
         * @param [string] $code
         * @return int (1/0)
         */
        public function signUp($fullname, $email, $pass, $code)
        {
            $memberQuery = $this->conn->prepare('INSERT INTO member(member_name, member_user_id) VALUES(:fullname, :userid)');
	
            $memberQuery->bindParam(':fullname', $fullname); 

            $authQuery = $this->conn->prepare('INSERT INTO auth(auth_email, auth_password, auth_token) VALUES(:email, :pass, :code)');
	
            $authQuery->bindParam(':email',$email); 
            $authQuery->bindParam(':pass',$pass);
            $authQuery->bindParam(':code',$code);
            
            try
            {                
                $authQuery->execute();

                $uid = $this->conn->lastInsertId();
                $memberQuery->bindParam(':userid',$uid);
                $memberQuery->execute();

                $_SESSION['success']= "Registration Successfull, Please Check your email for verification link.";
                return 1;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['err'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return 0;
            }           
        } 

    }
?>