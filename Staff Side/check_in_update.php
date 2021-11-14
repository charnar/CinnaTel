<?php
    $guestid = $_POST['guestid'];
    $hotelid = $_POST['hotelid'];
    $bookid = $_POST['bookid'];
    $roomid = $_POST['roomid'];
    require_once('connect.php');
    echo "---check_in_update php desuyo---";
    // update room.Status to 1 --> room not availiable

    $q="UPDATE room SET Status = 1
    WHERE RoomID = $roomid";

    $result = $mysqli -> query($q);
    if (!$result) {
        die('Error look at q : '.$q." //// ". $mysqli->error);
    }
    echo "<br>";
    echo "--room.Status updated--";


    // update roomsbooked.RoomID to 1 --> assign the room to the guest

    $q1="UPDATE roomsbooked SET RoomID = $roomid
    WHERE BookingID = $bookid";

    $result1 = $mysqli -> query($q1);
    if (!$result1) {
        die('Error look at q : '.$q1." //// ". $mysqli->error);
    }
    echo "<br>";
    echo "--roomsbooked.RoomID updated--";


    // update roomsbooked.Status to 1 --> check in leaw

    $q2="UPDATE roomsbooked SET Status = 1
    WHERE BookingID = $bookid";

    $result2 = $mysqli -> query($q2);
    if (!$result2) {
        die('Error look at q : '.$q2." //// ". $mysqli->error);
    }

    echo "<br>";
    echo "--roomsbooked.Status updated--";

    header("Location: receptionist_home.php");


?>
