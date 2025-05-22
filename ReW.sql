-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2025 at 11:31 AM
-- Server version: 10.11.11-MariaDB-0+deb12u1
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ReW`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `photo`, `phone`, `addres`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Illia', 'admin@gmail.com', NULL, '$2y$12$CEOIWZ4wz3AmLrwAm4jbkehSLUTmD.pPumiskjK7XHcpZ4kKBlDmS', '', '1733815373.jpg', '046893731211', 'alo 12c432', 'admin', '1', NULL, '2024-10-24 09:14:16', '2024-12-10 05:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(3, 'upload/banner/1827556210148886.webp', 'sdfsdf', '2025-03-25 06:29:29', '2025-03-25 07:03:39'),
(7, 'upload/banner/1827730926883313.webp', NULL, '2025-03-27 05:20:42', '2025-03-27 05:20:42'),
(8, 'upload/banner/1827730938228528.webp', NULL, '2025-03-27 05:20:53', '2025-03-27 05:20:53'),
(9, 'upload/banner/1832617638414443.avif', 'http://127.0.0.1:8000/restaurant/details/2', '2025-05-20 02:52:53', '2025-05-20 02:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:10:\"group_name\";}s:11:\"permissions\";a:18:{i:0;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"category.all\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:8:\"Category\";}i:1;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"category.add\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:8:\"Category\";}i:2;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:13:\"category.edit\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:8:\"Category\";}i:3;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"city.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:4:\"City\";}i:4;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:8:\"city.all\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:4:\"City\";}i:5;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"product.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Product\";}i:6;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"product.all\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Product\";}i:7;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"product.add\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Product\";}i:8;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"product.edit\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Product\";}i:9;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:14:\"product.delete\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Product\";}i:10;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"restaurant.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:10:\"Restaurant\";}i:11;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:18:\"pending.restaurant\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:10:\"Restaurant\";}i:12;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:18:\"approve.restaurant\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:10:\"Restaurant\";}i:13;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:11:\"banner.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:6:\"Banner\";}i:14;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:10:\"banner.all\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:6:\"Banner\";}i:15;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:10:\"order.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:5:\"Order\";}i:16;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:12:\"reports.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:7:\"Reports\";}i:17;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:11:\"review.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:6:\"Review\";}}s:5:\"roles\";a:0:{}}', 1747999364);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Burger', 'upload/category/1825014448408677.webp', '2025-02-25 05:43:26', '2025-02-25 05:43:26'),
(9, 'Cake', 'upload/category/1825014463345125.webp', '2025-02-25 05:43:40', '2025-02-25 05:43:40'),
(10, 'sdfsd', 'upload/category/1825563704105066.webp', '2025-03-03 07:13:37', '2025-03-03 07:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_slug`, `created_at`, `updated_at`) VALUES
(4, 'Pori Pori', 'pori-pori', '2025-03-03 07:02:09', '2025-03-05 04:49:47'),
(9, 'Helsinki', 'helsinki', '2025-03-05 04:49:22', '2025-03-05 04:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL,
  `city_id` int(255) DEFAULT NULL,
  `shop_info` text DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `token`, `photo`, `phone`, `addres`, `city_id`, `shop_info`, `cover_photo`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sakura', 'sakura@gmail.com', NULL, '$2y$12$3gI8qANOJ/R3AcDEYnDvWupFyYOnbdwSwvE3ll88o9ZQNZjalSofa', NULL, '1742195787.jpg', '0468937312', 'Annikintie 12', 9, 'No info', '1742195787.webp', 'client', '1', NULL, NULL, '2025-03-25 09:00:21'),
(2, 'SAK', 'sak@gmail.com', NULL, '$2y$12$QBdjKSjFmLokTEx8CBSEzedEFaFwfXgwOCt/EfcKtDbZKn8pc0Lqq', NULL, '1743487168.avif', '0468937312', 'Eteläesplanadi 14, Helsinki', NULL, 'Tervetuloa. Helsingin kattojen yllä Esplanadin puiston laidalla sijaitseva ravintolamme on palvellut asiakkaita jo yli 85 vuoden ajan. Tätä nykyä ravintolaa johtaa Chef Patron Helena Puolakka, jonka aikana ravintolaa on kunnostettu ja uudistettu kunnianhimoisesti. Puolakan tavoitteena on tarjota elämyksiä, jotka kunnioittavat ravintolan historiaa mutta ovat kiinni tässä päivässä. Savoyn ruoka on suomalais-ranskalaista ja sesonkivetoista. Viinikellarimme on yksi Suomen laajimmista.', '1743487168.jpg', 'client', '1', NULL, NULL, '2025-04-16 06:58:37'),
(3, 'Kebab', 'kebab@kebab.hh', NULL, '$2y$12$QBdjKSjFmLokTEx8CBSEzedEFaFwfXgwOCt/EfcKtDbZKn8pc0Lqq', NULL, '1743486963.webp', '+123142412', 'Annikiintie 1', 9, 'Good Food', '1743486803.webp', 'client', '1', NULL, NULL, '2025-04-01 02:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_desc` text DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `validity` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_desc`, `discount`, `validity`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LUCKY5', 'discount 5$', 5, '2025-03-20', '1', 1, '2025-03-17 07:17:38', '2025-03-17 07:17:38'),
(3, 'GG', 'GG', 11, '2025-03-17', '1', 1, '2025-03-17 09:08:49', '2025-03-17 09:12:53'),
(5, 'LOX12', 'lox', 10, '2025-03-20', '3', 1, '2025-03-19 04:51:26', '2025-03-19 04:51:26'),
(10, 'ABVVA123', 'fdsgf3t', 50, '2025-04-25', '2', 1, '2025-04-23 06:52:32', '2025-04-23 06:52:32'),
(11, 'DIS10', 'Discount 10 euro', 10, '2025-05-22', '2', 1, '2025-05-21 02:54:23', '2025-05-21 02:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(5, 2, 2, NULL, NULL),
(7, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `gallery_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `client_id`, `gallery_img`, `created_at`, `updated_at`) VALUES
(1, '3', 'upload/gallery/1827003941283733.webp', NULL, NULL),
(2, '3', 'upload/gallery/1827003952470258.png', NULL, NULL),
(3, '3', 'upload/gallery/1827003952497975.webp', NULL, NULL),
(4, '3', 'upload/gallery/1827003952525618.webp', NULL, NULL),
(5, '3', 'upload/gallery/1827003952553952.webp', NULL, NULL),
(9, '2', 'upload/gallery/1828363358867969.webp', NULL, NULL),
(10, '2', 'upload/gallery/1828363359008571.jpeg', NULL, NULL),
(11, '2', 'upload/gallery/1828363359036034.jpg', NULL, NULL),
(12, '2', 'upload/gallery/1829628163954728.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `client_id`, `created_at`, `updated_at`, `menu_name`, `image`) VALUES
(2, 1, '2025-03-13 04:35:11', '2025-03-27 05:32:48', 'Deserts', 'upload/menu/1826459705484223.webp'),
(6, 3, '2025-03-19 04:49:58', '2025-03-19 04:49:58', 'Pasta', 'upload/menu/1827004218032695.png'),
(7, 1, '2025-03-26 06:49:37', '2025-03-26 06:49:37', 'Vegan Pizza', 'upload/menu/1827645924129062.webp'),
(8, 1, '2025-03-26 06:49:49', '2025-03-26 06:49:49', 'Burgers', 'upload/menu/1827645936487621.webp'),
(9, 3, '2025-03-26 06:51:48', '2025-03-26 06:51:48', 'Pizza', 'upload/menu/1827646061849255.webp'),
(10, 3, '2025-03-26 06:51:55', '2025-03-26 06:51:55', 'Kebab', 'upload/menu/1827646069285222.webp'),
(11, 2, '2025-03-26 06:57:31', '2025-04-17 02:59:59', 'Soups', 'upload/menu/1827646421061652.webp'),
(12, 2, '2025-03-26 06:57:37', '2025-04-17 03:00:05', 'Food', 'upload/menu/1827646427050212.webp'),
(13, 2, '2025-03-26 06:57:43', '2025-04-03 03:14:02', 'Desserts', 'upload/menu/1827646434071632.png'),
(14, 2, '2025-04-17 02:57:56', '2025-04-17 02:59:29', 'Steak', 'upload/menu/1829628255850859.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_10_24_120328_create_admins_table', 2),
(8, '2024_11_28_110243_create_cliens_table', 3),
(9, '2025_02_16_125813_create_categories_table', 4),
(10, '2025_03_03_070452_create_cities_table', 5),
(11, '2025_03_12_121429_create_menus_table', 6),
(12, '2025_03_12_135111_create_products_table', 7),
(13, '2025_03_17_065810_create_coupons_table', 8),
(14, '2025_03_14_131340_create_galleries_table', 9),
(15, '2025_03_25_071049_create_banners_table', 10),
(16, '2025_04_03_075634_create_favourites_table', 11),
(17, '2025_04_24_095445_create_orders_table', 12),
(18, '2025_04_24_095458_create_order_items_table', 13),
(19, '2025_05_13_072546_create_reviews_table', 14),
(20, '2025_05_21_082242_create_permission_tables', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `order_month` varchar(255) DEFAULT NULL,
  `order_year` varchar(255) DEFAULT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processed_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `total_amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processed_date`, `shipped_date`, `delivered_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 206, 103, NULL, 'easyshop36079318', '24 April 2025', 'April', '2025', NULL, NULL, NULL, NULL, 'delivered', '2025-04-24 08:46:49', '2025-04-29 08:33:05'),
(5, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 94, 94, NULL, 'easyshop96797949', '29 April 2025', 'April', '2025', NULL, NULL, NULL, NULL, 'confirm', '2025-04-29 02:45:18', '2025-05-06 02:56:47'),
(6, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 90, 90, NULL, 'easyshop37376458', '29 April 2025', 'April', '2025', NULL, NULL, NULL, NULL, 'delivered', '2025-04-29 03:22:44', '2025-04-29 08:33:29'),
(7, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 153, 153, NULL, 'easyshop93121521', '08 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-08 02:41:50', NULL),
(8, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 160, 160, NULL, 'easyshop57562691', '08 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-08 03:32:31', NULL),
(10, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'EUR', 112, 112, NULL, 'easyshop99223880', '13 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-13 03:05:23', NULL),
(11, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'card_1RR7gEFk24PkRvuClQUAE3aM', 'Stripe', 'txn_3RR7gFFk24PkRvuC1lYlfg2Z', 'usd', 13, 13, '6735', 'easyshop49989182', '21 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-21 05:07:15', NULL),
(12, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'card_1RR7jIFk24PkRvuCPpCmnnX0', 'Stripe', 'txn_3RR7jIFk24PkRvuC0W0kTg0q', 'usd', 90, 9, '6735', 'easyshop32657918', '21 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-21 05:10:25', NULL),
(13, 2, 'illia', 'illia@gmail.com', '+358468937312', 'Annikinti 12 c 56, Pori', 'Cash On Delivery', 'Cash On Delivery', NULL, 'USD', 30, 30, NULL, 'easyshop32526713', '21 May 2025', 'May', '2025', NULL, NULL, NULL, NULL, 'Pending', '2025-05-21 05:14:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` varchar(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `client_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2', '2', '70', '2025-04-24 08:46:49', NULL),
(2, 1, 15, '2', '2', '20', '2025-04-24 08:46:49', NULL),
(3, 1, 17, '2', '2', '13', '2025-04-24 08:46:49', NULL),
(4, 5, 14, '2', '2', '12', '2025-04-29 02:45:18', NULL),
(5, 5, 9, '2', '1', '70', '2025-04-29 02:45:18', NULL),
(6, 6, 9, '2', '1', '70', '2025-04-29 03:22:44', NULL),
(7, 6, 15, '2', '1', '20', '2025-04-29 03:22:44', NULL),
(10, 8, 9, '2', '2', '70', '2025-05-08 03:32:31', NULL),
(11, 8, 7, '3', '2', '10', '2025-05-08 03:32:31', NULL),
(17, 10, 16, '2', '1', '15', '2025-05-13 03:05:23', NULL),
(18, 10, 14, '2', '1', '12', '2025-05-13 03:05:23', NULL),
(19, 10, 9, '2', '1', '70', '2025-05-13 03:05:23', NULL),
(20, 10, 13, '1', '1', '5', '2025-05-13 03:05:23', NULL),
(21, 10, 12, '1', '1', '10', '2025-05-13 03:05:23', NULL),
(22, 11, 17, '2', '1', '13', '2025-05-21 05:07:15', NULL),
(23, 12, 15, '2', '1', '20', '2025-05-21 05:10:25', NULL),
(24, 12, 9, '2', '1', '70', '2025-05-21 05:10:25', NULL),
(25, 13, 7, '3', '3', '10', '2025-05-21 05:14:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('illia@gmail.com', '$2y$12$pqvAke35Z3..m1ZXReJTn.XPmMQp4BgyU/gSbmbufh6p9xYqOtYaC', '2024-11-21 05:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(2, 'category.all', 'admin', 'Category', '2025-05-21 07:26:19', '2025-05-21 07:26:19'),
(3, 'category.add', 'admin', 'Category', '2025-05-22 04:48:13', '2025-05-22 04:48:13'),
(4, 'category.edit', 'admin', 'Category', '2025-05-22 04:48:13', '2025-05-22 04:48:13'),
(5, 'city.menu', 'admin', 'City', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(6, 'city.all', 'admin', 'City', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(7, 'product.menu', 'admin', 'Product', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(8, 'product.all', 'admin', 'Product', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(9, 'product.add', 'admin', 'Product', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(10, 'product.edit', 'admin', 'Product', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(11, 'product.delete', 'admin', 'Product', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(12, 'restaurant.menu', 'admin', 'Restaurant', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(13, 'pending.restaurant', 'admin', 'Restaurant', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(14, 'approve.restaurant', 'admin', 'Restaurant', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(15, 'banner.menu', 'admin', 'Banner', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(16, 'banner.all', 'admin', 'Banner', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(17, 'order.menu', 'admin', 'Order', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(18, 'reports.menu', 'admin', 'Reports', '2025-05-22 05:02:06', '2025-05-22 05:02:06'),
(19, 'review.menu', 'admin', 'Review', '2025-05-22 05:02:06', '2025-05-22 05:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `most_populer` varchar(255) DEFAULT NULL,
  `best_seller` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `slug`, `category_id`, `city_id`, `menu_id`, `code`, `qty`, `size`, `price`, `discount_price`, `image`, `client_id`, `most_populer`, `best_seller`, `status`) VALUES
(3, '2025-03-27 05:46:02', '2025-04-24 04:50:09', 'Pasta', 'pasta', 10, 4, 2, 'PC-03', '3', 'hgf', '100', '20', 'upload/product/1826464926930866.webp', '1', NULL, NULL, '0'),
(7, '2025-03-19 04:55:51', '2025-04-16 06:57:43', 'Pasa', 'pasa', 10, 9, 6, 'PC-04', '111', '12', '121', '10', 'upload/product/1827004245009446.png', '3', '1', NULL, '1'),
(9, '2025-04-03 04:27:44', '2025-04-24 04:58:04', 'Tiramisu', 'tiramisu', 9, 9, 12, 'PC-06', '22', '20', '100', '70', 'upload/product/1828359412004362.webp', '2', '1', '1', '1'),
(10, '2025-04-17 02:56:03', '2025-04-24 04:58:05', 'Ice Cream', 'ice-cream', 10, 9, 13, 'PC-07', '123', '1', '8', NULL, 'upload/product/1829628137399587.jpg', '2', '1', NULL, '1'),
(12, '2025-03-27 05:46:38', '2025-04-24 04:50:09', 'Burger', 'burger', 10, 9, 8, 'PC-08', '100', NULL, '10', NULL, 'upload/product/1827732558293735.webp', '1', NULL, NULL, '0'),
(13, '2025-03-27 05:48:11', '2025-04-24 04:50:08', 'Mudcacke', 'mudcacke', 10, 4, 7, 'PC-09', '12', NULL, '5', NULL, 'upload/product/1827732579925320.webp', '1', NULL, NULL, '0'),
(14, '2025-04-01 04:24:40', '2025-04-24 04:58:05', 'Soup', 'soup', 10, 9, 11, 'PC-10', '123', NULL, '12', NULL, 'upload/product/1828179990596910.webp', '2', '1', '1', '1'),
(15, '2025-04-03 04:27:48', '2025-04-24 04:58:05', 'Pizza margherita', 'pizza-margherita', 10, 4, 12, 'PC-11', '12', '40x40', '22', '20', 'upload/product/1828185902301880.webp', '2', '1', NULL, '1'),
(16, '2025-04-03 02:52:39', '2025-04-24 04:58:06', 'Creme Brulee', 'creme-brulee', 9, 9, 13, 'PC-12', '10', NULL, '15', NULL, 'upload/product/1828359565845590.jpg', '2', NULL, '1', '1'),
(17, '2025-04-03 02:53:15', '2025-04-24 04:58:06', 'Oreo Dessert Pots', 'oreo-dessert-pots', 10, 9, 13, 'PC-13', '17', NULL, '13', NULL, 'upload/product/1828359604396426.jpeg', '2', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `client_id`, `user_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Nice!', 5, 1, '2025-05-13 06:41:02', NULL),
(2, 2, 2, 'Nice food!', 4, 1, '2025-05-13 06:42:46', NULL),
(3, 2, 2, 'Shit!!!', 1, 0, '2025-05-13 07:01:44', '2025-05-15 03:27:59'),
(4, 2, 2, 'Not bad!', 2, 1, '2025-05-13 07:22:35', NULL),
(5, 2, 2, 'Awesome!', 5, 1, '2025-05-13 07:23:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Manager', 'admin', '2025-05-22 06:58:04', '2025-05-22 06:58:04'),
(3, 'Admin', 'admin', '2025-05-22 06:58:08', '2025-05-22 06:58:08'),
(4, 'Super Admin', 'admin', '2025-05-22 06:58:14', '2025-05-22 06:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JOzHL2SQCrsBvdwGO96F0MY6bxjh58NTbvrM8Wne', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWR4c1NzT3FvTmhMd1RaZlFJSk1sUm9GN1JLNGhkUVBNRHczWGlMcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbGwvcGVybWlzc2lvbiI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1747913287);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `addres`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$12$QBdjKSjFmLokTEx8CBSEzedEFaFwfXgwOCt/EfcKtDbZKn8pc0Lqq', NULL, NULL, NULL, 'user', '1', NULL, '2024-10-17 08:16:02', '2024-10-17 08:16:02'),
(2, 'illia', 'illia@gmail.com', '2024-10-24 08:40:30', '$2y$12$QBdjKSjFmLokTEx8CBSEzedEFaFwfXgwOCt/EfcKtDbZKn8pc0Lqq', '1745476595.jpg', '+358468937312', 'Annikinti 12 c 56, Pori', 'user', '1', 'LVpFvp4TMqvjTP5muVbcAeA2zdJoEv7wD17wxTpBSN8oytoKAC6H4t11F7Xm', '2024-10-24 08:39:03', '2025-04-24 06:47:58'),
(3, 'Test User', 'test@example.com', '2024-10-24 09:14:16', '$2y$12$QBdjKSjFmLokTEx8CBSEzedEFaFwfXgwOCt/EfcKtDbZKn8pc0Lqq', NULL, NULL, NULL, 'user', '1', 'njP8UHrxKl3Sb8Fqczacvg13V9VfrSVGmqQVplyyf9LVgqo2Mbozrb0WNcDD', '2024-10-24 09:14:16', '2024-10-24 09:14:16'),
(4, 'Illia', 'boss@gmail.com', NULL, '$2y$12$vGqFsuQ1efsBQMyzIgj.peS8ZB4Uguv5HITIpvZkNEop3hNo5bb3C', '1738657990.avif', '1231312132', 'fgdggdgfg', 'user', '1', NULL, '2025-02-03 04:52:26', '2025-04-09 05:19:11'),
(5, 'illia', 'illia1234@gmail.com', NULL, '$2y$12$RR5W5CTsqnqxaRTijJGwwuHTbsqa54ZYr9dRqwAQJeK76DPT/up22', '1741855157.webp', NULL, NULL, 'user', '1', NULL, '2025-03-13 06:39:08', '2025-03-13 06:39:17'),
(6, 'Illia Zelenyi', 'illiazelenyi@gmail.com', NULL, '$2y$12$nYZACXCEBoIiHn7g5mhvNuVb0jvM1cTmErW/v5dVabKpG.pLpj3Pq', NULL, NULL, NULL, 'user', '1', NULL, '2025-05-08 03:20:53', '2025-05-08 03:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_client_id_foreign` (`client_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
