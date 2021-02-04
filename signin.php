<?php
    require_once "core/autoload.php";
    if (isset($_SESSION['user_id'])) 
    {
        header("Location: backend/main/dashboard.php");
    }
    $_SESSION['pageTitle'] = "Sign In | CRM";
    require_once "inc/header.php";
    require_once "inc/nav.php";
?>

<div class="container">

    <div class="row mt-5 mb-4">
        <div class="col-6 pt-5 mx-auto text-center">
            <h2 class="display-5 text-primary">Sign In</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mx-auto">
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
                else if(isset($_SESSION['error']) && $_SESSION['error'] != '')
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
        </div>
    </div>


    <div class="row">   
        <div class="col-md-6 col-sm-12 p-2">            
            <img src="_resources/images/signin.png" alt="" class="img-fluid w-50">
        </div>     

        <div class="col-md-6 col-sm-12 p-2">

            <form action="process/signin.php" method="POST">
            <?php
                if(isset($_SESSION['email'], $_SESSION['pass']))
                {
                    $prev_email = $_SESSION['email'];
                    $prev_pass = $_SESSION['pass'];
                    unset($_SESSION['email'], $_SESSION['pass']);
                }
            ?>

                <div class="mb-2">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="beth@mahadi.xyz" <?php if(isset($prev_email)){echo 'value="'.$prev_email.'"';}?>>
                        <label for="email">Email address</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="********" <?php if(isset($prev_pass)){echo 'value="'.$prev_pass.'"';}?>>
                        <label for="password">Password</label>
                    </div>
                </div>            

                <div class="mb-3 float-end">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="clearfix"></div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary btn-lg rounded-0" name="signin">Sign in</button>
                    <button type="reset" class="btn btn-danger btn-lg rounded-0">Clear</button>
                </div>

                <div class="mb-3">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </div>

            </form>

        </div><!-- col -->

    </div> <!-- Row -->

    <!-- row -->
    <div class="container">
        <div class="row my-3">
            <div class="col-12 p-3">
                <p class="fs-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta similique doloribus explicabo dolorem itaque omnis molestias ducimus perferendis odio sed quia, laboriosam eveniet dignissimos, alias doloremque. Dignissimos cumque modi itaque, provident reprehenderit facilis rem iste assumenda similique eveniet delectus dolorem? Ab, veniam distinctio maiores asperiores ipsa sunt dolorum vitae repellat.
                </p>
            </div>
        </div>
    </div>
    <!-- row Ends -->


</div>

<?php
    require_once "inc/footer.php";
?>