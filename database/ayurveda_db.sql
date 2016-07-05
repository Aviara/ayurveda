-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2016 at 06:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ayurveda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resorts`
--

CREATE TABLE IF NOT EXISTS `tbl_resorts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `countryId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `listImageUrl` text NOT NULL,
  `xCoordinate` float NOT NULL,
  `yCoordinate` float NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedOn` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
