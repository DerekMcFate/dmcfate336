-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2017 at 04:07 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elements`
--

-- --------------------------------------------------------

--
-- Table structure for table `el_classes`
--

CREATE TABLE `el_classes` (
  `classId` int(11) NOT NULL,
  `className` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `el_classes`
--

INSERT INTO `el_classes` (`classId`, `className`) VALUES
(1, 'Nonmetals'),
(2, 'Halogens'),
(3, 'Noble Gases'),
(4, 'Metalloids'),
(5, 'Actinides');

-- --------------------------------------------------------

--
-- Table structure for table `el_items`
--

CREATE TABLE `el_items` (
  `itemId` int(11) NOT NULL,
  `atomicNum` int(11) NOT NULL,
  `itemName` varchar(40) NOT NULL,
  `className` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `el_items`
--

INSERT INTO `el_items` (`itemId`, `atomicNum`, `itemName`, `className`) VALUES
(1, 1, 'Hydrogen', 'Nonmetals'),
(2, 6, 'Carbon', 'Nonmetals'),
(3, 7, 'Nitrogen', 'Nonmetals'),
(4, 8, 'Oxygen', 'Nonmetals'),
(5, 9, 'Fluorine', 'Halogens'),
(6, 15, 'Phosphorus', 'Nonmetals'),
(7, 16, 'Sulfur', 'Nonmetals'),
(8, 14, 'Silicon', 'Metalloids'),
(9, 17, 'Chlorine', 'Halogens'),
(10, 5, 'Boron', 'Metalloids'),
(11, 53, 'Iodine', 'Halogens'),
(12, 32, 'Germanium', 'Metalloids'),
(13, 10, 'Neon', 'Noble Gases'),
(14, 54, 'Xenon', 'Noble Gases'),
(15, 34, 'Selenium', 'Nonmetals'),
(16, 2, 'Helium', 'Noble Gases'),
(17, 18, 'Argon', 'Noble Gases'),
(18, 18, 'Krypton', 'Noble Gases'),
(19, 86, 'Radon', 'Noble Gases'),
(20, 35, 'Bromine', 'Halogens'),
(21, 85, 'Astatine', 'Halogens'),
(22, 33, 'Arsenic', 'Metalloids'),
(23, 52, 'Tellurium', 'Metalloids'),
(24, 51, 'Antimony', 'Metalloids'),
(25, 89, 'Actinium', 'Actinides'),
(26, 90, 'Thorium', 'Actinides'),
(27, 91, 'Protactinium', 'Actinides'),
(28, 92, 'Uranium', 'Actinides'),
(29, 93, 'Neptunium', 'Actinides'),
(30, 94, 'Plutonium', 'Actinides'),
(31, 95, 'Americium', 'Actinides'),
(32, 96, 'Curium', 'Actinides'),
(33, 97, 'Berkelium', 'Actinides'),
(34, 98, 'Californium', 'Actinides'),
(35, 99, 'Einsteinium', 'Actinides'),
(36, 100, 'Fernium', 'Actinides');

-- --------------------------------------------------------

--
-- Table structure for table `el_users`
--

CREATE TABLE `el_users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `el_users`
--

INSERT INTO `el_users` (`userId`, `userName`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'admin', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4'),
(3, 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(4, 'ted', '1ba79775d1d10c94407a8815646f68c45f2b073b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `el_classes`
--
ALTER TABLE `el_classes`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `el_items`
--
ALTER TABLE `el_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `el_users`
--
ALTER TABLE `el_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `el_classes`
--
ALTER TABLE `el_classes`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `el_items`
--
ALTER TABLE `el_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `el_users`
--
ALTER TABLE `el_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
