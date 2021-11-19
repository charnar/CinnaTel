<!DOCTYPE HTML>
<?php
require_once('connect.php');

$hotelID = $_GET['hotelid'];

//Get the details of the hotel

$qHotelName = "SELECT Name, Province, Country FROM hotel WHERE HotelID = $hotelID";
$result = $mysqli -> query($qHotelName);
$hotelrow=$result->fetch_array();

//Get all of the room types from the hotel Branches
$qRoomType = "CALL displayRooms('$hotelID')";
$result1 = $mysqli -> query($qRoomType);


?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="../Guest Side/icon-css/all.min.css">
      <link rel="stylesheet" href="../Guest Side/icon-css/fontawesome.min.css">
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
        <a class="nav-button" href="manager_home.html">Hotel Branches</a>
        <a class="nav-button" href="javascript: history.go(-1)">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <div class="hotel-heading" style="position: relative; text-align: center; padding-top: 2em; ">
        <h1 class="hotel-name"><?php echo $hotelrow['Name'];?></h1>
        <h2 class="hotel-location"><?php echo $hotelrow['Province'];?>, <?php echo $hotelrow['Country'];?></h2>
      </div>

      <h1 class="page-heading">Room Types</h1>



      <div class="room-table">
        <!-- Insert SQL query / PHP for checking available rooms -->
        <!-- PHP for loop here to make many room cards -->
        <?php while($roomrow=$result1->fetch_array())  { ?>

        <div class="room-container">
          <div class="room-container-left">
            <div class="room-image" style="background-image: url(<?php echo $roomrow['ImageLink'];?>)"></div>
          </div>

          <div class="room-container-right">
            <h1 style="font-weight: normal;"><?php echo $roomrow['Name'];?> Room</h1>  <!-- Name of room type-->
            <h2 style="font-weight: normal;">$<?php echo $roomrow['Price']?> per night</h2> <!-- Price of room type-->

            <p> <!-- Description of room type -->
              <?php echo $roomrow['Description'];?>
            </p>


            <?php if ($roomrow['Fitness'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-dumbbell service-icon'></i>
              <span style="margin-left: 5px; font-weight: normal;">Fitness</span>
            </div>
            <?php }?>

            <?php if ($roomrow['Lounge'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-glass-martini-alt service-icon'></i>
              <span style="margin-left: 10px; font-weight: normal;">Lounge</span>
            </div>
            <?php }?>

            <?php if ($roomrow['Sauna'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-hot-tub service-icon'></i>
              <span style="margin-left: 10px; font-weight: normal;">Sauna</span>
            </div>
            <?php }?>

            <?php if ($roomrow['Spa'] == 1) {?>
            <div class="service-icon-container">
              <i class='fas fa-spa service-icon'></i>
              <span style="margin-left: 7.5px; font-weight: normal;">Spa</span>
            </div>
            <?php }?>


            <button type="button" onclick="window.location.href='edit_room_info.php?typeid=<?php echo $roomrow['TypeID'];?>'" class="hover-button" style="z-index: 1;  margin-top: 1.25em;">Edit Information</button>


          </div>
        </div>
        <?php } ?>

      </div>

  </body>
</html>
