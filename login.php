<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/footer.css">

</head>

<body>

    <nav id="nav">
        <!-- <div class="logo">
            <img src="logo.svg" alt="Logo Image">
        </div> -->
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <!-- <li><a href="homepage.php">Book Room</a></li> -->

            <?php if (!isset($_SESSION['usn'])) { ?>
                <li><button class="login-button"><a href="login.php">Login</a></button></li>

            <?php } else { ?>
                <li><button class="login-button"><a href="profile.php">Profile</a></button></li>
                <li><button class="login-button"><a href="logout.php">Logout</a></button></li>
            <?php } ?>
        </ul>
    </nav>


    <?php if (!isset($_SESSION['usn'])) { ?>
        <div class="containerx">
            <div class="card">
                <h1 class="card-title">Welcome!</h1>
                <form class="card-form" method="POST" action="login_p.php">
                    <label for="username">Username</label>
                    <div class="card-input-container username">
                        <input type="text" id="username" name="username">
                    </div>
                    <label for="password">Password</label>
                    <div class="card-input-container password">
                        <input type="password" id="password" name="password">
                    </div>
                    <button type="submit" class="card-button">Log In</button>
                    <medium class="card-forgot-password">No Account ? <a href="signup.php">Click here to Create</a></medium>
                </form>
            </div>
        </div>
    <?php } ?>

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">


            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    A website to book hostel rooms.
                <h2>Contact Us</h2>
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Shifali U</h5>

                        <ul class="list-unstyled mb-0">
                            <a href="http://www.instagram.com/u_shifali"><i class="fab fa-instagram contact_us_icon"></i></a>
                            <a href="https://github.com/ushifali"><i class="fab fa-github contact_us_icon"></i></a>
                            <a href="https://www.linkedin.com/in/shifali-u-055748192/"><i class="fab fa-linkedin contact_us_icon"></i></a>

                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Shivani Karkera</h5>

                        <ul class="list-unstyled mb-0">
                            <a href="http://www.instagram.com/shivani_.karkera"><i class="fab fa-instagram contact_us_icon"></i></a>
                            <a href="https://github.com/shivanikarkera"><i class="fab fa-github contact_us_icon"></i></a>
                            <a href=""><i class="fab fa-linkedin contact_us_icon"></i></a>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright: All rights reserved
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="nav.js"></script>
</body>

</html>