<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['package-form']))
    {
        header("Location: ../notice/add-notice.php");
    }

    $package = new Dashboard;

    $pName = $_POST['pName'];
    $pDetails = $_POST['pDetails'];
    $pFee = $_POST['pFee'];
    $image = $_FILES['photo'];

    // echo $month." ".$amount." ". $member;
    // die();

    $status = $package->addPackage($pName, $pDetails, $pFee, $image);

    if($status == true)
    {
        header("Location: ../package/view-packages.php");
    }
    else
    {
        header("Location: ../package/add-package.php");
    }
   


?>