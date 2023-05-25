<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>


<?php
//get the book_id value from pressing button edit in any book from the browse.php page
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // query copare values from the table book column book_id that match with button edit data
    $query = "SELECT * FROM book WHERE book_id= $id";
    // connect to db and add query
    $result = mysqli_query($db, $query);
    //fatch data
    $row = mysqli_fetch_assoc($result);
    $book_title = $row['book_title'];
    $author    = $row['author'];
    $publisher   = $row['publisher'];
    $language   = $row['language'];
    $category  = $row['category'];
    $image     = $row['image'];
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
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">Available</option>
                        <option value="2">Not Available</option>
                        <option value="3">On loan</option>
                        <option value="4">Deleted</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>


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



            $book_title = $_POST['book_title'];
            $author     = $_POST['author'];
            $publisher  = $_POST['publisher'];
            $language   = $_POST['language'];
            $category   = $_POST['category'];

            $image      = $_FILES['image']['name'];

            $sql1 = "UPDATE book SET book_title='$book_title', author='$author', publisher='$publisher', 
                    `language`='$language', category='$category', `image`='$image' WHERE book_id='$id';";

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
        }

        ?>

    </section>
</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>