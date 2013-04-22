-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2013 at 01:12 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sakola`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_site`
--

CREATE TABLE IF NOT EXISTS `table_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(20) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `footer` varchar(350) NOT NULL,
  `tagline` varchar(500) NOT NULL,
  `smpicture1` varchar(500) NOT NULL,
  `smpicture2` varchar(500) NOT NULL,
  `smpicture3` varchar(500) NOT NULL,
  `tgpicture1` varchar(500) NOT NULL,
  `tgpicture2` varchar(500) NOT NULL,
  `tgpicture3` varchar(500) NOT NULL,
  `menu1` varchar(25) NOT NULL,
  `menu2` varchar(25) NOT NULL,
  `menu3` varchar(25) NOT NULL,
  `bgheader` varchar(20) NOT NULL,
  `bgfooter` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `table_site`
--

INSERT INTO `table_site` (`id`, `header`, `caption`, `footer`, `tagline`, `smpicture1`, `smpicture2`, `smpicture3`, `tgpicture1`, `tgpicture2`, `tgpicture3`, `menu1`, `menu2`, `menu3`, `bgheader`, `bgfooter`) VALUES
(1, 'Indonesia', 'Caption', 'Bandung', 'melisa', 'smpicture_1.jpg', 'smpicture_2.jpg', 'smpicture_3.jpg', 'Tag picture 11', 'Tag picture 2', 'Tag picture 3', 'Menu 1', 'Menu 2', 'Menu 3', '06206e', '0091ff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
