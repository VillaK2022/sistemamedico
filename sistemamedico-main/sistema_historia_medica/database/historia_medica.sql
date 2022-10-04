-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2021 a las 16:35:34
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historia_medica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antc_fami`
--

CREATE TABLE `antc_fami` (
  `id_pa_fk` int(11) NOT NULL,
  `pariente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_pa_fk` int(11) NOT NULL,
  `id_doc_fk` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `razon` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `n_consulta` int(11) NOT NULL,
  `motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_r` date NOT NULL,
  `id_doc_fk` int(11) NOT NULL,
  `id_pa_fk` int(11) NOT NULL,
  `estado_c` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin Atender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id_diagnostico` int(11) NOT NULL,
  `enfermedad` text COLLATE utf8_spanish_ci NOT NULL,
  `descrip_sintomas` text COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` text COLLATE utf8_spanish_ci NOT NULL,
  `consulta_fk` int(11) NOT NULL,
  `examenes` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id_pa_fk` int(11) NOT NULL,
  `respiratoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gastro_intestinal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `neurologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hematologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alergia` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `id_enfermera` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exa_fisico`
--

CREATE TABLE `exa_fisico` (
  `id_consul_fk` int(11) NOT NULL,
  `presion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `temperatura` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `f_respira` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `f_cardiaca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `altura` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habito`
--

CREATE TABLE `habito` (
  `id_pa_fk` int(11) NOT NULL,
  `alcohol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tabaco` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `drogas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `alimentacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vida_sexual` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sueno` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_doc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_paciente`
--

CREATE TABLE `medico_paciente` (
  `id_pa_fk` int(11) NOT NULL,
  `id_doc_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `n_hc` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_p` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_m` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_p` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `ocupacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `residencia` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'nuevo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `medicamento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dosis` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `uso` text COLLATE utf8_spanish_ci NOT NULL,
  `diagnostico_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `permisos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `pass`, `permisos`, `cedula`) VALUES
(1, 'admin', 'admin', 'Administrador', '6554432'),
(2, 'juan123', '123456', 'Medico/ca', '6250366'),
(3, 'maria564', '123456', 'Enfermera/ro', '19345326'),
(13, 'admin', '12345', 'Administrador', '27918');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antc_fami`
--
ALTER TABLE `antc_fami`
  ADD KEY `id_pa_fk` (`id_pa_fk`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_pa_fk` (`id_pa_fk`,`id_doc_fk`),
  ADD KEY `id_doc_fk` (`id_doc_fk`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`n_consulta`),
  ADD KEY `id_doc_fk` (`id_doc_fk`,`id_pa_fk`),
  ADD KEY `id_pa_fk` (`id_pa_fk`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`),
  ADD KEY `consulta_fk` (`consulta_fk`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD KEY `id_pa_fk` (`id_pa_fk`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD PRIMARY KEY (`id_enfermera`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `exa_fisico`
--
ALTER TABLE `exa_fisico`
  ADD KEY `id_consul_fk` (`id_consul_fk`);

--
-- Indices de la tabla `habito`
--
ALTER TABLE `habito`
  ADD KEY `id_pa_fk` (`id_pa_fk`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `medico_paciente`
--
ALTER TABLE `medico_paciente`
  ADD KEY `id_pa_fk` (`id_pa_fk`,`id_doc_fk`),
  ADD KEY `id_doc_fk` (`id_doc_fk`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `diagnostico_fk` (`diagnostico_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `n_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  MODIFY `id_enfermera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antc_fami`
--
ALTER TABLE `antc_fami`
  ADD CONSTRAINT `antc_fami_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`consulta_fk`) REFERENCES `consulta` (`n_consulta`);

--
-- Filtros para la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD CONSTRAINT `enfermedades_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `exa_fisico`
--
ALTER TABLE `exa_fisico`
  ADD CONSTRAINT `exa_fisico_ibfk_1` FOREIGN KEY (`id_consul_fk`) REFERENCES `consulta` (`n_consulta`);

--
-- Filtros para la tabla `habito`
--
ALTER TABLE `habito`
  ADD CONSTRAINT `habito_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `medico_paciente`
--
ALTER TABLE `medico_paciente`
  ADD CONSTRAINT `medico_paciente_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `medico_paciente_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`diagnostico_fk`) REFERENCES `diagnostico` (`id_diagnostico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
