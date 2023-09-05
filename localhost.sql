-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-08-2023 a las 09:03:26
-- Versión del servidor: 5.7.36-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c1322042_datos`
--
CREATE DATABASE IF NOT EXISTS `c1322042_datos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `c1322042_datos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Blog`
--

CREATE TABLE `Blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `texto` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Blog`
--

INSERT INTO `Blog` (`id`, `titulo`, `texto`, `imagen`, `link`, `fecha`, `categoria`) VALUES
(29, 'Sube de nivel con una mentalidad abundante', 'Podrás escuchar el episodio n°11 de mi podcast \"El Mundo de Sofia\" que se encuentra en spotify en donde hablamos sobre la Independencia económica, niveles y consejos para construir una mentalidad abundante.', '84290_podcas.png', 'https://spotifyanchor-web.app.link/e/JtPTRYnieyb', '2023-03-17 01:53:59', 'Podcast'),
(33, 'IDEAS DE CONTENIDO PARA SERVICIOS', 'Hoy les comparto un material que me ayudó a ver de otra forma las redes sociales. Espero que les sea de ayuda.', '768963_iDEASDECONT.png', 'https://elmundodesofia.substack.com/p/el-mundo-de-sofia-23-ideas-de-contenidos?sd=pf', '2023-04-13 12:53:29', 'Youtube');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubCriptos`
--

CREATE TABLE `SubCriptos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Correo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cel` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `SubCriptos`
--

INSERT INTO `SubCriptos` (`id`, `Nombre`, `Correo`, `Cel`, `fecha`) VALUES
(17, '', 'adriangferreyra@gmail.com', '', '2023-03-07 13:33:51'),
(18, 'Adrian ', 'adriangferreyra@gmail.com', '3498469972', '2023-03-07 13:33:51'),
(19, '', 'adriangferreyra10@gmail.com', '', '2023-03-07 13:33:51'),
(21, '', 'a555@gmail.com', '', '2023-03-07 13:33:51'),
(22, '', 'a666@hotmail.com', '', '2023-03-07 13:34:55'),
(23, '', 'S5c1_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-03-17 10:00:59'),
(24, '', 'b2AC_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-03-22 06:49:22'),
(25, '', '', '', '2023-04-08 01:48:52'),
(26, '', 'soyaugustook@gmail.com', '', '2023-04-10 14:18:38'),
(27, '', 'h4x9_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-04-15 22:25:25'),
(28, '', 'mundodecoo@gmail.com', '', '2023-04-24 21:10:52'),
(29, '', 'RmA1_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-04-29 18:35:46'),
(30, '', 'JEpf_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-05-07 09:50:20'),
(31, '', 'bettiblanco11@gmail.com', '', '2023-05-17 17:02:15'),
(32, '', 'kf97_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-06-02 11:48:12'),
(33, '', '', '', '2023-06-08 18:42:42'),
(34, '', '', '', '2023-06-08 18:42:57'),
(35, '', 'camilagasparotti25@gmail.com', '', '2023-06-14 04:15:57'),
(36, '', 'camilagasparotti25@gmail.com', '', '2023-06-14 04:16:21'),
(37, '', '', '', '2023-06-15 00:55:44'),
(38, '', 'mundodecoo@gmail.com', '', '2023-06-20 19:32:43'),
(39, '', '3lB5_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-07-01 03:11:57'),
(40, '', 'VVnB_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-07-01 21:15:18'),
(41, '', '', '', '2023-07-06 13:32:36'),
(42, '', '', '', '2023-07-06 13:32:53'),
(43, '', '', '', '2023-07-06 13:33:13'),
(44, '', 'matilde.lovi16@gmail.com', '', '2023-07-06 13:33:39'),
(45, '', 'kQtB_generic_4fc1c3d1_sofiaferreyra.online@data-backup-store.com', '', '2023-07-10 19:48:25'),
(46, '', 'obregon54danielavanesa.76@gmail.com', '', '2023-07-10 22:56:35'),
(47, '', 'obregon54danielavanesa.76@gmail.com', '', '2023-07-10 22:57:10'),
(48, '', 'obregon54danielavanesa.76@gmail.com', '', '2023-07-10 22:57:39'),
(49, '', 'ss@ss', '', '2023-07-12 18:24:54'),
(50, '', '', '', '2023-08-14 21:55:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `SubCriptos`
--
ALTER TABLE `SubCriptos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Blog`
--
ALTER TABLE `Blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `SubCriptos`
--
ALTER TABLE `SubCriptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
