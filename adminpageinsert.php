<?php

if(isset($_POST['roomno']))
{
    $hostelno =$_POST['hostel'];
    $roomno = $_POST['roomno'];
    $beds = $_POST['beds'];

    $con = mysqli_connect("localhost", "root", "", "roombooking");


    $room_insert = "INSERT INTO room values('$hostelno', $roomno,$beds,'0','No');";
    mysqli_query($con, $room_insert);

    // echo mysqli_error($con);

    header('Location: adminpage.php');
    mysqli_close($con);
}



?>