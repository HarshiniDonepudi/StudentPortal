-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2022 at 02:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `xyz_account`
--

CREATE TABLE `xyz_account` (
  `STD_BALANCE` int(11) NOT NULL,
  `DUE_DATE` date NOT NULL,
  `ATTENDANCE` int(11) NOT NULL,
  `ATTENDENCE2` int(11) NOT NULL,
  `ATTENDENCE3` int(5) NOT NULL,
  `ATTENDENCE4` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xyz_account`
--

INSERT INTO `xyz_account` (`STD_BALANCE`, `DUE_DATE`, `ATTENDANCE`, `ATTENDENCE2`, `ATTENDENCE3`, `ATTENDENCE4`) VALUES
(1000, '2022-06-25', 98, 0, 0, 0),
(200, '2022-06-26', 75, 96, 0, 0),
(1500, '2022-06-28', 98, 89, 96, 85);

-- --------------------------------------------------------

--
-- Table structure for table `xyz_log_history`
--

CREATE TABLE `xyz_log_history` (
  `ID` int(11) NOT NULL,
  `IPADDRESS` varbinary(16) NOT NULL,
  `TRYTIME` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xyz_results`
--

CREATE TABLE `xyz_results` (
  `MODULE` text NOT NULL,
  `FINAL_MARK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xyz_results`
--

INSERT INTO `xyz_results` (`MODULE`, `FINAL_MARK`) VALUES
('1-1', 9),
('1-2', 9),
('2-1', 9),
('2-2', 9),
('3-1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `xyz_students`
--

CREATE TABLE `xyz_students` (
  `STID` int(4) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` char(25) NOT NULL,
  `CONFIRM_PASSWORD` char(25) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `EMAIL` text NOT NULL,
  `QUALIFICATION` varchar(15) NOT NULL,
  `CELL_NUMBER` int(10) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `NATIONALITY` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xyz_students`
--

INSERT INTO `xyz_students` (`STID`, `USERNAME`, `PASSWORD`, `CONFIRM_PASSWORD`, `FIRSTNAME`, `SURNAME`, `EMAIL`, `QUALIFICATION`, `CELL_NUMBER`, `GENDER`, `NATIONALITY`) VALUES
(1, 'Harshini', '12345', '12345', 'Harshini', 'Donepudi', 'harshudonepudi@gmail.com', 'BTech', 833203243, 'Female', 'Indian');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
