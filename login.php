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
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
// start user session

?>

<div class="container-lg d-flex justify-content-center align-items-center" style="margin-top: 75px;">
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
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Submit</button>


        </form>

        <?php
        //checking for login credential / matching 
        if (isset($_POST['submit'])) {
            $count = 0;
            $result = mysqli_query($db, "SELECT * FROM `user`WHERE email='$_POST[username]' AND `password`='$_POST[password]';");
            $count = mysqli_num_rows($result);

            //if fail to login
            if ($count == 0) {

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
                        The user email and password do not match.
                    </div>
                </div>

                <?php

            } else {

                // successfull login

                $row = mysqli_fetch_array($result);


                // create session variale under username


                $_SESSION['login_user'] = $_POST['username']; //email

                $_SESSION['login_user_firstname'] = $row['firstname'];
                $_SESSION['login_user_lastname']  = $row['lastname'];

                $_SESSION['login_type']  = $row['typename'];
                $_SESSION['login_image'] = $row['image'];
                $_SESSION['user_id']     = $row['user_id'];
                $_SESSION['password_timestamp']     = $row['password_timestamp'];

                $password_timestamp = $_SESSION['password_timestamp'];
                $id = $_SESSION['user_id'];

                // Login time is stored in a session variable
                $_SESSION['start'] = time(); // Taking now logged in time.


                //capturing todays date TEST
                // $date = new DateTime(''); // output: string(19) "2022-10-09 18:39:16"
                // $timestamp = $date->format('Y-m-d H:i:s');

                // if ($timestamp) {
                //     echo $timestamp;
                // } else { // format failed
                //     echo "Unknown Time";
                // }


                // checking when last time password was modified / calculate date count
                // Prepare the query
                // Get the current date
                $currentDate = new DateTime();

                // Convert the password timestamp to a DateTime object
                $passwordTimestamp = new DateTime($password_timestamp);

                // Calculate the interval between the password timestamp and the current date
                $interval = $passwordTimestamp->diff($currentDate);

                // Get the number of days from the interval
                $dateCount = $interval->days;

                $int_dateCount = (int)$dateCount;

                echo "Date Count: " . $dateCount;
                echo "Date Count: " . $int_dateCount;

                // Output the date count to meet gelos password policy criteria of 120 days
                if ($int_dateCount >= 120) {
                ?>

                    <script type="text/javascript">
                        alert('<?php

                                echo "Password Update Reminder: It is time to update your password. ";
                                //echo "Date Count: " . $int_dateCount;

                                ?>');
                    </script>

                <?php
                }










                // echo '<script>alert( 



                // )';


                header("location:index.php");


                ?>
                <script type="text/javascript">
                    window.location = "browse.php"
                </script>

        <?php
            }
        }


        ?>


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