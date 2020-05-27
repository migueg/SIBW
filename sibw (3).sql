-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2020 a las 16:04:27
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sibw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `nombre` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(5) NOT NULL,
  `comentario` text NOT NULL,
  `mail` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`nombre`, `fecha`, `hora`, `comentario`, `mail`, `id`) VALUES
('Miguel', '2020-03-26', '15:14:00.00000', 'werw', 'f@dasds.com', 2),
('PAblo', '2020-03-26', '14:49:00.00000', 'Me encanta\r\n\r\n.\n--Mensaje editado por el moderador--', 'pablo@gmail.com', 2),
('Rosa', '2020-04-25', '11:29:00.00000', 'No me lo pierdoooo', 'rosa@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `organizador` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `im1` varchar(100) NOT NULL,
  `im2` varchar(100) NOT NULL,
  `textoim1` varchar(50) NOT NULL,
  `textoim2` varchar(50) NOT NULL,
  `descripcion1` text NOT NULL,
  `descripcion2` text NOT NULL,
  `enlaceweb` varchar(200) NOT NULL,
  `enlaceorganizador` varchar(200) NOT NULL,
  `enlaceTwitter` varchar(200) NOT NULL,
  `enlaceFace` varchar(200) NOT NULL,
  `etiquetas` varchar(100) NOT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id`, `titulo`, `organizador`, `fecha`, `im1`, `im2`, `textoim1`, `textoim2`, `descripcion1`, `descripcion2`, `enlaceweb`, `enlaceorganizador`, `enlaceTwitter`, `enlaceFace`, `etiquetas`, `publicado`) VALUES
(1, 'COLOR FEST', 'A38 Sports | Events | Marketing', '2020-04-25', './img/holilife1.jpg', './img/holilife2.jpg', 'Última edición en Málaga: Zona Festival', 'Última edición en Málaga: Zona Carrera', 'La HOLI LIFE es una carrera de 5 kilómetros sin tiempo, donde miles de participantes son rociados de pies a cabeza con diferentes polvos de colores a cada kilómetro.\r\n                Ya son más de 60 las ediciones celebradas por toda España y en las que han participado más de 500.000 personas. \r\n                La diversión continúa hasta el final con una gigantesca “fiesta de color o HOLI BOOM, donde todos los colores que imagines inundan el cielo de\r\n                la ciudad y al son de la mejor música acabas viviendo la que será una de las mejores experiencias de tu vida.', 'Emociones y recuerdos que te acompañarán para siempre. Créenos, es la mejor fiesta de 5K en la que hayas podido participar.\r\n                ¿Te la vas a perder? Terminarás totalmente lleno de color y con la mejor de tus sonrisas.\r\n                Esta vez HOLI LIFE llega a la ciudad de  Málaga, donde se podrá disfrutar de una carrera sin igual por las calles malagueñas , terminando con\r\n                un fiestón en la playa. Se desplagrá una infraestructura digna de un festival internacional, además de contar con artistas del panorama internacional\r\n                de la taya de Ozuna y Daddy Yankee.', 'https://www.holilife.es/que-es-holi', 'http://www.a38.es/', 'https://twitter.com/holilifespain?lang=es', 'https://es-es.facebook.com/holilife.es', '#ocio', 1),
(2, 'Tomorrowland', 'ID&T', '2020-07-17', './img/eventos/tm1.jpg', './img/eventos/tm2.jpg', 'Edición de 2019', 'Martin Garrix en el main stage', 'Tomorrowland es actualmente el mayor festival de música electrónica que se celebra en el mundo. En esta oportunidad se llevará a cabo del 20 al 29 de julio, como siempre en Boom, Bélgica. Tomorrowland se realiza desde hace 13 años y en la última edición asistieron 400 mil personas de casi 200 nacionalidades distintas.', 'Tomorrowland (Mundo del mañana en español) es mucho más que una fiesta de electrónica. Por supuesto que es música pero también es diversión, amistad, fuegos artificiales, fiesta, baile, luces y gente de todos los países festejando. Los escenarios y el ambiente se encuentran rodeados de una decoración que simula un mundo de magia y fantasía. El festival en sí, ofrece una variedad de subgéneros dentro de la música electrónica. Es una especie de parque temático para adultos inspirado en el mundo circense con más de 15 escenarios diferentes.', 'https://www.tomorrowland.com/global/', 'https://www.id-t.com/', 'https://twitter.com/tomorrowland?lang=es', 'https://es-es.facebook.com/tomorrowland', '#ocio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `ruta` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`ruta`, `id`) VALUES
('./img/galeria/t1.jpg', 2),
('./img/galeria/t2.jpg', 2),
('./img/galeria/t3.jpg', 2),
('./img/tm1.jpg', 2),
('./img/tm2.jpg', 2),
('./img/Tomorrowland.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaeventos`
--

CREATE TABLE `listaeventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listaeventos`
--

INSERT INTO `listaeventos` (`id`, `titulo`, `ruta`, `img`) VALUES
(1, 'COLOR FEST', 'plantillaEvento.php', './img/holilife1.jpg'),
(2, 'TOMORROWLAND', 'plantillaEvento.php', './img/Tomorrowland.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `palabra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`palabra`) VALUES
('cabron'),
('gilipollas'),
('puta'),
('polla'),
('coño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nick` varchar(15) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `nacimiento` date NOT NULL
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `pass`, `mail`, `rol`, `nombre`, `apellidos`, `nacimiento`) VALUES
('gestor', '$2y$10$WUKBvQpRsX.9VdbdhGSJ0eOJPOjETTE58e9quR1zOFupU9ndiW9um', 'gestor@gmail.com', 'gestor', 'Rosa', 'Perez', '1990-05-01'),
('migue99', '$2y$10$rlmMv90AZ1IpzmvIz2pFTOLcrFi2ZquFXvJ2ZtIpSueOnWHeyTFsy', 'migue@gmail.com', 'registrado', 'Migue', 'Garcia', '0000-00-00'),
('moderador', '$2y$10$VLNE57MYkYis.Ky0RwwQFuYpJaPG6UxTjDvOAiX5W0rpVwcvduwNq', 'moderador@gmail.com', 'moderador', 'Migue', 'Tenorio', '1999-04-08'),
('pepico98', '$2y$10$fYhiqSUiTx0tKEDvoUPDau20ayXgyc6gatPfGp8K7L6aKypH4Dzty', 'pepico98@gmail.com', 'registrado', 'Pepe', 'García', '1999-05-08'),
('super', '$2y$10$pQZv3d6xm0exgwIcuPZLSO/AnxYKCiZsH6cLzs5WATIs.wSPSbvHm', 'super@gmail.com', 'super', 'Super', 'Super', '2020-05-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`nombre`,`fecha`,`hora`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`ruta`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `listaeventos`
--
ALTER TABLE `listaeventos`
  ADD PRIMARY KEY (`titulo`),
  ADD KEY `id` (`id`);
ALTER TABLE `listaeventos` ADD FULLTEXT KEY `titulo` (`titulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nick`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id`) REFERENCES `evento` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id`) REFERENCES `evento` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `listaeventos`
--
ALTER TABLE `listaeventos`
  ADD CONSTRAINT `listaeventos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `evento` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
