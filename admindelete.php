<?php

if(isset($_POST['roomno']))
{
    $hostelno =$_POST['hostel'];
    $roomno = $_POST['roomno'];
  
    $con = mysqli_connect("localhost", "root", "", "roombooking");


    $room_insert = "DELETE from room where hid='".$hostelno."' and roomno='".$roomno."';";
    $x =mysqli_query($con, $room_insert);
    if(!$x){
        echo "Couldnt delete as the room doesnt exists";
        exit();
    }

    // echo mysqli_error($con);

    header('Location: adminpage.php');
    mysqli_close($con);
}
