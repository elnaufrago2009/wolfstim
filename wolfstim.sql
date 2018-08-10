-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2018 a las 20:12:21
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
-- Estructura de tabla para la tabla `detalle_packs`
--

CREATE TABLE `detalle_packs` (
  `id` int(5) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `id_pack` int(5) NOT NULL,
  `activo` int(2) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_packs`
--

INSERT INTO `detalle_packs` (`id`, `descripcion`, `cantidad`, `precio`, `created`, `updated`, `id_pack`, `activo`, `imagen`) VALUES
(1, 'leche modificada', 5, '2.89', '2018-07-20', '2018-07-20', 1, 1, 'image'),
(2, 'd', 5, '4.00', '0000-00-00', '0000-00-00', 1, 1, ''),
(3, 'Leche Grande', 5, '47.54', '0000-00-00', '0000-00-00', 1, 1, ''),
(4, 'Leche grande', 5, '45.45', '0000-00-00', '0000-00-00', 2, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packs`
--

CREATE TABLE `packs` (
  `id` int(3) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `activo` int(1) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `packs`
--

INSERT INTO `packs` (`id`, `codigo`, `descripcion`, `costo`, `created`, `updated`, `activo`, `image`) VALUES
(1, 'PACK01', 'Pack plus Basic', '200.00', '0000-00-00', '0000-00-00', 1, 'canasta-1.jpg'),
(2, 'PACK02', 'Pack Master intermedio', '250.00', '0000-00-00', '0000-00-00', 1, 'canasta-2.jpg'),
(3, 'PACK03', 'Pack Premiun ', '250.00', '0000-00-00', '0000-00-00', 1, 'canasta-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_pack`
--

CREATE TABLE `user_pack` (
  `id` int(10) NOT NULL,
  `pack_id` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0' COMMENT '0 pedido generado, 1 concretado, 2 anulado',
  `created` date NOT NULL,
  `fecha_envio_pago` date NOT NULL,
  `updated` date NOT NULL,
  `pago_operacion` varchar(100) NOT NULL,
  `pago_descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_pack`
--

INSERT INTO `user_pack` (`id`, `pack_id`, `user_id`, `estado`, `created`, `fecha_envio_pago`, `updated`, `pago_operacion`, `pago_descripcion`) VALUES
(7, 1, 31, 2, '2018-05-01', '0000-00-00', '2018-05-01', '', ''),
(8, 3, 31, 2, '2018-02-01', '0000-00-00', '2018-02-10', '', ''),
(9, 3, 31, 2, '2018-06-05', '0000-00-00', '2018-06-05', '', ''),
(10, 2, 31, 1, '2018-07-30', '0000-00-00', '0000-00-00', 'D04587ERFG', 'Por favor revise mi pago'),
(11, 1, 33, 0, '2018-08-04', '0000-00-00', '0000-00-00', '', '');

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
(31, 'abraham moises', '42516253', 'moiseslinar3s', 0, '952631806', 'elnaufrago2009@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 42516253, 0, 0, 0, 0, 0, 0),
(32, '', '42516253', '', 0, '', 'elnaufra', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(33, 'grover ieon', '42851632', '123', 0, '952631806', 'leodepaydiamond@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 42516253, 0, 0, 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_packs`
--
ALTER TABLE `detalle_packs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_pack`
--
ALTER TABLE `user_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_packs`
--
ALTER TABLE `detalle_packs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `packs`
--
ALTER TABLE `packs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_pack`
--
ALTER TABLE `user_pack`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
