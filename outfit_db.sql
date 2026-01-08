-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2025 at 02:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outfit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kaos Pria', 'kaos-pria', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(2, 'Kemeja Pria', 'kemeja-pria', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(3, 'Jaket & Hoodie', 'jaket-hoodie', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(4, 'Celana Jeans', 'celana-jeans', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(5, 'Pakaian Wanita', 'pakaian-wanita', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(6, 'Dress Wanita', 'dress-wanita', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(7, 'Pakaian Anak', 'pakaian-anak', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57'),
(8, 'Aksesoris Fashion', 'aksesoris-fashion', NULL, '2025-12-18 17:20:57', '2025-12-18 17:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(180) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `content`, `image`, `created_at`, `updated_at`) VALUES
(2, 'km', 'mk', 'lm', NULL, '2025-12-18 17:48:32', '2025-12-18 17:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `total_price` int(11) DEFAULT NULL,
  `status` enum('pending','paid','shipping','done','cancel') DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `slug` varchar(160) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `price`, `stock`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 1, 'Purple Hoodie', 'purple-hoodie', 110000, 20, 'Hoodie warna ungu, bahan nyaman dan hangat', 'images/product_1.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(5, 2, 'Green Orange Handbag', 'green-orange-handbag', 90000, 15, 'Tas wanita warna hijau dan orange', 'images/product_2.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(6, 1, 'Yellow Furry Sweater', 'yellow-furry-sweater', 100000, 10, 'Sweater berbulu warna kuning', 'images/product_3.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(7, 3, 'Green Sports Bag', 'green-sports-bag', 150000, 12, 'Tas olahraga warna hijau', 'images/product_4.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(8, 4, 'Light Brown Shoes', 'light-brown-shoes', 180000, 8, 'Sepatu coklat muda casual', 'images/product_5.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(9, 5, 'Black Sunglasses', 'black-sunglasses', 60000, 25, 'Kacamata hitam stylish', 'images/product_6.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(10, 1, 'Dark Orange Sweater', 'dark-orange-sweater', 120000, 14, 'Sweater warna orange gelap', 'images/product_7.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(11, 5, 'Brown Wallet', 'brown-wallet', 80000, 30, 'Dompet kulit warna coklat', 'images/product_8.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(12, 1, 'Brown Wool Coat', 'brown-wool-coat', 110000, 6, 'Jaket wol warna coklat', 'images/product_9.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(13, 1, 'Green T-Shirt', 'green-t-shirt', 100000, 20, 'Kaos hijau santai', 'images/product_10.png', '2025-12-18 18:13:11', '2025-12-18 18:13:11'),
(14, 1, 'Kaos Uniqlo pria', NULL, 200000, 10, 'Kaos uniqlo pria hitam', 'uploads/products/1766053180_02e54a804a09b1b26373.jpg', '2025-12-18 18:19:40', '2025-12-18 18:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Windhu', 'baguswindu05@gmail.com', '$2y$10$vWuq1fJBKYsQ6yQnfsLOg.A5/XenR13pY1xYjJjbeZZ5a9HjhcXEO', 2, '2025-11-11 06:30:44', '2025-11-11 06:30:44'),
(2, 'Administrator', 'admin@example.com', '$2y$10$fDZ61sg4wdPzJWtzEuKmme7hodi8YK5Y0lVPKpTN6xwZH1wIILDJK', 1, '2025-12-01 13:55:26', '2025-12-01 13:55:26'),
(3, 'Admin', 'Admin@gmail.com', '$2y$10$rflmkg06mCiTK4YUhPIWvO.Od7rpOfoMdVm6XH.aF.u9VtK4QJiXu', 1, '2025-12-11 06:53:41', '2025-12-11 06:53:41'),
(4, 'user', 'User@gmail.com', '$2y$10$uwO9PIy88S4DRmIjFLs26OOE4nFfVIFzBu55lYQ1iCtUTKRFiiEmu', 2, '2025-12-11 07:23:41', '2025-12-11 07:23:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
