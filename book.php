<!--     Create Login form here and on success redirect user to the dashboard    -->

<!--
    Login
    
    Authenticate member or admin login credentials
    and login user into library management system 
    
    •	Email address (Member username)
    •	Password

System is to utilize a single sign-on location for all users (members and admins). Logged in sessions shall last no more than 2 hours.

-->
<section>
    <h1>Login</h1>
    <form action="#" method="post">
        <label>Username</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label>Password</label><br>
        <input type="text" id="pass" name="pass"><br><br>

        <input type="submit">

    </form>

    <p>
        <br>
        Dont have an account? Register Today!
        <br>
        <a href="signup.php">Sign p</a>
    </p>

</section>

<?php
include_once("footer.inc.php");
?>