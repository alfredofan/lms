<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
include_once("src/inc/session_checker.php");
include_once("src/inc/admin_checker.php");

?>

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
            <a href="return.php?edit=<?php echo $row['book_id']; ?>&type=<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-sm">Return</a>
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


          echo "<td>";
          ?>
          <a href="return.php?edit=<?php echo $row['book_id']; ?>&type=<?php echo $row['transaction_id']; ?>" class="btn btn-primary btn-sm">Return</a>
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