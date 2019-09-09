-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2019 at 05:27 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eik`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `m_code` int(225) NOT NULL,
  `s_code` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `m_code`, `s_code`, `name`) VALUES
(1, 1, 1, 'Anuradhapura'),
(2, 1, 2, 'Galnewa'),
(3, 1, 3, 'Horowpatana'),
(4, 1, 4, 'Ipalogama'),
(5, 1, 5, 'Kahatagasdigiliya'),
(6, 1, 6, 'Kebithigollewa'),
(7, 1, 7, 'Kekirawa'),
(8, 1, 8, 'Mahawilachchiya'),
(9, 1, 9, 'Medawachchiya'),
(10, 1, 10, 'Mihintale'),
(11, 1, 11, 'Nachchaduwa'),
(12, 1, 12, 'Nochchiyagama'),
(13, 1, 13, 'Nuwaragam Palatha'),
(14, 1, 14, 'Padawiya'),
(15, 1, 15, 'Palagama'),
(16, 1, 16, 'Palugaswewa'),
(17, 1, 17, 'Rajanganaya'),
(18, 1, 18, 'Rambewa'),
(19, 1, 19, 'Ritigala'),
(20, 1, 20, 'Thambuttegama'),
(21, 1, 21, 'Thirappane'),
(22, 2, 1, 'Addalachchenai'),
(23, 2, 2, 'Akkaraipattu'),
(24, 2, 3, 'Alayadiwembu'),
(25, 2, 4, 'Ampara'),
(26, 2, 5, 'Digawapiya'),
(27, 2, 6, 'Dehiattakandiya'),
(28, 2, 7, 'Eragama'),
(29, 2, 8, 'Kalmunai'),
(30, 2, 9, 'Karativu'),
(31, 2, 10, 'Lahugala'),
(32, 2, 11, 'Mahaoya'),
(33, 2, 12, 'Navithanveli'),
(34, 2, 13, 'Ninthavur'),
(35, 2, 14, 'Padiyathalawa'),
(36, 2, 15, 'Pothuvil'),
(37, 2, 16, 'Sainthamarathu'),
(38, 2, 17, 'Samanthurai'),
(39, 2, 18, 'Tampitiya'),
(40, 2, 19, 'Uhana'),
(41, 3, 1, 'Eravur'),
(42, 3, 2, 'Kattankudy'),
(43, 3, 3, 'Thapavil'),
(44, 3, 4, 'Manmunai'),
(45, 3, 5, 'Batticaloa'),
(46, 4, 1, 'Ambalantota'),
(47, 4, 2, 'Angunakolapelessa'),
(48, 4, 3, 'Beliatta'),
(49, 4, 4, 'Hambantota'),
(50, 4, 5, 'Katuwana'),
(51, 4, 6, 'Lunugamwehera'),
(52, 4, 7, 'Yala'),
(53, 4, 8, 'Sooriyawewa'),
(54, 4, 9, 'Tangalla'),
(55, 4, 10, 'Thissamaharama'),
(56, 4, 11, 'Bundala'),
(57, 4, 12, 'Weeraketiya'),
(58, 5, 1, 'Galge'),
(59, 5, 2, 'Mauara'),
(60, 5, 3, 'Buttala'),
(61, 5, 4, 'Kataragama'),
(62, 5, 5, 'Madulla'),
(63, 5, 6, 'Gal Kotu Kanda'),
(64, 5, 7, 'Monaragala'),
(65, 5, 8, 'Sevanagala'),
(66, 5, 9, 'Sirinandapura'),
(67, 5, 10, 'Thanamalwila'),
(68, 5, 11, 'Hambegamuwa'),
(69, 6, 1, 'Madhu'),
(70, 6, 2, 'Mannar'),
(71, 6, 3, 'Manthai West'),
(72, 6, 4, 'Musalai'),
(73, 7, 1, 'Manthai East'),
(74, 7, 2, 'Maritimepattu'),
(75, 7, 3, 'Oddusuddan'),
(76, 7, 4, 'Puthukudiyirippu'),
(77, 7, 5, 'Thunukkai'),
(78, 7, 6, 'Mulathive'),
(79, 8, 1, 'Giritale'),
(80, 8, 2, 'Polonnaruwa'),
(81, 8, 3, 'Maduru Oya'),
(82, 8, 4, 'Minneriya'),
(83, 8, 5, 'Madirigiriya'),
(84, 8, 6, 'Thamankaduwa'),
(85, 8, 7, 'Welikanda'),
(86, 9, 1, 'Vanathawilluwa'),
(87, 9, 2, 'Thabbowa'),
(88, 10, 1, 'Adam\'s Peak'),
(89, 10, 2, 'Udawalawe'),
(90, 11, 1, 'Trincomalee'),
(91, 11, 2, 'Seruvavila');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `code` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `code`, `name`) VALUES
(1, 1, 'Anuradhapura'),
(2, 2, 'Ampara'),
(3, 3, 'Batticaloa'),
(4, 4, 'Hambantota'),
(5, 5, 'Monaragala'),
(6, 6, 'Mannar'),
(7, 7, 'Mulathivu'),
(8, 8, 'Polonnaruwa'),
(9, 9, 'Puttalama'),
(10, 10, 'Ratnapura'),
(11, 11, 'Trincomalee');

-- --------------------------------------------------------

--
-- Table structure for table `elephants`
--

DROP TABLE IF EXISTS `elephants`;
CREATE TABLE IF NOT EXISTS `elephants` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `e_age` varchar(225) NOT NULL,
  `e_number` varchar(225) NOT NULL,
  `e_date` varchar(225) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sel_location` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `age` varchar(225) NOT NULL,
  `es_fold_l` varchar(225) NOT NULL,
  `es_fold_r` varchar(225) NOT NULL,
  `et_fold_l` varchar(225) NOT NULL,
  `et_fold_r` varchar(225) NOT NULL,
  `e_angle_l` varchar(225) NOT NULL,
  `e_angle_r` varchar(225) NOT NULL,
  `el_shape_l` varchar(225) NOT NULL,
  `el_shape_r` varchar(225) NOT NULL,
  `el_length_l` varchar(225) NOT NULL,
  `el_length_r` varchar(225) NOT NULL,
  `e_length_l` varchar(225) NOT NULL,
  `e_length_r` varchar(225) NOT NULL,
  `e_nick_l` varchar(225) NOT NULL,
  `e_nick_r` varchar(225) NOT NULL,
  `e_tear_l` varchar(225) NOT NULL,
  `e_tear_r` varchar(225) NOT NULL,
  `e_holes_l` varchar(225) NOT NULL,
  `e_holes_r` varchar(225) NOT NULL,
  `e_depig_l` varchar(225) NOT NULL,
  `e_depig_r` varchar(225) NOT NULL,
  `h_depig_l` varchar(225) NOT NULL,
  `h_depig_r` varchar(225) NOT NULL,
  `j_depig` varchar(225) NOT NULL,
  `t_depig` varchar(225) NOT NULL,
  `j_shape` varchar(225) NOT NULL,
  `h_shape` varchar(225) NOT NULL,
  `tusks_l` varchar(225) NOT NULL,
  `tusks_r` varchar(225) NOT NULL,
  `tushes_l` varchar(225) NOT NULL,
  `tushes_r` varchar(225) NOT NULL,
  `t_length` varchar(225) NOT NULL,
  `t_brush` varchar(225) NOT NULL,
  `th_spread` varchar(225) NOT NULL,
  `th_nature` varchar(225) NOT NULL,
  `t_kink` varchar(225) NOT NULL,
  `wwl` varchar(225) NOT NULL,
  `b_shape` varchar(225) NOT NULL,
  `s_height` varchar(225) NOT NULL,
  `p_body` varchar(225) NOT NULL,
  `area` varchar(225) NOT NULL,
  `zone` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `image_front` varchar(225) NOT NULL,
  `image_back` varchar(225) NOT NULL,
  `image_left` varchar(225) NOT NULL,
  `image_right` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elephants`
--

INSERT INTO `elephants` (`id`, `name`, `e_age`, `e_number`, `e_date`, `category`, `sel_location`, `location`, `sex`, `age`, `es_fold_l`, `es_fold_r`, `et_fold_l`, `et_fold_r`, `e_angle_l`, `e_angle_r`, `el_shape_l`, `el_shape_r`, `el_length_l`, `el_length_r`, `e_length_l`, `e_length_r`, `e_nick_l`, `e_nick_r`, `e_tear_l`, `e_tear_r`, `e_holes_l`, `e_holes_r`, `e_depig_l`, `e_depig_r`, `h_depig_l`, `h_depig_r`, `j_depig`, `t_depig`, `j_shape`, `h_shape`, `tusks_l`, `tusks_r`, `tushes_l`, `tushes_r`, `t_length`, `t_brush`, `th_spread`, `th_nature`, `t_kink`, `wwl`, `b_shape`, `s_height`, `p_body`, `area`, `zone`, `longitude`, `latitude`, `image_front`, `image_back`, `image_left`, `image_right`) VALUES
(1, 'Aba', '01/02', '01', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S1L', 'T3S2R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S3R', 'T7S2L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S2L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S3', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S1', 'T25S1', 'T26S3', 'T27S2', 'T28S1', 'Thabbowa', 'Arid', '79.926805', '8.088111', 'Admin/Aba/Aba-front.jpg', 'Admin/Aba/Aba-back.jpg', 'Admin/Aba/Aba-left.jpg', 'Admin/Aba/Aba-right.jpg'),
(2, 'Ampara', '01/06', '02', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S1L', 'T3S7R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S3R', 'T7S2L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S2L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S3', 'T24S3', 'T25S1', 'T26S3', 'T27S2', 'T28S1', 'Ampara', 'Dry', '81.654628', '7.300998', 'Admin/Ampara/Ampara-front.jpg', 'Admin/Ampara/Ampara-back.jpg', 'Admin/Ampara/Ampara-left.jpg', 'Admin/Ampara/Ampara-right.jpg'),
(16, 'Horman', '04/06', '16', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S4R', 'T4S2L', 'T4S2R', 'T5S2L', 'T5S2R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S2', 'T16S2', 'T18S5', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S1', 'T23S1', 'T24S2', 'T25S3', 'T26S3', 'T27S2', 'T28S1', 'Horowpatana', 'Dry', '81.333332', '6.416665', 'Admin/Horman/Horman-front.jpg', 'Admin/Horman/Horman-back.jpg', 'Admin/Horman/Horman-left.jpg', 'Admin/Horman/Horman-right.jpg'),
(3, 'Anuradha', '03/11', '03', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S2L', 'T3S7R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S3R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S2', 'T18S1L', 'T18S1R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S2', 'T24S2', 'T25S9', 'T26S2', 'T27S2', 'T28S1', 'Anuradhapura', 'Dry', '81.749997', '7.083333', 'Admin/Anuradha/Anuradha-front.jpg', 'Admin/Anuradha/Anuradha-back.jpg', 'Admin/Anuradha/Anuradha-left.jpg', 'Admin/Anuradha/Anuradha-right.jpg'),
(4, 'Atlas', '05/00', '04', '01/09/2019', 'Wild', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S2L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S3', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S4R', 'T20S1', 'T21S4', 'T22S2', 'T23S1', 'T24S4', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Anuradhapura', 'Dry', '80.4037', '8.3114', 'Admin/Atlas/Atlas-front.jpg', 'Admin/Atlas/Atlas-back.jpg', 'Admin/Atlas/Atlas-left.jpg', 'Admin/Atlas/Atlas-right.jpg'),
(5, 'Balan', '00/07', '05', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S1', 'T3S1L', 'T3S7R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S2L', 'T6S3R', 'T7S3L', 'T7S3R', 'T8S2L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S3', 'T21S4', 'T22S3', 'T23S3', 'T24S4', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Ampara', 'Dry', '81.78554', '7.28484', 'Admin/Balan/Balan-front.jpg', 'Admin/Balan/Balan-back.jpg', 'Admin/Balan/Balan-left.jpg', 'Admin/Balan/Balan-right.jpg'),
(6, 'Banu', '00/08', '06', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S1', 'T3S1L', 'T3S6R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S2L', 'T6S2R', 'T7S3L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S1', 'T22S3', 'T23S3', 'T24S1', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Galge', 'Dry', '81.300043', '6.533461', 'Admin/Banu/Banu-front.jpg', 'Admin/Banu/Banu-back.jpg', 'Admin/Banu/Banu-left.jpg', 'Admin/Banu/Banu-right.jpg'),
(7, 'Chuti Manike', '00/09', '07', '01/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S6L', 'T3S6R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S3', 'T22S3', 'T23S3', 'T24S4', 'T25S3', 'T26S3', 'T27S1', 'T28S1', 'Mauara', 'Dry', '81.749997', '7.083333', 'Admin/Chuti Manike/Chuti manike-front.jpg', 'Admin/Chuti Manike/Chuti manike-back.jpg', 'Admin/Chuti Manike/Chuti manike-left.jpg', 'Admin/Chuti Manike/Chuti manike-right.jpg'),
(8, 'Digawapi', '05/10', '08', '01/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S6L', 'T3S6R', 'T4S3L', 'T4S3R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S5L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S4', 'T18S2L', 'T18S2R', 'T19S4L', 'T19S4R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S4', 'T25S3', 'T26S3', 'T27S2', 'T28S1', 'Digawapiya', 'Dry', '81.3', '6.53333', 'Admin/Digawapi/Digawapiya-front.jpg', 'Admin/Digawapi/Digawapiya-back.jpg', 'Admin/Digawapi/Digawapiya-left.jpg', 'Admin/Digawapi/Digawapiya-right.jpg'),
(9, 'Galpaya', '05/04', '09', '01/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S6L', 'T3S5R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S2R', 'T7S1L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S3L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S5', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S2', 'T25S1', 'T26S1', 'T27S3', 'T28S1', 'Galge', 'Dry', '81.30043', '6.533461', 'Admin/Galpaya/Galpaya-front.jpg', 'Admin/Galpaya/Galpaya-back.jpg', 'Admin/Galpaya/Galpaya-left.jpg', 'Admin/Galpaya/Galpaya-right.jpg'),
(10, 'Gadafi', '02/07', '10', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S5R', 'T4S2L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S3R', 'T7S1L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S3', 'T21S1', 'T22S3', 'T23S2', 'T24S1', 'T25S10', 'T26S3', 'T27S2', 'T28S1', 'Anuradhapura', 'Dry', '81.749947', '7.083333', 'Admin/Gadafi/Gadaphy-front.jpg', 'Admin/Gadafi/Gadaphy-back.jpg', 'Admin/Gadafi/Gadaphy-left.jpg', 'Admin/Gadafi/Gadaphy-right.jpg'),
(11, 'Gamunu', '02/00', '11', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S2R', 'T7S2L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S4', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S2', 'T21S4', 'T22S3', 'T23S1', 'T24S2', 'T25S2', 'T26S2', 'T27S2', 'T28S1', 'Giritale', 'Dry', '80.4037', '8.3114', 'Admin/Gamunu/Gamunu-front.jpg', 'Admin/Gamunu/Gamunu-back.jpg', 'Admin/Gamunu/Gamunu-left.jpg', 'Admin/Gamunu/Gamunu-right.jpg'),
(12, 'Grusha', '05/00', '12', '01/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S6L', 'T3S4R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S1R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S3', 'T18S5', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S4R', 'T20S2', 'T21S4', 'T22S1', 'T23S1', 'T24S1', 'T25S8', 'T26S3', 'T27S3', 'T28S1', 'Maduru Oya', 'Intermediate', '80.92492', '8.00236', 'Admin/Grusha/Grusa-front.jpg', 'Admin/Grusha/Grusa-back.jpg', 'Admin/Grusha/Grusa-left.jpg', 'Admin/Grusha/Grusa-right.jpg'),
(13, 'Habari', '01/00', '13', '01/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S1L', 'T3S1R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S5', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S4', 'T21S4', 'T22S1', 'T23S1', 'T24S2', 'T25S10', 'T26S3', 'T27S2', 'T28S1', 'Mauara', 'Dry', '80.95572', '6.38669', 'Admin/Habari/Habari-front.jpg', 'Admin/Habari/Habari-back.jpg', 'Admin/Habari/Habari-left.jpg', 'Admin/Habari/Habari-right.jpg'),
(14, 'Heen Mahattaya', '04/00', '14', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S2R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S2', 'T16S3', 'T18S3', 'T18S2L', 'T18S2R', 'T19S4L', 'T19S4R', 'T20S2', 'T21S4', 'T22S3', 'T23S1', 'T24S2', 'T25S9', 'T26S3', 'T27S3', 'T28S1', 'Ampara', 'Dry', '81.749997', '7.083333', 'Admin/Heen Mahattaya/Heen mahattaya-front.jpg', 'Admin/Heen Mahattaya/Heen mahattaya-back.jpg', 'Admin/Heen Mahattaya/Heen mahattaya-left.jpg', 'Admin/Heen Mahattaya/Heen mahattaya-right.jpg'),
(15, 'Herculis', '04/10', '15', '01/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S3L', 'T8S3R', 'T9S2L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S1L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S3', 'T18S2L', 'T18S2R', 'T19S4L', 'T19S4R', 'T20S1', 'T21S4', 'T22S3', 'T23S3', 'T24S4', 'T25S3', 'T26S3', 'T27S2', 'T28S1', 'Buttala', 'Intermediate', '81.24913', '6.75892', 'Admin/Herculis/Munna-front.jpg', 'Admin/Herculis/Munna-back.jpg', 'Admin/Herculis/Munna-left.jpg', 'Admin/Herculis/Munna-right.jpg'),
(17, 'Kaha Kurulla', '02/00', '17', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S3', 'T21S4', 'T22S1', 'T23S1', 'T24S2', 'T25S1', 'T26S3', 'T27S2', 'T28S1', 'Gal Kotu Kanda', 'Intermediate', '80.4037', '8.3114', 'Admin/Kaha Kurulla/KK-front.jpg', 'Admin/Kaha Kurulla/KK-back.jpg', 'Admin/Kaha Kurulla/KK-left.jpg', 'Admin/Kaha Kurulla/KK-right.jpg'),
(18, 'Kalana', '04/06', '18', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S7L', 'T3S7R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S5', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S2', 'T25S3', 'T26S3', 'T27S2', 'T28S1', 'Ritigala', 'Dry', '81.333332', '6.416665', 'Admin/Kalana/kalana-front.jpg', 'Admin/Kalana/kalana-back.jpg', 'Admin/Kalana/kalana-left.jpg', 'Admin/Kalana/kalana-right.jpg'),
(19, 'Kathari', '02/07', '19', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S6L', 'T3S3R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S2', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S2', 'T21S4', 'T22S1', 'T23S3', 'T24S2', 'T25S8', 'T26S3', 'T27S2', 'T28S1', 'Kataragama', 'Arid', '81.12016619', '6.121332848', 'Admin/Kathari/Kathari-front.jpg', 'Admin/Kathari/Kathari-back.jpg', 'Admin/Kathari/Kathari-left.jpg', 'Admin/Kathari/Kathari-right.jpg'),
(20, 'Kathrina', '00/04', '20', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S4L', 'T3S6R', 'T4S1L', 'T4S2R', 'T5S1L', 'T5S2R', 'T6S1L', 'T6S2R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S1', 'T22S3', 'T23S2', 'T24S2', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Kataragama', 'Arid', '81.25188', '6.75632', 'Admin/Kathrina/Katharina-front.jpg', 'Admin/Kathrina/Katharina-back.jpg', 'Admin/Kathrina/Katharina-left.jpg', 'Admin/Kathrina/Katharina-right.jpg'),
(21, 'Kawindi', '03/10', '21', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S3', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Hambantota', 'Arid', '80.65', '8.11667', 'Admin/Kawindi/Kawindi-front.jpg', 'Admin/Kawindi/Kawindi-back.jpg', 'Admin/Kawindi/Kawindi-left.jpg', 'Admin/Kawindi/Kawindi-right.jpg'),
(22, 'Koli', '02/06', '22', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S1L', 'T3S1R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S1R', 'T6S1L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S1R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S3', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S1', 'T21S2', 'T22S3', 'T23S3', 'T24S2', 'T25S8', 'T26S2', 'T27S2', 'T28S1', 'Thapavil', 'Dry', '80.95572', '6.38669', 'Admin/Koli/koli-front.jpg', 'Admin/Koli/koli-back.jpg', 'Admin/Koli/koli-left.jpg', 'Admin/Koli/koli-right.jpg'),
(23, 'KP', '02/00', '23', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S4L', 'T9S2R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S4', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S2', 'T22S3', 'T23S1', 'T24S4', 'T25S9', 'T26S2', 'T27S2', 'T28S1', 'Mauara', 'Dry', '81.499998', '7.749997', 'Admin/KP/KP-front.jpg', 'Admin/KP/KP-back.jpg', 'Admin/KP/KP-left.jpg', 'Admin/KP/KP-right.jpg'),
(24, 'Kumara', '01/01', '24', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S7R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S2R', 'T7S1L', 'T7S1R', 'T8S3L', 'T8S3R', 'T9S1L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S1', 'T21S4', 'T22S2', 'T23S1', 'T24S3', 'T25S8', 'T26S3', 'T27S2', 'T28S1', 'Hambegamuwa', 'Dry', '80.94787', '6.54579', 'Admin/Kumara/Kumara-front.jpg', 'Admin/Kumara/Kumara-back.jpg', 'Admin/Kumara/Kumara-left.jpg', 'Admin/Kumara/Kumara-right.jpg'),
(25, 'Kumari', '02/00', '25', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S7L', 'T3S6R', 'T4S1L', 'T4S2R', 'T5S1L', 'T5S2R', 'T6S2L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S3', 'T24S4', 'T25S10', 'T26S3', 'T27S2', 'T28S1', 'Mauara', 'Dry', '80.20424', '8.85636', 'Admin/Kumari/Kmari-front.jpg', 'Admin/Kumari/Kmari-back.jpg', 'Admin/Kumari/Kmari-left.jpg', 'Admin/Kumari/Kmari-right.jpg'),
(26, 'Madavi', '03/00', '26', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S6L', 'T3S2R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S1R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S3', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S1', 'T23S1', 'T24S4', 'T25S1', 'T26S3', 'T27S3', 'T28S1', 'Giritale', 'Dry', '80.95572', '6.38669', 'Admin/Madavi/Madawi-front.jpg', 'Admin/Madavi/Madawi-back.jpg', 'Admin/Madavi/Madawi-left.jpg', 'Admin/Madavi/Madawi-right.jpg'),
(27, 'Madu Raja', '05/00', '27', '03/09/2019', 'Wild', '', '', 'T1S1', 'T2S3', 'T3S2L', 'T3S2R', 'T4S2L', 'T4S1R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S3R', 'T7S3L', 'T7S3R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S1L', 'T12S1R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S2', 'T16S3', 'T18S4', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S1', 'T21S4', 'T22S1', 'T23S1', 'T24S4', 'T25S8', 'T26S2', 'T27S3', 'T28S1', 'Madulla', 'Dry', '80.4037', '8.3114', 'Admin/Madu Raja/Maduraja-front.jpg', 'Admin/Madu Raja/Maduraja-back.jpg', 'Admin/Madu Raja/Maduraja-left.jpg', 'Admin/Madu Raja/Maduraja-right.jpg'),
(28, 'Maduka', '01/06', '28', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S1L', 'T3S1R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S3R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S3', 'T23S1', 'T24S1', 'T25S1', 'T26S3', 'T27S2', 'T28S1', 'Anuradhapura', 'Dry', '80.8263', '8.031', 'Admin/Maduka/Maduka-front.jpg', 'Admin/Maduka/Maduka-back.jpg', 'Admin/Maduka/Maduka-left.jpg', 'Admin/Maduka/Maduka-right.jpg'),
(29, 'Madumathi', '06/00', '29', '03/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S2L', 'T3S3R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S2R', 'T6S1L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S2R', 'T9S1L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S3', 'T18S1', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S3', 'T21S4', 'T22S3', 'T23S2', 'T24S1', 'T25S9', 'T26S3', 'T27S3', 'T28S1', 'Udawalawe', 'Dry', '80.95572', '6.38669', 'Admin/Madumathi/Loku manike-front.jpg', 'Admin/Madumathi/Loku manike-back.jpg', 'Admin/Madumathi/Loku manike-left.jpg', 'Admin/Madumathi/Loku manike-right.jpg'),
(30, 'Mahasen', '04/00', '30', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S3L', 'T3S3R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S2R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S2', 'T16S3', 'T18S3', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S1', 'T21S4', 'T22S3', 'T23S3', 'T24S3', 'T25S9', 'T26S2', 'T27S3', 'T28S1', 'Minneriya', 'Dry', '80.92492', '8.00236', 'Admin/Mahasen/Mahasen-front.jpg', 'Admin/Mahasen/Mahasen-back.jpg', 'Admin/Mahasen/Mahasen-left.jpg', 'Admin/Mahasen/Mahasen-right.jpg'),
(31, 'Malindu', '03/08', '31', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S5L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S2R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S3', 'T18S3', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S3', 'T23S3', 'T24S3', 'T25S3', 'T26S3', 'T27S2', 'T28S1', 'Mauara', 'Dry', '81.53221', '7.33119', 'Admin/Malindu/Malindu-front.jpg', 'Admin/Malindu/Malindu-back.jpg', 'Admin/Malindu/Malindu-left.jpg', 'Admin/Malindu/Malindu-right.jpg'),
(32, 'Moses', '00/06', '32', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S1', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S3', 'T23S2', 'T24S4', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Giritale', 'Dry', '81.41371', '6.38847', 'Admin/Moses/Moses-front.jpg', 'Admin/Moses/Moses-back.jpg', 'Admin/Moses/Moses-left.jpg', 'Admin/Moses/Moses-right.jpg'),
(33, 'Namal', '06/07', '33', '03/09/2019', 'Wild', '', '', 'T1S1', 'T2S3', 'T3S2L', 'T3S2R', 'T4S3L', 'T4S3R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S1L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S2', 'T15S2', 'T16S3', 'T18S5', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S1', 'T21S4', 'T22S2', 'T23S1', 'T24S4', 'T25S1', 'T26S3', 'T27S3', 'T28S1', 'Ampara', 'Dry', '80.92492', '8.00236', 'Admin/Namal/Namal-front.jpg', 'Admin/Namal/Namal-back.jpg', 'Admin/Namal/Namal-left.jpg', 'Admin/Namal/Namal-right.jpg'),
(34, 'Nasi', '05/00', '34', '03/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S2L', 'T3S2R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S1L', 'T9S5R', 'T10S3L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S3', 'T23S1', 'T24S3', 'T25S1', 'T26S2', 'T27S3', 'T28S1', 'Udawalawe', 'Dry', '80.65', '8.11667', 'Admin/Nasi/Nasiya-front.jpg', 'Admin/Nasi/Nasiya-back.jpg', 'Admin/Nasi/Nasiya-left.jpg', 'Admin/Nasi/Nasiya-right.jpg'),
(35, 'Paba', '00/07', '35', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S6L', 'T3S6R', 'T4S1L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S1L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S3', 'T23S3', 'T24S4', 'T25S8', 'T26S3', 'T27S1', 'T28S1', 'Galge', 'Dry', '80.92492', '8.00236', 'Admin/Paba/paba-front.jpg', 'Admin/Paba/paba-back.jpg', 'Admin/Paba/paba-left.jpg', 'Admin/Paba/paba-right.jpg'),
(36, 'Pala', '05/06', '36', '03/09/2019', 'Wild', '', '', 'T1S1', 'T2S3', 'T3S7L', 'T3S7R', 'T4S2L', 'T4S1R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S3R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S3', 'T18S3', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S2', 'T23S3', 'T24S2', 'T25S9', 'T26S3', 'T27S3', 'T28S1', 'Yala', 'Arid', '80.8833298', '6.4666648', 'Admin/Pala/Pala-front.jpg', 'Admin/Pala/Pala-back.jpg', 'Admin/Pala/Pala-left.jpg', 'Admin/Pala/Pala-right.jpg'),
(37, 'Pali', '00/03', '37', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S5L', 'T3S5R', 'T4S2L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S5', 'T21S4', 'T22S1', 'T23S2', 'T24S1', 'T25S1', 'T26S3', 'T27S1', 'T28S1', 'Ampara', 'Dry', '80.8833294', '6.4666644', 'Admin/Pali/Pali-front.jpg', 'Admin/Pali/Pali-back.jpg', 'Admin/Pali/Pali-left.jpg', 'Admin/Pali/Pali-right.jpg'),
(38, 'Perumal', '04/08', '38', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S3L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S3R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S3', 'T18S1', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S1', 'T21S4', 'T22S3', 'T23S3', 'T24S2', 'T25S8', 'T26S3', 'T27S2', 'T28S1', 'Ritigala', 'Dry', '81.32', '6.53334', 'Admin/Perumal/Perumal-front.jpg', 'Admin/Perumal/Perumal-back.jpg', 'Admin/Perumal/Perumal-left.jpg', 'Admin/Perumal/Perumal-right.jpg'),
(39, 'Ridma', '05/04', '39', '03/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S7L', 'T3S7R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S1R', 'T10S1L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S1', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S2', 'T22S3', 'T23S3', 'T24S3', 'T25S4', 'T26S3', 'T27S3', 'T28S1', 'Anuradhapura', 'Dry', '80.7999968', '9.2833322', 'Admin/Ridma/Ridma-front.jpg', 'Admin/Ridma/Ridma-back.jpg', 'Admin/Ridma/Ridma-left.jpg', 'Admin/Ridma/Ridma-right.jpg'),
(40, 'Rob', '00/03', '40', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S1', 'T3S7L', 'T3S6R', 'T4S1L', 'T4S1R', 'T5S2L', 'T5S2R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S1', 'T22S3', 'T23S2', 'T24S1', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Giritale', 'Dry', '81.749997', '7.083333', 'Admin/Rob/Rob-front.jpg', 'Admin/Rob/Rob-back.jpg', 'Admin/Rob/Rob-left.jpg', 'Admin/Rob/Rob-right.jpg'),
(41, 'Rubi', '06/10', '41', '03/09/2019', 'Wild', '', '', 'T1S2', 'T2S3', 'T3S6L', 'T3S3R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S2R', 'T6S3L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S5', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S2', 'T21S4', 'T22S1', 'T23S1', 'T24S4', 'T25S9', 'T26S3', 'T27S3', 'T28S1', 'Lunugamwehera', 'Arid', '80.4037', '8.3114', 'Admin/Rubi/Rubi-front.jpg', 'Admin/Rubi/Rubi-back.jpg', 'Admin/Rubi/Rubi-left.jpg', 'Admin/Rubi/Rubi-right.jpg'),
(42, 'Samara', '00/07', '42', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S1', 'T3S2L', 'T3S2R', 'T4S1L', 'T4S2R', 'T5S2L', 'T5S2R', 'T6S3L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S1L', 'T8S1R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S3', 'T23S2', 'T24S4', 'T25S9', 'T26S3', 'T27S1', 'T28S1', 'Hambantota', 'Arid', '81.0', '8.0', 'Admin/Samara/Samara-front.jpg', 'Admin/Samara/Samara-back.jpg', 'Admin/Samara/Samara-left.jpg', 'Admin/Samara/Samara-right.jpg'),
(43, 'Sera', '01/00', '43', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S5L', 'T3S5R', 'T4S2L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S2L', 'T14S1', 'T15S1', 'T16S1', 'T18S2', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S5', 'T21S4', 'T22S2', 'T23S1', 'T24S3', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Seruvavila', 'Dry', '81.749997', '7.083333', 'Admin/Sera/Sera-front.jpg', 'Admin/Sera/Sera-back.jpg', 'Admin/Sera/Sera-left.jpg', 'Admin/Sera/Sera-right.jpg'),
(44, 'Shiva', '02/06', '44', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S2L', 'T3S2R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S2L', 'T6S1R', 'T7S2L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S1L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S4', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S1', 'T21S4', 'T22S1', 'T23S3', 'T24S3', 'T25S8', 'T26S3', 'T27S2', 'T28S1', 'Mulathive', 'Dry', '81.749997', '7.083333', 'Admin/Shiva/Shiva-front.jpg', 'Admin/Shiva/Shiva-back.jpg', 'Admin/Shiva/Shiva-left.jpg', 'Admin/Shiva/Shiva-right.jpg'),
(45, 'Srimali', '04/02', '45', '03/09/2019', 'Captive', '', '', 'T1S2', 'T2S2', 'T3S6L', 'T3S2R', 'T4S1L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S1L', 'T7S1R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S3', 'T18S3', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S3', 'T24S4', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Sirinandapura', 'Intermediate', '81.1999992', '6.333332', 'Admin/Srimali/Srimali-front.jpg', 'Admin/Srimali/Srimali-back.jpg', 'Admin/Srimali/Srimali-left.jpg', 'Admin/Srimali/Srimali-right.jpg'),
(46, 'Thiwanka', '04/03', '46', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S2R', 'T6S3L', 'T6S2R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S3L', 'T19S3R', 'T20S1', 'T21S4', 'T22S3', 'T23S3', 'T24S2', 'T25S8', 'T26S3', 'T27S2', 'T28S1', 'Polonnaruwa', 'Dry', '81.1212', '6.1429', 'Admin/Thiwanka/Thiwanka-front.jpg', 'Admin/Thiwanka/Thiwanka-back.jpg', 'Admin/Thiwanka/Thiwanka-left.jpg', 'Admin/Thiwanka/Thiwanka-right.jpg'),
(47, 'Vasula', '04/00', '47', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S7L', 'T3S7R', 'T4S2L', 'T4S2R', 'T5S1L', 'T5S1R', 'T6S1L', 'T6S1R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S1L', 'T9S1R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S1R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S4', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Tampitiya', 'Dry', '81.31931', '8.37081', 'Admin/Vasula/Vasula-front.jpg', 'Admin/Vasula/Vasula-back.jpg', 'Admin/Vasula/Vasula-left.jpg', 'Admin/Vasula/Vasula-right.jpg'),
(48, 'Vibishana', '06/06', '48', '03/09/2019', 'Wild', '', '', 'T1S1', 'T2S3', 'T3S2L', 'T3S6R', 'T4S2L', 'T4S2R', 'T5S2L', 'T5S1R', 'T6S3L', 'T6S3R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S3R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S2R', 'T13S2L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S1L', 'T19S2R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S4', 'T25S9', 'T26S3', 'T27S3', 'T28S1', 'Ampara', 'Dry', '81.18716', '6.19441', 'Admin/Vibishana/Vibisiana-front.jpg', 'Admin/Vibishana/Vibisiana-back.jpg', 'Admin/Vibishana/Vibisiana-left.jpg', 'Admin/Vibishana/Vibisiana-right.jpg'),
(49, 'Vije', '02/06', '49', '03/09/2019', 'Captive', '', '', 'T1S1', 'T2S2', 'T3S6L', 'T3S6R', 'T4S2L', 'T4S1R', 'T5S1L', 'T5S1R', 'T6S3L', 'T6S3R', 'T7S2L', 'T7S2R', 'T8S2L', 'T8S2R', 'T9S5L', 'T9S5R', 'T10S5L', 'T10S5R', 'T11S7L', 'T11S7R', 'T12S2L', 'T12S2R', 'T13S1R', 'T13S1L', 'T14S1', 'T15S1', 'T16S2', 'T18S1', 'T18S2L', 'T18S2R', 'T19S2L', 'T19S2R', 'T20S2', 'T21S4', 'T22S2', 'T23S1', 'T24S1', 'T25S9', 'T26S3', 'T27S2', 'T28S1', 'Bundala', 'Arid', '81.3487', '6.8714', 'Admin/Vije/Vije-front.jpg', 'Admin/Vije/Vije-back.jpg', 'Admin/Vije/Vije-left.jpg', 'Admin/Vije/Vije-right.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `type` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `second_name` varchar(225) NOT NULL,
  `birthday` varchar(225) NOT NULL,
  `tel` varchar(225) NOT NULL,
  `nic` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `profession` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_pass` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `first_name`, `second_name`, `birthday`, `tel`, `nic`, `gender`, `email`, `profession`, `password`, `confirm_pass`) VALUES
(2, 'admin', 'Admin', 'admin', '01/01/2019', '+94110000001', '123456789v', 'male', 'admineik@gmail.com', 'undergraduate', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
