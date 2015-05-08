--
-- Estructura de tabla para la tabla `programaciones`
--

CREATE TABLE IF NOT EXISTS `programaciones` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_inicio` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hora_fin` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `conductores` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `programaciones`
--

INSERT INTO `programaciones` (`prog_id`, `nombre`, `descripcion`, `hora_inicio`, `hora_fin`, `conductores`) VALUES
(1, 'aaa', 'aaa', '00:00', '00:00', 'aaa'),
(2, 'bbb', 'bbb', '00:00', '00:00', 'bbb'),
(3, 'ccc', 'ccc', '00:00', '00:00', 'ccc'),
(4, 'ddd', 'ddd', '00:00', '00:00', 'ddd'),
(5, 'eee', 'eee', '00:00', '00:00', 'eee'),
(6, 'fff', 'fff', '00:00', '00:00', 'fff'),
(7, 'ggg', 'ggg', '00:00', '00:00', 'ggg'),
(8, 'hhh', 'hhh', '00:00', '00:00', 'hhh'),
(9, 'iii', 'iii', '00:00', '00:00', 'iii'),
(10, 'jjj', 'jjj', '00:00', '00:00', 'jjj');