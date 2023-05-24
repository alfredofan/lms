<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>

<div class="container-sm d-flex flex-column justify-content-center" style="margin-top: 50px;">
    <?php

    if (isset($_SESSION['login_user'])) {

        $result = mysqli_query($db, "SELECT * FROM `user`WHERE email='$_SESSION[login_user]'");
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <h1>Welcome <?php echo $row['firstname'] . ' ' . $row['lastname']; ?> </h1><br>

            <div class="form ">
                <h4>Details</h4>
                <hr>
                <!-- Displaying Data Read From Database -->
                <span>E-mail:</span> <?php echo $row['email']; ?>
                <hr>

                <span>User type:</span> <?php echo $row['typename']; ?>
                <hr>

                <span>User ID:</span> <?php echo $row['user_id']; ?>
                <hr>

            </div>
    <?php
        }
    }
    ?>

    <div>
        <!-- User List -->
        <div class="container-lg d-flex justify-content-center ">



            <div>
                <h2>List of Users</h2>

                <?php
                $result2 = mysqli_query($db, "SELECT * FROM `user`;");

                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th>";
                echo "First name";
                echo "</th>";
                echo "<th>";
                echo "Last name";
                echo "</th>";
                echo "<th>";
                echo "Email";
                echo "</th>";
                echo "<th>";
                echo "User type";
                echo "</th>";
                echo "<th>";
                echo "Type name";
                echo "</th>";
                echo "<th>";
                echo "User ID";
                echo "</th>";
                echo "</tr>";



                while ($row2 = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row2["firstname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row2["lastname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row2["email"];
                    echo "</td>";
                    echo "<td>";
                    echo $row2["type"];
                    echo "</td>";
                    echo "<td>";
                    echo $row2["typename"];
                    echo "</td>";
                    echo "<td>";
                    echo $row2["user_id"];
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";

                ?>

            </div>
        </div>





        <!-- Library grid -->
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

















        <!--testing session variale -->
        <script type="text/javascript">
            alert('<?php echo $_SESSION['login_user']; ?>');
        </script>


        <?php

        if (isset($_SESSION['login_user'])) {
            //After confirming active session, session is used to retrieve details from all users (id,email and etc.) from the table.
            $result = mysqli_query($db, "SELECT * FROM `user`;");
        ?>
            <h2>---Details---</h2>
            <?php

            while ($row = mysqli_fetch_array($result)) {

                $firstname = $row['firstname'];

            ?>
                <div class="form">
                    <!-- Displaying Data Read From Database -->
                    <span>Name:</span> <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                    <span>E-mail:</span> <?php echo $row['email']; ?>
                    <span>User type:</span> <?php echo $row['typename']; ?>
                    <span>User ID:</span> <?php echo $row['user_id']; ?>
                </div>
        <?php
            }
        }
        ?>
        <?php

        if (isset($_SESSION['login_user'])) {

            $result = mysqli_query($db, "SELECT * FROM `user`WHERE email='$_SESSION[login_user]'");
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="form">

                    <!-- Displaying Data Read From Database -->
                    <h1>Welcome <?php echo $row['firstname'] . ' ' . $row['lastname']; ?> </h1>
                    <span>E-mail:</span> <?php echo $row['email']; ?>
                    <span>User type:</span> <?php echo $row['typename']; ?>
                    <span>User ID:</span> <?php echo $row['user_id']; ?>
                </div>
        <?php
            }
        }
        ?>





        <h1>Dashboard</h1>

        <Table>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>
                <td>Publisher</td>
                <td>Language</td>
                <td>Category</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Great Expectations</td>
                <td>Charles Dickens</td>
                <td>Macmillan Collectors Library</td>
                <td>English</td>
                <td>Fiction</td>
            </tr>
            <tr>
                <td>2</td>
                <td>An Inconvenient Truth</td>
                <td>Al Gore</td>
                <td>Penguin Books</td>
                <td>English</td>
                <td>Nonfiction</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Oxford Dictionary</td>
                <td>Oxford Press</td>
                <td>Oxford Press</td>
                <td>English</td>
                <td>Reference</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Anna Karenina</td>
                <td>Leo Tolstoy</td>
                <td>Star Publishing</td>
                <td>Russian</td>
                <td>Fiction</td>
            </tr>
            <tr>
                <td>5</td>
                <td>The Tale of Genji</td>
                <td>Murasaki Shikibu</td>
                <td>Kinokuniya</td>
                <td>Japanese</td>
                <td>Fiction</td>
            </tr>

        </Table>


        </body>
        <?php
        include_once("src/inc/footer.inc.php");
        ?>