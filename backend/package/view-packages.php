<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }
    
    $_SESSION['pageTitle'] = "View All Packages";
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

                <div class="row">
                    <div class="col-9">
                        <h2 class="display-5 mb-4">All Packages</h2>
                    </div>
                    <div class="col-3 text-right p-2">
                        <a class="btn btn-primary rounded-0" href="add-package.php"><i class="me-2" data-feather="plus"></i> Add Package</a>
                    </div>
                </div>

                
                <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
                ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success py3">
                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </div>
                    </div>                        
                </div>
                <?php
                    }
                ?>
                <div class="row g-4">
                <?php 
                    
                    $packages = new Dashboard;
                    $result = $packages->viewPackages();

                    if($result != false)
                    {
                        foreach($result as $data)
                        {
                            $fee = "<span class='bdt'>&#2547; </span>".number_format($data->package_fee, 2); 
                                
                ?>
                            
                            <div class="col-4">
                                <div class="card rounded-0 border border-info">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$data->package_name?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?=$data->package_created?></h6>
                                        <p class="card-text"><?=substr(strip_tags($data->package_details), 0, 100)?></p>
                                        <p class="card-text"><strong>Fee:</strong> <?=$fee?></p>
                                        <a href="#" class="btn btn-primary rounded-0">View Details</a>
                                        
                                    </div>
                                </div>
                            </div>                        
                            
                <?php
                        }
                    }
                    else
                    {
                ?>
                            <div class="alert alert-danger rounded-0 py3">
                                No Data Found!
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