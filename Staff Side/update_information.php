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


if (isset($_POST['edit-roomtype'])) {
  $hotelid = $_POST['hotelid'];
  $typeid = $_POST['typeid'];
  $roomname = $_POST['roomname'];
  $price = $_POST['price'];
  $description = str_replace("'", "\'", $_POST['description']);
  $spa = $_POST['spa'];
  $sauna = $_POST['sauna'];
  $fitness = $_POST['fitness'];
  $lounge = $_POST['lounge'];


  if (is_uploaded_file($_FILES['roomimage']['tmp_name']))  {
    $filename = 'room'.$typeid.'';
    $directory = '../images/'.$filename.'.jpg';
    //store the bank slip in the bankslips folder
    move_uploaded_file($_FILES["roomimage"]["tmp_name"], $directory);

    $q = "UPDATE roomtype SET Name = '$roomname', Price = '$price', Description = '$description',
    Spa = '$spa', Sauna = '$sauna', Fitness = '$fitness', Lounge = '$lounge', ImageLink = '$directory' WHERE TypeID = '$typeid';";
  }

  else {
    $q = "UPDATE roomtype SET Name = '$roomname', Price = '$price', Description = '$description',
    Spa = '$spa', Sauna = '$sauna', Fitness = '$fitness', Lounge = '$lounge' WHERE TypeID = '$typeid';";
  }


  $result=$mysqli->query($q);
  if(!$result){
    echo "UPDATE failed. Error: ".$mysqli->error ;
    return false;
  }

  header('Location: roomtype_list.php?hotelid='.$hotelid.'');

}

?>
