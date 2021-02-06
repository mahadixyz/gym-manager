<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";

    $invoice = new Dashboard;
    $result = $invoice->viewInvoice();

    $currMonth = date('F, Y'); 


    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "View Invoices";
    require_once "../inc/be-header.php";
    
    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      require_once "../inc/be-nav-user.php";
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

                <h2 class="display-5 mb-4">Unpaid Invoice</h2>

                <a href="../process/be-invoice.php" class="btn btn-success rounded-0 d-block float-end me-3">Create Invoice</a>


                <?php 
                    // if($invoice->invoiceMonth == $currMonth)
                    // {
                    //     echo '<a href="#" type="button" class="btn btn-success rounded-0 d-block float-end me-3 disabled">Create Invoice</a>';
                    // } 
                    // else
                    // {
                    //     echo '<a href="../process/be-invoice.php" class="btn btn-success rounded-0 d-block float-end me-3">Create Invoice</a>';
                    // }
                    
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
                            <th scope="col">Month</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Member</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            if($result != false)
                            {
                                foreach($result as $data)
                                {                                      
                                    $amount = "<span class='bdt'>&#2547; </span>".number_format($data->invoice_amount, 2);     
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$data->invoice_id?></th>
                                <td><?=$data->invoice_month?></td>
                                <td><?=$amount?></td>
                                <td><?=$data->member_name?></td> 
                                <td><strong class="text-danger"><?=$data->invoice_status?></strong></td>                               
                            </tr>
                        <?php                                                            
                                }
                            }
                            else
                            {
                        ?>
                            <tr>
                                <td colspan="5" class="text-danger text-center"> <strong>No Data Found</strong> </td>
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