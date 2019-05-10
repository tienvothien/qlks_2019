-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2019 lúc 05:39 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kl_qlktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `matinh` int(11) NOT NULL,
  `tentinh` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`matinh`, `tentinh`) VALUES
(1, 'Hà Nội'),
(2, 'Hà Giang'),
(4, 'Cao Bằng'),
(6, 'Bắc Kạn'),
(8, 'Tuyên Quang'),
(10, 'Lào Cai'),
(11, 'Điện Biên'),
(12, 'Lai Châu'),
(14, 'Sơn La'),
(15, 'Yên Bái'),
(17, 'Hoà Bình'),
(19, 'Thái Nguyên'),
(20, 'Lạng Sơn'),
(22, 'Quảng Ninh'),
(24, 'Bắc Giang'),
(25, 'Phú Thọ'),
(26, 'Vĩnh Phúc'),
(27, 'Bắc Ninh'),
(30, 'Hải Dương'),
(31, 'Hải Phòng'),
(33, 'Hưng Yên'),
(34, 'Thái Bình'),
(35, 'Hà Nam'),
(36, 'Nam Định'),
(37, 'Ninh Bình'),
(38, 'Thanh Hóa'),
(40, 'Nghệ An'),
(42, 'Hà Tĩnh'),
(44, 'Quảng Bình'),
(45, 'Quảng Trị'),
(46, 'Thừa Thiên Huế'),
(48, 'Đà Nẵng'),
(49, 'Quảng Nam'),
(51, 'Quảng Ngãi'),
(52, 'Bình Định'),
(54, 'Phú Yên'),
(56, 'Khánh Hòa'),
(58, 'Ninh Thuận'),
(60, 'Bình Thuận'),
(62, 'Kon Tum'),
(64, 'Gia Lai'),
(66, 'Đắk Lắk'),
(67, 'Đắk Nông'),
(68, 'Lâm Đồng'),
(70, 'Bình Phước'),
(72, 'Tây Ninh'),
(74, 'Bình Dương'),
(75, 'Đồng Nai'),
(77, 'Bà Rịa - Vũng Tàu'),
(79, 'Hồ Chí Minh'),
(80, 'Long An'),
(82, 'Tiền Giang'),
(83, 'Bến Tre'),
(84, 'Trà Vinh'),
(86, 'Vĩnh Long'),
(87, 'Đồng Tháp'),
(89, 'An Giang'),
(91, 'Kiên Giang'),
(92, 'Cần Thơ'),
(93, 'Hậu Giang'),
(94, 'Sóc Trăng'),
(95, 'Bạc Liêu'),
(96, 'Cà Mau');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`matinh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
