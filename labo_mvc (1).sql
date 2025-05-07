-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2025 a las 00:50:15
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
-- Base de datos: `labo_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(100) NOT NULL,
  `codigo_carrera` varchar(20) NOT NULL,
  `duracion_semestres` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `activa` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `codigo_carrera`, `duracion_semestres`, `descripcion`, `fecha_creacion`, `activa`) VALUES
(2, 'Ingeniería de Sistemas', 'IS001', 10, 'Carrera enfocada en el desarrollo de software y administración de sistemas', '2020-01-15', 1),
(3, 'Medicina', 'MD002', 12, 'Carrera destinada a la formación de médicos generales', '2019-08-20', 1),
(4, 'Derecho', 'DR003', 8, 'Carrera orientada al estudio de leyes y normativas', '2021-03-10', 1),
(5, 'Arquitectura', 'AR004', 10, 'Carrera enfocada en el diseño y construcción de edificaciones', '2018-11-05', 1),
(6, 'Psicología', 'PS005', 8, 'Carrera que estudia el comportamiento humano', '2022-06-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `titulo_academico` varchar(100) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `cedula`, `nombres`, `apellidos`, `titulo_academico`, `especialidad`, `telefono`, `email`, `fecha_contratacion`, `activo`) VALUES
(4, '1234567890', 'Juan', 'Pérez', 'PhD en Matemáticas', 'Matemáticas', '555-1234', 'juan.perez@example.com', '2015-09-01', 1),
(5, '2345678901', 'María', 'González', 'PhD en Física', 'Física', '555-2345', 'maria.gonzalez@example.com', '2016-10-15', 1),
(6, '3456789012', 'Carlos', 'Rodríguez', 'PhD en Química', 'Química', '555-3456', 'carlos.rodriguez@example.com', '2017-11-20', 1),
(7, '4567890123', 'Ana', 'Martínez', 'PhD en Biología', 'Biología', '555-4567', 'ana.martinez@example.com', '2018-12-05', 1),
(8, '5678901234', 'Luis', 'Fernández', 'PhD en Informática', 'Informática', '555-5678', 'luis.fernandez@example.com', '2019-01-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `codigo_materia` varchar(20) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `total_horas` int(11) NOT NULL,
  `horas_teoria` int(11) DEFAULT NULL,
  `horas_practica` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `codigo_materia`, `nombre_materia`, `total_horas`, `horas_teoria`, `horas_practica`, `descripcion`) VALUES
(2, 'MAT101', 'Matemáticas Básicas', 60, 40, 20, 'Curso introductorio de matemáticas'),
(3, 'FIS201', 'Física General', 80, 50, 30, 'Curso de física para principiantes'),
(4, 'QUI301', 'Química Orgánica', 70, 45, 25, 'Estudio de compuestos orgánicos'),
(5, 'BIO401', 'Biología Molecular', 90, 60, 30, 'Análisis de moléculas biológicas'),
(6, 'INF501', 'Informática Avanzada', 100, 70, 30, 'Curso avanzado de informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE `semestres` (
  `id_semestre` int(11) NOT NULL,
  `numero_semestre` int(11) NOT NULL,
  `nombre_semestre` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `numero_semestre`, `nombre_semestre`, `fecha_inicio`, `fecha_fin`, `activo`) VALUES
(1, 1, 'Primer Semestre', '2023-01-01', '2023-06-30', 1),
(2, 2, 'Segundo Semestre', '2023-07-01', '2023-12-31', 1),
(3, 3, 'Tercer Semestre', '2024-01-01', '2024-06-30', 1),
(4, 4, 'Cuarto Semestre', '2024-07-01', '2024-12-31', 1),
(5, 5, 'Quinto Semestre', '2025-01-01', '2025-06-30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`),
  ADD UNIQUE KEY `codigo_carrera` (`codigo_carrera`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `codigo_materia` (`codigo_materia`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id_semestre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
