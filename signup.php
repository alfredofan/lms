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

<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>

<div class="container-lg d-flex justify-content-center align-items-center">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1>Sign Up</h1><br><br>
        <!-- named as signup to -->
        <form class="col align-self-center" name="signup" action="#" method="post">
            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="firstname" class="form-label">First Name</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="firstname" name="firstname" aria-label="First name">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-label="Last name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="email" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="pass" class="form-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="retypePass" class="form-label">Confirm Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="retypePass" name="retypePass">
                </div>
            </div>
            <!-- normal user -->
            <input style="display: none;" type="text" name="typename" value="User">
            <input style="display: none;" type="number" name="type" value="2">
            <input type="submit" name="submit" class="btn btn-primary btn-sm">


            <?php


            if (isset($_POST['submit'])) {

                //check duplicates for email 
                $count = 0;
                $sql = "SELECT email FROM `user`";
                $res = mysqli_query($db, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['email'] == $_POST['email']) {
                        $count = $count + 1;
                    }
                }
                if ($count = 0)

                    //if no duplicates found, user can register
                    mysqli_query($db, "INSERT INTO `USER` (`firstname`, `lastname`, `email`, `password`, `typename`, `type`) 
                 VALUES('$_POST[firstname]', '$_POST[lastname]','$_POST[email]','$_POST[password]',
                 '$_POST[typename]','$_POST[type]');");
            ?>
                <script type="text/javascript">
                    alert("Registration Successfull");
                </script>
            <?php
            }
            // if duplicate is found
            else {
            ?>
                <script type="text/javascript">
                    alert("The email already exist.");
                </script>
            <?php
            }

            ?>


        </form>

        <p>
            <br><br>
            Already have an account?
            <br>
            <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Log in</a>
        </p>


    </section>
</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>