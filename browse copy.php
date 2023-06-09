<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
include_once("src/inc/session_checker.php");

?>

<!-- <h2>This is the main content</h2> -->


<!-- Cover / search bar -->



<div class="card bg-dark text-white " name="heroimg" id="heroimg">
    <img src="img\bannerLMSbw_optimized.jpg" class="img-fluid" alt="books" style="padding-top: 0px ; "> <!-- padding to get more min-hight -->
    <div class="card-img-overlay">
        <!-- <h2>This is the main content</h2>
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">Last updated 3 mins ago</p> -->

        <form class="d-flex justify-content-center align-items-center" action="" name="searchbox" id="searchbox">
            <div class="col-4 p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                <div class="input-group d-flex justify-content-center align-items-center">
                    <input type="search" name="valueToSearch" id="valueToSearch" placeholder="Search Book" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="margin: 0px; padding: 0px;">
                    <div class="input-group-append">
                        <button id="button-addon1" type="submit" class="btn btn-link text-primary">
                            <i class="fa fa-search"></i>
                            <svg style="color:black" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `book` WHERE CONCAT(`book_title`, `author`, `publisher`, `language`, `category`, `book_id`) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM book";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include 'src/inc/config.php';
    $filter_Result = mysqli_query($db, $query);
    return $filter_Result;
}

if (mysqli_num_rows($search_result) == 0) {
    echo "<p>No result</p>";
}
?>
<div class='container-lg d-flex justify-content-center align-items-center'>


    <div class="row  row-cols-md-3 g-4">

        <?php

        while ($row = mysqli_fetch_assoc($search_result)) {
            // $book_title = $row['book_title'];
            // $author = $row['author'];
            // $publisher = $row['publisher'];
            // $language = $row['language'];
            // $category = $row['category'];
            // $book_id = $row['book_id '];


            // $query = "SELECT * FROM `book` WHERE CONCAT(`book_title`, `author`, `publisher`, `language`, `category`, `book_id`) LIKE '%" . $valueToSearch . "%'";
            // while ($row = mysqli_fetch_array($result)) {

        ?>
            <div class="col d-flex justify-content-center">
                <div class="row  container-card " style="width: 18rem; padding:10px">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" class="" style="padding:20px;" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title"><?php echo $row["book_title"]; ?> </h5>
                        <h7 class="card-subtitle mb-2 text-muted">Author &#8231; <?php echo $row["author"]; ?></h7>
                        <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; <?php echo $row["publisher"]; ?></small></p>

                        <?php
                        // in order to display book status I had to compare the book_id column from both tables `book` and `book_status` 
                        $result2 = mysqli_query($db, "SELECT * FROM `book_status`;");
                        $result3 = mysqli_query($db, "SELECT * FROM `book`;");
                        if (mysqli_num_rows($result3) > 0) {
                            $row2_count = mysqli_num_rows($result2);
                            $row3_count = mysqli_num_rows($result3);
                            // find amount of remaining rows to make countdown
                            $remaining_rows = min($row2_count, $row3_count);

                            //loop countdown comparing book_id column from book_status until get match with current iteration row from parent while  
                            while ($remaining_rows-- > 0) {
                                $row2 = mysqli_fetch_assoc($result2);
                                // $row3 = mysqli_fetch_assoc($result3);
                                if ($row2["book_id"] == $row["book_id"]) {
                                    // selecting color for each status
                                    if ($row2["status"] == "Available") {

                        ?>
                                        <p style="color:gray;"><small>
                                                <?php
                                                echo $row2["status"]; ?>
                                            </small></p>

                                        <?php

                                        if ($row2["status"] == "Deleted") {

                                        ?>
                                            <p style="color:gray;"><small>
                                                    <?php
                                                    echo $row2["status"]; ?>
                                                </small></p>

                                            <?php

                                            if ($row2["status"] == "On loan") {

                                            ?>
                                                <p style="color:firebrick;"><small>
                                                        <?php
                                                        echo $row2["status"]; ?>
                                                    </small></p>

                        <?php

                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>

                        <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                        <a href="book.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>


                    </div>
                </div>
            </div>

        <?php
        }

        ?>
        <!--testing session variale -->
        <script type="text/javascript">
            alert('<?php echo $valueToSearch; ?>');
        </script>
        <?php

        //{
        //     $query = "SELECT * FROM user";
        //     $search_result = filterTable($query);
        // }

        //     $result = mysqli_query($db, "SELECT * FROM `book` 
        // WHERE `book_title` or `author` or `publisher` or `language`  `category` or `book_id` like '%$_POST[search]%'");

        //     if (mysqli_num_rows($q) == 0) {
        //         echo "Sorry, no book found. Try searching again.";
        //     } else {
        ?>


        <!-- Library Grid -->
        <div class='container-lg d-flex justify-content-center align-items-center'>


            <div class="row  row-cols-md-3 g-4">

                <?php
                $result = mysqli_query($db, "SELECT * FROM `book`;");
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col d-flex justify-content-center">
                        <div class="row  container-card " style="width: 18rem; padding:10px">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" class="" style="padding:20px;" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title"><?php echo $row["book_title"]; ?> </h5>
                                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; <?php echo $row["author"]; ?></h7>
                                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; <?php echo $row["publisher"]; ?></small></p>

                                <?php
                                // in order to display book status I had to compare the book_id column from both tables `book` and `book_status` 
                                $result2 = mysqli_query($db, "SELECT * FROM `book_status`;");
                                $result3 = mysqli_query($db, "SELECT * FROM `book`;");
                                if (mysqli_num_rows($result3) > 0) {
                                    $row2_count = mysqli_num_rows($result2);
                                    $row3_count = mysqli_num_rows($result3);
                                    // find amount of remaining rows to make countdown
                                    $remaining_rows = min($row2_count, $row3_count);

                                    //loop countdown comparing book_id column from book_status until get match with current iteration row from parent while  
                                    while ($remaining_rows-- > 0) {
                                        $row2 = mysqli_fetch_assoc($result2);
                                        // $row3 = mysqli_fetch_assoc($result3);
                                        if ($row2["book_id"] == $row["book_id"]) {
                                            // selecting color for each status
                                            if ($row2["status"] == "Available") {

                                ?>
                                                <p style="color:gray;"><small>
                                                        <?php
                                                        echo $row2["status"]; ?>
                                                    </small></p>

                                                <?php

                                                if ($row2["status"] == "Deleted") {

                                                ?>
                                                    <p style="color:gray;"><small>
                                                            <?php
                                                            echo $row2["status"]; ?>
                                                        </small></p>

                                                    <?php

                                                    if ($row2["status"] == "On loan") {

                                                    ?>
                                                        <p style="color:firebrick;"><small>
                                                                <?php
                                                                echo $row2["status"]; ?>
                                                            </small></p>

                                <?php

                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                                <a href="book.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>


                            </div>
                        </div>

                    </div>
                <?php
                }

                ?>
            </div>

        </div>

        <?php
        // }
        // }
        ?>

        <?php
        include_once("src/inc/footer.inc.php");
        ?>