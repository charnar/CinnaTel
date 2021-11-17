<!DOCTYPE HTML>
<?php
require_once('connect.php');

if (isset($_POST['receptionist_submit']))  {
  $hotelID = $_POST['receptionist_submit'];
}


?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CinnaTel Staff | Guest List</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <?php if (isset($_POST['manager_submit']))  {
          $hotelID = $_POST['manager_submit']?>
        <a class="nav-button" href="manager_home.html">Hotel Branches</a>
        <?php } ?>

        <a class="nav-button" href="javascript: history.go(-1)">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <h1 class="page-heading">Guest List</h1>

      <?php

        $q = "SELECT Name, Province, Country FROM hotel WHERE HotelID = $hotelID";
        $result = $mysqli -> query($q);
        $row = $result -> fetch_array();

        $q = "SELECT guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, booking.DateFrom, booking.DateTo, roomtype.Name, room.No, booking.BookingID
        FROM guest, booking, roomsbooked, room, roomtype, hotel
        WHERE guest.GuestID = booking.GuestID
        AND booking.BookingID = roomsbooked.BookingID
        AND roomsbooked.TypeID = roomtype.TypeID
        AND roomsbooked.RoomID = room.RoomID
        AND booking.HotelID = hotel.HotelID
        AND roomsbooked.Status = 1
        AND hotel.HotelID = '$hotelID'
        GROUP BY booking.BookingID";

        $result = $mysqli -> query($q);
        if(!$result){
            echo "Select failed. Error: ".$mysqli->error;
            return false;
        }

      ?>

      <!-- List of all guests container -->
      <div class="guest-table">

        <?php while($row=$result->fetch_array()){ ?>
        <!-- This is for 1 guest -->
        <a style="text-decoration: none; color: var(--dark_oak_brown);" href="view_guestinfo.php?bookingid=<?=$row['BookingID']?>&roomno=<?=$row['No']?>">
          <div class="guest-container">
            <div class="guest-container-left">
              <h1><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></h1>
              <h2>Guests: <?=$row['Adults']?> Adults, <?=$row['Children']?> Children</h2>
              <h2><?=$row['Name']?></h2>
              <h2>Room No. <?=$row['No']?></h2>
            </div>

            <div class="guest-container-right" style="margin-top: auto;">
              <h2>Check-in: <?=$row['DateFrom']?></h2>
              <h2>Check-out: <?=$row['DateTo']?></h2>
            </div>

          </div>
        </a>
        <!-- End of "this is for 1 guest" -->
        <?php } ?>

      </div>
      <!-- End of List of all guests container -->



  </body>
</html>
