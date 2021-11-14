<?php
session_start();
require_once('connect.php');  //connect to phpmyadmin

// takes information from the check availability form
if (isset($_POST['submit']))    {
    $_SESSION['hotelid'] = $_POST['hotelid'];
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
    $_SESSION['adults'] = $_POST['adults'];
    if ($_SESSION['adults'] == "")  {
      $_SESSION['adults'] = 0;
    }
    $_SESSION['children'] = $_POST['children'];
    if ($_SESSION['children'] == "")  {
      $_SESSION['children'] = 0;
    }
}

    $totalguests = $_SESSION['adults'] + $_SESSION['children'];
    $hoteid = $_SESSION['hotelid'];

    $q = "SELECT DISTINCT roomtype.TypeID FROM roomtype, room WHERE roomtype.TypeID = room.TypeID AND roomtype.MaxGuests <= '$totalguests' AND room.HotelID = '$hotelid'";

    $result = $mysqli -> query($q);

?>
