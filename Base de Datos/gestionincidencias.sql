-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2021 a las 20:21:26
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
(1, 'admin', 'pass', 'admin@gestionincidencias.com', '976555666');

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
(27, 7, 35, 'Suministro', 'Alta', 'Resuelta', 'test', 'Sin folios en planta 4', 'img_113358260521.jpg', '2021-05-26 09:33:58'),
(28, 6, 39, 'Red', 'Alta', 'Resuelta', 'test', 'Incidencia con la red, no conecta a internet.', 'no_image.jpg', '2021-05-26 09:35:04'),
(29, NULL, 35, 'Hardware', 'Media', 'Nueva', 'test', 'Monitor Nº564 No funciona, llevar para cambiar.', 'no_image.jpg', '2021-05-26 09:36:25'),
(30, 6, 35, 'Software', 'Baja', 'Parada', 'test', 'Faltan licencias microsoft office en portatiles Nº45 y Nº32', 'img_113809260521.jpg', '2021-05-26 09:38:09'),
(31, 6, 35, 'Otros', 'Media', 'Asignada', 'test', 'Membresía de programas de edición acabadas, toca renovar.', 'no_image.jpg', '2021-05-26 09:42:18'),
(32, NULL, 35, 'Software', 'Alta', 'Nueva', 'test', 'No hay programas de contabilidad en PC Nº45', 'no_image.jpg', '2021-05-26 18:11:42'),
(33, 6, 35, 'Otros', 'Baja', 'Asignada', 'test', 'Faltan alzadores para los monitores y reposapies', 'img_081322260521.PNG', '2021-05-26 18:13:22'),
(34, NULL, 35, 'Red', 'Media', 'Nueva', 'test', 'No hay señal WiFi en sala de Juntas', 'no_image.jpg', '2021-05-26 18:13:40'),
(35, 6, 35, 'Hardware', 'Media', 'Asignada', 'test', 'Compra de teclados x5 ', 'img_081449260521.PNG', '2021-05-26 18:14:49'),
(36, NULL, 35, 'Suministro', 'Alta', 'Nueva', 'test', 'Falta tinta toner Modelo 54UA41X', 'no_image.jpg', '2021-05-26 18:15:36'),
(37, 6, 35, 'Hardware', 'Media', 'Asignada', 'test', 'Tarjeta de video rota en torre 27', 'no_image.jpg', '2021-05-26 18:16:03'),
(38, NULL, 35, 'Software', 'Alta', 'Nueva', 'test', 'Sin software de gestión de la calidad', 'no_image.jpg', '2021-05-26 18:16:42');

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
(22, 6, 35, 'Hola test', '2021-05-26 18:17:07', 'usuario'),
(23, 6, 35, 'Hola usertest', '2021-05-26 18:20:13', 'tecnico'),
(24, 6, 37, 'Hola Maria', '2021-05-26 18:20:50', 'tecnico');

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
(6, 'tectest', '$2y$10$Tbna1DMeDSxo/rtE3mvw1eo6RKaHTUFdNAlrmmuKXLrd3sBtfh/iu', 'Test', 'Pruebas', 'U3MLKFVwAzBcMAFtDEVQeQFlA2FTKwY5Vz0BbA==', 'UzIBYQtqAGdbZAY6ADgHawAw'),
(7, 'tecedu', '$2y$10$oCxOkzQujQVP0vlQSRDzje9X2dOFXdGCrp0DYO8h2lrBJLMGcUVpu', 'Eduardo', 'Saldaña', 'VHBQZAEyADNbMQJ6D0YDKgRgUzFQKFVqVz1WOw==', 'AGYAaFI3UTcJNwY7DDwHa1Jg');

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
(35, 'usertest', '$2y$10$yFwonr2d.hYzSGVQxHgRi.aS9hhMlV5CU0ipggrlRopU73OxdP2iG', 'Prueba', 'Testes', 'ACQKPlV2UXMOQANrXztRfAZ1UzdVcAc6VwYHYgl6CH1ReFRjBm1TOA==', 'AmsLbVA2AWdeYFZrADgBbVVl', 'test'),
(36, 'manuelsan', '$2y$10$JJYtc.gmKr/4bi3ogOCoG.EFHcWR2hSQb9AEvzaIHAR4s6BKSkUim', 'Manuel', 'Sanchez', 'Um9UZAY4BCcJYgNiCnABPQdoCElXZFZnA3YCcA1oBXdTNVYzUHoDZlFuV2s=', 'VTMEZAtqVjILN1ZpCDIHaQIw', 'Empresa1'),
(37, 'marinama', '$2y$10$31eL5k6FWcrVmaooCTRUXOBmg4FMiADf3.35p6OXcJuEYaIUZdTQ.', 'Marina', 'Marcos', 'BzoENAclVmkKalQ4DWlQbAtKB2NQawAsBXIMaQl6B2dTZ1ErAGcEbV5j', 'VzEHZABiBGFaZwM9DjNUPQUw', 'Empresa3'),
(38, 'carlosos', '$2y$10$qy4yltHNSnKSHh4oiDL1k.NXfyLrNgonSh/OI7wR2kKLpBbKyNx6a', 'Carlos', 'Oscos', 'X2wCMgYkVW9bOgB+CG5TfVARBWFSaVV5AnUMaQh7BmZWY1MpC2wHblFs', 'VjAEYwNlUDILMVBpDjIBaQcz', 'empresa2'),
(39, 'rubenmar', '$2y$10$X4ULbDRTQfD.RxFqaTlEAOqdewfqJ/kZjkyyu0uHdgPts3qASo052', 'Rubén', 'Marquez', 'U3EFIQc1V2RZOQFhAGgBLgtKAWVRald7VyAEYQx/UDACMFUvUTYAaQc6', 'UDYAZgFmAGZbZVFsXWYDbAQ3', 'Empresa5');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
