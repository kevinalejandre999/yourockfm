CREATE TABLE IF NOT EXISTS `visitas` (
  `vist_id` int(11) NOT NULL AUTO_INCREMENT,
  `anio` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `hora` int(2) NOT NULL,
  `minuto` int(2) NOT NULL,
  `segundo` int(2) NOT NULL,
  `ip` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `navegador` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sesion_id` varchar(50) NOT NULL,
  PRIMARY KEY (`vist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=0 ;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`vist_id`, `anio`, `mes`, `dia`, `hora`, `minuto`, `segundo`, `ip`, `navegador`, `sesion_id`) VALUES
(1, 2015, 1, 1, 10, 10, 1, '192.168.1.1', 'Mozilla', 1),
(2, 2015, 2, 2, 10, 10, 2, '192.168.1.2', 'Opera', 2),
(3, 2015, 3, 3, 10, 10, 3, '192.168.1.3', 'Safari', 3),
(4, 2015, 4, 4, 10, 10, 4, '192.168.1.4', 'Chrome', 4),
(5, 2015, 5, 5, 10, 10, 5, '192.168.1.5', 'Mozilla', 5),
(6, 2015, 6, 6, 10, 10, 6, '192.168.1.6', 'Opera', 6),
(7, 2015, 7, 7, 10, 10, 7, '192.168.1.7', 'Safari', 7),
(8, 2015, 8, 8, 10, 10, 8, '192.168.1.8', 'Chrome', 8),
(9, 2015, 9, 9, 10, 10, 9, '192.168.1.9', 'Mozilla', 9),
(10, 2015, 10, 10, 10, 10, 10, '192.168.1.10', 'Chrome', 10),
(11, 2015, 5, 5, 11, 3, 1, '::1', 'MMHttp (Windows; Version:13.0)', 11),
(12, 2015, 5, 5, 11, 4, 11, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 12),
(13, 2015, 5, 5, 11, 5, 15, '::1', 'MMHttp (Windows; Version:13.0)', 13),
(14, 2015, 5, 5, 11, 5, 31, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 14),
(15, 2015, 5, 5, 11, 5, 46, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0', 15),
(16, 2015, 5, 5, 11, 8, 15, '192.168.1.17', 'Mozilla/5.0 (Linux; U; Android 4.1.2; es-es; BLU STUDIO 5.3 II Build/JZO54K) AppleWebKit/537.16 (KHT', 16),
(17, 2015, 5, 5, 11, 13, 22, '192.168.1.11', 'Mozilla/5.0 (Linux; Android 4.4.2; GT-I9192 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chr', 17),
(18, 2015, 5, 5, 11, 16, 47, '192.168.1.99', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.', 18),
(19, 2015, 5, 5, 11, 43, 34, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 19),
(20, 2015, 5, 5, 11, 43, 55, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 20),
(21, 2015, 5, 5, 11, 47, 10, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safa', 21),
(22, 2015, 5, 5, 11, 54, 32, '::1', 'MMHttp (Windows; Version:13.0)', 22),
(23, 2015, 5, 5, 2, 12, 47, '192.168.1.11', 'Mozilla/5.0 (Linux; U; Android 4.1.2; es-es; BLU STUDIO 5.3 II Build/JZO54K) AppleWebKit/537.16 (KHT', 23),
(24, 2015, 5, 5, 2, 33, 53, '::1', 'MMHttp (Windows; Version:13.0)', 24),
(25, 2015, 5, 5, 2, 34, 27, '::1', 'MMHttp (Windows; Version:13.0)', 25);
