<?php
    require_once "core/autoload.php";
    if(!isset($_SESSION['user_id']))
    {
        header("Location: signin.php");
    }
?>