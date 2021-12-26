<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/homepage.css" />
    <link rel="stylesheet" href="css/bookroom.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">



    <title>Home Page</title>
</head>

<body>
    <nav id="nav">

        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><button class="login-button"><a href="girlsbooking.php">Girls Hostel</a></button></li>
            <li><button class="login-button"><a href="boysbooking.php">Boys Hostel</a></button></li>


            <li><button class="login-button"><a href="profile.php">Profile</a></button></li>
            <li><button class="login-button"><a href="logout.php">Logout</a></button></li>

        </ul>
    </nav>

<div>
    <?php

    session_start();

    if (isset($_GET['q']) && isset($_GET['p'])) {
        $hostelno = $_GET['q'];
        $roomno = $_GET['p'];


        $con = mysqli_connect("localhost", "root", "", "roombooking");



        //to update in bookedrooms table

        $roomallocated = "insert into roomallocated values('" . $_SESSION['usn'] . "','" . date("Y/m/d") . "'," . $hostelno . ", $roomno);";
        $roomallocated_execute = mysqli_query($con, $roomallocated);
        if (!$roomallocated_execute) {
            
            echo "<h2 style=\"padding-top:100px;padding-left:20px;\">Booking Failed! <br>You already booked a room! Please check profile.</h2>";
            exit();
        }


        //to update the bed filled


        $rooms = "Update room set bedsbooked=bedsbooked+1 where hid=$hostelno and roomno = $roomno;";
        $rooms_execute = mysqli_query($con, $rooms);

        if (!$rooms_execute) {
            echo mysqli_error($con);
            exit();
        }


        //if fully filled update the status

        $check_room_filled = "Select maxbeds, bedsbooked from room where hid=$hostelno and roomno = $roomno;";
        $check_room_executed = mysqli_query($con, $check_room_filled);
        $result = mysqli_fetch_assoc($check_room_executed);
        if ($result['maxbeds'] == $result['bedsbooked']) {
            $rooms_allot = "Update room set alloted='Yes' where hid=$hostelno and roomno = $roomno;";

            $rooms_allot_execute = mysqli_query($con, $rooms_allot);
            if (!$rooms_allot_execute) {
                echo mysqli_error($con);
                exit();
            }
        }


        header("Location: profile.php");
    }




    ?>
</div>

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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="nav.js"></script>
</body>

</html>