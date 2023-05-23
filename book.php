<?php
include_once("src/inc/config.php");
include_once("src/inc/header.inc.php");
?>

<div class="container-sm d-flex justify-content-center" id="bookdetails" style="margin-top:75px">

    <div class="container-text" role="grid" aria-label="Text Grid">
        <div class=" col align-content-start" role="grid" aria-label="Text Grid">

            <div class="row d-flex flex-row container-text justify-content-center" role="row">
                <div class="col-12 col-md-4 d-flex justify-content-center" role="gridcell">
                    <img src="img\book_1.png" class="img-fluid p-2" id="bookcover" alt="book cover">
                </div>
                <div class="col-12 col-md-6 p-2" role="gridcell"> <!--alternative for "flex row reverse" in this case would be "order-md-last" -->
                    <h2 class="d-flex flex-row align-items-center justify-content-start" style="font-size: clamp(22px, 3vw, 45px);">
                        An Inconvenient Truth
                    </h2>
                    <h7 class="card-subtitle mb-2 text-muted">Author &#8231; Charles Dickens</h7>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Details &#8231; Macmillan Collectors Library</small></p>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Language &#8231; English</small></p>
                    <p class="card-text" style="margin-bottom: 0px;"><small>Category &#8231; Fiction</small></p>
                    <p style="padding-top: 30px ;font-size: clamp(15px, 2vw, 22px); text-align:justify">
                        The classic novel chronicles the coming of age of the orphan
                        Pip while also addressing such issues as social class and human worth.
                    </p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">Available</option>
                        <option value="2">Not Available</option>
                        <option value="3">On loan</option>
                        <option value="4">Deleted</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>


<div class="container-lg d-flex justify-content-center">

    <section class="container-form col bd-content ps-lg-2">
        <!-- <h1>Book</h1><br><br> -->
        <form class="col align-self-center" action="#" method="post">

            <div class="row mb-3">
                <div class="col align-self-center">
                    <label for="booktile" class="form-label">Book Title</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="booktitle" name="booktitle" aria-label="Book title">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="author" class="form-label">Author</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="author" name="author" aria-label="Author">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pulisher" class="form-label">Publisher</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="publisher" name="publisher" aria-label="Publisher">
                </div>
            </div>

            <div class="row mb-3">
                <label for="language" class="form-label">Language</label>
                <div class="col-sm-12">
                    <select class=" form-select " id="language" aria-label="language">
                        <option selected>Select</option>
                        <option value="1">English</option>
                        <option value="2">Japanese</option>
                        <option value="3">Russian</option>
                    </select>
                </div>

            </div>

            <div class="row mb-3">
                <label for="category" class="form-label">Category</label>
                <div class="col-sm-12">
                    <select class=" form-select" id="category" aria-label="category">
                        <option selected>Select</option>
                        <option value="1">Fiction</option>
                        <option value="2">Nonfiction</option>
                        <option value="3">Reference</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Update</button>


        </form>




    </section>
</div>



</body>

<?php
include_once("src/inc/footer.inc.php");
?>