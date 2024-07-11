-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2024 a las 23:01:18
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `credito_omega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas`
--

CREATE TABLE `actas` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hi` varchar(200) DEFAULT NULL,
  `hf` varchar(200) DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `lugar` varchar(200) DEFAULT NULL,
  `quien` int(11) DEFAULT NULL,
  `asistentes` text DEFAULT NULL,
  `temas` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas_items`
--

CREATE TABLE `actas_items` (
  `id` int(11) NOT NULL,
  `acta` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `actividad` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `archivo` varchar(200) DEFAULT NULL,
  `archivo2` varchar(200) DEFAULT NULL,
  `archivo3` varchar(200) DEFAULT NULL COMMENT 'archivo estados',
  `archivo_inactivos` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad`
--

CREATE TABLE `asegurabilidad` (
  `id` int(11) NOT NULL,
  `solicitud` varchar(11) DEFAULT NULL,
  `paso` varchar(11) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `nombres2` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `fn_dia` varchar(11) DEFAULT NULL,
  `fn_mes` varchar(11) DEFAULT NULL,
  `fn_anio` varchar(11) DEFAULT NULL,
  `telefono_oficina` varchar(50) DEFAULT NULL,
  `correo_personal` varchar(50) DEFAULT NULL,
  `direccion_residencia` varchar(50) DEFAULT NULL,
  `ciudad_residencia` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `estatura` varchar(20) DEFAULT NULL,
  `gestor` varchar(200) DEFAULT NULL,
  `prima` varchar(10) DEFAULT NULL,
  `prima_valor` varchar(20) DEFAULT NULL,
  `otra_cual` varchar(100) DEFAULT NULL,
  `tiene` varchar(2) DEFAULT NULL,
  `drogas` varchar(1) DEFAULT NULL,
  `alcoholismo` varchar(1) DEFAULT NULL,
  `drogadiccion` varchar(1) DEFAULT NULL,
  `hospitalizado` varchar(2) DEFAULT NULL,
  `antecedentes` varchar(10) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `allianz_deporte` varchar(11) DEFAULT NULL,
  `allianz_deportes` mediumtext DEFAULT NULL,
  `allianz_deporte_cual` varchar(50) DEFAULT NULL,
  `allianz_estado` varchar(11) DEFAULT NULL,
  `allianz_enfermedades` mediumtext DEFAULT NULL,
  `allianz_alcohol` varchar(11) DEFAULT NULL,
  `allianz_tabaco` varchar(11) DEFAULT NULL,
  `allianz_cirugia` varchar(11) DEFAULT NULL,
  `allianz_otra_enfermedad` varchar(11) DEFAULT NULL,
  `allianz_perdida` varchar(11) DEFAULT NULL,
  `allianz_perdida_cual` varchar(50) DEFAULT NULL,
  `allianz_enf_nombre1` varchar(50) DEFAULT NULL,
  `allianz_enf_nombre2` varchar(50) DEFAULT NULL,
  `allianz_enf_anio1` varchar(11) DEFAULT NULL,
  `allianz_enf_anio2` varchar(11) DEFAULT NULL,
  `allianz_enf_tratamiento1` text DEFAULT NULL,
  `allianz_enf_tratamiento2` mediumtext DEFAULT NULL,
  `allianz_covid` varchar(11) DEFAULT NULL,
  `allianz_covid_hospitalizacion` varchar(11) DEFAULT NULL,
  `allianz_covid_vacuna` varchar(11) DEFAULT NULL,
  `allianz_covid_vacuna_numero` varchar(11) DEFAULT NULL,
  `allianz_covid_vacuna_cuales` varchar(200) DEFAULT NULL,
  `covid19` varchar(2) DEFAULT NULL,
  `covid19_30` varchar(2) DEFAULT NULL,
  `covid19_tratamiento` varchar(2) DEFAULT NULL,
  `covid19_vacunado` varchar(2) DEFAULT NULL,
  `cobertura` varchar(50) DEFAULT NULL,
  `consecutivo` varchar(20) DEFAULT NULL,
  `aseguradora` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad_antecedentes`
--

CREATE TABLE `asegurabilidad_antecedentes` (
  `id` int(11) NOT NULL,
  `formulario` int(11) DEFAULT NULL,
  `i` int(11) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `parentesco` varchar(50) DEFAULT NULL,
  `enfermedad` varchar(200) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad_beneficiarios`
--

CREATE TABLE `asegurabilidad_beneficiarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `documento_tipo` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `nombre1` varchar(50) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `parentesco` varchar(50) DEFAULT NULL,
  `porcentaje` float(11,2) DEFAULT NULL,
  `i` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad_enfermedades`
--

CREATE TABLE `asegurabilidad_enfermedades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad_enfermedades_items`
--

CREATE TABLE `asegurabilidad_enfermedades_items` (
  `id` int(11) NOT NULL,
  `enfermedad` int(11) DEFAULT NULL,
  `formulario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asegurabilidad_medicos`
--

CREATE TABLE `asegurabilidad_medicos` (
  `id` int(11) NOT NULL,
  `formulario` int(11) DEFAULT NULL,
  `i` int(11) DEFAULT NULL,
  `medico` varchar(50) DEFAULT NULL,
  `institucion` varchar(50) DEFAULT NULL,
  `eps` varchar(50) DEFAULT NULL,
  `enfermedad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `id` int(11) NOT NULL,
  `boleta` int(11) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `cedula_asociado` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cuotas` int(11) DEFAULT NULL,
  `valor` varchar(11) DEFAULT NULL,
  `valor_cuota` varchar(11) DEFAULT NULL,
  `fm` varchar(1) DEFAULT NULL,
  `valor_fm` varchar(20) DEFAULT NULL,
  `validacion` varchar(1) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedulas`
--

CREATE TABLE `cedulas` (
  `cedula` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(200) DEFAULT NULL,
  `cupo` varchar(20) DEFAULT NULL,
  `aportes` varchar(20) DEFAULT NULL,
  `codigo_nomina` varchar(50) DEFAULT NULL,
  `nombre_nomina` varchar(100) DEFAULT NULL,
  `fecha_afiliacion` varchar(20) DEFAULT NULL,
  `activo` varchar(1) DEFAULT '1',
  `asegurable` varchar(1) DEFAULT '1',
  `correo` varchar(100) DEFAULT NULL,
  `fecha_ingreso` varchar(20) DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedula_deceval`
--

CREATE TABLE `cedula_deceval` (
  `id` int(11) NOT NULL,
  `cedula` bigint(20) DEFAULT NULL,
  `tipo` varchar(11) DEFAULT NULL,
  `usuario_deceval` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `codigo` bigint(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `departamento` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pais` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ciudad_id` varchar(11) DEFAULT NULL,
  `departamento_id` varchar(11) DEFAULT NULL,
  `pais_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `codigo`, `nombre`, `departamento`, `pais`, `ciudad_id`, `departamento_id`, `pais_id`) VALUES
(1, 5001, 'MEDELLÍN', 'Antioquia', 'COL', '3', '3', '14'),
(2, 5002, 'ABEJORRAL', 'Antioquia', 'COL', NULL, '3', '14'),
(3, 5004, 'ABRIAQUÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(4, 5021, 'ALEJANDRÍA', 'Antioquia', 'COL', NULL, '3', '14'),
(5, 5030, 'AMAGÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(6, 5031, 'AMALFI', 'Antioquia', 'COL', NULL, '3', '14'),
(7, 5034, 'ANDES', 'Antioquia', 'COL', NULL, '3', '14'),
(8, 5036, 'ANGELÓPOLIS', 'Antioquia', 'COL', NULL, '3', '14'),
(9, 5038, 'ANGOSTURA', 'Antioquia', 'COL', NULL, '3', '14'),
(10, 5040, 'ANORÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(11, 5042, 'SANTAFÉ DE ANTIOQUIA', 'Antioquia', 'COL', NULL, '3', '14'),
(12, 5044, 'ANZA', 'Antioquia', 'COL', NULL, '3', '14'),
(13, 5045, 'APARTADÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(14, 5051, 'ARBOLETES', 'Antioquia', 'COL', NULL, '3', '14'),
(15, 5055, 'ARGELIA', 'Antioquia', 'COL', NULL, '3', '14'),
(16, 5059, 'ARMENIA', 'Antioquia', 'COL', NULL, '3', '14'),
(17, 5079, 'BARBOSA', 'Antioquia', 'COL', NULL, '3', '14'),
(18, 5086, 'BELMIRA', 'Antioquia', 'COL', NULL, '3', '14'),
(19, 5088, 'BELLO', 'Antioquia', 'COL', NULL, '3', '14'),
(20, 5091, 'BETANIA', 'Antioquia', 'COL', NULL, '3', '14'),
(21, 5093, 'BETULIA', 'Antioquia', 'COL', NULL, '3', '14'),
(22, 5101, 'CIUDAD BOLÍVAR', 'Antioquia', 'COL', NULL, '3', '14'),
(23, 5107, 'BRICEÑO', 'Antioquia', 'COL', NULL, '3', '14'),
(24, 5113, 'BURITICÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(25, 5120, 'CÁCERES', 'Antioquia', 'COL', NULL, '3', '14'),
(26, 5125, 'CAICEDO', 'Antioquia', 'COL', NULL, '3', '14'),
(27, 5129, 'CALDAS', 'Antioquia', 'COL', NULL, '3', '14'),
(28, 5134, 'CAMPAMENTO', 'Antioquia', 'COL', NULL, '3', '14'),
(29, 5138, 'CAÑASGORDAS', 'Antioquia', 'COL', NULL, '3', '14'),
(30, 5142, 'CARACOLÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(31, 5145, 'CARAMANTA', 'Antioquia', 'COL', NULL, '3', '14'),
(32, 5147, 'CAREPA', 'Antioquia', 'COL', NULL, '3', '14'),
(33, 5148, 'EL CARMEN DE VIBORAL', 'Antioquia', 'COL', '35', '3', '14'),
(34, 5150, 'CAROLINA', 'Antioquia', 'COL', NULL, '3', '14'),
(35, 5154, 'CAUCASIA', 'Antioquia', 'COL', NULL, '3', '14'),
(36, 5172, 'CHIGORODÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(37, 5190, 'CISNEROS', 'Antioquia', 'COL', NULL, '3', '14'),
(38, 5197, 'COCORNÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(39, 5206, 'CONCEPCIÓN', 'Antioquia', 'COL', NULL, '3', '14'),
(40, 5209, 'CONCORDIA', 'Antioquia', 'COL', NULL, '3', '14'),
(41, 5212, 'COPACABANA', 'Antioquia', 'COL', NULL, '3', '14'),
(42, 5234, 'DABEIBA', 'Antioquia', 'COL', NULL, '3', '14'),
(43, 5237, 'DON MATÍAS', 'Antioquia', 'COL', NULL, '3', '14'),
(44, 5240, 'EBÉJICO', 'Antioquia', 'COL', NULL, '3', '14'),
(45, 5250, 'EL BAGRE', 'Antioquia', 'COL', NULL, '3', '14'),
(46, 5264, 'ENTRERRIOS', 'Antioquia', 'COL', NULL, '3', '14'),
(47, 5266, 'ENVIGADO', 'Antioquia', 'COL', NULL, '3', '14'),
(48, 5282, 'FREDONIA', 'Antioquia', 'COL', NULL, '3', '14'),
(49, 5284, 'FRONTINO', 'Antioquia', 'COL', NULL, '3', '14'),
(50, 5306, 'GIRALDO', 'Antioquia', 'COL', NULL, '3', '14'),
(51, 5308, 'GIRARDOTA', 'Antioquia', 'COL', NULL, '3', '14'),
(52, 5310, 'GÓMEZ PLATA', 'Antioquia', 'COL', NULL, '3', '14'),
(53, 5313, 'GRANADA', 'Antioquia', 'COL', NULL, '3', '14'),
(54, 5315, 'GUADALUPE', 'Antioquia', 'COL', NULL, '3', '14'),
(55, 5318, 'GUARNE', 'Antioquia', 'COL', NULL, '3', '14'),
(56, 5321, 'GUATAPE', 'Antioquia', 'COL', NULL, '3', '14'),
(57, 5347, 'HELICONIA', 'Antioquia', 'COL', NULL, '3', '14'),
(58, 5353, 'HISPANIA', 'Antioquia', 'COL', NULL, '3', '14'),
(59, 5360, 'ITAGUI', 'Antioquia', 'COL', NULL, '3', '14'),
(60, 5361, 'ITUANGO', 'Antioquia', 'COL', NULL, '3', '14'),
(61, 5364, 'JARDÍN', 'Antioquia', 'COL', NULL, '3', '14'),
(62, 5368, 'JERICÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(63, 5376, 'LA CEJA', 'Antioquia', 'COL', NULL, '3', '14'),
(64, 5380, 'LA ESTRELLA', 'Antioquia', 'COL', NULL, '3', '14'),
(65, 5390, 'LA PINTADA', 'Antioquia', 'COL', NULL, '3', '14'),
(66, 5400, 'LA UNIÓN', 'Antioquia', 'COL', NULL, '3', '14'),
(67, 5411, 'LIBORINA', 'Antioquia', 'COL', NULL, '3', '14'),
(68, 5425, 'MACEO', 'Antioquia', 'COL', NULL, '3', '14'),
(69, 5440, 'MARINILLA', 'Antioquia', 'COL', NULL, '3', '14'),
(70, 5467, 'MONTEBELLO', 'Antioquia', 'COL', NULL, '3', '14'),
(71, 5475, 'MURINDÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(72, 5480, 'MUTATÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(73, 5483, 'NARIÑO', 'Antioquia', 'COL', NULL, '3', '14'),
(74, 5490, 'NECOCLÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(75, 5495, 'NECHÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(76, 5501, 'OLAYA', 'Antioquia', 'COL', NULL, '3', '14'),
(77, 5541, 'PEÑOL', 'Antioquia', 'COL', NULL, '3', '14'),
(78, 5543, 'PEQUE', 'Antioquia', 'COL', NULL, '3', '14'),
(79, 5576, 'PUEBLORRICO', 'Antioquia', 'COL', NULL, '3', '14'),
(80, 5579, 'PUERTO BERRÍO', 'Antioquia', 'COL', NULL, '3', '14'),
(81, 5585, 'PUERTO NARE', 'Antioquia', 'COL', NULL, '3', '14'),
(82, 5591, 'PUERTO TRIUNFO', 'Antioquia', 'COL', NULL, '3', '14'),
(83, 5604, 'REMEDIOS', 'Antioquia', 'COL', NULL, '3', '14'),
(84, 5607, 'RETIRO', 'Antioquia', 'COL', NULL, '3', '14'),
(85, 5615, 'RIONEGRO', 'Antioquia', 'COL', NULL, '3', '14'),
(86, 5628, 'SABANALARGA', 'Antioquia', 'COL', NULL, '3', '14'),
(87, 5631, 'SABANETA', 'Antioquia', 'COL', NULL, '3', '14'),
(88, 5642, 'SALGAR', 'Antioquia', 'COL', NULL, '3', '14'),
(89, 5647, 'SAN ANDRÉS', 'Antioquia', 'COL', NULL, '3', '14'),
(90, 5649, 'SAN CARLOS', 'Antioquia', 'COL', NULL, '3', '14'),
(91, 5652, 'SAN FRANCISCO', 'Antioquia', 'COL', NULL, '3', '14'),
(92, 5656, 'SAN JERÓNIMO', 'Antioquia', 'COL', NULL, '3', '14'),
(93, 5658, 'SAN JOSÉ DE LA MONTAÑA', 'Antioquia', 'COL', NULL, '3', '14'),
(94, 5659, 'SAN JUAN DE URABÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(95, 5660, 'SAN LUIS', 'Antioquia', 'COL', '96', '3', '14'),
(96, 5664, 'SAN PEDRO', 'Antioquia', 'COL', NULL, '3', '14'),
(97, 5665, 'SAN PEDRO DE URABA', 'Antioquia', 'COL', NULL, '3', '14'),
(98, 5667, 'SAN RAFAEL', 'Antioquia', 'COL', NULL, '3', '14'),
(99, 5670, 'SAN ROQUE', 'Antioquia', 'COL', NULL, '3', '14'),
(100, 5674, 'SAN VICENTE', 'Antioquia', 'COL', NULL, '3', '14'),
(101, 5679, 'SANTA BÁRBARA', 'Antioquia', 'COL', NULL, '3', '14'),
(102, 5686, 'SANTA ROSA DE OSOS', 'Antioquia', 'COL', NULL, '3', '14'),
(103, 5690, 'SANTO DOMINGO', 'Antioquia', 'COL', NULL, '3', '14'),
(104, 5697, 'EL SANTUARIO', 'Antioquia', 'COL', NULL, '3', '14'),
(105, 5736, 'SEGOVIA', 'Antioquia', 'COL', NULL, '3', '14'),
(106, 5756, 'SONSON', 'Antioquia', 'COL', NULL, '3', '14'),
(107, 5761, 'SOPETRÁN', 'Antioquia', 'COL', NULL, '3', '14'),
(108, 5789, 'TÁMESIS', 'Antioquia', 'COL', NULL, '3', '14'),
(109, 5790, 'TARAZÁ', 'Antioquia', 'COL', NULL, '3', '14'),
(110, 5792, 'TARSO', 'Antioquia', 'COL', NULL, '3', '14'),
(111, 5809, 'TITIRIBÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(112, 5819, 'TOLEDO', 'Antioquia', 'COL', NULL, '3', '14'),
(113, 5837, 'TURBO', 'Antioquia', 'COL', NULL, '3', '14'),
(114, 5842, 'URAMITA', 'Antioquia', 'COL', NULL, '3', '14'),
(115, 5847, 'URRAO', 'Antioquia', 'COL', NULL, '3', '14'),
(116, 5854, 'VALDIVIA', 'Antioquia', 'COL', NULL, '3', '14'),
(117, 5856, 'VALPARAÍSO', 'Antioquia', 'COL', NULL, '3', '14'),
(118, 5858, 'VEGACHÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(119, 5861, 'VENECIA', 'Antioquia', 'COL', NULL, '3', '14'),
(120, 5873, 'VIGÍA DEL FUERTE', 'Antioquia', 'COL', NULL, '3', '14'),
(121, 5885, 'YALÍ', 'Antioquia', 'COL', NULL, '3', '14'),
(122, 5887, 'YARUMAL', 'Antioquia', 'COL', NULL, '3', '14'),
(123, 5890, 'YOLOMBÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(124, 5893, 'YONDÓ', 'Antioquia', 'COL', NULL, '3', '14'),
(125, 5895, 'ZARAGOZA', 'Antioquia', 'COL', NULL, '3', '14'),
(126, 8001, 'BARRANQUILLA', 'Atlántico', 'COL', NULL, NULL, '14'),
(127, 8078, 'BARANOA', 'Atlántico', 'COL', NULL, NULL, '14'),
(128, 8137, 'CAMPO DE LA CRUZ', 'Atlántico', 'COL', NULL, NULL, '14'),
(129, 8141, 'CANDELARIA', 'Atlántico', 'COL', NULL, NULL, '14'),
(130, 8296, 'GALAPA', 'Atlántico', 'COL', NULL, NULL, '14'),
(131, 8372, 'JUAN DE ACOSTA', 'Atlántico', 'COL', NULL, NULL, '14'),
(132, 8421, 'LURUACO', 'Atlántico', 'COL', NULL, NULL, '14'),
(133, 8433, 'MALAMBO', 'Atlántico', 'COL', NULL, NULL, '14'),
(134, 8436, 'MANATÍ', 'Atlántico', 'COL', NULL, NULL, '14'),
(135, 8520, 'PALMAR DE VARELA', 'Atlántico', 'COL', NULL, NULL, '14'),
(136, 8549, 'PIOJÓ', 'Atlántico', 'COL', NULL, NULL, '14'),
(137, 8558, 'POLONUEVO', 'Atlántico', 'COL', NULL, NULL, '14'),
(138, 8560, 'PONEDERA', 'Atlántico', 'COL', NULL, NULL, '14'),
(139, 8573, 'PUERTO COLOMBIA', 'Atlántico', 'COL', NULL, NULL, '14'),
(140, 8606, 'REPELÓN', 'Atlántico', 'COL', NULL, NULL, '14'),
(141, 8634, 'SABANAGRANDE', 'Atlántico', 'COL', NULL, NULL, '14'),
(142, 8638, 'SABANALARGA', 'Atlántico', 'COL', NULL, NULL, '14'),
(143, 8675, 'SANTA LUCÍA', 'Atlántico', 'COL', NULL, NULL, '14'),
(144, 8685, 'SANTO TOMÁS', 'Atlántico', 'COL', NULL, NULL, '14'),
(145, 8758, 'SOLEDAD', 'Atlántico', 'COL', NULL, NULL, '14'),
(146, 8770, 'SUAN', 'Atlántico', 'COL', NULL, NULL, '14'),
(147, 8832, 'TUBARÁ', 'Atlántico', 'COL', NULL, NULL, '14'),
(148, 8849, 'USIACURÍ', 'Atlántico', 'COL', NULL, NULL, '14'),
(149, 11001, 'BOGOTÁ', 'Bogotá D.C', 'COL', '150', '5', '14'),
(150, 13001, 'CARTAGENA', 'Bolívar', 'COL', '151', '6', '14'),
(151, 13006, 'ACHÍ', 'Bolívar', 'COL', NULL, '6', '14'),
(152, 13030, 'ALTOS DEL ROSARIO', 'Bolívar', 'COL', NULL, '6', '14'),
(153, 13042, 'ARENAL', 'Bolívar', 'COL', NULL, '6', '14'),
(154, 13052, 'ARJONA', 'Bolívar', 'COL', NULL, '6', '14'),
(155, 13062, 'ARROYOHONDO', 'Bolívar', 'COL', NULL, '6', '14'),
(156, 13074, 'BARRANCO DE LOBA', 'Bolívar', 'COL', NULL, '6', '14'),
(157, 13140, 'CALAMAR', 'Bolívar', 'COL', NULL, '6', '14'),
(158, 13160, 'CANTAGALLO', 'Bolívar', 'COL', NULL, '6', '14'),
(159, 13188, 'CICUCO', 'Bolívar', 'COL', NULL, '6', '14'),
(160, 13212, 'CÓRDOBA', 'Bolívar', 'COL', NULL, '6', '14'),
(161, 13222, 'CLEMENCIA', 'Bolívar', 'COL', NULL, '6', '14'),
(162, 13244, 'EL CARMEN DE BOLÍVAR', 'Bolívar', 'COL', NULL, '6', '14'),
(163, 13248, 'EL GUAMO', 'Bolívar', 'COL', NULL, '6', '14'),
(164, 13268, 'EL PEÑÓN', 'Bolívar', 'COL', NULL, '6', '14'),
(165, 13300, 'HATILLO DE LOBA', 'Bolívar', 'COL', NULL, '6', '14'),
(166, 13430, 'MAGANGUÉ', 'Bolívar', 'COL', NULL, '6', '14'),
(167, 13433, 'MAHATES', 'Bolívar', 'COL', NULL, '6', '14'),
(168, 13440, 'MARGARITA', 'Bolívar', 'COL', NULL, '6', '14'),
(169, 13442, 'MARÍA LA BAJA', 'Bolívar', 'COL', NULL, '6', '14'),
(170, 13458, 'MONTECRISTO', 'Bolívar', 'COL', NULL, '6', '14'),
(171, 13468, 'MOMPÓS', 'Bolívar', 'COL', NULL, '6', '14'),
(172, 13473, 'MORALES', 'Bolívar', 'COL', NULL, '6', '14'),
(173, 13549, 'PINILLOS', 'Bolívar', 'COL', NULL, '6', '14'),
(174, 13580, 'REGIDOR', 'Bolívar', 'COL', NULL, '6', '14'),
(175, 13600, 'RÍO VIEJO', 'Bolívar', 'COL', NULL, '6', '14'),
(176, 13620, 'SAN CRISTÓBAL', 'Bolívar', 'COL', NULL, '6', '14'),
(177, 13647, 'SAN ESTANISLAO', 'Bolívar', 'COL', NULL, '6', '14'),
(178, 13650, 'SAN FERNANDO', 'Bolívar', 'COL', NULL, '6', '14'),
(179, 13654, 'SAN JACINTO', 'Bolívar', 'COL', NULL, '6', '14'),
(180, 13655, 'SAN JACINTO DEL CAUCA', 'Bolívar', 'COL', NULL, '6', '14'),
(181, 13657, 'SAN JUAN NEPOMUCENO', 'Bolívar', 'COL', NULL, '6', '14'),
(182, 13667, 'SAN MARTÍN DE LOBA', 'Bolívar', 'COL', NULL, '6', '14'),
(183, 13670, 'SAN PABLO', 'Bolívar', 'COL', NULL, '6', '14'),
(184, 13673, 'SANTA CATALINA', 'Bolívar', 'COL', NULL, '6', '14'),
(185, 13683, 'SANTA ROSA', 'Bolívar', 'COL', NULL, '6', '14'),
(186, 13688, 'SANTA ROSA DEL SUR', 'Bolívar', 'COL', NULL, '6', '14'),
(187, 13744, 'SIMITÍ', 'Bolívar', 'COL', NULL, '6', '14'),
(188, 13760, 'SOPLAVIENTO', 'Bolívar', 'COL', NULL, '6', '14'),
(189, 13780, 'TALAIGUA NUEVO', 'Bolívar', 'COL', NULL, '6', '14'),
(190, 13810, 'TIQUISIO', 'Bolívar', 'COL', NULL, '6', '14'),
(191, 13836, 'TURBACO', 'Bolívar', 'COL', NULL, '6', '14'),
(192, 13838, 'TURBANÁ', 'Bolívar', 'COL', NULL, '6', '14'),
(193, 13873, 'VILLANUEVA', 'Bolívar', 'COL', NULL, '6', '14'),
(194, 13894, 'ZAMBRANO', 'Bolívar', 'COL', NULL, '6', '14'),
(195, 15001, 'TUNJA', 'Boyacá', 'COL', NULL, NULL, '14'),
(196, 15022, 'ALMEIDA', 'Boyacá', 'COL', NULL, NULL, '14'),
(197, 15047, 'AQUITANIA', 'Boyacá', 'COL', NULL, NULL, '14'),
(198, 15051, 'ARCABUCO', 'Boyacá', 'COL', NULL, NULL, '14'),
(199, 15087, 'BELÉN', 'Boyacá', 'COL', NULL, NULL, '14'),
(200, 15090, 'BERBEO', 'Boyacá', 'COL', NULL, NULL, '14'),
(201, 15092, 'BETÉITIVA', 'Boyacá', 'COL', NULL, NULL, '14'),
(202, 15097, 'BOAVITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(203, 15104, 'BOYACÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(204, 15106, 'BRICEÑO', 'Boyacá', 'COL', NULL, NULL, '14'),
(205, 15109, 'BUENAVISTA', 'Boyacá', 'COL', NULL, NULL, '14'),
(206, 15114, 'BUSBANZÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(207, 15131, 'CALDAS', 'Boyacá', 'COL', NULL, NULL, '14'),
(208, 15135, 'CAMPOHERMOSO', 'Boyacá', 'COL', NULL, NULL, '14'),
(209, 15162, 'CERINZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(210, 15172, 'CHINAVITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(211, 15176, 'CHIQUINQUIRÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(212, 15180, 'CHISCAS', 'Boyacá', 'COL', NULL, NULL, '14'),
(213, 15183, 'CHITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(214, 15185, 'CHITARAQUE', 'Boyacá', 'COL', NULL, NULL, '14'),
(215, 15187, 'CHIVATÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(216, 15189, 'CIÉNEGA', 'Boyacá', 'COL', NULL, NULL, '14'),
(217, 15204, 'CÓMBITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(218, 15212, 'COPER', 'Boyacá', 'COL', NULL, NULL, '14'),
(219, 15215, 'CORRALES', 'Boyacá', 'COL', NULL, NULL, '14'),
(220, 15218, 'COVARACHÍA', 'Boyacá', 'COL', NULL, NULL, '14'),
(221, 15223, 'CUBARÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(222, 15224, 'CUCAITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(223, 15226, 'CUÍTIVA', 'Boyacá', 'COL', NULL, NULL, '14'),
(224, 15232, 'CHÍQUIZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(225, 15236, 'CHIVOR', 'Boyacá', 'COL', NULL, NULL, '14'),
(226, 15238, 'DUITAMA', 'Boyacá', 'COL', NULL, NULL, '14'),
(227, 15244, 'EL COCUY', 'Boyacá', 'COL', NULL, NULL, '14'),
(228, 15248, 'EL ESPINO', 'Boyacá', 'COL', NULL, NULL, '14'),
(229, 15272, 'FIRAVITOBA', 'Boyacá', 'COL', NULL, NULL, '14'),
(230, 15276, 'FLORESTA', 'Boyacá', 'COL', NULL, NULL, '14'),
(231, 15293, 'GACHANTIVÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(232, 15296, 'GAMEZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(233, 15299, 'GARAGOA', 'Boyacá', 'COL', NULL, NULL, '14'),
(234, 15317, 'GUACAMAYAS', 'Boyacá', 'COL', NULL, NULL, '14'),
(235, 15322, 'GUATEQUE', 'Boyacá', 'COL', NULL, NULL, '14'),
(236, 15325, 'GUAYATÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(237, 15332, 'GÜICÁN', 'Boyacá', 'COL', NULL, NULL, '14'),
(238, 15362, 'IZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(239, 15367, 'JENESANO', 'Boyacá', 'COL', NULL, NULL, '14'),
(240, 15368, 'JERICÓ', 'Boyacá', 'COL', NULL, NULL, '14'),
(241, 15377, 'LABRANZAGRANDE', 'Boyacá', 'COL', NULL, NULL, '14'),
(242, 15380, 'LA CAPILLA', 'Boyacá', 'COL', NULL, NULL, '14'),
(243, 15401, 'LA VICTORIA', 'Boyacá', 'COL', NULL, NULL, '14'),
(244, 15403, 'LA UVITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(245, 15407, 'VILLA DE LEYVA', 'Boyacá', 'COL', NULL, NULL, '14'),
(246, 15425, 'MACANAL', 'Boyacá', 'COL', NULL, NULL, '14'),
(247, 15442, 'MARIPÍ', 'Boyacá', 'COL', NULL, NULL, '14'),
(248, 15455, 'MIRAFLORES', 'Boyacá', 'COL', NULL, NULL, '14'),
(249, 15464, 'MONGUA', 'Boyacá', 'COL', NULL, NULL, '14'),
(250, 15466, 'MONGUÍ', 'Boyacá', 'COL', NULL, NULL, '14'),
(251, 15469, 'MONIQUIRÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(252, 15476, 'MOTAVITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(253, 15480, 'MUZO', 'Boyacá', 'COL', NULL, NULL, '14'),
(254, 15491, 'NOBSA', 'Boyacá', 'COL', NULL, NULL, '14'),
(255, 15494, 'NUEVO COLÓN', 'Boyacá', 'COL', NULL, NULL, '14'),
(256, 15500, 'OICATÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(257, 15507, 'OTANCHE', 'Boyacá', 'COL', NULL, NULL, '14'),
(258, 15511, 'PACHAVITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(259, 15514, 'PÁEZ', 'Boyacá', 'COL', NULL, NULL, '14'),
(260, 15516, 'PAIPA', 'Boyacá', 'COL', NULL, NULL, '14'),
(261, 15518, 'PAJARITO', 'Boyacá', 'COL', NULL, NULL, '14'),
(262, 15522, 'PANQUEBA', 'Boyacá', 'COL', NULL, NULL, '14'),
(263, 15531, 'PAUNA', 'Boyacá', 'COL', NULL, NULL, '14'),
(264, 15533, 'PAYA', 'Boyacá', 'COL', NULL, NULL, '14'),
(265, 15537, 'PAZ DE RÍO', 'Boyacá', 'COL', NULL, NULL, '14'),
(266, 15542, 'PESCA', 'Boyacá', 'COL', NULL, NULL, '14'),
(267, 15550, 'PISBA', 'Boyacá', 'COL', NULL, NULL, '14'),
(268, 15572, 'PUERTO BOYACÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(269, 15580, 'QUÍPAMA', 'Boyacá', 'COL', NULL, NULL, '14'),
(270, 15599, 'RAMIRIQUÍ', 'Boyacá', 'COL', NULL, NULL, '14'),
(271, 15600, 'RÁQUIRA', 'Boyacá', 'COL', NULL, NULL, '14'),
(272, 15621, 'RONDÓN', 'Boyacá', 'COL', NULL, NULL, '14'),
(273, 15632, 'SABOYÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(274, 15638, 'SÁCHICA', 'Boyacá', 'COL', NULL, NULL, '14'),
(275, 15646, 'SAMACÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(276, 15660, 'SAN EDUARDO', 'Boyacá', 'COL', NULL, NULL, '14'),
(277, 15664, 'SAN JOSÉ DE PARE', 'Boyacá', 'COL', NULL, NULL, '14'),
(278, 15667, 'SAN LUIS DE GACENO', 'Boyacá', 'COL', NULL, NULL, '14'),
(279, 15673, 'SAN MATEO', 'Boyacá', 'COL', NULL, NULL, '14'),
(280, 15676, 'SAN MIGUEL DE SEMA', 'Boyacá', 'COL', NULL, NULL, '14'),
(281, 15681, 'SAN PABLO DE BORBUR', 'Boyacá', 'COL', NULL, NULL, '14'),
(282, 15686, 'SANTANA', 'Boyacá', 'COL', NULL, NULL, '14'),
(283, 15690, 'SANTA MARÍA', 'Boyacá', 'COL', NULL, NULL, '14'),
(284, 15693, 'SANTA ROSA DE VITERBO', 'Boyacá', 'COL', NULL, NULL, '14'),
(285, 15696, 'SANTA SOFÍA', 'Boyacá', 'COL', NULL, NULL, '14'),
(286, 15720, 'SATIVANORTE', 'Boyacá', 'COL', NULL, NULL, '14'),
(287, 15723, 'SATIVASUR', 'Boyacá', 'COL', NULL, NULL, '14'),
(288, 15740, 'SIACHOQUE', 'Boyacá', 'COL', NULL, NULL, '14'),
(289, 15753, 'SOATÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(290, 15755, 'SOCOTÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(291, 15757, 'SOCHA', 'Boyacá', 'COL', NULL, NULL, '14'),
(292, 15759, 'SOGAMOSO', 'Boyacá', 'COL', NULL, NULL, '14'),
(293, 15761, 'SOMONDOCO', 'Boyacá', 'COL', NULL, NULL, '14'),
(294, 15762, 'SORA', 'Boyacá', 'COL', NULL, NULL, '14'),
(295, 15763, 'SOTAQUIRÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(296, 15764, 'SORACÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(297, 15774, 'SUSACÓN', 'Boyacá', 'COL', NULL, NULL, '14'),
(298, 15776, 'SUTAMARCHÁN', 'Boyacá', 'COL', NULL, NULL, '14'),
(299, 15778, 'SUTATENZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(300, 15790, 'TASCO', 'Boyacá', 'COL', NULL, NULL, '14'),
(301, 15798, 'TENZA', 'Boyacá', 'COL', NULL, NULL, '14'),
(302, 15804, 'TIBANÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(303, 15806, 'TIBASOSA', 'Boyacá', 'COL', NULL, NULL, '14'),
(304, 15808, 'TINJACÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(305, 15810, 'TIPACOQUE', 'Boyacá', 'COL', NULL, NULL, '14'),
(306, 15814, 'TOCA', 'Boyacá', 'COL', NULL, NULL, '14'),
(307, 15816, 'TOGÜÍ', 'Boyacá', 'COL', NULL, NULL, '14'),
(308, 15820, 'TÓPAGA', 'Boyacá', 'COL', NULL, NULL, '14'),
(309, 15822, 'TOTA', 'Boyacá', 'COL', NULL, NULL, '14'),
(310, 15832, 'TUNUNGUÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(311, 15835, 'TURMEQUÉ', 'Boyacá', 'COL', NULL, NULL, '14'),
(312, 15837, 'TUTA', 'Boyacá', 'COL', NULL, NULL, '14'),
(313, 15839, 'TUTAZÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(314, 15842, 'UMBITA', 'Boyacá', 'COL', NULL, NULL, '14'),
(315, 15861, 'VENTAQUEMADA', 'Boyacá', 'COL', NULL, NULL, '14'),
(316, 15879, 'VIRACACHÁ', 'Boyacá', 'COL', NULL, NULL, '14'),
(317, 15897, 'ZETAQUIRA', 'Boyacá', 'COL', NULL, NULL, '14'),
(318, 17001, 'MANIZALES', 'Caldas', 'COL', NULL, NULL, '14'),
(319, 17013, 'AGUADAS', 'Caldas', 'COL', NULL, NULL, '14'),
(320, 17042, 'ANSERMA', 'Caldas', 'COL', NULL, NULL, '14'),
(321, 17050, 'ARANZAZU', 'Caldas', 'COL', NULL, NULL, '14'),
(322, 17088, 'BELALCÁZAR', 'Caldas', 'COL', NULL, NULL, '14'),
(323, 17174, 'CHINCHINÁ', 'Caldas', 'COL', NULL, NULL, '14'),
(324, 17272, 'FILADELFIA', 'Caldas', 'COL', NULL, NULL, '14'),
(325, 17380, 'LA DORADA', 'Caldas', 'COL', NULL, NULL, '14'),
(326, 17388, 'LA MERCED', 'Caldas', 'COL', NULL, NULL, '14'),
(327, 17433, 'MANZANARES', 'Caldas', 'COL', NULL, NULL, '14'),
(328, 17442, 'MARMATO', 'Caldas', 'COL', NULL, NULL, '14'),
(329, 17444, 'MARQUETALIA', 'Caldas', 'COL', NULL, NULL, '14'),
(330, 17446, 'MARULANDA', 'Caldas', 'COL', NULL, NULL, '14'),
(331, 17486, 'NEIRA', 'Caldas', 'COL', NULL, NULL, '14'),
(332, 17495, 'NORCASIA', 'Caldas', 'COL', NULL, NULL, '14'),
(333, 17513, 'PÁCORA', 'Caldas', 'COL', NULL, NULL, '14'),
(334, 17524, 'PALESTINA', 'Caldas', 'COL', NULL, NULL, '14'),
(335, 17541, 'PENSILVANIA', 'Caldas', 'COL', NULL, NULL, '14'),
(336, 17614, 'RIOSUCIO', 'Caldas', 'COL', NULL, NULL, '14'),
(337, 17616, 'RISARALDA', 'Caldas', 'COL', NULL, NULL, '14'),
(338, 17653, 'SALAMINA', 'Caldas', 'COL', NULL, NULL, '14'),
(339, 17662, 'SAMANÁ', 'Caldas', 'COL', NULL, NULL, '14'),
(340, 17665, 'SAN JOSÉ', 'Caldas', 'COL', NULL, NULL, '14'),
(341, 17777, 'SUPÍA', 'Caldas', 'COL', NULL, NULL, '14'),
(342, 17867, 'VICTORIA', 'Caldas', 'COL', NULL, NULL, '14'),
(343, 17873, 'VILLAMARÍA', 'Caldas', 'COL', NULL, NULL, '14'),
(344, 17877, 'VITERBO', 'Caldas', 'COL', NULL, NULL, '14'),
(345, 18001, 'FLORENCIA', 'Caquetá', 'COL', NULL, NULL, '14'),
(346, 18029, 'ALBANIA', 'Caquetá', 'COL', NULL, NULL, '14'),
(347, 18094, 'BELÉN DE LOS ANDAQUIES', 'Caquetá', 'COL', NULL, NULL, '14'),
(348, 18150, 'CARTAGENA DEL CHAIRÁ', 'Caquetá', 'COL', NULL, NULL, '14'),
(349, 18205, 'CURILLO', 'Caquetá', 'COL', NULL, NULL, '14'),
(350, 18247, 'EL DONCELLO', 'Caquetá', 'COL', NULL, NULL, '14'),
(351, 18256, 'EL PAUJIL', 'Caquetá', 'COL', NULL, NULL, '14'),
(352, 18410, 'LA MONTAÑITA', 'Caquetá', 'COL', NULL, NULL, '14'),
(353, 18460, 'MILÁN', 'Caquetá', 'COL', NULL, NULL, '14'),
(354, 18479, 'MORELIA', 'Caquetá', 'COL', NULL, NULL, '14'),
(355, 18592, 'PUERTO RICO', 'Caquetá', 'COL', NULL, NULL, '14'),
(356, 18610, 'SAN JOSÉ DEL FRAGUA', 'Caquetá', 'COL', NULL, NULL, '14'),
(357, 18753, 'SAN VICENTE DEL CAGUÁN', 'Caquetá', 'COL', NULL, NULL, '14'),
(358, 18756, 'SOLANO', 'Caquetá', 'COL', NULL, NULL, '14'),
(359, 18785, 'SOLITA', 'Caquetá', 'COL', NULL, NULL, '14'),
(360, 18860, 'VALPARAÍSO', 'Caquetá', 'COL', NULL, NULL, '14'),
(361, 19001, 'POPAYÁN', 'Cauca', 'COL', NULL, NULL, '14'),
(362, 19022, 'ALMAGUER', 'Cauca', 'COL', NULL, NULL, '14'),
(363, 19050, 'ARGELIA', 'Cauca', 'COL', NULL, NULL, '14'),
(364, 19075, 'BALBOA', 'Cauca', 'COL', NULL, NULL, '14'),
(365, 19100, 'BOLÍVAR', 'Cauca', 'COL', NULL, NULL, '14'),
(366, 19110, 'BUENOS AIRES', 'Cauca', 'COL', NULL, NULL, '14'),
(367, 19130, 'CAJIBÍO', 'Cauca', 'COL', NULL, NULL, '14'),
(368, 19137, 'CALDONO', 'Cauca', 'COL', NULL, NULL, '14'),
(369, 19142, 'CALOTO', 'Cauca', 'COL', NULL, NULL, '14'),
(370, 19212, 'CORINTO', 'Cauca', 'COL', NULL, NULL, '14'),
(371, 19256, 'EL TAMBO', 'Cauca', 'COL', NULL, NULL, '14'),
(372, 19290, 'FLORENCIA', 'Cauca', 'COL', NULL, NULL, '14'),
(373, 19318, 'GUAPI', 'Cauca', 'COL', NULL, NULL, '14'),
(374, 19355, 'INZÁ', 'Cauca', 'COL', NULL, NULL, '14'),
(375, 19364, 'JAMBALÓ', 'Cauca', 'COL', NULL, NULL, '14'),
(376, 19392, 'LA SIERRA', 'Cauca', 'COL', NULL, NULL, '14'),
(377, 19397, 'LA VEGA', 'Cauca', 'COL', NULL, NULL, '14'),
(378, 19418, 'LÓPEZ', 'Cauca', 'COL', NULL, NULL, '14'),
(379, 19450, 'MERCADERES', 'Cauca', 'COL', NULL, NULL, '14'),
(380, 19455, 'MIRANDA', 'Cauca', 'COL', NULL, NULL, '14'),
(381, 19473, 'MORALES', 'Cauca', 'COL', NULL, NULL, '14'),
(382, 19513, 'PADILLA', 'Cauca', 'COL', NULL, NULL, '14'),
(383, 19517, 'PAEZ', 'Cauca', 'COL', NULL, NULL, '14'),
(384, 19532, 'PATÍA', 'Cauca', 'COL', NULL, NULL, '14'),
(385, 19533, 'PIAMONTE', 'Cauca', 'COL', NULL, NULL, '14'),
(386, 19548, 'PIENDAMÓ', 'Cauca', 'COL', NULL, NULL, '14'),
(387, 19573, 'PUERTO TEJADA', 'Cauca', 'COL', NULL, NULL, '14'),
(388, 19585, 'PURACÉ', 'Cauca', 'COL', NULL, NULL, '14'),
(389, 19622, 'ROSAS', 'Cauca', 'COL', NULL, NULL, '14'),
(390, 19693, 'SAN SEBASTIÁN', 'Cauca', 'COL', NULL, NULL, '14'),
(391, 19698, 'SANTANDER DE QUILICHAO', 'Cauca', 'COL', NULL, NULL, '14'),
(392, 19701, 'SANTA ROSA', 'Cauca', 'COL', NULL, NULL, '14'),
(393, 19743, 'SILVIA', 'Cauca', 'COL', NULL, NULL, '14'),
(394, 19760, 'SOTARA', 'Cauca', 'COL', NULL, NULL, '14'),
(395, 19780, 'SUÁREZ', 'Cauca', 'COL', NULL, NULL, '14'),
(396, 19785, 'SUCRE', 'Cauca', 'COL', NULL, NULL, '14'),
(397, 19807, 'TIMBÍO', 'Cauca', 'COL', NULL, NULL, '14'),
(398, 19809, 'TIMBIQUÍ', 'Cauca', 'COL', NULL, NULL, '14'),
(399, 19821, 'TORIBIO', 'Cauca', 'COL', NULL, NULL, '14'),
(400, 19824, 'TOTORÓ', 'Cauca', 'COL', NULL, NULL, '14'),
(401, 19845, 'VILLA RICA', 'Cauca', 'COL', NULL, NULL, '14'),
(402, 20001, 'VALLEDUPAR', 'Cesar', 'COL', NULL, NULL, '14'),
(403, 20011, 'AGUACHICA', 'Cesar', 'COL', NULL, NULL, '14'),
(404, 20013, 'AGUSTÍN CODAZZI', 'Cesar', 'COL', NULL, NULL, '14'),
(405, 20032, 'ASTREA', 'Cesar', 'COL', NULL, NULL, '14'),
(406, 20045, 'BECERRIL', 'Cesar', 'COL', NULL, NULL, '14'),
(407, 20060, 'BOSCONIA', 'Cesar', 'COL', NULL, NULL, '14'),
(408, 20175, 'CHIMICHAGUA', 'Cesar', 'COL', NULL, NULL, '14'),
(409, 20178, 'CHIRIGUANÁ', 'Cesar', 'COL', NULL, NULL, '14'),
(410, 20228, 'CURUMANÍ', 'Cesar', 'COL', NULL, NULL, '14'),
(411, 20238, 'EL COPEY', 'Cesar', 'COL', NULL, NULL, '14'),
(412, 20250, 'EL PASO', 'Cesar', 'COL', NULL, NULL, '14'),
(413, 20295, 'GAMARRA', 'Cesar', 'COL', NULL, NULL, '14'),
(414, 20310, 'GONZÁLEZ', 'Cesar', 'COL', NULL, NULL, '14'),
(415, 20383, 'LA GLORIA', 'Cesar', 'COL', NULL, NULL, '14'),
(416, 20400, 'LA JAGUA DE IBIRICO', 'Cesar', 'COL', NULL, NULL, '14'),
(417, 20443, 'MANAURE', 'Cesar', 'COL', NULL, NULL, '14'),
(418, 20517, 'PAILITAS', 'Cesar', 'COL', NULL, NULL, '14'),
(419, 20550, 'PELAYA', 'Cesar', 'COL', NULL, NULL, '14'),
(420, 20570, 'PUEBLO BELLO', 'Cesar', 'COL', NULL, NULL, '14'),
(421, 20614, 'RÍO DE ORO', 'Cesar', 'COL', NULL, NULL, '14'),
(422, 20621, 'LA PAZ', 'Cesar', 'COL', NULL, NULL, '14'),
(423, 20710, 'SAN ALBERTO', 'Cesar', 'COL', NULL, NULL, '14'),
(424, 20750, 'SAN DIEGO', 'Cesar', 'COL', NULL, NULL, '14'),
(425, 20770, 'SAN MARTÍN', 'Cesar', 'COL', NULL, NULL, '14'),
(426, 20787, 'TAMALAMEQUE', 'Cesar', 'COL', NULL, NULL, '14'),
(427, 23001, 'MONTERÍA', 'Córdoba', 'COL', NULL, NULL, '14'),
(428, 23068, 'AYAPEL', 'Córdoba', 'COL', NULL, NULL, '14'),
(429, 23079, 'BUENAVISTA', 'Córdoba', 'COL', NULL, NULL, '14'),
(430, 23090, 'CANALETE', 'Córdoba', 'COL', NULL, NULL, '14'),
(431, 23162, 'CERETÉ', 'Córdoba', 'COL', NULL, NULL, '14'),
(432, 23168, 'CHIMÁ', 'Córdoba', 'COL', NULL, NULL, '14'),
(433, 23182, 'CHINÚ', 'Córdoba', 'COL', NULL, NULL, '14'),
(434, 23189, 'CIÉNAGA DE ORO', 'Córdoba', 'COL', NULL, NULL, '14'),
(435, 23300, 'COTORRA', 'Córdoba', 'COL', NULL, NULL, '14'),
(436, 23350, 'LA APARTADA', 'Córdoba', 'COL', NULL, NULL, '14'),
(437, 23417, 'LORICA', 'Córdoba', 'COL', NULL, NULL, '14'),
(438, 23419, 'LOS CÓRDOBAS', 'Córdoba', 'COL', NULL, NULL, '14'),
(439, 23464, 'MOMIL', 'Córdoba', 'COL', NULL, NULL, '14'),
(440, 23466, 'MONTELÍBANO', 'Córdoba', 'COL', NULL, NULL, '14'),
(441, 23500, 'MOÑITOS', 'Córdoba', 'COL', NULL, NULL, '14'),
(442, 23555, 'PLANETA RICA', 'Córdoba', 'COL', NULL, NULL, '14'),
(443, 23570, 'PUEBLO NUEVO', 'Córdoba', 'COL', NULL, NULL, '14'),
(444, 23574, 'PUERTO ESCONDIDO', 'Córdoba', 'COL', NULL, NULL, '14'),
(445, 23580, 'PUERTO LIBERTADOR', 'Córdoba', 'COL', NULL, NULL, '14'),
(446, 23586, 'PURÍSIMA', 'Córdoba', 'COL', NULL, NULL, '14'),
(447, 23660, 'SAHAGÚN', 'Córdoba', 'COL', NULL, NULL, '14'),
(448, 23670, 'SAN ANDRÉS SOTAVENTO', 'Córdoba', 'COL', NULL, NULL, '14'),
(449, 23672, 'SAN ANTERO', 'Córdoba', 'COL', NULL, NULL, '14'),
(450, 23675, 'SAN BERNARDO DEL VIENTO', 'Córdoba', 'COL', NULL, NULL, '14'),
(451, 23678, 'SAN CARLOS', 'Córdoba', 'COL', NULL, NULL, '14'),
(452, 23686, 'SAN PELAYO', 'Córdoba', 'COL', NULL, NULL, '14'),
(453, 23807, 'TIERRALTA', 'Córdoba', 'COL', NULL, NULL, '14'),
(454, 23855, 'VALENCIA', 'Córdoba', 'COL', NULL, NULL, '14'),
(455, 25001, 'AGUA DE DIOS', 'Cundinamarca', 'COL', NULL, '13', '14'),
(456, 25019, 'ALBÁN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(457, 25035, 'ANAPOIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(458, 25040, 'ANOLAIMA', 'Cundinamarca', 'COL', '318', '13', '14'),
(459, 25053, 'ARBELÁEZ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(460, 25086, 'BELTRÁN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(461, 25095, 'BITUIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(462, 25099, 'BOJACÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(463, 25120, 'CABRERA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(464, 25123, 'CACHIPAY', 'Cundinamarca', 'COL', NULL, '13', '14'),
(465, 25126, 'CAJICÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(466, 25148, 'CAPARRAPÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(467, 25151, 'CAQUEZA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(468, 25154, 'CARMEN DE CARUPA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(469, 25168, 'CHAGUANÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(470, 25175, 'CHÍA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(471, 25178, 'CHIPAQUE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(472, 25181, 'CHOACHÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(473, 25183, 'CHOCONTÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(474, 25200, 'COGUA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(475, 25214, 'COTA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(476, 25224, 'CUCUNUBÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(477, 25245, 'EL COLEGIO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(478, 25258, 'EL PEÑÓN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(479, 25260, 'EL ROSAL', 'Cundinamarca', 'COL', NULL, '13', '14'),
(480, 25269, 'FACATATIVÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(481, 25279, 'FOMEQUE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(482, 25281, 'FOSCA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(483, 25286, 'FUNZA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(484, 25288, 'FÚQUENE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(485, 25290, 'FUSAGASUGÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(486, 25293, 'GACHALA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(487, 25295, 'GACHANCIPÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(488, 25297, 'GACHETÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(489, 25299, 'GAMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(490, 25307, 'GIRARDOT', 'Cundinamarca', 'COL', NULL, '13', '14'),
(491, 25312, 'GRANADA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(492, 25317, 'GUACHETÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(493, 25320, 'GUADUAS', 'Cundinamarca', 'COL', NULL, '13', '14'),
(494, 25322, 'GUASCA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(495, 25324, 'GUATAQUÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(496, 25326, 'GUATAVITA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(497, 25328, 'GUAYABAL DE SIQUIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(498, 25335, 'GUAYABETAL', 'Cundinamarca', 'COL', NULL, '13', '14'),
(499, 25339, 'GUTIÉRREZ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(500, 25368, 'JERUSALÉN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(501, 25372, 'JUNÍN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(502, 25377, 'LA CALERA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(503, 25386, 'LA MESA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(504, 25394, 'LA PALMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(505, 25398, 'LA PEÑA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(506, 25402, 'LA VEGA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(507, 25407, 'LENGUAZAQUE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(508, 25426, 'MACHETA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(509, 25430, 'MADRID', 'Cundinamarca', 'COL', NULL, '13', '14'),
(510, 25436, 'MANTA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(511, 25438, 'MEDINA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(512, 25473, 'MOSQUERA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(513, 25483, 'NARIÑO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(514, 25486, 'NEMOCÓN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(515, 25488, 'NILO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(516, 25489, 'NIMAIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(517, 25491, 'NOCAIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(518, 25506, 'VENECIA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(519, 25513, 'PACHO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(520, 25518, 'PAIME', 'Cundinamarca', 'COL', NULL, '13', '14'),
(521, 25524, 'PANDI', 'Cundinamarca', 'COL', NULL, '13', '14'),
(522, 25530, 'PARATEBUENO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(523, 25535, 'PASCA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(524, 25572, 'PUERTO SALGAR', 'Cundinamarca', 'COL', NULL, '13', '14'),
(525, 25580, 'PULÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(526, 25592, 'QUEBRADANEGRA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(527, 25594, 'QUETAME', 'Cundinamarca', 'COL', NULL, '13', '14'),
(528, 25596, 'QUIPILE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(529, 25599, 'APULO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(530, 25612, 'RICAURTE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(531, 25645, 'SAN ANTONIO DEL TEQUENDAMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(532, 25649, 'SAN BERNARDO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(533, 25653, 'SAN CAYETANO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(534, 25658, 'SAN FRANCISCO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(535, 25662, 'SAN JUAN DE RÍO SECO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(536, 25718, 'SASAIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(537, 25736, 'SESQUILÉ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(538, 25740, 'SIBATÉ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(539, 25743, 'SILVANIA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(540, 25745, 'SIMIJACA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(541, 25754, 'SOACHA', 'Cundinamarca', 'COL', '399', '13', '14'),
(542, 25758, 'SOPÓ', 'Cundinamarca', 'COL', '400', '13', '14'),
(543, 25769, 'SUBACHOQUE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(544, 25772, 'SUESCA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(545, 25777, 'SUPATÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(546, 25779, 'SUSA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(547, 25781, 'SUTATAUSA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(548, 25785, 'TABIO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(549, 25793, 'TAUSA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(550, 25797, 'TENA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(551, 25799, 'TENJO', 'Cundinamarca', 'COL', NULL, '13', '14'),
(552, 25805, 'TIBACUY', 'Cundinamarca', 'COL', NULL, '13', '14'),
(553, 25807, 'TIBIRITA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(554, 25815, 'TOCAIMA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(555, 25817, 'TOCANCIPÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(556, 25823, 'TOPAIPÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(557, 25839, 'UBALÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(558, 25841, 'UBAQUE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(559, 25843, 'UBATE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(560, 25845, 'UNE', 'Cundinamarca', 'COL', NULL, '13', '14'),
(561, 25851, 'ÚTICA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(562, 25862, 'VERGARA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(563, 25867, 'VIANÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(564, 25871, 'VILLAGÓMEZ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(565, 25873, 'VILLAPINZÓN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(566, 25875, 'VILLETA', 'Cundinamarca', 'COL', NULL, '13', '14'),
(567, 25878, 'VIOTÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(568, 25885, 'YACOPÍ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(569, 25898, 'ZIPACÓN', 'Cundinamarca', 'COL', NULL, '13', '14'),
(570, 25899, 'ZIPAQUIRÁ', 'Cundinamarca', 'COL', NULL, '13', '14'),
(571, 27001, 'QUIBDÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(572, 27006, 'ACANDÍ', 'Chocó', 'COL', NULL, NULL, '14'),
(573, 27025, 'ALTO BAUDO', 'Chocó', 'COL', NULL, NULL, '14'),
(574, 27050, 'ATRATO', 'Chocó', 'COL', NULL, NULL, '14'),
(575, 27073, 'BAGADÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(576, 27075, 'BAHÍA SOLANO', 'Chocó', 'COL', NULL, NULL, '14'),
(577, 27077, 'BAJO BAUDÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(578, 27086, 'BELÉN DE BAJIRÁ', 'Chocó', 'COL', NULL, NULL, '14'),
(579, 27099, 'BOJAYA', 'Chocó', 'COL', NULL, NULL, '14'),
(580, 27135, 'EL CANTÓN DEL SAN PABLO', 'Chocó', 'COL', NULL, NULL, '14'),
(581, 27150, 'CARMEN DEL DARIEN', 'Chocó', 'COL', NULL, NULL, '14'),
(582, 27160, 'CÉRTEGUI', 'Chocó', 'COL', NULL, NULL, '14'),
(583, 27205, 'CONDOTO', 'Chocó', 'COL', NULL, NULL, '14'),
(584, 27245, 'EL CARMEN DE ATRATO', 'Chocó', 'COL', NULL, NULL, '14'),
(585, 27250, 'EL LITORAL DEL SAN JUAN', 'Chocó', 'COL', NULL, NULL, '14'),
(586, 27361, 'ISTMINA', 'Chocó', 'COL', NULL, NULL, '14'),
(587, 27372, 'JURADÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(588, 27413, 'LLORÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(589, 27425, 'MEDIO ATRATO', 'Chocó', 'COL', NULL, NULL, '14'),
(590, 27430, 'MEDIO BAUDÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(591, 27450, 'MEDIO SAN JUAN', 'Chocó', 'COL', NULL, NULL, '14'),
(592, 27491, 'NÓVITA', 'Chocó', 'COL', NULL, NULL, '14'),
(593, 27495, 'NUQUÍ', 'Chocó', 'COL', NULL, NULL, '14'),
(594, 27580, 'RÍO IRO', 'Chocó', 'COL', NULL, NULL, '14'),
(595, 27600, 'RÍO QUITO', 'Chocó', 'COL', NULL, NULL, '14'),
(596, 27615, 'RIOSUCIO', 'Chocó', 'COL', NULL, NULL, '14'),
(597, 27660, 'SAN JOSÉ DEL PALMAR', 'Chocó', 'COL', NULL, NULL, '14'),
(598, 27745, 'SIPÍ', 'Chocó', 'COL', NULL, NULL, '14'),
(599, 27787, 'TADÓ', 'Chocó', 'COL', NULL, NULL, '14'),
(600, 27800, 'UNGUÍA', 'Chocó', 'COL', NULL, NULL, '14'),
(601, 27810, 'UNIÓN PANAMERICANA', 'Chocó', 'COL', NULL, NULL, '14'),
(602, 41001, 'NEIVA', 'Huila', 'COL', NULL, NULL, '14'),
(603, 41006, 'ACEVEDO', 'Huila', 'COL', NULL, NULL, '14'),
(604, 41013, 'AGRADO', 'Huila', 'COL', NULL, NULL, '14'),
(605, 41016, 'AIPE', 'Huila', 'COL', NULL, NULL, '14'),
(606, 41020, 'ALGECIRAS', 'Huila', 'COL', NULL, NULL, '14'),
(607, 41026, 'ALTAMIRA', 'Huila', 'COL', NULL, NULL, '14'),
(608, 41078, 'BARAYA', 'Huila', 'COL', NULL, NULL, '14'),
(609, 41132, 'CAMPOALEGRE', 'Huila', 'COL', NULL, NULL, '14'),
(610, 41206, 'COLOMBIA', 'Huila', 'COL', NULL, NULL, '14'),
(611, 41244, 'ELÍAS', 'Huila', 'COL', NULL, NULL, '14'),
(612, 41298, 'GARZÓN', 'Huila', 'COL', NULL, NULL, '14'),
(613, 41306, 'GIGANTE', 'Huila', 'COL', NULL, NULL, '14'),
(614, 41319, 'GUADALUPE', 'Huila', 'COL', NULL, NULL, '14'),
(615, 41349, 'HOBO', 'Huila', 'COL', NULL, NULL, '14'),
(616, 41357, 'IQUIRA', 'Huila', 'COL', NULL, NULL, '14'),
(617, 41359, 'ISNOS', 'Huila', 'COL', NULL, NULL, '14'),
(618, 41378, 'LA ARGENTINA', 'Huila', 'COL', NULL, NULL, '14'),
(619, 41396, 'LA PLATA', 'Huila', 'COL', NULL, NULL, '14'),
(620, 41483, 'NÁTAGA', 'Huila', 'COL', NULL, NULL, '14'),
(621, 41503, 'OPORAPA', 'Huila', 'COL', NULL, NULL, '14'),
(622, 41518, 'PAICOL', 'Huila', 'COL', NULL, NULL, '14'),
(623, 41524, 'PALERMO', 'Huila', 'COL', NULL, NULL, '14'),
(624, 41530, 'PALESTINA', 'Huila', 'COL', NULL, NULL, '14'),
(625, 41548, 'PITAL', 'Huila', 'COL', NULL, NULL, '14'),
(626, 41551, 'PITALITO', 'Huila', 'COL', NULL, NULL, '14'),
(627, 41615, 'RIVERA', 'Huila', 'COL', NULL, NULL, '14'),
(628, 41660, 'SALADOBLANCO', 'Huila', 'COL', NULL, NULL, '14'),
(629, 41668, 'SAN AGUSTÍN', 'Huila', 'COL', NULL, NULL, '14'),
(630, 41676, 'SANTA MARÍA', 'Huila', 'COL', NULL, NULL, '14'),
(631, 41770, 'SUAZA', 'Huila', 'COL', NULL, NULL, '14'),
(632, 41791, 'TARQUI', 'Huila', 'COL', NULL, NULL, '14'),
(633, 41797, 'TESALIA', 'Huila', 'COL', NULL, NULL, '14'),
(634, 41799, 'TELLO', 'Huila', 'COL', NULL, NULL, '14'),
(635, 41801, 'TERUEL', 'Huila', 'COL', NULL, NULL, '14'),
(636, 41807, 'TIMANÁ', 'Huila', 'COL', NULL, NULL, '14'),
(637, 41872, 'VILLAVIEJA', 'Huila', 'COL', NULL, NULL, '14'),
(638, 41885, 'YAGUARÁ', 'Huila', 'COL', NULL, NULL, '14'),
(639, 44001, 'RIOHACHA', 'La Guajira', 'COL', NULL, NULL, '14'),
(640, 44035, 'ALBANIA', 'La Guajira', 'COL', NULL, NULL, '14'),
(641, 44078, 'BARRANCAS', 'La Guajira', 'COL', NULL, NULL, '14'),
(642, 44090, 'DIBULLA', 'La Guajira', 'COL', NULL, NULL, '14'),
(643, 44098, 'DISTRACCIÓN', 'La Guajira', 'COL', NULL, NULL, '14'),
(644, 44110, 'EL MOLINO', 'La Guajira', 'COL', NULL, NULL, '14'),
(645, 44279, 'FONSECA', 'La Guajira', 'COL', NULL, NULL, '14'),
(646, 44378, 'HATONUEVO', 'La Guajira', 'COL', NULL, NULL, '14'),
(647, 44420, 'LA JAGUA DEL PILAR', 'La Guajira', 'COL', NULL, NULL, '14'),
(648, 44430, 'MAICAO', 'La Guajira', 'COL', NULL, NULL, '14'),
(649, 44560, 'MANAURE', 'La Guajira', 'COL', NULL, NULL, '14'),
(650, 44650, 'SAN JUAN DEL CESAR', 'La Guajira', 'COL', NULL, NULL, '14'),
(651, 44847, 'URIBIA', 'La Guajira', 'COL', NULL, NULL, '14'),
(652, 44855, 'URUMITA', 'La Guajira', 'COL', NULL, NULL, '14'),
(653, 44874, 'VILLANUEVA', 'La Guajira', 'COL', NULL, NULL, '14'),
(654, 47001, 'SANTA MARTA', 'Magdalena', 'COL', NULL, NULL, '14'),
(655, 47030, 'ALGARROBO', 'Magdalena', 'COL', NULL, NULL, '14'),
(656, 47053, 'ARACATACA', 'Magdalena', 'COL', NULL, NULL, '14'),
(657, 47058, 'ARIGUANÍ', 'Magdalena', 'COL', NULL, NULL, '14'),
(658, 47161, 'CERRO SAN ANTONIO', 'Magdalena', 'COL', NULL, NULL, '14'),
(659, 47170, 'CHIBOLO', 'Magdalena', 'COL', NULL, NULL, '14'),
(660, 47189, 'CIÉNAGA', 'Magdalena', 'COL', NULL, NULL, '14'),
(661, 47205, 'CONCORDIA', 'Magdalena', 'COL', NULL, NULL, '14'),
(662, 47245, 'EL BANCO', 'Magdalena', 'COL', NULL, NULL, '14'),
(663, 47258, 'EL PIÑON', 'Magdalena', 'COL', NULL, NULL, '14'),
(664, 47268, 'EL RETÉN', 'Magdalena', 'COL', NULL, NULL, '14'),
(665, 47288, 'FUNDACIÓN', 'Magdalena', 'COL', NULL, NULL, '14'),
(666, 47318, 'GUAMAL', 'Magdalena', 'COL', NULL, NULL, '14'),
(667, 47460, 'NUEVA GRANADA', 'Magdalena', 'COL', NULL, NULL, '14'),
(668, 47541, 'PEDRAZA', 'Magdalena', 'COL', NULL, NULL, '14'),
(669, 47545, 'PIJIÑO DEL CARMEN', 'Magdalena', 'COL', NULL, NULL, '14'),
(670, 47551, 'PIVIJAY', 'Magdalena', 'COL', NULL, NULL, '14'),
(671, 47555, 'PLATO', 'Magdalena', 'COL', NULL, NULL, '14'),
(672, 47570, 'PUEBLOVIEJO', 'Magdalena', 'COL', NULL, NULL, '14'),
(673, 47605, 'REMOLINO', 'Magdalena', 'COL', NULL, NULL, '14'),
(674, 47660, 'SABANAS DE SAN ANGEL', 'Magdalena', 'COL', NULL, NULL, '14'),
(675, 47675, 'SALAMINA', 'Magdalena', 'COL', NULL, NULL, '14'),
(676, 47692, 'SAN SEBASTIÁN DE BUENAVISTA', 'Magdalena', 'COL', NULL, NULL, '14'),
(677, 47703, 'SAN ZENÓN', 'Magdalena', 'COL', NULL, NULL, '14'),
(678, 47707, 'SANTA ANA', 'Magdalena', 'COL', NULL, NULL, '14'),
(679, 47720, 'SANTA BÁRBARA DE PINTO', 'Magdalena', 'COL', NULL, NULL, '14'),
(680, 47745, 'SITIONUEVO', 'Magdalena', 'COL', NULL, NULL, '14'),
(681, 47798, 'TENERIFE', 'Magdalena', 'COL', NULL, NULL, '14'),
(682, 47960, 'ZAPAYÁN', 'Magdalena', 'COL', NULL, NULL, '14'),
(683, 47980, 'ZONA BANANERA', 'Magdalena', 'COL', NULL, NULL, '14'),
(684, 50001, 'VILLAVICENCIO', 'Meta', 'COL', NULL, NULL, '14'),
(685, 50006, 'ACACÍAS', 'Meta', 'COL', NULL, NULL, '14'),
(686, 50110, 'BARRANCA DE UPÍA', 'Meta', 'COL', NULL, NULL, '14'),
(687, 50124, 'CABUYARO', 'Meta', 'COL', NULL, NULL, '14'),
(688, 50150, 'CASTILLA LA NUEVA', 'Meta', 'COL', NULL, NULL, '14'),
(689, 50223, 'CUBARRAL', 'Meta', 'COL', NULL, NULL, '14'),
(690, 50226, 'CUMARAL', 'Meta', 'COL', NULL, NULL, '14'),
(691, 50245, 'EL CALVARIO', 'Meta', 'COL', NULL, NULL, '14'),
(692, 50251, 'EL CASTILLO', 'Meta', 'COL', NULL, NULL, '14'),
(693, 50270, 'EL DORADO', 'Meta', 'COL', NULL, NULL, '14'),
(694, 50287, 'FUENTE DE ORO', 'Meta', 'COL', NULL, NULL, '14'),
(695, 50313, 'GRANADA', 'Meta', 'COL', NULL, NULL, '14'),
(696, 50318, 'GUAMAL', 'Meta', 'COL', NULL, NULL, '14'),
(697, 50325, 'MAPIRIPÁN', 'Meta', 'COL', NULL, NULL, '14'),
(698, 50330, 'MESETAS', 'Meta', 'COL', NULL, NULL, '14'),
(699, 50350, 'LA MACARENA', 'Meta', 'COL', NULL, NULL, '14'),
(700, 50370, 'URIBE', 'Meta', 'COL', NULL, NULL, '14'),
(701, 50400, 'LEJANÍAS', 'Meta', 'COL', NULL, NULL, '14'),
(702, 50450, 'PUERTO CONCORDIA', 'Meta', 'COL', NULL, NULL, '14'),
(703, 50568, 'PUERTO GAITÁN', 'Meta', 'COL', NULL, NULL, '14'),
(704, 50573, 'PUERTO LÓPEZ', 'Meta', 'COL', NULL, NULL, '14'),
(705, 50577, 'PUERTO LLERAS', 'Meta', 'COL', NULL, NULL, '14'),
(706, 50590, 'PUERTO RICO', 'Meta', 'COL', NULL, NULL, '14'),
(707, 50606, 'RESTREPO', 'Meta', 'COL', NULL, NULL, '14'),
(708, 50680, 'SAN CARLOS DE GUAROA', 'Meta', 'COL', NULL, NULL, '14'),
(709, 50683, 'SAN JUAN DE ARAMA', 'Meta', 'COL', NULL, NULL, '14'),
(710, 50686, 'SAN JUANITO', 'Meta', 'COL', NULL, NULL, '14'),
(711, 50689, 'SAN MARTÍN', 'Meta', 'COL', NULL, NULL, '14'),
(712, 50711, 'VISTAHERMOSA', 'Meta', 'COL', NULL, NULL, '14'),
(713, 52001, 'PASTO', 'Nariño', 'COL', NULL, NULL, '14'),
(714, 52019, 'ALBÁN', 'Nariño', 'COL', NULL, NULL, '14'),
(715, 52022, 'ALDANA', 'Nariño', 'COL', NULL, NULL, '14'),
(716, 52036, 'ANCUYÁ', 'Nariño', 'COL', NULL, NULL, '14'),
(717, 52051, 'ARBOLEDA', 'Nariño', 'COL', NULL, NULL, '14'),
(718, 52079, 'BARBACOAS', 'Nariño', 'COL', NULL, NULL, '14'),
(719, 52083, 'BELÉN', 'Nariño', 'COL', NULL, NULL, '14'),
(720, 52110, 'BUESACO', 'Nariño', 'COL', NULL, NULL, '14'),
(721, 52203, 'COLÓN', 'Nariño', 'COL', NULL, NULL, '14'),
(722, 52207, 'CONSACA', 'Nariño', 'COL', NULL, NULL, '14'),
(723, 52210, 'CONTADERO', 'Nariño', 'COL', NULL, NULL, '14'),
(724, 52215, 'CÓRDOBA', 'Nariño', 'COL', NULL, NULL, '14'),
(725, 52224, 'CUASPUD', 'Nariño', 'COL', NULL, NULL, '14'),
(726, 52227, 'CUMBAL', 'Nariño', 'COL', NULL, NULL, '14'),
(727, 52233, 'CUMBITARA', 'Nariño', 'COL', NULL, NULL, '14'),
(728, 52240, 'CHACHAGÜÍ', 'Nariño', 'COL', NULL, NULL, '14'),
(729, 52250, 'EL CHARCO', 'Nariño', 'COL', NULL, NULL, '14'),
(730, 52254, 'EL PEÑOL', 'Nariño', 'COL', NULL, NULL, '14'),
(731, 52256, 'EL ROSARIO', 'Nariño', 'COL', NULL, NULL, '14'),
(732, 52258, 'EL TABLÓN DE GÓMEZ', 'Nariño', 'COL', NULL, NULL, '14'),
(733, 52260, 'EL TAMBO', 'Nariño', 'COL', NULL, NULL, '14'),
(734, 52287, 'FUNES', 'Nariño', 'COL', NULL, NULL, '14'),
(735, 52317, 'GUACHUCAL', 'Nariño', 'COL', NULL, NULL, '14'),
(736, 52320, 'GUAITARILLA', 'Nariño', 'COL', NULL, NULL, '14'),
(737, 52323, 'GUALMATÁN', 'Nariño', 'COL', NULL, NULL, '14'),
(738, 52352, 'ILES', 'Nariño', 'COL', NULL, NULL, '14'),
(739, 52354, 'IMUÉS', 'Nariño', 'COL', NULL, NULL, '14'),
(740, 52356, 'IPIALES', 'Nariño', 'COL', NULL, NULL, '14'),
(741, 52378, 'LA CRUZ', 'Nariño', 'COL', NULL, NULL, '14'),
(742, 52381, 'LA FLORIDA', 'Nariño', 'COL', NULL, NULL, '14'),
(743, 52385, 'LA LLANADA', 'Nariño', 'COL', NULL, NULL, '14'),
(744, 52390, 'LA TOLA', 'Nariño', 'COL', NULL, NULL, '14'),
(745, 52399, 'LA UNIÓN', 'Nariño', 'COL', NULL, NULL, '14'),
(746, 52405, 'LEIVA', 'Nariño', 'COL', NULL, NULL, '14'),
(747, 52411, 'LINARES', 'Nariño', 'COL', NULL, NULL, '14'),
(748, 52418, 'LOS ANDES', 'Nariño', 'COL', NULL, NULL, '14'),
(749, 52427, 'MAGÜI', 'Nariño', 'COL', NULL, NULL, '14'),
(750, 52435, 'MALLAMA', 'Nariño', 'COL', NULL, NULL, '14'),
(751, 52473, 'MOSQUERA', 'Nariño', 'COL', NULL, NULL, '14'),
(752, 52480, 'NARIÑO', 'Nariño', 'COL', NULL, NULL, '14'),
(753, 52490, 'OLAYA HERRERA', 'Nariño', 'COL', NULL, NULL, '14'),
(754, 52506, 'OSPINA', 'Nariño', 'COL', NULL, NULL, '14'),
(755, 52520, 'FRANCISCO PIZARRO', 'Nariño', 'COL', NULL, NULL, '14'),
(756, 52540, 'POLICARPA', 'Nariño', 'COL', NULL, NULL, '14'),
(757, 52560, 'POTOSÍ', 'Nariño', 'COL', NULL, NULL, '14'),
(758, 52565, 'PROVIDENCIA', 'Nariño', 'COL', NULL, NULL, '14'),
(759, 52573, 'PUERRES', 'Nariño', 'COL', NULL, NULL, '14'),
(760, 52585, 'PUPIALES', 'Nariño', 'COL', NULL, NULL, '14'),
(761, 52612, 'RICAURTE', 'Nariño', 'COL', NULL, NULL, '14'),
(762, 52621, 'ROBERTO PAYÁN', 'Nariño', 'COL', NULL, NULL, '14'),
(763, 52678, 'SAMANIEGO', 'Nariño', 'COL', NULL, NULL, '14'),
(764, 52683, 'SANDONÁ', 'Nariño', 'COL', NULL, NULL, '14'),
(765, 52685, 'SAN BERNARDO', 'Nariño', 'COL', NULL, NULL, '14'),
(766, 52687, 'SAN LORENZO', 'Nariño', 'COL', NULL, NULL, '14'),
(767, 52693, 'SAN PABLO', 'Nariño', 'COL', NULL, NULL, '14'),
(768, 52694, 'SAN PEDRO DE CARTAGO', 'Nariño', 'COL', NULL, NULL, '14'),
(769, 52696, 'SANTA BÁRBARA', 'Nariño', 'COL', NULL, NULL, '14'),
(770, 52699, 'SANTACRUZ', 'Nariño', 'COL', NULL, NULL, '14'),
(771, 52720, 'SAPUYES', 'Nariño', 'COL', NULL, NULL, '14'),
(772, 52786, 'TAMINANGO', 'Nariño', 'COL', NULL, NULL, '14'),
(773, 52788, 'TANGUA', 'Nariño', 'COL', NULL, NULL, '14'),
(774, 52835, 'TUMACO', 'Nariño', 'COL', NULL, NULL, '14'),
(775, 52838, 'TÚQUERRES', 'Nariño', 'COL', NULL, NULL, '14'),
(776, 52885, 'YACUANQUER', 'Nariño', 'COL', NULL, NULL, '14'),
(777, 54001, 'CÚCUTA', 'Norte de Santander', 'COL', '949', '20', '14'),
(778, 54003, 'ABREGO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(779, 54051, 'ARBOLEDAS', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(780, 54099, 'BOCHALEMA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(781, 54109, 'BUCARASICA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(782, 54125, 'CÁCOTA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(783, 54128, 'CACHIRÁ', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(784, 54172, 'CHINÁCOTA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(785, 54174, 'CHITAGÁ', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(786, 54206, 'CONVENCIÓN', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(787, 54223, 'CUCUTILLA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(788, 54239, 'DURANIA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(789, 54245, 'EL CARMEN', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(790, 54250, 'EL TARRA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(791, 54261, 'EL ZULIA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(792, 54313, 'GRAMALOTE', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(793, 54344, 'HACARÍ', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(794, 54347, 'HERRÁN', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(795, 54377, 'LABATECA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(796, 54385, 'LA ESPERANZA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(797, 54398, 'LA PLAYA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(798, 54405, 'LOS PATIOS', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(799, 54418, 'LOURDES', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(800, 54480, 'MUTISCUA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(801, 54498, 'OCANA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(802, 54518, 'PAMPLONA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(803, 54520, 'PAMPLONITA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(804, 54553, 'PUERTO SANTANDER', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(805, 54599, 'RAGONVALIA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(806, 54660, 'SALAZAR', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(807, 54670, 'SAN CALIXTO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(808, 54673, 'SAN CAYETANO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(809, 54680, 'SANTIAGO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(810, 54720, 'SARDINATA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(811, 54743, 'SILOS', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(812, 54800, 'TEORAMA', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(813, 54810, 'TIBÚ', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(814, 54820, 'TOLEDO', 'Norte de Santander', 'COL', NULL, NULL, '14');
INSERT INTO `ciudad` (`id`, `codigo`, `nombre`, `departamento`, `pais`, `ciudad_id`, `departamento_id`, `pais_id`) VALUES
(815, 54871, 'VILLA CARO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(816, 54874, 'VILLA DEL ROSARIO', 'Norte de Santander', 'COL', NULL, NULL, '14'),
(817, 63001, 'ARMENIA', 'Quindio', 'COL', NULL, NULL, '14'),
(818, 63111, 'BUENAVISTA', 'Quindio', 'COL', NULL, NULL, '14'),
(819, 63130, 'CALARCA', 'Quindio', 'COL', NULL, NULL, '14'),
(820, 63190, 'CIRCASIA', 'Quindio', 'COL', NULL, NULL, '14'),
(821, 63212, 'CÓRDOBA', 'Quindio', 'COL', NULL, NULL, '14'),
(822, 63272, 'FILANDIA', 'Quindio', 'COL', NULL, NULL, '14'),
(823, 63302, 'GÉNOVA', 'Quindio', 'COL', NULL, NULL, '14'),
(824, 63401, 'LA TEBAIDA', 'Quindio', 'COL', NULL, NULL, '14'),
(825, 63470, 'MONTENEGRO', 'Quindio', 'COL', NULL, NULL, '14'),
(826, 63548, 'PIJAO', 'Quindio', 'COL', NULL, NULL, '14'),
(827, 63594, 'QUIMBAYA', 'Quindio', 'COL', NULL, NULL, '14'),
(828, 63690, 'SALENTO', 'Quindio', 'COL', NULL, NULL, '14'),
(829, 66001, 'PEREIRA', 'Risaralda', 'COL', NULL, NULL, '14'),
(830, 66045, 'APÍA', 'Risaralda', 'COL', NULL, NULL, '14'),
(831, 66075, 'BALBOA', 'Risaralda', 'COL', NULL, NULL, '14'),
(832, 66088, 'BELÉN DE UMBRÍA', 'Risaralda', 'COL', NULL, NULL, '14'),
(833, 66170, 'DOSQUEBRADAS', 'Risaralda', 'COL', NULL, NULL, '14'),
(834, 66318, 'GUÁTICA', 'Risaralda', 'COL', NULL, NULL, '14'),
(835, 66383, 'LA CELIA', 'Risaralda', 'COL', NULL, NULL, '14'),
(836, 66400, 'LA VIRGINIA', 'Risaralda', 'COL', NULL, NULL, '14'),
(837, 66440, 'MARSELLA', 'Risaralda', 'COL', NULL, NULL, '14'),
(838, 66456, 'MISTRATÓ', 'Risaralda', 'COL', NULL, NULL, '14'),
(839, 66572, 'PUEBLO RICO', 'Risaralda', 'COL', NULL, NULL, '14'),
(840, 66594, 'QUINCHÍA', 'Risaralda', 'COL', NULL, NULL, '14'),
(841, 66682, 'SANTA ROSA DE CABAL', 'Risaralda', 'COL', NULL, NULL, '14'),
(842, 66687, 'SANTUARIO', 'Risaralda', 'COL', NULL, NULL, '14'),
(843, 68001, 'BUCARAMANGA', 'Santander', 'COL', '1013', '23', '14'),
(844, 68013, 'AGUADA', 'Santander', 'COL', NULL, NULL, '14'),
(845, 68020, 'ALBANIA', 'Santander', 'COL', NULL, NULL, '14'),
(846, 68051, 'ARATOCA', 'Santander', 'COL', NULL, NULL, '14'),
(847, 68077, 'BARBOSA', 'Santander', 'COL', NULL, NULL, '14'),
(848, 68079, 'BARICHARA', 'Santander', 'COL', NULL, NULL, '14'),
(849, 68081, 'BARRANCABERMEJA', 'Santander', 'COL', NULL, NULL, '14'),
(850, 68092, 'BETULIA', 'Santander', 'COL', NULL, NULL, '14'),
(851, 68101, 'BOLÍVAR', 'Santander', 'COL', NULL, NULL, '14'),
(852, 68121, 'CABRERA', 'Santander', 'COL', NULL, NULL, '14'),
(853, 68132, 'CALIFORNIA', 'Santander', 'COL', NULL, NULL, '14'),
(854, 68147, 'CAPITANEJO', 'Santander', 'COL', NULL, NULL, '14'),
(855, 68152, 'CARCASÍ', 'Santander', 'COL', NULL, NULL, '14'),
(856, 68160, 'CEPITÁ', 'Santander', 'COL', NULL, NULL, '14'),
(857, 68162, 'CERRITO', 'Santander', 'COL', NULL, NULL, '14'),
(858, 68167, 'CHARALÁ', 'Santander', 'COL', NULL, NULL, '14'),
(859, 68169, 'CHARTA', 'Santander', 'COL', NULL, NULL, '14'),
(860, 68176, 'CHIMA', 'Santander', 'COL', NULL, NULL, '14'),
(861, 68179, 'CHIPATÁ', 'Santander', 'COL', NULL, NULL, '14'),
(862, 68190, 'CIMITARRA', 'Santander', 'COL', NULL, NULL, '14'),
(863, 68207, 'CONCEPCIÓN', 'Santander', 'COL', NULL, NULL, '14'),
(864, 68209, 'CONFINES', 'Santander', 'COL', NULL, NULL, '14'),
(865, 68211, 'CONTRATACIÓN', 'Santander', 'COL', NULL, NULL, '14'),
(866, 68217, 'COROMORO', 'Santander', 'COL', NULL, NULL, '14'),
(867, 68229, 'CURITÍ', 'Santander', 'COL', NULL, NULL, '14'),
(868, 68235, 'EL CARMEN DE CHUCURÍ', 'Santander', 'COL', NULL, NULL, '14'),
(869, 68245, 'EL GUACAMAYO', 'Santander', 'COL', NULL, NULL, '14'),
(870, 68250, 'EL PEÑÓN', 'Santander', 'COL', NULL, NULL, '14'),
(871, 68255, 'EL PLAYÓN', 'Santander', 'COL', NULL, NULL, '14'),
(872, 68264, 'ENCINO', 'Santander', 'COL', NULL, NULL, '14'),
(873, 68266, 'ENCISO', 'Santander', 'COL', NULL, NULL, '14'),
(874, 68271, 'FLORIÁN', 'Santander', 'COL', NULL, NULL, '14'),
(875, 68276, 'FLORIDABLANCA', 'Santander', 'COL', '1045', '23', '14'),
(876, 68296, 'GALÁN', 'Santander', 'COL', NULL, NULL, '14'),
(877, 68298, 'GAMBITA', 'Santander', 'COL', NULL, NULL, '14'),
(878, 68307, 'GIRÓN', 'Santander', 'COL', NULL, NULL, '14'),
(879, 68318, 'GUACA', 'Santander', 'COL', NULL, NULL, '14'),
(880, 68320, 'GUADALUPE', 'Santander', 'COL', NULL, NULL, '14'),
(881, 68322, 'GUAPOTÁ', 'Santander', 'COL', NULL, NULL, '14'),
(882, 68324, 'GUAVATÁ', 'Santander', 'COL', NULL, NULL, '14'),
(883, 68327, 'GÜEPSA', 'Santander', 'COL', NULL, NULL, '14'),
(884, 68344, 'HATO', 'Santander', 'COL', NULL, NULL, '14'),
(885, 68368, 'JESÚS MARÍA', 'Santander', 'COL', NULL, NULL, '14'),
(886, 68370, 'JORDÁN', 'Santander', 'COL', NULL, NULL, '14'),
(887, 68377, 'LA BELLEZA', 'Santander', 'COL', NULL, NULL, '14'),
(888, 68385, 'LANDÁZURI', 'Santander', 'COL', NULL, NULL, '14'),
(889, 68397, 'LA PAZ', 'Santander', 'COL', NULL, NULL, '14'),
(890, 68406, 'LEBRÍJA', 'Santander', 'COL', NULL, NULL, '14'),
(891, 68418, 'LOS SANTOS', 'Santander', 'COL', NULL, NULL, '14'),
(892, 68425, 'MACARAVITA', 'Santander', 'COL', NULL, NULL, '14'),
(893, 68432, 'MÁLAGA', 'Santander', 'COL', NULL, NULL, '14'),
(894, 68444, 'MATANZA', 'Santander', 'COL', NULL, NULL, '14'),
(895, 68464, 'MOGOTES', 'Santander', 'COL', NULL, NULL, '14'),
(896, 68468, 'MOLAGAVITA', 'Santander', 'COL', NULL, NULL, '14'),
(897, 68498, 'OCAMONTE', 'Santander', 'COL', NULL, NULL, '14'),
(898, 68500, 'OIBA', 'Santander', 'COL', '1068', '23', '14'),
(899, 68502, 'ONZAGA', 'Santander', 'COL', NULL, NULL, '14'),
(900, 68522, 'PALMAR', 'Santander', 'COL', NULL, NULL, '14'),
(901, 68524, 'PALMAS DEL SOCORRO', 'Santander', 'COL', NULL, NULL, '14'),
(902, 68533, 'PÁRAMO', 'Santander', 'COL', NULL, NULL, '14'),
(903, 68547, 'PIEDECUESTA', 'Santander', 'COL', NULL, NULL, '14'),
(904, 68549, 'PINCHOTE', 'Santander', 'COL', NULL, NULL, '14'),
(905, 68572, 'PUENTE NACIONAL', 'Santander', 'COL', NULL, NULL, '14'),
(906, 68573, 'PUERTO PARRA', 'Santander', 'COL', NULL, NULL, '14'),
(907, 68575, 'PUERTO WILCHES', 'Santander', 'COL', NULL, NULL, '14'),
(908, 68615, 'RIONEGRO', 'Santander', 'COL', NULL, NULL, '14'),
(909, 68655, 'SABANA DE TORRES', 'Santander', 'COL', NULL, NULL, '14'),
(910, 68669, 'SAN ANDRÉS', 'Santander', 'COL', NULL, NULL, '14'),
(911, 68673, 'SAN BENITO', 'Santander', 'COL', NULL, NULL, '14'),
(912, 68679, 'SAN GIL', 'Santander', 'COL', NULL, NULL, '14'),
(913, 68682, 'SAN JOAQUÍN', 'Santander', 'COL', NULL, NULL, '14'),
(914, 68684, 'SAN JOSÉ DE MIRANDA', 'Santander', 'COL', NULL, NULL, '14'),
(915, 68686, 'SAN MIGUEL', 'Santander', 'COL', NULL, NULL, '14'),
(916, 68689, 'SAN VICENTE DE CHUCURÍ', 'Santander', 'COL', NULL, NULL, '14'),
(917, 68705, 'SANTA BÁRBARA', 'Santander', 'COL', NULL, NULL, '14'),
(918, 68720, 'SANTA HELENA DEL OPÓN', 'Santander', 'COL', NULL, NULL, '14'),
(919, 68745, 'SIMACOTA', 'Santander', 'COL', NULL, NULL, '14'),
(920, 68755, 'SOCORRO', 'Santander', 'COL', NULL, NULL, '14'),
(921, 68770, 'SUAITA', 'Santander', 'COL', NULL, NULL, '14'),
(922, 68773, 'SUCRE', 'Santander', 'COL', NULL, NULL, '14'),
(923, 68780, 'SURATÁ', 'Santander', 'COL', NULL, NULL, '14'),
(924, 68820, 'TONA', 'Santander', 'COL', NULL, NULL, '14'),
(925, 68855, 'VALLE DE SAN JOSÉ', 'Santander', 'COL', NULL, NULL, '14'),
(926, 68861, 'VÉLEZ', 'Santander', 'COL', NULL, NULL, '14'),
(927, 68867, 'VETAS', 'Santander', 'COL', NULL, NULL, '14'),
(928, 68872, 'VILLANUEVA', 'Santander', 'COL', NULL, NULL, '14'),
(929, 68895, 'ZAPATOCA', 'Santander', 'COL', NULL, NULL, '14'),
(930, 70001, 'SINCELEJO', 'Sucre', 'COL', NULL, NULL, '14'),
(931, 70110, 'BUENAVISTA', 'Sucre', 'COL', NULL, NULL, '14'),
(932, 70124, 'CAIMITO', 'Sucre', 'COL', NULL, NULL, '14'),
(933, 70204, 'COLOSO', 'Sucre', 'COL', NULL, NULL, '14'),
(934, 70215, 'COROZAL', 'Sucre', 'COL', NULL, NULL, '14'),
(935, 70221, 'COVEÑAS', 'Sucre', 'COL', NULL, NULL, '14'),
(936, 70230, 'CHALÁN', 'Sucre', 'COL', NULL, NULL, '14'),
(937, 70233, 'EL ROBLE', 'Sucre', 'COL', NULL, NULL, '14'),
(938, 70235, 'GALERAS', 'Sucre', 'COL', NULL, NULL, '14'),
(939, 70265, 'GUARANDA', 'Sucre', 'COL', NULL, NULL, '14'),
(940, 70400, 'LA UNIÓN', 'Sucre', 'COL', NULL, NULL, '14'),
(941, 70418, 'LOS PALMITOS', 'Sucre', 'COL', NULL, NULL, '14'),
(942, 70429, 'MAJAGUAL', 'Sucre', 'COL', NULL, NULL, '14'),
(943, 70473, 'MORROA', 'Sucre', 'COL', NULL, NULL, '14'),
(944, 70508, 'OVEJAS', 'Sucre', 'COL', NULL, NULL, '14'),
(945, 70523, 'PALMITO', 'Sucre', 'COL', NULL, NULL, '14'),
(946, 70670, 'SAMPUÉS', 'Sucre', 'COL', NULL, NULL, '14'),
(947, 70678, 'SAN BENITO ABAD', 'Sucre', 'COL', NULL, NULL, '14'),
(948, 70702, 'SAN JUAN DE BETULIA', 'Sucre', 'COL', NULL, NULL, '14'),
(949, 70708, 'SAN MARCOS', 'Sucre', 'COL', NULL, NULL, '14'),
(950, 70713, 'SAN ONOFRE', 'Sucre', 'COL', NULL, NULL, '14'),
(951, 70717, 'SAN PEDRO', 'Sucre', 'COL', NULL, NULL, '14'),
(952, 70742, 'SINCÉ', 'Sucre', 'COL', NULL, NULL, '14'),
(953, 70771, 'SUCRE', 'Sucre', 'COL', NULL, NULL, '14'),
(954, 70820, 'SANTIAGO DE TOLÚ', 'Sucre', 'COL', NULL, NULL, '14'),
(955, 70823, 'TOLÚ VIEJO', 'Sucre', 'COL', NULL, NULL, '14'),
(956, 73001, 'IBAGUÉ', 'Tolima', 'COL', NULL, NULL, '14'),
(957, 73024, 'ALPUJARRA', 'Tolima', 'COL', NULL, NULL, '14'),
(958, 73026, 'ALVARADO', 'Tolima', 'COL', NULL, NULL, '14'),
(959, 73030, 'AMBALEMA', 'Tolima', 'COL', NULL, NULL, '14'),
(960, 73043, 'ANZOÁTEGUI', 'Tolima', 'COL', NULL, NULL, '14'),
(961, 73055, 'ARMERO', 'Tolima', 'COL', NULL, NULL, '14'),
(962, 73067, 'ATACO', 'Tolima', 'COL', NULL, NULL, '14'),
(963, 73124, 'CAJAMARCA', 'Tolima', 'COL', NULL, NULL, '14'),
(964, 73148, 'CARMEN DE APICALÁ', 'Tolima', 'COL', NULL, NULL, '14'),
(965, 73152, 'CASABIANCA', 'Tolima', 'COL', NULL, NULL, '14'),
(966, 73168, 'CHAPARRAL', 'Tolima', 'COL', NULL, NULL, '14'),
(967, 73200, 'COELLO', 'Tolima', 'COL', NULL, NULL, '14'),
(968, 73217, 'COYAIMA', 'Tolima', 'COL', NULL, NULL, '14'),
(969, 73226, 'CUNDAY', 'Tolima', 'COL', NULL, NULL, '14'),
(970, 73236, 'DOLORES', 'Tolima', 'COL', NULL, NULL, '14'),
(971, 73268, 'ESPINAL', 'Tolima', 'COL', NULL, NULL, '14'),
(972, 73270, 'FALAN', 'Tolima', 'COL', NULL, NULL, '14'),
(973, 73275, 'FLANDES', 'Tolima', 'COL', NULL, NULL, '14'),
(974, 73283, 'FRESNO', 'Tolima', 'COL', NULL, NULL, '14'),
(975, 73319, 'GUAMO', 'Tolima', 'COL', NULL, NULL, '14'),
(976, 73347, 'HERVEO', 'Tolima', 'COL', NULL, NULL, '14'),
(977, 73349, 'HONDA', 'Tolima', 'COL', NULL, NULL, '14'),
(978, 73352, 'ICONONZO', 'Tolima', 'COL', NULL, NULL, '14'),
(979, 73408, 'LÉRIDA', 'Tolima', 'COL', NULL, NULL, '14'),
(980, 73411, 'LÍBANO', 'Tolima', 'COL', NULL, NULL, '14'),
(981, 73443, 'MARIQUITA', 'Tolima', 'COL', NULL, NULL, '14'),
(982, 73449, 'MELGAR', 'Tolima', 'COL', NULL, NULL, '14'),
(983, 73461, 'MURILLO', 'Tolima', 'COL', NULL, NULL, '14'),
(984, 73483, 'NATAGAIMA', 'Tolima', 'COL', NULL, NULL, '14'),
(985, 73504, 'ORTEGA', 'Tolima', 'COL', NULL, NULL, '14'),
(986, 73520, 'PALOCABILDO', 'Tolima', 'COL', NULL, NULL, '14'),
(987, 73547, 'PIEDRAS', 'Tolima', 'COL', NULL, NULL, '14'),
(988, 73555, 'PLANADAS', 'Tolima', 'COL', NULL, NULL, '14'),
(989, 73563, 'PRADO', 'Tolima', 'COL', NULL, NULL, '14'),
(990, 73585, 'PURIFICACIÓN', 'Tolima', 'COL', NULL, NULL, '14'),
(991, 73616, 'RIOBLANCO', 'Tolima', 'COL', NULL, NULL, '14'),
(992, 73622, 'RONCESVALLES', 'Tolima', 'COL', NULL, NULL, '14'),
(993, 73624, 'ROVIRA', 'Tolima', 'COL', NULL, NULL, '14'),
(994, 73671, 'SALDAÑA', 'Tolima', 'COL', NULL, NULL, '14'),
(995, 73675, 'SAN ANTONIO', 'Tolima', 'COL', NULL, NULL, '14'),
(996, 73678, 'SAN LUIS', 'Tolima', 'COL', NULL, NULL, '14'),
(997, 73686, 'SANTA ISABEL', 'Tolima', 'COL', NULL, NULL, '14'),
(998, 73770, 'SUÁREZ', 'Tolima', 'COL', NULL, NULL, '14'),
(999, 73854, 'VALLE DE SAN JUAN', 'Tolima', 'COL', NULL, NULL, '14'),
(1000, 73861, 'VENADILLO', 'Tolima', 'COL', NULL, NULL, '14'),
(1001, 73870, 'VILLAHERMOSA', 'Tolima', 'COL', NULL, NULL, '14'),
(1002, 73873, 'VILLARRICA', 'Tolima', 'COL', NULL, NULL, '14'),
(1003, 76001, 'CALI', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1004, 76020, 'ALCALÁ', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1005, 76036, 'ANDALUCÍA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1006, 76041, 'ANSERMANUEVO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1007, 76054, 'ARGELIA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1008, 76100, 'BOLÍVAR', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1009, 76109, 'BUENAVENTURA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1010, 76111, 'GUADALAJARA DE BUGA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1011, 76113, 'BUGALAGRANDE', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1012, 76122, 'CAICEDONIA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1013, 76126, 'CALIMA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1014, 76130, 'CANDELARIA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1015, 76147, 'CARTAGO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1016, 76233, 'DAGUA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1017, 76243, 'EL ÁGUILA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1018, 76246, 'EL CAIRO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1019, 76248, 'EL CERRITO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1020, 76250, 'EL DOVIO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1021, 76275, 'FLORIDA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1022, 76306, 'GINEBRA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1023, 76318, 'GUACARÍ', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1024, 76364, 'JAMUNDÍ', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1025, 76377, 'LA CUMBRE', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1026, 76400, 'LA UNIÓN', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1027, 76403, 'LA VICTORIA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1028, 76497, 'OBANDO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1029, 76520, 'PALMIRA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1030, 76563, 'PRADERA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1031, 76606, 'RESTREPO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1032, 76616, 'RIOFRÍO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1033, 76622, 'ROLDANILLO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1034, 76670, 'SAN PEDRO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1035, 76736, 'SEVILLA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1036, 76823, 'TORO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1037, 76828, 'TRUJILLO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1038, 76834, 'TULUÁ', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1039, 76845, 'ULLOA', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1040, 76863, 'VERSALLES', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1041, 76869, 'VIJES', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1042, 76890, 'YOTOCO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1043, 76892, 'YUMBO', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1044, 76895, 'ZARZAL', 'Valle del Cauca', 'COL', NULL, NULL, '14'),
(1045, 81001, 'ARAUCA', 'Arauca', 'COL', NULL, NULL, '14'),
(1046, 81065, 'ARAUQUITA', 'Arauca', 'COL', NULL, NULL, '14'),
(1047, 81220, 'CRAVO NORTE', 'Arauca', 'COL', NULL, NULL, '14'),
(1048, 81300, 'FORTUL', 'Arauca', 'COL', NULL, NULL, '14'),
(1049, 81591, 'PUERTO RONDÓN', 'Arauca', 'COL', NULL, NULL, '14'),
(1050, 81736, 'SARAVENA', 'Arauca', 'COL', NULL, NULL, '14'),
(1051, 81794, 'TAME', 'Arauca', 'COL', NULL, NULL, '14'),
(1052, 85001, 'YOPAL', 'Casanare', 'COL', NULL, NULL, '14'),
(1053, 85010, 'AGUAZUL', 'Casanare', 'COL', NULL, NULL, '14'),
(1054, 85015, 'CHAMEZA', 'Casanare', 'COL', NULL, NULL, '14'),
(1055, 85125, 'HATO COROZAL', 'Casanare', 'COL', NULL, NULL, '14'),
(1056, 85136, 'LA SALINA', 'Casanare', 'COL', NULL, NULL, '14'),
(1057, 85139, 'MANÍ', 'Casanare', 'COL', NULL, NULL, '14'),
(1058, 85162, 'MONTERREY', 'Casanare', 'COL', NULL, NULL, '14'),
(1059, 85225, 'NUNCHÍA', 'Casanare', 'COL', NULL, NULL, '14'),
(1060, 85230, 'OROCUÉ', 'Casanare', 'COL', NULL, NULL, '14'),
(1061, 85250, 'PAZ DE ARIPORO', 'Casanare', 'COL', NULL, NULL, '14'),
(1062, 85263, 'PORE', 'Casanare', 'COL', NULL, NULL, '14'),
(1063, 85279, 'RECETOR', 'Casanare', 'COL', NULL, NULL, '14'),
(1064, 85300, 'SABANALARGA', 'Casanare', 'COL', NULL, NULL, '14'),
(1065, 85315, 'SÁCAMA', 'Casanare', 'COL', NULL, NULL, '14'),
(1066, 85325, 'SAN LUIS DE PALENQUE', 'Casanare', 'COL', NULL, NULL, '14'),
(1067, 85400, 'TÁMARA', 'Casanare', 'COL', NULL, NULL, '14'),
(1068, 85410, 'TAURAMENA', 'Casanare', 'COL', NULL, NULL, '14'),
(1069, 85430, 'TRINIDAD', 'Casanare', 'COL', NULL, NULL, '14'),
(1070, 85440, 'VILLANUEVA', 'Casanare', 'COL', NULL, NULL, '14'),
(1071, 86001, 'MOCOA', 'Putumayo', 'COL', NULL, NULL, '14'),
(1072, 86219, 'COLÓN', 'Putumayo', 'COL', NULL, NULL, '14'),
(1073, 86320, 'ORITO', 'Putumayo', 'COL', NULL, NULL, '14'),
(1074, 86568, 'PUERTO ASÍS', 'Putumayo', 'COL', NULL, NULL, '14'),
(1075, 86569, 'PUERTO CAICEDO', 'Putumayo', 'COL', NULL, NULL, '14'),
(1076, 86571, 'PUERTO GUZMÁN', 'Putumayo', 'COL', NULL, NULL, '14'),
(1077, 86573, 'LEGUÍZAMO', 'Putumayo', 'COL', NULL, NULL, '14'),
(1078, 86749, 'SIBUNDOY', 'Putumayo', 'COL', NULL, NULL, '14'),
(1079, 86755, 'SAN FRANCISCO', 'Putumayo', 'COL', NULL, NULL, '14'),
(1080, 86757, 'SAN MIGUEL', 'Putumayo', 'COL', NULL, NULL, '14'),
(1081, 86760, 'SANTIAGO', 'Putumayo', 'COL', NULL, NULL, '14'),
(1082, 86865, 'VALLE DEL GUAMUEZ', 'Putumayo', 'COL', NULL, NULL, '14'),
(1083, 86885, 'VILLAGARZÓN', 'Putumayo', 'COL', NULL, NULL, '14'),
(1084, 88001, 'SAN ANDRÉS', 'Archipiélago de San Andrés, Providencia y Santa Catalina', 'COL', NULL, NULL, '14'),
(1085, 88564, 'PROVIDENCIA', 'Archipiélago de San Andrés, Providencia y Santa Catalina', 'COL', NULL, NULL, '14'),
(1086, 91001, 'LETICIA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1087, 91263, 'EL ENCANTO', 'Amazonas', 'COL', NULL, NULL, '14'),
(1088, 91405, 'LA CHORRERA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1089, 91407, 'LA PEDRERA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1090, 91430, 'LA VICTORIA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1091, 91460, 'MIRITI - PARANÁ', 'Amazonas', 'COL', NULL, NULL, '14'),
(1092, 91530, 'PUERTO ALEGRÍA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1093, 91536, 'PUERTO ARICA', 'Amazonas', 'COL', NULL, NULL, '14'),
(1094, 91540, 'PUERTO NARIÑO', 'Amazonas', 'COL', NULL, NULL, '14'),
(1095, 91669, 'PUERTO SANTANDER', 'Amazonas', 'COL', NULL, NULL, '14'),
(1096, 91798, 'TARAPACÁ', 'Amazonas', 'COL', NULL, NULL, '14'),
(1097, 94001, 'INÍRIDA', 'Guainía', 'COL', NULL, NULL, '14'),
(1098, 94343, 'BARRANCO MINAS', 'Guainía', 'COL', NULL, NULL, '14'),
(1099, 94663, 'MAPIRIPANA', 'Guainía', 'COL', NULL, NULL, '14'),
(1100, 94883, 'SAN FELIPE', 'Guainía', 'COL', NULL, NULL, '14'),
(1101, 94884, 'PUERTO COLOMBIA', 'Guainía', 'COL', NULL, NULL, '14'),
(1102, 94885, 'LA GUADALUPE', 'Guainía', 'COL', NULL, NULL, '14'),
(1103, 94886, 'CACAHUAL', 'Guainía', 'COL', NULL, NULL, '14'),
(1104, 94887, 'PANA PANA', 'Guainía', 'COL', NULL, NULL, '14'),
(1105, 94888, 'MORICHAL', 'Guainía', 'COL', NULL, NULL, '14'),
(1106, 95001, 'SAN JOSÉ DEL GUAVIARE', 'Guaviare', 'COL', NULL, NULL, '14'),
(1107, 95015, 'CALAMAR', 'Guaviare', 'COL', NULL, NULL, '14'),
(1108, 95025, 'EL RETORNO', 'Guaviare', 'COL', NULL, NULL, '14'),
(1109, 95200, 'MIRAFLORES', 'Guaviare', 'COL', NULL, NULL, '14'),
(1110, 97001, 'MITÚ', 'Vaupés', 'COL', NULL, NULL, '14'),
(1111, 97161, 'CARURU', 'Vaupés', 'COL', NULL, NULL, '14'),
(1112, 97511, 'PACOA', 'Vaupés', 'COL', NULL, NULL, '14'),
(1113, 97666, 'TARAIRA', 'Vaupés', 'COL', NULL, NULL, '14'),
(1114, 97777, 'PAPUNAUA', 'Vaupés', 'COL', NULL, NULL, '14'),
(1115, 97889, 'YAVARATÉ', 'Vaupés', 'COL', NULL, NULL, '14'),
(1116, 99001, 'PUERTO CARREÑO', 'Vichada', 'COL', NULL, NULL, '14'),
(1117, 99524, 'LA PRIMAVERA', 'Vichada', 'COL', NULL, NULL, '14'),
(1118, 99624, 'SANTA ROSALÍA', 'Vichada', 'COL', NULL, NULL, '14'),
(1119, 99773, 'CUMARIBO', 'Vichada', 'COL', NULL, NULL, '14'),
(1120, 696, 'CALGARY', 'ALBERTA', 'CA', '696', '71', '9'),
(1121, 1, 'LIMA', 'PERU', 'PE', '1', '1', '32'),
(1122, 602, 'CARACAS', 'VENEZUELA', 'VE', '602', '68', '44'),
(1123, 1365, 'MERIDA', 'VENEZUELA', 'VE', '1365', '122', '44'),
(1125, -1, 'DELRAY BEACH', 'FLORIDA', 'US', '-1', '74', '43'),
(1126, -2, 'HONDURAS', 'HONDURAS', 'HN', '-2', '49', '21'),
(1127, -3, 'SANTA ANA', 'VENEZUELA', 'VE', '-3', '-3', '44'),
(1128, -4, 'LIBERTADOR', 'VENEZUELA', 'VE', '-4', '68', '44'),
(1129, -5, 'MARACAIBO', 'VENEZUELA', 'VE', '786', '92', '44'),
(1130, -6, 'VILLA DEL ROSARIO', 'VENEZUELA', 'VE', '-6', '92', '44'),
(1131, 812, 'DENVER', 'COLORADO', 'US', '812', '99', '43'),
(1132, -7, 'VALENCIA', 'VENEZUELA', 'VE', '-7', '-7', '44'),
(1133, -8, 'SAN JUAN DE COLON', 'VENEZUELA', 'VE', '-8', '-8', '44'),
(1134, -9, 'WILHELMSHAVEN', 'ALEMANIA', 'DE', '-9', '-9', '1'),
(1135, -10, 'BERLIN', 'ALEMANIA', 'DE', '748', '77', '1'),
(1136, -11, 'VALENCIA', 'VENEZUELA', 'VE', '-11', '-11', '44'),
(1137, -12, 'SOLOTHURN', 'SUIZA', 'VE', '-12', '-12', '39'),
(1138, 1270, 'QUITO', 'ECUADOR', 'EC', '1270', '45', '17'),
(1139, 23815, 'TUCHIN', 'Córdoba', 'COL', NULL, NULL, '14'),
(1140, -13, 'SCHAUMBURG', 'ILLINOIS', 'US', '-13', '86', '43'),
(1141, -14, 'TEQUES', 'VENEZUELA', 'VE', '-14', '-14', '44'),
(1143, -15, 'SAN JUAN DE LOS MORROS', 'VENEZUELA', 'VE', '-15', '-15', '44'),
(1144, -16, 'BARQUISIMETO', 'VENEZUELA', 'VE', '-16', '-16', '44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobertura`
--

CREATE TABLE `cobertura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `limite` bigint(20) DEFAULT NULL,
  `vida` varchar(50) DEFAULT NULL,
  `accidente` varchar(50) DEFAULT NULL,
  `enfermedades` varchar(50) DEFAULT NULL,
  `indemnizacion` varchar(50) DEFAULT NULL,
  `entierro` varchar(50) DEFAULT NULL,
  `basicos` varchar(50) DEFAULT NULL,
  `uci` varchar(50) DEFAULT NULL,
  `incapacidad` varchar(50) DEFAULT NULL,
  `maternidad` varchar(50) DEFAULT NULL,
  `bono` varchar(50) DEFAULT NULL,
  `adecuacion` varchar(50) DEFAULT NULL,
  `prima` varchar(50) DEFAULT NULL,
  `edad1` varchar(10) DEFAULT NULL,
  `edad2` varchar(10) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobertura_allianz`
--

CREATE TABLE `cobertura_allianz` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `limite` bigint(20) DEFAULT NULL,
  `vida` varchar(50) DEFAULT NULL,
  `accidente` varchar(50) DEFAULT NULL,
  `enfermedades` varchar(50) DEFAULT NULL,
  `indemnizacion` varchar(50) DEFAULT NULL,
  `entierro` varchar(50) DEFAULT NULL,
  `basicos` varchar(50) DEFAULT NULL,
  `uci` varchar(50) DEFAULT NULL,
  `incapacidad` varchar(50) DEFAULT NULL,
  `maternidad` varchar(50) DEFAULT NULL,
  `bono` varchar(50) DEFAULT NULL,
  `adecuacion` varchar(50) DEFAULT NULL,
  `prima` varchar(50) DEFAULT NULL,
  `edad1` varchar(10) DEFAULT NULL,
  `edad2` varchar(10) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codeudor`
--

CREATE TABLE `codeudor` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `nombres2` varchar(100) DEFAULT NULL,
  `apellido1` varchar(100) DEFAULT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `ciudad_documento` varchar(50) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `dependencia` varchar(100) DEFAULT NULL,
  `direccion_oficina` varchar(100) DEFAULT NULL,
  `ciudad_oficina` varchar(100) DEFAULT NULL,
  `telefono_oficina` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo_empresarial` varchar(100) DEFAULT NULL,
  `situacion_laboral` varchar(100) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `conyuge_nombre` varchar(200) DEFAULT NULL,
  `conyuge_telefono` varchar(50) DEFAULT NULL,
  `conyuge_celular` varchar(50) DEFAULT NULL,
  `declara_renta` varchar(2) DEFAULT NULL,
  `persona_publica` varchar(2) DEFAULT NULL,
  `cuenta_numero` varchar(50) DEFAULT NULL,
  `cuenta_tipo` varchar(50) DEFAULT NULL,
  `entidad_bancaria` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `direccion_residencia` varchar(100) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `ciudad_residencia` varchar(50) DEFAULT NULL,
  `salario` bigint(20) DEFAULT NULL,
  `forma_pago` varchar(50) DEFAULT NULL,
  `tiempo_anio` int(11) DEFAULT NULL,
  `tiempo_meses` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `asociado` varchar(2) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_documento` date DEFAULT NULL,
  `estudios` varchar(50) DEFAULT NULL,
  `numero` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE `comite` (
  `comite_id` int(11) NOT NULL,
  `comite_solicitud_id` varchar(11) DEFAULT NULL,
  `comite_aprobacion` varchar(11) DEFAULT NULL,
  `comite_observacion` text DEFAULT NULL,
  `comite_user_id` varchar(11) DEFAULT NULL,
  `comite_fecha` varchar(20) DEFAULT NULL,
  `comite_tipo` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `cuota_min` int(11) DEFAULT NULL,
  `cuota_max` int(11) DEFAULT NULL,
  `valor_min` bigint(20) DEFAULT NULL,
  `valor_max` bigint(20) DEFAULT NULL,
  `tasa` float DEFAULT NULL,
  `salario_minimo` varchar(50) DEFAULT NULL,
  `fecha_deshabilitar` varchar(20) DEFAULT NULL,
  `fecha_deshabilitar2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `cuota_min`, `cuota_max`, `valor_min`, `valor_max`, `tasa`, `salario_minimo`, `fecha_deshabilitar`, `fecha_deshabilitar2`) VALUES
(1, 1, 12, 0, NULL, 1, '1160000', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_linea`
--

CREATE TABLE `config_linea` (
  `id` int(11) NOT NULL,
  `linea` varchar(11) DEFAULT NULL,
  `depende` varchar(50) DEFAULT NULL,
  `multiplicador` varchar(11) DEFAULT NULL,
  `valor_maximo` varchar(100) DEFAULT NULL,
  `meses_antiguedad` varchar(10) DEFAULT NULL,
  `meses_signo` varchar(50) DEFAULT NULL,
  `nomina` mediumtext DEFAULT NULL,
  `nomina_signo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_notificaciones`
--

CREATE TABLE `config_notificaciones` (
  `notificacion_id` int(11) NOT NULL,
  `notificacion_tipo` varchar(11) DEFAULT NULL,
  `notificacion_asunto` mediumtext DEFAULT NULL,
  `notificacion_cuerpo` longtext DEFAULT NULL,
  `notificacion_copias` mediumtext DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_textos`
--

CREATE TABLE `config_textos` (
  `texto_id` int(11) NOT NULL,
  `texto_paso` varchar(11) DEFAULT NULL,
  `texto_titulo` mediumtext DEFAULT NULL,
  `texto_cuerpo` longtext DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL,
  `orden` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos_linea`
--

CREATE TABLE `cupos_linea` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `linea` varchar(50) DEFAULT NULL,
  `cupo` varchar(50) DEFAULT NULL COMMENT 'codigo obligacion',
  `saldo_actual` bigint(20) DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `cedula` varchar(200) DEFAULT NULL,
  `desprendible_pago` varchar(200) DEFAULT NULL,
  `desprendible_pago2` varchar(200) DEFAULT NULL,
  `desprendible_pago3` varchar(200) DEFAULT NULL,
  `desprendible_pago4` varchar(200) DEFAULT NULL,
  `certificado_laboral` varchar(200) DEFAULT NULL,
  `otros_ingresos` varchar(200) DEFAULT NULL,
  `certificado_tradicion` varchar(200) DEFAULT NULL,
  `estado_obligacion` varchar(200) DEFAULT NULL,
  `estado_obligacion2` varchar(200) DEFAULT NULL,
  `estado_obligacion3` varchar(200) DEFAULT NULL,
  `factura_proforma` varchar(200) DEFAULT NULL,
  `recibo_matricula` varchar(200) DEFAULT NULL,
  `contrato_vivienda` varchar(200) DEFAULT NULL,
  `declaracion_renta` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_adicionales`
--

CREATE TABLE `documentos_adicionales` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `archivo` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `quien` int(11) DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `empresa_id` int(11) NOT NULL,
  `empresa_nombre` varchar(200) DEFAULT NULL,
  `empresa_nit` varchar(50) DEFAULT NULL,
  `empresa_logo` varchar(200) DEFAULT NULL,
  `empresa_direccion` varchar(200) DEFAULT NULL,
  `empresa_telefono` varchar(50) DEFAULT NULL,
  `empresa_celular` varchar(50) DEFAULT NULL,
  `empresa_prefijo` varchar(50) DEFAULT NULL,
  `empresa_cuenta` varchar(50) DEFAULT NULL,
  `empresa_plantilla` varchar(50) DEFAULT NULL,
  `empresa_correo` varchar(200) DEFAULT NULL,
  `empresa_ciudad` varchar(50) DEFAULT NULL,
  `empresa_representante_documento` varchar(50) DEFAULT NULL,
  `empresa_representante_nombres` varchar(50) DEFAULT NULL,
  `empresa_representante_apellido1` varchar(50) DEFAULT NULL,
  `empresa_representante_apellido2` varchar(50) DEFAULT NULL,
  `empresa_representante_ciudad_documento` varchar(50) DEFAULT NULL,
  `empresa_activo` varchar(11) DEFAULT NULL,
  `empresa_servicios` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`empresa_id`, `empresa_nombre`, `empresa_nit`, `empresa_logo`, `empresa_direccion`, `empresa_telefono`, `empresa_celular`, `empresa_prefijo`, `empresa_cuenta`, `empresa_plantilla`, `empresa_correo`, `empresa_ciudad`, `empresa_representante_documento`, `empresa_representante_nombres`, `empresa_representante_apellido1`, `empresa_representante_apellido2`, `empresa_representante_ciudad_documento`, `empresa_activo`, `empresa_servicios`) VALUES
(9, 'DEMO2', '12345', '', '', '', '', 'DE2', '', '000', '', '11001', '', '', '', '', '11001', '1', ''),
(8, 'DEMO', '12345', 'logo_afianzafondos2.png', '', '', '', 'DEM', '', '000', '', '11001', '', '', '', '', '11001', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `pregunta` int(11) DEFAULT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excepciones`
--

CREATE TABLE `excepciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(11) DEFAULT NULL,
  `linea` varchar(50) DEFAULT NULL,
  `activa` varchar(1) DEFAULT NULL,
  `observacion` mediumtext DEFAULT NULL,
  `quien` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias`
--

CREATE TABLE `garantias` (
  `garantia_id` int(11) NOT NULL,
  `garantia_nombre` mediumtext DEFAULT NULL,
  `garantia_texto` longtext DEFAULT NULL,
  `garantia_tipo` varchar(11) DEFAULT NULL,
  `garantia_activa` varchar(11) DEFAULT NULL,
  `garantia_empresas` mediumtext DEFAULT NULL,
  `orden` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `garantias`
--

INSERT INTO `garantias` (`garantia_id`, `garantia_nombre`, `garantia_texto`, `garantia_tipo`, `garantia_activa`, `garantia_empresas`, `orden`) VALUES
(1, 'PERSONAL', '', '1', '1', '8', '0'),
(2, 'PRENDA', '', '1', '1', '8', '2'),
(3, 'HIPOTECA', '', '1', '1', '8', '3'),
(4, 'PRIMA', '', '1', '1', '8', '4'),
(5, 'FONDO MUTUAL', '', '3', '1', '8', '5'),
(6, 'APORTES Y AHORROS', '', '1', '1', '8', '6'),
(7, 'CODEUDOR', '', '2', '1', '8', '7'),
(8, 'CODEUDOR2', '', '2', '1', '8', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestores`
--

CREATE TABLE `gestores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `activo` varchar(1) DEFAULT '1',
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inactivos`
--

CREATE TABLE `inactivos` (
  `id` int(11) NOT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_financiera`
--

CREATE TABLE `info_financiera` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `salario` bigint(20) DEFAULT NULL,
  `pension` bigint(20) DEFAULT NULL,
  `arriendos` bigint(20) DEFAULT NULL,
  `dividendos` bigint(20) DEFAULT NULL,
  `rentas` bigint(20) DEFAULT NULL,
  `otros_ingresos` bigint(20) DEFAULT NULL,
  `total_ingresos` bigint(20) DEFAULT NULL,
  `arrendamientos` bigint(20) DEFAULT NULL,
  `gastos_familiares` bigint(20) DEFAULT NULL,
  `obligaciones_financieras` bigint(20) DEFAULT NULL,
  `otros_gastos` bigint(20) DEFAULT NULL,
  `total_gastos` bigint(20) DEFAULT NULL,
  `capacidad_endeudamiento` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_pagina`
--

CREATE TABLE `info_pagina` (
  `info_pagina_id` bigint(20) NOT NULL,
  `info_pagina_facebook` varchar(255) DEFAULT NULL,
  `info_pagina_instagram` varchar(255) DEFAULT NULL,
  `info_pagina_twitter` varchar(255) DEFAULT NULL,
  `info_pagina_pinterest` varchar(255) DEFAULT NULL,
  `info_pagina_youtube` varchar(255) DEFAULT NULL,
  `info_pagina_flickr` varchar(255) DEFAULT NULL,
  `info_pagina_linkedin` varchar(255) DEFAULT NULL,
  `info_pagina_google` varchar(255) DEFAULT NULL,
  `info_pagina_telefono` varchar(255) DEFAULT NULL,
  `info_pagina_whatsapp` varchar(255) DEFAULT NULL,
  `info_pagina_correos_contacto` varchar(255) DEFAULT NULL,
  `info_pagina_direccion_contacto` text DEFAULT NULL,
  `info_pagina_informacion_contacto` text DEFAULT NULL,
  `info_pagina_informacion_contacto_footer` text DEFAULT NULL,
  `info_pagina_latitud` varchar(255) DEFAULT NULL,
  `info_pagina_longitud` varchar(255) DEFAULT NULL,
  `info_pagina_zoom` varchar(255) DEFAULT NULL,
  `info_pagina_descripcion` text DEFAULT NULL,
  `info_pagina_tags` text DEFAULT NULL,
  `info_pagina_robot` varchar(500) DEFAULT NULL,
  `info_pagina_sitemap` varchar(500) DEFAULT NULL,
  `info_pagina_scripts` text DEFAULT NULL,
  `info_pagina_scriptsbody` text DEFAULT NULL,
  `info_pagina_metricas` text DEFAULT NULL,
  `orden` bigint(20) DEFAULT NULL,
  `info_pagina_host` varchar(200) NOT NULL,
  `info_pagina_port` int(11) NOT NULL,
  `info_pagina_username` varchar(200) NOT NULL,
  `info_pagina_password` varchar(200) NOT NULL,
  `info_pagina_correo_remitente` varchar(200) NOT NULL,
  `info_pagina_nombre_remitente` varchar(200) NOT NULL,
  `info_pagina_correo_oculto` varchar(200) NOT NULL,
  `info_pagina_titulo_legal` varchar(200) NOT NULL,
  `info_pagina_descripcion_legal` longtext NOT NULL,
  `info_pagina_favicon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_patrimonial`
--

CREATE TABLE `info_patrimonial` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `concepto` varchar(50) DEFAULT NULL,
  `v1` bigint(20) DEFAULT NULL,
  `v2` bigint(20) DEFAULT NULL,
  `v3` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_credito`
--

CREATE TABLE `lineas_credito` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `tasa_cobrada` varchar(50) DEFAULT NULL,
  `tasa_real` varchar(50) DEFAULT NULL,
  `efectivo_anual` varchar(50) DEFAULT NULL,
  `max_meses` int(11) DEFAULT NULL,
  `maxMonto` int(11) DEFAULT NULL,
  `descripcionGeneral` mediumtext DEFAULT NULL,
  `requisitos` mediumtext DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `archivo1` int(11) DEFAULT NULL,
  `archivo2` int(11) DEFAULT NULL,
  `archivo3` int(11) DEFAULT NULL,
  `archivo4` int(11) DEFAULT NULL,
  `archivo22` int(11) DEFAULT NULL,
  `archivo23` int(11) DEFAULT NULL,
  `archivo24` int(11) DEFAULT NULL,
  `certificado_tradicion` int(11) DEFAULT NULL,
  `estado_obligacion` int(11) DEFAULT NULL,
  `estado_obligacion2` int(11) DEFAULT NULL,
  `estado_obligacion3` int(11) DEFAULT NULL,
  `factura_proforma` int(11) DEFAULT NULL,
  `recibo_matricula` int(11) DEFAULT NULL,
  `veces_aportes` varchar(11) DEFAULT NULL,
  `veces_salario` varchar(11) DEFAULT NULL,
  `veces_salario_minimo` varchar(11) DEFAULT NULL,
  `porcentaje_extra` varchar(11) DEFAULT NULL,
  `garantias` mediumtext DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineas_credito`
--

INSERT INTO `lineas_credito` (`id`, `codigo`, `nombre`, `detalle`, `tasa_cobrada`, `tasa_real`, `efectivo_anual`, `max_meses`, `maxMonto`, `descripcionGeneral`, `requisitos`, `activo`, `archivo1`, `archivo2`, `archivo3`, `archivo4`, `archivo22`, `archivo23`, `archivo24`, `certificado_tradicion`, `estado_obligacion`, `estado_obligacion2`, `estado_obligacion3`, `factura_proforma`, `recibo_matricula`, `veces_aportes`, `veces_salario`, `veces_salario_minimo`, `porcentaje_extra`, `garantias`, `empresa_id`) VALUES
(1, 'OR', 'Ordinario', '', '0', '1.2', '15.39', 12, 0, '<p>linea cr&eacute;dito ordinario</p>', '<p>Garantia: un codeudor</p>', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', NULL, '', '40', NULL, '8'),
(2, 'LI', 'Libre inversi&oacute;n', '', '0', '1.5', '19.56', 24, 0, '<p>modalidad libre inversi&oacute;n</p>', '<p>garant&iacute;as: personal, un codeudor</p>', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '1', '', '40', NULL, '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_analista`
--

CREATE TABLE `linea_analista` (
  `id` int(11) NOT NULL,
  `linea_id` int(11) DEFAULT NULL,
  `analista_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `solicitud` varchar(11) DEFAULT NULL,
  `post` text DEFAULT NULL,
  `files` text DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `detalle` longtext DEFAULT NULL,
  `quien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `solicitud`, `post`, `files`, `fecha`, `detalle`, `quien`) VALUES
(1, '1', 'Array\n(\n    [csrf] => E8WQ40NPUU6Q-S5,OGYI\n    [csrf_section] => manage_solicitudes_20240405120236\n    [id] => 1\n    [estado_autorizo] => 1\n    [validacion] => 1\n    [tramite] => \n    [gestor_comercial] => \n    [asignado] => \n    [fecha_asignado] => \n    [pagare] => \n    [quien] => \n    [fecha_estado] => \n    [numero_obligacion] => \n    [autorizo] => \n    [fecha_autorizo] => \n    [cantidad_creditos_vigentes] => \n    [saldo_actual] => \n    [condiciones] => \n    [linea] => \n    [destino] => \n    [valor] => \n    [monto_solicitado] => \n    [cuotas] => \n    [valor_cuota] => \n    [frecuencia] => 6\n    [cuotas_extra] => \n    [valor_extra] => \n    [tasa] => \n    [valor_desembolso] => \n    [monto_desembolso] => 1\n    [linea_desembolso] => \n    [cuotas_desembolso] => \n    [valor_cuota_desembolso] => \n    [tasa_desembolso] => \n    [cuotas_extra_desembolso] => \n    [valor_extra_desembolso] => \n    [fecha] => \n    [radicacion] => \n    [paso] => 7\n    [cedula] => 12345\n    [nombres] => \n    [nombres2] => \n    [apellido1] => \n    [apellido2] => \n    [sexo] => \n    [tipo_documento] => \n    [documento] => \n    [fecha_documento] => 2024-04-05\n    [ciudad_documento] => \n    [fecha_nacimiento] => 2024-04-05\n    [empresa] => \n    [dependencia] => \n    [nomenclatura1] => \n    [direccion_oficina] => \n    [ciudad_oficina] => \n    [telefono_oficina] => \n    [celular] => \n    [nomenclatura2] => \n    [direccion_residencia] => \n    [barrio] => \n    [ciudad_residencia] => \n    [telefono] => \n    [correo_empresarial] => \n    [correo_personal] => \n    [situacion_laboral] => \n    [cual] => \n    [ocupacion] => \n    [estado_civil] => \n    [conyuge_nombre] => \n    [conyuge_telefono] => \n    [conyuge_celular] => \n    [peso] => \n    [estatura] => \n    [declara_renta] => \n    [persona_publica] => \n    [cuenta_numero] => \n    [cuenta_tipo] => \n    [entidad_bancaria] => \n    [ingreso_mensual] => \n    [otros_ingresos] => \n    [total_ingresos] => \n    [canon_arrendamiento] => \n    [otros_gastos] => \n    [total_egresos] => \n    [activos] => \n    [pasivos] => \n    [patrimonio] => \n    [descripcion_ingresos] => \n    [descripcion_recursos] => \n    [tipo_garantia] => \n    [FM_meses] => \n    [fecha_ingreso] => \n    [cargo] => \n    [fecha_afiliacion] => \n    [personas_cargo] => \n    [numero_hijos] => \n    [observaciones] => \n    [observacion_analista] => \n    [observacion_auxiliar] => \n    [observacion_riesgo] => \n    [incompleta] => \n    [fecha_anterior] => \n    [asignado_anterior] => \n    [enviar_pagare] => 0\n)\n', 'Array\n(\n    [condiciones_adjunto] => Array\n        (\n            [name] => \n            [type] => \n            [tmp_name] => \n            [error] => 4\n            [size] => 0\n        )\n\n)\n', '2024-04-05 12:03:01', 'EDITAR SOLICITUD', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_cedulas`
--

CREATE TABLE `log_cedulas` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `proceso` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `request` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagare_deceval`
--

CREATE TABLE `pagare_deceval` (
  `id` int(11) NOT NULL,
  `solicitud` varchar(50) DEFAULT NULL,
  `empresa` varchar(11) DEFAULT NULL,
  `pagare` varchar(50) DEFAULT NULL,
  `pagare_deceval` varchar(50) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `modalidad` varchar(50) DEFAULT NULL,
  `fecha_firma` varchar(20) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `fecha_firma1` varchar(20) DEFAULT NULL,
  `ip1` varchar(100) DEFAULT NULL,
  `fecha_firma2` varchar(20) DEFAULT NULL,
  `ip2` varchar(100) DEFAULT NULL,
  `fecha_firma3` varchar(20) DEFAULT NULL,
  `ip3` varchar(20) DEFAULT NULL,
  `verificado` varchar(20) DEFAULT NULL,
  `fecha_firma_deceval` varchar(50) DEFAULT NULL,
  `estado_deceval` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `rango_id` int(11) NOT NULL,
  `rango_codigo` varchar(20) DEFAULT NULL,
  `rango_min` varchar(11) DEFAULT NULL,
  `rango_max` varchar(11) DEFAULT NULL,
  `rango_tasa_mensual` float DEFAULT NULL,
  `rango_tasa_anual` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referenciacion`
--

CREATE TABLE `referenciacion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `solicitud` varchar(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `relacion` varchar(50) DEFAULT NULL,
  `actividad` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `direccion2` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `tipo_vivienda` varchar(50) DEFAULT NULL,
  `tiempo_residencia` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `conyuge` varchar(50) DEFAULT NULL,
  `personas_cargo` varchar(50) DEFAULT NULL,
  `personas_cuantas` varchar(10) DEFAULT NULL,
  `sabia` varchar(200) DEFAULT NULL,
  `tiempo_conoce` varchar(100) DEFAULT NULL,
  `esta_deacuerdo` varchar(50) DEFAULT NULL,
  `sabe_bien` varchar(200) DEFAULT NULL,
  `sabe_bien2` varchar(200) DEFAULT NULL,
  `donde` varchar(200) DEFAULT NULL,
  `actividad_economica2` varchar(200) DEFAULT NULL,
  `confirma_nombre` varchar(1) DEFAULT NULL,
  `confirma_cedula` varchar(1) DEFAULT NULL,
  `confirma_telefonos` varchar(1) DEFAULT NULL,
  `confirma_direccion` varchar(1) DEFAULT NULL,
  `confirma_email` varchar(1) DEFAULT NULL,
  `confirma_empresa` varchar(1) DEFAULT NULL,
  `ref_persona` varchar(200) DEFAULT NULL,
  `ref_cargo` varchar(100) DEFAULT NULL,
  `ref_empresa` varchar(100) DEFAULT NULL,
  `ref_direccion` varchar(100) DEFAULT NULL,
  `ref_contrato` varchar(100) DEFAULT NULL,
  `ref_antiguedad` varchar(100) DEFAULT NULL,
  `ref_opinion` varchar(100) DEFAULT NULL,
  `quien` varchar(11) NOT NULL,
  `telefonoB` varchar(30) DEFAULT NULL,
  `celularB` varchar(30) DEFAULT NULL,
  `describeB` mediumtext DEFAULT NULL,
  `tiene_inmueble` varchar(10) DEFAULT NULL,
  `tipo_inmueble` varchar(50) DEFAULT NULL,
  `conoce_monto` varchar(10) DEFAULT NULL,
  `conoce_valor` varchar(20) DEFAULT NULL,
  `conoce_plazo` varchar(10) DEFAULT NULL,
  `conoce_linea` varchar(30) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `referencia_codeudor` varchar(100) DEFAULT NULL,
  `comentarios` mediumtext DEFAULT NULL,
  `comentariosB` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `nombres` varchar(200) DEFAULT NULL,
  `parentesco` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `actividad` varchar(50) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `telefono_empresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_laboral`
--

CREATE TABLE `referencia_laboral` (
  `id` int(11) NOT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `asociado` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `fosyga` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_ingreso` varchar(50) DEFAULT NULL,
  `entidad` varchar(50) DEFAULT NULL,
  `telefono_entidad` varchar(50) DEFAULT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `rues` varchar(100) DEFAULT NULL,
  `fecha_ingreso_entidad` varchar(20) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `salario` varchar(20) DEFAULT NULL,
  `referenciador` varchar(100) DEFAULT NULL,
  `cargo_referenciador` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `seccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `linea` varchar(11) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `monto_solicitado` varchar(20) DEFAULT NULL,
  `monto_desembolso` varchar(50) DEFAULT NULL,
  `valor_desembolso` varchar(50) DEFAULT NULL,
  `linea_desembolso` varchar(11) DEFAULT NULL,
  `cuotas_desembolso` varchar(11) DEFAULT NULL,
  `valor_cuota_desembolso` varchar(20) DEFAULT NULL,
  `tasa_desembolso` varchar(20) DEFAULT NULL,
  `cuotas_extra_desembolso` varchar(11) DEFAULT NULL,
  `valor_extra_desembolso` varchar(20) DEFAULT NULL,
  `cuotas` varchar(11) DEFAULT NULL,
  `valor_cuota` varchar(20) DEFAULT NULL,
  `cuotas_extra` varchar(11) DEFAULT NULL,
  `valor_extra` varchar(20) DEFAULT NULL,
  `tasa` varchar(20) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `validacion` varchar(11) DEFAULT NULL,
  `radicacion` varchar(100) DEFAULT NULL,
  `paso` varchar(11) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `nombres2` varchar(100) DEFAULT NULL,
  `apellido1` varchar(100) DEFAULT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `fecha_documento` varchar(20) DEFAULT NULL,
  `ciudad_documento` varchar(200) DEFAULT NULL,
  `fecha_nacimiento` varchar(20) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `dependencia` varchar(100) DEFAULT NULL,
  `direccion_oficina` varchar(100) DEFAULT NULL,
  `ciudad_oficina` varchar(100) DEFAULT NULL,
  `telefono_oficina` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `direccion_residencia` varchar(100) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `ciudad_residencia` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo_empresarial` varchar(100) DEFAULT NULL,
  `correo_personal` varchar(100) DEFAULT NULL,
  `situacion_laboral` varchar(100) DEFAULT NULL,
  `cual` varchar(100) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `estado_civil` varchar(50) DEFAULT NULL,
  `conyuge_nombre` varchar(200) DEFAULT NULL,
  `conyuge_telefono` varchar(50) DEFAULT NULL,
  `conyuge_celular` varchar(50) DEFAULT NULL,
  `estudios` varchar(50) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `estatura` varchar(50) DEFAULT NULL,
  `declara_renta` varchar(2) DEFAULT NULL,
  `persona_publica` varchar(2) DEFAULT NULL,
  `cuenta_numero` varchar(100) DEFAULT NULL,
  `cuenta_tipo` varchar(50) DEFAULT NULL,
  `entidad_bancaria` varchar(100) DEFAULT NULL,
  `ingreso_mensual` varchar(20) DEFAULT NULL,
  `otros_ingresos` varchar(20) DEFAULT NULL,
  `total_ingresos` varchar(20) DEFAULT NULL,
  `canon_arrendamiento` varchar(20) DEFAULT NULL,
  `otros_gastos` varchar(20) DEFAULT NULL,
  `total_egresos` varchar(20) DEFAULT NULL,
  `activos` varchar(20) DEFAULT NULL,
  `pasivos` varchar(20) DEFAULT NULL,
  `patrimonio` varchar(20) DEFAULT NULL,
  `descripcion_ingresos` mediumtext DEFAULT NULL,
  `descripcion_recursos` mediumtext DEFAULT NULL,
  `tipo_garantia` varchar(50) DEFAULT NULL,
  `FM_meses` varchar(11) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `observacion_analista` mediumtext DEFAULT NULL,
  `observacion_auxiliar` mediumtext DEFAULT NULL,
  `observacion_riesgo` mediumtext DEFAULT NULL,
  `tramite` varchar(50) DEFAULT NULL,
  `gestor_comercial` varchar(200) DEFAULT NULL,
  `asignado` varchar(11) DEFAULT NULL,
  `fecha_asignado` varchar(20) DEFAULT NULL,
  `pagare` varchar(200) DEFAULT NULL,
  `quien` varchar(11) DEFAULT NULL,
  `fecha_estado` varchar(20) DEFAULT NULL,
  `numero_obligacion` varchar(100) DEFAULT NULL,
  `autorizo` varchar(11) DEFAULT NULL,
  `fecha_autorizo` varchar(20) DEFAULT NULL,
  `estado_autorizo` varchar(11) DEFAULT NULL,
  `incompleta` text DEFAULT NULL,
  `observacion_cambio_garantia` text DEFAULT NULL,
  `fecha_anterior` varchar(20) DEFAULT NULL,
  `asignado_anterior` varchar(11) DEFAULT NULL,
  `periodo_gracia` varchar(11) DEFAULT NULL,
  `cambio_garantia_id` varchar(100) DEFAULT NULL,
  `observacion_auxiliar_fecha` varchar(20) DEFAULT NULL,
  `observacion_riesgo_fecha` varchar(20) DEFAULT NULL,
  `acepta` varchar(2) DEFAULT NULL,
  `acepta_observacion` mediumtext DEFAULT NULL,
  `acepta_fecha` varchar(20) DEFAULT NULL,
  `acepta1` varchar(2) DEFAULT NULL,
  `acepta_observacion1` mediumtext DEFAULT NULL,
  `acepta_fecha1` varchar(20) DEFAULT NULL,
  `acepta2` varchar(2) DEFAULT NULL,
  `acepta_observacion2` mediumtext DEFAULT NULL,
  `acepta_fecha2` varchar(20) DEFAULT NULL,
  `asegurable` varchar(1) DEFAULT NULL,
  `quien_asegurable` varchar(11) DEFAULT NULL,
  `fecha_asegurable` varchar(20) DEFAULT NULL,
  `cantidad_creditos_vigentes` varchar(20) DEFAULT NULL,
  `saldo_actual` varchar(50) DEFAULT NULL,
  `aseguradora` varchar(50) DEFAULT NULL,
  `fecha_envio` varchar(20) DEFAULT NULL,
  `fecha_estudio` varchar(20) DEFAULT NULL,
  `comentario_analista` mediumtext DEFAULT NULL,
  `comentario_analista_fecha` varchar(20) DEFAULT NULL,
  `consecutivo_radicado` text DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `recoger_valor` varchar(20) DEFAULT NULL,
  `recoger_detalle` text DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `cedula`, `linea`, `destino`, `valor`, `monto_solicitado`, `monto_desembolso`, `valor_desembolso`, `linea_desembolso`, `cuotas_desembolso`, `valor_cuota_desembolso`, `tasa_desembolso`, `cuotas_extra_desembolso`, `valor_extra_desembolso`, `cuotas`, `valor_cuota`, `cuotas_extra`, `valor_extra`, `tasa`, `fecha`, `validacion`, `radicacion`, `paso`, `nombres`, `nombres2`, `apellido1`, `apellido2`, `sexo`, `tipo_documento`, `documento`, `fecha_documento`, `ciudad_documento`, `fecha_nacimiento`, `empresa`, `dependencia`, `direccion_oficina`, `ciudad_oficina`, `telefono_oficina`, `celular`, `direccion_residencia`, `barrio`, `ciudad_residencia`, `telefono`, `correo_empresarial`, `correo_personal`, `situacion_laboral`, `cual`, `ocupacion`, `estado_civil`, `conyuge_nombre`, `conyuge_telefono`, `conyuge_celular`, `estudios`, `peso`, `estatura`, `declara_renta`, `persona_publica`, `cuenta_numero`, `cuenta_tipo`, `entidad_bancaria`, `ingreso_mensual`, `otros_ingresos`, `total_ingresos`, `canon_arrendamiento`, `otros_gastos`, `total_egresos`, `activos`, `pasivos`, `patrimonio`, `descripcion_ingresos`, `descripcion_recursos`, `tipo_garantia`, `FM_meses`, `observaciones`, `observacion_analista`, `observacion_auxiliar`, `observacion_riesgo`, `tramite`, `gestor_comercial`, `asignado`, `fecha_asignado`, `pagare`, `quien`, `fecha_estado`, `numero_obligacion`, `autorizo`, `fecha_autorizo`, `estado_autorizo`, `incompleta`, `observacion_cambio_garantia`, `fecha_anterior`, `asignado_anterior`, `periodo_gracia`, `cambio_garantia_id`, `observacion_auxiliar_fecha`, `observacion_riesgo_fecha`, `acepta`, `acepta_observacion`, `acepta_fecha`, `acepta1`, `acepta_observacion1`, `acepta_fecha1`, `acepta2`, `acepta_observacion2`, `acepta_fecha2`, `asegurable`, `quien_asegurable`, `fecha_asegurable`, `cantidad_creditos_vigentes`, `saldo_actual`, `aseguradora`, `fecha_envio`, `fecha_estudio`, `comentario_analista`, `comentario_analista_fecha`, `consecutivo_radicado`, `numero`, `recoger_valor`, `recoger_detalle`, `empresa_id`) VALUES
(1, '12345', '0', '', '0', '0', '1', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '1', '', '7', '', '', '', '', '', '', '', '2024-04-05', '', '2024-04-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', NULL, '0', '', '', '', '', '', '', '0', '', '', '0', '', '', '-2', '2024-04-05', '1', '', NULL, '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL,
  `metodo` varchar(50) DEFAULT NULL,
  `xml` mediumtext DEFAULT NULL,
  `res` mediumtext DEFAULT NULL,
  `exitoso` varchar(50) DEFAULT NULL,
  `codigoError` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `numero_solicitud` varchar(50) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `quien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `codigo_nomina` varchar(50) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `ext` varchar(50) DEFAULT NULL,
  `nivel` varchar(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `barrio` varchar(100) DEFAULT NULL,
  `activo` varchar(11) DEFAULT '1',
  `ciudad_documento` varchar(100) DEFAULT NULL,
  `fecha_expedicion` varchar(20) DEFAULT NULL,
  `ciudad_residencia` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` varchar(20) DEFAULT NULL,
  `correo_corporativo` varchar(200) DEFAULT NULL,
  `cuotas` varchar(1) DEFAULT NULL,
  `paso` varchar(11) DEFAULT '1',
  `cupo_inicial` varchar(20) DEFAULT NULL,
  `cupo_actual` varchar(20) DEFAULT NULL,
  `cupo_actual_soat` varchar(20) DEFAULT NULL,
  `sueldo` varchar(20) DEFAULT NULL,
  `aportes` varchar(50) DEFAULT NULL,
  `ciudad_oficina` varchar(100) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `fecha_afiliacion` varchar(20) DEFAULT NULL,
  `fecha_ingreso` varchar(20) DEFAULT NULL,
  `habilitar_consolidacion` varchar(1) DEFAULT NULL,
  `habilitar_vehiculo` varchar(1) DEFAULT NULL,
  `habilitar_vivienda` varchar(1) DEFAULT NULL,
  `pass_actualizado` varchar(1) DEFAULT NULL,
  `password_codificado` varchar(200) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `empresa_id` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `codigo_nomina`, `correo`, `celular`, `telefono`, `ext`, `nivel`, `direccion`, `barrio`, `activo`, `ciudad_documento`, `fecha_expedicion`, `ciudad_residencia`, `fecha_nacimiento`, `correo_corporativo`, `cuotas`, `paso`, `cupo_inicial`, `cupo_actual`, `cupo_actual_soat`, `sueldo`, `aportes`, `ciudad_oficina`, `fecha`, `fecha_afiliacion`, `fecha_ingreso`, `habilitar_consolidacion`, `habilitar_vehiculo`, `habilitar_vivienda`, `pass_actualizado`, `password_codificado`, `documento`, `nombre2`, `empresa_id`) VALUES
(1, '12345', NULL, 'PEDRO PEREZ PARRA', '', 'rmbeltran.22@gmail.com', '3152097744', '3152097744', '', '2', 'CR 123  No 14  B - 70 TO 9 AP 904', '', '1', '', '', '', '1988-04-21', '', '', '', '', '', '', '', '', '', '2024-03-14', '', '', '0', '0', '0', '', '', '', '', '8'),
(-2, 'admin', '$2y$10$dgIAkK90LMylra25XMkJiuFv4Jv/Fpe9gzJkNm.qVHF4wLiG89iuu', 'Administrador', NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '$2y$10$oMF1.Bw3Dh9xa1WNkrZDuer/NUpVH3Rnz4woCAT4wP/E7G9j99v3u', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actas`
--
ALTER TABLE `actas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actas_items`
--
ALTER TABLE `actas_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asegurabilidad`
--
ALTER TABLE `asegurabilidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitud` (`solicitud`);

--
-- Indices de la tabla `asegurabilidad_antecedentes`
--
ALTER TABLE `asegurabilidad_antecedentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asegurabilidad_beneficiarios`
--
ALTER TABLE `asegurabilidad_beneficiarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`,`i`);

--
-- Indices de la tabla `asegurabilidad_enfermedades`
--
ALTER TABLE `asegurabilidad_enfermedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asegurabilidad_enfermedades_items`
--
ALTER TABLE `asegurabilidad_enfermedades_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enfermedad` (`enfermedad`,`formulario`);

--
-- Indices de la tabla `asegurabilidad_medicos`
--
ALTER TABLE `asegurabilidad_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_fecha` (`cedula`,`fecha`),
  ADD UNIQUE KEY `cedula_valor_fecha` (`cedula`,`valor`,`fecha`);

--
-- Indices de la tabla `cedulas`
--
ALTER TABLE `cedulas`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indices de la tabla `cedula_deceval`
--
ALTER TABLE `cedula_deceval`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `cobertura`
--
ALTER TABLE `cobertura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cobertura_allianz`
--
ALTER TABLE `cobertura_allianz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `codeudor`
--
ALTER TABLE `codeudor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comite`
--
ALTER TABLE `comite`
  ADD PRIMARY KEY (`comite_id`),
  ADD UNIQUE KEY `comite_solicitud_id` (`comite_solicitud_id`,`comite_user_id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config_linea`
--
ALTER TABLE `config_linea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config_notificaciones`
--
ALTER TABLE `config_notificaciones`
  ADD PRIMARY KEY (`notificacion_id`);

--
-- Indices de la tabla `config_textos`
--
ALTER TABLE `config_textos`
  ADD PRIMARY KEY (`texto_id`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupos_linea`
--
ALTER TABLE `cupos_linea`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`,`linea`),
  ADD KEY `linea` (`linea`),
  ADD KEY `cedula_2` (`cedula`),
  ADD KEY `cupo` (`cupo`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitud` (`solicitud`,`tipo`);

--
-- Indices de la tabla `documentos_adicionales`
--
ALTER TABLE `documentos_adicionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `excepciones`
--
ALTER TABLE `excepciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `garantias`
--
ALTER TABLE `garantias`
  ADD PRIMARY KEY (`garantia_id`);

--
-- Indices de la tabla `gestores`
--
ALTER TABLE `gestores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indices de la tabla `inactivos`
--
ALTER TABLE `inactivos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `info_financiera`
--
ALTER TABLE `info_financiera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `info_pagina`
--
ALTER TABLE `info_pagina`
  ADD PRIMARY KEY (`info_pagina_id`);

--
-- Indices de la tabla `info_patrimonial`
--
ALTER TABLE `info_patrimonial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `concepto` (`concepto`),
  ADD KEY `solicitud` (`solicitud`);

--
-- Indices de la tabla `lineas_credito`
--
ALTER TABLE `lineas_credito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea_analista`
--
ALTER TABLE `linea_analista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `quien` (`quien`);

--
-- Indices de la tabla `log_cedulas`
--
ALTER TABLE `log_cedulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `proceso` (`proceso`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pagare_deceval`
--
ALTER TABLE `pagare_deceval`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitud` (`solicitud`),
  ADD KEY `estado` (`estado`),
  ADD KEY `empresa` (`empresa`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`rango_id`);

--
-- Indices de la tabla `referenciacion`
--
ALTER TABLE `referenciacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referencia_laboral`
--
ALTER TABLE `referencia_laboral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `paso` (`paso`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numero_solicitud` (`numero_solicitud`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `codigoError` (`codigoError`),
  ADD KEY `exitoso` (`exitoso`),
  ADD KEY `metodo` (`metodo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `activo` (`activo`),
  ADD KEY `correo` (`correo`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `pass_actualizado` (`pass_actualizado`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actas`
--
ALTER TABLE `actas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actas_items`
--
ALTER TABLE `actas_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad`
--
ALTER TABLE `asegurabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad_antecedentes`
--
ALTER TABLE `asegurabilidad_antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad_beneficiarios`
--
ALTER TABLE `asegurabilidad_beneficiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad_enfermedades`
--
ALTER TABLE `asegurabilidad_enfermedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad_enfermedades_items`
--
ALTER TABLE `asegurabilidad_enfermedades_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asegurabilidad_medicos`
--
ALTER TABLE `asegurabilidad_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cedula_deceval`
--
ALTER TABLE `cedula_deceval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1145;

--
-- AUTO_INCREMENT de la tabla `cobertura`
--
ALTER TABLE `cobertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobertura_allianz`
--
ALTER TABLE `cobertura_allianz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codeudor`
--
ALTER TABLE `codeudor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comite`
--
ALTER TABLE `comite`
  MODIFY `comite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `config_linea`
--
ALTER TABLE `config_linea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupos_linea`
--
ALTER TABLE `cupos_linea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos_adicionales`
--
ALTER TABLE `documentos_adicionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `excepciones`
--
ALTER TABLE `excepciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `garantias`
--
ALTER TABLE `garantias`
  MODIFY `garantia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gestores`
--
ALTER TABLE `gestores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inactivos`
--
ALTER TABLE `inactivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info_financiera`
--
ALTER TABLE `info_financiera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info_pagina`
--
ALTER TABLE `info_pagina`
  MODIFY `info_pagina_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info_patrimonial`
--
ALTER TABLE `info_patrimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineas_credito`
--
ALTER TABLE `lineas_credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `linea_analista`
--
ALTER TABLE `linea_analista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `log_cedulas`
--
ALTER TABLE `log_cedulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagare_deceval`
--
ALTER TABLE `pagare_deceval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `rango_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referenciacion`
--
ALTER TABLE `referenciacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referencia_laboral`
--
ALTER TABLE `referencia_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
