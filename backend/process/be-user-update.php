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

    $member = new Member;

    $id = $_SESSION['user_id'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $image = $_FILES['picture'];
    $address = $_POST['address'];

    

    $status = $member->updateUserData($id, $contact, $gender, $dob, $image, $address);

    if($status == true)
    {
        header("Location: ../user/user-profile.php");
    }
    else
    {
        header("Location: ../user/user-update-profile.php");
    }
   


?>