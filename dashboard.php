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


    <!-- Library list -->
    <div class="container-lg d-flex justify-content-center ">



        <div>
            <h2>List of Books</h2>

            <?php
            $result = mysqli_query($db, "SELECT * FROM `book`;");

            echo "<table class='table table-hover'>";
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
            echo "</tr>";



            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>"; ?> <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="" /> <?php echo "</td>";
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
                                                                                                                                    echo "</tr>";
                                                                                                                                }

                                                                                                                                echo "</table>";

                                                                                                                                    ?>

        </div>
    </div>

























    <h1>Book List</h1>

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