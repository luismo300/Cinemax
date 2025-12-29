-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 09:36:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinemax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos`
--

CREATE TABLE `boletos` (
  `id_boleto` int(11) NOT NULL,
  `pelicula` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cliente_id` varchar(255) DEFAULT NULL,
  `asiento` varchar(5) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boletos`
--

INSERT INTO `boletos` (`id_boleto`, `pelicula`, `fecha`, `cliente_id`, `asiento`, `precio`) VALUES
(1, 'Pelicula Ejemplo', '2024-12-04', 'CL001', '8', 7.00),
(2, 'Inside Out', '2024-12-04', 'CL001', '8', 7.00),
(3, 'The Garfield Movie', '2024-12-04', 'CL001', '27', 7.00),
(4, 'Inside Out', '2024-12-04', 'CL001', '8', 7.00),
(5, 'The Garfield Movie', '2024-12-04', 'CL001', '27', 7.00),
(6, 'The Garfield Movie', '2024-12-04', 'CL001', '27', 7.00),
(7, 'Inside Out', '2024-12-04', 'CL001', '8', 7.00),
(8, 'The Garfield Movie', '2024-12-04', 'CL001', '29', 7.00),
(9, 'The Garfield Movie', '2024-12-04', 'CL001', '30', 7.00),
(10, 'The Garfield Movie', '2024-12-04', 'CL001', '31', 7.00),
(11, 'The Garfield Movie', '2024-12-04', 'CL001', '32', 7.00),
(12, 'The Garfield Movie', '2024-12-04', 'CL001', '33', 7.00),
(13, 'Inside Out', '2024-12-04', 'CL002', '8', 7.00),
(14, 'Inside Out', '2024-12-04', 'CL001', '5', 7.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` varchar(10) NOT NULL,
  `cedula_c` varchar(20) NOT NULL,
  `nombre_c` varchar(50) NOT NULL,
  `apellido_c` varchar(50) NOT NULL,
  `contrasena_c` varchar(255) NOT NULL,
  `provincia_c` varchar(50) DEFAULT NULL,
  `distrito_c` varchar(50) DEFAULT NULL,
  `corregimiento_c` varchar(50) DEFAULT NULL,
  `correo_c` varchar(100) DEFAULT NULL,
  `tel_c` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cedula_c`, `nombre_c`, `apellido_c`, `contrasena_c`, `provincia_c`, `distrito_c`, `corregimiento_c`, `correo_c`, `tel_c`) VALUES
('CL001', '3-755-755', 'Zafiro', 'Zafiro', '123', 'PANAMA', 'PANAMA', 'Pacora', 'zafiro@123', '12341234'),
('CL003', '1', '1', '1', '$2y$10$66U4jRVW1fb3wXEn10Tsie3f0lx.X7DuK9k9GLSkPrUDVjV3pTW/G', '1', '1', '1', '3@3', '1');

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `generar_id_cliente` BEFORE INSERT ON `cliente` FOR EACH ROW BEGIN
    DECLARE ultimo_id VARCHAR(10);
    DECLARE nuevo_id INT;

    -- Obtener el último ID generado en la tabla
    SELECT MAX(id) INTO ultimo_id FROM cliente;

    IF ultimo_id IS NULL THEN
        -- Si no hay registros, inicializar en 1
        SET nuevo_id = 1;
    ELSE
        -- Extraer el número del último ID y sumar 1
        SET nuevo_id = CAST(SUBSTRING(ultimo_id, 3) AS UNSIGNED) + 1;
    END IF;

    -- Generar el nuevo ID con el formato CL###
    SET NEW.id = CONCAT('CL', LPAD(nuevo_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` varchar(10) NOT NULL,
  `cedula_e` varchar(20) NOT NULL,
  `nombre_e` varchar(50) NOT NULL,
  `apellido_e` varchar(50) NOT NULL,
  `contrasena_e` varchar(255) NOT NULL,
  `tel_e` int(15) DEFAULT NULL,
  `cod_cargo` varchar(255) NOT NULL,
  `id_suc` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `cedula_e`, `nombre_e`, `apellido_e`, `contrasena_e`, `tel_e`, `cod_cargo`, `id_suc`, `correo`) VALUES
('EM001', '1', 'Javier ', 'Cuello', '11', 12341234, 'CARGO001', 'SUCO001', 'javier@cinemax'),
('EM002', '2', 'Luis', 'Mo', '22', 44445555, 'CODG002', 'SUC002', 'luis@cinemax\r\n');

--
-- Disparadores `empleado`
--
DELIMITER $$
CREATE TRIGGER `generar_id_empleado` BEFORE INSERT ON `empleado` FOR EACH ROW BEGIN
    DECLARE ultimo_id VARCHAR(10);
    DECLARE nuevo_id INT;

    -- Obtener el último ID generado en la tabla empleado
    SELECT MAX(id) INTO ultimo_id FROM empleado;

    IF ultimo_id IS NULL THEN
        -- Si no hay registros, inicializar en 1
        SET nuevo_id = 1;
    ELSE
        -- Extraer el número del último ID y sumar 1
        SET nuevo_id = CAST(SUBSTRING(ultimo_id, 3) AS UNSIGNED) + 1;
    END IF;

    -- Generar el nuevo ID con el formato EM###
    SET NEW.id = CONCAT('EM', LPAD(nuevo_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre_p` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre_p`, `fecha`, `genero`) VALUES
(1, 'La forja\r\n', '2024-12-02', 'Accion'),
(2, 'La sustancia\r\n', '2024-12-02', 'terror\r\n'),
(3, 'Transformers uno\r\n', '2024-12-02', 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silla`
--

CREATE TABLE `silla` (
  `id` int(11) NOT NULL,
  `fila` char(1) DEFAULT NULL,
  `columna` int(11) DEFAULT NULL,
  `id_pelicula` int(11) DEFAULT NULL,
  `status` enum('Disponible','Ocupado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `silla`
--

INSERT INTO `silla` (`id`, `fila`, `columna`, `id_pelicula`, `status`) VALUES
(1, 'A', 1, 1, 'Ocupado'),
(2, 'A', 2, 1, 'Ocupado'),
(3, 'A', 3, 1, 'Ocupado'),
(4, 'A', 4, 1, 'Ocupado'),
(5, 'A', 5, 1, 'Ocupado'),
(6, 'B', 1, 1, 'Ocupado'),
(7, 'B', 2, 1, 'Ocupado'),
(8, 'B', 3, 1, 'Ocupado'),
(9, 'B', 4, 1, 'Disponible'),
(10, 'B', 5, 1, 'Disponible'),
(11, 'C', 1, 1, 'Ocupado'),
(12, 'C', 2, 1, 'Disponible'),
(13, 'C', 3, 1, 'Disponible'),
(14, 'C', 4, 1, 'Disponible'),
(15, 'C', 5, 1, 'Disponible'),
(16, 'D', 1, 1, 'Disponible'),
(17, 'D', 2, 1, 'Disponible'),
(18, 'D', 3, 1, 'Disponible'),
(19, 'D', 4, 1, 'Disponible'),
(20, 'D', 5, 1, 'Disponible'),
(21, 'E', 1, 1, 'Disponible'),
(22, 'E', 2, 1, 'Disponible'),
(23, 'E', 3, 1, 'Disponible'),
(24, 'E', 4, 1, 'Disponible'),
(25, 'E', 5, 1, 'Disponible'),
(26, 'A', 1, 2, 'Ocupado'),
(27, 'A', 2, 2, 'Ocupado'),
(28, 'A', 3, 2, 'Ocupado'),
(29, 'A', 4, 2, 'Ocupado'),
(30, 'A', 5, 2, 'Ocupado'),
(31, 'B', 1, 2, 'Ocupado'),
(32, 'B', 2, 2, 'Ocupado'),
(33, 'B', 3, 2, 'Ocupado'),
(34, 'B', 4, 2, 'Disponible'),
(35, 'B', 5, 2, 'Disponible'),
(36, 'C', 1, 2, 'Disponible'),
(37, 'C', 2, 2, 'Disponible'),
(38, 'C', 3, 2, 'Disponible'),
(39, 'C', 4, 2, 'Disponible'),
(40, 'C', 5, 2, 'Disponible'),
(41, 'D', 1, 2, 'Disponible'),
(42, 'D', 2, 2, 'Disponible'),
(43, 'D', 3, 2, 'Disponible'),
(44, 'D', 4, 2, 'Disponible'),
(45, 'D', 5, 2, 'Disponible'),
(46, 'E', 1, 2, 'Disponible'),
(47, 'E', 2, 2, 'Disponible'),
(48, 'E', 3, 2, 'Disponible'),
(49, 'E', 4, 2, 'Disponible'),
(50, 'E', 5, 2, 'Disponible');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletos`
--
ALTER TABLE `boletos`
  ADD PRIMARY KEY (`id_boleto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_c` (`cedula_c`),
  ADD UNIQUE KEY `correo_c` (`correo_c`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_e` (`cedula_e`),
  ADD UNIQUE KEY `unique_cedula` (`cedula_e`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `silla`
--
ALTER TABLE `silla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletos`
--
ALTER TABLE `boletos`
  MODIFY `id_boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `silla`
--
ALTER TABLE `silla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
