-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 23:36:00
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
(117, 'clientes', 37, 1, NULL, 60, '2019-10-30 20:34:14', NULL, NULL),
(118, 'clientes', 38, 1, NULL, 60, '2019-10-30 20:35:45', NULL, NULL),
(119, 'clientes', 39, 1, NULL, 60, '2019-10-30 20:44:56', NULL, NULL),
(120, 'clientes', 40, 1, NULL, 60, '2019-10-30 20:49:07', NULL, NULL),
(121, 'clientes', 41, 1, NULL, 60, '2019-10-30 20:50:32', NULL, NULL),
(122, 'clientes', 42, 1, NULL, 60, '2019-10-30 20:51:23', NULL, NULL),
(123, 'clientes', 43, 1, NULL, 60, '2019-10-30 20:52:29', NULL, NULL),
(124, 'clientes', 44, 1, NULL, 60, '2019-10-30 20:53:26', NULL, NULL),
(125, 'users', 63, 1, NULL, 60, '2019-10-30 21:02:19', NULL, NULL),
(126, 'users', 64, 1, NULL, 60, '2019-10-30 21:02:29', NULL, NULL),
(127, 'users', 65, 1, NULL, 60, '2019-10-30 21:02:45', NULL, NULL),
(128, 'clientes', 45, 1, NULL, 65, '2019-10-30 21:03:57', NULL, NULL),
(129, 'clientes', 46, 1, NULL, 65, '2019-10-31 20:59:41', NULL, NULL),
(130, 'clientes', 47, 1, NULL, 65, '2019-10-31 21:00:14', NULL, NULL),
(131, 'funciones', 24, 1, NULL, 60, '2019-11-01 17:53:26', NULL, NULL),
(132, 'queries', 1, 0, NULL, 60, '2019-11-02 16:00:03', 60, '2019-11-02'),
(133, 'queries', 2, 0, NULL, 60, '2019-11-08 20:04:23', 60, '2019-11-08'),
(134, 'queries', 3, 1, NULL, 60, '2019-11-02 16:00:00', NULL, NULL),
(135, 'queries', 4, 1, NULL, 60, '2019-11-02 16:00:33', NULL, NULL),
(136, 'queries', 5, 1, NULL, 60, '2019-11-02 16:20:16', NULL, NULL);

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
(95, 60, '40684154aeceea7e2dd27e74e689f07348f024e30b7da97f52e9f609d09414c50811d9913e7437564de9014112240ccdfa9836698d481cd301a8db5830e365bb', '2019-11-08 20:32:11');

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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `identificacion` varchar(200) NOT NULL,
  `identificacion_verify` int(11) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `city` int(11) NOT NULL,
  `clinic` int(11) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_line` int(11) NOT NULL,
  `id_user_asesora` int(11) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `identificacion`, `identificacion_verify`, `fecha_nacimiento`, `city`, `clinic`, `telefono`, `email`, `id_line`, `id_user_asesora`, `direccion`) VALUES
(37, 'Amet eos occaecat s', 'Vero dolore ullam ea', '27', 0, '1982-01-18', 3, 6, '29', 'buseqaq@mailinator.net', 3, 64, 'Est commodi aut ut v'),
(38, 'Sint labore modi imp', 'Molestiae velit fug', '72', 1, '1980-11-24', 3, 5, '58', 'kyqe@mailinator.com', 2, 60, 'Qui asperiores est p'),
(39, 'Lorem consequatur I', 'Fugiat nisi reicien', '81', NULL, '1997-10-14', 5, 7, '41', 'rohyrami@mailinator.com', 3, 60, 'Sit quas necessitati'),
(40, 'Impedit ex est qui', 'Omnis voluptatum pla', '26', NULL, '2001-12-12', 5, 7, '17', 'cuzirisa@mailinator.net', 3, 60, 'Hic quae voluptas co'),
(41, 'Praesentium architec', 'Quos molestias volup', '45', 1, '1994-12-25', 5, 7, '87', 'bozo@mailinator.net', 2, 60, 'Quia sed sit dolor v'),
(42, 'Ullamco beatae non v', 'Explicabo Et praese', '58', NULL, '2014-01-06', 5, 7, '37', 'lorulycep@mailinator.net', 3, 60, 'Eum ipsum pariatur'),
(43, 'Iure quis voluptas n', 'Voluptates esse vol', '19', NULL, '2017-02-13', 3, 6, '12', 'remeqy@mailinator.com', 3, 60, 'Vel perspiciatis di'),
(44, 'Sed ducimus quis do', 'Id est incididunt ex', '48', NULL, '1999-03-18', 3, 6, '15', 'vyzigaze@mailinator.com', 3, 61, 'Fugit nostrum non c'),
(45, 'Ut eum voluptas enim', 'Qui sit aliquid lab', '99', 0, '1998-06-18', 3, 6, '7', 'lily@mailinator.com', 3, 61, 'Consectetur proiden'),
(46, 'Veritatis ex id natu', 'Qui rerum ut eaque u', '28', NULL, '2002-05-25', 3, 6, '67', 'syhymyz@mailinator.net', 3, 65, 'Ipsa illo dolorem d'),
(47, 'Et in suscipit aperi', 'Voluptate fugiat en', '36', 1, '2019-11-15', 5, 7, '86', 'zilamejusi@mailinator.com', 3, 65, 'Amet enim consequun');

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
(7, 'Enim sint elit odi', 5, 'Sapiente est qui inv');

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
(27, 65, 'Velit qui elit Nam', 'Ut laborum ut soluta', 'Repellendus Magna e', 'Quia nobis ea deseru', '1979-10-24', 'Qui esse ratione re', 'Cillum excepturi sol');

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
(8, 41, 'Modulos', 'Modulos', 2, 'modules', 1),
(9, 41, 'Funciones', 'Gestion de Vistas', 3, 'funciones', 1),
(10, 41, 'Roles', 'Roles', 5, 'rol', 1),
(12, 42, 'Deleniti nulla magna', 'Qui nobis ipsum har', 7, 'Voluptatem reprehen', 1),
(13, 42, 'Nisi dolor optio de', 'Aute eveniet quas s', 5, 'Proident ipsa qui', 1),
(14, 42, 'bbbbbbbbbb', 'bbbbbbbbbbbbb', 4, 'bbbbbbbbbbb', 1),
(17, 42, 'ttttttttttttt', 'Sint nisi sit temp', 6, 'Et vero suscipit Nam', 1),
(18, 41, 'Provident ut ut ips', 'Eaque et id odit qui', 4, 'Odio dolorem lorem d', 1),
(19, 45, 'Pacientes', 'Registro de pacientes y Clientes', 1, 'clients', 1),
(20, 42, 'Ciudades', 'Ciudades', 2, 'citys', 1),
(21, 42, 'Clinicas', 'Gestion de Clinicas', 1, 'clinics', 1),
(22, 47, 'Revisión', 'Gestion de las citas de Revision del paciente', 2, 'revision-appointment', 1),
(23, 42, 'Lineas de Negocio', 'Lineas de Negocio', 3, 'business-lines', 1),
(24, 47, 'Consultas', 'Consulta Inicial', 1, 'queries', 1);

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
(41, 'Perfiles', 'Admistracion de Usuarios, Roles y Modulos', 'fas fa-users', 3),
(42, 'Configuracion', 'Configuraciones', 'fas fa-cog', 5),
(43, 'Quos velit consequat', 'Doloremque quis cupi', '', 6),
(44, 'Fugit molestiae con', 'Nostrud ut ipsa ill', '', 7),
(45, 'Catálogos', 'Catálogos', 'fas fa-book', 1),
(46, 'Sit repudiandae dol', 'Nulla libero tempora', 'Non voluptatibus vit', 3),
(47, 'Citas', 'Gestion de Citas', 'fas fa-calendar-alt', 2);

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
-- Estructura de tabla para la tabla `queries`
--

CREATE TABLE `queries` (
  `id_queries` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `file_cotizacion` varchar(200) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pendiente, 1 = Procesado, 2 = Cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `queries`
--

INSERT INTO `queries` (`id_queries`, `id_cliente`, `fecha`, `observaciones`, `file_cotizacion`, `status`) VALUES
(1, 37, '2020-11-02', 'Velit atque adipisic', '', 0),
(2, 46, '2020-01-31', 'Non et corporis volu', '', 0),
(3, 46, '2019-11-02', 'Natus velit totam qu', '', 0),
(4, 38, '2019-11-14', 'Consequatur Optio', 'mediana-3 (1).jpg', 1),
(5, 38, '2019-11-05', 'Culpa ad ut error ea', 'BANNER8.jpg', 1);

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
(95, 6, 22, 0, 1, 1, 1, 1, 1),
(96, 6, 19, 0, 1, 1, 1, 1, 1),
(97, 6, 20, 0, 1, 1, 1, 1, 1),
(98, 6, 21, 0, 1, 1, 1, 1, 1),
(99, 6, 23, 0, 1, 1, 1, 1, 1),
(100, 6, 7, 0, 1, 1, 1, 1, 1),
(101, 6, 8, 0, 1, 1, 1, 1, 1),
(102, 6, 9, 0, 1, 1, 1, 1, 1),
(103, 6, 10, 0, 1, 1, 1, 1, 1),
(104, 6, 24, 0, 1, 1, 1, 1, 1),
(105, 9, 22, 0, 1, 1, 1, 1, 1),
(106, 9, 19, 0, 1, 1, 1, 1, 1),
(107, 9, 20, 0, 1, 1, 1, 1, 1),
(108, 9, 24, 0, 1, 1, 1, 1, 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img_profile`, `remember_token`, `id_rol`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cardenascarlos18@gmail.com24214214', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', '', NULL, 6, NULL, NULL),
(54, NULL, 'nihubu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'QUIROFANO.jpg', NULL, 8, '2019-10-21 20:45:04', '2019-10-21 22:48:33'),
(55, NULL, 'hibu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, '2019-10-21 20:56:10', '2019-10-21 20:56:10'),
(56, NULL, 'fapuhocyxo@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'TRATAMIENTOS-DE-PIEL.jpg', NULL, 6, '2019-10-21 21:24:03', '2019-10-22 02:25:30'),
(57, NULL, 'hhhhhhhhhhh@hhhhhhhhh.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, '2019-10-21 21:41:47', '2019-10-21 22:49:23'),
(58, NULL, 'vvvvvvvvvvvvvi@mailinator.com1313', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'PROCEDIMIENTOS-MENORES.jpg', NULL, 8, '2019-10-22 01:43:37', '2019-10-22 02:25:21'),
(59, NULL, 'zebojy@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'mediana2.jpg', NULL, 8, '2019-10-23 01:27:23', '2019-10-23 01:27:23'),
(60, NULL, 'cardenascarlos18@gmail.com', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', 'TRATAMIENTOS-DE-PIEL.jpg', NULL, 6, '2019-10-23 01:31:51', '2019-10-31 02:01:32'),
(61, NULL, 'lylisizok@mailinator.net', NULL, '202cb962ac59075b964b07152d234b70', 'grande2.jpg', NULL, 9, '2019-10-23 01:37:44', '2019-10-23 01:41:01'),
(62, NULL, 'kiluso@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-30 21:32:13', '2019-10-30 21:32:13'),
(63, NULL, 'xiroguva@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-31 02:02:19', '2019-10-31 02:02:50'),
(64, NULL, 'sebemycuh@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-31 02:02:29', '2019-10-31 02:02:29'),
(65, NULL, 'muvic@mailinator.com', NULL, '202cb962ac59075b964b07152d234b70', 'default (1).png', NULL, 9, '2019-10-31 02:02:45', '2019-10-31 02:02:45');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `clientes_id_city_idx` (`city`),
  ADD KEY `clientes_id_clinic_idx` (`clinic`),
  ADD KEY `clientes_id_line_idx` (`id_line`),
  ADD KEY `clientes_id_user_idx` (`id_user_asesora`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id_queries`),
  ADD KEY `queries_id_cliente_idx` (`id_cliente`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `citys`
--
ALTER TABLE `citys`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id_clinic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id_funciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `queries`
--
ALTER TABLE `queries`
  MODIFY `id_queries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  MODIFY `id_rol_operaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `fk_auditoria_user_regins` FOREIGN KEY (`usr_regins`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_id_city_clientes` FOREIGN KEY (`city`) REFERENCES `citys` (`id_city`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_clinic_clientes` FOREIGN KEY (`clinic`) REFERENCES `clinic` (`id_clinic`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_line_clientes_fk` FOREIGN KEY (`id_line`) REFERENCES `lines_business` (`id_line`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_clientes_fk` FOREIGN KEY (`id_user_asesora`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `fk_id_cliente_queries` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  ADD CONSTRAINT `Rol_Vista` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE,
  ADD CONSTRAINT `Vista_Rol` FOREIGN KEY (`id_funciones`) REFERENCES `funciones` (`id_funciones`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
