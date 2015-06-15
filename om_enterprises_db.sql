-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2015 at 09:08 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_no`, `brand_name`, `dimension`, `thickness`, `stock`) VALUES
(1, 'star M.R.', '8x4', '6mm', 975),
(2, 'marine', '8x4', '', 53),
(3, 'star', '8x3', '', 110),
(4, 'marine', '8x3', '', 1010),
(5, 'ganga', '8x4', '', 550),
(6, 'ganga', '8x3', '', 110),
(7, 'star', '7x4', '', 950),
(8, 'star', '7x3', '', 4550),
(9, 'star', '6x4', '', 90),
(10, 'star', '6x3', '', 0),
(11, 'marine', '7x4', '', 100),
(12, 'marine', '7x3', '', 0),
(13, 'marine', '6x4', '', 790),
(14, 'marine', '6x3', '', 0),
(15, 'ganga', '7x4', '', 100),
(16, 'ganga', '7x3', '', 0),
(17, 'ganga', '6x4', '', 0),
(18, 'ganga', '6x3', '', 925);

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
