-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 07:33 PM
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
  `Address_ID` int(11) NOT NULL,
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
  `Comment_ID` int(11) NOT NULL,
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
  `Start_Date` varchar(255) DEFAULT NULL,
  `End_Date` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Locations` varchar(255) DEFAULT NULL,
  `Group_ID` int(255) NOT NULL,
  `Address_ID` int(11) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Status` enum('Setup','Pre_Event','Open','Post_Event','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Group_ID` int(11) NOT NULL,
  `Group_Name` varchar(255) NOT NULL,
  `Event_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Group_Permissions` enum('View','Modify','Edit','Delete','Create') NOT NULL DEFAULT 'View'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Group_ID`, `Group_Name`, `Event_ID`, `User_ID`, `Group_Permissions`) VALUES
(6, 'Foreign Authors', 1, 136, 'View'),
(7, 'Poetry Group', 2, 137, 'View'),
(8, 'Culture Society', 3, 138, 'View'),
(9, 'Writer''s Club', 4, 140, 'View');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `Issues_ID` int(11) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Created_Timestamp` datetime DEFAULT NULL,
  `Last_Update_Timestamp` datetime DEFAULT NULL,
  `First_Response_Timestamp` datetime DEFAULT NULL,
  `First_Response_User` varchar(255) DEFAULT NULL,
  `Completed_Timestamp` datetime DEFAULT NULL,
  `Assign_User` varchar(255) DEFAULT NULL,
  `Description` mediumtext,
  `Location` varchar(255) DEFAULT NULL,
  `Label` varchar(255) DEFAULT NULL,
  `Status` enum('New','Awaiting_User_Response','Assigned','In_Progress','Complete','Invalid') NOT NULL DEFAULT 'New',
  `Comment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`Issues_ID`, `Summary`, `Created_Timestamp`, `Last_Update_Timestamp`, `First_Response_Timestamp`, `First_Response_User`, `Completed_Timestamp`, `Assign_User`, `Description`, `Location`, `Label`, `Status`, `Comment_ID`) VALUES
(14, 'fire hazard', '2016-08-09 11:15:22', '2016-08-10 11:28:30', '2016-08-08 02:00:00', 'Test Admin 1', '2016-08-15 20:22:28', '', NULL, NULL, NULL, 'Complete', 0),
(15, 'Nauseating odor ', '2016-08-09 07:41:42', '2016-08-12 11:28:34', '2016-08-10 13:34:34', 'Test Admin 1', '2016-08-10 13:34:34', '', NULL, NULL, NULL, 'In_Progress', 0),
(16, 'Power cuts', '2016-08-02 10:19:34', '2016-08-03 11:27:20', '2016-08-15 15:20:25', NULL, '2016-08-10 13:34:34', '', NULL, NULL, NULL, 'Invalid', 0),
(17, 'Water Leakage', '2016-08-15 10:29:38', '2016-08-15 14:33:29', '2016-08-15 10:28:30', NULL, '2016-08-10 00:32:30', 'Test Admin 2', NULL, NULL, NULL, 'Assigned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Profile_Pic` blob,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `Groups` varchar(255) DEFAULT NULL,
  `Events` varchar(255) DEFAULT NULL,
  `Group_ID` int(11) DEFAULT NULL,
  `Event_ID` int(11) DEFAULT NULL,
  `Permissions` set('View','Edit','Modify','Create','Delete') NOT NULL DEFAULT 'View',
  `User_Type` enum('Admin','OPS_Team','Patron','OPS_Manager','Event_Staff','Volunteer') NOT NULL DEFAULT 'Patron',
  `Last_Active` date NOT NULL,
  `User_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Profile_Pic`, `Email`, `Password`, `Status`, `Groups`, `Events`, `Group_ID`, `Event_ID`, `Permissions`, `User_Type`, `Last_Active`, `User_Name`) VALUES
(136, 'sturrige', NULL, 'danielsturrige@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-08', ''),
(137, 'hkane', NULL, 'hkane@live.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-14', ''),
(138, 'emilyf', NULL, 'emilyf@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-12', ''),
(139, 'kwest', NULL, 'kwest@yahoo.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-15', ''),
(140, 'sbansal@gmail.com', NULL, 'sbansal@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-14', ''),
(141, 'tasano', NULL, 'tasano@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-09', ''),
(142, 'salmank', NULL, 'salman@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '2016-08-11', ''),
(143, 'testadmin1', NULL, 'testadmin1@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Admin', '2016-08-12', ''),
(144, 'testadmin2', NULL, 'testadmin2@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Admin', '2016-08-11', ''),
(145, 'testopsteam1', NULL, 'testopsteam1@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'OPS_Team', '2016-08-02', ''),
(146, 'testpatron1', NULL, 'testpatron1@gmail.com', 'de807d0a7c70dcf5b44f0ea60c1ca458cc77f5f5', 'Active', NULL, NULL, NULL, NULL, 'View', 'Patron', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Address_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Issue_ID` (`Comment_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Address_ID` (`Address_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Group_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`Issues_ID`),
  ADD KEY `Issues_ID` (`Issues_ID`),
  ADD KEY `Comment_ID` (`Comment_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `Address_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `Issues_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Group_ID`) REFERENCES `groups` (`Group_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Event_ID`) REFERENCES `events` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
