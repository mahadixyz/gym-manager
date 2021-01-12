<?php
    require_once "../core/autoload.php";
    require_once "../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once "inc/header.php";
    require_once "inc/nav.php";

    $notice = new Dashboard;
    $result = $notice->getMember();    

?>

<div class="container-fluid overflow-hidden">
    <div class="row gx-2 mt-3">
    <?php
        if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
        {
          require_once "inc/sidenav-admin.php";
        }
        else
        {
          require_once "inc/sidenav-user.php";
        }
    ?>

        <div class="col-md-9">
           
            <?php                
                if(isset($_SESSION['err']) && $_SESSION['err'] != '')
                {
            ?>
            <div class="alert alert-warning py3">
                <?php
                    echo $_SESSION['err'];
                    unset($_SESSION['err']);
                ?>
            </div>
            <?php
                }
            ?>

            <div class="border p-4">
                <h2 class="display-5">Add Notice</h2>

                <form action="process/notice.php" method="POST">

                    <div class="mb-3">
                        <label for="title" class="form-label">Notice Title</label>
                        <input type="text" class="form-control rounded-0" id="title" name="title">                        
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Notice Body</label>
                        <textarea class="form-control rounded-0" id="body" name="body"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="noticeFor" class="form-label">Notice for</label>
                        <select class="form-select rounded-0" id="noticeFor" name="noticeFor">
                            <option value="0" selected>Everyone</option>

                <?php
                    if($result != false)
                    {
                        foreach($result as $data)
                        {                             
                ?>
                            <option value="<?=$data->member_id?>"><?=$data->member_name?></option>
                <?php
                        }
                    }
                ?>
                        </select>
                    </div>
                
                    <button type="submit" class="btn btn-primary rounded-0">Submit</button>

                </form>

            </div>            
        </div>
    </div>
</div>

<script src="../_resources/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
	    selector: '#body'
	});
</script>


</body>

</html>
<?php
    require_once "inc/footer.php";
?>