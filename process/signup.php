<?php
    require_once "../core/db.php";
    if(!isset($_POST['signup']))
    {
        header("Location: ../signup.php");
    }
    else
    {
        // $captcha = $_POST["captcha"];
        $_SESSION['fullname'] = $fullname = $_POST['fullname'];
        $_SESSION['email'] = $email = $_POST['email'];
        $_SESSION['password'] = $pass = $_POST['password'];
        $_SESSION['cPassword'] = $cPassword = $_POST['cPassword']; 
        
        // if($captcha != $_SESSION['captchaCode'])
        // {
        //     $_SESSION['captchaErr'] = "Incorrect Code.";
        //     header("Location: ../index.php");
        // }
        // else
        // {         
            $tokenCode = md5(uniqid(rand()));            
            if($pass === $cPassword)
            {
                $reg = new Database;
                $pw = password_hash($conPass, PASSWORD_DEFAULT);

                $reg->signup($fullname, $email, $pw, $tokenCode);            
                unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password'], $_SESSION['cPassword']);
                header("Location: ../signup.php");
            }
            else
            {
                $_SESSION['pwErr'] = "Password doesn't match";
                header("Location: ../signup.php");
            }

        // }        
    }
?>