<?php

session_start();

if (isset($_GET['q']) && isset($_GET['p'])) {
    $hostelno = $_GET['q'];
    $roomno = $_GET['p'];

    // echo $hostelno;
    // echo $roomno;

    $con = mysqli_connect("localhost", "root", "", "roombooking");


    //to update in bookedrooms table

    $deleteroomallocated = "delete from roomallocated where hid='$hostelno' and roomno = $roomno;";
    $deleteroomallocated_execute = mysqli_query($con, $deleteroomallocated);
    if (!$deleteroomallocated_execute) {
        echo mysqli_error($con);
        exit();
    }


    //if fully filled update the status to no

    $check_room_filled = "Select maxbeds, bedsbooked from room where hid='$hostelno' and roomno = $roomno;";
    $check_room_executed = mysqli_query($con, $check_room_filled);
    $result = mysqli_fetch_assoc($check_room_executed);
    if ($result['maxbeds'] == $result['bedsbooked']) {
        $rooms_allot = "Update room set alloted='No' where hid='$hostelno' and roomno = $roomno;";

        $rooms_allot_execute = mysqli_query($con, $rooms_allot);
        if (!$rooms_allot_execute) {
            echo mysqli_error($con);
            exit();
        }
    }

    //to update the bed filled


    $drooms = "Update room set bedsbooked=bedsbooked-1 where hid='$hostelno' and roomno = $roomno;";
    $drooms_execute = mysqli_query($con, $drooms);

    if (!$drooms_execute) {
        echo mysqli_error($con);
        exit();
    }


    
}

?>