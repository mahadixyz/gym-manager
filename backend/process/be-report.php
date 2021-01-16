<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if(!isset($_POST['report-form']))
    {
        header("Location: ../report/add-report.php");
    }

    $report = new Dashboard;

    $height = ($_POST['height']/100);
    $weight = $_POST['weight'];
    $waist = $_POST['waist'];
    $member = $_POST['reportOf'];

    
    $memberInfo = $report->getMemberInfo($member);
    $gender = $memberInfo->member_gender;

    if($gender == "female")
    {
        $genderVal = 5.4;
    }
    else
    {
        $genderVal = 16.2;
    }

    // Find age from DOB
    $dob = new DateTime(date("Y-m-d", strtotime($memberInfo->member_dob)));
    $timeNow = new DateTime(date("Y-m-d",strtotime(date("Y-m-d"))));
    $age = date_diff($timeNow, $dob)->format("%Y");
    
    if($age < 1)
    {
        $age++;
    }
    // Calculate BMI
    $bmi = round($weight/pow($height,2), 2);

    // Calculate Body Fat
    $bfat = round((1.20 * $bmi) + (0.23 * $age) - $genderVal, 2);


    $status = $report->addReport($member, $height, $weight, $waist, $bmi, $bfat);

    if($status == true)
    {
        header("Location: ../report/view-reports-all.php");
    }
    else
    {
        header("Location: ../report/add-report.php");
    }

?>