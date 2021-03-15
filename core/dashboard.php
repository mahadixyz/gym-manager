<?php
    require_once "main.php";
    class Dashboard extends Main
    {        
        private $sql;
        private $query;
        private $perPage = 5;
        private $uploadedImg = null;
        
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
        
        /**
        * viewMembers() function
        *
        * @param [int] $pageNum
        * @return data / false
        */
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
                $this->sql = $this->conn->prepare('SELECT * FROM member INNER JOIN invoice ON member.member_id=invoice.invoice_member_id WHERE invoice_status = "Unpaid"');                            
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
        
        public function getInvoiceAmount($id)
        {       
            
            try
            {    
                $this->sql = $this->conn->prepare('SELECT invoice_amount FROM invoice WHERE invoice_id = :inv_id');         
                $this->sql->bindParam(':inv_id', $id);   
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
        
        
        public function addPayment($invoice, $comments)
        {    
            try
            {     
                $amount = $this->getInvoiceAmount($invoice);
                
                $this->sql = $amount = $this->getInvoiceAmount($invoice);
                
                $this->sql = $this->conn->prepare('INSERT INTO payment(payment_invoice, payment_amount, payment_comments) VALUES(:pinvoice, :amount, :comments)');
                
                $this->sql->bindParam(':pinvoice',$invoice); 
                $this->sql->bindParam(':amount', $amount->invoice_amount);
                $this->sql->bindParam(':comments',$comments);
                
                $this->sql->bindParam(':pinvoice',$invoice); 
                $this->sql->bindParam(':amount', $amount->invoice_amount);
                $this->sql->bindParam(':comments',$comments);
                
                $this->sql->execute();  
                
                $updateStatus = $this->conn->prepare('UPDATE invoice SET invoice_status = "Paid" WHERE invoice_id = :inv_id');
                $updateStatus->bindParam(':inv_id',$invoice); 
                $updateStatus->execute();  
                
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
            $this->sql = $this->conn->prepare("SELECT * FROM payment");
            
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
            try
            {
                $this->sql = $this->conn->prepare("SELECT report.*, member.member_name FROM report LEFT JOIN member ON report.report_member_id = member.member_id");
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

        /**
         * viewFeedback function
         * Fetch All feedback messages
         * @return mixed
         */
        public function viewFeedback()
        {
            try
            {
                $this->sql = $this->conn->prepare("SELECT * FROM feedback ORDER BY feedback_id DESC");
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
        
        /*
        * ------------------------------------------
        * Methods for Membership Packages
        * ------------------------------------------
        */
        
        /**
         * addPackage function
         * Add a membership package
         * @param [string] $name
         * @param [string] $details
         * @param [double] $fee
         * @return void
         */
        public function addPackage($name, $details, $fee, $photo)
        {     
            $this->uploadImg($photo);       
            $this->query = $this->conn->prepare('INSERT INTO package(package_name, package_details, package_image, package_fee) VALUES(:pname, :pdetails, :pimg, :pfee)');
            
            $this->query->bindParam(':pname',$name); 
            $this->query->bindParam(':pdetails',$details);
            $this->query->bindParam(':pimg',$this->uploadedImg);
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
        
        /**
         * viewPackages function
         * Fetch al packages data from DB
         * @return data / false
         */
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

         /*
        * ------------------------------------------
        * Methods for Site carousel
        * ------------------------------------------
        */
        
        /**
         * addSlider function
         * Add a membership package
         * @param [string] $name
         * @param [string] $details
         * @param [double] $fee
         * @return void
         */
        public function addSlider($caption, $details, $photo)
        {     
            $this->uploadImg($photo);       
            $this->query = $this->conn->prepare('INSERT INTO slider(slider_caption, slider_details, slider_image) VALUES(:scap, :sdetails, :simg)');
            
            $this->query->bindParam(':scap',$caption); 
            $this->query->bindParam(':sdetails',$details);
            $this->query->bindParam(':simg',$this->uploadedImg);
            
            try
            {                
                $this->query->execute();                
                
                $_SESSION['success']= "Slider Added";
                return true;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return false;
            }           
        }

        /**
         * viewSlider function
         * Fetch al Slider data from DB
         * @return data / false
         */
        public function viewSlider()
        {           
            $this->sql = $this->conn->prepare("SELECT * FROM slider ORDER BY slider_id DESC LIMIT 3");
            
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

        
        /*
        * ------------------------------------------
        * Methods for Dashboard Charts&Graphs
        * ------------------------------------------
        */
        
        /**
         * totalUnpaid function
         * Get Total Unpaid Amount
         * @return data / false
         */
        public function totalUnpaid()
        {
            $this->sql = $this->conn->prepare('SELECT SUM(invoice_amount) AS total FROM invoice WHERE invoice_status = "Unpaid"');
            try
            {
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
        
        /**
         * totalRevenue function
         * Get total Revemue Amount
         * @return data / false
         */
        public function totalRevenue()
        {
            $this->sql = $this->conn->prepare('SELECT SUM(payment_amount)  AS total FROM payment');
            try
            {
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
        
        /**
         * countMember function
         * Get Total Registered Member
         * @return data / false
         */
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
        
        /**
         * countStatus function
         * Get number of member by their user status
         * @param [string] $st
         * @return int / bool
         */
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
         * UploadImg Method
         * Used for Uploading Image
         * @param [file] $img
         * @return boolean
         */
        private function uploadImg($img)
        {
            // Image Data
            $pImage = $img['name'];
            $tmp_location = $img['tmp_name'];
            $imgSize = $img['size'];
            
            // Image Upload Directory
            $upDir = '../../_resources/images/';
            // echo '<img src="'.$upDir.$pImage.'">';
            // die();
    
            // get image file type
            $imgType = strtolower(pathinfo($pImage, PATHINFO_EXTENSION)); 
    
            // Accepted image types
            $accFileTypes = array('jpeg', 'jpg', 'png', 'gif');
    
            // Change name of image
            $this->uploadedImg = date('D')."-".rand(1000,9999).".".$imgType;
                
            // allow valid image file formats
            if(in_array($imgType, $accFileTypes))
            {           
                // Check file size < '3MB'
                if($imgSize < 3000000)              
                {
                    if(move_uploaded_file($tmp_location, $upDir.$this->uploadedImg))
                    {
                        return true;
                    }
                    else
                    {
                        $_SESSION['error'] = "Sorry, your file didn't upload.".$img['error'];
                        return false;
                    }
                }
                else
                {
                    $_SESSION['error'] = "Sorry, your file is too large.";
                    return false;
                }
            }
            else
            {
                $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                return false;   
            }  
        }
        
        
    }
?>