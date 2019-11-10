-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-11-2019 a las 19:34:53
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idcustomers` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cars`
--

INSERT INTO `cars` (`id`, `model`, `color`, `placa`, `created_at`, `updated_at`, `idcustomers`, `status`) VALUES
(14, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-11-04 01:24:23', 5, 0),
(15, 'terio', 'bbbbb', 'abc322b', '2019-09-19 05:31:17', '2019-09-19 05:31:17', 5, 1),
(16, 'terio', 'bbbbb', 'aaaaas', '2019-09-19 05:31:29', '2019-09-19 05:31:29', 5, 1),
(17, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-09-19 05:31:07', 5, 1),
(18, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-09-19 05:31:07', 5, 1),
(19, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-09-19 05:31:07', 5, 1),
(20, 'terio', 'bbbbb', 'abc322b', '2019-09-19 05:31:17', '2019-09-19 05:31:17', 5, 1),
(21, 'terio', 'bbbbb', 'aaaaas', '2019-09-19 05:31:29', '2019-09-19 05:31:29', 5, 1),
(22, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-09-19 05:31:07', 5, 1),
(23, 'mrw', 'gris metalico', 'aaaaas', '2019-09-19 05:31:07', '2019-09-19 05:31:07', 5, 1),
(24, 'chevrolet', 'gris metalico', 'abr123', '2019-09-19 05:38:47', '2019-09-19 05:38:47', 5, 1),
(25, 'ewqewq', 'ewqeqw', 'ewqewq', '2019-10-17 07:02:58', '2019-10-17 07:02:58', 5, 1),
(26, 'sdads', 'dsadsad', 'dsad', '2019-10-21 01:14:55', '2019-10-21 02:04:28', 4, 1),
(27, 'puto', 'negro marico', 'puto', '2019-10-21 01:15:34', '2019-10-21 01:15:34', 4, 1),
(28, 'dsad', 'e32423', 'dsad', '2019-10-21 03:15:56', '2019-10-21 03:15:56', 3, 1),
(29, 'aaa', 'dsada', 'sasasd', '2019-10-21 03:17:54', '2019-10-21 03:17:54', 2, 1),
(30, 'fdsf', 'fsfgf', 'fdsf', '2019-10-21 03:18:50', '2019-10-21 03:18:50', 2, 1),
(31, 'terio', 'verde', 'fbt35b', '2019-10-27 23:05:30', '2019-10-27 23:05:30', 8, 1),
(32, 'aveo', 'negro', '12f58h', '2019-10-30 20:25:26', '2019-10-30 20:25:26', 12, 1),
(33, 'corolla', 'negro', 'ahrf213', '2019-11-06 21:30:08', '2019-11-06 21:30:08', 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellars`
--

DROP TABLE IF EXISTS `cellars`;
CREATE TABLE IF NOT EXISTS `cellars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cantidadPuestos` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cellars`
--

INSERT INTO `cellars` (`id`, `name`, `created_at`, `updated_at`, `cantidadPuestos`, `status`) VALUES
(1, 'sotano 1', '2019-10-17 07:14:01', '2019-11-04 01:40:40', 30, 0),
(2, 'sotano 2', '2019-10-18 07:39:07', '2019-10-28 21:33:51', 10, 1),
(14, 'sotano 2', '2019-10-21 04:02:39', '2019-11-04 01:44:12', 3, 0),
(15, 'sotano 3', '2019-10-21 04:03:35', '2019-10-21 04:11:28', 20, 1),
(16, 'sotano 1', '2019-11-07 06:26:11', '2019-11-07 06:26:11', 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `carnet` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `last_name`, `email`, `carnet`, `phone`, `created_at`, `updated_at`, `status`) VALUES
(2, 'dadads', 'dasdasd', 'dsads', '1232131212', '4125440526', NULL, '2019-11-04 01:48:01', 0),
(3, 'dwadas', 'dsadasd', 'dsasdas', '231313', '3213123', '2019-10-17 07:07:21', '2019-10-17 07:07:21', 1),
(4, 'tyrytry', 'tyrtyry', 'yrytryrt', '1231', '32423', '2019-10-17 07:08:35', '2019-10-17 07:08:35', 1),
(5, 'gabriel', 'rodriguez', 'yambrielg@gmail.com', '124578', '02128642853', NULL, '2019-11-04 01:48:14', 0),
(11, 'antonietta', 'marron', 'antonietta@gmail.com', '123456', '04122005927', '2019-10-30 20:24:38', '2019-10-30 20:24:38', 1),
(7, 'brayan', 'MARTINEZX', 'andryrodriguez_27@hotmail', '1232131212222', '04125440526', '2019-10-24 21:42:54', '2019-10-24 21:42:54', 1),
(8, 'luz', 'marina', 'luzmarina_9447@hotmail.com', '11113455', '04142647912', '2019-10-26 19:01:17', '2019-10-26 19:01:17', 1),
(10, 'luz', 'MARTINEZX', 'gabocuberos@gmail.com', '1245682', '86475989', '2019-10-26 19:02:27', '2019-10-26 19:02:27', 1),
(12, 'antonietta', 'marron', 'antonietta@gmail.com', '123456', '04122005927', '2019-10-30 20:24:39', '2019-10-30 20:24:39', 1),
(13, 'emily', 'SENGE', 'emyyli@gmail.com', '1234657', '04152689578', '2019-11-06 21:29:40', '2019-11-06 21:29:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellar_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `cellar_id`, `number`, `status`, `created_at`, `updated_at`) VALUES
(2, 14, 2, 0, '2019-10-21 04:02:40', '2019-10-21 04:02:40'),
(3, 14, 3, 0, '2019-10-21 04:02:40', '2019-10-21 04:02:40'),
(14, 15, 1, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(15, 15, 2, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(16, 15, 3, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(17, 15, 4, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(18, 15, 5, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(19, 15, 6, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(20, 15, 7, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(21, 15, 8, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(22, 15, 9, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(23, 15, 10, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(24, 15, 11, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(25, 15, 12, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(26, 15, 13, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(27, 15, 14, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(28, 15, 15, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(29, 15, 16, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(30, 15, 17, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(31, 15, 18, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(32, 15, 19, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(33, 15, 20, 0, '2019-10-21 04:11:28', '2019-10-21 04:11:28'),
(64, 2, 1, 0, '2019-10-28 21:33:51', '2019-10-28 21:33:51'),
(65, 2, 2, 1, '2019-10-28 21:33:51', '2019-11-03 22:30:17'),
(66, 2, 3, 0, '2019-10-28 21:33:51', '2019-10-28 21:33:51'),
(67, 2, 4, 0, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(68, 2, 5, 1, '2019-10-28 21:33:52', '2019-11-06 21:30:32'),
(69, 2, 6, 1, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(70, 2, 7, 0, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(71, 2, 8, 0, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(72, 2, 9, 0, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(73, 2, 10, 0, '2019-10-28 21:33:52', '2019-10-28 21:33:52'),
(74, 16, 1, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(75, 16, 2, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(76, 16, 3, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(77, 16, 4, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(78, 16, 5, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(79, 16, 6, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(80, 16, 7, 0, '2019-11-07 06:26:11', '2019-11-07 06:26:11'),
(81, 16, 8, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(82, 16, 9, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(83, 16, 10, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(84, 16, 11, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(85, 16, 12, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(86, 16, 13, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(87, 16, 14, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(88, 16, 15, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(89, 16, 16, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(90, 16, 17, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(91, 16, 18, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(92, 16, 19, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(93, 16, 20, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(94, 16, 21, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(95, 16, 22, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(96, 16, 23, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(97, 16, 24, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(98, 16, 25, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(99, 16, 26, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(100, 16, 27, 0, '2019-11-07 06:26:12', '2019-11-07 06:26:12'),
(101, 16, 28, 0, '2019-11-07 06:26:13', '2019-11-07 06:26:13'),
(102, 16, 29, 0, '2019-11-07 06:26:13', '2019-11-07 06:26:13'),
(103, 16, 30, 0, '2019-11-07 06:26:13', '2019-11-07 06:26:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cellar_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `entry_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exit_time` datetime DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `systemTimeEntry` varchar(2) NOT NULL,
  `systemTimeExit` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`cellar_id`,`post_id`,`car_id`),
  KEY `cellar_id` (`cellar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `cellar_id`, `post_id`, `car_id`, `entry_time`, `created_at`, `updated_at`, `exit_time`, `id_customer`, `systemTimeEntry`, `systemTimeExit`) VALUES
(14, 2, 1, 1, 31, '2019-10-28 01:10:00', '2019-10-28 05:30:30', '2019-11-03 21:36:06', '2019-11-03 05:11:00', 8, 'AM', 'AM'),
(15, 2, 1, 26, 32, '2019-10-30 12:10:00', '2019-10-30 20:26:25', '2019-11-03 21:36:52', '2019-11-03 05:11:00', 12, 'PM', 'AM'),
(16, 2, 2, 5, 31, '2019-10-31 04:10:00', '2019-10-31 20:32:48', '2019-11-04 01:12:30', '2019-11-03 08:11:00', 8, 'AM', 'PM'),
(17, 2, 2, 6, 32, '2019-10-31 04:10:00', '2019-10-31 20:35:07', '2019-10-31 20:35:07', NULL, 12, 'AM', NULL),
(18, 2, 2, 2, 28, '2019-11-03 06:11:00', '2019-11-03 22:30:17', '2019-11-03 22:32:22', '2019-11-03 06:11:00', 3, 'AM', 'PM'),
(19, 2, 2, 5, 33, '2019-11-06 05:11:00', '2019-11-06 21:30:32', '2019-11-06 21:30:32', NULL, 13, 'AM', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$MmQCMQsPFrh2iIWypUHNweihMs6eI94gBrIXf15jVJVWpQGngAbj6', NULL, 0, '2019-07-14 22:33:50', '2019-07-14 22:33:50'),
(2, 'brayan', 'yambrielg@gmail.com', NULL, '$2y$10$mm/L/LpAQiTmSOqoQOAs2uwRuudMBz4TB9GChYXQMfJt1soqPKdcC', NULL, 1, '2019-07-24 18:39:54', '2019-07-24 18:39:54');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`cellar_id`) REFERENCES `cellars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
