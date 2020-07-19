-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2020 lúc 12:28 PM
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
-- Cấu trúc bảng cho bảng `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `orderlistID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`orderlistID`, `customerID`, `date_order`, `price`, `description`, `state`) VALUES
(283, 5, '2020-07-16 02:59:22', '55000', 'Blueberry juice', 'processing'),
(284, 5, '2020-07-19 04:46:03', '120000', 'combo burger 2', 'processing'),
(285, 5, '2020-07-19 04:46:04', '60000', 'Bánh mì chả', 'processing'),
(286, 5, '2020-07-19 04:48:25', '65000', 'Fried chicken with sauce', 'processing'),
(287, 5, '2020-07-19 09:13:27', '50000', 'Burger bò', 'processing'),
(288, 5, '2020-07-19 09:25:10', '50000', 'Mì Ý sốt cà chua', 'processing');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD PRIMARY KEY (`orderlistID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `orderlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
