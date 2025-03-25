-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 17:48:37
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
-- Base de datos: `dbpoliclinico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_cant_x_ge`
--

CREATE TABLE `table_cant_x_ge` (
  `identificador` varchar(150) NOT NULL COMMENT 'Valor de la key comb de la tabla labor cifrada con md5',
  `id_ge` int(10) NOT NULL COMMENT 'id del grupo de edad',
  `cant_x_ge` int(11) NOT NULL COMMENT 'Cantidad por grupo de edad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_cant_x_ge`
--

INSERT INTO `table_cant_x_ge` (`identificador`, `id_ge`, `cant_x_ge`) VALUES
('eeb9ea1a7e856c0f551955aa7253a5b4', 11, 12),
('eeb9ea1a7e856c0f551955aa7253a5b4', 13, 45),
('eeb9ea1a7e856c0f551955aa7253a5b4', 15, 23),
('eeb9ea1a7e856c0f551955aa7253a5b4', 16, 11),
('f8e963f82d3c3a053ec7eafbad1e9ec0', 11, 121);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_consultorio_medico`
--

CREATE TABLE `table_consultorio_medico` (
  `id_consultorio_medico` int(10) UNSIGNED NOT NULL,
  `Table_GRUPO_TRABAJO_id_grupo_trabajo` int(10) UNSIGNED NOT NULL,
  `Nombre_cm` varchar(50) DEFAULT NULL,
  `Direccion_cm` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_consultorio_medico`
--

INSERT INTO `table_consultorio_medico` (`id_consultorio_medico`, `Table_GRUPO_TRABAJO_id_grupo_trabajo`, `Nombre_cm`, `Direccion_cm`) VALUES
(1, 1, 'CMF 1', 'Calle 7 1'),
(2, 1, 'CMF 3', 'EL VALLE'),
(3, 2, 'CMF 10', 'tuuy'),
(5, 1, 'CMF 2', 'dfg ert erer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_consultorio_medico_has_table_medico`
--

CREATE TABLE `table_consultorio_medico_has_table_medico` (
  `Table_CONSULTORIO_MEDICO_id_consultorio_medico` int(10) UNSIGNED NOT NULL,
  `Table_MEDICO_ci_medico` varchar(11) NOT NULL,
  `Fecha_consulta` date NOT NULL,
  `Tipo_consulta` enum('Policlinico','Terreno') NOT NULL DEFAULT 'Terreno',
  `Cantidad_paciente` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_consultorio_medico_has_table_medico`
--

INSERT INTO `table_consultorio_medico_has_table_medico` (`Table_CONSULTORIO_MEDICO_id_consultorio_medico`, `Table_MEDICO_ci_medico`, `Fecha_consulta`, `Tipo_consulta`, `Cantidad_paciente`) VALUES
(0, '21548765325', '2025-03-23', 'Policlinico', NULL),
(1, '17110152147', '2025-03-22', 'Terreno', 15),
(1, '84578256352', '2025-03-22', 'Terreno', NULL),
(5, '17110152147', '2025-03-23', 'Terreno', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_especialidad`
--

CREATE TABLE `table_especialidad` (
  `id_especialidad` int(10) UNSIGNED NOT NULL,
  `Nombre_esp` varchar(150) DEFAULT NULL,
  `Siglas_esp` varchar(20) DEFAULT NULL,
  `Descripcion_esp` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_especialidad`
--

INSERT INTO `table_especialidad` (`id_especialidad`, `Nombre_esp`, `Siglas_esp`, `Descripcion_esp`) VALUES
(2, 'Estomatología', 'Estom', 'El merc'),
(5, 'Dermatología', 'Der', 'Especialidad encargada de las enfermedades de la piel'),
(7, 'Medicina Interna', 'MI', 'tyttyty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_especialidad_has_table_grupo_edad`
--

CREATE TABLE `table_especialidad_has_table_grupo_edad` (
  `Table_ESPECIALIDAD_id_especialidad` int(10) UNSIGNED NOT NULL,
  `Table_GRUPO_EDAD_id_grupo_edad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_especialidad_has_table_grupo_edad`
--

INSERT INTO `table_especialidad_has_table_grupo_edad` (`Table_ESPECIALIDAD_id_especialidad`, `Table_GRUPO_EDAD_id_grupo_edad`) VALUES
(2, 11),
(2, 13),
(2, 15),
(2, 16),
(5, 11),
(5, 13),
(5, 15),
(5, 16),
(7, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_grupo_edad`
--

CREATE TABLE `table_grupo_edad` (
  `id_grupo_edad` int(10) UNSIGNED NOT NULL,
  `Rango_edad` varchar(12) DEFAULT NULL,
  `Descripcion_ge` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_grupo_edad`
--

INSERT INTO `table_grupo_edad` (`id_grupo_edad`, `Rango_edad`, `Descripcion_ge`) VALUES
(11, '0-9', '0 a 9 años'),
(13, '10-18', '10 a 18 años'),
(14, '19', '19 años'),
(15, '20-59', '20 a 59 años'),
(16, '60 años y +', '60 años y más');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_grupo_trabajo`
--

CREATE TABLE `table_grupo_trabajo` (
  `id_grupo_trabajo` int(10) UNSIGNED NOT NULL,
  `Nombre_gt` varchar(10) DEFAULT NULL,
  `Descripcion_gt` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_grupo_trabajo`
--

INSERT INTO `table_grupo_trabajo` (`id_grupo_trabajo`, `Nombre_gt`, `Descripcion_gt`) VALUES
(1, 'GTB 1', 'Agrupa a los consultorios médicos de la zona urbana.'),
(2, 'GTB 2', 'Agrupa a los consultorios médicos de la zona rural.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_medico`
--

CREATE TABLE `table_medico` (
  `ci_medico` varchar(11) NOT NULL,
  `Table_ESPECIALIDAD_id_especialidad` int(10) UNSIGNED NOT NULL,
  `Nombre_medico` varchar(100) DEFAULT NULL,
  `Apellido_medico` varchar(150) DEFAULT NULL,
  `Telefono_medico` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_medico`
--

INSERT INTO `table_medico` (`ci_medico`, `Table_ESPECIALIDAD_id_especialidad`, `Nombre_medico`, `Apellido_medico`, `Telefono_medico`) VALUES
('12345678912', 8, 'Javier', 'Perez Perez', '12-12-12-12'),
('17110152147', 0, 'Lester Rene', 'Olivera Ocaña', '23441414'),
('21548765325', 7, 'Arnaldo', 'Lopez Cintra', '21-54-78-54'),
('84578256352', 2, 'Pedro Rafael', 'Castro Macias', '14256398'),
('95012445467', 5, 'Lester', 'Olivera Alvarez', '55684871');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_pronostico`
--

CREATE TABLE `table_pronostico` (
  `mes_anno` varchar(7) NOT NULL,
  `tipo` enum('Policlinico','Terreno') NOT NULL,
  `Table_MEDICO_ci_medico` varchar(11) NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_pronostico`
--

INSERT INTO `table_pronostico` (`mes_anno`, `tipo`, `Table_MEDICO_ci_medico`, `cantidad`) VALUES
('03-2025', 'Policlinico', '12345678912', 20),
('03-2025', 'Policlinico', '17110152147', 7),
('03-2025', 'Policlinico', '21548765325', 253),
('03-2025', 'Policlinico', '5412365985', 100),
('03-2025', 'Policlinico', '84578256352', 120),
('03-2025', 'Policlinico', '95012445467', 12),
('03-2025', 'Terreno', '12345678912', 15),
('03-2025', 'Terreno', '17110152147', 45),
('03-2025', 'Terreno', '21548765325', 12),
('03-2025', 'Terreno', '5412365985', 5),
('03-2025', 'Terreno', '84578256352', 50),
('03-2025', 'Terreno', '95012445467', 25),
('04-2025', 'Policlinico', '17110152147', 25),
('04-2025', 'Terreno', '17110152147', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_usuario`
--

CREATE TABLE `table_usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nombre_usuario` varchar(250) DEFAULT NULL,
  `rol` enum('Administrador','Director','Especialista','Jefe Departamento') DEFAULT 'Especialista',
  `contrasenna` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `fecha_ult_conex` datetime DEFAULT NULL,
  `creado_por` int(10) UNSIGNED DEFAULT NULL,
  `estado_usuario` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_usuario`
--

INSERT INTO `table_usuario` (`id_usuario`, `usuario`, `nombre_usuario`, `rol`, `contrasenna`, `fecha_creado`, `fecha_modificado`, `fecha_ult_conex`, `creado_por`, `estado_usuario`) VALUES
(1, 'admin', 'Administrador del Sitema', 'Administrador', '0cc175b9c0f1b6a831c399e269772661', '2025-02-23 23:19:34', '2025-02-23 23:19:34', NULL, 1, 'Activo'),
(2, 'invitado.sistema', 'Cuenta de Invitado', '', '0cc175b9c0f1b6a831c399e269772661', '2025-02-23 23:22:01', '2025-03-14 13:01:29', '2025-02-24 11:13:26', 1, 'Activo'),
(3, 'ana.cid', 'Ana Cid Casid', 'Especialista', '41c874ebeb4ed111aec0385df864835a', '2025-03-14 13:11:31', '2025-03-14 13:12:41', NULL, 1, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `table_cant_x_ge`
--
ALTER TABLE `table_cant_x_ge`
  ADD PRIMARY KEY (`identificador`,`id_ge`);

--
-- Indices de la tabla `table_consultorio_medico`
--
ALTER TABLE `table_consultorio_medico`
  ADD PRIMARY KEY (`id_consultorio_medico`),
  ADD KEY `Table_CONSULTORIO_MEDICO_FKIndex1` (`Table_GRUPO_TRABAJO_id_grupo_trabajo`);

--
-- Indices de la tabla `table_consultorio_medico_has_table_medico`
--
ALTER TABLE `table_consultorio_medico_has_table_medico`
  ADD PRIMARY KEY (`Table_CONSULTORIO_MEDICO_id_consultorio_medico`,`Table_MEDICO_ci_medico`,`Fecha_consulta`,`Tipo_consulta`) USING BTREE;

--
-- Indices de la tabla `table_especialidad`
--
ALTER TABLE `table_especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `table_especialidad_has_table_grupo_edad`
--
ALTER TABLE `table_especialidad_has_table_grupo_edad`
  ADD PRIMARY KEY (`Table_ESPECIALIDAD_id_especialidad`,`Table_GRUPO_EDAD_id_grupo_edad`),
  ADD KEY `Table_ESPECIALIDAD_has_Table_GRUPO_EDAD_FKIndex1` (`Table_ESPECIALIDAD_id_especialidad`),
  ADD KEY `Table_ESPECIALIDAD_has_Table_GRUPO_EDAD_FKIndex2` (`Table_GRUPO_EDAD_id_grupo_edad`);

--
-- Indices de la tabla `table_grupo_edad`
--
ALTER TABLE `table_grupo_edad`
  ADD PRIMARY KEY (`id_grupo_edad`);

--
-- Indices de la tabla `table_grupo_trabajo`
--
ALTER TABLE `table_grupo_trabajo`
  ADD PRIMARY KEY (`id_grupo_trabajo`);

--
-- Indices de la tabla `table_medico`
--
ALTER TABLE `table_medico`
  ADD PRIMARY KEY (`ci_medico`),
  ADD KEY `Table_Medico_FKIndex1` (`Table_ESPECIALIDAD_id_especialidad`);

--
-- Indices de la tabla `table_pronostico`
--
ALTER TABLE `table_pronostico`
  ADD PRIMARY KEY (`mes_anno`,`tipo`,`Table_MEDICO_ci_medico`) USING BTREE;

--
-- Indices de la tabla `table_usuario`
--
ALTER TABLE `table_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `table_consultorio_medico`
--
ALTER TABLE `table_consultorio_medico`
  MODIFY `id_consultorio_medico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `table_especialidad`
--
ALTER TABLE `table_especialidad`
  MODIFY `id_especialidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `table_grupo_edad`
--
ALTER TABLE `table_grupo_edad`
  MODIFY `id_grupo_edad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `table_grupo_trabajo`
--
ALTER TABLE `table_grupo_trabajo`
  MODIFY `id_grupo_trabajo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `table_usuario`
--
ALTER TABLE `table_usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
