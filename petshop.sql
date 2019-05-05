-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2019 pada 13.45
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `units_product` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`cart_id`, `product_code`, `email`, `units_product`, `total_price`) VALUES
(1, 'WEB2', 'muhammadyusufadip.1999@gmail.com', 2, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `productid`, `unit_price`, `quantity`, `discount`) VALUES
(1, 2, 40000, 2, 2.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `units` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shipped_date` datetime NOT NULL,
  `arrived_date` datetime NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `ship_price` double NOT NULL,
  `ship_city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `product_code`, `units`, `total_price`, `email`, `order_date`, `shipped_date`, `arrived_date`, `shipper_id`, `cart_id`, `ship_price`, `ship_city`) VALUES
(1, 'WEB2', 2, 80000, 'muhammadyusufadip.1999@gmail.com', '0000-00-00 00:00:00', '2019-05-06 00:00:00', '2019-05-14 00:00:00', 2, 1, 18000, 'Yogyakarta'),
(2, 'WEB2', 2, 80000, 'muhammadyusufadip.1999@gmail.com', '2019-05-04 13:43:17', '2019-05-07 00:00:00', '2019-05-14 00:00:00', 2, 1, 18000, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_desc` tinytext,
  `product_img_name` varchar(60) NOT NULL,
  `qty_product` int(11) NOT NULL,
  `price_product` float NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_type` varchar(30) DEFAULT 'pet',
  `product_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`productid`, `product_code`, `product_desc`, `product_img_name`, `qty_product`, `price_product`, `product_name`, `product_type`, `product_rating`) VALUES
(1, 'WEB1', 'Ini adalah anjing cihuahua yang wah', 'chihuahuawah.jpg', 1, 9000000, 'Cihuahua Wah', 'pet', 4),
(2, 'WEB2', 'Makanan kucing terbaik whiskas 40gr', 'whiskas.jpg', 50, 40000, 'Whiskas 40gr', 'food', 3),
(3, 'WEB3', 'Ini makanan anjing terbaik', 'dogfood.jpg', 100, 120000, 'Dog Food', 'food', 5),
(4, 'WEB4', 'Mainan landak Terbaik', 'landaktoy.jpg', 20, 100000, 'Landak Roll', 'toy', 2),
(5, 'WEB5', 'Aquarium terbaik dari atlantis', 'aquarium1.jpg', 5, 50000000, 'Aquarium Aquaman', 'place', 3),
(6, 'WEB6', 'Decor Untuk Kamar Kucing', 'decorcat.jpg', 15, 340000, 'Decor Cat Room', 'acessoris', 5),
(7, 'WEB7', 'Mainan Untuk Anjing Jinak Kalo Galak Jangan Beli', 'jinak.jpg', 30, 10230000, 'Toy Dog', 'toy', 2),
(8, 'WEB8', 'Baju Untuk Kucing Eksclusif', 'bajukucing.jpg', 100, 60000000, 'Baju Kucing', 'clothes', 5),
(9, 'WEB9', 'Baju Untuk Kucing Miskin', 'bajukucingmis.jpg', 200, 5999, 'Baju Kucing Miskin', 'clothes', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shippers`
--

CREATE TABLE `shippers` (
  `shipper_id` int(11) NOT NULL,
  `shipper_name` enum('JNE','JNT','POS INDONESIA') NOT NULL,
  `shipper_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipper_name`, `shipper_phone`) VALUES
(1, 'JNE', '082251159781'),
(2, 'JNT', '082251159782'),
(3, 'POS INDONESIA', '082251159783');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_city` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `user_sex` enum('M','F') NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_address`, `user_city`, `email`, `password`, `user_type`, `user_sex`, `date_entered`) VALUES
(1, 'Rizky', 'Harahap', 'Jl. Condongcatur No.52', 'Yogyakarta', 'rizkyhrh@gmail.com', '1234', 'user', 'M', '2019-05-04 05:47:20'),
(2, 'Yusuf', 'Adi', 'Jl. Tentara Rakyat Mataram', 'Yogyakarta', 'muhammadyusufadip.1999@gmail.com', '1235', 'user', 'M', '2019-05-04 06:01:59'),
(3, 'Kiky', 'Hidayat', 'Jl. Mana Aja Masuk', 'Tegal', 'kikisenapanawan@gmail.com', '1236', 'user', 'M', '2019-05-04 06:01:59'),
(4, 'Anglilasandyakala', 'Gandhari P.', 'Jl. Godean', 'Cilacap', 'anglilasandyakala9@gmail.com', '1237', 'user', 'F', '2019-05-04 06:01:59'),
(6, 'Rizky', 'Mahfudin', 'Jl. Semarang Baru', 'Semarang', 'akuadmin@gmail.com', '12345', 'admin', 'M', '2019-05-04 06:07:31'),
(7, 'aku', 'aku', 'aku', 'aku', 'aku@gmail.com', 'aku', 'user', 'M', '2019-05-04 19:23:55'),
(8, 'kamu', 'kamu', 'kamu', 'kamu', 'kamu@gmail.com', '$2y$10$4yCM7RuFh2LEsf6O7Pf5kOFqVcPkoAALovuXn8.HyjW.pmBsPB4YW', 'user', 'F', '2019-05-04 20:43:55'),
(12, 'dikamu', 'dikamu', 'dikamu', 'dikamu', 'dikamu@gmail.com', '$2y$10$4QIq5T4myd5LVY/nqwWZvu4BEI9LKo4nd2R6mcY5gS5U4iSZh/4oi', 'user', 'M', '2019-05-04 20:53:28'),
(13, 'admin', 'admin', 'Jt.1/759 Jl. Tentara Rakyat Mataram Kec. Jetis Kel. Bumijo', 'Yogyakarta', 'admin@gmail.com', '$2y$10$1E2rbSpUXZJutIyF5lISEuLHabqE9qm6vuCjDo3b9h4PorpahNt4G', 'admin', 'M', '2019-05-05 10:44:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cartproduct` (`product_code`),
  ADD KEY `fk_cartuser` (`email`);

--
-- Indeks untuk tabel `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `fk_orderdetail` (`order_id`),
  ADD KEY `fk_productdetail` (`productid`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_productorder` (`product_code`),
  ADD KEY `fk_userorder` (`email`),
  ADD KEY `fk_ordershipper` (`shipper_id`),
  ADD KEY `fk_ordercart` (`cart_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indeks untuk tabel `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `shippers`
--
ALTER TABLE `shippers`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_cartproduct` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`),
  ADD CONSTRAINT `fk_cartuser` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Ketidakleluasaan untuk tabel `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderdetail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_productdetail` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_ordercart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  ADD CONSTRAINT `fk_ordershipper` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`shipper_id`),
  ADD CONSTRAINT `fk_productorder` FOREIGN KEY (`product_code`) REFERENCES `products` (`product_code`),
  ADD CONSTRAINT `fk_userorder` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
