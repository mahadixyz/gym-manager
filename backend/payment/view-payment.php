<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "View All Payments";
    require_once "../inc/be-header.php";
    
    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      require_once "../inc/be-nav-user.php";
    }

    $page = 1;
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    
    if(isset($_GET['page']) && $_GET['page'] < 1)
    {
        $page = 1;
    }

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
            <div class="border p-4">

                <h2 class="display-5 mb-4">Payment History</h2>

                <a href="add-payment.php" class="btn btn-success rounded-0 d-block float-end me-3">Add Payment</a>

                <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
                ?>
                <div class="alert alert-success py-3">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
                <?php
                    }   
                    else if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                    {
                ?>
                <div class="alert alert-danger py-3">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
                <?php
                    }                  
                ?>
                

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Description</th>
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
                                    // $pay_month = date("M, Y", strtotime($data->payment_month));   
                                    $amount = "<span class='bdt'>&#2547; </span>".number_format($data->payment_amount, 2);     
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$data->payment_id?></th>
                                <td><?="#".$data->payment_invoice?></td>
                                <td><?=$amount?></td>
                                <td><?=$data->payment_comments?></td>                               
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
<?php
    require_once "../inc/be-footer.php";
?>