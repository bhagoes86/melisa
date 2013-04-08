-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Maret 2013 jam 09:06
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=739 ;

--
-- Dumping data untuk tabel `quiz_answer_log`
--

INSERT INTO `quiz_answer_log` (`id_quiz_answer_log`, `result_id`, `soal_id`, `answer`, `date_modified`) VALUES
(695, 3, 132, '1', '2013-03-18 15:08:08'),
(696, 3, 133, '3', '2013-03-18 15:08:08'),
(697, 3, 134, '1', '2013-03-18 15:08:08'),
(698, 3, 135, '4', '2013-03-18 15:08:08'),
(699, 3, 136, '1', '2013-03-18 15:08:08'),
(700, 4, 132, '1', '2013-03-18 15:12:16'),
(701, 4, 133, '3', '2013-03-18 15:12:16'),
(702, 4, 134, '4', '2013-03-18 15:12:16'),
(703, 4, 135, '4', '2013-03-18 15:12:16'),
(704, 5, 132, '1', '2013-03-19 08:32:15'),
(705, 5, 133, '3', '2013-03-19 08:32:15'),
(706, 5, 134, '1', '2013-03-19 08:32:16'),
(707, 5, 135, '4', '2013-03-19 08:32:16'),
(708, 5, 136, '5', '2013-03-19 08:32:16'),
(709, 5, 138, '1', '2013-03-19 08:32:16'),
(710, 6, 132, '2', '2013-03-19 08:32:43'),
(711, 6, 133, '4', '2013-03-19 08:32:43'),
(712, 6, 134, '1', '2013-03-19 08:32:43'),
(713, 6, 135, '4', '2013-03-19 08:32:43'),
(714, 6, 136, '3', '2013-03-19 08:32:44'),
(715, 6, 138, '2', '2013-03-19 08:32:44'),
(716, 7, 132, '1', '2013-03-20 17:27:18'),
(717, 7, 133, '1', '2013-03-20 17:27:18'),
(718, 7, 134, '3', '2013-03-20 17:27:18'),
(719, 7, 136, '4', '2013-03-20 17:27:18'),
(720, 7, 138, '3', '2013-03-20 17:27:18'),
(721, 8, 132, '1', '2013-03-21 13:58:05'),
(722, 8, 133, '3', '2013-03-21 13:58:05'),
(723, 8, 134, '1', '2013-03-21 13:58:05'),
(724, 8, 135, '4', '2013-03-21 13:58:05'),
(725, 8, 136, '5', '2013-03-21 13:58:05'),
(726, 8, 138, '2', '2013-03-21 13:58:05'),
(727, 9, 132, '1', '2013-03-21 14:00:47'),
(728, 9, 133, '2', '2013-03-21 14:00:47'),
(729, 9, 134, '4', '2013-03-21 14:00:47'),
(730, 9, 135, '4', '2013-03-21 14:00:47'),
(731, 9, 136, '3', '2013-03-21 14:00:47'),
(732, 9, 138, '1', '2013-03-21 14:00:47'),
(733, 10, 132, '1', '2013-03-24 11:10:35'),
(734, 10, 133, '2', '2013-03-24 11:10:35'),
(735, 10, 134, '1', '2013-03-24 11:10:35'),
(736, 10, 135, '4', '2013-03-24 11:10:35'),
(737, 10, 136, '3', '2013-03-24 11:10:36'),
(738, 10, 138, '6', '2013-03-24 11:10:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=706 ;

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
(699, 17, 137, 4, 'ojan', 1, 0, '2013-03-13 17:29:10'),
(700, 17, 138, 1, 'Sencha', 1, 1, '2013-03-19 08:24:52'),
(701, 17, 138, 2, 'JQuery', 1, 1, '2013-03-19 08:24:57'),
(702, 17, 138, 3, 'Canonical', 1, 1, '2013-03-19 08:25:02'),
(703, 17, 138, 4, 'Red Hat', 1, 1, '2013-03-19 08:25:07'),
(704, 17, 138, 5, 'Microsoft', 1, 1, '2013-03-19 08:25:20'),
(705, 17, 138, 6, 'Oracle', 1, 1, '2013-03-24 10:48:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `quiz_course`
--

INSERT INTO `quiz_course` (`id_quiz_course`, `quiz_id`, `course_id`, `deleted`) VALUES
(31, 17, 3, 0),
(32, 17, 2, 0),
(33, 17, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_course_group`
--

CREATE TABLE IF NOT EXISTS `quiz_course_group` (
  `id_quiz_course_group` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz_course_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `quiz_course_group`
--

INSERT INTO `quiz_course_group` (`id_quiz_course_group`, `course_id`, `group_id`, `deleted`) VALUES
(32, 2, 14, 0),
(33, 3, 14, 0),
(34, 3, 15, 1),
(35, 1, 15, 0),
(36, 2, 15, 0),
(37, 1, 14, 1),
(38, 3, 16, 0);

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
(17, 2, 0, 'quiz_17.xls', 'Kuis Demo Vabel', 'Percobaaan', '2013-03-19 00:00:00', '2013-03-25 00:00:00', 60, 5, 5, 0, 0, 1, 1, '2013-03-21 16:40:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `quiz_group`
--

INSERT INTO `quiz_group` (`id_group`, `quiz_id`, `title`, `description`, `password`, `status`, `deleted`, `date_create`, `date_modified`) VALUES
(14, 17, 'Kelas A', 'percobaan', 'bejos', 1, 0, '2013-03-18', '2013-03-19 11:38:26'),
(15, 17, 'Kelas B', 'percobaan ...', 'ridwan', 1, 0, '2013-03-18', '2013-03-18 15:07:19'),
(16, 17, 'Kelas C', 'Testtttt', 'test', 1, 0, '2013-03-20', '2013-03-20 17:25:38');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

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
(150, 2, 0, 'Suara aja', 'asdasd', 'quiz_sound_150.mp3', '2439.18', '.mp3', 9, 0, 0, '2013-03-05 12:11:09'),
(151, 2, 0, 'Learning to love javascript', 'test aja', 'https://www.youtube.com/watch?v=seX7jYI96GE', '', '', 2, 0, 0, '2013-03-20 13:00:19'),
(152, 2, 0, '0', '0', '', '', '', 0, 0, 0, '2013-03-20 13:01:10'),
(153, 2, 0, 'Neverall', 'benget', 'quiz_video_153.flv', '7488.9', '.flv', 0, 0, 0, '2013-03-20 13:01:51');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `quiz_result`
--

INSERT INTO `quiz_result` (`id_result`, `user_id`, `course_id`, `quiz_id`, `group_id`, `score`, `right_answer`, `wrong_answer`, `status`, `start_time`, `end_time`) VALUES
(5, 3, 2, 17, 14, 100, 6, 0, 1, '2013-03-19 08:28:00', '2013-03-19 09:28:00'),
(6, 3, 2, 17, 15, 33, 2, 4, 1, '2013-03-19 08:32:00', '2013-03-19 09:32:00'),
(7, 3, 3, 17, 16, 17, 1, 4, 1, '2013-03-20 17:26:00', '2013-03-20 18:26:00'),
(8, 4, 2, 17, 14, 83, 5, 1, 1, '2013-03-21 13:57:00', '2013-03-21 14:57:00'),
(9, 5, 2, 17, 14, 50, 3, 3, 1, '2013-03-21 14:00:00', '2013-03-21 15:00:00'),
(10, 6, 2, 17, 14, 50, 3, 3, 1, '2013-03-24 11:10:00', '2013-03-24 12:10:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data untuk tabel `quiz_soal`
--

INSERT INTO `quiz_soal` (`id_soal`, `quiz_id`, `resource_id`, `soal`, `answer`, `status`, `deleted`, `date`) VALUES
(132, 17, 0, 'proyek e learning unpad terbaru ...', '1', 1, 1, '2013-03-20 17:28:11'),
(133, 17, 0, 'bahasa pemrograman yang dipakai kang taufik', '3', 1, 1, '2013-03-13 12:06:28'),
(134, 17, 0, 'siapakah yang membuat script ini', '1', 1, 1, '2013-03-13 12:06:28'),
(135, 17, 0, 'merk laptop saya ? ', '4', 1, 1, '2013-03-13 12:06:28'),
(136, 17, 0, 'merk handphone saya', '5', 1, 1, '2013-03-13 12:06:28'),
(137, 17, 0, 'Siapa orang paling bejo ????', '4', 1, 0, '2013-03-13 17:29:10'),
(138, 17, 0, 'Perusahaan yang membuat Sencha Touch ????', '1', 1, 1, '2013-03-19 08:30:53');
