<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }
    require_once "../inc/be-header.php";
    require_once "../inc/be-nav.php";

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

                <h2 class="display-5 mb-4">All Reports</h2>
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
                            <th scope="col">Report Generated</th>
                            <th scope="col">Member</th>
                            <th scope="col">BMI</th>
                            <th scope="col">Body Fat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $report = new Dashboard;
                            $result = $report->viewReport();

                            
                            if($result != false)
                            {
                                foreach($result as $data)
                                {           
                                    $r_date = date("d M, Y", strtotime($data->report_generated));                                               
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$data->report_id?></th>
                                <td><?=$r_date;?></td>
                                <td><?=$data->member_name;?></td>
                                <td><?=$data->report_bmi?></td>
                                <td><?=$data->report_body_fat?></td>                               
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