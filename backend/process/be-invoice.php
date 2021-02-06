<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }


    $invoice = new Dashboard;

    // echo $month." ".$amount." ". $member;
    // die();

    $status = $invoice->createInvoice();

    if($status == true)
    {
        $_SESSION['success'] = "Invoices Created Successfully!";
        header("Location: ../payment/view-invoices.php");
    }
    else
    {
        $_SESSION['error'] =  "Invoice generation failed. Error: " . $_SESSION['error'];
        header("Location: ../payment/view-invoices.php");
    }
   


?>