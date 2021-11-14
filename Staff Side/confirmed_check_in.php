<!DOCTYPE HTML>
<?php
require_once('connect.php');


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
      <title>CinnaTel Staff | Check-in confirmed</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <a class="nav-button" href="receptionist_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <h1 class="page-heading">Check-in successful</h1>

      <?php
        if(isset($_POST['submit'])){
            $guestid = $_POST['guestid'];
            $hotelid = $_POST['hotelid'];
            $roomid = $_POST['roomid'];
            $bookid = $_POST['bookid'];

            $q = "SELECT guest.Prefix, guest.Fname, guest.Lname, booking.Adults, booking.Children, roomtype.Name, roomtype.Price, booking.DateFrom,
            booking.DateTo, payment.Method, guest.GuestID, hotel.HotelID, booking.BookingID
            FROM guest, booking, roomsbooked, room, roomtype, payment, hotel
            WHERE guest.guestID = booking.guestID
            AND booking.BookingID = roomsbooked.BookingID
            AND roomsbooked.TypeID = roomtype.TypeID
            AND booking.HotelID = hotel.HotelID
            AND booking.PaymentID = payment.PaymentID
            AND hotel.HotelID = '$hotelid'
            AND guest.guestID = '$guestid'
            AND booking.BookingID = '$bookid'";

            $result = $mysqli -> query($q);
            if(!$result){
                echo "Select failed. Error: ".$mysqli->error;
                return false;
            }

            $row=$result->fetch_array();

            $DateFrom = strtotime($row['DateFrom']);
            $DateTo = strtotime($row['DateTo']);

            $diff = abs($DateTo - $DateFrom);

            $years = floor($diff / (365*60*60*24));

            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            $TotalCost = $row['Price'] * ($days);

        }
      ?>

      <!-- List of all guests container -->

      <!-- This is the guest card -->
      <div class="guest-container">
          <div class="guest-container-left">
            <h1><?=$row['Prefix']?> <?=$row['Fname']?> <?=$row['Lname']?></h1>
            <h2>Guests: <?=$row['Adults']?> Adults, <?=$row['Children']?> Children</h2>
            <h2><?=$row['Name']?></h2>
            <h2>Price per night: $<?=$row['Price']?></h2>
            <h2>Check-in: <?=$row['DateFrom']?></h2>
            <h2>Check-out: <?=$row['DateTo']?></h2>

          </div>

          <div class="guest-container-right" style="margin-top: auto;">
            <h2>Amount due: $<?=$TotalCost?></h2>
            <h2>Payment Method: <?=$row['Method']?></h2>
          </div>

      </div>
      <!-- End of the guest card -->

      <div style="position: relative; margin-top: 2em; text-align: center;">
        <form action="check_in_update.php" method="post">
          <button class="hover-button">Proceed</button>
          <input type="hidden" value="<?php echo $guestid;?>" name="guestid">
          <input type="hidden" value="<?php echo $hotelid;?>" name="hotelid">
          <input type="hidden" value="<?php echo $bookid?>" name="bookid">
          <input type="hidden" value="<?php echo $roomid;?>" name="roomid">
        </form>
      </div>




  </body>
</html>
