-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 06:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_store`
--

-- --------------------------------------------------------

--

-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `stmt_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `stmt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`stmt_id`, `title`, `stmt`) VALUES
(1, 'Apple and Gold Consults', 'Our mission statemebt is to provide the absolute best customer experience in the Audio/Video industry without exception.\r\n                    We chiose to only sell best performing products in the world, learning them inside and out to ensure the experience with our organization \r\n                    and our products are second to none.');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_state` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_state`, `admin_about`, `admin_contact`, `admin_position`) VALUES
(2, 'Akinbode Michael', 'michael@gmail.com', 'asdf', 'author-bio.jpg', 'Oyo', 'Hi, I\'m Michael, senior web dev', '090-234-567-90', 'Senior Software Dev'),
(7, 'Sam John', 'april@yahoo.com', '1234', 'face_2.jpg', 'Lagos', 'sdfghjk', '09068052386', 'Junior Software Dev'),
(8, 'Tinuke', 'oluwagbotemiakinbode@gmail.com', 'qazqaz', '', 'Ikoyi, Lagos', '', '090-7689-9898', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

DROP TABLE IF EXISTS `boxes`;
CREATE TABLE `boxes` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL,
  `box_url` varchar(255) NOT NULL,
  `box_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`box_id`, `box_title`, `box_desc`, `box_url`, `box_image`) VALUES
(3, 'Projectors  ', 'Play and watch your favorite TV shows with these projectors', 'http://localhost/applegold/shop.php?p_category=4', 'projector-428665_1280.jpg'),
(4, 'Audio', 'Get the best deals for professional audio equipment', 'http://localhost/applegold/shop.php?category=3', 'indoors-1869560_1280.jpg'),
(5, 'Accessories', 'Our various accessories have the best experience', 'http://localhost/applegold/shop.php?p_category=1', 'bag-1853847_1280.jpg'),
(8, 'Speakers ', 'Our selection of premium headphones to select your favorite audio with an incredible sound', 'http://localhost/applegold/shop.php?p_category=2', 'gallery-1.jpg'),
(9, 'Headphones', 'Our selection of premium headphones to select your favorite audio with an incredible sound', 'http://localhost/applegold/shop.php?category=3', 'headphones-820341_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` varchar(255) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `model` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `cat_top`, `cat_image`) VALUES
(1, 'Phones & Tablets', 'yes', 'iphone.png'),
(2, 'Home & Office', 'yes', 'microwave.jpg'),
(3, 'Computing', 'no', 'begooa.jpg'),
(4, 'Electronics', 'no', 'fan.png'),
(5, 'Gaming', 'no', 'game.png');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(7, 7, 'Test Code', '1500', 'ExrxGAuNNr', 5, 4),
(11, 4, 'test', '1000', '2siLzbirqd', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `profile_image` text NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `region` text NOT NULL,
  `postal_code` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `verified` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `Time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `profile_image`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `region`, `postal_code`, `password`, `customer_ip`, `verified`, `token`, `Time`) VALUES
(1, 'mee.jpg', 'Akinbode', ' Oluwatowo', 'oluwatowoakinbode@gmail.com', '090-1234-5678', '10, Oak Street, Plam Avenue, Ibadan, Nigeria', 'Ondo', 123456, 'asdf', '::1', 'Active', '03ff5913b0517be4231fee8f421f2699', '2021-05-30 18:44:49.261131'),
(3, '', 'Akinbode', ' Tinuke', 'codemyafrica@gmail.com', '', '', '', 0, 'asdf', '::1', 'inactive', '200947eff78f0d0cf60b29add8d8dd24', '2021-07-01 14:39:10.207722');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `receipt_no` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` text NOT NULL,
  `otp` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `amount`, `receipt_no`, `quantity`, `model`, `otp`, `order_date`, `order_status`) VALUES
(1, 1, 1500, 132785920, 1, 'Belkin 3-Button Wired USB Optical Mouse ', '', '2021-04-29', 'complete'),
(2, 1, 56000, 132785920, 2, 'Cinema 610', '', '2021-04-29', 'complete'),
(13, 1, 78500, 433298822, 1, 'Cam BCC950 ', '5415357', '2021-07-19', 'complete'),
(14, 1, 2500, 568705951, 1, 'WM126 ', '9277054', '2021-07-19', 'complete'),
(15, 1, 21000, 1044537833, 2, 'pes4.2.1', '9277054', '2021-07-20', 'complete'),
(16, 1, 59500, 62096416, 2, 'Widescreen Projector v34AK7d', '9277054', '2021-07-20', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

DROP TABLE IF EXISTS `online_payment`;
CREATE TABLE `online_payment` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `status` text NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`order_id`, `product_id`, `customer_email`, `amount`, `receipt`, `currency`, `model`, `quantity`, `status`, `date`) VALUES
(9, 6, 'oluwatowoakinbode@gmail.com', 3200, '1282805351', 'usd', 'L6V-00001', 1, 'success', '2021-06-07 20:28:14.000000'),
(10, 4, 'oluwatowoakinbode@gmail.com', 2700, '343044868', 'usd', 'VicTsing Mouse Pad', 1, 'success', '2021-07-09 19:19:33.000000'),
(11, 24, 'oluwatowoakinbode@gmail.com', 3500, '618557374', 'usd', '2-1/16', 1, 'success', '2021-07-19 21:30:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `otp_on_delivery`
--

DROP TABLE IF EXISTS `otp_on_delivery`;
CREATE TABLE `otp_on_delivery` (
  `id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `otp` text NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp_on_delivery`
--

INSERT INTO `otp_on_delivery` (`id`, `ip_add`, `customer_id`, `otp`, `time`) VALUES
(1, '0', 1, '4554992', '2021-06-20 14:30:34.521740'),
(2, '0', 1, '871263', '2021-06-20 14:38:44.519337'),
(3, '::1', 1, '751211', '2021-06-20 14:49:45.979094'),
(6, '::1', 1, '8511697', '2021-07-19 19:50:32.122698'),
(7, '::1', 1, '5415357', '2021-07-19 20:21:14.059501'),
(8, '::1', 1, '9277054', '2021-07-19 20:40:53.051831');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `receipt_no` int(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `otp` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_email`, `receipt_no`, `amount`, `otp`, `payment_mode`, `voucher_code`, `payment_date`) VALUES
(1, 'oluwatowoakinbode@gmail.com', 132785920, 560, 0, 'Pay On Delivery', '', '2021-04-29'),
(2, 'oluwatowoakinbode@gmail.com', 132785920, 15, 0, 'Pay On Delivery', 'ExrxGAuNNr', '2021-04-29'),
(3, 'oluwatowoakinbode@gmail.com', 644414435, 105, 0, 'Pay Online', '', '2021-04-29'),
(4, 'oluwatowoakinbode@gmail.com', 912319767, 785, 0, 'Pay Online', '', '2021-05-02'),
(5, 'oluwatowoakinbode@gmail.com', 241738560, 10, 0, 'Pay Online', '', '2021-05-03'),
(6, 'oluwatowoakinbode@gmail.com', 1292090887, 590, 0, 'Pay Online', '', '2021-08-03'),
(7, 'oluwatowoakinbode@gmail.com', 1292090887, 590, 0, 'Pay Online', '', '2021-05-04'),
(8, 'oluwatowoakinbode@gmail.com', 1292090887, 590, 0, 'Pay Online', '', '2021-08-03'),
(12, 'oluwatowoakinbode@gmail.com', 977502883, 115, 8511697, 'Pay On Delivery', '', '2021-07-19'),
(13, 'oluwatowoakinbode@gmail.com', 433298822, 785, 5415357, 'Pay On Delivery', '', '2021-07-19'),
(14, 'oluwatowoakinbode@gmail.com', 568705951, 25, 9277054, 'Pay On Delivery', '', '2021-07-19'),
(15, 'oluwatowoakinbode@gmail.com', 568705951, 25, 9277054, 'Pay On Delivery', '', '2021-07-19'),
(16, 'oluwatowoakinbode@gmail.com', 568705951, 25, 9277054, 'Pay On Delivery', '', '2021-07-19'),
(17, '', 343044868, 27, 0, 'Pay Online', '', '2021-04-28'),
(18, 'oluwatowoakinbode@gmail.com', 1044537833, 210, 4676388, 'Pay On Delivery', '', '2021-07-20'),
(19, 'oluwatowoakinbode@gmail.com', 1044537833, 210, 4676388, 'Pay On Delivery', '', '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `receipt_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `receipt_no`, `product_id`, `quantity`, `model`, `order_status`) VALUES
(1, 1, 132785920, 7, 1, 'Belkin 3-Button Wired USB Optical Mouse ', 'complete'),
(2, 1, 132785920, 30, 2, 'Cinema 610', 'complete'),
(13, 1, 568705951, 12, 1, 'WM126 ', 'Pending'),
(14, 1, 1044537833, 38, 2, 'pes4.2.1', 'Pending'),
(15, 1, 62096416, 25, 2, 'Widescreen Projector v34AK7d', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

DROP TABLE IF EXISTS `producer`;
CREATE TABLE `producer` (
  `producer_id` int(10) NOT NULL,
  `producer_title` text NOT NULL,
  `producer_top` text NOT NULL,
  `producer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`producer_id`, `producer_title`, `producer_top`, `producer_image`) VALUES
(3, 'LG', 'yes', 'lg.png'),
(4, 'Tecno', 'yes', 'tecno.png'),
(5, 'Apple', 'yes', 'apple.png'),
(6, 'HP', 'yes', 'hp.png'),
(7, 'Nexus', 'no', 'nexus.png'),
(8, 'XBOX', 'no', 'xbox.png'),
(9, 'JBL', 'yes', 'jbl.png'),
(10, 'Lenovo', 'no', 'lenovo.png'),
(11, 'Logitech', 'no', 'logitech.png'),
(13, 'Dell', 'yes', 'apple.png'),
(14, 'Espon', 'no', 'espon.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `p_category_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `producer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `cproduct_img1` text NOT NULL,
  `cproduct_img2` text NOT NULL,
  `cproduct_img3` text NOT NULL,
  `old_price` int(10) NOT NULL,
  `new_price` int(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_label` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `int_qty` int(100) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_category_id`, `category_id`, `producer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `cproduct_img1`, `cproduct_img2`, `cproduct_img3`, `old_price`, `new_price`, `discount`, `product_label`, `product_price`, `currency`, `int_qty`, `product_keywords`, `product_desc`, `product_model`) VALUES
(2, 1, 3, 11, '2021-07-20 09:04:39', ' Logitech Wireless  Mouse', 'product_2', 'blogitecha.jpg', 'blogitechb.jpeg', 'blogitechc.jpg', '', '', '', 0, 0, 0, 'sale', 2500, 'usd', 10, 'mouse', '                                                                                                                                                Black Logitech M510 Wireless Computer Mouse                                                                                                                                ', 'M510 Wireless Computer mouse'),
(4, 1, 3, 0, '2021-07-20 09:04:47', 'VicTsing Mouse Pad', 'product_4', 'vistsingmousepada.jpg', 'victingmousepadb.jpg', 'vistsingmousepadc.jpg', '', '', '', 3000, 2700, 10, '', 3000, 'usd', 10, 'mouse', '                                    VicTsing Mouse Pad, Ergonomic Mouse Pad with Gel Wrist Rest Support, Gaming Mouse Pad with Lycra Cloth for Computer, Laptop at Home, Office                                ', 'VicTsing Mouse Pad'),
(5, 1, 3, 11, '2021-07-20 09:11:55', 'Red VicTsing Mouse ', 'product_5', 'redvtingmousea.jpg', 'redvtsingmousepadb.jpg', 'redvtingmousepadc.jpg', '', '', '', 0, 0, 0, 'new', 5000, 'usd', 10, 'mousepad', '                                                                                                                                                                                                                                                                                                                                    VicTsing Mouse Pad, Ergonomic Mouse Pad with Gel Wrist Rest Support, Gaming Mouse Pad with Lycra Cloth for Computer, Laptop at Home, Office                                                                                                                                                                                                                                                                                                ', 'VicTsing Mouse Pad Color-red'),
(6, 1, 3, 11, '2021-07-20 09:12:01', 'Microsoft Sculpt Mouse ', 'product_6', 'microsoftmousea.jpg', 'microsoftmouseb.jpg', 'microsoftmousec.jpg', '', '', '', 0, 0, 0, 'sale', 3200, 'usd', 10, 'mouse', '                                                                                                                                                                                                                        Advanced ergonomic design with thumb scoop encourages natural hand and wrist postures.\r\nMicrosofTrack Technology in the mouse gives you precise control on virtually any surface.\r\nWindows button for one-touch access to the Start Menu.\r\n                                                                                                                                                                                                ', 'L6V-00001'),
(7, 1, 3, 0, '2021-07-20 09:12:04', 'Belkin Wired  Mouse ', 'product_7', 'belkina.jpg', 'belkina.jpg', 'belkina.jpg', '', '', '', 0, 0, 0, 'new', 3000, 'usd', 10, 'mouse', '                                                                        Belkin 3-Button Wired USB Optical Mouse with 5-Foot Cord                                                                ', 'Belkin 3-Button Wired USB Optical Mouse '),
(9, 1, 3, 11, '2021-07-20 09:12:08', 'Logitech Wireless Mouse', 'product_9', 'blogitechMXa.jpg', 'blogitechMXb.jpg', 'blogitechMXc.jpg', '', '', '', 0, 0, 0, '', 3000, 'usd', 10, 'mouse', '                                    Logitech MX Master 2S Wireless Mouse – Use on Any Surface, Hyper-fast Scrolling, Ergonomic Shape, Rechargeable, Control up to 3 Apple Mac and Windows\r\nColor - Black                                ', 'Logitech MX Master 2S Wireless Mouse'),
(11, 1, 3, 13, '2021-07-20 09:12:11', 'Red Dell Wireless Mouse', 'product_11', 'reddella.jpg', 'reddellb.jpg', 'reddellc.jpg', '', '', '', 0, 0, 0, '', 2500, 'usd', 10, 'mouse', '                                    Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n                                ', 'WM126 '),
(12, 1, 3, 0, '2021-07-20 09:12:14', ' Dell Wireless Mouse', 'product_12', 'bluedella.jpg', 'bluedellb.jpg', 'bluedella.jpg', '', '', '', 0, 0, 0, '', 2500, 'usd', 10, 'mouse', '                                    Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n                                ', 'WM126 '),
(13, 1, 3, 13, '2021-07-20 09:12:17', 'Dell Wireless Mouse', 'product_13', 'whitedella.jpg', 'whitedellb.jpg', 'whitedellc.jpg', '', '', '', 0, 0, 0, '', 2500, 'usd', 10, 'mouse', '                                    Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n                                ', 'WM126 '),
(14, 5, 5, 0, '2021-07-20 09:12:20', 'Snooker pool table', 'product_14', 'poolboarda.jpg', 'poolboardb.jpg', 'poolboardc.jpg', '', '', '', 60000, 54000, 10, '', 60000, 'usd', 10, 'snooker', '                                                                        The product is new and packed PROFESSIONAL SIZE The table size are professional 8 feet (Playfield 88 in. L x 44 in. W)                                                                ', 'Vintage Green 8FT'),
(15, 5, 5, 8, '2021-07-20 09:12:23', 'PlayStation 4 Fortnite ', 'product_15', 'FORTNITEA.jpg', 'fortniteb.jpg', 'FORTNITEA.jpg', '', '', '', 0, 0, 0, '', 29000, 'usd', 10, 'Playstation', '                                    Fortnite Neo Versa PS4 bundle includes a jet black 1TB PlayStation 4 system, a matching DUALSHOCK4 wireless controller, and a code for exclusive Fortnite content                                ', ' 1TB Fortnite Bundle'),
(16, 3, 4, 14, '2021-07-20 09:12:27', 'Epson Projector', 'product_16', 'epsona.jpg', 'epsonb.jpg', 'epsonc.jpg', '', '', '', 0, 0, 0, '', 12000, 'usd', 10, 'Projector', '                                                                                                                                                                                    More accurate, vivid color, even in well lit rooms 3,200 lumens of equal color and white brightness \r\n•	Works with the latest laptops and media players? Supports HDMI, the standard in connectivity, for digital video and audio in one cable.                                                                                                                                                                ', 'VS250 SVGA'),
(18, 4, 2, 0, '2021-07-20 09:12:30', 'Samsung LED TV', 'product_18', 'samsunga.jpg', 'samsungb.jpg', 'samsungc.jpg', '', '', '', 0, 0, 0, '', 12000, 'usd', 10, 'TV', '                                                                        Full HD 1080p to enjoy a viewing experience that is 2x the clarity of standard HD TVs and access your streaming services all in one place using the Samsung remote control\r\n                                                                ', '32'),
(19, 4, 2, 0, '2021-07-20 09:12:33', 'Comfee Microwave Oven', 'product_19', 'comfeea.jpg', 'comfeeb.jpg', 'comfeec.jpg', '', '', '', 0, 0, 0, '', 39000, 'usd', 10, 'Microwave', '                                    0.7 cubic-foot capacity, 700 watts and 11 power levels\r\nMute Function, settings, clock, kitchen timer, Child safety lock, Easy auto-cook functions: Popcorn, Potato, Pizza, Frozen Veggie, Beverage, Reheat\r\n                                ', '0.7Cu.Ft/700W, Pearl White'),
(20, 3, 4, 0, '2021-07-20 09:12:35', 'ViewSonic  Smart Projector', 'product_20', 'viewsonica.jpg', 'viewsonicb.jpg', 'viewsonicc.jpg', '', '', '', 0, 0, 0, '', 11500, 'usd', 10, 'Projector', '                                                                        Portable Smart 1080p Wi-Fi Projector with  Bluetooth Speakers USB Type C 125% Rec. 709 HDR and Screen Mirroring                                                                ', 'Smart projector 12.890v1'),
(21, 3, 4, 0, '2021-07-20 09:12:39', 'Electronic White Board', 'product_21', 'whiteboarda.jpg', 'whiteboardb.jpg', 'whiteboardc.jpg', '', '', '', 0, 0, 0, '', 55000, 'usd', 10, 'Projector', '                                                                        Supports two simultaneous touches, making it easy for students to work together at the same time.\r\nIntuitive design and dual-touch controls make it easy for educators to turn lessons into learning experiences.\r\n                                                                ', 'Smart Board SBM680 with the Smart UF70 Projector'),
(23, 4, 2, 0, '2021-07-20 09:12:42', 'LG Smart TV', 'product_23', 'LGTVA.jpg', 'LGTVB.jpg', 'LGTVC.jpg', '', '', '', 0, 0, 0, '', 15600, 'usd', 10, 'TV', '                                                                                                            1080p Full HD resolution for a lifelike picture\r\nDirect lit LED produces great picture quality\r\n                                                                                                ', '22-Inch 1080p IPS LED TV '),
(24, 5, 5, 0, '2021-07-20 09:12:44', 'Billiard Pool Balls Set ', 'product_24', 'poolballa.jpg', 'poolballb.jpg', 'poolballc.jpg', '', '', '', 0, 0, 0, '', 3500, 'usd', 10, 'snooker', '                                                                        15 Red Balls, One Blue Ball, One Yellow Ball, One Brown Ball, One Green Ball, One Pink Ball, One Black Ball and One White Ball.\r\nA Complete Set, without Number on the Balls, 22 Balls Set made with high quality resin\r\n                                                                ', '2-1/16'),
(25, 3, 3, 0, '2021-07-20 11:55:43', 'Widescreen Projector', 'product_25', 'projectorscreena.jpg', 'projectorscreenb.jpg', 'projectorscreenc.jpg', '', '', '', 85000, 29750, 35, '', 85000, 'usd', 10, 'Projector', '                                                                                                             HD Indoor Pull Down Manual Widescreen 1:1 Gain Projector Screen for Home Theater, Office, Entertainment, White                                                                                                ', 'Widescreen Projector v34AK7d'),
(26, 23, 2, 0, '2021-07-20 09:12:53', 'Midea  Double Door Mini Fridge', 'product_26', 'mideaa.jpg', 'mideab.jpg', 'mideac.jpg', '', '', '', 0, 0, 0, '', 35000, 'usd', 10, 'Refrigerator', '                                                                                                            Black Double Door Mini Fridge with Freezer for Bedroom Office or Dorm with Adjustable Remove Glass Shelves Compact Refrigerator, 3.1 cu ft                                                                                                ', 'Black double door'),
(27, 14, 4, 0, '2021-07-20 11:46:52', 'Lasco Adjustable Fan', 'product_27', 'laskoa.jpg', 'laskob.jpg', 'laskoc.jpg', '', '', '', 0, 0, 0, '', 8000, 'usd', 10, 'Fan', '                                                                                                                                                 Elegance & Performance Adjustable Pedestal Fan, Black - Features Oscillating Movement Tilt-back Fan Head                                                                                                                                ', '18 Inches'),
(29, 2, 3, 13, '2021-07-20 09:12:58', 'Dell Inspiron Laptop', '', 'DELLA.jpg', 'dellb.jpg', 'dellc.jpg', '', '', '', 0, 0, 0, '', 15500, 'usd', 10, 'Laptop', '                                                                        14 inches , 8GB RAM, 256GB SSD, HDMI, WiFi, Intel UHD Graphics, Bluetooth, Windows 10                                                                ', 'Intel Core i5 '),
(30, 4, 4, 0, '2021-07-20 09:13:01', 'Cinema Home Theater', '', 'jbla.jpg', 'jblb.jpg', 'jblc.jpg', '', '', '', 0, 0, 0, '', 28000, 'usd', 10, 'Home Theater', '                                    •	Voice matched, 2-way satellite speakers\r\n•	60-watt, 8\" powered subwoofer\r\n•	Easy to install\r\n•	Included brackets for wall mounting\r\n                                ', 'Cinema 610'),
(31, 2, 3, 5, '2021-07-20 09:13:04', 'Apple MacBook Pro', '', 'maca.jpg', 'macb.jpg', 'macc.jpg', '', '', '', 0, 0, 0, '', 59000, 'usd', 10, 'Laptop', '                                                                        •	Ninth-generation 6-Core Intel Core i7 Processor\r\n•	Stunning 16-inch Retina Display with True Tone technology\r\n•	Touch Bar and Touch ID\r\n•	Up to 11 hours of battery life                                                                ', '16-inch, 16GB RAM, 512GB Storage'),
(32, 1, 4, 9, '2021-07-20 09:13:07', 'TOZO Bluetooth Earbuds', '', 'tozoa.jpg', 'tozob.jpg', 'tozoc.jpg', '', '', '', 0, 0, 0, '', 25000, 'usd', 10, 'Bluetooth', '                                                                         5.0 Wireless Earbuds with Wireless Charging                                                                ', 'TOZO T10 '),
(33, 2, 3, 0, '2021-07-20 09:16:02', ' Acer Spin 3 Laptop', '', 'acer1.jpg', 'aceb.jpg', 'acec.jpg', '', '', '', 0, 0, 0, '', 36000, '', 10, 'Laptop', '                                    •	8th Generation Intel Core i7 8565U Processor (Up to 4.6GHz)\r\n•	14 inches Full HD (1920 x 1080) Widescreen LED backlit IPS Multi Touch Convertible Display\r\n•	16GB DDR4 Memory & 512GB \r\n                                ', 'Intel Core i7, 16GB DDR4, 512GB  SSD'),
(34, 1, 3, 11, '2021-07-20 09:16:05', 'Logitech Conference Cam ', '', 'conferencecama.jpg', 'conferencecamb.jpg', 'conferencecamc.jpg', '', '', '', 85000, 78500, 7, '', 85000, 'usd', 10, 'Camera', '                                                                                                            Video Conference Webcam, HD 1080p Camera with Built-In Speakerphone                                                                                                ', 'Cam BCC950 '),
(35, 1, 1, 0, '2021-07-20 09:16:07', 'Yunsong Charging Cord  ', '', 'yunsonga.jpg', 'yunsongb.jpg', 'yunsongc.jpg', '', '', '', 0, 0, 0, '', 3000, 'usd', 10, 'Charger', '                                    3Pack 6FT Nylon Braided Lightning Cable Charging Cord USB Cable Compatible with iPhone 11 Pro Max XS XR X 8 7 6S 6 Plus SE 5S 5C 5 iPad                                ', '12.890v1'),
(38, 5, 5, 0, '2021-07-20 11:54:17', 'PES 4', '', 'callofdutya.jpg', 'callofdutyb.jpg', 'callofdutya.jpg', '', '', '', 18000, 9000, 50, '', 18000, 'usd', 10, 'Playstation', '                                     PlayStation 4                                     ', 'pes4.2.1'),
(42, 2, 3, 10, '2021-07-20 09:16:13', 'Lenovo Idea Pad ', '', 'lenovo15.6a.jpg', 'lenovo15.6b.jpg', 'lenovo15.6c.jpg', '', '', '', 0, 0, 0, '', 38500, 'usd', 10, 'Laptop', '                                                                         Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus totam, beatae recusandae natus debitis fuga magni laudantium illum provident repudiandae quaerat laboriosam excepturi sed cumque mollitia commodi aliquam dignissimos? Quam?     \r\n                                                                                                                                                                                                                     ', 'Intel Core i3'),
(43, 1, 3, 11, '2021-07-20 09:16:15', 'Logitech Wired Keyboard', '', 'logitechkeyboarda.jpg', 'logitechkeyboardb.jpg', 'logitechkeyboardc.jpg', '', '', '', 0, 0, 0, 'new', 3500, 'usd', 10, 'keyboard', '                                    somewords here                                ', 'black wired keyboard'),
(44, 4, 2, 9, '2021-07-20 09:16:18', 'JBL Home Theatre', 'product_50', 'soundspeakera.jpg', 'soundspeakerb.jpg', 'soundspeakerc.jpg', '', '', '', 0, 0, 0, 'sale', 6500, 'usd', 10, 'speakers audio', '                                                                                                                                                JBL durable home theatre                                                                                                                               ', 'black home theatre'),
(57, 4, 4, 9, '2021-07-20 09:16:21', 'Anua Home Theatre', '', 'anuaa.jpg', 'anuab.jpg', 'anuac.jpg', '', '', '', 35800, 35220, 10, 'sale', 35800, 'usd', 10, 'speakers audio', '                                    anuaa sound speaker                                ', 'Anua 5.2 sound speaker');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `p_category_id` int(10) NOT NULL,
  `p_category_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_category_id`, `p_category_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 'Computer Accessories', 'yes', 'mouse.jpg'),
(2, 'Laptops ', 'yes', 'acer1.jpg'),
(3, 'Projectors', 'yes', 'projector.jpg'),
(4, ' Audio', 'no', 'speaker.png'),
(5, 'Play Station', 'yes', 'fortnite.jpg'),
(14, 'Office Furniture', 'yes', 'chair.png'),
(16, 'Mobile Phones', 'yes', 'iphone.png'),
(17, 'Mobile Phone Accessories', 'yes', 'earbuds.png'),
(18, 'Desktops', 'yes', 'hpdesktopa.jpg'),
(21, 'Printers', 'yes', 'printer.png'),
(23, 'Televisions  Videos', 'yes', 'samsungb.jpg'),
(25, 'Tablets', 'yes', 'purepng.com-windows-tablettablettablet-computertouchscreen-displayrechargeable-batterelectronicswindows-1701528392760xuswz.png');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

DROP TABLE IF EXISTS `pwd_reset`;
CREATE TABLE `pwd_reset` (
  `pwd_reset_id` int(10) NOT NULL,
  `pwd_reset_email` varchar(255) NOT NULL,
  `pwd_reset_selector` varchar(100) NOT NULL,
  `pwd_reset_token` varchar(255) NOT NULL,
  `pwd_reset_expire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwd_reset`
--

INSERT INTO `pwd_reset` (`pwd_reset_id`, `pwd_reset_email`, `pwd_reset_selector`, `pwd_reset_token`, `pwd_reset_expire`) VALUES
(3, 'oluwatowoakinbode@gmail.com', '4b886bfa52d15d5c', '$2y$10$0KWXjYZZrJhFtYi5uEKaK.fETBbkTaXOkTX6kgLSU.TEPmz62HFV6', '1626720851');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_title` text NOT NULL,
  `slide_caption` text NOT NULL,
  `slide_link` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_title`, `slide_caption`, `slide_link`, `slide_url`) VALUES
(2, 'Slide 2', 'slide1.jpg', 'New JBL Home Theatres', 'Discover premium quality speakers by JBL', 'Shop Speakers', 'http://localhost/applegold/shop.php?p_category=3'),
(3, 'Slide 3', 'slide3.jpg', 'The Headphone Collection', 'Discover premium quality headphones', 'Shop Headphones', 'http://localhost/applegold/shop.php?category=4'),
(7, 'Slide 4', 'slide.jpg', 'Best Performing Products', 'Our mission is to provide the best experience for the audio/video industry', 'Shop All', 'http://localhost/applegold/shop.php?category=2'),
(8, 'Slide 1', 'slidetv.jpg', 'Introducing brand new TV OLEDs', 'Discover premium quality TVs', 'Shop OLEDs', 'http://localhost/applegold/shop.php?p_category=1');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Terms and Conditions', 'link1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi perferendis voluptatibus doloribus et dolores! Assumenda vitae nam dolor quam quas quibusdam incidunt itaque voluptate autem animi? A molestiae libero quos.\r\n'),
(2, 'Refund Policy ', 'link2', ' Refund policy, ipsum dolor sit amet consectetur adipisicing elit. Non neque, modi animi architecto laborum sunt vitae tempora rerum sint culpa, debitis magnam assumenda nulla sit consequuntur nobis rem iusto et?'),
(3, 'Promo & Others', 'link3', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non neque, modi animi architecto laborum sunt vitae tempora rerum sint culpa, debitis magnam assumenda nulla sit consequuntur nobis rem iusto et?\r\n'),
(6, 'Shipping and Logistics', 'link5', 'Shipping Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis recusandae fuga quo labore minima, ab alias, commodi temporibus nulla porro vel consequuntur, ut ipsam illum sunt expedita voluptatem animi dolorum.'),
(7, 'FAQ', 'link4', 'Abc Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis recusandae fuga quo labore minima, ab alias, commodi temporibus nulla porro vel consequuntur, ut ipsam illum sunt expedita voluptatem animi dolorum.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`stmt_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `online_payment`
--
ALTER TABLE `online_payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `otp_on_delivery`
--
ALTER TABLE `otp_on_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`producer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_category_id`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `stmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `online_payment`
--
ALTER TABLE `online_payment`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `otp_on_delivery`
--
ALTER TABLE `otp_on_delivery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `producer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `pwd_reset_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
