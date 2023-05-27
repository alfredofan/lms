<!-- check if user is logged in -->

<?php

if (is_null($_SESSION['login_user'])) {
    //Unset the session variables
    session_unset();
    //Destroy the session
    session_destroy();
    echo '<script>alert("Please Log in to procede."); window.location = "index.php";</script>'; //testing session
    !header("location:index.php");

?>
    <!-- <script type="text/javascript">
        window.location = "index.php"
    </script> -->
<?php


} else


?>