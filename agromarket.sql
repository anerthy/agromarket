-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-09-2023 a las 19:47:03
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agromarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `act_id` int NOT NULL AUTO_INCREMENT,
  `act_nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `act_descripcion` text COLLATE utf8mb4_swedish_ci,
  `act_fecha` date NOT NULL,
  `act_lugar` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `act_categoria` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `act_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `act_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `act_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `act_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_id` int DEFAULT NULL,
  PRIMARY KEY (`act_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

DROP TABLE IF EXISTS `afiliados`;
CREATE TABLE IF NOT EXISTS `afiliados` (
  `afl_id` int NOT NULL AUTO_INCREMENT,
  `pdt_id` int DEFAULT NULL,
  `usr_id` int DEFAULT NULL,
  `afl_fec_afiliacion` date NOT NULL,
  `afl_fec_vencimiento` date DEFAULT NULL,
  `afl_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `afl_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `afl_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`afl_id`),
  KEY `pdt_id` (`pdt_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `anu_id` int NOT NULL AUTO_INCREMENT,
  `anu_descripcion` text COLLATE utf8mb4_swedish_ci,
  `anu_tipo` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `anu_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `anu_fec_vigencia` date NOT NULL,
  `anu_estado` enum('Activo','Inactivo','Expirado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `anu_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `anu_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_id` int DEFAULT NULL,
  PRIMARY KEY (`anu_id`),
  KEY `usr_id` (`usr_id`),
  KEY `pag_id` (`anu_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`anu_id`, `anu_descripcion`, `anu_tipo`, `anu_imagen`, `anu_fec_vigencia`, `anu_estado`, `anu_fec_creacion`, `anu_fec_modificacion`, `usr_id`) VALUES
(1, 'dd', 'dd', 'ddddddd', '2023-09-30', 'Expirado', '2023-09-20 03:14:41', '2023-09-20 05:42:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

DROP TABLE IF EXISTS `donaciones`;
CREATE TABLE IF NOT EXISTS `donaciones` (
  `don_id` int NOT NULL AUTO_INCREMENT,
  `don_descripcion` text COLLATE utf8mb4_swedish_ci,
  `don_medio` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `don_informacion` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `don_estado` enum('Pendiente','Aprobado','Rechazado') COLLATE utf8mb4_swedish_ci DEFAULT 'Pendiente',
  `don_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `don_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`don_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

DROP TABLE IF EXISTS `metodos_pago`;
CREATE TABLE IF NOT EXISTS `metodos_pago` (
  `met_id` int NOT NULL AUTO_INCREMENT,
  `met_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `met_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `met_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `met_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`met_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago_productor`
--

DROP TABLE IF EXISTS `metodos_pago_productor`;
CREATE TABLE IF NOT EXISTS `metodos_pago_productor` (
  `met_pdt_id` int NOT NULL AUTO_INCREMENT,
  `met_id` int DEFAULT NULL,
  `pdt_id` int DEFAULT NULL,
  `met_pdt_descripcion` text COLLATE utf8mb4_swedish_ci,
  `met_pdt_informacion` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `met_pdt_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `met_pdt_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `met_pdt_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_id` int DEFAULT NULL,
  PRIMARY KEY (`met_pdt_id`),
  KEY `met_id` (`met_id`),
  KEY `pdt_id` (`pdt_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

DROP TABLE IF EXISTS `paginas`;
CREATE TABLE IF NOT EXISTS `paginas` (
  `pag_id` int NOT NULL AUTO_INCREMENT,
  `pag_nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pag_descripcion` text COLLATE utf8mb4_swedish_ci,
  `pag_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `pag_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pag_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`pag_id`, `pag_nombre`, `pag_descripcion`, `pag_estado`, `pag_fec_creacion`, `pag_fec_modificacion`) VALUES
(1, 'Panel de control', 'Panel de control', 'Activo', '2023-09-17 05:30:40', '2023-09-17 05:30:40'),
(2, 'Roles', 'Roles', 'Activo', '2023-09-20 06:11:23', '2023-09-20 06:11:23'),
(3, 'Usuarios', 'Usuarios', 'Activo', '2023-09-20 06:11:23', '2023-09-20 06:11:23'),
(4, 'Productores', 'Productores', 'Activo', '2023-09-20 06:11:23', '2023-09-20 06:11:23'),
(5, 'Productos', 'Productos', 'Activo', '2023-09-20 06:11:23', '2023-09-20 06:11:23'),
(6, 'Actividades', 'Actividades', 'Activo', '2023-09-20 06:11:23', '2023-09-20 06:11:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `per_id` int NOT NULL AUTO_INCREMENT,
  `rol_id` int DEFAULT NULL,
  `pag_id` int DEFAULT NULL,
  `per_ver` int DEFAULT '0',
  `per_agregar` int DEFAULT '0',
  `per_actualizar` int DEFAULT '0',
  `per_eliminar` int DEFAULT '0',
  `per_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `per_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `per_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`per_id`),
  KEY `rol_id` (`rol_id`),
  KEY `pag_id` (`pag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`per_id`, `rol_id`, `pag_id`, `per_ver`, `per_agregar`, `per_actualizar`, `per_eliminar`, `per_estado`, `per_fec_creacion`, `per_fec_modificacion`) VALUES
(1, 2, 1, 1, 1, 1, 1, 'Activo', '2023-09-20 04:31:44', '2023-09-20 04:32:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `per_cedula` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `per_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `per_apellido1` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `per_apellido2` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `per_direccion` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `per_telefono` varchar(15) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `per_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `per_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `per_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`per_cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`per_cedula`, `per_nombre`, `per_apellido1`, `per_apellido2`, `per_direccion`, `per_telefono`, `per_estado`, `per_fec_creacion`, `per_fec_modificacion`) VALUES
('504460444', 'F. Andrés', 'Mejías', 'González', '25m oeste de la escuela de porvenir', '87293508', 'Activo', '2023-09-19 05:15:07', '2023-09-19 05:15:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productores`
--

DROP TABLE IF EXISTS `productores`;
CREATE TABLE IF NOT EXISTS `productores` (
  `pdt_id` int NOT NULL AUTO_INCREMENT,
  `pdt_cedula` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pdt_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pdt_ubicacion` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `usr_id` int DEFAULT NULL,
  `pdt_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `pdt_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pdt_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pdt_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `productores`
--

INSERT INTO `productores` (`pdt_id`, `pdt_cedula`, `pdt_nombre`, `pdt_ubicacion`, `pdt_imagen`, `usr_id`, `pdt_estado`, `pdt_fec_creacion`, `pdt_fec_modificacion`) VALUES
(1, '504460444', 'Andres', 'Nicoya', 'imagen.png', 1, 'Activo', '2023-09-20 15:41:41', '2023-09-20 15:41:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pro_descripcion` text COLLATE utf8mb4_swedish_ci,
  `pro_categoria` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pro_precio` decimal(10,2) NOT NULL,
  `pro_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_id` int DEFAULT NULL,
  `pro_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `pro_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pro_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_id` int DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `pdt_id` (`pdt_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_categoria`, `pro_precio`, `pro_imagen`, `pdt_id`, `pro_estado`, `pro_fec_creacion`, `pro_fec_modificacion`, `usr_id`) VALUES
(1, 'Maracuya', 'Maracuya', 'Fruta', '500.00', 'fruta.png', 1, 'Activo', '2023-09-20 15:50:15', '2023-09-20 15:50:15', 1),
(2, 'DSJKJF', 'JHHJDFJ', 'SHJFHS', '0.00', 'imageUnavailable.png', 1, 'Eliminado', '2023-09-21 17:00:37', '2023-09-21 17:18:06', 1),
(3, 'PIZZA CARA', 'HHH', 'HHH', '5000.00', 'imageUnavailable.png', 1, 'Activo', '2023-09-21 17:16:06', '2023-09-21 18:20:30', 1),
(4, 'Tomates', 'tomates frescos de la huerta de melany', 'Verdura', '800.00', 'img_c6b10d7b98310947726dde5e2e35871a.jpg', 1, 'Activo', '2023-09-21 18:21:19', '2023-09-21 18:55:09', 1),
(5, '', '', '', '0.00', 'imageUnavailable.png', 1, '', '2023-09-21 18:22:26', '2023-09-21 18:22:26', 1),
(6, 'jsfkjf', 'jfkefj', 'jfksf', '234.00', 'img_8a15cbbf1790d9d588a8a38e079896a0.jpg', 1, 'Activo', '2023-09-21 18:56:00', '2023-09-21 18:56:00', 1),
(7, 'aaroncito', 'aaroncito', 'aaroncito', '99999999.00', 'img_59a099967de2400fb3481b458eba97db.jpg', 1, 'Activo', '2023-09-21 19:06:55', '2023-09-21 19:07:35', 1),
(8, 'cafe', 'cafe', 'fmesdk,fm', '44444.00', 'img_2aa8f6a087d7bb125caa6d99caa091f5.jpg', 1, 'Activo', '2023-09-21 19:13:18', '2023-09-21 19:13:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rol_descripcion` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `rol_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `rol_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rol_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`, `rol_descripcion`, `rol_estado`, `rol_fec_creacion`, `rol_fec_modificacion`) VALUES
(1, 'sa', 'super-administrador', 'Activo', '2023-09-19 05:12:59', '2023-09-19 05:13:10'),
(2, 'Desarrollador', 'Rol de desarrollador', 'Activo', '2023-09-19 05:12:59', '2023-09-19 05:13:10'),
(6, 'Cliente', 'Cliente', 'Activo', '2023-09-20 01:05:52', '2023-09-20 06:07:00'),
(7, 'hhhh', 'sdsdfsf', 'Inactivo', '2023-09-20 01:09:09', '2023-09-20 01:23:47'),
(11, 'melany', 'melany', 'Activo', '2023-09-20 04:27:40', '2023-09-20 06:12:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usr_id` int NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usr_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usr_contrasena` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `usr_token` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  `per_cedula` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `usr_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `usr_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usr_id`),
  KEY `rol_id` (`rol_id`),
  KEY `per_cedula` (`per_cedula`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usr_id`, `usr_email`, `usr_nombre`, `usr_contrasena`, `usr_token`, `rol_id`, `per_cedula`, `usr_estado`, `usr_fec_creacion`, `usr_fec_modificacion`) VALUES
(1, 'andmejigo12@gmail.com', 'anerthy', '57cd4391d4968fbd69f08fc123f230c439361e9dcf81469c1bb1216ab8eba719', '', 1, '504460444', 'Activo', '2023-09-19 05:17:02', '2023-09-20 04:54:33'),
(3, 'admin_paraiso_azul@pa.com', 'aaron', '57cd4391d4968fbd69f08fc123f230c439361e9dcf81469c1bb1216ab8eba719', '', 1, '50440644', 'Activo', '2023-09-19 05:17:02', '2023-09-20 04:53:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
