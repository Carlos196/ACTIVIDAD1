-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2018 a las 03:17:11
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `Id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `idlibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Id` int(11) NOT NULL,
  `Nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `Correo`, `contrasena`) VALUES
(1, 'adulys', 'adulisfuentes@gmail.com', '123123'),
(2, 'sasa', 'sao@gmail.com', 'contrasena'),
(5, 'asas', 'adulisfuentes@gmail.com', '123123'),
(6, 'dfasdas', 'adulisfuentes@gmail.com', '123123'),
(7, 'sasaaa', 'adulisfuentes@gmail.com', '123123'),
(8, 'asas', 'adulisfuentes@gmail.com', '123123'),
(9, 'sao', 'adulisfuentes@gmail.com', '123123'),
(10, 'DSDS', 'adulisfuentes@gmail.com', '123123'),
(11, '', '', ''),
(12, 'jsfsj', 'adulisfuentes@gmail.com', '123123'),
(13, 'ASDSD', 'adulisfuentes@gmail.com', '123123'),
(14, 'SAS', 'adulisfuentes@gmail.com', '123123'),
(15, 'jsfsj', 'adulisfuentes@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiculos`
--

CREATE TABLE `versiculos` (
  `Id` int(11) NOT NULL,
  `Versiculo` text NOT NULL,
  `idcapitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idlibro` (`idlibro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `versiculos`
--
ALTER TABLE `versiculos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idcapitulo` (`idcapitulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `versiculos`
--
ALTER TABLE `versiculos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `capitulos_ibfk_1` FOREIGN KEY (`idlibro`) REFERENCES `libros` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `versiculos`
--
ALTER TABLE `versiculos`
  ADD CONSTRAINT `versiculos_ibfk_1` FOREIGN KEY (`idcapitulo`) REFERENCES `capitulos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
