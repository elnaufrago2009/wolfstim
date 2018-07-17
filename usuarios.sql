-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2018 a las 03:36:34
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wolfstim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL COMMENT 'sirve para el login de la cuenta',
  `password` varchar(50) NOT NULL COMMENT 'contraseña junto con el dni para entrar a la cuenta',
  `tipuser` int(2) NOT NULL COMMENT 'tipo de usuario de acceso a la cuenta, ACL. esto es el nivel de usuario 0 nada, 1 usuario normal activado, 9 super administrador',
  `celular` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL COMMENT 'este es opcional y se puede utilizar para hacer login con la cuenta',
  `provincia` int(3) DEFAULT NULL COMMENT 'id de la tabla provincias',
  `det_modo_pago` varchar(30) DEFAULT NULL COMMENT 'dni o tarjeta',
  `det_pago_banco` int(2) DEFAULT NULL,
  `det_pago_cuenta` varchar(40) DEFAULT NULL,
  `det_pago_nombre` varchar(100) DEFAULT NULL,
  `det_pago_dni` varchar(12) DEFAULT NULL,
  `arbol_padre` int(11) NOT NULL COMMENT 'id padre se activa solo cuando el cliente hace una compra de un paquete por primera vez',
  `arbol_hijo1` int(11) NOT NULL,
  `arbol_hijo2` int(11) NOT NULL,
  `arbol_hijo3` int(11) NOT NULL,
  `arbol_hijo4` int(11) NOT NULL,
  `arbol_nivel` int(2) NOT NULL,
  `activo` int(2) NOT NULL COMMENT 'se activa junto con el arbol_padre pero este es un indicador fijo, por que puede que sea que le demos de baja y eso cambiaria las reglas de usar solo un campo.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `dni`, `password`, `tipuser`, `celular`, `correo`, `provincia`, `det_modo_pago`, `det_pago_banco`, `det_pago_cuenta`, `det_pago_nombre`, `det_pago_dni`, `arbol_padre`, `arbol_hijo1`, `arbol_hijo2`, `arbol_hijo3`, `arbol_hijo4`, `arbol_nivel`, `activo`) VALUES
(1, '', 'dsad', '', 0, '', '', 0, '', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(2, NULL, 'd', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(3, NULL, 'ddsd', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(4, NULL, 'dsadad', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
