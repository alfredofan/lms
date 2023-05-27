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



        <h2>Admin panel</h2>
        <p>Management interface</p><br>



        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">My Details</button>

            <button class="tablinks" onclick="openTab(event, 'Users')">Users List</button>
            <button class="tablinks" onclick="openTab(event, 'Books')">Book Inventory</button>
        </div>

        <div id="Users" class="tabcontent">
            <!-- <h2>Users List</h2> -->
            <p>Manage Users.</p>


            <!-- User List -->
            <div class="container-sm d-flex justify-content-center " style="height: fit-content; min-width:fit-content;">



                <div>

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

                    ?>

                </div>
            </div>







        </div>

        <div id="Books" class="tabcontent">
            <!-- <h2>Book Inventory</h2> -->
            <p>Manage books.</p>



            <!-- Library list -->
            <div class="container-sm d-flex justify-content-center " style="height: fit-content; min-width:fit-content;">



                <div>

                    <?php
                    $result = mysqli_query($db, "SELECT * FROM `book`;");

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

                    ?>

                </div>
            </div>



        </div>

        <div id="Details" class="tabcontent">
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

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>






        </body>
        <?php
        include_once("src/inc/footer.inc.php");
        ?>