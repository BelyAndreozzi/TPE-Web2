-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2023 a las 01:08:36
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valorant_agents`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `alias` varchar(15) NOT NULL,
  `id_role_fk` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `agent_img` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `nacionality` varchar(20) NOT NULL,
  `race` varchar(15) NOT NULL,
  `is_free` tinyint(1) NOT NULL,
  `teamwork` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agent`
--

INSERT INTO `agent` (`id`, `alias`, `id_role_fk`, `description`, `agent_img`, `age`, `nacionality`, `race`, `is_free`, `teamwork`) VALUES
(1, 'Sage', 1, 'Sage destaca a la hora de crear espacios seguros para su equipo allá donde va. Sus capacidades especiales para revivir a compañeros caídos en batalla y para mantener a raya los asaltos enemigos la convierten en la calma en mitad de la tormenta para s', 'imgExample.jpg', 35, 'China', 'Radiante', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `role_icon` varchar(100) NOT NULL,
  `agresivity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `role`, `description`, `role_icon`, `agresivity`) VALUES
(1, 'Centinela', 'Los centinelas son expertos en defensa que se centran en bloquear áreas y vigilar los flancos tanto durante las rondas de ataque como en las de defensa.', 'iconExample.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role_fk` (`id_role_fk`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id_role_fk`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
