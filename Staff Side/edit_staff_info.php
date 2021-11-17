<!DOCTYPE html>

<?php
require_once('connect.php');

$staffid = $_GET['staffid'];

$q = "SELECT staff.*, hotel.Name AS HotelName, hotel.Province AS HotelProvince, hotel.Country AS HotelCountry
FROM staff, hotel WHERE staff.HotelID = hotel.HotelID AND StaffID = $staffid";

$result = $mysqli -> query($q);
$row = $result->fetch_array();

$qBranch = 'CALL getHotelBranch()';
$result1 = $mysqli -> query($qBranch);
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

      <div class="hotel-heading" style="position: relative; text-align: center; padding-top: 2em; ">
        <h1 class="hotel-name"><?php echo $row['HotelName'];?></h1>
        <h2 class="hotel-location"><?php echo $row['HotelProvince'];?>, <?php echo $row['HotelCountry'];?></h2>
      </div>

      <h1 class="page-heading">Edit Staff Information</h1>
      <!-- Hotel Information Form -->



      <form action="edit_information.php" method="post">
        <ul class="hotel-edit-form">
          <li>
            <label for="fname">Name</label>
            <input class="input-long" type="text" name="fname" value="<?php echo $row['Fname']?>">
            <input class="input-long" type="text" name="lname" value="<?php echo $row['Lname']?>">
          </li>

          <li>
            <label for="email">Email</label>
            <input class="input-long" type="text" name="email" value="<?php echo $row['Email']?>">
          </li>

          <li>
            <label for="phonenumber">Phone</label>
            <input class="input-short" type="text" name="phonenumber" value="<?php echo $row['Phone']?>">
          </li>


          <li>
            <label for="city">City</label>
            <input class="input-long" type="text" name="city" value="<?php echo $row['City']?>">
          </li>

          <li>
            <label for="country">Country</label>
            <input class="input-long" type="text" name="country" value="<?php echo $row['Country']?>">
          </li>

          <li>
            <label for="position">Position</label>
            <select id="position" name="position" style="width: 47.5%;">
              <option value="Butler"
              <?php if($row['Position'] == "Butler"){ ?>
                selected <?php } ?>>Butler</option>

              <option value="Cleaner"
              <?php if($row['Position'] == "Cleaner"){ ?>
                selected <?php } ?>>Cleaner</option>

              <option value="Manager"<?php if($row['Position'] == "Manager"){ ?>
                selected <?php } ?>>Manager</option>

              <option value="Receptionist"<?php if($row['Position'] == "Receptionist"){ ?>
                selected <?php } ?>>Receptionist</option>
            </select>


            <label for="hotelbranch">Hotel Branch</label>
            <select id="hotelbranch" name="hotelbranch">
              <?php
                while ($branchRow = $result1->fetch_array()) { ?>
                  <option value="<?php echo $branchRow['HotelID']?>"
                  <?php if($row['HotelID'] == $branchRow['HotelID'])  { ?>
                    selected <?php } ?>><?php echo $branchRow['Name']?>, <?php echo $branchRow['Country']?></option>

              <?php } ?>
            </select>
          </li>

          <input type="hidden" name="staffid" value="<?php echo $staffid;?>">

          <div style="position: relative; margin-top: 2em; text-align: center;">
            <button type="submit" name="edit-staff" class="hover-button" style="padding: 7.5px 60px; font-size: 18px; z-index: 1">Apply</button>
          </div>
        </ul>
      </form>

      <div style="height: 50px;"></div>






  </body>
</html>
