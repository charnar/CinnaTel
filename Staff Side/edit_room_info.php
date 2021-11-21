<!DOCTYPE html>

<?php
require_once('connect.php');

$hotelid = $_GET['hotelid'];
$typeid = $_GET['typeid'];

$q = "SELECT * FROM hotel WHERE HotelID = $hotelid";
$result = $mysqli -> query($q);
$row = $result -> fetch_array();

$qRoomType = "SELECT * FROM roomtype WHERE TypeID = $typeid";
$result1 = $mysqli -> query($qRoomType);
$roomrow = $result1 -> fetch_array();


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
      <title>CinnaTel Staff | Edit Hotel Information</title>
      <link rel="stylesheet" href="stylestaff.css">
      <link rel="stylesheet" href="stylecontainers.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="manager_home.html">Hotel Branches</a>
        <a class="nav-button" href="manager_hotel_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <div style="width: 100%; margin-top: 60px;"></div>

      <div class="hotel-heading" style="position: relative; text-align: center; padding-top: 2em; ">
        <h1 class="hotel-name"><?php echo $row['Name'];?></h1>
        <h2 class="hotel-location"><?php echo $row['Province'];?>, <?php echo $row['Country'];?></h2>
      </div>

      <h1 class="page-heading">Edit Room Information</h1>
      <!-- Room Edit Information Form -->


      <div class="room-form-container">
        <div class="room-form-left">
          <div class="room-image" style="background-image: url(<?php echo $roomrow['ImageLink'];?>)"></div>
        </div>

        <div class="room-form-right">
          <form action="edit_information.php" method="post"> <!-- Submit button *change the value to the roomType.TypeID so it can be posted -->

              <input type="text" id="roomname" name="roomname" value="<?php echo $roomrow['Name'];?>">

              <input type="text" id="price" name="price" value="<?php echo $roomrow['Price'];?>">

              <input type="text" id="guests" name="guests" value="<?php echo $roomrow['MaxGuests'];?>">

              <h1></h1>
              <textarea id="description" name="description" rows="10" cols="31"><?php echo $roomrow['Description'];?></textarea>

              <input type="hidden" name="hotelid" value="<?php echo $hotelid;?>">
              <input type="hidden" name="typeid" value="<?php echo $typeid;?>">

              <h1></h1>
              <button type=button onclick="history.go(-1)" class=hover-button style="z-index: 1; margin-right: 10px; margin-top: 1.25em;">Go Back</button>
              <button type="submit" name="submit" class="hover-button" style="z-index: 1; margin-top: 1.25em; margin-right: 10px;">Confirm booking</button>
          </form>

        </div>
      </div>






  </body>
</html>
