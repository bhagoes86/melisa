-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 18. Maret 2013 jam 08:05
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vabel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_answer_log`
--

CREATE TABLE IF NOT EXISTS `quiz_answer_log` (
  `id_quiz_answer_log` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_answer_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=695 ;

--
-- Dumping data untuk tabel `quiz_answer_log`
--

INSERT INTO `quiz_answer_log` (`id_quiz_answer_log`, `result_id`, `soal_id`, `answer`, `date_modified`) VALUES
(677, 12, 132, '1', '2013-03-17 08:54:02'),
(678, 13, 132, '1', '2013-03-17 08:56:00'),
(679, 14, 132, '1', '2013-03-17 08:56:26'),
(680, 14, 133, '3', '2013-03-17 08:56:26'),
(681, 14, 134, '1', '2013-03-17 08:56:26'),
(682, 14, 135, '4', '2013-03-17 08:56:26'),
(683, 14, 136, '5', '2013-03-17 08:56:26'),
(684, 15, 132, '1', '2013-03-17 09:01:51'),
(685, 1, 132, '1', '2013-03-18 01:48:54'),
(686, 1, 133, '3', '2013-03-18 01:48:54'),
(687, 1, 134, '1', '2013-03-18 01:48:54'),
(688, 1, 135, '4', '2013-03-18 01:48:54'),
(689, 1, 136, '5', '2013-03-18 01:48:54'),
(690, 2, 132, '1', '2013-03-18 02:21:50'),
(691, 2, 133, '3', '2013-03-18 02:21:50'),
(692, 2, 134, '1', '2013-03-18 02:21:51'),
(693, 2, 135, '4', '2013-03-18 02:21:51'),
(694, 2, 136, '5', '2013-03-18 02:21:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_choice`
--

CREATE TABLE IF NOT EXISTS `quiz_choice` (
  `id_choice` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `option_idx` int(10) DEFAULT NULL,
  `option_text` text,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_choice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=700 ;

--
-- Dumping data untuk tabel `quiz_choice`
--

INSERT INTO `quiz_choice` (`id_choice`, `quiz_id`, `soal_id`, `option_idx`, `option_text`, `status`, `deleted`, `date`) VALUES
(671, 17, 132, 1, 'vabel', 1, 1, '2013-03-13 12:06:28'),
(672, 17, 132, 2, 'fabel', 1, 1, '2013-03-13 12:06:28'),
(673, 17, 132, 3, 'pabel', 1, 1, '2013-03-13 12:06:28'),
(674, 17, 132, 4, 'tabel', 1, 1, '2013-03-13 12:06:28'),
(675, 17, 132, 5, 'kabel', 1, 1, '2013-03-13 12:06:28'),
(676, 17, 133, 1, 'python', 1, 1, '2013-03-13 12:06:28'),
(677, 17, 133, 2, 'java', 1, 1, '2013-03-13 12:06:28'),
(678, 17, 133, 3, 'php', 1, 1, '2013-03-13 12:06:28'),
(679, 17, 133, 4, 'bash', 1, 1, '2013-03-13 12:06:28'),
(680, 17, 133, 5, 'ruby', 1, 1, '2013-03-13 12:06:28'),
(681, 17, 134, 1, 'bejo', 1, 1, '2013-03-13 12:06:28'),
(682, 17, 134, 2, 'tejo', 1, 1, '2013-03-13 12:06:28'),
(683, 17, 134, 3, 'dejo', 1, 1, '2013-03-13 12:06:28'),
(684, 17, 134, 4, 'pejo', 1, 1, '2013-03-13 12:06:28'),
(685, 17, 134, 5, 'kejo', 1, 1, '2013-03-13 12:06:28'),
(686, 17, 135, 1, 'asus', 1, 1, '2013-03-13 12:06:28'),
(687, 17, 135, 2, 'toshiba', 1, 1, '2013-03-13 12:06:28'),
(688, 17, 135, 3, 'advan', 1, 1, '2013-03-13 12:06:28'),
(689, 17, 135, 4, 'acer', 1, 1, '2013-03-13 12:06:28'),
(690, 17, 135, 5, 'samsung', 1, 1, '2013-03-13 12:06:28'),
(691, 17, 136, 1, 'samsung', 1, 1, '2013-03-13 12:06:28'),
(692, 17, 136, 2, 'htc', 1, 1, '2013-03-13 12:06:28'),
(693, 17, 136, 3, 'blackberry', 1, 1, '2013-03-13 12:06:28'),
(694, 17, 136, 4, 'lg', 1, 1, '2013-03-13 12:06:28'),
(695, 17, 136, 5, 'nokia', 1, 1, '2013-03-13 12:06:28'),
(696, 17, 137, 1, 'ridwan', 1, 0, '2013-03-13 17:29:10'),
(697, 17, 137, 2, 'fadjar', 1, 0, '2013-03-13 17:29:10'),
(698, 17, 137, 3, 'septian', 1, 0, '2013-03-13 17:29:10'),
(699, 17, 137, 4, 'ojan', 1, 0, '2013-03-13 17:29:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_course`
--

CREATE TABLE IF NOT EXISTS `quiz_course` (
  `id_quiz_course` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz_course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `quiz_course`
--

INSERT INTO `quiz_course` (`id_quiz_course`, `quiz_id`, `course_id`, `deleted`) VALUES
(27, 17, 2, 0),
(29, 17, 1, 1),
(30, 17, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_file`
--

CREATE TABLE IF NOT EXISTS `quiz_file` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_quiz` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `length_time` int(11) NOT NULL,
  `num_per_page` int(11) NOT NULL,
  `max_answer_show` int(11) NOT NULL,
  `random_soal` int(11) NOT NULL,
  `random_jawaban` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `quiz_file`
--

INSERT INTO `quiz_file` (`id_quiz`, `user_id`, `course_id`, `file_quiz`, `title`, `description`, `start_time`, `end_time`, `length_time`, `num_per_page`, `max_answer_show`, `random_soal`, `random_jawaban`, `status`, `deleted`, `date`) VALUES
(17, 2, 0, 'quiz_17.xls', 'Kuis Demo Vabel', 'Percobaaan', '2013-03-16 00:00:00', '2013-03-20 00:00:00', 60, 5, 4, 0, 0, 1, 1, '2013-03-16 18:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_group`
--

CREATE TABLE IF NOT EXISTS `quiz_group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `quiz_group`
--

INSERT INTO `quiz_group` (`id_group`, `quiz_id`, `title`, `description`, `password`, `status`, `deleted`, `date_create`, `date_modified`) VALUES
(6, 17, 'Kelas A', 'kelas pagi', 'ridwan', 1, 0, '2013-03-13', '2013-03-16 18:05:51'),
(11, 17, 'Kelas B', 'coba', 'bejo', 1, 0, '2013-03-13', '2013-03-16 18:05:38'),
(12, 17, 'Kelas A 2014', 'bejo', '', 0, 1, '2013-03-13', '2013-03-13 17:24:31'),
(13, 17, 'Kelas A 2014 - Susulan', 'bejo', '', 0, 1, '2013-03-13', '2013-03-13 17:24:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_resource`
--

CREATE TABLE IF NOT EXISTS `quiz_resource` (
  `id_quiz_resource` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cover` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `size` varchar(15) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `type` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  `converted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_resource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data untuk tabel `quiz_resource`
--

INSERT INTO `quiz_resource` (`id_quiz_resource`, `user_id`, `cover`, `title`, `description`, `file`, `size`, `ext`, `type`, `show`, `converted`, `date`) VALUES
(120, 2, 0, 'Windows 8 Demo', 'bejo sekali asdasdasd', 'http://www.youtube.com/watch?v=G3xnq8d_Tdw', '', '', 2, 0, 0, '2013-02-28 14:27:28'),
(121, 2, 0, 'Bejo Ganteng', 'Hahahahahahahahah', 'http://vimeo.com/33199995', '', '', 3, 0, 0, '2013-02-28 14:52:33'),
(126, 2, 0, 'a;hdlfhajdshfkalhsdkjhfakjsdhfjkahsdplhfasphfdkjfds', 'ahydsjkfhakjhdsfjhaskjdfhkjadsfklhasphfdkahdsjl', 'http://www.youtube.com/watch?v=G3xnq8d_Tdw', '', '', 2, 0, 0, '2013-03-02 12:59:48'),
(127, 2, 0, 'Open Source', 'aqri maneh beulll....', 'quiz_picture_127.jpg', '122.01', '.jpg', 8, 0, 0, '2013-03-02 19:49:27'),
(128, 2, 0, 'Ini Docstoc', 'wawawawawawaa', 'http://www.docstoc.com/docs/5028/Automobile-Rental-Agreement', '', '', 7, 0, 0, '2013-03-02 21:44:48'),
(129, 2, 0, 'Ini Scribd', 'ahahhahahahahahhaha', 'http://www.scribd.com/doc/127392225/The-US-State-Department-s-American-Spaces-Programs', '', '', 4, 0, 0, '2013-03-02 21:45:16'),
(130, 2, 0, 'Ini Soundcloud', 'Zibongsky', 'https://soundcloud.com/zayretro/cant-smile-without-you-cover', '', '', 6, 0, 0, '2013-03-03 12:28:29'),
(131, 2, 0, 'Ini Dokumen', 'hahahahahahha', 'quiz_document_131.pdf', '1285.51', '.pdf', 1, 0, 0, '2013-03-03 14:09:16'),
(132, 2, 0, 'Ini Slideshare', 'benget', 'http://www.slideshare.net/antiw/open-cv-2005-q4-tutorial', '', '', 5, 0, 0, '2013-03-03 15:06:50'),
(146, 2, 0, 'goblog', 'goblog', 'quiz_video_146.flv', '3063.79', '.flv', 0, 0, 0, '2013-03-03 19:39:39'),
(147, 2, 0, 'Ini Suara !!!!', 'Ini Suara !!!!', 'quiz_sound_147.mp3', '3728.24', '.mp3', 9, 0, 0, '2013-03-03 20:20:10'),
(150, 2, 0, 'Suara aja', 'asdasd', 'quiz_sound_150.mp3', '2439.18', '.mp3', 9, 0, 0, '2013-03-05 12:11:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_result`
--

CREATE TABLE IF NOT EXISTS `quiz_result` (
  `id_result` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id_result`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `quiz_result`
--

INSERT INTO `quiz_result` (`id_result`, `user_id`, `course_id`, `quiz_id`, `group_id`, `score`, `right_answer`, `wrong_answer`, `status`, `start_time`, `end_time`) VALUES
(2, 3, 2, 17, 11, 100, 5, 0, 1, '2013-03-18 02:21:00', '2013-03-18 03:21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_soal`
--

CREATE TABLE IF NOT EXISTS `quiz_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data untuk tabel `quiz_soal`
--

INSERT INTO `quiz_soal` (`id_soal`, `quiz_id`, `resource_id`, `soal`, `answer`, `status`, `deleted`, `date`) VALUES
(132, 17, 0, 'proyek e learning unpad terbaru ...', '1', 1, 1, '2013-03-13 12:06:28'),
(133, 17, 0, 'bahasa pemrograman yang dipakai kang taufik', '3', 1, 1, '2013-03-13 12:06:28'),
(134, 17, 0, 'siapakah yang membuat script ini', '1', 1, 1, '2013-03-13 12:06:28'),
(135, 17, 0, 'merk laptop saya ? ', '4', 1, 1, '2013-03-13 12:06:28'),
(136, 17, 0, 'merk handphone saya', '5', 1, 1, '2013-03-13 12:06:28'),
(137, 17, 0, 'Siapa orang paling bejo ????', '4', 1, 0, '2013-03-13 17:29:10');
