<!DOCTYPE html>
<?php session_start();
require_once('connect.php');

if(isset($_POST['submit'])) {
  $_SESSION['hotelid'] = $_POST['submit'];
}

$hotelID = $_SESSION['hotelid'];

$q = "SELECT * FROM staff WHERE HotelID = $hotelID";
$result = $mysqli -> query($q);

$qHotelName = "SELECT Name, Province, Country FROM hotel WHERE HotelID = $hotelID";
$result1 = $mysqli -> query($qHotelName);
$hotelrow=$result1->fetch_array();


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
      <title>CinnaTel Staff | Staff List</title>
      <link rel="stylesheet" href="stylestaff.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a class="nav-button" href="manager_home.html">Hotel Branches</a>
        <a class="nav-button" href="manager_hotel_home.php">Home</a>
        <a class="nav-button" href="index.html">Log out</a>
      </div>

      <!-- used to make room from header -->
      <div style="width: 100%; margin-top: 60px;"></div>

      <div class="hotel-heading" style="position: relative; text-align: center; padding-top: 2em; ">
        <h1 class="hotel-name"><?php echo $hotelrow['Name'];?></h1>
        <h2 class="hotel-location"><?php echo $hotelrow['Province'];?>, <?php echo $hotelrow['Country'];?></h2>
      </div>

      <h1 class="page-heading">Staff List</h1>
      <!-- List of all guests container -->
      <div class="guest-table">

        <!-- This is for 1 guest -->
        <?php while($row=$result->fetch_array()){ ?>
        <a style="text-decoration: none; color: var(--dark_oak_brown);" href="edit_staff_info.php?staffid=<?=$row['StaffID']?>">
          <div class="guest-container">
            <div class="guest-container-left">
              <h1><?php echo $row['Prefix']?> <?php echo $row['Fname']?> <?php echo $row['Lname']?></h1>
              <h2 style="font-size: 22.5px;"><?php echo $row['Position']?></h2>
              <br>
              <h2><?php echo $row['City']?>, <?php echo $row['Country']?></h2>

            </div>

            <div class="guest-container-right" style="margin-top: auto;">
              <h2>Phone: <?php echo $row['Phone']?></h2>
              <h2>Email: <?php echo $row['Email']?></h2>

            </div>
          </div>
        </a>

        <?php } ?>
        <!-- End of "this is for 1 guest" -->

      </div>
      <!-- End of List of all guests container -->




  </body>
</html>
