<?php
//Start a new session
session_start();


//Check the session start time is set or not
if (!isset($_SESSION['start'])) {
    //Set the session start time
    $_SESSION['start'] = time();
}

//Check the session is expired or not
if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 3600)) { //3600 is que equivalent of 2h in seconds.
    //Unset the session variables
    session_unset();
    //Destroy the session
    session_destroy();

    echo '<script>alert("Session is expired.")</script>'; //testing session
    header("location:index.php");
} else
    //echo '<script>alert("Current session exists.")</script>'; //testing session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/validation_logic.js"></script>
</head>


<!-- 
1.	Sign-up
2.	Log-in
3.	Browse and borrow a book (Members)
4.	Return or delete a book (Admin only)
5.	Edit book details (Admin only) 
6.	Log-out. 
-->

<body>

    <!--   the <a> element below closes navbar when clicking outside if collapsed   -->
    <a class="close-navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </a>

    <!--Navbar-->
    <nav class="sticky-top navbar navbar-expand-lg d-flex justify-content-center" aria-label="Main navigation" id="nav">

        <div class="container-xl d-flex justify-content-beetween">
            <a href="index.php">
                <img src="img/AF_LMS_logo.png" class="logo-center" alt="AF-LMS-logo">
                <!-- AF LMS Logo -->
            </a>


            <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="toggler-icon top-line"></span><!--lines from the humburger menu-->
                <span class="toggler-icon middle-line"></span>
                <span class="toggler-icon bottom-line"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-between" data-toggle="collapse" data-target=".nav-collapse" id="navbarSupportedContent">


                <a class="navbar-logo d-none d-md-block d-flex justify-content-start" href="index.php">
                    <img src="img/AF_LMS_logo.png" alt="AF-LMS-logo" class="logo-start">
                </a>


                <ul class="navbar-nav  mb-2 mb-lg-0" id="myMenu">
                    <!-- added a bit of margin to center navbar items better since the search box is "camuflated" -->

                    <li class="nav-item">
                        <a class="nav-link zone" href="browse.php">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link zone" href="index.html#section2">Return/Delete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link zone" href="index.html#section3">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link zone" href="admin_user_mngmt.php">Admin</a>
                    </li>

                </ul>

                <!--"d-flex was used to get the search box and icon inline"-->
                <ul class="navbar-nav  mb-2 mb-lg-0 d-flex gap-2 ">

                    <?php
                // if user is logged in there will be logout option only
                if (isset($_SESSION['login_user'])) {
                    //After successful login, session is used to retrieve details(id,email and etc.) from the table.
                    $result = mysqli_query($db, "SELECT * FROM `user`WHERE email='$_SESSION[login_user]'");
                    while ($row = mysqli_fetch_array($result)) {

                        $firstname = $row['firstname'];
                        //echo $row['firstname'];




                    }
                    ?>
                        <!-- Old logout and login session name -->
                        <!-- <li class="nav-item">
                            <a class="nav-link zone " href="dashboard.php" role="button">
                                <?php
                                //echo "Hello, " . $firstname;
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="logout.php" class="btn btn-primary btn-sm" type="button">Log out</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link zone dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, <?php echo $firstname; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item">
                                    <a class="nav-link zone mb-2 gap-2" href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link zone mb-2 gap-2" href="#">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="nav-item">
                                    <a href="logout.php" class="btn btn-primary btn-sm" type="button">Log out</a>
                                </li>
                            </ul>
                        </li>


                </ul>

            <?php



                    // if not user is not logged in there will be log in and sign in options
                } else {
            ?>

                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Log in</a>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Sign up</a>
                </ul>
            <?php
                }
            ?>
            <!--choosed to customise the bootstrap template for aesthatics-->



            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-outline-secondary btn-sm me-md-2" type="button">Log in</button>
                <button class="btn btn-primary btn-sm" type="button">Sign up</button>
            </div> -->

            </div>
        </div>


    </nav>



    <!-- 
1.	Sign-up
2.	Log-in
3.	Browse and borrow a book (Members)
4.	Return or delete a book (Admin only)
5.	Edit book details (Admin only) 
6.	Log-out. 
-->