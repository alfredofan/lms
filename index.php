<?php
include_once("src/inc/header.inc.php");

?>



<div class="container-lg d-inline-flex justify-content-center align-items-center">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1 class="text-left" style="font-size: clamp(33px, 4vw, 75px); font-weight: bold;"> Welcome to AF LMS Library
        </h1>


        <h2 style="font-size: clamp(22px, 2.5vw, 33px);"><br>There's a better way to read.</h2>

        <p class="text-left" style="font-size: clamp(12px, 1.25vw, 15px);">

            Select an option to get started with your reading.
        </p>

        <!-- <p><small>
                Select an option to get started with your reading.
                <br></small></p> -->

        <div class="d-flex gap-2 ">
            <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Log in</a>
            <a href="signup.php" class="btn btn-primary btn-sm" type="button">Sign up</a>
        </div>
        </p>


    </section>
</div>



</body>



<?php
include_once("src/inc/footer.inc.php");
?>