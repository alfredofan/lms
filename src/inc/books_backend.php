<?php
include_once("src/inc/config.php");
include_once("src/inc/session_checker.php");

// if (isset($_POST['search'])) {
//     $search = $_POST['search'];
//     $search = '%$search%';
//     $valueToSearch = $_GET['search'];


//     if (strlen($search) > 1) { //Setting to get first result after getting 2 or more characteres in the searchbox
//         $query = "SELECT * FROM book WHERE CONCAT(`book_title`, `author`, `publisher`, `language`, `category`, `book_id`) LIKE '%" . $valueToSearch . "%'";
//         $search_result = filterTable($query);

//         // $stmt = $db->prepare($query);
//         while ($row = mysqli_fetch_assoc($search_result)) {

//         $row = mysqli_fetch_assoc($result);
//         $book_title = $row['book_title'];
//         $author    = $row['author'];
//         $publisher   = $row['publisher'];
//         $language   = $row['language'];
//         $category  = $row['category'];
//         $image     = $row['image'];

//     }
// }



if (isset($_GET['search'])) {
    $valueToSearch = $_GET['search'];
    // search in all table columns
    // using concat mysql function

    $query = mysqli_query($db, "SELECT * FROM book WHERE CONCAT(`book_title`, `author`, `publisher`, 
        `language`, `category`, `book_id`) LIKE '%" . $valueToSearch . "%'");
    // $search_result = filterTable($query);

    if (mysqli_num_rows($query) == 0) {
        echo "No book found.";
    } else {
        echo "<table class='table table-hover d-flex aling-items-center'>";
        echo "<tr>";
        echo "<th>";
        echo "Image";
        echo "</th>";
        echo "<th>";
        echo "Title";
        echo "</th>";
        echo "<th>";
        echo "Author";
        echo "</th>";
        echo "<th>";
        echo "Publisher";
        echo "</th>";
        echo "<th>";
        echo "Language";
        echo "</th>";
        echo "<th>";
        echo "Category";
        echo "</th>";
        echo "<th>";
        echo "Status";
        echo "</th>";
        echo "<th>";
        echo "Action";
        echo "</th>";
        echo "</tr>";



        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td style='margin:0px; padding:0px;'>";
            echo '<img src="img/' . $row['image'] . '" class="img-fluid p-1" alt="book cover" style="width:75px;">';
            echo "</td>";
            echo "<td>";
            echo $row["book_title"];
            echo "</td>";
            echo "<td>";
            echo $row["author"];
            echo "</td>";
            echo "<td>";
            echo $row["publisher"];
            echo "</td>";
            echo "<td>";
            echo $row["language"];
            echo "</td>";
            echo "<td>";
            echo $row["category"];
            echo "</td>";








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

?><td>
                                <p style="color:gray;"><small>
                                        <?php
                                        echo $row2["status"];
                                        ?>
                                    </small></p>
                            </td>

                        <?php
                        }
                        if ($row2["status"] == "Deleted") {

                        ?><td>
                                <p style="color:gray;">
                                    <?php
                                    echo $row2["status"]; ?>
                                </p>

                            </td>
                        <?php
                        }
                        if ($row2['status'] == "On loan") {

                        ?><td>
                                <p style="color:firebrick;"><small>
                                        <?php
                                        echo $row2["status"]; ?>
                                    </small></p>
                            </td>

            <?php


                        }
                    }
                }
            }



            echo "<td>";
            ?>
            <a href="book.php?edit=<?php echo $row['book_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
        <?php

            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";

        ?>

        </div>
        </div>

<?php
    }
} else
?>

</div>