<?php
    require_once "../../core/autoload.php";
    require_once "../../core/dashboard.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../../signin.php");
    }

    $_SESSION['pageTitle'] = "Add new Member";
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

        <div class="col-md-9 mb-3">
            <div class="border px-5 py-3">
                <h2 class="display-5">Add new Member</h2>
                
                <form action="../process/be-add-user.php" method="POST">
                    <?php
                        if(isset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password']))
                        {
                            $prev_fullname = $_SESSION['fullname'];
                            $prev_email = $_SESSION['email'];
                            $prev_password = $_SESSION['password'];

                            unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password']);
                        }
                    ?>
                    <div class="mb-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-0" name="fullname" id="fullname" placeholder="Beth harmon" <?php if(isset($prev_fullname)){echo 'value="'.$prev_fullname.'"';} ?>>
                            <label for="fullname">Member Name</label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="beth@mahadi.xyz" <?php if(isset($prev_email)){echo 'value="'.$prev_email.'"';} ?>>
                            <label for="email">Email address</label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="********" <?php if(isset($prev_password)){echo 'value="'.$prev_password.'"';} ?>>
                            <label for="password">Password</label>
                        </div>
                    </div>                      

                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0" name="add-member">Add Member</button>
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