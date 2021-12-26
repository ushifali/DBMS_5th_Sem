<?php

    $username = $_POST['username'];
    $password = $_POST['password1'];

    $con = mysqli_connect("localhost", "root", "", "roombooking");

    if (!$con) {
       die( " Connection failed. Please try again: Error: " . mysqli_connect_error() );
    }

    //to check if the username already exists in the database

    $username_existance_query = "SELECT usn from login where usn = '".$username."';";
    $query = mysqli_query($con, $username_existance_query);

    if(mysqli_num_rows($query) != 0)
    {
        die ("Username already exists");
        
    }

    $query_stmt = "INSERT INTO login values('$username', '$password')";   

    $query = mysqli_query($con, $query_stmt);

    if (!$query) {
        echo "Couldnt sign-up. please try again: Error: " . mysqli_error($con);
    }

header('Location: login.php');

    mysqli_close($con);

?>
