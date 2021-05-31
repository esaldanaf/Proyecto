-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 19:11:26
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionincidencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(10) UNSIGNED NOT NULL,
  `aNick` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `aContrasena` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `aMail` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `aTelefono` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `aNick`, `aContrasena`, `aMail`, `aTelefono`) VALUES
(1, 'admin', 'pass', 'administrador@empresa.com', '976565251');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `idTecnico` int(11) UNSIGNED DEFAULT NULL,
  `idUsuario` int(11) UNSIGNED NOT NULL,
  `tipo` enum('Hardware','Software','Red','Suministro','Otros') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `prioridad` enum('Alta','Media','Baja') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` enum('Nueva','Asignada','Parada','Resuelta','Archivada') COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'Nueva',
  `empresa` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `idTecnico`, `idUsuario`, `tipo`, `prioridad`, `estado`, `empresa`, `texto`, `imagen`, `fecha`) VALUES
(1, 1, 1, 'Hardware', 'Alta', 'Parada', 'Empresa Test', 'Incidencia Alta de Prueba, sin foto', 'no_image.jpg', '2021-05-31 16:54:40'),
(2, 1, 1, 'Hardware', 'Media', 'Resuelta', 'Empresa Test', 'Incidencia Media de prueba, con foto', 'img_065529310521.PNG', '2021-05-31 16:55:29'),
(3, 1, 1, 'Red', 'Baja', 'Asignada', 'Empresa Test', 'Incidencia Baja prueba, subiendo archivo no soportado.', 'no_image.jpg', '2021-05-31 16:55:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeria`
--

CREATE TABLE `mensajeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTecnico` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `mensaje` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `emisor` enum('tecnico','usuario') COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `mensajeria`
--

INSERT INTO `mensajeria` (`id`, `idTecnico`, `idUsuario`, `mensaje`, `fecha`, `emisor`) VALUES
(1, 1, 1, 'Hola tecnico prueba, dejo 3 incidencias', '2021-05-31 16:56:34', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id` int(10) UNSIGNED NOT NULL,
  `tNick` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tContrasena` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tNombre` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tApellidos` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tMail` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tTelefono` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id`, `tNick`, `tContrasena`, `tNombre`, `tApellidos`, `tMail`, `tTelefono`) VALUES
(1, 'tecnicotest', '$2y$10$ENaElOQuZDnc0furtaCamu0evsF5fB/dvUIfyqoZwACKepgrNs8Ji', 'Tecnico', 'Test', 'UnYLPwIxAjpbPFM9WjwHGlYjCGxWc1Z+VH9RMglmCGQ=', 'B2FUNQJiAWcAPlZrDzZVOAU1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `uNick` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uContrasena` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uNombre` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uApellidos` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uMail` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uTelefono` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `uEmpresa` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `uNick`, `uContrasena`, `uNombre`, `uApellidos`, `uMail`, `uTelefono`, `uEmpresa`) VALUES
(1, 'usuariotest', '$2y$10$vs79muwGWU2NZCP8ilBOsePgduuPbtkUjcHqFGySoKC.o1DFSMjR6', 'Usuario', 'Test', 'ACVRc1dyVWIBfQJmXDpWS1AlVzNTdlN7VH9VNgplVDg=', 'VDIFZFExVjAMMgc6CDFTPlBh', 'Empresa Test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTecnico` (`idTecnico`),
  ADD KEY `idTecnico_2` (`idTecnico`),
  ADD KEY `idUsuario_2` (`idUsuario`);

--
-- Indices de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTecnico` (`idTecnico`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `incidencia_ibfk_2` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`id`);

--
-- Filtros para la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD CONSTRAINT `mensajeria_ibfk_1` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`id`),
  ADD CONSTRAINT `mensajeria_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
