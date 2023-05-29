<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
include_once("src/inc/session_checker.php");
include_once("src/inc/admin_checker.php");

?>


<style>
    table th,
    th {
        background-color: darkgray;
    }

    /* center vertically the table items */
    table,
    table td,
    table p,
    p {
        /* text-align: center; */
        vertical-align: middle;
        margin: 0px;
        font-size: clamp(12px, 1.5vw, 18px);


    }

    /* #tab-container {

        display: flex;
        justify-content: center !important;
    } */

    #transactions td

    /* , #transactions p   */
        {
        /* text-align: center; */
        vertical-align: middle;
        margin: 0px;
        font-size: clamp(12px, 1.5vw, 15.5px);


    }


    h6 {
        /* text-align: center; */
        vertical-align: middle;
        margin: 0px;
        font-size: clamp(14px, 2vw, 22px);

    }

    .tablinks {
        color: black;
    }

    .tabcontent {

        margin: 4px, 4px;
        padding: 4px;
        /* for testing subject */
        /* background-color: #08c708; */
        width: screen;
        height: fit-content;
        overflow-x: visible;
        overflow-y: hidden;
        white-space: nowrap;
        display: flex;


    }



    button.tablinks {
        font-size: clamp(16px, 2.5vw, 30px);
    }

    h2 {
        font-size: clamp(22px, 4vw, 40px);

    }
</style>


<div class="container-sm d-flex flex-column justify-content-center" style="margin-top: 25px; ">
    <?php

    if (isset($_SESSION['login_user'])) {

        $result = mysqli_query($db, "SELECT * FROM `user`WHERE email='$_SESSION[login_user]'");
        while ($row = mysqli_fetch_assoc($result)) {

            $firstname = $row['firstname'];
            $lastname  = $row['lastname'];
            $email     = $row['email'];
            $password  = $row['password'];
            $type      = $row['type'];
            $typename  = $row['typename'];
            $user_id   = $row['user_id'];
            $image     = $row['image'];

    ?>

            <h1 class="text-left" style="font-size: clamp(33px, 4vw, 60px); font-weight: bold;">Welcome <?php echo $row['firstname'] . ' ' . $row['lastname']; ?> </h1><br>


    <?php
        }
    }
    ?>

    <div>

        <!-- 
=====================
    Admin panel
=====================
 -->


        <h2>Admin panel</h2>
        <p>Management interface</p><br>



        <!--
        ------------------
               tabs
        -------------------
        -->

        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'users')" id="UserOpen">Users List</button>
            <button class="tablinks" onclick="openTab(event, 'books')" id="BookOpen">Book Inventory</button>
            <button class="tablinks" onclick="openTab(event, 'transactions')" id="TransactionOpen">Transactions</button>

        </div>



        <!--
        ------------------
            Users List
        -------------------
        -->

        <div id="users" class="tabcontent">
            <!-- <h2>Users List</h2> -->
            <p>Manage Users.</p><br>


            <!-- Search box for Users List TAB -->


            <form class="d-flex justify-content-center align-items-center" action="" name="searchbox" id="searchbox">
                <div class="col-4 p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group d-flex justify-content-center align-items-center">
                        <input type="search" name="search_user" id="search_user" placeholder="Search User" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="margin: 0px; padding: 0px;">
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

            </form><br>


            <!-------------------------------------------------->





            <!-- User List -->
            <div class="container-sm d-flex justify-content-center " style="height: fit-content; min-width:fit-content;">

                <div>
                    <!-- ---------------------------------------------------------------- -->
                    <?php


                    if (isset($_GET['search_user'])) {
                        $valueToSearch = $_GET['search_user'];
                        // search in all table columns
                        // using concat mysql function

                        $query2 = mysqli_query($db, "SELECT * FROM user WHERE CONCAT(`user_id`, `firstname`, 
`lastname`, `typename`, `email`) LIKE '%" . $valueToSearch . "%'");
                        // $search_result = filterTable($query);

                        if (mysqli_num_rows($query2) == 0) {
                            echo "No user found.";
                        } else {
                    ?>

                            <?php
                            echo "<table class='table table-hover d-flex aling-items-center justify-content-evenly' style='width: fit-content;'>";
                            echo "<tr style='background-color:#f8f9fa;'>";
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
                            echo "<th>";
                            echo "Action";
                            echo "</th>";
                            echo "</tr>";






                            while ($row2 = mysqli_fetch_array($query2)) {
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
                                echo "<td>";
                            ?>
                                <a href="user.php?edit=<?php echo $row2["user_id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <?php

                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }
                    } else {

                        ?>





                        <!--------------------------------------------------------------->





                        <?php
                        $result2 = mysqli_query($db, "SELECT * FROM `user`;");

                        echo "<table class='table table-hover justify-content-evenly'>";
                        echo "<tr style='background-color:#f8f9fa;'>";
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
                        echo "<th>";
                        echo "Action";
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
                            echo "<td>";
                        ?>
                            <a href="user.php?edit=<?php echo $row2["user_id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <?php

                            echo "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }
                    ?>

                </div>
            </div>
        </div>









        <!--
        ------------------
        Book Inventory
        -------------------
        -->

        <div id="books" class="tabcontent">
            <!-- <h2>Book Inventory</h2> -->
            <div class="d-flex justify-content-between">
                <p>Manage books.</p><br>

                <a href="add_book.php" class="btn btn-primary btn-sm">Add Book</a>
            </div>
            <br>


            <!-- Search box for Manage books TAB -->


            <form class="d-flex justify-content-center align-items-center" action="" name="searchbox" id="searchbox">
                <div class="col-4 p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group d-flex justify-content-center align-items-center">
                        <input type="search" name="search_book" id="search_book" placeholder="Search Book" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="margin: 0px; padding: 0px;">
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

            </form><br>


            <!-------------------------------------------------->




            <div class="container-sm d-flex justify-content-center " id="tab-container" style="height: fit-content; min-width:fit-content;">



                <?php


                if (isset($_GET['search_book'])) {
                    $valueToSearch = $_GET['search_book'];
                    // search in all table columns
                    // using concat mysql function

                    $query = mysqli_query($db, "SELECT * FROM book WHERE CONCAT(`book_title`, `author`, `publisher`, 
        `language`, `category`, `book_id`) LIKE '%" . $valueToSearch . "%'");
                    // $search_result = filterTable($query);

                    if (mysqli_num_rows($query) == 0) {
                        echo "No book found.";
                    } else {
                ?>

                        <?php
                        echo "<table class='table table-hover d-flex aling-items-center justify-content-evenly' >";
                        echo "<tr style='background-color:#f8f9fa;'>";
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



                    <?php
                    }
                } else {

                    ?>










                    <!-------------------------------------------------->

                    <br>

                    <!-- Library list -->



                    <div>

                        <?php
                        $result = mysqli_query($db, "SELECT * FROM `book`;");

                        echo "<table class='table table-hover d-flex aling-items-center justify-content-evenly' style='width: fit-content;'>";
                        echo "<tr style='background-color:#f8f9fa;'>";
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



                        while ($row = mysqli_fetch_array($result)) {
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
                    }
                    ?>

                    </div>
            </div>


        </div>
        <!-- ------------------------------------ -->








        <div id="details" class="tabcontent">
            <!-- <h3>My Details</h3> -->
            <p>Manage your details.</p><br>

            <div class="container-sm d-flex justify-content-center" id="userdetails" style="margin-top:25px">

                <div class="container-text aling-content-center" role="grid" aria-label="Text Grid" style="margin-top:0px">
                    <div class=" col align-content-start" role="grid" aria-label="Text Grid">

                        <div class="row d-flex flex-row container-text justify-content-center" role="row" style="width:fit-content; margin-top:0px">
                            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center" role="gridcell" style="width:fit-content">
                                <?php
                                echo '<img src="img/user_img/' . $image . '" class="img-fluid " id="profile-photo" alt="profile photo" style="">';
                                ?>
                            </div>
                            <div class="col-12 col-md-6 p-2" role="gridcell" style="width:fit-content"> <!--alternative for "flex row reverse" in this case would be "order-md-last" -->
                                <h2 class="d-flex flex-row align-items-center justify-content-start" style="font-size: clamp(22px, 4vw, 45px);">
                                    <?php echo $firstname . ' ' . $lastname; ?>
                                </h2>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $email ?></h6>
                                <p class="card-text" style="margin-bottom: 0px;"><small>User type &#8231; <?php echo $typename ?></small></p>
                                <p class="card-text mb-3" style="margin-bottom: 0px;"><small>User ID &#8231; <?php echo $user_id ?></small></p>


                                <a href="user.php?edit=<?php echo $user_id; ?>" class="btn btn-primary btn-sm">Edit</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!--
        ------------------
        Book transactions
        -------------------
        -->





        <div id="transactions" class="tabcontent">
            <!-- <h2>Book transactions</h2> -->
            <p>Manage Transactions.</p><br>



            <!-- Search box for transactions TAB -->


            <form class="d-flex justify-content-center align-items-center" action="" name="searchbox" id="searchbox">
                <div class="col-4 p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group d-flex justify-content-center align-items-center">
                        <input type="search" name="search_transaction" id="search_transaction" placeholder="Search Transaction" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="margin: 0px; padding: 0px;">
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

            </form><br>


            <!------------------------------------------------------------------------------->


            <!-- Transaction List -->
            <div class="container-sm d-flex justify-content-center " style="height: fit-content; min-width:fit-content;">

                <div>

                    <!----------------------------------------------------------------------------------- -->
                    <?php


                    if (isset($_GET['search_transaction'])) {
                        $valueToSearch = $_GET['search_transaction'];
                        // search in all table columns
                        // using concat mysql function

                        $query3 = mysqli_query($db, "SELECT * FROM book_transactions WHERE CONCAT(`book_id`, `book_title`, `status`, 
`date_borrowed`, `date_return`, `date_user_return`, `date_count`, `user_id`, `firstname`, 
`lastname`, `typename`) LIKE '%" . $valueToSearch . "%'");
                        // $search_result = filterTable($query);


                        // if no records were found
                        if (mysqli_num_rows($query3) == 0) {
                            echo "No transaction found.";
                        } else {
                    ?>

                            <?php
                            echo "<table class='table table-hover d-flex aling-items-center justify-content-evenly'>";
                            echo "<tr style='background-color:#f8f9fa;'>";
                            echo "<th>";
                            echo "Image";
                            echo "</th>";
                            echo "<th>";
                            echo "Title";
                            echo "</th>";
                            echo "<th>";
                            echo "Status";
                            echo "</th>";
                            echo "<th>";
                            echo "Date Borrowed";
                            echo "</th>";
                            echo "<th>";
                            echo "Return By Date";
                            echo "</th>";
                            echo "<th>";
                            echo "Days Count";
                            echo "</th>";
                            echo "<th>";
                            echo "Date of Return";
                            echo "</th>";
                            echo "<th>";
                            echo "First name";
                            echo "</th>";
                            echo "<th>";
                            echo "Last name";
                            echo "</th>";
                            echo "<th>";
                            echo "Type name";
                            echo "</th>";
                            echo "<th>";
                            echo "Action";
                            echo "</th>";
                            echo "</tr>";




                            while ($row = mysqli_fetch_array($query3)) {
                                echo "<tr>";
                                echo "<td style='margin:0px; padding:0px;'>";
                                echo '<img src="img/' . $row['image'] . '" class="img-fluid p-1" alt="book cover" style="width:75px;">';
                                echo "</td>";
                                echo "<td>";
                                echo $row["book_title"];
                                echo "</td>";



                                // selecting color for each status
                                if ($row["status"] == "Available") {

                            ?><td>
                                        <p style="color:gray;"><small>
                                                <?php
                                                echo $row["status"];
                                                ?>
                                            </small></p>
                                    </td>

                                <?php
                                }
                                if ($row["status"] == "Deleted") {

                                ?><td>
                                        <p style="color:gray;">
                                            <?php
                                            echo $row["status"]; ?>
                                        </p>

                                    </td>
                                <?php
                                }
                                if ($row['status'] == "Returned") {

                                ?><td>
                                        <p style="color:green;"><small>
                                                <?php
                                                echo $row["status"]; ?>
                                            </small></p>
                                    </td>

                                <?php


                                }


                                if ($row['status'] == "On loan") {

                                ?><td>
                                        <p style="color:firebrick;"><small>
                                                <?php
                                                echo $row["status"]; ?>
                                            </small></p>
                                    </td>

                                <?php


                                }



                                echo "<td>";
                                echo $row["date_borrowed"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["date_return"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["date_count"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["date_user_return"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["firstname"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["lastname"];
                                echo "</td>";
                                echo "<td>";
                                echo $row["typename"];
                                echo "</td>";


                                echo "<td>";
                                ?>
                                <a href="borrow.php?edit=<?php echo $row['book_id']; ?>&type=<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-sm">Return</a>
                            <?php

                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";

                            ?>



                        <?php
                        }
                    } else {

                        ?>





                        <!--------------------------------------------------------------->





                        <?php
                        $result = mysqli_query($db, "SELECT * FROM `book_transactions`;");

                        echo "<table class='table table-hover d-flex aling-items-center justify-content-evenly'>";
                        echo "<tr style='background-color:#f8f9fa;'>";
                        echo "<th>";
                        echo "Image";
                        echo "</th>";
                        echo "<th>";
                        echo "Title";
                        echo "</th>";
                        echo "<th>";
                        echo "Status";
                        echo "</th>";
                        echo "<th>";
                        echo "Date Borrowed";
                        echo "</th>";
                        echo "<th>";
                        echo "Return By Date";
                        echo "</th>";
                        echo "<th>";
                        echo "Days Count";
                        echo "</th>";
                        echo "<th>";
                        echo "Date of Return";
                        echo "</th>";
                        echo "<th>";
                        echo "First name";
                        echo "</th>";
                        echo "<th>";
                        echo "Last name";
                        echo "</th>";
                        echo "<th>";
                        echo "Type name";
                        echo "</th>";
                        echo "<th>";
                        echo "Action";
                        echo "</th>";
                        echo "</tr>";




                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td style='margin:0px; padding:0px;'>";
                            echo '<img src="img/' . $row['image'] . '" class="img-fluid p-1" alt="book cover" style="width:75px;">';
                            echo "</td>";
                            echo "<td>";
                            echo $row["book_title"];
                            echo "</td>";



                            // selecting color for each status
                            if ($row["status"] == "Available") {

                        ?><td>
                                    <p style="color:gray;"><small>
                                            <?php
                                            echo $row["status"];
                                            ?>
                                        </small></p>
                                </td>

                            <?php
                            }
                            if ($row["status"] == "Deleted") {

                            ?><td>
                                    <p style="color:gray;">
                                        <?php
                                        echo $row["status"]; ?>
                                    </p>

                                </td>
                            <?php
                            }
                            if ($row['status'] == "Returned") {

                            ?><td>
                                    <p style="color:green;"><small>
                                            <?php
                                            echo $row["status"]; ?>
                                        </small></p>
                                </td>

                            <?php


                            }


                            if ($row['status'] == "On loan") {

                            ?><td>
                                    <p style="color:firebrick;"><small>
                                            <?php
                                            echo $row["status"]; ?>
                                        </small></p>
                                </td>

                            <?php


                            }



                            echo "<td>";
                            echo $row["date_borrowed"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["date_return"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["date_count"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["date_user_return"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["firstname"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["lastname"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["typename"];
                            echo "</td>";

                            // disable return button ion case of book not on loan
                            echo "<td>";


                            if ($row['status'] == "On loan") {

                            ?>
                                <a href="borrow.php?edit=<?php echo $row['book_id']; ?>&type=<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-sm">Return</a>




                            <?php
                            } else {
                            ?>

                                <a href="borrow.php?edit=<?php echo $row['book_id']; ?>&type=<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-sm disabled" aria-disabled="true">Return</a>
                    <?php
                            }
                            echo "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    }
                    ?>

                </div>
            </div>
        </div>






        <!-- 
============================
    js for tab management
============================

 -->


        <script>
            // js for changing tabs
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            //if click on searchbox at book inventory tab, set it as default tab 
            //  <?php if (isset($_GET['search_book'])) {
                ?>

            document.getElementById("BookOpen").click();

            <?php
                }

                //if click on searchbox at transactions tab, set it as default tab 

                elseif (isset($_GET['search_transaction'])) {
            ?>

                document.getElementById("TransactionOpen").click();

            <?php
                } else {
            ?>
                // Get the element with id="UserOpen" and click on it
                document.getElementById("UserOpen").click();


                //  <?php
                }
                    ?>
        </script>






        </body>
        <?php
        include_once("src/inc/footer.inc.php");
        ?>