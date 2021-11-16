<!DOCTYPE html>
<?php
session_start();
require_once('connect.php');


$hotelid = $_SESSION['hotelid'];
$price = $_SESSION['price'];

$DateFrom = strtotime($_SESSION['checkin']);
$DateTo = strtotime($_SESSION['checkout']);
$diff = abs($DateTo - $DateFrom);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$TotalCost = $price * ($days);

$qhotel = "SELECT Name, Country FROM hotel WHERE HotelID = $hotelid";

$result = $mysqli -> query($qhotel);
if(!$result) {
  die('Error here look at q: '.$qhotel." //// ". $mysqli->error);
}

$row = $result -> fetch_array();
$hotelname = $row['Name'];
$hotelcountry = $row['Country'];



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
      <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a href="index.html" style="text-decoration: none;">
          <h1 class="logo">Cinnamon Hotels & Resorts</h1>
        </a>

        <!-- Top right hamburger menu -->
        <div class=menu-wrap>
            <input type="checkbox" class="toggler">
            <div class="hamburger"><div></div></div>
            <div class="menu">
              <div>
                <div>
                  <ul>
                    <li><a href='index.html'>Home</a></li>
                    <li><a href='hotels.html'>Find a hotel</a></li>
                    <li><a href='book_room.html'>Book a room</a></li>
                    <li><a href='about.html'>About us</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>

    <!-- Home screen image and text -->
      <div class="background-splash" style="background-image: url(images/cover1.jpg)">
        <h1 style="top: 40%">Booking confirmed</h1>
      </div>


        <!-- Insert SQL query / PHP for checking available rooms -->
        <!-- PHP for loop here to make many room cards -->
        <div style="postion: relative; margin-top: -200px;" class="room-container">
          <div class="room-container-left">
            <div class="room-image" style="background-image: url(<?php echo $_SESSION['imagelink'];?>)"></div>
          </div>

          <div class="room-container-right">
              <h1><?php echo $_SESSION['prefix'];?> <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname'];?></h1>
              <h2>Email: <span><?php echo $_SESSION['email'];?></span></h2>
              <h2>Phone: <span><?php echo $_SESSION['phonenum'];?></span></h2>

              <h1 style="padding-top: 1em;"><?php echo $hotelname;?>, <?php echo $hotelcountry;?></h1>
              <h2 style="font-size: 25px; padding-bottom: 0.6em;"><?php echo $_SESSION['roomname'];?> Room</h1>  <!-- Name of room type-->
              <h2>Guests: <span><?php echo $_SESSION['adults'];?> Adults, <?php echo $_SESSION['children'];?> Children</span></h2>
              <h2>Check-in: <span><?php echo $_SESSION['checkin'];?></span></h2>
              <h2>Check-out: <span><?php echo $_SESSION['checkout'];?></span></h2>
              <h2>Price per night: <span>$<?php echo $_SESSION['price'];?></span></h2>
              <h2>Amount due: <span>$<?php echo $TotalCost;?></span></h2>
          </div>
        </div>


      <div style="text-align: center; padding: 2em;">
        <h1 style="font-weight: normal">You will receive an email on your booking shortly</h1>
        <button onclick="location.href='index.html'" class="hover-button" style="z-index: 1; margin-top: 1.25em; margin-right: 10px;">Proceed</button>
      </div>



      <!-- Bottom Footer container -->
      <div class="container-bottom-footer">
        <div class="footer-section">
          <a href="about.html">About us</a>
          <a href="hotels.html">Find a hotel</a>
          <a href="book_room.html">Book a room</a>
        </div>

        <div class="footer-section">
          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-map-marker-alt'></i>
            <h1 style="margin-top: 17px; margin-left: 5px;">Main Headquarters</h1>
            <h2>3/325 Final Road, Cinnamon Islands</h2>
          </div>

          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-envelope-open'></i>
            <h1 style="margin-top: 17px">Email</h1>
            <h2>support@cinnatel.org</h2>
          </div>

        </div>

        <div class="footer-section">
          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-phone'></i>
            <h1 style="margin-top: 17px">Phone</h1>
            <h2>02-420-6969</h2>
          </div>
        </div>
      </div>
      <!-- End of Bottom Footer container -->

  </body>
</html>
