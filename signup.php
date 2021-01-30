<?php
    require_once "core/autoload.php";
    if (isset($_SESSION['user_id'])) 
    {
        header("Location: backend/dashboard.php");
    }
    $_SESSION['pageTitle'] = "Sign Up for a new Account | CRM";
    require_once "inc/header.php";
    require_once "inc/nav.php";
?>

<div class="container">

    <div class="row mt-5 mb-4">
        <div class="col-6 mx-auto pt-5 text-center">
            <h2 class="display-5 text-primary">Sign Up for an account</h2>
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
            <img src="_resources/images/register.png" alt="" class="img-fluid w-50">
        </div>     

        <div class="col-md-6 col-sm-12 p-2">
            <form action="process/signup.php" method="POST">
            <?php
                if(isset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password'], $_SESSION['cPassword']))
                {
                    $prev_fullname = $_SESSION['fullname'];
                    $prev_email = $_SESSION['email'];
                    $prev_password = $_SESSION['password'];
                    $prev_cPassword = $_SESSION['cPassword'];

                    unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['password'], $_SESSION['cPassword']);
                }
            ?>
                <div class="mb-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0" name="fullname" id="fullname" placeholder="Beth harmon" <?php if(isset($prev_fullname)){echo 'value="'.$prev_fullname.'"';} ?>>
                        <label for="fullname">Your Name</label>
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
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-0" name="cPassword" id="cPassword" placeholder="********" <?php if(isset($prev_cPassword)){echo 'value="'.$prev_cPassword.'"';} ?>>
                        <label for="cPassword">Confirm Password</label>
                    </div>
                    <?php 
                        if(isset($_SESSION['pwErr']))
                        {
                            echo "<span class='text-danger'>". $_SESSION['pwErr'] . "</span>";
                            unset($_SESSION['pwErr']);
                        } 
                        else
                        {
                            echo "<span class='text-danger'>&nbsp;</span>";
                        }
                    ?>
                </div>  

                <div>
                    <div class="form-floating">                        
                        <input type="text" class="form-control rounded-0" name="captcha" id="captcha" placeholder="captcha" >
                        <label for="captcha">Enter the code shown Below</label>
                    </div>

                    <?php 
                        if(isset($_SESSION['captchaErr']))
                        {
                            echo "<span class='text-danger'>". $_SESSION['captchaErr'] . "</span>";
                            unset($_SESSION['captchaErr']);
                        } 
                        else
                        {
                            echo "<span class='text-danger'>&nbsp;</span>";
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <img src="_resources/images/captcha.php" alt="">
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary btn-lg rounded-0" name="signup">Sign up</button>
                    <button type="reset" class="btn btn-danger btn-lg rounded-0">Clear</button>
                </div>
                
                <div class="mb-3">
                    Already have an account? <a href="signin.php">Sign in</a>
                </div>
                <div class="clearfix"></div>
            </form>

        </div><!-- col -->

    </div> <!--row-->

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