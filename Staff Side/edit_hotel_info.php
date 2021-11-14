<!DOCTYPE html>

<?php session_start();
require_once('connect.php');

$hotelID = $_SESSION['hotelID'];

$q = "SELECT * FROM hotel WHERE HotelID = $hotelID";

$result = $mysqli -> query($q);
$row = $result->fetch_array();

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

      <h1 class="page-heading">Edit Hotel Information</h1>
      <!-- Hotel Information Form -->



      <form action="edit_information.php" method="post">
        <div class="hotel-edit-form">
          <input type="text" name="hotelname" value="<?php echo $row['Name']?>">
          <input type="text" name="email" value="<?php echo $row['Email']?>">
          <input type="text" name="phonenumber" value="<?php echo $row['Phone']?>">
          <input type="text" name="address" value="<?php echo $row['Address']?>">
          <input type="text" name="city" value="<?php echo $row['City']?>">
          <input type="text" name="province" value="<?php echo $row['Province']?>">
          <input type="text" name="country" value="<?php echo $row['Country']?>">
          <input type="text" name="zipcode" value="<?php echo $row['ZipCode']?>">
          <input type="hidden" name="hotelID" value=<?php echo $hotelID;?>>
        </div>

        <div style="position: relative; margin-top: 2em; text-align: center;">
          <button type="submit" name="edit-submit" class="hover-button">Apply</button>
        </div>
      </form>

        <!-- Submit button *change the value to the roomType.TypeID so it can be posted -->



  </body>
</html>
