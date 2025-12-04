-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2025 at 08:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webste_splash_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `imt_user`
--

CREATE TABLE `imt_user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(200) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(400) NOT NULL,
  `date` date NOT NULL,
  `admin_` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `imt_user`
--

INSERT INTO `imt_user` (`id`, `name`, `username`, `password`, `email`, `permission`, `mobile`, `address`, `date`, `admin_`) VALUES
(1, 'Lappy Book', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '2021-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `im_page_content`
--

CREATE TABLE `im_page_content` (
  `page_id` int(11) NOT NULL,
  `cont_heading` varchar(100) NOT NULL,
  `page_heading` varchar(200) NOT NULL,
  `page_content` text NOT NULL,
  `content_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `im_page_content`
--

INSERT INTO `im_page_content` (`page_id`, `cont_heading`, `page_heading`, `page_content`, `content_image`) VALUES
(1, 'Return & Exchange', 'return_exchange', '<!--?php echo <!--?php echo  Return of goods is at the users cost. We suggest you return your product using your domestic postal service on a standard shipping method, although we suggest you obtain a proof of postage and keep your paperwork until we have acknowledged receipt of your package.  <br-->\r\n<p>--</p>\r\n\r\n<p><br />\r\nItems must be returned within 7 days of receipt of your goods. This includes return transit time to our warehouse. Items must be unworn and unwashed and have all original tags attached. We cannot accept items that have distinct odours or signs of wear and tear. We assess all returns on this basis and if your item fails this assessment it will be returned to you.<br />\r\n<br />\r\n1- If you wish to exchange for a different size please clearly mark the required size in the space provided on the E-mail.<br />\r\n2- If you consider your items to be faulty please first contact our customer services department on info@splash30.com and give a brief description of the fault, and location of the fault providing photographic detail if you feel this is relevant. It may not always be necessary for you to return your faulty goods to us, and we will evaluate this at the time and on a case by case basis.<br />\r\n3- Faulty good claims must be made within the 7 day period. Anything beyond the 7 days will be considered normal wear and tear of use and can be subject to denial.<br />\r\n4- The returns parcel remains your responsibility until the goods are received and booked back into our warehouse.<br />\r\n5- Once we have received your package into our warehouse and it has been processed you will be informed of what action is being taken.<br />\r\n6- Exchanges are sent out on a standard service (not an express service).<br />\r\n7- Exchanges can only be made up to the original value of the goods purchased.<br />\r\n8- 250 PKR will be extra charge on exchange during the normal and sale days.<br />\r\n9- Your shipping costs are non-refundable.<br />\r\n10- We do not accept returns/exchanges for sale/clearance items.<br />\r\n11- Returns can take 2-4 days to process.<br />\r\n<br />\r\nWe reserve the right to return the items to you based on any of the terms outlined in our policy, goods will be returned to you in the same condition they are received in.<br />\r\n<br />\r\nWhilst every effort will be made to replace any stock with like for like product under certain circumstances your preferred product may not be in stock. In this instance, Splash30 reserves the right to issue a refund or credit to the value of the original product value. The product must also pass all other returns&nbsp;criteria.</p>\r\n\r\n<p>; ?&gt;</p>\r\n\r\n<p>; ?&gt;</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_faqs`
--

CREATE TABLE `ptcs_faqs` (
  `faq_id` int(10) NOT NULL,
  `faq_question` varchar(200) NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_status` int(1) NOT NULL DEFAULT 1,
  `faq_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ptcs_faqs`
--

INSERT INTO `ptcs_faqs` (`faq_id`, `faq_question`, `faq_answer`, `faq_status`, `faq_created_at`) VALUES
(19, 'What types of gym products does Splash30 offer?', '<p>Splash30 offers a wide range of gym products, including dumbbells, resistance bands, kettlebells, yoga mats, and home gym equipment to meet your fitness needs.</p>\r\n', 1, '2024-11-07 08:27:39'),
(20, 'Are Splash30 gym products suitable for beginners?', '<p>&nbsp;Yes, Splash30 gym products cater to all fitness levels, from beginners to advanced users. Each product includes detailed instructions and tips for safe and effective use.</p>\r\n', 1, '2024-11-07 08:28:01'),
(18, 'How can I purchase a product from Splash30?', '<p>How can I purchase a product from Splash30?</p>\r\n', 1, '2024-11-07 07:31:44'),
(21, 'Do Splash30 gym products come with a warranty?', '<p>Most Splash30 gym products come with a limited warranty. The duration and terms of the warranty vary by product. Please check the specific product details for more information.</p>\r\n', 1, '2024-11-07 08:28:30'),
(22, 'What materials are used in Splash30 gym products?', '<p>Splash30 prioritizes high-quality, durable, and eco-friendly materials in the manufacturing of its gym products to ensure safety and longevity.</p>\r\n', 1, '2024-11-07 08:28:51'),
(23, 'How can I maintain and clean Splash30 gym products?', '<p>To clean most Splash30 gym products, use a damp cloth with mild soap. Avoid using harsh chemicals that may damage the product&rsquo;s material. Always dry products thoroughly after cleaning.</p>\r\n', 1, '2024-11-07 08:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `sms_testimonial`
--

CREATE TABLE `sms_testimonial` (
  `tst_id` int(11) NOT NULL,
  `tst_page_name` varchar(50) NOT NULL,
  `tst_page_url` varchar(150) NOT NULL,
  `tst_page_logo` varchar(250) NOT NULL,
  `tst_page_rating` int(2) NOT NULL,
  `tst_user` varchar(50) NOT NULL,
  `tst_user_rating` int(2) NOT NULL,
  `tst_cmp_name` varchar(50) NOT NULL,
  `tst_testimonial` text NOT NULL,
  `tst_ed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sms_testimonial`
--

INSERT INTO `sms_testimonial` (`tst_id`, `tst_page_name`, `tst_page_url`, `tst_page_logo`, `tst_page_rating`, `tst_user`, `tst_user_rating`, `tst_cmp_name`, `tst_testimonial`, `tst_ed`) VALUES
(1, 'Lappy Book', 'https://www.face.com', 'img_testimonials_03.png', 5, 'MicJ', 5, 'facebook.com', 'Best service ever,\r\nHighly Recommended', 1),
(18, 'Mudassr iqbal', 'https://stackoverflow.com/questions/18424797/1142-select-command-denied-to-user-localhost-for-table-pma-table-uipref', '357963002b8d510a180ac4abda06_ff-menu-04.jpg', 0, 'Animi quos voluptatsdf', 0, 'Yael Justicsdfsdfe', 'Quaerat sequi volupt.asdfsdfsdfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_addressbook`
--

CREATE TABLE `sm_addressbook` (
  `ab_id` int(11) NOT NULL,
  `ab_uid` int(11) NOT NULL,
  `ab_postal_code` varchar(15) NOT NULL,
  `ab_country` varchar(30) NOT NULL,
  `ab_state` varchar(30) NOT NULL,
  `ab_city` varchar(30) NOT NULL,
  `ab_appartment_suite` text NOT NULL,
  `ab_address` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_addressbook`
--

INSERT INTO `sm_addressbook` (`ab_id`, `ab_uid`, `ab_postal_code`, `ab_country`, `ab_state`, `ab_city`, `ab_appartment_suite`, `ab_address`) VALUES
(9, 6, '44000', 'Pakistan', 'Capital', 'Islamabad', 'XYZ', 'ABC'),
(8, 48, '46000', 'pakistan', 'punjab', 'islamabad', 'abc 123', 'abc xyz 123');

-- --------------------------------------------------------

--
-- Table structure for table `sm_cart`
--

CREATE TABLE `sm_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_uid` int(11) NOT NULL,
  `cart_pro_id` int(11) NOT NULL,
  `cart_pro_qty` int(11) NOT NULL,
  `cart_pro_max_qty` int(11) NOT NULL,
  `cart_pro_size` text NOT NULL,
  `cart_pro_color` varchar(20) NOT NULL,
  `cart_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_cart`
--

INSERT INTO `sm_cart` (`cart_id`, `cart_uid`, `cart_pro_id`, `cart_pro_qty`, `cart_pro_max_qty`, `cart_pro_size`, `cart_pro_color`, `cart_datetime`) VALUES
(68, 56, 95, 1, 0, 'Size: S - Small', '', '2023-10-10 09:36:57'),
(70, 56, 115, 1, 0, 'Size: S - Small', '', '2023-10-10 09:36:27'),
(138, 48, 160, 1, 2, 'S', 'Orange and White', '2024-01-26 07:37:33'),
(141, 58, 233, 1, 20, 'M', 'Black', '2024-11-11 06:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `sm_categories`
--

CREATE TABLE `sm_categories` (
  `ct_id` int(11) NOT NULL,
  `ct_class` varchar(100) NOT NULL,
  `ct_name` varchar(200) NOT NULL,
  `ct_link` varchar(300) NOT NULL,
  `ct_text` longtext NOT NULL,
  `ct_link_target` varchar(50) NOT NULL,
  `cat_image` varchar(200) NOT NULL,
  `ct_parent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_categories`
--

INSERT INTO `sm_categories` (`ct_id`, `ct_class`, `ct_name`, `ct_link`, `ct_text`, `ct_link_target`, `cat_image`, `ct_parent`) VALUES
(87, '2', 'Bags', 'index.php?view=products_view&CatID=86&SubCatID=', '', '_parent', '53074prod01.jpg', 86),
(88, '3', 'Bags', 'index.php?view=products_view&CatID=87&SubCatID=', '', '_parent', '80824prod01.jpg', 87),
(86, '1', 'Accessories', 'index.php?view=products_category_view&CatID=', '', '_parent', '37735prod01.jpg', 0),
(89, '2', 'Fitness', 'index.php?view=products_view&CatID=86&SubCatID=', '', '_parent', '36546WhatsApp Image 2024-09-14 at 03.15.59_710738a9.jpg', 98),
(90, '3', 'Fitness', 'index.php?view=products_view&CatID=89&SubCatID=', '', '_parent', '73342WhatsApp Image 2024-09-14 at 03.15.59_710738a9.jpg', 89),
(91, '1', 'Apperal', 'index.php?view=products_category_view&CatID=', '&lt;p&gt;Cloths&lt;/p&gt;\r\n', '_parent', '16760Splash T-Shirt 01 Black 02.jpg', 0),
(92, '2', 'Mens', 'index.php?view=products_view&CatID=91&SubCatID=', '', '_parent', '55108Splash T-Shirt 01 Black 02.jpg', 91),
(93, '3', 'T Shirts', 'index.php?view=products_view&CatID=92&SubCatID=', '', '_parent', '81590Splash T-Shirt 01 Black 02.jpg', 92),
(97, '3', 'Polo Shirts', 'index.php?view=products_view&CatID=92&SubCatID=', '', '_parent', '9161901.jpg', 92),
(98, '1', 'Lifting Gear', 'index.php?view=products_category_view&CatID=', '', '_parent', '93872images.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_client`
--

CREATE TABLE `sm_client` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(150) NOT NULL,
  `ct_image` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_client`
--

INSERT INTO `sm_client` (`ct_id`, `ct_name`, `ct_image`) VALUES
(1, '', '93978clients_33.png'),
(2, '', '51684clients_32.png'),
(3, '', '8792clients_31.png'),
(4, '', '56951clients_30.png'),
(36, '', '60113patnership_20.png'),
(6, '', '61056clients_29.png'),
(7, '', '69396clients_28.png'),
(8, '', '20693clients_27.png'),
(9, '', '58041clients_26.png'),
(10, '', '26852clients_25.png'),
(11, '', '96203clients_24.png'),
(12, '', '53649clients_23.png'),
(13, '', '31161clients_22.png'),
(14, '', '34631clients_21.png'),
(15, '', '17617clients_20.png'),
(16, '', '31240clients_19.png'),
(17, '', '67089clients_18.png'),
(18, '', '66763clients_17.png'),
(19, '', '44561clients_16.png'),
(20, '', '4281clients_15.png'),
(21, '', '50201clients_14.png'),
(22, '', '10504clients_13.png'),
(23, '', '466clients_12.png'),
(24, '', '29501clients_11.png'),
(25, '', '31503clients_10.png'),
(26, '', '36132clients_9.png'),
(27, '', '12005clients_8.png'),
(28, '', '34497clients_7.png'),
(29, '', '76150clients_6.png'),
(30, '', '11517clients_5.png'),
(31, '', '71188clients_5.png'),
(32, '', '29345clients_4.png'),
(33, '', '99682clients_3.png'),
(34, '', '74411clients_2.png'),
(35, '', '86267clients_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `sm_contact`
--

CREATE TABLE `sm_contact` (
  `ctn_id` int(11) NOT NULL,
  `ctn_officename` varchar(150) NOT NULL,
  `ctn_address` varchar(300) NOT NULL,
  `ctn_mail` varchar(150) NOT NULL,
  `ctn_ph` varchar(150) NOT NULL,
  `ctn_cell` varchar(150) NOT NULL,
  `ctn_officetime` varchar(200) NOT NULL,
  `ctn_map` text NOT NULL,
  `ctn_enable` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_contact`
--

INSERT INTO `sm_contact` (`ctn_id`, `ctn_officename`, `ctn_address`, `ctn_mail`, `ctn_ph`, `ctn_cell`, `ctn_officetime`, `ctn_map`, `ctn_enable`) VALUES
(1, 'Contact Details', 'Shop #. 6, Raffat Building, Near JNP Signal, Industrial Area 2, Sharjah, UAE.', 'info@lappybook.com', '+971 55 860 6678', '+971 55 860 6678', ' 10am - 9pm', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d588.8579928273698!2d-1.7348937714625288!3d53.81739063457279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sKings%20park%2C%20Idle%20road%2C%20Bradford%20%20BD2%202AL!5e0!3m2!1sen!2s!4v1569565815180!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_country`
--

CREATE TABLE `sm_country` (
  `cntry_id` int(11) NOT NULL,
  `cntry_cid` int(11) NOT NULL,
  `cntry_name` varchar(50) NOT NULL,
  `cntry_symbol` int(10) NOT NULL,
  `cntry_ed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_country`
--

INSERT INTO `sm_country` (`cntry_id`, `cntry_cid`, `cntry_name`, `cntry_symbol`, `cntry_ed`) VALUES
(1, 0, 'Pakistan', 0, 0),
(2, 1, 'Rawalpindi', 0, 0),
(3, 1, 'Islamabad', 0, 0),
(4, 1, 'Jhelum', 0, 0),
(5, 1, 'Gujrat', 0, 0),
(6, 1, 'Mirpur', 0, 0),
(7, 1, 'Mandi Bahauddin', 0, 0),
(8, 1, 'Sargodha', 0, 0),
(1, 0, 'Pakistan', 0, 0),
(2, 1, 'Rawalpindi', 0, 0),
(3, 1, 'Islamabad', 0, 0),
(4, 1, 'Jhelum', 0, 0),
(5, 1, 'Gujrat', 0, 0),
(6, 1, 'Mirpur', 0, 0),
(7, 1, 'Mandi Bahauddin', 0, 0),
(8, 1, 'Sargodha', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_currency`
--

CREATE TABLE `sm_currency` (
  `cur_id` int(11) NOT NULL,
  `cur_name` varchar(50) NOT NULL,
  `cur_title` varchar(4) NOT NULL,
  `cur_code` varchar(5) NOT NULL,
  `cur_default` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_currency`
--

INSERT INTO `sm_currency` (`cur_id`, `cur_name`, `cur_title`, `cur_code`, `cur_default`) VALUES
(1, 'Pakistan', 'Rs.', 'PKR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_feedback`
--

CREATE TABLE `sm_feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_type` int(2) NOT NULL,
  `fb_first_name` varchar(50) NOT NULL,
  `fb_last_name` varchar(50) NOT NULL,
  `fb_email` varchar(50) NOT NULL,
  `fb_description` text NOT NULL,
  `fb_image` varchar(250) NOT NULL,
  `fb_end` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_membership`
--

CREATE TABLE `sm_membership` (
  `sm_mem_id` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `member_status` int(11) NOT NULL DEFAULT 0,
  `member_club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_membership_club`
--

CREATE TABLE `sm_membership_club` (
  `member_id` int(11) NOT NULL,
  `sm_userid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `92_fs` int(11) NOT NULL,
  `silver_pigeon_1_3` int(11) NOT NULL,
  `a_300` int(11) NOT NULL,
  `455_eell` int(11) NOT NULL,
  `apx` int(11) NOT NULL,
  `diamond_pigeon` int(11) NOT NULL,
  `a350` int(11) NOT NULL,
  `486` int(11) NOT NULL,
  `px4` int(11) NOT NULL,
  `dt11` int(11) NOT NULL,
  `a400` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `m9a3` int(11) NOT NULL,
  `694` int(11) NOT NULL,
  `1301` int(11) NOT NULL,
  `details` varchar(50) NOT NULL,
  `hunting` int(11) NOT NULL,
  `competition` int(11) NOT NULL,
  `training` int(11) NOT NULL,
  `accessories` int(11) NOT NULL,
  `interests_hunting` int(11) NOT NULL,
  `interests_shooting` int(11) NOT NULL,
  `interests_tractical` int(11) NOT NULL,
  `interests_collector` int(11) NOT NULL,
  `interests_firearms_enthusiast` int(11) NOT NULL,
  `card_name` varchar(25) NOT NULL,
  `sm_ed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_membership_club`
--

INSERT INTO `sm_membership_club` (`member_id`, `sm_userid`, `name`, `email`, `contact_no`, `address`, `92_fs`, `silver_pigeon_1_3`, `a_300`, `455_eell`, `apx`, `diamond_pigeon`, `a350`, `486`, `px4`, `dt11`, `a400`, `other`, `m9a3`, `694`, `1301`, `details`, `hunting`, `competition`, `training`, `accessories`, `interests_hunting`, `interests_shooting`, `interests_tractical`, `interests_collector`, `interests_firearms_enthusiast`, `card_name`, `sm_ed`) VALUES
(1, 6, 'Abdullah', 'abdulllah.asim@icloud.com', '03334547309', 'N-5, NRC, E-8, ISB', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Nill', 0, 1, 0, 1, 0, 1, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_orders`
--

CREATE TABLE `sm_orders` (
  `odr_id` int(11) NOT NULL,
  `odr_no` varchar(100) NOT NULL,
  `odr_type` text NOT NULL,
  `odr_pro_id` text NOT NULL,
  `odr_pro_qty` text NOT NULL,
  `odr_pro_size` text NOT NULL,
  `odr_pro_color` varchar(20) NOT NULL,
  `odr_total_price` int(255) NOT NULL,
  `odr_user_id` int(11) DEFAULT NULL,
  `odr_email` varchar(255) NOT NULL,
  `odr_full_name` varchar(255) NOT NULL,
  `odr_contact_no` varchar(255) NOT NULL,
  `odr_city` varchar(255) NOT NULL,
  `odr_country` varchar(255) NOT NULL,
  `odr_address` varchar(1024) NOT NULL,
  `odr_appartment_suite` text NOT NULL,
  `odr_state` text NOT NULL,
  `odr_postal_code` int(11) NOT NULL,
  `odr_adbid` int(11) DEFAULT NULL,
  `odr_pmid` int(11) DEFAULT NULL,
  `odr_payment_method` varchar(255) NOT NULL,
  `odr_status` int(1) NOT NULL,
  `odr_user_ip` varchar(25) NOT NULL,
  `odr_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_orders`
--

INSERT INTO `sm_orders` (`odr_id`, `odr_no`, `odr_type`, `odr_pro_id`, `odr_pro_qty`, `odr_pro_size`, `odr_pro_color`, `odr_total_price`, `odr_user_id`, `odr_email`, `odr_full_name`, `odr_contact_no`, `odr_city`, `odr_country`, `odr_address`, `odr_appartment_suite`, `odr_state`, `odr_postal_code`, `odr_adbid`, `odr_pmid`, `odr_payment_method`, `odr_status`, `odr_user_ip`, `odr_date_time`) VALUES
(253, 'BS716459', 'guest', '222', '1', 'No Size', 'Black', 4500, 0, 'ammar888malik@gmail.com', 'Ammar ', '03356660044', 'Islamabad', 'PK', 'F11', '', 'Islamabad Capital Territory', 44000, 0, 0, 'Direct Bank Transfer', 0, '', '2024-11-06 06:19:09'),
(252, 'BS362934', 'guest', '193', '1', 'One Size', 'Gray', 3240, 0, 'contectahmadfaraz.j@gmail.com', 'Ahmad Jutt', '03249978824', 'Lahore', 'PK', 'Abbas street, house no 135, street no 9, rehmat colony, wandala road, shahdra, ferozwala, Lahore ', 'Abbas Street', 'Punjab', 55151, 0, 0, 'Cash On Delivery (COD)', 3, '', '2024-10-28 03:15:00'),
(251, 'BS236011', 'guest', '194', '1', 'One Size', 'Black', 3060, 0, 'muhammadammar4499@gmail.com', 'ammar', '76656', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, 'Direct Bank Transfer', 0, '', '2024-10-24 10:11:52'),
(250, 'BS513950', 'guest', '236', '1', 'M', 'Black', 2249, 0, 'info@splash30.com', 'Mohammad Saad', '1234', 'Sialkot', 'Pakistan', 'Christian town', '', '', 51310, 0, 0, 'Direct Bank Transfer', 0, '', '2024-10-22 04:53:39'),
(249, 'BS409420', 'guest', '228, 236, 224, 209', '1, 1, 1, 1', 'L, L, No Size, L', 'Black, Black, Red, B', 10798, 0, 'info@splash30.com', 'Mohammad Saad', '1234', 'Sialkot', 'Pakistan', 'Christian town', '', 'punjab', 51310, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-10-18 04:22:16'),
(248, 'BS201463', 'guest', '236', '1', 'M', 'Black', 2249, 0, 'muhammadammar4499@gmail.com', 'ammar', '0335', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, '', 0, '', '2024-10-15 11:37:03'),
(247, 'BS591165', 'guest', '238', '2', 'L', 'Black', 4498, 0, 'muhammadammar4499@gmail.com', 'ammar', '03048877449', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-10-15 11:00:28'),
(245, 'BS743571', 'guest', '222', '1', 'No Size', 'Black', 4500, 0, 'muhammadammar4499@gmail.com', 'ammar', '03356660044', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-10-05 04:37:58'),
(246, 'BS269164', 'guest', '219', '2', 'L', 'Black', 5400, 0, 'muhammadammar4499@gmail.com', 'ammar', '03356660044', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, '', 0, '', '2024-10-05 04:44:38'),
(244, 'BS340654', 'guest', '200', '1', 'One Size', 'Black', 4499, 0, 'asim.noman11@gmail.com', 'Asim noman ', '03139198251', 'Topi', 'Pakistan ', 'Aslam Khan Market Topi Bazaar Swabi ', 'Topi Bazaar ', 'Topi ', 23460, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-10-04 01:58:46'),
(243, 'BS788039', 'guest', '213, 213', '1, 1', ' XL,  L', 'Black, Black', 4500, 0, 'info@splash30.com', 'Mohammad Saaed', '03048877449', 'Sialkot', 'Pakistan', 'Christian town', '', 'punjab', 51310, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-09-26 01:55:43'),
(241, 'BS656643', 'guest', '201', '1', 'One Size', 'Gray', 1350, 0, 'muhammadammar4499@gmail.com', 'ammar', '03048877449', '', '4444', 'islamabad', '1212', '12', 44000, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-09-14 03:37:46'),
(242, 'BS277205', 'guest', '217', '3', 'M', 'Black', 6750, 0, 'muhammadammar4499@gmail.com', 'ammar', '03048877449', 'F-11', 'Pakistan', 'Hilal Road', '', '', 44000, 0, 0, '', 0, '', '2024-09-25 02:26:30'),
(240, 'BS912038', 'guest', '195', '1', 'One Size', 'Yellow', 0, 0, 'omair_ch@live.com', 'Muhammad Omair Akram', '03369666888', 'Rawalpindi', 'PK', 'House No. D-914(A), Satellite Town', '', '', 0, 0, 0, 'Cash On Delivery (COD)', 0, '', '2024-09-13 01:16:49'),
(254, 'BS626119', 'guest', '229', '1', 'M', 'Black', 2520, 0, 'saadrazzaq@gmail.com', 'Saad Razzaq', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', '', 'sdsd', 13213, 0, 0, 'Cash On Delivery (COD)', 1, '', '2024-11-11 09:27:18'),
(255, 'BS798339', 'customer', '236', '1', 'M', 'Black', 2499, 58, 'saadrazzaq624@gmail.com', 'saad_1234', '03184202899', '', '', '', '', '', 0, 0, 0, 'Cash On Delivery (COD)', 1, '', '2024-11-11 10:18:43'),
(256, 'BS738870', 'customer', '236', '1', 'M', 'Black', 2499, 58, 'saadrazzaq624@gmail.com', 'saad_1234', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', 'qwe', 'sdsd', 123, 0, 0, 'Cash On Delivery (COD)', 1, '', '2024-11-11 10:22:26'),
(257, 'BS296611', 'guest', '227', '2', 'M', 'Black', 5040, 0, 'saadrazzaq624@gmail.com', 'Saad Razzaq', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', '', 'sdsd', 1212, 0, 0, 'Cash On Delivery (COD)', 1, '', '2024-11-11 11:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `sm_partnership`
--

CREATE TABLE `sm_partnership` (
  `ps_id` int(11) NOT NULL,
  `ps_name` varchar(150) NOT NULL,
  `ps_image` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_partnership`
--

INSERT INTO `sm_partnership` (`ps_id`, `ps_name`, `ps_image`) VALUES
(1, '', '35354patnership_20.png'),
(2, '', '52264patnership_19.png'),
(3, '', '50119patnership_18.png'),
(4, '', '65579patnership_17.png'),
(5, '', '22036patnership_16.png'),
(6, '', '69366patnership_15.png'),
(7, '', '7992patnership_14.png'),
(8, '', '87536patnership_13.png'),
(9, '', '11355patnership_12.png'),
(10, '', '71746patnership_11.png'),
(11, '', '36923patnership_10.png'),
(12, '', '98703patnership_9.png'),
(13, '', '45117patnership_8.png'),
(14, '', '55447patnership_7.png'),
(15, '', '97863patnership_6.png'),
(16, '', '48574patnership_5.png'),
(17, '', '4174patnership_4.png'),
(18, '', '77209patnership_3.png'),
(19, '', '74517patnership_2.png'),
(20, '', '10415patnership_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `sm_paymentmethods`
--

CREATE TABLE `sm_paymentmethods` (
  `pm_id` int(11) NOT NULL,
  `pm_name` varchar(50) NOT NULL,
  `pm_username` varchar(50) NOT NULL,
  `pm_password` varchar(50) NOT NULL,
  `pm_pin` int(11) NOT NULL,
  `pm_url` varchar(250) NOT NULL,
  `pm_notaccept_url` varchar(250) NOT NULL,
  `pm_accept_url` varchar(250) NOT NULL,
  `pm_ed` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_products`
--

CREATE TABLE `sm_products` (
  `pro_id` int(11) NOT NULL,
  `pro_mcat_id` int(11) NOT NULL,
  `pro_cat_id` int(11) NOT NULL,
  `pro_ed_addtocart` int(1) NOT NULL DEFAULT 1,
  `pro_name` varchar(200) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_discount` int(3) NOT NULL,
  `pro_keyfeature` longtext NOT NULL,
  `pro_overview` longtext NOT NULL,
  `pro_spces` text NOT NULL,
  `pro_image` varchar(150) NOT NULL,
  `pro_video` varchar(100) NOT NULL,
  `pro_ava_qty` int(11) NOT NULL,
  `pro_stars` int(3) NOT NULL,
  `pro_keywords` varchar(250) NOT NULL,
  `pro_sku` varchar(30) NOT NULL,
  `pro_status` int(1) NOT NULL,
  `pro_size_guidline` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_products`
--

INSERT INTO `sm_products` (`pro_id`, `pro_mcat_id`, `pro_cat_id`, `pro_ed_addtocart`, `pro_name`, `pro_price`, `pro_discount`, `pro_keyfeature`, `pro_overview`, `pro_spces`, `pro_image`, `pro_video`, `pro_ava_qty`, `pro_stars`, `pro_keywords`, `pro_sku`, `pro_status`, `pro_size_guidline`) VALUES
(186, 87, 88, 1, 'Tactical Gym Backpack (Black)', 4999, 10, '', '<p>Introducing the Splash Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite SplashÂ patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the SplashÂ Â Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '42607Product 7 - Img 1.jpg', '', 15, 0, '', 'SP-007', 0, ''),
(187, 87, 88, 1, 'Splash 10L Mini Backpack, TNF Black/TNF Black, One Size', 0, 0, '', '<ul><li>BOREALIS CLASSIC. Meet the Borealis Mini, the scaled-down, 10 liter version of our much-loved classic. Still featuring the iconic front bungee system of its sibling, the mini carries a smaller load for city life.</li><li>COMFORTABLE CARRY. This water-repellent backpack features a padded top handle and U-pull zippers that are easy to grab.</li><li>TOTAL ORGANIZATION. An internal pocket fits items like your jacket, keys and more. Two external water bottle pockets double as multi-use pockets. Plus, the external bungee-compression system offers more options for organizing.</li><li>EXPLORATION WITHOUT COMPROMISE. Easily find our most sustainable products with this badge. To qualify, apparel, equipment, and accessories must be made with 75% or greater recycled, regenerative, and/or responsibly sourced renewable materials by weight.</li><li>TECH SPECS. Dimensions: 8.65\" x 4.15\" x 13.5\" (22 cm x 10.5 cm x 34.3 cm); Avg Weight: 12 oz; Volume: 10 Liters; This item is not intended for use by children 12 and under.</li></ul>', '', '58111Product 8 - Img 1.jpg', '', 16, 0, '', 'SP-008', 2, ''),
(223, 89, 90, 1, 'Splash Pacesetter Padded Pro Weight Belt', 2500, 10, '', '<h3>Splash Pacesetter&nbsp;Padded Pro Weight Belt for Men| Used by Pros | Thick Durable Plied Leather with Double Stitching | Padded and Adjustable for Comfort | Stabilizes your Lower Back during Weight Lifting</h3>', '', '3824902.jpg', '', 20, 0, '', 'SU_33', 1, ''),
(224, 87, 88, 1, 'Splash premium Tactical bag', 5000, 10, '', '<p>Introducing the SplashÂ Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite SplashÂ patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the SplashÂ Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', 'Splash premium Tactical bag.png', '', 19, 0, '', 'SU_35', 1, ''),
(225, 87, 88, 1, 'Splash premium Tactical bag', 5000, 10, '', '<p>Introducing the Splash&nbsp;Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite Splash&nbsp;patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the Splash&nbsp;Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '6813215.jpg', '', 20, 0, '', 'SU_36', 1, ''),
(226, 87, 88, 1, 'Splash premium Tactical bag', 5000, 10, '', '<p>Introducing the Splash&nbsp;Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite Splash&nbsp;patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the Splash&nbsp;Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '60595WhatsApp Image 2024-10-10 at 3.18.51 AM.jpeg', '', 20, 0, '', 'SU_37', 1, ''),
(189, 87, 88, 1, 'Pack-N-Go Duffel Bag', 2800, 10, '', '<ul><li>100% polyester material.ï¿½</li><li>ï¿½This shoulder duffel bag comes with a large toiletry zip pocket.ï¿½</li><li>ï¿½Two easy access pockets on the outside, perfect for storing your travel essentials;</li><li>ï¿½Comes with a spacious toiletry pouch that hangs from a convenient webbing loop inside the bag.</li><li>ï¿½Adjustable shoulder strap.</li><li>ï¿½Extra soft handle loop to carry the bag with ultimate comfort.</li><li>ï¿½Size: 46 x 25 x 21 cm</li><li>ï¿½Capacityï¿½ 24 Liters</li></ul>', '', '49926Product 10 - Img 1.jpg', '', 32, 0, '', 'SP-010', 1, ''),
(190, 87, 88, 1, 'Anti-Theft Crossbody Bag - Black/Neon', 3600, 10, '', '<p>- This is an Anti-Theft Crossbody Bag with secret pockets for extra safety.<br>- 6 outside pockets with high-quality zippers.<br>- 4 inside pockets for extra storage including iPad, books, and other essentials.<br>- Headphone jack at the front.<br>- Water bottle storage mesh pocket.<br>- Thickened adjustable shoulder strap for extra grip and extra comfort.<br>- Adjustable shoulder strap. Adaptable to both shoulders.<br>- Ideal for cycling, motorbiking, hiking, camping, climbing, walking, day trips, vacations, travel, university/ school, shopping, and gym.<br>- Made of Ripstop material.<br>- Size is 18ï¿½ x 13ï¿½ x 4ï¿½<br></p>', '', '83158Product 11 - Img 4.jpg', '', 16, 0, '', 'SP-011', 0, ''),
(191, 87, 88, 1, 'Splash Backpack - Black/Neon', 3800, 10, '', '<p><br></p><p>Unveiling the Splash&nbsp;Backpack: Spacious, Feather light, Indestructible. Padded bliss for every journey. Your ultimate companion for training, daily hustle, travel and backpacking!<br></p><ul><li>20L Capacity</li><li>Lightweight, Durable Material</li><li>100% polyester</li><li>2 Side Mesh Pockets</li><li>Padded Back Foaming for Extra Comfort</li><li>Suitable for training, everyday activities, traveling and hiking.</li></ul>', '', '98530Product 12 - Img 2.jpg', '', 32, 0, '', 'SP-012', 1, ''),
(203, 89, 90, 1, 'WRIST WRAP 18', 1200, 10, '', '<p>Our newest version of the Outlaws are now available with the same superior support you are used to, with improved stretch and comfort. Our stiffest most aggressive wrist wraps offers you ultimate support for your heaviest pressing movements. Tested by the strongest powerlifters and strongmen in the world, these are the ultimate wraps for the your toughest workouts<br></p>', '', '51724WhatsApp Image 2024-09-27 at 3.32.27 AM (1).jpeg', '', 16, 0, '', 'SP_018', 1, ''),
(193, 87, 88, 1, 'Anti-Theft Crossbody Bag - Grey', 3600, 10, '', '<p>- This is an Anti-Theft Crossbody Bag with secret pockets for extra safety.<br>- 6 outside pockets with high-quality zippers.<br>- 4 inside pockets for extra storage including iPad, books, and other essentials.<br>- Headphone jack at the front.<br>- Water bottle storage mesh pocket.<br>- Thickened adjustable shoulder strap for extra grip and extra comfort.<br>- Adjustable shoulder strap. Adaptable to both shoulders.<br>- Ideal for cycling, motorbiking, hiking, camping, climbing, walking, day trips, vacations, travel, university/ school, shopping, and gym.<br>- Made of Ripstop material.<br>- Size is 18ï¿½ x 13ï¿½ x 4ï¿½<br></p>', '', 'Anti-Theft Crossbody Bag - Grey.png', '', 15, 0, '', 'SP-014', 1, ''),
(194, 87, 88, 1, 'Splash 30 Backpack', 3400, 10, '', '<p>Splash 30Â signature backpack is crafted to perfection for carrying all your valuables, especially your laptops! Lined with foam to give you the comfort and convenience you deserve.</p><ul><li>20-liter capacity</li><li>2 main zip pockets at the front</li><li>Reflective main logo</li><li>Inside compartment for laptop and other valuables.</li><li>Water-resistant fabric</li><li>Adjustable shoulder straps</li><li>Separate laptop compartment</li><li>Side pocket for bottle</li></ul>', '', 'Splash 30 Backpack.png', '', 15, 0, '', 'SP-015', 1, ''),
(195, 87, 88, 1, 'Splash 10L Mini Backpack, Summit Gold/TNF Yellow, One Size', 0, 0, '', '<ul><li>BOREALIS CLASSIC. Meet the Borealis Mini, the scaled-down, 10 liter version of our much-loved classic. Still featuring the iconic front bungee system of its sibling, the mini carries a smaller load for city life.</li><li>COMFORTABLE CARRY. This water-repellent backpack features a padded top handle and U-pull zippers that are easy to grab.</li><li>TOTAL ORGANIZATION. An internal pocket fits items like your jacket, keys and more. Two external water bottle pockets double as multi-use pockets. Plus, the external bungee-compression system offers more options for organizing.</li><li>EXPLORATION WITHOUT COMPROMISE. Easily find our most sustainable products with this badge. To qualify, apparel, equipment, and accessories must be made with 75% or greater recycled, regenerative, and/or responsibly sourced renewable materials by weight.</li><li>TECH SPECS. Dimensions: 8.65\" x 4.15\" x 13.5\" (22 cm x 10.5 cm x 34.3 cm); Avg Weight: 12 oz; Volume: 10 Liters; This item is not intended for use by children 12 and under.</li></ul>', '', '77108Product 16 - Img 1.jpg', '', 16, 0, '', 'SP-016', 2, ''),
(219, 92, 97, 1, 'Elite Splash Polo', 3000, 10, '', '', '', '86925WhatsApp Image 2024-09-27 at 12.35.56 AM.jpeg', '', 73, 0, '', 'SU_32', 1, ''),
(220, 92, 97, 1, 'Elite Splash Polo', 3000, 10, '', '', '', '17254WhatsApp Image 2024-09-27 at 12.35.58 AM (1).jpeg', '', 75, 0, '', 'SU_33', 1, ''),
(221, 89, 90, 1, 'Gym Bottle', 1599, 0, '', '<p><b>Product Overview:</b></p><p>OurÂ <b>supplement</b>Â <b>shaker bottle</b>Â helps to keep you hydrated throughout the day, and the blending ball has been designed to give you a smooth shake whatever supplement youâ€™re mixing. Itâ€™s an essential for yourÂ <b><a data-cke-saved-href=\"https://hustlersonlypk.com/collections/gym-bags\" href=\"https://hustlersonlypk.com/collections/gym-bags\">gym bag</a></b>Â to stay fuelled, wherever you are.Â </p><p><br></p><p><b>Product Details:</b>Â </p><ul><li>750ml capacity</li><li>Unique blending ball for smooth supplement shakes</li><li>Ideal substitute for an electric blender</li><li>Screw-tight, leak-free lid</li><li>100% dishwasher friendlyÂ </li></ul>', '', 'Gym Bottle.png', '', 100, 0, '', 'SU_33', 1, ''),
(222, 87, 88, 1, 'Splash Premium DuffleÂ Bag', 5000, 10, '', '<p>The Splash Premium Duffle is designed for versatility and performance. Inspired by Adidas, this innovative bag transforms seamlessly between a duffle and a backpack, giving you two convenient carrying options in one. Made from ultra-durable 600D Cordura PVC, itâ€™s built to handle your toughest adventures while providing water resistance to keep your gear safe and dry. Whether youâ€™re headed to the gym, traveling for the weekend, or exploring the outdoors, the spacious compartments, ergonomic straps, and reinforced zippers ensure maximum comfort and functionality. Elevate your game with the Splash Premium Duffle â€“ your ultimate all-in-one travel and sport companion.<br></p>', '', 'Splash Premium Duffle Bag.png', '', 18, 0, '', 'SU_35', 1, ''),
(182, 87, 88, 1, 'Splash10L Mini Backpack, Summit Gold/TNF Black, One Size', 0, 0, '', '<ul><li>BOREALIS CLASSIC. Meet the Borealis Mini, the scaled-down, 10 liter version of our much-loved classic. Still featuring the iconic front bungee system of its sibling, the mini carries a smaller load for city life.</li><li>COMFORTABLE CARRY. This water-repellent backpack features a padded top handle and U-pull zippers that are easy to grab.</li><li>TOTAL ORGANIZATION. An internal pocket fits items like your jacket, keys and more. Two external water bottle pockets double as multi-use pockets. Plus, the external bungee-compression system offers more options for organizing.</li><li>EXPLORATION WITHOUT COMPROMISE. Easily find our most sustainable products with this badge. To qualify, apparel, equipment, and accessories must be made with 75% or greater recycled, regenerative, and/or responsibly sourced renewable materials by weight.</li><li>TECH SPECS. Dimensions: 8.65\" x 4.15\" x 13.5\" (22 cm x 10.5 cm x 34.3 cm); Avg Weight: 12 oz; Volume: 10 Liters; This item is not intended for use by children 12 and under.</li></ul>', '', '55748Product 3 - Img 1.jpg', '', 16, 0, '', 'SP-003', 0, ''),
(185, 87, 88, 1, 'Tactical Gym Backpack (Black Camo)', 4999, 0, '', '<p>Introducing the Splash&nbsp;Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite Splash&nbsp;patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the Splash&nbsp;Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '7248Product 6 - Img 1.jpg', '', 16, 0, '', 'SP-006', 2, ''),
(184, 87, 88, 1, 'Tactical Gym Backpack (khaki)', 4999, 10, '', '<p>Introducing the SplashÂ Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite SplashÂ patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the SplashÂ Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '30604Product 5 - Img 1.jpg', '', 16, 0, '', 'SP-005', 0, ''),
(180, 87, 88, 1, 'THE SPLASH Terra Lumbar Hip Pack', 2200, 10, '', '<p><b>â€‹</b></p><h3>About this item</h3><ul><li>LUMBAR PACK. For shorter day hikes, the Terra Lumbarâ€”6L hip pack is designed to fit comfortably against a body in motion. With a plush, padded back panel and external bungee storage, this pack is a perfect hiking companion.</li></ul><ul><li>SECURE STORAGE. The main compartment holds larger items such as a water bottle, phone, keys and wallet, while 2 internal pockets and 1 external concealed zippered pocket round out your storage for every adventure.</li></ul><ul><li>BUILT FOR ALL. A plush and comfortable padded back panel works well with an adjustable webbing waist strap for a dialed in fit. The external bungee can secure a rain jacket, while bottom compression lets you cinch down the pack and shield bulky items.</li></ul><ul><li>PREMIUM FABRIC. Whether you\'re commuting, traveling or hitting the trail, this pack has your comfort in mind with nylon riptsop fabric and a non-PFC Durable Water-Repellent (DWR) Finish to keep out the damp.</li></ul><ul><li>TECH SPECS. Dimensions: 6.5\" x 14.57\" x 5.91\" (16.5 cm x 37 cm x 15 cm); Avg Weight: 11 oz; Volume: 6L. This item is not intended for use by children 12 and under.</li><li><br></li></ul>', '', 'THE SPLASH Terra Lumbar Hip Pack.png', '', 16, 0, '', 'SP-001', 1, ''),
(200, 87, 88, 1, 'Tactical Gym Backpack ', 4999, 10, '', '<p><b>â€‹</b><br></p><p>ntroducing the Splash Tactical Gym Backpack - the ultimate MOLLE style companion for athletes! Designed with meticulous attention to detail, this backpack is engineered to carry, organize, and protect all your power gear and personal belongings, ensuring a seamless gym experience.</p><p>One standout feature of this backpack is the specialized gym belt storage system. With this innovative design, you can conveniently wrap your belt through the backpack, saving you precious space while keeping it securely in place. No more worrying about misplacing or carrying your belt separately.</p><p>We understand the importance of safeguarding delicate belongings, which is why we\'ve included a velour-lined pocket. This pocket provides a plush environment to protect items like your phone and sunglasses from scratches and damage, ensuring they remain in pristine condition.</p><p>Say goodbye to messy and damp knee sleeves with our thoughtfully designed mesh storage pouch. This dedicated compartment allows you to store your knee sleeves out of the way, promoting proper ventilation and quick drying before your next training session. Keep your gear organized and ready to go!</p><p>To further enhance convenience, we\'ve organized this backpack based on your training days. Easily categorize and access your essentials with intuitive storage compartments, allowing you to focus on your workouts without any distractions.</p><p>Express your unique style and personality with the Velcro patch space on the backpack. Customize it with your favorite SplashÂ patches or badges, making a statement while showcasing your dedication to fitness.</p><p>With a generous 36-liter capacity, this backpack provides ample room for all your gear, clothing, and accessories. The IR Tactical Backpacks feature the innovative Power-gear Attachment Ladder System (PALS), allowing you to attach smaller gym equipment like wrist and ankle cuffs, keys, or other essentials, providing easy access whenever you need them.</p><p>When you\'re ready to leave the Pak, become a Rebel with the SplashÂ Â Tactical Gym Backpack. Dominate the gym, seize victory, and ascend to new heights of strength, power, and greatness. Unleash your inner rebel and conquer the iron battlefield like never before. Embrace the power. Embrace the hardcore. Embrace Splash!</p>', '', '7193424.jpg', '', 15, 0, '', 'SP-007', 0, ''),
(202, 89, 90, 1, 'WRIST WRAP HEAVY ELASTIC', 1500, 10, '', '<p>Our newest version of the Outlaws are now available with the same superior support you are used to, with improved stretch and comfort. Our stiffest most aggressive wrist wraps offers you ultimate support for your heaviest pressing movements. Tested by the strongest powerlifters and strongmen in the world, these are the ultimate wraps for the your toughest workouts<br></p>', '', '19089splash (1).jpg', '', 16, 0, '', 'SP-017', 1, ''),
(204, 89, 90, 1, 'Grizzly Fitness Soflex Nylon Pro Weight Training Belt', 2500, 10, '', '<h3>Splash Soflex Nylon Pro Weight Training Belt for Men | Used by Pros |&nbsp; Padded and Adjustable for Comfort | Stabilizes your Lower Back during Weight Lifting</h3><p><br></p><p><br></p><ul><li><b>ULTIMATE BELT FOR COMFORT &amp; SUPPORT</b>&nbsp;: Doesn\'t dig into hips or back. Lightweight training and support belt with thick padding and flexible soft nylon.&nbsp;Comfortable support and protection in a body adhering design.&nbsp; Offering a Full Range of Motion in All Sport and Recreation Activities. Velcro Closure with Roller Buckle.</li></ul><ul><li><b>DURABLE</b>&nbsp;: Strongest Fabric Training Belt in Industry built for the pros out of high quality&nbsp;nylon&nbsp;and steel. Machine Washable.</li></ul>', '', '1868901.jpg', '', 16, 0, '', 'SP_019', 1, ''),
(205, 89, 90, 1, ' Premium Leather Weightlifting Belt', 5000, 10, '', '<p>Doesn\'t dig into hips or back. Lightweight training and support belt with thick padding and flexible soft nylon.Original Leather Grade-1,Embroidered logo,Â Comfortable support and protection in a body adhering design.Â  Offering a Full Range of Motion in All Sport and Recreation Activities. Velcro Closure with Roller Buckle.</p>', '', 'Premium Leather Weightlifting Belt.png', '', 20, 0, '', 'SP_020', 1, ''),
(206, 89, 90, 1, 'Ignite Lifting and Training Gloves | Men Sizes | Extra Durable and Flexible', 2000, 10, '', '', '', '2642701.jpg', '', 20, 0, '', 'SP_021', 1, ''),
(207, 89, 90, 1, 'Voltage Lifting and Training Gloves | Men Sizes | Extra Durable and Flexible', 2000, 10, '', '', '', '3708201.jpg', '', 20, 0, '', 'SP_022', 1, ''),
(208, 89, 90, 1, 'NECK SUPPORT ROLL', 1500, 10, '', '<p>NECK SUPPORT ROLL<br></p>', '', '24052splash.jpg', '', 16, 0, '', 'SP_023', 1, ''),
(209, 89, 90, 1, 'KNEE SLEEVES NEOPRENE', 2000, 10, '', '<p>The newest evolution of performance gear, the PR Knee Sleeve! Made with the latest technology and materials, these sleeves are designed to get the absolute most out of your squats in the gym and on the platform. Our new, denser neoprene provides the ultimate support and compression making these the stiffest, most aggressive sleeves on the market... and not for the faint of heart. Perform your heaviest squats with confidence knowing you are supported with the best.Â </p><ul><li>Provides maximal support and compression around knees</li><li>Non slip material</li><li>7mm thickness. 30cm length</li><li>Stiffest, most aggressive sleeves on the market</li><li>New high quality neoprene that is denser and heavier</li><li>Used for heavy squatting and leg exercises</li><li>Sold as a pair</li><li>Hand wash in sink with soap. Air dry</li></ul>', '', '1211001.jpg', '', 19, 0, '', 'SP_024', 1, ''),
(210, 92, 93, 1, 'Splash Everyday Tee', 2500, 10, '', '<p>Splash T-Shirt 01 Black 03<br></p>', '', '92018Splash T-Shirt 01 Black 03.jpg', '', 10, 0, '', 'SP_025', 1, ''),
(212, 92, 93, 1, 'Ultimate Splash Tee', 2500, 10, '', '', '', 'Ultimate Splash Tee.png', '', 10, 0, '', 'US_27', 1, ''),
(213, 92, 93, 1, 'Night Night Tee', 2500, 10, '', '', '', 'Night Night Tee.png', '', 8, 0, '', 'SU_28', 1, ''),
(215, 92, 93, 1, 'Ultimate Splash Tee', 2500, 10, '', '', '', '11931Splash T-Shirt 01 White 02.jpg', '', 30, 0, '', 'SU_30', 2, ''),
(216, 92, 93, 1, 'Splash Camo Tee', 2500, 10, '', '', '', '48460Splash T-Shirt 01 White.jpg', '', 10, 0, '', 'SU_31', 2, ''),
(217, 92, 93, 1, 'Splash Camo Tee', 2500, 10, '', '', '', '41531t shit black 06.jpeg', '', 30, 0, '', 'SU_32', 1, ''),
(227, 92, 93, 1, 'Legends Tee ALI', 2800, 10, '', '', '', '90204SP-07.jpg', '', 58, 0, '', 'SU_38', 1, ''),
(228, 92, 93, 1, 'Splash Vibe Tee', 2499, 10, '', '', '', '26285SP-03.jpg', '', 59, 0, '', 'SU_39', 1, ''),
(229, 92, 93, 1, 'Legends Tee Mike Tyson', 2800, 10, '', '', '', '72287SP-13.jpg', '', 59, 0, '', 'SU_40', 1, ''),
(230, 92, 93, 1, 'Splash T Shirt 04', 2499, 10, '', '', '', '73257SP-01.jpg', '', 60, 0, '', 'SU_41', 1, ''),
(231, 92, 93, 1, 'Legends Tee Khabib', 2800, 10, '', '', '', '21576SP-16.jpg', '', 60, 0, '', 'SU_42', 1, ''),
(232, 92, 93, 1, 'Legends Tee Khabib', 2800, 10, '', '', '', '609SP-10.jpg', '', 60, 0, '', 'SU_43', 1, ''),
(233, 92, 93, 1, 'Splash Camo Vibe Tee', 2499, 10, '', '', '', '69009SP-05.jpg', '', 60, 0, '', 'SU_44', 1, ''),
(234, 92, 93, 1, 'Legends Tee Khabib', 2800, 10, '', '', '', 'Legends Tee Khabib.png', '', 60, 0, '', 'SU_45', 1, ''),
(235, 92, 93, 1, 'Legends Tee Mike Tyson', 2800, 10, '', '', '', 'Legends Tee Mike Tyson.png', '', 60, 0, '', 'SU_45', 1, ''),
(236, 92, 93, 1, 'Independence Tee', 2499, 10, '', '', '', '9404510.jpg', '', 55, 0, '', 'SU_46', 1, ''),
(237, 92, 93, 1, 'Legends Tee Khabib', 2800, 10, '', '', '', '84399.jpg', '', 60, 0, '', 'SU_47', 1, ''),
(238, 92, 93, 1, 'Splash Camo Vibe Tee', 2499, 10, '', '', '', '15226.jpg', '', 58, 0, '', 'SU_45', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sm_products_colors`
--

CREATE TABLE `sm_products_colors` (
  `pc_id` int(11) NOT NULL,
  `pc_pro_id` int(11) NOT NULL,
  `pc_name` varchar(25) NOT NULL,
  `pc_code` varchar(10) NOT NULL,
  `pc_size` text NOT NULL,
  `pc_qty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_products_colors`
--

INSERT INTO `sm_products_colors` (`pc_id`, `pc_pro_id`, `pc_name`, `pc_code`, `pc_size`, `pc_qty`) VALUES
(250, 182, 'Yellow', '#000000', 'One Size', '16'),
(252, 184, 'Dust Brown', '#c6ad91', 'One Size', '16'),
(253, 185, 'Black', '#000000', 'One Size', '16'),
(254, 186, 'Black', '#000000', 'One Size', '15'),
(255, 187, 'Black', '#000000', 'One Size', '16'),
(257, 189, 'Red', '#ff0000', 'One Size', '16'),
(258, 190, 'Black', '#000000', 'One Size', '16'),
(259, 191, 'Gray', '#808080', 'One Size', '16'),
(261, 193, 'Gray', '#9c9c9c', 'One Size', '15'),
(262, 194, 'Black', '#000000', 'One Size', '15'),
(263, 195, 'Yellow', '#f0e800', 'One Size', '16'),
(269, 189, 'Gray', '#757575', 'One Size', '16'),
(271, 200, 'Grey', '#8f8f8f', 'One Size', '16'),
(272, 200, 'Black', '#000000', 'One Size', '15'),
(274, 180, 'black', '#000000', 'One size', '16'),
(279, 202, 'Black', '#000000', 'One Size', '16'),
(280, 203, 'Black', '#000000', 'One Size', '16'),
(281, 204, 'Black', '#000000', 'One Size', '16'),
(285, 208, 'Black', '#000000', 'One Size', '16'),
(301, 216, 'White', '#ffffff', 'M_ L_ XL', '10_10_5'),
(303, 213, 'Black', '#000000', 'M_ L_ XL', '10_9_9'),
(304, 212, 'Black', '#000000', 'M_ L_ XL', '10_10_10'),
(305, 210, 'Black', '#000000', 'M_ L_ XL', '10_10_10'),
(306, 215, 'White', '#ffffff', 'M_L_XL', '10_10_10'),
(308, 217, 'Black', '#000000', 'M_ L_ XL', '10_10_10'),
(309, 219, 'Black', '#000000', 'M_L_XL', '25_23_25'),
(310, 220, 'White', '#ffffff', 'M_L_XL', '25_25_25'),
(311, 221, 'Black', '#000000', 'No Size', '100'),
(312, 222, 'Black', '#000000', 'No Size', '18'),
(313, 223, 'black', '#000000', 'No Size', '20'),
(314, 224, 'Red', '#eb0000', 'One Size', '20'),
(315, 225, 'Green', '#4d8964', 'One Size', '20'),
(316, 226, 'Gray', '#8c8c8c', 'One Size', '20'),
(317, 227, 'Black', '#000000', 'M_L_XL', '18_20_20'),
(318, 228, 'Black', '#000000', 'M_L_XL', '20_19_20'),
(319, 229, 'Black', '#000000', 'M_L_XL', '19_20_20'),
(320, 230, 'Black ', '#000000', 'M_L_XL', '20_20_20'),
(321, 231, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(322, 232, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(323, 233, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(324, 234, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(325, 235, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(326, 236, 'Black', '#000000', 'M_L_XL', '16_19_20'),
(327, 237, 'Black', '#000000', 'M_L_XL', '20_20_20'),
(328, 238, 'Black', '#000000', 'M_L_XL', '20_18_20'),
(330, 205, 'Black', '#000000', 'M_L', '10_10'),
(334, 209, 'Black', '#000000', 'M_L', '10_9'),
(335, 206, 'Black', '#000000', 'L_XL', '10_10'),
(336, 207, 'Black', '#000000', 'L_XL', '10_10'),
(339, 191, 'Black', '#000000', 'One Size', '16'),
(342, 242, 'Black', '#000000', 'One Siz', '10');

-- --------------------------------------------------------

--
-- Table structure for table `sm_products_images`
--

CREATE TABLE `sm_products_images` (
  `img_id` int(11) NOT NULL,
  `img_pro_id` int(11) NOT NULL,
  `img_link` varchar(200) NOT NULL,
  `img_color` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_products_images`
--

INSERT INTO `sm_products_images` (`img_id`, `img_pro_id`, `img_link`, `img_color`) VALUES
(99, 148, '597153540416_CLOSEUP1.webp', ''),
(100, 149, '713813540847_BACK.webp', ''),
(101, 149, '477143540847_CLOSEUP1.webp', ''),
(102, 88, '76055Flashtech blue 2.png', ''),
(103, 88, '51143Flashtech Grey.png', ''),
(104, 88, '44104Flashtech Grey 2.png', ''),
(106, 87, '20751Flashtech polo 2.png', ''),
(113, 120, '48860Serengeti Jacket Haselnut 2.png', ''),
(109, 153, '83923Flank Winbloc Jacket - Smoked Pearl 2.png', ''),
(110, 152, '14328Extrelle Active EVO Jacket W - Green 2.png', ''),
(180, 151, '36452B Active EVO Jacket Green.png', ''),
(112, 23, '85372Alpine 2.png', ''),
(114, 120, '54665Serengeti Jacket Haselnut 3.png', ''),
(115, 120, '8944Serengeti Jacket Green.png', ''),
(116, 120, '36314Serengeti Jacket Green 2.png', ''),
(117, 120, '83485Serengeti Jacket Green 3.png', ''),
(120, 86, '26367Field Patrol Bag - Black 2.png', ''),
(119, 97, '47961Multipurpose backpack- Green 2.png', ''),
(121, 86, '20701Field Patrol Bag - Black 3.png', ''),
(122, 86, '24246Field Patrol Bag - Coyote Brown.png', ''),
(123, 86, '28690Field Patrol Bag - Coyote Brown 2.png', ''),
(124, 86, '2570Field Patrol Bag - Wold grey.png', ''),
(125, 86, '74106Field Patrol Bag - Wold grey 2.png', ''),
(126, 109, '61246Uniform Pro 20 20 - Black & Grey 2.png', ''),
(127, 109, '9487Uniform Pro 20 20 - Black & Grey 3.png', ''),
(275, 161, '48395Levesque Zip.png', ''),
(129, 109, '9778Uniform Pro 20 20 - Black & Grey 4.png', ''),
(130, 109, '6850Uniform Pro 20 20 - Black & Grey 5.png', ''),
(131, 109, '89267Uniform Pro 20 20 - Blue Total Eclipse & Blue Royal.png', ''),
(132, 109, '61502Uniform Pro 20 20 - Blue Total Eclipse & Blue Royal 2.png', ''),
(135, 27, '68237Screenshot_2023-11-13_125746.png', ''),
(136, 45, '11760Windshell Vest Blue .png', ''),
(139, 45, '69030Windshell vest -Green.png', ''),
(140, 41, '58579Washed LP Bpack -2.png', ''),
(141, 41, '5318Washed LP Bpack -3.png', ''),
(142, 41, '31816Washed LP Bpack -4.png', ''),
(143, 127, '62032Vela trolley 2.png', ''),
(144, 127, '24172Vela trolley 3.png', ''),
(145, 127, '33952Vela trolley 4.png', ''),
(146, 127, '92114Vela trolley 5.png', ''),
(147, 127, '76581Vela trolley 6.png', ''),
(148, 127, '95478Vela trolley 7.png', ''),
(149, 127, '20682Vela trolley 8.png', ''),
(152, 126, '42336Vela Backpack 2.png', ''),
(151, 127, '51763Vela trolley 9.png', ''),
(153, 126, '3239Vela Backpack 3.png', ''),
(154, 126, '66291Vela Backpack 4.png', ''),
(174, 159, '7588311.webp', ''),
(173, 159, '26502', ''),
(172, 159, '106727.webp', ''),
(167, 159, '426712.webp', ''),
(168, 159, '926513.webp', ''),
(169, 159, '56014.webp', ''),
(170, 159, '859665.webp', ''),
(171, 159, '91016.webp', ''),
(175, 159, '9483822.webp', ''),
(176, 159, '9969333.webp', ''),
(181, 151, '34882B Active Evo Jacket 3.png', ''),
(178, 160, '87814r2.webp', ''),
(179, 1, '9133292X Performance  2.png', ''),
(182, 151, '12205B Active EVO jacket 4.png', ''),
(183, 151, '85266B Active Evo Jacket - Brown.png', ''),
(184, 113, '8569Windshield Shooting Jacket 2.png', ''),
(185, 113, '62931Windshield Shooting Jacket 3.png', ''),
(186, 113, '71414Windshield Shooting Jacket 4.png', ''),
(187, 108, '2933Teal Jacket 2.png', ''),
(188, 108, '17775Teal Jacket 3.png', ''),
(189, 108, '59823Teal Jacket 4.png', ''),
(196, 123, '238154.webp', ''),
(193, 123, '433241.webp', ''),
(194, 123, '388532.webp', ''),
(195, 123, '340523.webp', ''),
(206, 78, '70098Echo Packable Jacket 2.png', ''),
(198, 90, '6692Hybrid Jungle Jacket 2.png', ''),
(199, 90, '95634Hybrid Jungle Jacket Haselnut 3.png', ''),
(200, 90, '91029Hybrid Jungle Jacket Haselnut 4.png', ''),
(201, 90, '11673Hybrid Jungle Jacket Green 1.png', ''),
(202, 90, '80740Hybrid Jungle Jacket Green 2.png', ''),
(203, 90, '4365Hybrid Jungle Jacket Green 3.png', ''),
(204, 90, '46094Hybrid Jungle Jacket Green 4.png', ''),
(205, 105, '2220322.webp', ''),
(207, 78, '40553Echo Packable Black 1.png', ''),
(208, 78, '3581Echo Packable Black 2.png', ''),
(209, 71, '49398BDU Field Jacket Olive Drab 2.png', ''),
(210, 71, '59194BDU Field Jacket Olive Drab 3.png', ''),
(211, 71, '10921BDU Field Jacket Olive Drab 4.png', ''),
(212, 71, '3705BDU Field Jacket Olive Drab 5.png', ''),
(213, 71, '77450BDU Field Jacket Olive Drab 6.png', ''),
(214, 87, '32126444.webp', ''),
(215, 71, '73255BDU Field Jacket Olive Drab 7.png', ''),
(216, 88, '831495555.webp', ''),
(217, 71, '67793BDU Field Jacket Smoked Pearl 1.png', ''),
(218, 71, '55387BDU Field Jacket Smoked Pearl 2.png', ''),
(219, 75, '89454a1.webp', ''),
(220, 75, '72414a2.webp', ''),
(221, 75, '27855a3.webp', ''),
(222, 71, '53539BDU Field Jacket Black 1.png', ''),
(223, 75, '37742a4.webp', ''),
(224, 71, '92667BDU Field Jacket Black 2.png', ''),
(225, 74, '95458q4.webp', ''),
(226, 74, '28066q5.webp', ''),
(227, 74, '62424q1.webp', ''),
(228, 74, '96387q2.webp', ''),
(229, 74, '96421q6.webp', ''),
(230, 74, '1490q7.webp', ''),
(231, 74, '56446', ''),
(232, 69, '94588w1.webp', ''),
(233, 69, '71318w1.webp', ''),
(234, 69, '32242', ''),
(235, 67, '81822212.webp', ''),
(236, 70, '42218xx2.jpeg', ''),
(237, 70, '57457xx1.jpeg', ''),
(238, 70, '49231xxxx.jpeg', ''),
(253, 68, '51671Active WP Packable Jacket Black 1.png', ''),
(251, 68, '23631Active WP Packable Jacket Green 4.png', ''),
(252, 68, '35134Active WP Packable Jacket Green 5.png', ''),
(250, 68, '54629Active WP Packable Jacket Green 3.png', ''),
(249, 68, '8155Active WP Packable Jacket Green 2.png', ''),
(255, 68, '29798Active WP Packable Jacket Black 2.png', ''),
(256, 25, '85797Thorn resis HV Orange.png', ''),
(257, 25, '55920Thorn resis HV Orange 3.png', ''),
(258, 25, '15799Thorn resis HV Orange 4.png', ''),
(259, 25, '47992Thorn resis HV Orange 5.png', ''),
(264, 24, '42926Brown Bear Jacket 2.png', ''),
(261, 25, '11406Thorn resis HV Orange 6.png', ''),
(262, 25, '86666Thorn resis HV Orange 7.png', ''),
(263, 25, '20387Thorn resis HV Orange 8.png', ''),
(265, 22, '83332Fjeld 2.png', ''),
(266, 22, '89635Fjeld 3.png', ''),
(267, 22, '29680Fjeld 4.png', ''),
(268, 22, '49758Fjeld 5.png', ''),
(269, 22, '57258Fjeld 6.png', ''),
(283, 21, '13666GU1M0028820099_FRONT.png', 'Black'),
(272, 111, '64025Wildtrail Pro Vest 2.png', ''),
(274, 162, '45188Ibex Neoshell Pants 2.png', ''),
(284, 21, '60101GU1M0028820099_BACK.png', 'Black'),
(287, 120, '23485Serengeti Jacket Green.png', 'Green'),
(288, 120, '44484Serengeti Jacket Green 2.png', 'Green'),
(294, 120, '81655Serengeti Jacket Green 3.png', 'Green'),
(290, 120, '9101Serengeti Jacket Hazelnut 1.png', 'Hazelnut'),
(291, 120, '24394Serengeti Jacket Haselnut 2.png', 'Hazelnut'),
(292, 120, '5597Serengeti Jacket Haselnut 3.png', 'Hazelnut'),
(295, 102, '66834Serengeti Sport Pants Green 2.png', 'Green'),
(296, 102, '59981Serengeti Sport Pants Green 3.png', 'Green'),
(297, 100, '66022Serengeti Cargo Pants Green 2.png', 'Green'),
(298, 73, '81966BDU Filed Shorts Mojave desert 2 .png', 'Mojave Desert '),
(299, 73, '65355BDU Filed Shorts Smoked Pearl 1 .png', 'Smoked Pearl'),
(301, 73, '63689BDU Filed Shorts Smoked Pearl 2.png', 'Smoked Pearl'),
(302, 73, '88985BDU Filed Shorts Black 1 .png', 'Black'),
(303, 73, '96423BDU Filed Shorts Black 2.png', 'Black'),
(304, 72, '92796BDU Field Pants Mojave Desert 2.png', 'Mojave Desert'),
(305, 72, '36658BDU Field Pants Olive Drab 1.png', 'Olive Drab'),
(306, 72, '11485BDU Field Pants Olive Drab 2.png', 'Olive Drab'),
(315, 180, '84557Product 1 - Img 5.jpg', 'Black'),
(312, 180, '45432Product 1 - Img 2.jpg', 'Black'),
(313, 180, '83304Product 1 - Img 3.jpg', 'Black'),
(314, 180, '65834Product 1 - Img 4.jpg', 'Black'),
(316, 180, '50774Product 1 - Img 6.jpg', 'Black'),
(435, 219, '11881WhatsApp Image 2024-09-27 at 12.35.58 AM.jpeg', 'Black'),
(318, 182, '85873Product 3 - Img 2.jpg', 'Yellow'),
(382, 200, '6163422.jpg', 'Grey'),
(381, 200, '3672125.jpg', 'Grey'),
(380, 200, '9011726.jpg', 'Grey'),
(455, 222, '40460DSC08519.jpg', 'Black'),
(454, 222, '44678DSC08518.jpg', 'Black'),
(453, 222, '39268DSC08517.jpg', 'Black'),
(325, 187, '7994Product 8 - Img 2.jpg', 'Black'),
(326, 187, '35678Product 8 - Img 3.jpg', 'Black'),
(327, 187, '91769Product 8 - Img 4.jpg', 'Black'),
(328, 189, '55768Product 10 - Img 2.jpg', 'Red'),
(329, 189, '67184Product 10 - Img 3.jpg', 'Red'),
(330, 189, '77019Product 10 - Img 4.jpg', 'Red'),
(331, 190, '95245Product 11 - Img 1.jpg', 'Black'),
(332, 190, '61550Product 11 - Img 2.jpg', 'Black'),
(333, 190, '48326Product 11 - Img 3.jpg', 'Black'),
(334, 191, '79973Product 12 - Img 1.jpg', 'Gray'),
(335, 191, '14501Product 12 - Img 3.jpg', 'Gray'),
(437, 203, '1973WhatsApp Image 2024-09-27 at 3.32.27 AM.jpeg', 'Black'),
(393, 202, '3011004.jpg', 'Black'),
(438, 202, '54499WhatsApp Image 2024-09-27 at 3.13.29 AM (1).jpeg', 'Black'),
(391, 202, '1795302.jpg', 'Black'),
(340, 193, '64678Product 14 - Img 1.jpg', 'Gray'),
(341, 193, '69197Product 14 - Img 3.jpg', 'Gray'),
(342, 193, '65447Product 14 - Img 4.jpg', 'Gray'),
(343, 194, '20187Product 15 - Img 2.jpg', 'Black'),
(344, 194, '37018Product 15 - Img 3.jpg', 'Black'),
(345, 194, '5248Product 15 - Img 4.jpg', 'Black'),
(346, 195, '58017Product 16 - Img 2.jpg', 'Yellow'),
(347, 195, '69083Product 16 - Img 3.jpg', 'Yellow'),
(348, 195, '18364Product 16 - Img 4.jpg', 'Yellow'),
(510, 191, '5237804.jpg', 'Black'),
(509, 191, '1455703.jpg', 'Black'),
(508, 191, '9130902.jpg', 'Black'),
(507, 191, '2431101.jpg', 'Black'),
(370, 189, '3075789249Product 18 - Img 5.jpg', 'Gray'),
(371, 189, '941292623Product 18 - Img 1.jpg', 'Gray'),
(372, 189, '9518817675Product 18 - Img 3.jpg', 'Gray'),
(373, 189, '339344387Product 18 - Img 4.jpg', 'Gray'),
(379, 200, '1355021.jpg', 'Grey'),
(383, 200, '3162523.jpg', 'Grey'),
(384, 200, '8283227.jpg', 'Black'),
(385, 200, '3275228.jpg', 'Black'),
(386, 200, '4437529.jpg', 'Black'),
(387, 200, '1042830.jpg', 'Black'),
(388, 200, '9447730.jpg', 'Black'),
(389, 200, '2983831.jpg', 'Black'),
(395, 203, '1262707.jpg', 'Black'),
(396, 206, '9409103.jpg', 'Black'),
(397, 206, '7281402.jpg', 'Black'),
(398, 207, '5699902.jpg', 'Black'),
(399, 207, '8443603.jpg', 'Black'),
(400, 207, '8107504.jpg', 'Black'),
(411, 208, '46919splash 2.jpg', 'Black'),
(410, 208, '96453splash 1.jpg', 'Black'),
(414, 205, '57336splash 7.jpg', 'Black'),
(413, 205, '37831splash 6.jpg', 'Black'),
(407, 204, '9571602.jpg', 'Black'),
(408, 204, '9888703.jpg', 'Black'),
(409, 204, '8638704.jpg', 'Black'),
(412, 208, '55564splash 4.jpg', 'Black'),
(415, 205, '41332splash 8.jpg', 'Black'),
(416, 209, '3821502.jpg', 'Black'),
(417, 209, '2971503.jpg', 'Black'),
(420, 210, '57784Splash T-Shirt 02 Black 03.jpg', 'Black'),
(431, 217, '47708t shirt black 06.jpeg', 'Black'),
(428, 212, '83832Splash T-Shirt 01 Black.jpg', 'Black'),
(429, 213, '27569Splash T-Shirt 01 Black 04.jpg', 'Black'),
(426, 215, '26994Splash T-Shirt 02 White 02.jpg', 'White'),
(425, 216, '6122Splash T-Shirt 02 White.jpg', 'White'),
(436, 220, '61787WhatsApp Image 2024-09-27 at 12.35.57 AM.jpeg', 'White'),
(442, 222, '76460DSC08496.jpg', 'Black'),
(440, 221, '38585WhatsApp Image 2024-09-27 at 4.55.02 AM.jpeg', 'Black'),
(441, 221, '94824WhatsApp Image 2024-09-27 at 4.55.03 AM.jpeg', 'Black'),
(443, 222, '12246DSC08499.jpg', 'Black'),
(444, 222, '40771DSC08502.jpg', 'Black'),
(445, 222, '10731DSC08503.jpg', 'Black'),
(446, 222, '2054DSC08504(1).jpg', 'Black'),
(447, 222, '8232DSC08504.jpg', 'Black'),
(448, 222, '32647DSC08506.jpg', 'Black'),
(449, 222, '90865DSC08509.jpg', 'Black'),
(450, 222, '43433DSC08510.jpg', 'Black'),
(451, 222, '41543DSC08511.jpg', 'Black'),
(452, 222, '71127DSC08516.jpg', 'Black'),
(456, 222, '832DSC08520.jpg', 'Black'),
(457, 222, '39802DSC08521.jpg', 'Black'),
(458, 222, '42715DSC08523.jpg', 'Black'),
(459, 223, '8850801.jpg', 'black'),
(460, 223, '343503.jpg', 'black'),
(461, 223, '9020304.jpg', 'black'),
(462, 224, '4969520.jpg', 'Red'),
(463, 224, '8312619.jpg', 'Red'),
(464, 224, '5289818.jpg', 'Red'),
(465, 224, '1636917.jpg', 'Red'),
(466, 224, '5726816.jpg', 'Red'),
(467, 224, '9996125.jpg', 'Red'),
(468, 224, '3005023.jpg', 'Red'),
(470, 225, '7334514.jpg', 'Green'),
(471, 225, '8463313.jpg', 'Green'),
(472, 225, '1121512.jpg', 'Green'),
(473, 225, '2948611.jpg', 'Green'),
(474, 225, '7330010.jpg', 'Green'),
(475, 225, '197409.jpg', 'Green'),
(476, 225, '564038.jpg', 'Green'),
(477, 226, '649057.jpg', 'Gray'),
(478, 226, '40086.jpg', 'Gray'),
(479, 226, '41645.jpg', 'Gray'),
(480, 226, '229424.jpg', 'Gray'),
(481, 226, '129633.jpg', 'Gray'),
(482, 226, '562072.jpg', 'Gray'),
(483, 226, '542061.jpg', 'Gray'),
(484, 226, '2422827.jpg', 'Gray'),
(486, 226, '52566WhatsApp Image 2024-10-10 at 5.17.12 AM (4).jpeg', 'Gray'),
(487, 225, '24842WhatsApp Image 2024-10-10 at 5.17.12 AM (1).jpeg', 'Green'),
(491, 224, '87041WhatsApp Image 2024-10-10 at 5.17.12 AM (5).jpeg', 'Red'),
(490, 224, '76002WhatsApp Image 2024-10-10 at 5.17.12 AM (2).jpeg', 'Red'),
(492, 227, '69112SP-08.jpg', 'Black'),
(503, 227, '40918SP-09.jpg', 'Black'),
(494, 228, '59804SP-04.jpg', 'Black'),
(495, 229, '32964SP-14.jpg', 'Black'),
(504, 229, '95252SP-15.jpg', 'Black'),
(497, 230, '6800SP-02.jpg', 'Black '),
(498, 231, '13031SP-17.jpg', 'Black'),
(506, 232, '94912SP-12.jpg', 'Black'),
(500, 232, '25432SP-11.jpg', 'Black'),
(501, 232, '65117SP-10.jpg', 'Black'),
(502, 233, '81226SP-06.jpg', 'Black'),
(505, 231, '29205SP-18.jpg', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `sm_products_sizes`
--

CREATE TABLE `sm_products_sizes` (
  `ps_id` int(11) NOT NULL,
  `ps_proid` int(11) NOT NULL,
  `ps_name` varchar(150) NOT NULL,
  `ps_serial_no` varchar(50) NOT NULL,
  `ps_price` decimal(12,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_products_sizes`
--

INSERT INTO `sm_products_sizes` (`ps_id`, `ps_proid`, `ps_name`, `ps_serial_no`, `ps_price`) VALUES
(1, 20, 'S - Small', '', 44300.00),
(890, 123, 'L - Large', '', 21750.00),
(889, 123, 'M - Medium', '', 21750.00),
(888, 123, 'S - Small', '', 21750.00),
(887, 108, 'XXL - Double Extra Large', '', 43700.00),
(7, 20, 'M - Medium', '', 30.00),
(678, 78, 'XL - Extra Large', '', 50900.00),
(670, 149, 'L - Large', '', 94900.00),
(848, 38, 'XL - Extra Large', '', 16799.00),
(616, 35, 'XXL - Double Extra Large', '', 18800.00),
(826, 42, 'XL - Extra Large', '', 23900.00),
(668, 151, 'XL - Extra Large', '', 45500.00),
(667, 151, 'L - Large', '', 45500.00),
(665, 151, 'S - Small', '', 45500.00),
(666, 151, 'M - Medium', '', 45500.00),
(885, 113, 'XXL - Double Extra Large', '', 48799.00),
(884, 113, 'XL - Extra Large', '', 48799.00),
(881, 152, 'XL - Extra Large', '', 62999.00),
(880, 152, 'L - Large', '', 62999.00),
(879, 152, 'M - Medium', '', 62999.00),
(875, 161, 'L - Large', '', 21999.00),
(1005, 160, 'XXL - Double Extra Large', '', 17000.00),
(1004, 160, 'XL - Extra Large', '', 17000.00),
(59, 54, 'M - Medium', '', 7800.00),
(60, 54, 'L - Large', '', 7800.00),
(61, 54, 'XL - Extra Large', '', 7800.00),
(62, 54, 'XXL - Double Extra Large', '', 7800.00),
(63, 55, 'M - Medium', '', 7800.00),
(64, 55, 'L - Large', '', 7800.00),
(65, 55, 'XL - Extra Large', '', 7800.00),
(66, 55, 'XXL - Double Extra Large', '', 7800.00),
(67, 56, 'M - Medium', '', 15000.00),
(68, 56, 'L - Large', '', 15000.00),
(69, 56, 'XL - Extra Large', '', 15000.00),
(70, 56, 'XXL - Double Extra Large', '', 15000.00),
(71, 57, 'M - Medium', '', 29000.00),
(72, 57, 'L - Large', '', 29000.00),
(73, 57, 'XL - Extra Large', '', 29000.00),
(74, 57, 'XXL - Double Extra Large', '', 29000.00),
(75, 58, 'M - Medium', '', 14500.00),
(76, 58, 'L - Large', '', 14500.00),
(77, 58, 'XL - Extra Large', '', 14500.00),
(78, 58, 'XXL - Double Extra Large', '', 14500.00),
(79, 59, 'M - Medium', '', 15000.00),
(80, 59, 'L - Large', '', 15000.00),
(81, 59, 'XXL - Double Extra Large', '', 15000.00),
(82, 60, 'M - Medium', '', 15000.00),
(83, 60, 'L - Large', '', 15000.00),
(84, 60, 'XL - Extra Large', '', 15000.00),
(85, 60, 'XXL - Double Extra Large', '', 15000.00),
(834, 61, 'XXL - Double Extra Large', '', 17100.00),
(833, 61, 'XL - Extra Large', '', 17100.00),
(832, 61, 'L - Large', '', 17100.00),
(831, 61, 'M - Medium', '', 17100.00),
(764, 95, 'XXL - Double Extra Large', '', 21299.00),
(772, 88, 'XXL - Double Extra Large', '', 14399.00),
(767, 87, 'XL - Extra Large', '', 18299.00),
(691, 45, 'M - Medium', '', 21160.00),
(914, 68, 'XXL - Double Extra Large', '', 43700.00),
(917, 25, 'XXL - Double Extra Large', '', 97300.00),
(916, 25, 'XL - Extra Large', '', 97300.00),
(915, 25, 'M - Medium', '', 97300.00),
(690, 45, 'S - Small', '', 21160.00),
(684, 27, 'L - Large', '', 637215.00),
(685, 27, 'XL - Extra Large', '', 637215.00),
(686, 26, 'XL - Extra Large', '', 605800.00),
(128, 29, 'S - Small', '', 73200.00),
(129, 29, 'M - Medium', '', 73200.00),
(130, 29, 'L - Large', '', 73200.00),
(860, 159, 'XXL - Double Extra Large', '', 44499.00),
(754, 31, 'L - Large', '', 39499.00),
(753, 31, 'M - Medium', '', 39499.00),
(752, 31, 'S - Small', '', 39499.00),
(694, 45, 'XXL - Double Extra Large', '', 21160.00),
(663, 33, 'L - Large', '', 47000.00),
(662, 33, 'M - Medium', '', 47000.00),
(859, 159, 'XL - Extra Large', '', 44499.00),
(858, 159, 'L - Large', '', 44499.00),
(749, 32, 'M - Medium', '', 37000.00),
(750, 32, 'L - Large', '', 37000.00),
(751, 32, 'XL - Extra Large', '', 37000.00),
(615, 35, 'XL - Extra Large', '', 18800.00),
(614, 35, 'L - Large', '', 18800.00),
(613, 35, 'M - Medium', '', 18800.00),
(620, 36, 'XL - Extra Large', '', 18800.00),
(619, 36, 'L - Large', '', 18800.00),
(618, 36, 'M - Medium', '', 18800.00),
(617, 36, 'S - Small', '', 18800.00),
(624, 37, 'XL - Extra Large', '', 20900.00),
(623, 37, 'L - Large', '', 20900.00),
(622, 37, 'M - Medium', '', 20900.00),
(621, 37, 'S - Small', '', 20900.00),
(847, 38, 'L - Large', '', 16799.00),
(846, 38, 'M - Medium', '', 16799.00),
(845, 38, 'S - Small', '', 16799.00),
(809, 39, 'XL - Extra Large', '', 205000.00),
(808, 39, 'L - Large', '', 205000.00),
(807, 39, 'M - Medium', '', 205000.00),
(806, 39, 'S - Small', '', 205000.00),
(825, 42, 'L - Large', '', 23900.00),
(824, 42, 'M - Medium', '', 23900.00),
(823, 42, 'S - Small', '', 23900.00),
(830, 43, 'XL - Extra Large', '', 36600.00),
(829, 43, 'L - Large', '', 36600.00),
(827, 43, 'S - Small', '', 36600.00),
(828, 43, 'M - Medium', '', 36600.00),
(882, 113, 'S - Small', '', 48799.00),
(883, 113, 'M - Medium', '', 48799.00),
(194, 0, '', '', 0.00),
(939, 162, 'L - Large', '', 86000.00),
(938, 162, 'M - Medium', '', 86000.00),
(876, 161, 'XXL - Double Extra Large', '', 21999.00),
(874, 161, 'M - Medium', '', 21999.00),
(1001, 160, 'S - Small', '', 17000.00),
(1002, 160, 'M - Medium', '', 17000.00),
(498, 143, 'L - Large', '', 32000.00),
(497, 143, 'M - Medium', '', 32000.00),
(496, 143, 'S - Small', '', 32000.00),
(1003, 160, 'L - Large', '', 17000.00),
(857, 159, 'M - Medium', '', 44499.00),
(222, 64, 'M - Medium', '', 18000.00),
(223, 64, 'L - Large', '', 18000.00),
(224, 64, 'XL - Extra Large', '', 18000.00),
(225, 64, 'XXL - Double Extra Large', '', 18000.00),
(226, 65, 'M - Medium', '', 19000.00),
(227, 65, 'L - Large', '', 19000.00),
(228, 65, 'XL - Extra Large', '', 19000.00),
(229, 65, 'XXL - Double Extra Large', '', 19000.00),
(230, 66, 'M - Medium', '', 10000.00),
(231, 66, 'L - Large', '', 10000.00),
(232, 66, 'XL - Extra Large', '', 10000.00),
(233, 66, 'XXL - Double Extra Large', '', 10000.00),
(726, 93, 'XXL - Double Extra Large', '', 41975.00),
(906, 67, 'XXL - Double Extra Large', '', 7999.00),
(913, 68, 'XL - Extra Large', '', 43700.00),
(912, 68, 'L - Large', '', 43700.00),
(792, 69, 'XXL - Double Extra Large', '', 16499.00),
(791, 69, 'XL - Extra Large', '', 16499.00),
(790, 69, 'L - Large', '', 16499.00),
(789, 69, 'M - Medium', '', 16499.00),
(797, 70, 'XXL - Double Extra Large', '', 13799.00),
(796, 70, 'XL - Extra Large', '', 13799.00),
(795, 70, 'L - Large', '', 13799.00),
(793, 70, 'S - Small', '', 13799.00),
(794, 70, 'M - Medium', '', 13799.00),
(743, 72, 'XL - Extra Large', '', 32999.00),
(744, 72, 'XXL - Double Extra Large', '', 32999.00),
(742, 72, 'L - Large', '', 32999.00),
(741, 72, 'M - Medium', '', 32999.00),
(734, 73, 'XL - Extra Large', '', 18900.00),
(733, 73, 'L - Large', '', 18900.00),
(732, 73, 'M - Medium', '', 18900.00),
(731, 73, 'S - Small', '', 18900.00),
(787, 74, 'XXL - Double Extra Large', '', 12499.00),
(786, 74, 'XL - Extra Large', '', 12499.00),
(784, 74, 'M - Medium', '', 12499.00),
(785, 74, 'L - Large', '', 12499.00),
(781, 75, 'XL - Extra Large', '', 9799.00),
(780, 75, 'L - Large', '', 9799.00),
(779, 75, 'M - Medium', '', 9799.00),
(778, 75, 'S - Small', '', 9799.00),
(645, 154, 'S - Small', '', 12500.00),
(669, 149, 'M - Medium', '', 94900.00),
(777, 77, 'XXL - Double Extra Large', '', 11999.00),
(776, 77, 'XL - Extra Large', '', 11999.00),
(775, 77, 'L - Large', '', 11999.00),
(773, 77, 'S - Small', '', 11999.00),
(774, 77, 'M - Medium', '', 11999.00),
(286, 79, 'M - Medium', '', 0.00),
(287, 79, 'L - Large', '', 0.00),
(288, 79, 'XL - Extra Large', '', 0.00),
(821, 80, 'L - Large', '', 3999.00),
(820, 80, 'M - Medium', '', 3999.00),
(819, 81, 'XL - Extra Large', '', 4800.00),
(818, 81, 'L - Large', '', 4800.00),
(817, 81, 'M - Medium', '', 4800.00),
(813, 82, 'L - Large', '', 6199.00),
(812, 82, 'M - Medium', '', 6199.00),
(816, 83, 'XL - Extra Large', '', 4999.00),
(815, 83, 'L - Large', '', 4999.00),
(814, 83, 'M - Medium', '', 4999.00),
(766, 87, 'L - Large', '', 18299.00),
(765, 87, 'M - Medium', '', 18299.00),
(771, 88, 'XL - Extra Large', '', 14399.00),
(770, 88, 'L - Large', '', 14399.00),
(769, 88, 'M - Medium', '', 14399.00),
(768, 88, 'S - Small', '', 14399.00),
(677, 78, 'L - Large', '', 50900.00),
(658, 155, 'M - Medium', '', 12500.00),
(646, 154, 'M - Medium', '', 12500.00),
(647, 154, 'L - Large', '', 12500.00),
(512, 144, 'Size: L - Large', '', 1234.00),
(511, 144, 'Size: M - Medium', '', 1234.00),
(510, 144, 'Size: S - Small', '', 1234.00),
(729, 91, 'L - Large', '', 32085.00),
(728, 91, 'M - Medium', '', 32085.00),
(727, 91, 'S - Small', '', 32085.00),
(759, 92, 'XL - Extra Large', '', 31999.00),
(758, 92, 'L - Large', '', 31999.00),
(757, 92, 'M - Medium', '', 31999.00),
(756, 92, 'S - Small', '', 31999.00),
(725, 93, 'XL - Extra Large', '', 41975.00),
(724, 93, 'L - Large', '', 41975.00),
(723, 93, 'S - Small', '', 41975.00),
(763, 95, 'XL - Extra Large', '', 21299.00),
(762, 95, 'L - Large', '', 21299.00),
(761, 95, 'M - Medium', '', 21299.00),
(760, 95, 'S - Small', '', 21299.00),
(788, 69, 'S - Small', '', 16499.00),
(783, 74, 'S - Small', '', 12499.00),
(841, 98, 'XL - Extra Large', '', 7999.00),
(840, 98, 'L - Large', '', 7999.00),
(839, 98, 'M - Medium', '', 7999.00),
(838, 98, 'S - Small', '', 7999.00),
(844, 99, 'XXL - Double Extra Large', '', 10399.00),
(842, 99, 'M - Medium', '', 10399.00),
(843, 99, 'XL - Extra Large', '', 10399.00),
(740, 72, 'S - Small', '', 32999.00),
(730, 91, 'XL - Extra Large', '', 32085.00),
(703, 111, 'XL - Extra Large', '', 32099.00),
(905, 67, 'XL - Extra Large', '', 7999.00),
(904, 67, 'M - Medium', '', 7999.00),
(903, 67, 'S - Small', '', 7999.00),
(837, 104, 'XL - Extra Large', '', 8999.00),
(836, 104, 'L - Large', '', 8999.00),
(835, 104, 'M - Medium', '', 8999.00),
(745, 34, 'M - Medium', '', 69300.00),
(746, 34, 'L - Large', '', 69300.00),
(747, 34, 'XL - Extra Large', '', 69300.00),
(748, 34, 'XXL - Double Extra Large', '', 69300.00),
(676, 78, 'M - Medium', '', 50900.00),
(657, 155, 'S - Small', '', 12500.00),
(822, 80, 'XL - Extra Large', '', 3999.00),
(702, 111, 'L - Large', '', 32099.00),
(701, 111, 'M - Medium', '', 32099.00),
(700, 111, 'S - Small', '', 32099.00),
(711, 103, 'XL - Extra Large', '', 84199.00),
(710, 103, 'L - Large', '', 84199.00),
(709, 103, 'M - Medium', '', 84199.00),
(708, 103, 'S - Small', '', 84199.00),
(704, 110, 'S - Small', '', 25990.00),
(705, 110, 'L - Large', '', 25990.00),
(706, 110, 'XL - Extra Large', '', 25990.00),
(707, 110, 'XXL - Double Extra Large', '', 25990.00),
(811, 115, 'M - Medium', '', 7099.00),
(810, 115, 'S - Small', '', 7099.00),
(675, 119, 'L - Large', '', 33500.00),
(715, 122, 'XXL - Double Extra Large', '', 32000.00),
(692, 45, 'L - Large', '', 21160.00),
(886, 108, 'XL - Extra Large', '', 43700.00),
(782, 75, 'XXL - Double Extra Large', '', 9799.00),
(693, 45, 'XL - Extra Large', '', 21160.00),
(714, 122, 'XL - Extra Large', '', 32000.00),
(713, 122, 'L - Large', '', 32000.00),
(712, 122, 'S - Small', '', 32000.00),
(755, 31, 'XL - Extra Large', '', 39499.00),
(664, 33, 'XL - Extra Large', '', 47000.00),
(404, 128, 'S - Small', '', 1212.00),
(405, 129, 'S - Small', '', 7400.00),
(406, 129, 'M - Medium', '', 7400.00),
(407, 129, 'L - Large', '', 7400.00),
(408, 129, 'XL - Extra Large', '', 7400.00),
(409, 130, 'M - Medium', '', 7400.00),
(410, 130, 'L - Large', '', 7400.00),
(411, 130, 'XL - Extra Large', '', 7400.00),
(412, 136, 'M - Medium', '', 12.00),
(413, 136, 'M - Medium', '', 12.00),
(414, 137, 'S - Small', '', 12.00),
(415, 138, 'S - Small', '', 12.00),
(416, 138, 'XXL - Double Extra Large', '', 12.00),
(417, 139, 'S - Small', '', 12.00),
(418, 139, 'XXL - Double Extra Large', '', 12.00),
(419, 140, 'XL - Extra Large', '', 149.99),
(420, 140, 'XXL - Double Extra Large', '', 149.99),
(421, 140, 'XXXL - Triple Extra Large', '', 149.99),
(422, 141, 'XL - Extra Large', '', 149.99),
(423, 141, 'XXL - Double Extra Large', '', 149.99),
(424, 141, 'XXXL - Triple Extra Large', '', 149.99),
(911, 68, 'M - Medium', '', 43700.00),
(458, 142, 'L - Large', '', 29.99),
(457, 142, 'M - Medium', '', 29.99),
(891, 123, 'XL - Extra Large', '', 21750.00),
(892, 123, 'XXL - Double Extra Large', '', 21750.00),
(893, 90, 'S - Small', '', 48500.00),
(894, 90, 'M - Medium', '', 48500.00),
(895, 90, 'L - Large', '', 48500.00),
(896, 90, 'XL - Extra Large', '', 48500.00),
(897, 90, 'XXL - Double Extra Large', '', 48500.00),
(899, 105, 'XL - Extra Large', '', 30900.00),
(900, 71, 'M - Medium', '', 33800.00),
(901, 71, 'L - Large', '', 33800.00),
(902, 71, 'XL - Extra Large', '', 33800.00),
(918, 24, 'M - Medium', '', 55900.00),
(919, 24, 'L - Large', '', 55900.00),
(920, 24, 'XL - Extra Large', '', 55900.00),
(921, 24, 'XXL - Double Extra Large', '', 55900.00),
(922, 23, 'XXL - Double Extra Large', '', 75380.00),
(923, 23, 'XXXL - Triple Extra Large', '', 75380.00),
(924, 22, 'M - Medium', '', 121670.00),
(925, 22, 'L - Large', '', 121670.00),
(926, 22, 'XL - Extra Large', '', 121670.00),
(927, 22, 'XXL - Double Extra Large', '', 121670.00),
(928, 22, 'XXXL - Triple Extra Large', '', 121670.00),
(929, 21, 'XL - Extra Large', '', 50999.00),
(930, 109, 'S - Small', '', 33580.00),
(931, 109, 'M - Medium', '', 33580.00),
(932, 109, 'L - Large', '', 33580.00),
(933, 109, 'XL - Extra Large', '', 33580.00),
(934, 109, 'XXL - Double Extra Large', '', 33580.00),
(940, 162, 'XL - Extra Large', '', 86000.00);

-- --------------------------------------------------------

--
-- Table structure for table `sm_shoppingcart_items`
--

CREATE TABLE `sm_shoppingcart_items` (
  `sci_id` int(11) NOT NULL,
  `sci_order_id` varchar(100) NOT NULL,
  `sci_user_id` int(11) DEFAULT NULL,
  `sci_product_id` varchar(11) DEFAULT NULL,
  `sci_product_qty` int(11) DEFAULT NULL,
  `sci_sizeid` int(11) DEFAULT NULL,
  `sci_user_ip` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_shoppingcart_items`
--

INSERT INTO `sm_shoppingcart_items` (`sci_id`, `sci_order_id`, `sci_user_id`, `sci_product_id`, `sci_product_qty`, `sci_sizeid`, `sci_user_ip`) VALUES
(1, '92b6fbe0e785d7b08159a7c481c336dd', NULL, '', 6, 0, '39.50.49.113'),
(2, '92b6fbe0e785d7b08159a7c481c336dd', NULL, '23', 1, 114, '39.50.49.113'),
(3, '42866a1c3065dd39b847cd3062935e9f', NULL, '20', 8, 7, '82.132.219.31'),
(4, 'fdac3c02b72320a5fdd65e3d51868e0a', NULL, '', 0, 0, '139.135.36.66'),
(5, '246e3af7c34c3c6b9d189f89c040b1df', NULL, '29', 1, 1, '91.93.226.230'),
(119, '6f0a7446c5c9c51086e17d60acc2fe8c', NULL, '67', 2, 236, '115.186.130.18'),
(7, '80223c2fcf70604c06e78a45ba7b87ff', NULL, '', 1, 0, '206.84.132.151'),
(8, 'fea4da0a0e5aeee66bdc489d1e4fe670', NULL, '45', 12, 1, '119.73.104.73'),
(9, '17cf0c8ac45e277f60fb4b5f7248056e', NULL, '22', 1, 110, '39.50.94.4'),
(10, '80223c2fcf70604c06e78a45ba7b87ff', NULL, '20', 1, 1, '206.84.135.169'),
(11, '5bba185573b08b153b54255d4bf3737f', NULL, '20', 1, 1, '206.84.135.169'),
(12, '7e982c18e82a0df641faa86be166190c', NULL, '20', 1, 1, '206.84.135.169'),
(13, '938f7257bfa0c9361ed7f1c97aab42ab', NULL, '20', 1, 1, '206.84.135.169'),
(14, '97bcc5e68db01d11cc40a33929db45b3', NULL, '20', 1, 1, '154.192.14.138'),
(15, '57a4c9c1e1fbd03e37b4fac4b4a2f55a', NULL, '20', 1, 1, '206.84.134.83'),
(16, '32d879d77981556b1a459e9f38b004a0', NULL, '44', 8, 1, '182.189.104.234'),
(17, '826d9dad1b2458f90799a9eb2bc468cc', NULL, '23', 1, 1, '115.186.130.18'),
(18, 'e09923321dd445a9fa3f90bf23dd736b', NULL, '22', 1, 1, '115.186.130.18'),
(19, '6659e102e12d151f7d9995a2d15c1475', NULL, '', 53, 0, '154.192.14.43'),
(20, '13ffc91d045d69e6054f2eeb71cf00be', NULL, '21', 107, 1, '154.192.14.43'),
(22, '684f571b4fb2231cb3d47975521e0487', NULL, '33', 1, 140, '154.192.14.43'),
(23, '684f571b4fb2231cb3d47975521e0487', NULL, '20', 1, 7, '154.192.14.43'),
(24, '684f571b4fb2231cb3d47975521e0487', NULL, '39', 1, 166, '154.192.14.43'),
(25, '772bf403d803e94fb2f66bd41c99bcdd', NULL, '', 0, 0, '154.192.14.43'),
(26, '87bdc81bd829f3411627144f60976579', NULL, '20', 7, 1, '115.186.130.18'),
(27, '9f80c90a6f391d6403d72b508d37c943', NULL, '20', 1, 1, '115.186.130.18'),
(28, '9338f057619a4e0ffeda751aece07487', NULL, '47', 1, 185, '115.186.130.18'),
(29, 'c933d7c9b723feb9ca262bf480612e65', NULL, '25', 1, 120, '115.186.130.18'),
(30, '32b767c98282c9ea2f738dd062f97624', NULL, '', 3, 0, '119.73.97.51'),
(31, '6089d2b0a111f2074b12b6ab9d446e1d', NULL, '', 0, 0, '115.186.130.18'),
(34, '9c42861e2a806d0d4c5265e9ea4de0a7', NULL, '55', 1, 63, '115.186.130.18'),
(33, 'ddc3f02ff9b2badf18bec5ddbfc55d89', NULL, '', 2, 0, '206.84.137.66'),
(35, '9c42861e2a806d0d4c5265e9ea4de0a7', NULL, '21', 1, 105, '115.186.130.18'),
(36, '9c42861e2a806d0d4c5265e9ea4de0a7', NULL, '35', 1, 148, '115.186.130.18'),
(37, '0bdb4e3017d15789474c686d0526cd47', NULL, '', 2, 0, '115.186.130.18'),
(38, 'bbef8b3535e52cfac351027a706ced5a', NULL, '', 1, 0, '115.186.130.18'),
(39, 'fb0dd899c46ff6806f34d7804812c058', NULL, '32', 11, 141, '115.186.130.18'),
(40, 'e3611dec30491c9ba0a4ee6f8d27d0be', NULL, '54', 1, 59, '115.186.130.18'),
(41, 'e3611dec30491c9ba0a4ee6f8d27d0be', NULL, '44', 1, 8, '115.186.130.18'),
(42, 'e3611dec30491c9ba0a4ee6f8d27d0be', NULL, '60', 1, 82, '115.186.130.18'),
(43, 'e3611dec30491c9ba0a4ee6f8d27d0be', NULL, '22', 5, 109, '115.186.130.18'),
(44, '51457d923f182ca984684f27723ba046', NULL, '21', 3, 107, '115.186.130.18'),
(45, 'e39b34bbc90005fe535f1eacfa3e4a15', NULL, '45', 1, 12, '115.186.130.18'),
(46, '7c50363f6f69e858cd98c80c08a61d0f', NULL, '', 1, 0, '207.102.85.127'),
(47, '174f71e05e345328bdd90a76a4b28fb4', NULL, '', 3, 0, '206.84.149.53'),
(48, 'eece6b6f225be323e92467a16f038b08', NULL, '', 4, 0, '115.186.130.18'),
(49, '22dbe26a2718d98e748cd03d36b0efc5', NULL, '', 6, 0, '119.155.201.217'),
(50, '22dbe26a2718d98e748cd03d36b0efc5', NULL, '48', 2, 26, '119.155.201.217'),
(51, 'ed3599e99fc0cb318fdace8c83d5df6a', NULL, '', 0, 0, '119.73.97.1'),
(52, 'e68008d21dc5e34674c43519a17f01be', NULL, '', 4, 0, '39.42.92.143'),
(53, '95481385ddb81fc3eec2e6a4a7eeafac', NULL, '', 5, 0, '115.186.130.18'),
(54, '95481385ddb81fc3eec2e6a4a7eeafac', NULL, '30', 1, 131, '115.186.130.18'),
(55, '5df508893e0013a2a6d5307ba214a15c', NULL, '', 1, 0, '111.119.188.27'),
(56, 'cfe3bad73f8ee5d219345c922739d765', NULL, '44', 1, 9, '115.186.130.18'),
(57, 'cfe3bad73f8ee5d219345c922739d765', NULL, '36', 2, 154, '115.186.130.18'),
(58, '89fc30901d70efbf2e438f9c07c5483d', NULL, '31', 2, 134, '182.191.153.90'),
(59, '816e97e52297e00b54c99927a8667e01', NULL, '31', 3, 135, '182.191.150.49'),
(60, '816e97e52297e00b54c99927a8667e01', NULL, '', 0, 0, '182.191.150.49'),
(61, 'c80c5464ca6789bac32c81be41bfe5c9', NULL, '44', 1, 8, '103.255.6.88'),
(62, '784d0165660ba582b2471aa36b1c3dc7', NULL, '', 2, 0, '37.111.156.254'),
(63, '647e1bbe9eabe9d1d6407a0e6ef45993', NULL, '', 0, 0, '45.116.232.48'),
(64, 'cfe3bad73f8ee5d219345c922739d765', NULL, '25', 1, 119, '115.186.130.18'),
(65, '66efad8c27729a39a696da407235dc80', NULL, '', 1, 0, '115.186.130.18'),
(66, '38c061dc8563a9006f48652f77b372b6', NULL, '', 1, 0, '119.160.17.13'),
(67, 'e446c85ed9781ba6b8885a791875da2c', NULL, '29', 1, 128, '124.109.61.125'),
(68, '757225a18148692674ef5cd84852d6eb', NULL, '', 0, 0, '111.119.177.61'),
(69, '757225a18148692674ef5cd84852d6eb', NULL, '33', 1, 138, '111.119.177.61'),
(70, 'f1daf5a32891f3930693d0d69ffb7b81', NULL, '', 1, 0, '111.88.87.50'),
(71, 'cb66bc84b9357ee219c417b1f6dc4151', NULL, '', 4, 0, '115.186.130.18'),
(72, 'cb66bc84b9357ee219c417b1f6dc4151', NULL, '22', 1, 108, '115.186.130.18'),
(73, '571b942d570d4d5f55fd34e3e6c61dbc', NULL, '', 4, 0, '115.186.130.18'),
(74, '571b942d570d4d5f55fd34e3e6c61dbc', NULL, '20', 1, 1, '115.186.130.18'),
(75, '364033c3c87e735edac8223640bb8807', NULL, '45', 1, 13, '101.50.108.67'),
(76, '2c281f9fa21f1f344fc6bad94b29d0b2', NULL, '', 6, 0, '39.56.153.253'),
(77, '2c281f9fa21f1f344fc6bad94b29d0b2', NULL, '63', 1, 93, '39.56.153.253'),
(78, 'c8f16c4b9ab170fa44f1b2c46478489b', NULL, '', 2, 0, '115.186.130.18'),
(79, 'f621a18fd05143cf6ab1aacf017ff819', NULL, '', 1, 0, '206.84.133.113'),
(80, 'c8f16c4b9ab170fa44f1b2c46478489b', NULL, '20', 1, 1, '115.186.130.18'),
(81, '7f7374f89d43a6baf0ccf99b77abf880', NULL, '20', 1, 1, '115.186.130.18'),
(82, '2e673748da3af876e00b039749093c65', NULL, '', 0, 0, '154.192.32.109'),
(83, '61b1d6c9dee0d10e2a8b0d5f5eebe802', NULL, '', 2, 0, '115.186.130.18'),
(84, '8342c7cb57505c7a84cfe28cca82f5d6', NULL, '43', 1, 181, '59.103.204.221'),
(85, 'a9ec8cf4aae00cdb232f7f203a4499b9', NULL, '', 1, 0, '175.107.217.198'),
(86, '03cb7888e66e632cad6aac70acb70995', NULL, '', 0, 0, '115.186.130.18'),
(87, 'a3400d90bfe92f38f553b1049764fadb', NULL, '', 2, 0, '119.160.31.137'),
(88, '31136adb98db0b47df5278f75a547aa2', NULL, '25', 1, 118, '115.186.130.18'),
(89, 'aac785e2d1b15854207e2a35b2f02db6', NULL, '', 0, 0, '115.186.130.18'),
(90, 'aac785e2d1b15854207e2a35b2f02db6', NULL, '24', 1, 115, '115.186.130.18'),
(91, 'aac785e2d1b15854207e2a35b2f02db6', NULL, '30', 1, 131, '115.186.130.18'),
(92, '7fddb76c67ca8290d7040924b89035f1', NULL, '', 0, 0, '101.50.109.114'),
(93, '90c4566d8a1a78903d1676144d855896', NULL, '', 3, 0, '115.186.130.18'),
(94, '0a3f612d7d2b60388c917d68825a3d02', NULL, '', 1, 0, '115.186.130.18'),
(95, 'd9f2eb166e73ec6b775d427172cdddaa', NULL, '', 0, 0, '115.186.130.18'),
(96, '0a3f612d7d2b60388c917d68825a3d02', NULL, '69', 1, 242, '115.186.130.18'),
(97, '82575fced352d6b271ab54b62503b850', NULL, '', 0, 0, '119.73.97.33'),
(98, '60010dcd0b37b1ca04feee642656854e', NULL, '', 3, 0, '39.34.154.33'),
(99, '11478adb98b95ea1c29fb39b831825eb', NULL, '', 0, 0, '61.5.149.51'),
(100, '5b20fafd2eadfbbaf6d2b44843917f7f', NULL, '', 5, 0, '119.73.104.73'),
(101, '5b20fafd2eadfbbaf6d2b44843917f7f', NULL, '36', 1, 152, '119.73.104.73'),
(102, 'ed52b359c28addfe4c454046f36d636a', NULL, '', 0, 0, '115.186.130.18'),
(103, '97b87825063d63ed4cfd70f1d1019cc9', NULL, '', 2, 0, '115.186.130.18'),
(104, '97b87825063d63ed4cfd70f1d1019cc9', NULL, '48', 1, 26, '115.186.130.18'),
(105, 'f9468c5a15c66e0483a0377c286fd230', NULL, '', 5, 0, '115.186.130.18'),
(106, 'ed52b359c28addfe4c454046f36d636a', NULL, '130', 1, 409, '115.186.130.18'),
(107, 'ed52b359c28addfe4c454046f36d636a', NULL, '69', 1, 243, '115.186.130.18'),
(108, '59806f20a7097bd723afc3df82b686f2', NULL, '', 1, 0, '115.186.130.18'),
(109, '3d468495381746298de1452fcdba9c87', NULL, '', 0, 0, '206.84.131.77'),
(110, '63d4461f358546f2041dfda98b0c7682', NULL, '', 5, 0, '115.186.130.18'),
(111, '35e33d09492fdb673742f60d5d97988d', NULL, '21', 1, 107, '206.84.132.99'),
(112, 'cdf8598383d2a9a1348dce4509ef877f', NULL, '', 4, 0, '115.186.130.18'),
(113, 'ecbc073731480867480bb441d92b010c', NULL, '', 0, 0, '182.191.142.193'),
(114, 'bc68f17378d60d0145c7fc02368aab38', NULL, '', 3, 0, '116.71.181.151'),
(115, '82ee3ccc565f94f4d58e426ee4f751ff', NULL, '', 1, 0, '115.186.130.18'),
(116, 'd3f06be3ad5c567a94a44999fe0fdff9', NULL, '', 3, 0, '206.84.131.191'),
(117, '594e04a91a217c657667e87fe704c44a', NULL, '', 7, 0, '205.164.152.16'),
(118, '6f0a7446c5c9c51086e17d60acc2fe8c', NULL, '', 0, 0, '115.186.130.18'),
(120, 'bd8c04f11cff96ffa06682fe385427c3', NULL, '67', 1, 236, '103.111.84.67'),
(121, '80a0709015d3525300fcb6527d2f3671', NULL, '', 0, 0, '209.58.185.75'),
(122, '43093c75db6fc9596085d2bd0b3dabf2', NULL, '', 7, 0, '206.84.132.181'),
(123, '47d1179be30c41de16e683c68ad2fd0c', NULL, '', 0, 0, '206.84.132.181'),
(124, '60b1a6e55f875f96fb31c03d24effefc', NULL, '', 2, 0, '46.56.243.29'),
(125, 'f9f822703f55db829a3588a151dbf5e9', NULL, '', 0, 0, '206.84.133.36'),
(126, '0dc10d3640843ec29812926ad2b3589d', NULL, '', 2, 0, '115.186.130.18'),
(127, 'fb4a716dbdfeeef34c0f51299a07ca69', NULL, '', 3, 0, '206.84.133.97'),
(128, 'c3efc4526f983e502f8e619d691f6032', NULL, '', 19, 0, '206.84.133.97'),
(129, 'fd24f950f606908ed29bab86f2b75af2', NULL, '', 3, 0, '115.186.130.18'),
(130, '5aaa94e73b8b63b937de36eb7313b58d', NULL, '', 0, 0, '115.186.130.18'),
(131, '7de03c7988a0c277311a6c5fa4c22b88', NULL, '', 1, 0, '206.84.133.97'),
(132, 'e226f7e0ca01ed7a26a566e17b5035c2', NULL, '', 1, 0, '206.84.133.97'),
(133, '1e321c77e767fc5d70375689d8148f05', NULL, '', 2, 0, '206.84.133.97'),
(134, '50b766ed5ed05e15205a61a43f636766', NULL, '', 8, 0, '115.186.130.18'),
(135, '129faca8d8500d093e1331a5ec93d0da', NULL, '', 0, 0, '206.84.133.97'),
(136, 'ae608737a77284ca19eb4aca42586225', NULL, '', 1, 0, '115.186.130.18'),
(137, '7b02d267e58e6c7bc871790efff571ff', NULL, '', 34, 0, '115.186.130.18'),
(138, 'fceb95a3a74e65ac66a967f7ef361281', NULL, '', 2, 0, '115.186.130.18'),
(139, 'b43357340766c92518ae5f90f4fd0066', NULL, '', 1, 0, '103.111.84.67'),
(140, 'e66e00a233b9d2e150aece58da7c51dc', NULL, '', 1, 0, '103.111.84.67'),
(141, '429946d8ddf9bd7d99124cfc43f839c7', NULL, '', 7, 0, '115.186.130.18'),
(142, 'd30db4bf694a4cbeca3e9a1188b0e566', NULL, '', 2, 0, '119.73.104.26'),
(143, 'bc813e1e37f93a48cd527ea9e125e0b8', NULL, '', 1, 0, '119.73.97.130'),
(144, '57a147ed51c89b32c333b544d4e7d571', NULL, '', 11, 0, '119.73.97.130'),
(145, '927f2714944827861cffd9194b45dae4', NULL, '', 0, 0, '182.191.137.209'),
(146, '52b72081bc48ceb15d0f35de3efbbde4', NULL, '', 7, 0, '39.43.46.108'),
(147, 'cdecd6e801d43abd97e28f7f4651db6b', NULL, '', 1, 0, '206.84.131.12'),
(148, '001c608d77d44d7a0641f5d0ed0dc90c', NULL, '', 1, 0, '81.156.165.193'),
(149, 'f44f5be3ae5e8b9bd18f4a04bcb806d0', NULL, '', 0, 0, '88.6.78.29'),
(150, 'ad6b350a8c0f2643a7048f390e20f6e5', NULL, '', 0, 0, '39.52.188.233'),
(151, '1acbc32bd06ea37b98345585516e44a4', NULL, '', 5, 0, '103.244.176.61'),
(152, '3f3951e72ea9b04d4a0b5d2312c52ad2', NULL, '', 0, 0, '39.57.19.219'),
(153, '3105c69b2d32d0f80309aa3628300a9a', NULL, '', 7, 0, '119.155.200.43'),
(154, '4a5fe3536476d9647afe34ea48b47f24', NULL, '', 4, 0, '39.39.249.211'),
(155, 'cc9fd3208313c4f6b06d8264221e3873', NULL, '', 3, 0, '175.107.201.121'),
(156, '6a448275cf2e5e2fb56dd39d3dfcceb8', NULL, '', 5, 0, '119.155.203.141'),
(157, '776661c5558f10df783341e76a0c47d5', NULL, '', 0, 0, '119.73.103.135'),
(158, '0e0dddf7d504599d836952471a4f06f8', NULL, '', 1, 0, '59.103.230.146'),
(159, '9b15e6b6338ade59f9e0e183a8d34369', NULL, '', 0, 0, '223.123.10.116'),
(160, 'daf5ae8e6ba8db9a2c4737ed44b423f8', NULL, '', 1, 0, '103.244.175.99'),
(161, '9f8c30e39b9a69c963e880bf4b2b70d2', NULL, '', 3, 0, '154.80.61.198'),
(162, 'accd6e8127dde98dfb624a237ce35a74', NULL, '', 0, 0, '154.80.61.198'),
(163, 'adf7c21a39fa2e63eae886dcf4160a65', NULL, '', 0, 0, '103.26.83.219'),
(164, 'ea992897a946b02181c09bfd6d741d5f', NULL, '', 0, 0, '46.153.180.101'),
(165, '3f2e648f26059e4d8d4557b70c2bddcd', NULL, '', 1, 0, '119.155.162.248'),
(166, '9c4063131907f6d6d6f3eee7d346713e', NULL, '', 3, 0, '154.198.123.50'),
(167, '9dd5d144922f1dd26895ce93363805a0', NULL, '', 8, 0, '154.198.122.114'),
(168, '1b8e0807c565d75cf133796fbe648566', NULL, '', 1, 0, '110.39.220.61'),
(169, '5f3770caff86f50f9da65933ab122fce', NULL, '', 2, 0, '119.155.192.190'),
(170, 'c797a3a6423a712570edc4c2828c4a84', NULL, '', 1, 0, '172.224.240.34'),
(171, '2bf29fa645ed45e4519ae1995230f34b', NULL, '', 2, 0, '202.47.48.2'),
(172, '10570f758ff0d29fd0389415d4366190', NULL, '', 13, 0, '39.48.190.171'),
(173, '8bba4915910713a35a5425c7bdbaa794', NULL, '', 0, 0, '110.93.228.230');

-- --------------------------------------------------------

--
-- Table structure for table `sm_shoppingcart_products`
--

CREATE TABLE `sm_shoppingcart_products` (
  `scp_id` int(11) NOT NULL,
  `scp_uid` int(11) DEFAULT NULL,
  `scp_orderid` varchar(100) DEFAULT NULL,
  `scp_proid` varchar(11) DEFAULT NULL,
  `scp_sizeid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_slider`
--

CREATE TABLE `sm_slider` (
  `sl_id` int(11) NOT NULL,
  `sl_image` varchar(200) NOT NULL,
  `sl_mobimage` varchar(255) NOT NULL,
  `sl_url` varchar(300) NOT NULL,
  `sl_heading` varchar(100) NOT NULL,
  `sl_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_slider`
--

INSERT INTO `sm_slider` (`sl_id`, `sl_image`, `sl_mobimage`, `sl_url`, `sl_heading`, `sl_text`) VALUES
(26, '66116splash pik size pc (1).jpg', '34322splash pik mobile size.jpg', '', '', ''),
(34, '95926slide_pc_01.jpg', '32156slide_mob_01.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sm_subscription`
--

CREATE TABLE `sm_subscription` (
  `sub_id` int(11) NOT NULL,
  `sub_fullname` varchar(150) NOT NULL,
  `sub_cell` varchar(20) NOT NULL,
  `sub_email` varchar(100) NOT NULL,
  `sub_address` varchar(250) NOT NULL,
  `sub_imp_news` int(1) NOT NULL,
  `sub_end` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_subscription`
--

INSERT INTO `sm_subscription` (`sub_id`, `sub_fullname`, `sub_cell`, `sub_email`, `sub_address`, `sub_imp_news`, `sub_end`) VALUES
(1, '0', '0', 'info@swismax.com', '0', 1, 1),
(2, '0', '0', 'nadiaasattar3@gmail.com', '0', 1, 1),
(3, '0', '0', 'wq', '0', 1, 1),
(4, '0', '0', 's', '0', 1, 1),
(5, '0', '0', 'Nadia@swismax.us', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_users`
--

CREATE TABLE `sm_users` (
  `sm_id` int(11) NOT NULL,
  `sm_firstname` varchar(50) NOT NULL,
  `sm_lastname` varchar(50) NOT NULL,
  `sm_username` varchar(50) NOT NULL,
  `sm_password` varchar(50) NOT NULL,
  `sm_email` varchar(150) NOT NULL,
  `sm_contact_no` varchar(20) NOT NULL,
  `sm_contact_no2` varchar(20) NOT NULL,
  `sm_address` varchar(150) NOT NULL,
  `sm_city` varchar(50) NOT NULL,
  `sm_country` varchar(50) NOT NULL,
  `sm_accgen` datetime NOT NULL,
  `sm_acclastlogin` datetime NOT NULL,
  `sm_enable` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sm_users`
--

INSERT INTO `sm_users` (`sm_id`, `sm_firstname`, `sm_lastname`, `sm_username`, `sm_password`, `sm_email`, `sm_contact_no`, `sm_contact_no2`, `sm_address`, `sm_city`, `sm_country`, `sm_accgen`, `sm_acclastlogin`, `sm_enable`) VALUES
(1, '', '', 'swismax786', 'e10adc3949ba59abbe56e057f20f883e', 'raheel@swismax.com', '', '', '', '', '', '0000-00-00 00:00:00', '2023-05-31 10:33:34', 1),
(2, '', '', 'hashim asad', 'e10adc3949ba59abbe56e057f20f883e', 'hashimasad1@gmail.com', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, '', '', 'Arif', 'a0514586a408be35e9165e7eedce000e', 'arifumairpk@gmail.com', '', '', '', '', '', '0000-00-00 00:00:00', '2023-01-13 01:41:56', 1),
(5, '', '', 'Hashim', 'e269ac55af856d1567f848a747738bb1', 'hashim@vis2020.com.pk', '', '', '', '', '', '0000-00-00 00:00:00', '2022-12-29 03:41:04', 1),
(6, '', '', 'Abdullah', '205dad82a8f94b26e56f2ad015fcfc9b', 'abdulllah.asim@icloud.com', '', '03334547309', '', 'isb', 'Pak', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(48, '', '', 'Derick', '202cb962ac59075b964b07152d234b70', 'derick@swismax.com', '03123456789', '', '', '', '', '2023-10-11 02:50:24', '0000-00-00 00:00:00', 1),
(56, '', '', 'test2', '81dc9bdb52d04dc20036dbd8313ed055', 'test2@swismax.com', '1234', '', '', '', '', '2023-10-10 12:35:58', '0000-00-00 00:00:00', 1),
(55, '', '', 'test', '202cb962ac59075b964b07152d234b70', 'test@swismax.com', '123', '', '', '', '', '2023-10-10 12:34:18', '0000-00-00 00:00:00', 1),
(19, '', '', 'Arif Mehmood', '7c61dae54d90f00f3ef3928b381917d2', 'arif@outlook.com.pk', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(35, '', '', 'UMAR KHAN', '4a7bc34eb26d2ed899e43285dd654507', 'baz.khan7@gmail.com', '', '', '', '', '', '0000-00-00 00:00:00', '2023-06-21 04:06:26', 1),
(36, '', '', 'Aan Cheema', 'd0f35cad13d587d4f2c035343230aa76', 'aanasifcheema@gmail.com', '', '', '', '', '', '0000-00-00 00:00:00', '2023-09-04 02:08:26', 1),
(38, '', '', 'Haider Mehmood', 'b3931f3afb724e2da74d021c32bfa0db', 'haider.mehmood4447@gmail.com', '03128469446', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(58, '', '', 'saad_1234', 'cb5241c7b5fb6a5a626867762303d885', 'saadrazzaq624@gmail.com', '03184202899', '', '', '', '', '2024-11-11 10:17:22', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imt_user`
--
ALTER TABLE `imt_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `im_page_content`
--
ALTER TABLE `im_page_content`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `ptcs_faqs`
--
ALTER TABLE `ptcs_faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `sms_testimonial`
--
ALTER TABLE `sms_testimonial`
  ADD PRIMARY KEY (`tst_id`);

--
-- Indexes for table `sm_addressbook`
--
ALTER TABLE `sm_addressbook`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `sm_cart`
--
ALTER TABLE `sm_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `sm_categories`
--
ALTER TABLE `sm_categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `sm_client`
--
ALTER TABLE `sm_client`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `sm_contact`
--
ALTER TABLE `sm_contact`
  ADD PRIMARY KEY (`ctn_id`);

--
-- Indexes for table `sm_currency`
--
ALTER TABLE `sm_currency`
  ADD PRIMARY KEY (`cur_id`);

--
-- Indexes for table `sm_feedback`
--
ALTER TABLE `sm_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `sm_membership`
--
ALTER TABLE `sm_membership`
  ADD PRIMARY KEY (`sm_mem_id`);

--
-- Indexes for table `sm_membership_club`
--
ALTER TABLE `sm_membership_club`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `sm_orders`
--
ALTER TABLE `sm_orders`
  ADD PRIMARY KEY (`odr_id`);

--
-- Indexes for table `sm_partnership`
--
ALTER TABLE `sm_partnership`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `sm_paymentmethods`
--
ALTER TABLE `sm_paymentmethods`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `sm_products`
--
ALTER TABLE `sm_products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sm_products_colors`
--
ALTER TABLE `sm_products_colors`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `sm_products_images`
--
ALTER TABLE `sm_products_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `sm_products_sizes`
--
ALTER TABLE `sm_products_sizes`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `sm_shoppingcart_items`
--
ALTER TABLE `sm_shoppingcart_items`
  ADD PRIMARY KEY (`sci_id`);

--
-- Indexes for table `sm_shoppingcart_products`
--
ALTER TABLE `sm_shoppingcart_products`
  ADD PRIMARY KEY (`scp_id`);

--
-- Indexes for table `sm_slider`
--
ALTER TABLE `sm_slider`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `sm_subscription`
--
ALTER TABLE `sm_subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `sm_users`
--
ALTER TABLE `sm_users`
  ADD PRIMARY KEY (`sm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imt_user`
--
ALTER TABLE `imt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `im_page_content`
--
ALTER TABLE `im_page_content`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ptcs_faqs`
--
ALTER TABLE `ptcs_faqs`
  MODIFY `faq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sms_testimonial`
--
ALTER TABLE `sms_testimonial`
  MODIFY `tst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sm_addressbook`
--
ALTER TABLE `sm_addressbook`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sm_cart`
--
ALTER TABLE `sm_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `sm_categories`
--
ALTER TABLE `sm_categories`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sm_client`
--
ALTER TABLE `sm_client`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sm_contact`
--
ALTER TABLE `sm_contact`
  MODIFY `ctn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_currency`
--
ALTER TABLE `sm_currency`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_feedback`
--
ALTER TABLE `sm_feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_membership`
--
ALTER TABLE `sm_membership`
  MODIFY `sm_mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_membership_club`
--
ALTER TABLE `sm_membership_club`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_orders`
--
ALTER TABLE `sm_orders`
  MODIFY `odr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `sm_partnership`
--
ALTER TABLE `sm_partnership`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sm_paymentmethods`
--
ALTER TABLE `sm_paymentmethods`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_products`
--
ALTER TABLE `sm_products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `sm_products_colors`
--
ALTER TABLE `sm_products_colors`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `sm_products_images`
--
ALTER TABLE `sm_products_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `sm_products_sizes`
--
ALTER TABLE `sm_products_sizes`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `sm_shoppingcart_items`
--
ALTER TABLE `sm_shoppingcart_items`
  MODIFY `sci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `sm_shoppingcart_products`
--
ALTER TABLE `sm_shoppingcart_products`
  MODIFY `scp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_slider`
--
ALTER TABLE `sm_slider`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sm_subscription`
--
ALTER TABLE `sm_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sm_users`
--
ALTER TABLE `sm_users`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
