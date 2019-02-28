-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 07:10 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcdonald`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountId` int(11) NOT NULL,
  `AccountName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AccountPassword` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `StoreId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `Name`, `Password`, `Type`, `StoreId`) VALUES
(0, 'hung', 'c234379bc8f97fc40942f1d637d77214', 0, 1),
(0, 'hunghp', 'c234379bc8f97fc40942f1d637d77214', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ArticleId` int(11) NOT NULL,
  `Title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ImageLink` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ArticleId`, `Title`, `Content`, `ImageLink`) VALUES
(0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `CouponId` int(11) NOT NULL,
  `CouponValue` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` int(11) NOT NULL,
  `CustomerName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `CustomerName`, `PhoneNumber`, `Email`, `Address`) VALUES
(1, 'HungHP', '0328421555', 'hoangphihung9a1@gmail.com', 'Cat Linh, Dong Da, Ha Noi'),
(2, 'Mai', '0324455667', 'hung@gmail.com', 'Ha Long, Quang Ninh');

-- --------------------------------------------------------

--
-- Table structure for table `favoritefood`
--

CREATE TABLE `favoritefood` (
  `CustomerId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuId` int(11) NOT NULL,
  `MenuName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuId`, `MenuName`) VALUES
(1, 'Gà rán'),
(3, 'Bánh Muffin'),
(4, 'Phần ăn EVM'),
(5, 'Thức uống tráng miệng'),
(7, 'Thức uống'),
(8, 'Rượu tây'),
(9, 'Cơm rang');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(11) NOT NULL,
  `ProducId` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderId`, `ProducId`, `Quantity`) VALUES
(1, 2, 5),
(1, 5, 3),
(2, 5, 6),
(3, 6, 3),
(7, 2, 15),
(8, 8, 3),
(9, 2, 1),
(9, 5, 3),
(10, 5, 5),
(10, 6, 4),
(11, 2, 4),
(13, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `StoreId` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `ShippingAddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Coupon` int(11) DEFAULT NULL,
  `TotalMoney` int(11) DEFAULT NULL,
  `PayMethod` bit(1) NOT NULL,
  `StatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `CustomerId`, `StoreId`, `OrderDate`, `ShippingAddress`, `Coupon`, `TotalMoney`, `PayMethod`, `StatusId`) VALUES
(1, 1, 0, '2019-01-22 20:17:02', 'No 55, Giai Phong', NULL, 150000, b'1', 0),
(2, 2, 0, '2019-01-22 20:20:05', 'Kim Ma', NULL, 250000, b'1', 0),
(3, 2, 1, '2019-01-22 20:20:39', 'Nguyen Trai', NULL, 350000, b'1', 0),
(4, 0, 1, '2019-01-23 13:47:59', 'Lang, HaNOI', NULL, 350000, b'1', 1),
(5, 1, 1, '2019-01-23 13:48:40', 'Lang, HaNOI', NULL, 50000, b'1', 1),
(6, 1, 1, '2019-01-25 15:42:25', 'Cat Linh, HN', 0, 500000, b'1', 1),
(7, 2, 1, '2019-01-25 15:45:22', 'Nguyen Chi Thanh, HN', 0, 100000, b'1', 1),
(8, 1, 1, '2019-02-24 21:04:53', 'Giang vo', 0, 150000, b'1', 1),
(9, 328421555, 1, '2019-02-27 03:45:26', 'Cat Linh', NULL, 560000, b'1', 0),
(10, 328421555, 1, '2019-02-27 06:34:41', 'Lang', NULL, 750680, b'1', 0),
(11, 328686611, 1, '2019-02-27 06:45:29', 'DH ngoai thuong', NULL, 440000, b'1', 0),
(12, 328686611, 1, '2019-02-27 06:46:13', 'DH ngoai thuong', NULL, 0, b'1', 0),
(13, 328686611, 1, '2019-02-27 06:48:26', 'Cat Linh', NULL, 450000, b'1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `MenuId` int(11) DEFAULT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ProductDescribe` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageLink` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `MenuId`, `ProductName`, `ProductDescribe`, `ImageLink`, `Price`) VALUES
(2, 1, '20 miếng gà McNuggets', '', '20pcs_chicken_mcwings.png', 110000),
(5, 1, 'Phần ăn Cơm thịt nướng', '', 'MEAL_porkrice.png', 150000),
(6, 1, '6 miếng cánh gà', '', '6-wings.png', 170),
(8, 1, 'Phần ăn Cơm gà nướng', '', 'MEAL_chickrice.png', 50000),
(9, 9, 'Cơm rang dưa bò', '', '3-ga-ran.png', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `StoreId` int(11) NOT NULL,
  `StoreName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountId`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ArticleId`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`CouponId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `favoritefood`
--
ALTER TABLE `favoritefood`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderId`,`ProducId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`StoreId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `CouponId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
