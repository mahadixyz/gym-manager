<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Add new Package";
    require_once "../inc/be-header.php";

    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      require_once "../inc/be-nav-user.php";
    }

    $notice = new Dashboard;
    $result = $notice->getMember();    

?>

<div class="container-fluid overflow-hidden mb-5">
    <div class="row gx-2 mt-3">
    <?php
        if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
        {
          require_once "../inc/be-sidenav-admin.php";
        }
        else
        {
          require_once "../inc/be-sidenav-user.php";
        }
    ?>

        <div class="col-md-9">
           
            <?php                
                if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                {
            ?>
            <div class="alert alert-warning py3">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
            <?php
                }
            ?>

            <div class="border p-4">
                <h2 class="display-5">Add Package</h2>

                <form action="../process/be-package.php" method="POST">

                    <div class="mb-3">
                        <label for="pName" class="form-label">Package Name</label>
                        <input type="text" class="form-control rounded-0" id="pName" name="pName">                        
                    </div>

                    <div class="mb-3">
                        <label for="pDetails" class="form-label">Package details</label>
                        <textarea class="form-control rounded-0" id="pDetails" name="pDetails"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="pFee" class="form-label">Package Fee</label>
                        <input type="number" class="form-control rounded-0" id="pFee" name="pFee">                        
                        
                    </div>
                
                    <button type="submit" name="package-form" class="btn btn-primary rounded-0">Submit</button>

                </form>

            </div>            
        </div>
    </div>
</div>

<script src="../../_resources/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
	    selector: '#pDetails'
	});
</script>

<?php
    require_once "../inc/be-footer.php";
?>