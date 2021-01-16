<?php
    require_once "../../core/autoload.php";
    require_once "../../core/member.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['update-user-form']))
    {
        header("Location: ../user/user-update-profile.php");
    }

    $notice = new Member;

    $id = $_SESSION['user_id'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    

    $status = $notice->updateUserData($id, $contact, $gender, $dob, $address);

    if($status == true)
    {
        header("Location: ../user/user-profile.php");
    }
    else
    {
        header("Location: ../user/user-update-profile.php");
    }
   


?>