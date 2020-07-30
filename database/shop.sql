-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 11:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
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
-- Dumping data for table `tbl_admin`
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
-- Table structure for table `tbl_bankaccount`
--

CREATE TABLE `tbl_bankaccount` (
  `bankaccountID` int(11) NOT NULL,
  `cardcode` varchar(255) NOT NULL,
  `cardPass` varchar(255) NOT NULL,
  `cardBalance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bankaccount`
--

INSERT INTO `tbl_bankaccount` (`bankaccountID`, `cardcode`, `cardPass`, `cardBalance`) VALUES
(2, '123456', '123456', '99999999904985000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
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
-- Table structure for table `tbl_categori`
--

CREATE TABLE `tbl_categori` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categori`
--

INSERT INTO `tbl_categori` (`catID`, `catName`) VALUES
(22, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `customerPhone` varchar(50) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerID`, `customerName`, `customerPhone`, `customerEmail`, `password`, `balance`) VALUES
(15, 'ad', 'ad', 'ad', '523af537946b79c4f8369ed39ba78605', '1906000'),
(16, 'guest123456', '0346199862', 'guest12345@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2901000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
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

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `productID`, `customerID`, `quantity`, `price`, `image`, `productName`, `date_order`, `state`, `paystatus`) VALUES
(25, 12, 15, 1, '100000', 'bánh pancake.jpg', 'Cupcake Socolate', '2020-07-30 03:43:00', 'Đang xử lí', 'Đã thanh toán'),
(26, 12, 16, 3, '300000', 'bánh pancake.jpg', 'Cupcake Socolate', '2020-07-30 05:22:07', 'Đang xử lí', 'Chưa thanh toán'),
(27, 12, 16, 1, '100000', 'bánh pancake.jpg', 'Cupcake Socolate', '2020-07-30 06:52:33', 'Đang xử lí', 'Đã thanh toán'),
(28, 12, 16, 1, '100000', 'bánh pancake.jpg', 'Cupcake Socolate', '2020-07-30 06:54:28', 'Đang xử lí', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
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

--
-- Dumping data for table `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`orderlistID`, `customerID`, `date_order`, `price`, `description`, `state`, `paystatus`) VALUES
(344, 15, '2020-07-30 02:54:07', '100000', 'Cupcake Socolate', 'Đang xử lí', 'Chưa thanh toán'),
(345, 15, '2020-07-30 03:43:00', '100000', 'Cupcake Socolate', 'Đang xử lí', 'Chưa thanh toán'),
(353, 16, '2020-07-30 05:22:07', '900000', 'Cupcake Socolate', 'Đang xử lí', 'Chưa thanh toán'),
(354, 16, '2020-07-30 06:52:33', '100000', 'Cupcake Socolate', 'Đang xử lí', 'Chưa thanh toán'),
(355, 16, '2020-07-30 06:54:28', '100000', 'Cupcake Socolate', 'Đang xử lí', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
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
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productID`, `productName`, `categoryID`, `vendorID`, `description`, `price`, `image`, `type`) VALUES
(12, 'Cupcake Chocolate', 22, 0, 'Cupcake Chocolate', '100000', 'bánh pancake.jpg', 'combo'),
(17, 'Socola nóng cổ điển', 22, 5, 'Nếu đã chán cà phê, hãy thử ly socola này xem sao!', '80000', '582dd947db002.jpeg', 'drinks'),
(18, 'Cà phê Americano Đá', 22, 5, 'Vừa thưởng thức cà phê vừa nghe bài hát Americano của 10cm thì cuộc đời đúng thật tuyệt vời!', '65000', 'fcb103e6bd704fdc9cc910fc43dd2534.png', 'drinks'),
(20, 'Trà hoa cúc', 22, 5, 'Đắm chìm trong cảnh sắc thơ mộng của rừng hoa cúc trắng qua ly trà hoa cúc của chúng mình.', '70000', 'nước bông cúc.jpg', 'drinks'),
(21, 'English Breakfast Tea', 22, 5, 'Lựa chọn tuyệt vời để thả hồn vào vương quốc Anh cổ điển.', '80000', 'DS9CiCWXcAAaNVc.jpg', 'drinks'),
(22, 'Cà phê đá xay Caramel Frappuccino', 22, 5, 'Sự kết hợp tuyệt vời giữa cà phê, sữa tươi, đá xay và caramel sẽ làm tan chảy trái tim bạn trong những ngày hè oi bức.', '100000', 'd8a97adbb0ed499aa0603d5a91175c97.jpg', 'drinks'),
(23, 'Kem đá xay Green Tea Frappuccino', 22, 5, 'Hòa nguyện giữa đá, sữa tươi và trà xanh matcha, kem đá xay Green Tea Frappuccino như định nghĩa một loại trà xanh mới chỉ dành riêng cho bạn.', '105000', 'c86399bce6f64b90b3415792b5884417.jpg', 'drinks'),
(24, 'Mocha Frappuccino', 22, 5, 'Cho tớ một ly mocha frappuccino, không cần thêm kem tươi, thêm một tí socola, sẵn tiện thêm cả số điện thoại của cậu luôn nhé.', '100000', 'd903828c591c355058fa31c9b0459dda.jpg', 'drinks'),
(25, 'Cơm gà viên', 22, 2, 'Là một tín đồ của gà thì không thể bỏ qua món cơm gà viên này.', '43000', 'com-ga-vien2.jpg', 'foods'),
(26, 'Cơm thịt heo Bulgogi', 22, 2, 'Thịt heo Bulgogi đậm vị làm món ăn đã ngon càng thêm ngon.', '43000', 'Cơm-thịt-heo-bulgogi-350x277.png', 'foods'),
(27, 'Cơm thịt heo phô mai', 22, 2, 'Phô mai và thịt heo - sự kết hợp tưởng chừng đã cũ nhưng mùi vị đem lại vẫn thơm ngon như thuở ban đầu.', '43000', 'foody-lotteria-coopmart-hue-252-636559661009325401.jpg', 'foods'),
(28, 'Cơm thịt heo sốt cay', 22, 2, 'Cay cay kích thích chiếc bụng đang đói cồn cào của bạn.', '43000', 'Cơm-thịt-heo-sốt-cay.png', 'foods'),
(29, 'Gà giòn cay', 22, 1, 'Vị cay tan trong tiếng nhai rộp rộp.', '49000', 'Gà-Giòn-Cay-1-miếng-350x282.jpg', 'foods'),
(30, 'Cánh gà giòn cay', 22, 1, 'Một phần gồm 3 miếng, có thể chia cho bạn bè hoặc giấu ăn một mình đều được', '57000', 'Cánh-Gà-Giòn-Cay-3-Miếng-1-350x282.jpg', 'foods'),
(31, 'Gà truyền thống (6 miếng)', 22, 1, 'Không thể nào sai với công thức gà truyền thống, nay đã có phần 6 miếng.', '199000', 'Gà-Truyền-Thống-6-Miếng-350x282.jpg', 'foods'),
(32, 'Cơm gà xào sốt Nhật', 22, 1, 'Nói đến nước Nhật là mọi người nghĩ ngay đến hoa anh đào, còn tớ chỉ nghĩ về cơm gà xào sốt Nhật của KFC mà thôi!', '51000', 'Cơm-Gà-Xào-Sốt-Nhật-350x282.png', 'foods'),
(33, 'Cơm phi lê gà quay tiêu', 22, 1, 'Lỡ hôm nay trong ngày có liêu xiêu, hãy thử ngay cơm phi lê gà quay tiêu cho tâm trạng tốt hơn nhé!', '51000', 'Cơm-Phi-Lê-Gà-Quay-Tiêu-350x282.jpg', 'foods'),
(34, 'Burger Tôm', 22, 1, 'Ngon ngon ngon quá là ngon.', '52000', 'Bơ-Gơ-Tôm-1-350x282.jpg', 'foods'),
(35, 'Hamburger phô mai', 22, 2, 'Còn gì thích mắt hơn được nhìn lớp phô mai tan chảy.', '42000', 'Hamburger-phô-mai-350x277.png', 'foods'),
(36, 'Big Star', 22, 2, 'Twinkle twinkle little star nay đã trở thành phần hamburger Big Star ngon lành.', '62000', 'Big-star-350x277.png', 'foods'),
(37, 'Trà Ô Long Quế Hoa kem Cheese', 22, 5, 'Dịu dàng thanh khiết, rất thích hợp cho một ngày trời xanh mây trắng.', '55000', 'Trà-Ô-Long-Quế-Hoa-Kem-Cheese-350x263.jpg', 'drinks'),
(38, 'Trà dâu Nam Mỹ chanh vàng', 22, 5, 'Có bao giờ bạn thắc mắc dâu Nam Mỹ vị như thế nào? Mua ngay một ly để giải đáp thắc mắc nào.', '63000', 'Trà-Xanh-Dâu-Tây-Kem-Cheese-350x350.jpg', 'drinks'),
(39, 'Cold Brew', 22, 5, 'Tên vốn là Cold Brew nhưng lại rất hot với đông đảo khách hàng.', '80000', 'nitro-cold-brew-có-tại-Starbucks.jpg', 'drinks'),
(40, 'Strawberry and Cream', 22, 5, 'Với sắc màu tươi xinh và hương vị ngọt ngào, Strawberry and Cream dễ dàng lôi cuốn cả những vị khách khó tính.', '90000', '78c40a18a26cc78b609960dcc92a3ccc.jpg', 'drinks'),
(41, 'Iced Espresso', 22, 5, 'Vào Starbucks nhất định phải thưởng thức Espresso!', '75000', 'starbucks-iced-espresso.jpg', 'drinks'),
(42, 'Menu 39K', 22, 6, '4 Pizza cỡ nhỏ đồng giá 39k:\r\nPizza Thanh Cua Xốt Phô Mai: Kết hợp thanh cua hảo hạng xé sợi và xốt phô mai cay nhẹ cùng xà lách xanh tươi mát.\r\nPizza Thịt Xông Khói Xà Lách: vị ngon gây xao xuyến lần đầu xuất hiện\r\nPizza Bò Nướng Phô Mai với bò và bắp thơm lừng\r\nPizza Cá Ngừ Thanh Cua luôn là best seller được các tín đồ pizza yêu thích từ lâu', '39000', '69562037_10156493869442267_5682674656721502208_o.jpg', 'discount'),
(43, 'Giảm 50% Pizza Phở', 22, 7, '* Ưu đãi giảm giá 50% Pizza Phở cỡ vừa (M) khi mua kèm nước bất kỳ.\r\n\r\n* Thời gian: 24/7 - 30/7/2020', '74500', 'dis50_pizzapho.png', 'discount'),
(45, 'Combo cơm A', 22, 1, '1 cơm gà giòn cay + 1 súp gà + 1 lon Pepsi', '69000', 'a8ef8a8b23927a56bbfd9a9884416c9b.jpg', 'combo'),
(46, 'Combo Pizza Phở', 22, 7, '* Combo QUYẾT THẮNG 249K gồm: 1 pizza Phở (L) + 1 phần khoai tây phô mai + 1 chai nước lớn', '249000', 'combo_pizza-phở_png-01.png', 'combo'),
(47, 'Cơm ngon ngày hè', 22, 2, 'Các món Cơm gà xối mỡ và Cơm tấm sườn nướng chỉ còn 59,000 đồng.\r\n\r\nKhách hàng được mua thêm 01 pepsi hoặc chè bắp với giá 5,000đ.', '59000', '2.-Vietstreet-800x600-800x566.jpg', 'discount'),
(48, 'Combo Gà Rán A', 22, 1, '- 2 miếng gà giòn cay\r\n- 1 lon Pepsi', '79000', 'b09860e31866521c22705711916cc402.jpg', 'combo'),
(49, 'Năm học kết thức - Ưu đãi HS-SV chỉ từ 159K/buffet', 22, 4, '*Từ thứ 2 đến Thứ 6\r\n– Khung giờ từ 10h00 – 17h00: 159.000đ/người\r\n– Khung giờ từ 17h00 – 22h00: 189.000đ/người\r\n*Thứ 7 và Chủ Nhật\r\n– Khung giờ từ 10h00 – 22h00: 189.000đ/người\r\n(*)\r\nChưa bao gồm VAT, nước, tráng miệng và Buffet line Kichi-Shi', '159000', 'Post-FB-900-x-900-px-01-1536x1536.png', 'discount');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendorID` int(11) NOT NULL,
  `vendorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendorID`, `vendorName`) VALUES
(1, 'KFC'),
(2, 'Lotteria'),
(4, 'Kichi-Kichi'),
(5, 'StarBucks'),
(6, 'Pizza Hut'),
(7, 'Domino\'s Pizza'),
(8, 'Baskin Robbins');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouseproduct`
--

CREATE TABLE `tbl_warehouseproduct` (
  `productID` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `amount` int(11) NOT NULL,
  `vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_warehouseproduct`
--

INSERT INTO `tbl_warehouseproduct` (`productID`, `productName`, `amount`, `vendor`) VALUES
(11, 'Coffee', 134214, 1),
(12, 'Combo1', 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wareorder`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_bankaccount`
--
ALTER TABLE `tbl_bankaccount`
  ADD PRIMARY KEY (`bankaccountID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_categori`
--
ALTER TABLE `tbl_categori`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD PRIMARY KEY (`orderlistID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- Indexes for table `tbl_warehouseproduct`
--
ALTER TABLE `tbl_warehouseproduct`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_bankaccount`
--
ALTER TABLE `tbl_bankaccount`
  MODIFY `bankaccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_categori`
--
ALTER TABLE `tbl_categori`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `orderlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_warehouseproduct`
--
ALTER TABLE `tbl_warehouseproduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_wareorder`
--
ALTER TABLE `tbl_wareorder`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
