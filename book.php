<?php
if (isset($_GET['q']) && isset($_GET['p'])) {
    $hostelno = $_GET['q'];
    $roomno = $_GET['p'];


    $con = mysqli_connect("localhost", "root", "", "roombooking");

    $rooms = "Update room set bedsbooked=bedsbooked+1 where hid=$hostelno and roomno = $roomno;";
    $rooms_execute = mysqli_query($con, $rooms);

    if (!$rooms_execute) {
        echo mysqli_error($con);
    }

    $check_room_filled = "Select maxbeds, bedsbooked from room where hid=$hostelno and roomno = $roomno;";
    $check_room_executed = mysqli_query($con, $check_room_filled);
    $result = mysqli_fetch_assoc($check_room_executed);
    if ($result['maxbeds'] == $result['bedsbooked']) {
        $rooms_allot = "Update room set alloted='Yes' where hid=$hostelno and roomno = $roomno;";

        $rooms_allot_execute = mysqli_query($con, $rooms_allot);
        if (!$rooms_allot_execute) {
            echo mysqli_error($con);
        }
        
    }
}




?>


<!-- create table roomallocated(
    usn varchar(20) not null primary key,
    a_date date not null,
    hid varchar(20),
    roomno int,
    foreign key(usn) REFERENCES
    login(usn) on DELETE CASCADE on UPDATE CASCADE,
    foreign key(hid) REFERENCES
    hostel(hid) on DELETE CASCADE on UPDATE CASCADE,
    foreign key(roomno) REFERENCES
    room(roomno) on DELETE CASCADE on UPDATE CASCADE);
     -->