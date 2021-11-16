<!DOCTYPE html>


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
    $hotelid = $_SESSION['hotelid'];
    $checkin = $_SESSION['checkin'];
    $checkout = $_SESSION['checkout'];
    $adults = $_SESSION['adults'];
    $children = $_SESSION['children'];

    $q = "SELECT DISTINCT roomtype.TypeID, roomtype.Price FROM roomtype, room WHERE roomtype.TypeID = room.TypeID
    AND roomtype.MaxGuests >= '$totalguests' AND room.HotelID = '$hotelid'
    ORDER BY roomtype.Price";

    $result = $mysqli -> query($q);

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
      <title>CinnaTel | Book a room</title>
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
      <div class="background-splash" style="background-image: url(images/cover2.jpg)">
        <h1 style="top: 40%">Select a room</h1>
      </div>


    <!-- Form container for checking availability -->
      <div class="room-table">

        <!-- Insert SQL query / PHP for checking available rooms -->
        <!-- PHP for loop here to make many room cards -->
        <?php while($row=$result->fetch_array())  {
          $typeid = $row['TypeID'];
          //used to check if the room type is available or not
          $q1 = "SELECT roomtype.TypeID, roomtype.Name, roomtype.Description, roomtype.Price, roomtype.Spa,
          roomtype.Sauna, roomtype.Fitness, roomtype.Lounge, roomtype.ImageLink,
          (SELECT COUNT(booking.BookingID)
                FROM roomsbooked, booking WHERE roomsbooked.BookingID = booking.BookingID
                AND booking.DateFrom <= '$checkout'
                AND booking.DateTo >= '$checkin' AND roomsbooked.TypeID = '$typeid') AS TypeIDCountReserved,
          (SELECT COUNT(RoomID) FROM room WHERE TypeID = '$typeid') AS TypeIDRoomTotal
                FROM roomtype
                WHERE roomtype.TypeID = '$typeid'";

          $result1 = $mysqli -> query($q1);
          $row1=$result1->fetch_array();

          if (($row1['TypeIDRoomTotal'] - $row1['TypeIDCountReserved']) > 0)  { ?>
        <div class="room-container">
          <div class="room-container-left">
            <div class="room-image" style="background-image: url(<?php echo $row1['ImageLink'];?>)"></div>
          </div>

          <div class="room-container-right">
            <h1 style="font-weight: normal;"><?php echo $row1['Name'];?> Room</h1>  <!-- Name of room type-->
            <h2 style="font-weight: normal;">$<?php echo $row1['Price']?> per night</h2> <!-- Price of room type-->

            <p> <!-- Description of room type -->
              <?php echo $row1['Description'];?>
            </p>


            <?php if ($row1['Fitness'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-dumbbell service-icon'></i>
              <span style="margin-left: 5px; font-weight: normal;">Fitness</span>
            </div>
            <?php }?>

            <?php if ($row1['Lounge'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-glass-martini-alt service-icon'></i>
              <span style="margin-left: 10px; font-weight: normal;">Lounge</span>
            </div>
            <?php }?>

            <?php if ($row1['Sauna'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-hot-tub service-icon'></i>
              <span style="margin-left: 10px; font-weight: normal;">Sauna</span>
            </div>
            <?php }?>

            <?php if ($row1['Spa'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-spa service-icon'></i>
              <span style="margin-left: 7.5px; font-weight: normal;">Spa</span>
            </div>
            <?php }?>


            <form action="guest_information.php" method="post"> <!-- Submit button *change the value to the roomType.TypeID so it can be posted -->
              <input type="hidden" name="typeid" value="<?php echo $typeid;?>">
              <input type="hidden" name="hotelid" value="<?php echo $hotelid;?>">
              <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
              <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
              <input type="hidden" name="adults" value="<?php echo $adults;?>">
              <input type="hidden" name="children" value="<?php echo $children;?>">
              <input type="hidden" name="roomname" value="<?php echo $row1['Name'];?>">
              <input type="hidden" name="price" value="<?php echo $row1['Price'];?>">
              <input type="hidden" name="imagelink" value="<?php echo $row1['ImageLink'];?>">
              <button type="submit" name="submit" class="hover-button" style="z-index: 1; margin-top: 1.25em;">Book now</button>
            </form>

          </div>
        </div>
      <?php } }?>

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
