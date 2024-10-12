-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 02:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rmkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'admin123@gmail.com', '2021-02-26 16:24:50'),
(2, 'dika', '$2y$19$/6bQxltF3Xf8C0sgIzlFau38BLk83lTJNJPtycGOIi08YmZ8tbEh.', 'dika@gmail.com', '2024-10-03 11:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `dishesh`
--

CREATE TABLE `dishesh` (
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishesh`
--

INSERT INTO `dishesh` (`d_id`, `r_id`, `name`, `about`, `price`, `img`) VALUES
(1, 3, 'Kuesoes', 'enak', 50000, 'suscoklat.jpeg'),
(2, 1, 'Kue Soes ', 'Kue Soes coklat yang enak dan bergizi', 50000, 'suscoklat.jpeg'),
(3, 3, 'Kue Nastar', 'enak', 50000, 'nastar.jpeg'),
(4, 2, 'Bolu Kukus', 'Bolu kukus Gula merah yang menjadikanya enak mantap', 5000, 'bolukukus.jpeg'),
(5, 2, 'Kue Lapis', 'Kue Lapis yang enak dan mantap', 5000, 'kuelapis.jpg'),
(6, 2, 'Kue Dadar Gulung', 'Kue Dadar Gulung yang enak dan mantap', 5000, 'kuedadargulung.jpg'),
(7, 2, 'Kue Cucur', 'Kue Cucur yang enak dan mantap', 5000, 'Kuecucur.jpeg'),
(8, 2, 'Martabak', 'Martabak yang enak dan mantap', 5000, 'Martabak.jpeg'),
(9, 4, 'Gudeg Jogja', 'Gudeg Jogja yang enak dan mantap', 15000, 'gudeg.jpg'),
(10, 4, 'Rendang Sapi', 'Rendang Sapi yang enak dan mantap', 15000, 'rendang.jpg'),
(11, 4, 'Ayam rica-rica', 'Ayam rica-rica Khas Manado yang enak dan mantap', 15000, 'Ayamricarica.jpeg'),
(12, 4, 'Rawon Jawa Timur', 'Rawon Khas Jawa Timur yang enak dan mantap', 15000, 'RawonJawaTimur.jpeg'),
(13, 4, 'Ayam Betutu', 'Ayam Betutu yang enak dan mantap', 15000, 'AyamBetutu.jpeg'),
(14, 4, 'Sate Ayam', 'Sate Ayam yang enak dan mantap', 15000, 'sateayam.jpg'),
(15, 4, 'Gurame Bakar', 'Gurame Bakar yang enak dan mantap', 15000, 'Guramebakar.jpeg'),
(16, 4, 'Nasi Goreng', 'Nasi Goreng yang enak dan mantap', 15000, 'nasigor.jpg'),
(17, 4, 'Steak', 'Steak daging sapi yang enak dan mantap', 15000, 'stkkk.jpg'),
(18, 3, 'Onde-Onde', 'Onde-Onde yang sangat enak dan mantap', 5000, 'Onde-Onde.jpeg'),
(19, 3, 'Lanting', 'Lanting yang sangat enak dan mantap', 5000, 'lanting.jpg'),
(20, 3, 'Keripik Pisang', 'Keripik Pisang yang sangat enak dan mantap', 5000, 'keripikpisang.jpeg'),
(21, 3, 'Keripik Tempe', 'Keripik Tempe yang gurih dan enak', 5000, 'keripiktempe.jpg'),
(22, 3, 'Kentang Goreng', 'Kentang Goreng yang gurih dan enak', 15000, 'ffries.jpg'),
(23, 3, 'Bakso', 'Bakso yang gurih dan enak', 15000, 'bakso.jpg'),
(24, 1, 'Putri Salju', 'Putri Salju yang enak dan bergizi', 50000, 'putrisalju.jpeg'),
(25, 1, 'Nastar', 'Nastar yang enak dan bergizi', 50000, 'Nastar.jpeg'),
(26, 1, 'Lidah Kucing', 'Lidah Kucing yang enak dan bergizi', 50000, 'lidahkucing.jpeg'),
(27, 1, 'Kastaangle', 'Kastaangle yang enak dan bergizi', 50000, 'kastangle.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `di_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `about` varchar(200) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `display`
--

INSERT INTO `display` (`di_id`, `name`, `price`, `about`, `image`) VALUES
(1, 'soescoklat', 50000, 'enak mantap', 'suscoklat.jpeg'),
(2, 'Kentang Goreng', 25000, 'Wenak', 'ffries.jpg'),
(3, 'Nasi Goreng', 25000, 'Wenak', 'nasigor.jpg'),
(4, 'Mie Ayam', 25000, 'Wenak', 'Mieayam.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `o_hr` varchar(255) NOT NULL,
  `c_hr` varchar(255) NOT NULL,
  `o_days` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`r_id`, `c_id`, `name`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `img`) VALUES
(1, 5, 'Kue Kering', 'kelompok6@gmail.com', '0876876876876', 'www.addustcorp.site', '8am', '7pm', 'mon-sat', 'Menyediakan Kue Kering untuk kita semua', 'kering.jpeg'),
(2, 8, 'Kue Basah', 'kelompok2@gmail.com', '0876876876876', 'www.tkfajarnusantara.site', '8am', '8pm', 'mon-sat', 'Menyediakan Kue Basah untuk kita semua', 'basah.jpg'),
(3, 9, 'Makanan Ringan', 'kelompok2@gmail.com', '0876876876876', 'www.tkfajarnusantara.site', '8am', '8pm', 'mon-sat', 'Menyediakan Makanan Ringan untuk kita semua', 'displayringan.jpg'),
(4, 9, 'Makanan Berat', 'Kelompok2@gmail.com', '0876876876876', 'www.tkfajarnusantara.site', '8am', '8pm', 'mon-sat', 'Menyediakan Makanan Berat untuk kita semua', 'berat.png');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`) VALUES
(5, 'kering'),
(8, 'Basah'),
(9, 'Ringan'),
(10, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`) VALUES
(24, 'Ari', 'bekati', 'ari', 'ria@gmail.com', '086012225470', '$2y$10$pl0kXL/4376t7les3MR5EeKVVZrGxTDzhNjCmqyzkjheeQs5zEJwG', 'jakarta utara'),
(28, 'wiwin', 'P', 'wiwin', 'wiwin@gmail.com', '08254580002', '$2y$10$S87MjBD29LIXmtegDjxa7uiGNKqUiLoMiecJ9vIRxUU9fCtdnfavO', 'rawamangun'),
(33, 'heri', 'Henry', 'hendri', 'henrdy@gmail.com', '085402225000', '$2y$10$yKsf5a6TcTBHEflcfJDKnOu6Hfsw1QNok58uvrj7YWemzM2yMLNZC', 'jatinegara'),
(34, 'juki', 'juki', 'juki', 'juki@gmail.com', '08758744260', '$2y$10$FvSDmYTKWLh9CWuhRUHsfuWqALfXwzR7jIC00y0ZSvTihaFCSnWeG', 'bekasi'),
(35, 'dila69', 'adhila', 'putri', 'adhil@gmail.com', '0822449879', '$2y$10$h7VfLBNtTSQbIZb89U0.8eBtIwdrOiDZdYRgqNom41kuQp70oi1ny', 'jember'),
(36, 'adhita1', 'adhita', 'putri', 'adhita@gmail.com', '0824567898', '$2y$10$nhz2PKMPJuN/I.Bvz778x.lYrz8z6En2vo2DkzIHyXi1UUtj..j9O', 'lumajang'),
(37, 'tgegs', 'qwrw', 'wew', 'a@gmail.com', '0822449879', '$2y$10$N4N5nGJAzpysqePbDC3K4OWYAyklXqWMtcgQJPer3DcTOqXXcjBVa', 'eewffw'),
(38, 'akram', 'akram', 'akram', 'akram@gmail.com', '0880918292', '$2y$10$otSuFbputYVR.Ter.dY1m.zcNlCXeKMuc7Bcxxmoba9zFdx/ZbJPe', 'a'),
(39, 'aaaaa', 'aaaa', 'aaaa', 'a@gmail.com', '0211100324', '$2y$10$48yvQ2vJgWcICXoWNuQawOYAsH0EVd8tQf.gfPZMydmCCRuhUdBIC', 'dqdwdqq');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`o_id`, `u_id`, `d_id`, `d_name`, `quantity`, `price`, `status`, `date`, `success-date`, `r_id`) VALUES
(34, 36, 12, 'Mie Ayam', 1, 15000, 'closed', '2023-03-12 17:35:42', '2023-03-12 16:38:31', 2),
(39, 38, 24, 'Nasi Goreng', 1, 40000, 'rejected', '2024-06-20 12:21:55', '2024-06-20 13:33:50', 2),
(58, 39, 1, 'Kuesoes', 1, 50000, 'closed', '2024-10-05 09:12:21', '2024-10-05 07:13:16', 3),
(59, 39, 2, 'bakso', 1, 50000, 'closed', '2024-10-05 09:19:23', '2024-10-05 07:19:36', 1),
(60, 39, 2, 'bakso', 1, 50000, 'closed', '2024-10-05 12:07:50', '2024-10-05 10:16:20', 1),
(61, 39, 3, 'Kue Nastar', 2, 100000, 'closed', '2024-10-05 12:15:59', '2024-10-05 10:16:15', 3),
(62, 39, 2, 'bakso', 1, 50000, 'closed', '2024-10-05 12:15:59', '2024-10-05 10:16:10', 1),
(63, 39, 5, 'Kue Lapis', 1, 5000, 'closed', '2024-10-06 17:19:14', '2024-10-06 15:19:36', 2),
(64, 39, 2, 'bakso', 1, 50000, 'closed', '2024-10-06 17:19:14', '2024-10-06 15:19:32', 1),
(65, 39, 22, 'Kentang Goreng', 1, 15000, 'closed', '2024-10-06 17:19:14', '2024-10-06 15:19:24', 3),
(66, 39, 16, 'Nasi Goreng', 1, 15000, 'closed', '2024-10-06 17:19:14', '2024-10-06 15:19:21', 4),
(67, 39, 2, 'Kue Soes ', 1, 50000, 'closed', '2024-10-06 17:34:04', '2024-10-06 15:34:20', 1),
(68, 39, 27, 'Kastaangle', 1, 50000, 'closed', '2024-10-06 17:34:04', '2024-10-06 15:34:12', 1),
(69, 39, 11, 'Ayam rica-rica', 1, 15000, 'closed', '2024-10-09 03:04:37', '2024-10-09 01:05:00', 4),
(70, 39, 6, 'Kue Dadar Gulung', 1, 5000, 'closed', '2024-10-09 03:04:37', '2024-10-09 01:04:53', 2),
(71, 39, 9, 'Gudeg Jogja', 2, 30000, 'closed', '2024-10-11 15:38:35', '2024-10-11 13:39:31', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dishesh`
--
ALTER TABLE `dishesh`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dishesh`
--
ALTER TABLE `dishesh`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
