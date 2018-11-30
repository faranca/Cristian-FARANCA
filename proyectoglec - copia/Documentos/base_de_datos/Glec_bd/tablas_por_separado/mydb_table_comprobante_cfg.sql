
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_cfg`
--

CREATE TABLE `comprobante_cfg` (
  `idcomprobantecfg` int(11) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  `prefijo` int(11) NOT NULL,
  `numero_inicial` int(11) NOT NULL,
  `ultimo_numero` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprobante_cfg`
--

INSERT INTO `comprobante_cfg` (`idcomprobantecfg`, `tipo`, `prefijo`, `numero_inicial`, `ultimo_numero`, `discontinuado`) VALUES
(1, 'B', 1, 1, 1, NULL),
(2, 'B', 1, 2, 3, NULL),
(3, 'B', 1, 3, 7, NULL);
