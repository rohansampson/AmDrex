-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 06:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skecomplaints`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Street` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Issue_ID` int(11) NOT NULL,
  `Status_Change` varchar(255) NOT NULL,
  `Visibility` set('Admin','Manager','Team','Public') NOT NULL DEFAULT 'Public',
  `Comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(255) NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Locations` varchar(255) NOT NULL,
  `Groups` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Status` enum('Setup','Pre_Event','Open','Post_Event','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Group_ID` int(11) NOT NULL,
  `Group_Name` varchar(255) NOT NULL,
  `Events` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Group_Permissions` enum('View','Modify','Edit','Delete','Create') NOT NULL DEFAULT 'View'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `Issues_ID` int(11) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Created_Timestamp` datetime NOT NULL,
  `Last_Update_Timestamp` datetime NOT NULL,
  `First_Response_Timestamp` datetime NOT NULL,
  `First_Response_User` varchar(255) NOT NULL,
  `Completed_Timestamp` datetime NOT NULL,
  `Assign_User` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Label` varchar(255) NOT NULL,
  `Status` enum('New','Awaiting_User_Response','Assigned','In_Progress','Complete','Invalid') NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Profile_Pic` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `Groups` varchar(255) NOT NULL,
  `Events` varchar(255) NOT NULL,
  `Permissions` enum('View','Edit','Modify','Create','Delete') NOT NULL DEFAULT 'View',
  `User_Type` enum('Admin','OPS_Team','Patron','OPS_Manager','Event_Staff','Volunteer') NOT NULL DEFAULT 'Patron'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Issue_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`Issues_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Issue_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `Issues_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
