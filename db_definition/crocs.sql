--
-- Base de datos: `daw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crocs`
--

CREATE TABLE IF NOT EXISTS `crocs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `color` varchar(50) NOT NULL,
  `talla` int(10) unsigned NOT NULL,
  `precio` decimal(5,2) unsigned NOT NULL,
  `temporada` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `crocs`
--

INSERT INTO `crocs` (`id`, `nombre`, `color`, `talla`, `precio`, `temporada`) VALUES
(1, 'classic', 'white', 38, '39.90', '2011-04-04'),
(2, 'crocband', 'navy', 43, '49.90', '2011-06-01'),
(3, 'berryessa suede boot', 'espresso', 37, '89.90', '2013-09-03'),
(4, 'patriciaII', 'rapsberry', 37, '44.95', '2013-06-12'),
(5, 'yukon sport', 'espresso', 45, '64.95', '2014-01-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
