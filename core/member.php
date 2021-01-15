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
         * SignUp Method
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
                $memberQuery->bindParam(':userid', $uid);
                $memberQuery->execute();

                $_SESSION['success']= "Registration Successfull, Please Check your email for verification link.";
                return 1;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return 0;
            }           
        }

        /**
         * signIn Method
         *
         * @param [string] $em
         * @param [string] $pw
         * @return int (1/0)
         */
        public function signin($em, $pw)
        {
            $Query = $this->conn->prepare('SELECT * FROM auth WHERE auth_email = :email LIMIT 1');
            $Query->bindParam(':email', $em); 
            $Query->execute();

            if($Query->rowCount() > 0)
            {
                $data = $Query->fetch(PDO::FETCH_OBJ);
                                
                if(password_verify($pw, $data->auth_password))
                {
                    $_SESSION['user_id'] = $data->auth_id;
                    $_SESSION['role'] = $data->auth_role; 
                    return 1;
                }
                else
                {
                    $_SESSION['error'] = "Login Failed. Incorrect Username / Password";
                    return 0;
                }
            }
            else
            {
                $_SESSION['error'] = "Account does not exist.";
                return 0;
            }            
        }

        public function getProfileData($id)
        {
            try
            {
                $this->sql = $this->conn->prepare('SELECT * FROM member INNER JOIN auth ON auth.auth_id=member.member_user_id WHERE member_user_id = :member_u_id');
                $this->sql->bindParam(':member_u_id', $id); 
                $this->sql->execute();

                if($this->sql->rowCount() > 0)
                {
                    $data = $this->sql->fetchAll(PDO::FETCH_OBJ);
                    return $data;
                }
                else
                {
                    return false;
                }    
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }  

        }

        public function updateUserData($id, $contact, $gender, $dob, $address)
        {
             
            try
            {      
                $memberQuery = $this->conn->prepare('UPDATE member SET member_mobile = :mobile, member_gender = :gender, member_dob = :dob, member_address = :mem_address WHERE member_user_id = :mem_id');	
                $memberQuery->bindParam(':mobile', $contact); 
                $memberQuery->bindParam(':gender', $gender); 
                $memberQuery->bindParam(':dob', $dob); 
                $memberQuery->bindParam(':mem_address', $address); 
                $memberQuery->bindParam(':mem_id', $id);          
               
                $memberQuery->execute();

                $_SESSION['success']= "Profile Updated.";
                return 1;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return 0;
            }           
        }

    }
?>