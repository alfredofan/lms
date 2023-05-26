<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>


<?php
//get the book_id value from pressing button edit in any book from the browse.php page
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // query copare values from the table book column book_id that match with button edit data
    $query = "SELECT * FROM user WHERE email = $id";


    // connect to db and add query
    $result = mysqli_query($db, $query);
    //fatch data
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname    = $row['lastname'];
    $email   = $row['email'];
    $type  = $row['type'];
    $typename     = $row['typename'];
}
?>



<!-- populate fields dynamically with data fatched from db -->


<div class="container-sm d-flex justify-content-center" id="bookdetails" style="margin-top:75px">

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
                    <p style="padding-top: 30px ;font-size: clamp(15px, 2vw, 22px); text-align:justify">
                        <!-- space reserved for book synopsis -->
                    </p>
                    <form class="col align-self-center" action="#" method="post" enctype="multipart/form-data">
                        <select class="form-select mb-3" name="status" id="status" aria-label="Default select example">
                            <option selected><?php echo $row2['status'] ?? ''; ?></option>
                            <option value="Available">Available</option>
                            <option value="On loan">On loan</option>
                            <option value="Deleted">Deleted</option>
                        </select>
                        <button type="submit" name="submit_status" class="btn btn-primary btn-sm">Save</button>

                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<?php

if (isset($_POST['submit_status'])) {
    //get the book_id value from pressing button edit in any book from the browse.php page
    $id = $_GET['edit'];
    //table book_status columns 
    $status = $_POST['status'];

    //query for table book_status
    $query1 = "UPDATE book_status SET `status`='$status' WHERE book_id='$id';";
    if (mysqli_query($db, $query1)) {
?>

        <!--testing session variale -->
        <script type="text/javascript">
            alert("Saved Successfully.");
            //reload page to get updated fields
            window.location = "book.php?edit=<?php echo $row['book_id']; ?>";
        </script>

<?php
    }
}
?>


<div class="container-lg d-flex justify-content-center">

    <section class="container-form col bd-content ps-lg-2">
        <!-- <h1>Book</h1><br><br> -->
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
            if (isset($_FILES['image'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $_FILES['image']['name']);
            } else {
                echo "image not found!";
            }

            ?>
            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="booktile" class="form-label">Book Title</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="book_title" name="book_title" aria-label="Book title" value="<?php echo $row['book_title'] ?? ''; ?>">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="author" class="form-label">Author</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="author" name="author" aria-label="Author" value="<?php echo $row['author'] ?? ''; ?>">

                </div>
            </div>

            <div class="row mb-3">
                <label for="pulisher" class="form-label">Publisher</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="publisher" name="publisher" aria-label="Publisher" value="<?php echo $row['publisher'] ?? ''; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="language" class="form-label">Language</label>
                <div class="col-sm-12">
                    <select type="" class=" form-select " id="language" name="language" aria-label="language">
                        <option selected><?php echo $row['language'] ?? ''; ?></option>
                        <option value="English">English</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>

            </div>

            <div class="row mb-3">
                <label for="category" class="form-label">Category</label>
                <div class="col-sm-12">
                    <select class=" form-select" id="category" name="category" aria-label="category">
                        <option selected><?php echo $row['category'] ?? ''; ?></option>
                        <option value="Fiction">Fiction</option>
                        <option value="Nonfiction">Nonfiction</option>
                        <option value="Reference">Reference</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>

        </form>

        <?php
        //getting confirmation from button save.
        if (isset($_POST['submit'])) {
            //get the book_id value from pressing button edit in any book from the browse.php page
            $id = $_GET['edit'];






            // for image the function move_uploaded_file(filename, destination) note that image is the name given of the input tag
            move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $_FILES['image']['name']);



            //Insert Image as MySQL BLOB

            // if (count($_FILES) > 0) {
            //     if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            //         $imgData = file_get_contents($_FILES['image']['tmp_name']);
            //         $imgType = $_FILES['image']['type'];
            //         $sql = "INSERT INTO book(`image`) VALUES(?)";
            //         $statement = $conn->prepare($sql);
            //         $statement->bind_param('ss', $imgType, $imgData);
            //         $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
            //     }
            // }


            //table book columns 
            $book_title = $_POST['book_title'];
            $author     = $_POST['author'];
            $publisher  = $_POST['publisher'];
            $language   = $_POST['language'];
            $category   = $_POST['category'];

            $image      = $_FILES['image']['name'];




            // check if image $_FILES is empty or not
            if ($image == "") {
                // if empty, it edit all fields but image
                //query for table book
                $sql1 = "UPDATE book SET book_title='$book_title', author='$author', publisher='$publisher', 
                    `language`='$language', category='$category' WHERE book_id='$id';";

                if (mysqli_query($db, $sql1)) {
        ?>

                    <!--testing session variale -->
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        //reload page to get updated fields
                        window.location = "book.php?edit=<?php echo $row['book_id']; ?>";
                    </script>

                <?php

                }
            } else {
                // if not empty, it edit all fields including image


                $sql2 = "UPDATE book SET book_title='$book_title', author='$author', publisher='$publisher', 
                    `language`='$language', category='$category', `image`='$image' WHERE book_id='$id';";

                if (mysqli_query($db, $sql2)) {
                ?>

                    <!--testing session variale -->
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        //reload page to get updated fields
                        window.location = "book.php?edit=<?php echo $row['book_id']; ?>";
                    </script>

        <?php

                }
            }
        }
        ?>

    </section>
</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>