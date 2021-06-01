-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 08:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `CustomerID` int(20) NOT NULL,
  `CustomerFirstName` varchar(255) NOT NULL,
  `CustomerLastName` varchar(255) NOT NULL,
  `CustomerAddressStreet` varchar(255) NOT NULL,
  `CustomerAddressCity` varchar(255) NOT NULL,
  `CustomerAddressCountry` varchar(255) NOT NULL,
  `CustomerAddressPostCode` varchar(255) NOT NULL,
  `CustomerContactPhoneNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomers`
--

INSERT INTO `tblcustomers` (`CustomerID`, `CustomerFirstName`, `CustomerLastName`, `CustomerAddressStreet`, `CustomerAddressCity`, `CustomerAddressCountry`, `CustomerAddressPostCode`, `CustomerContactPhoneNo`) VALUES
(27, 'Bel', 'Sy', 'Blk 124', 'Bulacan', 'Philippines', '2123', 952502525),
(28, 'Hanna', 'Montana', 'Blk. 606', 'Makati', 'Philippines', '2911', 957284749),
(29, 'Ana', 'Cruz', 'Blk. 78', 'Ilocos City', 'Philippines', '1021', 988483921);

-- --------------------------------------------------------

--
-- Table structure for table `tbllink_orderproduct`
--

CREATE TABLE `tbllink_orderproduct` (
  `OrderId` int(20) NOT NULL,
  `ProductId` int(20) NOT NULL,
  `ProductQuantity` int(20) NOT NULL,
  `TotalProductSaleCost` int(20) NOT NULL,
  `ArrangedDeliveryDate` date NOT NULL,
  `ArrangedDeliveryTime` time NOT NULL,
  `ProductDelivered` varchar(255) NOT NULL,
  `ActualDeliveryDate` date NOT NULL,
  `ActualDeliveryTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllink_orderproduct`
--

INSERT INTO `tbllink_orderproduct` (`OrderId`, `ProductId`, `ProductQuantity`, `TotalProductSaleCost`, `ArrangedDeliveryDate`, `ArrangedDeliveryTime`, `ProductDelivered`, `ActualDeliveryDate`, `ActualDeliveryTime`) VALUES
(36, 38, 2, 4, '2021-06-27', '08:47:00', 'NO', '0000-00-00', '00:00:00'),
(37, 38, 20, 200, '2021-06-27', '23:15:00', 'NO', '0000-00-00', '00:00:00'),
(39, 38, 2, 200, '2021-06-27', '16:23:00', 'NO', '0000-00-00', '00:00:00'),
(40, 38, 20, 200, '2021-06-01', '12:22:00', 'NO', '0000-00-00', '00:00:00'),
(43, 39, 52, 0, '2021-06-04', '16:15:00', '', '0000-00-00', '00:00:00'),
(44, 38, 52, 0, '2021-06-05', '16:39:00', '', '0000-00-00', '00:00:00'),
(48, 39, 52, 0, '2021-06-08', '17:00:00', '', '2021-06-01', '08:14:46'),
(49, 38, 52, 0, '2021-06-05', '15:20:00', '', '2021-06-01', '08:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `OrderID` int(20) NOT NULL,
  `CustomerId` int(20) NOT NULL,
  `DateOrderPlaced` date NOT NULL,
  `TimeOrderPlaced` time NOT NULL,
  `OrderTotalProductNo` int(20) NOT NULL,
  `OrderCompleted` varchar(255) NOT NULL,
  `DateOrderCompleted` date NOT NULL,
  `AnyAdditionalInfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `ProductID` int(20) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `InStock` int(20) NOT NULL,
  `UnitsInStock` int(20) NOT NULL,
  `ProductUnitPurchasePrice` int(20) NOT NULL,
  `ProductUnitSalePrice` int(20) NOT NULL,
  `SupplierId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ProductID`, `ProductName`, `InStock`, `UnitsInStock`, `ProductUnitPurchasePrice`, `ProductUnitSalePrice`, `SupplierId`) VALUES
(38, 'Earphones', 12, 10, 500, 1000, 13),
(39, 'Speaker', 10, 20, 200, 500, 13),
(40, 'Oppo A83', 50, 100, 5000, 7000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tblsuppliers`
--

CREATE TABLE `tblsuppliers` (
  `SupplierID` int(11) NOT NULL,
  `SupplierName` varchar(255) NOT NULL,
  `SupplierAddressStreet` varchar(255) NOT NULL,
  `SupplierAddressCity` varchar(255) NOT NULL,
  `SupplierAddressCountry` varchar(255) NOT NULL,
  `SupplierAddressPostCode` varchar(255) NOT NULL,
  `SupplierPhoneNo` int(20) NOT NULL,
  `SupplierFaxNo` int(30) NOT NULL,
  `PaymentTerms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsuppliers`
--

INSERT INTO `tblsuppliers` (`SupplierID`, `SupplierName`, `SupplierAddressStreet`, `SupplierAddressCity`, `SupplierAddressCountry`, `SupplierAddressPostCode`, `SupplierPhoneNo`, `SupplierFaxNo`, `PaymentTerms`) VALUES
(13, 'Samsung', 'Purok 3 ', 'Binan', 'Philippines', '4024', 911164631, 922231631, 'to delivery'),
(14, 'OPPO', 'Blk.19', 'Manila', 'Philippines', '2024', 991840747, 991840747, 'to order');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tblsuppliers`
--
ALTER TABLE `tblsuppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `CustomerID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `OrderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `ProductID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblsuppliers`
--
ALTER TABLE `tblsuppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
