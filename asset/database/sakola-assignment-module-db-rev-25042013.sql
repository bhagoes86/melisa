-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. April 2013 jam 10:01
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sakola`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_file`
--

CREATE TABLE IF NOT EXISTS `assignment_file` (
  `id_assignment` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_assignment` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  `ext` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_assignment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `assignment_file`
--

INSERT INTO `assignment_file` (`id_assignment`, `user_id`, `course_id`, `file_assignment`, `size`, `ext`, `title`, `description`, `start_time`, `end_time`, `status`, `deleted`, `date_modified`) VALUES
(6, 10, 0, 'assignment_file_6.pdf', 1010, '.pdf', 'ajkhsdfhakfdss', 'aksjhdfjkahsdjfsss', '2013-04-21 22:00:00', '2013-04-21 23:00:00', 1, 1, '2013-04-21 23:33:25'),
(7, 10, 1, 'assignment_file_7.pdf', 1010, '.pdf', '[TUGAS] Pengumpulan Jurnal Ilmiah Semester 8', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', '2013-04-24 00:00:00', '2013-04-25 00:00:00', 1, 0, '2013-04-24 08:33:34'),
(8, 10, 1, 'assignment_file_8.rar', 293, '.rar', 'Hehehe', 'hehehe', '2013-04-24 12:00:00', '2013-04-25 12:00:00', 1, 1, '2013-04-25 14:58:43'),
(9, 10, 1, 'assignment_file_9.zip', 2253, '.zip', 'crot', 'crot', '2013-04-24 12:00:00', '2013-04-25 12:00:00', 1, 1, '2013-04-25 14:58:46'),
(10, 10, 4, 'assignment_file_10.rar', 293, '.rar', 'Tugas Pemrograman Berorientasi Objek', 'heseyeeeeeeee', '2013-04-24 17:00:00', '2013-04-25 00:00:00', 1, 0, '2013-04-25 14:58:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_file_student`
--

CREATE TABLE IF NOT EXISTS `assignment_file_student` (
  `id_assignment_student` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `size` int(11) NOT NULL,
  `ext` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `feedback` text NOT NULL,
  `score` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_assignment_student`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `assignment_file_student`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_group`
--

CREATE TABLE IF NOT EXISTS `assignment_group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `assignment_group`
--

INSERT INTO `assignment_group` (`id_group`, `assignment_id`, `title`, `description`, `password`, `status`, `deleted`, `date_created`, `date_modified`) VALUES
(1, 7, 'Kelas A', 'hehehehe', '', 1, 0, '2013-04-23', '2013-04-23 08:35:44'),
(2, 7, 'Kelas B', 'hehehe', '', 1, 0, '2013-04-23', '2013-04-23 08:43:27'),
(3, 7, 'Kelas C', 'hihihihihi', 'bejo', 1, 0, '2013-04-23', '2013-04-23 09:32:55'),
(4, 7, 'Kelas D', 'hohoho', '', 1, 1, '2013-04-23', '2013-04-23 08:57:04'),
(5, 8, 'Kelas A', 'hehehehehe', 'bejo', 1, 0, '2013-04-24', '2013-04-24 13:13:03'),
(6, 9, 'Kelas A', 'hehehe', 'bejo', 1, 0, '2013-04-24', '2013-04-24 13:12:49'),
(7, 10, 'Kelas A', 'benget', 'bejo', 1, 0, '2013-04-24', '2013-04-24 17:12:57');
