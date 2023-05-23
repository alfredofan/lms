<?php
include_once("src/inc/header.inc.php");

?>



<div class="container-lg d-inline-flex justify-content-center align-items-center">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1 class="text-left" style="font-size: clamp(33px, 4vw, 75px); font-weight: bold;"> Welcome to AF LMS Library
        </h1>


        <h2 style="font-size: clamp(22px, 2.5vw, 33px);"><br>There's a better way to read.</h2>



        <!-- <p><small>
                Select an option to get started with your reading.
                <br></small></p> -->


        <?php
        // if user is logged in there will be logout option only
        if (isset($_SESSION['login_user'])) {
        ?>

            <div class="d-flex gap-2 ">

                <?php

                ?>
            <?php

            // if not user is not logged in there will be log in and sign in options

        } else {
            ?>
                <p class="text-left" style="font-size: clamp(12px, 1.25vw, 15px);">

                    Select an option to get started with your reading.
                </p>
                <div class="d-flex gap-2 ">
                    <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Log in</a>
                    <a href="signup.php" class="btn btn-primary btn-sm" type="button">Sign up</a>
                <?php
            }
                ?>
                </div>
            </div>

</div>
</p>


</section>
</div>



</body>



<?php
include_once("src/inc/footer.inc.php");
?>