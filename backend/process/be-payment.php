<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['amount']))
    {
        header("Location: ../payment/add-payment.php");
    }

    $payment = new Dashboard;

    $month = $_POST['month'];
    $amount = $_POST['amount'];
    $member = $_POST['member'];

    // echo $month." ".$amount." ". $member;
    // die();

    $status = $payment->addPayment($month, $amount, $member);

    if($status == true)
    {
        header("Location: ../payment/view-payment.php");
    }
    else
    {
        header("Location: ../payment/add-payment.php");
    }
   


?>