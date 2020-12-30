<?php
    require_once "../core/db.php";
    if(!isset($_POST['signin']))
    {
        header("Location: ../signin.php");
    }
    else
    {
        $_SESSION['email'] = $email = $_POST['email'];
        $_SESSION['pass'] = $pass = $_POST['pass'];    
          
        $login = new Database;

        $status = $login->signIn($email, $pass);            
        if($status == 1)
        {
            unset($_SESSION['email'], $_SESSION['pass']);
            header("Location: ../dashboard.php");
        }
        else
        {
            header("Location: ../signIn.php");
        }
        
       

             
    }
?>