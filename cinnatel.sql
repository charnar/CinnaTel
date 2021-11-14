-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 03:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinnatel`
--
CREATE DATABASE IF NOT EXISTS `cinnatel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cinnatel`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` bigint(20) NOT NULL,
  `HotelID` bigint(20) NOT NULL,
  `GuestID` bigint(20) NOT NULL,
  `PaymentID` bigint(20) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Adults` int(2) NOT NULL,
  `Children` int(2) NOT NULL,
  `ReserveDate` date NOT NULL,
  `DiscountCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `HotelID`, `GuestID`, `PaymentID`, `DateFrom`, `DateTo`, `Adults`, `Children`, `ReserveDate`, `DiscountCode`) VALUES
(1, 1, 1, 1, '2021-11-08', '2021-11-12', 1, 0, '2021-11-07', 'XXX'),
(2, 1, 2, 2, '2021-11-11', '2021-11-15', 1, 0, '2021-11-07', 'XXXX'),
(3, 1, 3, 3, '2021-11-13', '2021-11-18', 2, 0, '2021-11-07', 'QQQQ'),
(4, 1, 4, 4, '2021-11-07', '2021-11-14', 2, 1, '2021-11-01', 'QUACK'),
(5, 1, 5, 5, '2021-11-06', '2021-11-11', 2, 2, '2021-11-02', 'DUCK'),
(6, 1, 6, 6, '2021-11-10', '2021-11-13', 3, 0, '2021-11-07', 'HAHA'),
(7, 1, 7, 7, '2021-11-14', '2021-11-18', 3, 0, '2021-11-11', 'DUCKNOGO'),
(8, 2, 8, 8, '2021-11-09', '2021-11-14', 1, 0, '2021-11-01', 'OUIOUI'),
(9, 2, 9, 9, '2021-11-13', '2021-11-16', 1, 0, '2021-11-07', 'BAGUETTE'),
(10, 2, 10, 10, '2021-11-07', '2021-11-11', 2, 0, '2021-11-04', 'ECLAIR'),
(11, 2, 11, 11, '2021-11-08', '2021-11-11', 2, 0, '2021-11-05', 'AUBONPAIN'),
(12, 2, 12, 12, '2021-11-10', '2021-11-13', 2, 2, '2021-11-04', 'IMINPAIN'),
(19, 1, 23, 23, '2021-11-10', '2021-11-13', 1, 0, '2021-11-12', 'LIKEASOMEBODY');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` bigint(20) NOT NULL,
  `Fname` varchar(60) NOT NULL,
  `Lname` varchar(60) NOT NULL,
  `Prefix` varchar(5) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `Country` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `Fname`, `Lname`, `Prefix`, `Phone`, `Email`, `Country`) VALUES
(1, 'Cinnamon', 'Bun', 'Mr.', '0123456789', 'cinnamon_bun@g.siit.tu.ac.th', 'Thailand'),
(2, 'Apple', 'Jack', 'Mrs.', '0122396519', 'apple_jack@g.siit.tu.ac.th', 'Cinnamon Islands'),
(3, 'Chimi', 'Chunga', 'Mr.', '0811111111', 'chimi_chunga@g.siit.tu.ac.th', 'Mexico'),
(4, 'Cali', 'Maki', 'Ms.', '0222222222', 'cali_maki@g.siit.tu.ac.th', 'United States of America'),
(5, 'Moo ', 'Krob', 'Mr.', '0811111112', 'moo_krob@g.siit.tu.ac.th', 'Thailand'),
(6, 'Som', 'Tum', 'Ms.', '0122357686', 'som_tum@g.siit.tu.ac.th', 'Thailand'),
(7, 'Ta', 'Ko', 'Dr.', '1231241321', 'tako@g.siit.tu.ac.th', 'Japan'),
(8, 'Enchi', 'Ladas', 'Ms.', '0224233223', 'enchi_lada@g.siit.tu.ac.th', 'Mexico'),
(9, 'Burr', 'Ito', 'Mr.', '0155422782', 'burrito@g.siit.tu.ac.th', 'Mexico'),
(10, 'Tar', 'Tare', 'Dr.', '1349293829', 'tatare@g.siit.tu.ac.th', 'France'),
(11, 'Aglio', 'E. Olio', 'Mr.', '8478123901', 'aglio_olio@g.siit.tu.ac.th', 'Italy'),
(12, 'Oui', 'Baguette', 'Mrs.', '8237818920', 'oui_baguette@g.siit.tu.ac.th', 'France'),
(23, 'Jackie', 'Chan', 'Mr.', '1234', 'jackkkk', 'Thousand Sons');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(60) NOT NULL,
  `Province` varchar(60) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `ImageLink` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`HotelID`, `Name`, `Address`, `City`, `Province`, `Country`, `ZipCode`, `Email`, `Phone`, `ImageLink`, `Description`) VALUES
(1, 'Cinnabun Resort', '3/325 Mellow Trail', 'Cinnatown', 'Mt. Buns', 'Cinnamon Islands', '12021', 'cinnabun@cinnatel.org', '029991111', 'images/hotel1.jpg', 'You can\'t buy happiness, but you can buy cake and that\'s kind of the same thing.\r\n<br><br>\r\nThere was a mood of magic and frenzy to the room. Crystalline swirls of sugar and flour still lingered in the air like kite tails. And then there was the smell. The smell of hope, the kind of smell that brought people home.'),
(2, 'The Cinnasquare', '5/200, Park Avenue', 'Cinnatown', 'Cinnatown', 'Cinnamon Islands', '22021', 'cinnasquaretown@cinnatel.org', '029991112', 'images/hotel2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` bigint(20) NOT NULL,
  `Method` varchar(60) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `Method`, `Date`, `Status`) VALUES
(1, 'Bank Transfer', '2021-11-07', 1),
(2, 'Kidney', '2021-11-07', 0),
(3, 'Bank Transfer', '2021-11-07', 1),
(4, 'Crypto', '2021-11-01', 1),
(5, 'Crypto', '2021-11-02', 1),
(6, 'Kidney', '2021-11-07', 0),
(7, 'Credit Card', '2021-11-11', 1),
(8, 'Credit Card', '2021-11-01', 1),
(9, 'Bank Transfer', '2021-11-07', 1),
(10, 'Crypto', '2021-11-04', 1),
(11, 'Credit Card', '2021-11-05', 1),
(12, 'My Soul', '2021-11-04', 1),
(23, 'Kidney', '2021-11-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` bigint(20) NOT NULL,
  `HotelID` bigint(20) NOT NULL,
  `TypeID` bigint(20) NOT NULL,
  `No` int(11) NOT NULL,
  `Floor` int(11) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `HotelID`, `TypeID`, `No`, `Floor`, `Status`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 1, 2, 1, 0),
(3, 1, 1, 3, 1, 0),
(4, 1, 2, 4, 1, 0),
(5, 1, 2, 5, 1, 0),
(6, 1, 2, 6, 1, 1),
(7, 1, 3, 7, 1, 1),
(8, 1, 3, 8, 1, 0),
(9, 1, 3, 9, 1, 1),
(10, 2, 4, 1, 1, 1),
(11, 2, 4, 2, 1, 0),
(12, 2, 4, 3, 1, 0),
(13, 2, 5, 4, 1, 1),
(14, 2, 5, 5, 1, 0),
(15, 2, 5, 6, 1, 1),
(16, 2, 6, 7, 2, 1),
(17, 2, 6, 8, 2, 0),
(18, 2, 6, 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomsbooked`
--

CREATE TABLE `roomsbooked` (
  `BookingID` bigint(20) NOT NULL,
  `TypeID` bigint(20) DEFAULT NULL,
  `RoomID` bigint(20) DEFAULT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomsbooked`
--

INSERT INTO `roomsbooked` (`BookingID`, `TypeID`, `RoomID`, `Status`) VALUES
(1, 2, 1, 1),
(2, 2, NULL, 0),
(3, 1, NULL, 0),
(4, 1, 6, 1),
(5, 3, 7, 1),
(6, 3, 9, 1),
(7, 3, NULL, 0),
(8, 4, 10, 1),
(9, 4, NULL, 0),
(10, 5, 13, 1),
(11, 5, 15, 1),
(12, 6, 16, 1),
(19, 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `TypeID` bigint(20) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Price` int(5) NOT NULL,
  `MaxGuests` int(2) NOT NULL,
  `Description` text NOT NULL,
  `Spa` int(1) NOT NULL,
  `Sauna` int(1) NOT NULL,
  `Fitness` int(1) NOT NULL,
  `Lounge` int(1) NOT NULL,
  `ImageLink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`TypeID`, `Name`, `Price`, `MaxGuests`, `Description`, `Spa`, `Sauna`, `Fitness`, `Lounge`, `ImageLink`) VALUES
(1, 'Chifon', 75, 3, 'I like cinnamon rolls. but I don\'t always have time to make a pan. That\'s why I wish they would sell cinnamon roll incense. After all I\'d rather light a stick and have my roommate wake up with false hopes.', 1, 1, 1, 0, 'images/room1.jpg'),
(2, 'Dundee', 50, 1, 'The nice thing about baking alone in the kitchen before dawn is that you can talk to yourself like a crazy person and no one suspects you\'re a crazy person.', 1, 1, 1, 0, 'images/room2.jpg'),
(3, 'Madeleine ', 100, 4, 'If u can edit for nice description, just do it hahahha', 1, 1, 1, 1, 'images/room3.jpg'),
(4, 'Noumea', 70, 1, 'Pastry is different from cooking because you have to consider the chemistry, beauty and flavor. It\'s not just sugar and eggs thrown together. I tell my pastry chefs to be in tune for all of this. You have to be challenged by using secret or unusual ingredients.', 1, 0, 1, 0, 'images/room4.jpg'),
(5, 'Criolo', 80, 2, 'Love is like a good cake. You never know when it\'s coming but you\'d better eat it when it does. Homemade with love in other words I licked the spoon and kept using it.', 1, 0, 1, 1, 'images/room5.jpg'),
(6, 'Tarlette', 110, 4, 'Love my pastries. More than my blood sugar. Sometimes my heart says never. But my says ever? Whoever said money can\'t buy happiness has obviously not been to a bakery.', 1, 1, 1, 1, 'images/room6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` bigint(20) NOT NULL,
  `HotelID` bigint(20) DEFAULT NULL,
  `Fname` varchar(60) NOT NULL,
  `Lname` varchar(60) NOT NULL,
  `Prefix` varchar(10) NOT NULL,
  `City` varchar(60) NOT NULL,
  `Country` varchar(60) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` text NOT NULL,
  `Position` varchar(60) NOT NULL,
  `Username` varchar(60) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `HotelID`, `Fname`, `Lname`, `Prefix`, `City`, `Country`, `Phone`, `Email`, `Position`, `Username`, `Password`) VALUES
(1, 1, 'Charn', 'Arunkit', 'Mr.', 'Bangkok', 'Thailand', '0123456789', '6222770669@g.siit.tu.ac.th', 'Receptionist', 'charn_ar', '1234'),
(2, 1, 'Rinrada', 'Kiddo', 'Ms.', 'Bangkok', 'Thailand', '0122396519', 'radarada@g.siit.tu.ac.th', 'Manager', 'galgal', 'galgalgal'),
(3, 2, 'Nut', 'Danny', 'Mr.', 'Cinnatown', 'Cinnamon Islands', '99999', 'nutdanny@g.siit.tu.ac.th', 'Receptionist', 'nut', 'nutnut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `booking_fk1` (`HotelID`),
  ADD KEY `booking_fk2` (`GuestID`),
  ADD KEY `booking_fk3` (`PaymentID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `room_fk1` (`HotelID`),
  ADD KEY `room_fk2` (`TypeID`);

--
-- Indexes for table `roomsbooked`
--
ALTER TABLE `roomsbooked`
  ADD KEY `roomsbooked_fk1` (`BookingID`),
  ADD KEY `roomsbooked_fk2` (`RoomID`),
  ADD KEY `roomsbooked_fk3` (`TypeID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `staff_fk1` (`HotelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `GuestID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `TypeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_fk1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `booking_fk2` FOREIGN KEY (`GuestID`) REFERENCES `guest` (`GuestID`),
  ADD CONSTRAINT `booking_fk3` FOREIGN KEY (`PaymentID`) REFERENCES `payment` (`PaymentID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_fk1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `room_fk2` FOREIGN KEY (`TypeID`) REFERENCES `roomtype` (`TypeID`);

--
-- Constraints for table `roomsbooked`
--
ALTER TABLE `roomsbooked`
  ADD CONSTRAINT `roomsbooked_fk1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`),
  ADD CONSTRAINT `roomsbooked_fk2` FOREIGN KEY (`RoomID`) REFERENCES `room` (`RoomID`),
  ADD CONSTRAINT `roomsbooked_fk3` FOREIGN KEY (`TypeID`) REFERENCES `roomtype` (`TypeID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_fk1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
