-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2025 a las 10:18:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abarrotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `usuario`, `contraseña`, `correo`) VALUES
(1, 'PedroC0909', 'Fime255', 'pedro.cervantesmls@uanl.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dulces`
--

CREATE TABLE `dulces` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dulces`
--

INSERT INTO `dulces` (`id`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Paleta', 200, 'Suficiente'),
(2, 'Chocolate', 120, 'Suficiente'),
(3, 'Chicle', 300, 'Suficiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `usuario`, `contraseña`, `correo`) VALUES
(1, 'JuanG15', 'Coco3350', 'juan_gonzales15@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galletas`
--

CREATE TABLE `galletas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galletas`
--

INSERT INTO `galletas` (`id`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Marías', 80, 'Suficiente'),
(2, 'Oreo', 60, 'Suficiente'),
(3, 'Chokis', 90, 'Suficiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lacteos`
--

CREATE TABLE `lacteos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lacteos`
--

INSERT INTO `lacteos` (`id`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Leche', 100, 'Suficiente'),
(2, 'Queso', 50, 'Suficiente'),
(3, 'Crema', 30, 'Suficiente'),
(4, 'Yogur', 70, 'Suficiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papitas`
--

CREATE TABLE `papitas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `papitas`
--

INSERT INTO `papitas` (`id`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Sabritas', 100, 'Suficiente'),
(2, 'Doritos', 70, 'Suficiente'),
(3, 'Ruffles', 50, 'Suficiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets_recuperacion`
--

CREATE TABLE `tickets_recuperacion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tickets_recuperacion`
--

INSERT INTO `tickets_recuperacion` (`id`, `tipo`, `usuario`, `correo`, `fecha`) VALUES
(1, 'admins', 'PedroC0909', 'pedro.cervantesmls@uanl.edu.mx', '2025-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variados`
--

CREATE TABLE `variados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `variados`
--

INSERT INTO `variados` (`id`, `nombre`, `cantidad`, `estado`) VALUES
(1, 'Refresco', 150, 'Suficiente'),
(2, 'Agua', 200, 'Suficiente'),
(3, 'Jugo', 90, 'Suficiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dulces`
--
ALTER TABLE `dulces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galletas`
--
ALTER TABLE `galletas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lacteos`
--
ALTER TABLE `lacteos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `papitas`
--
ALTER TABLE `papitas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets_recuperacion`
--
ALTER TABLE `tickets_recuperacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `variados`
--
ALTER TABLE `variados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dulces`
--
ALTER TABLE `dulces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `galletas`
--
ALTER TABLE `galletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lacteos`
--
ALTER TABLE `lacteos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `papitas`
--
ALTER TABLE `papitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tickets_recuperacion`
--
ALTER TABLE `tickets_recuperacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `variados`
--
ALTER TABLE `variados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
