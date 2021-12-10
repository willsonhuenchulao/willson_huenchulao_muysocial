-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2021 a las 23:28:04
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmuysocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `titulo`) VALUES
(1, 'elecciones 2022'),
(2, 'cambio climatico'),
(3, 'Clasificatorias Quatar 22'),
(4, 'Energía Renovable'),
(5, 'Ciencia de datos'),
(17, 'Universo Cinematográfico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_entrada_comentario` int(11) NOT NULL,
  `comentario_autor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `comentario_email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `comentario_contenido` text COLLATE utf8_spanish2_ci NOT NULL,
  `comentario_status` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `comentario_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_entrada_comentario`, `comentario_autor`, `comentario_email`, `comentario_contenido`, `comentario_status`, `comentario_fecha`) VALUES
(7, 5, 'carlos', 'carlos@gmail.com', 'excelente curso de php', 'aprobado', '2018-07-13'),
(9, 5, 'franco', 'franco@gmail.com', 'excelente curso de php', 'no aprobado', '2018-07-13'),
(10, 1, 'willson', 'willsonnuevo1@gmail.com', 'buen post', 'aprobado', '2021-12-10'),
(11, 10, 'carlos', 'charadasd@gmail.com', 'hol amundo', 'aprobado', '2021-12-10'),
(12, 10, 'carlos', 'charadasd@gmail.com', 'hol amundo', 'no aprobado', '2021-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_entrada` int(11) NOT NULL,
  `id_categoria_entrada` int(11) NOT NULL,
  `entrada_titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_autor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_fecha` date NOT NULL,
  `entrada_imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_contenido` text COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_etiquetas` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `entrada_comment_count` int(11) NOT NULL,
  `entrada_status` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_entrada`, `id_categoria_entrada`, `entrada_titulo`, `entrada_autor`, `entrada_fecha`, `entrada_imagen`, `entrada_contenido`, `entrada_etiquetas`, `entrada_comment_count`, `entrada_status`) VALUES
(6, 1, 'willson', 'willson', '2021-12-10', '1936707.jpg', '         curso', 'java', 5, 'publicado'),
(7, 1, 'elecciones 2021', 'usuario', '2021-12-10', 'elecciones2.jpg', '         a poco de las elecciones tu decides por quien votar.', 'todo lo que debes saber', 0, 'publicado'),
(8, 2, 'cambio climatico', 'user', '2021-12-10', 'climatico.jpg', '         el cambio un problema que sigue alterando las condiciones climaticas.', 'cambio', 0, 'publicado'),
(9, 4, 'Energía renovble', 'user', '2021-12-10', 'energia.jpg', '         nuevas fuentes de energía se están estudiado hoy en día.', 'energía renovable', 0, 'publicado'),
(10, 3, 'futbol', 'user', '2021-12-10', 'mundial.jpg', '         mundial', 'futbol', 2, 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `opcion` varchar(100) NOT NULL,
  `votos` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `opcion`, `votos`) VALUES
(1, 'Elecciones 2021', 9),
(2, 'Cambio-Climático', 1),
(3, 'Clasificatorias Qatar', 3),
(4, 'Energía Renovable', 3),
(5, 'Ciencia de datos', 0),
(6, 'Energía Renovable', 3),
(7, 'Ciencia de datos', 1),
(8, 'Universo cinematográfico', 2),
(9, 'Nuevo Tema', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellido`, `correo`, `imagen`, `rol`) VALUES
(1, 'ucevito', '123', 'eyter', 'higuera', 'eyter@gmail.com', '', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
