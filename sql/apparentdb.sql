-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 03:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apparentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartmentstable`
--

CREATE TABLE `apartmentstable` (
  `apartmentid` int(11) NOT NULL,
  `apartmentbuildingname` varchar(255) NOT NULL,
  `apartmentspecificaddress` varchar(255) NOT NULL,
  `apartmenttype` varchar(255) NOT NULL,
  `apartmenttenantunitarea` varchar(255) NOT NULL,
  `apartmenttenantunitbedrooms` varchar(255) NOT NULL,
  `apartmenttenantunitbeds` varchar(255) NOT NULL,
  `apartmenttenantunitbathrooms` varchar(255) NOT NULL,
  `apartmenttenantunitamenities1` varchar(255) NOT NULL,
  `apartmenttenantunitamenities2` varchar(255) NOT NULL,
  `apartmenttenantunitamenities3` varchar(255) NOT NULL,
  `apartmenttenantunitamenities4` varchar(255) NOT NULL,
  `apartmenttenantunitamenities5` varchar(255) NOT NULL,
  `apartmentgarageavailability` varchar(255) NOT NULL,
  `apartmentimage1` varchar(255) NOT NULL,
  `apartmentimage2` varchar(255) NOT NULL,
  `apartmentimage3` varchar(255) NOT NULL,
  `apartmenttenantunitmonthlyrentprice` decimal(11,2) NOT NULL,
  `apartmentcontactlandlord` varchar(255) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateupdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactstable`
--

CREATE TABLE `contactstable` (
  `contactid` int(11) NOT NULL,
  `contactname` varchar(255) NOT NULL,
  `contactemail` varchar(255) NOT NULL,
  `contactsubject` varchar(255) NOT NULL,
  `contactmessage` varchar(255) NOT NULL,
  `datereceived` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'admin',
  `dateregistered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userid`, `username`, `useremail`, `userpassword`, `usertype`, `dateregistered`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2021-01-25 14:12:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartmentstable`
--
ALTER TABLE `apartmentstable`
  ADD PRIMARY KEY (`apartmentid`);

--
-- Indexes for table `contactstable`
--
ALTER TABLE `contactstable`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartmentstable`
--
ALTER TABLE `apartmentstable`
  MODIFY `apartmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactstable`
--
ALTER TABLE `contactstable`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
