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

    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Update Member data";
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

            <div class="border p-4">
                <h2 class="display-5">Upadate Member Data</h2>
                <form action="../process/be-update-user.php" method="POST">

                    <div class="mb-2">
                        <label for="package" class="form-label">Select Package</label>
                        <select class="form-select rounded-0" id="package" name="package">
                            
                            <option value="Silver" <?php if(isset($data->member_package) && $data->member_package == "Silver" ){echo 'selected';} ?> >Silver</option>
                            <option value="Gold" <?php if(isset($data->member_package) && $data->member_package == "Gold" ){echo 'selected';} ?> >Gold</option>
                            <option value="Platinum" <?php if(isset($data->member_package) && $data->member_package == "Platinum" ){echo 'selected';} ?> >Platinum</option>
                           
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" name="fullname" id="fullname" placeholder="Beth harmon" <?php if(isset($data->member_name)){echo 'value="'.$data->member_name.'"';} ?>>
                            <label for="fullname">Member Name</label>
                        </div>
                    </div>    

                    <div class="mb-2">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="beth@mahadi.xyz" <?php if(isset($data->auth_email)){echo 'value="'.$data->auth_email.'"';} ?>>
                            <label for="email">Email address</label>
                        </div>
                    </div>    

                    <div class="mb-2">
                        <label for="status" class="form-label">Select Status</label>
                        <select class="form-select rounded-0" id="status" name="status">
                            <option value="0" <?php if(isset($data->member_status) && $data->member_status == "0" ){echo 'selected';} ?> >Pending</option>
                            <option value="1" <?php if(isset($data->member_status) && $data->member_status == "1" ){echo 'selected';} ?> >Active</option>
                            <option value="2" <?php if(isset($data->member_status) && $data->member_status == "2" ){echo 'selected';} ?> >Banned</option>
                        </select>
                    </div>                  

                    <div class="mb-2">
                        <input type="hidden" name="mem_id" value="<?=$data->member_user_id?>">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0" name="update-member">Update Member</button>
                        <button type="reset" class="btn btn-danger btn-lg rounded-0">Clear</button>
                    </div>                    
                   
                    <div class="clearfix"></div>
                </form>
            </div>  
            
        </div>
    </div>
</div>

<?php
    require_once "../inc/be-footer.php";
?>