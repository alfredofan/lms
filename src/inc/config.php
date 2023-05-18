<!-- configure database -->

<?php
//connecting to database table user
$db = mysqli_connect("localhost", "root", "", "lms"); // server name, username, password, database name 


//messsage to test connection
if (!$db) {
    die("Connection Failed: " . mysqli_connect_error());
}

// echo "Connected Successfully.";
// echo '<script>alert("Connected Successfully.")</script>'; //testing conection
?>