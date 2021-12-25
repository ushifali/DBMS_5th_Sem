<?php

if(isset($_POST['roomno']))
{
    $hostelno =$_POST['hostel'];
    $roomno = $_POST['roomno'];

    $con = mysqli_connect("localhost", "root", "", "roombooking");


    $room_insert = "INSERT INTO room values('$hostelno', $roomno,'No');";
    mysqli_query($con, $room_insert);

    header('Location: adminpage.php');
    mysqli_close($con);
}



?>