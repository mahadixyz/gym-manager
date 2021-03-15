<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    require_once "../../core/member.php";
    
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
    }
    else
    {
        header("Location:members.php");
    }

    $member = new Member;
    $result = $member->getProfileData($id);
    $data = $result[0]; 

    if ($data->member_status == 1) 
    {
        $status = "Active";
    }
    else if ($data->member_status == 2) 
    {
        $status = "Banned";
    }
    else
    {
        $status = "Pending";
    }


    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "View Member Profile";
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
<div class="container-fluid overflow-hidden mb-5 p-3">
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
                <h2 class="display-5">View Member Data</h2>

                <img src="../../_resources/images/<?=$data->member_photo?>" alt="" class="img-thumbnail d-flex mx-auto" style="max-height: 200px; max-width: 200px;">


                <p class="lead">
                    <strong>Name: </strong> <?=$data->member_name?>
                </p>

                <p class="lead">
                    <strong>Email: </strong> <?=$data->auth_email?>
                </p>

                <p class="lead">
                    <strong>Status: </strong> <?=$status?>
                </p>

                <p class="lead">
                    <strong>Package: </strong> <?=$data->member_package?>
                </p>

                <p class="lead">
                    <strong>Member Since: </strong> <?=$data->member_joined_at?>
                </p>

                <p class="lead">
                    <strong>Address: </strong> <?=$data->member_address?>
                </p>

                <p class="lead">
                    <strong>Mobile: </strong> <?=$data->member_mobile?>
                </p>

                <p class="lead">
                    <strong>Gender: </strong> <?=$data->member_gender?>
                </p>

                <p class="lead">
                    <strong>Date of Birth: </strong> <?=$data->member_dob?>
                </p>

            </div>
                  
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>