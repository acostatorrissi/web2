-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2020 a las 15:28:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'BEBIDAS'),
(2, 'comidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`) VALUES
(1, 'puro humo', 'Picada de salames, quesos y fiambres de la región. Todo ahumado.', 250, 2),
(2, 'sandwich tandilense ', 'Un clásico. Doble porción de bondiola de cerdo acompañada con rúcula, tomates asados y cebolla caramelizada. Todo bañado en salsa de mostaza a la miel.', 200, 2),
(3, 'provoleta alioli', 'Clásica provoleta a la parrilla con un toque de ajo y oliva.', 180, 2),
(4, 'nachos con queso', 'Nachos caseros con dip de Cheddar.', 250, 2),
(5, 'veggie style', 'Milanesa de berenjena con mix de vegetales asados en pan casero con semillas.', 220, 2),
(6, 'cata de morcipan', 'Tres tipos de morcilla en tres tipos de panes diferentes. Nada más que agregar.', 300, 2),
(7, 'papas refugio', 'Papas fritas en grasa con crema de panceta, verdeo y queso.', 260, 2),
(8, 'Ensalada rustica ', 'Lechuga, tomate, zanahoria, cebolla y lo que tengamos en la huerta.', 300, 2),
(9, 'indian pale ale', 'Cerveza rubia, moderado alcohol y amargor. Es la versión artesanal de las cervezas rubias masivas industriales, más sabrosa e intensa. IBU 18 ALC% 4.5', 195, 1),
(11, 'cream stout', 'De un profundo color oscuro con aromas tostado y café. Presenta un sabor intenso y un cuerpo y espuma cremosa. IBU 18 ALC% 4.5', 180, 1),
(12, 'amber lager', 'Sus maltas le otorgan un color ámbar rojizo y un sabor balanceado entre el dulzor y el amargor. IBU 18 ALC% 4.5', 180, 1),
(14, 'pink apa', 'De bajo contenido alcohólico, fuerte presencia en aroma y gusto de lúpulo americano. Destacan notas cítricas y de frutas tropicales. IBU 35 ALC% 3.5', 190, 1),
(16, 'lager', 'Con un aroma frutado, un atractivo color dorado y un inconfundible sabor fresco e intenso. IBU 18 ALC% 4.8', 175, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usser`
--

CREATE TABLE `usser` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usser`
--

INSERT INTO `usser` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(1, 'marcos', 'acosta', 'marcos.acosta.em@gmail.com', '$2y$12$fRyUKnqSyxE/ahohscaJL.GPYd0aMG2IvphlPKQggERm1BhYIuwW6'),
(2, 'rosario', 'perrotta', 'rosarioperrotta7@gmail.com', '$2y$12$Wc4.IkZHZxIpYMu9sue8LOzOEnDIwKsVce16jSo4KjNAkWQkFDWEe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usser`
--
ALTER TABLE `usser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
