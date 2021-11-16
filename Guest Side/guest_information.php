<!DOCTYPE html>

<?php
session_start();
require_once('connect.php');  //connect to phpmyadmin

// takes information from the check availability form
if (isset($_POST['submit']))    {
    $_SESSION['hotelid'] = $_POST['hotelid'];
    $_SESSION['roomname'] = $_POST['roomname'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['typeid'] = $_POST['typeid'];
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['children'] = $_POST['children'];
    $_SESSION['imagelink'] = $_POST['imagelink'];
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


$DateFrom = strtotime($checkin);
$DateTo = strtotime($checkout);
$diff = abs($DateTo - $DateFrom);
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$TotalCost = $price * ($days);

?>

<html>
  <!-- Head of the page -->
  <head>
      <link rel="stylesheet" href="icon-css/all.min.css">
      <link rel="stylesheet" href="icon-css/fontawesome.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CinnaTel | Guest information</title>
      <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <!-- Fixed navigation bar -->
      <div class="navbar">
        <!-- Top left icon -->
        <a href="index.html" style="text-decoration: none;">
          <h1 class="logo">Cinnamon Hotels & Resorts</h1>
        </a>

        <!-- Top right hamburger menu -->
        <div class=menu-wrap>
            <input type="checkbox" class="toggler">
            <div class="hamburger"><div></div></div>
            <div class="menu">
              <div>
                <div>
                  <ul>
                    <li><a href='index.html'>Home</a></li>
                    <li><a href='hotels.html'>Find a hotel</a></li>
                    <li><a href='book_room.html'>Book a room</a></li>
                    <li><a href='about.html'>About us</a></li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>

    <!-- Home screen image and text -->
      <div class="background-splash" style="background-image: url(images/cover1.jpg)">
        <h1 style="top: 40%">Guest details</h1>
      </div>


    <!-- Form container for checking availability -->
      <div class="room-table">
        <!-- Insert SQL query / PHP for checking available rooms -->
        <!-- PHP for loop here to make many room cards -->
        <div class="room-form-container">
          <div class="room-form-left">
            <div class="room-image" style="background-image: url(<?php echo $imagelink;?>)"></div>
            <h1 class="room-heading" style="padding-top: 0.4em; font-weight: normal;"><?php echo $roomname?> Room</h1>  <!-- Name of room type-->
            <h2 style="padding-top: 0.2em; padding-right: 1em; display: inline; font-weight: normal;">Check-in: <span><?php echo $checkin;?></span></h2>
            <h2 style="padding-top: 0.2em; display: inline; font-weight: normal;">Check-out: <span><?php echo $checkout;?></span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Guests:
              <span style="color: var(--dark_oak_brown)"> <?php echo $adults;?> Adults <?php echo $children;?> Children</span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Price per night: <span>$<?php echo $price;?></span></h2>
            <h2 style="padding-top: 0.2em; font-weight: normal;">Amount due: <span>$<?php echo $TotalCost?></span></h2>
          </div>

          <div class="room-form-right">
            <form action="booking_insert.php" method="post"> <!-- Submit button *change the value to the roomType.TypeID so it can be posted -->

                <h1 style="font-weight: normal;">Guest information</h1>
                <select id="prefix" name="prefix">
                  <option value="Mr.">Mr.</option>
                  <option value="Ms.">Ms.</option>
                  <option value="Mrs.">Mrs.</option>
                  <option value="Dr.">Dr.</option>
                  <option value="Prof.">Prof.</option>
                </select>

                <input type="text" id="fname" name="fname" placeholder="First name">
                <input type="text" id="lname" name="lname" placeholder="Last name">
                <input type="text" id="email" name="email" placeholder="Email address">
                <input type="text" id="phonenum" name="phonenum" placeholder="Phone number">

                <select id="country" name="country">
                  <option>Country</option>
          				<option value="Afganistan">Afghanistan</option>
          				<option value="Albania">Albania</option>
          				<option value="Algeria">Algeria</option>
          				<option value="American Samoa">American Samoa</option>
          				<option value="Andorra">Andorra</option>
          				<option value="Angola">Angola</option>
          				<option value="Anguilla">Anguilla</option>
          				<option value="Antigua & Barbuda">Antigua & Barbuda</option>
          				<option value="Argentina">Argentina</option>
          				<option value="Armenia">Armenia</option>
          				<option value="Aruba">Aruba</option>
          				<option value="Australia">Australia</option>
          				<option value="Austria">Austria</option>
          				<option value="Azerbaijan">Azerbaijan</option>
          				<option value="Bahamas">Bahamas</option>
          				<option value="Bahrain">Bahrain</option>
          				<option value="Bangladesh">Bangladesh</option>
          				<option value="Barbados">Barbados</option>
          				<option value="Belarus">Belarus</option>
          				<option value="Belgium">Belgium</option>
          				<option value="Belize">Belize</option>
          				<option value="Benin">Benin</option>
          				<option value="Bermuda">Bermuda</option>
          				<option value="Bhutan">Bhutan</option>
          				<option value="Bolivia">Bolivia</option>
          				<option value="Bonaire">Bonaire</option>
          				<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
          				<option value="Botswana">Botswana</option>
          				<option value="Brazil">Brazil</option>
          				<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
          				<option value="Brunei">Brunei</option>
          				<option value="Bulgaria">Bulgaria</option>
          				<option value="Burkina Faso">Burkina Faso</option>
          				<option value="Burundi">Burundi</option>
          				<option value="Cambodia">Cambodia</option>
          				<option value="Cameroon">Cameroon</option>
          				<option value="Canada">Canada</option>
          				<option value="Canary Islands">Canary Islands</option>
          				<option value="Cape Verde">Cape Verde</option>
          				<option value="Cayman Islands">Cayman Islands</option>
          				<option value="Central African Republic">Central African Republic</option>
          				<option value="Chad">Chad</option>
          				<option value="Channel Islands">Channel Islands</option>
          				<option value="Chile">Chile</option>
          				<option value="China">China</option>
          				<option value="Christmas Island">Christmas Island</option>
                  <option value="Cinnamon Islands">Cinnamon Islands</option>
          				<option value="Cocos Island">Cocos Island</option>
          				<option value="Colombia">Colombia</option>
          				<option value="Comoros">Comoros</option>
          				<option value="Congo">Congo</option>
          				<option value="Cook Islands">Cook Islands</option>
          				<option value="Costa Rica">Costa Rica</option>
          				<option value="Cote DIvoire">Cote DIvoire</option>
          				<option value="Croatia">Croatia</option>
          				<option value="Cuba">Cuba</option>
          				<option value="Curaco">Curacao</option>
          				<option value="Cyprus">Cyprus</option>
          				<option value="Czech Republic">Czech Republic</option>
          				<option value="Denmark">Denmark</option>
          				<option value="Djibouti">Djibouti</option>
          				<option value="Dominica">Dominica</option>
          				<option value="Dominican Republic">Dominican Republic</option>
          				<option value="East Timor">East Timor</option>
          				<option value="Ecuador">Ecuador</option>
          				<option value="Egypt">Egypt</option>
          				<option value="El Salvador">El Salvador</option>
          				<option value="Equatorial Guinea">Equatorial Guinea</option>
          				<option value="Eritrea">Eritrea</option>
          				<option value="Estonia">Estonia</option>
          				<option value="Ethiopia">Ethiopia</option>
          				<option value="Falkland Islands">Falkland Islands</option>
          				<option value="Faroe Islands">Faroe Islands</option>
          				<option value="Fiji">Fiji</option>
          				<option value="Finland">Finland</option>
          				<option value="France">France</option>
          				<option value="French Guiana">French Guiana</option>
          				<option value="French Polynesia">French Polynesia</option>
          				<option value="French Southern Ter">French Southern Ter</option>
          				<option value="Gabon">Gabon</option>
          				<option value="Gambia">Gambia</option>
          				<option value="Georgia">Georgia</option>
          				<option value="Germany">Germany</option>
          				<option value="Ghana">Ghana</option>
          				<option value="Gibraltar">Gibraltar</option>
          				<option value="Great Britain">Great Britain</option>
          				<option value="Greece">Greece</option>
          				<option value="Greenland">Greenland</option>
          				<option value="Grenada">Grenada</option>
          				<option value="Guadeloupe">Guadeloupe</option>
          				<option value="Guam">Guam</option>
          				<option value="Guatemala">Guatemala</option>
          				<option value="Guinea">Guinea</option>
          				<option value="Guyana">Guyana</option>
          				<option value="Haiti">Haiti</option>
          				<option value="Hawaii">Hawaii</option>
          				<option value="Honduras">Honduras</option>
          				<option value="Hong Kong">Hong Kong</option>
          				<option value="Hungary">Hungary</option>
          				<option value="Iceland">Iceland</option>
          				<option value="Indonesia">Indonesia</option>
          				<option value="India">India</option>
          				<option value="Iran">Iran</option>
          				<option value="Iraq">Iraq</option>
          				<option value="Ireland">Ireland</option>
          				<option value="Isle of Man">Isle of Man</option>
          				<option value="Israel">Israel</option>
          				<option value="Italy">Italy</option>
          				<option value="Jamaica">Jamaica</option>
          				<option value="Japan">Japan</option>
          				<option value="Jordan">Jordan</option>
          				<option value="Kazakhstan">Kazakhstan</option>
          				<option value="Kenya">Kenya</option>
          				<option value="Kiribati">Kiribati</option>
          				<option value="Korea North">Korea North</option>
          				<option value="Korea Sout">Korea South</option>
          				<option value="Kuwait">Kuwait</option>
          				<option value="Kyrgyzstan">Kyrgyzstan</option>
          				<option value="Laos">Laos</option>
          				<option value="Latvia">Latvia</option>
          				<option value="Lebanon">Lebanon</option>
          				<option value="Lesotho">Lesotho</option>
          				<option value="Liberia">Liberia</option>
          				<option value="Libya">Libya</option>
          				<option value="Liechtenstein">Liechtenstein</option>
          				<option value="Lithuania">Lithuania</option>
          				<option value="Luxembourg">Luxembourg</option>
          				<option value="Macau">Macau</option>
          				<option value="Macedonia">Macedonia</option>
          				<option value="Madagascar">Madagascar</option>
          				<option value="Malaysia">Malaysia</option>
          				<option value="Malawi">Malawi</option>
          				<option value="Maldives">Maldives</option>
          				<option value="Mali">Mali</option>
          				<option value="Malta">Malta</option>
          				<option value="Marshall Islands">Marshall Islands</option>
          				<option value="Martinique">Martinique</option>
          				<option value="Mauritania">Mauritania</option>
          				<option value="Mauritius">Mauritius</option>
          				<option value="Mayotte">Mayotte</option>
          				<option value="Mexico">Mexico</option>
          				<option value="Midway Islands">Midway Islands</option>
          				<option value="Moldova">Moldova</option>
          				<option value="Monaco">Monaco</option>
          				<option value="Mongolia">Mongolia</option>
          				<option value="Montserrat">Montserrat</option>
          				<option value="Morocco">Morocco</option>
          				<option value="Mozambique">Mozambique</option>
          				<option value="Myanmar">Myanmar</option>
          				<option value="Nambia">Nambia</option>
          				<option value="Nauru">Nauru</option>
          				<option value="Nepal">Nepal</option>
          				<option value="Netherland Antilles">Netherland Antilles</option>
          				<option value="Netherlands">Netherlands (Holland, Europe)</option>
          				<option value="Nevis">Nevis</option>
          				<option value="New Caledonia">New Caledonia</option>
          				<option value="New Zealand">New Zealand</option>
          				<option value="Nicaragua">Nicaragua</option>
          				<option value="Niger">Niger</option>
          				<option value="Nigeria">Nigeria</option>
          				<option value="Niue">Niue</option>
          				<option value="Norfolk Island">Norfolk Island</option>
          				<option value="Norway">Norway</option>
          				<option value="Oman">Oman</option>
          				<option value="Pakistan">Pakistan</option>
          				<option value="Palau Island">Palau Island</option>
          				<option value="Palestine">Palestine</option>
          				<option value="Panama">Panama</option>
          				<option value="Papua New Guinea">Papua New Guinea</option>
          				<option value="Paraguay">Paraguay</option>
          				<option value="Peru">Peru</option>
          				<option value="Phillipines">Philippines</option>
          				<option value="Pitcairn Island">Pitcairn Island</option>
          				<option value="Poland">Poland</option>
          				<option value="Portugal">Portugal</option>
          				<option value="Puerto Rico">Puerto Rico</option>
          				<option value="Qatar">Qatar</option>
          				<option value="Republic of Montenegro">Republic of Montenegro</option>
          				<option value="Republic of Serbia">Republic of Serbia</option>
          				<option value="Reunion">Reunion</option>
          				<option value="Romania">Romania</option>
          				<option value="Russia">Russia</option>
          				<option value="Rwanda">Rwanda</option>
          				<option value="St Barthelemy">St Barthelemy</option>
          				<option value="St Eustatius">St Eustatius</option>
          				<option value="St Helena">St Helena</option>
          				<option value="St Kitts-Nevis">St Kitts-Nevis</option>
          				<option value="St Lucia">St Lucia</option>
          				<option value="St Maarten">St Maarten</option>
          				<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
          				<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
          				<option value="Saipan">Saipan</option>
          				<option value="Samoa">Samoa</option>
          				<option value="Samoa American">Samoa American</option>
          				<option value="San Marino">San Marino</option>
          				<option value="Sao Tome & Principe">Sao Tome & Principe</option>
          				<option value="Saudi Arabia">Saudi Arabia</option>
          				<option value="Senegal">Senegal</option>
          				<option value="Seychelles">Seychelles</option>
          				<option value="Sierra Leone">Sierra Leone</option>
          				<option value="Singapore">Singapore</option>
          				<option value="Slovakia">Slovakia</option>
          				<option value="Slovenia">Slovenia</option>
          				<option value="Solomon Islands">Solomon Islands</option>
          				<option value="Somalia">Somalia</option>
          				<option value="South Africa">South Africa</option>
          				<option value="Spain">Spain</option>
          				<option value="Sri Lanka">Sri Lanka</option>
          				<option value="Sudan">Sudan</option>
          				<option value="Suriname">Suriname</option>
          				<option value="Swaziland">Swaziland</option>
          				<option value="Sweden">Sweden</option>
          				<option value="Switzerland">Switzerland</option>
          				<option value="Syria">Syria</option>
          				<option value="Tahiti">Tahiti</option>
          				<option value="Taiwan">Taiwan</option>
          				<option value="Tajikistan">Tajikistan</option>
          				<option value="Tanzania">Tanzania</option>
          				<option value="Thailand">Thailand</option>
          				<option value="Togo">Togo</option>
          				<option value="Tokelau">Tokelau</option>
          				<option value="Tonga">Tonga</option>
          				<option value="Trinidad & Tobago">Trinidad & Tobago</option>
          				<option value="Tunisia">Tunisia</option>
          				<option value="Turkey">Turkey</option>
          				<option value="Turkmenistan">Turkmenistan</option>
          				<option value="Turks & Caicos Is">Turks & Caicos Is</option>
          				<option value="Tuvalu">Tuvalu</option>
          				<option value="Uganda">Uganda</option>
          				<option value="United Kingdom">United Kingdom</option>
          				<option value="Ukraine">Ukraine</option>
          				<option value="United Arab Erimates">United Arab Emirates</option>
          				<option value="United States of America">United States of America</option>
          				<option value="Uraguay">Uruguay</option>
          				<option value="Uzbekistan">Uzbekistan</option>
          				<option value="Vanuatu">Vanuatu</option>
          				<option value="Vatican City State">Vatican City State</option>
          				<option value="Venezuela">Venezuela</option>
          				<option value="Vietnam">Vietnam</option>
          				<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
          				<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
          				<option value="Wake Island">Wake Island</option>
          				<option value="Wallis & Futana Is">Wallis & Futana Is</option>
          				<option value="Yemen">Yemen</option>
          				<option value="Zaire">Zaire</option>
          				<option value="Zambia">Zambia</option>
          				<option value="Zimbabwe">Zimbabwe</option>
                </select>

                <h1 style="padding-top: 1.2em; font-weight: normal;">Payment information</h1>
                <select id="method" name="method" >
                  <option value="Credit Card">Credit Card</option>
                  <option value="Bank Transfer">Bank Transfer</option>
                  <option value="Kidney">Your Kidney</option>
                  <option value="Crypto">Cryptocurrency</option>
                  <option value="Your Soul">Your Soul</option>
                </select>

                <div class="">
                  <input type="text" id="Ricardo" name="cardnum" placeholder="Card number">
                  <input type="text" id="exp" name="exp" placeholder="Expiration date (MM/YY)">
                  <input type="text" id="CV" name="CV" placeholder="CV2">
                </div>

                  <input type="hidden" name="hotelid" value="<?php echo $hotelid;?>">
                  <input type="hidden" name="typeid" value="<?php echo $typeid;?>">
                  <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
                  <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
                  <input type="hidden" name="adults" value="<?php echo $adults;?>">
                  <input type="hidden" name="children" value="<?php echo $children;?>">
                  <input type="hidden" name="price" value="<?php echo $price;?>">
                  <input type="hidden" name="roomname" value="<?php echo $roomname;?>">
                  <input type="hidden" name="imagelink" value="<?php echo $imagelink;?>">


                  <button type=button onclick="history.go(-1)" class=hover-button style="z-index: 1; margin-right: 10px; margin-top: 1.25em;">Go Back</button>
                  <button type="submit" name="submit" class="hover-button" style="z-index: 1; margin-top: 1.25em; margin-right: 10px;">Confirm booking</button>
            </form>

          </div>
        </div>
      </div>



      <!-- Bottom Footer container -->
      <div class="container-bottom-footer">
        <div class="footer-section">
          <a href="about.html">About us</a>
          <a href="hotels.html">Find a hotel</a>
          <a href="book_room.html">Book a room</a>
        </div>

        <div class="footer-section">
          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-map-marker-alt'></i>
            <h1 style="margin-top: 17px; margin-left: 5px;">Main Headquarters</h1>
            <h2>3/325 Final Road, Cinnamon Islands</h2>
          </div>

          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-envelope-open'></i>
            <h1 style="margin-top: 17px">Email</h1>
            <h2>support@cinnatel.org</h2>
          </div>

        </div>

        <div class="footer-section">
          <div class="footer-information">
            <i style="font-size:25px;color:white;" class='fas fa-phone'></i>
            <h1 style="margin-top: 17px">Phone</h1>
            <h2>02-420-6969</h2>
          </div>
        </div>
      </div>
      <!-- End of Bottom Footer container -->

  </body>
</html>
