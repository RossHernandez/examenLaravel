-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2021 a las 20:19:52
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exam_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo_dolar` decimal(10,2) NOT NULL,
  `sueldo_pesos` decimal(10,2) NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `codigo`, `nombre`, `sueldo_dolar`, `sueldo_pesos`, `correo`, `direccion`, `estado`, `ciudad`, `telefono`, `activo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A001', 'Ross', '72.38', '1500.00', 'algo@ross.com', 'Josefa', 'Puebla', 'Tecali', '2231170000', 1, NULL, '2021-03-16 23:02:52', '2021-03-16 23:02:52'),
(5, 'A004', 'Mirna', '4534.00', '6756.00', 'mirna@prueba.com', 'Miguel Hidalgo', 'Chihuahua', 'Poza rica', '7649283746', 1, '2021-03-16 20:39:09', '2021-03-17 04:11:28', '2021-03-17 04:11:28'),
(6, 'A005', 'Pablito', '5646.00', '889.00', 'pablito@prueba.com', 'Aldama', 'Puebla', 'Puebla', '(222) 111-1112', 1, '2021-03-16 23:05:32', '2021-03-16 23:17:14', '2021-03-16 23:17:14'),
(7, 'A006', 'Nadia', '82.00', '1695.99', 'nadia@algo.com', 'Benito', 'Tlaxcala', 'Juarez', '5273618297', 1, '2021-03-16 23:06:47', '2021-03-18 05:27:36', '2021-03-18 05:27:36'),
(8, 'A007', 'Benito', '145.05', '3000.00', 'benito@hotmail.com', 'calle Benito Juarez', 'Oaxaca', 'San Luis', '6376224356', 0, '2021-03-16 23:16:13', '2021-03-18 23:39:33', '2021-03-18 23:39:33'),
(9, '4851', 'Nohelia', '154.00', '3172.40', 'nohelia@algo.com', 'texas', 'Sonora', 'Zacatan', '2237769876', 1, '2021-03-17 03:55:07', '2021-03-19 00:23:39', '2021-03-19 00:23:39'),
(10, '3921', 'Maria Ross', '200.00', '4088.30', 'ross@gmail.com', 'Josefa Ortiz', 'Puebla', 'Tecali', '2231180905', 1, '2021-03-17 04:07:06', '2021-03-19 00:18:38', NULL),
(11, '0529', 'Rogelio', '523.00', '10817.10', 'rogelio@algo.com', 'Callejon los pinos', 'Sonora', 'Santa Ana bla bla bla', '2273362727', 0, '2021-03-18 04:40:16', '2021-03-18 23:39:09', '2021-03-18 23:39:09'),
(12, '85A2', 'Jose Ramirez', '900.00', '18614.52', 'joseRam@correo.com', 'Josefa Ortiz', 'Taxcala', 'Apizaco', '2236675402', 0, '2021-03-18 23:58:20', '2021-03-19 00:09:47', NULL),
(13, '814A', 'Pedro Rosas', '901.00', '18417.79', 'pedrito@hotmail.com', 'San juan', 'Puebla', 'Tepeaca', '7783746570', 1, '2021-03-19 00:37:17', '2021-03-19 00:37:17', NULL),
(14, '814A', 'Pedro Rosas', '901.00', '18417.79', 'pedrito@hotmail.com', 'San juan', 'Puebla', 'Tepeaca', '7783746570', 1, '2021-03-19 00:37:17', '2021-03-19 00:37:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_03_12_175633_create_empleados_table', 1),
(4, '2021_03_16_165803_add_deleted_empl', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo_usuario`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Isela Hernandez', 'ross@admin.com', '$2y$10$epA0a2SqnGYR8W2E1msuxOONh6JXPpOLzWXlgTIBBsWG8S8avK7AS', 0, 'wx0P62q1guclpCiCQPvNJ1dVJP94u4mLy2Cr0T3J0qAUw5drBrTEWzRdFeO4', '2021-03-13 00:10:49', '2021-03-13 00:10:49'),
(2, 'Maria', 'maria@hotmail.com', '$2y$10$/C1ueG5X5P7cFtfU6Xi4tOVwIJrKHbeJJF2WJlcw5MfoL6IyxkeWu', NULL, 'SKV9CN2qbRV7GLzpCJaxYx80HJ48pnKnOkK61tkUXiWHpB0jDUxAowLK398o', '2021-03-18 20:21:42', '2021-03-18 20:21:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
