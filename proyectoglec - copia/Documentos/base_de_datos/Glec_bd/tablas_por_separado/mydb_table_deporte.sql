
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `iddeporte` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`iddeporte`, `descripcion`, `discontinuado`) VALUES
(1, 'Futbol', NULL),
(2, 'Basquet', NULL);
