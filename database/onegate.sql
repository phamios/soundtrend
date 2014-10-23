-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2012 at 09:53 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onegate`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner` varchar(45) DEFAULT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  `active` int(10) unsigned DEFAULT NULL,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner`, `position`, `active`, `link`) VALUES
(2, 'ed9ca124c661b32b2c3b82723bf98bf9-d4zu2c7.jpg', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `image` text,
  `active` int(10) unsigned DEFAULT NULL,
  `count` int(10) unsigned DEFAULT NULL,
  `contenttype` int(10) unsigned NOT NULL,
  `lang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `active`, `count`, `contenttype`, `lang`) VALUES
(17, 'test15', NULL, 1, NULL, 8, 2),
(20, 'Partner', NULL, 1, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `message` text,
  `created_at` date DEFAULT NULL,
  `active` int(11) unsigned DEFAULT NULL,
  `contentid` int(11) DEFAULT NULL,
  `contentname` text,
  `timecreate` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `cateid` int(10) unsigned DEFAULT NULL,
  `link` text,
  `image` text,
  `active` int(10) unsigned DEFAULT NULL,
  `catename` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `des` text CHARACTER SET utf8,
  `count` int(10) unsigned DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `cateid`, `link`, `image`, `active`, `catename`, `des`, `count`, `lang`, `userid`) VALUES
(12, 'International Partner', 20, '0', NULL, 1, 'Partner', '<p>International Partner</p>', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagepost`
--

CREATE TABLE IF NOT EXISTS `imagepost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageid` int(11) DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `imagename` varchar(45) DEFAULT NULL,
  `merchant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `imagepost`
--

INSERT INTO `imagepost` (`id`, `imageid`, `postid`, `type`, `imagename`, `merchant`) VALUES
(26, 31, 8, 'Bài viết', 'vladstudio_lion_1280x800_signed1.jpg', 0),
(28, 33, 6, 'Bài viết', 'tay_phuong1.jpg', 0),
(29, 34, 7, 'Bài viết', 'ed9ca124c661b32b2c3b82723bf98bf9-d4zu2c71.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE IF NOT EXISTS `intro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `des` text,
  `images` text,
  `active` int(11) DEFAULT NULL,
  `langid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id`, `title`, `des`, `images`, `active`, `langid`) VALUES
(1, 'test', '<p>setsetsetsetset</p>', NULL, 1, 2),
(2, 'asdasd', '<p>asdasdasdasdasd</p>', NULL, 1, 4),
(3, 'olla olleeolla ollee', '<p>olla olleeolla olleeolla olleeolla olleeolla olleeolla ollee</p>', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`id`, `name`) VALUES
(2, 'vietnam'),
(3, 'english'),
(4, 'france');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menuname` text CHARACTER SET utf8,
  `menulink` text CHARACTER SET utf8,
  `menuurl` text CHARACTER SET utf8,
  `active` int(11) unsigned DEFAULT NULL,
  `order` int(11) unsigned DEFAULT NULL,
  `menulang` int(11) unsigned DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menuname`, `menulink`, `menuurl`, `active`, `order`, `menulang`, `type`) VALUES
(23, 'Home', '', '', 1, 1, 2, NULL),
(21, 'Online services', '-1', '', 1, 2, 2, NULL),
(22, 'Partner', '20', '', 1, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE IF NOT EXISTS `roomtype` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `name`) VALUES
(4, 'điều hòa '),
(5, 'Tivi '),
(6, 'Tủ lạnh '),
(7, 'Wifi '),
(8, 'du lịch ');

-- --------------------------------------------------------

--
-- Table structure for table `tbimageslidebottom`
--

CREATE TABLE IF NOT EXISTS `tbimageslidebottom` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `images` text,
  `active` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbimageslidebottom`
--

INSERT INTO `tbimageslidebottom` (`id`, `images`, `active`) VALUES
(14, 'Screen_Shot_2012-05-29_at_5.38_.42_PM_.png', 1),
(13, 'Screen_Shot_2012-05-29_at_5.38_.34_PM_.png', 1),
(15, 'Screen_Shot_2012-05-29_at_5.38_.48_PM_.png', 1),
(16, 'Screen_Shot_2012-05-29_at_5.38_.54_PM_.png', 1),
(17, 'Screen_Shot_2012-05-29_at_5.39_.00_PM_.png', 1),
(18, 'Screen_Shot_2012-05-29_at_5.39_.18_PM_.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE IF NOT EXISTS `tblcontactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `phone` text,
  `email` text,
  `subject` text,
  `content` text,
  `createdate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `name`, `phone`, `email`, `subject`, `content`, `createdate`) VALUES
(1, 'Kevin Hoang', NULL, NULL, NULL, NULL, '2012-05-22 02:32:10'),
(2, 'asdasd', 'asdasd', 'asdasda', 'sda', 'sdasdasdasd', '2012-05-22 02:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblimages`
--

CREATE TABLE IF NOT EXISTS `tblimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tblimages`
--

INSERT INTO `tblimages` (`id`, `images`) VALUES
(6, 'hoa_dao4.jpg'),
(7, 'duong_que.jpg'),
(14, 'hoa_dao.jpg'),
(9, 'eca802c7-46a3-48b5-890b-e3e187dc6906_51.jpg'),
(10, 'eca802c7-46a3-48b5-890b-e3e187dc6906_52.jpg'),
(11, 'eca802c7-46a3-48b5-890b-e3e187dc6906_53.jpg'),
(12, '76e5d259-30f3-42cd-8e62-6b81c8f11e5e_10.jpg'),
(13, 'hoa_dao5.jpg'),
(15, '76e5d259-30f3-42cd-8e62-6b81c8f11e5e_10.jpg'),
(16, 'dual_passport2.jpg'),
(17, 'eca802c7-46a3-48b5-890b-e3e187dc6906_5.jpg'),
(18, 'dual_passport21.jpg'),
(33, 'tay_phuong1.jpg'),
(31, 'vladstudio_lion_1280x800_signed1.jpg'),
(34, 'ed9ca124c661b32b2c3b82723bf98bf9-d4zu2c71.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsearch`
--

CREATE TABLE IF NOT EXISTS `tblsearch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `type` int(11) DEFAULT NULL,
  `typename` text,
  `createdate` varchar(45) DEFAULT NULL,
  `content_r` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tblsearch`
--

INSERT INTO `tblsearch` (`id`, `content`, `type`, `typename`, `createdate`, `content_r`) VALUES
(105, 's', 2, 'content', '2012-May-29 17:05:27', 's'),
(104, 's', 2, 'content', '2012-May-29 17:05:15', 's'),
(103, 's', 2, 'content', '2012-May-29 17:04:55', 's'),
(102, 'ibm', 2, 'content', '2012-May-29 17:04:25', 'ibm'),
(101, 'ibm', 2, 'content', '2012-May-29 17:03:58', 'ibm'),
(100, 'a', 2, 'content', '2012-May-29 17:03:55', 'a'),
(99, 'a', 2, 'content', '2012-May-29 17:03:53', 'a'),
(98, 'a', 2, 'content', '2012-May-29 17:03:31', 'a'),
(97, 'konichiwa', 2, 'content', '2012-May-29 16:44:37', 'konichiwa'),
(96, 'ibm', 2, 'content', '2012-May-29 16:44:34', 'ibm'),
(95, 'a', 2, 'content', '2012-May-29 16:44:31', 'a'),
(94, 'ibm', 2, 'content', '2012-May-29 16:44:26', 'ibm'),
(93, 'ibm', 2, 'content', '2012-May-29 16:42:57', 'ibm'),
(92, 'hieu', 2, 'content', '2012-May-29 16:42:51', 'hieu'),
(91, 'lon', 2, 'content', '2012-May-29 16:42:42', 'lon'),
(90, '6', 2, 'content', '2012-May-29 16:42:36', '6'),
(89, '8', 2, 'content', '2012-May-29 16:42:30', '8'),
(31, 'a', 0, '0', '2012-May-29 09:55:00', 'a'),
(32, 'nước', 0, '0', '2012-May-29 09:55:05', 'nuoc'),
(33, 'nước', 0, '0', '2012-May-29 09:56:08', 'nuoc'),
(34, '0', 0, '0', '2012-May-29 09:56:27', ''),
(35, 'asd', 0, '0', '2012-May-29 09:56:47', 'asd'),
(36, '0', 0, '0', '2012-May-29 09:57:48', ''),
(37, '', 0, '0', '2012-May-29 09:57:51', ''),
(38, 'D', 1, 'merchant', '2012-May-29 10:02:03', 'D'),
(39, 'ád', 2, 'content', '2012-May-29 10:02:07', 'ad'),
(40, 'nước ', 2, 'content', '2012-May-29 10:03:55', 'nuoc '),
(41, 'nước ', 2, 'content', '2012-May-29 10:04:52', 'nuoc '),
(42, 'nước ', 2, 'content', '2012-May-29 10:05:40', 'nuoc '),
(43, 'nước ', 2, 'content', '2012-May-29 10:06:54', 'nuoc '),
(44, 'nước ', 2, 'content', '2012-May-29 10:07:40', 'nuoc '),
(45, 'nước ', 2, 'content', '2012-May-29 10:08:22', 'nuoc '),
(46, 'nước ', 2, 'content', '2012-May-29 10:08:34', 'nuoc '),
(47, 'nước ', 2, 'content', '2012-May-29 10:08:46', 'nuoc '),
(48, 'nước ', 2, 'content', '2012-May-29 10:10:09', 'nuoc '),
(49, 'nước ', 2, 'content', '2012-May-29 10:11:17', 'nuoc '),
(50, 'nước ', 2, 'content', '2012-May-29 10:11:37', 'nuoc '),
(51, 'nước ', 2, 'content', '2012-May-29 10:12:29', 'nuoc '),
(52, 'nước ', 2, 'content', '2012-May-29 10:13:34', 'nuoc '),
(53, 'nước ', 2, 'content', '2012-May-29 10:14:44', 'nuoc '),
(54, 'nước ', 2, 'content', '2012-May-29 10:15:59', 'nuoc '),
(55, 'nước ', 2, 'content', '2012-May-29 10:16:10', 'nuoc '),
(56, 'nước ', 2, 'content', '2012-May-29 10:18:10', 'nuoc '),
(57, 'nước ', 2, 'content', '2012-May-29 10:18:51', 'nuoc '),
(58, 'a', 2, 'content', '2012-May-29 10:18:56', 'a'),
(59, 'n', 2, 'content', '2012-May-29 10:19:00', 'n'),
(60, 'x', 2, 'content', '2012-May-29 10:19:03', 'x'),
(61, 'a', 2, 'content', '2012-May-29 10:19:06', 'a'),
(62, 'a', 2, 'content', '2012-May-29 10:20:05', 'a'),
(63, 'a', 2, 'content', '2012-May-29 10:20:11', 'a'),
(64, 'a', 2, 'content', '2012-May-29 10:20:34', 'a'),
(65, 'a', 2, 'content', '2012-May-29 10:20:52', 'a'),
(66, 'a', 2, 'content', '2012-May-29 10:20:58', 'a'),
(67, '', 2, 'content', '2012-May-29 10:21:01', ''),
(68, 'v', 2, 'content', '2012-May-29 10:21:04', 'v'),
(69, 'x', 2, 'content', '2012-May-29 10:21:07', 'x'),
(70, 'x', 2, 'content', '2012-May-29 10:21:09', 'x'),
(71, 'z', 2, 'content', '2012-May-29 10:21:11', 'z'),
(72, 'm', 2, 'content', '2012-May-29 10:21:14', 'm'),
(73, 'asus', 2, 'content', '2012-May-29 10:21:21', 'asus'),
(74, 'laptop', 2, 'content', '2012-May-29 10:21:32', 'laptop'),
(75, '0', 2, 'content', '2012-May-29 10:21:47', ''),
(76, '0', 2, 'content', '2012-May-29 10:22:00', ''),
(77, 'asus', 2, 'content', '2012-May-29 10:22:11', 'asus'),
(78, '0', 2, 'content', '2012-May-29 10:22:18', ''),
(79, 'men', 2, 'content', '2012-May-29 10:22:21', 'men'),
(80, 's', 2, 'content', '2012-May-29 10:22:59', 's'),
(81, 'asus', 2, 'content', '2012-May-29 10:23:03', 'asus'),
(82, 'm', 2, 'content', '2012-May-29 10:23:05', 'm'),
(83, '0', 2, 'content', '2012-May-29 10:23:09', ''),
(84, '0', 1, 'merchant', '2012-May-29 10:24:40', ''),
(85, 'la', 2, 'content', '2012-May-29 10:27:00', 'la'),
(86, 'asus', 2, 'content', '2012-May-29 10:27:05', 'asus'),
(87, 'asus', 2, 'content', '2012-May-29 10:27:31', 'asus'),
(88, 's', 2, 'content', '2012-May-29 10:29:36', 's'),
(106, 'asd', 2, 'content', '2012-May-29 17:05:31', 'asd'),
(107, 'asd', 2, 'content', '2012-May-29 17:05:38', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hotconfig`
--

CREATE TABLE IF NOT EXISTS `tbl_hotconfig` (
  `number` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hotconfig`
--

INSERT INTO `tbl_hotconfig` (`number`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tbmerchant`
--

CREATE TABLE IF NOT EXISTS `tbmerchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8,
  `des` text CHARACTER SET utf8,
  `catemerchantid` int(10) unsigned DEFAULT NULL,
  `location` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `contact1` text CHARACTER SET utf8,
  `contact2` text CHARACTER SET utf8,
  `hint` text CHARACTER SET utf8,
  `logo` varchar(45) DEFAULT NULL,
  `banner` varchar(45) DEFAULT NULL,
  `active` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned DEFAULT NULL,
  `catenamemerchant` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `createdate` varchar(45) DEFAULT NULL,
  `registernumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbmerchant`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbmerchantcate`
--

CREATE TABLE IF NOT EXISTS `tbmerchantcate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `active` int(10) unsigned NOT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbmerchantcate`
--

INSERT INTO `tbmerchantcate` (`id`, `name`, `active`, `count`) VALUES
(1, 'Hotel', 1, 3),
(2, 'Travel & Agent', 1, 4),
(3, 'Online Shop', 1, 0),
(4, 'Telco & Mobile', 1, 4),
(5, 'Data hosting', 1, 1),
(6, 'E-Ticket', 1, 1),
(7, 'Housing', 1, 0),
(8, 'Technical', 1, 2),
(9, 'Building & Contructor', 1, 5),
(10, 'Others', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbmerchantcontent`
--

CREATE TABLE IF NOT EXISTS `tbmerchantcontent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `cateid` int(10) unsigned DEFAULT NULL,
  `link` text,
  `image` text,
  `active` int(10) unsigned DEFAULT NULL,
  `catename` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `des` text CHARACTER SET utf8,
  `count` int(10) unsigned DEFAULT NULL,
  `lang` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `createdate` varchar(45) DEFAULT NULL,
  `search` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbmerchantcontent`
--

INSERT INTO `tbmerchantcontent` (`id`, `name`, `cateid`, `link`, `image`, `active`, `catename`, `des`, `count`, `lang`, `userid`, `createdate`, `search`) VALUES
(18, 'Asus trình làng loạt laptop với touchpad đa điểm tại VN', 10, NULL, 'asus2.jpg', 1, 'Others', '<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;">Loạt sản phẩm 2012 của Asus phần lớn sử dụng chip xử l&yacute; Intel Core i thế hệ thứ 3. Trong đ&oacute;, từ c&aacute;c mẫu m&aacute;y gi&aacute; khoảng 7 triệu đến thiết bị d&ograve;ng cao đều cho ph&eacute;p người d&ugrave;ng điều khiển đa chạm.</p>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/77/63/asus.jpg" alt="Đại diện của Asus và các dòng laptop mới." width="480" height="282" border="1" /></td>\n</tr>\n<tr>\n<td class="Image"  Arial; font-size: 8.5pt; color: #000000;" align="center">Đại diện của Asus v&agrave; c&aacute;c d&ograve;ng laptop mới.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;" align="center"><strong><span  underline;"><a href="http://vnexpress.net/gl/vi-tinh/san-pham-moi/2012/05/asus-trinh-lang-loat-laptop-voi-touchpad-da-diem-tai-vn/page_2.asp">Ảnh 4 d&ograve;ng laptop mới của Asus</a></span></strong></p>\n<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;">Asus tr&igrave;nh diễn c&ocirc;ng nghệ n&agrave;y với hai hoặc 3 ng&oacute;n tay. Theo đ&oacute;, người d&ugrave;ng c&oacute; thể k&eacute;o xuống để tho&aacute;t ứng dụng, trượt ngang để đi v&agrave;o c&aacute;c tiện &iacute;ch hay zoom đa điểm tr&ecirc;n ảnh giống như smartphone cảm ứng.</p>\n<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;">Loạt sản phẩm mới của Asus hỗ trợ c&ocirc;ng nghệ &acirc;m thanh SonicMaster hoặc hệ thống loa của Bang &amp; Olufsen. B&ecirc;n cạnh đ&oacute;, d&ograve;ng ultrabook cho ph&eacute;p khởi động nhanh chỉ 2 gi&acirc;y.</p>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/77/63/zenbook.jpg" alt="Zenbook Prime có giá khoảng 1.300 USD." width="480" height="327" border="1" /></td>\n</tr>\n<tr>\n<td class="Image"  Arial; font-size: 8.5pt; color: #000000;" align="center">Zenbook Prime c&oacute; gi&aacute; khoảng 1.300 USD.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;" align="center"><strong><span  underline;"><a href="http://vnexpress.net/gl/vi-tinh/san-pham-moi/2012/05/asus-trinh-lang-loat-laptop-voi-touchpad-da-diem-tai-vn/page_3.asp">Ảnh Zenbook Prime tại Việt Nam</a></span></strong></p>\n<p class="Normal"  ''Times New Roman''; font-size: 11.8pt; color: #000000;">Chiếc Zenbook Prime xuất hiện tại sự kiện l&agrave; sản phẩm đ&aacute;ng ch&uacute; &yacute; nhất. Model c&oacute; mặt tr&ecirc;n c&aacute;c kệ h&agrave;ng từ cuối th&aacute;ng 6 với gi&aacute; khoảng 27 triệu đồng. Zenbook Prime mới sử dụng m&agrave;n h&igrave;nh IPS với độ ph&acirc;n giải FullHD c&ugrave;ng với chip xử l&yacute; Intel core i thế hệ thứ 3. Ngo&agrave;i ra Asus cũng trang bị c&ocirc;ng nghệ SuperBatt gi&uacute;p tăng cường tuổi thọ pin l&ecirc;n gấp 3 lần so với trước đ&acirc;y.</p>\n<div>&nbsp;</div>', 14, 2, 11, '2012-05-29 09:38:46', 'Dai dien cua Asus v&agrave; c&aacute;c d&ograve;ng laptop moi.\n\n\n\nAnh 4 d&ograve;ng laptop moi cua Asus\nLoat san pham moi cua Asus ho tro c&ocirc;ng nghe &acirc;m thanh SonicMaster hoac he thong loa cua Bang &amp; Olufsen. B&ecirc;n canh d&oacute;, d&ograve;ng ultrabook cho ph&eacute;p khoi dong nhanh chi 2 gi&acirc;y.\n\n\n\n\n\n\nChiec Zenbook Prime xuat hien tai su kien l&agrave; san pham d&aacute;ng ch&uacute; &yacute; nhat. Model c&oacute; mat tr&ecirc;n c&aacute;c ke h&agrave;ng tu cuoi th&aacute;ng 6 voi gi&aacute; khoang 27 trieu dong. Zenbook Prime moi su dung m&agrave;n h&igrave;nh IPS voi do ph&acirc;n giai FullHD c&ugrave;ng voi chip xu l&yacute; Intel core i the he thu 3. Ngo&agrave;i ra Asus cung trang bi c&ocirc;ng nghe SuperBatt gi&uacute;p tang cuong tuoi tho pin l&ecirc;n gap 3 lan so voi truoc d&acirc;y.\n&nbsp;'),
(19, 'Kinh nghiệm mua túi đựng máy ảnh', 2, NULL, 'tui-da-dung.jpg', 1, 'Travel & Agent', '<p>Với d&acirc;n chụp h&igrave;nh chuy&ecirc;n nghiệp, t&uacute;i đựng cần thiết bới việc bảo vệ thiết bị v&agrave; linh động hơn trong việc di chuyển. Ngo&agrave;i ra, c&aacute;c t&uacute;i d&agrave;nh cho camera du lịch cũng cần thiết b&ecirc;n cạnh vẻ thời trang.</p>\n<h3 class="SubTitle">M&aacute;y ảnh du lịch</h3>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/73/65/tui-du-lich.jpg" alt="Túi du lịch dành cho người dùng máy compact." width="480" height="227" border="1" /></td>\n</tr>\n<tr>\n<td class="Image" align="center">T&uacute;i du lịch d&agrave;nh cho người d&ugrave;ng m&aacute;y compact.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal">Loại n&agrave;y d&agrave;nh cho những người th&iacute;ch đi di chuyển. Người d&ugrave;ng c&oacute; thể bỏ dễ d&agrave;ng trong t&uacute;i x&aacute;ch của m&igrave;nh. Ngo&agrave;i việc để m&aacute;y ảnh, một số t&uacute;i c&ograve;n cho ph&eacute;p người d&ugrave;ng bỏ th&ecirc;m pin dự ph&ograve;ng hay thẻ nhớ. Kh&aacute;ch h&agrave;ng mua t&uacute;i n&agrave;y thường l&agrave; những người chụp ảnh phổ th&ocirc;ng, đi du lịch hay mới bắt đầu chụp ảnh.</p>\n<h3 class="SubTitle">M&aacute;y ảnh mirrorless v&agrave; DSLR loại nhỏ.</h3>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/73/65/may-anh-nho.jpg" alt="Các loại túi đeo phù hợp với người dùng mới." width="480" height="225" border="1" /></td>\n</tr>\n<tr>\n<td class="Image" align="center">C&aacute;c loại t&uacute;i đeo ph&ugrave; hợp với người d&ugrave;ng mới.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal">T&uacute;i đeo vai nhỏ: Khi mua m&aacute;y DSLR hay mirroless, người d&ugrave;ng c&oacute; thể được tặng một chiếc tui đeo ch&eacute;o nhỏ. Vật dụng n&agrave;y thường c&oacute; những ngăn, cho ph&eacute;p đựng m&aacute;y ảnh,ống k&iacute;nh đi k&egrave;m theo v&agrave; cả đ&egrave;n flash. N&oacute; cũng c&oacute; c&aacute;c ngăn ở ph&iacute;a trước v&agrave; hai b&ecirc;n để đựng phụ kiện như pin, thẻ nhớ hay đồ vệ sinh m&aacute;y.</p>\n<p class="Normal">Bao đựng: Loại n&agrave;y cho ph&eacute;p người chụp lấy m&aacute;y nhanh để chụp c&aacute;c khoảnh khắc quan trọng. Bao đựng n&agrave;y thường vừa với DSLR hay mirroless k&egrave;m ống k&iacute;nh gắn liền v&agrave; thường được đeo tr&ecirc;n thắt lưng.</p>\n<p class="Normal">T&uacute;i đeo thời trang: Loại t&uacute;i n&agrave;y giống với c&aacute;c t&uacute;i đeo ch&eacute;o điển h&igrave;nh nhưng c&oacute; ngăn đựng m&aacute;y ảnh v&agrave; phụ kiện. Những t&uacute;i n&agrave;y thường vừa với một body c&ugrave;ng 2 ống k&iacute;nh nhỏ. T&uacute;i đựng n&agrave;y phổ biến với c&aacute;c ph&oacute;ng vi&ecirc;n.</p>\n<h3 class="SubTitle">DSLR với nhiều phụ kiện</h3>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/73/65/balo-a.jpg" alt="Túi đựng máy ảnh là phụ kiện quan trọng để bảo vệ thiết bị của người dùng" width="490" height="350" border="1" /></td>\n</tr>\n<tr>\n<td class="Image" align="center">T&uacute;i đựng m&aacute;y ảnh l&agrave; phụ kiện quan trọng để bảo vệ thiết bị của người d&ugrave;ng</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal">Balo: Người d&ugrave;ng mang theo nhiều m&aacute;y ảnh v&agrave; ống k&iacute;nh th&igrave; n&ecirc;n chọn balo. Kh&ocirc;ng giống t&uacute;i đeo ch&eacute;o l&agrave;m đau vai khi mang nặng, balo chia đều trọng lượng l&ecirc;n cả hai vai cho ph&eacute;p mang trong một thời gian d&agrave;i. Một số t&uacute;i c&ograve;n đi k&egrave;m khay đựng thức ăn, quần &aacute;o.</p>\n<p class="Normal">T&uacute;i đeo vai lớn: Loại n&agrave;y giống như t&uacute;i đeo vai nhỏ nhưng c&oacute; nhiều ngăn hơn, cho ph&eacute;p người d&ugrave;ng đựng th&ecirc;m m&aacute;y v&agrave; ống k&iacute;nh lẫn m&aacute;y t&iacute;nh x&aacute;ch tay cỡ nhỏ. Tuy nhi&ecirc;n loại t&uacute;i n&agrave;y c&oacute; kh&aacute; cồng kềnh v&agrave; kh&ocirc;ng thoải m&aacute;i như balo.</p>\n<p class="Normal">C&aacute;c loại t&uacute;i lớn thường l&agrave; những người chụp ảnh chuy&ecirc;n nghiệp hay người đam m&ecirc; nhiếp ảnh chọn mua.</p>\n<h3 class="SubTitle">C&aacute;c loại t&uacute;i kh&aacute;c</h3>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/73/65/tui-da-dung.jpg" alt="Một loại túi ngoài camera còn đựng thêm nhiều đồ khác." width="480" height="385" border="1" /></td>\n</tr>\n<tr>\n<td class="Image" align="center">Một loại t&uacute;i ngo&agrave;i camera c&ograve;n đựng th&ecirc;m nhiều đồ kh&aacute;c.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal">T&uacute;i chống thấm nước: Độ ẩm l&agrave; một trong những nguy&ecirc;n nh&acirc;n l&agrave;m hư m&aacute;y ảnh. Người d&ugrave;ng n&ecirc;n chọn t&uacute;i c&oacute; khả năng chống thấm nước tốt. Nh&agrave; sản xuất đưa ra c&aacute;c t&uacute;i c&oacute; thể bảo vệ trước mọi thời tiết với khả năng chống thấm nước v&agrave; c&aacute;c tấm đệm bảo vệ. C&aacute;c t&uacute;i n&agrave;y c&oacute; kh&oacute;a k&eacute;o ngăn nước lọt v&agrave;o trong.</p>\n<p class="Normal">T&uacute;i chống va đập: T&uacute;i n&agrave;y c&oacute; khả năng chống nước v&agrave; chống va đập tốt nhưng lại kh&aacute; cồng kềnh.</p>\n<table width="1" border="0" cellspacing="0" cellpadding="3" align="center">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/73/65/balo.jpg" alt="Một loại túi kéo." width="480" height="360" border="1" /></td>\n</tr>\n<tr>\n<td class="Image" align="center">Một loại t&uacute;i k&eacute;o.</td>\n</tr>\n</tbody>\n</table>\n<p class="Normal">T&uacute;i xe đẩy: T&uacute;i n&agrave;y ph&ugrave; hợp cho người d&ugrave;ng muốn mang theo mọi thứ như to&agrave;n bộ ống k&iacute;nh, th&acirc;n m&aacute;y dự ph&ograve;ng , phụ kiện hay laptop. Những t&uacute;i n&agrave;y c&oacute; b&aacute;nh xe ph&iacute;a dưới v&agrave; tay k&eacute;o gi&uacute;p di chuyển dễ d&agrave;ng.</p>\n<h3 class="SubTitle">Lời khuy&ecirc;n khi sử dụng t&uacute;i</h3>\n<p class="Normal">Chăm s&oacute;c v&agrave; bảo tr&igrave; t&uacute;i: Để k&eacute;o d&agrave;i tuổi thọ của t&uacute;i người d&ugrave;ng n&ecirc;n lau sạch bụi trong v&agrave; ngo&agrave;i t&uacute;i đồng thời n&ecirc;n phơi nắng để loại bỏ m&ugrave;i h&ocirc;i.</p>\n<p class="Normal">Lựa chọn thay thế: Nếu người d&ugrave;ng kh&ocirc;ng thể chọn được loại t&uacute;i cần thiết th&igrave; c&oacute; thể mua ngăn đệm để gắn v&agrave;o t&uacute;i b&igrave;nh thường của m&igrave;nh. Hiện tại c&oacute; rất nhiều k&iacute;ch thước cho ngăn đệm m&aacute;y ảnh c&oacute; thể vừa với nhiều cỡ t&uacute;i.</p>\n<p class="Normal">Bao che mưa: D&agrave;nh cho c&aacute;c nước nhiệt đới, bao che mưa sẽ bảo vệ t&uacute;i khỏi những cơn mua như tr&uacute;t nước.</p>\n<p class="Normal">Kh&ocirc;ng n&ecirc;n mang qu&aacute; tải nhất l&agrave; với t&uacute;i đeo vai, h&atilde;y mang những g&igrave; cần thiết. Mang nặng kh&ocirc;ng chỉ l&agrave;m người d&ugrave;ng mệt mỏi m&agrave; c&ograve;n l&agrave;m giảm động lực chụp h&igrave;nh. Nếu dự định mang nhiều đồ th&igrave; n&ecirc;n sử dụng balo.</p>\n<div>&nbsp;</div>', 7, 2, 11, '2012-05-29 09:41:19', 'Voi d&acirc;n chup h&igrave;nh chuy&ecirc;n nghiep, t&uacute;i dung can thiet boi viec bao ve thiet bi v&agrave; linh dong hon trong viec di chuyen. Ngo&agrave;i ra, c&aacute;c t&uacute;i d&agrave;nh cho camera du lich cung can thiet b&ecirc;n canh ve thoi trang.\nM&aacute;y anh du lich\n\n\n\n\n\n\nT&uacute;i du lich d&agrave;nh cho nguoi d&ugrave;ng m&aacute;y compact.\n\n\n\nLoai n&agrave;y d&agrave;nh cho nhung nguoi th&iacute;ch di di chuyen. Nguoi d&ugrave;ng c&oacute; the bo de d&agrave;ng trong t&uacute;i x&aacute;ch cua m&igrave;nh. Ngo&agrave;i viec de m&aacute;y anh, mot so t&uacute;i c&ograve;n cho ph&eacute;p nguoi d&ugrave;ng bo th&ecirc;m pin du ph&ograve;ng hay the nho. Kh&aacute;ch h&agrave;ng mua t&uacute;i n&agrave;y thuong l&agrave; nhung nguoi chup anh pho th&ocirc;ng, di du lich hay moi bat dau chup anh.\nM&aacute;y anh mirrorless v&agrave; DSLR loai nho.\n\n\n\n\n\n\nC&aacute;c loai t&uacute;i deo ph&ugrave; hop voi nguoi d&ugrave;ng moi.\n\n\n\nT&uacute;i deo vai nho: Khi mua m&aacute;y DSLR hay mirroless, nguoi d&ugrave;ng c&oacute; the duoc tang mot chiec tui deo ch&eacute;o nho. Vat dung n&agrave;y thuong c&oacute; nhung ngan, cho ph&eacute;p dung m&aacute;y anh,ong k&iacute;nh di k&egrave;m theo v&agrave; ca d&egrave;n flash. N&oacute; cung c&oacute; c&aacute;c ngan o ph&iacute;a truoc v&agrave; hai b&ecirc;n de dung phu kien nhu pin, the nho hay do ve sinh m&aacute;y.\nBao dung: Loai n&agrave;y cho ph&eacute;p nguoi chup lay m&aacute;y nhanh de chup c&aacute;c khoanh khac quan trong. Bao dung n&agrave;y thuong vua voi DSLR hay mirroless k&egrave;m ong k&iacute;nh gan lien v&agrave; thuong duoc deo tr&ecirc;n that lung.\nT&uacute;i deo thoi trang: Loai t&uacute;i n&agrave;y giong voi c&aacute;c t&uacute;i deo ch&eacute;o dien h&igrave;nh nhung c&oacute; ngan dung m&aacute;y anh v&agrave; phu kien. Nhung t&uacute;i n&agrave;y thuong vua voi mot body c&ugrave;ng 2 ong k&iacute;nh nho. T&uacute;i dung n&agrave;y pho bien voi c&aacute;c ph&oacute;ng vi&ecirc;n.\nDSLR voi nhieu phu kien\n\n\n\n\n\n\nT&uacute;i dung m&aacute;y anh l&agrave; phu kien quan trong de bao ve thiet bi cua nguoi d&ugrave;ng\n\n\n\nBalo: Nguoi d&ugrave;ng mang theo nhieu m&aacute;y anh v&agrave; ong k&iacute;nh th&igrave; n&ecirc;n chon balo. Kh&ocirc;ng giong t&uacute;i deo ch&eacute;o l&agrave;m dau vai khi mang nang, balo chia deu trong luong l&ecirc;n ca hai vai cho ph&eacute;p mang trong mot thoi gian d&agrave;i. Mot so t&uacute;i c&ograve;n di k&egrave;m khay dung thuc an, quan &aacute;o.\nT&uacute;i deo vai lon: Loai n&agrave;y giong nhu t&uacute;i deo vai nho nhung c&oacute; nhieu ngan hon, cho ph&eacute;p nguoi d&ugrave;ng dung th&ecirc;m m&aacute;y v&agrave; ong k&iacute;nh lan m&aacute;y t&iacute;nh x&aacute;ch tay co nho. Tuy nhi&ecirc;n loai t&uacute;i n&agrave;y c&oacute; kh&aacute; cong kenh v&agrave; kh&ocirc;ng thoai m&aacute;i nhu balo.\nC&aacute;c loai t&uacute;i lon thuong l&agrave; nhung nguoi chup anh chuy&ecirc;n nghiep hay nguoi dam m&ecirc; nhiep anh chon mua.\nC&aacute;c loai t&uacute;i kh&aacute;c\n\n\n\n\n\n\nMot loai t&uacute;i ngo&agrave;i camera c&ograve;n dung th&ecirc;m nhieu do kh&aacute;c.\n\n\n\nT&uacute;i chong tham nuoc: Do am l&agrave; mot trong nhung nguy&ecirc;n nh&acirc;n l&agrave;m hu m&aacute;y anh. Nguoi d&ugrave;ng n&ecirc;n chon t&uacute;i c&oacute; kha nang chong tham nuoc tot. Nh&agrave; san xuat dua ra c&aacute;c t&uacute;i c&oacute; the bao ve truoc moi thoi tiet voi kha nang chong tham nuoc v&agrave; c&aacute;c tam dem bao ve. C&aacute;c t&uacute;i n&agrave;y c&oacute; kh&oacute;a k&eacute;o ngan nuoc lot v&agrave;o trong.\nT&uacute;i chong va dap: T&uacute;i n&agrave;y c&oacute; kha nang chong nuoc v&agrave; chong va dap tot nhung lai kh&aacute; cong kenh.\n\n\n\n\n\n\nMot loai t&uacute;i k&eacute;o.\n\n\n\nT&uacute;i xe day: T&uacute;i n&agrave;y ph&ugrave; hop cho nguoi d&ugrave;ng muon mang theo moi thu nhu to&agrave;n bo ong k&iacute;nh, th&acirc;n m&aacute;y du ph&ograve;ng , phu kien hay laptop. Nhung t&uacute;i n&agrave;y c&oacute; b&aacute;nh xe ph&iacute;a duoi v&agrave; tay k&eacute;o gi&uacute;p di chuyen de d&agrave;ng.\nLoi khuy&ecirc;n khi su dung t&uacute;i\nCham s&oacute;c v&agrave; bao tr&igrave; t&uacute;i: De k&eacute;o d&agrave;i tuoi tho cua t&uacute;i nguoi d&ugrave;ng n&ecirc;n lau sach bui trong v&agrave; ngo&agrave;i t&uacute;i dong thoi n&ecirc;n phoi nang de loai bo m&ugrave;i h&ocirc;i.\nLua chon thay the: Neu nguoi d&ugrave;ng kh&ocirc;ng the chon duoc loai t&uacute;i can thiet th&igrave; c&oacute; the mua ngan dem de gan v&agrave;o t&uacute;i b&igrave;nh thuong cua m&igrave;nh. Hien tai c&oacute; rat nhieu k&iacute;ch thuoc cho ngan dem m&aacute;y anh c&oacute; the vua voi nhieu co t&uacute;i.\nBao che mua: D&agrave;nh cho c&aacute;c nuoc nhiet doi, bao che mua se bao ve t&uacute;i khoi nhung con mua nhu tr&uacute;t nuoc.\nKh&ocirc;ng n&ecirc;n mang qu&aacute; tai nhat l&agrave; voi t&uacute;i deo vai, h&atilde;y mang nhung g&igrave; can thiet. Mang nang kh&ocirc;ng chi l&agrave;m nguoi d&ugrave;ng met moi m&agrave; c&ograve;n l&agrave;m giam dong luc chup h&igrave;nh. Neu du dinh mang nhieu do th&igrave; n&ecirc;n su dung balo.\n&nbsp;'),
(20, '5 bước giải cứu điện thoại bị rơi vào nước', 4, NULL, NULL, 1, 'Telco & Mobile', '<p class="Lead">Nokia hướng dẫn c&aacute;ch giảm thiểu việc smartphone bị hỏng do nước tr&agrave;n. Đ&acirc;y được cho l&agrave; phương ph&aacute;p hữu &iacute;ch c&oacute; thể &aacute;p dụng cho những điện thoại kh&aacute;c.</p>\n<table width="100%" border="0" cellspacing="0" cellpadding="3">\n<tbody>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/4f/94/Giai-cuu-1.jpg" alt="" width="490" height="406" border="1" /></td>\n</tr>\n<tr>\n<td>Khi v&ocirc; t&igrave;nh để rơi điện thoại v&agrave;o nước, người d&ugrave;ng phải nhanh ch&oacute;ng lấy m&aacute;y ra c&agrave;ng nhanh c&agrave;ng tốt để hạn chế những tổn hại.</td>\n</tr>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/4f/94/Giai-cuu-2.jpg" alt="" width="490" height="405" border="1" /></td>\n</tr>\n<tr>\n<td class="Normal" align="center">Sau đ&oacute; th&aacute;o hết sim, thẻ microSD v&agrave; pin để tr&aacute;nh đoản mạch.</td>\n</tr>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/4f/94/Giai-cuu-3.jpg" alt="" width="490" height="404" border="1" /></td>\n</tr>\n<tr>\n<td>Lau sạch điện thoại bằng khăn kh&ocirc;. Hạn chế d&ugrave;ng giấy vệ sinh v&igrave; n&oacute; c&oacute; thể d&iacute;nh v&agrave;o linh kiện. Đặc biệt lưu &yacute; kh&ocirc;ng được sử dụng m&aacute;y sấy v&igrave; nước sẽ bị đẩy v&agrave;o s&acirc;u b&ecirc;n trong.</td>\n</tr>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/4f/94/Giai-cuu-4.jpg" alt="" width="490" height="417" border="1" /></td>\n</tr>\n<tr>\n<td>Đặt smartphone ở nơi ấm v&agrave; kh&ocirc; khoảng 8 tiếng (trong th&ugrave;ng gạo hoặc gần l&ograve; sưởi v&agrave; cũng c&oacute; thể l&agrave; buộc v&agrave;o trong một chiếc khăn để h&uacute;t hết những hơi ẩm c&ograve;n s&oacute;t)</td>\n</tr>\n<tr>\n<td><img src="http://vnexpress.net/Files/Subject/3b/bd/4f/94/Giai-cuu-5.jpg" alt="" width="490" height="559" border="1" /></td>\n</tr>\n<tr>\n<td>Sau c&aacute;c bước tr&ecirc;n, người d&ugrave;ng c&oacute; thể thử khởi động m&aacute;y. Nếu điện thoại hoạt động b&igrave;nh thường, người sử dụng n&ecirc;n lưu lại to&agrave;n bộ dữ liệu v&agrave;o m&aacute;y t&iacute;nh.</td>\n</tr>\n</tbody>\n</table>', 1, 2, 11, '2012-05-29 09:44:27', 'Nokia huong dan c&aacute;ch giam thieu viec smartphone bi hong do nuoc tr&agrave;n. D&acirc;y duoc cho l&agrave; phuong ph&aacute;p huu &iacute;ch c&oacute; the &aacute;p dung cho nhung dien thoai kh&aacute;c.\n\n\n\n\n\n\nKhi v&ocirc; t&igrave;nh de roi dien thoai v&agrave;o nuoc, nguoi d&ugrave;ng phai nhanh ch&oacute;ng lay m&aacute;y ra c&agrave;ng nhanh c&agrave;ng tot de han che nhung ton hai.\n\n\n\n\n\nSau d&oacute; th&aacute;o het sim, the microSD v&agrave; pin de tr&aacute;nh doan mach.\n\n\n\n\n\nLau sach dien thoai bang khan kh&ocirc;. Han che d&ugrave;ng giay ve sinh v&igrave; n&oacute; c&oacute; the d&iacute;nh v&agrave;o linh kien. Dac biet luu &yacute; kh&ocirc;ng duoc su dung m&aacute;y say v&igrave; nuoc se bi day v&agrave;o s&acirc;u b&ecirc;n trong.\n\n\n\n\n\nDat smartphone o noi am v&agrave; kh&ocirc; khoang 8 tieng (trong th&ugrave;ng gao hoac gan l&ograve; suoi v&agrave; cung c&oacute; the l&agrave; buoc v&agrave;o trong mot chiec khan de h&uacute;t het nhung hoi am c&ograve;n s&oacute;t)\n\n\n\n\n\nSau c&aacute;c buoc tr&ecirc;n, nguoi d&ugrave;ng c&oacute; the thu khoi dong m&aacute;y. Neu dien thoai hoat dong b&igrave;nh thuong, nguoi su dung n&ecirc;n luu lai to&agrave;n bo du lieu v&agrave;o m&aacute;y t&iacute;nh.\n\n\n'),
(21, 'Global Fraud Management Portal: Decision Manager', 3, NULL, 'keangnam-11.jpg', 1, 'Online Shop', '<p>Decision Manager provides all the capability you need to automate and streamline fraud management operations, including the ability to leverage the world''s biggest fraud detection radar.</p>\n<p>Get more data about your inbound order, as well as compare it to data generated from the over <strong>60 BILLION</strong> transactions that Visa and CyberSource process annually &ndash; including truth data. Available only with <a class="document" href="http://www.cybersource.com/resources/collateral/Resource_Center/service_briefs/CYBS_fraud_management_solutions.pdf">Decision Manager</a>.</p>\n<p>Access 260+ Global Validation Tests and Services</p>\n<ul class="disc">\n<li>Device fingerprinting with packet signature inspection</li>\n<li>IP Geolocation</li>\n<li>Velocity monitoring</li>\n<li>Multi-merchant transaction histories/shared data</li>\n<li>Neural net risk detection</li>\n<li>Positive/negative/review lists</li>\n<li>Global telephone number validation</li>\n<li>Global delivery address verification services</li>\n<li>Standard card brand services (AVS, CVN)</li>\n<li>Custom fields for your own data</li>\n<li>Much more...</li>\n</ul>\n<p>Powerful Business User Rule Management Interface</p>\n<ul class="disc">\n<li>Create and modify rules on-demand</li>\n<li>No IT coding required</li>\n<li>Create multiple screening profiles tailored to your business and products</li>\n<li>Passive mode allows you to test rules before going "live"</li>\n</ul>\n<p>Flexible Case Management System: CyberSource Intelligent Review Technology&trade;</p>\n<ul class="disc">\n<li>Consolidated review data to streamline order review</li>\n<li>Customizable case management layouts and search parameters</li>\n<li>Automated case ownership and priority assignment</li>\n<li>Automated queue SLA management</li>\n<li>Semi-automatic callouts to third-party validation services</li>\n<li>Advanced process analytics and reporting</li>\n<li>Optional export of data to your case system via our API/XML interface</li>\n</ul>', 2, 2, 1, '2012-05-31 04:41:57', 'Decision Manager provides all the capability you need to automate and streamline fraud management operations, including the ability to leverage the world''s biggest fraud detection radar.\nGet more data about your inbound order, as well as compare it to data generated from the over 60 BILLION transactions that Visa and CyberSource process annually &ndash; including truth data. Available only with Decision Manager.\nAccess 260+ Global Validation Tests and Services\n\nDevice fingerprinting with packet signature inspection\nIP Geolocation\nVelocity monitoring\nMulti-merchant transaction histories/shared data\nNeural net risk detection\nPositive/negative/review lists\nGlobal telephone number validation\nGlobal delivery address verification services\nStandard card brand services (AVS, CVN)\nCustom fields for your own data\nMuch more...\n\nPowerful Business User Rule Management Interface\n\nCreate and modify rules on-demand\nNo IT coding required\nCreate multiple screening profiles tailored to your business and products\nPassive mode allows you to test rules before going "live"\n\nFlexible Case Management System: CyberSource Intelligent Review Technology&trade;\n\nConsolidated review data to streamline order review\nCustomizable case management layouts and search parameters\nAutomated case ownership and priority assignment\nAutomated queue SLA management\nSemi-automatic callouts to third-party validation services\nAdvanced process analytics and reporting\nOptional export of data to your case system via our API/XML interface\n'),
(22, 'IBM', 5, NULL, 'img-1334886208-1.jpg', 1, 'Data hosting', '<p>The IBM integrated e-commerce solution provides a wide range of easy-to-use features and functions for content management, relationship marketing, order management, and payment management for all types of Internet businesses, including business-to-business, business-to-consumer, and e-marketplaces.<br /><br />In addition, IBM continues its commitment to building an open standards based platform with its WebSphere Commerce Server solution. To learn more about WebSphere Commerce Server and how it will drive online revenue more efficiently for partners and customers visit our <a class="external" href="http://www-01.ibm.com/software/genservers/commerceproductline" target="_blank">website</a>.</p>', 9, 2, 1, '2012-05-31 04:43:20', 'The IBM integrated e-commerce solution provides a wide range of easy-to-use features and functions for content management, relationship marketing, order management, and payment management for all types of Internet businesses, including business-to-business, business-to-consumer, and e-marketplaces.In addition, IBM continues its commitment to building an open standards based platform with its WebSphere Commerce Server solution. To learn more about WebSphere Commerce Server and how it will drive online revenue more efficiently for partners and customers visit our website.'),
(23, 'Managed Risk Services', 3, NULL, 'american-express7.jpg', 1, 'Online Shop', '<p>CyberSource Managed Risk Services combines Decision Manager with the services of our expert personnel to assist your fraud management operation. Consider us an extension of your loss prevention arm. We work with you to define your requirements, then design and implement a solution tailored to meet your business goals. When you partner with CyberSource you''ll have fraud experts, with unmatched experience, backing you up.</p>\n<h2>Performance Monitoring</h2>\n<p>When you take advantage of our Performance Monitoring services, you''ll see fewer orders going to manual review because you''ll have a CyberSource expert familiar with your industry creating automation rules based on your business requirements. This person continually monitors your system and makes changes to ensure your fraud rates are kept low.<br /><br />We''ll collaborate with you to set business metrics, review performance, and provide easy-to-use business tools that let you control as little or as much as you wish. The service starts with a complete analysis of your company''s transaction history and business processes, and ensures installation of a fully tailored solution with ongoing monitoring and tuning to further enhance business results.</p>\n<h2>Screening Management</h2>\n<p>If you need manual intervention, you have the option to outsource the full operation to our Screening Management teams. CyberSource''s fully managed offering includes everything in our Performance Monitoring service, plus complete management of the business process, including order review. Our teams are available 24/7, so you can optimize overall efficiency without having to add headcount as your business scales.</p>\n<h2>Key Features</h2>\n<ul class="disc">\n<li>Choice of services, incorporating our Decision Manager fraud portal</li>\n<li>Fraud management strategy designed to meet your specific requirements</li>\n<li>Experienced risk analysts monitor and tune your fraud processes</li>\n<li>Optional performance guarantees</li>\n</ul>\n<h2>Key Benefits</h2>\n<ul class="disc">\n<li>Maximize acceptance of valid orders</li>\n<li>Increase customer service productivity</li>\n<li>More tailored and effective screening strategies</li>\n<li>Minimize online fraud losses</li>\n<li>Free up your teams to focus on their core competency &ndash; running your business</li>\n</ul>', NULL, 2, 1, '2012-05-31 05:03:57', 'CyberSource Managed Risk Services combines Decision Manager with the services of our expert personnel to assist your fraud management operation. Consider us an extension of your loss prevention arm. We work with you to define your requirements, then design and implement a solution tailored to meet your business goals. When you partner with CyberSource you''ll have fraud experts, with unmatched experience, backing you up.\nPerformance Monitoring\nWhen you take advantage of our Performance Monitoring services, you''ll see fewer orders going to manual review because you''ll have a CyberSource expert familiar with your industry creating automation rules based on your business requirements. This person continually monitors your system and makes changes to ensure your fraud rates are kept low.We''ll collaborate with you to set business metrics, review performance, and provide easy-to-use business tools that let you control as little or as much as you wish. The service starts with a complete analysis of your company''s transaction history and business processes, and ensures installation of a fully tailored solution with ongoing monitoring and tuning to further enhance business results.\nScreening Management\nIf you need manual intervention, you have the option to outsource the full operation to our Screening Management teams. CyberSource''s fully managed offering includes everything in our Performance Monitoring service, plus complete management of the business process, including order review. Our teams are available 24/7, so you can optimize overall efficiency without having to add headcount as your business scales.\nKey Features\n\nChoice of services, incorporating our Decision Manager fraud portal\nFraud management strategy designed to meet your specific requirements\nExperienced risk analysts monitor and tune your fraud processes\nOptional performance guarantees\n\nKey Benefits\n\nMaximize acceptance of valid orders\nIncrease customer service productivity\nMore tailored and effective screening strategies\nMinimize online fraud losses\nFree up your teams to focus on their core competency &ndash; running your business\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbmerchanthot`
--

CREATE TABLE IF NOT EXISTS `tbmerchanthot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchantcontentid` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `contentname` text,
  `catemerchantname` text,
  `cateid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbmerchanthot`
--

INSERT INTO `tbmerchanthot` (`id`, `merchantcontentid`, `order`, `contentname`, `catemerchantname`, `cateid`) VALUES
(32, 18, 5, 'Asus trình làng loạt laptop với touchpad đa điểm tại VN', 'Others', 10),
(31, 19, 4, 'Kinh nghiệm mua túi đựng máy ảnh', 'Travel & Agent', 2),
(30, 20, 3, '5 bước giải cứu điện thoại bị rơi vào nước', 'Telco & Mobile', 4),
(29, 21, 2, 'Global Fraud Management Portal: Decision Manager', 'Online Shop', 3),
(27, 22, 1, 'IBM', 'Data hosting', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `active` int(10) unsigned NOT NULL,
  `createdate` varchar(45) NOT NULL,
  `root` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `type`, `active`, `createdate`, `root`) VALUES
(1, 'admin', '365545d915008b92040aa1b374dcc62d', 1, 1, '', 0),
(4, 'admin2', '1a83aa46b849e602c7796685d2edf436', 1, 1, '2012-05-18 17:42:45', 0),
(11, 'ad', 'ef8bfeaaad2e50f32d7e1140f9804b36', 2, 1, '2012-05-19 02:57:33', 0),
(18, 'ad2', '88493943d827fcb981ada1fdde7df2f4', 2, 1, '2012-05-21 10:09:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `active`) VALUES
(3, 'Tin bài ', 1),
(4, 'Trang chủ', 1),
(5, 'Liên hệ ', 1),
(6, 'Giới thiệu ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolelist` text,
  `module` text,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `rolelist`, `module`, `userid`) VALUES
(1, '4,3,2,1,', 'roleinfo', 1),
(12, '4,3,2,1,', 'cate', 1);
