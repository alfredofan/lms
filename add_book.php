<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
include_once("src/inc/session_checker.php");
include_once("src/inc/admin_checker.php");

?>

<div class="container-lg d-flex justify-content-center align-items-center" style="margin-top:75px">
    <!--     Create Login form here and on success redirect user to the dashboard    -->
    <section class="container-form col bd-content ps-lg-2">

        <h1>Add Book</h1><br><br>

        <form class="col align-self-center" action="#" method="post" enctype="multipart/form-data">

            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="booktile" class="form-label">Book Cover</label>
                    <div class="col-12">
                        <input type="file" class="form-control" id="image" name="image" aria-label="Book cover">
                    </div>
                </div>
            </div>
            <?php
            // if (isset($_FILES['image'])) {
            //     move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $_FILES['image']['name']);
            // } else {
            //     echo "image not found!";
            // }

            ?>
            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="booktile" class="form-label">Book Title</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="book_title" name="book_title" aria-label="Book title">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="author" class="form-label">Author</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="author" name="author" aria-label="Author">

                </div>
            </div>

            <div class="row mb-3">
                <label for="pulisher" class="form-label">Publisher</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="publisher" name="publisher" aria-label="Publisher">
                </div>
            </div>

            <div class="row mb-3">
                <label for="language" class="form-label">Language</label>
                <div class="col-sm-12">
                    <select type="" class=" form-select " id="language" name="language" aria-label="language">
                        <option value="English" selected>English</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Russian">Russian</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                        <option value="Mandarin">Mandarin</option>
                    </select>
                </div>

            </div>

            <div class="row mb-3">
                <label for="category" class="form-label">Category</label>
                <div class="col-sm-12">
                    <select class=" form-select" id="category" name="category" aria-label="category">
                        <option value="Fiction" selected>Fiction</option>
                        <option value="Nonfiction">Nonfiction</option>
                        <option value="Reference">Reference</option>
                    </select>
                </div>
            </div>

            <!-- As soon as book is added it is shown as available -->
            <input style="display: none;" type="text" name="status" value="Available">

            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>

        </form>

        <?php
        // check if book title already exist in the database  


        // triggers uppon pressing submit button
        if (isset($_POST['submit'])) {

            //check duplicates for email 
            $count = 0;
            $sql = "SELECT book_title FROM book";
            $result = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['book_title'] == $_POST['book_title']) {
                    $count = $count + 1;
                }
            }
            if ($count == 0) {

                //if no duplicates found, user can register



                // for image the function move_uploaded_file(filename, destination) note that image is the name given of the input tag
                move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $_FILES['image']['name']);


                // timestamp for new password submission
                $date = new DateTime(''); // output: string(19) "2022-10-09 18:39:16"
                $timestamp = $date->format('Y-m-d H:i:s');


                //table book columns 
                $book_title = $_POST['book_title'];
                $author     = $_POST['author'];
                $publisher  = $_POST['publisher'];
                $language   = $_POST['language'];
                $category   = $_POST['category'];
                $status     = $_POST['status'];


                $image      = $_FILES['image']['name'];




                // check if image $_FILES is empty or not
                if ($image == "") {

                    //empty cover image
                    $empty_cover = "empty_cover.png";


                    $sql1 =  "INSERT INTO `book` (`book_title`, `author`, `publisher`, `language`, `category`, `image`) 
    VALUES('$_POST[book_title]', '$_POST[author]','$_POST[publisher]','$_POST[language]',
    '$_POST[category]','$empty_cover');";

                    // is added successfully
                    if (mysqli_query($db, $sql1)) {


                        // find the book_id of new book
                        $query3 = "SELECT * FROM book WHERE book_title = '$_POST[book_title]'";

                        // connect to db and add query
                        $result3 = mysqli_query($db, $query3);
                        //fatch data from book table
                        $row3 = mysqli_fetch_assoc($result3);


                        $book_id = $row3['book_id'];



                        // add status, user id and timestamp to book_status table
                        $query1 =  "INSERT INTO `book_status` (`user_id`, `status`, `applied_date`, `book_id`) 
                            VALUES('$_SESSION[user_id]', '$_POST[status]','$timestamp','$book_id');";

                        if (mysqli_query($db, $query1)) {

        ?>
                            <script type="text/javascript">
                                alert("Book added Successfully.");
                                //reload page to get updated fields
                                window.location = "book.php?edit=<?php echo $row3['book_id']; ?>";
                            </script>
                        <?php


                        }
                    }
                } else {

                    $sql2 =  "INSERT INTO `book` (`book_title`, `author`, `publisher`, `language`, `category`, `image`) 
     VALUES('$_POST[book_title]', '$_POST[author]','$_POST[publisher]','$_POST[language]',
     '$_POST[category]','$image');";

                    if (mysqli_query($db, $sql2)) {
                        $query3 = "SELECT * FROM book WHERE book_title = '$_POST[book_title]'";

                        // connect to db and add query
                        $result3 = mysqli_query($db, $query3);
                        //fatch data from book table
                        $row3 = mysqli_fetch_assoc($result3);


                        $book_id = $row3['book_id'];

                        // add status, user id and timestamp to book_status table
                        $query2 =  "INSERT INTO `book_status` (`user_id`, `status`, `applied_date`, `book_id`) 
                                            VALUES('$_SESSION[user_id]', '$_POST[status]','$timestamp','$book_id');";

                        if (mysqli_query($db, $query2)) {

                        ?>
                            <script type="text/javascript">
                                alert("Book added Successfully.");
                                //reload page to get updated fields
                                window.location = "book.php?edit=<?php echo $row3['book_id']; ?>";
                            </script>
                <?php


                        }
                    }
                }
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
                        Book is already registered.
                    </div>
                </div>

        <?php


            }
        }

        ?>





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