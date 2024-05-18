-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2024 lúc 07:06 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_quan_ao_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ad_id` int(11) NOT NULL,
  `ad_Name` varchar(255) NOT NULL,
  `ad_Email` varchar(255) NOT NULL,
  `ad_User` varchar(255) NOT NULL,
  `ad_Pass` varchar(255) NOT NULL,
  `ad_level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`ad_id`, `ad_Name`, `ad_Email`, `ad_User`, `ad_Pass`, `ad_level`) VALUES
(2, 'cuong', 'cuong@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 0),
(3, 'cuong1', 'cuong@gmail.com', 'admin1', '123', 0),
(4, 'cuong', 'cuong@gmail.com', 'cuong', 'cf4d87e50be6390ee9bd8ad6e7498cae', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_Name`) VALUES
(8, 'Louis Vuitton'),
(9, 'Gucci'),
(10, 'Hermès'),
(11, 'Céline'),
(12, 'Loewe'),
(13, 'Chanel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cat_id`, `product_id`, `sid`, `product_Name`, `price`, `quantity`, `image`) VALUES
(53, 7, 5, 'nr30ai2nr9g7bg4lsv7k2n82ch', 'Quần', '99999', 2, 'e00a32891f.jpg'),
(54, 9, 15, '056adtgjenerk4jr58oli14nos', 'Thắt lưng nâu', '46464', 1, '55e78bccce.jpg'),
(55, 7, 6, '056adtgjenerk4jr58oli14nos', 'áo thu đông', '99999', 1, 'f0c2ac17e1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_Name`) VALUES
(7, 'quanao'),
(8, 'Giaydep'),
(9, 'phu kien'),
(10, 'quan$ao'),
(11, 'quanao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Nguyen Hung Cuong', 'An Phuong, Thanh Ha, Hai Duong', 'Hai Duong', 'AF', '170000', '0325409838', 'cuong@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Nguyen Hung Cuong', 'An Phuong, Thanh Ha, Hai Duong', 'Hai Duong', 'AF', '170000', '0325409838', 'cuong1@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cat_id`, `product_id`, `product_Name`, `customer_id`, `quantity`, `price`, `image`, `date_order`, `status`) VALUES
(9, 7, 4, 'áo thun', 1, 1, '99999', 'd83a354247.jpg', '2024-04-23 17:26:12', 1),
(10, 7, 7, 'áo nữ', 1, 3, '299997', '22967605a0.jpg', '2024-04-23 17:26:12', 0),
(11, 8, 10, 'Giày đen', 1, 2, '194018', 'a8611e0253.jfif', '2024-04-23 20:52:24', 0),
(12, 9, 14, 'Thắt lưng nâu', 1, 2, '92928', '656dd7f8ca.jpg', '2024-04-23 20:52:24', 0),
(13, 9, 13, 'Thắt lưng đen', 1, 2, '199998', '631709bafb.jpg', '2024-04-23 20:52:24', 0),
(14, 7, 7, 'áo thun', 1, 1, '99999', 'd83a354247.jpg', '2024-04-23 22:32:49', 0),
(16, 7, 4, 'áo thun', 1, 1, '99999', 'd83a354247.jpg', '2024-04-23 23:03:44', 0),
(17, 8, 11, 'Dép quai hậu', 1, 5, '277775', 'a5940cc4b5.jpg', '2024-04-23 23:08:49', 0),
(18, 8, 10, 'Giày đen', 1, 3, '291027', 'a8611e0253.jfif', '2024-04-23 23:08:49', 0),
(19, 7, 4, 'áo thun', 1, 4, '399996', 'd83a354247.jpg', '2024-04-24 01:32:59', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_Name` tinytext NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `decription` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_Name`, `cat_id`, `brand_id`, `decription`, `type`, `price`, `image`) VALUES
(2, 'áo dài', 7, 8, '<p>đẹp</p>', 1, '99999', 'f64ad09837.jpg'),
(3, 'áo dài', 7, 8, '<p>đẹp</p>', 1, '99999', 'bba87280a6.jpg'),
(4, 'áo thun', 7, 9, '<p>aaaa</p>', 0, '99999', 'd83a354247.jpg'),
(5, 'Quần', 7, 10, '<p>dsdsdd</p>', 0, '99999', 'e00a32891f.jpg'),
(6, 'áo thu đông', 7, 11, '<p>dddd</p>', 0, '99999', 'f0c2ac17e1.jpg'),
(7, 'áo nữ', 7, 11, '<p>sddds</p>', 0, '99999', '22967605a0.jpg'),
(9, 'váy trắng', 7, 12, '<p>sdsdsd</p>', 0, '99999', '15561ea479.jpg'),
(10, 'Giày đen', 8, 8, '<p>đẹp</p>', 0, '97009', 'a8611e0253.jfif'),
(11, 'Dép quai hậu', 8, 8, '<p>sds</p>', 0, '55555', 'a5940cc4b5.jpg'),
(13, 'Thắt lưng đen', 9, 8, '<p>Thắt lưng đen cá tính</p>', 0, '99999', '631709bafb.jpg'),
(14, 'Thắt lưng nâu', 9, 8, '<p>ssfsfdf</p>', 0, '46464', '656dd7f8ca.jpg'),
(15, 'Thắt lưng nâu', 9, 8, '<p>ssfsfdf</p>', 0, '46464', '55e78bccce.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
