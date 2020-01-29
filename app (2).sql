-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2020 a las 20:43:12
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments_agenda`
--

CREATE TABLE `appointments_agenda` (
  `id_appointments_agenda` int(11) NOT NULL,
  `id_revision` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `cirujano` varchar(200) NOT NULL,
  `enfermera` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `appointments_agenda`
--

INSERT INTO `appointments_agenda` (`id_appointments_agenda`, `id_revision`, `fecha`, `time`, `time_end`, `cirujano`, `enfermera`, `descripcion`) VALUES
(44, 6, '2020-01-10', '18:01:00', '00:00:00', 'Aliquam qui fuga Se', 'Consequatur voluptat', 'Autem consequuntur v'),
(45, 6, '2020-01-13', '19:01:00', '00:00:00', 'Aliquam qui fuga Se', 'Consequatur voluptat', 'Autem consequuntur v'),
(46, 6, '2020-01-30', '20:01:00', '00:00:00', 'Aliquam qui fuga Se', 'Consequatur voluptat', 'Autem consequuntur v'),
(47, 6, '2020-01-18', '21:01:00', '00:00:00', 'Aliquam qui fuga Se', 'Consequatur voluptat', 'Autem consequuntur v'),
(53, 4, '2020-01-17', '13:00:00', '00:00:00', 'trwtw', 'wett', 'tetewtewt'),
(54, 4, '2020-01-25', '14:00:00', '00:00:00', 'trwtw', 'wett', 'tetewtewt'),
(55, 4, '2020-01-27', '15:00:00', '00:00:00', 'trwtw', 'wett', 'tetewtewt'),
(56, 5, '2020-01-16', '01:59:00', '00:00:00', 'ñññññññññ', 'ñlllllllllllllllllll', 'llllllllllllll'),
(57, 5, '2020-01-25', '03:59:00', '00:00:00', 'ñññññññññ', 'ñlllllllllllllllllll', 'llllllllllllll'),
(58, 5, '2020-01-13', '02:13:00', '00:00:00', 'adad', 'asdasdasd', 'asdasd'),
(59, 7, '2020-01-21', '08:00:00', '10:00:00', 'Nostrum tenetur impe', 'Quaerat quis nemo au', 'Est necessitatibus n'),
(65, 9, '2020-01-21', '09:18:00', '10:03:00', 'Repellendus Sed eu', 'Laboriosam illo et', 'Aliquip laborum repu'),
(66, 9, '2020-01-24', '09:18:00', '10:03:00', 'Repellendus Sed eu', 'Laboriosam illo et', 'Aliquip laborum repu'),
(67, 9, '2020-01-31', '13:35:00', '15:04:00', 'asdasdas', 'asdas', 'dasdasdasd'),
(68, 9, '2020-01-22', '10:00:00', '11:00:00', 'dasd', 'asdasf', 'fafafafaf'),
(69, 9, '2020-01-23', '10:00:00', '11:00:00', 'dasd', 'asdasf', 'fafafafaf'),
(70, 9, '2020-01-25', '10:00:00', '11:00:00', 'dasd', 'asdasf', 'fafafafaf'),
(71, 10, '2020-01-25', '14:14:00', '16:21:00', 'asfasfs', 'afasf', 'asasfasf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_auditoria` bigint(20) NOT NULL,
  `tabla` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cod_reg` int(11) NOT NULL,
  `status` int(1) DEFAULT 1,
  `fec_status` date DEFAULT NULL,
  `usr_regins` int(11) NOT NULL,
  `fec_regins` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usr_regmod` int(11) DEFAULT NULL,
  `fec_regmod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id_auditoria`, `tabla`, `cod_reg`, `status`, `fec_status`, `usr_regins`, `fec_regins`, `usr_regmod`, `fec_regmod`) VALUES
(1, 'users', 49, 1, NULL, 1, '2019-10-03 22:06:09', NULL, NULL),
(2, 'users', 50, 1, NULL, 1, '2019-10-03 22:07:14', NULL, NULL),
(3, 'modulos', 4, 1, NULL, 1, '2019-10-04 15:55:44', NULL, NULL),
(4, 'modulos', 5, 1, NULL, 1, '2019-10-04 16:02:21', NULL, NULL),
(5, 'modulos', 6, 1, NULL, 1, '2019-10-04 16:02:25', NULL, NULL),
(6, 'modulos', 7, 1, NULL, 1, '2019-10-04 16:02:42', NULL, NULL),
(7, 'modulos', 8, 1, NULL, 1, '2019-10-04 16:02:47', NULL, NULL),
(8, 'modulos', 9, 1, NULL, 1, '2019-10-04 16:09:53', NULL, NULL),
(9, 'modulos', 10, 1, NULL, 1, '2019-10-04 16:10:04', NULL, NULL),
(10, 'modulos', 11, 1, NULL, 1, '2019-10-04 16:13:37', NULL, NULL),
(11, 'modulos', 12, 1, NULL, 1, '2019-10-04 16:17:16', NULL, NULL),
(12, 'modulos', 13, 1, NULL, 1, '2019-10-04 16:17:37', NULL, NULL),
(13, 'modulos', 14, 1, NULL, 1, '2019-10-04 16:19:31', NULL, NULL),
(14, 'modulos', 15, 1, NULL, 1, '2019-10-04 16:19:39', NULL, NULL),
(15, 'modulos', 16, 1, NULL, 1, '2019-10-04 16:20:07', NULL, NULL),
(16, 'modulos', 17, 1, NULL, 1, '2019-10-04 16:20:14', NULL, NULL),
(17, 'modulos', 18, 1, NULL, 1, '2019-10-04 16:38:34', NULL, NULL),
(18, 'modulos', 19, 1, NULL, 1, '2019-10-04 16:38:42', NULL, NULL),
(19, 'modulos', 20, 1, NULL, 1, '2019-10-04 20:44:53', NULL, NULL),
(20, 'modulos', 21, 1, NULL, 1, '2019-10-04 20:45:15', NULL, NULL),
(21, 'modulos', 22, 1, NULL, 1, '2019-10-04 20:45:53', NULL, NULL),
(22, 'modulos', 23, 1, NULL, 1, '2019-10-04 20:46:05', NULL, NULL),
(23, 'modulos', 24, 1, NULL, 1, '2019-10-04 20:46:30', NULL, NULL),
(24, 'modulos', 25, 1, NULL, 1, '2019-10-04 20:46:45', NULL, NULL),
(25, 'modulos', 26, 1, NULL, 1, '2019-10-04 20:46:49', NULL, NULL),
(26, 'modulos', 27, 1, NULL, 1, '2019-10-04 20:46:59', NULL, NULL),
(27, 'modulos', 28, 1, NULL, 1, '2019-10-04 20:48:08', NULL, NULL),
(28, 'modulos', 29, 1, NULL, 1, '2019-10-04 20:48:47', NULL, NULL),
(29, 'modulos', 30, 1, NULL, 1, '2019-10-04 20:58:12', NULL, NULL),
(30, 'modulos', 33, 1, NULL, 1, '2019-10-04 21:03:09', NULL, NULL),
(31, 'modulos', 34, 1, NULL, 1, '2019-10-04 21:03:12', NULL, NULL),
(32, 'modulos', 35, 1, NULL, 1, '2019-10-04 21:03:25', NULL, NULL),
(33, 'modulos', 36, 1, NULL, 1, '2019-10-04 21:03:30', NULL, NULL),
(34, 'modulos', 37, 1, NULL, 1, '2019-10-04 21:03:39', NULL, NULL),
(35, 'modulos', 38, 1, NULL, 1, '2019-10-04 21:03:49', NULL, NULL),
(36, 'modulos', 39, 1, NULL, 1, '2019-10-04 21:22:58', NULL, NULL),
(37, 'modulos', 40, 1, NULL, 1, '2019-10-04 21:31:48', NULL, NULL),
(38, 'funciones', 3, 1, NULL, 1, '2019-10-05 14:59:20', NULL, NULL),
(39, 'funciones', 4, 1, NULL, 1, '2019-10-05 14:59:43', NULL, NULL),
(40, 'funciones', 5, 1, NULL, 1, '2019-10-05 15:01:11', NULL, NULL),
(41, 'funciones', 6, 1, NULL, 1, '2019-10-05 15:14:49', NULL, NULL),
(42, 'modulos', 41, 1, NULL, 1, '2019-10-23 15:40:26', NULL, NULL),
(43, 'funciones', 7, 1, NULL, 1, '2019-10-24 16:13:38', NULL, NULL),
(44, 'funciones', 8, 1, NULL, 1, '2019-10-07 14:53:57', NULL, NULL),
(45, 'funciones', 9, 1, NULL, 1, '2019-10-07 14:54:21', NULL, NULL),
(46, 'funciones', 10, 1, NULL, 1, '2019-10-07 14:54:42', NULL, NULL),
(47, 'modulos', 42, 1, NULL, 1, '2019-10-23 15:40:31', NULL, NULL),
(48, 'funciones', 12, 0, NULL, 1, '2019-10-24 16:14:56', NULL, '2019-10-24'),
(49, 'roles', 6, 1, NULL, 1, '2019-10-26 13:20:00', NULL, NULL),
(50, 'funciones', 13, 0, NULL, 1, '2019-10-24 16:14:53', NULL, '2019-10-24'),
(51, 'funciones', 14, 0, NULL, 1, '2019-10-24 16:14:50', NULL, '2019-10-24'),
(52, 'funciones', 15, 1, NULL, 1, '2019-10-07 21:42:06', NULL, NULL),
(53, 'funciones', 16, 1, NULL, 1, '2019-10-07 21:42:23', NULL, NULL),
(54, 'funciones', 17, 0, NULL, 1, '2019-10-24 16:13:22', NULL, '2019-10-24'),
(55, 'users', 51, 1, NULL, 1, '2019-10-21 13:59:13', NULL, NULL),
(56, 'users', 52, 1, NULL, 1, '2019-10-21 13:59:30', NULL, NULL),
(57, 'users', 53, 1, NULL, 1, '2019-10-21 15:42:44', NULL, NULL),
(58, 'users', 54, 0, NULL, 1, '2019-10-22 20:28:24', 1, '2019-10-22'),
(59, 'users', 55, 0, NULL, 1, '2019-10-22 20:25:28', 1, '2019-10-22'),
(60, 'roles', 8, 0, NULL, 1, '2019-10-26 13:20:34', NULL, '2019-10-26'),
(61, 'users', 56, 0, NULL, 1, '2019-10-22 20:27:27', 1, '2019-10-22'),
(62, 'users', 57, 0, NULL, 1, '2019-10-22 20:25:24', 1, '2019-10-22'),
(63, 'users', 58, 0, NULL, 1, '2019-10-22 20:25:16', 1, '2019-10-22'),
(64, 'users', 59, 0, NULL, 1, '2019-10-22 20:28:26', 1, '2019-10-22'),
(65, 'users', 60, 1, NULL, 1, '2019-10-22 20:36:15', NULL, NULL),
(66, 'roles', 9, 1, NULL, 60, '2019-10-26 13:20:04', NULL, NULL),
(67, 'users', 61, 1, NULL, 60, '2019-10-22 20:37:44', NULL, NULL),
(68, 'modulos', 43, 0, NULL, 60, '2019-10-23 15:40:35', NULL, '2019-10-23'),
(69, 'modulos', 44, 0, NULL, 60, '2019-10-23 15:41:44', NULL, '2019-10-23'),
(70, 'funciones', 18, 0, NULL, 60, '2019-10-24 16:15:19', NULL, '2019-10-24'),
(71, 'roles', 12, 0, NULL, 60, '2019-10-26 13:22:38', NULL, '2019-10-26'),
(72, 'roles', 13, 0, NULL, 60, '2019-10-26 13:22:35', NULL, '2019-10-26'),
(73, 'roles', 14, 0, NULL, 60, '2019-10-26 13:22:34', NULL, '2019-10-26'),
(74, 'modulos', 45, 1, NULL, 60, '2019-10-26 13:24:53', NULL, NULL),
(75, 'funciones', 19, 1, NULL, 60, '2019-10-26 13:25:24', NULL, NULL),
(76, 'modulos', 46, 0, NULL, 60, '2019-10-26 13:31:21', NULL, '2019-10-26'),
(77, 'clientes', 12, 1, NULL, 60, '2019-10-26 15:19:44', NULL, NULL),
(78, 'clientes', 13, 1, NULL, 60, '2019-10-26 15:20:04', NULL, NULL),
(79, 'clientes', 14, 0, NULL, 60, '2019-10-28 17:00:52', 60, '2019-10-28'),
(80, 'clientes', 15, 0, NULL, 60, '2019-10-28 17:00:51', 60, '2019-10-28'),
(81, 'clientes', 28, 0, NULL, 60, '2019-10-28 17:00:49', 60, '2019-10-28'),
(82, 'clientes', 29, 0, NULL, 60, '2019-10-28 17:00:47', 60, '2019-10-28'),
(83, 'funciones', 20, 1, NULL, 60, '2019-10-28 17:04:49', NULL, NULL),
(84, 'citys', 3, 1, NULL, 60, '2019-10-28 22:27:50', 60, '2019-10-28'),
(85, 'citys', 4, 0, NULL, 60, '2019-10-29 20:56:59', 60, '2019-10-29'),
(86, 'citys', 5, 1, NULL, 60, '2019-10-28 20:55:01', NULL, NULL),
(87, 'citys', 6, 0, NULL, 60, '2019-10-28 20:55:14', 60, '2019-10-28'),
(88, 'citys', 7, 0, NULL, 60, '2019-10-28 20:55:11', 60, '2019-10-28'),
(89, 'funciones', 21, 1, NULL, 60, '2019-10-28 20:57:12', NULL, NULL),
(90, 'citys', 8, 0, NULL, 60, '2019-10-28 21:36:08', 60, '2019-10-28'),
(91, 'clinic', 1, 0, NULL, 60, '2019-10-28 22:26:13', 60, '2019-10-28'),
(92, 'clinic', 2, 0, NULL, 60, '2019-10-28 22:26:11', 60, '2019-10-28'),
(93, 'citys', 9, 0, NULL, 60, '2019-10-28 21:41:49', 60, '2019-10-28'),
(94, 'citys', 10, 0, NULL, 60, '2019-10-28 21:42:35', 60, '2019-10-28'),
(95, 'citys', 11, 0, NULL, 60, '2019-10-28 21:42:33', 60, '2019-10-28'),
(96, 'clinic', 3, 0, NULL, 60, '2019-10-28 22:26:10', 60, '2019-10-28'),
(97, 'clinic', 4, 0, NULL, 60, '2019-10-28 22:26:08', 60, '2019-10-28'),
(98, 'clinic', 5, 1, NULL, 60, '2019-10-28 22:26:35', NULL, NULL),
(99, 'clinic', 6, 1, NULL, 60, '2019-10-28 22:28:26', NULL, NULL),
(100, 'clientes', 30, 1, NULL, 60, '2019-10-29 21:17:32', NULL, NULL),
(101, 'clientes', 31, 1, NULL, 60, '2019-10-29 21:28:14', NULL, NULL),
(102, 'clientes', 32, 1, NULL, 60, '2019-10-29 21:28:57', NULL, NULL),
(103, 'clientes', 33, 1, NULL, 60, '2019-10-29 21:29:20', NULL, NULL),
(104, 'clientes', 34, 1, NULL, 60, '2019-10-29 22:40:27', NULL, NULL),
(105, 'clientes', 35, 1, NULL, 60, '2019-10-29 22:21:32', NULL, NULL),
(106, 'clientes', 36, 0, NULL, 60, '2019-10-30 15:27:23', 60, '2019-10-30'),
(107, 'modulos', 47, 1, NULL, 60, '2019-10-30 15:30:37', NULL, NULL),
(108, 'funciones', 22, 1, NULL, 60, '2019-10-30 15:33:01', NULL, NULL),
(109, 'clinic', 7, 1, NULL, 60, '2019-10-30 16:22:16', NULL, NULL),
(110, 'users', 62, 1, NULL, 60, '2019-10-30 16:32:13', NULL, NULL),
(111, 'funciones', 23, 1, NULL, 60, '2019-10-30 17:10:35', NULL, NULL),
(112, 'citys', 1, 1, NULL, 60, '2019-10-30 17:33:18', NULL, NULL),
(113, 'lines_business', 2, 1, NULL, 60, '2019-10-30 20:25:20', NULL, NULL),
(114, 'lines_business', 3, 1, NULL, 60, '2019-10-30 20:25:16', NULL, NULL),
(115, 'lines_business', 4, 0, NULL, 60, '2019-10-30 20:25:47', 60, '2019-10-30'),
(116, 'lines_business', 5, 0, NULL, 60, '2019-10-30 20:25:45', 60, '2019-10-30'),
(117, 'clientes', 37, 0, NULL, 60, '2019-12-23 17:45:01', 60, '2019-12-23'),
(118, 'clientes', 38, 0, NULL, 60, '2019-12-23 17:44:59', 60, '2019-12-23'),
(119, 'clientes', 39, 0, NULL, 60, '2019-12-23 17:44:58', 60, '2019-12-23'),
(120, 'clientes', 40, 0, NULL, 60, '2019-12-23 17:44:56', 60, '2019-12-23'),
(121, 'clientes', 41, 0, NULL, 60, '2019-12-23 17:44:55', 60, '2019-12-23'),
(122, 'clientes', 42, 0, NULL, 60, '2019-12-23 17:44:54', 60, '2019-12-23'),
(123, 'clientes', 43, 0, NULL, 60, '2019-12-23 17:44:52', 60, '2019-12-23'),
(124, 'clientes', 44, 0, NULL, 60, '2019-12-23 17:44:51', 60, '2019-12-23'),
(125, 'users', 63, 1, NULL, 60, '2019-10-30 21:02:19', NULL, NULL),
(126, 'users', 64, 1, NULL, 60, '2019-10-30 21:02:29', NULL, NULL),
(127, 'users', 65, 1, NULL, 60, '2019-10-30 21:02:45', NULL, NULL),
(128, 'clientes', 45, 0, NULL, 65, '2019-12-23 17:44:50', 60, '2019-12-23'),
(129, 'clientes', 46, 0, NULL, 65, '2019-12-23 17:44:48', 60, '2019-12-23'),
(130, 'clientes', 47, 0, NULL, 65, '2019-12-23 17:44:47', 60, '2019-12-23'),
(131, 'funciones', 24, 1, NULL, 60, '2019-11-01 17:53:26', NULL, NULL),
(132, 'queries', 1, 0, NULL, 60, '2019-11-02 16:00:03', 60, '2019-11-02'),
(133, 'queries', 2, 0, NULL, 60, '2019-11-08 20:04:23', 60, '2019-11-08'),
(134, 'queries', 3, 1, NULL, 60, '2019-11-02 16:00:00', NULL, NULL),
(135, 'queries', 4, 1, NULL, 60, '2019-11-02 16:00:33', NULL, NULL),
(136, 'queries', 5, 1, NULL, 60, '2019-11-02 16:20:16', NULL, NULL),
(137, 'revision_appointment', 2, 0, NULL, 60, '2019-12-30 15:16:18', 60, '2019-12-30'),
(138, 'revision_appointment', 3, 0, NULL, 60, '2019-12-30 15:16:19', 60, '2019-12-30'),
(139, 'revision_appointment', 4, 1, NULL, 60, '2019-11-09 16:42:01', NULL, NULL),
(140, 'clientes', 48, 0, NULL, 60, '2019-12-23 17:44:45', 60, '2019-12-23'),
(141, 'clientes', 49, 0, NULL, 60, '2019-12-23 17:44:44', 60, '2019-12-23'),
(142, 'clientes', 50, 0, NULL, 60, '2019-12-23 17:44:42', 60, '2019-12-23'),
(143, 'clientes', 53, 1, NULL, 60, '2019-12-23 17:45:34', NULL, NULL),
(144, 'clientes', 56, 1, NULL, 60, '2019-12-23 19:01:36', NULL, NULL),
(145, 'clientes', 57, 1, NULL, 60, '2019-12-26 13:54:39', NULL, NULL),
(146, 'clientes', 58, 1, NULL, 60, '2019-12-26 13:58:40', NULL, NULL),
(147, 'clientes', 59, 1, NULL, 60, '2019-12-26 13:59:24', NULL, NULL),
(148, 'clientes', 60, 1, NULL, 60, '2019-12-26 15:05:11', NULL, NULL),
(149, 'revision_appointment', 5, 1, NULL, 60, '2019-12-30 13:58:11', NULL, NULL),
(150, 'users', 66, 1, NULL, 60, '2019-12-30 15:28:38', NULL, NULL),
(151, 'users', 67, 1, NULL, 60, '2019-12-30 15:30:21', NULL, NULL),
(152, 'users', 68, 1, NULL, 60, '2019-12-30 15:31:48', NULL, NULL),
(153, 'clientes', 61, 1, NULL, 60, '2019-12-30 16:39:48', NULL, NULL),
(154, 'funciones', 25, 1, NULL, 60, '2020-01-02 13:45:24', NULL, NULL),
(155, 'valuations', 7, 0, NULL, 60, '2020-01-02 14:46:07', 60, '2020-01-02'),
(156, 'valuations', 8, 1, NULL, 60, '2020-01-02 14:46:05', NULL, NULL),
(157, 'valuations', 9, 1, NULL, 60, '2020-01-02 14:45:57', NULL, NULL),
(158, 'valuations', 10, 1, NULL, 60, '2020-01-02 16:02:09', NULL, NULL),
(159, 'funciones', 26, 1, NULL, 60, '2020-01-02 15:01:35', NULL, NULL),
(160, 'surgeries', 2, 0, NULL, 60, '2020-01-02 16:02:23', 60, '2020-01-02'),
(161, 'surgeries', 3, 1, NULL, 60, '2020-01-02 16:02:22', NULL, NULL),
(162, 'modulos', 48, 1, NULL, 60, '2020-01-03 14:18:29', NULL, NULL),
(163, 'funciones', 27, 1, NULL, 60, '2020-01-03 14:20:20', NULL, NULL),
(164, 'tasks', 1, 1, NULL, 60, '2020-01-07 15:06:19', NULL, NULL),
(165, 'tasks', 2, 1, NULL, 60, '2020-01-07 15:46:27', NULL, NULL),
(166, 'tasks', 5, 1, NULL, 60, '2020-01-07 15:51:19', NULL, NULL),
(167, 'tasks', 6, 0, NULL, 60, '2020-01-07 17:21:34', 60, '2020-01-07'),
(168, 'tasks', 7, 1, NULL, 60, '2020-01-07 17:21:29', NULL, NULL),
(169, 'modulos', 49, 1, NULL, 60, '2020-01-07 17:26:39', NULL, NULL),
(170, 'funciones', 28, 1, NULL, 60, '2020-01-07 17:27:11', NULL, NULL),
(171, 'tasks', 8, 1, NULL, 60, '2020-01-08 16:46:26', NULL, NULL),
(172, 'tasks', 9, 1, NULL, 60, '2020-01-08 16:58:39', NULL, NULL),
(173, 'tasks', 10, 1, NULL, 60, '2020-01-08 16:58:52', NULL, NULL),
(174, 'tasks', 11, 1, NULL, 60, '2020-01-08 16:59:09', NULL, NULL),
(175, 'tasks', 12, 1, NULL, 60, '2020-01-08 16:59:33', NULL, NULL),
(176, 'queries', 6, 1, NULL, 60, '2020-01-09 15:59:16', NULL, NULL),
(177, 'queries', 7, 1, NULL, 60, '2020-01-09 16:10:54', NULL, NULL),
(178, 'queries', 8, 1, NULL, 60, '2020-01-09 16:11:12', NULL, NULL),
(179, 'queries', 9, 1, NULL, 60, '2020-01-09 16:11:18', NULL, NULL),
(180, 'queries', 10, 1, NULL, 60, '2020-01-09 16:11:25', NULL, NULL),
(181, 'queries', 11, 1, NULL, 60, '2020-01-09 16:11:39', NULL, NULL),
(182, 'queries', 12, 1, NULL, 60, '2020-01-09 16:11:45', NULL, NULL),
(183, 'queries', 13, 1, NULL, 60, '2020-01-09 16:11:51', NULL, NULL),
(184, 'queries', 14, 1, NULL, 60, '2020-01-09 16:11:57', NULL, NULL),
(185, 'surgeries', 4, 1, NULL, 60, '2020-01-10 14:25:21', NULL, NULL),
(186, 'surgeries', 5, 1, NULL, 60, '2020-01-10 14:25:30', NULL, NULL),
(187, 'surgeries', 6, 1, NULL, 60, '2020-01-10 14:25:38', NULL, NULL),
(188, 'revision_appointment', 6, 1, NULL, 60, '2020-01-10 15:02:48', NULL, NULL),
(189, 'tasks', 13, 1, NULL, 60, '2020-01-13 15:51:47', NULL, NULL),
(190, 'tasks', 14, 1, NULL, 60, '2020-01-13 15:52:04', NULL, NULL),
(191, 'queries', 15, 1, NULL, 60, '2020-01-13 16:07:38', NULL, NULL),
(192, 'queries', 16, 1, NULL, 60, '2020-01-13 16:07:44', NULL, NULL),
(193, 'valuations', 11, 1, NULL, 60, '2020-01-13 16:09:54', NULL, NULL),
(194, 'valuations', 12, 1, NULL, 60, '2020-01-13 16:10:00', NULL, NULL),
(195, 'surgeries', 7, 1, NULL, 60, '2020-01-13 16:12:09', NULL, NULL),
(196, 'surgeries', 8, 1, NULL, 60, '2020-01-13 16:12:14', NULL, NULL),
(197, 'surgeries', 9, 1, NULL, 60, '2020-01-13 16:13:36', NULL, NULL),
(198, 'surgeries', 10, 1, NULL, 60, '2020-01-13 17:48:04', NULL, NULL),
(199, 'surgeries', 11, 1, NULL, 60, '2020-01-13 17:48:15', NULL, NULL),
(200, 'funciones', 29, 1, NULL, 60, '2020-01-15 15:33:05', NULL, NULL),
(201, 'preanesthesias', 2, 0, NULL, 60, '2020-01-15 16:18:30', 60, '2020-01-15'),
(202, 'preanesthesias', 3, 1, NULL, 60, '2020-01-15 16:18:38', NULL, NULL),
(203, 'preanesthesias', 4, 1, NULL, 60, '2020-01-15 16:18:44', NULL, NULL),
(204, 'preanesthesias', 5, 1, NULL, 60, '2020-01-15 16:18:53', NULL, NULL),
(205, 'surgeries', 12, 1, NULL, 60, '2020-01-16 15:41:55', NULL, NULL),
(206, 'surgeries', 13, 1, NULL, 60, '2020-01-16 15:42:10', NULL, NULL),
(207, 'surgeries', 14, 1, NULL, 60, '2020-01-16 15:42:20', NULL, NULL),
(208, 'surgeries', 15, 1, NULL, 60, '2020-01-16 15:42:31', NULL, NULL),
(209, 'tasks', 15, 1, NULL, 60, '2020-01-16 16:35:18', NULL, NULL),
(210, 'tasks', 16, 1, NULL, 60, '2020-01-16 16:43:19', NULL, NULL),
(211, 'tasks', 18, 0, NULL, 60, '2020-01-24 16:45:38', 60, '2020-01-24'),
(212, 'tasks', 19, 1, NULL, 60, '2020-01-16 17:17:24', NULL, NULL),
(213, 'tasks', 20, 1, NULL, 60, '2020-01-17 15:49:20', NULL, NULL),
(214, 'tasks', 21, 1, NULL, 60, '2020-01-17 15:50:18', NULL, NULL),
(215, 'tasks', 22, 1, NULL, 60, '2020-01-17 16:14:04', NULL, NULL),
(216, 'clientes', 62, 1, NULL, 60, '2020-01-17 16:52:33', NULL, NULL),
(217, 'queries', 17, 1, NULL, 60, '2020-01-17 16:56:15', NULL, NULL),
(218, 'queries', 18, 1, NULL, 60, '2020-01-17 16:56:36', NULL, NULL),
(219, 'queries', 19, 1, NULL, 60, '2020-01-17 16:56:47', NULL, NULL),
(220, 'valuations', 13, 1, NULL, 60, '2020-01-17 17:35:23', NULL, NULL),
(221, 'valuations', 14, 1, NULL, 60, '2020-01-17 17:35:31', NULL, NULL),
(222, 'valuations', 15, 1, NULL, 60, '2020-01-17 17:35:42', NULL, NULL),
(223, 'valuations', 16, 1, NULL, 60, '2020-01-20 15:55:10', NULL, NULL),
(224, 'valuations', 17, 1, NULL, 60, '2020-01-20 15:59:46', NULL, NULL),
(225, 'valuations', 18, 1, NULL, 60, '2020-01-20 16:15:29', NULL, NULL),
(226, 'valuations', 19, 1, NULL, 60, '2020-01-20 17:05:48', NULL, NULL),
(227, 'preanesthesias', 6, 1, NULL, 60, '2020-01-20 17:19:38', NULL, NULL),
(228, 'preanesthesias', 7, 1, NULL, 60, '2020-01-20 17:28:04', NULL, NULL),
(229, 'preanesthesias', 8, 1, NULL, 60, '2020-01-20 17:43:38', NULL, NULL),
(230, 'surgeries', 16, 1, NULL, 60, '2020-01-21 13:15:56', NULL, NULL),
(231, 'surgeries', 17, 1, NULL, 60, '2020-01-21 13:17:45', NULL, NULL),
(232, 'revision_appointment', 7, 1, NULL, 60, '2020-01-21 13:31:49', NULL, NULL),
(233, 'revision_appointment', 9, 1, NULL, 60, '2020-01-21 13:32:23', NULL, NULL),
(234, 'clientes', 63, 1, NULL, 60, '2020-01-21 13:41:07', NULL, NULL),
(235, 'clientes', 64, 1, NULL, 60, '2020-01-21 13:44:15', NULL, NULL),
(236, 'clientes', 65, 1, NULL, 60, '2020-01-21 13:45:01', NULL, NULL),
(237, 'clientes', 66, 1, NULL, 60, '2020-01-21 14:00:20', NULL, NULL),
(238, 'clientes', 67, 1, NULL, 60, '2020-01-21 14:00:38', NULL, NULL),
(239, 'clientes', 68, 1, NULL, 60, '2020-01-21 14:08:42', NULL, NULL),
(240, 'clientes', 69, 1, NULL, 60, '2020-01-21 14:14:42', NULL, NULL),
(241, 'valuations', 20, 1, NULL, 60, '2020-01-21 14:39:31', NULL, NULL),
(242, 'valuations', 21, 1, NULL, 60, '2020-01-21 14:39:51', NULL, NULL),
(243, 'surgeries', 18, 1, NULL, 60, '2020-01-21 16:15:58', NULL, NULL),
(244, 'preanesthesias', 9, 1, NULL, 60, '2020-01-22 16:11:58', NULL, NULL),
(245, 'preanesthesias', 10, 1, NULL, 60, '2020-01-22 16:12:27', NULL, NULL),
(246, 'surgeries', 19, 1, NULL, 60, '2020-01-23 16:13:46', NULL, NULL),
(247, 'surgeries', 20, 1, NULL, 60, '2020-01-23 16:14:01', NULL, NULL),
(248, 'surgeries', 21, 1, NULL, 60, '2020-01-23 16:14:15', NULL, NULL),
(249, 'revision_appointment', 10, 1, NULL, 60, '2020-01-24 16:31:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `date_auth` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_users`
--

INSERT INTO `auth_users` (`id`, `id_user`, `token`, `date_auth`) VALUES
(146, 60, '97fbc486895739cc316b13e0a13df66ae6fda93ca4c0adc9f2dab8d13c8ffc1ec717b57ef9adec7c88e28249f8e120856e83cda1e4375cacca3fcdbac8584d2c', '2020-01-25 14:39:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citys`
--

CREATE TABLE `citys` (
  `id_city` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citys`
--

INSERT INTO `citys` (`id_city`, `nombre`) VALUES
(3, 'Medellin'),
(4, 'Bogota'),
(5, 'Cali'),
(6, 'Quis architecto sed'),
(7, 'Sint nihil fugiat n'),
(8, 'Nemo iusto ea lorem'),
(9, 'Qui iusto veritatis'),
(10, 'Omnis dolore dolores'),
(11, 'bbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientc_credit_information`
--

CREATE TABLE `clientc_credit_information` (
  `id_clientc_redit_information` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `dependent_independent` varchar(255) DEFAULT NULL,
  `type_contract` varchar(255) DEFAULT NULL,
  `antiquity` varchar(255) DEFAULT NULL,
  `average_monthly_income` varchar(200) DEFAULT NULL,
  `previous_credits` varchar(200) DEFAULT NULL,
  `reported` varchar(255) DEFAULT NULL,
  `bank_account` varchar(200) DEFAULT NULL,
  `properties` int(11) DEFAULT NULL,
  `vehicle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientc_credit_information`
--

INSERT INTO `clientc_credit_information` (`id_clientc_redit_information`, `id_client`, `dependent_independent`, `type_contract`, `antiquity`, `average_monthly_income`, `previous_credits`, `reported`, `bank_account`, `properties`, `vehicle`) VALUES
(1, 56, 'Qui corporis dolorem', 'Ad dolore ullam blan', 'Commodi eum velit et', '6', 'Esse unde voluptas e', 'Eveniet facere nece', 'Nostrud ut impedit', 0, 0),
(2, 57, 'Dolor ad distinctio', 'Quo excepturi velit', 'Nostrud illo tempora', '12', 'Ullamco cumque conse', 'Nam quasi et eum ver', 'Omnis voluptas est s', 0, 0),
(3, 58, 'Esse ut aut odit ess', 'Enim quis omnis sequ', 'Optio fugiat qui v', '11', 'Enim laudantium et', 'Cillum est debitis e', 'Commodo minim recusa', 1, 1),
(4, 59, 'Reiciendis qui cupid', 'Esse et accusantium', 'In totam itaque qui', '5', 'Duis nostrum ullamco', 'Eius ut ex ab adipis', 'Dolores quo temporib', 1, NULL),
(5, 60, 'aaaaa', 'bbbbbbb', 'cccccccccc', 'dddddd', 'eeeeeeee', 'fffffffff', 'ggggggggggg', 1, 0),
(6, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, 62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(9, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(13, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `identificacion` varchar(200) DEFAULT NULL,
  `identificacion_verify` int(11) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `city` int(11) NOT NULL,
  `clinic` int(11) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_line` int(11) NOT NULL,
  `id_user_asesora` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `state` enum('No Contactada','Agendada','Progamada','Descartada','Asesorada No Agendada','Llamada no Asesorada','Aprobada','Opearada','Valorada','Asesorado por FB esperando contacto Telefonico','Re Agendada a Valoracion') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `identificacion`, `identificacion_verify`, `fecha_nacimiento`, `city`, `clinic`, `telefono`, `email`, `id_line`, `id_user_asesora`, `direccion`, `state`) VALUES
(37, 'Amet eos occaecat s', 'Vero dolore ullam ea', '27', 0, '1982-01-18', 3, 6, '29', 'buseqaq@mailinator.net', 3, 64, 'Est commodi aut ut v', 'No Contactada'),
(38, 'Sint labore modi imp', 'Molestiae velit fug', '72', 1, '1980-11-24', 3, 5, '58', 'kyqe@mailinator.com', 2, 60, 'Qui asperiores est p', 'No Contactada'),
(39, 'Lorem consequatur I', 'Fugiat nisi reicien', '81', NULL, '1997-10-14', 5, 7, '41', 'rohyrami@mailinator.com', 3, 60, 'Sit quas necessitati', 'No Contactada'),
(40, 'Impedit ex est qui', 'Omnis voluptatum pla', '26', NULL, '2001-12-12', 5, 7, '17', 'cuzirisa@mailinator.net', 3, 60, 'Hic quae voluptas co', 'No Contactada'),
(41, 'Praesentium architec', 'Quos molestias volup', '45', 1, '1994-12-25', 5, 7, '87', 'bozo@mailinator.net', 2, 60, 'Quia sed sit dolor v', 'No Contactada'),
(42, 'Ullamco beatae non v', 'Explicabo Et praese', '58', NULL, '2014-01-06', 5, 7, '37', 'lorulycep@mailinator.net', 3, 60, 'Eum ipsum pariatur', 'No Contactada'),
(43, 'Iure quis voluptas n', 'Voluptates esse vol', '19', NULL, '2017-02-13', 3, 6, '12', 'remeqy@mailinator.com', 3, 60, 'Vel perspiciatis di', 'No Contactada'),
(44, 'Sed ducimus quis do', 'Id est incididunt ex', '48', NULL, '1999-03-18', 3, 6, '15', 'vyzigaze@mailinator.com', 3, 61, 'Fugit nostrum non c', 'No Contactada'),
(45, 'Ut eum voluptas enim', 'Qui sit aliquid lab', '99', 0, '1998-06-18', 3, 6, '7', 'lily@mailinator.com', 3, 61, 'Consectetur proiden', 'No Contactada'),
(46, 'Veritatis ex id natu', 'Qui rerum ut eaque u', '28', NULL, '2002-05-25', 3, 6, '67', 'syhymyz@mailinator.net', 3, 65, 'Ipsa illo dolorem d', 'No Contactada'),
(47, 'Et in suscipit aperi', 'Voluptate fugiat en', '36', 1, '2019-11-15', 5, 7, '86', 'zilamejusi@mailinator.com', 3, 65, 'Amet enim consequun', 'No Contactada'),
(48, 'Dolore magnam eius e', 'Rerum repudiandae ma', '79', NULL, '1999-12-12', 5, 7, '28', 'jegatomof@mailinator.com', 3, 65, 'Porro modi adipisci', 'No Contactada'),
(49, 'Excepteur consectetu', 'Et dolorum labore ac', '818', NULL, '1995-11-14', 5, 7, '50', 'gekiwoqo@mailinator.com', 2, 65, 'Et excepteur vitae i', 'No Contactada'),
(50, 'Dolor commodo dolore', 'Dolores adipisci fug', '13', 1, '2013-03-25', 3, 5, '27', 'novak@mailinator.com', 3, 65, 'Quis dolorem rerum l', 'No Contactada'),
(51, 'Fugiat qui reprehend', 'Aliquid qui tenetur', '62', 1, '1971-03-07', 5, 7, '60', 'pixa@mailinator.com', 3, 61, 'Consequuntur est ani', 'No Contactada'),
(52, 'Fugiat qui reprehend', 'Aliquid qui tenetur', '62313', 1, '1971-03-07', 5, 7, '60', 'pix313a@mailinator.com', 3, 61, 'Consequuntur est ani', 'No Contactada'),
(53, 'Ea magnam architecto', 'Eos sint consequunt', '1', 1, '1993-08-20', 5, 7, '92', 'hozoroh@mailinator.net', 2, 65, 'Eum Nam deserunt ut', 'No Contactada'),
(54, 'Velit in quo pariatu', 'Eligendi sed esse et', '95', 1, '2009-06-23', 3, 5, '30', 'hozamadoxi@mailinator.com', 2, 65, 'Ut mollitia soluta d', 'No Contactada'),
(55, 'Qui rerum similique', 'Ea magna sunt bland', '31', NULL, '1993-09-07', 3, 6, '54', 'zyjurob@mailinator.net', 2, 63, 'Laborum ad do aut mo', 'No Contactada'),
(56, 'Necessitatibus deser', 'Ipsa nemo assumenda', '10', 0, '1994-06-12', 3, 6, '100', 'kywy@mailinator.net', 2, 66, 'Commodi quam at eu f', 'No Contactada'),
(57, 'Magni rem officia at', 'Aut quia natus labor', '50', 0, '1990-11-26', 3, 6, '3', 'cigyti@mailinator.com', 3, 64, 'Tempor dolor quidem', 'No Contactada'),
(58, 'Enim eum illum pari', 'Aperiam laborum Omn', '69', 1, '1974-01-06', 3, 6, '17', 'vagukud@mailinator.net', 2, 65, 'Omnis tenetur eligen', 'No Contactada'),
(59, 'Itaque maxime ration', 'Asperiores soluta ve', '79313', 1, '2003-01-27', 5, 7, '36', 'jasi@mailinator.com', 3, 63, 'Ut modi aperiam minu', 'No Contactada'),
(60, 'aaaaaaaaaaa', 'bbbbbbbbbbbb', '222222222222', 0, '1976-02-28', 3, 6, '111111111111', 'buxefodoxo@mailinator.net', 2, 60, 'Fugiat veritatis qui', 'No Contactada'),
(61, 'Enim dolores quidem', 'Pariatur Assumenda', '40', 0, '1970-12-08', 3, 6, '68', 'gogasuzep@mailinator.com', 2, 60, 'Eaque quis omnis qui', 'No Contactada'),
(62, 'Maria', 'Laya', '92', 1, '2020-01-17', 5, 7, '73', 'zymes@mailinator.net', 2, 60, 'Deleniti ipsam fugia', 'No Contactada'),
(63, 'Nostrum fugit ab vo', 'Voluptatem do est f', '23559081', 0, '1993-06-17', 3, 6, '3152077862', 'micybur@mailinator.com', 3, 61, 'Iusto rem laudantium', 'No Contactada'),
(64, 'Non provident venia', 'Dolor quibusdam reru', '96', NULL, '2020-01-09', 5, 7, '31520778623', 'vamofywosi@mailinator.com', 3, 61, 'Labore do nostrum qu', 'No Contactada'),
(65, 'Sed repellendus Nes', 'Architecto sapiente', NULL, NULL, '2007-04-22', 3, 5, '54241421', 'ruhij@mailinator.com', 3, 61, 'Excepteur quidem off', 'No Contactada'),
(66, 'Debitis esse volupta', 'Beatae officiis cons', '235590811', 0, '2012-09-13', 5, 7, '96', 'duda@mailinator.net', 2, 68, 'Deserunt aut eveniet', 'No Contactada'),
(67, 'In consequuntur sunt', 'Commodi est illum', NULL, 0, '1999-10-15', 5, 7, '331', 'herozasetiz@mailinator.com', 3, 64, 'Aliqua Sequi cupida', 'Descartada'),
(68, 'Officia voluptas sed', 'Quis est commodi no', '100', 0, '1987-03-20', 3, 6, '24', 'geseki@mailinator.com', 2, 68, 'Nesciunt delectus', 'Progamada'),
(69, 'Ex est incididunt ve', 'Ea consequat Dolore', '76', 0, '1976-12-13', 3, 6, '9631', 'filezanule@mailinator.com', 3, 67, 'Hic corporis velit e', 'Agendada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_clinic_history`
--

CREATE TABLE `client_clinic_history` (
  `id_client_clinic_history` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `eps` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `number_children` int(11) DEFAULT NULL,
  `alcohol` int(11) DEFAULT NULL,
  `smoke` int(11) DEFAULT NULL,
  `surgery` int(11) DEFAULT NULL,
  `previous_surgery` varchar(255) DEFAULT NULL,
  `disease` int(11) DEFAULT NULL,
  `major_disease` varchar(255) DEFAULT NULL,
  `medication` int(11) DEFAULT NULL,
  `drink_medication` varchar(255) DEFAULT NULL,
  `allergic` int(11) DEFAULT NULL,
  `allergic_medication` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `client_clinic_history`
--

INSERT INTO `client_clinic_history` (`id_client_clinic_history`, `id_client`, `eps`, `height`, `weight`, `children`, `number_children`, `alcohol`, `smoke`, `surgery`, `previous_surgery`, `disease`, `major_disease`, `medication`, `drink_medication`, `allergic`, `allergic_medication`) VALUES
(1, 53, 'Quaerat consequuntur', 'Unde ad adipisicing', 'Sapiente maiores et', 1, 2, 1, 1, NULL, NULL, NULL, NULL, 1, 'aasd', NULL, NULL),
(2, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 56, 'Placeat laborum Ma', 'Quae obcaecati volup', 'Fugiat non eaque ull', 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(5, 57, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(6, 58, 'Aperiam sapiente atq', 'Repellendus Soluta', 'Voluptatem sit non', 1, 12, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 59, 'Nemo placeat lorem', 'Omnis ipsum iusto in', 'Similique porro dolo', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 60, 'aaaaaaa', 'bbbbbbbb', 'ccccccc', 0, 0, 1, 0, 0, '0', 0, '0', 1, 'sfsfsff', 1, 'sfsff'),
(9, 61, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(10, 62, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(11, 63, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(12, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 67, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, 0, NULL, 0, NULL, 0, NULL),
(16, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_information_aditional_surgery`
--

CREATE TABLE `client_information_aditional_surgery` (
  `id_client_information_aditional_surgery` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `current_size` varchar(255) DEFAULT NULL,
  `desired_size` varchar(255) DEFAULT NULL,
  `implant_volumem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `client_information_aditional_surgery`
--

INSERT INTO `client_information_aditional_surgery` (`id_client_information_aditional_surgery`, `id_client`, `current_size`, `desired_size`, `implant_volumem`) VALUES
(1, 50, 'Nobis et sed omnis q', 'Et quia aut voluptat', 'Eligendi explicabo'),
(2, 51, 'Mollit quia ex dolor', 'Unde magnam quasi vi', 'Sunt nulla qui archi'),
(3, 52, 'Mollit quia ex dolor', 'Unde magnam quasi vi', 'Sunt nulla qui archi'),
(4, 53, 'Delectus aute unde', 'Non odit id proiden', 'Ratione rerum magnam'),
(5, 54, 'Ut nisi dolor distin', 'Voluptatibus eos cor', 'Provident sed commo'),
(6, 55, 'Saepe recusandae Vo', 'Pariatur Qui delect', 'Voluptas sunt omnis'),
(7, 56, 'Saepe occaecat qui d', 'Non dolore incididun', 'Exercitationem id i'),
(8, 57, 'Placeat corporis qu', 'Eius numquam ea volu', 'Ratione quis dicta e'),
(9, 58, 'Exercitationem volup', 'Voluptas harum iste', 'Voluptatem quod Nam'),
(10, 59, 'Officiis sed minus i', 'Labore rerum omnis c', 'Culpa rerum in dign'),
(11, 60, 'aaaaaaaaa', 'bbbbbbbb', 'cccccccccccccc'),
(12, 61, NULL, NULL, NULL),
(13, 62, NULL, NULL, NULL),
(14, 63, NULL, NULL, NULL),
(15, 64, NULL, NULL, NULL),
(16, 65, NULL, NULL, NULL),
(17, 66, NULL, NULL, NULL),
(18, 67, NULL, NULL, NULL),
(19, 68, NULL, NULL, NULL),
(20, 69, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinic`
--

CREATE TABLE `clinic` (
  `id_clinic` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_city` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clinic`
--

INSERT INTO `clinic` (`id_clinic`, `nombre`, `id_city`, `direccion`) VALUES
(5, 'Clínica Láser', 3, 'mmmmmmmmmmmmmmm'),
(6, 'Clínica Especialista del Poblado', 3, 'uuuuuuuuuuuuuu'),
(7, 'Clínica Láser', 5, 'Sapiente est qui inv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_datos_personales` int(20) NOT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellido_p` varchar(200) NOT NULL,
  `apellido_m` varchar(200) NOT NULL,
  `n_cedula` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_datos_personales`, `id_usuario`, `nombres`, `apellido_p`, `apellido_m`, `n_cedula`, `fecha_nacimiento`, `telefono`, `direccion`) VALUES
(16, 54, 'Pariatur Velit bla', 'Voluptas est dolores', 'Omnis consectetur ex', 'Assumenda velit non', '1973-07-10', 'Molestias quia facer', 'Aut sed officia aliq'),
(17, 55, 'Eligendi irure venia', 'Beatae maiores hic s', 'Temporibus eiusmod v', 'Vel voluptas blandit', '1990-07-16', 'Nihil explicabo Asp', 'Vero soluta non quia'),
(18, 56, 'Eveniet delectus l', 'Illum dolore molest', 'Reprehenderit nemo a', 'Omnis in consequatur', '1997-02-25', 'Fuga Temporibus adi', 'In nihil possimus d'),
(19, 57, 'Javer', 'Laborum Tempor id q', 'ttttttttttttt', '241421421414', '1989-08-22', '41242144', 'hhhhhhhhhhhhhhh'),
(20, 58, 'Excepturi aut ea off', 'Amet distinctio In', 'Nam sit sed explicab', 'Ut sint occaecat qua', '2017-02-28', 'Ex tenetur fugiat of', 'Dicta maxime eiusmod'),
(21, 59, 'Consequatur rerum l', 'Dolore nihil aute ip', 'Animi quam voluptas', 'Magna eum quod digni', '1974-01-22', 'Deserunt duis quisqu', 'Consectetur labore e'),
(22, 60, 'Carlos', 'Cardenas', 'Albarran', '23559081', '1994-03-03', '3152077862', 'calle 47A, #6AB-30, Bosque Verde'),
(23, 61, 'Quidem veritatis qua', 'Atque enim aut facil', 'Atque in commodi par', 'Et laborum ut irure', '2011-01-24', 'Minima reiciendis na', 'Nihil numquam cum et'),
(24, 62, 'Tenetur optio modi', 'Excepturi commodi si', 'Sed consequatur ad e', 'Voluptatem maxime co', '1982-12-13', 'Blanditiis dolorum c', 'Exercitationem id u'),
(25, 63, 'Voluptatem facilis v', 'Sint voluptatem co', 'Sint ut esse sunt si', 'Officiis enim volupt', '1994-12-16', 'Quaerat perspiciatis', 'Qui illum voluptas'),
(26, 64, 'Commodo sed et saepe', 'Aut ipsum lorem ipsu', 'Amet esse et quae', 'Sit officiis labore', '1996-07-01', 'Odit blanditiis aut', 'Rem commodo aut quib'),
(27, 65, 'Velit qui elit Nam', 'Ut laborum ut soluta', 'Repellendus Magna e', 'Quia nobis ea deseru', '1979-10-24', 'Qui esse ratione re', 'Cillum excepturi sol'),
(28, 66, 'Facere placeat pari', 'Enim libero ut deser', 'Et molestiae qui ear', 'Et cumque esse quia', '1974-10-16', 'Quia vel adipisicing', 'Nulla impedit sed l'),
(29, 67, 'Ad dignissimos ut ut', 'Est doloremque quae', 'Ea temporibus mollit', 'Rem nemo provident', '2004-07-19', 'Deleniti doloribus n', 'Dolorum aut tempore'),
(30, 68, 'Corrupti ipsam dele', 'Est excepteur dolore', 'Nisi accusantium sit', 'Sed similique qui qu', '1978-12-11', 'Vel impedit et eius', 'Ratione quisquam est');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id_funciones` int(11) NOT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `posicion` int(2) NOT NULL,
  `route` varchar(100) NOT NULL,
  `visibilidad` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id_funciones`, `id_modulo`, `nombre`, `descripcion`, `posicion`, `route`, `visibilidad`) VALUES
(7, 41, 'Usuarios', 'Usuariosssss', 1, 'users', 1),
(8, 41, 'Modulos', 'Modulos', 3, 'modules', 1),
(9, 41, 'Funciones', 'Gestion de Vistas', 4, 'funciones', 1),
(10, 41, 'Roles', 'Roles', 6, 'rol', 1),
(12, 42, 'Deleniti nulla magna', 'Qui nobis ipsum har', 7, 'Voluptatem reprehen', 1),
(13, 42, 'Nisi dolor optio de', 'Aute eveniet quas s', 5, 'Proident ipsa qui', 1),
(14, 42, 'bbbbbbbbbb', 'bbbbbbbbbbbbb', 4, 'bbbbbbbbbbb', 1),
(17, 42, 'ttttttttttttt', 'Sint nisi sit temp', 6, 'Et vero suscipit Nam', 1),
(18, 41, 'Provident ut ut ips', 'Eaque et id odit qui', 5, 'Odio dolorem lorem d', 1),
(19, 45, 'Pacientes', 'Registro de pacientes y Clientes', 1, 'clients', 1),
(20, 42, 'Ciudades', 'Ciudades', 2, 'citys', 1),
(21, 42, 'Clinicas', 'Gestion de Clinicas', 1, 'clinics', 1),
(22, 47, 'Revisión', 'Gestion de las citas de Revision del paciente', 5, 'revision-appointment', 1),
(23, 42, 'Lineas de Negocio', 'Lineas de Negocio', 3, 'business-lines', 1),
(24, 47, 'Consultas', 'Consulta Inicial', 1, 'queries', 1),
(25, 47, 'Valoraciones', 'Gestion de Valoraciones', 2, 'valuations', 1),
(26, 47, 'Cirugías', 'Gestion de Cirugías', 4, 'surgeries', 1),
(27, 48, 'Lista de Tareas', 'Gestion de Lista de Tareas', 1, 'tasks', 1),
(28, 49, 'General', 'Gestion de Calendario General', 1, 'calendar', 1),
(29, 47, 'Pre anestesia', 'Gestion de Citas de Pre anestesia', 3, 'preanesthesia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lines_business`
--

CREATE TABLE `lines_business` (
  `id_line` int(11) NOT NULL,
  `nombre_line` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lines_business`
--

INSERT INTO `lines_business` (`id_line`, `nombre_line`) VALUES
(2, 'CEP'),
(3, 'CiruCredito'),
(4, 'Id ex voluptate aut'),
(5, 'Doloremque fugiat ut');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `icon` varchar(200) NOT NULL,
  `posicion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `descripcion`, `icon`, `posicion`) VALUES
(41, 'Perfiles', 'Admistracion de Usuarios, Roles y Modulos', 'fas fa-users', 5),
(42, 'Configuracion', 'Configuraciones', 'fas fa-cog', 7),
(43, 'Quos velit consequat', 'Doloremque quis cupi', '', 8),
(44, 'Fugit molestiae con', 'Nostrud ut ipsa ill', '', 9),
(45, 'Catálogos', 'Catálogos', 'fas fa-book', 1),
(46, 'Sit repudiandae dol', 'Nulla libero tempora', 'Non voluptatibus vit', 5),
(47, 'Citas', 'Gestion de Citas', 'fas fa-calendar-alt', 2),
(48, 'Tareas', 'Gestion de Tareas', 'far fa-calendar-check', 3),
(49, 'Calendarios', 'Gestion de Calendarios', 'fas fa-calendar-alt', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id_notifications` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `type` enum('task','queries','valuations','preanesthesia','surgery','revision','preanesthesias','surgeries','') NOT NULL,
  `view` enum('Si','No','','') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id_notifications`, `fecha`, `title`, `id_user`, `id_event`, `type`, `view`) VALUES
(25, '2020-01-17', 'Hoy Tarea #16: Quia nisi possimus', 67, 16, 'task', 'No'),
(26, '2020-01-17', 'Hoy Tarea #22: Ad reprehenderit ex', 60, 22, 'task', 'Si'),
(27, '2020-01-18', 'Mañana Tarea #21: Et quis tempor disti', 60, 21, 'task', 'Si'),
(28, '2020-01-20', '3 dias para Tarea #20: Aut nisi elit elit', 60, 20, 'task', 'Si'),
(46, '2020-01-17', 'Hoy VLR con Paciente Maria Laya', 60, 13, 'valuations', 'Si'),
(47, '2020-01-18', 'Mañana VLR con Paciente Enim dolores quidem Pariatur Assumenda', 60, 14, 'valuations', 'Si'),
(48, '2020-01-20', '3 dias para VLR con Paciente aaaaaaaaaaa bbbbbbbbbbbb', 60, 15, 'valuations', 'Si'),
(52, '2020-01-22', 'Hoy Pre Anestesia con Paciente Maria Laya', 60, 9, 'preanesthesias', 'Si'),
(53, '2020-01-23', 'Mañana Pre Anestesia con Paciente Necessitatibus deser Ipsa nemo assumenda', 60, 10, 'preanesthesias', 'Si'),
(54, '2020-01-25', '3 dias para Pre Anestesia con Paciente aaaaaaaaaaa bbbbbbbbbbbb', 60, 4, 'preanesthesias', 'Si'),
(55, '2020-01-22', 'Hoy Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(56, '2020-01-23', 'Mañana Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(57, '2020-01-25', '3 dias para Revision con Paciente Sed ducimus quis do Id est incididunt ex', 61, 4, 'revision', 'No'),
(58, '2020-01-25', '3 dias para Revision con Paciente Enim eum illum pari Aperiam laborum Omn', 65, 5, 'revision', 'No'),
(59, '2020-01-25', '3 dias para Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(60, '2020-01-22', 'Hoy Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(61, '2020-01-23', 'Mañana Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(62, '2020-01-25', '3 dias para Revision con Paciente Sed ducimus quis do Id est incididunt ex', 61, 4, 'revision', 'No'),
(63, '2020-01-25', '3 dias para Revision con Paciente Enim eum illum pari Aperiam laborum Omn', 65, 5, 'revision', 'No'),
(64, '2020-01-25', '3 dias para Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(65, '2020-01-22', 'Hoy Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(66, '2020-01-23', 'Mañana Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(67, '2020-01-25', '3 dias para Revision con Paciente Sed ducimus quis do Id est incididunt ex', 61, 4, 'revision', 'No'),
(68, '2020-01-25', '3 dias para Revision con Paciente Enim eum illum pari Aperiam laborum Omn', 65, 5, 'revision', 'No'),
(69, '2020-01-25', '3 dias para Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(70, '2020-01-23', 'Hoy CX con Paciente Officia voluptas sed Quis est commodi no', 68, 19, 'surgeries', 'No'),
(71, '2020-01-24', 'Mañana CX con Paciente Enim dolores quidem Pariatur Assumenda', 60, 20, 'surgeries', 'Si'),
(72, '2020-01-26', '3 dias para CX con Paciente Nostrum fugit ab vo Voluptatem do est f', 61, 21, 'surgeries', 'No'),
(73, '2020-01-23', 'Hoy Pre Anestesia con Paciente Necessitatibus deser Ipsa nemo assumenda', 66, 10, 'preanesthesias', 'No'),
(74, '2020-01-23', 'Hoy CX con Paciente Officia voluptas sed Quis est commodi no', 68, 19, 'surgeries', 'No'),
(75, '2020-01-24', 'Mañana CX con Paciente Enim dolores quidem Pariatur Assumenda', 60, 20, 'surgeries', 'Si'),
(76, '2020-01-26', '3 dias para CX con Paciente Nostrum fugit ab vo Voluptatem do est f', 61, 21, 'surgeries', 'No'),
(77, '2020-01-23', 'Hoy Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si'),
(78, '2020-01-24', 'Mañana Revision con Paciente Maria Laya', 60, 9, 'revision', 'Si');

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
-- Estructura de tabla para la tabla `preanesthesias`
--

CREATE TABLE `preanesthesias` (
  `id_preanesthesias` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `surgeon` varchar(300) NOT NULL,
  `operating_room` varchar(300) NOT NULL,
  `clinic` int(11) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `status_surgeries` int(11) NOT NULL COMMENT '0 = Pendiente, 1 = Procesado, 2 = Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preanesthesias`
--

INSERT INTO `preanesthesias` (`id_preanesthesias`, `id_cliente`, `fecha`, `time`, `time_end`, `surgeon`, `operating_room`, `clinic`, `observaciones`, `status_surgeries`) VALUES
(2, 56, '2020-03-03', '20:00:00', '00:00:00', 'Daniel Andres Correa Posada', 'Asperiores consectet', 6, 'Exercitation aut adi', 0),
(3, 61, '2020-01-15', '03:30:00', '00:00:00', 'Consequatur Velit d', 'In doloribus quia pa', 7, 'Quod voluptatem sin', 0),
(4, 60, '2020-01-25', '10:47:00', '00:00:00', 'Commodi molestiae in', 'Officiis mollitia ne', 7, 'Aut dolore voluptate', 0),
(5, 58, '2020-01-15', '09:28:00', '00:00:00', 'Impedit qui vel inc', 'Ipsam maxime omnis q', 7, 'Ratione proident si', 0),
(6, 62, '2020-01-20', '08:30:00', '10:35:00', 'Non consequuntur con', 'In veniam rem aut q', 7, 'Obcaecati commodo as', 0),
(7, 58, '2020-01-20', '10:45:00', '12:20:00', 'In fugit incididunt', 'Voluptatem incididun', 7, 'Autem ut et esse lab', 0),
(8, 57, '2020-01-20', '10:36:00', '10:40:00', 'Officia perferendis', 'Laudantium nobis fa', 6, 'Totam odit in ullam', 0),
(9, 62, '2020-01-22', '08:30:00', '10:30:00', 'Exercitationem earum', 'Fugiat harum dolore', 7, 'Sit tempora officia', 0),
(10, 56, '2020-01-23', '08:30:00', '10:30:00', 'Nesciunt veritatis', 'In doloremque et sed', 5, 'Nihil dicta dolorem', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queries`
--

CREATE TABLE `queries` (
  `id_queries` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `file_cotizacion` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pendiente, 1 = Procesado, 2 = Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `queries`
--

INSERT INTO `queries` (`id_queries`, `id_cliente`, `fecha`, `time`, `observaciones`, `file_cotizacion`, `status`) VALUES
(6, 59, '2020-01-25', '23:07:00', 'Dolorem commodi cum', '20191220171210_5df7ae14004cf3392122b642.pdf', 1),
(7, 61, '2020-01-23', '11:56:00', 'Ex corporis quae occ', NULL, 0),
(8, 61, '2020-01-20', '11:48:00', 'Delectus magna quia', NULL, 0),
(9, 58, '2020-01-25', '20:04:00', 'Odio dignissimos com', NULL, 0),
(10, 57, '2020-01-09', '06:23:00', 'Repellendus Suscipi', NULL, 0),
(11, 59, '2020-01-09', '04:24:00', 'Qui dolor voluptatum', NULL, 0),
(12, 61, '2020-01-09', '10:22:00', 'Non numquam quia vol', NULL, 0),
(13, 57, '2020-01-09', '05:24:00', 'Nobis cum possimus', NULL, 0),
(14, 60, '2020-01-09', '20:12:00', 'Totam et delectus n', NULL, 0),
(15, 61, '2020-01-13', '13:42:00', 'Magni quidem explica', NULL, 0),
(16, 57, '2020-01-13', '14:50:00', 'Proident ut ipsam t', NULL, 0),
(17, 62, '2020-01-17', '09:04:00', 'Dolorem sunt qui cul', NULL, 0),
(18, 61, '2020-01-18', '22:51:00', 'Minim voluptatum sus', NULL, 0),
(19, 60, '2020-01-20', '20:54:00', 'Consectetur sapient', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_appointment`
--

CREATE TABLE `revision_appointment` (
  `id_revision` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `numero_contrato` varchar(200) NOT NULL,
  `cirugia` varchar(200) NOT NULL,
  `clinica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `revision_appointment`
--

INSERT INTO `revision_appointment` (`id_revision`, `id_paciente`, `numero_contrato`, `cirugia`, `clinica`) VALUES
(2, 41, 'Non quia doloremque', 'Reprehenderit odit', 7),
(3, 39, 'Officiis earum volup', 'Id est qui sunt fu', 5),
(4, 44, 'Odit quia occaecat n', 'Sit lorem exercitat', 6),
(5, 58, '1111111111', 'rinossss', 6),
(6, 61, 'Libero molestiae asp', 'Est sit nobis hic pr', 5),
(7, 57, 'Aut repellendus Odi', 'Recusandae Ea accus', 6),
(8, 62, 'In proident cupidit', 'Quia voluptatem Sit', 6),
(9, 62, 'In proident cupidit', 'Quia voluptatem Sit', 6),
(10, 56, '1414', 'asfasf', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL,
  `editable_rol` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`, `editable_rol`) VALUES
(6, 'Administrador', 'Control total', 1),
(7, 'Esse a ea tempore', 'Voluptatem consequat', 1),
(8, 'aaaaaaaaaaa', 'bbbbbbbbbbbbbb', 1),
(9, 'Asesor', 'Algunas Funciones', 1),
(10, 'Non dolor modi dolor', 'Nesciunt debitis ei', 1),
(11, 'Asperiores saepe qua', 'Consequuntur irure i', 1),
(12, 'Excepteur iure ad cu', 'Minima temporibus si', 1),
(13, 'Amet sed iure repre', 'Adipisci explicabo', 1),
(14, 'Nulla beatae rerum o', 'Minim rem voluptatem', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operaciones`
--

CREATE TABLE `rol_operaciones` (
  `id_rol_operaciones` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_funciones` int(11) NOT NULL,
  `admin_rol_operaciones` int(1) DEFAULT 0,
  `registrar` int(11) NOT NULL DEFAULT 1,
  `general` int(11) NOT NULL DEFAULT 1,
  `detallada` int(1) NOT NULL DEFAULT 1,
  `actualizar` int(11) NOT NULL DEFAULT 1,
  `eliminar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_operaciones`
--

INSERT INTO `rol_operaciones` (`id_rol_operaciones`, `id_rol`, `id_funciones`, `admin_rol_operaciones`, `registrar`, `general`, `detallada`, `actualizar`, `eliminar`) VALUES
(30, 8, 12, 0, 1, 1, 1, 1, 1),
(31, 8, 7, 0, 1, 1, 1, 1, 1),
(32, 8, 9, 0, 1, 1, 1, 1, 1),
(33, 14, 10, 0, 1, 1, 1, 1, 1),
(34, 13, 8, 0, 1, 1, 1, 1, 1),
(199, 6, 28, 0, 1, 1, 1, 1, 1),
(200, 6, 27, 0, 1, 1, 1, 1, 1),
(201, 6, 22, 0, 1, 1, 1, 1, 1),
(202, 6, 25, 0, 1, 1, 1, 1, 1),
(203, 6, 26, 0, 1, 1, 1, 1, 1),
(204, 6, 29, 0, 1, 1, 1, 1, 1),
(205, 6, 19, 0, 1, 1, 1, 1, 1),
(206, 6, 20, 0, 1, 1, 1, 1, 1),
(207, 6, 21, 0, 1, 1, 1, 1, 1),
(208, 6, 23, 0, 1, 1, 1, 1, 1),
(209, 6, 7, 0, 1, 1, 1, 1, 1),
(210, 6, 8, 0, 1, 1, 1, 1, 1),
(211, 6, 9, 0, 1, 1, 1, 1, 1),
(212, 6, 10, 0, 1, 1, 1, 1, 1),
(213, 9, 28, 0, 1, 1, 1, 1, 1),
(214, 9, 27, 0, 1, 1, 1, 1, 1),
(215, 9, 22, 0, 1, 1, 1, 1, 1),
(216, 9, 25, 0, 1, 1, 1, 1, 1),
(217, 9, 26, 0, 1, 1, 1, 1, 1),
(218, 9, 29, 0, 1, 1, 1, 1, 1),
(219, 9, 19, 0, 1, 1, 1, 1, 1),
(220, 9, 20, 0, 1, 1, 1, 1, 1),
(221, 9, 7, 0, 1, 1, 1, 1, 1),
(222, 9, 8, 0, 1, 1, 1, 1, 1),
(223, 9, 9, 0, 1, 1, 1, 1, 1),
(224, 9, 10, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `surgeries`
--

CREATE TABLE `surgeries` (
  `id_surgeries` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `attempt` tinyint(1) NOT NULL,
  `type` enum('Al Contado','Financiado','','') NOT NULL DEFAULT 'Al Contado',
  `amount` float(20,2) NOT NULL,
  `surgeon` varchar(300) NOT NULL,
  `operating_room` varchar(300) NOT NULL,
  `clinic` int(11) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `status_surgeries` int(11) NOT NULL COMMENT '0 = Pendiente, 1 = Procesado, 2 = Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `surgeries`
--

INSERT INTO `surgeries` (`id_surgeries`, `id_cliente`, `fecha`, `time`, `time_end`, `attempt`, `type`, `amount`, `surgeon`, `operating_room`, `clinic`, `observaciones`, `status_surgeries`) VALUES
(2, 56, '2020-01-02', '22:35:00', '00:00:00', 0, 'Al Contado', 0.00, 'ccccccccccc', 'ddddddddddddddddd', 6, 'Cupidatat possimus', 0),
(3, 61, '2020-07-24', '03:16:00', '00:00:00', 0, 'Al Contado', 4.21, 'aaaaaaaaaa', 'bbbbbbbbb', 6, 'pppppppppppppooooooooooooooooooooo', 0),
(4, 60, '2020-01-25', '09:38:00', '00:00:00', 1, 'Al Contado', 0.00, 'Facilis eiusmod pari', 'Commodi ut perferend', 6, 'Aliquip in voluptas', 0),
(5, 56, '2020-01-10', '17:43:00', '00:00:00', 0, 'Al Contado', 0.00, 'Et qui molestiae deb', 'Nemo incididunt comm', 6, 'Eos beatae tempor s', 0),
(6, 61, '2020-01-29', '05:22:00', '00:00:00', 0, 'Al Contado', 0.00, 'Harum atque voluptas', 'Incididunt perferend', 6, 'Ullam corporis autem', 0),
(7, 61, '2020-01-13', '06:38:00', '00:00:00', 0, 'Al Contado', 0.00, 'Voluptatem dolorem v', 'Quam aut aliquam sap', 7, 'Officia minim qui ut', 0),
(8, 58, '2020-01-13', '19:34:00', '00:00:00', 0, 'Al Contado', 0.00, 'Voluptatem architect', 'Laborum Tempor eius', 6, 'Aliquam earum omnis', 0),
(9, 60, '2020-03-03', '08:46:00', '00:00:00', 0, 'Al Contado', 0.00, 'Veniam dolor commod', 'Amet incidunt ipsa', 6, 'Sint sed et do elit', 0),
(10, 57, '2020-01-13', '11:41:00', '00:00:00', 1, 'Al Contado', 0.00, 'Mollitia quaerat dol', 'Ea fugit est porro', 7, 'Sint voluptates off', 0),
(11, 59, '2020-01-13', '05:23:00', '00:00:00', 0, 'Al Contado', 0.00, 'Impedit est nobis i', 'Dolor molestiae enim', 5, 'Odit et est autem q', 0),
(12, 56, '2020-01-16', '07:01:00', '00:00:00', 1, 'Financiado', 0.00, 'Adipisicing aut perf', 'Maiores dolore culpa', 6, 'Debitis modi sit des', 0),
(13, 57, '2020-01-16', '12:42:00', '00:00:00', 1, 'Al Contado', 0.00, 'Minus proident magn', 'Fugiat ea eum ratio', 5, 'Enim dignissimos iru', 0),
(14, 57, '2020-01-16', '01:56:00', '00:00:00', 0, 'Financiado', 0.00, 'Ipsa corporis et su', 'Sunt rerum velit et', 7, 'Ad dolore dolor temp', 0),
(15, 56, '2020-01-16', '10:08:00', '00:00:00', 0, 'Al Contado', 0.00, 'Velit labore nobis', 'Minim temporibus sed', 6, 'Aliquip provident o', 0),
(16, 61, '2020-01-21', '07:13:00', '10:26:00', 0, 'Financiado', 123123.00, 'Labore tempora non q', 'Soluta aut soluta ul', 6, 'Commodi rerum veniam', 0),
(17, 62, '2020-01-21', '11:00:00', '13:00:00', 1, 'Financiado', 412412.00, 'Reiciendis ipsam sim', 'Autem animi perfere', 7, 'Impedit dolorum ape', 0),
(18, 69, '2020-06-05', '01:52:00', '20:36:00', 0, 'Financiado', 7000500.00, 'Reprehenderit dolor', 'Eiusmod rerum tempor', 6, 'Quia qui commodi bla', 0),
(19, 68, '2020-01-23', '02:08:00', '10:49:00', 1, 'Financiado', 0.00, 'Voluptate eiusmod in', 'Est praesentium ali', 7, 'Adipisci nulla dolor', 0),
(20, 61, '2020-01-24', '13:09:00', '15:22:00', 0, 'Financiado', 0.00, 'Quis temporibus non', 'Voluptas veniam eni', 6, 'Rerum voluptatibus n', 0),
(21, 63, '2020-01-26', '00:01:00', '14:45:00', 0, 'Financiado', 0.00, 'Qui nisi labore prae', 'Magna earum ex ea ad', 7, 'Est sunt aut delectu', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `surgeries_payments`
--

CREATE TABLE `surgeries_payments` (
  `id_surgeries_payments` int(11) NOT NULL,
  `id_surgerie` int(11) NOT NULL,
  `date` date NOT NULL,
  `way_to_pay` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `surgeries_payments`
--

INSERT INTO `surgeries_payments` (`id_surgeries_payments`, `id_surgerie`, `date`, `way_to_pay`, `amount`) VALUES
(8, 17, '2006-12-12', 'Cupiditate ut rerum', 1255.00),
(16, 18, '2012-10-27', 'Corporis laboriosam', 14214.00),
(17, 18, '2012-10-27', 'Corporis laboriosam', 421424.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id_tasks` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `status_task` enum('Abierta','Finalizada','','') NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id_tasks`, `responsable`, `issue`, `fecha`, `time`, `status_task`, `observaciones`) VALUES
(6, 66, 'Eu neque culpa expl', '2020-01-07', '21:21:00', 'Abierta', 'Id rerum non qui qui'),
(7, 60, 'Llamar a Carlos', '2020-03-01', '08:00:00', 'Abierta', 'bbbbbbbbbbb'),
(8, 66, 'Lamar Paciente', '2020-01-25', '12:56:00', 'Abierta', 'Ea Nam voluptate exp'),
(9, 62, 'Blanditiis dolor sed', '2020-01-25', '17:01:00', 'Abierta', 'Sapiente provident'),
(10, 60, 'Aliquam anim fugiat', '2020-01-25', '08:34:00', 'Abierta', 'Id eu voluptates exp'),
(11, 64, 'Voluptates consequat', '2020-01-25', '08:57:00', 'Abierta', 'Ullam qui est ducimu'),
(12, 65, 'Sit quia autem eos i', '2020-01-25', '11:47:00', 'Abierta', 'Placeat enim do lau'),
(13, 66, 'Facilis ratione cumq', '2020-01-14', '11:02:00', 'Abierta', 'In optio veniam ex'),
(14, 68, 'Vel dolores officia', '2020-01-14', '14:22:00', 'Abierta', 'Aliquip quae laboris'),
(15, 60, 'Repudiandae consequa', '2020-01-16', '13:29:00', 'Abierta', 'Magna et odit vel la'),
(16, 67, 'Quia nisi possimus', '2020-01-17', '18:36:00', 'Abierta', 'Et sit consequatur'),
(18, 64, 'In nulla ad et nobis', '2020-01-19', '01:06:00', 'Abierta', 'Exercitation quibusd'),
(19, 62, 'Minima in quia commo', '2020-01-16', '04:42:00', 'Abierta', 'Temporibus quod veri'),
(20, 60, 'Aut nisi elit elit', '2020-01-20', '07:12:00', 'Abierta', 'Proident veritatis'),
(21, 60, 'Et quis tempor disti', '2020-01-18', '00:26:00', 'Abierta', 'Aut eius quia ut vel'),
(22, 60, 'Ad reprehenderit ex', '2020-01-17', '13:01:00', 'Abierta', 'Similique ad maxime');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks_followers`
--

CREATE TABLE `tasks_followers` (
  `id_tasks_followers` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tasks_followers`
--

INSERT INTO `tasks_followers` (`id_tasks_followers`, `id_task`, `id_follower`) VALUES
(6, 6, 68),
(7, 6, 66),
(8, 6, 65),
(9, 6, 61),
(20, 8, 66),
(21, 8, 64),
(22, 9, 68),
(23, 9, 66),
(24, 9, 64),
(25, 10, 68),
(26, 10, 66),
(27, 10, 61),
(28, 11, 67),
(29, 11, 66),
(30, 12, 66),
(31, 12, 65),
(32, 12, 61),
(38, 14, 68),
(39, 14, 64),
(40, 14, 62),
(41, 13, 67),
(42, 13, 65),
(43, 15, 68),
(44, 15, 65),
(45, 16, 62),
(46, 16, 60),
(47, 18, 68),
(48, 18, 65),
(49, 18, 61),
(50, 18, 60),
(51, 19, 68),
(52, 19, 65),
(53, 19, 61),
(54, 20, 67),
(55, 20, 65),
(56, 20, 62),
(57, 21, 66),
(58, 22, 67),
(59, 22, 65),
(60, 7, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_profile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_line` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img_profile`, `remember_token`, `id_rol`, `id_line`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cardenascarlos18@gmail.com24214214', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', '', NULL, 6, NULL, NULL, NULL),
(54, NULL, 'nihubu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'QUIROFANO.jpg', NULL, 8, NULL, '2019-10-21 20:45:04', '2019-10-21 22:48:33'),
(55, NULL, 'hibu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, NULL, '2019-10-21 20:56:10', '2019-10-21 20:56:10'),
(56, NULL, 'fapuhocyxo@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'TRATAMIENTOS-DE-PIEL.jpg', NULL, 6, NULL, '2019-10-21 21:24:03', '2019-10-22 02:25:30'),
(57, NULL, 'hhhhhhhhhhh@hhhhhhhhh.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, NULL, '2019-10-21 21:41:47', '2019-10-21 22:49:23'),
(58, NULL, 'vvvvvvvvvvvvvi@mailinator.com1313', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'PROCEDIMIENTOS-MENORES.jpg', NULL, 8, NULL, '2019-10-22 01:43:37', '2019-10-22 02:25:21'),
(59, NULL, 'zebojy@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'mediana2.jpg', NULL, 8, NULL, '2019-10-23 01:27:23', '2019-10-23 01:27:23'),
(60, NULL, 'cardenascarlos18@gmail.com', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', '78089357_2868032116574355_7872967356157263872_o.jpg', NULL, 9, 2, '2019-10-23 01:31:51', '2020-01-24 22:03:39'),
(61, NULL, 'lylisizok@mailinator.net', NULL, '202cb962ac59075b964b07152d234b70', 'grande2.jpg', NULL, 9, 3, '2019-10-23 01:37:44', '2019-12-30 21:19:12'),
(62, NULL, 'kiluso@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, 3, '2019-10-30 21:32:13', '2019-12-30 21:19:18'),
(63, NULL, 'xiroguva@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, NULL, '2019-10-31 02:02:19', '2019-10-31 02:02:50'),
(64, NULL, 'sebemycuh@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, 3, '2019-10-31 02:02:29', '2019-12-30 21:19:23'),
(65, NULL, 'muvic@mailinator.com', NULL, '202cb962ac59075b964b07152d234b70', 'default (1).png', NULL, 9, 2, '2019-10-31 02:02:45', '2019-12-30 21:19:06'),
(66, NULL, 'xuvogi@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '0de6dc51-f722-4211-8114-7e5aee0a4c34.jpg', NULL, 9, 2, '2019-12-30 20:28:38', '2019-12-30 21:19:01'),
(67, NULL, 'memefol@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '0de6dc51-f722-4211-8114-7e5aee0a4c34.jpg', NULL, 9, 3, '2019-12-30 20:30:21', '2019-12-30 21:18:53'),
(68, NULL, 'runifajav@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '0de6dc51-f722-4211-8114-7e5aee0a4c34.jpg', NULL, 9, 2, '2019-12-30 20:31:48', '2019-12-30 21:18:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valuations`
--

CREATE TABLE `valuations` (
  `id_valuations` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `time` time NOT NULL,
  `time_end` time NOT NULL,
  `type` enum('Al Contado','Financiado','','') NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `cotizacion` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pendiente, 1 = Procesado, 2 = Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valuations`
--

INSERT INTO `valuations` (`id_valuations`, `id_cliente`, `fecha`, `time`, `time_end`, `type`, `observaciones`, `cotizacion`, `status`) VALUES
(7, 57, '2020-01-02', '09:49:00', '00:00:00', 'Al Contado', 'Fugiat mollitia expl', NULL, 0),
(8, 58, '2020-01-02', '21:12:00', '00:00:00', 'Al Contado', 'Excepteur vitae ea v', NULL, 0),
(9, 56, '2020-03-03', '08:00:00', '00:00:00', 'Al Contado', 'Ea earum ut fuga La', NULL, 0),
(10, 56, '2020-02-14', '21:54:00', '00:00:00', 'Al Contado', 'Aspernatur ducimus', NULL, 0),
(11, 60, '2020-01-13', '02:39:00', '00:00:00', 'Al Contado', 'Pariatur Cupidatat', NULL, 0),
(12, 57, '2020-01-13', '04:49:00', '05:50:00', 'Financiado', 'Velit quia tenetur e', NULL, 0),
(13, 62, '2020-01-17', '08:09:00', '00:00:00', 'Al Contado', 'Nisi sit sunt repre', NULL, 0),
(14, 61, '2020-01-18', '21:02:00', '00:00:00', 'Al Contado', 'Nihil reprehenderit', NULL, 0),
(15, 60, '2020-01-20', '15:42:00', '16:00:00', 'Al Contado', 'Quos suscipit ut ut', NULL, 0),
(16, 62, '2020-01-20', '18:30:00', '20:34:00', 'Al Contado', 'Sapiente dolorum lab', NULL, 0),
(17, 56, '2020-01-21', '18:25:00', '20:16:00', 'Financiado', 'Officiis a excepturi', NULL, 0),
(18, 60, '2020-01-20', '08:30:00', '10:30:00', 'Al Contado', 'Qui commodo non in d', NULL, 0),
(19, 62, '2020-01-20', '10:35:00', '11:35:00', 'Al Contado', 'Reiciendis deleniti', 'Para-sitio-web.png', 1),
(20, 64, '2020-01-21', '04:44:00', '05:40:00', 'Financiado', 'Illo laborum velit s', NULL, 2),
(21, 57, '2020-01-21', '01:36:00', '03:24:00', 'Financiado', 'Et qui modi quae vol', 'TRATAMIENTOS-DE-PIEL (4).jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments_agenda`
--
ALTER TABLE `appointments_agenda`
  ADD PRIMARY KEY (`id_appointments_agenda`),
  ADD KEY `id_revision_appointments_agenda_idx` (`id_revision`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD UNIQUE KEY `id_auditoria` (`id_auditoria`),
  ADD KEY `fk_usr_regins` (`usr_regins`),
  ADD KEY `fk_usr_regmod` (`usr_regmod`),
  ADD KEY `usr_regins` (`usr_regins`);

--
-- Indices de la tabla `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_user_id_user_idx` (`id_user`);

--
-- Indices de la tabla `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id_city`);

--
-- Indices de la tabla `clientc_credit_information`
--
ALTER TABLE `clientc_credit_information`
  ADD PRIMARY KEY (`id_clientc_redit_information`),
  ADD KEY `id_client` (`id_client`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `clientes_id_city_idx` (`city`),
  ADD KEY `clientes_id_clinic_idx` (`clinic`),
  ADD KEY `clientes_id_line_idx` (`id_line`),
  ADD KEY `clientes_id_user_idx` (`id_user_asesora`);

--
-- Indices de la tabla `client_clinic_history`
--
ALTER TABLE `client_clinic_history`
  ADD PRIMARY KEY (`id_client_clinic_history`),
  ADD KEY `id_client` (`id_client`);

--
-- Indices de la tabla `client_information_aditional_surgery`
--
ALTER TABLE `client_information_aditional_surgery`
  ADD PRIMARY KEY (`id_client_information_aditional_surgery`),
  ADD KEY `id_client` (`id_client`);

--
-- Indices de la tabla `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id_clinic`),
  ADD KEY `clinic_id_city_idx` (`id_city`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_datos_personales`),
  ADD KEY `datos_personales_id_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id_funciones`),
  ADD UNIQUE KEY `id_lista_vista` (`id_funciones`),
  ADD UNIQUE KEY `nombre_lista_vista` (`nombre`),
  ADD KEY `Vistas_Modulo` (`id_modulo`);

--
-- Indices de la tabla `lines_business`
--
ALTER TABLE `lines_business`
  ADD PRIMARY KEY (`id_line`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD UNIQUE KEY `id_modulo_vista` (`id_modulo`),
  ADD UNIQUE KEY `nombre_modulo_vista` (`nombre`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notifications`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `preanesthesias`
--
ALTER TABLE `preanesthesias`
  ADD PRIMARY KEY (`id_preanesthesias`),
  ADD KEY `surgeries_id_cliente_idx` (`id_cliente`),
  ADD KEY `clinic` (`clinic`);

--
-- Indices de la tabla `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id_queries`),
  ADD KEY `queries_id_cliente_idx` (`id_cliente`);

--
-- Indices de la tabla `revision_appointment`
--
ALTER TABLE `revision_appointment`
  ADD PRIMARY KEY (`id_revision`),
  ADD KEY `id_paciente_revision_appointment_idx` (`id_paciente`),
  ADD KEY `fk_id_clinica_revision_appointment` (`clinica`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  ADD PRIMARY KEY (`id_rol_operaciones`),
  ADD UNIQUE KEY `id_rol_operaciones` (`id_rol_operaciones`),
  ADD KEY `Rol_Vista` (`id_rol`),
  ADD KEY `Vista_Rol` (`id_funciones`);

--
-- Indices de la tabla `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id_surgeries`),
  ADD KEY `surgeries_id_cliente_idx` (`id_cliente`),
  ADD KEY `clinic` (`clinic`);

--
-- Indices de la tabla `surgeries_payments`
--
ALTER TABLE `surgeries_payments`
  ADD PRIMARY KEY (`id_surgeries_payments`),
  ADD KEY `id_surgerie` (`id_surgerie`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`),
  ADD KEY `responsable` (`responsable`);

--
-- Indices de la tabla `tasks_followers`
--
ALTER TABLE `tasks_followers`
  ADD PRIMARY KEY (`id_tasks_followers`),
  ADD KEY `id_task` (`id_task`),
  ADD KEY `id_follower` (`id_follower`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_line` (`id_line`);

--
-- Indices de la tabla `valuations`
--
ALTER TABLE `valuations`
  ADD PRIMARY KEY (`id_valuations`),
  ADD KEY `queries_id_cliente_idx` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments_agenda`
--
ALTER TABLE `appointments_agenda`
  MODIFY `id_appointments_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `citys`
--
ALTER TABLE `citys`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientc_credit_information`
--
ALTER TABLE `clientc_credit_information`
  MODIFY `id_clientc_redit_information` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `client_clinic_history`
--
ALTER TABLE `client_clinic_history`
  MODIFY `id_client_clinic_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `client_information_aditional_surgery`
--
ALTER TABLE `client_information_aditional_surgery`
  MODIFY `id_client_information_aditional_surgery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id_clinic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id_funciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `lines_business`
--
ALTER TABLE `lines_business`
  MODIFY `id_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notifications` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `preanesthesias`
--
ALTER TABLE `preanesthesias`
  MODIFY `id_preanesthesias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `queries`
--
ALTER TABLE `queries`
  MODIFY `id_queries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `revision_appointment`
--
ALTER TABLE `revision_appointment`
  MODIFY `id_revision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  MODIFY `id_rol_operaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id_surgeries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `surgeries_payments`
--
ALTER TABLE `surgeries_payments`
  MODIFY `id_surgeries_payments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tasks_followers`
--
ALTER TABLE `tasks_followers`
  MODIFY `id_tasks_followers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `valuations`
--
ALTER TABLE `valuations`
  MODIFY `id_valuations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments_agenda`
--
ALTER TABLE `appointments_agenda`
  ADD CONSTRAINT `fk_id_revision_appointment_agenda` FOREIGN KEY (`id_revision`) REFERENCES `revision_appointment` (`id_revision`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `fk_auditoria_user_regins` FOREIGN KEY (`usr_regins`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientc_credit_information`
--
ALTER TABLE `clientc_credit_information`
  ADD CONSTRAINT `clientc_credit_information_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_id_city_clientes` FOREIGN KEY (`city`) REFERENCES `citys` (`id_city`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_clinic_clientes` FOREIGN KEY (`clinic`) REFERENCES `clinic` (`id_clinic`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line_clientes_fk` FOREIGN KEY (`id_line`) REFERENCES `lines_business` (`id_line`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_clientes_fk` FOREIGN KEY (`id_user_asesora`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `client_clinic_history`
--
ALTER TABLE `client_clinic_history`
  ADD CONSTRAINT `client_clinic_history_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `client_information_aditional_surgery`
--
ALTER TABLE `client_information_aditional_surgery`
  ADD CONSTRAINT `client_information_aditional_surgery_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `fk_clinic_id_city` FOREIGN KEY (`id_city`) REFERENCES `citys` (`id_city`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_id_usuario_datos_personales` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `Vistas_Modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`);

--
-- Filtros para la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preanesthesias`
--
ALTER TABLE `preanesthesias`
  ADD CONSTRAINT `fk_id_cliente_preanesthesias` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preanesthesias_ibfk_1` FOREIGN KEY (`clinic`) REFERENCES `clinic` (`id_clinic`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `fk_id_cliente_queries` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `revision_appointment`
--
ALTER TABLE `revision_appointment`
  ADD CONSTRAINT `fk_id_clinica_revision_appointment` FOREIGN KEY (`clinica`) REFERENCES `clinic` (`id_clinic`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_paciente_revision_appointment` FOREIGN KEY (`id_paciente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  ADD CONSTRAINT `Rol_Vista` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE,
  ADD CONSTRAINT `Vista_Rol` FOREIGN KEY (`id_funciones`) REFERENCES `funciones` (`id_funciones`);

--
-- Filtros para la tabla `surgeries`
--
ALTER TABLE `surgeries`
  ADD CONSTRAINT `fk_id_cliente_surgeries` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `surgeries_ibfk_1` FOREIGN KEY (`clinic`) REFERENCES `clinic` (`id_clinic`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `surgeries_payments`
--
ALTER TABLE `surgeries_payments`
  ADD CONSTRAINT `surgeries_payments_ibfk_1` FOREIGN KEY (`id_surgerie`) REFERENCES `surgeries` (`id_surgeries`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tasks_followers`
--
ALTER TABLE `tasks_followers`
  ADD CONSTRAINT `tasks_followers_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id_tasks`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_followers_ibfk_2` FOREIGN KEY (`id_follower`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_line`) REFERENCES `lines_business` (`id_line`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `valuations`
--
ALTER TABLE `valuations`
  ADD CONSTRAINT `valuations_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
