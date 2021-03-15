<?php
    require_once "main.php";

    class Member extends Main
    {        
        private $sql;       
		private $uploadedImg = null;

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
         * addMember Method
         *
         * @param [string] $fullname
         * @param [string] $email
         * @param [string] $pass
         * @param [string] $code
         * @return int (1/0)
         */

        public function addMember($fullname, $email, $pass, $package, $code)
        {
            
            
            try
            {  
                $memberQuery = $this->conn->prepare('INSERT INTO member(member_name, member_user_id, member_package) VALUES(:fullname, :userid, :package)');
	
                $memberQuery->bindParam(':fullname', $fullname); 
                $memberQuery->bindParam(':package', $package); 

                $authQuery = $this->conn->prepare('INSERT INTO auth(auth_email, auth_password, auth_token) VALUES(:email, :pass, :code)');
        
                $authQuery->bindParam(':email',$email); 
                $authQuery->bindParam(':pass',$pass);
                $authQuery->bindParam(':code',$code);
                
                
                $authQuery->execute();

                $uid = $this->conn->lastInsertId();
                $memberQuery->bindParam(':userid', $uid);
                $memberQuery->execute();

                $_SESSION['success']= "Member added Successfully.";
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
         * storeFeedback function
         *
         * @param $fullname
         * @param $email
         * @param $subject
         * @param $feedback
         * @return bool
         */
        public function storeFeedback($fullname, $email, $subject, $feedback)
        {             
            $this->sql = $this->conn->prepare('INSERT INTO feedback(feedback_name, feedback_mail, feedback_subject, feedback_text) VALUES(:fullname, :email, :m_subject, :m_feedback)');
	
            $this->sql->bindParam(':fullname', $fullname); 	
            $this->sql->bindParam(':email', $email); 
            $this->sql->bindParam(':m_subject', $subject);
            $this->sql->bindParam(':m_feedback', $feedback); 
            
            try
            {    
                $this->sql->execute();               
                $_SESSION['success']= "Thank you. We will response to your feedback soon.";
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

        public function getPackages()
        {
            try
            {
                $this->sql = $this->conn->prepare('SELECT * FROM package');
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

        public function updateMemberbyAdmin($name, $email, $package, $status, $id)
        {            
            try
            {    
                $Query = $this->conn->prepare('UPDATE member SET member_name = :name, member_package = :package, member_status = :status WHERE member_user_id = :id');  

                $Query2 = $this->conn->prepare('UPDATE auth SET auth_email = :email WHERE auth_id = :aid'); 

                $Query->bindParam(':id', $id); 
                $Query->bindParam(':name', $name); 
                $Query->bindParam(':package', $package); 
                $Query->bindParam(':status', $status);

                $Query2->bindParam(':aid', $id); 
                $Query2->bindParam(':email', $email);

                $Query->execute();
                $Query2->execute();

                $_SESSION['success']= "Member Information Updated.";
                return 1;
            }
            catch(PDOException $Exception)
            {
                $this->errmsg = $Exception->getMessage();
                $_SESSION['error'] = "Unexpected Error Occured. Please try again Later.<br> Error: ".$this->errmsg;
                return 0;
            }           
        }

        public function updateUserData($id, $contact, $gender, $dob, $image, $address, $package)
        {            
            try
            {  
                $this->uploadImg($image);    
                $memberQuery = $this->conn->prepare('UPDATE member SET member_mobile = :mobile, member_gender = :gender, member_dob = :dob, member_address = :mem_address, member_photo = :mem_photo, member_package = :mem_package WHERE member_user_id = :mem_id');	
                $memberQuery->bindParam(':mobile', $contact); 
                $memberQuery->bindParam(':gender', $gender); 
                $memberQuery->bindParam(':dob', $dob);
                $memberQuery->bindParam(':mem_photo', $this->uploadedImg); 
                $memberQuery->bindParam(':mem_address', $address); 
                $memberQuery->bindParam(':mem_id', $id);       
                $memberQuery->bindParam(':mem_package', $package);     
               
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

        /**
         * getHealthReport function
         *
         * @param [type] $id
         * @return mix
         */
        public function getHealthReport($id)
        {   
            try
            {
                $this->sql = $this->conn->prepare("SELECT report.*, member.member_name FROM report LEFT JOIN member ON report.report_member_id = member.member_id WHERE report_member_id = :id ORDER BY report_id DESC");
                $this->sql->bindParam(':id', $id); 


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