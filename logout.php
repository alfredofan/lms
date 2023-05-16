<!-- 
1.	Sign-up 
- Create a new Member user on the system
•	Member ID (system generated)
•	Member type (possible values Member or Admin, assigned by system, default Member)
•	First Name
•	Last Name
•	Email address (Member username)
•	Password
•	Re-type Password


Sign-up
All fields listed for the sign-up function are mandatory. All fields should be validated prior to submission and user creation including:
1.	First and last names contain valid alpha characters only.
2.	First and last names are no more than 20 characters in length.
3.	Email address is a validly formed email address
4.	Email address is not previously associated with Member or Admin user
5.	Passwords supplied match each other
6.	Passwords supplied meet the organizational guidelines for passwords.
Any errors are to be reported as errors so that corrections can be made. A new user is to be created as a member.

-->



<!--     Create Login form here and on success redirect user to the dashboard    -->
<section>
    <h1>Sign Up</h1>
    <form action="#" method="post">
        <label>First Name</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label>Last Name</label><br>
        <input type="text" id="pass" name="pass"><br><br>
        <label>Email address</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label>Password</label><br>
        <input type="text" id="pass" name="pass"><br><br>
        <label>Re-type Password</label><br>
        <input type="text" id="pass" name="pass"><br><br>

        <input type="submit">

    </form>

    <p>
        <br>
        Dont have an account? Register Today!
        <br>
        <a href="signup.php">Sign Up</a>
    </p>

</section>

<?php
include_once("src/inc/footer.inc.php");
?>