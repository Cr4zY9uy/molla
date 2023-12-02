-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2023 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_toy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'admin2', 'c81e728d9d4c2f636f067f89cc14862c', 1),
(6, 'admin3', '7be523c7cab2d16d0d710e2216cea4e9', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageurl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `imageurl`) VALUES
(1, 'LEGO', 'LEGO', 'lego.png'),
(2, 'BanDai', 'BanDai', 'bandai.png'),
(3, 'Lori', 'Lori', 'lori.png'),
(4, 'Global', 'Global', 'global.png'),
(5, 'Smartgame', 'Smartgame', 'smartgame.png'),
(6, 'Toys', 'Toys', 'toys.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Phiêu lưu', 'Phiêu lưu'),
(2, 'Tàu vũ trụ', 'Tàu vũ trụ'),
(3, 'Trí tuệ', 'Trí tuệ'),
(4, 'Mô hình', 'Mô hình'),
(5, 'Xe hơi', 'Xe hơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `agerange` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `configuration`
--

INSERT INTO `configuration` (`id`, `productid`, `agerange`, `weight`, `material`, `origin`) VALUES
(4, 15, '8+', '160g', 'Nhựa an toàn, kim loại', 'Trung Quốc'),
(5, 16, '10+', '150g', 'Nhựa an toàn, kim loại', 'Trung Quốc'),
(6, 17, '9+', '160g', 'Nhựa an toàn', 'Đức'),
(7, 18, '8+', '100g', 'Nhựa an toàn', 'Trung Quốc'),
(8, 19, '8+', '100g', 'Nhựa cao cấp', 'Đức'),
(9, 20, '6+', '100g', 'Nhựa cao cấp', 'Đức'),
(12, 23, '6+', '100g', 'Nhựa an toàn', 'Đức'),
(13, 24, '6+', '100g', 'Nhựa cao cấp', 'Đức'),
(14, 25, '6+', '100g', 'Nhựa cao cấp', 'Đức'),
(15, 26, '3+', '100g', 'Nhựa an toàn', 'Trung Quốc'),
(16, 27, '10+', '100g', 'Nhựa cao cấp', 'Đức'),
(17, 28, '5+', '70g', 'Nhựa cao cấp', 'Đức'),
(18, 29, '5+', '100g', 'Nhựa cao cấp', 'Trung Quốc'),
(19, 30, '4+', '60g', 'Nhựa cao cấp', 'Đức'),
(20, 31, '4+', '100g', 'Nhựa cao cấp', 'Trung Quốc'),
(21, 32, '6+', '150g', 'Nhựa cao cấp', 'Đức'),
(22, 33, '6+', '150g', 'Nhựa cao cấp', 'Đức'),
(23, 34, '6+', '200g', 'Nhựa an toàn', 'Trung Quốc'),
(24, 35, '8+', '150g', 'Nhựa an toàn', 'Trung Quốc'),
(27, 38, '12+', '61.1g', 'Nhôm', 'Mỹ'),
(28, 39, '4+', '100g', 'Nhựa cao cấp, kim loại', 'Đức'),
(31, 42, '4+', '200g', 'Nhựa cao cấp', 'Đức'),
(33, 48, '15+', '500g', 'nhựa ', 'Nhật Bản'),
(34, 47, '15+', '500g', 'Nhựa', 'Nhật Bản'),
(35, 49, '15+', '500g', 'Nhựa cao cấp', 'Nhật Bản'),
(36, 50, '4+', '352g', 'nhựa cao cấp', 'Đan Mạch'),
(37, 51, '3+', '300g', 'Nhựa', 'Trung Quốc'),
(38, 52, '1+', '500g', 'Cao su cao cấp', 'Đ'),
(39, 53, '1+', '345g', 'Nhựa & cao su', 'Trung Quốc'),
(40, 54, '5+', '50g', 'Nhựa dẻo', 'Mỹ'),
(41, 55, '4+', '600g', 'Nhựa cao cấp', 'Đan Mạch'),
(42, 56, '6+', '800g', 'Nhựa', 'Việt Nam'),
(43, 57, '7+', '200g', 'Nhựa & cao su', 'Việt Nam '),
(44, 58, '15+', '800g', 'Nhựa cao cấp', 'Nhật Bản '),
(45, 59, '12+', '678g', 'Nhựa & cao su', 'Nhật Bản '),
(46, 60, '14+', '700g', 'Nhựa cao cấp', 'Nhật Bản ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `recoverycode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `address`, `created_at`, `updated_at`, `status`, `recoverycode`) VALUES
(1, 'Trần Huy Long', 'huylong05032002@gmail.com', '0342788463', 'c4ca4238a0b923820dcc509a6f75849b', 'Vĩnh Phúc', '2023-06-04 10:09:43', '2023-06-19 21:17:09', 0, 'teWzBznpWbyUoSjBdJh7YDzPIm81WtDiFQtNbtQAhx6kL6FWtE'),
(3, 'Trần Huy Long', 'huylong05032002o@gmail.com', '012345678', '25d55ad283aa400af464c76d713c07ad', 'Hà Nam', '2023-06-04 10:09:43', '2023-06-19 21:31:47', 1, NULL),
(6, 'Nguyễn Văn Anh', 'vananh00@gmail.com', '0123456789', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:02:29', '2023-06-19 21:20:09', 0, NULL),
(7, 'Bùi Văn Thành', 'thanh123@gmail.com', '099999999', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:04:14', '2023-06-19 21:20:16', 0, NULL),
(8, 'Nguyễn Minh Đức', 'ducminh551@gmail.com', '0123456799', 'c4ca4238a0b923820dcc509a6f75849b', 'Hà Nội', '2023-06-08 22:07:09', '2023-06-19 21:20:38', 0, NULL),
(9, 'noname123', 'tranhuylong1512@gmail.com', '0987654321', '25d55ad283aa400af464c76d713c07ad', 'Hà Nam', '2023-06-15 12:22:17', '2023-06-19 21:28:51', 0, 'QePdTD64DOq5Bkv07T1G5hkkTRDkdLjtN2dwgCTWGSVEqiPfkW'),
(10, 'long', 'stockadobe@gmail.com', '0889248034', 'c4ca4238a0b923820dcc509a6f75849b', 'Nghệ An', '2023-06-18 20:12:29', '2023-06-19 21:21:24', 0, NULL),
(14, 'Long tran', 'abc1@gmail.com', '064387758', '25d55ad283aa400af464c76d713c07ad', 'Quảng Ninh', '2023-06-19 14:03:32', '2023-06-19 21:21:53', 0, NULL),
(15, 'Hoàng Xuân Thắng', 'thanghoang123@gmail.com', '0987517453', '25d55ad283aa400af464c76d713c07ad', 'Quảng Nam', '2023-06-19 22:45:35', '2023-06-19 22:45:35', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `productid`, `url`) VALUES
(143, 42, 'toy26.1.png'),
(144, 42, 'toy26.2.jpg'),
(145, 42, 'toy26.3.jpg'),
(151, 39, 'toy23.1.png'),
(152, 39, 'toy23.2.jpg'),
(153, 39, 'toy23.3.png'),
(154, 38, 'toy22.1.png'),
(155, 38, 'toy22.2.jpg'),
(156, 38, 'toy22.3.jpg'),
(163, 35, 'toy4.1.png'),
(164, 35, 'toy4.2.jpg'),
(165, 35, 'toy4.3.png'),
(166, 34, 'toy20.1.png'),
(167, 34, 'toy20.2.png'),
(168, 34, 'toy20.3.png'),
(169, 33, 'toy19.1.png'),
(170, 33, 'toy19.2.png'),
(171, 33, 'toy19.3.png'),
(172, 32, 'toy18.1.jpg'),
(173, 32, 'toy18.2.jpg'),
(174, 32, 'toy18.3.jpg'),
(175, 31, 'toy17.1.jpg'),
(176, 31, 'toy17.2.jpg'),
(177, 31, 'toy17.3.jpg'),
(178, 30, 'toy16.1.png'),
(179, 30, 'toy16.2.png'),
(180, 29, 'toy15.1.png'),
(181, 29, 'toy15.2.png'),
(182, 29, 'toy15.3.png'),
(183, 28, 'toy14.1.jpg'),
(184, 28, 'toy14.2.jpg'),
(185, 28, 'toy14.3.jpg'),
(186, 27, 'toy10.1.png'),
(187, 27, 'toy10.2.jpg'),
(188, 27, 'toy10.3.png'),
(189, 26, 'toy8.1.jpg'),
(190, 26, 'toy8.2.jpg'),
(191, 26, 'toy8.3.jpg'),
(192, 25, 'toy7.1.png'),
(193, 25, 'toy7.2.jpg'),
(194, 25, 'toy7.3.jpg'),
(195, 24, 'toy6.2.jpg'),
(196, 24, 'toy6.3.png'),
(197, 23, 'toy5.1.jpg'),
(198, 23, 'toy5.2.jpg'),
(199, 23, 'toy5.3.jpg'),
(200, 20, 'toy2.1.jpg'),
(201, 20, 'toy2.2.jpg'),
(202, 20, 'toy2.3.jpg'),
(203, 19, 'toy1.1.jpg'),
(204, 19, 'toy1.2.jpg'),
(205, 19, 'toy1.3.jpg'),
(206, 18, 'toy12.1.png'),
(207, 18, 'toy12.2.png'),
(208, 18, 'toy12.3.png'),
(209, 17, 'toy3.1.jpg'),
(210, 17, 'toy3.2.jpg'),
(211, 17, 'toy3.3.jpg'),
(212, 16, 'toy11.1.png'),
(213, 16, 'toy11.2.jpg'),
(214, 15, 'toy9.1.png'),
(215, 15, 'toy9.2.png'),
(216, 15, 'toy9.3.png'),
(217, 47, 'gundam1.png'),
(218, 48, 'gundam2.jpg'),
(219, 48, 'gundam2.1.png'),
(220, 49, 'toy39.1.png'),
(221, 49, 'toy39.2.png'),
(222, 49, 'toy39.3.png'),
(223, 50, '44.1.png'),
(224, 50, '44.2.jpg'),
(225, 50, '44.3.jpg'),
(226, 51, '45.1.png'),
(227, 51, '45.2.jpg'),
(228, 51, '45.3.png'),
(229, 52, '46.1.jpg'),
(230, 52, '46.2.jpg'),
(231, 52, '46.3.jpg'),
(232, 53, '47.1.jpg'),
(233, 53, '47.2.jpg'),
(234, 53, '47.3.jpg'),
(235, 54, '48.1.jpg'),
(236, 54, '48.2.jpg'),
(237, 54, '48.3.jpg'),
(238, 55, '49.1.jpg'),
(239, 55, '49.2.jpg'),
(240, 55, '49.3.jpg'),
(241, 56, '51.1.jpg'),
(242, 56, '51.2.png'),
(243, 56, '51.3.png'),
(244, 57, '52.1.png'),
(245, 57, '52.2.png'),
(246, 57, '52.3.png'),
(247, 58, 'toy41.1.png'),
(248, 58, 'toy41.2.png'),
(249, 58, 'toy41.3.png'),
(250, 59, 'toy42.1.png'),
(251, 59, 'toy42.2.png'),
(252, 59, 'toy42.3.png'),
(253, 60, 'toy43.1.png'),
(254, 60, 'toy43.2.png'),
(255, 60, 'toy43.3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderid`, `customerid`, `productid`, `quantity`, `price`) VALUES
(38, 28, 1, 16, 1, 990000),
(39, 28, 1, 17, 4, 990000),
(40, 29, 1, 16, 1, 900000),
(41, 30, 1, 17, 1, 290000),
(42, 30, 1, 27, 1, 290000),
(46, 32, 8, 29, 1, 1200000),
(47, 33, 8, 29, 1, 450000),
(48, 33, 8, 25, 3, 450000),
(49, 33, 8, 23, 1, 450000),
(50, 34, 1, 19, 1, 250000),
(51, 34, 1, 28, 1, 250000),
(52, 34, 1, 27, 3, 250000),
(53, 35, 1, 42, 1, 400000),
(61, 46, 9, 48, 1, 450000),
(62, 47, 15, 59, 1, 981000),
(63, 47, 15, 55, 1, 981000),
(64, 47, 15, 52, 1, 981000),
(65, 48, 7, 28, 1, 790000),
(66, 48, 7, 19, 1, 790000),
(67, 49, 9, 53, 1, 801000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `email`, `note`, `total`, `payment`, `created_at`, `updated_at`, `status`) VALUES
(28, 'Trần Huy Long', 'Vĩnh Phúc', '0342788463', 'huylong05032002@gmail.com', 'Hế lô', 560000, 'Credit card', '2023-04-07 19:32:12', '2023-06-19 21:26:09', 4),
(29, 'Trần Huy Long', 'Vĩnh Phúc', '0342788463', 'huylong05032002@gmail.com', '', 560000, 'Credit card', '2023-05-07 19:48:49', '2023-06-19 21:26:25', 4),
(30, 'Trần Huy Long', 'Vĩnh Phúc', '0342788463', 'huylong05032002@gmail.com', 'oke', 360000, 'Cash', '2023-05-08 08:44:28', '2023-06-19 21:26:48', 3),
(32, 'Nguyễn Minh Đức', 'Hà Nội', '0123456799', 'ducminh511@gmail.com', 'ko có gì để ghi chú cả', 120000, 'Credit card', '2023-05-08 22:07:56', '2023-06-19 21:35:31', 1),
(33, 'Bùi Văn Thành', 'Hà Nội', '009999999', 'thanh123@gmail.com', '', 650000, 'Cash', '2023-05-09 01:41:29', '2023-06-19 21:38:15', 4),
(34, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 80000, 'Cash', '2023-06-11 15:36:06', '2023-06-19 21:38:25', 1),
(35, 'Nguyễn Văn Sơn', 'Vĩnh Phúc', '0342788463', 'vanson05032002@gmail.com', '', 450000, 'Cash', '2023-06-11 16:47:58', '2023-06-19 21:38:51', 0),
(40, 'noname123', 'Hà Nam', '0987654321', 'tranhuylong1512@gmail.com', '', 680000, 'Credit card', '2023-06-18 19:27:35', '2023-06-19 21:37:45', 0),
(45, 'noname123', 'Hà Nam', '0987654321', 'tranhuylong1512@gmail.com', '', 190000, 'Cash', '2023-06-18 19:48:34', '2023-06-19 21:37:49', 0),
(46, 'noname123', 'Hà Nam', '0987654321', 'tranhuylong1512@gmail.com', '', 450000, 'Credit card', '2023-06-19 14:11:07', '2023-06-19 21:37:52', 3),
(47, 'Hoàng Xuân Thắng', 'Quảng Nam', '0987517453', 'thanghoang123@gmail.com', '', 3440000, 'Cash', '2023-06-19 22:46:42', '2023-06-19 22:46:42', 0),
(48, 'Bùi Văn Thành', 'Hà Nội', '099999999', 'thanh123@gmail.com', '', 1780000, 'Cash', '2023-06-19 22:47:35', '2023-06-19 22:47:35', 0),
(49, 'noname123', 'Hà Nam', '0987654321', 'tranhuylong1512@gmail.com', '', 801000, 'Credit card', '2023-06-19 22:50:59', '2023-06-19 22:50:59', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `categoryid`, `brandid`, `name`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 'Bộ Thiết Kế Sáng Tạo 62 Mảnh', 'Bộ thiết kế sáng tạo 62 mảnh với các mảnh ghép được thiết kế hình dạng hình học như hình tam giác cân, tam giác đều, hình vuông, hình thang, hình thoi bé có thể tạo ra quả bóng ma thuật, bánh xe, thuyền, cối xay gió, máy bay trực thăng và nhiều thứ khác nữa.', 25, 300000, '2023-06-04 18:26:48', '2023-06-16 17:24:24'),
(16, 2, 1, 'Star Trek Enterprise NCC-1701', 'Star Trek không chỉ là một bộ phim khoa học viễn tưởng mà bản thân Star Trek là một vũ trụ: Với phi thuyền không gian huyền thoại Enterprise, Thuyền trưởng Kirk, Spock Vulcan, Scotty, McCoy, Sulu, Uhura và Chekov lao vào thế giới xa lạ và có những cuộc chiến phi thường.', 35, 1000000, '2023-06-04 18:31:03', '2023-06-16 17:25:09'),
(17, 1, 1, 'Ghép hình lập phương', 'Đồ chơi phát triển trí tuệ cho các bé độ tuổi mầm non. Các bé có thể luyện kỹ năng tập trung và giải đố. Bao gồm 48 thử thách và cả sách truyện tranh thật hấp dẫn. Bao gồm thử thách ở 4 cấp độ Starter, Junior, Expert, and Master', 15, 250000, '2023-06-04 18:38:45', '2023-06-16 17:26:34'),
(18, 3, 4, 'Thử Thách Đảo Kho Báu', 'Thử thách Đảo Kho Báu giúp trẻ rèn luyện 5 kỹ năng:Sự tập trung, Logic, Lên kế hoạch, Giải quyết vấn đề, Tư duy không gian ba chiều', 5, 500000, '2023-06-04 18:42:22', '2023-06-19 22:56:56'),
(19, 3, 1, 'Thử Thách IQ Digits', '. Đồ chơi với nhiều cấp độ thử thách khác nhau, phù hợp với bé trai, bé gái và cả người lớn. Thiết kế nhỏ gọn, chất liệu cao cấp, màu sắc bắt mắt. ', 20, 790000, '2023-06-04 18:45:41', '2023-06-19 22:53:46'),
(20, 3, 4, 'Xe ủi đất (nhỏ) Driven', 'Xe có nhiều màu sắc đẹp và thu hút các bé, các góc của xe đều được bo tròn để tạo sự an toàn tối đa cho bé khi chơi. Sản phẩm được thiết kế chắc chắn và chịu lực va đập tốt, không nhanh bị vỡ hỏng như các loại nhựa cứng.', 5, 560000, '2023-06-04 18:47:36', '2023-06-16 17:37:49'),
(23, 5, 4, 'Bộ đường đua stunt jump', 'Mang giá trị giáo dục cao, khuyến khích bé phát triển kỹ năng vận động, tư duy logic, sự sáng tạo qua các dòng đồ chơi: âm nhạc, xe, giả lập, vận động ngoài trời…', 15, 490000, '2023-06-04 19:59:12', '2023-06-16 17:37:44'),
(24, 5, 4, 'Xe cảnh sát (nhỏ)', 'Một chiếc xe cảnh sát chính là thứ mà một cảnh sát thực thụ cần. Dòng DRIVEN MICRO sao chép nguyên mẫu của một chiếc xe thật. Với kỹ thuật này, các bé chắc chắn sẽ bắt được tất cả tội phạm và cảm thấy như một anh hùng khi nhập vai cùng trò chơi này', 25, 500000, '2023-06-04 20:02:07', '2023-06-19 23:00:28'),
(25, 1, 4, 'Máy bay trực thăng (nhỏ)', 'Có đủ kích cỡ khác nhau và được thiết kế giống như thật nhằm mục đích truyền cảm hứng cho trẻ em sáng tạo .Có nhiều màu sắc đẹp và thu hút các bé, các góc đều được bo tròn để tạo sự an toàn tối đa cho bé khi chơi. Sản phẩm được thiết kế chắc chắn và chịu lực va đập tốt, không nhanh bị vỡ hỏng như các loại nhựa cứng', 5, 600000, '2023-06-04 20:04:49', '2023-06-19 23:00:09'),
(26, 5, 4, 'Xe rác (lớn)', 'Chào mừng bạn đến với thế giới của DRIVEN, một thương hiệu đồ chơi về các mô hình xe công trường. Các xe tải đồ chơi có đủ kích cỡ khác nhau và được thiết kế giống như thật nhằm mục đích truyền cảm hứng cho trẻ em sáng tạo và xây dựng con đường của riêng mình.', 10, 300000, '2023-06-04 20:07:32', '2023-06-16 17:37:30'),
(27, 2, 2, 'Star Trek Klingon Ship', 'Con tàu vũ trụ huyền thoại được trang bị đầy đủ các chức năng cơ học và điện tử. Chỉ huy Kruge, phi hành đoàn của Kruge, Đô đốc Kirk, Spock và hành tinh đều có trong bộ đồ chơi này. Nhờ có tấm đế và móc treo, con tàu vũ trụ có thể được trưng bày một cách kiêu hãnh trong bất kỳ bộ sưu tập nào hoặc trong phòng ngủ của trẻ nhỏ. Còn gì nữa để chờ đợi? Chuẩn bị bắt đầu một loạt các cuộc phiêu lưu không gian hoàn toàn mới!', 10, 1990000, '2023-06-04 20:09:39', '2023-06-19 22:59:49'),
(28, 5, 6, 'Mô hình Xe Porsche 911 Carrera RS 2.7 1:17', 'Thể thao - Tốc độ - Sành điệu: Porsche 911 Carrera RS 2.7 được thiết kế đúng với mẫu xe nguyên bản năm 1972 có các chi tiết nổi bật: Dòng chữ Carrera nổi bật bên thân xe, Gương chiếu hậu mạ crôm trang nhã, Nắp ca-pô phía sau mở lên trên để lộ khối động cơ boxer 6 xi-lanh', 5, 990000, '2023-06-04 20:19:58', '2023-06-19 22:57:47'),
(29, 5, 6, 'Xe điều khiển từ xa Porsche Mission E', 'Sản phẩm hợp tác bản quyền với thương hiệu xe cao cấp Porsche cửa Đức, xe mô hình dòng siêu xe điện Porsche Taycan. Xe thể thao điều khiển từ xa (bao gồm bảng điều khiển từ xa). Xe đủ không gian cho 2 nhân vật, mui xe có thể tháo rời, có trạm sạc điện. Xe được trang bị hệ thống đèn pha và đèn chiếu hậu hoạt động tốt giúp cho các bé nhập vai 1 cách chính xác.', 5, 900000, '2023-06-04 20:23:14', '2023-06-19 22:56:35'),
(30, 1, 5, 'Xe máy cảnh sát với đèn LED', 'Chip M2 mới nhất - hiệu năng hàng đầu, thoải mái sử dụng các phần mềm đồ hoạ hay render video\r\nMàn hình Retina - màu sắc hiển thị sống động tạo ra không gian giải trí đỉnh cao\r\nThiết kế sang trọng - Trọng lượng máy chỉ 1.4kg, độ dày chỉ 15.6mm giúp bạn dễĐèn chiếu hậu nhấp nháy và có chức năng tự động ngắt điện. Có chân chống giúp cho việc đậu xe dễ dàng. Nhân vật cảnh sát được trang bị mũ bảo hiểm và tai nghe\r\n', 5, 290000, '2023-06-04 20:26:15', '2023-06-19 22:56:16'),
(31, 1, 3, 'Trực thăng cảnh sát với đèn LED', 'Giúp bé nhập vai, bay trong chiếc máy bay trực thăng của cảnh sát và bắt những kẻ đào tẩu. Bên trong hộp, bé sẽ tìm thấy hai nhân vật nhỏ của cảnh sát và máy bay trực thăng.', 10, 839000, '2023-06-09 15:38:13', '2023-06-16 17:36:58'),
(32, 2, 3, 'Mô hình Phi thuyền vũ trụ sao Hỏa', 'Trẻ em không chỉ có thể hóa thân vào nhiều vai trò khác nhau trong Bộ Tên lửa và bệ phóng của bé. Bao gồm 3 nhân vật phi hành gia, bệ phóng tên lửa, tên lửa Sao Hỏa và các phụ kiện khác. Được trang bị hệ thống ánh sáng và âm thanh sống động như 1 bệ phóng tên lửa thật. Có các phụ kiện nghiên cứu không gian chi tiết giúp các bé có thể nhập vai chính xác.', 20, 1200000, '2023-06-09 15:40:08', '2023-06-19 22:58:35'),
(33, 2, 1, 'Mô hình Trạm vũ trụ sao Hoả', 'Trẻ em không chỉ có thể hóa thân vào nhiều vai trò khác nhau trong Trạm vũ trụ sao Hoả của bé.  Bao gồm 3 nhân vật phi hành gia, trạm Sao Hỏa và tất cả các công cụ cần thiết để khám phá không gian. Trạm không gian được trang bị đèn ở phía dưới khu vực trung tâm và trên các đoạn đường. Có các phụ kiện nghiên cứu không gian chi tiết giúp các bé có thể nhập vai chính xác.', 20, 450000, '2023-06-09 15:41:40', '2023-06-19 22:57:27'),
(34, 1, 3, 'Thử Thách Tập Hợp Chim Cánh Cụt', 'Thử thách Tập Hợp Chim Cánh Cụt (2-4 người chơi) giúp trẻ rèn luyện 5 kỹ năng: Sự tập trung, Logic, Lên kế hoạch, Giải quyết vấn đề, Tư duy không gian ba chiều', 20, 250000, '2023-06-09 15:43:57', '2023-06-16 17:36:40'),
(35, 3, 3, 'Máy làm kẹo bông gòn Harp', 'Các món đồ chơi của Harp giúp bé phát triển mối quan hệ với bạn bè xung quanh bằng những món đồ thủ công tự làm như kẹo bông, stickers, cầu tuyết, .… Đây là một món quà hoàn hảo dành cho team thích ăn kẹo bông, để bé có thể ăn kẹo bông thỏa thích ở nhà rồi đây!', 32, 540000, '2023-06-09 15:45:52', '2023-06-19 22:53:15'),
(38, 3, 6, 'Bộ Con Quay Beyblade Wild Wyvern', ' Với YoYo Duncan Flipside, trẻ còn được rèn luyện các kỹ năng khéo léo, khả năng quan sát kết hợp với trí tưởng tượng giúp tạo hình Yo-yo đẹp nhất.', 5, 300000, '2023-06-09 16:00:24', '2023-06-19 22:59:15'),
(39, 1, 5, 'Xe thang cứu hoả', 'Sức chứa của cabin lên đến 4 nhân viên cứu hỏa. Phần mui đầu xe di động, có thể tháo rời. Thang cứu hỏa có thể mở rộng, kéo dài. Hiệu ứng âm thanh và ánh sáng tuyệt vời. Có các phụ kiện cứu hỏa chi tiết giúp các bé có thể nhập vai chính xác.', 12, 290000, '2023-06-09 16:04:05', '2023-06-16 19:40:57'),
(42, 2, 5, 'Mô hình Máy bay chuyên cơ', 'Gấp bánh xe phản lực bên dưới máy bay khi cất cánh và hạ cánh. Bộ bao gồm ba nhân vật, máy bay phản lực, cặp, cốc và các phụ kiện khác. Mở nắp máy bay để quan sát và sắp xếp các hành khách & phi công vào ghế.', 5, 400000, '2023-06-09 16:10:10', '2023-06-19 22:58:06'),
(47, 4, 2, 'Gundam RX3V', 'Mô hình lắp ráp tỉ lệ 1/100, chiều cao 17.5 cm.\r\nHãng sản xuất : Ji Jia Xian QU\r\nThích hợp với người chơi trình độ trung cấp trở lên. \r\nChất liệu nhựa, thân thiện và an toàn với môi trường.', 50, 300000, '2023-06-19 12:17:03', '2023-06-19 12:17:03'),
(48, 4, 2, 'Alpha Gundam', 'Mô hình lắp ráp tỉ lệ 1/100, chiều cao 17.5 cm.\r\nHãng sản xuất : Ji Jia Xian QU\r\nThích hợp với người chơi trình độ trung cấp trở lên. \r\nChất liệu nhựa, thân thiện và an toàn với môi trường.', 123, 450000, '2023-06-19 12:29:18', '2023-06-19 12:29:18'),
(49, 4, 2, 'RX-78-2 Gundam Ver.3.0 (MG)', '•	Cấp độ MG với tỷ lệ 1/100.\r\n•	Độ chi tiết cao, có khung xương chuyển động linh hoạt. Ráp theo kiểu bấm khớp, không cần dùng keo dán.\r\n•	Trang bị: 2 Beam Saber, Beam Rifle, Khiên Chắn, Hyper Bazooka\r\n•	Mẫu RX-78-2 Ver. 3.0 được thiết kế dựa trên bức tượng gundam khổng lồ tại Tokyo.\r\n•	Khung xương và các phần khớp được thiết kế theo kiểu mới (Ver. 3.0) uyển chuyển hơn trong khả năng tạo dáng và di chuyển.\r\n', 123, 580000, '2023-06-19 22:03:16', '2023-06-19 22:54:26'),
(50, 3, 4, 'Đàn organ con mèo mini B.Toys', 'B.Toys là thương hiệu đồ chơi của Battat (Canada) với hơn 100 năm kinh nghiệm trong ngành đồ chơi.\r\nMỗi sản phẩm đồ chơi Battat đều mang giá trị giáo dục cao, khuyến khích bé phát triển kỹ năng vận động, tư duy logic, sự sáng tạo qua các dòng đồ chơi: âm nhạc, xe, giả lập, vận động ngoài trời…\r\n.Và đặc biệt, sản phẩm của Battat được sản xuất theo các tiêu chuẩn an toàn nghiêm ngặt với phương châm luôn mang đến cho các bé những món đồ chơi giá trị và an toàn.\r\n', 12, 1559000, '2023-06-19 22:21:22', '2023-06-19 22:21:22'),
(51, 3, 5, 'Đàn ghita cún cưng mini B.Toys', 'B.Toys là thương hiệu đồ chơi của Battat (Canada) với hơn 100 năm kinh nghiệm trong ngành đồ chơi.\r\nMỗi sản phẩm đồ chơi Battat đều mang giá trị giáo dục cao, khuyến khích bé phát triển kỹ năng vận động, tư duy logic, sự sáng tạo qua các dòng đồ chơi: âm nhạc, xe, giả lập, vận động ngoài trời…\r\nVà đặc biệt, sản phẩm của Battat được sản xuất theo các tiêu chuẩn an toàn nghiêm ngặt với phương châm luôn mang đến cho các bé những món đồ chơi giá trị và an toàn.\r\n', 50, 439000, '2023-06-19 22:23:14', '2023-06-19 22:23:14'),
(52, 3, 6, 'Vô lăng điều khiển B.Toys', 'Rẽ trái, rẽ phải, lái chiếc xe nhỏ của bé khắp thị trấn. Bé sẽ thực sự cảm thấy như mình đang lái xe chân thật .Tiếng động cơ và còi. Vroom Vroom, uhhhh Bíp bíp. Đèn nháy LED khi bé xoay vô lăng qua trái hoặc phải \r\n', 100, 981000, '2023-06-19 22:24:39', '2023-06-19 22:24:39'),
(53, 5, 6, 'Xe đồ chơi Whee-LS B.Toys', 'Đặc trưng với 4 xe phân khối với những khuôn mặt vui nhộn, hay thay đổi. Hoàn hảo cho bàn tay nhỏ của bé để cằm nắm. Mỗi phương tiện đều có âm thanh đặc trưng riêng', 234, 801000, '2023-06-19 22:26:04', '2023-06-19 22:26:04'),
(54, 3, 6, 'Dây nhảy phát sáng B.Toys', 'Một tác phẩm trò chơi cổ điển thời thơ ấu được tái tạo! Jump Ropes chưa bao giờ thú vị dành cho các bé như vậy', 100, 399000, '2023-06-19 22:27:06', '2023-06-19 22:27:06'),
(55, 1, 1, 'Tàu Tuần Tra Cảnh Sát', 'Đồ chơi LEGO City Police Patrol Boat  này được trang bị các tính năng ấn tượng, bao gồm một trạm điều khiển chi tiết và máy bay không người lái giám sát. Các bé có thể gạt cần để thả thợ lặn và xe lặn xuống biển, bắn súng bắn lưới để bắt kẻ gian.Với 5 nhân vật nhỏ, bao gồm Gracie Goodhart, Frankie Lupelli và Hacksaw Hank. Trò chơi có rất nhiều cảm hứng để bé có thể nhập vai và sáng tạo \r\n', 78, 1559000, '2023-06-19 22:29:32', '2023-06-19 22:29:32'),
(56, 3, 5, 'Thử Thách IQ Mini', 'IQ Mini được thiết kế 1 cách nhỏ gọn, bé có thể bỏ túi sẵn sàng mang theo mọi lúc mọi nơi. IQ Mini có tổng 6 màu, bé chỉ cần chọn màu yêu thích và thử thách bản thân. Bé tạo thử thách của riêng mình bằng cách di chuyển các khối và lấp đầy bảng trò chơi bằng các mảnh ghép.', 87, 149000, '2023-06-19 22:30:59', '2023-06-19 22:30:59'),
(57, 1, 3, 'Thử Thách Những Chú Mèo Và Hộp', 'Hãy để tất cả các chú mèo vào trong hộp. Lần lượt di chuyển các mảnh ghép cho đến khi tất cả các con mèo nằm trong hộp Carton. Bạn hãy giúp những chú mèo có 1 chỗ ngủ yêu thích nhé.', 900, 449000, '2023-06-19 22:32:26', '2023-06-19 22:32:26'),
(58, 4, 2, 'RX-139 HAMBRABI', 'Độ chi tiết vừa phải, khớp chuyển động tương đối linh hoạt. Ráp theo kiểu bấm khớp, không cần dùng keo dán.Trang bị: 2 Beam Saber, Sea Serpent, Feyadeen Rifle, Tail Lance.Có thể chuyển đổi qua mobile armor với hình dạng \"cá đuối\" ấn tượngDecal dán.Không kèm đế.\r\n', 34, 780000, '2023-06-19 22:36:23', '2023-06-19 22:36:23'),
(59, 4, 2, 'GUNDAM THE WITCH', 'Dilanza Sol HG 1/144 bán ở nShop kế thừa phong cách thiết kế của dòng mobile suit Dilanza và khoác lên mình tông xanh đen chủ đạo, tạo nên một vẻ ngoài chắc khỏe, vững chãi. Phần đầu khác biệt với dạng vành khăn phía sau, ẩn chứa hệ thống rada cao cấp. Hai vai gắn khiên lớn, vừa linh động trong chiến đấu vừa là chỗ cất chứa vũ khí hiệu quả. Đây là một mẫu mobile suit đẹp từ cả trong phim đến mô hình ngoài đời.', 7, 900000, '2023-06-19 22:38:36', '2023-06-19 22:38:36'),
(60, 4, 2, 'MICHAELIS', 'Sức mạnh của Michaelis tập trung chủ yếu ở tay phải. Trên đó là Beam Bracer, một thứ vũ khí đa năng. Nó chuyển được qua lại linh hoạt giữa qua chế độ Beam Saber, Beam Canon, Beam Machine Gun tùy vào tình huống giao chiến. Bên ngoài Beam Bracer còn được phủ các lớp bảo vệ, tác dụng không khác gì một khiên chắn. Chưa dừng ở đó, Michaelis có thể tấn công đối thủ bất ngờ bằng cách thu phóng và điều khiển Beam Bracer thông qua dây cáp từ khoảng cách xa.', 786, 450000, '2023-06-19 22:40:25', '2023-06-19 22:40:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `namestore` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ulr` varchar(500) NOT NULL,
  `phonestore` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`id`, `namestore`, `address`, `ulr`, `phonestore`) VALUES
(1, 'Cửa hàng Molla số 1', 'Tầng 4, Crescent Mall, Phú Mỹ Hưng, P. Tân Phú, Q.7, TP HCM', 'store3.jpg', '(028) 6681 0290'),
(2, 'Cửa hàng Molla số 2', 'SH02 TSG Lotus, 190 Sài Đồng, Long Biên, Hà Nội  ', 'store5.jpg', '(024) 6666 3060'),
(3, 'Cửa hàng Molla số 3', 'Tầng 5, Lotte Center, Q. Ba Đình, Hà Nội  ', 'store7.jpg', '(086) 8586 299'),
(4, 'Cửa hàng Molla số 4', 'Tầng 3, TTTM Takashimaya, Q.1, TP HCM', 'store9.jpg', '(028) 6676 5120');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetailid` (`orderid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `productid` (`productid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `brandid` (`brandid`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `configuration`
--
ALTER TABLE `configuration`
  ADD CONSTRAINT `configuration_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brandid`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
