<?php
  session_start();
  require_once('connect.php');

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  }


  $valid = false;
  $q = "SELECT * FROM staff";
  $result = $mysqli -> query($q);

   while($row=$result->fetch_array()){
     if (($row['Username'] == $username) and ($row['Password'] == md5($password))) {
       $_SESSION['HotelID'] = $row['HotelID'];

       if ($row['Position'] == 'Receptionist')  {
         header('Location: receptionist_home.php');
       }

       elseif ($row['Position'] == 'Manager')  {
         header('Location: manager_home.html');
       }
     }
   }

   echo "Invalid login";

 ?>
