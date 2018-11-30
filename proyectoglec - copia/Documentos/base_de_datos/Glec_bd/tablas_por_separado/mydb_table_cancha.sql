
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `idcancha` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `valor` float NOT NULL,
  `deporte_iddeporte` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`idcancha`, `descripcion`, `valor`, `deporte_iddeporte`, `discontinuado`) VALUES
(1, 'Futbol cancha1', 350, 1, NULL),
(2, 'Futbol cancha2', 350, 1, NULL),
(5, 'Futbol cancha3', 350, 1, NULL),
(6, 'Basquet cancha1', 450, 2, NULL),
(7, 'Basquet cancha2', 450, 2, NULL),
(8, 'Basquet cancha3', 450, 2, NULL);
