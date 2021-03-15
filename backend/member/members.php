<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "View All Members";
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
                if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                {
            ?>
            <div class="alert alert-success py-3 m-2">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php
                }                    
            ?>

            <div class="border p-4">
                <h2 class="display-5">Dashboard</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $member = new Dashboard;
                            $result = $member->viewMembers($page);
                            $totalPage = $member->totalPage();
                            if($result != false)
                            {
                                foreach($result as $data)
                                {        
                                    extract($data);
                                    if($member_status == 0)
                                    {
                                        $status = '<span class="text-warning"><strong>Pending</strong></span>';
                                    }
                                    else if($member_status == 1)
                                    {
                                        $status = '<span class="text-success"><strong>Active</strong></span>';
                                    }
                                    else
                                    {
                                        $status = '<span class="text-danger"><strong>Banned</strong></span>';
                                    }
                        ?>
                            <tr>
                                <th scope="row"><?=$member_id?></th>
                                <td><?=$member_name?></td>
                                <td><?=$auth_email?></td>
                                <td><?=$status?></td>
                                <td>
                                    <a href="view-member.php?id=<?=$member_user_id?>" class="text-primary me-2"> <span data-feather="eye"></span></a>
                                    <a href="update-member.php?id=<?=$member_user_id?>" class="text-success"> <span data-feather="edit"></span></a>
                                </td>
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
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; }?>">
                            <a class="page-link" href="members.php?page=<?=$page-1?>">Previous</a>
                        </li>
                        <?php
                            for($i = 1; $i <= $totalPage; $i++)
                            {
                                ?>
                                <li class="page-item <?php if($i == $page){echo 'active';}?>"> 
                                    <a class="page-link" href="members.php?page=<?=$i?>"><?=$i?></a>
                                </li>
                                <?php
                            }
                        ?>
                       

                        <li class="page-item <?php if($page >= $totalPage){ echo 'disabled'; } ?>"> 
                            <a class="page-link" href="members.php?page=<?=$page+1?>">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>            
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>