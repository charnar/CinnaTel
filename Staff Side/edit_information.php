<?php
require_once('connect.php');

if(isset($_POST['edit-hotel'])) {
  $hotelID = $_POST['hotelID'];
  $hotelname = $_POST['hotelname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $country = $_POST['country'];
  $zipcode = $_POST['zipcode'];
  $description = $_POST['description'];

  $description = str_replace("'", "\'", $description);

  $q = "UPDATE hotel SET HotelID = '$hotelID', Name = '$hotelname', Email = '$email',
  Phone = '$phonenumber', Address = '$address', City = '$city', Province = '$province',
  Country = '$country', ZipCode = '$zipcode', Description = '$description' WHERE HotelID = '$hotelID';";

  $result=$mysqli->query($q);
  if(!$result){
    echo "UPDATE failed. Error: ".$mysqli->error ;
    return false;
  }

  header("Location: manager_hotel_home.php");
}

if(isset($_POST['edit-staff'])) {
  $staffid = $_POST['staffid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phonenumber'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $position = $_POST['position'];
  $hotelbranchid = $_POST['hotelbranch'];

  /* Print to test post values
  echo $staffid;
  echo $fname;
  echo $lname;
  echo $email;
  echo $phone;
  echo $city;
  echo $country;
  echo $position;
  echo $hotelbranch;
  */

  $q = "UPDATE staff SET HotelID = '$hotelbranchid', Fname = '$fname', Lname = '$lname', Email = '$email',
  Phone = '$phone', City = '$city', Country = '$country', Position = '$position'
  WHERE StaffID = '$staffid';";

  $result=$mysqli->query($q);
  if(!$result){
    echo "UPDATE failed. Error: ".$mysqli->error ;
    return false;
  }

  header("Location: manager_hotel_home.php");

}

?>
