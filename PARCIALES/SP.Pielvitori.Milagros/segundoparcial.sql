-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 01:33:19
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

CREATE DATABASE `segundoparcial`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `segundoparcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `legajo` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`id`, `usuario`, `legajo`, `updated_at`, `created_at`) VALUES
(1, 'mario@gmail.com', 12, '2019-11-26 03:31:12', '2019-11-26 03:31:12'),
(2, 'mario@gmail.com', 12, '2019-11-26 03:40:20', '2019-11-26 03:40:20'),
(3, 'mario@gmail.com', 12, '2019-11-26 03:43:56', '2019-11-26 03:43:56'),
(4, 'mario@gmail.com', 12, '2019-11-26 03:52:36', '2019-11-26 03:52:36'),
(5, 'mario@gmail.com', 12, '2019-11-26 03:57:05', '2019-11-26 03:57:05'),
(6, 'mario@gmail.com', 12, '2019-11-26 03:57:52', '2019-11-26 03:57:52'),
(7, 'aaa@gmail.com', 6, '2019-11-26 04:00:05', '2019-11-26 04:00:05'),
(8, 'aaa@gmail.com', 6, '2019-11-26 04:30:39', '2019-11-26 04:30:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `legajo` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `usuario`, `legajo`, `updated_at`, `created_at`) VALUES
(1, 'mario@gmail.com', 12, '2019-11-26 03:31:09', '2019-11-26 03:31:09'),
(2, 'mario@gmail.com', 12, '2019-11-26 03:40:16', '2019-11-26 03:40:16'),
(3, 'mario@gmail.com', 12, '2019-11-26 03:41:01', '2019-11-26 03:41:01'),
(4, 'mario@gmail.com', 12, '2019-11-26 03:52:23', '2019-11-26 03:52:23'),
(5, 'mario@gmail.com', 12, '2019-11-26 03:56:09', '2019-11-26 03:56:09'),
(6, 'mario@gmail.com', 12, '2019-11-26 03:57:46', '2019-11-26 03:57:46'),
(7, 'aaa@gmail.com', 6, '2019-11-26 04:00:01', '2019-11-26 04:00:01'),
(8, 'aaa@gmail.com', 6, '2019-11-26 04:00:08', '2019-11-26 04:00:08'),
(9, 'aaa@gmail.com', 6, '2019-11-26 04:30:50', '2019-11-26 04:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ruta` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `metodo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `fecha`, `ip`, `ruta`, `metodo`, `usuario`, `updated_at`, `created_at`) VALUES
(1, '2019-11-25 23:21:50', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:21:50', '2019-11-26 02:21:50'),
(2, '2019-11-25 23:22:35', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:22:36', '2019-11-26 02:22:36'),
(3, '2019-11-25 23:24:19', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:24:19', '2019-11-26 02:24:19'),
(4, '2019-11-25 23:33:15', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:33:15', '2019-11-26 02:33:15'),
(5, '2019-11-25 23:34:34', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:34:34', '2019-11-26 02:34:34'),
(6, '2019-11-25 23:39:58', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:39:58', '2019-11-26 02:39:58'),
(7, '2019-11-25 23:42:15', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:42:15', '2019-11-26 02:42:15'),
(8, '2019-11-25 23:42:39', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:42:39', '2019-11-26 02:42:39'),
(9, '2019-11-25 23:43:33', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:43:33', '2019-11-26 02:43:33'),
(10, '2019-11-25 23:43:45', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:43:45', '2019-11-26 02:43:45'),
(11, '2019-11-25 23:45:37', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:45:37', '2019-11-26 02:45:37'),
(12, '2019-11-25 23:45:41', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:45:42', '2019-11-26 02:45:42'),
(13, '2019-11-25 23:45:46', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:45:46', '2019-11-26 02:45:46'),
(14, '2019-11-25 23:47:22', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:47:22', '2019-11-26 02:47:22'),
(15, '2019-11-25 23:47:50', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:47:50', '2019-11-26 02:47:50'),
(16, '2019-11-25 23:50:46', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:50:46', '2019-11-26 02:50:46'),
(17, '2019-11-25 23:52:46', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:52:46', '2019-11-26 02:52:46'),
(18, '2019-11-25 23:52:49', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 02:52:49', '2019-11-26 02:52:49'),
(19, '2019-11-26 00:02:01', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:02:01', '2019-11-26 03:02:01'),
(20, '2019-11-26 00:02:49', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:02:49', '2019-11-26 03:02:49'),
(21, '2019-11-26 00:03:10', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:03:10', '2019-11-26 03:03:10'),
(22, '2019-11-26 00:03:25', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'aaa@gmail.com - 6', '2019-11-26 03:03:25', '2019-11-26 03:03:25'),
(23, '2019-11-26 00:03:32', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:03:33', '2019-11-26 03:03:33'),
(24, '2019-11-26 00:03:46', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:03:46', '2019-11-26 03:03:46'),
(25, '2019-11-26 00:03:48', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:03:48', '2019-11-26 03:03:48'),
(26, '2019-11-26 00:04:24', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:04:24', '2019-11-26 03:04:24'),
(27, '2019-11-26 00:04:31', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:04:31', '2019-11-26 03:04:31'),
(28, '2019-11-26 00:04:36', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:04:36', '2019-11-26 03:04:36'),
(29, '2019-11-26 00:04:48', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:04:48', '2019-11-26 03:04:48'),
(30, '2019-11-26 00:05:17', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:05:17', '2019-11-26 03:05:17'),
(31, '2019-11-26 00:05:39', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:05:39', '2019-11-26 03:05:39'),
(32, '2019-11-26 00:08:53', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 03:08:53', '2019-11-26 03:08:53'),
(33, '2019-11-26 00:08:59', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:08:59', '2019-11-26 03:08:59'),
(34, '2019-11-26 00:09:00', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:09:00', '2019-11-26 03:09:00'),
(35, '2019-11-26 00:09:03', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:09:03', '2019-11-26 03:09:03'),
(36, '2019-11-26 00:09:05', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:09:05', '2019-11-26 03:09:05'),
(37, '2019-11-26 00:09:07', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:09:07', '2019-11-26 03:09:07'),
(38, '2019-11-26 00:14:24', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 03:14:24', '2019-11-26 03:14:24'),
(39, '2019-11-26 00:14:52', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 03:14:52', '2019-11-26 03:14:52'),
(40, '2019-11-26 00:14:55', '::1', '/Pielvitori_Milagros_SP/public/users/', 'POST', 'undefined', '2019-11-26 03:14:55', '2019-11-26 03:14:55'),
(41, '2019-11-26 00:15:47', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:15:47', '2019-11-26 03:15:47'),
(42, '2019-11-26 00:15:51', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:15:51', '2019-11-26 03:15:51'),
(43, '2019-11-26 00:15:57', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:15:57', '2019-11-26 03:15:57'),
(44, '2019-11-26 00:18:20', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:18:20', '2019-11-26 03:18:20'),
(45, '2019-11-26 00:18:23', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:18:23', '2019-11-26 03:18:23'),
(46, '2019-11-26 00:18:38', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:18:38', '2019-11-26 03:18:38'),
(47, '2019-11-26 00:30:23', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'undefined', '2019-11-26 03:30:23', '2019-11-26 03:30:23'),
(48, '2019-11-26 00:30:56', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:30:56', '2019-11-26 03:30:56'),
(49, '2019-11-26 00:31:09', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:31:09', '2019-11-26 03:31:09'),
(50, '2019-11-26 00:31:12', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:31:12', '2019-11-26 03:31:12'),
(51, '2019-11-26 00:40:16', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5N', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:40:16', '2019-11-26 03:40:16'),
(52, '2019-11-26 00:40:20', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:40:20', '2019-11-26 03:40:20'),
(53, '2019-11-26 00:41:01', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5N', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:41:01', '2019-11-26 03:41:01'),
(54, '2019-11-26 00:41:12', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:41:12', '2019-11-26 03:41:12'),
(55, '2019-11-26 00:42:05', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:42:05', '2019-11-26 03:42:05'),
(56, '2019-11-26 00:42:22', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:42:22', '2019-11-26 03:42:22'),
(57, '2019-11-26 00:42:52', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:42:52', '2019-11-26 03:42:52'),
(58, '2019-11-26 00:42:58', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:42:58', '2019-11-26 03:42:58'),
(59, '2019-11-26 00:43:09', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:43:09', '2019-11-26 03:43:09'),
(60, '2019-11-26 00:43:22', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:43:22', '2019-11-26 03:43:22'),
(61, '2019-11-26 00:43:51', '::1', '/Pielvitori_Milagros_SP/public/ingreso/?tkn=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyZjU5NTU', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:43:51', '2019-11-26 03:43:51'),
(62, '2019-11-26 00:43:56', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:43:56', '2019-11-26 03:43:56'),
(63, '2019-11-26 00:50:29', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:50:29', '2019-11-26 03:50:29'),
(64, '2019-11-26 00:50:34', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:50:34', '2019-11-26 03:50:34'),
(65, '2019-11-26 00:52:23', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:52:23', '2019-11-26 03:52:23'),
(66, '2019-11-26 00:52:36', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:52:36', '2019-11-26 03:52:36'),
(67, '2019-11-26 00:56:09', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:56:09', '2019-11-26 03:56:09'),
(68, '2019-11-26 00:57:05', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:57:05', '2019-11-26 03:57:05'),
(69, '2019-11-26 00:57:46', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:57:46', '2019-11-26 03:57:46'),
(70, '2019-11-26 00:57:48', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:57:48', '2019-11-26 03:57:48'),
(71, '2019-11-26 00:57:52', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:57:52', '2019-11-26 03:57:52'),
(72, '2019-11-26 00:57:54', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'mario@gmail.com - 12', '2019-11-26 03:57:54', '2019-11-26 03:57:54'),
(73, '2019-11-26 00:58:28', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:58:28', '2019-11-26 03:58:28'),
(74, '2019-11-26 00:58:35', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:58:35', '2019-11-26 03:58:35'),
(75, '2019-11-26 00:59:03', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:59:03', '2019-11-26 03:59:03'),
(76, '2019-11-26 00:59:29', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:59:29', '2019-11-26 03:59:29'),
(77, '2019-11-26 00:59:41', '::1', '/Pielvitori_Milagros_SP/public/login/', 'POST', 'mario@gmail.com - 12', '2019-11-26 03:59:41', '2019-11-26 03:59:41'),
(78, '2019-11-26 01:00:01', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:00:01', '2019-11-26 04:00:01'),
(79, '2019-11-26 01:00:03', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:00:03', '2019-11-26 04:00:03'),
(80, '2019-11-26 01:00:05', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:00:05', '2019-11-26 04:00:05'),
(81, '2019-11-26 01:00:06', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:00:06', '2019-11-26 04:00:06'),
(82, '2019-11-26 01:00:08', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:00:08', '2019-11-26 04:00:08'),
(83, '2019-11-26 01:30:29', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:30:29', '2019-11-26 04:30:29'),
(84, '2019-11-26 01:30:39', '::1', '/Pielvitori_Milagros_SP/public/egreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:30:39', '2019-11-26 04:30:39'),
(85, '2019-11-26 01:30:50', '::1', '/Pielvitori_Milagros_SP/public/ingreso/', 'PUT', 'aaa@gmail.com - 6', '2019-11-26 04:30:50', '2019-11-26 04:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `legajo` int(11) NOT NULL,
  `fotoUno` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fotoDos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `clave`, `legajo`, `fotoUno`, `fotoDos`, `updated_at`, `created_at`) VALUES
(1, 'mail@gmail.com', 'claveuno', 1, './images/users/mail@gmail.com1.jpg', './images/users/mail@gmail.com2.jpg', '2019-11-26 02:42:15', '2019-11-26 02:42:15'),
(2, 'mailDos@gmail.com', 'clavedos', 2, './images/users/mailDos@gmail.com1.jpg', './images/users/mailDos@gmail.com2.jpg', '2019-11-26 02:42:39', '2019-11-26 02:42:39'),
(3, 'mailTres@gmail.com', 'clavetres', 3, './images/users/mailTres@gmail.com1.jpg', './images/users/mailTres@gmail.com2.jpg', '2019-11-26 02:45:47', '2019-11-26 02:45:47'),
(4, 'mailhgjf@gmail.com', 'clavecuatr', 4, './images/users/mailhgjf@gmail.com1.jpg', './images/users/mailhgjf@gmail.com2.jpg', '2019-11-26 02:47:22', '2019-11-26 02:47:22'),
(5, 'asdfsadf@gmail.com', 'asdd', 5, './images/users/asdfsadf@gmail.com1.jpg', './images/users/asdfsadf@gmail.com2.jpg', '2019-11-26 02:47:50', '2019-11-26 02:47:50'),
(6, 'aaa@gmail.com', 'asdf', 6, './images/users/aaa@gmail.com1.jpg', './images/users/aaa@gmail.com2.jpg', '2019-11-26 02:50:46', '2019-11-26 02:50:46'),
(7, 'bbb@gmail.com', '$2y$10$lg/', 7, './images/users/bbb@gmail.com1.jpg', './images/users/bbb@gmail.com2.jpg', '2019-11-26 02:52:49', '2019-11-26 02:52:49'),
(8, 'mario@gmail.com', '123', 12, './images/users/mario@gmail.com1.jpg', './images/users/mario@gmail.com2.jpg', '2019-11-26 03:14:52', '2019-11-26 03:14:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
