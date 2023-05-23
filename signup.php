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

Gelos Password policy
Default passwords for new accounts will be set to ‘Temp’ + the user’s staff number provided 
by the Human Resources Department (e.g. Temp131455). Users will be required to change 
this password the first time they logon.
When changing a password, all passwords are required to meet Microsoft complexity 
standards:
• Minimum of eight characters
• Contains characters from three of the following categories:
o Uppercase letters (A through Z)
o Lowercase letters (A through Z)
o Numbers (0 through 9)
o Non-alphanumeric characters (~!@#$%^&*_-+=`|\(){}[]:;"'<>,.?/)

THE BELOW WAS NOT IMPLEMENTED YET

Users will also be required to change their passwords every 120 days.
If a user account needs to be recreated, a password meeting the required complexity 
standards will be created and forwarded directly to the account holder.



-->

<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>

<div class="container-lg d-flex justify-content-center align-items-center" style="margin-top:75px">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1>Sign Up</h1><br><br>

        <form class="col align-self-center" name="signup" action="#" method="post">
            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="firstname" class="form-label">First Name</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="firstname" name="firstname" aria-label="First name" maxlength="20" pattern="[a-zA-Z]+" required title="This field allows only letters, space, and dots for upper and lower case letters." oninvalid="this.setCustomValidity('Enter the complete details')" oninput="setCustomValidity('')">
                        <!-- onivalid and oniput were used to change the default message for empty field submission atempt -->

                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-label="Last name" maxlength="20" pattern="[a-zA-Z]+" required title="This field allows only letters, space, and dots for upper and lower case letters." oninvalid="this.setCustomValidity('Enter the complete details')" oninput="setCustomValidity('')">

                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="col-sm-12">
                    <!-- Type "email" was working fine but in order to meet validation criteria on assessment, type "text" and pattern were added.   -->
                    <input type="text" class="form-control" id="email" name="email" aria-label="Email" minlength="3" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="This field must have a valid email address." oninvalid="this.setCustomValidity('This field must have a valid email address.')" oninput="setCustomValidity('')">


                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
            </div>
            <!-- Password must meet gelos password policy containing at least one special character, one number, one uppercase and lowercase letter, and at least 8 or more characters -->
            <div class="row mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="password" name="password" minlength="8" pattern="((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least one number and one special character, one number, one uppercase and lowercase letter, and at least 8 or more characters" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
            </div>

            <!-- Matching fields "password" and "confirm password"  for verification -->
            <script>
                var password = document.getElementById("password"),
                    confirm_password = document.getElementById("confirm_password");

                function validatePassword() {
                    if (password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                }

                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>

            <!-- Sign up allow only normal user "member" -->
            <input style="display: none;" type="text" name="typename" value="User">
            <input style="display: none;" type="number" name="type" value="2">
            <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Submit</button>


        </form>

        <?php
        // check if email already exist in the database  


        // triggers uppon pressing submit button
        if (isset($_POST['submit'])) {

            //check duplicates for email 
            $count = 0;
            $sql = "SELECT email FROM user";
            $result = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['email'] == $_POST['email']) {
                    $count = $count + 1;
                }
            }
            if ($count == 0) {

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


                <!-- alert message window-->
                <!-- <script type="text/javascript">
            alert("The user email and password do not match.");
        </script> -->

                <!-- alert message-->
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <div class=" d-flex align-items-center" role="alert" style="padding:10px">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Email is already registered.
                    </div>
                </div>

        <?php


            }
        }
        ?>


        <p>
            <br><br>
            Already have an account?
            <br>
            <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Log in</a>
        </p>


    </section>
</div>


<?php

/*
if (isset($_POST['submit'])) {

    //check duplicates for email 
    $count = 0;
    $sql = "SELECT email FROM user";
    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == $_POST['email']) {
            $count = $count + 1;
        }
    }
    if ($count == 0) {

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
}*/
?>


</body>

<?php
include_once("src/inc/footer.inc.php");
?>