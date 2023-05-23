<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>

<?php


if (isset($_SESSION['login_user'])) {
    $id = $_SESSION['login_user'];
    $query1 = mysqli_query($db, "SELECT * FROM user where email=' . $id'");
    while ($row1 = mysqli_fetch_array($query1)) {
?>
        <div class="form">
            <h2>---Details---</h2>
            <!-- Displaying Data Read From Database -->
            <span>Name:</span> <?php echo $row1['firstname'] . ' ' . $row1['lastname']; ?>
            <span>E-mail:</span> <?php echo $row1['email']; ?>
            <span>User type:</span> <?php echo $row1['typename']; ?>
            <span>User ID:</span> <?php echo $row1['user_id']; ?>
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


<?php
include_once("src/inc/footer.inc.php");
?>