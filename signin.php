<?php
    require_once "inc/header.php";
?>

<div class="container">

    <div class="row mt-5">
        <div class="col-6 mx-auto text-center">
            <h2 class="display-5 text-primary">Sign In</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mx-auto p-2">
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
        </div><!-- col -->

    </div>
</div>

<?php
    require_once "inc/footer.php";
?>