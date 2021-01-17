<?php
    require_once "../../core/autoload.php";
    require_once "../../core/member.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Update Profile";
    require_once "../inc/be-header.php";
    
    if(isset( $_SESSION['role']) &&  $_SESSION['role'] == 'admin' )
    {
      require_once "../inc/be-nav-admin.php";
    }
    else
    {
      require_once "../inc/be-nav-user.php";
    }

    $user = new Member;
    $result = $user->getProfileData($_SESSION['user_id']);  

    if($result != false)
    {
        foreach($result as $data)
        {
            $name = $data->member_name;
            $dob = ($data->member_dob)?date("Y-m-d", strtotime($data->member_dob)):null;
            $gender = ($data->member_gender)?$data->member_gender:null;
            $address = ($data->member_address)?$data->member_address:null;
            $mobile = ($data->member_mobile)?$data->member_mobile:null;
            $email = ($data->auth_email)?$data->auth_email:null;
            $joined_at = date("d M, Y", strtotime($data->member_joined_at)); 
            $pic = $data->member_photo;    
        }
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
                <h2 class="display-5">Update Profile</h2>

                <div class="my-2 w-75 mx-auto text-center">
                    <?php
                        if(isset($pic))
                        {
                            echo '<img src="../../_resources/images/'.$pic.'" alt="" class="img-thumbnail img-fluid w-25">';
                        }
                        else
                        {
                            echo '<img src="../../_resources/images/default.jpg" alt="" class="img-thumbnail img-fluid w-25">';
                        }
                    ?>
                    
                    <h2 class="h2 text-primary my-2"><?=$name?></h2>
                    <p class="lead"><strong>Member Since:</strong> <span class="muted"><?=$joined_at?></span></p>
                </div>

                <div class="border my-2 p-5">

                    <form action="../process/be-user-update.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" id="email" value="<?=$email?>" disabled>
                            <label for="email">Email address</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" id="contact" name="contact" placeholder="Contact No" <?php if($mobile!=null){echo 'value="'.$mobile.'"';}?>>
                            <label for="contact">Contact No</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>                         

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($gender == "male"){echo 'checked';}?>>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if($gender == "female"){echo 'checked';}?>>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="gender" id="other" value="others" <?php if($gender == "others"){echo 'checked';}?>>
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                            </div>
                            
                        </div>  

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control rounded-0" id="dob" name="dob" placeholder="Date of birth" <?php if($dob!=null){echo 'value="'.$dob.'"';}?>>
                            <label for="dob">Date of birth</label>
                        </div> 

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile Picture: </label>
                            <input class="form-control rounded-0" type="file" id="picture" name="picture">
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control rounded-0" style="height: 100px" id="address" name="address" placeholder="Address"><?php if($address!=null){echo $address;}?></textarea>
                            <label for="address">Address</label>
                        </div>                     

                        
                        <button type="submit" name="update-user-form" class="btn btn-success rounded-0">Update</button>
                        <button type="reset" class="btn btn-dark rounded-0">Clear</button>

                    </form>
                </div>

            </div>            
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>