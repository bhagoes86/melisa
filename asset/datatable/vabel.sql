-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2013 at 03:11 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vabel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Edukasi'),
(2, 'Olahraga'),
(3, 'Hiburan'),
(4, 'Kesehatan'),
(6, 'Musik'),
(7, 'Teknologi'),
(8, 'Berita'),
(10, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id_content` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id_content`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=220 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `user_id`, `cover`, `title`, `description`, `file`, `size`, `ext`, `type`, `show`, `converted`, `date`) VALUES
(13, 2, 13, 'Audit Komunikasi', 'Audit Komunikasi', '13.mp4', '27047.27', '.mp4', 0, 1, 0, '2013-01-03 17:00:00'),
(14, 2, 14, 'Pengantar Psikologi Lingkungan', 'Pengantar Psikologi Lingkungan', '14.mp4', '33923.44', '.mp4', 0, 1, 0, '2013-01-03 17:00:00'),
(15, 2, 15, 'EB Exploration Geochemistry', 'EB Exploration Geochemistry', '15.mp4', '32088.48', '.mp4', 0, 1, 0, '2013-01-03 17:00:00'),
(16, 2, 16, 'Gangguan Sistem Reproduksi Wanita', 'Gangguan Sistem Reproduksi Wanita', '16.mp4', '65173.45', '.mp4', 0, 1, 0, '2013-01-03 17:00:00'),
(19, 2, 19, 'Viva La Vida', 'la la la', '19.MP4', '45335.87', '.MP4', 0, 1, 0, '2013-01-04 17:00:00'),
(25, 2, 25, 'CSharp Blog Reader Part 1', 'CSharp Blog Reader Part 1', '25.mp4', '62203.81', '.mp4', 0, 1, 0, '2013-01-07 10:28:11'),
(30, 2, 30, 'Leadership', 'Leadership', '30.mov', '68023.38', '.mov', 0, 1, 1, '2013-01-08 07:27:34'),
(36, 2, 36, 'Galaxy Nexus & Ubuntu', 'Galaxy Nexus & Ubuntu', '36.FLV', '27747.13', '.FLV', 0, 1, 0, '2013-01-08 18:26:19'),
(37, 2, 37, 'Irwansyah', 'Irwansyah', '37.FLV', '20768.81', '.FLV', 0, 1, 0, '2013-01-08 19:25:27'),
(38, 2, 38, 'Nasa Jhonson Style', 'Nasa Jhonson Style', '38.MP4', '73596.88', '.MP4', 0, 1, 0, '2013-01-08 19:42:37'),
(39, 2, 0, 'Windows 8 Small Demonstration', 'Windows 8 Small Demonstration', 'http://www.youtube.com/watch?v=G3xnq8d_Tdw', '', '', 2, 1, 0, '2013-01-09 01:03:11'),
(40, 2, 0, 'Curiosity''s New Year Greeting for Times Square', 'New Year''s Eve revelers watching giant screens in New York''s Times Square saw a special Happy New Year greeting from Mars, which was 206 million miles away as of Dec. 31, 2012. The video is silent and formatted to fit the Times Square screens.', 'http://www.youtube.com/watch?v=pk7J68MhOoQ', '', '', 2, 2, 0, '2013-01-09 01:18:31'),
(41, 2, 0, 'Steve Jobs'' 2005 Stanford Commencement Address', 'Drawing from some of the most pivotal points in his life, Steve Jobs, chief executive officer and co-founder of Apple Computer and of Pixar Animation Studios, urged graduates to pursue their dreams and see the opportunities in life''s setbacks -- including death itself -- at the university''s 114th Commencement on June 12, 2005.', 'https://www.youtube.com/watch?v=UF8uR6Z6KLc', '', '', 2, 1, 0, '2013-01-09 01:26:43'),
(42, 2, 42, 'Pemeriksaan Fisik Ibu Hamil', 'Pemeriksaan Fisik Ibu Hamil', '42.mov', '74212.79', '.mov', 0, 1, 1, '2013-01-09 02:25:51'),
(43, 2, 0, 'Droid Razr M', 'Droid Razr M', 'http://www.youtube.com/watch?v=7CrKjW66tGk', '', '', 2, 1, 0, '2013-01-09 04:04:34'),
(44, 2, 44, 'Masalah Sosial E-learning ', 'Masalah Sosial E-learning ', '44.mov', '45240.98', '.mov', 0, 1, 1, '2013-01-09 04:19:24'),
(45, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-09 04:24:28'),
(46, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-09 05:43:04'),
(47, 2, 47, 'Analisis Lingkungan Eksternal', 'Analisis Lingkungan Eksternal', '47.mov', '65899.16', '.mov', 0, 1, 1, '2013-01-09 07:41:22'),
(48, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-09 07:49:36'),
(49, 2, 0, 'Geografi - Atmosfer', 'Geografi - Atmosfer', 'https://www.youtube.com/watch?feature=player_embedded&v=54JSVZYwoG0', '', '', 2, 1, 0, '2013-01-09 20:13:28'),
(50, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-10 04:26:17'),
(51, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-10 04:31:34'),
(52, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-10 04:31:37'),
(53, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-10 04:39:01'),
(54, 2, 54, 'FUNDAMENTAL CELLULAR AND MOLECULAR PHYSIOLOGY', 'FUNDAMENTAL CELLULAR AND MOLECULAR PHYSIOLOGY?\nOleh :\nDr. Reni Farenia.,dr.,MKes\nDept.Physiology, Medical Faculty\nUniversitas Padjadjaran\n?', '54.mov', '95623.01', '.mov', 0, 1, 1, '2013-01-10 05:29:23'),
(55, 2, 0, 'B. J. Habibie - Pidato Hari Pancasila 2011', 'Rekaman pidato kebangsaan Bacharuddin Jusuf Habibie, Mantan Presiden RI ke-3, pada peringatan Hari Pancasila 1 Juni 2011.\nSumber: Liputan 6, SCTV\n\n"Reaktualisasi Pancasila dalam Kehidupan Berbangsa dan Bernegara"\nSalinan pidato: http://www.tempointeraktif.com/hg/politik/2011/06/01/brk,20110601-338141,id.html', 'http://www.youtube.com/watch?v=WTkg5AFdsFU', '', '', 2, 1, 0, '2013-01-10 10:13:08'),
(56, 2, 0, 'Ubuntu Mobile Operating System Launched', 'Ubuntu Mobile Operating System Launched', 'http://www.youtube.com/watch?v=I4a9mI0qsaI', '', '', 2, 1, 0, '2013-01-10 22:35:25'),
(57, 2, 0, 'Mark Shuttleworth Demos Ubuntu Phone 2013', 'Mark Shuttleworth Demos Ubuntu Phone 2013', 'http://www.youtube.com/watch?v=bxIv23_oHIk', '', '', 2, 1, 0, '2013-01-10 22:37:19'),
(59, 0, 0, 'DINAMIK 8 Dies Natalis Ilmu Komputer UPI ', 'DINAMIK 8 Dies Natalis Ilmu Komputer UPI', 'http://www.youtube.com/watch?v=4OQLC9m-bCs', '', '', 2, 1, 0, '2013-01-12 02:03:49'),
(60, 2, 60, 'Matematika Keuangan', 'Matematika Keuangan', '60.mov', '73184.44', '.mov', 0, 1, 1, '2013-01-14 02:42:23'),
(61, 2, 61, 'Jenis Jenis Potensial Hijauan Dikembangkan Sapi', 'Jenis Jenis Potensial Hijauan Dikembangkan Sapi', '61.mov', '77220.36', '.mov', 0, 1, 1, '2013-01-14 03:10:25'),
(62, 2, 62, 'Karakteristik Komunikasi Kelompok', 'Karakteristik Komunikasi Kelompok', '62.mov', '30972.11', '.mov', 0, 1, 1, '2013-01-14 03:21:37'),
(63, 2, 0, 'Momentum: Ice skater throws a ball ', 'A simple conservation of momentum problem involving an ice skater and a ball', 'http://www.youtube.com/watch?v=vPkkCOlGND4', '', '', 2, 1, 0, '2013-01-14 03:46:29'),
(64, 2, 0, ' Nervous System Part 4 ', 'Nervous system', 'http://www.youtube.com/watch?v=kjSuT89IW94', '', '', 2, 1, 0, '2013-01-14 03:48:24'),
(65, 2, 0, ' Fluids (part 4) ', '', 'http://www.youtube.com/watch?v=i6gz9VFyYks&list=PL850CDD4E0BF92102', '', '', 2, 1, 0, '2013-01-14 03:49:35'),
(66, 2, 66, 'Kalkulus 1', 'Kalkulus 1', '66.mp4', '60680.47', '.mp4', 0, 1, 0, '2013-01-14 04:21:35'),
(67, 2, 0, 'How To Say "No!" to Almost Anything [Epipheo.TV]', 'We all wish we had the self-control to say, "No," to certain things and the willpower to say, "Yes!" to other things. It''s almost like we have two brains that are fighting against each other.\n\nWe talked with Kelly McGonigal, author of, "The Willpower Instinct," about this inner conflict we often feel and she helps us break down willpower into three different powers:\n\n1) I Will Power\n2) I Won''t Power\n3) I Want Power\n\nCheck out her book on Amazon at the link below.\n\nThe Willpower Instinct: How Self-Control Works, Why It Matters, and What You Can Do To Get More of It\nhttp://amzn.to/Y7LyYg\n\nThanks to http://www.lifehacker.com for partnering with us on this month''s Life Hack series!\n\nSUBSCRIBE FOR NEXT WEEK''S VIDEO!\n-- Best Subscription Method --\nYouTube: http://www.youtube.com/subscription_center?add_user=epipheo\n\n-- Alternative Subscription Methods -- \nEmail: http://eepurl.com/plpof\nRSS: http://feeds.feedburner.com/epipheotv\n\nLET''S BE SOCIAL TOGETHER, SHALL WE?\nhttp://www.facebook.com/epipheo\nhttp://twitter.com/epipheo\nhttp://gplus.to/epipheo\n\nWEEKLY VIDEOS NOT ENOUGH FOR YOU?\nAwesomeness we make for other people: http://www.youtube.com/epipheostudios\n\nEpiphanies Change Lives\nhttp://www.epipheo.tv\n\nTruth. Story. Love.\nhttp://www.epipheo.com', 'https://www.youtube.com/watch?v=H2G3nxr1nvY', '', '', 2, 1, 0, '2013-01-19 15:06:23'),
(68, 2, 68, 'Customer Satisfaction', 'Customer Satisfaction', '68.mov', '62429.79', '.mov', 0, 1, 1, '2013-01-19 19:29:03'),
(69, 2, 0, 'Cara Cepat Input soal multiple choice ke LMS moodle', 'Berikut adalah tutorial dalam melakukan input soal dalam jumlah banyak ke dalam LMS Moodle. Untuk tipe multiple choice question, biasanya masih saja dilakukan input secara manual satu per satu. Dengan bantuan vletools.com , yaitu web yang memberikan layanan gratis dalam melakukan konversi soal menjadi format xml, soal dalam jumlah banyak pun bisa saja di input secara cepat jika menggunakan format soal sesuai tutorial tersebut.', 'http://www.youtube.com/watch?v=rJBFyDfV3NU', '', '', 2, 1, 0, '2013-01-20 02:16:05'),
(70, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-23 06:33:18'),
(71, 2, 71, 'Penganggaran Perusahaan', 'Penganggaran Perusahaan', '71.mov', '43228.5', '.mov', 0, 1, 1, '2013-01-23 07:27:24'),
(72, 2, 72, 'Pemeriksaan Bakteriologis BP yang Berasal dari Biakan Bakteri Campuran', 'Pemeriksaan Bakteriologis BP yang Berasal dari Biakan Bakteri Campuran', '72.mov', '66420.46', '.mov', 0, 1, 1, '2013-01-23 07:52:51'),
(73, 2, 73, 'Recurrent Aphthous Stomatitis ataukah Aphthous-like Ulcer?', 'Penatalaksanaan Recurrent Aphthous Stomatitis yang Mudah dan Tepat', '73.mov', '32036.58', '.mov', 0, 1, 1, '2013-01-23 08:00:05'),
(74, 2, 74, 'Advertorial', 'oleh Dr. Yanti Setianti ', '74.mov', '35908.79', '.mov', 0, 1, 1, '2013-01-23 08:35:10'),
(75, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-23 08:43:31'),
(76, 2, 76, 'Kelainan pada Gigi dan Periapikal Gigi ', 'Kelainan pada Gigi dan Periapikal Gigi ', '76.mov', '63471.57', '.mov', 0, 1, 1, '2013-01-23 09:04:31'),
(77, 2, 77, 'Data Source in Pharmacoepidemiological Research', 'Data Source in Pharmacoepidemiological Research', '77.mov', '24682.62', '.mov', 0, 1, 1, '2013-01-23 09:18:17'),
(78, 2, 78, 'Regulasi di Industri Farmasi', 'Regulasi di Industri Farmasi', '78.mov', '86139.45', '.mov', 0, 1, 1, '2013-01-23 09:26:58'),
(79, 2, 79, 'Proses Sosial dan Interaksi Sosial', 'Proses Sosial dan Interaksi Sosial', '79.mov', '39162.12', '.mov', 0, 1, 1, '2013-01-23 09:27:21'),
(80, 2, 80, 'Konsep Dasar Sistem dan Sistem Informasi', 'Konsep Dasar Sistem dan Sistem Informasi', '80.mov', '85701.18', '.mov', 0, 1, 1, '2013-01-23 09:35:16'),
(81, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-23 09:56:44'),
(82, 2, 82, 'Sistem Jaringan Informasi', 'Sistem Jaringan Informasi', '82.mov', '24288.77', '.mov', 0, 1, 1, '2013-01-23 09:57:53'),
(83, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-23 10:32:35'),
(84, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-25 04:52:54'),
(85, 2, 85, 'Sistem Jaringan Informasi', 'Sistem Jaringan Informasi', '85.mov', '24288.77', '.mov', 0, 1, 1, '2013-01-25 05:22:25'),
(86, 2, 86, 'Kebijakan Strategi Bisnis Analisis Lingkungan Eksternal', 'Kebijakan Strategi Bisnis Analisis Lingkungan Eksternal', '86.mov', '65899.16', '.mov', 0, 1, 1, '2013-01-25 05:24:27'),
(87, 2, 87, 'Peningkatan Kualitas Bahan Pakan', 'Peningkatan Kualitas Bahan Pakan', '87.mov', '39252.87', '.mov', 0, 1, 1, '2013-01-25 05:29:39'),
(88, 2, 88, 'Farmasi Klinik', 'Farmasi Klinik', '88.mov', '59875.18', '.mov', 0, 1, 1, '2013-01-25 05:53:45'),
(89, 2, 89, 'Anuitas Biasa', 'Anuitas Biasa', '89.mov', '73184.44', '.mov', 0, 1, 1, '2013-01-25 06:13:20'),
(90, 2, 90, 'Jenis-jenis hijauan potensial dikembangkan ', 'Jenis-jenis hijauan potensial dikembangkan ', '90.mov', '77220.36', '.mov', 0, 1, 1, '2013-01-25 06:44:27'),
(91, 2, 91, 'Kimia Sintesis', 'Kimia Sintesis', '91.mov', '84384.15', '.mov', 0, 1, 1, '2013-01-25 06:45:08'),
(92, 2, 92, 'Data Source in Pharmacoepidemiological Research', 'Data Source in Pharmacoepidemiological Research', '92.mov', '24682.62', '.mov', 0, 1, 1, '2013-01-25 07:05:43'),
(93, 2, 93, 'Cell Adaptations Cell Injury Cell Death', 'Cell Adaptations Cell Injury Cell Death', '93.mov', '82692.35', '.mov', 0, 1, 1, '2013-01-25 07:23:10'),
(94, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-25 07:24:22'),
(95, 2, 95, 'Managerial Economics', 'Managerial Economics', '95.mov', '37879.18', '.mov', 0, 1, 1, '2013-01-25 07:30:15'),
(96, 2, 96, 'Pendahuluan dan Pengantar Teori Optimasi', 'Pendahuluan dan Pengantar Teori Optimasi\noleh Dr. Diah Chaerani, M.Si', '96.mov', '82049.08', '.mov', 0, 1, 1, '2013-01-25 07:47:55'),
(97, 2, 97, 'Group Character', 'Group Character', '97.mov', '30972.11', '.mov', 0, 1, 1, '2013-01-25 08:01:42'),
(98, 2, 0, '100 Hari Jokowi', '100 Hari Jokowi', 'http://www.youtube.com/watch?v=t1v5wpN8_cA', '', '', 2, 1, 0, '2013-01-25 08:07:35'),
(99, 2, 99, 'Mengenal Perilaku Organisasi', 'Mengenal Perilaku Organisasi', '99.mov', '95643.63', '.mov', 0, 1, 1, '2013-01-25 08:35:03'),
(100, 2, 100, 'Mikroba Fermentasi', 'Mikroba Fermentasi', '100.mov', '51897.04', '.mov', 0, 1, 1, '2013-01-25 08:35:51'),
(101, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-25 08:36:15'),
(102, 2, 102, 'Analisis Kestabilan Lereng', 'Analisis Kestabilan Lereng', '102.mov', '40421.62', '.mov', 0, 1, 1, '2013-01-25 08:44:37'),
(103, 2, 103, 'Hidrogeologi', 'Hidrogeologi', '103.mov', '57724.93', '.mov', 0, 1, 1, '2013-01-25 10:16:30'),
(104, 2, 0, 'Arsenal vs West Ham 5-1 23/01/2013 All Amazing Goals Full Highlights', 'Arsenal vs West Ham 5-1 23/01/2013 All Amazing Goals Full Highlights\nGoals:\n18'' [0-1] J. Collison \n22'' [1-1] L. Podolski \n47'' [2-1] O. Giroud \n53'' [3-1] S. Cazorla \n54'' [4-1] T. Walcott \n57'' [5-1] O. Giroud\nArsenal vs West Ham United 5-1 23/01/2013 All Amazing Goals Full Highlights\nArsenal vs West Ham U. 5-1 23/01/2013 All Amazing Goals Full Highlights\nArsenal vs WestHam 5-1 23/01/2013 All Amazing Goals Full Highlights\nAll Amazing Goals Full Highlighte\nJack Collison Amazing Goal vs Arsenal \nLukas Podolski Amazing Goal vs West Ham\nOlivier Giroud Amazing Goal vs West Ham\nSanti Cazorla Amazing Goal vs West Ham\nTheo Walcott Amazing Goal vs West Ham\nOlivier Giroud Amazing Goal vs West Ham', 'http://www.youtube.com/watch?v=_PBAsngxm44', '', '', 2, 1, 0, '2013-01-26 02:49:09'),
(105, 2, 0, 'Adobe Edge Animate: Creating the interactive web', 'Adobe Edge Animate is a tool for creating web animations with HTML, JavaScript, and CSS. In this session from the Create the Web event in San Francisco (September 24th, 2012) Lee Brimelow and Sarah Hunt from Adobe show how you can start using Edge Animate to create animations that run on browsers and mobile devices.\n\nYou can find more information on everything discussed in the keynote at:', 'http://www.youtube.com/watch?v=T7MqEEGGpus', '', '', 2, 1, 0, '2013-01-27 13:56:31'),
(106, 2, 106, 'Karakteristik Media Massa Elektronik Televisi ', 'Karakteristik Media Massa Elektronik Televisi ', '106.mov', '45547.65', '.mov', 0, 1, 1, '2013-01-28 04:19:55'),
(107, 2, 107, 'Kalkulus - 1 Modul Multimedia Podcast', 'Kalkulus - 1 Modul Multimedia Podcast', '107.mov', '74293.03', '.mov', 0, 1, 1, '2013-01-28 05:04:32'),
(108, 2, 108, 'Bioremediasi', 'Bioremediasi', '108.mov', '53901.8', '.mov', 0, 1, 1, '2013-01-28 05:34:45'),
(109, 2, 109, 'Proses Stokastik', 'Proses Stokastik', '109.mov', '39667.05', '.mov', 0, 1, 1, '2013-01-28 05:56:34'),
(110, 2, 110, 'Kuliah Manajemen Pengetahuan Perpustakaan  Topik : Konsep Pengetahuan', 'Kuliah Manajemen Pengetahuan Perpustakaan \nTopik : Konsep Pengetahuan', '110.mov', '96564.18', '.mov', 0, 1, 1, '2013-01-28 06:41:44'),
(111, 2, 111, 'The Prescription Part I', 'The Prescription Part I', '111.mov', '65887.7', '.mov', 0, 1, 1, '2013-01-28 07:05:12'),
(112, 2, 112, 'The Prescription Part II', 'The Prescription Part II', '112.mov', '64190.11', '.mov', 0, 1, 1, '2013-01-28 07:25:42'),
(113, 2, 113, 'Bayesian Klasifikasi ', 'Bayesian Klasifikasi ', '113.mov', '68246.53', '.mov', 0, 1, 1, '2013-01-28 07:43:06'),
(114, 2, 114, 'Biokimia Perairan Protein', 'Biokimia Perairan Protein', '114.mov', '83636.92', '.mov', 0, 1, 1, '2013-01-28 08:22:10'),
(115, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-28 08:24:20'),
(116, 2, 116, 'Penggunaan Diri Secara Terapeutik ', 'Penggunaan Diri Secara Terapeutik \nOleh : Aat Sriati, S.Kp.,M.Si. ', '116.mov', '60955.86', '.mov', 0, 1, 1, '2013-01-28 08:52:04'),
(117, 2, 117, 'Pokok-Pokok Hukum Ekonomi Internasional ', 'Pokok-Pokok Hukum Ekonomi Internasional \nOleh : Dr. Sinta Dewi, SS. LL.M', '117.mov', '77298.31', '.mov', 0, 1, 1, '2013-01-28 09:21:27'),
(118, 2, 118, 'Cell Structure and Function ', 'Cell Structure and Function \nOleh Achadiyani', '118.mov', '87453.01', '.mov', 0, 1, 1, '2013-01-28 09:37:52'),
(119, 2, 119, 'Produksi Peternakan Komoditas Sapi Potong', 'Prodoksi Peternakan komoditas Sapi Potong?', '119.mov', '71326.48', '.mov', 0, 1, 1, '2013-01-28 09:45:51'),
(120, 2, 0, '1 CodeIgniter Tutorials: Basic Website - Getting Started', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email.\n\nOfficial website\nhttp://phpacademy.org\n\nSupport Forum\nhttp://phpacademy.org/forum\n\nFollow us on Twitter!\nhttp://twitter.com/phpacademy', 'http://www.youtube.com/watch?v=KMg-pqwaGaE&list=PL9F771C49632B87CA', '', '', 2, 1, 0, '2013-01-28 09:50:46'),
(121, 2, 121, '3 CodeIgniter Tutorials: Basic Website - HTML Helper', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email.\n\nOfficial website\nhttp://phpacademy.org\n\nSupport Forum\nhttp://phpacademy.org/forum\n\nFollow us on Twitter!\nhttp://twitter.com/phpacademy', '121.MP4', '45104.75', '.MP4', 0, 1, 0, '2013-01-28 10:08:22'),
(122, 2, 122, '2 CodeIgniter Tutorials: Basic Website - Multiple Page Loading & Styling', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email.\n\nOfficial website\nhttp://phpacademy.org\n\nSupport Forum\nhttp://phpacademy.org/forum\n\nFollow us on Twitter!\nhttp://twitter.com/phpacademy', '122.MP4', '82324.18', '.MP4', 0, 1, 0, '2013-01-28 10:15:06'),
(123, 2, 123, '4 CodeIgniter Tutorials: Basic Website - URL Helper', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email. Official website http://phpacademy.org Support Forum http://phpacademy.org/forum Follow us on Twitter! http://twitter.com/phpacademy', '123.MP4', '62563.25', '.MP4', 0, 1, 0, '2013-01-28 10:31:49'),
(124, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-28 10:32:36'),
(125, 2, 125, '6 CodeIgniter Tutorials: Basic Website - Contact Page (Form Helper)', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email. Official website http://phpacademy.org Support Forum http://phpacademy.org/forum Follow us on Twitter! http://twitter.com/phpacademy', '125.MP4', '77435.03', '.MP4', 0, 1, 0, '2013-01-28 10:42:09'),
(126, 2, 126, '7 CodeIgniter Tutorials: Basic Website - Form Validation Library', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email. Official website http://phpacademy.org Support Forum http://phpacademy.org/forum Follow us on Twitter! http://twitter.com/phpacademy', '126.MP4', '95559.23', '.MP4', 0, 1, 0, '2013-01-28 10:47:30'),
(127, 2, 127, '8 CodeIgniter Tutorials: Basic Website - Email Library (Sending Email)', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email. Official website http://phpacademy.org Support Forum http://phpacademy.org/forum Follow us on Twitter! http://twitter.com/phpacademy', '127.MP4', '44271.58', '.MP4', 0, 1, 0, '2013-01-28 10:50:06'),
(128, 2, 0, '', '', '', '', '', 0, 2, 0, '2013-01-28 10:54:11'),
(129, 2, 0, '', '', '', '', '', 0, 0, 0, '2013-01-28 23:14:40'),
(131, 2, 0, '', '', '', '', '', 0, 2, 0, '2013-01-29 11:09:19'),
(132, 2, 132, '5 CodeIgniter Tutorials: Basic Website - Content Managing', 'This introduction to CodeIgniter walks through creating a basic content managed website (CMS). Includes multiple pages, a contact form, and the ability to send email.\n\nOfficial website\nhttp://phpacademy.org\n\nSupport Forum\nhttp://phpacademy.org/forum\n\nFollow us on Twitter!\nhttp://twitter.com/phpacademy', '132.FLV', '47177.08', '.FLV', 0, 1, 0, '2013-01-29 11:36:25'),
(133, 2, 0, 'Adobe Edge Preview Interface', 'Adobe Edge Preview Interface', 'http://vimeo.com/27492305', '', '', 3, 1, 0, '2013-01-30 07:22:03'),
(134, 2, 0, 'A Day In India', 'This short film compiles three weeks of filming, traveling and eating in India into "one day".\nCreated by: theperennialplate.com\nIn Partnership with Intrepid Travel: intrepidtravel.com/food/\nFilmed & edited by:\nDaniel Klein ( twitter.com/perennialplate/ )\nMirra Fine ( twitter.com/kaleandcola/)\nMusic by: \nCornershop: store.cornershop.com/\nThe Guadaloop: rawtapes.bandcamp.com/album/the-guadaloop-in-desired-in-the-3-worlds\naaronmaxwell: tinymixtapes.com/chocolate-grinder/listen-aaronmaxwell-sunsets\nAfter Effects by: squawkproductions.com/\nFilmed on 5d Mark iii w Canon 24-70, 70-200 2.8 L', 'http://vimeo.com/58313264', '', '', 3, 1, 0, '2013-01-30 09:35:11'),
(135, 2, 135, 'Introduction to Bioethics and Humanity Courses', 'Introduction to Bioethics and Humanity Courses \noleh Yoni Syukriani', '135.mov', '148905.48', '.mov', 0, 1, 1, '2013-02-01 04:57:50'),
(136, 2, 136, 'Feed and Feeding ', 'Feed and Feeding \noleh Denie Heriyadi', '136.mov', '155258.58', '.mov', 0, 1, 1, '2013-02-01 05:08:35'),
(137, 2, 137, 'Pertumbuhan dan Perbanyakan Mikroba', 'Pertumbuhan dan Perbanyakan Mikroba', '137.mov', '145780.36', '.mov', 0, 1, 1, '2013-02-01 05:24:52'),
(138, 2, 138, 'Management Personal Communication', 'Management Personal Communication', '138.mov', '33683.03', '.mov', 0, 1, 1, '2013-02-01 08:39:51'),
(139, 2, 139, 'Struktur Bahan', 'Struktur Bahan', '139.mov', '73392.15', '.mov', 0, 1, 1, '2013-02-01 08:56:55'),
(140, 2, 140, 'Teknik Pembenihan Ikan Lele Dumbo', 'Teknik Pembenihan Ikan Lele Dumbo', '140.mov', '26821.81', '.mov', 0, 1, 1, '2013-02-01 08:58:32'),
(141, 2, 0, 'Can''t Smile Without You (cover)', 'You know I can''t smile without you\nI can''t smile without you\nI can''t laugh and I can''t sing\nI''m finding it hard to do anything\nYou see I feel sad when you''re sad\nI feel glad when you''re glad\nIf you only knew what I''m going through\nI just can''t smile without you\n\nYou came along just like a song\nAnd brighten my day\nWho would have believed that you where part of a dream\nNow it all seems light years away\n\nAnd now you know I can''t smile without you\nI can''t smile without you\nI can''t laugh and I can''t sing\nI''m finding it hard to do anything\nYou see I feel sad when your sad\nI feel glad when you''re glad\nIf you only knew what I''m going through\nI just can''t smile\n\nNow some people say happiness takes so very long to find\nWell, I''m finding it hard leaving your love behind me\n\nAnd you see I can''t smile without you\nI can''t smile without you\nI can''t laugh and I can''t sing\nI''m finding it hard to do anything\nYou see I feel glad when you''re glad\nI feel sad when you''re sad\nIf you only knew what I''m going through\nI just can''t smile without you', 'https://soundcloud.com/zayretro/cant-smile-without-you-cover', '', '', 6, 1, 0, '2013-02-04 12:52:41'),
(142, 2, 0, 'Castle of Glass Linkin Park', 'Take me down to the river bend\nTake me down to the fighting end\nWash the poison from off my skin\nShow me how to be whole again\n\nFly me up on a silver wing\nPast the black where the sirens sing\nWarm me up in a nova''s glow\nAnd drop me down to the dream below\n\n''Cause I''m only a crack in this castle of glass\nHardly anything there for you to see\nFor you to see\n\nBring me home in a blinding dream,\nThrough the secrets that I have seen\nWash the sorrow from off my skin\nAnd show me how to be whole again\n\n''Cause I''m only a crack in this castle of glass\nHardly anything there for you to see\nFor you to see\n\n''Cause I''m only a crack in this castle of glass\nHardly anything else I need to be\n\n''Cause I''m only a crack in this castle of glass\nHardly anything there for you to see\nFor you to see\nFor you to see', 'https://soundcloud.com/linpar-unleashed/castle-of-glass-linkin-park', '', '', 6, 1, 0, '2013-02-05 04:08:45'),
(143, 2, 0, 'Burn It Down - Linkin Park', 'The cycle repeated\nas explosions broke in the sky\nall that I needed\nwas the one thing I couldn''t find\n\nAnd you were there at the turn\nWaiting to let me know\n\nWe''re building it up\nTo break it back down\nWe''re building it up\nTo burn it down\nWe can''t wait\nTo burn it to the ground<br />\n<br />\nThe colors conflicted<br />\nas the flames climbed into the clouds<br />\nI wanted to fix this / but<br />\ncouldn''t stop from tearing it down<br />\n<br />\nAnd you were caught at the turn<br />\ncaught in the burning glow<br />\nAnd I was there at the turn<br />\nWaiting to let you know<br />\n<br />\nYou told me yes / You held me high<br />\nAnd I believed when you told that lie<br />\nI played that soldier / You played king<br />\nAnd struck me down when I kissed that ring<br />\nYou lost that right / to hold that crown<br />\nI built you up but you let me down<br />\nso when you fall / I''ll take my turn<br />\nand fan the flames as your blazes burn<br />\nCategory<br />\nMusic<br />\nLicense<br />\nStandard YouTube License<br />\n', 'http://www.youtube.com/watch?v=dxytyRy-O1k', '', '', 2, 1, 0, '2013-02-05 04:34:14'),
(144, 2, 0, 'Multimedia Tools for Educators', 'Covers a variety of Web 2.0 and other Multimedia Tools educators can use to engage, excite, and educate students. http://professorjosh.com', 'http://www.slideshare.net/jmurdock3/multimedia-tools-for-educators', '', '', 5, 1, 0, '2013-02-05 06:04:27'),
(145, 2, 0, 'eLearning Talk It Out, Using Voice in Your Course', 'This PowerPoint explains some "sound" advice and tools used in recording voice in online learning.', 'http://www.slideshare.net/WilmUedtech/e-learning-alk-it-out-using-voice', '', '', 5, 1, 0, '2013-02-05 06:08:08'),
(146, 2, 0, 'First Grade Vocabulary Puzzles (Sylvan Workbooks) - Excerpt - Sylvan Learning', 'Sylvan’s First Grade Vocabulary Puzzles will give your child vocabulary-expanding practice exercises that are both fun and effective. Vocabulary is a crucial component of any language arts curriculum, and starting early on will help your child with reading, writing, and more throughout the school years. Each puzzle inside this workbook focuses on an important skill that will help kids excel in first grade. Whether your child needs extra help or just wants to practice word skills that are already strong, First Grade Vocabulary Puzzles provides entertaining learning tools for all students.', 'http://www.docstoc.com/docs/10399906/First-Grade-Vocabulary-Puzzles-(Sylvan-Workbooks)---Excerpt---Sylvan-Learning', '', '', 7, 1, 0, '2013-02-05 11:05:12'),
(147, 3, 0, 'Pengertian dan konsep promosi kesehatan', 'Promosi kesehatan adalah  suatu proses untuk meningkatkan kemampuan \nmasyarakat dalam memelihara  dan meningkatkan kesehatannya. Selain itu untuk \nmencapai derajat kesehatan  yang sempurna baik fisik, mental, dan sosial maka \nmasyarakat harus mampu mengenal dan mewujudkan aspirasinya, kebutuhannya, dan \nmampu mengubah  atau mengatasi lingkungannya (lingkungan fisik, sosial  budaya, \ndan sebagainya) (Ottawa Charter, 1986).', 'http://www.youtube.com/watch?v=gJwYYlil8lA&list=UUK1ybASqegUijH3dlEdmVSg&index=10', '', '', 2, 1, 0, '2013-02-06 07:09:44'),
(148, 2, 148, 'Blackberry User Interface Overview', 'Blackberry User Interface Overview', '148.pdf', '1329.52', '.pdf', 1, 1, 0, '2013-02-06 19:39:38'),
(149, 2, 149, 'Edmodo Untuk Guru', 'Panduan Menggunakan Edmodo Untuk Guru', '149.pdf', '2697.06', '.pdf', 1, 1, 0, '2013-02-07 08:40:10'),
(150, 2, 150, 'Edmodo Untuk Siswa', 'Panduan Penggunaan Edomodo Untuk Siswa', '150.pdf', '1481.95', '.pdf', 1, 1, 0, '2013-02-07 08:40:51'),
(151, 2, 0, 'What is Edmodo ?', 'A quick explanation of why to use Edmodo in the classroom.', 'http://www.youtube.com/watch?v=nHtwgZEHzNs', '', '', 2, 2, 0, '2013-02-07 08:50:43'),
(152, 2, 0, 'What is Edmodo ?', 'A quick explanation of why to use Edmodo in the classroom.', 'http://www.youtube.com/watch?v=nHtwgZEHzNs', '', '', 2, 1, 0, '2013-02-07 08:51:07'),
(153, 2, 0, 'Sepak Bola', 'Sepak Bola', 'http://www.youtube.com/watch?v=AVIWjGz_CiM', '', '', 2, 2, 0, '2013-02-08 04:22:24'),
(154, 2, 0, 'Memanfaatkan Facebook untuk Pembelajaran Sains -- Damriani & Zainal Abidin', 'Memanfaatkan Facebook untuk Pembelajaran Sains -- Damriani & Zainal Abidin', 'http://www.slideshare.net/dwizai/memanfaatkan-facebook-untuk-pembelajaran-sains-damriani-zainal-abidin', '', '', 5, 1, 0, '2013-02-08 08:01:43'),
(155, 2, 0, 'Cockroach Dissection - Digestive system', 'This video shows a cockroach''s dissected digestive system. These are a cockroach''s dissected mouthparts. \nTheir mouth organs, the maxilla, mandibles, and labium, are used to taste food and handle food pieces. Cockroaches use their mandibles, or jaws, to bite and chew their food.\nFrom the mouth organs, the food passes into the foregut, or esophagus. The foregut opens into a crop, where undigested food is temporarily stored. From the crop, the food enters the gizzard. The gizzard is a muscular stomach with sharp teeth-like structures that grinds the food into smaller pieces. \nThe gastric sacks contain bacteria that the cockroach uses to digest its food. \nThe Malpighian tubules are the main organs of the cockroach''s excretory system. The Malpighian tubules remove wastes from the hemolymph, in the body cavity surrounding the cockroach''s organs and tissues. These organs also regulate the balance of water and salts in the cockroach''s body. The contents of the Malpighian tubules are emptied into the midgut, which is also called the ileum. \nMost of the absorption of the food''s nutrients takes place in the midgut, or ileum. \nIn the hindgut, or colon, water, salts, and nutrients are reabsorbed from the feces and urine. The remaining wastes leave the body through the rectum, which is also part of the excretory system.', 'http://www.youtube.com/watch?v=b04hc_kOY10', '', '', 2, 1, 0, '2013-02-11 14:24:02'),
(156, 2, 0, 'French Defeat of Islamist Militants May Be Fleeting', 'French forces pushing Islamist militants out of their last strongholds in northern Mali have been met with cheers and gratitude. Only there may not be time for much celebration. French officials are already hinting their forces may leave as soon as possible. And, as VOA''s Jeff Seldin reports, the threat to Mali and all of northern Africa and the Sahel is far from over.', 'http://www.youtube.com/watch?v=r_Mf9Ee0BYY&list=PL75F0119287231905', '', '', 2, 1, 0, '2013-02-11 23:24:32'),
(157, 2, 0, 'Protests Challenge Egypt''s Leadership', 'Egypt''s government continues to face violent street protests, calling into question the ability of the nation''s first democratically-elected president to keep his country united. VOA''s Elizabeth Arrott has more from Cairo.', 'http://www.youtube.com/watch?v=vwi6Qed6hOQ&list=PL75F0119287231905', '', '', 2, 1, 0, '2013-02-11 23:25:21'),
(158, 2, 0, 'Alarm in Europe Over Threat of New Conflict in Africa', 'With Britain agreeing to send troops to Mali in a non-combat role, there is growing alarm in London that the country is being dragged into another battleground against terrorism just as it tries to extract its military forces from Afghanistan. Henry Ridgwell reports for VOA on whether North Africa represents a new front for Europe and the West.', 'http://www.youtube.com/watch?v=id1BrSuLM9I&list=PL75F0119287231905', '', '', 2, 1, 0, '2013-02-11 23:26:02'),
(159, 2, 0, 'Microsoft Surface Pro Commercial', 'The new commercial for Surface Pro titled "The Vibe", Directed by Jon Chu.', 'http://www.youtube.com/watch?v=l2KPQNP1Z1s', '', '', 2, 1, 0, '2013-02-12 00:21:51'),
(160, 2, 0, 'The Rise of Benedict XVI; The Inside Story of How the Pope was Elected and Where He Will Take the Catholic Church', '“Commendable and balanced . . . With crisp writing and an amazing attention to detail, Allen brings readers inside the papal jockeying, covering the days of mourning and the conclave.” —The Los Angeles Times “A welcome contribution to understanding the new pontificate . . . The Rise of Benedict XVI is a useful chronicle that packs a lot into relatively few pages.” —Richard John Neuhaus, First Things “For a current look at the new papacy, Allen is the person to read. He is fair, free from the oracular pomposity of some American commentators, and, as always, highly readable.” —Commonweal “The Rise of Benedict XVI . . . covers the subject thoroughly and thoughtfully. In smooth, readable prose devoid of polemics, he outlines competing expectations and explains the strengths and weaknesses of each.” —San Antonio Express-News  “A worthwhile contribution to understanding why Rome has its first German pope in 800 years.” —The Washington PostOn April 18, 2005, the College of Cardinals of the Roman Catholic Church gathered to elect a successor to Pope John Paul II. Faced with several potential candidates, the cardinals made a bold choice, entrusting the Keys of the Kingdom to 78-year-old Cardinal Joseph Ratzinger of Germany, a man whose views on the challenges facing the Church and the broader culture could not be more unambiguous, or controversial. Questions arose as the world watched while Ratzinger was installed as Pope Benedict XVI. No one can tell the story of exactly what took place during the closed doors meeting, known as the conclave, when Cardinals from around the world cast their votes for the next pope, better than John L. Allen, Jr. As a correspondent for National Catholic Reporter and a Vatican analyst for CNN and National Public Radio, Allen has spent years covering Vatican politics and personalities, and his unique access to Roman halls of power has enabled him to write the ultimate behind-the-scenes account of the election of Pope Benedict XVI. ', 'http://www.scribd.com/doc/88649314/The-Rise-of-Benedict-XVI-The-Inside-Story-of-How-the-Pope-was-Elected-and-Where-He-Will-Take-the-Catholic-Church', '', '', 4, 1, 0, '2013-02-12 09:57:12'),
(161, 2, 0, 'https://soundcloud.com/iikmusikcom/rere-reina-ririungan-music-composer-by-arief-iskandar', '', 'https://soundcloud.com/iikmusikcom/rere-reina-ririungan-music-composer-by-arief-iskandar', '', '', 6, 2, 0, '2013-02-12 10:12:23'),
(162, 2, 0, 'Rere Reina & Moel KDI - Sapu Nyere Pegat Simpai', 'Ririungan urang karumpul\nMeungpeung deukeut hayu urang sosonoan\nMacangkrama bari ngawadul\nUrang silih tempas silih aledan\n\nMoal lila jeung babaturan\nHiji wanci anu geus ditangtukeun\nBakal pisah bakal pajauh\nBakal mopohokeun katineung urang\n\nSapu nyere pegat simpai, bakal kasorang\nTakdir ti gusti hyang widi, pasti kalakon\nUrang rek papisah, urang rek pajauh\nMeungpeung deukut, hayu urang sosonoan', 'https://soundcloud.com/iikmusikcom/rere-reina-ririungan-music-composer-by-arief-iskandar', '', '', 6, 1, 0, '2013-02-12 10:13:19'),
(163, 2, 0, 'Rahasia Hidup - Ust. Yusuf Mansur', 'Rahasia Hidup - Ust. Yusuf Mansur', 'https://soundcloud.com/yarjohan/rahasia-hidup', '', '', 6, 1, 0, '2013-02-12 10:15:26'),
(164, 2, 0, 'Kun Fayakun - Ust Yusuf Mansur', 'Kun Fayakun - Ust Yusuf Mansur', 'https://soundcloud.com/hridebelphi/ustad-yusuf-mansur-kun-fayakun', '', '', 6, 1, 0, '2013-02-12 10:16:25'),
(165, 2, 0, 'Kekuatan Sedekah - Ust Yusuf Mansur', 'Kekuatan Sedekah - Ust Yusuf Mansur', 'https://soundcloud.com/andi-joe/ust-yusuf-mansur-kekuatan', '', '', 6, 1, 0, '2013-02-12 10:17:02'),
(166, 2, 0, 'Manfaat Sodaqoh - Ust Yusuf Mansur', 'Manfaat Sodaqoh - Ust Yusuf Mansur', 'https://soundcloud.com/emodboyderock/ustadz-yusuf-mansur-manfaat', '', '', 6, 1, 0, '2013-02-12 10:17:36'),
(167, 2, 0, 'The Power Of Giving - Ust Yusuf Mansur', 'The Power Of Giving - Ust Yusuf Mansur', 'https://soundcloud.com/tonny-santoso/ustadz-yusuf-mansur-the-power', '', '', 6, 1, 0, '2013-02-12 10:18:24'),
(168, 2, 0, 'Wasiat Terakhir Rasulullah SAW - Ust Yusuf Mansur', 'Wasiat Terakhir Rasulullah SAW - Ust Yusuf Mansur', 'https://soundcloud.com/hridebelphi/wasiat-terakhir-rasullulah-saw', '', '', 6, 1, 0, '2013-02-12 10:18:58'),
(169, 2, 0, 'Zina Bikin Seret Rezeki - Ust Yusuf Mansur', 'Zina Bikin Seret Rezeki - Ust Yusuf Mansur', 'https://soundcloud.com/flippermagz/yusuf-mansur-zina-bikin-seret', '', '', 6, 1, 0, '2013-02-12 10:19:28'),
(170, 2, 0, 'Durhaka Kepada Orang Tua - Ust Yusuf Mansur', 'Durhaka Kepada Orang Tua - Ust Yusuf Mansur', 'https://soundcloud.com/repa_net/repanet-of-yusuf-mansur', '', '', 6, 1, 0, '2013-02-12 10:20:07'),
(171, 2, 0, 'Berkah, Ridho, dan Doa Orang Tua - Ust Yusuf Mansur', 'Berkah, Ridho, dan Doa Orang Tua - Ust Yusuf Mansur', 'https://soundcloud.com/renokurniawan/yusuf-mansur-berkah-ridho-dan', '', '', 6, 1, 0, '2013-02-12 10:20:48'),
(172, 2, 0, 'Yakinlah Allah Akan Menolong Kita - Ust Yusuf Mansur', 'Yakinlah Allah Akan Menolong Kita - Ust Yusuf Mansur', 'https://soundcloud.com/hridebelphi/ustad-yusuf-mansur-yakinlah', '', '', 6, 1, 0, '2013-02-12 10:21:25'),
(173, 2, 0, 'Mansur -Harta Haram - 10 dosa dosa besar - Ust Yusuf Mansur', 'Mansur -Harta Haram - 10 dosa dosa besar - Ust Yusuf Mansur', 'https://soundcloud.com/hridebelphi/ustad-yusuf-mansur-harta-haram', '', '', 6, 1, 0, '2013-02-12 10:21:57'),
(174, 2, 0, '5 Ways to Create a Brand People Give a Sh*t About', 'http://www.risingabovethenoise.com Brand identity specialist and Fast Company blogger David Brier has compiled 5 successful ideas for branding in today''s economy, making it possible to succeed with social media and other channels. David''s "What''s Killing Your Brand ( and how to kill it before it kills you) is rapidly approaching 100,000 views. \n\nBranding is the art of differentiation and this little checklist provides some of the secret ammo that helps make David the Branding GPS many look to for direction for their brand. ', 'http://www.slideshare.net/brierman/5-ways-to-create-a-brand-people-give-a-sht-about-rb', '', '', 5, 1, 0, '2013-02-12 12:56:09'),
(175, 2, 0, 'Corporate VC Innovation: Strategies That Don''t Suck', 'slides from my presentation at IBF Corporate Venturing & Innovation conf (Newport Beach, Feb 2013)', 'http://www.slideshare.net/dmc500hats/corporate-vc-innovation-strategies-that-dont-suck', '', '', 5, 1, 0, '2013-02-12 12:56:47'),
(176, 2, 0, 'Apple Story (from 1976 to nowadays)', 'Apple story, from the garage to the iPod nano. Small presentation to introduce the different milestones in Apple history', 'http://www.slideshare.net/thomas.ezan/apple-story-from-1976-to-nowadays', '', '', 5, 1, 0, '2013-02-12 12:58:29'),
(177, 2, 0, 'Apple Study: 8 easy steps to beat Microsoft (and Google)', 'a comprehensive study on Apple considering strengths and weaknesses against other major contenders in the industry space', 'http://www.slideshare.net/misteroo/apple-study-8-easy-steps-to-beat-microsoft-and-google', '', '', 5, 1, 0, '2013-02-12 12:59:38'),
(178, 2, 0, 'Topic 1 - What is Biology?', 'An introduction to the study of biology.', 'http://www.slideshare.net/melissamercer/topic-1-what-is-biology', '', '', 5, 1, 0, '2013-02-12 13:01:51'),
(179, 2, 0, 'Topic 2 - The Nature of Science', 'This topic reviews the nature of science including the six step scientific method, scientific theories and laws.', 'http://www.slideshare.net/melissamercer/topic-2-the-nature-of-science', '', '', 5, 1, 0, '2013-02-12 13:03:21'),
(180, 2, 0, 'Topic 3 - Microscopes', 'This topic reviews the development of the microscope, the compound microscope and other types of microscopes used in biology and science.', 'http://www.slideshare.net/melissamercer/topic-3-microscopes', '', '', 5, 1, 0, '2013-02-12 13:04:58'),
(181, 2, 0, 'Cara Benar Menggunakan Komputer', 'Animasi Cara Menggunakan Komputer Yang Benar', '', '', '', 0, 2, 0, '2013-02-13 01:12:50'),
(182, 2, 0, 'Cara Benar Menggunakan Komputer', 'Animasi Cara Menggunakan Komputer Yang Benar', '', '', '', 0, 2, 0, '2013-02-13 01:13:08'),
(183, 2, 0, 'Cara Menggunakan Komputer Yang Benar', 'Cara Menggunakan Komputer Yang Benar', '', '', '', 0, 2, 0, '2013-02-13 01:35:44'),
(184, 2, 184, 'Cara Menggunakan Komputer', 'Cara Menggunakan Komputer', '184.mp4', '10249.02', '.mp4', 0, 1, 0, '2013-02-13 02:03:54'),
(185, 2, 0, 'MIT OpenCourseWare 1800 Event Video', 'Here is the official video for the MIT OpenCourseWare 1800 event: Unlocking Knowledge, Empowering Minds: A Milestone Celebration. The event celebrates the publishing of the 1800th course on MIT OpenCourseWare. ', 'http://www.youtube.com/watch?v=tbQ-FeoEvTI', '', '', 2, 1, 0, '2013-02-13 03:37:19'),
(186, 2, 0, 'Swedish House Mafia''s Don''t You Worry Child ', 'Cover of Swedish House Mafia''s Don''t You Worry Child :)\n\nadd me on facebook: http://www.facebook.com/nicolecrossmusic\nyoutube: http://www.youtube.com/crossnicole\n\nspecial thanks to Jan Wagner on the violin!\n\n\nlove,\nNicole Cross', 'https://www.youtube.com/watch?feature=player_embedded&v=1DP63WEUaAI', '', '', 2, 1, 0, '2013-02-13 08:01:44'),
(187, 2, 187, 'Panduan Hibah Elearning - Universitas Gajah Mada', 'Panduan Hibah Elearning - Universitas Gajah Mada', '187.pdf', '164.18', '.pdf', 1, 1, 0, '2013-02-14 03:05:23'),
(188, 2, 188, 'Contoh RPKPS', 'Contoh RPKPS', '188.pdf', '99.06', '.pdf', 1, 1, 0, '2013-02-14 03:07:10'),
(189, 2, 189, 'Rancangan Multimedia UGM', 'Rancangan Multimedia', '189.pdf', '129.87', '.pdf', 1, 1, 0, '2013-02-14 03:07:58'),
(190, 2, 0, 'Pemasaran Agribisnis ', 'Pemasaran Agribisnis ', 'http://www.youtube.com/watch?v=DNkyWVPt_OI', '', '', 2, 1, 0, '2013-02-14 06:55:36'),
(191, 2, 0, 'Fase Perjalanan Obat dalam Tubuh', 'Fase Perjalanan Obat dalam Tubuh', 'http://www.youtube.com/watch?v=VacK6FrtTn8', '', '', 2, 1, 0, '2013-02-14 06:56:33'),
(192, 2, 0, 'Senam Ibu Hamil', 'Senam Ibu Hamil', 'http://www.youtube.com/watch?v=Yb0xUTHyz-Q', '', '', 2, 1, 0, '2013-02-14 06:57:10'),
(193, 2, 0, 'Classical Conditioning', 'Classical Conditioning', 'http://www.youtube.com/watch?v=eAY81p-CboU', '', '', 2, 1, 0, '2013-02-14 06:57:34'),
(194, 2, 0, '9 Gelar Capaian Kinerja dengan Surat HAKI', '9 Gelar Capaian Kinerja dengan Surat HAKI', 'http://www.youtube.com/watch?v=8rnw3zO7XcA', '', '', 2, 1, 0, '2013-02-14 06:57:55'),
(195, 2, 0, 'Pengenalan Neuroanatomy - Otak', 'Pengenalan Neuroanatomy - Otak', 'http://www.youtube.com/watch?v=fvUSeK1a3So', '', '', 2, 1, 0, '2013-02-14 06:58:16'),
(196, 2, 0, 'Microbiology for the Health Sciences and Diseases', 'Microbiology for the Health Sciences and Diseases', 'http://www.youtube.com/watch?v=j6boXuQm0vo', '', '', 2, 1, 0, '2013-02-14 06:58:40'),
(197, 2, 0, 'Sistem Agribisnis', 'Sistem Agribisnis', 'http://www.youtube.com/watch?v=waiXkRvSJrM', '', '', 2, 1, 0, '2013-02-14 06:59:15'),
(198, 2, 0, 'Pendahuluan Penelitian Operasional', 'Pendahuluan Penelitian Operasional', 'http://www.youtube.com/watch?v=p3W7uDbdYJ4', '', '', 2, 1, 0, '2013-02-14 06:59:35'),
(199, 2, 0, 'Lembar Latihan Kawat 1', 'Lembar Latihan Kawat 1', 'http://www.youtube.com/watch?v=m-KjO3E9UZQ', '', '', 2, 1, 0, '2013-02-14 06:59:54'),
(200, 2, 0, 'Erosi', 'Erosi', 'http://www.youtube.com/watch?v=o5hQlv0Npvg', '', '', 2, 1, 0, '2013-02-14 07:00:18'),
(201, 2, 0, 'Manajemen Operasi : Pendahuluan', 'Manajemen Operasi : Pendahuluan', 'http://www.youtube.com/watch?v=mtdnyIiqCFE', '', '', 2, 1, 0, '2013-02-14 07:00:29'),
(202, 2, 0, 'Pengantar Sistem Informasi Geografis', 'Pengantar Sistem Informasi Geografis', 'http://www.youtube.com/watch?v=j1Rsa1d4k7c', '', '', 2, 1, 0, '2013-02-14 07:00:45'),
(203, 5, 203, 'Hilo JavaScript', 'How to use HTML, CSS, JavaScript, and the Windows Runtime to create a world-ready app for the global market. The Hilo source code includes support for three languages.\nHow to implement tiles, pages, controls, touch, navigation, file system queries, suspend/resume.\nHow to implement the Model-View-Presenter and query builder patterns.\nHow to test your app and tune its performance.', '203.pdf', '2181.08', '.pdf', 1, 1, 0, '2013-02-14 07:00:58'),
(204, 2, 0, 'Interviewing : Principles and Practices', 'Interviewing : Principles and Practices', 'http://www.youtube.com/watch?v=Z6gy-wg_ytI', '', '', 2, 1, 0, '2013-02-14 07:01:02'),
(205, 2, 0, 'Etika Bisnis', 'Etika Bisnis', 'http://www.youtube.com/watch?v=KUkLVvdufB8', '', '', 2, 1, 0, '2013-02-14 07:01:24'),
(206, 2, 0, 'Komunikasi Massa', 'Komunikasi Massa', 'http://www.youtube.com/watch?v=rPfxcaxnyV0', '', '', 2, 1, 0, '2013-02-14 07:02:22'),
(207, 2, 0, 'Mikrobiologi Lingkungan Daur Biogeokimia', 'Mikrobiologi Lingkungan Daur Biogeokimia', 'http://www.youtube.com/watch?v=KSrp3W-HMXY', '', '', 2, 1, 0, '2013-02-14 07:02:39'),
(208, 2, 0, 'Langkah-langkah Analisa Hasil Kuesioner', 'Langkah-langkah Analisa Hasil Kuesioner', 'http://www.youtube.com/watch?v=I_qqdxtBShY', '', '', 2, 1, 0, '2013-02-14 07:03:02'),
(209, 2, 0, 'Konsep Bisnis dan Lingkungan Bisnis', 'Konsep Bisnis dan Lingkungan Bisnis', 'http://www.youtube.com/watch?v=fMSXfZgjnm4', '', '', 2, 1, 0, '2013-02-14 07:03:17'),
(210, 2, 0, 'Peradilan Pajak', 'Peradilan Pajak', 'http://www.youtube.com/watch?v=hKHvXk5M0HI', '', '', 2, 1, 0, '2013-02-14 07:03:32'),
(211, 2, 0, 'Soal Olimpiade Matematika SMA', 'Berisi kumpulam soal-soal olimpiade matematika SMA', '', '', '', 1, 2, 0, '2013-02-14 09:49:48'),
(212, 2, 212, 'Soal Olimpiade Matematika SMA', 'Berisi soal-soal olimpiade matematika untuk SMA', '212.pdf', '197.16', '.pdf', 1, 1, 0, '2013-02-14 10:28:53'),
(213, 2, 0, 'Soal OSN Matematika SMA', 'Berisi soal-soal olimpiade matematika untuk SMA', '', '', '', 1, 2, 0, '2013-02-14 10:30:06'),
(214, 2, 0, 'Video Launching Modul', 'Video Launching Modul', 'http://www.youtube.com/watch?v=HqW0Trp1cAs', '', '', 2, 1, 0, '2013-02-14 11:03:08'),
(215, 2, 0, 'tes', 'tetest', '', '', '', 0, 0, 0, '2013-02-21 09:07:55'),
(216, 2, 0, 'at', 'eateat', '', '', '', 0, 0, 0, '2013-02-21 09:08:12'),
(217, 2, 0, 'asdasd', 'erearr', '217.pdf', '72.47', '.pdf', 1, 0, 0, '2013-02-21 09:08:55'),
(218, 2, 0, 'test', 'test', '', '', '', 1, 0, 0, '2013-02-27 05:19:48'),
(219, 2, 0, 'test', 'test', '219.pdf', '72.47', '.pdf', 1, 0, 0, '2013-02-27 05:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `content_bookmark`
--

CREATE TABLE IF NOT EXISTS `content_bookmark` (
  `id_content_bookmark` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_content_bookmark`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `content_bookmark`
--

INSERT INTO `content_bookmark` (`id_content_bookmark`, `user_id`, `content_id`, `date`, `type`) VALUES
(10, 2, 62, '2013-01-18 03:18:20', 0),
(12, 2, 79, '2013-01-23 09:28:30', 2),
(13, 2, 82, '2013-01-23 11:48:41', 2),
(14, 2, 98, '2013-01-25 08:09:37', 2),
(15, 2, 105, '2013-01-29 19:44:33', 2),
(16, 2, 14, '2013-01-30 05:01:37', 2),
(17, 2, 133, '2013-01-30 09:29:58', 2),
(18, 2, 134, '2013-01-30 09:37:50', 2),
(19, 2, 96, '2013-01-30 13:53:18', 2),
(20, 2, 74, '2013-02-08 04:25:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `content_category`
--

CREATE TABLE IF NOT EXISTS `content_category` (
  `id_content_category` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `content_category`
--

INSERT INTO `content_category` (`id_content_category`, `content_id`, `category_id`) VALUES
(1, 13, 1),
(2, 13, 3),
(4, 0, 1),
(5, 14, 1),
(6, 37, 3),
(7, 19, 3),
(8, 38, 3),
(9, 38, 6),
(10, 38, 7),
(11, 36, 7),
(12, 39, 7),
(13, 41, 1),
(14, 56, 7),
(15, 42, 4),
(16, 42, 1),
(17, 19, 6),
(18, 104, 2),
(19, 120, 7),
(20, 121, 7),
(21, 122, 7),
(22, 123, 7),
(23, 126, 7),
(24, 127, 7),
(25, 125, 7),
(26, 132, 7),
(27, 0, 0),
(28, 147, 4),
(29, 152, 4),
(30, 158, 8),
(31, 157, 8),
(32, 156, 8),
(34, 159, 8),
(35, 159, 7),
(36, 143, 6);

-- --------------------------------------------------------

--
-- Table structure for table `content_course`
--

CREATE TABLE IF NOT EXISTS `content_course` (
  `id_content_course` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `content_course`
--

INSERT INTO `content_course` (`id_content_course`, `content_id`, `course_id`) VALUES
(1, 120, 1),
(2, 121, 1),
(3, 122, 1),
(4, 123, 1),
(5, 126, 1),
(6, 127, 1),
(7, 125, 1),
(8, 132, 1),
(9, 0, 0),
(10, 147, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_faculty`
--

CREATE TABLE IF NOT EXISTS `content_faculty` (
  `id_content_faculty` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content_faculty`
--

INSERT INTO `content_faculty` (`id_content_faculty`, `content_id`, `faculty_id`) VALUES
(1, 13, 9),
(2, 14, 8),
(3, 0, 0),
(4, 147, 16),
(5, 152, 16);

-- --------------------------------------------------------

--
-- Table structure for table `content_log`
--

CREATE TABLE IF NOT EXISTS `content_log` (
  `id_content_log` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_content_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=820 ;

--
-- Dumping data for table `content_log`
--

INSERT INTO `content_log` (`id_content_log`, `content_id`, `user_id`, `date`, `type`, `status`) VALUES
(1, 66, 2, '2013-01-20 00:01:49', 0, 0),
(2, 66, 2, '2013-01-20 00:02:04', 0, 1),
(3, 66, 2, '2013-01-20 00:02:04', 0, 1),
(4, 66, 2, '2013-01-20 00:02:04', 0, 1),
(5, 66, 2, '2013-01-20 00:02:05', 0, 1),
(6, 66, 2, '2013-01-20 00:02:05', 0, 1),
(7, 66, 2, '2013-01-20 00:02:07', 0, 1),
(8, 66, 2, '2013-01-20 00:02:08', 0, 1),
(9, 66, 2, '2013-01-20 00:02:08', 0, 1),
(10, 66, 2, '2013-01-20 00:02:09', 0, 1),
(11, 66, 2, '2013-01-20 00:02:09', 0, 1),
(12, 60, 2, '2013-01-20 00:28:41', 0, 0),
(13, 69, 2, '2013-01-20 02:16:14', 2, 0),
(14, 69, 2, '2013-01-20 02:16:29', 2, 0),
(15, 69, 2, '2013-01-20 02:16:31', 2, 0),
(16, 69, 2, '2013-01-20 02:18:07', 2, 0),
(17, 19, 2, '2013-01-20 02:43:38', 0, 0),
(18, 19, 2, '2013-01-20 02:43:50', 0, 1),
(19, 19, 2, '2013-01-20 02:43:54', 0, 1),
(20, 19, 2, '2013-01-20 02:43:59', 0, 1),
(21, 19, 2, '2013-01-20 02:44:02', 0, 1),
(22, 19, 2, '2013-01-20 02:44:05', 0, 1),
(23, 19, 2, '2013-01-20 02:44:08', 0, 1),
(24, 19, 2, '2013-01-20 02:44:08', 0, 1),
(25, 19, 2, '2013-01-20 02:44:11', 0, 1),
(26, 19, 2, '2013-01-20 02:44:11', 0, 1),
(27, 19, 2, '2013-01-20 02:44:34', 0, 1),
(28, 19, 2, '2013-01-20 02:44:35', 0, 1),
(29, 19, 2, '2013-01-20 02:44:36', 0, 1),
(30, 19, 2, '2013-01-20 02:44:36', 0, 1),
(31, 19, 2, '2013-01-20 02:44:37', 0, 1),
(32, 19, 2, '2013-01-20 02:44:39', 0, 1),
(33, 19, 2, '2013-01-20 02:44:39', 0, 1),
(34, 19, 2, '2013-01-20 02:44:39', 0, 1),
(35, 19, 2, '2013-01-20 02:44:39', 0, 1),
(36, 19, 2, '2013-01-20 02:44:41', 0, 1),
(37, 37, 2, '2013-01-20 02:48:32', 0, 0),
(38, 68, 0, '2013-01-20 03:48:25', 0, 0),
(39, 68, 0, '2013-01-20 03:49:07', 0, 0),
(40, 44, 0, '2013-01-20 03:53:33', 0, 0),
(41, 30, 0, '2013-01-20 04:15:19', 0, 0),
(42, 36, 0, '2013-01-20 04:35:14', 0, 0),
(43, 54, 0, '2013-01-20 04:47:07', 0, 0),
(44, 60, 0, '2013-01-20 05:04:57', 0, 0),
(45, 13, 0, '2013-01-20 05:22:57', 0, 0),
(46, 68, 0, '2013-01-20 05:34:55', 0, 0),
(47, 43, 0, '2013-01-20 06:03:52', 0, 0),
(48, 65, 0, '2013-01-20 06:19:22', 0, 0),
(49, 47, 0, '2013-01-20 06:42:25', 0, 0),
(50, 37, 0, '2013-01-20 06:53:41', 0, 0),
(51, 37, 0, '2013-01-20 07:34:15', 0, 0),
(52, 61, 0, '2013-01-20 07:37:38', 0, 0),
(53, 64, 0, '2013-01-20 07:49:12', 0, 0),
(54, 42, 0, '2013-01-20 08:13:44', 0, 0),
(55, 19, 0, '2013-01-20 08:26:27', 0, 0),
(56, 41, 0, '2013-01-20 08:40:19', 0, 0),
(57, 14, 0, '2013-01-20 08:59:51', 0, 0),
(58, 67, 0, '2013-01-20 09:21:27', 0, 0),
(59, 38, 0, '2013-01-20 09:43:44', 0, 0),
(60, 59, 0, '2013-01-20 11:37:02', 0, 0),
(61, 69, 0, '2013-01-20 11:38:27', 2, 0),
(62, 68, 0, '2013-01-20 11:40:04', 0, 0),
(63, 68, 0, '2013-01-20 11:41:10', 0, 0),
(64, 40, 0, '2013-01-20 11:56:10', 0, 0),
(65, 25, 0, '2013-01-20 12:28:17', 0, 0),
(66, 55, 0, '2013-01-20 12:37:49', 0, 0),
(67, 16, 0, '2013-01-20 12:57:47', 0, 0),
(68, 56, 0, '2013-01-20 13:06:36', 0, 0),
(69, 62, 0, '2013-01-20 13:27:53', 0, 0),
(70, 57, 0, '2013-01-20 13:46:31', 0, 0),
(71, 57, 0, '2013-01-20 13:56:54', 2, 0),
(72, 43, 0, '2013-01-20 14:15:40', 2, 0),
(73, 65, 0, '2013-01-20 14:35:47', 2, 0),
(74, 40, 0, '2013-01-20 14:56:03', 2, 0),
(75, 67, 0, '2013-01-20 15:10:01', 2, 0),
(76, 41, 0, '2013-01-20 15:27:18', 2, 0),
(77, 56, 0, '2013-01-20 15:52:33', 2, 0),
(78, 64, 0, '2013-01-20 16:06:24', 2, 0),
(79, 59, 0, '2013-01-20 16:29:45', 2, 0),
(80, 55, 0, '2013-01-20 16:55:31', 2, 0),
(81, 67, 0, '2013-01-22 07:37:54', 2, 0),
(82, 57, 0, '2013-01-22 07:38:56', 0, 0),
(83, 57, 0, '2013-01-22 07:38:58', 2, 0),
(84, 69, 0, '2013-01-22 15:25:03', 2, 0),
(85, 68, 0, '2013-01-22 15:27:51', 0, 0),
(86, 67, 0, '2013-01-22 15:27:52', 2, 0),
(87, 67, 0, '2013-01-22 15:28:34', 0, 0),
(88, 52, 0, '2013-01-22 15:28:39', 0, 0),
(89, 20, 0, '2013-01-22 15:28:42', 0, 0),
(90, 55, 0, '2013-01-22 15:28:46', 0, 0),
(91, 55, 0, '2013-01-22 15:28:51', 2, 0),
(92, 14, 0, '2013-01-22 15:29:09', 0, 0),
(93, 14, 0, '2013-01-22 15:35:31', 0, 0),
(94, 69, 2, '2013-01-23 03:19:40', 2, 0),
(95, 14, 2, '2013-01-23 03:34:21', 0, 0),
(96, 68, 2, '2013-01-23 06:45:08', 0, 0),
(97, 19, 2, '2013-01-23 06:48:46', 0, 0),
(98, 19, 2, '2013-01-23 06:48:56', 0, 0),
(99, 19, 2, '2013-01-23 06:49:11', 0, 0),
(100, 16, 0, '2013-01-23 07:27:55', 0, 0),
(101, 16, 0, '2013-01-23 07:28:25', 0, 0),
(102, 13, 0, '2013-01-23 07:33:06', 0, 0),
(103, 16, 0, '2013-01-23 07:33:13', 0, 0),
(104, 16, 0, '2013-01-23 07:45:34', 0, 0),
(105, 16, 0, '2013-01-23 07:45:46', 0, 0),
(106, 19, 0, '2013-01-23 07:46:13', 0, 0),
(107, 47, 0, '2013-01-23 07:46:18', 0, 0),
(108, 67, 0, '2013-01-23 07:51:01', 2, 0),
(109, 63, 0, '2013-01-23 07:58:50', 2, 0),
(110, 79, 2, '2013-01-23 09:27:37', 0, 0),
(111, 79, 2, '2013-01-23 09:28:28', 0, 1),
(112, 79, 2, '2013-01-23 09:28:28', 0, 1),
(113, 79, 2, '2013-01-23 09:28:29', 0, 1),
(114, 79, 2, '2013-01-23 09:28:30', 0, 1),
(115, 79, 2, '2013-01-23 09:28:43', 0, 1),
(116, 79, 2, '2013-01-23 09:28:44', 0, 1),
(117, 79, 2, '2013-01-23 09:28:44', 0, 1),
(118, 79, 2, '2013-01-23 09:28:46', 0, 1),
(119, 79, 2, '2013-01-23 09:28:47', 0, 1),
(120, 82, 2, '2013-01-23 11:47:10', 0, 0),
(121, 79, 2, '2013-01-23 14:05:06', 0, 0),
(122, 80, 0, '2013-01-24 08:14:05', 0, 0),
(123, 80, 0, '2013-01-24 08:15:27', 0, 0),
(124, 80, 0, '2013-01-24 08:19:34', 0, 0),
(125, 13, 0, '2013-01-24 08:21:56', 0, 0),
(126, 44, 0, '2013-01-24 08:25:19', 0, 0),
(127, 73, 2, '2013-01-24 08:34:49', 0, 0),
(128, 59, 2, '2013-01-25 04:46:20', 2, 0),
(129, 90, 0, '2013-01-25 07:50:20', 0, 0),
(130, 67, 0, '2013-01-25 07:50:55', 2, 0),
(131, 96, 2, '2013-01-25 07:55:42', 0, 0),
(132, 93, 2, '2013-01-25 08:05:09', 0, 0),
(133, 98, 2, '2013-01-25 08:09:14', 2, 0),
(134, 15, 2, '2013-01-25 08:12:32', 0, 0),
(135, 19, 2, '2013-01-25 08:12:51', 0, 0),
(136, 99, 2, '2013-01-25 10:18:07', 0, 0),
(137, 97, 0, '2013-01-25 13:46:27', 0, 0),
(138, 97, 0, '2013-01-25 13:46:58', 0, 0),
(139, 56, 0, '2013-01-25 13:47:04', 2, 0),
(140, 37, 0, '2013-01-25 13:47:10', 0, 0),
(141, 41, 2, '2013-01-25 23:41:04', 2, 0),
(142, 19, 2, '2013-01-25 23:45:34', 0, 0),
(143, 19, 2, '2013-01-25 23:45:42', 0, 0),
(144, 38, 2, '2013-01-25 23:46:13', 0, 0),
(145, 38, 2, '2013-01-25 23:46:22', 0, 0),
(146, 16, 0, '2013-01-26 11:48:03', 0, 0),
(147, 9, 0, '2013-01-26 19:20:03', 0, 0),
(148, 13, 0, '2013-01-26 20:20:33', 0, 0),
(149, 14, 0, '2013-01-26 20:26:47', 0, 0),
(150, 10, 0, '2013-01-27 06:12:15', 0, 0),
(151, 79, 0, '2013-01-28 01:43:13', 0, 0),
(152, 42, 0, '2013-01-28 01:43:37', 0, 0),
(153, 71, 0, '2013-01-28 01:46:42', 0, 0),
(154, 74, 0, '2013-01-28 01:49:39', 0, 0),
(155, 92, 0, '2013-01-28 01:54:45', 0, 0),
(156, 80, 0, '2013-01-28 01:58:53', 0, 0),
(157, 95, 0, '2013-01-28 02:00:35', 0, 0),
(158, 90, 0, '2013-01-28 02:07:42', 0, 0),
(159, 97, 0, '2013-01-28 02:08:32', 0, 0),
(160, 44, 0, '2013-01-28 02:13:40', 0, 0),
(161, 78, 0, '2013-01-28 02:19:17', 0, 0),
(162, 85, 0, '2013-01-28 02:19:18', 0, 0),
(163, 86, 0, '2013-01-28 02:31:45', 0, 0),
(164, 82, 0, '2013-01-28 02:34:45', 0, 0),
(165, 54, 0, '2013-01-28 02:37:45', 0, 0),
(166, 93, 0, '2013-01-28 02:38:03', 0, 0),
(167, 88, 0, '2013-01-28 02:43:21', 0, 0),
(168, 87, 0, '2013-01-28 02:46:21', 0, 0),
(169, 60, 0, '2013-01-28 02:52:03', 0, 0),
(170, 68, 0, '2013-01-28 02:56:40', 0, 0),
(171, 47, 0, '2013-01-28 02:59:28', 0, 0),
(172, 76, 0, '2013-01-28 03:04:21', 0, 0),
(173, 61, 0, '2013-01-28 03:08:16', 0, 0),
(174, 91, 0, '2013-01-28 03:10:51', 0, 0),
(175, 72, 0, '2013-01-28 03:13:18', 0, 0),
(176, 99, 0, '2013-01-28 03:20:04', 0, 0),
(177, 15, 0, '2013-01-28 03:22:46', 0, 0),
(178, 62, 0, '2013-01-28 03:25:19', 0, 0),
(179, 73, 0, '2013-01-28 03:28:01', 0, 0),
(180, 89, 0, '2013-01-28 03:33:37', 0, 0),
(181, 77, 0, '2013-01-28 03:37:04', 0, 0),
(182, 100, 0, '2013-01-28 03:40:56', 0, 0),
(183, 103, 0, '2013-01-28 03:47:43', 0, 0),
(184, 102, 0, '2013-01-28 03:50:20', 0, 0),
(185, 57, 0, '2013-01-28 03:52:44', 2, 0),
(186, 98, 0, '2013-01-28 03:55:08', 2, 0),
(187, 43, 0, '2013-01-28 04:02:03', 2, 0),
(188, 65, 0, '2013-01-28 04:03:32', 2, 0),
(189, 40, 0, '2013-01-28 04:05:17', 2, 0),
(190, 67, 0, '2013-01-28 04:08:30', 2, 0),
(191, 41, 0, '2013-01-28 04:10:02', 2, 0),
(192, 56, 0, '2013-01-28 04:11:54', 2, 0),
(193, 64, 0, '2013-01-28 04:17:41', 2, 0),
(194, 59, 0, '2013-01-28 04:19:30', 2, 0),
(195, 55, 0, '2013-01-28 04:23:01', 2, 0),
(196, 69, 0, '2013-01-28 04:25:52', 2, 0),
(197, 104, 0, '2013-01-28 04:28:52', 2, 0),
(198, 105, 0, '2013-01-28 04:29:49', 2, 0),
(199, 41, 0, '2013-01-28 04:29:50', 0, 0),
(200, 64, 0, '2013-01-28 04:35:01', 0, 0),
(201, 59, 0, '2013-01-28 04:40:15', 0, 0),
(202, 40, 0, '2013-01-28 04:42:17', 0, 0),
(203, 55, 0, '2013-01-28 04:49:07', 0, 0),
(204, 43, 0, '2013-01-28 04:52:22', 0, 0),
(205, 65, 0, '2013-01-28 04:55:48', 0, 0),
(206, 67, 0, '2013-01-28 04:59:48', 0, 0),
(207, 69, 0, '2013-01-28 05:02:08', 0, 0),
(208, 56, 0, '2013-01-28 05:04:06', 0, 0),
(209, 98, 0, '2013-01-28 05:05:38', 0, 0),
(210, 57, 0, '2013-01-28 05:08:29', 0, 0),
(211, 104, 0, '2013-01-28 05:11:41', 0, 0),
(212, 105, 0, '2013-01-28 05:15:23', 0, 0),
(213, 47, 2, '2013-01-28 05:44:22', 0, 0),
(214, 47, 0, '2013-01-28 05:44:53', 0, 0),
(218, 122, 2, '2013-01-28 11:03:26', 0, 0),
(219, 122, 2, '2013-01-28 11:03:31', 0, 0),
(220, 120, 0, '2013-01-28 12:58:56', 2, 0),
(221, 127, 2, '2013-01-28 23:29:21', 0, 0),
(222, 127, 2, '2013-01-29 03:58:03', 0, 0),
(224, 111, 2, '2013-01-29 04:06:13', 0, 0),
(225, 103, 2, '2013-01-29 04:07:32', 0, 0),
(226, 13, 2, '2013-01-29 08:55:29', 0, 0),
(227, 127, 2, '2013-01-29 10:34:23', 0, 0),
(228, 105, 2, '2013-01-29 19:19:22', 2, 0),
(229, 105, 2, '2013-01-29 19:44:30', 2, 0),
(230, 96, 2, '2013-01-29 22:06:21', 0, 0),
(231, 96, 2, '2013-01-29 22:06:41', 0, 0),
(232, 96, 2, '2013-01-29 22:07:02', 0, 0),
(233, 38, 2, '2013-01-29 22:19:31', 0, 0),
(234, 71, 2, '2013-01-29 22:25:27', 0, 0),
(235, 71, 2, '2013-01-29 22:25:33', 0, 0),
(236, 39, 2, '2013-01-29 22:25:39', 2, 0),
(237, 104, 2, '2013-01-29 22:32:35', 2, 0),
(238, 19, 2, '2013-01-29 22:34:24', 0, 0),
(239, 19, 2, '2013-01-29 22:34:40', 0, 0),
(240, 38, 2, '2013-01-29 22:35:36', 0, 0),
(241, 19, 2, '2013-01-29 22:35:52', 0, 0),
(242, 132, 0, '2013-01-30 04:23:11', 0, 0),
(243, 56, 0, '2013-01-30 04:26:34', 2, 0),
(244, 67, 2, '2013-01-30 05:00:53', 2, 0),
(245, 67, 0, '2013-01-30 05:00:54', 2, 0),
(246, 14, 2, '2013-01-30 05:00:59', 0, 0),
(247, 14, 0, '2013-01-30 05:01:01', 0, 0),
(248, 14, 0, '2013-01-30 05:01:57', 0, 0),
(249, 132, 0, '2013-01-30 05:05:33', 0, 0),
(250, 105, 0, '2013-01-30 05:12:28', 2, 0),
(251, 105, 0, '2013-01-30 05:13:33', 2, 0),
(252, 14, 0, '2013-01-30 05:29:53', 0, 0),
(253, 14, 0, '2013-01-30 05:30:13', 0, 0),
(254, 14, 2, '2013-01-30 05:31:34', 0, 0),
(255, 14, 0, '2013-01-30 05:33:59', 0, 0),
(256, 67, 0, '2013-01-30 05:35:48', 2, 0),
(257, 14, 0, '2013-01-30 05:35:48', 0, 0),
(258, 67, 0, '2013-01-30 05:35:55', 2, 0),
(259, 14, 0, '2013-01-30 05:36:19', 0, 0),
(260, 14, 0, '2013-01-30 05:36:41', 0, 0),
(261, 67, 0, '2013-01-30 05:39:48', 2, 0),
(262, 67, 0, '2013-01-30 05:42:29', 2, 0),
(263, 14, 0, '2013-01-30 05:46:34', 0, 0),
(264, 67, 0, '2013-01-30 06:57:49', 2, 0),
(265, 14, 0, '2013-01-30 06:58:21', 0, 0),
(266, 14, 0, '2013-01-30 07:00:41', 0, 0),
(267, 67, 2, '2013-01-30 07:02:04', 2, 0),
(268, 14, 0, '2013-01-30 07:14:46', 0, 0),
(269, 14, 0, '2013-01-30 07:16:10', 0, 0),
(270, 120, 0, '2013-01-30 07:45:20', 2, 0),
(271, 133, 2, '2013-01-30 09:29:29', 3, 0),
(272, 133, 2, '2013-01-30 09:30:41', 3, 0),
(273, 134, 2, '2013-01-30 09:36:13', 3, 0),
(274, 134, 2, '2013-01-30 09:37:43', 3, 0),
(275, 134, 2, '2013-01-30 09:39:09', 3, 0),
(276, 134, 2, '2013-01-30 09:40:48', 3, 0),
(277, 133, 2, '2013-01-30 09:42:41', 3, 0),
(278, 133, 2, '2013-01-30 09:43:16', 3, 0),
(279, 133, 2, '2013-01-30 09:45:27', 3, 0),
(280, 133, 0, '2013-01-30 09:45:56', 3, 0),
(281, 134, 0, '2013-01-30 10:46:41', 3, 0),
(282, 134, 0, '2013-01-30 10:48:15', 3, 0),
(283, 134, 0, '2013-01-30 10:48:37', 3, 0),
(284, 133, 0, '2013-01-30 10:55:25', 3, 0),
(285, 120, 0, '2013-01-30 10:55:41', 2, 0),
(286, 132, 0, '2013-01-30 11:15:14', 0, 0),
(287, 127, 0, '2013-01-30 11:16:10', 0, 0),
(288, 96, 2, '2013-01-30 13:52:17', 0, 0),
(289, 96, 2, '2013-01-30 13:52:54', 0, 0),
(290, 96, 2, '2013-01-30 13:53:11', 0, 1),
(291, 96, 2, '2013-01-30 13:53:13', 0, 1),
(292, 96, 2, '2013-01-30 13:53:14', 0, 1),
(293, 127, 2, '2013-01-30 13:53:26', 0, 0),
(294, 132, 2, '2013-01-30 13:57:01', 0, 0),
(295, 132, 2, '2013-01-30 13:57:19', 0, 1),
(296, 37, 2, '2013-01-30 14:04:41', 0, 0),
(297, 13, 2, '2013-01-31 02:22:52', 0, 0),
(298, 36, 2, '2013-01-31 02:24:45', 0, 0),
(299, 120, 2, '2013-01-31 02:52:31', 2, 0),
(300, 122, 2, '2013-01-31 02:52:41', 0, 0),
(301, 120, 2, '2013-01-31 02:52:52', 2, 0),
(302, 41, 2, '2013-01-31 02:53:13', 2, 0),
(303, 41, 2, '2013-01-31 02:53:36', 2, 0),
(304, 132, 0, '2013-01-31 02:54:40', 0, 0),
(305, 19, 0, '2013-01-31 06:58:37', 0, 0),
(306, 132, 0, '2013-01-31 07:45:41', 0, 0),
(307, 132, 0, '2013-01-31 07:45:54', 0, 0),
(308, 0, 0, '2013-01-31 07:46:18', 0, 0),
(309, 67, 2, '2013-01-31 08:24:53', 2, 0),
(310, 67, 0, '2013-01-31 08:26:07', 2, 0),
(311, 67, 0, '2013-01-31 08:26:09', 2, 0),
(312, 67, 0, '2013-01-31 08:26:11', 2, 0),
(313, 120, 2, '2013-01-31 11:18:41', 2, 0),
(314, 37, 0, '2013-01-31 19:42:35', 0, 0),
(315, 25, 0, '2013-02-01 02:58:18', 0, 0),
(316, 30, 0, '2013-02-01 03:32:47', 0, 0),
(317, 137, 2, '2013-02-01 07:16:01', 0, 0),
(318, 114, 2, '2013-02-01 08:21:06', 0, 0),
(319, 95, 2, '2013-02-01 08:23:13', 0, 0),
(320, 122, 0, '2013-02-02 00:26:14', 0, 0),
(321, 38, 0, '2013-02-02 00:27:46', 0, 0),
(322, 117, 0, '2013-02-02 00:29:06', 0, 0),
(323, 121, 0, '2013-02-02 00:35:55', 0, 0),
(324, 88, 0, '2013-02-02 00:37:27', 0, 0),
(325, 88, 0, '2013-02-02 00:37:27', 0, 0),
(326, 88, 0, '2013-02-02 00:39:49', 0, 0),
(327, 109, 0, '2013-02-02 00:39:58', 0, 0),
(328, 111, 0, '2013-02-02 00:41:26', 0, 0),
(329, 38, 0, '2013-02-02 00:42:53', 0, 0),
(330, 19, 0, '2013-02-02 00:44:14', 0, 0),
(331, 117, 0, '2013-02-02 01:45:52', 0, 0),
(332, 137, 0, '2013-02-02 12:04:28', 0, 0),
(333, 38, 0, '2013-02-02 16:14:30', 0, 0),
(334, 138, 2, '2013-02-04 02:25:03', 0, 0),
(335, 139, 2, '2013-02-04 02:44:04', 0, 0),
(336, 132, 0, '2013-02-04 03:42:11', 0, 0),
(337, 78, 0, '2013-02-04 03:44:43', 0, 0),
(338, 139, 2, '2013-02-04 04:25:32', 0, 0),
(339, 140, 2, '2013-02-04 05:04:03', 0, 0),
(340, 137, 0, '2013-02-04 07:36:50', 0, 0),
(341, 143, 2, '2013-02-05 04:35:31', 2, 0),
(342, 71, 0, '2013-02-05 06:08:58', 0, 0),
(343, 74, 0, '2013-02-05 06:28:17', 0, 0),
(344, 92, 0, '2013-02-05 06:58:38', 0, 0),
(345, 80, 0, '2013-02-05 07:17:49', 0, 0),
(346, 79, 0, '2013-02-05 07:39:40', 0, 0),
(347, 95, 0, '2013-02-05 08:09:14', 0, 0),
(348, 97, 0, '2013-02-05 08:28:44', 0, 0),
(349, 90, 0, '2013-02-05 08:49:53', 0, 0),
(350, 78, 0, '2013-02-05 09:09:53', 0, 0),
(351, 85, 0, '2013-02-05 09:40:12', 0, 0),
(352, 86, 0, '2013-02-05 09:59:52', 0, 0),
(353, 60, 0, '2013-02-05 10:04:57', 0, 0),
(354, 60, 0, '2013-02-05 10:05:20', 0, 0),
(355, 38, 0, '2013-02-05 10:05:38', 0, 0),
(356, 82, 0, '2013-02-05 10:19:27', 0, 0),
(357, 93, 0, '2013-02-05 10:30:26', 0, 0),
(358, 88, 0, '2013-02-05 10:49:22', 0, 0),
(359, 87, 0, '2013-02-05 11:09:41', 0, 0),
(360, 76, 0, '2013-02-05 11:21:33', 0, 0),
(361, 91, 0, '2013-02-05 11:39:09', 0, 0),
(362, 72, 0, '2013-02-05 11:59:15', 0, 0),
(363, 99, 0, '2013-02-05 12:19:08', 0, 0),
(364, 96, 0, '2013-02-05 12:39:51', 0, 0),
(365, 73, 0, '2013-02-05 12:57:58', 0, 0),
(366, 89, 0, '2013-02-05 13:22:07', 0, 0),
(367, 77, 0, '2013-02-05 13:49:57', 0, 0),
(368, 116, 0, '2013-02-05 15:59:43', 0, 0),
(369, 135, 0, '2013-02-05 16:20:14', 0, 0),
(370, 137, 0, '2013-02-05 17:49:24', 0, 0),
(371, 119, 0, '2013-02-05 18:10:22', 0, 0),
(372, 117, 0, '2013-02-05 18:39:33', 0, 0),
(373, 133, 0, '2013-02-05 19:08:49', 3, 0),
(374, 127, 0, '2013-02-05 19:38:10', 0, 0),
(375, 109, 0, '2013-02-05 20:09:11', 0, 0),
(376, 100, 0, '2013-02-05 20:37:44', 0, 0),
(377, 114, 0, '2013-02-05 21:02:49', 0, 0),
(378, 108, 0, '2013-02-05 21:31:37', 0, 0),
(379, 110, 0, '2013-02-05 21:57:15', 0, 0),
(380, 138, 0, '2013-02-05 22:01:20', 0, 0),
(381, 103, 0, '2013-02-05 22:05:11', 0, 0),
(382, 106, 0, '2013-02-05 22:19:36', 0, 0),
(383, 136, 0, '2013-02-05 22:19:36', 0, 0),
(384, 139, 0, '2013-02-05 22:23:38', 0, 0),
(385, 126, 0, '2013-02-05 22:46:19', 0, 0),
(386, 118, 0, '2013-02-05 22:57:13', 0, 0),
(387, 111, 0, '2013-02-05 23:17:21', 0, 0),
(388, 134, 0, '2013-02-05 23:33:28', 3, 0),
(389, 107, 0, '2013-02-05 23:49:51', 0, 0),
(390, 125, 0, '2013-02-06 00:16:26', 0, 0),
(391, 102, 0, '2013-02-06 00:42:50', 0, 0),
(392, 140, 0, '2013-02-06 01:11:39', 0, 0),
(393, 113, 0, '2013-02-06 01:40:26', 0, 0),
(394, 112, 0, '2013-02-06 02:09:14', 0, 0),
(395, 121, 0, '2013-02-06 02:38:02', 0, 0),
(396, 132, 0, '2013-02-06 03:07:11', 0, 0),
(397, 123, 0, '2013-02-06 03:28:26', 0, 0),
(398, 122, 0, '2013-02-06 03:57:14', 0, 0),
(399, 25, 2, '2013-02-06 04:22:35', 0, 0),
(400, 98, 0, '2013-02-06 04:26:45', 2, 0),
(401, 69, 0, '2013-02-06 04:56:52', 2, 0),
(402, 104, 0, '2013-02-06 05:26:35', 2, 0),
(403, 105, 0, '2013-02-06 05:52:26', 2, 0),
(404, 120, 0, '2013-02-06 06:21:14', 2, 0),
(405, 122, 2, '2013-02-06 06:46:10', 0, 0),
(406, 138, 2, '2013-02-06 06:48:07', 0, 0),
(407, 138, 2, '2013-02-06 06:48:43', 0, 0),
(408, 69, 0, '2013-02-06 06:50:02', 0, 0),
(409, 139, 2, '2013-02-06 06:51:22', 0, 0),
(410, 42, 2, '2013-02-06 06:52:45', 0, 0),
(411, 147, 3, '2013-02-06 07:10:20', 2, 0),
(412, 98, 0, '2013-02-06 07:18:49', 0, 0),
(413, 147, 3, '2013-02-06 07:35:12', 2, 0),
(414, 104, 0, '2013-02-06 07:47:37', 0, 0),
(415, 134, 0, '2013-02-06 08:17:37', 0, 0),
(416, 120, 0, '2013-02-06 08:47:29', 0, 0),
(417, 133, 0, '2013-02-06 09:17:54', 0, 0),
(418, 105, 0, '2013-02-06 09:38:05', 0, 0),
(419, 109, 0, '2013-02-07 08:17:25', 0, 0),
(420, 122, 0, '2013-02-07 08:17:45', 0, 0),
(421, 138, 0, '2013-02-07 08:39:26', 0, 0),
(422, 152, 2, '2013-02-07 08:51:36', 2, 0),
(423, 122, 0, '2013-02-07 15:04:51', 0, 0),
(424, 152, 2, '2013-02-08 02:44:27', 2, 0),
(425, 125, 0, '2013-02-08 03:04:46', 0, 0),
(426, 36, 0, '2013-02-08 03:05:06', 0, 0),
(427, 138, 0, '2013-02-08 03:05:12', 0, 0),
(428, 125, 0, '2013-02-08 03:05:15', 0, 0),
(429, 72, 0, '2013-02-08 03:05:54', 0, 0),
(430, 111, 0, '2013-02-08 03:06:06', 0, 0),
(431, 88, 0, '2013-02-08 04:12:38', 0, 0),
(432, 121, 0, '2013-02-08 04:14:08', 0, 0),
(433, 123, 0, '2013-02-08 04:17:40', 0, 0),
(434, 132, 0, '2013-02-08 04:19:44', 0, 0),
(435, 132, 0, '2013-02-08 04:19:58', 0, 0),
(436, 132, 0, '2013-02-08 04:23:08', 0, 0),
(437, 74, 2, '2013-02-08 04:25:49', 0, 0),
(438, 121, 0, '2013-02-08 04:28:28', 0, 0),
(439, 134, 2, '2013-02-08 08:04:02', 3, 0),
(440, 134, 2, '2013-02-08 08:04:24', 3, 0),
(441, 139, 2, '2013-02-08 11:54:08', 0, 0),
(442, 138, 2, '2013-02-08 11:54:41', 0, 0),
(443, 138, 2, '2013-02-08 11:54:43', 0, 1),
(444, 136, 0, '2013-02-08 19:37:00', 0, 0),
(445, 103, 0, '2013-02-08 19:37:07', 0, 0),
(446, 82, 0, '2013-02-08 19:37:08', 0, 0),
(447, 82, 0, '2013-02-08 19:37:11', 0, 0),
(448, 92, 0, '2013-02-08 19:37:15', 0, 0),
(449, 61, 0, '2013-02-08 19:37:29', 0, 0),
(450, 73, 0, '2013-02-08 19:37:33', 0, 0),
(451, 60, 0, '2013-02-08 19:37:47', 0, 0),
(452, 106, 0, '2013-02-08 19:37:50', 0, 0),
(453, 55, 0, '2013-02-08 19:37:55', 2, 0),
(454, 42, 0, '2013-02-08 19:38:33', 0, 0),
(455, 13, 0, '2013-02-08 19:38:38', 0, 0),
(456, 118, 0, '2013-02-08 19:39:42', 0, 0),
(457, 116, 0, '2013-02-08 19:39:47', 0, 0),
(458, 135, 0, '2013-02-08 19:39:50', 0, 0),
(459, 113, 0, '2013-02-08 19:39:58', 0, 0),
(460, 110, 0, '2013-02-08 19:40:01', 0, 0),
(461, 36, 0, '2013-02-08 19:40:09', 0, 0),
(462, 74, 0, '2013-02-08 19:40:14', 0, 0),
(463, 127, 0, '2013-02-08 19:40:16', 0, 0),
(464, 140, 2, '2013-02-10 04:48:37', 0, 0),
(465, 140, 2, '2013-02-10 04:49:33', 0, 0),
(466, 140, 2, '2013-02-10 04:52:18', 0, 1),
(467, 140, 2, '2013-02-10 04:52:18', 0, 1),
(468, 140, 2, '2013-02-10 04:52:19', 0, 1),
(469, 140, 2, '2013-02-10 04:52:21', 0, 1),
(470, 140, 2, '2013-02-10 04:52:22', 0, 1),
(471, 140, 2, '2013-02-10 04:52:24', 0, 1),
(472, 140, 2, '2013-02-10 04:52:24', 0, 1),
(473, 140, 2, '2013-02-10 04:52:25', 0, 1),
(474, 140, 2, '2013-02-10 04:52:25', 0, 1),
(475, 140, 2, '2013-02-10 04:52:35', 0, 1),
(476, 140, 2, '2013-02-10 04:52:37', 0, 1),
(477, 140, 2, '2013-02-10 04:53:04', 0, 1),
(478, 140, 2, '2013-02-10 04:53:04', 0, 1),
(479, 140, 2, '2013-02-10 04:53:04', 0, 1),
(480, 140, 2, '2013-02-10 04:53:04', 0, 1),
(481, 140, 2, '2013-02-10 04:53:04', 0, 1),
(482, 140, 2, '2013-02-10 04:53:04', 0, 1),
(483, 140, 2, '2013-02-10 04:53:04', 0, 1),
(484, 140, 2, '2013-02-10 04:53:13', 0, 1),
(485, 140, 2, '2013-02-10 04:53:15', 0, 1),
(486, 140, 2, '2013-02-10 04:53:15', 0, 1),
(487, 140, 2, '2013-02-10 04:53:15', 0, 1),
(488, 140, 2, '2013-02-10 04:53:15', 0, 1),
(489, 140, 2, '2013-02-10 04:53:15', 0, 1),
(490, 140, 2, '2013-02-10 04:53:15', 0, 1),
(491, 140, 2, '2013-02-10 04:53:15', 0, 1),
(492, 140, 2, '2013-02-10 04:53:15', 0, 1),
(493, 15, 0, '2013-02-10 09:46:16', 0, 0),
(494, 122, 0, '2013-02-10 14:07:40', 0, 0),
(495, 125, 2, '2013-02-11 04:53:28', 0, 0),
(496, 79, 0, '2013-02-11 09:39:52', 0, 0),
(497, 79, 0, '2013-02-11 09:40:00', 0, 0),
(498, 79, 0, '2013-02-11 09:40:10', 0, 0),
(499, 37, 0, '2013-02-11 09:40:29', 0, 0),
(500, 155, 2, '2013-02-11 21:18:53', 2, 0),
(501, 57, 2, '2013-02-11 21:19:08', 2, 0),
(502, 73, 2, '2013-02-11 23:11:26', 0, 0),
(503, 63, 2, '2013-02-11 23:12:35', 2, 0),
(504, 73, 2, '2013-02-11 23:17:20', 0, 0),
(505, 152, 2, '2013-02-11 23:17:38', 2, 0),
(506, 150, 2, '2013-02-11 23:17:56', 0, 1),
(507, 150, 2, '2013-02-11 23:18:02', 0, 1),
(508, 150, 2, '2013-02-11 23:18:07', 0, 1),
(509, 150, 2, '2013-02-11 23:18:09', 0, 1),
(510, 150, 2, '2013-02-11 23:18:10', 0, 1),
(511, 150, 2, '2013-02-11 23:18:12', 0, 1),
(512, 150, 2, '2013-02-11 23:18:20', 0, 1),
(513, 150, 2, '2013-02-11 23:18:20', 0, 1),
(514, 150, 2, '2013-02-11 23:18:21', 0, 1),
(515, 150, 2, '2013-02-11 23:18:21', 0, 1),
(516, 150, 2, '2013-02-11 23:18:21', 0, 1),
(517, 105, 2, '2013-02-11 23:29:18', 2, 0),
(518, 159, 2, '2013-02-12 00:22:16', 2, 0),
(519, 159, 0, '2013-02-12 00:22:23', 2, 0),
(520, 38, 2, '2013-02-12 00:24:00', 0, 0),
(521, 107, 0, '2013-02-12 09:54:30', 0, 0),
(522, 159, 0, '2013-02-12 10:00:07', 2, 0),
(523, 159, 0, '2013-02-12 10:00:07', 2, 0),
(524, 107, 0, '2013-02-12 10:00:16', 0, 0),
(525, 14, 0, '2013-02-12 12:41:40', 0, 0),
(526, 121, 0, '2013-02-12 13:02:15', 0, 0),
(527, 88, 0, '2013-02-12 16:23:28', 0, 0),
(528, 76, 2, '2013-02-12 16:33:42', 0, 0),
(529, 76, 2, '2013-02-12 16:38:07', 0, 0),
(530, 137, 2, '2013-02-12 16:39:08', 0, 0),
(531, 136, 2, '2013-02-12 16:39:09', 0, 0),
(532, 135, 2, '2013-02-12 16:39:11', 0, 0),
(533, 132, 2, '2013-02-12 16:39:14', 0, 0),
(534, 127, 2, '2013-02-12 16:39:16', 0, 0),
(535, 126, 2, '2013-02-12 16:39:19', 0, 0),
(536, 42, 2, '2013-02-12 16:41:32', 0, 0),
(537, 143, 2, '2013-02-12 16:58:58', 2, 0),
(538, 143, 2, '2013-02-12 17:00:33', 2, 0),
(539, 143, 2, '2013-02-12 17:04:30', 2, 0),
(540, 143, 2, '2013-02-12 17:09:29', 2, 0),
(541, 93, 0, '2013-02-12 17:51:44', 0, 0),
(542, 74, 0, '2013-02-12 17:51:44', 0, 0),
(543, 82, 0, '2013-02-12 17:54:10', 0, 0),
(544, 86, 0, '2013-02-12 17:56:46', 0, 0),
(545, 78, 0, '2013-02-12 17:59:38', 0, 0),
(546, 61, 0, '2013-02-12 18:03:08', 0, 0),
(547, 99, 0, '2013-02-12 18:14:01', 0, 0),
(548, 72, 0, '2013-02-12 18:16:45', 0, 0),
(549, 87, 0, '2013-02-12 18:22:08', 0, 0),
(550, 89, 0, '2013-02-12 18:25:02', 0, 0),
(551, 90, 0, '2013-02-12 18:25:47', 0, 0),
(552, 80, 0, '2013-02-12 18:35:14', 0, 0),
(553, 95, 0, '2013-02-12 18:35:14', 0, 0),
(554, 79, 0, '2013-02-12 18:38:39', 0, 0),
(555, 76, 0, '2013-02-12 18:49:51', 0, 0),
(556, 92, 0, '2013-02-12 18:52:58', 0, 0),
(557, 73, 0, '2013-02-12 18:55:28', 0, 0),
(558, 60, 0, '2013-02-12 19:06:08', 0, 0),
(559, 62, 0, '2013-02-12 19:08:11', 0, 0),
(560, 96, 0, '2013-02-12 19:10:15', 0, 0),
(561, 97, 0, '2013-02-12 19:12:18', 0, 0),
(562, 68, 0, '2013-02-12 19:14:15', 0, 0),
(563, 88, 0, '2013-02-12 19:17:52', 0, 0),
(564, 91, 0, '2013-02-12 19:17:53', 0, 0),
(565, 77, 0, '2013-02-12 19:18:43', 0, 0),
(566, 111, 2, '2013-02-12 19:24:56', 0, 0),
(567, 71, 0, '2013-02-12 19:25:29', 0, 0),
(568, 117, 2, '2013-02-12 19:25:59', 0, 0),
(569, 67, 2, '2013-02-12 19:26:32', 2, 0),
(570, 73, 2, '2013-02-12 19:29:04', 0, 0),
(571, 73, 2, '2013-02-12 19:29:10', 0, 1),
(572, 66, 0, '2013-02-12 19:33:25', 0, 0),
(573, 85, 0, '2013-02-12 19:37:58', 0, 0),
(574, 106, 0, '2013-02-12 19:43:06', 0, 0),
(575, 133, 0, '2013-02-12 19:47:02', 3, 0),
(576, 138, 0, '2013-02-12 19:54:30', 0, 0),
(577, 109, 0, '2013-02-12 19:56:49', 0, 0),
(578, 132, 0, '2013-02-12 19:59:50', 0, 0),
(579, 122, 0, '2013-02-12 20:01:34', 0, 0),
(580, 127, 0, '2013-02-12 20:09:10', 0, 0),
(581, 102, 0, '2013-02-12 20:17:03', 0, 0),
(582, 136, 0, '2013-02-12 20:21:50', 0, 0),
(583, 126, 0, '2013-02-12 20:24:20', 0, 0),
(584, 100, 0, '2013-02-12 20:27:32', 0, 0),
(585, 134, 0, '2013-02-12 20:32:09', 3, 0),
(586, 123, 0, '2013-02-12 20:35:00', 0, 0),
(587, 114, 0, '2013-02-12 20:37:26', 0, 0),
(588, 139, 0, '2013-02-12 20:40:04', 0, 0),
(589, 116, 0, '2013-02-12 20:45:06', 0, 0),
(590, 137, 0, '2013-02-12 20:45:07', 0, 0),
(591, 113, 0, '2013-02-12 20:47:51', 0, 0),
(592, 108, 0, '2013-02-12 20:57:07', 0, 0),
(593, 119, 0, '2013-02-12 21:01:17', 0, 0),
(594, 103, 0, '2013-02-12 21:01:17', 0, 0),
(595, 107, 0, '2013-02-12 21:03:23', 0, 0),
(596, 117, 0, '2013-02-12 21:14:04', 0, 0),
(597, 140, 0, '2013-02-12 21:14:04', 0, 0),
(598, 135, 0, '2013-02-12 21:28:17', 0, 0),
(599, 125, 0, '2013-02-12 21:28:18', 0, 0),
(600, 112, 0, '2013-02-12 21:28:18', 0, 0),
(601, 118, 0, '2013-02-12 21:42:31', 0, 0),
(602, 111, 0, '2013-02-12 21:42:33', 0, 0),
(603, 121, 0, '2013-02-12 21:51:53', 0, 0),
(604, 98, 0, '2013-02-12 21:57:47', 2, 0),
(605, 110, 0, '2013-02-12 22:00:19', 0, 0),
(606, 57, 0, '2013-02-12 22:02:49', 2, 0),
(607, 64, 0, '2013-02-12 22:07:15', 2, 0),
(608, 43, 0, '2013-02-12 22:08:47', 2, 0),
(609, 41, 0, '2013-02-12 22:13:56', 2, 0),
(610, 56, 0, '2013-02-12 22:19:12', 2, 0),
(611, 59, 0, '2013-02-12 22:25:01', 2, 0),
(612, 69, 0, '2013-02-12 22:27:16', 2, 0),
(613, 49, 0, '2013-02-12 22:29:43', 2, 0),
(614, 55, 0, '2013-02-12 22:31:34', 2, 0),
(615, 63, 0, '2013-02-12 22:39:50', 2, 0),
(616, 67, 0, '2013-02-12 22:49:11', 2, 0),
(617, 65, 0, '2013-02-12 22:52:46', 2, 0),
(618, 39, 0, '2013-02-12 22:55:12', 2, 0),
(619, 156, 0, '2013-02-12 23:02:47', 2, 0),
(620, 104, 0, '2013-02-12 23:05:13', 2, 0),
(621, 105, 0, '2013-02-12 23:10:41', 2, 0),
(622, 120, 0, '2013-02-12 23:13:34', 2, 0),
(623, 157, 0, '2013-02-12 23:16:30', 2, 0),
(624, 155, 0, '2013-02-12 23:23:19', 2, 0),
(625, 152, 0, '2013-02-12 23:26:33', 2, 0),
(626, 159, 0, '2013-02-12 23:28:57', 2, 0),
(627, 147, 0, '2013-02-12 23:32:19', 2, 0),
(628, 143, 0, '2013-02-12 23:35:12', 2, 0),
(629, 158, 0, '2013-02-12 23:40:12', 2, 0),
(630, 98, 0, '2013-02-12 23:44:05', 0, 0),
(631, 55, 0, '2013-02-12 23:51:58', 0, 0),
(632, 65, 0, '2013-02-12 23:58:23', 0, 0),
(633, 59, 0, '2013-02-13 00:05:05', 0, 0),
(634, 63, 0, '2013-02-13 00:11:03', 0, 0),
(635, 69, 0, '2013-02-13 00:13:45', 0, 0),
(636, 57, 0, '2013-02-13 00:18:46', 0, 0),
(637, 41, 0, '2013-02-13 00:22:33', 0, 0),
(638, 49, 0, '2013-02-13 00:22:34', 0, 0),
(639, 43, 0, '2013-02-13 00:22:34', 0, 0),
(640, 39, 0, '2013-02-13 00:27:17', 0, 0),
(641, 64, 0, '2013-02-13 00:34:17', 0, 0),
(642, 67, 0, '2013-02-13 00:35:13', 0, 0),
(643, 120, 0, '2013-02-13 00:48:01', 0, 0),
(644, 56, 0, '2013-02-13 00:48:02', 0, 0),
(645, 159, 0, '2013-02-13 00:53:33', 0, 0),
(646, 156, 0, '2013-02-13 00:59:37', 0, 0),
(647, 134, 0, '2013-02-13 01:02:14', 0, 0),
(648, 133, 0, '2013-02-13 01:05:05', 0, 0),
(649, 105, 0, '2013-02-13 01:12:20', 0, 0),
(650, 158, 0, '2013-02-13 01:12:21', 0, 0),
(651, 152, 0, '2013-02-13 01:16:09', 0, 0),
(652, 157, 0, '2013-02-13 01:19:00', 0, 0),
(653, 155, 0, '2013-02-13 01:27:54', 0, 0),
(654, 147, 0, '2013-02-13 01:32:04', 0, 0),
(655, 104, 0, '2013-02-13 01:35:54', 0, 0),
(656, 143, 0, '2013-02-13 01:43:48', 0, 0),
(657, 184, 2, '2013-02-13 02:04:29', 0, 0),
(658, 184, 0, '2013-02-13 02:05:01', 0, 0),
(659, 184, 0, '2013-02-13 02:10:10', 0, 0),
(660, 184, 0, '2013-02-13 02:10:27', 0, 0),
(661, 184, 0, '2013-02-13 02:14:45', 0, 0),
(662, 184, 0, '2013-02-13 02:16:44', 0, 0),
(663, 184, 0, '2013-02-13 02:31:54', 0, 0),
(664, 107, 0, '2013-02-13 02:43:55', 0, 0),
(665, 184, 0, '2013-02-13 03:03:02', 0, 0),
(666, 184, 0, '2013-02-13 03:13:51', 0, 0),
(667, 184, 0, '2013-02-13 03:25:41', 0, 0),
(668, 184, 0, '2013-02-13 03:25:42', 0, 0),
(669, 184, 0, '2013-02-13 03:33:31', 0, 0),
(670, 185, 0, '2013-02-13 03:37:50', 2, 0),
(671, 185, 0, '2013-02-13 03:38:07', 2, 0),
(672, 185, 0, '2013-02-13 03:38:13', 2, 0),
(673, 185, 2, '2013-02-13 03:38:55', 2, 0),
(674, 184, 0, '2013-02-13 03:40:49', 0, 0),
(675, 185, 0, '2013-02-13 03:49:42', 2, 0),
(676, 185, 0, '2013-02-13 03:50:02', 2, 0),
(677, 60, 0, '2013-02-13 03:50:04', 0, 0),
(678, 122, 0, '2013-02-13 03:50:09', 0, 0),
(679, 184, 0, '2013-02-13 04:01:22', 0, 0),
(680, 184, 0, '2013-02-13 04:01:49', 0, 0),
(681, 184, 0, '2013-02-13 04:02:08', 0, 0),
(682, 36, 0, '2013-02-13 04:02:15', 0, 0),
(683, 185, 0, '2013-02-13 04:25:09', 2, 0),
(684, 185, 0, '2013-02-13 04:25:33', 2, 0),
(685, 185, 0, '2013-02-13 04:46:52', 2, 0),
(686, 184, 0, '2013-02-13 05:07:21', 0, 0),
(687, 184, 0, '2013-02-13 05:37:20', 0, 0),
(688, 184, 0, '2013-02-13 06:26:35', 0, 0),
(689, 69, 0, '2013-02-13 06:27:05', 0, 0),
(690, 184, 0, '2013-02-13 06:53:28', 0, 0),
(691, 184, 0, '2013-02-13 07:36:43', 0, 0),
(692, 184, 2, '2013-02-13 08:46:54', 0, 0),
(693, 184, 0, '2013-02-13 10:05:29', 0, 0),
(694, 184, 0, '2013-02-13 10:08:39', 0, 0),
(695, 184, 0, '2013-02-13 10:17:59', 0, 0),
(696, 184, 0, '2013-02-13 11:08:15', 0, 0),
(697, 184, 0, '2013-02-13 11:08:46', 0, 0),
(698, 140, 0, '2013-02-13 11:09:30', 0, 0),
(699, 86, 0, '2013-02-13 11:10:31', 0, 0),
(700, 184, 0, '2013-02-13 11:52:07', 0, 0),
(701, 13, 0, '2013-02-13 12:28:15', 0, 0),
(702, 186, 0, '2013-02-13 13:40:01', 2, 0),
(703, 91, 0, '2013-02-13 14:55:14', 0, 0),
(704, 108, 0, '2013-02-13 20:59:05', 0, 0),
(705, 137, 0, '2013-02-13 21:11:55', 0, 0),
(706, 103, 0, '2013-02-13 21:31:26', 0, 0),
(707, 107, 0, '2013-02-13 23:26:27', 0, 0),
(708, 119, 0, '2013-02-13 23:28:26', 0, 0),
(709, 117, 0, '2013-02-13 23:30:32', 0, 0),
(710, 140, 0, '2013-02-13 23:32:41', 0, 0),
(711, 135, 0, '2013-02-13 23:35:10', 0, 0),
(712, 125, 0, '2013-02-13 23:37:52', 0, 0),
(713, 112, 0, '2013-02-14 00:30:09', 0, 0),
(714, 121, 0, '2013-02-14 00:43:36', 0, 0),
(715, 111, 0, '2013-02-14 00:43:36', 0, 0),
(716, 139, 2, '2013-02-14 00:55:30', 0, 0),
(717, 118, 0, '2013-02-14 00:55:40', 0, 0),
(718, 110, 0, '2013-02-14 00:56:00', 0, 0),
(719, 57, 0, '2013-02-14 01:17:09', 2, 0),
(720, 61, 0, '2013-02-14 01:21:47', 0, 0),
(721, 61, 0, '2013-02-14 01:22:04', 0, 0),
(722, 61, 0, '2013-02-14 01:22:11', 0, 0),
(723, 61, 0, '2013-02-14 01:22:46', 0, 0),
(724, 61, 0, '2013-02-14 01:22:48', 0, 0),
(725, 61, 0, '2013-02-14 01:24:10', 0, 0),
(726, 98, 0, '2013-02-14 01:27:12', 2, 0),
(727, 61, 0, '2013-02-14 01:28:16', 0, 0),
(728, 61, 0, '2013-02-14 01:31:20', 0, 0),
(729, 64, 0, '2013-02-14 01:38:06', 2, 0),
(730, 61, 0, '2013-02-14 01:39:42', 0, 0),
(731, 61, 0, '2013-02-14 01:39:53', 0, 0),
(732, 61, 0, '2013-02-14 01:40:04', 0, 0),
(733, 61, 0, '2013-02-14 01:40:14', 0, 0),
(734, 61, 0, '2013-02-14 01:58:11', 0, 0),
(735, 43, 0, '2013-02-14 01:59:58', 2, 0),
(736, 41, 0, '2013-02-14 02:09:47', 2, 0),
(737, 56, 0, '2013-02-14 02:30:47', 2, 0),
(738, 59, 0, '2013-02-14 02:50:50', 2, 0),
(739, 69, 0, '2013-02-14 03:10:40', 2, 0),
(740, 49, 0, '2013-02-14 03:32:29', 2, 0),
(741, 55, 0, '2013-02-14 03:53:47', 2, 0),
(742, 63, 0, '2013-02-14 04:14:30', 2, 0),
(743, 67, 0, '2013-02-14 04:32:40', 2, 0),
(744, 65, 0, '2013-02-14 05:00:51', 2, 0),
(745, 39, 0, '2013-02-14 05:20:49', 2, 0),
(746, 156, 0, '2013-02-14 05:39:15', 2, 0),
(747, 104, 0, '2013-02-14 05:59:52', 2, 0),
(748, 105, 0, '2013-02-14 06:19:17', 2, 0),
(749, 184, 0, '2013-02-14 06:21:21', 0, 0),
(750, 120, 0, '2013-02-14 06:31:11', 2, 0),
(751, 157, 0, '2013-02-14 06:49:29', 2, 0),
(752, 97, 0, '2013-02-14 06:53:20', 0, 0),
(753, 184, 2, '2013-02-14 06:54:13', 0, 0),
(754, 206, 2, '2013-02-14 07:02:32', 2, 0),
(755, 155, 0, '2013-02-14 07:08:41', 2, 0),
(756, 152, 0, '2013-02-14 07:18:30', 2, 0),
(757, 159, 0, '2013-02-14 07:38:33', 2, 0),
(758, 147, 0, '2013-02-14 07:59:23', 2, 0),
(759, 159, 0, '2013-02-14 08:10:19', 2, 0),
(760, 56, 0, '2013-02-14 08:14:42', 2, 0),
(761, 103, 0, '2013-02-14 08:15:02', 0, 0),
(762, 158, 0, '2013-02-14 08:15:10', 2, 0),
(763, 143, 0, '2013-02-14 08:19:43', 2, 0),
(764, 158, 0, '2013-02-14 08:39:50', 2, 0),
(765, 98, 0, '2013-02-14 09:01:22', 0, 0),
(766, 55, 0, '2013-02-14 09:11:32', 0, 0),
(767, 37, 0, '2013-02-14 09:20:11', 0, 0),
(768, 37, 0, '2013-02-14 09:20:46', 0, 0),
(769, 65, 0, '2013-02-14 09:31:11', 0, 0),
(770, 59, 0, '2013-02-14 09:41:40', 0, 0),
(771, 63, 0, '2013-02-14 09:59:35', 0, 0),
(772, 69, 0, '2013-02-14 10:18:46', 0, 0),
(773, 57, 0, '2013-02-14 10:39:20', 0, 0),
(774, 138, 2, '2013-02-14 10:56:27', 0, 0),
(775, 49, 0, '2013-02-14 10:59:39', 0, 0),
(776, 214, 2, '2013-02-14 11:03:58', 2, 0),
(777, 39, 0, '2013-02-14 11:09:53', 0, 0),
(778, 41, 0, '2013-02-14 11:34:35', 0, 0),
(779, 43, 0, '2013-02-14 11:57:16', 0, 0),
(780, 64, 0, '2013-02-14 12:22:28', 0, 0),
(781, 67, 0, '2013-02-14 12:46:45', 0, 0),
(782, 56, 0, '2013-02-14 13:21:03', 0, 0),
(783, 120, 0, '2013-02-14 14:08:05', 0, 0),
(784, 156, 0, '2013-02-14 14:44:19', 0, 0),
(785, 134, 0, '2013-02-14 15:06:45', 0, 0),
(786, 133, 0, '2013-02-14 15:40:14', 0, 0),
(787, 105, 0, '2013-02-14 15:52:05', 0, 0),
(788, 158, 0, '2013-02-14 16:23:16', 0, 0),
(789, 152, 0, '2013-02-14 16:50:16', 0, 0),
(790, 157, 0, '2013-02-14 17:19:15', 0, 0),
(791, 155, 0, '2013-02-14 17:48:49', 0, 0),
(792, 147, 0, '2013-02-14 18:09:16', 0, 0),
(793, 104, 0, '2013-02-14 18:39:44', 0, 0),
(794, 143, 0, '2013-02-14 19:10:25', 0, 0),
(795, 214, 2, '2013-02-14 21:54:43', 2, 0),
(796, 214, 0, '2013-02-14 21:54:59', 2, 0),
(797, 209, 0, '2013-02-14 22:00:42', 2, 0),
(798, 159, 0, '2013-02-14 22:39:27', 0, 0),
(799, 210, 2, '2013-02-15 03:10:22', 2, 0),
(800, 80, 0, '2013-02-15 04:55:49', 0, 0),
(801, 37, 0, '2013-02-15 05:04:00', 0, 0),
(802, 42, 0, '2013-02-15 08:03:27', 0, 0),
(803, 19, 0, '2013-02-15 08:03:36', 0, 0),
(804, 61, 0, '2013-02-15 10:40:43', 0, 0),
(805, 184, 2, '2013-02-15 14:46:12', 0, 0),
(806, 184, 0, '2013-02-16 05:47:21', 0, 0),
(807, 102, 0, '2013-02-16 22:16:59', 0, 0),
(808, 102, 0, '2013-02-16 22:17:31', 0, 0),
(809, 137, 0, '2013-02-17 07:55:42', 0, 0),
(810, 138, 0, '2013-02-17 07:56:55', 0, 0),
(811, 138, 0, '2013-02-17 07:57:10', 0, 0),
(812, 71, 2, '2013-02-17 07:58:10', 0, 0),
(813, 74, 2, '2013-02-17 07:58:28', 0, 0),
(814, 137, 2, '2013-02-17 08:00:14', 0, 0),
(815, 117, 2, '2013-02-17 08:00:32', 0, 0),
(816, 77, 2, '2013-02-17 08:00:59', 0, 0),
(817, 77, 2, '2013-02-17 08:11:17', 0, 0),
(818, 184, 0, '2013-02-17 11:29:10', 0, 0),
(819, 152, 0, '2013-02-17 17:58:53', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_tag`
--

CREATE TABLE IF NOT EXISTS `content_tag` (
  `id_content_tag` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `tag` varchar(200) NOT NULL,
  PRIMARY KEY (`id_content_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_topic`
--

CREATE TABLE IF NOT EXISTS `content_topic` (
  `id_content_topic` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `content_topic`
--

INSERT INTO `content_topic` (`id_content_topic`, `content_id`, `topic_id`) VALUES
(1, 120, 4),
(2, 121, 4),
(3, 122, 4),
(4, 123, 4),
(5, 126, 4),
(6, 127, 4),
(7, 125, 4),
(8, 132, 4),
(9, 0, 0),
(10, 132, 22);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id_course` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `picture` varchar(25) NOT NULL,
  `course` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_faculty`
--

CREATE TABLE IF NOT EXISTS `course_faculty` (
  `id_course_faculty` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id_course_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course_faculty`
--

INSERT INTO `course_faculty` (`id_course_faculty`, `course_id`, `faculty_id`) VALUES
(1, 0, 0),
(2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_topic`
--

CREATE TABLE IF NOT EXISTS `course_topic` (
  `id_course_topic` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_course_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_topic`
--

INSERT INTO `course_topic` (`id_course_topic`, `course_id`, `topic_id`) VALUES
(1, 1, 4),
(2, 0, 0),
(3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id_faculty` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` text NOT NULL,
  `short` varchar(20) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id_faculty`, `faculty`, `short`, `parent`) VALUES
(1, 'Fakultas Hukum', 'FH', 0),
(2, 'Fakultas Ekonomi', 'FE', 0),
(3, 'Fakultas Kedokteran', 'FK', 0),
(4, 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'FMIPA', 0),
(5, 'Fakultas Pertanian', 'FAPERTA', 0),
(6, 'Fakultas Ilmu Sosial dan Ilmu Politik', 'FISIP', 0),
(7, 'Fakultas Ilmu Budaya', 'FIB', 0),
(8, 'Fakultas Psikologi', 'FPI', 0),
(9, 'Fakultas Ilmu Komunikasi', 'FIKOM', 0),
(10, 'Fakultas Ilmu Keperawatan', 'FIK', 0),
(11, 'Fakultas Peternakan', 'FAPET', 0),
(12, 'Fakultas Perikanan dan Ilmu Kelautan', 'FPIK', 0),
(13, 'Fakultas Teknologi Industri Pertanian', 'FTIP', 0),
(14, 'Fakultas Farmasi', 'FARMASI', 0),
(15, 'Fakultas Teknik Geologi', 'FTG', 0),
(16, 'Fakultas Kedokteran Gigi', 'FKG', 0),
(18, 'Manga', 'M', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'general', 'General'),
(3, 'lecturer', 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `header`, `news`, `attachment`, `date`, `type`, `status`, `attachment_type`) VALUES
(30, 'baru', '', 'baru', '30.pdf', '2013-02-22 08:07:50', 3, 0, '1'),
(31, 'beasiswa', '', 'beasiswa', '31.pdf', '2013-02-22 08:07:36', 2, 0, '1'),
(43, 'sadsad', 'HomePage_Registration.jpg', 'saddasda', '43.pdf', '2013-02-22 11:14:49', 1, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_choice`
--

CREATE TABLE IF NOT EXISTS `quiz_choice` (
  `id_choice` int(11) NOT NULL AUTO_INCREMENT,
  `soal_id` int(11) NOT NULL,
  `option` varchar(10) DEFAULT NULL,
  `option_text` text,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_choice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `quiz_choice`
--

INSERT INTO `quiz_choice` (`id_choice`, `soal_id`, `option`, `option_text`, `status`, `deleted`, `date`) VALUES
(1, 1, 'a', 'vabel', 1, 0, '2013-02-20 05:44:40'),
(2, 1, 'b', 'fabel', 1, 0, '2013-02-20 05:44:40'),
(3, 1, 'c', 'pabel', 1, 0, '2013-02-20 05:44:40'),
(4, 1, 'd ', 'tabel', 1, 0, '2013-02-20 05:44:40'),
(5, 1, 'e', 'kabel', 1, 0, '2013-02-20 05:44:40'),
(6, 2, 'a', 'python', 1, 0, '2013-02-20 05:44:40'),
(7, 2, 'b', 'java', 1, 0, '2013-02-20 05:44:40'),
(8, 2, 'c', 'php', 1, 0, '2013-02-20 05:44:40'),
(9, 2, 'd ', 'bash', 1, 0, '2013-02-20 05:44:40'),
(10, 2, 'e', 'ruby', 1, 0, '2013-02-20 05:44:40'),
(11, 3, 'a', 'bejo', 1, 0, '2013-02-20 05:44:40'),
(12, 3, 'b', 'tejo', 1, 0, '2013-02-20 05:44:40'),
(13, 3, 'c', 'dejo', 1, 0, '2013-02-20 05:44:40'),
(14, 3, 'd ', 'pejo', 1, 0, '2013-02-20 05:44:40'),
(15, 3, 'e', 'kejo', 1, 0, '2013-02-20 05:44:40'),
(16, 4, 'a', 'asus', 1, 0, '2013-02-20 05:44:40'),
(17, 4, 'b', 'toshiba', 1, 0, '2013-02-20 05:44:40'),
(18, 4, 'c', 'advan', 1, 0, '2013-02-20 05:44:40'),
(19, 4, 'd ', 'acer', 1, 0, '2013-02-20 05:44:40'),
(20, 4, 'e', 'samsung', 1, 0, '2013-02-20 05:44:40'),
(21, 5, 'a', 'samsung', 1, 0, '2013-02-20 05:44:40'),
(22, 5, 'b', 'htc', 1, 0, '2013-02-20 05:44:40'),
(23, 5, 'c', 'blackberry', 1, 0, '2013-02-20 05:44:40'),
(24, 5, 'd ', 'lg', 1, 0, '2013-02-20 05:44:40'),
(25, 5, 'e', 'nokia', 1, 0, '2013-02-20 05:44:40'),
(26, 6, 'a', 'vabel', 1, 0, '2013-02-20 05:44:41'),
(27, 6, 'b', 'fabel', 1, 0, '2013-02-20 05:44:41'),
(28, 6, 'c', 'pabel', 1, 0, '2013-02-20 05:44:41'),
(29, 6, 'd ', 'tabel', 1, 0, '2013-02-20 05:44:41'),
(30, 6, 'e', 'kabel', 1, 0, '2013-02-20 05:44:41'),
(31, 7, 'a', 'python', 1, 0, '2013-02-20 05:44:41'),
(32, 7, 'b', 'java', 1, 0, '2013-02-20 05:44:41'),
(33, 7, 'c', 'php', 1, 0, '2013-02-20 05:44:41'),
(34, 7, 'd ', 'bash', 1, 0, '2013-02-20 05:44:41'),
(35, 7, 'e', 'ruby', 1, 0, '2013-02-20 05:44:41'),
(36, 8, 'a', 'bejo', 1, 0, '2013-02-20 05:44:41'),
(37, 8, 'b', 'tejo', 1, 0, '2013-02-20 05:44:41'),
(38, 8, 'c', 'dejo', 1, 0, '2013-02-20 05:44:41'),
(39, 8, 'd ', 'pejo', 1, 0, '2013-02-20 05:44:41'),
(40, 8, 'e', 'kejo', 1, 0, '2013-02-20 05:44:41'),
(41, 9, 'a', 'asus', 1, 0, '2013-02-20 05:44:41'),
(42, 9, 'b', 'toshiba', 1, 0, '2013-02-20 05:44:41'),
(43, 9, 'c', 'advan', 1, 0, '2013-02-20 05:44:41'),
(44, 9, 'd ', 'acer', 1, 0, '2013-02-20 05:44:41'),
(45, 9, 'e', 'samsung', 1, 0, '2013-02-20 05:44:41'),
(46, 10, 'a', 'samsung', 1, 0, '2013-02-20 05:44:41'),
(47, 10, 'b', 'htc', 1, 0, '2013-02-20 05:44:41'),
(48, 10, 'c', 'blackberry', 1, 0, '2013-02-20 05:44:41'),
(49, 10, 'd ', 'lg', 1, 0, '2013-02-20 05:44:41'),
(50, 10, 'e', 'nokia', 1, 0, '2013-02-20 05:44:41'),
(51, 11, 'a', 'vabel', 1, 1, '2013-02-13 00:07:26'),
(52, 11, 'b', 'fabel', 1, 1, '2013-02-13 00:07:26'),
(53, 11, 'c', 'pabel', 1, 1, '2013-02-13 00:07:26'),
(54, 11, 'd ', 'tabel', 1, 1, '2013-02-13 00:07:26'),
(55, 11, 'e', 'kabel', 1, 1, '2013-02-13 00:07:26'),
(56, 12, 'a', 'python', 1, 1, '2013-02-13 00:07:26'),
(57, 12, 'b', 'java', 1, 1, '2013-02-13 00:07:26'),
(58, 12, 'c', 'php', 1, 1, '2013-02-13 00:07:27'),
(59, 12, 'd ', 'bash', 1, 1, '2013-02-13 00:07:27'),
(60, 12, 'e', 'ruby', 1, 1, '2013-02-13 00:07:27'),
(61, 13, 'a', 'bejo', 1, 1, '2013-02-13 00:07:27'),
(62, 13, 'b', 'tejo', 1, 1, '2013-02-13 00:07:27'),
(63, 13, 'c', 'dejo', 1, 1, '2013-02-13 00:07:27'),
(64, 13, 'd ', 'pejo', 1, 1, '2013-02-13 00:07:27'),
(65, 13, 'e', 'kejo', 1, 1, '2013-02-13 00:07:27'),
(66, 14, 'a', 'asus', 1, 1, '2013-02-13 00:07:27'),
(67, 14, 'b', 'toshiba', 1, 1, '2013-02-13 00:07:27'),
(68, 14, 'c', 'advan', 1, 1, '2013-02-13 00:07:27'),
(69, 14, 'd ', 'acer', 1, 1, '2013-02-13 00:07:27'),
(70, 14, 'e', 'samsung', 1, 1, '2013-02-13 00:07:27'),
(71, 15, 'a', 'samsung', 1, 1, '2013-02-13 00:07:27'),
(72, 15, 'b', 'htc', 1, 1, '2013-02-13 00:07:27'),
(73, 15, 'c', 'blackberry', 1, 1, '2013-02-13 00:07:27'),
(74, 15, 'd ', 'lg', 1, 1, '2013-02-13 00:07:27'),
(75, 15, 'e', 'nokia', 1, 1, '2013-02-13 00:07:28'),
(76, 16, 'a', 'vabel', 1, 1, '2013-02-13 00:07:28'),
(77, 16, 'b', 'fabel', 1, 1, '2013-02-13 00:07:28'),
(78, 16, 'c', 'pabel', 1, 1, '2013-02-13 00:07:28'),
(79, 16, 'd ', 'tabel', 1, 1, '2013-02-13 00:07:28'),
(80, 16, 'e', 'kabel', 1, 1, '2013-02-13 00:07:28'),
(81, 17, 'a', 'python', 1, 1, '2013-02-13 00:07:28'),
(82, 17, 'b', 'java', 1, 1, '2013-02-13 00:07:28'),
(83, 17, 'c', 'php', 1, 1, '2013-02-13 00:07:28'),
(84, 17, 'd ', 'bash', 1, 1, '2013-02-13 00:07:28'),
(85, 17, 'e', 'ruby', 1, 1, '2013-02-13 00:07:28'),
(86, 18, 'a', 'bejo', 1, 1, '2013-02-13 00:07:28'),
(87, 18, 'b', 'tejo', 1, 1, '2013-02-13 00:07:28'),
(88, 18, 'c', 'dejo', 1, 1, '2013-02-13 00:07:28'),
(89, 18, 'd ', 'pejo', 1, 1, '2013-02-13 00:07:28'),
(90, 18, 'e', 'kejo', 1, 1, '2013-02-13 00:07:28'),
(91, 19, 'a', 'asus', 1, 1, '2013-02-13 00:07:28'),
(92, 19, 'b', 'toshiba', 1, 1, '2013-02-13 00:07:28'),
(93, 19, 'c', 'advan', 1, 1, '2013-02-13 00:07:28'),
(94, 19, 'd ', 'acer', 1, 1, '2013-02-13 00:07:28'),
(95, 19, 'e', 'samsung', 1, 1, '2013-02-13 00:07:28'),
(96, 20, 'a', 'samsung', 1, 1, '2013-02-13 00:07:28'),
(97, 20, 'b', 'htc', 1, 1, '2013-02-13 00:07:29'),
(98, 20, 'c', 'blackberry', 1, 1, '2013-02-13 00:07:29'),
(99, 20, 'd ', 'lg', 1, 1, '2013-02-13 00:07:29'),
(100, 20, 'e', 'nokia', 1, 1, '2013-02-13 00:07:29'),
(101, 21, 'a', 'vabel', 1, 0, '2013-02-20 05:44:50'),
(102, 21, 'b', 'fabel', 1, 0, '2013-02-20 05:44:50'),
(103, 21, 'c', 'pabel', 1, 0, '2013-02-20 05:44:50'),
(104, 21, 'd ', 'tabel', 1, 0, '2013-02-20 05:44:50'),
(105, 21, 'e', 'kabel', 1, 0, '2013-02-20 05:44:50'),
(106, 22, 'a', 'python', 1, 0, '2013-02-20 05:44:50'),
(107, 22, 'b', 'java', 1, 0, '2013-02-20 05:44:50'),
(108, 22, 'c', 'php', 1, 0, '2013-02-20 05:44:50'),
(109, 22, 'd ', 'bash', 1, 0, '2013-02-20 05:44:50'),
(110, 22, 'e', 'ruby', 1, 0, '2013-02-20 05:44:50'),
(111, 23, 'a', 'bejo', 1, 0, '2013-02-20 05:44:50'),
(112, 23, 'b', 'tejo', 1, 0, '2013-02-20 05:44:51'),
(113, 23, 'c', 'dejo', 1, 0, '2013-02-20 05:44:51'),
(114, 23, 'd ', 'pejo', 1, 0, '2013-02-20 05:44:51'),
(115, 23, 'e', 'kejo', 1, 0, '2013-02-20 05:44:51'),
(116, 24, 'a', 'asus', 1, 0, '2013-02-20 05:44:51'),
(117, 24, 'b', 'toshiba', 1, 0, '2013-02-20 05:44:51'),
(118, 24, 'c', 'advan', 1, 0, '2013-02-20 05:44:51'),
(119, 24, 'd ', 'acer', 1, 0, '2013-02-20 05:44:51'),
(120, 24, 'e', 'samsung', 1, 0, '2013-02-20 05:44:51'),
(121, 25, 'a', 'samsung', 1, 0, '2013-02-20 05:44:51'),
(122, 25, 'b', 'htc', 1, 0, '2013-02-20 05:44:51'),
(123, 25, 'c', 'blackberry', 1, 0, '2013-02-20 05:44:51'),
(124, 25, 'd ', 'lg', 1, 0, '2013-02-20 05:44:51'),
(125, 25, 'e', 'nokia', 1, 0, '2013-02-20 05:44:51'),
(126, 26, 'a', 'vabel', 1, 0, '2013-02-20 05:44:51'),
(127, 26, 'b', 'fabel', 1, 0, '2013-02-20 05:44:51'),
(128, 26, 'c', 'pabel', 1, 0, '2013-02-20 05:44:51'),
(129, 26, 'd ', 'tabel', 1, 0, '2013-02-20 05:44:51'),
(130, 26, 'e', 'kabel', 1, 0, '2013-02-20 05:44:51'),
(131, 27, 'a', 'python', 1, 0, '2013-02-20 05:44:51'),
(132, 27, 'b', 'java', 1, 0, '2013-02-20 05:44:51'),
(133, 27, 'c', 'php', 1, 0, '2013-02-20 05:44:51'),
(134, 27, 'd ', 'bash', 1, 0, '2013-02-20 05:44:51'),
(135, 27, 'e', 'ruby', 1, 0, '2013-02-20 05:44:51'),
(136, 28, 'a', 'bejo', 1, 0, '2013-02-20 05:44:51'),
(137, 28, 'b', 'tejo', 1, 0, '2013-02-20 05:44:52'),
(138, 28, 'c', 'dejo', 1, 0, '2013-02-20 05:44:52'),
(139, 28, 'd ', 'pejo', 1, 0, '2013-02-20 05:44:52'),
(140, 28, 'e', 'kejo', 1, 0, '2013-02-20 05:44:52'),
(141, 29, 'a', 'asus', 1, 0, '2013-02-20 05:44:52'),
(142, 29, 'b', 'toshiba', 1, 0, '2013-02-20 05:44:52'),
(143, 29, 'c', 'advan', 1, 0, '2013-02-20 05:44:52'),
(144, 29, 'd ', 'acer', 1, 0, '2013-02-20 05:44:52'),
(145, 29, 'e', 'samsung', 1, 0, '2013-02-20 05:44:52'),
(146, 30, 'a', 'samsung', 1, 0, '2013-02-20 05:44:52'),
(147, 30, 'b', 'htc', 1, 0, '2013-02-20 05:44:52'),
(148, 30, 'c', 'blackberry', 1, 0, '2013-02-20 05:44:52'),
(149, 30, 'd ', 'lg', 1, 0, '2013-02-20 05:44:52'),
(150, 30, 'e', 'nokia', 1, 0, '2013-02-20 05:44:52'),
(151, 31, 'a', 'vabel', 1, 1, '2013-02-13 08:32:02'),
(152, 31, 'b', 'fabel', 1, 1, '2013-02-13 08:32:02'),
(153, 31, 'c', 'pabel', 1, 1, '2013-02-13 08:32:02'),
(154, 31, 'd ', 'tabel', 1, 1, '2013-02-13 08:32:02'),
(155, 31, 'e', 'kabel', 1, 1, '2013-02-13 08:32:02'),
(156, 32, 'a', 'python', 1, 1, '2013-02-13 08:32:02'),
(157, 32, 'b', 'java', 1, 1, '2013-02-13 08:32:02'),
(158, 32, 'c', 'php', 1, 1, '2013-02-13 08:32:03'),
(159, 32, 'd ', 'bash', 1, 1, '2013-02-13 08:32:03'),
(160, 32, 'e', 'ruby', 1, 1, '2013-02-13 08:32:03'),
(161, 33, 'a', 'bejo', 1, 1, '2013-02-13 08:32:03'),
(162, 33, 'b', 'tejo', 1, 1, '2013-02-13 08:32:03'),
(163, 33, 'c', 'dejo', 1, 1, '2013-02-13 08:32:03'),
(164, 33, 'd ', 'pejo', 1, 1, '2013-02-13 08:32:03'),
(165, 33, 'e', 'kejo', 1, 1, '2013-02-13 08:32:03'),
(166, 34, 'a', 'asus', 1, 1, '2013-02-13 08:32:03'),
(167, 34, 'b', 'toshiba', 1, 1, '2013-02-13 08:32:03'),
(168, 34, 'c', 'advan', 1, 1, '2013-02-13 08:32:03'),
(169, 34, 'd ', 'acer', 1, 1, '2013-02-13 08:32:03'),
(170, 34, 'e', 'samsung', 1, 1, '2013-02-13 08:32:03'),
(171, 35, 'a', 'samsung', 1, 1, '2013-02-13 08:32:03'),
(172, 35, 'b', 'htc', 1, 1, '2013-02-13 08:32:03'),
(173, 35, 'c', 'blackberry', 1, 1, '2013-02-13 08:32:03'),
(174, 35, 'd ', 'lg', 1, 1, '2013-02-13 08:32:03'),
(175, 35, 'e', 'nokia', 1, 1, '2013-02-13 08:32:03'),
(176, 36, 'a', 'vabel', 1, 1, '2013-02-13 08:32:03'),
(177, 36, 'b', 'fabel', 1, 1, '2013-02-13 08:32:03'),
(178, 36, 'c', 'pabel', 1, 1, '2013-02-13 08:32:03'),
(179, 36, 'd ', 'tabel', 1, 1, '2013-02-13 08:32:03'),
(180, 36, 'e', 'kabel', 1, 1, '2013-02-13 08:32:03'),
(181, 37, 'a', 'python', 1, 1, '2013-02-13 08:32:03'),
(182, 37, 'b', 'java', 1, 1, '2013-02-13 08:32:03'),
(183, 37, 'c', 'php', 1, 1, '2013-02-13 08:32:03'),
(184, 37, 'd ', 'bash', 1, 1, '2013-02-13 08:32:03'),
(185, 37, 'e', 'ruby', 1, 1, '2013-02-13 08:32:03'),
(186, 38, 'a', 'bejo', 1, 1, '2013-02-13 08:32:04'),
(187, 38, 'b', 'tejo', 1, 1, '2013-02-13 08:32:04'),
(188, 38, 'c', 'dejo', 1, 1, '2013-02-13 08:32:04'),
(189, 38, 'd ', 'pejo', 1, 1, '2013-02-13 08:32:04'),
(190, 38, 'e', 'kejo', 1, 1, '2013-02-13 08:32:04'),
(191, 39, 'a', 'asus', 1, 1, '2013-02-13 08:32:04'),
(192, 39, 'b', 'toshiba', 1, 1, '2013-02-13 08:32:04'),
(193, 39, 'c', 'advan', 1, 1, '2013-02-13 08:32:04'),
(194, 39, 'd ', 'acer', 1, 1, '2013-02-13 08:32:04'),
(195, 39, 'e', 'samsung', 1, 1, '2013-02-13 08:32:04'),
(196, 40, 'a', 'samsung', 1, 1, '2013-02-13 08:32:04'),
(197, 40, 'b', 'htc', 1, 1, '2013-02-13 08:32:04'),
(198, 40, 'c', 'blackberry', 1, 1, '2013-02-13 08:32:04'),
(199, 40, 'd ', 'lg', 1, 1, '2013-02-13 08:32:04'),
(200, 40, 'e', 'nokia', 1, 1, '2013-02-13 08:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_file`
--

CREATE TABLE IF NOT EXISTS `quiz_file` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_quiz` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `length_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quiz_file`
--

INSERT INTO `quiz_file` (`id_quiz`, `user_id`, `file_quiz`, `title`, `description`, `password`, `start_time`, `end_time`, `length_time`, `status`, `deleted`, `date`) VALUES
(1, 2, 'quiz_1.xls', 'UAS Praktikum Sistem Operasi', 'Bejo Gantengs', 'bejos', '2013-02-13 15:10:00', '2013-02-16 15:15:00', 120, 1, 0, '2013-02-20 05:44:41'),
(2, 2, 'quiz_2.xls', 'Ganteng', 'Sekali', 'ahaha', '2003-01-01 16:20:00', '2003-01-01 10:45:00', 60, 1, 1, '2013-02-13 05:18:11'),
(3, 2, 'quiz_3.xls', 'Kuis - 1 Pemrograman Dasar', 'Semoga berhasil yeaaaaahhhhh', 'dadang', '2013-02-05 08:10:00', '2013-02-14 14:40:00', 120, 1, 0, '2013-02-20 05:44:52'),
(4, 2, 'quiz_4.xls', 'taufik', 'sulaeman', '', '2013-02-07 00:00:00', '2013-02-14 00:00:00', 0, 1, 1, '2013-02-13 10:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE IF NOT EXISTS `quiz_result` (
  `id_result` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id_result`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id_result`, `user_id`, `course_id`, `quiz_id`, `score`, `status`, `start_time`, `end_time`) VALUES
(1, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 1, 0, 0, 0, '2013-02-15 17:55:00', '2013-02-15 19:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_soal`
--

CREATE TABLE IF NOT EXISTS `quiz_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `quiz_soal`
--

INSERT INTO `quiz_soal` (`id_soal`, `quiz_id`, `soal`, `answer`, `status`, `deleted`, `date`) VALUES
(1, 1, 'proyek e learning unpad terbaru ...', 'd', 1, 0, '2013-02-20 05:44:40'),
(2, 1, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 0, '2013-02-20 05:44:40'),
(3, 1, 'siapakah yang membuat script ini', 'd', 1, 0, '2013-02-20 05:44:40'),
(4, 1, 'merk laptop saya ? ', 'd', 1, 0, '2013-02-20 05:44:40'),
(5, 1, 'merk handphone saya', 'd', 1, 0, '2013-02-20 05:44:40'),
(6, 1, 'proyek e learning unpad terbaru ...', 'd', 1, 0, '2013-02-20 05:44:41'),
(7, 1, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 0, '2013-02-20 05:44:41'),
(8, 1, 'siapakah yang membuat script ini', 'd', 1, 0, '2013-02-20 05:44:41'),
(9, 1, 'merk laptop saya ? ', 'd', 1, 0, '2013-02-20 05:44:41'),
(10, 1, 'merk handphone saya', 'd', 1, 0, '2013-02-20 05:44:41'),
(11, 2, 'proyek e learning unpad terbaru ...', 'd', 1, 1, '2013-02-13 00:07:26'),
(12, 2, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 1, '2013-02-13 00:07:26'),
(13, 2, 'siapakah yang membuat script ini', 'd', 1, 1, '2013-02-13 00:07:27'),
(14, 2, 'merk laptop saya ? ', 'd', 1, 1, '2013-02-13 00:07:27'),
(15, 2, 'merk handphone saya', 'd', 1, 1, '2013-02-13 00:07:27'),
(16, 2, 'proyek e learning unpad terbaru ...', 'd', 1, 1, '2013-02-13 00:07:28'),
(17, 2, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 1, '2013-02-13 00:07:28'),
(18, 2, 'siapakah yang membuat script ini', 'd', 1, 1, '2013-02-13 00:07:28'),
(19, 2, 'merk laptop saya ? ', 'd', 1, 1, '2013-02-13 00:07:28'),
(20, 2, 'merk handphone saya', 'd', 1, 1, '2013-02-13 00:07:28'),
(21, 3, 'proyek e learning unpad terbaru ...', 'd', 1, 0, '2013-02-20 05:44:50'),
(22, 3, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 0, '2013-02-20 05:44:50'),
(23, 3, 'siapakah yang membuat script ini', 'd', 1, 0, '2013-02-20 05:44:51'),
(24, 3, 'merk laptop saya ? ', 'd', 1, 0, '2013-02-20 05:44:51'),
(25, 3, 'merk handphone saya', 'd', 1, 0, '2013-02-20 05:44:51'),
(26, 3, 'proyek e learning unpad terbaru ...', 'd', 1, 0, '2013-02-20 05:44:51'),
(27, 3, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 0, '2013-02-20 05:44:51'),
(28, 3, 'siapakah yang membuat script ini', 'd', 1, 0, '2013-02-20 05:44:52'),
(29, 3, 'merk laptop saya ? ', 'd', 1, 0, '2013-02-20 05:44:52'),
(30, 3, 'merk handphone saya', 'd', 1, 0, '2013-02-20 05:44:52'),
(31, 4, 'proyek e learning unpad terbaru ...', 'd', 1, 1, '2013-02-13 08:32:02'),
(32, 4, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 1, '2013-02-13 08:32:02'),
(33, 4, 'siapakah yang membuat script ini', 'd', 1, 1, '2013-02-13 08:32:03'),
(34, 4, 'merk laptop saya ? ', 'd', 1, 1, '2013-02-13 08:32:03'),
(35, 4, 'merk handphone saya', 'd', 1, 1, '2013-02-13 08:32:03'),
(36, 4, 'proyek e learning unpad terbaru ...', 'd', 1, 1, '2013-02-13 08:32:03'),
(37, 4, 'bahasa pemrograman yang dipakai kang taufik', 'd', 1, 1, '2013-02-13 08:32:03'),
(38, 4, 'siapakah yang membuat script ini', 'd', 1, 1, '2013-02-13 08:32:03'),
(39, 4, 'merk laptop saya ? ', 'd', 1, 1, '2013-02-13 08:32:04'),
(40, 4, 'merk handphone saya', 'd', 1, 1, '2013-02-13 08:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic`, `status`) VALUES
(1, 'Biology & Life Science', 5),
(2, 'Business & Management', 5),
(3, 'Computer Science: Artificial Intelligence, Robotics, Vision', 5),
(4, 'Computes Science: Programming & Software Engineering ', 5),
(5, 'Computer Science: System, Security, Networking', 5),
(6, 'Computer Science: Theory', 5),
(7, 'Econimics & Finance', 5),
(8, 'Education', 5),
(9, 'Electrical and Materials Engineering', 5),
(10, 'Food and Nutrition', 5),
(11, 'Health and Society & Medical Ethics', 5),
(12, 'Humanities ', 5),
(13, 'Information, Technology, and Design', 5),
(14, 'Law', 5),
(15, 'Mathematics', 5),
(16, 'Medicine', 5),
(17, 'Music, Film, and Audio Engineering', 5),
(18, 'Physical & Earth Sciences', 5),
(19, 'Social Sciences', 5),
(20, 'Statistics, Data Analysis, and Scientific Computing', 5),
(21, 'Matematika', 3),
(22, 'Fisika', 3),
(23, 'Kimia', 3),
(24, 'Biologi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `profic`) VALUES
(1, '\0\0', 'taufiksu', '2d7e0da685361e165cb545d6c1b9be0a906dfb9e', NULL, 'taufiksu@gmail.com', NULL, NULL, NULL, NULL, 1353901146, 1361316017, 1, 'administrator', 'sistem', '089655985934', ''),
(2, '\0\0', 'elearning', '3f8e4794cbca211411575dbdaf087c3b89da8572', NULL, 'elearning@unpad.ac.id', NULL, NULL, NULL, NULL, 1353905381, 1361854020, 1, 'UPT', 'Elearning', '022-2533833', 'HomePage_Registration.jpg'),
(3, '\0\0', 'gilangdrg', '3f8e4794cbca211411575dbdaf087c3b89da8572', NULL, 'gilang.drg@unpad.ac.id', NULL, NULL, NULL, NULL, 1353905381, 1360134240, 1, 'Gilang', 'Yubiliana', '08157007021', ''),
(4, 'o��\r', 'jimho_obing', 'f91a05412591cf3e900d85ebf2bdfed7540aa63e', NULL, 'jimho.obing@gmail.com', NULL, NULL, NULL, NULL, 1360822918, 1361853960, 1, NULL, NULL, NULL, 'Kururu_sees_a_loser_by_Archwig.jpg'),
(5, 'v`ۑ', 'upixsule', '2577824f19105d133733cee3156eba70c670e9fb', NULL, 'upix_sule@yahoo.com', NULL, NULL, NULL, NULL, 1360822961, 1360822980, 1, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id_usermeta` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `information` text NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_usermeta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id_usermeta`, `user_id`, `information`, `type`) VALUES
(1, 1, '0', 1),
(2, 1, '0', 2),
(3, 1, '0', 3),
(4, 1, '0', 4),
(5, 1, '0', 5),
(6, 1, '0', 6),
(7, 2, 'Young boyz with inovation and exploration', 1),
(8, 2, 'Basis Data\n\nSistem Basis Data\n\nRekayasa Perangkat Lunak\n\nPemrograman Internet\n', 2),
(9, 2, 'DMS - Social Media For Education (http://indoschool.org)\n\nSM - Social Media For Education (http://npaperbox.com)\n', 3),
(10, 2, 'ICMT - IMS User Self Registration Simulation in IMS Test Bed A Lesson Learnt From the Integration between Open Source IMS Core, Openfire XMPP Server and Spark IM Client David Gunawan, Angkoso Suryocahyono, Angga Permana and Taufik Sulaeman\n\nIPB - DAMS Paper (Institut Pertanian Bogor)\n\nUNJANI - DAMS Paper (Universitas Jendral Ahmad Yani)\n', 4),
(11, 2, 'Basis Data\n\nSistem Basis Data\n\nRekayasa Perangkat Lunak\n\nPemrograman Internet\n', 5),
(12, 2, 'SMAN 1 Serang\n\nIlmu Komputer Universitas Pendidikan Indonesia', 6),
(13, 3, '-', 1),
(14, 3, '-', 2),
(15, 3, '-', 3),
(16, 3, '-', 4),
(17, 3, '-', 5),
(18, 3, '-', 6),
(20, 6, '', 1),
(21, 6, '', 2),
(22, 6, '', 3),
(23, 6, '', 4),
(24, 6, '', 5),
(25, 6, '', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
