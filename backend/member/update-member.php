<?php
    require_once "../core/autoload.php";
    require_once BASE_URL."/core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once BASE_URL."inc/header.php";
    require_once BASE_URL."inc/nav.php";
?>
<div class="container-fluid overflow-hidden">
    <div class="row gx-2 mt-3">
    <?php
        if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
        {
          require_once BASE_URL."inc/sidenav-admin.php";
        }
        else
        {
          require_once BASE_URL."inc/sidenav-user.php";
        }
    ?>

        <div class="col-md-9">

            <div class="border p-4">
                <h2 class="display-5">Dashboard</h2>
            </div>  
            
        </div>
    </div>
</div>

</body>

</html>
<?php
    require_once BASE_URL."inc/footer.php";
?>