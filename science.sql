-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 01:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `science`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description1` text NOT NULL,
  `description2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description1`, `description2`) VALUES
(2, ' ', '<p>Since its inception in 2008, SAG Pharma International has contributed in the area of healthcare with a view to provide quality at an affordable price. In our quest for healthier and happier lives, we aim at sustenance and maintenance of quality in our products.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>We are driven by high ethical standards in research and development. Under the able stewardship of our directors, we reach out to the humanity by constantly opening newer avenues in the pharmaceutical industry. Our sensitivity to the values of life on this globe has developed as our core strength in developing and providing different pharmaceutical products ranging from Antibiotics to Antioxidants, Analgesics to Anti-inflammatory medicines, Antacids to Antifungal, Steroids and Multivitamins. We have recently launched quality product for control of Diabetes and Hypertension. Maintaining quality by promoting safety and reliability, SAG Pharma has emerged as a preferred brand trusted by doctors and patients.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `insert_datetime`, `update_datetime`) VALUES
(4, 'OUR FACTORY IN COLORADO IS PRODUCING', 'Recreational & Medical Marijuana...', 'images/slide03.jpg', '2021-10-05 22:42:53', '2021-10-09 23:52:48'),
(5, 'OUR FACTORY IN COLORADO IS PRODUCING', 'Recreational & Medical Marijuana...', 'images/progress.jpg', '2021-10-05 22:43:37', '2021-10-10 23:15:19'),
(6, 'OUR FACTORY IN COLORADO IS PRODUCING', 'Recreational & Medical Marijuana...', 'images/slide03.jpg', '2021-10-05 22:43:57', '2021-10-05 22:43:57'),
(13, '', '', 'images/herbal-naturopathic-medicine_75924-11860_(1).jpg', '2021-10-12 17:14:21', '2021-10-12 17:19:17'),
(14, '', '', 'images/sd.jpg', '2021-10-12 17:21:42', '2021-10-12 17:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog_slug` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_slug`, `tag`, `description`, `image`, `insert_datetime`, `update_datetime`) VALUES
(1, 'new product is launched', 'new-product-is-launched', 'product', '<p>From seed to sale, we take pride in our cannabis to ensure a smooth experience with attention to detail and quality. We have established ourselves along various points in the cannabis, industrial hemp, and related services supply chain and related services supply chain.</p>\r\n', 'images/FBVNvokUUAQwsO2.jpg', '2021-10-06 19:01:30', '2021-10-10 22:54:34'),
(3, 'Strict patrolling to be held', 'strict-patrolling-to-be-held', 'Maharashtra', '<p>Maharashtra | Strict patrolling to be held in view of statewide bandh called by Maha Vikas Aghadi on Oct 11, over Lakhimpur Kheri violence. Striking reserves to be deployed at strategic points, with 3 companies of SRPF, 500 Home Guards&amp;700 men from Local Arms units: Mumbai Police</p>\r\n', 'images/mperi2021081608382320210816094345.jpg', '2021-10-05 23:20:26', '2021-10-10 22:52:20'),
(4, 'Delighted to arrive in Bishkek', 'delighted-to-arrive-in-bishkek', 'Pharma', '<h2><br />\r\nDelighted to arrive in Bishkek, Kyrgyzstan at the invitation of FM Ruslan Kazakbaev.</h2>\r\n\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>\r\n', 'images/travelling_759-1.jpg', '2021-10-05 23:31:00', '2021-10-10 22:53:36'),
(6, 'The country\'s leader Aung San Suu Kyi has been detained with other leaders in the coup and one year state of emergency has been declared in Myanmar.', 'the-country-s-leader-aung-san-suu-kyi-has-been-detained-with-other-leaders-in-the-coup-and-one-year-state-of-emergency-has-been-declared-in-myanmar', 'Medicine', '<p>India has expressed its &quot;deep concern&quot; in the aftermath of the coup in Myanmar by the military of the country. The country&#39;s leader Aung San Suu Kyi has been detained in the coup and one year state of emergency has been declared.</p>\r\n', 'images/istockphoto-155439315-612x612.jpg', '2021-09-30 16:40:18', '2021-10-10 22:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cat_slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`, `image`, `seo_title`, `seo_keyword`, `seo_desc`, `insert_datetime`, `update_datetime`) VALUES
(6, 'Multivitamins & Antioxidant', 'multivitamins-antioxidant', '', 'multi', 'vita', 'anti', '2021-09-15 17:24:48', '2021-10-19 16:37:48'),
(9, 'Antiinflamatry', 'antiinflamatry', '', '', '', '', '2021-09-16 16:15:35', '2021-10-10 23:21:58'),
(10, 'Anti acids', 'anti-acids', '', '', '', '', '2021-09-16 16:25:19', '2021-10-10 23:23:20'),
(11, 'Antibiotics', 'antibiotics', '', '', '', '', '2021-09-16 16:25:52', '2021-10-10 23:23:26'),
(12, 'Anti Fungal', 'anti-fungal', '', '', '', '', '2021-09-16 16:26:33', '2021-10-10 23:23:35'),
(15, 'Anti Allergic', 'anti-allergic', NULL, '', '', '', '2021-09-30 15:23:36', '2021-10-10 23:23:47'),
(16, 'Hypertention', 'hypertention', NULL, '', '', '', '2021-10-10 23:24:07', '2021-10-10 23:24:07'),
(17, 'Diabitics', 'diabitics', NULL, '', '', '', '2021-10-10 23:24:16', '2021-10-10 23:24:16'),
(18, 'Steroid', 'steroid', NULL, '', '', '', '2021-10-10 23:24:23', '2021-10-10 23:24:23'),
(19, 'Ayurvedic', 'ayurvedic', NULL, '', '', '', '2021-10-10 23:24:32', '2021-10-10 23:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `uname`, `email`, `phone`, `subject`, `message`, `insert_datetime`, `update_datetime`) VALUES
(1, 'dfsdfsd', 'akashsahu410@gmail.com', '9813890592', 'sfsd', 'ssd', '2021-10-12 16:00:17', '2021-10-12 16:00:17'),
(3, 'sdf', 'akashsahu410@gmail.com', '9813890592', 'ewr``', 'ss', '2021-10-12 16:18:17', '2021-10-12 16:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `image`, `link`, `insert_datetime`, `update_datetime`) VALUES
(3, 'images/pharma-left.jpg', 'https://www.sag-industries.com/en/divisions/sag-pharma', '2021-09-23 23:45:59', '2021-10-07 19:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `pro_slug` varchar(255) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `desction` text NOT NULL,
  `catalogue` varchar(255) NOT NULL,
  `gallery` text NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` varchar(255) NOT NULL,
  `seo_desc` varchar(255) NOT NULL,
  `insertdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `video`, `pro_slug`, `pro_image`, `desction`, `catalogue`, `gallery`, `seo_title`, `seo_keyword`, `seo_desc`, `insertdate`, `modifydate`) VALUES
(2, 10, 'Capramorphone', '8vEFydPxHhc', 'capramorphone', 'uploads/product/recent_post2.jpg', '<table class=\"table table-striped topmargin_30\">\r\n	<tbody>\r\n		<tr>\r\n			<th>Product title:</th>\r\n			<td>Product Name</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Item SKU:</th>\r\n			<td>5552281538</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Brand:</th>\r\n			<td><a href=\"#\">Brand Name</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th>Style:</th>\r\n			<td>SuperStyle</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Size:</th>\r\n			<td>Middle</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color:</th>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Targeted Group:</th>\r\n			<td>All</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'uploads/product/sample.pdf', '8|10', 'SAG', 'b', 'c', '2021-10-11 12:48:47', '2021-10-12 15:19:30'),
(3, 10, 'Morphine', 'kWTUE-A8muM', 'morphine', 'uploads/product/herbal-naturopathic-medicine_75924-11860_(1).jpg', '<p>Swine meatball shankle cow kielbasa burgdoggen shoulder andouille pork loin brisket leberkas.</p>\r\n', '', '12', 'SAG', '', '', '2021-10-12 15:24:52', '2021-10-12 15:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `seo_tags`
--

CREATE TABLE `seo_tags` (
  `id` int(11) NOT NULL,
  `page` text NOT NULL,
  `seo_title` text NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_desc` text NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo_tags`
--

INSERT INTO `seo_tags` (`id`, `page`, `seo_title`, `seo_keyword`, `seo_desc`, `insertdate`) VALUES
(1, 'home', 'a', 'b', 'c', '2021-10-19 13:27:42'),
(2, 'about', 'd', 'e', 'f', '2021-10-19 13:28:12'),
(3, 'contact', '', '', '', '2021-10-19 16:57:25'),
(4, 'search', '', '', '', '2021-10-19 16:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `logo`, `address`, `contact`, `facebook`, `instagram`, `twitter`, `youtube`, `insert_datetime`, `update_datetime`) VALUES
(1, 'SAG Pharma', 'test@sagpharma.com', 'images/logo.png', '# 512 B-VI, No. 2, Railway Rd, behind Police Post, Ambala, Haryana', '092150 09009', 'https://www.facebook.com/sagpharmainternational/', 'https://www.instagram.com/sagpharmainternational/', 'https://www.twitter.com/sagpharmainternational/', 'https://www.youtube.com/sagpharmainternational/', '2021-09-22 23:43:54', '2021-10-06 00:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `sub_name`, `insert_datetime`, `update_datetime`) VALUES
(2, 9, 'test1', '2021-09-21 22:57:30', '2021-09-23 23:05:08'),
(3, 9, '1221', '2021-09-21 23:24:15', '2021-09-23 23:05:33'),
(4, 6, '123', '2021-09-23 23:08:48', '2021-09-23 23:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `image_path`, `image_timestamp`) VALUES
(1, 'uploads/product/slide01.jpg', '2021-10-11 17:28:18'),
(2, 'uploads/product/slide01.jpg', '2021-10-11 17:30:47'),
(3, 'uploads/product/recent_post2.jpg', '2021-10-11 17:32:37'),
(6, 'uploads/product/banner.jpg', '2021-10-11 18:02:11'),
(8, 'uploads/product/herbal-naturopathic-medicine_75924-11860.jpg', '2021-10-12 19:07:04'),
(10, 'uploads/product/recent_post1.jpg', '2021-10-12 19:08:51'),
(11, 'uploads/product/herbal-naturopathic-medicine_75924-11860.jpg', '2021-10-12 20:54:26'),
(12, 'uploads/product/herbal-naturopathic-medicine_75924-11860.jpg', '2021-10-12 20:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `description`, `image`, `insert_datetime`, `update_datetime`) VALUES
(2, 'Carlos Lawson', 'FOUNDER', 'Short loin prosciutto jerky, picanha corned beef pork loin jowl sausage.', 'images/000055.jpg', '2021-09-23 23:30:08', '2021-10-13 00:32:36'),
(3, 'Carlos Lawson', 'MANAGER', 'Short loin prosciutto jerky, picanha corned beef pork loin jowl sausage.', 'images/04.jpg', '2021-10-06 18:26:40', '2021-10-06 18:26:40'),
(4, 'Kiara', 'STAFF', 'Short loin prosciutto jerky, picanha corned beef pork loin jowl sausage.', 'images/07.jpg', '2021-10-06 18:27:21', '2021-10-06 18:27:21'),
(5, 'Raavi', 'STAFF', 'Short loin prosciutto jerky, picanha corned beef pork loin jowl sausage.', 'images/06.jpg', '2021-10-06 18:27:51', '2021-10-06 18:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_tag` varchar(255) NOT NULL,
  `testimonial_desc` varchar(255) NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `insert_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `update_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial_name`, `testimonial_tag`, `testimonial_desc`, `testimonial_image`, `insert_datetime`, `update_datetime`) VALUES
(3, 'Philip Morton', 'Client', '«Bacon short loin capicola, turkey burgdoggen beef meatloaf pig sausage leberkas landjaeger.» ', 'images/02.jpg', '2021-10-05 23:13:08', '2021-10-05 23:13:40'),
(4, 'Philip Morton', 'Client', '«Bacon short loin capicola, turkey burgdoggen beef meatloaf pig sausage leberkas landjaeger.» ', 'images/01.jpg', '2021-10-05 23:14:06', '2021-10-05 23:14:06'),
(5, 'Philip Morton', 'Client', '«Bacon short loin capicola, turkey burgdoggen beef meatloaf pig sausage leberkas landjaeger.» ', 'images/04.jpg', '2021-10-05 23:14:24', '2021-10-05 23:14:24'),
(6, 'Philip Morton', 'Client', '«Bacon short loin capicola, turkey burgdoggen beef meatloaf pig sausage leberkas landjaeger.» ', 'images/14.jpg', '2021-10-05 23:18:45', '2021-10-05 23:18:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_tags`
--
ALTER TABLE `seo_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seo_tags`
--
ALTER TABLE `seo_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
