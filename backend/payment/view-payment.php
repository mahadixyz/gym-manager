<?php
    require_once "../core/autoload.php";
    require_once "../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once "inc/header.php";
    require_once "inc/nav.php";

    $page = 1;
    if($_GET['page'])
    {
        $page = $_GET['page'];
    }
    
    if($_GET['page'] < 1)
    {
        $page = 1;
    }



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
            <div class="border p-4">

                <h2 class="display-5 mb-4">Payment History</h2>
                <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
                ?>
                <div class="alert alert-success py3">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
                <?php
                    }                    
                ?>
                

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Month</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Member</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $payment = new Dashboard;
                            $result = $payment->viewPayment();

                            
                            if($result != false)
                            {
                                foreach($result as $data)
                                { 
                                    $pay_month = date("M, Y", strtotime($data->payment_month));   
                                    $amount = "<span class='bdt'>&#2547; </span>".number_format($data->payment_amount, 2);     
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$payment_id?></th>
                                <td><?=$pay_month?></td>
                                <td><?=$amount?></td>
                                <td><?=$data->member_name?></td>                               
                            </tr>
                        <?php                                                            
                                }
                            }
                            else
                            {
                        ?>
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                        <?php
                            }
                        ?>
                                                
                    </tbody>
                </table>
            </div>            
        </div>
    </div>
</div>
</body>

</html>
<?php
    require_once "inc/footer.php";
?>