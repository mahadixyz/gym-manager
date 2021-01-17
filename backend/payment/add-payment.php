<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Add new Payment";
    require_once "../inc/be-header.php";
    
    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      require_once "../inc/be-nav-user.php";
    }

    $payment = new Dashboard;
    $result = $payment->getMember();    

?>

<div class="container-fluid overflow-hidden">
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
                <h2 class="display-5">Add Payment</h2>

                <form action="../process/be-payment.php" method="POST">

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
                
                    <button type="submit" name="payment-form" class="btn btn-primary rounded-0">Submit</button>

                </form>

            </div>            
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>