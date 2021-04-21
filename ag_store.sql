-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 09:46 PM
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
CREATE TABLE IF NOT EXISTS `about` (
  `stmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `stmt` text NOT NULL,
  PRIMARY KEY (`stmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`stmt_id`, `title`, `stmt`) VALUES
(1, 'Apple and Gold Consults', 'Our mission statemebt is to provide the absolute best customer experience in the Audio/Video industry without exception.\r\n                    We chiose to only sell best performing products in the world, learning them inside and out to ensure the experience with our organization \r\n                    and our products are second to none.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` text NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `quantity`, `model`) VALUES
(38, '::1', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_title` text NOT NULL,
  `category_desc` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_desc`) VALUES
(1, 'Phones & Tablets', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(2, 'Home & Office', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(3, 'Computing', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(4, 'Electronics', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(5, 'Gaming', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `profile_image` text NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `address` text NOT NULL,
  `region` text NOT NULL,
  `postal_code` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `verified` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `Time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `profile_image`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `region`, `postal_code`, `password`, `customer_ip`, `verified`, `token`, `Time`) VALUES
(5, 'IMG_20180624_000943_571.jpg', 'Tolu', ' Akinbode', 'oluwatowoakinbode@gmail.com', 2147483647, '208b Isale Eko Avenue, Dolphin Estate, Ikoyi, Lagos.', 'oyo, ibadan', 123456, 'poiop', '::1', 'inactive', 'acc0e9c96173c579c90c05de205a2b63', '2021-01-18 17:42:24.678699'),
(6, 'IMG_20180624_000943_571.jpg', 'Tolu', ' Akinbode', 'oluwatowoakinbode@gmail.com', 2147483647, '208b Isale Eko Avenue, Dolphin Estate, Ikoyi, Lagos.', 'oyo, ibadan', 123456, 'popp', '::1', 'inactive', '9056b5aea30770d20d04d092df6d2809', '2021-01-18 17:42:24.678699');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `receipt_no` int(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `amount`, `receipt_no`, `quantity`, `model`, `order_date`, `order_status`) VALUES
(1, 7, 7500, 1699599459, 3, '', '2020-07-04', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` int(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `receipt_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `model` text NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `receipt_no`, `product_id`, `quantity`, `model`, `order_status`) VALUES
(1, 7, 1699599459, 13, 3, '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_category_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `cproduct_img1` text NOT NULL,
  `cproduct_img2` text NOT NULL,
  `cproduct_img3` text NOT NULL,
  `old_price` int(10) NOT NULL,
  `new_price` int(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_model` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_category_id`, `category_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `cproduct_img1`, `cproduct_img2`, `cproduct_img3`, `old_price`, `new_price`, `discount`, `product_price`, `product_keywords`, `product_desc`, `product_model`) VALUES
(2, 1, 3, '2020-07-07 12:16:56', ' Logitech Wireless  Mouse', 'blogitecha.jpg', 'blogitechb.jpeg', 'blogitechc.jpg', '', '', '', 0, 0, 0, 2500, 'mouse', 'Black Logitech M510 Wireless Computer Mouse', 'M510 Wireless Computer mouse'),
(4, 1, 3, '2020-07-07 08:11:40', 'VicTsing Mouse Pad', 'vistsingmousepada.jpg', 'victingmousepadb.jpg', 'vistsingmousepadc.jpg', '', '', '', 0, 0, 0, 3000, 'mouse', 'VicTsing Mouse Pad, Ergonomic Mouse Pad with Gel Wrist Rest Support, Gaming Mouse Pad with Lycra Cloth for Computer, Laptop at Home, Office', 'VicTsing Mouse Pad'),
(5, 1, 3, '2020-05-14 13:21:42', 'Red VicTsing Mouse Pad', 'redvtingmousea.jpg', 'redvtsingmousepadb.jpg', 'redvtingmousepadc.jpg', '', '', '', 0, 0, 0, 3000, 'mouse', 'VicTsing Mouse Pad, Ergonomic Mouse Pad with Gel Wrist Rest Support, Gaming Mouse Pad with Lycra Cloth for Computer, Laptop at Home, Office...', 'VicTsing Mouse Pad'),
(6, 1, 3, '2020-07-07 08:36:26', 'Microsoft Sculpt Mouse ', 'microsoftmousea.jpg', 'microsoftmouseb.jpg', 'microsoftmousec.jpg', '', '', '', 0, 0, 0, 4000, 'mouse', 'Advanced ergonomic design with thumb scoop encourages natural hand and wrist postures.\r\nMicrosofTrack Technology in the mouse gives you precise control on virtually any surface.\r\nWindows button for one-touch access to the Start Menu.\r\n', 'L6V-00001'),
(7, 1, 3, '2020-07-07 12:17:42', 'Belkin Wired  Mouse ', 'belkina.jpg', 'belkina.jpg', 'belkina.jpg', '', '', '', 0, 0, 0, 3000, 'mouse', 'Belkin 3-Button Wired USB Optical Mouse with 5-Foot Cord', 'Belkin 3-Button Wired USB Optical Mouse '),
(8, 1, 3, '2020-05-14 13:29:00', 'Logitech Wireless Mouse', 'mdtealb.jpg', 'mdtealc.jpg', 'mdtealb.jpg', '', '', '', 0, 0, 0, 3000, 'mouse', 'Logitech MX Master 2S Wireless Mouse – Use on Any Surface, Hyper-fast Scrolling, Ergonomic Shape, Rechargeable, Control up to 3 Apple Mac and Windows\r\nColor - Teal', 'Logitech MX Master 2S Wireless Mouse'),
(9, 1, 3, '2020-05-14 13:31:13', 'Logitech Wireless Mouse', 'blogitechMXa.jpg', 'blogitechMXb.jpg', 'blogitechMXc.jpg', '', '', '', 0, 0, 0, 3000, 'mouse', 'Logitech MX Master 2S Wireless Mouse – Use on Any Surface, Hyper-fast Scrolling, Ergonomic Shape, Rechargeable, Control up to 3 Apple Mac and Windows\r\nColor - Black', 'Logitech MX Master 2S Wireless Mouse'),
(10, 1, 3, '2020-07-07 08:10:39', ' Dell Wireless Mouse', 'blackdella.jpg', 'blackdellb.jpg', 'blackdellc.jpg', '', '', '', 0, 0, 0, 2500, 'mouse', 'Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n', 'Dell Wireless Mouse WM126 '),
(11, 1, 3, '2020-05-14 13:37:34', 'Red Dell Wireless Mouse', 'reddella.jpg', 'reddellb.jpg', 'reddellc.jpg', '', '', '', 0, 0, 0, 2500, 'mouse', 'Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n', 'WM126 '),
(12, 1, 3, '2020-07-07 08:09:56', ' Dell Wireless Mouse', 'bluedella.jpg', 'bluedellb.jpg', 'bluedella.jpg', '', '', '', 0, 0, 0, 2500, 'mouse', 'Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n', 'WM126 '),
(13, 1, 3, '2020-07-07 07:55:10', 'Dell Wireless Mouse', 'whitedella.jpg', 'whitedellb.jpg', 'whitedellc.jpg', '', '', '', 0, 0, 0, 2500, 'mouse', 'Reduce cable clutter with the Dell Wireless Mouse WM126, providing the functionality you need in a mouse with none of the wires\r\nTake your work on the go with the reliable wireless connection of the Dell Wireless Mouse WM126; You can also connect up to six compatible devices with a single receiver\r\nWork in comfort thanks to a contoured design that feels great in either hand; The mouse features 3 clickable buttons (left, right, and middle) and includes a scroll wheel for ease of use\r\n', 'WM126 '),
(14, 5, 5, '2020-07-07 11:56:41', 'Snooker pool table', 'poolboarda.jpg', 'poolboardb.jpg', 'poolboardc.jpg', '', '', '', 0, 0, 0, 60000, 'snooker', 'The product is new and packed PROFESSIONAL SIZE The table size are professional 8 feet (Playfield 88 in. L x 44 in. W)', 'Vintage Green 8FT'),
(15, 5, 5, '2020-07-07 08:34:42', 'PlayStation 4 Fortnite ', 'FORTNITEA.jpg', 'fortniteb.jpg', 'FORTNITEA.jpg', '', '', '', 0, 0, 0, 29000, 'Playstation', 'Fortnite Neo Versa PS4 bundle includes a jet black 1TB PlayStation 4 system, a matching DUALSHOCK4 wireless controller, and a code for exclusive Fortnite content', ' 1TB Fortnite Bundle'),
(16, 3, 4, '2020-07-07 08:01:56', 'Epson Projector', 'epsona.jpg', 'epsonb.jpg', 'epsonc.jpg', '', '', '', 0, 0, 0, 120000, 'Projector', 'More accurate, vivid color, even in well lit rooms 3,200 lumens of equal color and white brightness \r\n•	Works with the latest laptops and media players? Supports HDMI, the standard in connectivity, for digital video and audio in one cable.', 'VS250 SVGA'),
(17, 4, 2, '2020-07-07 08:14:23', 'CoastWay Refrigerator', 'costwaya.jpg', 'coastwayb.jpg', 'coatwayc.jpg', '', '', '', 0, 0, 0, 325000, 'Refrigerator', 'Classic Fridge with Reversible Door, Adjustable Removable Glass Shelves, Mechanical Control, Recessed Handle for Dorm, Office and Apartment', '4\'ft '),
(18, 4, 2, '2020-07-07 08:16:42', 'Samsung LED TV', 'samsunga.jpg', 'samsungb.jpg', 'samsungc.jpg', '', '', '', 0, 0, 0, 89000, 'TV', 'Full HD 1080p to enjoy a viewing experience that is 2x the clarity of standard HD TVs and access your streaming services all in one place using the Samsung remote control\r\n', '32\" 1080p Smart LED TV'),
(19, 4, 2, '2020-07-07 08:18:49', 'Comfee Microwave Oven', 'comfeea.jpg', 'comfeeb.jpg', 'comfeec.jpg', '', '', '', 0, 0, 0, 39000, 'Microwave', '0.7 cubic-foot capacity, 700 watts and 11 power levels\r\nMute Function, settings, clock, kitchen timer, Child safety lock, Easy auto-cook functions: Popcorn, Potato, Pizza, Frozen Veggie, Beverage, Reheat\r\n', '0.7Cu.Ft/700W, Pearl White'),
(20, 3, 4, '2020-07-07 08:22:22', 'ViewSonic  Smart Projector', 'viewsonica.jpg', 'viewsonicb.jpg', 'viewsonicc.jpg', '', '', '', 0, 0, 0, 115000, 'Projector', 'Portable Smart 1080p Wi-Fi Projector with  Bluetooth Speakers USB Type C 125% Rec. 709 HDR and Screen Mirroring', ''),
(21, 3, 4, '2020-07-07 08:24:37', 'Electronic White Board', 'whiteboarda.jpg', 'whiteboardb.jpg', 'whiteboardc.jpg', '', '', '', 0, 0, 0, 550000, 'Projector', 'Supports two simultaneous touches, making it easy for students to work together at the same time.\r\nIntuitive design and dual-touch controls make it easy for educators to turn lessons into learning experiences.\r\n', 'Smart Board SBM680 with the Smart UF70 Projector'),
(22, 2, 2, '2020-07-07 08:28:45', 'Apple iMac Desktop', 'macdesktopa.jpg', 'macdesktopb.jpg', 'macdesktopc.jpg', '', '', '', 0, 0, 0, 650000, 'Desktop', 'Intel Core i5 3.1GHz, 8GB RAM, 1TB SATA HDD', 'Massive Storage: Packed with up to 2 TB of hard drive space, you can store all of the apps, games, photos, music and movies that you need. SSD up to 256 GB also available for increased speed!\r\nLightning Fast: Powered by Intel\'s top of the line Core i5 processor and loaded with up to 16 GB of DDR3 RAM, this machine will outperform the competition in any situation\r\n'),
(23, 4, 2, '2020-07-07 08:31:21', 'LG Smart TV', 'LGTVA.jpg', 'LGTVB.jpg', 'LGTVC.jpg', '', '', '', 0, 0, 0, 56000, 'TV', '1080p Full HD resolution for a lifelike picture\r\nDirect lit LED produces great picture quality\r\n', '22-Inch 1080p IPS LED TV '),
(24, 5, 5, '2020-07-07 08:33:51', 'Billiard Pool Balls Set ', 'poolballa.jpg', 'poolballb.jpg', 'poolballc.jpg', '', '', '', 0, 0, 0, 35000, 'snooker', '15 Red Balls, One Blue Ball, One Yellow Ball, One Brown Ball, One Green Ball, One Pink Ball, One Black Ball and One White Ball.\r\nA Complete Set, without Number on the Balls, 22 Balls Set made with high quality resin\r\n', '2-1/16\" Snooker Balls'),
(25, 3, 3, '2020-07-07 12:14:20', 'Widescreen Projector', 'projectorscreena.jpg', 'projectorscreenb.jpg', 'projectorscreenc.jpg', '', '', '', 0, 0, 0, 85000, 'Projector', ' HD Indoor Pull Down Manual Widescreen 1:1 Gain Projector Screen for Home Theater, Office, Entertainment, White', ''),
(26, 4, 2, '2020-07-07 11:44:48', 'Midea  Double Door Mini Fridge', 'mideaa.jpg', 'mideab.jpg', 'mideac.jpg', '', '', '', 0, 0, 0, 650000, 'Refrigerator', 'Black Double Door Mini Fridge with Freezer for Bedroom Office or Dorm with Adjustable Remove Glass Shelves Compact Refrigerator, 3.1 cu ft', 'Black double door'),
(27, 4, 4, '2020-07-07 11:50:37', 'Lasco Adjustable Fan', 'laskoa.jpg', 'laskob.jpg', 'laskoc.jpg', '', '', '', 0, 0, 0, 8000, 'Fan', ' Elegance & Performance Adjustable Pedestal Fan, Black - Features Oscillating Movement Tilt-back Fan Head', '18 Inches'),
(28, 2, 3, '2020-07-09 06:42:09', 'HP Elite Desktop', 'hpdesktopa.jpg', 'hpdesktopb.jpg', 'hpdesktopc.jpg', '', '', '', 0, 0, 0, 256000, 'Desktop', '\r\nPacked with up to 2 TB of hard drive space, you can store all of the apps, games, photos, music and movies that you need. SSD up to 256 GB also available for increased speed!\r\nLightning Fast: Powered by Intel\'s top of the line Core i5 processor and loaded with up to 16 GB of DDR3 RAM, this machine will outperform the competition in any situation.', 'Intel Core i5 3.1GHz, 8GB RAM, 1TB SATA HDD'),
(29, 2, 3, '2020-07-07 11:59:40', 'Dell Inspiron Laptop', 'DELLA.jpg', 'dellb.jpg', 'dellc.jpg', '', '', '', 0, 0, 0, 155000, 'Laptop', '14 inches , 8GB RAM, 256GB SSD, HDMI, WiFi, Intel UHD Graphics, Bluetooth, Windows 10', 'Intel Core i5 '),
(30, 4, 2, '2020-07-07 12:13:34', 'Cinema Home Theater', 'jbla.jpg', 'jblb.jpg', 'jblc.jpg', '', '', '', 0, 0, 0, 28000, 'Home Theater', '•	Voice matched, 2-way satellite speakers\r\n•	60-watt, 8\" powered subwoofer\r\n•	Easy to install\r\n•	Included brackets for wall mounting\r\n', 'Cinema 610'),
(31, 2, 3, '2020-07-07 12:12:16', 'Apple MacBook Pro', 'maca.jpg', 'macb.jpg', 'macc.jpg', '', '', '', 0, 0, 0, 590000, 'Laptop', '•	Ninth-generation 6-Core Intel Core i7 Processor\r\n•	Stunning 16-inch Retina Display with True Tone technology\r\n•	Touch Bar and Touch ID\r\n•	Up to 11 hours of battery life', '16-inch, 16GB RAM, 512GB Storage'),
(32, 1, 4, '2020-07-09 06:31:30', 'TOZO Bluetooth Earbuds', 'tozoa.jpg', 'tozob.jpg', 'tozoc.jpg', '', '', '', 0, 0, 0, 25000, 'Bluetooth', ' 5.0 Wireless Earbuds with Wireless Charging', 'TOZO T10 '),
(33, 2, 3, '2020-07-09 06:34:01', ' Acer Spin 3 Laptop', 'acer1.jpg', 'aceb.jpg', 'acec.jpg', '', '', '', 0, 0, 0, 360000, 'Laptop', '•	8th Generation Intel Core i7 8565U Processor (Up to 4.6GHz)\r\n•	14 inches Full HD (1920 x 1080) Widescreen LED backlit IPS Multi Touch Convertible Display\r\n•	16GB DDR4 Memory & 512GB \r\n', 'Intel Core i7, 16GB DDR4, 512GB  SSD'),
(34, 1, 3, '2020-07-09 06:37:25', 'Logitech Conference Cam ', 'conferencecama.jpg', 'conferencecamb.jpg', 'conferencecamc.jpg', '', '', '', 0, 0, 0, 85000, 'Camera', 'Video Conference Webcam, HD 1080p Camera with Built-In Speakerphone', 'Cam BCC950 '),
(35, 1, 1, '2020-07-09 06:40:55', 'Yunsong Charging Cord  ', 'yunsonga.jpg', 'yunsongb.jpg', 'yunsongc.jpg', '', '', '', 0, 0, 0, 3000, 'Charger', '3Pack 6FT Nylon Braided Lightning Cable Charging Cord USB Cable Compatible with iPhone 11 Pro Max XS XR X 8 7 6S 6 Plus SE 5S 5C 5 iPad', ''),
(36, 3, 3, '2021-01-11 22:41:53', 'Apple iMac Desktop', 'laskob.jpg', 'laskoc.jpg', 'laskob.jpg', '', '', '', 0, 0, 0, 85000, 'snooker', 'rty hde fcbhyy iookj', 'WM126 '),
(37, 3, 4, '2021-01-10 20:15:25', 'Projector', 'comfeea.jpg', 'comfeec.jpg', 'comfeeb.jpg', '', '', '', 0, 0, 0, 37500, 'microwave', 'Comfee microwave', 'COMFEE2007'),
(38, 5, 5, '2021-01-10 21:59:33', 'PES 4', 'callofdutya.jpg', 'callofdutyb.jpg', 'callofdutya.jpg', '', '', '', 18000, 10500, 50, 18000, 'Playstation', 'ffbbb', ''),
(39, 3, 4, '2021-01-11 20:15:14', 'ViewSonic Projector', 'viewsonica.jpg', 'viewsonicb.jpg', 'viewsonicc.jpg', 'viewsonica - Copy.jpg', 'viewsonicb - Copy.jpg', 'viewsonicc - Copy.jpg', 0, 0, 0, 256000, 'Projector', 'Viewsonic projector, durable and reliable suitable for presentations in schools and organizations\r\nViewsonic projector, durable and reliable suitable for presentations in schools and organizations\r\nViewsonic projector, durable and reliable suitable for presentations in schools and organizations', 'WM126 '),
(40, 1, 1, '2021-01-11 20:42:41', 'Toza Mini Earbuds', 'tozoa.jpg', 'tozob.jpg', 'tozoc.jpg', 'tozoa - Copy.jpg', 'tozob - Copy.jpg', 'tozoc - Copy.jpg', 0, 0, 0, 4500, 'earbuds', 'Brand new Toza mini earbuds, brand new Toza mini earbuds, brand new Toza mini earbuds,brand new Toza mini earbuds ,brand new Toza mini earbuds', 'WM126 '),
(41, 1, 3, '2021-01-11 20:51:16', 'Logitech Wireless Mouse', 'rlogitecha.jpg', 'rlogitechb.jpg', 'rlogitechc.jpg', 'rlogitecha - Copy.jpg', 'rlogitechb - Copy.jpg', 'rlogitechc - Copy.jpg', 0, 0, 0, 5000, 'mouse', 'Red Logitech wireless mouse, fast and accurate, Red Logitech wireless mouse, fast and accurate, Red Logitech wireless mouse, fast and accurate, Red Logitech wireless mouse, fast and accurate.', 'M510 Wireless Computer mouse');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `p_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_category_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  PRIMARY KEY (`p_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`p_category_id`, `p_category_title`, `p_cat_desc`) VALUES
(1, 'Computer Accessories', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(2, 'Laptops & Desktops', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(3, 'Projectors', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(4, 'Appliances', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector'),
(5, 'Play Station', 'A giant, touch-sensitive version of the computer screen, offering a more interactive experience than using a whiteboard or data projector');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide 1', 'slide1.jpg'),
(2, 'Slide 2', 'slide2.jpg'),
(3, 'Slide 3', 'slide3.jpg'),
(4, 'Slide 4', 'slide.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
