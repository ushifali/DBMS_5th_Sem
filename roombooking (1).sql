-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 03:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hid` varchar(20) NOT NULL,
  `hname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hid`, `hname`) VALUES
('H1', 'BOYS HOSTEL'),
('H2', 'GIRLS HOSTEL');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `usn` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`usn`, `password`) VALUES
('4nm19cs173', '4nm19cs173'),
('4nm19cs174', '4nm19cs174'),
('4nm19cs175', '4nm19cs175'),
('4NM19CS176', '4NM19CS176'),
('4nm19cs177', '4nm19cs177'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `hid` varchar(20) NOT NULL,
  `roomno` int(11) NOT NULL,
  `maxbeds` int(11) NOT NULL DEFAULT 3,
  `bedsbooked` int(11) NOT NULL DEFAULT 0,
  `alloted` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`hid`, `roomno`, `maxbeds`, `bedsbooked`, `alloted`) VALUES
('H1', 1, 3, 3, 'Yes'),
('H1', 2, 3, 0, 'No'),
('H1', 3, 3, 0, 'No'),
('H1', 4, 3, 0, 'No'),
('H1', 5, 3, 0, 'No'),
('H1', 6, 3, 0, 'No'),
('H1', 7, 3, 0, 'No'),
('H1', 8, 3, 0, 'No'),
('H1', 9, 3, 0, 'No'),
('H1', 10, 3, 0, 'No'),
('H2', 1, 3, 0, 'No'),
('H2', 2, 3, 0, 'No'),
('H2', 3, 3, 0, 'No'),
('H2', 4, 3, 0, 'No'),
('H2', 5, 3, 1, 'No'),
('H2', 6, 3, 0, 'No'),
('H2', 7, 3, 0, 'No'),
('H2', 8, 3, 0, 'No'),
('H2', 9, 3, 0, 'No'),
('H2', 10, 3, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `roomallocated`
--

CREATE TABLE `roomallocated` (
  `usn` varchar(20) NOT NULL,
  `a_date` date NOT NULL,
  `hid` varchar(20) DEFAULT NULL,
  `roomno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomallocated`
--

INSERT INTO `roomallocated` (`usn`, `a_date`, `hid`, `roomno`) VALUES
('4nm19cs173', '2021-12-25', 'H1', 1),
('4nm19cs175', '2021-12-25', 'H1', 1),
('4NM19CS176', '2021-12-25', 'H1', 1),
('4nm19cs177', '2021-12-25', 'H2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `wid` varchar(20) NOT NULL,
  `wname` varchar(20) DEFAULT NULL,
  `hid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`wid`, `wname`, `hid`) VALUES
('W1', 'Samuel', 'H1'),
('W2', 'Lauren', 'H2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`hid`,`roomno`);

--
-- Indexes for table `roomallocated`
--
ALTER TABLE `roomallocated`
  ADD PRIMARY KEY (`usn`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `hid` (`hid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hostel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomallocated`
--
ALTER TABLE `roomallocated`
  ADD CONSTRAINT `roomallocated_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `login` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roomallocated_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `hostel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warden`
--
ALTER TABLE `warden`
  ADD CONSTRAINT `warden_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hostel` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
