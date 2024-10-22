-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2023 at 04:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CIVE_REPOSITORY_V1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `CommentID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Details`
--

CREATE TABLE `Personal_Details` (
  `PersonalID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fname` varchar(25) NOT NULL,
  `Mname` varchar(25) NOT NULL,
  `Lname` varchar(25) NOT NULL,
  `Phone_number` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Profile_picture` varchar(255) DEFAULT NULL,
  `Role` enum('student','admin') NOT NULL,
  `Active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `PostID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `YearLevel` int(11) DEFAULT NULL CHECK (`YearLevel` between 1 and 4),
  `Documentyear` varchar(4) NOT NULL,
  `Examlevel` enum('Test 01','Test 02','UE') DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `Program` varchar(100) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Registration_ID` varchar(10) NOT NULL,
  `PersonalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `System_Admin`
--

CREATE TABLE `System_Admin` (
  `System_AdminID` int(11) NOT NULL,
  `PersonalID` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  ADD PRIMARY KEY (`PersonalID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Registration_ID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- Indexes for table `System_Admin`
--
ALTER TABLE `System_Admin`
  ADD PRIMARY KEY (`System_AdminID`),
  ADD KEY `PersonalID` (`PersonalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Personal_Details`
--
ALTER TABLE `Personal_Details`
  MODIFY `PersonalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `System_Admin`
--
ALTER TABLE `System_Admin`
  MODIFY `System_AdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `Post` (`PostID`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `Post_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);

--
-- Constraints for table `System_Admin`
--
ALTER TABLE `System_Admin`
  ADD CONSTRAINT `System_Admin_ibfk_1` FOREIGN KEY (`PersonalID`) REFERENCES `Personal_Details` (`PersonalID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
