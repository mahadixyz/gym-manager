<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['payment-form']))
    {
        header("Location: ../payment/add-payment.php");
    }

    $payment = new Dashboard;

    $invoice = $_POST['invoice'];
    $comments = $_POST['comments'];      

    
    $status = $payment->addPayment($invoice, $comments);

    if($status == true)
    {
        header("Location: ../payment/view-payment.php");
    }
    else
    {
        header("Location: ../payment/add-payment.php");
    }
   


?>