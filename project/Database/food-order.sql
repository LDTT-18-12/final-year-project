-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 03:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `ful_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `ful_name`, `username`, `password`) VALUES
(1, 'Rimsha', 'rimsha', '01cfcd4f6b8770febfb40cb906715822'),
(2, 'Rimsha parveen', 'Rimsha Malik', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(42, 'Bargar', 'gallery-6.jpg', 'Yes', 'Yes'),
(43, 'Party', 'gallery-1.jpg', 'Yes', 'Yes'),
(44, 'Teaste', 'gallery-6.jpg', 'Yes', 'Yes'),
(45, 'Tea time', 'gallery-7.jpg', 'Yes', 'Yes'),
(46, 'Pizza', 'gallery-5.jpg', 'Yes', 'Yes'),
(47, 'Burgar', 'gallery-7.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Pizza', '800.00', 2, '1600.00', '2022-09-25 00:00:00', '-1', 'Shakeel', '0300-1234567', 'abc@gmail.com', 'Lodhran'),
(2, 'burgar', '120.00', 4, '480.00', '2022-09-25 00:00:00', '-1', 'Rimsha', '0300-1234567', 'rimshaparveen381@gmail.com', 'Lodhran'),
(3, 'Burgar', '1800.00', 2, '3600.00', '2022-09-26 00:00:00', '1', '', '0300-1234567', '', ''),
(4, 'Burgar', '1800.00', 0, '1800.00', '0000-00-00 00:00:00', '1', '', '', '', ''),
(5, 'Burgar', '1800.00', 4, '7200.00', '0000-00-00 00:00:00', '-1', 'Rimsha', '0300-1234567', '', ''),
(6, 'foodsss', '126.00', 2, '252.00', '2022-09-28 00:00:00', '-1', 'Rimsha', '0300-1234567', '', ''),
(7, 'Burgar', '1800.00', 2, '3600.00', '2022-10-06 00:00:00', '0', 'Rimsha', '0300-1234567', '', 'Lodhran'),
(8, 'Burgar', '1800.00', 4, '7200.00', '2022-10-06 00:00:00', '0', 'Rimsha', '0300-1234567', '', 'Lodhran'),
(9, 'Pizza', '800.00', 5000, '11200.00', '0000-00-00 00:00:00', '0', 'Rimsha', '0300-1234567', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_popular`
--

CREATE TABLE `tbl_popular` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_popular`
--

INSERT INTO `tbl_popular` (`id`, `title`, `description`, `price`, `image_name`, `gallery_id`, `featured`, `active`) VALUES
(16, 'Burgar', 'Cicken Burger', '1800.00', 'specials-2.png', 21, 'Yes', 'Yes'),
(17, 'food', ' tesas', '432.00', 'specials-1.png', 20, 'No', 'Yes'),
(18, 'foodsss', ' yamiiiiiiiii', '126.00', 'specials-2.png', 18, 'Yes', 'Yes'),
(19, 'Pizza', 'on the time', '800.00', 'specials-4.png', 42, 'Yes', 'Yes'),
(20, 'Salid', ' Keep', '50.00', 'specials-3.png', 42, 'Yes', 'Yes'),
(21, 'Chicken pizza', ' tasty food', '1800.00', 'popular.jpg', 43, 'Yes', 'Yes'),
(22, 'Pizza', ' Tika Pizza', '900.00', 'popular.jpg', 46, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_popular`
--
ALTER TABLE `tbl_popular`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_popular`
--
ALTER TABLE `tbl_popular`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
