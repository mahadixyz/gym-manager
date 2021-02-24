<?php
    require_once "../../core/autoload.php";
    require_once "../../core/member.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Health Report";
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
                <h2 class="display-5">Health Report</h2>
                
                <div class="row">                    
                        <?php
                            $user = new Member;
                            $result = $user->getHealthReport($_SESSION['user_id']);  

                            if($result != false)
                            {
                                foreach($result as $data)
                                {
                        ?>
                        <div class="col-md-4 col-sm-12 p-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Report Id: #<?=$data->report_id?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Report generated: <?= date("d M, Y", strtotime($data->report_generated))?> </h6>
                                    <p class="card-text">
                                        <strong>Height:</strong> <?=$data->report_height?>m <br>
                                        <strong>Weight:</strong> <?=$data->report_weight?>Kilogram <br>
                                        <strong>Waist:</strong> <?=$data->report_waist?>Centimeter <br>
                                        <strong>BMI:</strong> <span class="text-success"><?=$data->report_bmi?></span> <br>
                                        <strong>Body Fat:</strong> <span class="text-danger"><?=$data->report_body_fat?></span>% <br>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php  
                                }
                            }
                            else
                            {
                        ?>
                        <div class="col-12 p-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Report Not Found</h5>                               
                                    <p class="card-text">
                                        <p class="lead text-danger">
                                            Sorry! No report Found!
                                        </p>
                                    </p>
                                </div>
                            </div>
                                
                        </div>
                        <?php
                            }
                        ?>

                </div>

            </div>            
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>