<!DOCTYPE html>

<?php
session_start();
require_once('connect.php');  //connect to phpmyadmin

// takes information from the check availability form
if (isset($_POST['submit']))    {
    $_SESSION['hotelid'] = $_POST['hotelid'];
    $_SESSION['roomname'] = $_POST['roomname'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['typeid'] = $_POST['typeid'];
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['children'] = $_POST['children'];
    $_SESSION['imagelink'] = $_POST['imagelink'];
}

$hotelid = $_SESSION['hotelid'];
$typeid = $_SESSION['typeid'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];
$adults = $_SESSION['adults'];
$children = $_SESSION['children'];
$price = $_SESSION['price'];
$roomname = $_SESSION['roomname'];
$imagelink = $_SESSION['imagelink'];


$DateFrom = strtotime($checkin);
$DateTo = strtotime($checkout);
$diff = abs($DateTo - $DateFrom);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$TotalCost = $price * ($days);

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
      <title>CinnaTel | Guest information</title>
      <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a href="main.html" style="text-decoration: none;">
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
                    <li><a href='main.html'>Home</a></li>
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
        <h1 style="top: 40%">Guest details</h1>
      </div>


    <!-- Form container for checking availability -->
      <div class="room-table">
        <!-- Insert SQL query / PHP for checking available rooms -->
        <!-- PHP for loop here to make many room cards -->
        <div class="room-form-container">
          <div class="room-form-left">
            <div class="room-image" style="background-image: url(<?php echo $imagelink;?>)"></div>
            <h1 class="room-heading" style="padding-top: 0.4em; font-weight: normal;"><?php echo $roomname?> Room</h1>  <!-- Name of room type-->
            <h2 style="padding-top: 0.2em; padding-right: 1em; display: inline; font-weight: normal;">Check-in: <span><?php echo $checkin;?></span></h2>
            <h2 style="padding-top: 0.2em; display: inline; font-weight: normal;">Check-out: <span><?php echo $checkout;?></span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Guests:
              <span style="color: var(--dark_oak_brown)"> <?php echo $adults;?> Adults <?php echo $children;?> Children</span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Price per night: <span>$<?php echo $price;?></span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Amount due: <span>$<?php echo $TotalCost?></span></h2>
          </div>

          <div class="room-form-right">
            <form action="booking_insert.php" method="post"> <!-- Submit button *change the value to the roomType.TypeID so it can be posted -->

                <h1 style="font-weight: normal;">Guest information</h1>
                <select id="prefix" name="prefix">
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Prof.">Prof.</option>
                </select>

                <input type="text" id="fname" name="fname" placeholder="First name">
                <input type="text" id="lname" name="lname" placeholder="Last name">
                <input type="text" id="email" name="email" placeholder="Email address">
                <input type="text" id="phonenum" name="phonenum" placeholder="Phone number">

                <select id="country" name="country" placeholder="Country">
                  <option value="Black Legion">Black Legion</option>
                  <option value="Thousand Sons">Thousand Sons</option>
                  <option value="World Eaters">World Eaters</option>
                  <option value="Death Guard">Death Guard</option>
                </select>

                <h1 style="padding-top: 1.2em; font-weight: normal;">Payment information</h1>
                <select id="method" name="method" >
                  <option value="Credit Card">Credit Card</option>
                  <option value="Bank Transfer">Bank Transfer</option>
                  <option value="Kidney">Your Kidney</option>
                  <option value="Crypto">Cryptocurrency</option>
                  <option value="Your Soul">Your Soul</option>
                </select>

                <div class="">
                  <input type="text" id="Ricardo" name="cardnum" placeholder="Card number">
                  <input type="text" id="exp" name="exp" placeholder="Expiration date (MM/YY)">
                  <input type="text" id="CV" name="CV" placeholder="CV2">
                </div>

                  <input type="hidden" name="hotelid" value="<?php echo $hotelid;?>">
                  <input type="hidden" name="typeid" value="<?php echo $typeid;?>">
                  <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
                  <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
                  <input type="hidden" name="adults" value="<?php echo $adults;?>">
                  <input type="hidden" name="children" value="<?php echo $children;?>">
                  <input type="hidden" name="price" value="<?php echo $price;?>">
                  <input type="hidden" name="roomname" value="<?php echo $roomname;?>">
                  <input type="hidden" name="imagelink" value="<?php echo $imagelink;?>">


                  <button type=button onclick="history.go(-1)" class=hover-button style="z-index: 1; margin-right: 10px; margin-top: 1.25em;">Go Back</button>
                  <button type="submit" name="submit" class="hover-button" style="z-index: 1; margin-top: 1.25em; margin-right: 10px;">Confirm booking</button>
            </form>

          </div>
        </div>
      </div>



      <!-- Bottom Footer container -->
      <div class="container-bottom-footer">
        <div class="footer-section">
          <a href="about.html">About us</a>
          <a href="about.html">Find a hotel</a>
          <a href="about.html">Book a room</a>
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
