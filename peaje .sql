-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2023 a las 01:03:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peaje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nivel_usuario` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `id_personal`, `usuario`, `password`, `nivel_usuario`) VALUES
(3, 2, 72535244, '$2y$10$Q0WOrVV7oKZF19xiwiZzQO8LXE/l3ciCUVdF6xwhniU.uk0TB4eLu', 1),
(4, 3, 72535242, '$2y$10$omjDZLPX0vVRxhu8BzOkmOFSl9Z4SWhdN/b7jgXOKW5a0kMPGGMDW', 2),
(5, 5, 123, '$2y$10$qLIQO0a3xk.gjXaJ3Ma/Eu/vLrrQrqfoQHSKD9A4JOG/qWCShSDZK', 3),
(6, 6, 75925341, '$2y$10$D0TXk8E1tScgxyVlz4tPfuRs0pD2EK47M3TgEPIiHsxKebrieC/Tq', 1),
(7, 7, 76543210, '$2y$10$w/u1Y/.y22xMNNZORobB3ORprL6JBd4ixoe.dl0QEyheYmx2qPLt2', 3),
(8, 16, 71441862, '$2y$10$Lf0Ew3ib0JiM6FpU2V.74OdChCK.SQCMlgH2twJOR5XdKMRGTAFSW', 2),
(9, 17, 40963139, '$2y$10$Lx9.5baf.OgmX4yEIznHUe018jIj6BQ8Kh7DbCZlRlTJ2nSstO2XS', 3),
(11, 21, 74815001, '$2y$10$TzJ1618rmTWvt1jJJ9Mnd.ChKW8zlpqhnEc3yGwE2Dx4Qe/sWfAjm', 3),
(12, 22, 98310001, '$2y$10$68TmFwuyFrTyT4jU5ll/2ucyB5qhKYy705apWYPjrnP8tYraDW.L.', 1),
(13, 24, 1887733, '$2y$10$CyXkX4e/uadU2/ygQkpCaO89PvkWuLV7GBY.3KZRFM51nnNuWxaym', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre`, `apellido`, `dni`, `telefono`, `correo`, `direccion`, `genero`) VALUES
(2, 'jersson', 'quispe', 72535244, 998777712, 'jersson@gmail.com', 'jr tupac tupanqui', 'masculino'),
(3, 'johan', 'quispe', 72535242, 921421413, 'joha@gmail.com', 'jr tupac', 'masculino'),
(5, 'zeta', 'zeta', 7232344, 9324324, 'zeta@gmail.com', 'jrpierdetebuscando', 'masculino'),
(6, 'diana', 'pacco', 75925341, 990803047, 'paccochiquedia@senati.pe', 'salcedo', 'femenino'),
(7, 'edwim', 'quispe', 76543210, 123456789, 'edwin@senati.pe', 'puno', 'masculino'),
(14, 'nbnb', 'nbhhghjgbhj', 22555521, 2147483647, 'b', '14jhighjkjhgcxcvbnm', 'mvnbv'),
(16, 'luchito', 'enrique', 71441862, 932646229, 'lemaq.enrique@hotmail.com', 'mz 11 lt 03', 'masculino'),
(17, 'juliana', 'chique', 40963139, 987654321, 'juliana@gmail.com', 'moquegua', 'femenino'),
(21, 'paola', 'cardenas', 74815001, 999999999, 'paola@senati.pe', 'tacna', 'femenino'),
(22, 'gloria', 'chique', 98310001, 111111111, 'gloria@gmail.com', 'arequipa', 'femenino'),
(24, 'orlando', 'yaba', 1887733, 555555555, 'olrando@gmail.com', 'sicuani', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrovehiculos`
--

CREATE TABLE `registrovehiculos` (
  `id_registro` int(11) NOT NULL,
  `placa` varchar(8) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `opcion_pago` varchar(20) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `id_login` int(11) DEFAULT NULL,
  `vuelto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registrovehiculos`
--

INSERT INTO `registrovehiculos` (`id_registro`, `placa`, `id_categoria`, `fecha`, `hora`, `opcion_pago`, `monto`, `id_login`, `vuelto`) VALUES
(1, 'z2a-222', 1, '2023-06-07', '20:40:50', 'efectivo', 20, 5, NULL),
(2, 'z2a-222', 1, '2023-06-07', '22:34:34', 'ruc', 957764000, 5, NULL),
(3, 'z2a-222', 1, '2023-06-07', '22:39:38', 'efectivo', 100, 5, NULL),
(4, 'z2a-222', 1, '2023-06-08', '08:25:12', 'efectivo', 99992100000, 5, NULL),
(5, 'zx2-213', 2, '2023-06-08', '08:37:14', 'efectivo', 100, 5, NULL),
(6, 'zx2-213', 3, '2023-06-08', '08:38:18', 'efectivo', 100, 5, NULL),
(7, 'zx2-213', 3, '2023-06-08', '08:39:09', 'efectivo', 100, 5, NULL),
(8, 'z2a-222', 1, '2023-06-08', '08:41:14', 'efectivo', 100, 5, NULL),
(9, 'z2a-222', 1, '2023-06-08', '08:42:23', 'efectivo', 20, 5, NULL),
(10, 'z2a-222', 1, '2023-06-08', '08:44:10', 'efectivo', 20, 5, NULL),
(11, '123-dfs', 5, '2023-06-08', '08:44:36', 'efectivo', 200, 5, NULL),
(12, '123-dfs', 5, '2023-06-08', '08:44:44', 'efectivo', 200, 5, NULL),
(13, 'z2a-222', 2, '2023-06-08', '08:45:29', 'efectivo', 40, 5, NULL),
(14, 'z2a-222', 1, '2023-06-08', '08:46:14', 'efectivo', 20, 5, NULL),
(15, 'z2a-222', 1, '2023-06-08', '08:46:30', 'efectivo', 50, 5, NULL),
(16, 'z2a-222', 1, '2023-06-08', '08:50:55', 'efectivo', 123, 5, NULL),
(17, 'Z2AZZ', 1, '2023-06-08', '13:40:34', 'ruc', 20, 5, NULL),
(18, 'Z2AZZ', 1, '2023-06-08', '13:42:46', 'efectivo', 40, 5, NULL),
(19, 'Z2AZZ', 1, '2023-06-08', '14:14:22', 'efectivo', 50, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `tarifa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`id_categoria`, `descripcion`, `tarifa`) VALUES
(1, 'vehiculos ligeros', 18.4),
(2, 'vehiculos pesados**2 ejes', 36.8),
(3, 'vehiculos pesados**3 ejes', 55.2),
(4, 'vehiculos pesados**4 ejes', 73.6),
(5, 'vehiculos pesados**5 ejes', 92),
(6, 'vehiculos pesados**6 ejes', 110.4),
(7, 'vehiculos pesados**7 ejes', 128.8),
(8, 'vehiculos pesados**8 ejes', 147.2),
(9, 'vehiculos pesados**9 ejes', 165.6),
(10, 'vehiculos pesados**10 ejes', 184),
(11, 'vehiculos pesados**11 ejes', 202.4),
(12, 'vehiculos pesados**12 ejes', 220.8),
(13, 'vehiculos pesados**13 ejes', 239.2),
(14, 'vehiculos pesados**14 ejes', 257.6),
(15, 'vehiculos pesados**15 ejes', 276);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `registrovehiculos`
--
ALTER TABLE `registrovehiculos`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_login` (`id_login`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `registrovehiculos`
--
ALTER TABLE `registrovehiculos`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `registrovehiculos`
--
ALTER TABLE `registrovehiculos`
  ADD CONSTRAINT `registroVehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tarifa` (`id_categoria`),
  ADD CONSTRAINT `registroVehiculos_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
