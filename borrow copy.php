<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
include_once("src/inc/session_checker.php");

?>


<?php
//get the book_id value from pressing button edit in any book from the browse.php page
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // query copare values from the table book column book_id that match with button edit data
    $query = "SELECT * FROM book WHERE book_id= $id";

    // query copare values from the table book_status column book_id that match with button edit data
    $query2 = "SELECT * FROM book_status WHERE book_id= $id";


    // connect to db and add query
    $result = mysqli_query($db, $query);
    //fetch data
    $row = mysqli_fetch_assoc($result);
    $book_title = $row['book_title'];
    $author    = $row['author'];
    $publisher   = $row['publisher'];
    $language   = $row['language'];
    $category  = $row['category'];
    $image     = $row['image'];

    // connect to db and add query
    $result2 = mysqli_query($db, $query2);
    //fatch data from book_status table
    $row2 = mysqli_fetch_assoc($result2);
    $user_id  = $row2['user_id'];
    $status = $row2['status'];
    $applied_date = $row2['applied_date'];




    // query copare values from the table user column user_id that match with button edit data
    $query3 = "SELECT * FROM user WHERE user_id= $user_id";

    // connect to db and add query
    $result3 = mysqli_query($db, $query3);
    //fatch data from book_status table
    $row3 = mysqli_fetch_assoc($result3);

    $firstname = $row3['firstname'];
    $lastname  = $row3['lastname'];
    $email     = $row3['email'];

    $typename  = $row3['typename'];
}


?>



<!-- populate fields dynamically with data fatched from db -->


<div class="container-sm d-flex justify-content-center" id="bookdetails" style="margin-top:25px">

    <div class="container-text aling-content-center" role="grid" aria-label="Text Grid">
        <div class=" col align-content-start" role="grid" aria-label="Text Grid">

            <div class="row d-flex flex-row container-text justify-content-center" role="row" style="width:fit-content">
                <div class="col-12 col-md-4 d-flex justify-content-center" role="gridcell" style="width:fit-content">
                    <?php
                    echo '<img src="img/' . $row['image'] . '" class="img-fluid p-2" id="bookcover" alt="book cover" style="width:max-content;">';
                    ?>
                </div>
                <div class="col-12 col-md-6 p-2" role="gridcell" style="width:fit-content"> <!--alternative for "flex row reverse" in this case would be "order-md-last" -->
                    <h2 class="d-flex flex-row align-items-center justify-content-start" style="font-size: clamp(22px, 3vw, 45px);">
                        <?php echo $row['book_title'] ?>
                    </h2>
                    <h7 class="card-subtitle mb-2 text-muted">Author &#8231; <?php echo $row['author'] ?></h7>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; <?php echo $row['publisher'] ?></small></p>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Language &#8231; <?php echo $row['language'] ?></small></p>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Category &#8231; <?php echo $row['category'] ?></small></p>
                    <!-- <p style="padding-top: 30px ;font-size: clamp(15px, 2vw, 22px); text-align:justify"> -->
                    <!-- space reserved for book synopsis -->
                    </p>

                    <?php

                    if ($row2["status"] == "Available") {

                    ?>
                        <p style="color:gray;"><small>
                                <?php
                                echo $row2["status"];
                                ?>
                            </small></p>


                    <?php
                    }
                    if ($row2["status"] == "Deleted") {

                    ?>
                        <p style="color:gray;"><small>
                                <?php
                                echo $row2["status"]; ?>
                            </small></p>


                    <?php
                    }
                    if ($row2['status'] == "On loan") {

                    ?>
                        <p style="color:firebrick;"><small>
                                <?php
                                echo $row2["status"]; ?>
                            </small></p>

                    <?php
                    }

                    ?>



                    <form class="col align-self-center" action="#" method="post" enctype="multipart/form-data" style="margin: 0px">
                        <p class="card-text">
                            <small>Would you like to borrow this book?</small>
                        </p>

                        <button type="submit" name="submit_status" class="btn btn-primary btn-sm" value="On loan">Confirm</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit_status'])) {
    //get the book_id value from pressing button edit in any book from the browse.php page
    $id = $_GET['edit'];



    if ($status != 'Available') {

?>

        <!--testing session variale -->
        <script type="text/javascript">
            alert("Book is not Available.");
            //reload page to get updated fields
            window.location = "browse.php";
        </script>

        <?php
    }





    if ($status == 'Available') {
        //set status to button value 
        $status = $_POST['submit_status'];
        // timestamp for new password submission
        $currentDate = new DateTime();  // output: string(19) "2022-10-09 18:39:16"
        $timestamp = $currentDate->format('Y-m-d H:i:s');
        // Calculate the interval between the password timestamp and the current date



        $currentDate2 = new DateTime();  // Create a new DateTime object with the current date and time
        $currentDate2->modify('+21 days');  // Add 21 days to the current date

        $date_return = $currentDate2->format('Y-m-d H:i:s');  // Format the future date as desired (e.g., 'Y-m-d')


        // $interval = $timestamp->diff($currentDate);
        // // Get the number of days from the interval

        // $dateCount = $interval->days;

        // $int_dateCount = (int)$dateCount;


        //query for table book_status
        $query1 = "UPDATE book_status SET `user_id`='$_SESSION[user_id]', `status`='$status', `applied_date`='$timestamp' WHERE book_id='$id';";

        //query for table book_transactions
        $query2 = "INSERT INTO 
        `book_transactions` (`book_id`, `book_title`, `image`, `status`, `date_borrowed`, `date_return`, `user_id`,`firstname` ,`lastname`,`typename`) 
        VALUES('$id', '$book_title','$image','$status','$timestamp','$date_return','$_SESSION[user_id]', '$firstname','$lastname', '$typename');";

        // `book_id`='$id', `book_title`='$book_title', `image`='$image' 
        // `status`='$status', `date_borrowed`='$timestamp', `date_return`='$date_return' 
        // `date_count`='?', `user_id`='$_SESSION[user_id]', `firstname`='$firstname' 
        // `lastname`='$lastname', `typename`='$typename' ;";

        if (mysqli_query($db, $query1) and mysqli_query($db, $query2)) {
        ?>

            <!--testing session variale -->
            <script type="text/javascript">
                alert("Book Borrowed Successfully.");
                //reload page to get updated fields
                window.location = "borrow.php?edit=<?php echo $row['book_id']; ?>";
            </script>

<?php
        }
    }
} else


?>




</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>