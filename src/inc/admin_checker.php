<!-- check if user is logged in -->

<?php

if ($_SESSION['login_type'] != 'Administrator') {

    echo '<script>alert("Access Denied: Insufficient Privileges"); window.location = "dashboard.php";</script>'; //checking user type 
    !header("location:index.php");

?>
    <!-- <script type="text/javascript">
        window.location = "index.php"
    </script> -->
<?php


} else


?>