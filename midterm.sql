-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 02:13 PM
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
-- Database: `midterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactorg`
--

CREATE TABLE `contactorg` (
  `userID` int(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobileNum` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactorg`
--

INSERT INTO `contactorg` (`userID`, `firstName`, `lastName`, `sex`, `address`, `mobileNum`, `email`, `image`) VALUES
(21, '', 'Gabriel', 'Female', 'Pangasinan', 2147483647, 'vinna@gmail.com', 'vina (1).jpg'),
(22, 'Vina', 'Gabriel', 'Female', 'zone6', 2147483647, 'vina@gmail.com', 'vina (8).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactorg`
--
ALTER TABLE `contactorg`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactorg`
--
ALTER TABLE `contactorg`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
