<?php
include_once("src/inc/header.inc.php");

?>

<!-- <h2>This is the main content</h2> -->


<!-- Cover!!! -->



<div class="card bg-dark text-white ">
    <img src="img\bannerLMSbw_optimized.jpg" class="img-fluid" alt="books">
    <div class="card-img-overlay">
        <!-- <h2>This is the main content</h2>
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text">Last updated 3 mins ago</p> -->

        <form class="d-flex justify-content-center align-items-center" action="">
            <div class="col-4 p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                <div class="input-group">
                    <input type="search" placeholder="Search Book" aria-describedby="button-addon1" class="form-control border-0 bg-light">
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




<!-- Library Grid -->
<div class="container zone">
    <div>
        <a class="zoneIcons" target="_blank" href="">
            <img src="img\book_1.png" alt="Data Storage" class="responsive">
            <h5 class="card-title">Great Expectations</h5>
            <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Charles Dickens</h7>
            <p class="card-text"><small>Details &#8231; Macmillan Collectors Library</small></p>
            <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
            <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
        </a>
    </div>
    <a class="zoneIcons" target="_blank" href="i">
        <img src="img\book_2.png" alt="Desktop Analitics" class="responsive">
    </a>
    <a class="zoneIcons" target="_blank" href="">
        <img src="img\book_3.png" alt="Files" class="responsive">
    </a>
    <a class="zoneIcons" target="_blank" href="">
        <img src="img\book_4.png" alt="Monitor Coding" class="responsive">
    </a>
    <a class="zoneIcons" target="_blank" href="">
        <img src="img\book_5.png" alt="Monitor Settings" class="responsive">
    </a>


</div>



<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col d-flex justify-content-center">
        <div class="row  container-card " style="width: 18rem; padding:10px">
            <img src="img\book_1.png" class="" style="padding:20px;" alt="...">
            <div class="card-body ">
                <h5 class="card-title">Great Expectations</h5>
                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Charles Dickens</h7>
                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Macmillan Collectors Library</small></p>
                <p style="color:gray;"><small>Available</small></p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
            </div>
        </div>
    </div>

    <div class="col d-flex justify-content-center">
        <div class=" row  container-card" style="width: 18rem; padding:10px">
            <img src="img\book_2.png" class="" style="padding:20px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">An Inconvenient Truth</h5>
                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Al Gore</h7>
                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Penguin Books</small></p>
                <p style="color:crimson;"><small>Not Available</small></p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
            </div>
        </div>
    </div>

    <div class="col d-flex justify-content-center">
        <div class="row  container-card " style="width: 18rem; padding:10px">
            <img src="img\book_3.png" class="" style="padding:20px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Oxford Dictionary</h5>
                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Oxford Press</h7>
                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Oxford Press</small></p>
                <p style="color:gray;"><small>Available</small></p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
            </div>
        </div>
    </div>

    <div class="col d-flex justify-content-center">
        <div class="row  container-card " style="width: 18rem; padding:10px">
            <img src="img\book_4.png" class="" style="padding:20px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">Anna Karenina</h5>
                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Leo Tolstoy</h7>
                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Star Publishing</small></p>
                <p style="color:gray;"><small>Available</small></p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
            </div>
        </div>
    </div>

    <div class="col d-flex justify-content-center">
        <div class="row  container-card " style="width: 18rem; padding:10px">
            <img src="img\book_5.png" class="" style="padding:20px;" alt="...">
            <div class="card-body">
                <h5 class="card-title">The Tale of Genji</h5>
                <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Murasaki Shikibu</h7>
                <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Kinokuniya</small></p>
                <p style="color:gray;"><small>Available</small></p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100">
            <div class="container-card-img">
                <img src="img\book_1.png" class="" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">Great Expectations</h5>
                <p class="card-text">Author &#8231; Charles Dickens</p>
                <p>Details &#8231; Macmillan Collectors Library</p>
                <a href="signup.php" class="btn btn-primary btn-sm" type="button">Borrow</a>
                <a href="login.php" class="btn btn-outline-secondary btn-sm" type="button">Edit</a>

            </div>

            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>

    <div class="col ">
        <div class="card h-100">
            <img src="img\book_2.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="img\book_3.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="img\book_4.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <img src="img\book_5.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
</div>

<?php
include_once("src/inc/footer.inc.php");
?>


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