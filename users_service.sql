-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2018 lúc 07:58 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `users_service`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_block` tinyint(4) NOT NULL DEFAULT '0',
  `permision` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `createdate`, `modified`, `is_block`, `permision`, `address`, `phone`) VALUES
(8, 'Dongtu', 'anhlaso1', 'dongtu.hust@gmail.com', '2018-03-18 10:00:38', '2018-08-19 13:47:10', 0, 0, 'Hanoi', 1649361661),
(9, 'Hoang', 'anhlaso1', 'huyhoang@gmail.com', '2018-03-18 10:06:11', '2018-08-19 13:47:10', 0, 0, 'Hanoi', 1),
(11, 'Mung', 'anhlaso1', 'ducmung@gmail.com', '2018-03-18 10:13:27', '2018-08-19 13:47:10', 1, 0, 'Huyn', 22233),
(12, 'ChuDiep', 'anhlaso1', 'chudiep@gmail.com', '2018-03-19 21:43:09', '2018-08-19 13:47:10', 0, 0, 'Hanoi', 2147483647),
(13, 'Dongtu123', 'anhlaso1', 'dongtubk@gmail.com', '2018-03-19 21:47:13', '2018-08-19 13:47:10', 0, 0, 'Hanoi', 0),
(14, 'Thiện', 'dongthien', 'dongthien@gmail.com', '2018-03-19 21:49:31', '2018-08-19 13:47:10', 0, 0, 'Hung Yen', 1),
(15, 'Admin', 'admin', 'admin@gmail.com', '2018-03-19 22:14:53', '2018-08-19 13:47:10', 0, 1, 'Hanoi', 321313),
(16, 'vanthanh', 'anhlaso1', 'vanthanh@gmail.com', '2018-03-20 10:09:31', '2018-08-19 13:47:10', 0, 0, 'Hanoi', 1649361661),
(17, 'hai', 'dongtu', 'hai@gmail.com', '2018-03-25 22:47:17', '2018-08-19 13:47:10', 0, 0, 'hanoi', 2),
(18, 'DuongSon', 'anhlaso1', 'duongson@gmail.com', '2018-05-03 17:10:48', '2018-08-19 13:47:10', 0, 0, 'Văn Giang Hưng Yên', 15656656),
(19, 'dongtugg', 'anhlaso1', 'dongtugg@gmail.com', '2018-05-03 17:12:17', '2018-08-19 13:47:10', 0, 0, 'Yên Mỹ Hưng Yên', 2147483647),
(20, 'LuuVu', 'anhlaso1', 'luuvu@gmail.com', '2018-05-03 17:13:02', '2018-08-19 13:47:10', 0, 0, 'Sóc Sơn', 564542313),
(21, 'StudentBK', 'anhlaso1', '20156827@student.hust.edu.vn', '2018-05-03 17:14:15', '2018-08-19 13:47:10', 0, 0, 'Hà Tĩnh', 15646332),
(22, 'DucHuy97', 'anhlaso1', 'duchuy@gmail.com', '2018-05-03 17:15:14', '2018-08-19 13:47:10', 1, 0, 'Nghệ An', 2147483647),
(23, 'VietTiep', 'anhlaso2', 'viettiep@gmail.com', '2018-05-10 23:19:59', '2018-08-19 13:47:10', 0, 0, 'Hà nội', 1613465);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
