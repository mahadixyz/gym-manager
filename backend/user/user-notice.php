<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
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
                <h2 class="display-5">My Notice</h2>
                
                <div class="row">                    
                        <?php
                            $user = new Dashboard;
                            $result = $user->viewUserNotice($_SESSION['user_id']);  

                            if($result != false)
                            {
                                foreach($result as $data)
                                {
                                    if ($data->notice_for == 0)
                                    {
                                        $concern = '<span class="text-primary">General Notice</span>';
                                    }
                                    else
                                    {
                                        $concern = '<span class="text-success">My Notice</span>';
                                    }
                        ?>
                        <div class="col-md-6 col-sm-12 p-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <span class="text-danger">#<?=$data->notice_id?></span> | 
                                        <span class="text-primary"><?=$data->notice_title?></span>
                                    </h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Notice Issued: <?= date("d M, Y", strtotime($data->notice_issued_at))?> </h6>
                                    <p class="card-text">
                                        <?=$data->notice_body?>
                                    </p>
                                    <p class="mb-1">    
                                        <?=$concern?>
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
                                    <h5 class="card-title">Notice Not Found</h5>                               
                                    <p class="card-text">
                                        <p class="lead text-danger">
                                            Sorry! No Notice Found!
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