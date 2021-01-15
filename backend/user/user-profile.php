<?php
    require_once "../core/autoload.php";
    require_once "../core/member.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once "inc/header.php";
    require_once "inc/nav.php";

    $user = new Member;
    $result = $user->getProfileData($_SESSION['user_id']);  

    if($result != false)
    {
        foreach($result as $data)
        {
            $name = $data->member_name;
            $joined_at = date("d M, Y", strtotime($data->member_joined_at));
            $dob = ($data->member_dob)?$data->member_dob:"Not Set";
            $gender = ($data->member_gender)?$data->member_gender:"Not Set";
            $address = ($data->member_address)?$data->member_address:"Not Set";
            $mobile = ($data->member_mobile)?$data->member_mobile:"Not Set";
            $email = ($data->auth_email)?$data->auth_email:"Not Set";
            $status = ($data->member_status)?'<span class="badge bg-success"><i data-feather="check"></i>verified</span>':'<span class="badge bg-danger"><i data-feather="info"></i>pending</span>';            
            $pic = $data->member_photo;  
        }
    }

?>

<div class="container-fluid overflow-hidden">
    <div class="row gx-2 mt-3">
    <?php
        if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
        {
          require_once "inc/sidenav-admin.php";
        }
        else
        {
          require_once "inc/sidenav-user.php";
        }
    ?>

        <div class="col-md-9">
           
            <?php                
                if(isset($_SESSION['err']) && $_SESSION['err'] != '')
                {
            ?>
            <div class="alert alert-warning py3">
                <?php
                    echo $_SESSION['err'];
                    unset($_SESSION['err']);
                ?>
            </div>
            <?php
                }
            ?>

            <div class="border p-4">
                <h2 class="display-5">My Profile</h2>

                <div class="my-2 w-75 mx-auto text-center">
                
                    <?php
                        if(isset($pic))
                        {
                            echo '<img src="../_resources/images/'.$pic.'" alt="" class="img-thumbnail img-fluid w-25">';
                        }
                        else
                        {
                            echo '<img src="../_resources/images/default.jpg" alt="" class="img-thumbnail img-fluid w-25">';
                        }
                    ?>                    
                    
                    <h2 class="h2 text-primary my-2"><?=$name?></h2>
                    <p class="lead"><strong>Member Since:</strong> <span class="muted"><?=$joined_at?></span></p>
                </div>

                <div class="border my-2 p-5">
                    <p class="lead"><strong>Account Email</strong>: <?=$email." ".$status?></p>
                    <p class="lead"><strong>Date of Birth</strong>: <?=$dob?></p>
                    <p class="lead"><strong>Gender</strong>: <?=$gender?></p>
                    <p class="lead"><strong>Contact No</strong>: <?=$mobile?></p>
                    <p class="lead"><strong>Address</strong>: <?=$address?></p>

                    <a href="user-update-profile.php" class="btn btn-primary rounded-0">Update Profile</a>
                </div>

            </div>            
        </div>
    </div>
</div>
</body>

</html>
<?php
    require_once "inc/footer.php";
?>