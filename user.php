<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>


<?php
//get the user_id value from pressing button edit in any user from the browse.php page
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // query copare values from the table user column user_id that match with button edit data
    $query = "SELECT * FROM user WHERE user_id = $id";


    // connect to db and add query
    $result = mysqli_query($db, $query);
    //fatch data
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname  = $row['lastname'];
    $email     = $row['email'];
    $password      = $row['password'];
    $typename  = $row['typename'];
    $image     = $row['image'];
}
?>



<!-- populate fields dynamically with data fatched from db -->


<div class="container-sm d-flex justify-content-center" id="userdetails" style="margin-top:25px">

    <div class="container-text aling-content-center" role="grid" aria-label="Text Grid" style="margin-top:0px">
        <div class=" col align-content-start" role="grid" aria-label="Text Grid">

            <div class="row d-flex flex-row container-text justify-content-center" role="row" style="width:fit-content; margin-top:0px">
                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center" role="gridcell" style="width:fit-content">
                    <?php
                    echo '<img src="img/user_img/' . $row['image'] . '" class="img-fluid " id="profile-photo" alt="profile photo" style="">';
                    ?>
                </div>
                <div class="col-12 col-md-6 p-2" role="gridcell" style="width:fit-content"> <!--alternative for "flex row reverse" in this case would be "order-md-last" -->
                    <h2 class="d-flex flex-row align-items-center justify-content-start" style="font-size: clamp(22px, 4vw, 45px);">
                        <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                    </h2>
                    <h7 class="card-subtitle mb-2 text-muted">Email &#8231; <?php echo $row['email'] ?></h7>
                    <p class="card-text" style="margin-bottom: 0px;"><small>User type &#8231; <?php echo $row['typename'] ?></small></p>
                    <p class="card-text mb-3" style="margin-bottom: 0px;"><small>User ID &#8231; <?php echo $row['user_id'] ?></small></p>
                    <!-- <p style="padding-top: 30px ;font-size: clamp(15px, 2vw, 22px); text-align:justify">
                        space reserved for user synopsis 
                    </p> -->
                    <form class="col align-self-center" action="#" method="post" enctype="multipart/form-data" style="margin: 0px;">
                        <select class="form-select mb-3" name="typename" id="typename" aria-label="Default select typename" style="width:fit-content;">
                            <option selected><?php echo $row['typename'] ?? ''; ?></option>
                            <option value="Administrator">Administrator</option>
                            <option value="User">User</option>
                        </select>
                        <button type="submit" name="submit_typename" class="btn btn-primary btn-sm">Save</button>

                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<?php

if (isset($_POST['submit_typename'])) {
    //get the user_id value from pressing button edit in any user from the browse.php page
    $id = $_GET['edit'];
    //table user typename columns 
    $typename = $_POST['typename'];

    //query for table user
    $query1 = "UPDATE user SET `typename`='$typename' WHERE user_id='$id';";

    if (mysqli_query($db, $query1)) {
?>

        <!--testing session variale -->
        <script type="text/javascript">
            alert("Saved Successfully.");
            //reload page to get updated fields
            window.location = "user.php?edit=<?php echo $row['user_id']; ?>";
            $query1 = "UPDATE book_status SET `status`='$status' WHERE book_id='$id';";
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
                    <label for="image" class="form-label">Profile Photo</label>
                    <div class="col-12">
                        <input type="file" class="form-control" id="image" name="image" aria-label="Profile Photo">
                    </div>
                </div>
            </div>
            <?php
            if (isset($_FILES['image'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/user_img/" . $_FILES['image']['name']);
            } else {
                echo "image not found!";
            }

            ?>


            <form class="col align-self-center" name="signup" action="#" method="post">
                <div class="row mb-3">
                    <div class="col align-self-center">
                        <label for="firstname" class="form-label">First Name</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" aria-label="First name" maxlength="20" pattern="[a-zA-Z]+" required title="This field allows only letters, space, and dots for upper and lower case letters." oninvalid="this.setCustomValidity('Enter the complete details')" oninput="setCustomValidity('')" value="<?php echo $row['firstname'] ?? ''; ?>">
                            <!-- onivalid and oniput were used to change the default message for empty field submission atempt -->

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="lastname" name="lastname" aria-label="Last name" maxlength="20" pattern="[a-zA-Z]+" required title="This field allows only letters, space, and dots for upper and lower case letters." oninvalid="this.setCustomValidity('Enter the complete details')" oninput="setCustomValidity('')" value="<?php echo $row['lastname'] ?? ''; ?>">

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="col-sm-12">
                        <!-- Type "email" was working fine but in order to meet validation criteria on assessment, type "text" and pattern were added.   -->
                        <input type="text" class="form-control" id="email" name="email" aria-label="Email" minlength="3" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="This field must have a valid email address." oninvalid="this.setCustomValidity('This field must have a valid email address.')" oninput="setCustomValidity('')" value="<?php echo $row['email'] ?? ''; ?>">


                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                </div>
                <!-- Password must meet gelos password policy containing at least one special character, one number, one uppercase and lowercase letter, and at least 8 or more characters -->
                <div class="row mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password" minlength="8" pattern="((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must contain at least one number and one special character, one number, one uppercase and lowercase letter, and at least 8 or more characters" required value="<?php echo $row['password'] ?? ''; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                </div>

                <!-- Matching fields "password" and "confirm password"  for verification -->
                <script>
                    var password = document.getElementById("password"),
                        confirm_password = document.getElementById("confirm_password");

                    function validatePassword() {
                        if (password.value != confirm_password.value) {
                            confirm_password.setCustomValidity("Passwords Don't Match");
                        } else {
                            confirm_password.setCustomValidity('');
                        }
                    }

                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                </script>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>

            </form>

            <?php
            //getting confirmation from button save.
            if (isset($_POST['submit'])) {
                //get the user_id value from pressing button edit in any user from the browse.php page
                $id = $_GET['edit'];






                // for image the function move_uploaded_file(filename, destination) note that image is the name given of the input tag
                move_uploaded_file($_FILES['image']['tmp_name'], "img/user_img/" . $_FILES['image']['name']);



                //Insert Image as MySQL BLOB

                // if (count($_FILES) > 0) {
                //     if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                //         $imgData = file_get_contents($_FILES['image']['tmp_name']);
                //         $imgType = $_FILES['image']['type'];
                //         $sql = "INSERT INTO user(`image`) VALUES(?)";
                //         $statement = $conn->prepare($sql);
                //         $statement->bind_param('ss', $imgType, $imgData);
                //         $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
                //     }
                // }


                $query = "SELECT * FROM user WHERE user_id = $id";


                // connect to db and add query
                $result = mysqli_query($db, $query);
                //fatch data
                $row = mysqli_fetch_assoc($result);


                //table user columns 
                $firstname = $_POST['firstname'];
                $lastname  = $_POST['lastname'];
                $email     = $_POST['email'];
                $password      = $_POST['password'];

                $image      = $_FILES['image']['name'];




                // check if image $_FILES is empty or not
                if ($image == "") {
                    // if empty, it edit all fields but image
                    //query for table user
                    $sql1 = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', 
                     `password`='$password' WHERE user_id='$id';";

                    if (mysqli_query($db, $sql1)) {
            ?>

                        <!--testing session variale -->
                        <script type="text/javascript">
                            alert("Saved Successfully.");
                            //reload page to get updated fields
                            window.location = "user.php?edit=<?php echo $row['user_id']; ?>";
                        </script>

                    <?php

                    }
                } else {
                    // if not empty, it edit all fields including image


                    $sql2 = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', 
                     `password`='$password', `image`='$image' WHERE user_id='$id';";

                    if (mysqli_query($db, $sql2)) {
                    ?>

                        <!--testing session variale -->
                        <script type="text/javascript">
                            alert("Saved Successfully.");
                            //reload page to get updated fields
                            window.location = "user.php?edit=<?php echo $row['user_id']; ?>";
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