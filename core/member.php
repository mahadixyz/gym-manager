<?php
    require_once "main.php";
    class Member extends Main
    {        
        private $sql;
        private $query;

        public function __construct()
        {
            parent::__construct();          
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
                    echo "Account exist";
                    // $_SESSION['user_id'] = $data->auth_id;
                    // $_SESSION['role'] = $data->auth_role; 
                    // return 1;
                }
                else
                {
                    echo "Login Failed. Incorrect Username / Password";
                    // $_SESSION['err'] = "Login Failed. Incorrect Username / Password";
                    // return 0;
                }
            }
            else
            {
                echo "Account does not exist";
                // $_SESSION['err'] = "Account does not exist.";
                // return 0;
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