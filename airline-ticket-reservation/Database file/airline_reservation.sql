-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 04:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_reservation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`Harry`@`localhost` PROCEDURE `GetFlightStatistics` (IN `j_date` DATE)  BEGIN
 select flight_no,departure_date,IFNULL(no_of_passengers, 0) as no_of_passengers,total_capacity from (
select f.flight_no,f.departure_date,sum(t.no_of_passengers) as no_of_passengers,j.total_capacity
from flight_details f left join ticket_details t
on t.booking_status='CONFIRMED'
and t.flight_no=f.flight_no
and f.departure_date=t.journey_date
inner join jet_details j on j.jet_id=f.jet_id
group by flight_no,journey_date) k where departure_date=j_date;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `staff_id` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pwd`, `staff_id`, `name`, `email`) VALUES
('roshan', 'passpass', '101', 'Harry Roshan', 'harryroshan1997@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(20) NOT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `pwd`, `name`, `email`, `phone_no`, `address`) VALUES
('aadith', 'aadith007', 'aadith_name', 'aadith_email', '12345', 'aadith_address'),
('Apple', 'abhishek', 'Abhijeeth', 'gmail@gmail.com', '+9185564764', 'hgsjhgdjfdjdgf'),
('blah', 'blah blah', 'blah', 'blah@gmail.com', '993498570', 'blah'),
('charles', 'charles_pass', 'Charles', 'charles@gmail.com', '9090909090', 'Bangalore'),
('chirag008', 'chirag', 'Chirag G', 'chirag@gmail.com', '8080808080', 'Kuldlu Gate'),
('harryroshan', 'passpasshello', 'Harry Roshan', 'harryroshan1997@gmai', '9845713736', '#381, 1st E Main,');

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `parking_details` (
  `type` varchar(15) NOT NULL,
  -- `departure_date` date NOT NULL,
  -- `arrival_date` date DEFAULT NULL,
  `spots_regular` int(5) DEFAULT NULL,
  `available` int(5) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `flight_details` (
  `flight_no` varchar(10) NOT NULL,
  `from_city` varchar(20) DEFAULT NULL,
  `to_city` varchar(20) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `seats_economy` int(5) DEFAULT NULL,
  `seats_business` int(5) DEFAULT NULL,
  `price_economy` int(10) DEFAULT NULL,
  `price_business` int(10) DEFAULT NULL,
  `jet_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `parking_details`
--
INSERT INTO `flight_details` (`flight_no`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `seats_economy`, `seats_business`, `price_economy`, `price_business`, `jet_id`) VALUES
('AA196', 'Atlanta', 'New York City', '2021-05-01', '2021-05-10', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA197', 'Atlanta', 'New Jersey', '2021-05-04', '2021-05-18', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA198', 'Atlanta', 'Boston', '2021-05-06', '2021-06-22', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA099', 'Atlanta', 'Long Island', '2021-06-01', '2021-06-10', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA100', 'Atlanta', 'Austin', '2021-06-04', '2021-06-14', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA101', 'Atlanta', 'San Francisco', '2021-06-10', '2021-06-20', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA102', 'Atlanta', 'Cancun', '2021-06-01', '2021-06-01', '10:00:00', '12:00:00', 200, 73, 2500, 3000, '10002'),
('AA103', 'Atlanta', 'Los Angeles', '2021-06-03', '2021-06-03', '17:00:00', '17:45:00', 150, 75, 1200, 1500, '10004'),
('AA104', 'Atlanta', 'Houston', '2021-07-04', '2021-07-04', '09:00:00', '09:17:00', 37, 4, 500, 750, '10003'),
('AA105', 'Atlanta', 'Washington DC', '2021-07-10', '2021-07-10', '09:00:00', '10:20:00', 37, 4, 500, 750, '10003'),
('AA106', 'Atlanta', 'Washington', '2021-07-01', '2021-07-01', '13:00:00', '14:00:00', 150, 75, 3000, 3750, '10004');
INSERT INTO `parking_details` (`type`,`spot_no`, `available`, 'price`) VALUES
('VIP', 'PA101', 1, 75, '10001'),
('VIP', 'PA102', 1, 75, '10002'),
('REGULAR', 'PA103', 1, 40, '10004'),
('REGULAR', 'PA104', 1, 40, '10003'),
('REGULAR','PA106', 1, 40, '10004');
--
-- Table structure for table `payment_details`
--
CREATE TABLE `payment_details` (
  `payment_id` varchar(20) NOT NULL,
  `pnr` varchar(15) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(6) DEFAULT NULL,
  `payment_mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `payment_details`
--
INSERT INTO `payment_details` (`payment_id`, `pnr`, `payment_date`, `payment_amount`, `payment_mode`) VALUES
('120000248', '4797983', '2021-05-05', 4200, 'credit card'),
('142539461', '3773951', '2021-05-05', 4050, 'credit card'),
('165125569', '8503285', '2021-05-05', 7500, 'net banking'),
('467972527', '2369143', '2021-06-04', 33400, 'debit card'),
('557778944', '6980157', '2021-06-10', 11700, 'credit card'),
('620041544', '1669050', '2021-07-04', 4800, 'debit card'),
('665360715', '5421865', '2021-07-04', 15750, 'net banking'),
('862686553', '3027167', '2021-07-04', 10700, 'debit card');
--
-- Triggers `payment_details`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_after_payment` AFTER INSERT ON `payment_details` FOR EACH ROW UPDATE parking_details
     SET booking_status='CONFIRMED', payment_id= NEW.payment_id
   WHERE pnr = NEW.pnr
$$
DELIMITER ;
-- --------------------------------------------------------
--
-- Table structure for table `ticket_details`
--
CREATE TABLE `ticket_details` (
  `pnr` varchar(15) NOT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `flight_no` varchar(10) DEFAULT NULL,
  `journey_date` date DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `no_of_passengers` int(5) DEFAULT NULL,
  `lounge_access` varchar(5) DEFAULT NULL,
  `priority_checkin` varchar(5) DEFAULT NULL,
  `insurance` varchar(5) DEFAULT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `ticket_details`
--
INSERT INTO `ticket_details` (`pnr`, `date_of_reservation`, `flight_no`, `journey_date`, `class`, `booking_status`, `no_of_passengers`, `lounge_access`, `priority_checkin`, `insurance`, `payment_id`, `customer_id`) VALUES
('1669050', '2021-05-05', 'AA104', '2021-05-10', 'business', 'CONFIRMED', 3, 'yes', 'yes', 'yes', '620041544', 'harryroshan'),
('2369143', '2021-05-06', 'AA101', '2021-05-05', 'business', 'CONFIRMED', 4, 'yes', 'yes', 'yes', '467972527', 'blah'),
('3027167', '2021-05-05', 'AA101', '2021-05-10', 'economy', 'CONFIRMED', 2, 'no', 'no', 'yes', '862686553', 'aadith'),
('3773951', '2021-06-05', 'AA104', '2021-07-04', 'economy', 'CONFIRMED', 3, 'yes', 'yes', 'yes', '142539461', 'aadith'),
('4797983', '2021-06-05', 'AA104', '2021-07-04', 'business', 'CONFIRMED', 3, 'yes', 'no', 'yes', '120000248', 'harryroshan'),
('5421865', '2021-07-01', 'AA101', '2021-08-01', 'economy', 'CONFIRMED', 3, 'no', 'no', 'no', '665360715', 'harryroshan'),
('6980157', '2021-07-02', 'AA101', '2021-08-02', 'economy', 'CANCELED', 2, 'yes', 'yes', 'yes', '557778944', 'aadith'),
('8503285', '2021-07-02', 'AA102', '2021-08-03', 'business', 'CONFIRMED', 2, 'yes', 'yes', 'no', '165125569', 'aadith');
--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);
--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);
--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`flight_no`,`departure_date`),
  ADD KEY `jet_id` (`jet_id`);
--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pnr` (`pnr`);
--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `journey_date` (`journey_date`),
  ADD KEY `flight_no` (`flight_no`),
  ADD KEY `flight_no_2` (`flight_no`,`journey_date`);
--
-- Constraints for dumped tables
--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `parking_details` (`pnr`) ON UPDATE CASCADE;
--
-- Constraints for table `ticket_details`
--
ALTER TABLE `parking_details`
  ADD CONSTRAINT `parking_details_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parking_details_ibfk_3` FOREIGN KEY (`flight_no`,`journey_date`) REFERENCES `flight_details` (`flight_no`, `departure_date`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
