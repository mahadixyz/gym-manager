<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header("Location: signin.php");
    }

    if(isset($_GET['signout']) && $_GET['signout'] == true)
    {
        session_unset();
        session_destroy();
        header("Location: signin.php");
    }

?>
