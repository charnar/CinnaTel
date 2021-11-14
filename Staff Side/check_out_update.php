<?php
    $guestid = $_POST['guestid'];
    $hotelid = $_POST['hotelid'];
    $bookid = $_POST['bookid'];
    $roomid = $_POST['roomid'];
    require_once('connect.php');
    echo "---check_in_update php desuyo---";
    // update room.Status to 0 --> room availiable

    $q="UPDATE room SET Status = 0
    WHERE RoomID = $roomid";

    $result = $mysqli -> query($q);
    if (!$result) {
        die('Error look at q : '.$q." //// ". $mysqli->error);
    }
    echo "<br>";
    echo "--room.Status updated--";


    // update roomsbooked.room to NULL--> room availiable
    $q1="UPDATE roomsbooked SET RoomID = NULL
    WHERE BookingID = $bookid";
    $result1 = $mysqli -> query($q1);
    if (!$result1) {
        die('Error look at q1 : '.$q1." //// ". $mysqli->error);
    }
    echo "<br>";
    echo "--roomsbooked.RoomID updated--";


    // update roomsbooked.Status to 0 --> check out leaw (REPLACE THIS WITH DELETE SOON)

    $q2="UPDATE roomsbooked SET Status = 0
    WHERE BookingID = $bookid";

    $result2 = $mysqli -> query($q2);
    if (!$result2) {
        die('Error look at q2 : '.$q2." //// ". $mysqli->error);
    }

    echo "<br>";
    echo "--roomsbooked.Status updated--";

    header("Location: receptionist_home.php");


    // START OF delete the booking, payment, guest, roomsbooked
    $q3 = "SELECT PaymentID FROM booking WHERE BookingID = $bookid";

    $result3 = $mysqli -> query($q3);
    if (!$result3) {
        die('Error look at q3 : '.$q3." //// ". $mysqli->error);
    }

    $pid=$result3->fetch_array();
    $paymentid= $pid['PaymentID'];


    //delete roomsbooked KABOOM TIME
    $q4 = "DELETE FROM roomsbooked WHERE BookingID = '$bookid'";
    $result4 = $mysqli -> query($q4);
    if (!$result4) {
        die('Error look at q4 : '.$q4." //// ". $mysqli->error);
    }

    //delete booking
    $q5 = "DELETE FROM booking WHERE BookingID = '$bookid'";
    $result5 = $mysqli -> query($q5);
    if (!$result5) {
        die('Error look at q5 : '.$q5." //// ". $mysqli->error);
    }

    //delete payment
    $q6 = "DELETE FROM payment WHERE PaymentID = '$paymentid'";
    $result6 = $mysqli -> query($q6);
    if (!$result6) {
        die('Error look at q6 : '.$q6." //// ". $mysqli->error);
    }

    //delete guest
    $q7 = "DELETE FROM guest WHERE GuestID = '$guestid'";
    $result7 = $mysqli -> query($q7);
    if (!$result7) {
        die('Error look at q7 : '.$q7." //// ". $mysqli->error);
    }

?>
