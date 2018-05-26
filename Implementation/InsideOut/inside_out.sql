-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2018 at 09:04 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inside_out`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `name`, `surname`, `password`) VALUES
('djordje.kostic@gmail.com', 'Djordje ', 'Kostic', 'direktor'),
('nedeljkovic73@gmail.com', 'Nikola', 'Nedeljkovic', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`) VALUES
('nedeljkovic73@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `numAccounts` int(11) NOT NULL,
  `numAccountsUsed` int(11) NOT NULL DEFAULT '0',
  `registrationLink` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyName`, `numAccounts`, `numAccountsUsed`, `registrationLink`) VALUES
('Novi Bunar', 10, 0, 'Y3DRFzVdR3tOkykAEzuw');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
CREATE TABLE IF NOT EXISTS `director` (
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`),
  KEY `R_6` (`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`companyName`, `email`) VALUES
('Novi Bunar', 'djordje.kostic@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `is_working`
--

DROP TABLE IF EXISTS `is_working`;
CREATE TABLE IF NOT EXISTS `is_working` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `teamName` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`,`teamName`,`companyName`),
  KEY `R_15` (`teamName`,`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`),
  KEY `R_8` (`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `taskId` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `teamName` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyName` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusPrivacy` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P',
  `statusCompletition` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NS',
  `statusAcceptance` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `taskName` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expectedStartDate` date DEFAULT NULL,
  `expectedEndDate` date DEFAULT NULL,
  PRIMARY KEY (`taskId`),
  KEY `R_19` (`email`),
  KEY `R_20` (`teamName`,`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `teamName` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `numWorkers` int(11) NOT NULL,
  `numInProgressTasks` int(11) NOT NULL,
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`teamName`,`companyName`),
  KEY `R_18` (`companyName`),
  KEY `R_21` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `email` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` char(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`),
  KEY `R_7` (`companyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_6` FOREIGN KEY (`companyName`) REFERENCES `company` (`companyName`) ON DELETE CASCADE;

--
-- Constraints for table `is_working`
--
ALTER TABLE `is_working`
  ADD CONSTRAINT `R_14` FOREIGN KEY (`email`) REFERENCES `worker` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_15` FOREIGN KEY (`teamName`,`companyName`) REFERENCES `team` (`teamName`, `companyName`) ON DELETE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_8` FOREIGN KEY (`companyName`) REFERENCES `company` (`companyName`) ON DELETE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `R_19` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_20` FOREIGN KEY (`teamName`,`companyName`) REFERENCES `team` (`teamName`, `companyName`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `R_18` FOREIGN KEY (`companyName`) REFERENCES `company` (`companyName`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_21` FOREIGN KEY (`email`) REFERENCES `manager` (`email`);

--
-- Constraints for table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_7` FOREIGN KEY (`companyName`) REFERENCES `company` (`companyName`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
