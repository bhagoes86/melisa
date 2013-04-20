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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `header` varchar(250) NOT NULL,
  `news` text NOT NULL,
  `attachment` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `attachment_type` varchar(2) NOT NULL,
  `ext` varchar(5) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `header`, `news`, `attachment`, `date`, `type`, `status`, `attachment_type`, `ext`) VALUES
(1, 'info baru', '802649.jpg', 'baru 1asds DAS SAD SADSADSd ad sa dasd', 'https://soundcloud.com/javiermisa/richard-marx-hazard-javier-misa-bootleg-remix#play', '2013-04-16 04:24:03', 2, 0, '6', ''),
(2, 'Berita', '1.PNG', 'adsdafssafsafsafasfsafsafsafsafsteteataf', 'trtst', '2013-04-02 05:57:23', 1, 0, '2', ''),
(3, 'fitur b', '736px-Iris_virginica.jpg', 'fitur b', 'http://www.youtube.com/watch?v=XnABRPS37hk', '2013-04-16 05:06:19', 3, 0, '2', ''),
(4, 'sakola', '800px-Kosaciec_szczecinkowaty_Iris_setosa.jpg', 'sakola', '', '2013-04-02 05:54:41', 4, 0, '', ''),
(6, 'blog', '736px-Iris_virginica.jpg', 'blog', '', '2013-04-18 04:46:18', 6, 0, '', ''),
(7, 'pengembangan', '', 'pengembangan', '', '2013-04-02 03:35:46', 7, 0, '', ''),
(8, 'kerjasama', '', 'kerjasama', 'https://vimeo.com/62678089', '2013-04-16 05:43:17', 8, 0, '3', ''),
(9, 'Sponsor', '', 'Sponsor', '', '2013-04-02 03:36:04', 9, 0, '', ''),
(10, 'jgkjgkjkj', '736px-Iris_virginica.jpg', 'khgkhgkjgkgjk', '10.MP4', '2013-04-16 04:02:31', 1, 0, '0', ''),
(11, 'teat', '', 'eateat', 'http://www.youtube.com/watch?v=FpYdU1XUesA', '2013-04-16 04:23:07', 2, 0, '2', ''),
(12, '1', '', '1', '', '2013-04-10 06:04:38', 4, 0, '', ''),
(13, '2', 'K_means.PNG', '2', '', '2013-04-10 08:05:33', 4, 0, '', ''),
(14, '3', '', '3', '', '2013-04-10 06:04:45', 4, 0, '', ''),
(15, '4', '', '4', '', '2013-04-10 08:08:36', 4, 0, '', ''),
(16, '5', '', '5', '', '2013-04-10 08:08:39', 4, 0, '', ''),
(17, '6', '', '6', '', '2013-04-10 08:08:42', 4, 0, '', ''),
(18, '7', '', '7', '', '2013-04-10 08:08:44', 4, 0, '', ''),
(19, '8', '', '8', '', '2013-04-10 08:08:48', 4, 0, '', ''),
(20, '9', '', '9', '', '2013-04-10 08:08:52', 4, 0, '', ''),
(21, '10', '', '10', '', '2013-04-10 08:08:56', 4, 0, '', ''),
(22, '11', '', '11', '', '2013-04-10 08:09:00', 4, 0, '', ''),
(24, 'test', '', 'test', '24.MP4', '2013-04-16 07:46:20', 1, 0, '0', '.MP4'),
(26, 'sas', '', 'sssa', 'asdsadsadsad', '2013-04-16 08:06:15', 1, 0, '6', ''),
(27, 'Di periksa bergiliran', 'ws_Black_and_White_Halloween_1600x1200.jpg', 'Ini merupakan sebuah cerita fiktif untuk kepentingan apa aja hhe intinya buat test berita.', '27.MP4', '2013-04-18 04:16:27', 6, 0, '0', '.MP4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
