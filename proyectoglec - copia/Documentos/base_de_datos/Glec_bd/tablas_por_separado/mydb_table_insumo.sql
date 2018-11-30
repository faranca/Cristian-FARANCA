
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `idinsumo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `stock` smallint(2) NOT NULL,
  `precio` float NOT NULL,
  `deporte_iddeporte` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`idinsumo`, `descripcion`, `stock`, `precio`, `deporte_iddeporte`, `discontinuado`) VALUES
(1, 'Zapatillas de basquet', 2, 100, 2, NULL),
(2, 'Canilleras adulto', 2, 50, 1, NULL);
