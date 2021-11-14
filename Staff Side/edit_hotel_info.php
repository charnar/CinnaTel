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
        <ul class="hotel-edit-form">
          <li>
            <label for="hotelname">Name</label>
            <input class="input-long" type="text" name="hotelname" value="<?php echo $row['Name']?>">
          </li>

          <li>
            <label for="email">Email</label>
            <input class="input-long" type="text" name="email" value="<?php echo $row['Email']?>">
          </li>

          <li>
            <label for="phonenumber">Telephone</label>
            <input class="input-short" type="text" name="phonenumber" value="<?php echo $row['Phone']?>">
          </li>

          <li>
            <label for="address">Address</label>
            <input class="input-long" type="text" name="address" value="<?php echo $row['Address']?>">
          </li>

          <li>
            <label for="city">City</label>
            <input class="input-long" type="text" name="city" value="<?php echo $row['City']?>">
          </li>

          <li>
            <label for="province">Province</label>
            <input class="input-long" type="text" name="province" value="<?php echo $row['Province']?>">
          </li>

          <li>
            <label for="country">Country</label>
            <input class="input-long" type="text" name="country" value="<?php echo $row['Country']?>">

            <label for="zipcode">Zipcode</label>
            <input class="input-short" type="text" name="zipcode" value="<?php echo $row['ZipCode']?>">
          </li>

          <li>
            <label for="description">Description</label>
            <textarea name="description" rows="10" cols="45"><?php echo $row['Description']?></textarea>
          </li>

          <input type="hidden" name="hotelID" value=<?php echo $hotelID;?>>

          <div style="position: relative; margin-top: 2em; text-align: center;">
            <button type="submit" name="edit-submit" class="hover-button" style="padding: 7.5px 60px; font-size: 18px; z-index: 1">Apply</button>
          </div>
        </ul>
      </form>

      <div style="height: 50px;"></div>






  </body>
</html>
