<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Add new Slider";
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
            <div class="alert alert-warning py-3">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
            <?php
                }
            ?>

            <div class="border p-4">
                <h2 class="display-5">Add Slider</h2>

                <form action="../process/be-slider.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption</label>
                        <input type="text" class="form-control rounded-0" id="caption" name="caption">                        
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Slider Image</label>
                        <input type="file" class="form-control rounded-0" id="photo" name="photo">  
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea class="form-control rounded-0" id="details" name="details"></textarea>
                    </div>
                
                    <button type="submit" name="slider-form" class="btn btn-primary rounded-0">Submit</button>

                </form>

            </div>            
        </div>
    </div>
</div>

<script src="../../_resources/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
	    selector: '#details'
	});
</script>

<?php
    require_once "../inc/be-footer.php";
?>