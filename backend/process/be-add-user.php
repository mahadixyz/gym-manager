<?php
    require_once "../../core/autoload.php";
    require_once "../../core/member.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['add-member']))
    {
        header("Location: ../main/dashboard.php");
    }
    else
    {
        $_SESSION['fullname'] = $fullname = $_POST['fullname'];
        $_SESSION['email'] = $email = $_POST['email'];
        $_SESSION['password'] = $pass = $_POST['password'];
        $_SESSION['package'] = $package = $_POST['package'];
        $tokenCode = md5(uniqid(rand()));  
        
        $member = new Member;
        $pw = password_hash($pass, PASSWORD_DEFAULT);

        $member->addMember($fullname, $email, $pw, $package, $tokenCode);            
        unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password']);
        header("Location: ../member/members.php");
            

    }        
    
   


?>