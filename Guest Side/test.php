<?php


if (isset($_POST['submit']))  {
  $x = '1';
  if (is_uploaded_file($_FILES['bankslip']['tmp_name']))  {
    echo 'file uploaded';
  }

  else {
    echo 'file does not exist';
  }

  $filename = 'paymentbankslip'.$x.'';
  $directory = 'bankslips/'.$filename.'.jpg';
  move_uploaded_file($_FILES["bankslip"]["tmp_name"], $directory);

}


?>
