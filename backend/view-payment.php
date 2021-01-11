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
        <?php require_once "inc/sidenav.php"; ?>

        <div class="col-md-9">
            <div class="border p-4">
                <h2 class="display-5">Dashboard</h2>

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
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$payment_id?></th>
                                <td><?=$data->payment_month?></td>
                                <td><?=$data->payment_amount?></td>
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