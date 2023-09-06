-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-09-2023 a las 04:45:56
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
  `anu_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `anu_fec_vigencia` date NOT NULL,
  `anu_estado` enum('Activo','Inactivo','Expirado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `anu_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `anu_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_id` int DEFAULT NULL,
  PRIMARY KEY (`anu_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `per_id` int NOT NULL AUTO_INCREMENT,
  `rol_id` int DEFAULT NULL,
  `pag_id` int DEFAULT NULL,
  `per_ver` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT 'NO',
  `per_agregar` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT 'NO',
  `per_actualizar` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT 'NO',
  `per_eliminar` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT 'NO',
  `per_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `per_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `per_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`per_id`),
  KEY `rol_id` (`rol_id`),
  KEY `pag_id` (`pag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productores`
--

DROP TABLE IF EXISTS `productores`;
CREATE TABLE IF NOT EXISTS `productores` (
  `pdt_id` int NOT NULL AUTO_INCREMENT,
  `pdt_cedula` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pdt_nombre` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pdt_apellido1` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `pdt_apellido2` varchar(50) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_direccion` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_telefono` varchar(15) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_ubicacion` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `pdt_imagen` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `usr_id` int DEFAULT NULL,
  `pdt_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `pdt_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pdt_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pdt_id`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
  `usr_estado` enum('Activo','Inactivo','Pendiente','Eliminado','Bloqueado') COLLATE utf8mb4_swedish_ci DEFAULT 'Activo',
  `usr_fec_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_fec_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usr_id`),
  KEY `rol_id` (`rol_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
