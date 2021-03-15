<?php
    require_once "../../core/autoload.php";
    require_once "../../core/member.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['update-member']))
    {
        header("Location: ../main/dashboard.php");
    }
    else
    {
        $id = $_POST['mem_id'];
        $_SESSION['fullname'] = $fullname = $_POST['fullname'];
        $_SESSION['email'] = $email = $_POST['email'];
        $_SESSION['package'] = $package = $_POST['package'];        
        $_SESSION['status'] = $status = $_POST['status'];
        
        $member = new Member;

        $member->updateMemberbyAdmin($fullname, $email, $package, $status, $id);            
        unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['package'], $_SESSION['status']);
        header("Location: ../member/members.php");
            

    }        
    
   


?>