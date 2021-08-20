-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2021 a las 02:24:41
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bichef`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_creacion_local` (IN `PEmpresa` INT, IN `Pnombre` VARCHAR(50), IN `PhoraIni` TIME, IN `PhoraFin` TIME)  BEGIN
	DECLARE LocalID  INT DEFAULT NULL;
	INSERT INTO `bichef`.`local` (`nombreLocal`, `idEmpresa`, `horaInicioOperaciones`, `horaFinOperaciones`) VALUES (Pnombre, PEmpresa, PhoraIni, PhoraFin);
    SET LocalID = SCOPE_IDENTITY();
	INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Mesas Actuales Activas (q)', '0.00');
    INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Otros Ingresos', '0.00');
    INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Otros Egresos', '0.00');
	INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Descuentos', '0.00');
    INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'IGV', '0.00');
    INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Productos Cancelados', '0.00');
    INSERT INTO `bichef`.`constantes` (`idLocal`, `descripcion`, `valor`) VALUES (@LocalID, 'Cantidad Comprobantes Electronicos emitidos', '0.00');
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_limpiar_base` ()  BEGIN 

DECLARE vIdLocal INT DEFAULT 0;
SELECT idLocal into vIdLocal FROM local 
WHERE 
 ( ( EXTRACT(HOUR FROM horaInicioOperaciones) * 60 +  EXTRACT(MINUTE FROM horaInicioOperaciones) )  - ( EXTRACT(HOUR FROM NOW()) * 60 +  EXTRACT(MINUTE FROM NOW()) ) ) BETWEEN 0 AND  60 ;

SELECT * from local where idLocal = vIdLocal;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constantes`
--

CREATE TABLE `constantes` (
  `idLocal` int(11) NOT NULL,
  `OtrosIngresos` float DEFAULT NULL,
  `OtrosEgresos` float DEFAULT NULL,
  `Descuentos` float DEFAULT NULL,
  `IGV` float DEFAULT NULL,
  `Ventas` float DEFAULT NULL,
  `ObjetivoVentas` float DEFAULT NULL,
  `CantidadPlatos` int(11) DEFAULT NULL,
  `CantidadBebidas` int(11) DEFAULT NULL,
  `MesasActualesActivas` int(11) DEFAULT NULL,
  `TotalMesas` int(11) DEFAULT NULL,
  `ProductosCancelados` int(11) DEFAULT NULL,
  `PedidosEnMesa` int(11) DEFAULT NULL,
  `PedidosParaLlevar` int(11) DEFAULT NULL,
  `PedidosDeliveries` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `constantes`
--

INSERT INTO `constantes` (`idLocal`, `OtrosIngresos`, `OtrosEgresos`, `Descuentos`, `IGV`, `Ventas`, `ObjetivoVentas`, `CantidadPlatos`, `CantidadBebidas`, `MesasActualesActivas`, `TotalMesas`, `ProductosCancelados`, `PedidosEnMesa`, `PedidosParaLlevar`, `PedidosDeliveries`) VALUES
(1, 0, 121.5, 0, 106.12, 1282.7, 1657.5, 116, 6, 1, 23, 0, 25, 38, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(80) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`) VALUES
(1, 'Demostración'),
(2, 'Crunch Burger'),
(3, 'Palais'),
(4, 'PaQueMas'),
(5, 'Posada Del Angel'),
(6, 'Break - Etnia'),
(7, 'Sol de Paracas y Puerto Gloria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `idLocal` int(11) NOT NULL,
  `nombreLocal` varchar(50) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `horaInicioOperaciones` time DEFAULT NULL,
  `horaFinOperaciones` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`idLocal`, `nombreLocal`, `idEmpresa`, `horaInicioOperaciones`, `horaFinOperaciones`) VALUES
(1, 'PRUEBA 01', NULL, '10:00:00', '18:00:00'),
(2, 'PRUEBA 02', NULL, '18:00:00', '12:00:00'),
(3, 'PRUEBA 03', NULL, NULL, NULL),
(4, 'POSADA BAR', 5, NULL, NULL),
(5, 'BRIGIDA SILVA', 4, NULL, NULL),
(6, 'JESUS MARIA', 4, NULL, NULL),
(7, 'BREAK - INACTIVO', NULL, NULL, NULL),
(8, 'LA PERLA', 4, NULL, NULL),
(9, 'LIMA', 4, NULL, NULL),
(10, 'UNAMUNO', 4, NULL, NULL),
(11, 'LA TABERNA', NULL, NULL, NULL),
(12, 'POSADA 1', 5, NULL, NULL),
(13, 'POSADA TREN', 5, NULL, NULL),
(14, 'POSADA HELADERIA', 5, NULL, NULL),
(15, 'POSADA 2', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen_dia`
--

CREATE TABLE `resumen_dia` (
  `idLocal` int(11) NOT NULL DEFAULT 0,
  `numeroDia` int(11) NOT NULL DEFAULT 0,
  `dia` date DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `cantMesas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `resumen_dia`
--

INSERT INTO `resumen_dia` (`idLocal`, `numeroDia`, `dia`, `monto`, `cantMesas`) VALUES
(1, 0, '2021-08-17', 1309, 10),
(1, 1, '2021-08-16', 2857, 29),
(1, 2, '2020-03-15', 525, 15),
(1, 3, '2021-08-14', 1329, 20),
(1, 4, '2021-08-13', 959, 19),
(1, 5, '2021-08-12', 530, 15),
(1, 6, '2021-08-11', 215, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `pass`, `rol`) VALUES
(1, 'admin', 'user-admin', '$2y$10$UthXaR5nAQ8atb/wj8k2UumKaFd6eMpo6EM8Hy9dfMe1IWBgFJICu', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `constantes`
--
ALTER TABLE `constantes`
  ADD PRIMARY KEY (`idLocal`) USING BTREE;

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`) USING BTREE;

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idLocal`) USING BTREE,
  ADD KEY `idEmpresa_idx` (`idEmpresa`) USING BTREE;

--
-- Indices de la tabla `resumen_dia`
--
ALTER TABLE `resumen_dia`
  ADD PRIMARY KEY (`idLocal`,`numeroDia`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `idEmpresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `event_clean` ON SCHEDULE EVERY 30 MINUTE STARTS '2019-04-26 02:45:25' ON COMPLETION PRESERVE ENABLE DO DELETE t1 
	FROM transaccion t1
	JOIN local t2 ON t1.idLocal = t2.idLocal where HOUR(timediff(now(),t2.horaInicioOperaciones))>1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
