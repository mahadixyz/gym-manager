<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }
    
    $_SESSION['pageTitle'] = "View All Feedback";
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

                <h2 class="display-5 mb-4">All Feedback</h2>
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
                            <th scope="col">Sender</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $feedback = new Dashboard;
                            $result = $feedback->viewFeedback();

                            
                            if($result != false)
                            {
                                $counter = 1;
                                foreach($result as $data)
                                {                                   
                                    
                        ?>
                            <tr>
                                <th scope="row"><?=$counter?></th>
                                <td><?=$data->feedback_name?></td>
                                <td><?=$data->feedback_subject?></td>
                                <td><?=$data->feedback_mail?></td>
                                <td><?=$data->feedback_text?></td>                               
                            </tr>
                        <?php  
                                $counter++;                                                          
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