-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 25, 2020 lúc 03:35 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
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
-- Đang đổ dữ liệu cho bảng `tbl_wareorder`
--

INSERT INTO `tbl_wareorder` (`productID`, `productName`, `description`, `amount`, `sender`, `status`, `vendor`) VALUES
(3, 'Mặt hàng A', 'wakeupbbwirowirowiro', '2000', 'Vendor 1', 'chờ xử lý', 1),
(4, 'Mặt hàng B', 'swanswanswan', '2010', 'Vendor 2', 'chờ xử lý', 2),
(5, 'Mặt hàng C', 'paradiseinfrontofmyeyes', '1992', 'Vendor 10', 'đã xử lý', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
