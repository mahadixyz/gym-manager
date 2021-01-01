<?php
    require_once "../core/member.php";
    if(!isset($_POST['signin']))
    {
        header("Location: ../signin.php");
    }
    else
    {
        $_SESSION['email'] = $email = $_POST['email'];
        $_SESSION['pass'] = $pass = $_POST['password'];   

        $auth = new Member;
        $status = $auth->signin($email, $pass); 
                
                 
        if($status == 1)
        {
            unset($_SESSION['email'], $_SESSION['pass']);
            header("Location: ../backend/dashboard.php");
        }
        else
        {
            header("Location: ../signin.php");
        }
        
             
    }
?>