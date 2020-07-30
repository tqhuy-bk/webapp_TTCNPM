-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2020 lúc 04:06 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL,
  `vendorname` varchar(50) NOT NULL,
  `vendorid` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`, `vendorname`, `vendorid`, `role`) VALUES
(1, 'huy', 'huy@gmail.com', 'huyadmin', 'e10adc3949ba59abbe56e057f20f883e', 1, '', 0, 'Nhân viên IT'),
(2, 'it', 'it@gmail.com', 'it', '202cb962ac59075b964b07152d234b70', 1, '', 0, 'Nhân viên IT'),
(3, 'boss', 'boss@gmail.com', 'boss', '202cb962ac59075b964b07152d234b70', 2, '', 0, 'Chủ hệ thống'),
(4, 'vendor1', 'v1@gmail.com', 'vendor1', '202cb962ac59075b964b07152d234b70', 3, 'kfc', 1, 'Chủ quầy 1'),
(5, 'vendor2', 'v2@gmail.com', 'vendor2', '202cb962ac59075b964b07152d234b70', 3, 'lotteria', 2, 'Chủ quầy 2'),
(6, 'chef1', 'c1@gmail.com', 'chef1', '202cb962ac59075b964b07152d234b70', 4, 'kfc', 1, 'Bếp quầy 1'),
(7, 'chef2', 'c2@gmail.com', 'chef2', '202cb962ac59075b964b07152d234b70', 4, 'lotteria', 2, 'Bếp quầy 2'),
(8, 'seller', 'a@gmail.com', 'seller', '202cb962ac59075b964b07152d234b70', 5, '', 0, 'Nhân viên bán hàng'),
(9, 'chef3', 'c2@gmail.com', 'chef3', 'e10adc3949ba59abbe56e057f20f883e', 4, 'lotteria', 2, 'Bếp quầy 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bankaccount`
--

CREATE TABLE `tbl_bankaccount` (
  `bankaccountID` int(11) NOT NULL,
  `cardcode` varchar(255) NOT NULL,
  `cardPass` varchar(255) NOT NULL,
  `cardBalance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_bankaccount`
--

INSERT INTO `tbl_bankaccount` (`bankaccountID`, `cardcode`, `cardPass`, `cardBalance`) VALUES
(2, '123456', '123456', '99999999909992000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categori`
--

CREATE TABLE `tbl_categori` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_categori`
--

INSERT INTO `tbl_categori` (`catID`, `catName`) VALUES
(22, 'water');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerPhone` varchar(50) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` varchar(255) NOT NULL,
  `paystatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `orderlistID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `paystatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `categoryID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendorID` int(11) NOT NULL,
  `vendorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendorID`, `vendorName`) VALUES
(1, 'kfc'),
(2, 'lotteria'),
(4, 'kichi-kichi'),
(5, 'StarBucks'),
(6, 'Pizza Hut'),
(7, 'Domino\'s Pizza'),
(8, 'Baskin Robbins');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_warehouseproduct`
--

CREATE TABLE `tbl_warehouseproduct` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `amount` int(11) NOT NULL,
  `vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wareorder`
--

CREATE TABLE `tbl_wareorder` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `sender` text NOT NULL,
  `status` text NOT NULL,
  `vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `tbl_bankaccount`
--
ALTER TABLE `tbl_bankaccount`
  ADD PRIMARY KEY (`bankaccountID`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Chỉ mục cho bảng `tbl_categori`
--
ALTER TABLE `tbl_categori`
  ADD PRIMARY KEY (`catID`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD PRIMARY KEY (`orderlistID`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Chỉ mục cho bảng `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- Chỉ mục cho bảng `tbl_warehouseproduct`
--
ALTER TABLE `tbl_warehouseproduct`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_bankaccount`
--
ALTER TABLE `tbl_bankaccount`
  MODIFY `bankaccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_categori`
--
ALTER TABLE `tbl_categori`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `orderlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_warehouseproduct`
--
ALTER TABLE `tbl_warehouseproduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
