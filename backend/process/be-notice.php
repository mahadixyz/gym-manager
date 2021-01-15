<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['amount']))
    {
        header("Location: ../add-notice.php");
    }

    $notice = new Dashboard;

    $title = $_POST['title'];
    $for = $_POST['noticeFor'];
    $body = $_POST['body'];

    // echo $month." ".$amount." ". $member;
    // die();

    $status = $notice->addNotice($title, $for, $body);

    if($status == true)
    {
        header("Location: ../view-notice.php");
    }
    else
    {
        header("Location: ../add-notice.php");
    }
   


?>