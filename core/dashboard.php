<?php
    require_once "main.php";
    class Dashboard extends Main
    {        
        private $sql;
        private $query;
        private $perPage = 5;
        
        /**
         * Class Constructor
         */
        public function __construct()
        {
            parent::__construct();          
        }   
        
        public function totalPage()
        {
            $this->sql = $this->conn->prepare('SELECT * FROM member INNER JOIN auth ON auth.auth_id=member.member_user_id');
            try
            {
                $this->sql->execute();

                $data = $this->sql->rowCount();

                $totalPageNo = ceil($data/$this->perPage);
                
                return $totalPageNo;
               
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            } 
        }

        public function viewMembers($pageNum)
        {
            $offset = (int) ($pageNum-1) * $this->perPage;
            // $this->sql = $this->conn->prepare('SELECT * FROM member INNER JOIN auth ON auth.auth_id=member.member_user_id LIMIT :offset, :perpage');
            $this->sql = $this->conn->prepare("SELECT * FROM member LEFT JOIN auth ON member.member_user_id=auth.auth_id LIMIT $offset, $this->perPage");

            try
            {
                // $this->sql->execute(array(':offset' => $offset, ':perpage' => $this->perPage));
                $this->sql->execute();

                if($this->sql->rowCount() > 0)
                {
                    $data = $this->sql->fetchAll();
                    // print_r($data);
                    return $data;
                }
                else
                {
                    // echo "No Data";
                    // return false;
                }    
            }
            catch(PDOException $Exception)
            {
                echo "error: ".$Exception->getMessage();
                // $this->errmsg = $Exception->getMessage();
                // $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                // return false;
            }  
        }

        public function countMember()
        {
            $this->sql = $this->conn->prepare('SELECT member_id FROM member ORDER BY member_id DESC LIMIT 1');
            try
            {
                $this->sql->execute();

                if($this->sql->rowCount() > 0)
                {
                    $data = $this->sql->fetch();
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

        public function countStatus($st)
        {
            $this->sql = $this->conn->prepare('SELECT * FROM member WHERE member_status = :st');
            $this->sql->bindParam(':st',$st); 
            try
            {
                $this->sql->execute();

                return $this->sql->rowCount();
                // return 10;
                   
            }
            catch(PDOException $Exception)
            {
                // return 101;
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
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

        public function getMember()
        {
            $this->sql = $this->conn->prepare('SELECT * FROM member ');
            try
            {
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

        public function addPayment($month, $amount, $member)
        {           
            $authQuery = $this->conn->prepare('INSERT INTO payment(payment_month, payment_amount, payment_member) VALUES(:pmonth, :amount, :member)');
	
            $authQuery->bindParam(':pmonth',$month); 
            $authQuery->bindParam(':amount',$amount);
            $authQuery->bindParam(':member',$member);
            
            try
            {                
                $authQuery->execute();                

                $_SESSION['success']= "Payment Successfull";
                return true;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }           
        }
        
        public function viewPayment()
        {           
            // $this->sql = $this->conn->prepare("SELECT * FROM payment");
            $this->sql = $this->conn->prepare("SELECT payment.*, member.member_name FROM payment INNER JOIN member ON payment.payment_member = member.member_id");
            
            try
            {
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


        public function addNotice($title, $for, $body)
        {           
            $authQuery = $this->conn->prepare('INSERT INTO notice(notice_title, notice_body, notice_for) VALUES(:ntitle, :nbody, :nfor)');
	
            $authQuery->bindParam(':ntitle',$title); 
            $authQuery->bindParam(':nbody',$body);
            $authQuery->bindParam(':nfor',$for);
            
            try
            {                
                $authQuery->execute();                

                $_SESSION['success']= "Notice Added";
                return true;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }           
        }

        public function viewNotice()
        {           
            // $this->sql = $this->conn->prepare("SELECT * FROM payment");
            $this->sql = $this->conn->prepare("SELECT notice.*, member.member_name FROM notice LEFT JOIN member ON notice.notice_for = member.member_id");
            // $this->sql = $this->conn->prepare("SELECT * FROM notice");
            
            try
            {
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


    }
?>