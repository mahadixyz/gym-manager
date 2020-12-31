<?php
    require_once "core/autoload.php";
    require_once "inc/header.php";
?>

<div class="container">

    <div class="row mt-5">
        <div class="col-6 mx-auto text-center">
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
                <?=$_SESSION['success'];?>
            </div>
            <?php
                }
                else if(isset($_SESSION['err']) && $_SESSION['err'] != '')
                {
            ?>
            <div class="alert alert-warning py3">
                <?=$_SESSION['err'];?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mx-auto p-2">
            <form action="process/signup.php" method="POST">
                <div class="mb-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0" name="fullname" id="fullname" placeholder="Beth harmon">
                        <label for="fullname">Your Name</label>
                    </div>
                </div>

                <div class="mb-2">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="beth@mahadi.xyz">
                        <label for="email">Email address</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="********">
                        <label for="password">Password</label>
                    </div>
                </div> 

                <div class="mb-2">
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-0" name="cPassword" id="cPassword" placeholder="********">
                        <label for="cPassword">Confirm Password</label>
                    </div>
                    <?php 
                        if(isset($_SESSION['pwErr']))
                        {
                            echo "<span class='text-danger'>". $_SESSION['pwErr'] . "</span>";
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

    </div>
</div>

<?php
    session_destroy();
    require_once "inc/footer.php";
?>