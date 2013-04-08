-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2013 at 11:31 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.18

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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('02a62d0d8c031c14d1940b97d2267575', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649823, ''),
('02afbf6c85fe28852b15d61ba195dcfe', '111.223.252.11', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:19.0) G', 1363804672, 'a:5:{s:8:"identity";s:6:"fpmipa";s:8:"username";s:6:"fpmipa";s:5:"email";s:18:"taufiksu@gmail.com";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1363804640";}'),
('02d60b4241a872b1c367e46a2d1aa2ea', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650247, ''),
('060ec470315a01e763f7f8a6b8fc42ff', '180.76.5.14', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://', 1362824942, ''),
('06be30b1421d1bb459ff12d1482d2061', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362709523, ''),
('06fc2fb61119ac1eddac79118083d0bc', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649631, ''),
('09a7a2350065e6c836839ea964be5f7b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649783, ''),
('0a424db5ddbc17357797f4f5aab08eb2', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650090, ''),
('0a958ec536b9a8fdf29b6a47c59f6ef7', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649742, ''),
('0dd2e26b4ff9f612ef8f7119d1e8f40e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362636690, ''),
('1020e55c8ba36d282a565b11d2990556', '173.252.101.115', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362667647, ''),
('1051e9c43f96935c24e8f5875684bcc2', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649810, ''),
('10abfb31d87c33fa6a3cfe58ac47cc93', '173.252.101.115', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362667647, ''),
('10efbe1a6386d8ece564b5933c501b13', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649641, ''),
('11020251ae366dddd5f6b329d417a57d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650105, ''),
('135e83e9dbe98f7c8fd0b0cbf62efcb2', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649698, ''),
('143a68f38f203c7355a2a5e0745e176c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649685, ''),
('1556880038a384783b04394ee3a08585', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649510, ''),
('155962bba2e8d5679bbf5384468885ff', '202.150.151.82', 'Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/201001', 1362733247, ''),
('1588fd5cf1cbcd73fac242580dab9a4a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649587, ''),
('19621d83a19443d78bc41f8b947920e9', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650402, ''),
('199fef7657444a1616d812375ed8346b', '180.253.108.29', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (K', 1362742496, ''),
('1a79a04ed04116a26b719385ca41c7e4', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649682, ''),
('1caca5d68a496cb5d47ece561d84f921', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362631304, ''),
('1e606a17f00d8194359cfa3bab43e8a1', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650261, ''),
('1ebce2c7b877991c7393932663e5680d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649725, ''),
('1ec38f1e553d182899cc9a8f728e20b0', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362709556, ''),
('1ffbe370137187ff1927551f135a30c6', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650082, ''),
('206081f503dee12e2b83810e3b418a1a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649665, ''),
('235daff15e0655717dcc1df005b10b57', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650360, ''),
('238a2054a40d045325c933f3ff331d60', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649591, ''),
('239c2bd6967a85d0511892aac7588d8e', '173.252.101.114', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362667645, ''),
('2614fc29c6944e3496908f77f76e0075', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650681, ''),
('263ceae4221e4ade59335517b3e140a7', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650055, ''),
('264fb08d59fa859887228bec1110111b', '180.245.138.98', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) App', 1362667763, ''),
('2698e0b4e7209e1c0b1ecb9c9a13c3a5', '36.72.116.170', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (K', 1362893737, ''),
('26e23ba15f2c30635b2508c3f1a67c3e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649813, ''),
('2766045bcaf8f1497546706a33e0b178', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650374, ''),
('2992de550373b317e01c09302ed1d2ec', '10.38.0.63', 'Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/201001', 1362717169, ''),
('2c39f78b0831006a6c86cd4f82ceb037', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649799, ''),
('31258a9aad3d50bc4b2be4a7f0adef41', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650353, ''),
('317611cf3ace3a23a44e9dca6036a15a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649527, ''),
('31d535bbe51e4f675225048f957e2795', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650134, ''),
('32f7cca3a9e783c35069b73b5a8e550b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649550, ''),
('33ffc23eb9e877eff864391de3762d48', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649486, ''),
('34a558735cc5bbef6c69a5bcc25701b9', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362709657, ''),
('351ada0dea26330a4348696dfd9e3f68', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649762, ''),
('364fd698386a5a9619b10b7c7ed8fcfb', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649803, ''),
('36683357d8b86b0d9c31766c3f265db4', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649675, ''),
('36ef3f4c182745fa27c0a0615954c23d', '66.249.77.120', 'SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuratio', 1363834424, ''),
('3732f81afdceed55c18d5a57b84ed5b8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650317, ''),
('37bd9b37f3a9dec0d71ea20cb5f29628', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649567, ''),
('3869aa3dc69fb2c9d32649a6e26a8ea5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650650, ''),
('392dfa51bd1718b7e7c52b58a63cde60', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649658, ''),
('3ac8d87af215bc256c06c2b71a5b422c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649503, ''),
('3bb8930ff77df4096fb8d9db757d0716', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649931, ''),
('3d3f7f60c8b6d119be54856ae9c7dbe5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649773, ''),
('405f2c17148fa620c493596233559b4d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649624, ''),
('415e7898cb798563ebcf6a33432d06ee', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649816, ''),
('43371612414923ef06508d70b659d98d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649547, ''),
('449839313138af0805f1926731909d9e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650417, ''),
('45b67a0024c52bd53740a24c44a092da', '111.223.252.11', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1363827531, 'a:5:{s:8:"identity";s:6:"fpmipa";s:8:"username";s:6:"fpmipa";s:5:"email";s:18:"taufiksu@gmail.com";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1363821949";}'),
('46b5e75764b51f57fd418464e0ee7097', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649544, ''),
('47102812eab0a53e57cf465dd40f4e08', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649608, ''),
('475daeee436ec4aa34fbb67670d598bf', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650332, ''),
('488c4768c1fc8015a260b813d95fec14', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650000, ''),
('4a706353e33fa5894fa54973d8140b11', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650665, ''),
('4aae0a970e6dd3c7e831caa4ee12df09', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649520, ''),
('4ae8bf77cb2ce7a8f03db8ab8f153534', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649597, ''),
('4b4b06fc414d72da6276c271a9e3e0ac', '10.38.0.159', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) App', 1362629742, ''),
('4caa0d3b3169bcce955d4e77d8dedab0', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650163, ''),
('4e03c44383f573d521b9287be1f7e709', '173.252.100.118', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362910205, ''),
('4f0c634cdc2578aa591f4660f2059dae', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649554, ''),
('4ffb8cb3f91be4ab190b5a37224f9ee5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649719, ''),
('52341786338409e740ba88fe298e5412', '173.252.101.117', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362739580, ''),
('52f82adfce86b018b8c57321459022c6', '103.23.244.250', 'Mozilla/5.0 (X11; Linux x86_64; rv:15.0) Gecko/201', 1362647799, ''),
('5368a6583fea6ba161ca762b751ab2c7', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649820, ''),
('543c292786b95d29e125dfe7371c373e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649678, ''),
('54684e21f2d1319a898cc1f290f4bfb5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649621, ''),
('54b4956c59d9f5968e5a24d69678fd94', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650268, ''),
('54ff46f2073ced3a0e25e02c17f84bfb', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649668, ''),
('5769ee4b58c4d309363ffe769869f296', '65.55.213.68', 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)', 1362646257, ''),
('58f7352235a531e91976fc86f3aa586d', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650296, ''),
('5a3ca4d6733c31ae70e61312f5685d1f', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649601, ''),
('5ac522663ae34211f7acf2890be931a2', '66.249.77.189', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362827288, ''),
('5b608e97b8205d77d1d40ba0ec17f214', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650275, ''),
('5bf7bd0d36a8e72566befb6096dc5674', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650141, ''),
('5d3615b23d7d0b947795126fd5d14877', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649651, ''),
('5d4350a2d86e12b3dab00a126b982c4f', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649564, ''),
('5dd6576b84f25b4f298edd9b0095331a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1362966868, 'a:5:{s:8:"identity";s:8:"taufiksu";s:8:"username";s:8:"taufiksu";s:5:"email";s:18:"taufiksu@gmail.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1362313764";}'),
('5e82f0f1e48f71e1dd32e9fbbc743270', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649648, ''),
('5ebbead4d3e772b54ab68ff2a639bf1d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649715, ''),
('5fd7224dd0bd414b60ad69919540a88b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649759, ''),
('621c3aa991779594f246474cf957b2fc', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649574, ''),
('6336ecc38b713c2499d52000d550940f', '180.253.142.162', 'Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/201001', 1362657101, ''),
('63eebd8fe5e3c96b9fbc123d4cad8399', '65.55.213.68', 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)', 1362646223, ''),
('63fd06b822bc910283aed7c938322c52', '54.242.228.190', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en', 1362742613, ''),
('6421dd4b6c27488c6dabbde06fb4c84c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649735, ''),
('650328b9951b03751682bc0de0de4c11', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649749, ''),
('65ff567787da7bd36b5b6666bf2abe9a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650098, ''),
('66a436b0622db875047767ab066bb002', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649695, ''),
('6731319fc73a4ecefdf1772850a70596', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650647, ''),
('676b61fb649b62207c1deac453e4171c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362648229, ''),
('69afee9b20f006762357db780df4f3f6', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362712289, ''),
('6a4ecf57939d44b21a878d9919f8d672', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650127, ''),
('6b253bd09905e042b4fa73bad7431c5d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649571, ''),
('6bd40a8715721c38d08c0af0e1fb70f6', '180.214.233.69', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap', 1362812336, 'a:5:{s:8:"identity";s:9:"elearning";s:8:"username";s:9:"elearning";s:5:"email";s:21:"elearning@unpad.ac.id";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1362716158";}'),
('6c53b0639e5c4093f2e0d39881658de3', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649604, ''),
('6d8e48bbb89e4e1ec197e96e23241ce8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649981, ''),
('7068e371e90f4de5bf49ea775d06cc49', '65.52.0.56', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)', 1362739616, ''),
('73be6aa8e7e8a4446c7d7b0db83b0ab1', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649523, ''),
('75d4636650c86d60ce7e3fd0d26eac34', '180.253.217.137', 'Mozilla/5.0 (iPad; U; CPU iPhone OS 6_1_2 like Mac', 1362882115, ''),
('7855917e1a37e0c2afe4aebbd0fbdc82', '36.72.122.147', 'Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/201001', 1362933167, ''),
('790fd0a7f265be0862540859bb0bf98d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649611, ''),
('7b9e76b147adbfac4f9f813d0fbfe2ba', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649769, ''),
('7bc097c74340870a858f349f85c652da', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362709522, ''),
('7d662fc2cb20fbf24233c257615a1517', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650191, ''),
('7e0400b8522e46e4666b28b7b879b828', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649540, ''),
('7ee24d50fc5ba5a2f09c87dfc1d78b00', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362634896, ''),
('818257e3e491ca950d5f7181698c2e19', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649752, ''),
('81c19ee7509980e42d2b55e4a786533a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650156, ''),
('822ec37f8bae4df1eff01550a2f37da1', '65.55.213.68', 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)', 1362905788, ''),
('8431c6ffc6159dd9832f02f6482e1f73', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650148, ''),
('84546c2e9e445b977bdb923ae5cbe435', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362633168, ''),
('847ba998f533b64cdab386671edaa77d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649507, ''),
('84b73f7949bb3aa42b43dff353cbd1d9', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650044, ''),
('84e866707e61f23feb8a0a06cfaeff59', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650426, ''),
('852f31ea657e2f446578e91e1c723b50', '111.223.252.11', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.22', 1363827331, 'a:5:{s:8:"identity";s:8:"taufiksu";s:8:"username";s:8:"taufiksu";s:5:"email";s:18:"taufiksu@gmail.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1363822094";}'),
('858cda141c197c0a673c9c204a4e764d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1363780408, ''),
('85c7926fcb1ed1adcf7876dffe78253f', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649776, ''),
('86a1a9990fae4dff448fd733153e5adc', '65.55.213.68', 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)', 1362849513, ''),
('870dc05db7f116744214bf1e6a2e83d7', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649634, ''),
('89793897f06ac49b432b6a6d6622d655', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649628, ''),
('8b14a6e3a77292c46fe1b426d715a7a0', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649484, ''),
('8b5df493d16afaf73714daea6a51105e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650388, ''),
('8b94afecb178bc73ce6569bf6442b260', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649533, ''),
('8bc512dffbc516a9f42075b5157c2da2', '112.215.66.83', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1362782567, ''),
('8cd0ba123142c33af4294394494facd6', '173.252.101.115', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362667647, ''),
('8e93f698bd57fd76f98bb7699b14db8c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649577, ''),
('8f6137870c756a41a0f2d51b097871da', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649557, ''),
('8f6c830d18190179b03ee9fd4f4d94f0', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650282, ''),
('91292fdb8b33df67efa90239786655a8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649500, ''),
('9141c3a0b0aa4380a09a81738a7b4ef2', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649766, ''),
('91b5777e704ab97dfb46f7c976c4d3cc', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650600, ''),
('91d59768b0cccd82950e8e68f1e6f9f3', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649655, ''),
('923ba2649df1b8d551d561407f40109a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649645, ''),
('927ff75aec1e4723f6832983fa2f9c9a', '10.38.0.49', 'Mozilla/5.0 (Windows NT 6.1; rv:10.0) Gecko/201001', 1362708965, 'a:5:{s:8:"identity";s:9:"iramirawa";s:8:"username";s:9:"iramirawa";s:5:"email";s:19:"iramirawa@gmail.com";s:7:"user_id";s:2:"16";s:14:"old_last_login";s:10:"1361334617";}'),
('92e9c8c4445d677df23c959670ca1af6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1363593003, ''),
('939a5075448aa38bd89e9a1532b9ec11', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650120, ''),
('944ff29129ab4355f4095abc430aaefb', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649584, ''),
('9489c7b49e35daf0efc36c755962ffda', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362712254, ''),
('95a4033edfc3e51f1d89c2765e9bdc8a', '180.76.6.231', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://', 1362650740, ''),
('97d96dbe3731d51460b3615269118caa', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650339, ''),
('9874e7e348da1c49df997d71063768d1', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650177, ''),
('9b0391b1ab55133377c30f854fd3dc92', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (K', 1362626324, 'a:5:{s:8:"identity";s:9:"elearning";s:8:"username";s:9:"elearning";s:5:"email";s:21:"elearning@unpad.ac.id";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1362593019";}'),
('9b9d674f79768920b3d8853facaefab1', '157.56.93.95', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.', 1363836434, ''),
('9c1f6612cc45d3ffb80eb71c7dbbef31', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650310, ''),
('9c6eba64c612134792127f6bf483f2b8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649513, ''),
('9e4eee3f8dd425336ab8e78fad09a392', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650065, ''),
('a07f51d3c483e647013743c045c47c9b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650017, ''),
('a1041fcd2edc18e9198b353af7bf4731', '110.136.149.142', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) Ap', 1362933693, ''),
('a1c8861075fbfa4f013593e553c29363', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650170, ''),
('a2d77f2ba76a6acaa3fcf414c9a69eb6', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649560, ''),
('a4aeb55c470b783cee5cf5c11af4419b', '54.234.159.190', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en', 1362825048, ''),
('a6917235ab673249788d9d286fc31197', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649806, ''),
('a6b329d4827d6844328492c37552cf48', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650226, ''),
('a6fdeb9ab659513d74e4c6d432545a4a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649881, ''),
('a760174fc7e930709225ca63ed187a3d', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649517, ''),
('a848ff8c96fea0020a2b348ff6a270b8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650205, ''),
('adb2d43187adaa94271d4025942b2763', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649786, ''),
('ae5878c8e1b3c59eec2b90019eefa5f3', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362709656, ''),
('af77d944fca26881ac3d35d2a0a1114e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649490, ''),
('b10381722a15bc65e7f7458a80e4a868', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649581, ''),
('b24511d848a47528b5689b6363303e56', '107.22.43.124', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; en', 1362962877, ''),
('b3168117c28fec40445aaa4f975437f6', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650240, ''),
('b3c1562a6c98993cdde9cf524c2987fb', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650617, ''),
('b51b62bac81017fb7c9cd831a599d3f4', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649732, ''),
('b6382e1b0c1e901820f57771f1b6b9e5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650410, ''),
('b6bcc66f0a9ab17aed9df58b185f3343', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362709656, ''),
('b7edff872f980c00456d1cfab5bba0c5', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649793, ''),
('b860bd895a57ac8c394b7d85b2af9c2c', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650219, ''),
('b9586dee52828bb33b9da11e0a579fb9', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362712254, ''),
('b99d6cc5b4cf0ca216d80352eda48475', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649530, ''),
('bb6b4e23470f2f30131e58aaa9727768', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649692, ''),
('bb81e77453afebe244aee504623c5308', '173.252.101.113', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362667647, ''),
('c10a1931489f9f97753cc221730d415a', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649638, ''),
('c207690d791800a0566545454aba7a2d', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362712288, ''),
('c329ec30f66e0a17bc7e7e3cb2538596', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649705, ''),
('c4347af65edcffba459750ca8f350fc4', '10.38.0.38', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) App', 1362716140, 'a:5:{s:8:"identity";s:9:"elearning";s:8:"username";s:9:"elearning";s:5:"email";s:21:"elearning@unpad.ac.id";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1362548890";}'),
('c64055b2ba0437a095e1c3a72c7e7a74', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650289, ''),
('c66d1962b485383a22df050393311150', '10.127.8.26', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1362632275, ''),
('c837b641a8951c547aeb8f1f15cfa097', '202.150.151.82', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (K', 1362732635, ''),
('c9a82146265a3f2003f805ac32732570', '67.225.164.12', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 1362711831, ''),
('cb839dd9dc3789f06d1954c46568892d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/201001', 1362625933, 'a:5:{s:8:"identity";s:9:"elearning";s:8:"username";s:9:"elearning";s:5:"email";s:21:"elearning@unpad.ac.id";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1362589335";}'),
('cbc8afa4022b4e26f0837fdd112070dc', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650198, ''),
('cbdd209733005d2fe1130a9204b1d087', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362709523, ''),
('ccd840e51a27bcdb3e16f832bd91b375', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650367, ''),
('cd4fb4dc3360a5556f92aebc56c3f943', '69.171.234.3', 'facebookexternalhit/1.1 (+http://www.facebook.com/', 1362739117, ''),
('cde97350ed2d201b795159ee4bd2fdf8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649618, ''),
('ce8ebff5002c3d95ed8f264d42752e73', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362711832, ''),
('cffb431a7853d30f4f4e39359b4c838a', '180.214.233.80', 'Mozilla/5.0 (Linux; Android 4.1.2; GT-I8190 Build/', 1363829847, ''),
('d0d7c5c00c4b0bb966863152d75cfd78', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650395, ''),
('d22fd0b4bacdb004574b8020aad911c1', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649494, ''),
('d2fabcb8075be89b6f5b50ccbac390e7', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649789, ''),
('d3276b019fc5256de8380da5908569f5', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649722, ''),
('d37a300f62bebc6ba215d02dd66c2781', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649756, ''),
('d38595bbadc04fe1fc4ce1a45590df55', '39.216.79.177', 'Mozilla/5.0 (Windows NT 6.2; rv:19.0) Gecko/201001', 1362631614, ''),
('d584ff0dd57346f07c02cbc5d8f1eae9', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650381, ''),
('d609ab1a8306954f8e7dd189f22ea386', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650303, ''),
('d746370b91f6bb8afe70070148ba6560', '36.72.76.89', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) App', 1362802910, ''),
('d7734f67dd03ad023763961571ce60b4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1363246998, ''),
('d80b8a30341593e283b6119d5f733f1d', '157.55.35.94', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.', 1363810121, ''),
('d8bba5c511e7fc45dab46b5e18d14400', '202.150.151.82', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:19', 1362731342, ''),
('da3606dbe00c4add91a138a1cb7b9193', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650582, ''),
('da6fc826771683d08666c0ca7269185b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.22 (K', 1362624765, 'a:6:{s:8:"identity";s:9:"elearning";s:8:"username";s:9:"elearning";s:5:"email";s:21:"elearning@unpad.ac.id";s:7:"user_id";s:1:"2";s:14:"old_last_login";s:10:"1362593011";s:9:"data_quiz";a:4:{s:10:"tiket_quiz";s:3:"333";s:6:"answer";a:5:{i:122;s:1:"1";i:123;s:1:"3";i:124;s:1:"1";i:125;s:1:"4";i:126;s:1:"4";}s:8:"group_id";s:1:"3";s:7:"quiz_id";s:2:"15";}}'),
('db06c05aa3c06d062b8e50de92447f54', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649712, ''),
('db8b3d8ae28dc3c99aac4c28399f75a9', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650346, ''),
('dc3baf151239a5d2c3af9a828832c902', '111.223.255.13', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/53', 1362627077, ''),
('dd32564be1212633c7073b3318b62194', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649614, ''),
('de8a1347a1bd8328f65f86b7b01ac71f', '65.55.213.68', 'msnbot/2.0b (+http://search.msn.com/msnbot.htm)', 1362938263, ''),
('e01150ab722744bef41b3264e48e5066', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650582, ''),
('e1ae2c9ae02a8763c40b7c11376e6ebb', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650233, ''),
('e2252409fb94da5979fe4d86ed48a64e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649496, ''),
('e2ee7527837d810b1f380235b651376e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649688, ''),
('e3c2165e535b1ba18d3418f41b5683a9', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650074, ''),
('e46f7a6b8dff5e43e1d8d6fb4f2b6b0e', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649779, ''),
('e4d770d53955ae19c3ac62b37733854b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650254, ''),
('e56ec6ddf9468e605c184e2ff02fe9be', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649537, ''),
('e60cd01589c535e4ad4aeffae5f6fa81', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649796, ''),
('e6c00418633f3cf1fa65f41a19b260a8', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650679, ''),
('e71ef80cf84c415bad60ba161ded02f6', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649746, ''),
('e80da63c39c4f7b2b56ab0c2821e995a', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650113, ''),
('ecdef1e76b77321b7831bdd220c46b71', '66.249.74.45', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650212, ''),
('ecf7b7bba50519ab97a3296b6e802bf7', '125.163.48.192', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.22 (K', 1362678250, ''),
('ed462ed3302b8c13134b737679cce486', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649826, ''),
('ed67040b5108260fa62664f5ee18c441', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649672, ''),
('ee1fe49b6d084b2e7a0cc33723d36441', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649594, ''),
('ee9752400b185372c2ca39c6c240c3ae', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649709, ''),
('eecf85bcecb6f43597b0754fc8bc566b', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650324, ''),
('efbaf5920f1210e31461f374aefa51f3', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649661, ''),
('f21f782651c61173c9c182e206585bbe', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650032, ''),
('f26bca28c093ac35cf2439a100f8e096', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362712253, ''),
('f4d9edd71ed93279a2bacdb242914f80', '10.38.0.127', 'Mozilla/5.0 (Linux; U; Android 4.1.2; en-us; GT-I8', 1362722771, ''),
('f656cbd566a74362ec5f46ea538144ab', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649702, ''),
('f6c522fca5c38e78086cf316bc26266f', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649729, ''),
('fab8011ceadd592e95bf56cf7b2363ed', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362709556, ''),
('fc9797cad911d2d9dc9c07c8a5914423', '67.225.164.12', '"Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; Wi', 1362711831, ''),
('fd8649e78a1df3e94d3f4f38e2e498e0', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362649739, ''),
('fed4bac890cfb8eb8a0e3f27cf3f7092', '66.249.77.35', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://ww', 1362650184, ''),
('ffd5e6d22625601cf233b94091e3b2e2', '111.223.255.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) App', 1362641108, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `user_id`, `cover`, `title`, `description`, `file`, `size`, `ext`, `type`, `show`, `converted`, `date`) VALUES
(1, 2, 0, '2', '2', '', '', '', 1, 2, 0, '2013-03-21 01:38:33'),
(2, 2, 0, '2', '2', '', '', '', 1, 2, 0, '2013-03-21 01:38:42'),
(3, 2, 0, 'ERD', 'ERD', '', '', '', 1, 2, 0, '2013-03-21 06:26:39'),
(4, 2, 4, 'ERD', 'ERD', '4.pdf', '98.85', '.pdf', 1, 1, 0, '2013-03-21 06:27:33'),
(5, 2, 5, 'Javascript Guide', 'Author : Desrizal', '5.pdf', '456.83', '.pdf', 1, 1, 0, '2013-03-21 07:54:57');

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
(10, 2, 62, '2013-01-18 10:18:20', 0),
(12, 2, 79, '2013-01-23 16:28:30', 2),
(13, 2, 82, '2013-01-23 18:48:41', 2),
(14, 2, 98, '2013-01-25 15:09:37', 2),
(15, 2, 105, '2013-01-30 02:44:33', 2),
(16, 2, 14, '2013-01-30 12:01:37', 2),
(17, 2, 133, '2013-01-30 16:29:58', 2),
(18, 2, 134, '2013-01-30 16:37:50', 2),
(19, 2, 96, '2013-01-30 20:53:18', 2),
(20, 2, 74, '2013-02-08 11:25:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `content_category`
--

CREATE TABLE IF NOT EXISTS `content_category` (
  `id_content_category` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `content_course`
--

CREATE TABLE IF NOT EXISTS `content_course` (
  `id_content_course` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content_course`
--


-- --------------------------------------------------------

--
-- Table structure for table `content_faculty`
--

CREATE TABLE IF NOT EXISTS `content_faculty` (
  `id_content_faculty` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content_faculty`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_log`
--

INSERT INTO `content_log` (`id_content_log`, `content_id`, `user_id`, `date`, `type`, `status`) VALUES
(1, 185, 0, '2013-03-21 03:08:41', 2, 0),
(2, 113, 0, '2013-03-21 09:53:44', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_silabus`
--

CREATE TABLE IF NOT EXISTS `content_silabus` (
  `id_content_silabus` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `silabus_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_silabus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content_silabus`
--


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

--
-- Dumping data for table `content_tag`
--


-- --------------------------------------------------------

--
-- Table structure for table `content_topic`
--

CREATE TABLE IF NOT EXISTS `content_topic` (
  `id_content_topic` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_content_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `content_topic`
--


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

--
-- Dumping data for table `course`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_faculty`
--

CREATE TABLE IF NOT EXISTS `course_faculty` (
  `id_course_faculty` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id_course_faculty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_faculty`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_silabus`
--

CREATE TABLE IF NOT EXISTS `course_silabus` (
  `id_silabus` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_silabus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_silabus`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_topic`
--

CREATE TABLE IF NOT EXISTS `course_topic` (
  `id_course_topic` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_course_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course_topic`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id_faculty`, `faculty`, `short`, `parent`) VALUES
(1, 'Universitas Pendidikan Indonesia', 'UPI', 0),
(2, 'Universitas Islam Bandung', 'UNISBA', 0);

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

--
-- Dumping data for table `login_attempts`
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
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_answer_log`
--

CREATE TABLE IF NOT EXISTS `quiz_answer_log` (
  `id_quiz_answer_log` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_quiz_answer_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_answer_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_choice`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_choice`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_course`
--

CREATE TABLE IF NOT EXISTS `quiz_course` (
  `id_quiz_course` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz_course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_course`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_file`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_file`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_group`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_resource`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_result`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_soal`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_soal`
--


-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `topic`, `status`) VALUES
(1, 'Seni', 5),
(3, 'Ilmu Komputer (Kecerdasan Buatan)', 5),
(4, 'Ilmu Komputer (Sistem & Keamanan)', 5),
(5, 'Ilmu Komputer (Perangkat Lunak)', 5),
(6, 'Ilmu Komputer (Konsep & Teori)', 5),
(7, 'Biologi & Ilmu Hayati', 5),
(8, 'Kimia', 5),
(9, 'Matematika', 5),
(10, 'Fisika', 5),
(11, 'Ilmu Pengetahuan Alam', 5),
(12, 'Statistika & Analisis Data', 5),
(13, 'Bisnis & Manajemen', 5),
(14, 'Ekonomi & Keuangan', 5),
(15, 'Hukum', 5),
(16, 'Ilmu Pengetahuan Sosial', 5),
(17, 'Pendidikan', 5),
(18, 'Informasi, Teknologi dan Desain', 5),
(19, 'Kesehatan', 5),
(20, 'Obat Obatan', 5),
(21, 'Makanan dan Nutrisi', 5),
(22, 'Musik, Film, dan Audio', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `profic`) VALUES
(1, '\0\0', 'taufiksu', '4b5d73b63c29b880e8141fa278d42cca69c03e12', NULL, 'taufiksu@gmail.com', NULL, NULL, NULL, NULL, 1353901146, 1363827352, 1, 'administrator', 'sistem', '089655985934', 'web-design-cross-browser-compatibility.jpg'),
(2, 'oßü', 'fpmipa', '0d5eb36b1d80d48ecd22368949ba90a909d490ea', NULL, 'taufiksu@gmail.com', NULL, NULL, NULL, NULL, 1363804528, 1363827547, 1, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(7, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id_usermeta`, `user_id`, `information`, `type`) VALUES
(1, 1, 'Alpha', 1),
(2, 1, 'Beta', 2),
(3, 1, 'RC1', 3),
(4, 1, 'RC2', 4),
(5, 1, 'Beta', 5),
(6, 1, 'Universitas Pendidikan Indonesia', 6),
(26, 2, '', 1),
(27, 2, '', 2),
(28, 2, '', 3),
(29, 2, '', 4),
(30, 2, '', 5),
(31, 2, '', 6);
