<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/validation_logic.js"></script>
</head>

<body>
    <header>
        <span>Logo</span>
    </header>
    <nav>
        <a href="#">Sign Up</a>
        <a href="#">Login</a>
        <a href="#">Browse</a> <!-- Browse and borrow a book (Members) -->
        <a href="#">Return/Delete</a> <!-- Return or delete a book (Admin only) -->
        <a href="#">Edit</a> <!-- Edit book details (Admin only) -->
        <a href="#">Logout</a>
    </nav>


    <!--Navbar-->
    <nav class="sticky-top navbar navbar-expand-lg d-flex justify-content-between" aria-label="Main navigation">

        <div class="">
            <a href="index.html">
                <img src="img/GE_logo_on_white.png" class="gelos-brand-center" alt="gelos-brand" style="margin: 8px;">
                <!-- Gelos Logo -->
            </a>
        </div>

        <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-line"></span><!--lines from the humburger menu-->
            <span class="toggler-icon middle-line"></span>
            <span class="toggler-icon bottom-line"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0" id="myMenu">
                <!-- added a bit of margin to center navbar items better since the search box is "camuflated" -->
                <li>
                    <a class="navbar-brand d-none d-md-block" href="index.html" style="margin: 0px 0px 0px 80px;">
                        <img src="img/GE_logo_on_white.png" alt="gelos-brand" class="gelos-brand-start" style="margin: 0px 0px 5px 0px;">
                    </a>
                <li class="nav-item">
                    <a class="nav-link zone" href="index.html#section1" style="color:white">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link zone" href="index.html#section2" style="color:white">Return/Delete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link zone" href="index.html#section3" style="color:white">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link zone" href="index.html#section4" style="color:white">Logout</a>
                </li>
            </ul>

            <!--"d-flex was used to get the search box and icon inline"-->
            <form class="d-flex">

                <!-- previsous button -->
                <!-- <button class="btn btn-sm btn-outline-dark" type="submit" >Search</button> -->

                <!--choosed to customise the bootstrap template for aesthatics-->
                <button type="submit" class="btn btn-secondary" STYLE="margin: 0px 0px 7px 0px">
                    <svg style="color:white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg>
                </button>
                <label hidden="hidden" for="search">Search</label>
                <input class="search-box input-small" type="search" id="search" name="search" placeholder="Search">

            </form>
        </div>
    </nav>

    <!-- 
1.	Sign-up
2.	Log-in
3.	Browse and borrow a book (Members)
4.	Return or delete a book (Admin only)
5.	Edit book details (Admin only) 
6.	Log-out. 
-->