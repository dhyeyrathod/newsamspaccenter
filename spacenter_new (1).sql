-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 08:32 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spacenter_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email_id`, `contact_number`) VALUES
(1, 'admin', 'admin123', 'admin@admin.com', '9967313968');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `fk_city_id` int(11) NOT NULL,
  `fk_country_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `excel_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `fk_city_id`, `fk_country_id`, `created_date`, `status`, `city_name`, `country_name`, `excel_code`) VALUES
(1, 'Borivali', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(2, 'Kandivali', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(3, 'Malad', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(4, 'Goregao', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(5, 'Virar', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(6, 'Nalasopara', 1, 1, '2018-09-11 17:49:28', 1, 'Mumbai', 'India', 12345),
(7, 'M G Road', 2, 1, '2018-09-11 17:49:28', 1, 'Banglore', 'India', 12345),
(8, 'Kormengala', 2, 1, '2018-09-11 17:49:28', 1, 'Banglore', 'India', 12345),
(9, 'Indranagar', 2, 1, '2018-09-11 17:49:28', 1, 'Banglore', 'India', 12345),
(10, 'J P nagar', 2, 1, '2018-09-11 17:49:28', 1, 'Banglore', 'India', 12345),
(11, 'Dwarka', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(12, 'Canought plaace', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(13, 'Naheru place', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(14, 'Saket', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(15, 'Chatrapur', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(16, 'Janak puri', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(17, 'Rajouri gardan', 3, 1, '2018-09-11 17:49:29', 1, 'Delhi', 'India', 12345),
(18, 'test', 8, 3, '2018-09-11 17:51:58', 1, 'Karachi', 'Pakistan', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `description`, `created_date`, `updated_date`, `status`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Beauty Parlours', '<p>Beautiful and gorgeous bridal&nbsp;<em>mehndi</em>&nbsp;design by kashee &#39;s&nbsp;<em>beauty parlour</em></p>\r\n', '2018-08-31 23:33:53', '0000-00-00 00:00:00', 1, '', '', ''),
(2, 'Beauty Services', '<pre>\r\nMehndi&nbsp;Works, Skin Whitening Beauty Parlor &amp; Facial Treatments Beauty Parlor Service Provider offered by Femina&nbsp;Beauty Parlour&nbsp;from Thrissur, Kerala, India.\r\n</pre>\r\n', '2018-08-31 23:38:52', '0000-00-00 00:00:00', 1, '', '', ''),
(3, 'Bridal Makeup', '<p>Mehndi Bridal Makeup&nbsp;- Get High Quality&nbsp;Makeup&nbsp;from Experienced Artists. Trusted Make-Up Artists. Celebrity&nbsp;Makeup&nbsp;Artists. Airbrush&nbsp;Makeup&nbsp;Artists. Verified Make-Up Artists. Services: Light&nbsp;Makeup, Airbrush&nbsp;Makeup, Celebrity&nbsp;Makeup, Detailed&nbsp;Makeup, Family&nbsp;Makeup, Save the Date Photography.</p>\r\n', '2018-08-31 23:39:21', '0000-00-00 00:00:00', 1, '', '', ''),
(4, 'Bridegroom Makeup', '<p>A&nbsp;bridegroom&nbsp;(often shortened to&nbsp;groom) is a man who will soon be or has recently been married. A&nbsp;bridegroom&nbsp;is typically attended by a best man and groomsmen</p>\r\n', '2018-08-31 23:39:55', '0000-00-00 00:00:00', 1, '', '', ''),
(5, 'Salons', '<p>A&nbsp;salon&nbsp;is a shop where smart, expensive clothes are sold. 3. A&nbsp;salon&nbsp;is an informal meeting of fashionable writers or artists, which is held at the house of someone who is well-known.&nbsp;Salons&nbsp;were more common in former times.</p>\r\n', '2018-08-31 23:40:27', '0000-00-00 00:00:00', 1, '', '', ''),
(7, 'Spa', '<p>A&nbsp;spa&nbsp;is a place where water with minerals in it comes out of the ground. People drink the water or go in it in order to improve their health. ...Fiuggi, a&nbsp;spa&nbsp;town famous for its water. A health&nbsp;spa&nbsp;is a kind of hotel where people go to do exercise and have special treatments in order to improve their health.</p>\r\n', '2018-08-31 23:54:41', '0000-00-00 00:00:00', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `fk_country_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_descripton` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `fk_country_id`, `created_date`, `updated_date`, `meta_title`, `meta_descripton`, `meta_keywords`, `status`, `country_name`) VALUES
(1, 'Mumbai', 1, '2018-09-10 01:16:25', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(2, 'Banglore', 1, '2018-09-10 01:16:25', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(3, 'Delhi', 1, '2018-09-10 01:16:25', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(4, 'Panjab', 1, '2018-09-10 01:16:25', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(5, 'Haiyana', 1, '2018-09-10 01:16:26', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(7, 'Rajastan', 1, '2018-09-10 01:16:26', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(8, 'Karachi', 3, '2018-09-10 01:16:26', '0000-00-00 00:00:00', '', '', '', 1, 'Pakistan'),
(9, 'Pune', 1, '2018-12-19 19:14:33', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(10, 'Chennai', 1, '2018-12-19 19:14:51', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(11, 'Kolkata', 1, '2018-12-19 19:15:06', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(12, 'Hyderabad', 1, '2018-12-19 19:15:13', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(13, 'Ahmedabad', 1, '2018-12-19 19:15:21', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(14, 'New Delhi', 1, '2018-12-19 19:15:49', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(15, 'Jaipur', 1, '2018-12-19 19:15:59', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(16, 'Chandigarh', 1, '2018-12-19 19:16:08', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(17, 'Lucknow', 1, '2018-12-19 19:16:17', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(18, 'Bhopal', 1, '2018-12-19 19:16:26', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(19, 'Surat', 1, '2018-12-19 19:16:37', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(20, 'Kochi', 1, '2018-12-19 19:16:47', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(21, 'Patna', 1, '2018-12-19 19:16:55', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(22, 'Gurugram', 1, '2018-12-19 19:17:02', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(23, 'Kanpur', 1, '2018-12-19 19:17:10', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(24, 'Agra', 1, '2018-12-19 19:17:19', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(25, 'Varanasi', 1, '2018-12-19 19:17:28', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(26, 'Allahabad', 1, '2018-12-19 19:17:36', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(27, 'Indore', 1, '2018-12-19 19:17:43', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(28, 'Visakhapatnam', 1, '2018-12-19 19:17:51', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(29, 'Thiruvananthapuram', 1, '2018-12-19 19:18:00', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(30, 'Nagpur', 1, '2018-12-19 19:18:12', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(31, 'Bhubaneswar', 1, '2018-12-19 19:18:23', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(32, 'Coimbatore', 1, '2018-12-19 19:18:41', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(33, 'Guwahati', 1, '2018-12-19 19:18:48', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(34, 'Aurangabad', 1, '2018-12-19 19:18:58', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(35, 'Ludhiana', 1, '2018-12-19 19:19:09', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(36, 'Ranchi', 1, '2018-12-19 19:19:19', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(37, 'Raipur', 1, '2018-12-19 19:19:28', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(38, 'Vadodara', 1, '2018-12-19 19:19:36', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(39, 'Mangalore', 1, '2018-12-19 19:19:44', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(40, 'Mysore', 1, '2018-12-19 19:19:54', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(41, 'Vijayawada', 1, '2018-12-19 19:20:02', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(42, 'Madurai', 1, '2018-12-19 19:20:12', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(43, 'Amritsar', 1, '2018-12-19 19:20:23', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(44, 'Udaipur', 1, '2018-12-19 19:20:30', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(45, 'Srinagar', 1, '2018-12-19 19:20:52', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(46, 'Noida', 1, '2018-12-19 19:21:01', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(47, 'Jamshedpur', 1, '2018-12-19 19:21:12', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(48, 'Dehradun', 1, '2018-12-19 19:21:21', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(49, 'Faridabad', 1, '2018-12-19 19:21:46', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(50, 'Nashik', 1, '2018-12-19 19:22:01', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(51, 'Jodhpur', 1, '2018-12-19 19:22:15', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(52, 'Ghaziabad', 1, '2018-12-19 19:36:00', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(53, 'Rajkot', 1, '2018-12-19 19:36:11', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(54, 'Shimla', 1, '2018-12-19 19:36:21', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(55, 'Meerut', 1, '2018-12-19 19:36:29', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(56, 'Pondicherry', 1, '2018-12-19 19:36:37', '0000-00-00 00:00:00', '', '', '', 1, 'India'),
(57, 'Cuttack', 1, '2018-12-19 19:36:45', '0000-00-00 00:00:00', '', '', '', 1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desscription` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `meta_title`, `meta_desscription`, `meta_keyword`, `created_date`, `updated_date`) VALUES
(1, 'India', '', '', '', '2018-09-10 01:16:25', '0000-00-00 00:00:00'),
(3, 'Pakistan', '', '', '', '2018-09-10 01:16:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `contact_number`, `email`, `created_date`, `updated_date`, `updated_by`, `status`) VALUES
(1, 'RinkiCallGirls', 'qwe', '09999999999', 'cellmedservices1@gmail.com', '2018-09-19 22:06:39', '0000-00-00 00:00:00', 0, 1),
(2, 'RinkiCallGirls', 'qwe', '+919121300296', 'rinkipatel586@gmail.com', '2018-09-19 22:07:11', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `id` int(11) NOT NULL,
  `payment_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`id`, `payment_type_name`) VALUES
(1, 'Paid'),
(2, 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_name`, `description`, `created_date`, `status`) VALUES
(1, 'Body Massage Centres', '<p>Body Massage Centres</p>\r\n', '2018-09-01 12:18:26', 1),
(2, 'Beauty Spas', '<p>Beauty Spas</p>\r\n', '2018-09-01 12:18:54', 1),
(3, 'Beauty Artist', '<p>Beauty Artist</p>\r\n', '2018-09-01 12:19:12', 1),
(4, 'Massage', '<p>Massage Centres For Men</p>\r\n', '2018-09-01 12:19:34', 1),
(5, 'Men Salons', '<p>Men Salons</p>\r\n', '2018-09-01 12:19:46', 1),
(6, 'Makeup Artist', '<p><a href=\"makeup-artist.html\">Makeup Artist</a></p>\r\n', '2018-09-01 12:19:54', 1),
(7, 'Tattoos Desgin', '<p><a href=\"tattoos-desgin.html\">Tattoos Desgin</a></p>\r\n', '2018-09-01 12:20:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'site_contact_number', '000 000 0000'),
(2, 'site_emal_id', 'rinkipatel@gmail.com'),
(3, 'site_name', 'Rinki Patel'),
(4, 'site_location', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile`
--

CREATE TABLE `spa_profile` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ranking` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spa_profile`
--

INSERT INTO `spa_profile` (`id`, `title`, `contact_number`, `description`, `ranking`, `status`, `email_id`, `fk_user_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'Hygienic Thai Spa', '9967313968', 'Hello World', 0, 1, 'Hygienic@gmail.com', 2, '2019-01-06 15:19:14', 2, '2019-01-09 20:14:24', 2),
(2, 'Title ', '9967313968', 'dasd asd as das dasd asd', 0, 1, 'Hygienic@gmail.com', 2, '2019-01-06 15:28:47', 2, '0000-00-00 00:00:00', 0),
(3, 'Title ', '9967313968', 'dasd asd as das dasd asd', 0, 1, 'Hygienic@gmail.com', 2, '2019-01-06 15:29:44', 2, '0000-00-00 00:00:00', 0),
(4, 'Title ', '9967313968', 'dasd asd as das dasd asd', 0, 1, 'Hygienic@gmail.com', 2, '2019-01-06 15:30:07', 2, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile_images`
--

CREATE TABLE `spa_profile_images` (
  `id` int(11) NOT NULL,
  `fk_profile_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spa_profile_images`
--

INSERT INTO `spa_profile_images` (`id`, `fk_profile_id`, `image_name`, `created_date`, `updated_date`, `created_by`, `updated_by`) VALUES
(1, 1, '367562dfccfb4bde2c66f85d4a46da28.jpg', '2019-01-06 15:19:15', '0000-00-00 00:00:00', 2, 0),
(2, 2, '8e321654db7ecdf7f964de2486ba417b.jpg', '2019-01-06 15:28:47', '0000-00-00 00:00:00', 2, 0),
(3, 3, 'b47a5b145d8934493a66eb5085620c2b.jpg', '2019-01-06 15:29:44', '0000-00-00 00:00:00', 2, 0),
(4, 4, '4ff8bff7365427533e581a8466921bd3.jpg', '2019-01-06 15:30:08', '0000-00-00 00:00:00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile_location`
--

CREATE TABLE `spa_profile_location` (
  `id` int(11) NOT NULL,
  `fk_profile_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `fk_counry_id` int(11) NOT NULL,
  `fk_city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `fk_area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `google_map_url` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `pincode` int(11) NOT NULL,
  `excel_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spa_profile_location`
--

INSERT INTO `spa_profile_location` (`id`, `fk_profile_id`, `country_name`, `fk_counry_id`, `fk_city_id`, `city_name`, `fk_area_id`, `area_name`, `address`, `google_map_url`, `created_by`, `created_date`, `updated_by`, `updated_date`, `pincode`, `excel_code`) VALUES
(1, 1, 'India', 1, 1, 'Mumbai', 1, 'Borivali', 'Hello Address', 'https://goo.gl/maps/GjfnHXBhcc92', 2, '2019-01-06 15:19:14', 0, '0000-00-00 00:00:00', 400092, ''),
(2, 2, 'India', 1, 1, 'Mumbai', 5, 'Virar', 'asdsa s as dasdasdasd', 'https://goo.gl/maps/GjfnHXBhcc92', 2, '2019-01-06 15:28:47', 0, '0000-00-00 00:00:00', 400092, ''),
(3, 3, 'India', 1, 1, 'Mumbai', 5, 'Virar', 'asdsa s as dasdasdasd', 'https://goo.gl/maps/GjfnHXBhcc92', 2, '2019-01-06 15:29:44', 0, '0000-00-00 00:00:00', 400092, ''),
(4, 4, 'India', 1, 1, 'Mumbai', 5, 'Virar', 'asdsa s as dasdasdasd', 'https://goo.gl/maps/GjfnHXBhcc92', 2, '2019-01-06 15:30:07', 0, '0000-00-00 00:00:00', 400092, '');

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile_payment_info`
--

CREATE TABLE `spa_profile_payment_info` (
  `id` int(11) NOT NULL,
  `fk_profile_id` int(11) NOT NULL,
  `fk_payment_type_id` int(11) NOT NULL,
  `fk_payment_type_name` varchar(255) NOT NULL,
  `excel_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spa_profile_payment_info`
--

INSERT INTO `spa_profile_payment_info` (`id`, `fk_profile_id`, `fk_payment_type_id`, `fk_payment_type_name`, `excel_code`) VALUES
(1, 1, 1, 'Paid', ''),
(2, 2, 2, 'Free', ''),
(3, 3, 2, 'Free', ''),
(4, 4, 2, 'Free', '');

-- --------------------------------------------------------

--
-- Table structure for table `spa_profile_services_category`
--

CREATE TABLE `spa_profile_services_category` (
  `id` int(11) NOT NULL,
  `fk_profile_id` int(11) NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `fk_category_name` varchar(255) NOT NULL,
  `fk_services_id` varchar(255) NOT NULL,
  `fk_services_names` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `excel_code` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spa_profile_services_category`
--

INSERT INTO `spa_profile_services_category` (`id`, `fk_profile_id`, `fk_category_id`, `fk_category_name`, `fk_services_id`, `fk_services_names`, `created_by`, `created_date`, `updated_by`, `updated_date`, `excel_code`) VALUES
(1, 1, 1, 'Beauty Parlours', '2', 'Beauty Spas', 2, '2019-01-06 15:19:14', 0, '0000-00-00 00:00:00', ''),
(2, 2, 2, 'Beauty Services', '1', 'Body Massage Centres', 2, '2019-01-06 15:28:47', 0, '0000-00-00 00:00:00', ''),
(3, 3, 2, 'Beauty Services', '1', 'Body Massage Centres', 2, '2019-01-06 15:29:44', 0, '0000-00-00 00:00:00', ''),
(4, 4, 2, 'Beauty Services', '1', 'Body Massage Centres', 2, '2019-01-06 15:30:07', 0, '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_profile`
--
ALTER TABLE `spa_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_profile_images`
--
ALTER TABLE `spa_profile_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_profile_location`
--
ALTER TABLE `spa_profile_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_profile_payment_info`
--
ALTER TABLE `spa_profile_payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spa_profile_services_category`
--
ALTER TABLE `spa_profile_services_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spa_profile`
--
ALTER TABLE `spa_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spa_profile_images`
--
ALTER TABLE `spa_profile_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spa_profile_location`
--
ALTER TABLE `spa_profile_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spa_profile_payment_info`
--
ALTER TABLE `spa_profile_payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `spa_profile_services_category`
--
ALTER TABLE `spa_profile_services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
