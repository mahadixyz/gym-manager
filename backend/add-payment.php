<?php
    require_once "../core/autoload.php";
    require_once "../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once "inc/header.php";
    require_once "inc/nav.php";

    $payment = new Dashboard;
    $result = $payment->getMember();    

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
                <h2 class="display-5">Add Payment</h2>

                <form action="process/payment.php" method="POST">

                    <div class="mb-3">
                        <label for="month" class="form-label">Payment Month</label>
                        <input type="month" class="form-control rounded-0" id="month" name="month">                        
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="0.10" class="form-control rounded-0" id="amount" name="amount">
                    </div>

                    <div class="mb-3">
                        <label for="member" class="form-label">Member</label>
                        <select class="form-select rounded-0" id="member" name="member">
                            <option value="" selected>Select Member</option>

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
</body>

</html>
<?php
    require_once "inc/footer.php";
?>