-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2021 at 11:45 AM
-- Server version: 5.5.62
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_rakyat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_product_quantity` int(11) NOT NULL,
  `cart_product_price` int(11) NOT NULL,
  `cart_product_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Computers & Laptop'),
(2, 'Cameras & Photos'),
(3, 'Hardware'),
(4, 'Smarthphone & Tablet'),
(5, 'TV & Audio'),
(6, 'Gadgets'),
(7, 'Car Electronics'),
(8, 'Games & Consoles'),
(9, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `dotw`
--

CREATE TABLE `dotw` (
  `dotw_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dotw_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dotw_expired` date NOT NULL,
  `dotw_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orders_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_quantity` int(11) NOT NULL,
  `orders_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image_1` text,
  `product_image_2` text,
  `product_image_3` text,
  `product_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_quantity`, `product_price`, `product_image_1`, `product_image_2`, `product_image_3`, `product_created_at`, `category_id`) VALUES
(1, 'apple iPhone 8 64 GB Red', '<table class=\"additional-attributes table table-borderless\">\r\n<tbody>\r\n<tr>\r\n<td>Tipe Layar</td>\r\n<td>\r\n<div>\r\n<p>Layar Retina HD<br />Layar lebar LCD Multi-Touch 4,7 inci (diagonal) dengan teknologi IPS<br />Resolusi 1334 x 750 piksel pada 326 ppi<br />Rasio kontras 1400:1 (umum)<br />Layar True Tone<br />Layar warna luas (P3)<br />3D Touch<br />Kecerahan maks 625 nit (umum)</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Ukuran dan Berat</td>\r\n<td>\r\n<div>\r\n<p>Tinggi 138,4 mm<br />Lebar 67,3 mm<br />Tebal 7,3 mm<br />Berat 148 gram</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Tahan Cipratan, Air, dan Debu</td>\r\n<td>\r\n<div>\r\n<p>Level IP67 (kedalaman maksimum 1 meter hingga selama 30 menit) menurut standar IEC 60529</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Chip</td>\r\n<td>\r\n<div>\r\n<p>Chip A11 Bionic, Neural Engine</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Kamera</td>\r\n<td>\r\n<div>\r\n<p>Kamera 12 MP Wide<br />Wide: bukaan &fnof;/1.8<br />Penstabilan gambar optik<br />Zoom digital hingga 5x<br />Flash True Tone dengan Slow Sync<br />HDR otomatis untuk foto</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Perekaman Video</td>\r\n<td>\r\n<div>\r\n<p>Mampu merekam video 4K pada kecepatan 24 fps, 30 fps, atau 60 fps<br />Mampu merekam video HD 1080p pada kecepatan 30 fps atau 60 fps<br />Penstabilan gambar optik untuk video<br />Zoom digital hingga 3x<br />Dukungan video slo-mo untuk 1080p pada kecepatan 120 fps atau 240 fps<br />Video selang waktu dengan penstabilan</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Kamera Depan</td>\r\n<td>\r\n<div>\r\n<p>Kamera FaceTime HD<br />Foto 7 MP<br />Bukaan &fnof;/2.2<br />Retina Flash<br />HDR otomatis untuk foto<br />Mampu merekam video HD 1080p pada kecepatan 30 fps</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Seluler dan Nirkabel</td>\r\n<td>\r\n<div>\r\n<p>GSM/EDGE<br />UMTS/HSPA+<br />DC-HSDPA<br />CDMA EV-DO Rev. A (beberapa model)<br />LTE Advanced<br />Wi-Fi 802.11ac dengan MIMO<br />Bluetooth 5.0<br />GPS/GNSS bawaan<br />NFC dengan mode pembaca<br />Kartu Express</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Autentikasi Aman</td>\r\n<td>\r\n<div>\r\n<p>Touch ID<br />Sensor sidik jari generasi kedua terpasang di tombol Home</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Panggilan Video</td>\r\n<td>\r\n<div>\r\n<p>Video FaceTime<br />Memulai panggilan video melalui Wi-Fi atau seluler ke perangkat berkemampuan FaceTime</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Panggilan Audio</td>\r\n<td>\r\n<div>\r\n<p>Audio FaceTime<br />Memulai panggilan audio melalui Wi-Fi atau seluler ke perangkat berkemampuan audio FaceTime</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Pemutaran Audio</td>\r\n<td>\r\n<div>\r\n<p>Pemutaran stereo</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Pemutaran Video</td>\r\n<td>\r\n<div>\r\n<p>Mendukung Dolby Vision dan konten HDR10</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Daya dan Baterai</td>\r\n<td>\r\n<div>\r\n<p>Dengan waktu pakai yang serupa dengan iPhone 7<br />Baterai lithium-ion bawaan yang dapat diisi ulang<br />Pengisian daya nirkabel<br />Mengisi daya melalui USB ke sistem komputer atau adaptor daya</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Headphone yang Disertakan</td>\r\n<td>\r\n<div>EarPods dengan Konektor Lightning</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Sensor</td>\r\n<td>\r\n<div>\r\n<p>Gyro tiga sumbu<br />Akselerometer<br />Sensor kedekatan jarak<br />Sensor cahaya sekitar<br />Barometer</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Kartu SIM</td>\r\n<td>\r\n<div>\r\n<p>Nano-SIM<br />Tidak kompatibel dengan kartu micro-SIM yang ada</p>\r\n</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Konektor</td>\r\n<td>\r\n<div>Lightning</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Brand</td>\r\n<td>\r\n<div>Apple</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, 8000000, '1-4-img-1.jpg', '1-4-img-2.jpg', '1-4-img-3.jpg', '2021-01-23 11:57:50', 4),
(2, 'Laptop Asus VivoBook S14 A411U Intel Core i5-8250U CPU Ram 4 GB HDD 1TB', '<table class=\"table-widget\">\r\n<tbody>\r\n<tr>\r\n<th class=\"th-kriteria\">Kriteria</th>\r\n<th class=\"th-spec\">Spesifikasi</th>\r\n</tr>\r\n<tr>\r\n<td><strong>Ukuran Layar</strong></td>\r\n<td><a href=\"https://www.pricebook.co.id/laptop?screen_size=14---14.9\">14 inch</a></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Resolusi Layar</strong></td>\r\n<td>&ndash;</td>\r\n</tr>\r\n<tr>\r\n<td><strong>OS</strong></td>\r\n<td><a href=\"https://www.pricebook.co.id/laptop?operating_system=Windows+10\">Windows 10</a></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Tipe Prosesor</strong></td>\r\n<td><a href=\"https://www.pricebook.co.id/laptop?processor_type=Core+i5\">Core i5</a></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Nomor Prosesor</strong></td>\r\n<td>8250U</td>\r\n</tr>\r\n<tr>\r\n<td><strong>RAM</strong></td>\r\n<td>8 GB</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Kapasitas HDD</strong></td>\r\n<td><a href=\"https://www.pricebook.co.id/laptop?storage_size=1024---\">1 TB</a></td>\r\n</tr>\r\n<tr>\r\n<td><strong>Kartu Grafis</strong></td>\r\n<td>&ndash;</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Tipe Kartu Grafis</strong></td>\r\n<td>Nvidia GeForce MX130</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Graphic Card Memory Size</strong></td>\r\n<td>2 GB</td>\r\n</tr>\r\n<tr>\r\n<td><strong>USB 3.0</strong></td>\r\n<td>&ndash;</td>\r\n</tr>\r\n<tr>\r\n<td><strong>Battery</strong></td>\r\n<td>3-cell, 42WHrs</td>\r\n</tr>\r\n</tbody>\r\n</table>', 5, 8000000, '2-1-img-1.jpg', '2-1-img-2.jpg', '2-1-img-3.jpg', '2021-01-23 12:14:22', 1),
(3, 'Samsung Galaxy A12', '<p>Spesifikasi Samsung Galaxy A12 Layar 6,5 inci HD Plus (1.600 x 720 piksel) Chipset Mediatek Helio P35 CPU dan GPU Octa-core 2.3GHz RAM 4 GB dan 6 GB Internal Storage 128 GB SIM dan MicroSD Dual SIM (Nano) + Micro SD (hingga 1 TB) Kamera Depan 8 MP (f/2.2) Kamera Belakang Kamera utama 48 MP (f/2.0), Kamera ultra-wide 5 MP (f/2.2), Kamera live focus 2 MP (f/2.4), dan Kamera macro 2 MP (f/2.4). Sistem Operasi Android 10, One UI Core 2.5 Baterai 5.000 mAh fast charging 15 Watt Fitur Lainnya Fingerprint, Bluetooth 5.0, WiFi b/g/n, audio Dolby Atmos. Warna Hitam, biru, putih Harga Rp 2,5 juta (4 GB/128 GB) Rp 2,8 juta (6 GB/128 GB)</p>', 5, 2800000, '3-4-img-1.jpg', '3-4-img-2.jpg', '3-4-img-3.jpg', '2021-01-23 12:35:38', 4),
(4, 'Sony α6000 (Sony A6000)', '<h3>Spesifikasi Sony A6000 di Indonesia</h3>\r\n<ul>\r\n<li>Lens mount: Sony E-mount</li>\r\n<li>Resolusi kamera: 24.3MP APS-C Exmor APS HD CMOS Sensor, 6000 x 4000 pixel maksimal resolusi</li>\r\n<li>ISO: Auto, 100-25600</li>\r\n<li>Aspect ratio: 3:2</li>\r\n<li>Tipe sensor: CMOS, 23,5 x 15,6 mm</li>\r\n<li>Format file: JPEG, RAW untuk foto, MP4, MPEG-4 AVC/H.264 untuk video</li>\r\n<li>Kapasitas baterai: 1080 mAh</li>\r\n<li>Fitur lainnya: Built-In Wi-Fi dan NFC</li>\r\n<li>Harga Sony A6000: Mulai dari Rp6.000.000</li>\r\n</ul>', 5, 5000000, '4-2-img-1.jpg', '4-2-img-2.jpg', '4-2-img-3.jpg', '2021-01-23 12:45:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `key` text NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `key`, `value`) VALUES
(1, 'system_name', 'Toko Rakyat'),
(2, 'system_title', 'Toko Rakyat'),
(3, 'system_email', 'customer.care@toko.pelatihan.co.id'),
(4, 'address', 'Jl. Dulu Aja'),
(5, 'phone', '+62000000001'),
(6, 'slogan', ''),
(7, 'website_description', '<p>Hi There</p>\r\n<p>I love her</p>'),
(8, 'website_keywords', 'Tes'),
(9, 'protocol', 'SMTP'),
(10, 'smtp_host', 'ssl://'),
(11, 'smtp_port', '465'),
(12, 'smtp_user', NULL),
(13, 'smtp_pass', NULL),
(14, 'version', ''),
(15, 'logo', 'Logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` text,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','employe','user') NOT NULL DEFAULT 'user',
  `address` text NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `password`, `email`, `role`, `address`, `last_login`, `photo`, `created_at`, `token`, `is_active`) VALUES
(1, 'Admin Toko Rakyat', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'admin@a.com', 'admin', '<p>Jl. Mawar</p>', '2021-01-28 00:38:42', '1_profile.jpg', '2020-10-18 01:34:08', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dotw`
--
ALTER TABLE `dotw`
  ADD PRIMARY KEY (`dotw_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dotw`
--
ALTER TABLE `dotw`
  MODIFY `dotw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `dotw`
--
ALTER TABLE `dotw`
  ADD CONSTRAINT `dotw_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
