-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2025 at 07:57 AM
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
-- Database: `website_ecommerce`
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
(1, 'Lappy Book', 'urbanw', '670b14728ad9902aecba32e22fa4f6bd', '', '', '', '', '2021-10-01', 1);

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
(1, 'Return & Exchange', 'return_exchange', '<!--?php echo <!--?php echo <!--?php echo  Return of goods is at the users cost. We suggest you return your product using your domestic postal service on a standard shipping method, although we suggest you obtain a proof of postage and keep your paperwork until we have acknowledged receipt of your package.  <br-->\r\n<p>Items must be returned within 7 days of receipt of your goods. This includes return transit time to our warehouse. Items must be unworn and unwashed and have all original tags attached. We cannot accept items that have distinct odours or signs of wear and tear. We assess all returns on this basis and if your item fails this assessment it will be returned to you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1- If you wish to exchange for a different size please clearly mark the required size in the space provided on the E-mail.</p>\r\n\r\n<p>2- If you consider your items to be faulty please first contact our customer services department on info@zor.com and give a brief description of the fault, and location of the fault providing photographic detail if you feel this is relevant. It may not always be necessary for you to return your faulty goods to us, and we will evaluate this at the time and on a case by case basis.</p>\r\n\r\n<p>3- Faulty good claims must be made within the 7 day period. Anything beyond the 7 days will be considered normal wear and tear of use and can be subject to denial.</p>\r\n\r\n<p>4- The returns parcel remains your responsibility until the goods are received and booked back into our warehouse.</p>\r\n\r\n<p>5- Once we have received your package into our warehouse and it has been processed you will be informed of what action is being taken.</p>\r\n\r\n<p>6- Exchanges are sent out on a standard service (not an express service).</p>\r\n\r\n<p>7- Exchanges can only be made up to the original value of the goods purchased.</p>\r\n\r\n<p>8- 250 PKR will be extra charge on exchange during the normal and sale days.</p>\r\n\r\n<p>9- Your shipping costs are non-refundable.</p>\r\n\r\n<p>10- We do not accept returns/exchanges for sale/clearance items.</p>\r\n\r\n<p>11- Returns can take 2-4 days to process.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right to return the items to you based on any of the terms outlined in our policy, goods will be returned to you in the same condition they are received in.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Whilst every effort will be made to replace any stock with like for like product under certain circumstances your preferred product may not be in stock. In this instance, zor reserves the right to issue a refund or credit to the value of the original product value. The product must also pass all other returns criteria.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `popup`
--

CREATE TABLE `popup` (
  `popup_id` int(11) NOT NULL,
  `popup_type` varchar(255) NOT NULL,
  `popup_title` varchar(255) NOT NULL,
  `popup_content` text DEFAULT NULL,
  `popup_img` varchar(255) DEFAULT NULL,
  `popup_img_url` varchar(255) DEFAULT NULL,
  `popup_img_target_url` varchar(255) DEFAULT NULL,
  `popup_video` varchar(255) DEFAULT NULL,
  `popup_video_url` varchar(255) DEFAULT NULL,
  `popup_setting_title_ed` tinyint(1) DEFAULT 0,
  `popup_setting_title_color` varchar(20) DEFAULT NULL,
  `popup_setting_title_type` varchar(255) DEFAULT NULL,
  `popup_setting_btn_ed` tinyint(1) DEFAULT 0,
  `popup_setting_btn_color` varchar(20) DEFAULT NULL,
  `popup_setting_btn_hovercolor` varchar(20) DEFAULT NULL,
  `popup_setting_btn_size` varchar(20) DEFAULT NULL,
  `popup_setting_btn_name` varchar(100) DEFAULT NULL,
  `popup_setting_btn_url` varchar(255) DEFAULT NULL,
  `popup_setting_closeable_ed` tinyint(1) DEFAULT 1,
  `popup_setting_closeable_autosec` int(11) DEFAULT 0,
  `popup_setting_visit_perday` int(11) DEFAULT 0,
  `popup_setting_visit_everyvisit` tinyint(1) DEFAULT 0,
  `popup_setting_visit_random` tinyint(1) DEFAULT 0,
  `popup_setting_type` text DEFAULT NULL,
  `popup_setting_trigger` text DEFAULT NULL,
  `popup_setting_startdate` date DEFAULT NULL,
  `popup_setting_enddate` date DEFAULT NULL,
  `popup_priority` text DEFAULT NULL,
  `popup_analysis_views` int(11) DEFAULT 0,
  `popup_analysis_clicks` int(11) DEFAULT 0,
  `popup_ed` tinyint(1) DEFAULT 1,
  `popup_setting_backdrop_color` varchar(50) DEFAULT NULL,
  `popup_setting_backdrop_opacity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popup`
--

INSERT INTO `popup` (`popup_id`, `popup_type`, `popup_title`, `popup_content`, `popup_img`, `popup_img_url`, `popup_img_target_url`, `popup_video`, `popup_video_url`, `popup_setting_title_ed`, `popup_setting_title_color`, `popup_setting_title_type`, `popup_setting_btn_ed`, `popup_setting_btn_color`, `popup_setting_btn_hovercolor`, `popup_setting_btn_size`, `popup_setting_btn_name`, `popup_setting_btn_url`, `popup_setting_closeable_ed`, `popup_setting_closeable_autosec`, `popup_setting_visit_perday`, `popup_setting_visit_everyvisit`, `popup_setting_visit_random`, `popup_setting_type`, `popup_setting_trigger`, `popup_setting_startdate`, `popup_setting_enddate`, `popup_priority`, `popup_analysis_views`, `popup_analysis_clicks`, `popup_ed`, `popup_setting_backdrop_color`, `popup_setting_backdrop_opacity`) VALUES
(203, 'video_only', 'promotion popup', '', '', '', '', NULL, 'https://youtu.be/K0fw1uiSGE0?si=4pEGR3kvjxdWo3Vi', 1, '#07e3f2', 'blink', 1, '#1916e9', '#c4c7b2', 'lg', 'subscribe', 'https://youtu.be/vViz_JgiUu4?feature=shared', 1, 200, 0, 1, 1, 'modal', 'onload', '2025-10-11', '2025-10-21', NULL, 80, 0, 0, '#e605b5', '0.5'),
(204, 'image_only', 'promotion popup', '', '', '', '', NULL, '', 1, '#000000', 'simple', 0, '#000000', '#000000', 'sm', '', '', 0, 5, 0, 1, 1, 'fullscreen', 'onload', '2025-10-13', '2025-10-23', NULL, 0, 0, 0, '#000000', '1'),
(205, 'image_only', 'promotion popup', '', '', '', '', NULL, '', 1, '#000000', 'simple', 0, '#000000', '#000000', 'sm', '', '', 0, 5, 0, 1, 1, 'fullscreen', 'onload', '2025-10-20', '2025-10-30', NULL, 0, 0, 0, '#000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_admin`
--

CREATE TABLE `ptcs_admin` (
  `at_id` int(10) NOT NULL,
  `at_name` varchar(100) NOT NULL,
  `at_username` varchar(100) NOT NULL,
  `at_email` varchar(100) NOT NULL,
  `at_password` varchar(100) NOT NULL,
  `at_designation` varchar(50) NOT NULL,
  `at_last_login_time` datetime NOT NULL,
  `at_registration_date` date NOT NULL,
  `at_last_ip` varchar(20) NOT NULL,
  `admin_` int(11) NOT NULL,
  `at_is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `at_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ptcs_admin`
--

INSERT INTO `ptcs_admin` (`at_id`, `at_name`, `at_username`, `at_email`, `at_password`, `at_designation`, `at_last_login_time`, `at_registration_date`, `at_last_ip`, `admin_`, `at_is_super_admin`, `at_status`) VALUES
(1, 'Admin', 'admin_s', 'info@swismax.com', 'e10adc3949ba59abbe56e057f20f883e', 'CEO', '2025-08-28 16:55:30', '0000-00-00', '192.168.18.89', 0, 1, 1),
(9, 'Muhammad Hamid Saleem Alsuwadi', 'admin_ss', 'www.optaratrade@gmail.com', '32234234234', 'Manager', '2024-10-01 14:12:41', '0000-00-00', '', 0, 1, 1);

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
(19, 'What types of gym products does Splash30 offer?', 'Splash30 offers a wide range of gym products, including dumbbells, resistance bands, kettlebells, yoga mats, and home gym equipment to meet your fitness needs.\n', 1, '2024-11-07 08:27:39'),
(18, 'How can I purchase a product from Splash30?d', '<p>How can I purchase a product from Splash30?</p>', 1, '2024-11-07 07:31:44'),
(21, 'Do Splash30 gym products come with a warranty?', 'Most Splash30 gym products come with a limited warranty. The duration and terms of the warranty vary by product. Please check the specific product details for more information.\n', 1, '2024-11-07 08:28:30'),
(24, 'asdfsd', '<p>asdfasdfsd</p>\r\n', 1, '2025-07-31 12:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_setting_socialmedia`
--

CREATE TABLE `ptcs_setting_socialmedia` (
  `sm_id` int(10) NOT NULL,
  `sm_icon` varchar(255) NOT NULL,
  `sm_url` varchar(255) NOT NULL,
  `sm_status` tinytext NOT NULL,
  `sm_header` varchar(255) NOT NULL,
  `sm_footer` varchar(255) NOT NULL,
  `sm_color_header` varchar(50) NOT NULL,
  `sm_color_footer` varchar(50) NOT NULL,
  `sm_target` varchar(10) NOT NULL DEFAULT '_self'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_setting_socialmedia`
--

INSERT INTO `ptcs_setting_socialmedia` (`sm_id`, `sm_icon`, `sm_url`, `sm_status`, `sm_header`, `sm_footer`, `sm_color_header`, `sm_color_footer`, `sm_target`) VALUES
(67, 'fab fa-facebook-f', 'https://youtube.com/shorts/xpgJYp6kZJs?si=r9pSheU0NLXMyASv', '0', '1', '1', '#1877f2', '#1877f2', '_blank'),
(68, 'fa-brands fa-youtube', 'https://youtube.com/shorts/xpgJYp6kZJs?si=r9pShfgjfh', '0', '1', '1', '#ff0000', '#ff0000', '_self'),
(69, 'fa-brands fa-youtube', '', '0', '1', '1', '#ff0000', '#ff0000', '_blank');

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_setting_whatsapp`
--

CREATE TABLE `ptcs_setting_whatsapp` (
  `wa_id` int(10) NOT NULL,
  `wa_number` varchar(20) NOT NULL,
  `wa_primary` varchar(20) NOT NULL,
  `wa_ed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_setting_whatsapp`
--

INSERT INTO `ptcs_setting_whatsapp` (`wa_id`, `wa_number`, `wa_primary`, `wa_ed`) VALUES
(37, '329123123123', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_setting_whatsapp_button`
--

CREATE TABLE `ptcs_setting_whatsapp_button` (
  `wab_id` int(10) NOT NULL,
  `wab_number_id` int(10) NOT NULL,
  `wab_message` text NOT NULL,
  `wab_product_number` varchar(20) NOT NULL,
  `wab_number_web` varchar(20) NOT NULL,
  `wab_sticky_number` varchar(20) NOT NULL,
  `wab_show_web` tinyint(1) NOT NULL,
  `wab_show_product` tinyint(1) NOT NULL,
  `wab_show_sticky` tinyint(1) NOT NULL,
  `wab_product_btn_label` varchar(20) NOT NULL,
  `wab_product_icon_style` varchar(20) NOT NULL,
  `wab_product_btn_style` varchar(20) NOT NULL,
  `wab_product_btn_color` varchar(20) NOT NULL,
  `wab_product_btn_hover_color` varchar(20) NOT NULL,
  `wab_product_btn_size` varchar(20) NOT NULL,
  `wab_product_btn_position` varchar(20) NOT NULL,
  `wab_product_btn_animation` varchar(20) NOT NULL,
  `wab_sticky_icon_style` varchar(20) NOT NULL,
  `wab_sticky_btn_label` varchar(20) NOT NULL,
  `wab_sticky_btn_style` varchar(20) NOT NULL,
  `wab_sticky_field_type` varchar(20) NOT NULL,
  `wab_sticky_btn_color` varchar(20) NOT NULL,
  `wab_sticky_btnhover_color` varchar(20) NOT NULL,
  `wab_sticky_btn_size` varchar(10) NOT NULL,
  `wab_sticky_btn_position` varchar(50) NOT NULL,
  `wab_sticky_btn_animation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_setting_whatsapp_button`
--

INSERT INTO `ptcs_setting_whatsapp_button` (`wab_id`, `wab_number_id`, `wab_message`, `wab_product_number`, `wab_number_web`, `wab_sticky_number`, `wab_show_web`, `wab_show_product`, `wab_show_sticky`, `wab_product_btn_label`, `wab_product_icon_style`, `wab_product_btn_style`, `wab_product_btn_color`, `wab_product_btn_hover_color`, `wab_product_btn_size`, `wab_product_btn_position`, `wab_product_btn_animation`, `wab_sticky_icon_style`, `wab_sticky_btn_label`, `wab_sticky_btn_style`, `wab_sticky_field_type`, `wab_sticky_btn_color`, `wab_sticky_btnhover_color`, `wab_sticky_btn_size`, `wab_sticky_btn_position`, `wab_sticky_btn_animation`) VALUES
(26, 37, 'Hello, I have a query about your products.', '+92329123123123', '+92329123123123', '+92329123123123', 1, 1, 1, 'Get Inquiry', 'filled', 'circle', '#00000', '#198754', 'medium', 'bottom-left', 'none', 'outline', 'whatsapp', 'rounded', 'with_name', '#00FF00', '#00000', 'large', 'bottom-right', 'shake');

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_system_currencies`
--

CREATE TABLE `ptcs_system_currencies` (
  `curcy_id` int(11) NOT NULL,
  `curcy_name` varchar(20) NOT NULL,
  `curcy_symbol` varchar(5) NOT NULL,
  `curcy_ed` int(1) NOT NULL DEFAULT 1 COMMENT '0 = disabled / 1 = enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_system_currencies`
--

INSERT INTO `ptcs_system_currencies` (`curcy_id`, `curcy_name`, `curcy_symbol`, `curcy_ed`) VALUES
(1, 'USD', '$', 1),
(2, 'PKR', 'Rs.', 1),
(3, 'AED', 'د.إ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_system_settings`
--

CREATE TABLE `ptcs_system_settings` (
  `sysset_id` int(11) NOT NULL,
  `sysset_uid` int(11) NOT NULL COMMENT 'User ID',
  `sysset_wizards_steps` int(2) NOT NULL DEFAULT 0 COMMENT '0 = Fresh SignUp\r\n1 = Add Company Information\r\n2 = Select Subscription\r\n3 = ready for Payment\r\n4 = Payment Submission\r\n5 = Subscribed',
  `sysset_project_domain` varchar(150) NOT NULL DEFAULT 'https://',
  `sysset_project_name` varchar(150) NOT NULL,
  `sysset_project_tagline` varchar(100) DEFAULT NULL,
  `sysset_project_shortname` varchar(30) DEFAULT NULL,
  `sysset_project_logo` varchar(100) DEFAULT NULL,
  `sysset_project_white_logo` varchar(100) DEFAULT NULL,
  `sysset_project_dark_logo` varchar(100) DEFAULT NULL,
  `sysset_project_favicon` varchar(100) DEFAULT NULL,
  `sysset_project_useridformat` varchar(30) DEFAULT NULL COMMENT 'User ID Format',
  `sysset_project_timezone` varchar(100) DEFAULT NULL,
  `sysset_project_copyright_year` year(4) DEFAULT NULL,
  `sysset_project_phone` varchar(50) DEFAULT NULL,
  `sysset_project_cell` varchar(50) DEFAULT NULL,
  `sysset_project_email` varchar(100) DEFAULT NULL,
  `sysset_project_ntn_num` varchar(100) DEFAULT NULL,
  `sysset_project_address` text DEFAULT NULL,
  `sysset_project_web` varchar(100) DEFAULT NULL,
  `sysset_mail_geninquiry` varchar(150) DEFAULT NULL,
  `sysset_mail_noreply` varchar(150) DEFAULT NULL,
  `sysset_mail_support` varchar(150) DEFAULT NULL,
  `sysset_mail_contactform` varchar(150) DEFAULT NULL,
  `sysset_mail_contactform_password` varchar(150) DEFAULT NULL,
  `sysset_currency_name` varchar(5) DEFAULT NULL,
  `sysset_currency_symbol` varchar(5) DEFAULT NULL,
  `sysset_subcr_expiry_datetime` datetime DEFAULT NULL COMMENT 'Subscription Expiry Date and Time',
  `sysset_subcr_id` int(11) DEFAULT NULL COMMENT 'Subscription Package Id',
  `sysset_subcr_datetime` datetime DEFAULT NULL COMMENT 'Subscription Date and time when it done'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ptcs_system_settings`
--

INSERT INTO `ptcs_system_settings` (`sysset_id`, `sysset_uid`, `sysset_wizards_steps`, `sysset_project_domain`, `sysset_project_name`, `sysset_project_tagline`, `sysset_project_shortname`, `sysset_project_logo`, `sysset_project_white_logo`, `sysset_project_dark_logo`, `sysset_project_favicon`, `sysset_project_useridformat`, `sysset_project_timezone`, `sysset_project_copyright_year`, `sysset_project_phone`, `sysset_project_cell`, `sysset_project_email`, `sysset_project_ntn_num`, `sysset_project_address`, `sysset_project_web`, `sysset_mail_geninquiry`, `sysset_mail_noreply`, `sysset_mail_support`, `sysset_mail_contactform`, `sysset_mail_contactform_password`, `sysset_currency_name`, `sysset_currency_symbol`, `sysset_subcr_expiry_datetime`, `sysset_subcr_id`, `sysset_subcr_datetime`) VALUES
(1, 8, 3, 'https://', 'Swismax Solutions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09876567890', '765456789', 'info@swismax.com', '567898765', '678987', 'https://swismax.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_system_timezones`
--

CREATE TABLE `ptcs_system_timezones` (
  `timez_id` int(11) NOT NULL,
  `timez_name` varchar(200) NOT NULL,
  `timez_value` varchar(200) NOT NULL,
  `timez_ed` int(1) NOT NULL DEFAULT 1 COMMENT '0 = disabled / 1 = enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_system_timezones`
--

INSERT INTO `ptcs_system_timezones` (`timez_id`, `timez_name`, `timez_value`, `timez_ed`) VALUES
(1, 'United Kingdom (Europe/London)', 'Europe/London', 1),
(2, 'Pakistan (Islamabad/Karachi)', 'Asia/Karachi', 1),
(3, 'USA (America/New_York)', 'America/New_York', 1),
(4, 'USA Central (America/Chicago)', 'America/Chicago', 1),
(5, 'USA Pacific (America/Los_Angeles)', 'America/Los_Angeles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ptcs_users_details`
--

CREATE TABLE `ptcs_users_details` (
  `user_id` int(11) NOT NULL,
  `user_fullName` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` varchar(150) NOT NULL,
  `user_role` enum('admin','manager','customer') NOT NULL DEFAULT 'admin' COMMENT '1=admin,2=manager,3=customer',
  `user_email_verified` tinyint(4) NOT NULL DEFAULT 0,
  `user_verification_token` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_subscribe` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Unsubscribed\r\n1 = subscribed',
  `user_ed` tinyint(4) NOT NULL DEFAULT 1 COMMENT '''1=enabled, 0=disabled'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptcs_users_details`
--

INSERT INTO `ptcs_users_details` (`user_id`, `user_fullName`, `user_name`, `user_email`, `user_image`, `user_password`, `user_img`, `google_id`, `user_phone`, `user_address`, `user_country`, `user_role`, `user_email_verified`, `user_verification_token`, `user_created_at`, `user_updated_at`, `user_subscribe`, `user_ed`) VALUES
(1, 'Ameen Developer222', 'test', 'test2@gmail.com', '', '$2y$10$4qGIPqu0tx/5NjczpgTkNeKkaUfKfImtZ1932Ciav/u.8bSaXIUNG', '', NULL, '12345678', 'Manshera', 'pak', 'admin', 1, '', '2025-09-20 06:06:40', '2025-09-20 09:51:43', 0, 1),
(3, 'Ameen Developer', 'test', 'ameen@gmail.com', '', '$2y$10$bzAbtGTnb.UpJ/l2fpDTiOmnBHrA6uY/maqyNbxxViTp9C1Svh5ey', '', NULL, '232323', 'aaa', 'pak', 'admin', 1, '', '2025-09-20 06:34:22', '2025-10-04 07:42:02', 0, 0);

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
-- Table structure for table `sm_blog`
--

CREATE TABLE `sm_blog` (
  `blog_id` int(255) NOT NULL,
  `blog_meta_title` varchar(255) NOT NULL,
  `blog_meta_desc` varchar(255) NOT NULL,
  `blog_meta_keywords` varchar(255) NOT NULL,
  `blog_name` varchar(255) NOT NULL,
  `blog_username` varchar(255) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_thumbnail` varchar(255) NOT NULL,
  `blog_thumbnail_title` varchar(255) NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `blog_img_title` varchar(255) NOT NULL,
  `blog_shrt_desc` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_ed` tinyint(1) NOT NULL DEFAULT 1,
  `blog_createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `blog_updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_blog`
--

INSERT INTO `sm_blog` (`blog_id`, `blog_meta_title`, `blog_meta_desc`, `blog_meta_keywords`, `blog_name`, `blog_username`, `blog_url`, `blog_thumbnail`, `blog_thumbnail_title`, `blog_img`, `blog_img_title`, `blog_shrt_desc`, `blog_text`, `blog_ed`, `blog_createdAt`, `blog_updatedAt`) VALUES
(2, 'aaaa', 'aaaa', 'aaaa', 'aaaaa', 'aaaa', 'aaaa', '964957_Logos10.webp', 'aaaa', '77443_Logos8.webp', 'aaaa', 'aaaa', '<p>aaaaa</p>', 1, '2025-08-22 10:09:32', '0000-00-00 00:00:00'),
(5, 'meta title', 'aaa', 'eeee', 'eeee', 'eeee', 'eeee', '229624_Logos6.webp', 'eee', '56767_Logos8.webp', 'eeee', 'eeee', '<p>eeee</p>', 1, '2025-08-23 04:37:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sm_brands`
--

CREATE TABLE `sm_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_description` text DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `brand_created_at` datetime DEFAULT current_timestamp(),
  `brand_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `brand_is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_brands`
--

INSERT INTO `sm_brands` (`brand_id`, `brand_name`, `brand_description`, `brand_image`, `brand_logo`, `brand_created_at`, `brand_updated_at`, `brand_is_active`) VALUES
(19, 'Urban Wrap ', '<p>Urban Wrap&nbsp;</p>', '90151_logo.png', '65204_logo.png', '2025-07-22 00:25:03', '2025-09-18 05:14:40', 0),
(23, 'Ameen', '<p>Ameen</p>', '', '', '2025-09-18 05:13:12', '2025-09-18 05:14:11', 0),
(24, 'Ameen', '<p>Ameen</p>', '', '', '2025-09-18 05:13:29', '2025-10-01 22:30:52', 0),
(25, 'hosue master', '<p>a statement or narrative that defines and communicates the core essence, purpose, and character of a brand, distinguishing it from competitors in the marketplace.</p>', '', '96491_preview.jpg', '2025-09-23 04:25:32', '2025-10-03 23:09:44', 1);

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
(141, 58, 233, 1, 20, 'M', 'Black', '2024-11-11 06:30:12'),
(151, 90, 303, 18, 1000, '', '', '0000-00-00 00:00:00'),
(154, 90, 510, 3, 1000, '', '', '0000-00-00 00:00:00'),
(155, 91, 424, 1, 1000, '', '', '0000-00-00 00:00:00'),
(156, 91, 382, 14, 1000, '', '', '0000-00-00 00:00:00'),
(204, 92, 0, 4, 1000, 'No Size', 'No Color', '2025-10-31 03:04:49'),
(446, 92, 508, 1, 1000, 'No Size', 'No Color', '2025-11-07 02:24:33'),
(447, 92, 384, 8, 1000, 'No Size', 'BLACK', '2025-11-07 02:25:44'),
(448, 92, 257, 1, 1000, 'No Size', 'No Color', '2025-11-07 02:37:48'),
(450, 92, 284, 1, 1000, 'No Size', 'Turquoise', '2025-11-07 03:26:29'),
(451, 92, 284, 1, 1000, 'No Size', 'No Color', '2025-11-07 03:32:43'),
(452, 92, 506, 36, 1000, 'No Size', 'Red', '2025-11-07 03:56:17'),
(453, 92, 511, 1, 1000, 'No Size', 'black', '2025-11-07 03:57:14'),
(454, 92, 260, 1, 1000, 'No Size', 'white', '2025-11-07 04:09:22'),
(455, 92, 259, 6, 1000, 'No Size', 'No Color', '2025-11-07 04:11:05'),
(456, 92, 472, 18, 1000, 'No Size', 'BLACK', '2025-11-07 22:07:55');

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
(108, '1', 'Paper Products', 'index.php?view=products_category_view&CatID=', '', '_parent', '76647still-life-cardboard-organic-dinnerware.jpg', 0),
(99, '1', 'Tissue Products', 'index.php?view=products_category_view&CatID=', '&lt;p&gt;Tissue Product&lt;/p&gt;\r\n', '_parent', '401244ca5e37b-b839-4aa8-906d-4bdd9e104e5b.jpg', 0),
(107, '3', 'Rectangle Tissues', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '520673137.jpg', 100),
(106, '3', 'Nylon Tissues', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '952414y_ehkn6srlckg62rj441q6uqbcclq20s31e1in4b9g68.jpg', 100),
(100, '2', 'All Tissue Product', 'index.php?view=products_view&CatID=99&SubCatID=', '&lt;p&gt;All Tissue Product&lt;/p&gt;\r\n', '_parent', '890114ca5e37b-b839-4aa8-906d-4bdd9e104e5b.jpg', 99),
(105, '3', 'Thermal Rolls', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '15423soft-paper-towels-white-desk-front-view.jpg', 100),
(104, '3', 'Paper Napkins', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '23374020bee75-c9d9-4ac3-8fe7-8358487d6954.jpg', 100),
(101, '3', 'Facial Tissues', 'index.php?view=products_view&CatID=100&SubCatID=', '&lt;p&gt;Facial Tissues&lt;/p&gt;\r\n', '_parent', '899677489462.jpg', 100),
(102, '3', 'Maxi Rolls', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '33244high-angle-stack-with-rolls-toilet-paper.jpg', 100),
(103, '3', 'Toilet Rolls', 'index.php?view=products_view&CatID=100&SubCatID=', '', '_parent', '36558stack-toilet-paper-rolls-wicker-basket.jpg', 100),
(110, '2', 'All Paper Cup ', 'index.php?view=products_view&CatID=109&SubCatID=', '', '_parent', '47986still-life-cardboard-organic-dinnerware.jpg', 108),
(111, '1', 'Ripple Cups', 'index.php?view=products_category_view&CatID=', '', '_parent', '32257collection-plastic-cups-table.jpg', 110),
(112, '3', 'Wall / Printed Cups', 'index.php?view=products_view&CatID=110&SubCatID=', '', '_parent', '92302close-up-sustainable-drinking-cup-alternatives.jpg', 110),
(113, '2', 'All Paper Bags', 'index.php?view=products_view&CatID=108&SubCatID=', '', '_parent', '75987colorful-shopping-paper-packets.jpg', 108),
(114, '3', 'Twisted Handle Bags', 'index.php?view=products_view&CatID=113&SubCatID=', '', '_parent', '64138colorful-shopping-paper-packets.jpg', 113),
(115, '3', 'Die Cut Handle Bags', 'index.php?view=products_view&CatID=113&SubCatID=', '', '_parent', '91810set-paper-bags-shopping-black-background-mockup-design.jpg', 113),
(116, '3', 'Party Bags', 'index.php?view=products_view&CatID=113&SubCatID=', '', '_parent', '1465411109078.jpg', 113),
(117, '2', 'All Kraft Papers', 'index.php?view=products_view&CatID=108&SubCatID=', '', '_parent', '20828red-plastic-cups-party-gathering.jpg', 108),
(118, '3', 'Kraft Paper Product', 'index.php?view=products_view&CatID=117&SubCatID=', '', '_parent', '45596eco-friendly-fast-food-containers.jpg', 117),
(119, '3', 'Other Cups', 'index.php?view=products_view&CatID=110&SubCatID=', '', '_parent', '95612red-plastic-cups-party-gathering.jpg', 110),
(120, '2', 'All Plastic Cups', 'index.php?view=products_view&CatID=109&SubCatID=', '', '_parent', '91855eco-friendly-fast-food-containers.jpg', 109),
(121, '3', 'Juice Cups', 'index.php?view=products_view&CatID=120&SubCatID=', '', '_parent', '1660432533.jpg', 120),
(122, '3', 'Pet Demo & Flat LID ', 'index.php?view=products_view&CatID=120&SubCatID=', '', '_parent', '22074front-view-yellow-orange-green-juice-bottles.jpg', 120),
(123, '2', 'All Product Containers', 'index.php?view=products_view&CatID=109&SubCatID=', '', '_parent', '97495high-angle-delicious-sushi-arrangement.jpg', 109),
(124, '3', 'Sushi Container ', 'index.php?view=products_view&CatID=123&SubCatID=', '', '_parent', '99228high-angle-delicious-sushi-arrangement.jpg', 123),
(125, '3', 'Microwave Container', 'index.php?view=products_view&CatID=123&SubCatID=', '', '_parent', '15346side-view-empty-glass-food-container-dark-surface.jpg', 123),
(126, '3', 'Deli Container ', 'index.php?view=products_view&CatID=123&SubCatID=', '', '_parent', '80898female-hand-opening-plastic-container-plastic-container-full-with-sliced-red-peppers.jpg', 123),
(127, '3', 'Plastic Bottles', 'index.php?view=products_view&CatID=123&SubCatID=', '', '_parent', '60709259.jpg', 123),
(128, '3', 'Other Container Products', 'index.php?view=products_view&CatID=123&SubCatID=', '', '_parent', '32160front-view-plastic-casseroles.jpg', 123),
(129, '2', 'All Plastic Bags', 'index.php?view=products_view&CatID=109&SubCatID=', '', '_parent', '98993star.png', 109),
(130, '3', 'Plastic Bags', 'index.php?view=products_view&CatID=129&SubCatID=', '', '_parent', '89993pink-plastic-grocery-bag.jpg', 129),
(131, '1', 'Hygeine', 'index.php?view=products_category_view&CatID=', '', '_parent', '28277pink-plastic-grocery-bag.jpg', 0),
(132, '2', 'Chemical & Hygeine', 'index.php?view=products_view&CatID=131&SubCatID=', '', '_parent', '11131pink-plastic-grocery-bag.jpg', 131),
(133, '3', 'Kitchen Hygeine', 'index.php?view=products_view&CatID=132&SubCatID=', '', '_parent', '73452top-view-eco-friendly-cleaning-products-with-lemon-brushes.jpg', 132),
(134, '3', 'Floor Care Hygeine', 'index.php?view=products_view&CatID=132&SubCatID=', '', '_parent', '67862flat-lay-composition-cleaning-products-with-copyspace.jpg', 132),
(135, '3', 'Washroom Care', 'index.php?view=products_view&CatID=132&SubCatID=', '', '_parent', '35524soap-toiletries-shelf-blue-bathroom.jpg', 132),
(136, '3', 'Industrial Care', 'index.php?view=products_view&CatID=132&SubCatID=', '', '_parent', '5826quality-equipment-with-chemical-cleaning-products-tools-maintenance-swimming-pool-wooden-surface-against-white-background-disinfectant-detergent-cleanser-close-up-front-v.jpg', 132),
(137, '2', 'Cleaning Equipment', 'index.php?view=products_view&CatID=131&SubCatID=', '', '_parent', '8438quality-equipment-with-chemical-cleaning-products-tools-maintenance-swimming-pool-wooden-surface-against-white-background-disinfectant-detergent-cleanser-close-up-front-v.jpg', 131),
(138, '3', 'Waste Bin', 'index.php?view=products_view&CatID=137&SubCatID=', '', '_parent', '4790three-miniature-recycle-bins.jpg', 137),
(139, '3', 'Consumers', 'index.php?view=products_view&CatID=137&SubCatID=', '', '_parent', '50863woman-is-holding-cleaning-product-gloves-rags-basin-white-wall.jpg', 137),
(140, '2', 'All Printing Solution', 'index.php?view=products_view&CatID=108&SubCatID=', '', '_parent', '75089tax (1).png', 108),
(141, '3', 'Printing Solution', 'index.php?view=products_view&CatID=140&SubCatID=', '', '_parent', '97789pile-pizza-boxes.jpg', 140),
(142, '1', 'Other Products', '', '', '_self', '81709tax (1).png', 0),
(143, '2', 'Foam Cups & Boxes', 'index.php?view=products_view&CatID=142&SubCatID=', '', '_parent', '21611tax (1).png', 142),
(144, '3', 'All Foam Products', 'index.php?view=products_view&CatID=143&SubCatID=', '', '_parent', '95776eco-friendly-cups-top-view.jpg', 143),
(145, '2', 'All Bamboo Products', 'index.php?view=products_view&CatID=142&SubCatID=', '', '_parent', '41536flat-lay-composition-cleaning-products-with-copyspace.jpg', 142),
(146, '3', 'Bamboo Products', 'index.php?view=products_view&CatID=145&SubCatID=', '', '_parent', '43524spa-still-life-with-natural-elements.jpg', 145),
(147, '2', 'Aluminum Container', 'index.php?view=products_view&CatID=0&SubCatID=', '', '_parent', '16652pile-pizza-boxes.jpg', 142),
(148, '3', 'Aluminum Container', 'index.php?view=products_view&CatID=147&SubCatID=', '', '_parent', '64172high-angle-view-piano-against-white-background.jpg', 147),
(149, '2', 'Hygiene & Protection', 'index.php?view=products_view&CatID=131&SubCatID=', '', '_parent', '58938high-angle-view-piano-against-white-background.jpg', 131),
(150, '3', 'Gloves', 'index.php?view=products_view&CatID=149&SubCatID=', '', '_parent', '29367side-view-doctor-putting-glove.jpg', 149),
(151, '3', 'Other Protection Products', 'index.php?view=products_view&CatID=149&SubCatID=', '', '_parent', '741773778746.jpg', 149),
(152, '2', 'Bagasse Product', 'index.php?view=products_view&CatID=108&SubCatID=', '', '_parent', '11500ecological-disposable-tableware-made-bamboo-wood-paper-cups-knives-forks-isolated-top-view.jpg', 108),
(153, '3', 'All Bagasse Product', 'index.php?view=products_view&CatID=152&SubCatID=', '', '_parent', '66052ecological-disposable-tableware-made-bamboo-wood-paper-cups-knives-forks-isolated-top-view.jpg', 152),
(156, '3', 'test', 'index.php?view=products_view&CatID=108&SubCatID=', '&lt;p&gt;test&lt;/p&gt;', '_self', '22251Facebook Hook Design.jpg', 108);

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
(57, 'client 14', '21926_Logos14.webp'),
(56, 'client 13', '26984_Logos13.webp'),
(55, 'client 12', '88707_Logos12.webp'),
(54, 'client 11', '79309_Logos11.webp'),
(53, 'client 10', '77331_Logos10.webp'),
(52, 'client 9', '26472_Logos9.webp'),
(51, 'client 8', '34418_Logos8.webp'),
(50, 'client 7', '56444_Logos7.webp'),
(49, 'client 6', '33947_Logos6.webp'),
(48, 'client 5', '32896_Logos5.webp'),
(47, 'client 4', '29894_Logos4.webp'),
(46, 'client 3', '41568_Logos3.webp'),
(45, 'client 2', '75794_Logos2.webp'),
(44, 'client 1', '23235_Logos1.webp');

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
(1, 'Contact Details of new theme', 'Shop #. 6, Raffat Building, Near JNP Signal, Industrial Area 2, Sharjah, UAE.', 'info@lappybook.com', '+971 55 860 6678', '+971 55 860 6678', ' 10am - 9pm', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d588.8579928273698!2d-1.7348937714625288!3d53.81739063457279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sKings%20park%2C%20Idle%20road%2C%20Bradford%20%20BD2%202AL!5e0!3m2!1sen!2s!4v1569565815180!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 1);

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
(254, 'BS626119', 'guest', '229', '1', 'M', 'Black', 2520, 0, 'saadrazzaq@gmail.com', 'Saad Razzaq', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', '', 'sdsd', 13213, 0, 0, 'Cash On Delivery (COD)', 2, '', '2024-11-11 09:27:18'),
(255, 'BS798339', 'customer', '236', '1', 'M', 'Black', 2499, 58, 'saadrazzaq624@gmail.com', 'saad_1234', '03184202899', '', '', '', '', '', 0, 0, 0, 'Cash On Delivery (COD)', 2, '', '2024-11-11 10:18:43'),
(256, 'BS738870', 'customer', '236', '1', 'M', 'Black', 2499, 58, 'saadrazzaq624@gmail.com', 'saad_1234', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', 'qwe', 'sdsd', 123, 0, 0, 'Cash On Delivery (COD)', 2, '', '2024-11-11 10:22:26'),
(257, 'BS296611', 'guest', '227', '2', 'M', 'Black', 5040, 0, 'saadrazzaq624@gmail.com', 'Saad Razzaq', '03184202899', 'wah antt', 'pakistan', 'POF Wah Cantt', '', 'sdsd', 1212, 0, 0, 'Cash On Delivery (COD)', 2, '', '2024-11-11 11:05:56');

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
  `brand_id` int(11) NOT NULL,
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

INSERT INTO `sm_products` (`pro_id`, `pro_mcat_id`, `brand_id`, `pro_cat_id`, `pro_ed_addtocart`, `pro_name`, `pro_price`, `pro_discount`, `pro_keyfeature`, `pro_overview`, `pro_spces`, `pro_image`, `pro_video`, `pro_ava_qty`, `pro_stars`, `pro_keywords`, `pro_sku`, `pro_status`, `pro_size_guidline`) VALUES
(259, 100, 19, 102, 1, 'MAXI ROLL EMB 1PLYL/2PLY', 10, 1, '', '<p>MAXI ROLL 500g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 550g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 600g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 620g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 650g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 700g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 750g EMB 1PLYL/2PLY 1x6 Poly/Carton Pack<br></p>', '', '40275_high-angle-stack-with-rolls-toilet-paper.jpg', '', 37, 0, '', 'SKU_004', 1, '78834high-angle-rolls-toilet-paper.jpg'),
(258, 100, 19, 101, 1, 'Facial Tissues', 10, 1, '', '<p>Facial Tissue (150 Sheets) 5 x 6 Facial Tissue (200 Sheets) 5 x 6&nbsp;<br></p>', '', 'Facial Tissue.jpg', '', 20, 0, '', 'SKU_003', 1, '171507447918.jpg'),
(257, 100, 19, 101, 1, 'Boutique Tissues', 10, 1, '', '<p>Boutique Tissue 1 x 36-1 x 48<br></p>', '', 'Boutique Tissue .jpg', '', 20, 0, '', 'SKU_002', 1, '60408top-view-furoshiki-packages-arrangement.jpg'),
(256, 100, 19, 101, 1, 'Facial Tissues White ', 10, 1, '', '<p>Facial Tissue White 1 x 36-1 x 48<br></p>', '', 'Facial Tissue White .jpg', '', 20, 0, '', 'SKU_001', 1, '133013137.jpg'),
(260, 100, 19, 102, 1, 'MAXI ROLL EMB PLAIN 1PLYL / 2PLY', 10, 1, '', '<p>MAXI ROLL 800g EMB PLAIN 1PLYL / 2PLY 1x6 Poly/Carton Pack <br></p><p>MAXI ROLL 850g EMB PLAINTPLYL/2PLY 1x6 Poly/Carton <br></p><p>Pack MAXI ROLL 900g EMB PLAIN 1PLYL/2PLY 1x6 Poly/Carton<br></p><p> Pack MAXI ROLL 1KG EMB PLAIN 1PLYL/2PLY 1x6 Poly/Carton <br></p><p>Pack MAXI ROLL 1.1KG EMB PLAIN 1PLYL/2PLY 1x6 Poly/Carton <br></p><p>Pack MAXI ROLL 1.2KG EMB PLAIN 1PLYL/2PLY 1x6 Poly/Carton Pac<br></p>', '', '84616_rolls-felt-fabric.jpg', '', 20, 0, '', 'SKU_005', 1, '951456278.jpg'),
(261, 100, 19, 103, 1, 'Toilet Paper Sheets', 10, 1, '', '<p>Toilet Papers 100 Sheets 10x10 <br></p><p>Toilet Papers 200 Sheets 10x10 <br></p><p>Toilet Papers 400 Sheets 8+2 10x10<br></p>', '', '82870_Toilet Papers Sheets.jpg', '', 20, 0, '', 'SKU_006', 1, '76522close-up-backet-with-toilet-paper-rolls.jpg'),
(262, 100, 19, 103, 1, 'Toilet Paper Plain Sheets', 10, 1, '', '<p>Toilet Papers plain 400 Sheets 10+2 12x4 <br></p><p>Toilet Papers plain 400 Sheets 10+2 12x10<br></p>', '', '30931_Toilet Papers plain Sheets.jpg', '', 20, 0, '', 'SKU_007', 1, '28821front-view-neatly-stacked-toilet-paper-rolls (1).jpg'),
(263, 100, 19, 104, 1, ' Printed Napkin ', 10, 1, '', '<p>Napkin 23x23 Your Artwork <br></p><p>Napkin 33x33 Your Artwork <br></p><p>Napkin 40x40 Your Artwork<br></p>', '', ' Printed Napkin .jpg', '', 20, 0, '', 'SKU_008', 1, '36860restaurant-table-with-cutlery.jpg'),
(264, 100, 19, 104, 1, 'Napkin', 10, 1, '', '<p>Napkin 23x23 White, Black, Brown <br></p><p>Napkin 33x33 All Colors <br></p><p>Napkin 40x40 White, Black, Brown<br></p>', '', 'Napkin.jpg', '', 20, 0, '', 'SKU_0010', 1, '7875The classic buffalo check pattern comes to life on….jpg'),
(265, 100, 19, 104, 1, 'Coctails Napkin', 10, 1, '', '', '', 'Coctails Napkin.jpg', '', 100, 0, '', 'SKU_010', 1, '41614high-angle-view-drink-table.jpg'),
(266, 100, 19, 101, 1, 'Facial Tissue White', 20, 1, '', '<p>Facial Tissue White</p><p>1 x 36-1 x 48</p><p>Boutique Tissue</p><p>1 x 36-1 x 48</p>', '', 'Facial Tissue White.jpg', '', 10, 0, 'Facial Tissue White', '011', 1, '2544581dm6VZnWjL._UF894,1000_QL80_.jpg'),
(267, 100, 19, 106, 1, 'FRESH NYLON TISSUE', 20, 1, '', '<p>Nylon Facial Tissue 200 Sheets</p><p>1x30 Pack</p><p>Nylon Facial Tissue 200 Sheets</p><p>1x30 Pack</p><p>Nylon Fresh Tissue 200 Sheets</p><p>1x30 Pack</p>', '', 'FRESH NYLON TISSUE.jpg', '', 10, 0, '', '012', 1, '71368presto-2-ply-facial-tissue.jpg'),
(268, 100, 19, 106, 1, 'FRESH NYLON PLAIN SHEETS', 20, 1, '', '<p>Nylon Fresh Plain 400 Sheets</p><p>1x30 Pack</p><p>Nylon Fresh Plain 400 Sheets</p><p>1x30 Pack</p><p>Nylon Fresh Plain 400 Sheets</p><p>1x30 Pack</p><p>Nylon Fresh Plain 600 Sheets</p><p>1x30 Pack</p>', '', 'FRESH NYLON PLAIN SHEETS.jpg', '', 10, 0, '', '013', 1, '68283water-proof-raincoat-fabric.jpg'),
(269, 100, 19, 107, 1, 'FRESH RECTANGLE TISSUES', 20, 1, '', '<p>PLAIN 80 x 90 x 100 Sheets</p><p>1x36 cartons</p><p>PLAIN 80 x 90 x 100 Sheets</p><p>1x42 cartons</p><p>PLAIN 80 x 90 x 100 Sheets</p><p>1x48 cartons</p>', '', 'FRESH RECTANGLE TISSUES.jpg', '', 10, 0, '', '014', 1, '2303671Ds+n2TpmL._UF894,1000_QL80_.jpg'),
(270, 100, 19, 107, 1, 'FRESH RECTANGLE TISSUES', 20, 1, '', '<p>PLAIN 150 Sheets<br></p><p>PLAIN 200 Sheets</p>', '', 'FRESH RECTANGLE TISSUES.jpg', '', 10, 0, '', '015', 1, '1141971Ds+n2TpmL._UF894,1000_QL80_.jpg'),
(271, 100, 19, 107, 1, 'FRESH LUXURY BROWN TISSUE 2 PLY', 20, 1, '', '<p>PLAIN 200 Sheets</p><p>1x30 cartons</p><p><br></p>', '', 'FRESH LUXURY BROWN TISSUE 2 PLY.jpg', '', 10, 0, '', '016', 1, '91090HSTR18.jpg'),
(272, 100, 19, 104, 1, 'PRINTED NAPKINS', 20, 1, '', '<p>Napkin 23x23</p><p>Your Artwork</p><p>Napkin 33x33</p><p>Your Artwork</p><p>Napkin 40x40</p><p>Your Artwork</p>', '', 'PRINTED NAPKINS.jpg', '', 10, 0, '', '017', 1, '68055Regent-Crown-Napkins.jpg'),
(273, 100, 19, 104, 1, 'NAPKINS', 20, 1, '', '<p>Napkin 23x23</p><p>White, Black, Brown</p><p>Napkin 33x33</p><p>All Colors</p><p>Napkin 40x40</p><p>White, Black, Brown</p>', '', 'NAPKINS.jpg', '', 60, 0, '', '018', 1, '42064Regent-Crown-Napkins.jpg'),
(274, 100, 19, 105, 1, 'THERMAL ROLLS', 20, 1, '', '<p>Thermal Roll</p><p>(1 ply) 80x80</p><p>Thermal Roll</p><p>(2 ply) 76x70</p>', '', 'THERMAL ROLLS.jpg', '', 10, 0, '', '019', 1, '8856523356249a18a4a37d95af57a4afdb7ab.jpg_720x720q80.jpg'),
(275, 110, 19, 111, 1, ' Ripple Cups', 20, 1, '', '<p>Brown Ripple Cups 4oz/8oz/12oz/16oz <br></p><p>Black Ripple Cups 4oz/Boz/12oz/16oz<br></p><p> White Ripple Cups 4oz/8oz/12oz/16oz<br></p>', '', ' Ripple Cups.jpg', '', 60, 0, '', 'SKU_015', 1, '70829collection-plastic-cups-table.jpg'),
(276, 110, 19, 112, 1, 'SINGLE WALL HD', 20, 1, '', '<p>Single wall Brown Cup 4oz/8oz/12oz <br></p><p>Single wall White 4oz/8oz/12oz&nbsp;<br></p>', '', 'SINGLE WALL HD.jpg', '', 40, 0, '', 'SKU_016', 1, '97703one-focused-front-unfocused-brown-take-away-cardboard-paper-cups-closed-with-caps-isolated-black-mirrored-retail-presentation.jpg'),
(277, 110, 19, 112, 1, 'DOUBLE WALL COLOR CUPS', 20, 1, '', '<p>&nbsp;Color Cups Blue 4oz/8oz/12oz<br></p><p> Color Cups Pink 4oz/8oz/12oz<br></p><p> Color Cups Black 4oz/8oz/12oz<br></p><p> Color Cups Red 4oz/8oz/12oz<br></p><p> Color Cups Brown 4oz/8oz/12oz<br></p><p> Color Cups White 4oz/8oz/12oz<br></p>', '', 'DOUBLE WALL COLOR CUPS.jpg', '', 120, 0, '', 'SKU_017', 1, '71619assortment-eco-friendly-tableware.jpg'),
(278, 110, 19, 112, 1, 'PRINTED CUPS', 20, 1, '', '<p>4oz/8oz/12oz/16oz<br></p>', '', 'PRINTED CUPS.jpg', '', 20, 0, '', 'SKU_018', 1, '1572cup-tasty-coffee-cafe-horizontal-with-copy-space-toning.jpg'),
(279, 113, 19, 114, 1, 'PAPER BAG WITH TWISTED HANDLE', 20, 1, '', '<p>Brown Bag Twisted Handle (22x27x11) (28x33x16) (34x34x18)<br></p><p>White Bag Twisted Handle (22x27x11) (28x33x16) (34x34x18)<br></p>', '', '28368_piece-brown-rye-bread-presented-near-take-away-blank-bag-from-craft-paper-artisan-bakery-wooden-background.jpg', '', 40, 0, '', 'SKU_019', 1, '70252piece-brown-rye-bread-presented-near-take-away-blank-bag-from-craft-paper-artisan-bakery-wooden-background.jpg'),
(280, 113, 19, 114, 1, 'PAPER BAG WITH TWISTED HANDLE', 20, 1, '', '<p>Black Paper Bag (22x27x11) (28x33x16) (34x34x18)&nbsp;<br></p>', '', 'PAPER BAG WITH TWISTED HANDLE.jpg', '', 20, 0, '', 'SKU_020', 1, '51234close-up-hand-holding-black-bag-mock-up.jpg'),
(281, 113, 19, 115, 1, 'DIE CUT HANDLE BAGS / SOS PAPER BAGS', 20, 1, '', '<p>Paper Bag White #0,1,2,3,4,5,6<br></p><p> Paper Bag Brown #0,1,2,3,4,5,6 <br></p>', '', '96299_ampersand-flash-drive-near-paper-bag.jpg', '', 40, 0, '', 'SKU_021', 1, '68473ampersand-flash-drive-near-paper-bag.jpg'),
(282, 113, 19, 115, 1, 'DIE CUT HANDLE BAGS / SOS PAPER BAGS', 20, 1, '', '<p>Die Cut Handle 28x28x15cm, 32x35x18cm<br></p>', '', '25386_download.jpg', '', 20, 0, '', 'SKU_022', 1, '90683download.jpg'),
(283, 113, 19, 115, 1, 'DIE CUT HANDLE BAGS / SOS PAPER BAGS', 20, 1, '', '<p>SOS Paper Bags White & Brown #4, #6, #8, #12<br></p>', '', '13858_download (1).jpg', '', 40, 0, '', 'SKU_024', 1, '39283download (1).jpg'),
(284, 113, 19, 116, 1, 'PARTY BAGS', 20, 1, '', '<p>Paper Bag Navy Blue 24x18x12 cm<br></p><p> Paper Bag Baby pink 24x18x12 cm<br></p><p> Paper Bag Turquoise 24x18x12 cm<br></p>', '', 'PARTY BAGS.jpg', '', 60, 0, '', 'SKU_024', 1, '16881wrapped-gift-decorative-paper-shopping-bag-wooden-surface.jpg'),
(285, 113, 19, 116, 1, 'ECO TIN TIE BAGS', 20, 1, '', '<p>Tin Tie Bag Small 260x88x47 mm<br></p><p> Tin Tie Bag Medium 246x115x72 mm <br></p><p>Tin Tie Bag Large 242x155x70 mm&nbsp;<br></p>', '', 'ECO TIN TIE BAGS.jpg', '', 60, 0, '', 'SKU_025', 1, '79442beige-canvas-tote-bag.jpg'),
(286, 117, 19, 118, 1, 'WOODEN BOAT TRAYS ', 20, 1, '', '<p>(105x72x40 mm)<br></p><p> (140x85x55 mm) <br></p><p>(170x96x55 mm)&nbsp;<br></p>', '', 'WOODEN BOAT TRAYS .jpg', '', 20, 0, '', 'SKU_026', 1, '32817wooden-bowl.jpg'),
(287, 117, 19, 118, 1, 'BROWN/WHITE KRAFT PAPER BOAT TRAYS', 20, 1, '', '<p>Boat Tray<br></p><p> Small Boat<br></p><p> Tray Medium Boat<br></p><p> Tray Large Hot Dog Tray (190x70x50 mm)<br></p>', '', '99999_still-life-cardboard-organic-dinnerware.jpg', '', 80, 0, '', 'SKU_027', 1, '16483still-life-cardboard-organic-dinnerware.jpg'),
(288, 117, 19, 118, 1, 'KRAFT NOODLE BOX', 20, 1, '', '<p>16 Oz<br></p><p> 26 Oz <br></p><p>32 Oz<br></p>', '', 'KRAFT NOODLE BOX.jpg', '', 20, 0, '', 'SKU_027', 1, '89958298996862777982231.jpg'),
(289, 117, 19, 118, 1, 'KRAFT PAIL BOX', 20, 1, '', '<p>16 Oz <br></p><p>26 Oz <br></p><p>32 Oz<br></p>', '', 'KRAFT PAIL BOX.jpg', '', 20, 0, '', 'SKU_028', 1, '8452442122222-489a-4ce7-9663-4cda89fe6e3c.jpg'),
(290, 117, 19, 118, 1, 'FRENCH FRIES HOLDERS', 20, 1, '', '<p>Fries Scoop<br></p><p> Endura box<br></p>', '', 'FRENCH FRIES HOLDERS.jpg', '', 20, 0, '', 'SKU_029', 1, '81376Amazon_com_ 50 Pcs French Fries Holders Box….jpg'),
(291, 117, 0, 118, 1, 'PAPER SOUP CUPS', 20, 1, '', '<p>400 ml<br></p><p> 500 ml<br></p><p> 750 ml <br></p><p>1000 ml<br></p>', '', 'PAPER SOUP CUPS.jpg', '', 20, 0, '', 'SKU_030', 1, '7308Perfect for delis, markets, and salad bars, this….jpg'),
(292, 117, 19, 118, 1, 'KRAFT LUNCH BOX WITHOUT WINDOW', 20, 1, '', '<p>Kraft Lunch Box (XS)<br></p><p> Kraft Lunch Box (S) <br></p><p>Kraft Lunch Box (M)<br></p><p> Kraft Lunch Box (L) <br></p><p>Kraft Lunch Box (XL)&nbsp;<br></p>', '', 'KRAFT LUNCH BOX WITHOUT WINDOW.jpg', '', 20, 0, '', 'SKU_031', 1, '98042Lunch Box Kraft Jendela L _ Kotak Nasi Jendela….jpg'),
(293, 117, 19, 118, 1, 'KRAFT LUNCH BOX WITH WINDOW', 20, 1, '', '<p>XSmall (400 ml, 120x88x37 mm)<br></p><p> Small (700 ml, 150x100x45 mm)<br></p><p> Medium (1100 ml, 180x120x50 mm)<br></p><p> Large (1900 ml, 195x140x65 mm)<br></p>', '', 'KRAFT LUNCH BOX WITH WINDOW.jpg', '', 20, 0, '', 'SKU_032', 1, '29281Si vous souhaitez afficher magnifiquement vos….jpg'),
(294, 117, 19, 118, 1, 'WHITE SALAD BOWL ', 20, 1, '', '<p>Kraft Salad Bowl (500 ml)<br></p><p> Kraft Salad Bowl (750 ml) <br></p><p>Kraft Salad Bowl (1000 ml) <br></p><p>Kraft Salad Bowl (1090 ml)<br></p><p> Kraft Salad Bowl (1300 ml)&nbsp;<br></p>', '', 'WHITE SALAD BOWL .jpg', '', 20, 0, '', 'SKU_032', 1, '25158500ml Round Kraft Paper Bowl The 500ml Round Kraft….jpg'),
(295, 117, 19, 118, 1, 'KRAFT SALAD BOWL', 20, 1, '', '<p>White Salad Bowls (500 ml)<br></p><p> White Salad Bowls (750 ml)<br></p><p> White Salad Bowls (1000 ml)<br></p><p> White Salad Bowls (1090 ml) <br></p><p>White Salad Bowls (1300 ml)&nbsp;<br></p>', '', 'KRAFT SALAD BOWL.jpg', '', 20, 0, '', 'SKU_033', 1, '11436Kraft lunch bowl are made by nature kraft or….jpg'),
(296, 117, 19, 118, 1, 'KRAFT SOUP BOWL', 20, 1, '', '<p>Kraft Soup Bowl - 8 oz<br></p><p> Kraft Soup Bowl - 12 oz <br></p><p>Kraft Soup Bowl - 16 oz<br></p><p> Kraft Soup Bowl - 24 oz<br></p><p> Kraft Soup Bowl - 32 oz<br></p>', '', 'KRAFT SOUP BOWL.jpg', '', 20, 0, '', 'SKU_034', 1, '90450a2e82ac7-2abf-469f-b103-8c63673f70bb.jpg'),
(297, 117, 19, 118, 1, 'ENDURA BOXES', 20, 1, '', '<p>Endura Burger<br></p><p> Box Snack <br></p><p>Box Hot Box<br></p>', '', 'ENDURA BOXES.jpg', '', 20, 0, '', 'SKU_035', 1, '65659? Sustainable Choice_ Made from kraft paper, this….jpg'),
(298, 117, 19, 118, 1, 'PIZZA BOX', 20, 1, '', '<p>23 x 23cm (1 x 100) <br></p><p>28 x 28cm (1 x 100) <br></p><p>33 x 33cm (1 x 100)&nbsp;<br></p>', '', 'PIZZA BOX.jpg', '', 20, 0, '', 'SKU_035', 1, '47208e71b67f7-3e3e-41c1-84a2-01343465687d.jpg'),
(299, 117, 19, 118, 1, 'PIZZA BOX WHITE & BROWN', 20, 1, '', '<p>22 x 22cm (1 x 100)<br></p><p> 28 x 28cm (1 x 100) <br></p><p>33 x 33cm (1 x 100)<br></p>', '', 'PIZZA BOX WHITE & BROWN.jpg', '', 40, 0, '', 'SKU_035', 1, '20334PRICES MAY VARY_ PIZZA BOXES_ These classic….jpg'),
(300, 117, 19, 118, 1, 'JUICE CUP HOLDER\'S ', 20, 1, '', '<p>2 can (1 x 250) <br></p><p>4 can (1 x 250)<br></p>', '', '56764_8395d897-ab73-4158-ad7d-04b2a4c754cb.jpg', '', 20, 0, '', 'SKU_036', 1, '320248395d897-ab73-4158-ad7d-04b2a4c754cb.jpg'),
(301, 117, 19, 118, 1, 'COFFEE CUP HOLDER\'S', 20, 1, '', '<p>Corrugated Holder4 can (1 x 300) 2 can (1 x 400)ï¿½</p><p> E-Flute Cup Holders2 can (1 x 100)<br></p><p>Mighty Drink Tray 4 can (1 x 100)ï¿½<br></p>', '', '50613_Item Type_ Disposable Cup.jpeg', '', 20, 0, '', 'SKU_037', 1, '28738EcoQuality 2 or 4 Drink Cup Carriers with Handles….jpg'),
(302, 117, 19, 118, 1, 'POP CORN TUB', 20, 1, '', '<p>32 oz (1 x 500)<br></p><p> 46 oz (1x500)<br></p><p> 64 oz (1 x 500)<br></p><p> 85 oz (1 x 500)<br></p>', '', 'POP CORN TUB.jpg', '', 20, 0, '', 'SKU_038', 1, '51463Amazon_com_ Popcorn Containers Cardboard Popcorn….jpg'),
(303, 110, 19, 119, 1, 'CAKE BOXES ', 20, 1, '', '<p>15 x 15<br></p><p> 20 x 20<br></p><p> 25 x 25<br></p><p> 30 x 30 <br></p><p>35 x 35&nbsp;<br></p>', '', 'CAKE BOXES .jpg', '', 20, 0, '', 'SKU_038', 1, '22067KBG Cake Boxes 10pcs 10x10x10 Inches With Window….jpg'),
(304, 110, 19, 119, 1, 'ICE CREAM CUPS', 20, 1, '', '<p>4oz<br></p><p>8oz <br></p><p>12oz<br></p>', '', 'ICE CREAM CUPS.jpg', '', 20, 0, '', 'SKU_039', 1, '28527Belinlen 40 Count (16 oz) One - Pint Frozen….jpg'),
(305, 110, 19, 119, 1, 'WHITE SINGLE WALL CUPS ', 20, 1, '', '<p>4 oz<br></p><p> 7 oz <br></p><p>8 oz<br></p><p> 12 oz<br></p><p> 16oz <br></p><p>Customization Options Available&nbsp;<br></p>', '', 'WHITE SINGLE WALL CUPS .jpg', '', 20, 0, '', 'SKU_040', 1, '9947216oz Single Wall White Paper Cup The 16oz Single….jpg'),
(306, 110, 19, 119, 1, 'BROWN/WHITE DOUBLE WALL CUPS', 20, 1, '', '<p>4 oz<br></p><p> 7 oz<br></p><p> 8 oz<br></p><p> 12 oz<br></p><p> 16oz<br></p>', '', '12902_Double Wall Paper Cups.jpeg', '', 20, 0, '', 'SKU_041', 1, '74377Diamond Pineapple Like Coffee Kraft Paper Cup….jpg'),
(307, 110, 19, 119, 1, 'DOLLY PAPERS', 20, 1, '', '', '', 'DOLLY PAPERS.jpg', '', 20, 0, '', 'SKU_042', 1, '37802dyed doilies.jpg'),
(308, 110, 19, 119, 1, 'COCKTAIL STIRRER ', 20, 1, '', '', '', 'COCKTAIL STIRRER .jpg', '', 20, 0, '', 'SKU_043', 1, '41471An indispensable cocktail tool A cocktail stirrer….jpg'),
(309, 120, 19, 121, 1, 'JUICE CUPS PLA & PET', 20, 1, '', '<p>Clear Pet Juice Cup - 8 oz 20 x 50<br></p><p> Clear Pet Juice Cup - 10 oz 20 x 50<br></p><p> Clear Pet Juice Cup- 12 oz 20 x 50 <br></p><p>Clear Pet Juice Cup - 14 oz 20 x 50<br></p><p> Clear Pet Juice Cup - 16 oz 20 x 50<br></p><p> Clear Pet Juice Cup - 20 oz 20 x 50<br></p><p> Clear Pet Juice Cup - 24 oz 20 x 50<br></p>', '', 'JUICE CUPS PLA & PET.jpg', '', 20, 0, '', 'SKU_043', 1, '53510Transparent Disposable PLA Plastic Cup Capacity….jpg'),
(310, 120, 19, 122, 1, 'PET DOME & FLAT LID', 20, 1, '', '<p>Dome Lid For Cup 20 x 50<br></p>', '', 'PET DOME & FLAT LID.jpg', '', 20, 0, '', 'SKU_044', 1, '7912412 oz_ Parfait Cup with Fabri-Kal Divided Insert….jpg'),
(311, 120, 19, 122, 1, 'Pet Demo & Flat LID', 20, 1, '', '<p>Flat Lid for Cup 20 x 50<br></p>', '', '98139_Color_Multicolor -n.jpeg', '', 20, 0, '', 'SKU_045', 1, '434627oz_200ml Disposable Plastic PET Clear Yogurt Cup….jpg'),
(312, 123, 19, 124, 1, 'SUSHI CONTAINER BLACK BASE CONTAINERS', 20, 1, '', '<p>Sushi Container With Lid SC01B 1 x 500<br></p><p> Sushi Container With Lid SC02B 1 x 500 <br></p><p>Sushi Container With Lid SCO3B 1 x 500 <br></p><p>Sushi Container With Lid SCO6B 1 x 500 ?<br></p>', '', '99740_The Alsaqer 3 Section.jpeg', '', 20, 0, '', 'SKU_046', 1, '16325GET Eco-Takeouts 9_ x 6 1_2_ x 2 3_4_ Black….jpg'),
(313, 123, 19, 124, 1, 'SUSHI CONTAINER BLACK BASE CONTAINERS', 20, 1, '', '<p>Sushi Squircis SO36 1 x 100 <br></p>', '', 'SUSHI CONTAINER BLACK BASE CONTAINERS.jpg', '', 20, 0, '', 'SKU_046', 1, '92160Enhance your sushi packaging with the Stalk Market….jpg'),
(314, 123, 19, 124, 1, 'SUSHI CONTAINER BLACK BASE CONTAINERS ', 20, 1, '', '<p>Square Sushi Trays 1 x 100<br></p>', '', 'SUSHI CONTAINER BLACK BASE CONTAINERS .jpg', '', 20, 0, '', 'SKU_047', 1, '54136Jm Packing Food Grade Biodegradable Pp_pgm Sushi….jpg'),
(315, 123, 19, 125, 1, 'ROUND RED & BLACK MICROWAVE CONTAINERS', 20, 1, '', '<p>Round Red &amp; Black Soup Bowls + Lid 450 cc<br></p><p> Round Red &amp; Black Soup Bowls + Lid 50 cc<br></p><p> Round Red &amp; Black Soup Bowls + Lid 700 cc<br></p><p> Round Red &amp; Black Soup Bowls + Lid 1000 cc&nbsp;<br></p>', '', 'ROUND RED & BLACK MICROWAVE CONTAINERS.jpg', '', 40, 0, '', 'SKU_048', 1, '54762Instantly improve your kiosk, food truck….jpg'),
(316, 123, 19, 126, 1, 'DELI CONTAINERS RED & BLACK', 20, 1, '', '<p>Deli Containers Red &amp; Black 650ml 1 x 300<br></p><p> Deli Container Red &amp; Black 800ml 1 x 300<br></p><p> Deli Container Red &amp; Black 1000ml 1 x 250<br></p>', '', 'DELI CONTAINERS RED & BLACK.jpg', '', 40, 0, '', 'SKU_048', 1, '73715Buy Hyper Tough Large Storage Bin, 27 Gallon….jpg'),
(317, 123, 19, 125, 1, 'MICROWAVE CONTAINER ROUND PS LIDS', 20, 1, '', '<p>Microwave Container Round in Lid 8311 1 x 150<br></p><p> Microwave Container Round in Lid 8377 1 x 150 <br></p><p>Microwave Container Round in Lid 8399 1 x 150<br></p>', '', 'MICROWAVE CONTAINER ROUND PS LIDS.jpg', '', 20, 0, '', 'SKU_049', 1, '15387These disposable food containers are perfect for….jpg'),
(318, 123, 19, 125, 1, 'MICROWAVE CONTAINER RECTANGULAR & SECTIONS', 20, 1, '', '<p>Microwave Container Rectangular - 1 Section 1 x 250</p><p>Microwave Container Rectangular - 2 Section 1 x 250</p><p>Microwave Container Rectangular - 3 Section 1 x 250</p><p>Microwave Container Rectangular - 5 Section 1 x 150</p><p>Microwave Container Rectangular - 6 Section 1 x 150</p><p>Microwave Container Rectangular - 8 Sectionï¿½1 x 150ï¿½</p>', '', '47605_Instantly improve your kiosk.jpeg', '', 20, 0, '', 'SKU_049', 1, '7357330oz 2 Section Black Rectangular Microwavable….jpg'),
(319, 123, 19, 125, 1, 'MICROWAVE CONTAINER RECTANGULAR & SECTIONS', 20, 1, '', '<p>Microwave Container Rectangular - HD RE 12 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 16 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 24 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 28 1 x 150<br></p><p> Microwave Container Rectangular - HD RE 32 1 x 150<br></p><p> Microwave Container Rectangular - HD RE 38 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 48 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 58 1 x 150 <br></p><p>Microwave Container Rectangular - HD RE 232 1 x 150<br></p><p> Microwave Container Rectangular - HD RE 342 1 x 150 V<br></p>', '', 'MICROWAVE CONTAINER RECTANGULAR & SECTIONS.jpg', '', 20, 0, '', 'SKU_050', 1, '68024? Generous 32oz Capacity_ Perfect for large….jpg'),
(320, 123, 19, 125, 1, 'MICROWAVE CONTAINERS ROUND', 20, 1, '', '<p>Microwave Container Round - HD RO 16 1 x 150<br></p><p> Microwave Container Round - HD RO 24 1 x 150 <br></p><p>Microwave Container Round - HD RO 32 1 x 150<br></p><p> Microwave Container Round - HD RO 37 1 x 150 <br></p><p>Microwave Container Round - HD RO 40 1 x 150<br></p><p> Microwave Container Round - HD RO 48 1 x 150<br></p><p> Microwave Container Round - HD RO 348 1 x 150<br></p>', '', 'MICROWAVE CONTAINERS ROUND.jpg', '', 20, 0, '', 'SKU_051', 1, '85149Microwave Safe Round Food Containers with….jpg'),
(321, 123, 19, 125, 1, 'MICROWAVE CONTAINERS ROUND CLEAR', 20, 1, '', '<p>Microwave Container Round with Lid (225-CC) 1 x 500 <br></p><p>Microwave Container Round with Lid (250-CC) 1 x 500<br></p><p> Microwave Container Round with Lid (450-CC) 1 x 500&nbsp;<br></p>', '', 'MICROWAVE CONTAINERS ROUND CLEAR.jpg', '', 20, 0, '', 'SKU_052', 1, '89680Seamlessly package soups or side dishes with our….jpg'),
(324, 123, 19, 125, 1, 'WHITE PLASTIC CONTAINER', 20, 1, '', '<p>White Plastic Container 80cc/250cc/350cc/400cc<br></p>', '', 'WHITE PLASTIC CONTAINER.jpg', '', 20, 0, '', 'SKU_051', 1, '9053Our durable and high quality disposable PP plastic….jpg'),
(323, 123, 19, 125, 1, 'WHITE PLASTIC CONTAINER', 20, 1, '', '<p>Buckets & Tub 1Ltr, 2 Ltr, 4 Ltr<br></p>', '', '15791_2L plastic storage container.jpeg', '', 20, 0, '', 'SKU_054', 1, '29669Round Plastic Wash Basin tackable Wash Tub Camping….jpg'),
(325, 123, 19, 125, 1, 'RECTANGLE AND ROUND PLASTIC TRAYS', 20, 1, '', '<p>Rectangle #1,#2,#3 to #7 and Circle<br></p>', '', '95953_Approx_ outer dimensions_ 11_ x 16_ Approx.jpg', '', 20, 0, '', 'SKU_053', 1, '37445Document Das Tablett für Schnellimbisse aus….jpg'),
(326, 123, 19, 125, 1, 'RECTANGLE AND ROUND PLASTIC TRAYS', 20, 1, '', '<p>Plastic Plate Round 7cc/10 cc<br></p>', '', 'RECTANGLE AND ROUND PLASTIC TRAYS.jpg', '', 20, 0, '', 'SKU_054', 1, '1828Melamine made from 50% sustainable natural….jpg'),
(327, 123, 19, 125, 1, 'MICROWAVE CONTAINER RECTANGULAR CLEAR', 20, 1, '', '<p>Microwave Container Rectangular with Lid - 500cc 1 x 500<br></p><p> Microwave Container Rectangular with Lid - 650cc 1 x 500<br></p><p> Microwave Container Rectangular with Lid - 750cc 1 x 500 <br></p><p>Microwave Container Rectangular with Lid - 1000cc 1 x 500<br></p><p> Microwave Container Rectangular with Lid - 1500cc 1 x 250<br></p>', '', 'MICROWAVE CONTAINER RECTANGULAR CLEAR.jpg', '', 20, 0, '', 'SKU_055', 1, '2976? Generous 32oz Capacity_ Perfect for large… (1).jpg'),
(328, 123, 19, 127, 1, 'PLASTIC BOTTLES', 20, 1, '', '<p>Plastic Bottles 60 ml 149 Pcs<br></p><p> Plastic Bottles 250 ml 187 Pcs<br></p><p> Plastic Bottles 330 ml 170 Pcs <br></p><p>Plastic Bottles 500 ml 190 Pcs <br></p><p>Plastic Bottles 1 Ltr 104 Pcs <br></p><p>Plastic Bottles 1.5 Ltr 104 Pcs<br></p>', '', '26310_16 oz_ Round PET Clear Juice Bottle with Black Lid.jpg', '', 20, 0, '', 'SKU_056', 1, '71734In just a few decades, single-use plastic bottles….jpg'),
(329, 123, 19, 128, 1, 'SAUCE CUPS', 20, 1, '', '<p>Clear Sauce Cups with Lid - 1 oz 1 x 2000 <br></p><p>Clear / Black Sauce Cup With Lid - 2 oz 1 x 2000<br></p><p> Clear / Black Sauce Cup With Lid - 3 oz 1 x 1500<br></p><p> Clear / Black Sauce Cup With Lid - 4 oz 1 x 1500<br></p>', '', 'SAUCE CUPS.jpg', '', 20, 0, '', 'SKU_056', 1, '14147Help control portion sizes and costs with the….jpg'),
(330, 123, 19, 128, 1, 'CLEAR CONTAINER RECTANGULAR WITH LID', 20, 1, '', '<p>Clear Container Rectangular With Lid - 8oz 1 x 250<br></p><p> Clear Container Rectangular With Lid - 12oz 1 x 250 <br></p><p>Clear Container Rectangular With Lid - 24oz 1 x 250&nbsp;<br></p>', '', 'CLEAR CONTAINER RECTANGULAR WITH LID.jpg', '', 20, 0, '', 'SKU_057', 1, '63652? Perfect 24oz Capacity_ Ideal for medium-sized….jpg'),
(331, 123, 19, 128, 1, 'SALAD CONTAINER HINGED LID', 20, 1, '', '<p>Salad Container Hinged Lid PTS 250 CC 1 x 250<br></p><p> Salad Container Hinged Lid PTS 500 CC 1 x 250 <br></p><p>Salad Container Hinged Lid PTS 750 CC 1 x 2500&nbsp;<br></p>', '', 'SALAD CONTAINER HINGED LID.jpg', '', 20, 0, '', 'SKU_058', 1, '89109? Keep your food fresh and secure with our Clear….jpg'),
(332, 123, 19, 128, 1, 'CLEAR HOTDOG BOX', 20, 1, '', '<p>Clear Hotdog Box 7\'/9/12\'<br></p>', '', 'CLEAR HOTDOG BOX.jpg', '', 20, 0, '', 'SKU_059', 1, '85896? Envases para Hot Dog ?Comprar?.jpg'),
(333, 129, 19, 130, 1, 'GARBAGE BAGS', 20, 1, '', '<p>Garbage Bag 18 Kg (65 x 95) LID<br></p><p> Garbage Bag 18 Kg (80 x 110) LID<br></p><p> Garbage Bag 18 Kg (95 x 120) LID <br></p><p>Garbage Bag 18 Kg (110 x 130) LID<br></p>', '', 'GARBAGE BAGS.jpg', '', 20, 0, '', 'SKU_059', 1, '750650pcs Extra Large Garbage Bags Plastic Thickened….jpg'),
(334, 129, 19, 130, 1, 'CLEAR GARBAGE BAGS', 20, 1, '', '<p>Clear Plastic Bag 65 x 95 <br></p><p>Clear Plastic Bag 95 x 120<br></p><p> Clear Plastic Bag 110 x 130&nbsp;<br></p>', '', 'CLEAR GARBAGE BAGS.jpg', '', 20, 0, '', 'SKU_060', 1, '26591_Pack of 50 heavy-duty, low density polyethylene….jpg'),
(335, 129, 19, 130, 1, 'PLASTIC SHOPPING BAGS', 20, 1, '', '<p>Plastic Bag S/M/L <br></p><p>Plastic Bag Smokey S/M/L&nbsp;<br></p>', '', 'PLASTIC SHOPPING BAGS.jpg', '', 20, 0, '', 'SKU_061', 1, '19404Charlie from London has pledged to _Give up….jpg'),
(336, 129, 19, 130, 1, 'VEGETABLE ROLL', 20, 1, '', '<p>Veg Roll 1x4<br></p>', '', 'VEGETABLE ROLL.jpg', '', 20, 0, '', 'SKU_062', 1, '29967PRICES MAY VARY_ VERSATILE STORAGE_ Clear plastic….jpg'),
(337, 129, 19, 130, 1, 'VACUUM BAGS', 20, 1, '', '<p>Vacuum Bag 25 x 30, 40 x 50, 20 x 30, 30 x 40 cm<br></p>', '', 'VACUUM BAGS.jpg', '', 20, 0, '', 'SKU_063', 1, '34206f924b66a-dd51-488f-ae4f-3ac280912ff5.jpg'),
(340, 129, 19, 130, 1, 'TP & PORTIONS BAGS', 20, 1, '', '<p>TP Bags <br></p><p>Portion Bags<br></p><p> Multi Purpose&nbsp;<br></p>', '', 'TP & PORTIONS BAGS.jpg', '', 20, 0, '', 'SKU_065', 1, '47781Portion Bag, BPI Certified No, Closure Type Flip….jpg'),
(339, 129, 19, 130, 1, 'PIPING BAGS', 20, 1, '', '<p>Piping Bag 40?150 cm 1x100ï¿½<br></p>', '', '47714_14 piezas de acero inoxidable.jpeg', '', 20, 0, '', 'SKU_064', 1, '44514Tamodan Piping Bags 100PCS & 16 Inches Tipless….jpg'),
(341, 129, 19, 130, 1, 'ZIPPER BAG', 20, 1, '', '<p>Zipper Bag 18 x 21/27 x 30 / 30 x 40 cm<br></p>', '', 'ZIPPER BAG.jpg', '', 20, 0, '', 'SKU_066', 1, '20852Cheap Gift Bags & Wrapping Supplies, Buy Quality….jpg'),
(342, 132, 19, 133, 1, 'KITCHEN HYGIENE', 20, 1, '', '<p>Liquid hand soap aqua fresh<br></p>', '', 'KITCHEN HYGIENE.jpg', '', 20, 0, '', 'SKU_067', 1, '14072c06222a7-8b53-49cb-960e-d7a9e3d7c89c.jpg'),
(343, 132, 19, 133, 1, 'Hand Sanitizer Gel', 20, 1, '', '<p>Hand Sanitizer Gel&nbsp;<br></p>', '', 'Hand Sanitizer Gel.jpg', '', 20, 0, '', 'SKU_068', 1, '57932Scent_Citrus   Number of Pieces_1….jpg'),
(344, 132, 19, 133, 1, 'Cream Hand Soap Green Apple', 20, 1, '', '<p>Cream Hand Soap Green Apple<br></p>', '', 'Cream Hand Soap Green Apple.jpg', '', 20, 0, '', 'SKU_069', 1, '78957This soap has the beautiful scents of baked apple….jpg'),
(345, 132, 19, 133, 1, 'Anti Bacterial cream soap', 20, 1, '', '<p>Anti Bacterial cream soap<br></p>', '', 'Anti Bacterial cream soap.jpg', '', 20, 0, '', 'SKU_068', 1, '41964Eek Spider - Yummy Mummy Marshmallow PocketBac….jpg'),
(346, 132, 19, 133, 1, 'Fruit Vegetable sanitizer', 20, 2, '', '<p>Fruit Vegetable sanitizer<br></p>', '', 'Fruit Vegetable sanitizer.jpg', '', 20, 0, '', 'SKU_069', 1, '97681MOX? Citrus Hand Sanitizer Gel - 8 oz Alcohol….jpg'),
(347, 132, 19, 133, 1, 'Kitchen Sanitizer', 20, 1, '', '<p>Kitchen Sanitizer<br></p>', '', 'Kitchen Sanitizer.jpg', '', 20, 0, '', 'SKU_070', 1, '92894420ml Automatic Liquid Soap Dispensers Recharge….jpg'),
(351, 132, 19, 133, 1, 'Anti Bacterial Dishwash', 20, 1, '', '<p>Anti Bacterial Dishwash&nbsp;<br></p>', '', 'Anti Bacterial Dishwash.jpg', '', 20, 0, '', 'SKU_073', 1, '36532d6fbdb29-2bda-4a5a-b593-1e2e05b4d1be.jpg'),
(349, 132, 19, 133, 1, 'Oven Cleaner', 20, 1, '', '<p>Oven Cleaner<br></p>', '', '74798_56800462-8668-40ef-b1a5.jpeg', '', 20, 0, '', 'SKU_071', 1, '62121Easy-Off Heavy Duty Degreaser Cleaner is specially….jpg'),
(350, 132, 19, 133, 1, 'Auto Dishwash', 20, 1, '', '<p>Auto Dishwash<br></p>', '', 'Auto Dishwash.jpg', '', 20, 0, '', 'SKU_072', 1, '63499Top dishwashers 2018; how to clean hard water in….jpg'),
(352, 132, 19, 133, 1, 'Antiseptic Disinfectant ï¿½ Plus', 20, 1, '', '<p>Antiseptic Disinfectant ï¿½ Plus<br></p>', '', '88721_Disinfectant spray.jpeg', '', 20, 0, '', 'SKU_073', 1, '66443Sanitize Antiseptic spray Disinfection….jpg'),
(353, 132, 19, 133, 1, 'Dishwash Regular / Super / Ultra', 20, 1, '', '<p>Dishwash Regular / Super / Ultra<br></p>', '', '81939_a8a39d82-0aa5-48f0.jpeg', '', 20, 0, '', 'SKU_074', 1, '36340Ajax Ultra Triple Action Dish Liquid provides a….jpg'),
(354, 132, 19, 133, 1, 'Antiseptic Disinfectant', 20, 1, '', '<p>Antiseptic Disinfectant<br></p>', '', 'Antiseptic Disinfectant.jpg', '', 20, 0, '', 'SKU_075', 1, '28522Eliminate odours and germs quickly with the….jpg'),
(355, 132, 19, 134, 1, 'Lemon Disinfectant', 20, 1, '', '<p>Lemon Disinfectant<br></p>', '', 'Lemon Disinfectant.jpg', '', 20, 0, '', 'SKU_076', 1, '71660Lysol Lemon All-Purpose Disinfectant Cleaner….jpg'),
(356, 132, 19, 134, 1, 'Lavender Pine Disinfectant', 20, 1, '', '<p>Lavender Pine Disinfectant<br></p>', '', 'Lavender Pine Disinfectant.jpg', '', 20, 0, '', 'SKU_077', 1, '78280Pine O Cleen Disinfectant Lavender is designed to….jpg'),
(357, 132, 19, 134, 1, 'High Dry Foam Carpet Shampoo Floor polish', 20, 1, '', '<p>High Dry Foam Carpet Shampoo Floor polish&nbsp;<br></p>', '', 'High Dry Foam Carpet Shampoo Floor polish.jpg', '', 20, 0, '', 'SKU_078', 1, '43265Kirby DIY dry foam carpet shampoo 3QT cold water….jpg'),
(358, 132, 19, 134, 1, 'Floor Cleaner', 20, 1, '', '<p>Floor Cleaner<br></p>', '', 'Floor Cleaner.jpg', '', 20, 0, '', 'SKU_079', 1, '4750306cb4d8f-0f2c-4c79-a05d-0cb9868d2963.jpg'),
(359, 132, 19, 135, 1, 'Antiseptic Disinfectant', 20, 1, '', '<p>Antiseptic Disinfectant&nbsp;<br></p>', '', 'Antiseptic Disinfectant.jpg', '', 20, 0, '', 'SKU_079', 1, '70956Household grade disinfectant_ Cleanses and helps….jpg'),
(360, 132, 19, 135, 1, 'Flushout Toilet Cleaner', 20, 1, '', '<p>Flushout Toilet Cleaner<br></p>', '', 'Flushout Toilet Cleaner.jpg', '', 20, 0, '', 'SKU_080', 1, '24057Color_Pink _nPower Supply_None _nMaterial_PVC _n.jpg'),
(361, 132, 19, 135, 1, 'Bleach Lemon', 201, 1, '', '<p>Bleach Lemon&nbsp;<br></p>', '', 'Bleach Lemon.jpg', '', 20, 0, '', 'SKU_081', 1, '22631Ajax Ultra Lemon (Super Degreaser) Dish Liquid is….jpg'),
(362, 132, 19, 135, 1, 'Bleach Extra', 20, 1, '', '<p>Bleach Extra<br></p>', '', 'Bleach Extra.jpg', '', 20, 0, '', 'SKU_082', 1, '26373b2013b23-88f8-4f2e-9784-7883049cd720.jpg'),
(363, 132, 19, 135, 1, 'Bleach Regular', 20, 1, '', '<p>Bleach Regular<br></p>', '', 'Bleach Regular.jpg', '', 20, 0, '', 'SKU_083', 1, '62253fb728644-c682-43d5-8511-03b0f9dfe172.jpg'),
(364, 132, 19, 135, 1, 'Pine Disinfectant', 20, 1, '', '<p>Pine Disinfectant&nbsp;<br></p>', '', 'Pine Disinfectant.jpg', '', 20, 0, '', 'SKU_074', 1, '4169Pine O Cleen Antibacterial Disinfectant All In 1….jpg'),
(365, 132, 19, 136, 1, 'Lemon Disinfectant', 20, 1, '', '<p>Lemon Disinfectant<br></p>', '', 'Lemon Disinfectant.jpg', '', 20, 0, '', 'SKU_084', 1, '11531Dettol Lemon Breeze Anti-Bacterial Spray is your….jpg'),
(366, 132, 19, 136, 1, 'Lavender Pine Disinfectant', 20, 1, '', '<p>Lavender Pine Disinfectant<br></p>', '', 'Lavender Pine Disinfectant.jpg', '', 20, 0, '', 'SKU_084', 1, '35910Caldrea Countertop Cleanser, Lavender Pine, 16….jpg'),
(367, 132, 19, 136, 1, 'High Dry Foam Carpet Shampoo', 20, 1, '', '<p>High Dry Foam Carpet Shampoo<br></p>', '', 'High Dry Foam Carpet Shampoo.jpg', '', 20, 0, '', 'SKU_085', 1, '63829A superior high foaming detergent shampoo for use….jpg'),
(368, 132, 19, 136, 1, 'Floor polish', 20, 1, '', '<p>Floor polish<br></p>', '', 'Floor polish.jpg', '', 20, 0, '', 'SKU_086', 1, '42248YanYan Floor Cleaner _ Multi-Vinegar Household….jpg'),
(369, 132, 19, 136, 1, 'Floor Cleaner', 20, 1, '', '<p>Floor Cleaner<br></p>', '', 'Floor Cleaner.jpg', '', 20, 0, '', 'SKU_086', 1, '70615Description Description&Previewshipping&policy….jpg'),
(370, 137, 19, 138, 1, 'White dustbin bag white', 20, 1, '', '<p>White dustbin bag white<br></p>', '', '91920_Efficiently dispose.jpeg', '', 20, 0, '', 'SKU_086', 1, '36597427ce108-572c-4256-920e-2ca051c124de.jpg'),
(371, 137, 19, 138, 1, 'HD garbage Bag black', 20, 1, '', '<p>HD garbage Bag black<br></p>', '', 'HD garbage Bag black.jpg', '', 20, 0, '', 'SKU_087', 1, '36546Download Black trash bag_ AI Generative for free.jpg'),
(372, 137, 19, 138, 1, 'Out Door Garbage Bin', 20, 1, '', '<p>Out Door Garbage Bin<br></p>', '', 'Out Door Garbage Bin.jpg', '', 20, 0, '', 'SKU_088', 1, '17535Equip your industrial facilities with this Witt….jpg'),
(373, 137, 19, 138, 1, 'Out door garbage Bin -HDPE', 20, 1, '', '<p>Out door garbage Bin -HDPE&nbsp;<br></p>', '', 'Out door garbage Bin -HDPE.jpg', '', 20, 0, '', 'SKU_089', 1, '27453735cb1d2-c4f2-4cb4-894b-8a44b7dab403.jpg'),
(374, 137, 19, 138, 1, 'Plastic swing top TKF 7006', 20, 1, '', '<p>Plastic swing top TKF 7006<br></p>', '', 'Plastic swing top TKF 7006.jpg', '', 20, 0, '', 'SKU_90', 1, '48410swings ;).jpg'),
(375, 137, 19, 138, 1, 'Metal Waste Basket', 20, 1, '', '<p>Metal Waste Basket&nbsp;<br></p>', '', 'Metal Waste Basket.jpg', '', 20, 0, '', 'SKU_091', 1, '341627cd69fa-6c04-486e-b00a-ab8d0bd7090b.jpg'),
(376, 137, 19, 138, 1, 'Tekbin multipurpose round bin with detachable wheels', 20, 1, '', '<p>Tekbin multipurpose round bin with detachable wheels<br></p>', '', 'Tekbin multipurpose round bin with detachable wheels.jpg', '', 20, 0, '', 'SKU_092', 1, '71967Wheeled Bins manufactured from high density….jpg'),
(377, 137, 19, 138, 1, 'Tekbin Sanitary Bin', 20, 1, '', '<p>Tekbin Sanitary Bin<br></p>', '', 'Tekbin Sanitary Bin.jpg', '', 20, 0, '', 'SKU_093', 1, '49949Stainless Steel Pedal Bin 3L & 10L Set Of 2 Waste….jpg'),
(378, 137, 19, 138, 1, 'Plastic foot operated Bin 30,45,68,87L', 20, 1, '', '<p>Plastic foot operated Bin 30,45,68,87L<br></p>', '', 'Plastic foot operated Bin 30,45,68,87L.jpg', '', 20, 0, '', 'SKU_094', 1, '50409Stylish pedal bin with removable inner container….jpg'),
(379, 137, 19, 138, 1, 'Black metal outdoor bin with Ashtray', 20, 1, '', '<p style=\"position: relative;\">Black metal outdoor bin with Ashtray&nbsp;<br></p>', '', 'Black metal outdoor bin with Ashtray.jpg', '', 20, 0, '', 'SKU_095', 1, '84985Zaza Creative Metal Slatted Trash Can Outdoor….jpg'),
(380, 137, 19, 138, 1, 'Wooden Out Door Bin with Ashtray', 20, 1, '', '<p>Wooden Out Door Bin with Ashtray<br></p>', '', '75134_6e08015e-6cb2.jpeg', '', 20, 0, '', 'SKU_096', 1, '27096Wooden 60 Liters Outdoor Ashtray Trash Can….jpg'),
(381, 137, 19, 138, 1, 'Stainless steel ashtray', 20, 1, '', '<p>Stainless steel ashtrayStainless steel ashtray<br></p>', '', 'Stainless steel ashtray.jpg', '', 20, 0, '', 'SKU_097', 1, '49154Paper bin_ashtray in brushed stainless steel.jpg'),
(382, 137, 19, 138, 1, 'Stainless Steel Swing Top Bin 47L', 20, 1, '', '<p>Stainless Steel Swing Top Bin 47L<br></p>', '', 'Stainless Steel Swing Top Bin 47L.jpg', '', 20, 0, '', 'SKU_097', 1, '8120360L Swing Bin Flip Top Plastic Swing Bin for Home….jpg'),
(383, 137, 19, 138, 1, 'Stainless steel recycle', 20, 1, '', '<p>Stainless steel recycleï¿½<br></p>', '', '55052_0a441a5b-dbff-4427.jpeg', '', 20, 0, '', 'SKU_097', 1, '14926They do make side-by-side trash_recycle bin for….jpg'),
(384, 137, 19, 139, 1, 'Plastic wringer for mop trolley', 20, 2, '', '<p>Plastic wringer for mop trolley<br></p>', '', '30076_three bucket mop wringer.jpeg', '', 20, 0, '', 'SKU_094', 1, '55385Mop and bucket with wringer set - Double wringer….jpg'),
(385, 137, 19, 139, 1, 'Double mop bucket trolley-plastic frame', 20, 1, '', '<p>Double mop bucket trolley-plastic frame<br></p>', '', 'Double mop bucket trolley-plastic frame.jpg', '', 20, 0, '', 'SKU_095', 1, '39620Household Mop Housekeeping Equipment Cleaning….jpg'),
(386, 137, 19, 139, 1, 'Multifunctional mop bucket trolley', 20, 1, '', '<p>Multifunctional mop bucket trolley<br></p>', '', 'Multifunctional mop bucket trolley.jpg', '', 20, 0, '', 'SKU_096', 1, '947106bc94a6d-3f3c-4b64-bd01-1413487e3710.jpg'),
(387, 137, 19, 139, 1, 'Disposable shoe cover', 20, 1, '', '<p>Disposable shoe cover<br></p>', '', 'Disposable shoe cover.jpg', '', 20, 0, '', 'SKU_097', 1, '78843Yeeco Shoe Covers, Disposable Shoe Covers 100….jpg'),
(388, 137, 19, 139, 1, 'Household rubber gloves', 20, 1, '', '<p>Household rubber gloves<br></p>', '', 'Household rubber gloves.jpg', '', 20, 0, '', 'SKU_098', 1, '28335Anti-slip Household Cleaning Gloves Durable Rubber….jpg'),
(389, 137, 19, 139, 1, 'Disposable PE gloves', 20, 1, '', '<p>Disposable PE gloves<br></p>', '', 'Disposable PE gloves.jpg', '', 20, 0, '', 'SKU_099', 1, '50245Designed for efficiency and safety, our Disposable….jpg'),
(390, 140, 19, 141, 1, 'Customized Printing Stickers', 20, 1, '', '<p>Customized Printing Stickers<br></p>', '', 'Customized Printing Stickers.jpg', '', 20, 0, '', 'SKU_099', 1, '80220100 Custom Vinyl Stickers – Personalized Just for….jpg'),
(391, 140, 19, 141, 1, 'Customized Boxes', 20, 1, '', '<p>Customized Boxes<br></p>', '', 'Customized Boxes.jpg', '', 20, 0, '', 'SKU_100', 1, '66496d41dd91b-8826-48fd-b49a-10f334037891.jpg'),
(392, 140, 19, 141, 1, 'Printed Kraft Paper Bags', 20, 1, '', '<p>Printed Kraft Paper Bags&nbsp;<br></p>', '', 'Printed Kraft Paper Bags.jpg', '', 20, 0, '', 'SKU_101', 1, '467808pcs_Set 21_15_8cm Leaf & Floral Print Kraft Paper….jpg'),
(393, 140, 19, 141, 1, 'Printed Pizza Boxes', 20, 1, '', '<p>Printed Pizza Boxes<br></p>', '', 'Printed Pizza Boxes.jpg', '', 20, 0, '', 'SKU_102', 1, '45032Pizza Box Design, Pizza Packaging Design, Pizza….jpg'),
(394, 140, 19, 141, 1, 'Printed Wet Wipes', 20, 1, '', '<p>Printed Wet Wipes<br></p>', '', 'Printed Wet Wipes.jpg', '', 20, 0, '', 'SKU_103', 1, '88161wet wipe for baby parisa elmi  +989332169369.jpg'),
(395, 140, 19, 141, 1, 'Printed Sandwich Papers', 20, 1, '', '<p>Printed Sandwich Papers<br></p>', '', 'Printed Sandwich Papers.jpg', '', 20, 0, '', 'SKU_104', 1, '37571Elevate your take-out snacks or combo platters….jpg'),
(396, 140, 19, 141, 1, 'Grease Proof Wrap Papers', 20, 1, '', '<p>Grease Proof Wrap Papers<br></p>', '', 'Grease Proof Wrap Papers.jpg', '', 20, 0, '', 'SKU_105', 1, '17885Custom Printed Greaseproof Sheets _ Best Packaging….jpg'),
(397, 140, 19, 141, 1, 'Customized Table Matts', 20, 1, '', '<p>Customized Table Matts<br></p>', '', 'Customized Table Matts.jpg', '', 20, 0, '', 'SKU_106', 1, '80752Personalized placemats are such a fun addition to….jpg'),
(398, 140, 19, 141, 1, 'Business Cards', 20, 1, '', '<p>Business Cards<br></p>', '', 'Business Cards.jpg', '', 20, 0, '', 'SKU_107', 1, '20801f04e7ee2-c105-498a-8026-e4bc47e1b239.jpg'),
(399, 140, 19, 141, 1, 'Letterheads', 20, 1, '', '<p>Letterheads<br></p>', '', 'Letterheads.jpg', '', 20, 0, '', 'SKU_108', 1, '92031??? ?? ?????_ _ Instant Download _ Easy….jpg'),
(400, 140, 19, 141, 1, 'Flyers', 20, 1, '', '<p>Flyers&nbsp;<br></p>', '', 'Flyers.jpg', '', 20, 0, '', 'SKU_109', 1, '85857?.jpg'),
(401, 140, 19, 141, 1, 'Brochures', 20, 1, '', '<p>Brochures&nbsp;<br></p>', '', 'Brochures.jpg', '', 20, 0, '', 'SKU_110', 1, '69617117d60fa-8dd1-494e-aee6-cf7daca0b154.jpg'),
(402, 140, 19, 141, 1, 'Catalogues', 20, 1, '', '<p>Catalogues&nbsp;<br></p>', '', 'Catalogues.jpg', '', 20, 0, '', 'SKU_111', 1, '209790b5f6f28-1269-49f7-a44e-2821daa9bdfc.jpg'),
(403, 140, 19, 141, 1, 'NCR Vouchers', 20, 1, '', '<p>NCR Vouchers&nbsp;<br></p>', '', 'NCR Vouchers.jpg', '', 20, 0, '', 'SKU_112', 1, '98913a6c1f1ef-784e-45e3-80a0-1469acd31e11.jpg'),
(404, 140, 19, 141, 1, 'Calendars', 20, 1, '', '<p>Calendars<br></p>', '', 'Calendars.jpg', '', 20, 0, '', 'SKU_113', 1, '9574758f3ebbb-5ff3-40ad-825c-47bdbec5d40f.jpg'),
(405, 140, 19, 141, 1, 'Box & Paper Bags', 20, 1, '', '<p>Box &amp; Paper Bags<br></p>', '', 'Box & Paper Bags.jpg', '', 20, 0, '', 'SKU_114', 1, '33396Craft Paper Bags _ Pappco Greenware _ Paper Bag….jpg'),
(406, 143, 19, 144, 1, 'FOAM CUPS & PAPER CUPS', 20, 1, '', '<p>Paper Cup-2.5oz, 4oz, 6oz, 7oz 1 x 1000<br></p><p>Foam Cup 6oz, 8oz, 12oz 1 x 1000Â </p>', '', '85846_formscups-cofecups-image.jpeg', '', 20, 0, '', 'SKU_114', 1, '74231Interlocking Monogram Party Cups - Foam Cups are….jpg'),
(407, 143, 19, 144, 1, 'FOAM PLATES', 20, 1, '', '<p>Foam Plate - 7inch 1 x 500 <br></p><p>Foam Plate - 9inch 1 x 500<br></p><p> Foam Plate 10/12 inch 1 x 500 <br></p><p>Foam Plate - 3 Section 1 x 500&nbsp;<br></p>', '', 'FOAM PLATES.jpg', '', 20, 0, '', 'SKU_115', 1, '12678Disposable Foam Plate, Bio-Based Yes, BPI….jpg'),
(408, 143, 19, 144, 1, 'FOAM LUNCH BOX BOWLS', 20, 1, '', '<p>Foam Lunch Box - LB1 1 x 250 <br></p><p>Foam Lunch Box - LB2 1 x 100<br></p><p> Foam Lunch Box - LB3 3Section 1 x 100 <br></p><p>Foam Bowl - 8 Oz 1 x 1000<br></p><p> Foam Bowl - 12 Oz 1 x 1000<br></p>', '', 'FOAM LUNCH BOX BOWLS.jpg', '', 20, 0, '', 'SKU_116', 1, '32960Return Policy Fast Delivery Trusted seller 75 Pack….jpg'),
(409, 143, 19, 144, 1, 'FOAM TRAYS', 20, 1, '', '<p>Foam Tray SO 1 x 500<br></p><p> Foam Tray S1 1 x 500<br></p><p> Foam Tray M13 1 x 500<br></p><p> Foam Tray M14 1 x 250 <br></p><p>Foam Tray JB2 1 x 100 <br></p><p>Colored Foam Tray 18D 1 x 200<br></p><p> Colored Foam Tray 13M 1 x 500 <br></p><p>Colored Foam Tray M3 1 x 500<br></p>', '', 'FOAM TRAYS.jpg', '', 20, 0, '', 'SKU_117', 1, '4487607542264-e5e2-46d6-9975-7cc27b7dec66.jpg'),
(410, 145, 19, 146, 1, 'KNOTTED SKEWER ', 20, 1, '', '<p>KNOTTED SKEWER 10CM, 12CM&nbsp;<br></p>', '', 'KNOTTED SKEWER .jpg', '', 20, 0, '', 'SKU_117', 1, '915Kalp Kürdan 15 cm.jpg'),
(411, 145, 19, 146, 1, 'WOODEN CHOPSTICK ', 20, 1, '', '<p>WOODEN CHOPSTICK 21CM, 23CM&nbsp;<br></p>', '', 'WOODEN CHOPSTICK .jpg', '', 20, 0, '', 'SKU_118', 1, '43805Eetstokjes van natuurlijk hout met bloemenpatroon….jpg'),
(412, 145, 19, 146, 1, 'GUNSHAPE SKEWER ', 20, 1, '', '<p>GUNSHAPE SKEWER 9 CM-15 CM<br></p>', '', 'GUNSHAPE SKEWER .jpg', '', 20, 0, '', 'SKU_119', 1, '77767natural green one side with a flat \'paddle\' end….jpg'),
(413, 145, 19, 146, 1, 'BAMBOO SKEWER ', 20, 1, '', '<p>BAMBOO SKEWER 6 B\' 10\' 12\'<br></p>', '', 'BAMBOO SKEWER .jpg', '', 20, 0, '', 'SU_120', 1, '88577Farberware BBQ Bamboo Skewers, 75 Count, 12-Inch….jpg'),
(414, 145, 19, 146, 1, 'WRAPPED WOODEN COFFEE STIRRER BOX', 20, 1, '', '<p>190mm Quantity-1000 pcs<br></p>', '', 'WRAPPED WOODEN COFFEE STIRRER BOX.jpg', '', 20, 0, '', 'SKU_121', 1, '56273Entdecke Nachhaltigkeit mit unseren Holz….jpg'),
(415, 145, 19, 146, 1, 'CAKE BOARDS', 20, 1, '', '<p>CAKE BOARDS<br></p>', '', 'CAKE BOARDS.jpg', '', 20, 0, '', 'SKU_122', 1, '62807eBay Product Listing Welcome to shopping….jpg'),
(416, 145, 19, 146, 1, 'WRAPPED TOOTHPICKS', 20, 1, '', '<p>WRAPPED TOOTHPICKS<br></p>', '', 'WRAPPED TOOTHPICKS.jpg', '', 20, 0, '', 'SKU_123', 1, '726451000x Wooden Toothpicks Individually Paper Wrapped….jpg'),
(417, 145, 19, 146, 1, 'FRUIT PICK/ND FRUIT PICK', 20, 1, '', '<p>FRUIT PICK/ND FRUIT PICK<br></p>', '', '59395_Fruit skewers.jpeg', '', 20, 0, '', 'SKU_124', 1, '37167Cater to guests who care about the environment….jpg'),
(418, 145, 19, 146, 1, 'WOODEN FORK KNIFE & SPOON', 20, 1, '', '<p>WOODEN FORK KNIFE &amp; SPOON<br></p>', '', 'WOODEN FORK KNIFE & SPOON.jpg', '', 20, 0, '', 'SKU_125', 1, '77092f20d2d83-39d2-4ae8-be91-c1e5a918d657.jpg'),
(421, 145, 19, 146, 1, 'UMBRELLA TOOTHPICKS', 20, 1, '', '<p>UMBRELLA TOOTHPICKS<br></p>', '', 'UMBRELLA TOOTHPICKS.jpg', '', 20, 0, '', 'SKU_126', 1, '96850e428d82c-3e5d-46ad-a7c6-48a2eb60c61a.jpg'),
(420, 145, 19, 146, 1, 'TOOTHPICKS', 20, 1, '', '<p>TOOTHPICKS<br></p>', '', '42089_Fruit skewers.jpeg', '', 20, 0, '', 'SKU_125', 1, '65900Toothpicks are among the most straightforward of….jpg'),
(422, 145, 19, 146, 1, 'HANDY FUEL', 20, 1, '', '<p>HANDY FUEL<br></p>', '', 'HANDY FUEL.jpg', '', 20, 0, '', 'SKU_127', 1, '70796PRICES MAY VARY_ High-quality original Löwe hose….jpg'),
(423, 145, 19, 146, 1, 'WOODEN COFFEE STIRRER DOX', 20, 1, '', '<p>140mmx10m Quontty-1000 pes</p>', '', '13980_Gmark Disposable Wooden.jpeg', '', 20, 0, '', 'SKU_128', 1, '64890Related Hot Sale 80 pcs Usb C Dust Plug_ Plastic….jpg'),
(424, 145, 19, 146, 1, 'PAPER COASTER ', 20, 1, '', '<p>1x5000 1X1000&nbsp;<br></p><p>Paper Coaster Round 9cm. Customized Paper Coaste<br></p>', '', 'PAPER COASTER .jpg', '', 20, 0, '', 'SKU_129', 1, '77684Verwandter Heißer Verkauf Steckbretthaken s Haken….jpg'),
(425, 145, 19, 146, 1, 'TOOTHPICS', 20, 1, '', '<p>PACK OF 1000 units<br></p>', '', 'TOOTHPICS.jpg', '', 20, 0, '', 'SKU_130', 1, '14427Nachhaltige Lösung für den Alltag_ Unsere….jpg'),
(426, 145, 19, 146, 1, 'SANDWICH PAPER & BURGER FOIL', 20, 1, '', '<p>Sandwich Paper White 25X35<br></p><p> Grease Proof Sandwich Papers 25X35, 35X35, 35X40 <br></p><p>Burger Foil Wrap 4X500<br></p>', '', 'SANDWICH PAPER & BURGER FOIL.jpg', '', 20, 0, '', 'SKU_131', 1, '2981840_50_100??? ????? ??? ???????? ??????????????????….jpg'),
(427, 123, 19, 128, 1, 'CLEAR HINGED SANDWICH SINGLE WEDGE', 20, 1, '', '<p>Clear Hinged Sandwich Single Wedge 1 x 1000<br></p><p> Clear Hinged Sandwich Double Wedge 1 x 500&nbsp;<br></p>', '', 'CLEAR HINGED SANDWICH SINGLE WEDGE.jpg', '', 20, 0, '', 'SKU_133', 1, '39640Securely refrigerate your homemade sandwiches with….jpg'),
(430, 123, 19, 128, 1, 'CLEAR HINGED SALAD BOWL', 20, 1, '', '<p>Clear Hinged Salad Bowl 8 oz 1 x 300 <br></p><p>Clear Hinged Salad Bowl 12 oz 1 x 300<br></p><p> Clear Hinged Salad Bowl 24 oz 1 x 300 <br></p><p>Clear Hinged Salad Bowl 32 oz 1 x 300&nbsp;<br></p>', '', 'CLEAR HINGED SALAD BOWL.jpg', '', 20, 0, '', 'SKU_137', 1, '36053451329-4930-4505-85f4-c039577cc438.jpg'),
(429, 123, 19, 128, 1, 'DIAMOND SHAPE SALAD BOWL', 20, 1, '', '<p>Salad Bowl Diamond Shape 12 oz, 16 oz, 24 oz<br></p><p> Salad Bowl Diamond Shape 32 oz<br></p>', '', '90078_Heavy crystal salad bowl.jpeg', '', 20, 0, '', 'SKU_135', 1, '56317Beautiful clear crystal bowl with narrow bottom….jpg'),
(431, 123, 19, 128, 1, 'CAKE CONTAINERS', 20, 1, '', '<p>Round Cake Containers With Black Bottom 7\" 1 x 100 <br></p><p>Round Cake Containers With Black Bottom 10\" 1 x 80<br></p>', '', 'CAKE CONTAINERS.jpg', '', 20, 0, '', 'SKU_138', 1, '78734Learn how to Maintain Cake Aesthetics with our….jpg'),
(432, 123, 19, 128, 1, 'CILING FILM', 20, 1, '', '<p>Cling Film 300 x 30 cm<br></p><p> Cling Film 300 x 45 cm<br></p><p> Cling Film 600 x 45 cm <br></p><p>Cling Film 30 x 1500 m <br></p><p>Cling Film 45 x 1500 m<br></p>', '', 'CILING FILM.jpg', '', 20, 0, '', 'SKU_139', 1, '75712A Plastic cling wrap is a versatile product that….jpg'),
(433, 123, 19, 128, 1, 'Nylon Foil ', 20, 1, '', '<p>Nylon Foil 1 x 10 (1.8 g)<br></p>', '', '57326_Aluminum Foil Paper on Transparent Background.jpg', '', 20, 0, '', 'SKU_140', 1, '68466Aluminum Foil Paper on Transparent Background.jpg'),
(434, 123, 19, 128, 1, 'ALUMINUM FOIL', 20, 1, '', '<p>Aluminum Foil - 45cm 1 x 6<br></p><p> Aluminum Foil - 30cm 1 x 6<br></p><p> Burger Foil 4 x 500<br></p>', '', 'ALUMINUM FOIL.jpg', '', 20, 0, '', 'SKU_141', 1, '49988FOOD PREPARATION AND STORAGE_ Exceptional foil for….jpg'),
(435, 147, 19, 148, 1, 'FOILS & CONTAINERS WITH LID', 20, 1, '', '<p>Aluminum Container Rectangular with Lid-8325 1 x 1000<br></p><p> Aluminum Container Rectangular with Lid-8342 1 x 1000<br></p><p> Aluminum Container Rectangular with Lid - 8368 1 x 900 <br></p><p>Aluminum Container Rectangular with Lid - 8389 1 x 1000<br></p><p> Aluminum Container Rectangular with Lid - 83120 1 x 400<br></p><p> Aluminum Container Rectangular with Lid-83185 1 x 100 <br></p><p>Aluminum Container Rectangular with Lid - 73365 1 x 250<br></p><p> Aluminum Container Rectangular with Lid - 83190 1 x 250<br></p><p> Aluminum Container Rectangular with Lid - 83241 1 x 200 <br></p><p>Aluminum Container Rectangular with Lid - 83163 1 x 800 <br></p><p>Aluminum Container Rectangular with Lid-53535 1 x 50&nbsp;<br></p>', '', 'FOILS & CONTAINERS WITH LID.jpg', '', 20, 0, '', 'SKU_135', 1, '44168OEM FUIIKEEM Small Aluminum Pans with Lids….jpg'),
(436, 147, 19, 148, 1, 'Aluminum Pot Container ', 20, 1, '', '<p>Aluminum Pot Container # 9, 25, 29, 34, 39<br></p>', '', 'Aluminum Pot Container .jpg', '', 20, 0, '', 'SKU_136', 1, '283168ddf7f65-9093-4825-a117-7275491722e7.jpg'),
(437, 147, 19, 148, 1, 'Kunafa Aluminum Container with Lid', 20, 1, '', '<p>Kunafa Aluminum Container with Lid 1 x 1000&nbsp;<br></p>', '', 'Kunafa Aluminum Container with Lid.jpg', '', 20, 0, '', 'SKU_137', 1, '28365harupink 150Pcs_50Set Mini Loaf Pans with Lids and….jpg'),
(438, 147, 19, 148, 1, 'ALUMINUM PLATTER', 20, 1, '', '<p>Aluminum Platter - 6550 1 x 150 <br></p><p>Aluminum Platter - 6586 1 x 100 <br></p><p>Aluminum Platter - 65180 1 x 50<br></p><p> Aluminum Platter - 65220 1 x 50<br></p>', '', 'ALUMINUM PLATTER.jpg', '', 20, 0, '', 'SKU_138', 1, '80917cc0b86cb-24ab-41e8-9a11-f9854039b981.jpg'),
(439, 149, 19, 150, 1, 'LATEX GLOVES', 20, 1, '', '<p>Latex Gloves Small/Medium/Large 10 x 100ï¿½<br></p>', '', '21152_105cc651-b9bc-4708.jpeg', '', 20, 0, '', 'SKU_138', 1, '26230100 Pieces Of Disposable Gloves, Super Durable….jpg'),
(440, 149, 19, 150, 1, 'LATEX GLOVES', 20, 1, '', '<p>Latex Gloves Powder Free Small/Medium/Large 10 x 100<br></p>', '', 'LATEX GLOVES.jpg', '', 20, 0, '', 'SKU_139', 1, '12819Wholesale Cheap Price Competitive Price Natural….jpg'),
(441, 149, 19, 150, 1, 'NITRILE GLOVES BLUE', 20, 1, '', '<p>Nitrile Gloves Blue 10 x 100<br></p>', '', 'NITRILE GLOVES BLUE.jpg', '', 20, 0, '', 'SKU_140', 1, '54996Vinyl Nitrile Blend Examination Gloves-Powder….jpg'),
(442, 149, 19, 150, 1, 'VINYL GLOVES CLEAR / BLUE BLACK', 20, 1, '', '<p>Vinyl Gloves Powdered (Small/Medium/Large) 10 x 100<br></p><p> Vinyl Gloves Powder Free (Small/Medium/Large) 10 x 100<br></p><p> Vinyl Gloves Blue Powdered (Small/Medium/Large) 10 x 100<br></p><p> Vinyl Gloves Blue Powder Free (Small/Medium/Large)ï¿½<br></p>', '', '45316_2023 China Professional.jpeg', '', 40, 0, '', 'SKU_141', 1, '95247Gloves Latex - Ultimate Protection and Grip When….jpg');
INSERT INTO `sm_products` (`pro_id`, `pro_mcat_id`, `brand_id`, `pro_cat_id`, `pro_ed_addtocart`, `pro_name`, `pro_price`, `pro_discount`, `pro_keyfeature`, `pro_overview`, `pro_spces`, `pro_image`, `pro_video`, `pro_ava_qty`, `pro_stars`, `pro_keywords`, `pro_sku`, `pro_status`, `pro_size_guidline`) VALUES
(443, 149, 19, 150, 1, 'PE ARMS SLEEVES CLEAR', 20, 1, '', '<p>PEArms Sleeves - Clear 10 x 100<br></p>', '', 'PE ARMS SLEEVES CLEAR.jpg', '', 20, 0, '', 'SKU_142', 1, '41719Mangas para los brazos con agujero para el pulgar….jpg'),
(444, 149, 19, 150, 1, 'POLY GLOVES - PE', 20, 1, '', '<p>Poly Gloves - PE 10 x 100&nbsp;<br></p>', '', 'POLY GLOVES - PE.jpg', '', 20, 0, '', 'SKU_143', 1, '82969Pidegree poly disposable gloves are designed for….jpg'),
(445, 149, 19, 151, 1, 'APRON PLASTIC', 20, 1, '', '<p>Apron Plastic Disposable 10 x 100<br></p>', '', 'APRON PLASTIC.jpg', '', 20, 0, '', 'SKU_144', 1, '15063PVC Waterproof Apron Men and Women Kitchen….jpg'),
(446, 149, 19, 151, 1, 'DISPOSABLE / BLUE SHOE COVER', 20, 1, '', '<p>Poly Gloves - PE 100 x 100ï¿½<br></p>', '', '54027_100 piezas de.jpeg', '', 20, 0, '', 'SKU_145', 1, '377Product Description 100PCS Non Woven Fabric….jpg'),
(447, 149, 19, 151, 1, 'CHEF HAT NON WOVEN', 20, 1, '', '<p>Chef Hat Non Woven 10 inch 10 x 10<br></p>', '', 'CHEF HAT NON WOVEN.jpg', '', 20, 0, '', 'SKU_146', 1, '43104With elastic in the backOne size fits mostMachine….jpg'),
(448, 149, 19, 151, 1, 'HAIR NET', 20, 1, '', '<p>Hair Net (White/Black/Blue) 1 x 1000<br></p>', '', 'HAIR NET.jpg', '', 20, 0, '', 'SKU_147', 1, '70143Amazon_com_ LEOBRO Hair Nets for Food Service….jpg'),
(449, 149, 19, 151, 1, 'FACE MASK 3 PLY', 20, 1, '', '<p>Face Mask-3Ply 20 x 50<br></p>', '', 'FACE MASK 3 PLY.jpg', '', 20, 0, '', 'SKU_148', 1, '6370Famapro Masks are great quality 4 layer face….jpg'),
(460, 152, 19, 153, 1, 'EG-16S BAGASSE ', 20, 1, '', '<p>EG-16S 16 oz 185x185x31.6 185x180x40 300 pcs 300 pcs 645x290x435 350x190x370<br></p>', '', 'EG-16S BAGASSE PRODUCTS .jpg', '', 20, 0, '', 'SKU_136', 1, '89997Ensure the safety and quality of your to-go meals….jpg'),
(458, 152, 19, 153, 1, 'EG-1.5 BAGASSE ', 20, 1, '', '<p>EG-1.5 15 oz 217.4x137.4x30 215x135x20 600 pcs 600 pcs 590x445x420 450x260x435&nbsp;<br></p>', '', 'EG-1.5 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_135', 1, '35765? Eco-Friendly Bagasse Take Away Containers….jpg'),
(459, 152, 19, 153, 1, 'EG-2.0 BAGASSE ', 20, 1, '', '<p style=\"position: relative;\">EG-2.0 20 oz 240x148x26.5 238x145x23 300 pcs 300 pcs 520x455x250 440x250x315<br></p>', '', 'EG-2.0 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU-136', 1, '22582SOLD BY 10\'SMade from Sugarcane Bagasse_100%….jpg'),
(456, 152, 19, 153, 1, 'EG-0.8 BAGASSE ', 20, 1, '', '<p>EG-0.8 32 oz 185x185x31.6 180x180x70 300 pcs 300 pcs 645x290x435 470x190x370<br></p>', '', 'EG-0.8 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_133', 1, '81926Versatile 23 oz containers perfect for meal prep….jpg'),
(457, 152, 19, 153, 1, 'EG-1.0 BAGASSE ', 20, 1, '', '<p>EG-1.0 10 oz 187.6x130.1x30 184.5x127.5x20 600 pcs 300 pcs 590x400x385 400x380x265<br></p>', '', '88300_Hai kak, Selamat datang.jpeg', '', 20, 0, '', 'SKU_134', 1, '85303Versatile 23 oz containers perfect for meal prep….jpg'),
(454, 152, 19, 153, 1, 'EG-0.4 BAGASSE ', 20, 1, '', '<p>EG-0.4 16 oz 185x185x31.6 185x180x40 300 pcs 300 pcs 645x290x435 350x190x370</p>', '', '54970_Sugarcane Bagasse Pulp Takeaway Hamburger Box.jpg', '', 20, 0, '', 'SKU_131', 1, '78610Sugarcane Bagasse Pulp Takeaway Hamburger Box.jpg'),
(455, 152, 19, 153, 1, ' EG-0.6 BAGASSE ', 20, 1, '', '<p style=\"position: relative;\">EG-0.6 24 oz 185x185x31.6 180x180x54 300 pcs 300 pcs 645x290x435 405x190x370<br></p>', '', '80786_100 Pa 8 H Rec Paper Plates,.jpeg', '', 20, 0, '', 'SKU_132', 1, '7897-Friendly Choice _ 100% Compostable - Our 10 inch….jpg'),
(461, 152, 19, 153, 1, 'EG-24S  BAGASSE ', 20, 1, '', '<p>EG-24S 24 oz 185x185x31.6 180x180x54 300 pcs 300 pcs 645x290x435 405x190x370<br></p>', '', 'EG-24S  BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_137', 1, '25685green packaging #sugarcane #bagasse….jpg'),
(462, 152, 19, 153, 1, 'EG-32S BAGASSE ', 20, 1, '', '<p>EG-32S 32 oz 185x185x31.6 180x180x70 300 pcs 300 pcs 645x290x435 470x190x370ï¿½<br></p>', '', '26215_10 tolle Coffee to go Becher.jpeg', '', 20, 0, '', 'SKU_138', 1, '11799? Eco-Friendly Bagasse Take Away Containers….jpg'),
(463, 152, 19, 153, 1, 'EG-42S BAGASSE ', 20, 1, '', '<p>EG-42S 42 oz 185x185x31.6 180x180x90 300 pcs 300 pcs 645x290x435 600x190x370<br></p>', '', 'EG-42S BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_139', 1, '22547If you are among those persons who offer enough….jpg'),
(464, 152, 19, 153, 1, 'CR500 BAGASSE ', 20, 1, '', '<p>CR500 500ml 180x25.5 500 pcs 645x300x435<br></p>', '', 'CR500 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_140', 1, '79598US hot selling small 8_ bagasse food container….jpg'),
(465, 152, 19, 153, 1, 'CR750 BAGASSE ', 20, 1, '', '<p>CR750 750ml 228x25.5 207.5x45 300 pcs 645x300x435 430x330x220&nbsp;<br></p>', '', 'CR750 BAGASSE PRODUCTS .jpg', '', 20, 0, '', 'SKU_141', 1, '24360400ml Clamshell Container Bagasse White Box -Hot….jpg'),
(466, 152, 19, 153, 1, 'CR900-2 BAGASSE ', 20, 1, '', '<p>CR900-2 900ml 212x25.5 207.5x59 228x165x25.5 300 pcs 300 pcs 300 pcs 645x300x435 430x415x220 430x415x220&nbsp;<br></p>', '', 'CR900-2 BAGASSE PRODUCTS .jpg', '', 20, 0, '', 'SKU_142', 1, '87393If you\'re looking for the convenience of….jpg'),
(467, 152, 19, 153, 1, 'CR-1000 BAGASSE ', 20, 1, '', '<p>CR-1000 1000ml 223x160x48.5 300 pcs 430x415x220&nbsp;<br></p>', '', 'CR-1000 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_143', 1, '16859These disposable Dispo Bagasse 3 Compartment Round….jpg'),
(468, 152, 19, 153, 1, 'CR-1400 BAGASSE ', 20, 1, '', '<p>CR-1400 1400ml 160x220x70 300 pcs 230x480x340&nbsp;<br></p>', '', 'CR-1400 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_144', 1, '21672Showcase snacks for your guests with our Pulp Safe….jpg'),
(469, 152, 19, 153, 1, 'C24 BAGASSE', 20, 1, '', '<p>C24 24oz 228x25.5 207.5x45 300 pcs 300 pcs 645x300x435 430x330x220&nbsp;<br></p>', '', 'C24 BAGASSE PRODUCTS .jpg', '', 20, 0, '', 'SKU_145', 1, '88096Store New Arrivals Add to Favorite View Feedback….jpg'),
(470, 152, 19, 153, 1, 'C32 BAGASSE', 20, 1, '', '<p>C32 32oz 212x25.5 207.5x59 300 pcs 300 pcs 645x300x435 430x415x220<br></p>', '', 'C32 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_146', 1, '42269a700b69e-8761-468c-bc93-8aff1ba279ec.jpg'),
(471, 152, 19, 153, 1, 'CR48 BAGASSE ', 20, 1, '', '<p>CR48 48oz 228x165x25.5 223x160x48.5 300 pcs 300 pcs 430x415x220 430x415x220&nbsp;<br></p>', '', 'CR48 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_145', 1, '51486PRICES MAY VARY_ NATURAL MATERIAL_ Our….jpg'),
(472, 152, 19, 153, 1, 'CR12 BAGASSE ', 20, 1, '', '<p>CR12 12oz 130x50 600 pcs 290x500x410<br></p>', '', 'CR12 BAGASSE PRODUCTS.jpg', '', 20, 0, '', 'SKU_146', 1, '93498f26e42fa-a663-473d-8edf-0212be0267fd.jpg'),
(505, 100, 0, 101, 1, 'test', 1000, 12, '<p>test</p>', '<p>test</p>', '', 'test.jpg', '', 0, 0, 'test, test', 'SKU_100', 1, '93326Facebook Hook Design.jpg'),
(506, 100, 0, 101, 1, 'Test', 100, 12, '<p>test</p>', '<p>test</p>', '', 'Test.jpg', '', 40, 0, 'test, test', 'SKU_100', 1, '28418Facebook Hook Design.jpg'),
(507, 100, 0, 101, 1, 'Coarse De-Icing Salt', 1000, 12, '<p>test</p>', '<p>test</p>', '', 'Coarse De-Icing Salt.jpg', '', 10, 0, 'test, test', 'SKU_100', 1, '41509people-leaning-desk-standing.jpg'),
(508, 100, 0, 101, 1, 'Coarse De-Icing Salt', 1000, 12, '<p>test</p>', '<p>test</p>', '', 'Coarse De-Icing Salt.jpg', '', 10, 0, 'test, test', 'SKU_100', 1, '41635people-leaning-desk-standing.jpg'),
(510, 110, 0, 111, 1, 'Testing', 1000, 10, '<p>teting</p>', '<p>testing</p>', '', 'Testing.jpg', '', 5, 0, 'test, test', 'SKU_10011', 1, '58132img_10.jpg'),
(511, 132, 0, 134, 1, 'Floor Cleaning tools', 2500, 0, '', '', '', 'Floor Cleaning tools.jpg', 'https://youtube.com/shorts/djzyKK7QNGY?si=5PQkiMVsxjS_AeNd', 10, 0, '', '', 1, '4287still-life-cleaning-tools.jpg');

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
(358, 256, 'white', '#ffffff', 'M', '20'),
(359, 257, 'blue', '#1f6d8e', 'M', '20'),
(360, 258, 'white', '#ffffff', 'M', '20'),
(361, 259, 'white', '#ffffff', 'M', '20'),
(362, 260, 'white', '#faf9f9', 'M', '20'),
(363, 261, 'white ', '#ffffff', 'M', '20'),
(364, 262, 'white', '#fefbfb', 'M', '20'),
(365, 263, 'brown', '#685555', 'M', '20'),
(366, 264, 'red', '#421414', 'M', '20'),
(367, 265, 'Red', '#ff0000', 'M', '20'),
(368, 265, 'Black', '#000000', 'M', '20'),
(369, 265, 'White', '#ffffff', 'M', '20'),
(370, 265, 'Brown', '#ae784c', 'M', '20'),
(371, 265, 'Yellow', '#efff14', 'M', '20'),
(372, 266, 'White', '#ffffff', '1 x 36-1 x 48', '10'),
(373, 267, 'White', '#fafafa', '1x30 Pack', '10'),
(374, 268, 'White', '#ffffff', '1x30 Pack', '10'),
(375, 269, 'white', '#ffffff', '80 x 90 x 100 ', '10'),
(376, 270, 'white', '#faf9f9', 'M', '10'),
(377, 271, 'White', '#ffffff', 'M', '10'),
(378, 272, 'White', '#ffffff', 'M', '10'),
(379, 273, 'White', '#f8f2f2', 'M', '10'),
(380, 273, 'Black', '#000000', 'm', '10'),
(381, 273, 'Brown', '#94631e', 'M', '10'),
(382, 273, 'Blue', '#2d2d9a', 'M', '10'),
(383, 273, 'Green', '#359236', 'M', '10'),
(384, 273, 'Gray', '#918888', 'M', '10'),
(385, 274, 'White', '#ffffff', 'M', '10'),
(386, 275, 'black', '#000000', 'M', '20'),
(387, 275, 'white', '#ffffff', 'M', '20'),
(388, 275, 'brown', '#d7a009', 'M', '20'),
(389, 276, 'brown', '#b97809', 'M', '20'),
(390, 276, 'white', '#ffffff', 'M', '20'),
(391, 277, 'Blue', '#0dadfd', 'M', '20'),
(392, 277, 'pink', '#f202b2', 'M', '20'),
(393, 277, 'black', '#000000', 'M', '20'),
(394, 277, 'red', '#f50505', 'M', '20'),
(395, 277, 'brown', '#ac5606', 'M', '20'),
(396, 277, 'white', '#ffffff', 'M', '20'),
(397, 278, 'black', '#000000', 'M', '20'),
(398, 279, 'brown', '#a85405', 'M', '20'),
(399, 279, 'white', '#f6f4f4', 'M', '20'),
(400, 280, 'black', '#000000', 'M', '20'),
(401, 281, 'white', '#fdfcfc', 'M', '20'),
(402, 281, 'brown', '#bd7905', 'M', '20'),
(403, 282, 'black', '#000000', 'M', '20'),
(404, 283, 'white', '#ffffff', 'M', '20'),
(405, 283, 'brown', '#c66f0c', 'M', '20'),
(406, 284, 'Navy Blue', '#0690f9', 'M', '20'),
(407, 284, 'Baby pink', '#ff00ae', 'M', '20'),
(408, 284, 'Turquoise ', '#04f1c2', 'M', '20'),
(409, 285, 'black', '#000000', 'S', '20'),
(410, 285, 'black', '#000000', 'M', '20'),
(411, 285, 'black', '#000000', 'L', '20'),
(412, 286, 'black', '#000000', 'M', '20'),
(413, 287, 'white', '#fafafa', 'S', '20'),
(414, 287, 'black', '#000000', 'M', '20'),
(415, 287, 'white', '#000000', 'L', '20'),
(416, 287, 'black', '#000000', 'S_M', '20'),
(417, 288, 'black', '#000000', 'M', '20'),
(418, 289, 'brown', '#bd7905', 'M', '20'),
(419, 290, 'brown', '#cc6d00', 'M', '20'),
(420, 291, 'white', '#000000', 'M', '20'),
(421, 292, 'brown', '#c17c06', ' XS _S_M _L _ XL', '20'),
(422, 293, 'brown', '#997905', 'XS_S_ M _ L', '20'),
(423, 294, 'brown', '#8a5905', 'm', '20'),
(424, 295, 'white', '#f6f4f4', 'M', '20'),
(425, 296, 'brown', '#bf7c08', 'M', '20'),
(426, 297, 'brown', '#cc9600', 'M', '20'),
(427, 298, 'brown', '#c06011', 'M', '20'),
(428, 299, 'white', '#fafafa', 'M', '20'),
(429, 299, 'brown', '#9b3803', 'M', '20'),
(430, 300, 'black', '#000000', 'M', '20'),
(431, 301, 'black', '#000000', 'M', '20'),
(432, 302, 'yello', '#cfe811', 'M', '20'),
(433, 303, 'black', '#000000', 'M', '20'),
(434, 304, 'white', '#f8f1f1', 'M', '20'),
(435, 305, 'white', '#f7f7f7', 'M', '20'),
(436, 306, 'white_brown', '#faf9f9', 'M', '20'),
(437, 307, 'white', '#faf5f5', 'M', '20'),
(438, 308, 'black', '#000000', 'M', '20'),
(439, 309, 'transperent', '#ecdfdf', 'M', '20'),
(440, 310, 'transpernt', '#d9d3d3', 'M', '20'),
(441, 311, 'transpernt', '#eae1e1', 'M', '20'),
(442, 312, 'black', '#000000', 'M', '20'),
(443, 313, 'black', '#000000', 'M', '20'),
(444, 314, 'black', '#000000', 'M', '20'),
(445, 315, 'black', '#000000', 'M', '20'),
(446, 315, 'red', '#ff0000', 'M', '20'),
(447, 316, 'red', '#ff0000', 'M', '20'),
(448, 316, 'black', '#000000', 'M', '20'),
(449, 317, 'BLACK', '#000000', 'M', '20'),
(450, 318, 'BLACK', '#000000', 'M', '20'),
(451, 319, 'BLACK', '#000000', 'M', '20'),
(452, 320, 'BLACK', '#000000', 'M', '20'),
(453, 321, 'BLACK', '#000000', 'M', '20'),
(455, 323, 'BLACK', '#000000', 'M', '20'),
(456, 324, 'BLACK', '#000000', 'M', '20'),
(457, 325, 'BLACK', '#000000', 'M', '20'),
(458, 326, 'BLACK', '#000000', 'M', '20'),
(459, 327, 'TRANSPERENT', '#ece4e4', 'M', '20'),
(460, 328, 'TRANSPERENT', '#e1dbdb', 'M', '20'),
(461, 329, 'BLACK', '#000000', 'M', '20'),
(462, 330, 'BLACK', '#000000', 'M', '20'),
(463, 331, 'BLACK', '#000000', 'M', '20'),
(464, 332, 'BLACK', '#000000', 'M', '20'),
(465, 333, 'BLACK', '#000000', 'M', '20'),
(466, 334, 'BLACK', '#000000', 'M', '20'),
(467, 335, 'BLACK', '#000000', 'S_M_L', '20'),
(468, 336, 'TRNSPERENT', '#eadcdc', 'M', '20'),
(469, 337, 'TRANSPERENT', '#e0dcdc', 'M', '20'),
(471, 339, 'TRANSPERNT', '#e9e2e2', 'M', '20'),
(472, 340, 'TRANSPERENT', '#dad7d7', 'M', '20'),
(473, 341, 'TRANSPERENT', '#e7e4e4', 'M', '20'),
(474, 342, 'WHITE', '#f4f1f1', 'M', '20'),
(475, 343, 'WHITE', '#fbf9f9', 'M', '20'),
(476, 344, 'GREEN', '#0bcb31', 'M', '20'),
(477, 345, 'BLUE', '#02cff7', 'M', '20'),
(478, 346, 'ORANGE', '#f79e02', 'M', '20'),
(479, 347, 'YELLOW', '#f1e909', 'M', '20'),
(481, 349, 'WHITE', '#f7f7f7', 'M', '20'),
(482, 350, 'BLACK', '#000000', 'M', '20'),
(483, 351, 'GREEN', '#11ee48', 'M ', '20'),
(484, 352, 'BLACK', '#000000', 'M', '20'),
(485, 353, 'YELLOW', '#b9f80d', 'M', '20'),
(486, 354, 'BLUE', '#055ff0', 'M', '20'),
(487, 355, 'yellow', '#f8fc03', 'M', '20'),
(488, 356, 'PURPLE', '#8210e0', 'M', '20'),
(489, 357, 'BLUE', '#02a7ed', 'M', '20'),
(490, 358, 'BLACK', '#000000', 'M', '20'),
(491, 359, 'YELLOW', '#f2a602', 'M', '20'),
(492, 360, 'BLUE', '#0400f5', 'M', '20'),
(493, 361, 'YELLOW', '#b6e704', 'M', '20'),
(494, 362, 'BLUE', '#0616f4', 'M', '20'),
(495, 363, 'BLUE', '#0703d8', 'M', '20'),
(496, 364, 'YELLOW', '#e3f20d', 'M', '20'),
(497, 365, 'yellow', '#000000', 'M', '20'),
(498, 366, 'PURPLE', '#b80de7', 'M', '20'),
(499, 367, 'BROWN', '#b38e09', 'M', '20'),
(500, 368, 'WHITE', '#fbf9f9', 'M', '20'),
(501, 369, 'BROWN', '#d1a505', 'M', '20'),
(502, 370, 'WHITE', '#f9f6f6', 'M', '20'),
(503, 371, 'black', '#000000', 'M', '20'),
(504, 372, 'BLACK', '#000000', 'M', '20'),
(505, 373, 'BLACK', '#000000', 'M', '20'),
(506, 374, 'BLACK', '#000000', 'M', '20'),
(507, 375, 'BLACK', '#000000', 'M', '20'),
(508, 376, 'black', '#000000', 'M', '20'),
(509, 377, 'METALIC', '#bca9b3', 'M', '20'),
(510, 378, 'BLACK', '#000000', 'M', '20'),
(511, 379, 'BLACK', '#000000', 'M', '20'),
(512, 380, 'BLACK', '#000000', 'M', '20'),
(513, 381, 'STEEL', '#000000', 'M', '20'),
(514, 382, 'BLACK', '#000000', 'M', '20'),
(515, 383, 'STEEL', '#e1dbdb', 'M', '20'),
(516, 384, 'BLACK', '#000000', 'M', '20'),
(517, 385, 'BLUE', '#0824af', 'M', '20'),
(518, 386, 'YELLOW', '#ede607', 'M', '20'),
(519, 387, 'BACK', '#000000', 'M', '20'),
(520, 388, 'WHITE', '#f9f1f1', 'M', '20'),
(521, 389, 'TRANSPERENT', '#e2cfcf', 'M', '20'),
(522, 390, 'BLACK', '#000000', 'M', '20'),
(523, 391, 'BLACK', '#000000', 'M', '20'),
(524, 392, 'BROWN', '#cb5c01', 'M', '20'),
(525, 393, 'BLACK', '#000000', 'M', '20'),
(526, 394, 'WHITE', '#fafafa', 'M', '20'),
(527, 395, 'BLACK', '#000000', 'M', '20'),
(528, 396, 'WHITE', '#fdfcfc', 'M', '20'),
(529, 397, 'BLACK', '#000000', 'M', '20'),
(530, 398, 'WHITE', '#000000', 'M', '20'),
(531, 399, 'BLACK', '#000000', 'M', '20'),
(532, 400, 'RED', '#f70202', 'M', '20'),
(533, 401, 'BLACK', '#000000', 'M', '20'),
(534, 402, 'BLACK', '#000000', 'M', '20'),
(535, 403, 'BLACK', '#000000', 'M', '20'),
(536, 404, 'WHITE', '#fdf6f6', 'M', '20'),
(537, 405, 'BROWN', '#78510d', 'M', '20'),
(538, 406, 'WHITE', '#e6e6e6', 'M', '20'),
(539, 407, 'WHITE', '#f5f5f5', 'M', '20'),
(540, 408, 'WHITE', '#ffffff', 'M', '20'),
(541, 409, 'WHITE', '#f7f7f7', 'M', '20'),
(542, 410, 'BROWN', '#d65600', 'M', '20'),
(543, 411, 'BROWN', '#601d06', 'M', '20'),
(544, 412, 'BROWN', '#af7c0d', 'M', '20'),
(545, 413, 'BROWN', '#9c6211', 'M', '20'),
(546, 414, 'BLACK', '#000000', 'M', '20'),
(547, 415, 'WHITE', '#fdfcfc', 'M', '20'),
(548, 416, 'BLACK', '#000000', 'M', '20'),
(549, 417, 'BLACK', '#000000', 'M', '20'),
(550, 418, 'BLACK', '#000000', 'M', '20'),
(552, 420, 'BLACK', '#000000', 'M', '20'),
(553, 421, 'BLACK', '#000000', 'M', '20'),
(554, 422, 'BLACK', '#000000', 'M', '20'),
(555, 423, 'BLACK', '#000000', 'M', '20'),
(556, 424, 'BLACK', '#000000', 'M', '20'),
(557, 425, 'BLACK', '#000000', 'M', '20'),
(558, 426, 'BLACK', '#000000', 'M', '20'),
(559, 427, 'TRANSPERENT', '#f5dbdb', 'M', '20'),
(561, 429, 'TRANSPERENT', '#e7d5d5', 'M', '20'),
(562, 430, 'TRANSPERENT', '#cec5c5', 'M', '20'),
(563, 431, 'BLACK', '#000000', 'M', '20'),
(564, 432, 'TRANSPERENT', '#d6d1d1', 'M', '20'),
(565, 433, 'GREY', '#524c4c', 'M', '20'),
(566, 434, 'GREY', '#b3adad', 'M', '20'),
(567, 435, 'BLACK', '#000000', 'M', '20'),
(568, 436, 'BLACK', '#000000', 'M', '20'),
(569, 437, 'BLACK', '#000000', 'M', '20'),
(570, 438, 'BLACK', '#000000', 'M', '20'),
(571, 439, 'BLACK', '#000000', 'M', '20'),
(572, 440, 'BLACK', '#000000', 'M', '20'),
(573, 441, 'BLUE', '#0054db', 'M', '20'),
(574, 442, 'BLACK', '#000000', 'M', '20'),
(575, 442, 'BLUE', '#0007db', 'M', '20'),
(576, 443, 'BLACK', '#000000', 'M', '20'),
(577, 444, 'TRANSPERENT', '#c7c2c2', 'M', '20'),
(578, 445, 'BLACK', '#000000', 'M', '20'),
(579, 446, 'BLUE', '#0762f2', 'M', '20'),
(580, 447, 'BLACK', '#000000', 'M', '20'),
(581, 448, 'BLACK', '#000000', 'M', '20'),
(582, 449, 'blue', '#10a1ea', 'M', '20'),
(587, 454, 'WHITE', '#f7f7f7', 'M', '20'),
(588, 455, 'WHITE', '#fafafa', 'M', '20'),
(589, 456, 'WHITE', '#000000', 'M', '20'),
(590, 457, 'BLACK', '#000000', 'M', '20'),
(591, 458, 'WHITE', '#f2eded', 'M', '20'),
(592, 459, 'BLACK', '#000000', 'M', '20'),
(593, 460, 'BLACK', '#000000', 'M', '20'),
(594, 461, 'BLACK', '#000000', 'M', '20'),
(595, 462, 'BLACK', '#000000', 'M', '20'),
(596, 463, 'BLACK', '#000000', 'M', '20'),
(597, 464, 'BLACK', '#000000', 'M', '20'),
(598, 465, 'BLACK', '#000000', 'M', '20'),
(599, 466, 'BLACK', '#000000', 'M', '20'),
(600, 467, 'BLACK', '#000000', 'M', '20'),
(601, 468, 'BLACK', '#000000', 'M', '20'),
(602, 469, 'BLACK', '#000000', 'M', '20'),
(603, 470, 'BLACK', '#000000', 'M', '20'),
(604, 471, 'BLACK', '#000000', 'M', '20'),
(605, 472, 'BLACK', '#000000', 'M', '20'),
(617, 259, 'black', '#000000', 'S', '17'),
(655, 505, 'Red', '#000000', 'XS', '10_20'),
(656, 506, 'Red', '#000000', 'XS_S', '10_20'),
(657, 506, 'Red', '#000000', 'XS_S_SM', '10'),
(658, 507, 'white', '#000000', 'XS', '10'),
(659, 508, 'white', '#000000', 'XS', '10'),
(663, 510, 'Red', '#e21818', 'XS', '5'),
(664, 510, 'blue', '#0d14f2', 'M', '5'),
(665, 511, 'black', '#4347c7', 'XS', '10');

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
(44, '5433_Abdullah City blogs.jpg', '3520_hook4.webp', '', 'Ameen', '<p>Supplying premium-quality disposable products for every need, on time, every time.</p>');

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
  `sm_password` varchar(255) DEFAULT NULL,
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
(89, '', '', 'asim', '$2y$10$HbyoW.dQ2gScrksWvo8CseAHNhTQbGa10JXA939ychQ', 'as@mail.com', '+1 (953) 735-2411', '', '', '', '', '2025-10-07 06:57:47', '0000-00-00 00:00:00', 1),
(88, '', '', 'duzyzepos', '$2y$10$5A2/jGYMTi8G8GzyU/Xcq.nQTXCpYAFS5fi/0aNC4N5', 'gyvi@mailinator.com', '+1 (279) 565-9026', '', '', '', '', '2025-10-04 14:16:30', '0000-00-00 00:00:00', 1),
(87, '', '', 'hodywynom', '$2y$10$uaCHx/MhNZuZQjTOQz7RBevgUiOb2M2m5Qro/duXgex', 'tuqog@mailinator.com', '+1 (264) 558-8206', '', '', '', '', '2025-10-04 14:02:15', '0000-00-00 00:00:00', 1),
(86, '', '', 'bapo', '$2y$10$LfMaSnLYZJj0ZUnrhFeROuaCvnTz4sHR4BImuw5AZfo', 'bapo@mail.com', '+1 (953) 735-2411', '', '', '', '', '2025-10-04 12:58:44', '0000-00-00 00:00:00', 1),
(85, '', '', 'fujezo', '$2y$10$dBAkXoP68urEwYPgS0zU8O.WjorNULO5SxFFzv7KZ2u', 'tufar@mailinator.com', '+1 (366) 514-1388', '', '', '', '', '2025-10-04 09:42:11', '0000-00-00 00:00:00', 1),
(61, '', '', 'xyvyk', '$2y$10$i8q48s9am4Wc8oS6jJbeQO5ZCYqIqGHwwSQfJlGS4EE', 'honyfawudy@mailinator.com', '927', '', '', '', '', '2025-10-03 05:02:19', '0000-00-00 00:00:00', 1),
(62, '', '', 'pahukyzomo', '$2y$10$/a9MBQxb.pbCH1woC.G1hObcXXx6M7MwSGHHK5yxGQ2', 'zotumifys@mailinator.com', '286', '', '', '', '', '2025-10-03 05:02:34', '0000-00-00 00:00:00', 1),
(63, '', '', 'vopybin', '$2y$10$tkli6OpsJXMX9fJeth9H5.ILWmJmjYq53248bM6gNec', 'walac@mailinator.com', '743', '', '', '', '', '2025-10-03 05:09:48', '0000-00-00 00:00:00', 1),
(64, '', '', 'Muhammad Asim', '$2y$10$fp9sYJJ7kfgI6AZghChdjewe0f6y5lvMv.xslCBObQ/', 'masim5955693@gmail.com', '03160560676', '', '', '', '', '2025-10-04 10:03:17', '0000-00-00 00:00:00', 1),
(65, '', '', 'cipuqe', '$2y$10$CWAfQ8esn7mK1fhjKCZkBOJa2mmpaAZO8AcO3CfCGjJ', 'febybyz@mailinator.com', '697', '', '', '', '', '2025-10-04 10:08:02', '0000-00-00 00:00:00', 1),
(66, '', '', 'wutaso', '$2y$10$Ol2zgfXAGG.elrm58DPQvOQcp0VSFh2Tf.bVhORU/ym', 'gyvikusyzi@mailinator.com', '339', '', '', '', '', '2025-10-04 10:08:53', '0000-00-00 00:00:00', 1),
(67, '', '', 'donafoz', '$2y$10$epveA9RMCwZFnlpw3WJ84utlHSwxDrXvFS1r4ZrmbSy', 'qovu@mailinator.com', '420', '', '', '', '', '2025-10-04 10:09:24', '0000-00-00 00:00:00', 1),
(68, '', '', 'papocel', '$2y$10$h2iQyM1fPQ3dPOzjS7/SFeNTtyYhsQC1y0YCKX16CB4', 'rivixa@mailinator.com', '843', '', '', '', '', '2025-10-04 10:09:45', '0000-00-00 00:00:00', 1),
(69, '', '', 'jadituvuc', '$2y$10$WBZTBdLjdmjBF3NtL9ZuKu6Lh0dj28NwNESdsD.SXGb', 'lepojir@mailinator.com', '81', '', '', '', '', '2025-10-04 10:17:18', '0000-00-00 00:00:00', 1),
(70, '', '', 'dakuxoky', '$2y$10$OkHJMTIWz0EAA4XNUJaNru83EKSpTOBEpIuptmhiGw8', 'ropanikep@mailinator.com', '315', '', '', '', '', '2025-10-04 10:17:25', '0000-00-00 00:00:00', 1),
(71, '', '', 'wofywosac', '$2y$10$zN3VyD/hQcR.Kd6EoE3N6utEDJGDvEzqfKqPTBVpXzO', 'nasoc@mailinator.com', '561', '', '', '', '', '2025-10-04 10:24:03', '0000-00-00 00:00:00', 1),
(72, '', '', 'gibanade', '$2y$10$0S1d1dkRwJzx3hgeHrW1E.MaPYYEzJ.HAxe9vOcXPl1', 'kajas@mailinator.com', '739', '', '', '', '', '2025-10-04 10:38:27', '0000-00-00 00:00:00', 1),
(73, '', '', 'kepavifaso', '$2y$10$8ISyU5BDvrHPOZgdlkAx.eL6vLrhQST1Z7WsTR363iJ', 'nozoz@mailinator.com', '260', '', '', '', '', '2025-10-04 10:38:35', '0000-00-00 00:00:00', 1),
(74, '', '', 'pynoteveze', '$2y$10$2b.kb2Ev4X3j94XglK40huQU8PbvISx4TtP/ZtQqdFf', 'jyzufabuk@mailinator.com', '643', '', '', '', '', '2025-10-04 10:39:57', '0000-00-00 00:00:00', 1),
(75, '', '', 'lyjijixe', '$2y$10$Lgk6ecXffRlzgI0ufZxV0e0eZVtgHwcgDxySWxdkafk', 'sewagusoda@mailinator.com', '398', '', '', '', '', '2025-10-04 10:41:09', '0000-00-00 00:00:00', 1),
(76, '', '', 'serilam', '$2y$10$p2Ha9H90yWGRfli4LKsAhurCYRNx13avMlVtDCoMUsa', 'bahesy@mailinator.com', '+1 (953) 735-2411', '', '', '', '', '2025-10-04 11:00:38', '0000-00-00 00:00:00', 1),
(77, '', '', 'foxizyvyh', '$2y$10$cygpQ99SCMWIsK6hQnN4heZqxZYnapVhI33ov0Sg/Bg', 'naqevohav@mailinator.com', '+1 (475) 402-6305', '', '', '', '', '2025-10-04 11:03:41', '0000-00-00 00:00:00', 1),
(78, '', '', 'niriwo', '$2y$10$/3rySCeD2P0TRNUezt6hvecv3OKEk37snre8ewqqqNB', 'sijepa@mailinator.com', '+1 (207) 238-3988', '', '', '', '', '2025-10-04 11:06:20', '0000-00-00 00:00:00', 1),
(79, '', '', 'niriwo', '$2y$10$ids/KKCkkdHhDKPBXMcIhuW8uS8Bu6bMPdAuncX4bFu', 'sijepa@mailinator.com', '+1 (207) 238-3988', '', '', '', '', '2025-10-04 11:06:57', '0000-00-00 00:00:00', 1),
(80, '', '', 'moket', '$2y$10$LEETfuBAIKdc715kt1cgu./inTmbNpafMz.ei34TaLm', 'wumywejeme@mailinator.com', '+1 (178) 597-7179', '', '', '', '', '2025-10-04 08:09:19', '0000-00-00 00:00:00', 1),
(82, '', '', 'asad', '$2y$10$329akUwL7C.upaPUgpa6z.PBprnuq2pN8GuFHOh3ar/', 'asad@mail.com', '+1 (953) 735-2411', '', '', '', '', '2025-10-04 08:26:40', '0000-00-00 00:00:00', 1),
(83, '', '', 'dyryb', '$2y$10$yGF/XtaUVxbo41YxBf2M1eWrDmOhyRxvYsWGH4AaaBJ', 'walipyvaga@mailinator.com', '+1 (897) 118-3186', '', '', '', '', '2025-10-04 08:51:32', '0000-00-00 00:00:00', 1),
(84, '', '', 'fipobucug', '$2y$10$TsWOXA0j4MTibA7Mixxhie1KtDIkDSnuO/Dm.XNM8km', 'jyme@mailinator.com', '+1 (621) 915-4583', '', '', '', '', '2025-10-04 08:52:38', '0000-00-00 00:00:00', 1),
(90, '', '', 'ameen bhai', '$2y$10$Xssd64V0Hrlci4siaSdrnOxdmFuPy3UHc/FepdmHlSXM1y.xq7PgC', 'ameenbhai@mail.com', '+1 (207) 238-3988', '', '', '', '', '2025-10-07 07:23:55', '0000-00-00 00:00:00', 1),
(91, '', '', 'test', '$2y$10$TsgoO1KhG2QICpot/RzfrumIKWB0vnzMUuviQCRj9qT3Ppd25YqSe', 'test@mail.com', '1234534534534', '', '', '', '', '2025-10-15 12:24:47', '0000-00-00 00:00:00', 1),
(92, '', '', 'Muhammad Arsalan', '$2y$10$f0bQ/ZGTDyipI.x26jDlquqliPkOCVJZI0ij4ooiIw.EQqq6aYC0O', 'arsalan@mail.com', '03160560676', '', '', '', '', '2025-10-24 06:13:30', '0000-00-00 00:00:00', 1),
(93, '', '', 'kumiqeha', '$2y$10$on2.Ers.jaPj.hR2uIGFQO1uzvd3ILn5g4746j82KgbUU0/qZi9fK', 'jufefolix@mailinator.com', '+1 (829) 598-3439', '', '', '', '', '2025-11-05 08:59:01', '0000-00-00 00:00:00', 1),
(94, '', '', 'test123', '$2y$10$t8EzY72YWtkNSmuHEoAJQ.WS3YbvEcq2H/6Vmd1V2nY1vxDz6m01u', 'test123@gmail.com', '5955693', '', '', '', '', '2025-11-05 09:00:27', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_wishlist`
--

CREATE TABLE `sm_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_uid` int(11) NOT NULL,
  `wishlist_pro_id` int(11) NOT NULL,
  `wishlist_pro_name` varchar(255) NOT NULL,
  `wishlist_pro_image` varchar(255) DEFAULT NULL,
  `wishlist_pro_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `wishlist_pro_color` varchar(100) DEFAULT 'No Color',
  `wishlist_pro_color_code` varchar(50) DEFAULT '',
  `wishlist_pro_size` varchar(50) DEFAULT 'No Size',
  `wishlist_datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sm_wishlist`
--

INSERT INTO `sm_wishlist` (`wishlist_id`, `wishlist_uid`, `wishlist_pro_id`, `wishlist_pro_name`, `wishlist_pro_image`, `wishlist_pro_price`, `wishlist_pro_color`, `wishlist_pro_color_code`, `wishlist_pro_size`, `wishlist_datetime`) VALUES
(298, 92, 260, 'MAXI ROLL EMB PLAIN 1PLYL / 2PLY', '84616_rolls-felt-fabric.jpg', 10.00, 'white', '', 'No Size', '2025-11-07 04:09:28');

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
-- Indexes for table `popup`
--
ALTER TABLE `popup`
  ADD PRIMARY KEY (`popup_id`);

--
-- Indexes for table `ptcs_admin`
--
ALTER TABLE `ptcs_admin`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `ptcs_faqs`
--
ALTER TABLE `ptcs_faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `ptcs_setting_socialmedia`
--
ALTER TABLE `ptcs_setting_socialmedia`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `ptcs_setting_whatsapp`
--
ALTER TABLE `ptcs_setting_whatsapp`
  ADD PRIMARY KEY (`wa_id`);

--
-- Indexes for table `ptcs_setting_whatsapp_button`
--
ALTER TABLE `ptcs_setting_whatsapp_button`
  ADD PRIMARY KEY (`wab_id`);

--
-- Indexes for table `ptcs_system_currencies`
--
ALTER TABLE `ptcs_system_currencies`
  ADD PRIMARY KEY (`curcy_id`);

--
-- Indexes for table `ptcs_system_settings`
--
ALTER TABLE `ptcs_system_settings`
  ADD PRIMARY KEY (`sysset_id`);

--
-- Indexes for table `ptcs_system_timezones`
--
ALTER TABLE `ptcs_system_timezones`
  ADD PRIMARY KEY (`timez_id`);

--
-- Indexes for table `ptcs_users_details`
--
ALTER TABLE `ptcs_users_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

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
-- Indexes for table `sm_blog`
--
ALTER TABLE `sm_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `sm_brands`
--
ALTER TABLE `sm_brands`
  ADD PRIMARY KEY (`brand_id`);

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
-- Indexes for table `sm_wishlist`
--
ALTER TABLE `sm_wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD UNIQUE KEY `unique_product` (`wishlist_uid`,`wishlist_pro_id`,`wishlist_pro_color`,`wishlist_pro_size`);

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
-- AUTO_INCREMENT for table `popup`
--
ALTER TABLE `popup`
  MODIFY `popup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `ptcs_admin`
--
ALTER TABLE `ptcs_admin`
  MODIFY `at_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ptcs_faqs`
--
ALTER TABLE `ptcs_faqs`
  MODIFY `faq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ptcs_setting_socialmedia`
--
ALTER TABLE `ptcs_setting_socialmedia`
  MODIFY `sm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ptcs_setting_whatsapp`
--
ALTER TABLE `ptcs_setting_whatsapp`
  MODIFY `wa_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ptcs_setting_whatsapp_button`
--
ALTER TABLE `ptcs_setting_whatsapp_button`
  MODIFY `wab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ptcs_system_currencies`
--
ALTER TABLE `ptcs_system_currencies`
  MODIFY `curcy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ptcs_system_settings`
--
ALTER TABLE `ptcs_system_settings`
  MODIFY `sysset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `ptcs_system_timezones`
--
ALTER TABLE `ptcs_system_timezones`
  MODIFY `timez_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ptcs_users_details`
--
ALTER TABLE `ptcs_users_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `sm_blog`
--
ALTER TABLE `sm_blog`
  MODIFY `blog_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sm_brands`
--
ALTER TABLE `sm_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sm_cart`
--
ALTER TABLE `sm_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `sm_categories`
--
ALTER TABLE `sm_categories`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `sm_client`
--
ALTER TABLE `sm_client`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `sm_products_colors`
--
ALTER TABLE `sm_products_colors`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `sm_products_images`
--
ALTER TABLE `sm_products_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

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
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sm_subscription`
--
ALTER TABLE `sm_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sm_users`
--
ALTER TABLE `sm_users`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sm_wishlist`
--
ALTER TABLE `sm_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
