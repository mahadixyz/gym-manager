<?php
    require_once "../core/member.php";
    if(!isset($_POST['feedbackBtn']))
    {
        header("Location: ../index.php");
    }
    else
    {
        $fullname = $_POST['fname'];
        $email = $_POST['mail'];
        $subject = $_POST['subject'];
        $feedback = $_POST['feedback']; 
       
        
        $contact = new Member;
        
        $status = $contact->storeFeedback($fullname, $email, $subject, $feedback);            
        
        if($status == true)
        {
            header("Location: ../index.php#contact");
        }
        else
        {
            header("Location: ../index.php#contact");
        }
             
    }
?>