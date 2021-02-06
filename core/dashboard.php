<?php
    require_once "main.php";
    class Dashboard extends Main
    {        
        private $sql;
        private $query;
        private $perPage = 5;

        // Invoice Month
        public $invoiceMonth;
        
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
            $this->sql = $this->conn->prepare("SELECT * FROM member LEFT JOIN auth ON member.member_user_id=auth.auth_id ORDER BY member.member_user_id DESC LIMIT $offset, $this->perPage");

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


        public function createInvoice()
        {                  
            try
            {     
                $in_month = date('F, Y');   
                 
                // Set invoice month to current month
                $this->invoiceMonth = $in_month;            

                $getInvoiceData = $this->conn->prepare('SELECT * FROM member INNER JOIN package ON package.package_name=member.member_package');
                $getInvoiceData->execute();

                if($getInvoiceData->rowCount() > 0)
                {
                    $invoiceData = $getInvoiceData->fetchAll(PDO::FETCH_OBJ);
                    foreach($invoiceData as $data)
                    {                                

                        $this->sql = $this->conn->prepare('INSERT INTO invoice(invoice_member_id, invoice_amount, invoice_month, invoice_status) VALUES(:member_id, :amount, :in_month, "Unpaid")');
	
                        $this->sql->bindParam(':member_id', $data->member_id);
                        $this->sql->bindParam(':amount', $data->package_fee);
                        $this->sql->bindParam(':in_month', $in_month);
                        $this->sql->execute();  
                    }


                    return true;
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


        public function viewInvoice()
        {       
            
            try
            {    
                $this->sql = $this->conn->prepare("SELECT * FROM member INNER JOIN invoice ON member.member_user_id=invoice.invoice_member_id");            
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
            $this->query = $this->conn->prepare('INSERT INTO notice(notice_title, notice_body, notice_for) VALUES(:ntitle, :nbody, :nfor)');
	
            $this->query->bindParam(':ntitle',$title); 
            $this->query->bindParam(':nbody',$body);
            $this->query->bindParam(':nfor',$for);
            
            try
            {                
                $this->query->execute();                

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

        public function getMemberInfo($id)
        {
            try
            {
                $this->sql = $this->conn->prepare('SELECT member_dob, member_gender FROM member WHERE member_id = :member_id');
                $this->sql->bindParam(':member_id', $id); 
                $this->sql->execute();

                if($this->sql->rowCount() > 0)
                {
                    $data = $this->sql->fetch(PDO::FETCH_OBJ);
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

        public function addReport($mem_id, $height, $weight, $waist, $bmi, $bfat)
        {           
            $this->query = $this->conn->prepare('INSERT INTO report(report_member_id, report_height, report_weight, report_waist, report_bmi, report_body_fat) VALUES(:member, :height, :mem_weight, :waist, :bmi, :bfat)');
	
            $this->query->bindParam(':member',$mem_id); 
            $this->query->bindParam(':height',$height);
            $this->query->bindParam(':mem_weight',$weight);
            $this->query->bindParam(':waist',$waist); 
            $this->query->bindParam(':bmi',$bmi);
            $this->query->bindParam(':bfat',$bfat);
            
            try
            {                
                $this->query->execute();                

                $_SESSION['success']= "Report Added";
                return true;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }           
        }

        public function viewReport()
        {   
            $this->sql = $this->conn->prepare("SELECT report.*, member.member_name FROM report LEFT JOIN member ON report.report_member_id = member.member_id");
            
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


        public function addPackage($name, $details, $fee)
        {           
            $this->query = $this->conn->prepare('INSERT INTO package(package_name, package_details, package_fee) VALUES(:pname, :pdetails, :pfee)');
	
            $this->query->bindParam(':pname',$name); 
            $this->query->bindParam(':pdetails',$details);
            $this->query->bindParam(':pfee',$fee);
            
            try
            {                
                $this->query->execute();                

                $_SESSION['success']= "Package Added";
                return true;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }           
        }

        public function viewPackages()
        {           
            $this->sql = $this->conn->prepare("SELECT * FROM package");
            
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