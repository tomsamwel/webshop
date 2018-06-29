-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2018 at 10:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` double(9,2) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `mollie_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `payment_status`, `mollie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 211.30, 'open', NULL, 20, NULL, NULL),
(2, 211.30, 'open', NULL, 21, NULL, NULL),
(3, 211.30, 'open', NULL, 22, '2018-06-27 18:05:36', '2018-06-27 18:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 13.95, 7, '2018-06-27 18:02:11', '2018-06-27 18:02:11'),
(2, 1, 1, 16.95, 5, '2018-06-27 18:02:11', '2018-06-27 18:02:11'),
(3, 1, 3, 14.45, 2, '2018-06-27 18:02:11', '2018-06-27 18:02:11'),
(4, 2, 2, 13.95, 7, '2018-06-27 18:03:43', '2018-06-27 18:03:43'),
(5, 2, 1, 16.95, 5, '2018-06-27 18:03:43', '2018-06-27 18:03:43'),
(6, 2, 3, 14.45, 2, '2018-06-27 18:03:43', '2018-06-27 18:03:43'),
(7, 3, 2, 13.95, 7, '2018-06-27 18:05:36', '2018-06-27 18:05:36'),
(8, 3, 1, 16.95, 5, '2018-06-27 18:05:36', '2018-06-27 18:05:36'),
(9, 3, 3, 14.45, 2, '2018-06-27 18:05:36', '2018-06-27 18:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` double(9,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `description`, `price`, `image`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'bitch-mug', 'b-itch mug - mug', '<p>Let your coworkers know who\'s the queen bee at the office by sipping your coffee from this bitch mug. The clever design of the curvy handle completes the \'itch\' graphic on the mug that leaves nothing open to interpretation about who you really are.</p>', 16.95, 'bitch-mug.jpg', 'Bitch mug', 'Bitch mug', '2018-05-13 17:20:05', '2018-05-13 17:20:05'),
(2, 'nicolas-cage-mug', 'nicolas cage - mug', '<p>Nicolas Cage face - coffee mug. This unique meme mug is a great gift for him or a gift for her. Can also be a great housewarming gift. Lastly this would be a cool office mug.</p>', 13.95, 'nicolas-cage-mug.jpg', 'Nicolas Cage mug', 'Nicolas Cage mug', '2018-05-13 17:21:48', '2018-05-13 17:21:48'),
(3, 'duck-my-sick-mug', 'duck my sick - mug', '<p>Funny Coffee Mug with Duck My Sick. Our 11 oz ceramic coffee mugs are fun gifts for Duck hunters, Boyfriends, husbands, and silly friends.</p>', 14.45, 'duck-my-sick-mug.jpg', 'duck my sick mug', 'duck my sick mug', '2018-05-13 17:21:48', '2018-05-13 17:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `suffix_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT 'NL',
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_number` varchar(255) NOT NULL,
  `street_suffix` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `first_name`, `suffix_name`, `last_name`, `country`, `city`, `street`, `street_number`, `street_suffix`, `zipcode`, `active`, `created_at`, `updated_at`) VALUES
(3, 'fgw4@gmail.com', '', '', 'Tom', '', 'Samwel', 'NL', 'Bla', 'Fsfsfeqw', '233', '', '1232 NK ', 0, '2018-06-27 17:19:48', '2018-06-27 17:19:48'),
(4, 'fgw4@gmail.com', '$2y$11$J16vChvmBogYygMWpfhGCepeeGEe.jMHWyV0E00KhwOQ.SI9/Hlbi', '', 'Tom', '', 'Samwel', 'NL', 'Bla', 'Fsfsfeqw', '233', '', '1232 NK ', 0, '2018-06-27 17:19:49', '2018-06-27 17:19:49'),
(5, 'vfbdrgwf4@gmail.com', '', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:20:21', '2018-06-27 17:20:21'),
(6, 'vfbdrgwf4@gmail.com', '$2y$11$uRTk6G1u2NecAC7GrO6AGO3Oc/udADnTI9lTIC7oe131ewM2U8PtK', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:20:22', '2018-06-27 17:20:22'),
(7, 'vfbdrgwf4@gmail.com', '', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:26:47', '2018-06-27 17:26:47'),
(8, 'vfbdrgwf4@gmail.com', '$2y$11$MY.EUqWiNgsRk0yRGlTrp.kiTA7JEHLKumIBDRcZlts4ZK5y9YZFm', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:26:47', '2018-06-27 17:26:47'),
(9, 'vfbdrgwf4@gmail.com', '', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:27:14', '2018-06-27 17:27:14'),
(10, 'vfbdrgwf4@gmail.com', '$2y$11$zOHHAmrcPcy4eXyYRlX7Fu3tbDPVpQBgcd2yGIJvhzsXeEds24nNi', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:27:15', '2018-06-27 17:27:15'),
(11, 'vfbdrgwf4@gmail.com', '', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:32:57', '2018-06-27 17:32:57'),
(12, 'vfbdrgwf4@gmail.com', '$2y$11$cvwYijPGyRVcHyZ8Ir1gQOPY7eKrdNF0zGbuutPovUeVXVR3gwhsy', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:32:58', '2018-06-27 17:32:58'),
(13, 'vfbdrgwf4@gmail.com', '', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:34:29', '2018-06-27 17:34:29'),
(14, 'vfbdrgwf4@gmail.com', '$2y$11$b8Oi28v4sF9/egYbqXEQ..IZ5ZnRlr9aRy01gkSHaMH/yT417/UPK', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:34:29', '2018-06-27 17:34:29'),
(15, 'vfbdrgwf4@gmail.com', '$2y$11$bHQXKSrDTjqLLNVhTSmUN.eJWlVydmzRHWsKFvjKF.2nJ0F5o4maa', '', 'Egr', '', 'Gerg', 'NL', 'Gerr', 'Fsfe', '234', '', '1203 ML ', 0, '2018-06-27 17:38:09', '2018-06-27 17:38:09'),
(16, 'fgr@gmail.com', '$2y$11$taPgdHb5.jZTx.CYedBXh.K28O1XoPeVfN/N4LDdMjTuCs.tBCYZu', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 17:57:35', '2018-06-27 17:57:35'),
(17, 'fgr@gmail.com', '$2y$11$XqXT/dveNh8znRh7EB2rQeBOLdbYURqjGhbgivzdrV4M2RTjNOnBC', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 17:58:02', '2018-06-27 17:58:02'),
(18, 'fgr@gmail.com', '$2y$11$g13QLw9XgpQGNq75CgIaPuoBCdccr8i23FXRlh6uLOLxgNcuL9Ydm', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 17:58:50', '2018-06-27 17:58:50'),
(19, 'fgr@gmail.com', '$2y$11$SPZf0pWtp6el2PtzN.WdGe3ht6cwo.5iNHScNCfNrXVybAE6xXwHi', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 18:00:19', '2018-06-27 18:00:19'),
(20, 'fgr@gmail.com', '$2y$11$bM6fWYiVGPAOsfsRvfH.vO/9.IYWuxTnxCsRmMONxmKnreP0evJwu', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 18:02:11', '2018-06-27 18:02:11'),
(21, 'fgr@gmail.com', '$2y$11$CCEUVMMfV8AolNDTEm/ESOaoAJZj3hEJWp./EPZD5cHIhnHAN9mGO', '', 'Tom', '', 'Samwel', 'NL', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 18:03:43', '2018-06-27 18:03:43'),
(22, 'fgr@gmail.com', '$2y$11$FZdTZJ07FlLf5rCQ61BSJOfVE9KUEKiwV3zJhjoKeGGQIgjHQq8h6', '', 'Tom', '', 'Samwel', 'DE', 'Vsawd', 'Fwf3', '234', '', '1232 NK ', 0, '2018-06-27 18:05:36', '2018-06-27 18:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
