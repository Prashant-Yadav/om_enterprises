-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 09:18 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `om_enterprises_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_no` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL,
  `dimension` varchar(10) NOT NULL,
  `thickness` varchar(30) NOT NULL,
  `stock` int(10) NOT NULL,
  PRIMARY KEY (`brand_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_no`, `brand_name`, `dimension`, `thickness`, `stock`) VALUES
(1, 'star M.R.', '8x4', '6mm', 975),
(2, 'ultra marine M.R.', '8x4', '4mm', 53),
(3, 'star M.R.', '8x3', '4mm', 110),
(4, 'ultra marine M.R.', '8x3', '4mm', 1010),
(7, 'star M.R.', '7x4', '4mm', 950),
(8, 'star M.R.', '7x3', '4mm', 4550),
(9, 'star M.R.', '6x4', '4mm', 90),
(10, 'star M.R.', '6x3', '4mm', 0),
(11, 'ultra marine M.R.', '7x4', '4mm', 100),
(12, 'ultra marine M.R.', '7x3', '4mm', 0),
(13, 'ultra marine M.R.', '6x4', '4mm', 790),
(14, 'ultra marine M.R.', '6x3', '4mm', 0),
(19, 'star M.R.', '8x4', '4mm', 100),
(21, 'star M.R.', '8x4', '8mm', 50),
(23, 'star M.R.', '8x3', '6mm', 10),
(24, 'star M.R.', '7x4', '6mm', 10),
(25, 'star M.R.', '7x3', '6mm', 10),
(26, 'star M.R.', '6x4', '6mm', 10),
(27, 'star M.R.', '6x3', '6mm', 10),
(28, 'star M.R.', '8x4', '8mm', 50),
(29, 'star M.R.', '8x4', '8mm', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `password`, `first_name`, `last_name`) VALUES
(1, 'test1', '32250170a0dca92d53ec9624f336ca24', 'test', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
