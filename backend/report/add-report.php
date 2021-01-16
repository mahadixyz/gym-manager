<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    if (isset( $_SESSION['role']) &&  $_SESSION['role'] != 'admin') 
    {
        header("Location: ../main/dashboard.php");
    }
    require_once "../inc/be-header.php";
    require_once "../inc/be-nav.php";

    $notice = new Dashboard;
    $result = $notice->getMember();    

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
                <h2 class="display-5">Add Fitness Report</h2>

                <form action="../process/be-report.php" method="POST">

                    <div class="mb-3">
                        <label for="reportOf" class="form-label">Report of</label>
                        <select class="form-select rounded-0" id="reportOf" name="reportOf">
                            
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

                    <div class="mb-3">
                        <label for="height" class="form-label">Height (In Centimeter)</label>
                        <input type="number" step="0.01" class="form-control rounded-0" id="height" name="height">                        
                    </div>

                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (In Kilograms)</label>
                        <input type="number" step="0.01" class="form-control rounded-0" id="weight" name="weight">                        
                    </div>

                    <div class="mb-3">
                        <label for="waist" class="form-label">Waist (In Centimeter)</label>
                        <input type="number" step="0.01" class="form-control rounded-0" id="waist" name="waist">                        
                    </div>

                    
                    <button type="submit" name="report-form" class="btn btn-primary rounded-0">Submit</button>

                </form>

            </div>            
        </div>
    </div>
</div>


<?php
    require_once "../inc/be-footer.php";
?>