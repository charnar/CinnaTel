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
      <script src="script.js"></script>
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


      <form action="edit_information.php" method="post" enctype="multipart/form-data">
        <ul class="hotel-edit-form">
          <li>
            <label onclick="document.getElementById('roomimage').click()" class="room-image"; style="background-image: url('<?php echo $roomrow['ImageLink']?>'); margin-bottom: 20px; cursor: pointer;"></label>
            <input type="file" id="roomimage" name="roomimage" style="display: none;"/>
          </li>

          <li>
            <label for="roomname">Name</label>
            <input class="input-long" type="text" name="roomname" value="<?php echo $roomrow['Name']?>">
          </li>

          <li>
            <label for="price">Price per night</label>
            <input class="input-short" type="text" name="price" value="<?php echo $roomrow['Price']?>">
          </li>

          <li>
            <label for="description">Description</label>
            <textarea name="description" rows="10" cols="45"><?php echo $roomrow['Description']?></textarea>
          </li>


          <input type="hidden" name="typeid" value=<?php echo $typeid;?>>

          <div style="position: relative; margin-top: 2em; text-align: center;">
            <button type="submit" name="edit-roomtype" class="hover-button" style="padding: 7.5px 60px; font-size: 18px; z-index: 1">Apply</button>
          </div>
        </ul>
      </form>

      <div style="height: 50px;"></div>






  </body>
</html>
