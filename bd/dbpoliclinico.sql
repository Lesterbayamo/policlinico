-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2025 a las 21:10:33
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
  `id_x` varchar(150) NOT NULL,
  `identificador` varchar(150) NOT NULL COMMENT 'Valor de la key comb de la tabla labor cifrada con md5',
  `id_ge` int(10) NOT NULL COMMENT 'id del grupo de edad',
  `cant_x_ge` int(11) NOT NULL COMMENT 'Cantidad por grupo de edad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `table_cant_x_ge`
--

INSERT INTO `table_cant_x_ge` (`id_x`, `identificador`, `id_ge`, `cant_x_ge`) VALUES
('f59183d4acf971b12d02368a1269e749', '442a71fe823f78bd5a304362791d5681', 0, 1),
('f59183d4acf971b12d02368a1269e749', '442a71fe823f78bd5a304362791d5681', 11, 45),
('f59183d4acf971b12d02368a1269e749', '442a71fe823f78bd5a304362791d5681', 14, 12),
('f59183d4acf971b12d02368a1269e749', '442a71fe823f78bd5a304362791d5681', 16, 6),
('64cd7e5adf7989db918f7309feeb8ee9', '4b04ea96792acc794398cd023b13342d', 0, 2),
('64cd7e5adf7989db918f7309feeb8ee9', '4b04ea96792acc794398cd023b13342d', 11, 41),
('64cd7e5adf7989db918f7309feeb8ee9', '4b04ea96792acc794398cd023b13342d', 13, 78),
('64cd7e5adf7989db918f7309feeb8ee9', '4b04ea96792acc794398cd023b13342d', 15, 12),
('64cd7e5adf7989db918f7309feeb8ee9', '4b04ea96792acc794398cd023b13342d', 16, 36),
('eee0d2597c6be9a73fef393715a12234', '60d83f566fd3c4cfb64e30fe96cdbc99', 0, 3),
('eee0d2597c6be9a73fef393715a12234', '60d83f566fd3c4cfb64e30fe96cdbc99', 11, 3),
('eee0d2597c6be9a73fef393715a12234', '60d83f566fd3c4cfb64e30fe96cdbc99', 14, 14),
('eee0d2597c6be9a73fef393715a12234', '60d83f566fd3c4cfb64e30fe96cdbc99', 16, 45),
('d90a66a561d3415ba0b76003adc9b897', '76a973c4d734ff67528be6a975f167fc', 0, 0),
('d90a66a561d3415ba0b76003adc9b897', '76a973c4d734ff67528be6a975f167fc', 11, 12),
('d90a66a561d3415ba0b76003adc9b897', '76a973c4d734ff67528be6a975f167fc', 13, 35),
('d90a66a561d3415ba0b76003adc9b897', '76a973c4d734ff67528be6a975f167fc', 15, 12),
('d90a66a561d3415ba0b76003adc9b897', '76a973c4d734ff67528be6a975f167fc', 16, 65),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', '8de78df331c0921bf54c44b8ca3eaedc', 0, 1),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', '8de78df331c0921bf54c44b8ca3eaedc', 11, 2),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', '8de78df331c0921bf54c44b8ca3eaedc', 13, 36),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', '8de78df331c0921bf54c44b8ca3eaedc', 15, 45),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', '8de78df331c0921bf54c44b8ca3eaedc', 16, 87),
('9059be871317d66641754eada3a7cb03', '92592df25dcec1bb7e0c6e312643181e', 0, 0),
('9059be871317d66641754eada3a7cb03', '92592df25dcec1bb7e0c6e312643181e', 11, 2),
('9059be871317d66641754eada3a7cb03', '92592df25dcec1bb7e0c6e312643181e', 13, 78),
('9059be871317d66641754eada3a7cb03', '92592df25dcec1bb7e0c6e312643181e', 15, 65),
('9059be871317d66641754eada3a7cb03', '92592df25dcec1bb7e0c6e312643181e', 16, 8),
('59a9c76d8b0bc6214bbefd8ac5970984', 'a426d1c26220fde5468bdaa427c5899a', 0, 0),
('59a9c76d8b0bc6214bbefd8ac5970984', 'a426d1c26220fde5468bdaa427c5899a', 11, 45),
('59a9c76d8b0bc6214bbefd8ac5970984', 'a426d1c26220fde5468bdaa427c5899a', 13, 78),
('59a9c76d8b0bc6214bbefd8ac5970984', 'a426d1c26220fde5468bdaa427c5899a', 15, 54),
('59a9c76d8b0bc6214bbefd8ac5970984', 'a426d1c26220fde5468bdaa427c5899a', 16, 2),
('9059be871317d66641754eada3a7cb03', 'a78a454352b06fd62227b4a44f621399', 0, 0),
('9059be871317d66641754eada3a7cb03', 'a78a454352b06fd62227b4a44f621399', 11, 25),
('9059be871317d66641754eada3a7cb03', 'a78a454352b06fd62227b4a44f621399', 13, 1),
('9059be871317d66641754eada3a7cb03', 'a78a454352b06fd62227b4a44f621399', 15, 0),
('9059be871317d66641754eada3a7cb03', 'a78a454352b06fd62227b4a44f621399', 16, 0),
('6323b73eb96cf9b088c8d776693a0080', 'a99f7ba6fc50f46c482fdff5d45782de', 0, 2),
('6323b73eb96cf9b088c8d776693a0080', 'a99f7ba6fc50f46c482fdff5d45782de', 11, 12),
('6323b73eb96cf9b088c8d776693a0080', 'a99f7ba6fc50f46c482fdff5d45782de', 13, 45),
('6323b73eb96cf9b088c8d776693a0080', 'a99f7ba6fc50f46c482fdff5d45782de', 15, 59),
('6323b73eb96cf9b088c8d776693a0080', 'a99f7ba6fc50f46c482fdff5d45782de', 16, 23),
('e3241974e4c8c42db61cd3edab31194b', 'b798ae5f58af661709eb35011807022e', 0, 3),
('e3241974e4c8c42db61cd3edab31194b', 'b798ae5f58af661709eb35011807022e', 11, 12),
('e3241974e4c8c42db61cd3edab31194b', 'b798ae5f58af661709eb35011807022e', 13, 45),
('e3241974e4c8c42db61cd3edab31194b', 'b798ae5f58af661709eb35011807022e', 15, 35),
('e3241974e4c8c42db61cd3edab31194b', 'b798ae5f58af661709eb35011807022e', 16, 65),
('b8408a80b044edbdf55fa435d3e0eef7', 'be027582b73d454e2e47dac3e5f4e3ee', 0, 5),
('b8408a80b044edbdf55fa435d3e0eef7', 'be027582b73d454e2e47dac3e5f4e3ee', 11, 49),
('b8408a80b044edbdf55fa435d3e0eef7', 'be027582b73d454e2e47dac3e5f4e3ee', 13, 45),
('b8408a80b044edbdf55fa435d3e0eef7', 'be027582b73d454e2e47dac3e5f4e3ee', 15, 0),
('b8408a80b044edbdf55fa435d3e0eef7', 'be027582b73d454e2e47dac3e5f4e3ee', 16, 45),
('10f339cb793833efec818bd0c76e5d43', 'c8e4dd9e0723557adbd83bac19d6c02e', 11, 7),
('10f339cb793833efec818bd0c76e5d43', 'c8e4dd9e0723557adbd83bac19d6c02e', 13, 2),
('10f339cb793833efec818bd0c76e5d43', 'c8e4dd9e0723557adbd83bac19d6c02e', 15, 6),
('10f339cb793833efec818bd0c76e5d43', 'c8e4dd9e0723557adbd83bac19d6c02e', 16, 5),
('d90a66a561d3415ba0b76003adc9b897', 'd68d40c0143a071d6778e1e0ecb2d474', 0, 0),
('d90a66a561d3415ba0b76003adc9b897', 'd68d40c0143a071d6778e1e0ecb2d474', 11, 45),
('d90a66a561d3415ba0b76003adc9b897', 'd68d40c0143a071d6778e1e0ecb2d474', 13, 56),
('d90a66a561d3415ba0b76003adc9b897', 'd68d40c0143a071d6778e1e0ecb2d474', 15, 23),
('d90a66a561d3415ba0b76003adc9b897', 'd68d40c0143a071d6778e1e0ecb2d474', 16, 6),
('097f78b5693f814c9ba6457f7b1ab29e', 'd7463098d2092829635858edcdaf882c', 0, 1),
('097f78b5693f814c9ba6457f7b1ab29e', 'd7463098d2092829635858edcdaf882c', 11, 45),
('097f78b5693f814c9ba6457f7b1ab29e', 'd7463098d2092829635858edcdaf882c', 13, 32),
('097f78b5693f814c9ba6457f7b1ab29e', 'd7463098d2092829635858edcdaf882c', 15, 12),
('097f78b5693f814c9ba6457f7b1ab29e', 'd7463098d2092829635858edcdaf882c', 16, 36),
('91d571d6fd7b5e9d1e8508d4e5da6ab8', 'e6d73a1b8c1dc8bc7e2c98717d95655e', 0, 1),
('91d571d6fd7b5e9d1e8508d4e5da6ab8', 'e6d73a1b8c1dc8bc7e2c98717d95655e', 11, 12),
('91d571d6fd7b5e9d1e8508d4e5da6ab8', 'e6d73a1b8c1dc8bc7e2c98717d95655e', 13, 33),
('91d571d6fd7b5e9d1e8508d4e5da6ab8', 'e6d73a1b8c1dc8bc7e2c98717d95655e', 15, 56),
('91d571d6fd7b5e9d1e8508d4e5da6ab8', 'e6d73a1b8c1dc8bc7e2c98717d95655e', 16, 45),
('7172490962d0abc85376a6c6d2b22bc1', 'eeb9ea1a7e856c0f551955aa7253a5b4', 0, 1),
('7172490962d0abc85376a6c6d2b22bc1', 'eeb9ea1a7e856c0f551955aa7253a5b4', 11, 32),
('7172490962d0abc85376a6c6d2b22bc1', 'eeb9ea1a7e856c0f551955aa7253a5b4', 13, 12),
('7172490962d0abc85376a6c6d2b22bc1', 'eeb9ea1a7e856c0f551955aa7253a5b4', 15, 23),
('7172490962d0abc85376a6c6d2b22bc1', 'eeb9ea1a7e856c0f551955aa7253a5b4', 16, 56),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', 'efb0cf3dec63adc682bfbbb03230cd40', 0, 1),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', 'efb0cf3dec63adc682bfbbb03230cd40', 11, 14),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', 'efb0cf3dec63adc682bfbbb03230cd40', 13, 56),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', 'efb0cf3dec63adc682bfbbb03230cd40', 15, 96),
('cee72a699e8fbb7c8cb45d9cc7c5f7a6', 'efb0cf3dec63adc682bfbbb03230cd40', 16, 23),
('e247d64877b713e7dcc3d6d652936f40', 'f8e963f82d3c3a053ec7eafbad1e9ec0', 0, 0),
('e247d64877b713e7dcc3d6d652936f40', 'f8e963f82d3c3a053ec7eafbad1e9ec0', 11, 12),
('e247d64877b713e7dcc3d6d652936f40', 'f8e963f82d3c3a053ec7eafbad1e9ec0', 14, 45),
('e247d64877b713e7dcc3d6d652936f40', 'f8e963f82d3c3a053ec7eafbad1e9ec0', 16, 36),
('0b4808dd1e0bc2760819d56d5ae52aa0', 'ffeffbf566f451ca8afeeac03452efe9', 0, 5),
('0b4808dd1e0bc2760819d56d5ae52aa0', 'ffeffbf566f451ca8afeeac03452efe9', 11, 12),
('0b4808dd1e0bc2760819d56d5ae52aa0', 'ffeffbf566f451ca8afeeac03452efe9', 13, 45),
('0b4808dd1e0bc2760819d56d5ae52aa0', 'ffeffbf566f451ca8afeeac03452efe9', 15, 35),
('0b4808dd1e0bc2760819d56d5ae52aa0', 'ffeffbf566f451ca8afeeac03452efe9', 16, 21);

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
(0, '84578256352', '2025-03-03', 'Policlinico', NULL),
(0, '84578256352', '2025-03-25', 'Policlinico', NULL),
(0, '84578256352', '2025-03-27', 'Policlinico', NULL),
(0, '92101347464', '2025-03-03', 'Policlinico', NULL),
(0, '92101347464', '2025-03-27', 'Policlinico', NULL),
(1, '17110152147', '2025-03-22', 'Terreno', 16),
(1, '17110152147', '2025-03-26', 'Terreno', 14),
(1, '21548765325', '2025-03-24', 'Terreno', NULL),
(1, '84578256352', '2025-03-03', 'Terreno', NULL),
(1, '84578256352', '2025-03-22', 'Terreno', NULL),
(1, '84578256352', '2025-03-27', 'Terreno', NULL),
(1, '92101347464', '2025-03-01', 'Terreno', NULL),
(1, '92101347464', '2025-03-27', 'Terreno', NULL),
(2, '84578256352', '2025-03-27', 'Terreno', NULL),
(2, '92101347464', '2025-03-01', 'Terreno', NULL),
(3, '17110152147', '2025-03-25', 'Terreno', 15),
(3, '21548765325', '2025-03-26', 'Terreno', NULL),
(3, '84578256352', '2025-03-27', 'Terreno', NULL),
(3, '92101347464', '2025-03-04', 'Terreno', NULL),
(5, '17110152147', '2025-03-23', 'Terreno', 12),
(5, '92101347464', '2025-03-01', 'Terreno', NULL),
(5, '92101347464', '2025-03-27', 'Terreno', NULL);

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
(7, 11),
(7, 14),
(7, 16);

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
('92101347464', 2, 'Luis Mario', 'Mora Vila', '54-65-98-32'),
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
