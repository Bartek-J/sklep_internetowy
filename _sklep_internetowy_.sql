-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 06:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep_internetowy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Plakaty', '2020-08-27 14:13:34', '2020-08-27 14:13:34'),
(6, 'Box', '2020-09-02 12:17:54', '2020-09-02 12:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `type` enum('procent','kwota') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'procent',
  `category` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryName` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `expires_at`, `quantity`, `discount`, `type`, `category`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'PLAKAT10', '2020-08-30', 8, 50, 'kwota', '1', 'Plakaty', '2020-08-27 15:43:34', '2020-08-30 11:25:09'),
(7, 'MK', '2020-09-23', 5, 1000, 'kwota', 'all', 'all', '2020-09-02 14:50:39', '2020-09-02 14:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_products`
--

CREATE TABLE `deleted_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_sites`
--

CREATE TABLE `main_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `popular` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(130, '2014_10_12_000000_create_users_table', 1),
(131, '2014_10_12_100000_create_password_resets_table', 1),
(132, '2019_08_19_000000_create_failed_jobs_table', 1),
(133, '2020_07_18_115718_create_products_table', 1),
(134, '2020_07_18_120349_create_categories_table', 1),
(135, '2020_07_18_120642_create_product_photos_table', 1),
(138, '2020_08_10_174502_create_coupons_table', 1),
(139, '2020_08_22_155419_create_deleted_products_table', 1),
(141, '2020_08_26_203456_create_shippings_table', 2),
(142, '2020_08_28_122311_create_main_sites_table', 2),
(143, '2020_07_18_120902_create_orders_table', 3),
(144, '2020_07_18_121149_create_order_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','paid','sent','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `email`, `price`, `name`, `secondname`, `city`, `street`, `comment`, `phonenumber`, `postalcode`, `shipping_id`, `created_at`, `updated_at`) VALUES
(5, 1, 'pending', 'bartekjezioro@gmail.com', 3499, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:06:02', '2020-09-02 15:06:02'),
(6, 1, 'pending', 'bartekjezioro@gmail.com', 3499, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:07:20', '2020-09-02 15:07:20'),
(7, 1, 'pending', 'bartekjezioro@gmail.com', 3499, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:07:43', '2020-09-02 15:07:43'),
(8, 1, 'pending', 'bartekjezioro@gmail.com', 4499, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:10:13', '2020-09-02 15:10:13'),
(9, 1, 'pending', 'bartekjezioro@gmail.com', 5999, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:11:20', '2020-09-02 15:11:20'),
(10, 1, 'pending', 'bartekjezioro@gmail.com', 149900, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2020-09-02 15:14:41', '2020-09-02 15:14:41'),
(11, 1, 'pending', 'bartekjezioro@gmail.com', 149900, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 2, '2021-05-19 06:08:49', '2021-05-19 06:08:49'),
(12, 1, 'pending', 'bartekjezioro@gmail.com', 15196, 'Bartosz', 'Jezioro', 'Dębica', 'Wielopolska', NULL, '512379781', '39-200', 1, '2021-05-19 06:13:58', '2021-05-19 06:13:58'),
(13, 2, 'pending', 'kszysztofkrawczyk32@gmail.com', 4499, 'Kszysztof', 'Morowski', 'warszawa', 'Krakowska 3a', NULL, '989989989', '34-509', 2, '2021-08-19 10:57:38', '2021-08-19 10:57:38'),
(14, 2, 'pending', 'kszysztofkrawczyk32@gmail.com', 2999, 'Kszysztof', 'Morowski', 'Dębica', 'Aleja Powstańców Warszawy 12', NULL, '989989989', '39-200', 3, '2021-08-19 11:00:24', '2021-08-19 11:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `format` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `format`, `created_at`, `updated_at`) VALUES
(1, 8, 11, 1, NULL, NULL, NULL),
(2, 9, 11, 1, 'A3', NULL, NULL),
(3, 10, 51, 1, NULL, NULL, NULL),
(4, 11, 51, 1, NULL, NULL, NULL),
(5, 12, 54, 4, 'A4', NULL, NULL),
(6, 13, 55, 1, 'A4', NULL, NULL),
(7, 14, 58, 1, 'A5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `amount`, `active`, `created_at`, `updated_at`) VALUES
(11, 1, 'Plakat Supreme', 2999, 'Supremka plakacik', 40, 'no', '2020-08-27 14:13:34', '2020-09-03 05:46:37'),
(51, 6, 'Custom box', 149900, 'opis', 100, 'yes', '2020-09-02 12:19:16', '2020-09-02 14:12:01'),
(55, 1, 'plakat2', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(56, 1, 'plakat3', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(57, 1, 'plakat4', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(58, 1, 'plakat5', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(59, 1, 'plakat6', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(60, 1, 'plakat7', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(61, 1, 'plakat8', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(62, 1, 'plakat9', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(63, 1, 'plakat10', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(64, 1, 'plakat11', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(65, 1, 'plakat12', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(66, 1, 'plakat13', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(67, 1, 'plakat14', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(68, 1, 'plakat15', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(69, 1, 'plakat16', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(70, 1, 'plakat17', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(71, 1, 'plakat18', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(72, 1, 'plakat19', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(73, 1, 'plakat20', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(74, 1, 'plakat21', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(75, 1, 'plakat22', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(76, 1, 'plakat23', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(77, 1, 'plakat24', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(78, 1, 'plakat25', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(79, 1, 'plakat26', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(80, 1, 'plakat27', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(81, 1, 'plakat28', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(82, 1, 'plakat29', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(83, 1, 'plakat30', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(84, 1, 'plakat31', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(85, 1, 'plakat32', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(86, 1, 'plakat33', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(87, 1, 'plakat34', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(88, 1, 'plakat35', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(89, 1, 'plakat36', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(90, 1, 'plakat37', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(91, 1, 'plakat38', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(92, 1, 'plakat39', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(93, 1, 'plakat40', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(94, 1, 'plakat41', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(95, 1, 'plakat42', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(96, 1, 'plakat43', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(97, 1, 'plakat44', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(98, 1, 'plakat45', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(99, 1, 'plakat46', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(100, 1, 'plakat47', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(101, 1, 'plakat48', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(102, 1, 'plakat49', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(103, 1, 'plakat50', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(104, 1, 'plakat51', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(105, 1, 'plakat52', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(106, 1, 'plakat53', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(107, 1, 'plakat54', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(108, 1, 'plakat55', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(109, 1, 'plakat56', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(110, 1, 'plakat57', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(111, 1, 'plakat58', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(112, 1, 'plakat59', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(113, 1, 'plakat60', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(114, 1, 'plakat61', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(115, 1, 'plakat62', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(116, 1, 'plakat63', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(117, 1, 'plakat64', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(118, 1, 'plakat65', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(119, 1, 'plakat66', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(120, 1, 'plakat67', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(121, 1, 'plakat68', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(122, 1, 'plakat69', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(123, 1, 'plakat70', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(124, 1, 'plakat71', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(125, 1, 'plakat72', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(126, 1, 'plakat73', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(127, 1, 'plakat74', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(128, 1, 'plakat75', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(129, 1, 'plakat76', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(130, 1, 'plakat77', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(131, 1, 'plakat78', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(132, 1, 'plakat79', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(133, 1, 'plakat80', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(134, 1, 'plakat81', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(135, 1, 'plakat82', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(136, 1, 'plakat83', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(137, 1, 'plakat84', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(138, 1, 'plakat85', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(139, 1, 'plakat86', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(140, 1, 'plakat87', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(141, 1, 'plakat88', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(142, 1, 'plakat89', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(143, 1, 'plakat90', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(144, 1, 'plakat91', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(145, 1, 'plakat92', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(146, 1, 'plakat93', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(147, 1, 'plakat94', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(148, 1, 'plakat95', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(149, 1, 'plakat96', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(150, 1, 'plakat97', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(151, 1, 'plakat98', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(152, 1, 'plakat99', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(153, 1, 'plakat100', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(154, 1, 'plakat101', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(155, 1, 'plakat102', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(156, 1, 'plakat103', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(157, 1, 'plakat104', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(158, 1, 'plakat105', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(159, 1, 'plakat106', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(160, 1, 'plakat107', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(161, 1, 'plakat108', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(162, 1, 'plakat109', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(163, 1, 'plakat110', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(164, 1, 'plakat111', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(165, 1, 'plakat112', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(166, 1, 'plakat113', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(167, 1, 'plakat114', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(168, 1, 'plakat115', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(169, 1, 'plakat116', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(170, 1, 'plakat117', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(171, 1, 'plakat118', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(172, 1, 'plakat119', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(173, 1, 'plakat120', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(174, 1, 'plakat121', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(175, 1, 'plakat122', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(176, 1, 'plakat123', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(177, 1, 'plakat124', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(178, 1, 'plakat125', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(179, 1, 'plakat126', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(180, 1, 'plakat127', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(181, 1, 'plakat128', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(182, 1, 'plakat129', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(183, 1, 'plakat130', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(184, 1, 'plakat131', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(185, 1, 'plakat132', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(186, 1, 'plakat133', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(187, 1, 'plakat134', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(188, 1, 'plakat135', 2999, 'Kolejny plakat', 100, 'yes', '2020-09-03 05:45:10', '2020-09-03 05:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

CREATE TABLE `product_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(4, 55, 'plakat2.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(5, 56, 'plakat3.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(6, 57, 'plakat4.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(7, 58, 'plakat5.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(8, 59, 'plakat6.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(9, 60, 'plakat7.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(10, 61, 'plakat8.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(11, 62, 'plakat9.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(12, 63, 'plakat10.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(13, 64, 'plakat11.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(14, 65, 'plakat12.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(15, 66, 'plakat13.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(16, 67, 'plakat14.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(17, 68, 'plakat15.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(18, 69, 'plakat16.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(19, 70, 'plakat17.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(20, 71, 'plakat18.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(21, 72, 'plakat19.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(22, 73, 'plakat20.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(23, 74, 'plakat21.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(24, 75, 'plakat22.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(25, 76, 'plakat23.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(26, 77, 'plakat24.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(27, 78, 'plakat25.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(28, 79, 'plakat26.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(29, 80, 'plakat27.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(30, 81, 'plakat28.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(31, 82, 'plakat29.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(32, 83, 'plakat30.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(33, 84, 'plakat31.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(34, 85, 'plakat32.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(35, 86, 'plakat33.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(36, 87, 'plakat34.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(37, 88, 'plakat35.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(38, 89, 'plakat36.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(39, 90, 'plakat37.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(40, 91, 'plakat38.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(41, 92, 'plakat39.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(42, 93, 'plakat40.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(43, 94, 'plakat41.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(44, 95, 'plakat42.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(45, 96, 'plakat43.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(46, 97, 'plakat44.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(47, 98, 'plakat45.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(48, 99, 'plakat46.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(49, 100, 'plakat47.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(50, 101, 'plakat48.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(51, 102, 'plakat49.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(52, 103, 'plakat50.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(53, 104, 'plakat51.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(54, 105, 'plakat52.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(55, 106, 'plakat53.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(56, 107, 'plakat54.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(57, 108, 'plakat55.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(58, 109, 'plakat56.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(59, 110, 'plakat57.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(60, 111, 'plakat58.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(61, 112, 'plakat59.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(62, 113, 'plakat60.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(63, 114, 'plakat61.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(64, 115, 'plakat62.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(65, 116, 'plakat63.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(66, 117, 'plakat64.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(67, 118, 'plakat65.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(68, 119, 'plakat66.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(69, 120, 'plakat67.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(70, 121, 'plakat68.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(71, 122, 'plakat69.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(72, 123, 'plakat70.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(73, 124, 'plakat71.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(74, 125, 'plakat72.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(75, 126, 'plakat73.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(76, 127, 'plakat74.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(77, 128, 'plakat75.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(78, 129, 'plakat76.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(79, 130, 'plakat77.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(80, 131, 'plakat78.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(81, 132, 'plakat79.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(82, 133, 'plakat80.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(83, 134, 'plakat81.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(84, 135, 'plakat82.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(85, 136, 'plakat83.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(86, 137, 'plakat84.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(87, 138, 'plakat85.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(88, 139, 'plakat86.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(89, 140, 'plakat87.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(90, 141, 'plakat88.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(91, 142, 'plakat89.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(92, 143, 'plakat90.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(93, 144, 'plakat91.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(94, 145, 'plakat92.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(95, 146, 'plakat93.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(96, 147, 'plakat94.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(97, 148, 'plakat95.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(98, 149, 'plakat96.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(99, 150, 'plakat97.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(100, 151, 'plakat98.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(101, 152, 'plakat99.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(102, 153, 'plakat100.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(103, 154, 'plakat101.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(104, 155, 'plakat102.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(105, 156, 'plakat103.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(106, 157, 'plakat104.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(107, 158, 'plakat105.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(108, 159, 'plakat106.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(109, 160, 'plakat107.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(110, 161, 'plakat108.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(111, 162, 'plakat109.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(112, 163, 'plakat110.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(113, 164, 'plakat111.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(114, 165, 'plakat112.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(115, 166, 'plakat113.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(116, 167, 'plakat114.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(117, 168, 'plakat115.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(118, 169, 'plakat116.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(119, 170, 'plakat117.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(120, 171, 'plakat118.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(121, 172, 'plakat119.png', '2020-09-03 05:45:09', '2020-09-03 05:45:09'),
(122, 173, 'plakat120.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(123, 174, 'plakat121.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(124, 175, 'plakat122.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(125, 176, 'plakat123.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(126, 177, 'plakat124.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(127, 178, 'plakat125.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(128, 179, 'plakat126.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(129, 180, 'plakat127.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(130, 181, 'plakat128.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(131, 182, 'plakat129.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(132, 183, 'plakat130.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(133, 184, 'plakat131.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(134, 185, 'plakat132.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(135, 186, 'plakat133.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(136, 187, 'plakat134.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(137, 188, 'plakat135.png', '2020-09-03 05:45:10', '2020-09-03 05:45:10'),
(138, 51, '5f50a04b107ea.jpg', '2020-09-03 05:50:35', '2020-09-03 05:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `ZaPobraniem` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `price`, `active`, `ZaPobraniem`, `created_at`, `updated_at`) VALUES
(1, 'kurier', 12, 'yes', 'yes', '2020-08-31 15:09:36', '2020-08-31 15:09:36'),
(2, 'kurier', 10, 'yes', 'no', '2020-08-31 15:09:53', '2020-09-02 11:56:46'),
(3, 'Odbiór własny', 0, 'yes', 'yes', '2021-05-19 06:16:07', '2021-08-19 10:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bartosz Jezioro', 'bartekjezioro@gmail.com', NULL, '$2y$10$Y/PKyFA2JmhG3KZ.cYnXVef5h.vV3FRh1HtUr0PwArnhurz/4Rci2', 'admin', NULL, '2020-08-27 14:14:05', '2020-08-27 14:14:05'),
(2, 'Kszysztof Morowski', 'kszysztofkrawczyk32@gmail.com', NULL, '$2y$10$DQ9d5UoL.T2qrw9uBDcGQu8r7F6dM.XAILjlOz9EadmLzikyIbeYy', 'user', NULL, '2021-08-19 10:56:32', '2021-08-19 10:56:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_sites`
--
ALTER TABLE `main_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_sites`
--
ALTER TABLE `main_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `product_photos`
--
ALTER TABLE `product_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
