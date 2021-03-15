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

    $slider = new Dashboard;

    $caption = $_POST['caption'];
    $details = $_POST['details'];
    $photo = $_FILES['photo'];

    // echo $month." ".$amount." ". $member;
    // die();

    $status = $slider->addSlider($caption, $details, $photo);

   
    header("Location: ../site/add-slider.php");
    
   


?>