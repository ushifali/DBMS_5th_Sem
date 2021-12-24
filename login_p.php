<?php

 session_start();
 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "roombooking");

    if (!$con) {
       die( " Connection failed. Please try again: Error: " . mysqli_connect_error() );
    }

    //to check if the username already exists in the database

    $username_existance_query = "SELECT password,usn from login where usn = '".$username."';";
    $query = mysqli_query($con, $username_existance_query);

    $query_result = mysqli_fetch_array($query);

    // echo "$query_result[upassword] ";

    if($query_result['password']  == $password && $query_result['usn'] == "admin")
    {
        header("Location : adminpage.php");
    mysqli_close($con);
    exit();
    }

    else if($query_result['password']  == $password)
    {
        $_SESSION['usn'] = $username;
        header('Location: profile.php');
    mysqli_close($con);
    exit(); 
    }

    else {
        echo "Login failed. Please try again: Error: ";
    }

    mysqli_close($con);

    ?>
