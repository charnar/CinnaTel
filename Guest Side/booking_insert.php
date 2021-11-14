<?php
session_start();
require_once('connect.php');

if (isset($_POST['submit']))  {
  //Booking and Room Type information SESSION from guest_information.php
  $_SESSION['hotelid'] = $_POST['hotelid'];
  $_SESSION['typeid'] = $_POST['typeid'];
  $_SESSION['checkin'] = $_POST['checkin'];
  $_SESSION['checkout'] = $_POST['checkout'];
  $_SESSION['adults'] = $_POST['adults'];
  $_SESSION['children'] = $_POST['children'];
  $_SESSION['price'] = $_POST['price'];
  $_SESSION['roomname'] = $_POST['roomname'];
  $_SESSION['imagelink'] = $_POST['imagelink'];

  //Guest information SESSION from guest_information.php
  $_SESSION['prefix'] = $_POST['prefix'];
  $_SESSION['fname'] = $_POST['fname'];
  $_SESSION['lname'] = $_POST['lname'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['phonenum'] = $_POST['phonenum'];
  $_SESSION['country'] = $_POST['country'];

  //Payment information SESSION from guest_information.php
  $_SESSION['method'] = $_POST['method'];

}

$hotelid = $_SESSION['hotelid'];
$typeid = $_SESSION['typeid'];
$checkin = $_SESSION['checkin'];
$checkout = $_SESSION['checkout'];
$adults = $_SESSION['adults'];
$children = $_SESSION['children'];
$price = $_SESSION['price'];
$roomname = $_SESSION['roomname'];
$imagelink = $_SESSION['imagelink'];

$prefix = $_SESSION['prefix'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phonenum = $_SESSION['phonenum'];
$country = $_SESSION['country'];

$method = $_SESSION['method'];


if ($_SESSION['method'] == "Kidney") {
  $paymentstatus = 0;
}

else {
  $paymentstatus = 1;
}


// ----------------------------------------------------------------------------------galgal part---------------------------------------------------------------------

// insert data to guest table
$q1="INSERT INTO guest(Fname, Lname, Prefix, Phone, Email, Country)
VALUES ('$fname','$lname','$prefix','$phonenum','$email','$country')";

$result1 = $mysqli -> query($q1);
if(!$result1) {
  die('Error here look at q1: '.$q1." //// ". $mysqli->error);
}


// call the lastest guestid (the one that just insert by q1)
$q2="SELECT GuestID FROM guest ORDER BY GuestID DESC LIMIT 0,1";

$result2 = $mysqli -> query($q2);
if(!$result2) {
  die('Error here look at q2: '.$q2." //// ". $mysqli->error);
}

$fetchgid=$result2->fetch_array();
$gid = $fetchgid['GuestID']; // use this as GuestID


// insert data to payment table
$q3="INSERT INTO payment(Method, Date, Status)
VALUES ('$method', CURRENT_TIMESTAMP, '$paymentstatus')";

$result3 = $mysqli -> query($q3);
if(!$result3) {
  die('Error here look at q3: '.$q3." //// ". $mysqli->error);
}

// call the lastest paymentid (the one that just insert by q3)
$q4="SELECT PaymentID FROM payment ORDER BY PaymentID DESC LIMIT 0,1";

$result4 = $mysqli -> query($q4);
if(!$result4) {
  die('Error here look at q4: '.$q4." //// ". $mysqli->error);
}

$fetchpid=$result4->fetch_array();
$pid = $fetchpid['PaymentID']; // use this as PaymentID



// insert data to booking table
$q5="INSERT INTO booking(HotelID, GuestID, PaymentID, DateFrom, DateTo, Adults, Children, ReserveDate, DiscountCode)
VALUES ('$hotelid', '$gid', '$pid', '$checkin', '$checkout', '$adults', '$children', CURRENT_TIMESTAMP, 'LIKEASOMEBODY')";

$result5 = $mysqli -> query($q5);
if(!$result5) {
  die('Error here look at q5: '.$q5." //// ". $mysqli->error);
}


// call the lastest bookingid (the one that just insert by q5)
$q6="SELECT BookingID FROM booking ORDER BY BookingID DESC LIMIT 0,1";

$result6 = $mysqli -> query($q6);
if(!$result6) {
  die('Error here look at q6: '.$q6." //// ". $mysqli->error);
}

$fetchbid=$result6->fetch_array();
$bid = $fetchbid['BookingID']; // use this as BookingID


// insert data to roomsbooked table
$q7="INSERT INTO roomsbooked(BookingID, TypeID, RoomID, Status)
VALUES ('$bid', '$typeid', NULL, 0)";

$result7 = $mysqli -> query($q7);
if(!$result7) {
  die('Error here look at q7: '.$q7." //// ". $mysqli->error);
}


header('Location: booking_confirmed.php');
?>
