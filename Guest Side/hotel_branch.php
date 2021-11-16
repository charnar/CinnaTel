<!DOCTYPE HTML>

<?php
require_once('connect.php');
$hotelid = $_GET['hotelid'];

$q = "SELECT * FROM hotel WHERE HotelID = '$hotelid'";

$result = $mysqli -> query($q);
if(!$result) {
  die('Error here look at q: '.$q." //// ". $mysqli->error);
}

$hoteldata = $result -> fetch_array();
$altimagelink = substr_replace($hoteldata['ImageLink'], 'alt', 13, 0);

$q1 = "CALL displayRooms('$hotelid')";

$result1 = $mysqli -> query($q1);
if(!$result1) {
  die('Error here look at q1: '.$q1." //// ". $mysqli->error);
}

?>


<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="icon-css/all.min.css">
      <link rel="stylesheet" href="icon-css/fontawesome.min.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CinnaTel | Home</title>
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
      <div class="background-splash" style="background-image: url('<?php echo $hoteldata['ImageLink']?>');">
        <h1><?php echo $hoteldata['Name']?></h1>
        <h2><?php echo $hoteldata['Country']?></h2>
      </div>


    <!-- Contact and address info container -->
      <div class="hotel-info-bar">

        <div class="hotel-info-section">
          <div class="hotel-information">
            <i style="font-size:25px;color:white;" class='fas fa-phone'></i>
            <h1 style="margin-top: 17px">Phone</h1>
            <h2><?php echo $hoteldata['Phone'];?></h2>
          </div>
        </div>

        <div class="hotel-info-section">
          <div class="hotel-information">
            <i style="font-size:25px;color:white;" class='fas fa-map-marker-alt'></i>
            <h1 style="margin-top: 17px; margin-left: 5px;">Address</h1>
            <h2><?php echo $hoteldata['Address'];?>, <?php echo $hoteldata['Province']?>, <?php echo $hoteldata['Country']?></h2>
          </div>
        </div>

        <div class="hotel-info-section">
          <div class="hotel-information">
            <i style="font-size:25px;color:white;" class='fas fa-envelope-open'></i>
            <h1 style="margin-top: 17px">Email</h1>
            <h2><?php echo $hoteldata['Email'];?></h2>
          </div>
        </div>

      </div>

    <!-- About hotel branch container -->
      <div class="two-columns-container">
        <div class="even-column">
          <div class="image-column" style="background-image: url('<?php echo $altimagelink;?>')">
          </div>
        </div>

        <div class="even-column">
          <h1>About us</h1>
          <p><?php echo $hoteldata['Description'];?></p>
        </div>
      </div>
    <!-- End of About hotel branch container -->



    <!-- Room Container -->
      <div class="room-showcase-container">
        <h1>Explore our rooms</h1>

        <div class="room-showcase-grid">
          <!-- php for loop start here, use for only 1 room-showcase -->
          <?php while($roomdata = $result1 -> fetch_array()) { ?>

          <div class="room-showcase">
            <div class="room-showcase-image" style="background-image: url(<?php echo $roomdata['ImageLink']?>)"></div>
            <h1><?php echo $roomdata['Name'];?> Room</h1>
            <h2 style="font-size: 25px;">$<?php echo $roomdata['Price'];?> per night</h2>
            <h2 style="width: 90%; margin: auto; margin-top: 20px;"><?php echo $roomdata['Description'];?></h2>
          </div>
          <?php } ?>
          <!-- php for loop end here -->
        </div>
      </div>
    <!-- End of Room Container -->



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
