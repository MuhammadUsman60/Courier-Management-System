-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 07:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eagle_wings`
--

-- --------------------------------------------------------

--
-- Table structure for table `consignee_details`
--

CREATE TABLE `consignee_details` (
  `consignee_sc` int(3) NOT NULL,
  `consignee_name` varchar(255) NOT NULL,
  `consignee_phone_no` int(255) NOT NULL,
  `consignee_cinc` int(255) NOT NULL,
  `consignee_address` text NOT NULL,
  `consignee_postal_code` int(10) NOT NULL,
  `tracking_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consignee_details`
--

INSERT INTO `consignee_details` (`consignee_sc`, `consignee_name`, `consignee_phone_no`, `consignee_cinc`, `consignee_address`, `consignee_postal_code`, `tracking_number`) VALUES
(79, 'isra', 1234, 555, 'lahore', 444, 'TRK45927'),
(80, 'USMAN 22', 99, 5555, 'AROOP', 8888, 'TRK18892'),
(81, 'USMAN 22', 99, 5555, 'AROOP', 8888, 'TRK80527'),
(82, 'USMAN 22', 99, 5555, 'AROOP', 8888, 'TRK75385'),
(83, 'PPTT', 88777, 554444, 'USER', 4433, 'TRK90449'),
(84, 'ali', 1234, 555, 'AROOP', 1534, 'TRK93151'),
(85, 'xyz', 1234, 0, 'lahore', 1534, 'TRK94653'),
(86, 'consignee', 12342, 1232, 'here', 6574, 'TRK47960');

-- --------------------------------------------------------

--
-- Table structure for table `courier_persons`
--

CREATE TABLE `courier_persons` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `address` text NOT NULL,
  `postalCode` int(22) NOT NULL,
  `cinc` int(50) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier_persons`
--

INSERT INTO `courier_persons` (`sno`, `name`, `phone`, `address`, `postalCode`, `cinc`, `username`) VALUES
(24, 'tabish', 322277744, '', 43235, 21024790, 'tabish66'),
(27, 'nabeel', 322676550, 'lahore1', 2344, 3410, 'nabeel'),
(28, 'Muhammad Usman 123', 777, '', 0, 3410, 'arbab'),
(29, 'Aiza', 0, 'xyz', 0, 0, 'Aiza'),
(35, 'salman', 322676550, 'lahore', 2344, 3410, 'salman776'),
(36, 'Muhammad Ahmad', 90078601, 'ghar2', 12345, 34101, 'ahmad.rajput123@icloud.com'),
(37, 'Muhammad Ahmad', 0, 'ghar', 2344, 0, 'ahmad_50'),
(46, 'Yasis', 0, 'ghar', 0, 0, 'Yasis'),
(51, 'local', 0, 'ghar', 0, 0, 'manahilriaz143@gmail.com'),
(52, 'Venom', 1236, 'ghar', 0, 777, 'ahma'),
(53, 'udmin', 999, 'aroop', 888, 6666, 'ahmad'),
(55, 'yasir', 345, 'awse', 2345, 341019063, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `shipper_details`
--

CREATE TABLE `shipper_details` (
  `sc` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` int(255) NOT NULL,
  `cinc` int(255) NOT NULL,
  `address` text NOT NULL,
  `postal_code` int(9) NOT NULL,
  `courier_type` varchar(9) NOT NULL,
  `courier_weight` int(9) NOT NULL,
  `courier_quantity` int(9) NOT NULL,
  `status` varchar(225) DEFAULT NULL,
  `time` date DEFAULT current_timestamp(),
  `tracking_number` varchar(255) NOT NULL,
  `courier_person` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipper_details`
--

INSERT INTO `shipper_details` (`sc`, `name`, `phone_no`, `cinc`, `address`, `postal_code`, `courier_type`, `courier_weight`, `courier_quantity`, `status`, `time`, `tracking_number`, `courier_person`) VALUES
(79, 'Muhammad Usman', 322676550, 0, 'lahore', 333, 'glass', 2, 1, 'Completed', '2023-09-12', 'TRK45927', 'Muhammad Usman'),
(80, 'ahmad', 8888, 9999, 'HADRABAD', 0, 'FLOWERS', 2, 1, 'Pending', '2023-09-13', 'TRK18892', 'salman'),
(82, 'ahmad', 8888, 9999, 'HADRABAD', 0, 'FLOWERS', 2, 1, 'Pending', '2023-09-13', 'TRK75385', 'salman'),
(83, 'XYZ22', 900, 66677, 'HYPER', 11122, 'DOCUMENTS', 1, 2, 'Pending', '2023-09-13', 'TRK90449', 'Muhammad Usman 123'),
(84, 'Muhammad Usman', 322676550, 3410, 'newyork', 0, 'food', 3, 1, 'Pending', '2023-09-13', 'TRK93151', 'udmin'),
(85, 'abdullah p', 322676550, 3410, 'lahore', 2344, 'food', 3, 1, 'Pending', '2023-09-14', 'TRK94653', 'Muhammad Usman 123'),
(86, 'shipper', 123, 43552, 'nowhere', 1234, 'human hea', 2, 1, 'Pending', '2023-09-14', 'TRK47960', 'Muhammad Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_number`) VALUES
('TRK17706'),
('TRK18892'),
('TRK22108'),
('TRK23309'),
('TRK24972'),
('TRK29430'),
('TRK34441'),
('TRK42384'),
('TRK45927'),
('TRK47781'),
('TRK47960'),
('TRK66144'),
('TRK67092'),
('TRK72144'),
('TRK74812'),
('TRK75385'),
('TRK77419'),
('TRK77539'),
('TRK80527'),
('TRK90449'),
('TRK91895'),
('TRK93151'),
('TRK94653');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `dt`) VALUES
('admin', 'admin', '2023-09-03'),
('admin123', 'pass', '2023-09-14'),
('ahma', '1122', '2023-09-13'),
('ahmad', '9999', '2023-09-13'),
('ahmad.rajput123@icloud.com', 'pak0987654321', '2023-09-09'),
('ahmad_50', 'ahmad', '2023-09-09'),
('ahmad_Usman', 'usman', '2023-09-03'),
('Aiza', 'Aiza', '2023-09-09'),
('ali', 'ali', '2023-09-03'),
('arbab', '123', '2023-09-07'),
('manahilriaz143@gmail.com', 'usman', '2023-09-12'),
('muhammadusmangul60@gmail.com', 'usman', '2023-09-07'),
('nabeel', 'nabeel', '2023-09-07'),
('root', '', '2023-09-11'),
('salman', 'salman', '2023-09-09'),
('salman77', 'salman77', '2023-09-09'),
('salman776', 'salman776', '2023-09-09'),
('tabish66', 'tabish66', '2023-09-07'),
('udmin', 'yy', '2023-09-14'),
('Yasis', 'yasis', '2023-09-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consignee_details`
--
ALTER TABLE `consignee_details`
  ADD PRIMARY KEY (`consignee_sc`),
  ADD KEY `tracking_number` (`tracking_number`);

--
-- Indexes for table `courier_persons`
--
ALTER TABLE `courier_persons`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `CourierPersons_User` (`username`);

--
-- Indexes for table `shipper_details`
--
ALTER TABLE `shipper_details`
  ADD PRIMARY KEY (`sc`),
  ADD KEY `tracking_fk` (`tracking_number`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consignee_details`
--
ALTER TABLE `consignee_details`
  MODIFY `consignee_sc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `courier_persons`
--
ALTER TABLE `courier_persons`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `shipper_details`
--
ALTER TABLE `shipper_details`
  MODIFY `sc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consignee_details`
--
ALTER TABLE `consignee_details`
  ADD CONSTRAINT `tracking_number` FOREIGN KEY (`tracking_number`) REFERENCES `tracking` (`tracking_number`);

--
-- Constraints for table `courier_persons`
--
ALTER TABLE `courier_persons`
  ADD CONSTRAINT `CourierPersons_User` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `shipper_details`
--
ALTER TABLE `shipper_details`
  ADD CONSTRAINT `tracking_fk` FOREIGN KEY (`tracking_number`) REFERENCES `tracking` (`tracking_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
