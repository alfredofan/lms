<!--     Create Login form here and on success redirect user to the dashboard    -->

<!--
    Login
    
    Authenticate member or admin login credentials
    and login user into library management system 
    
    •	Email address (Member username)
    •	Password

System is to utilize a single sign-on location for all users (members and admins). Logged in sessions shall last no more than 2 hours.

-->
<?php
include_once("src/inc/header.inc.php");
?>

<div class="container-sm d-flex justify-content-center" style="margin-top: 50px;">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1>Log in</h1><br><br>
        <form class="col align-self-center" action="#" method="post">

            <div class="row mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="username" name="username">
                    <div id="emailHelp" class="form-text">Use your email address to log in.</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="pass" class="form-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

        <p>
            <br><br>
            Dont have an account? Register Today!
            <br>
            <a href="signup.php" class="btn btn-primary btn-sm" type="button">Sign up</a>
        </p>


    </section>
</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>