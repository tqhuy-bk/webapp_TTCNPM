-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2020 lúc 10:40 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

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

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `categoryID`, `vendorID`, `description`, `price`, `image`, `type`) VALUES
(3, 'combo1', 21, 21, 'hfuiahfuihafjn aihfihafi', '100000', 'hinh_3.png', 'combo'),
(4, 'combo2', 21, 21, 'fssga a agag', '20000', 'hinh_4.png', 'combo'),
(5, 'combo2', 21, 21, '5156fsfs', '100000', 'hinh_2.jpg', 'combo'),
(6, 'combo1', 21, 0, 'shshshd', '100000', 'hinh_1.jpg', 'combo'),
(7, 'tran so', 20, 0, 'gwgs', '100000', 'hinh_6.jpg', 'combo'),
(8, 'tran so', 21, 21, 'gsgsgs', '100000', 'hinh_7.1.jpg', 'combo'),
(9, 'tran so', 20, 0, 'gsgsg', '20000', 'hinh_6.jpg', 'combo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
