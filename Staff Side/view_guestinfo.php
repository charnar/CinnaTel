<!DOCTYPE html>
<?php
require_once('connect.php');

$bookingid = $_GET['bookingid'];
$roomno = $_GET['roomno'];

$q = "CALL getGuestBooking('$bookingid')";

$result = $mysqli -> query($q);
if(!$result) {
  die('Error here look at q: '.$q." //// ". $mysqli->error);
}

$row = $result -> fetch_array();


$DateFrom = strtotime($row['DateFrom']);
$DateTo = strtotime($row['DateTo']);
$diff = abs($DateTo - $DateFrom);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$TotalCost = $row['Price'] * ($days);

?>
<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="icon-css/all.min.css">
      <link rel="stylesheet" href="icon-css/fontawesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CinnaTel | Booking information</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="javascript: history.go(-1)">Back</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <h1 class="page-heading">Guest information</h1>


      <!-- Booking Information Container -->
      <div style="postion: relative;" class="room-container">
        <div class="room-container-left">
          <div class="room-image" style="background-image: url(<?php echo $row['ImageLink'];?>)"></div>
        </div>

        <div class="room-container-right">
            <h1><?php echo $row['Prefix'];?> <?php echo $row['Fname'];?> <?php echo $row['Lname'];?></h1>
            <h2>Email: <span><?php echo $row['Email'];?></span></h2>
            <h2>Phone: <span><?php echo $row['Phone'];?></span></h2>

            <h1 style="padding-top: 1em;"><?php echo $row['Name'];?>, <?php echo $row['Country'];?></h1>
            <h2 style="font-size: 25px; padding-bottom: 0.6em;"><?php echo $row['RoomName'];?> Room, Room No. <?php echo $roomno;?></h1>  <!-- Name of room type-->
            <h2>Guests: <span><?php echo $row['Adults'];?> Adults, <?php echo $row['Children'];?> Children</span></h2>
            <h2>Check-in: <span><?php echo $row['DateFrom'];?></span></h2>
            <h2>Check-out: <span><?php echo $row['DateTo'];?></span></h2>
            <h2>Price per night: <span>$<?php echo $row['Price'];?></span></h2>
            <h2>Amount due: <span>$<?php echo $TotalCost;?></span></h2>
        </div>
      </div>


      <div style="padding: 2em;"></div>





  </body>
</html>
