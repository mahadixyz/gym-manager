<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }
    
    $_SESSION['pageTitle'] = "View All Notice";
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

                <h2 class="display-5 mb-4">All Notice</h2>
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
                            <th scope="col">For</th>
                            <th scope="col">Title</th>
                            <th scope="col">Notice</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $notice = new Dashboard;
                            $result = $notice->viewNotice();

                            
                            if($result != false)
                            {
                                foreach($result as $data)
                                { 
                                    if($data->notice_for == 0)
                                    {
                                        $for = "Everyone";
                                    }
                                    else
                                    {
                                        $for = $data->member_name;
                                    }                                    
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$data->notice_id?></th>
                                <td><?=$for?></td>
                                <td><?=$data->notice_title?></td>
                                <td><?=$data->notice_body?></td>                               
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