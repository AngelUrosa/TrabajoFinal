-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 17:17:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_angel_urosa_nunez`
--
CREATE DATABASE IF NOT EXISTS `bd_angel_urosa_nunez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_angel_urosa_nunez`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `varon` tinyint(1) NOT NULL,
  `numcta` char(24) COLLATE utf8_spanish2_ci NOT NULL,
  `como_nos_conocio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `id_cliente`, `id_usuario`, `nombre`, `apellido1`, `apellido2`, `nif`, `varon`, `numcta`, `como_nos_conocio`, `activo`) VALUES
(1, '060010001', '000000000', 'Raúl', 'García', 'Guijarro', '123456aas', 0, '123546', 'Por internet', 1),
(2, '060010002', '060010002', 'Juan Luis', 'López', 'Alonso', '112322', 1, '4564', 'Por internet', 1),
(3, '060010003', '060010003', 'José Antonio', 'Guijarro', 'Guijarro', '112322', 1, '4564', 'Por internet', 1),
(4, '060010004', '060010004', 'Juan', 'García', 'Guijarro', '112322', 1, '4564', 'Por internet', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `id_departamento` char(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_departamento`, `nombre`, `activo`) VALUES
(1, '01', 'Ventas', 1),
(2, '02', 'Compras', 1),
(3, '03', 'Administración', 1),
(4, '04', 'Finanzas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_clientes`
--

CREATE TABLE `direcciones_clientes` (
  `id` int(11) NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `codpostal` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `direcciones_clientes`
--

INSERT INTO `direcciones_clientes` (`id`, `id_cliente`, `id_usuario`, `direccion`, `codpostal`, `localidad`, `provincia`, `pais`, `activo`) VALUES
(1, '060010001', '060010001', 'C/ Sol, 3', '06001', 'Badajoz', 'B0', 'España', 1),
(2, '060010002', '060010002', 'C/ Mirlo, 33', '06001', 'Badajoz', '06', '54656', 1),
(3, '060010003', '060010003', 'C/ La luna, 23', '06001', 'Barcarrota', '06', '54656', 1),
(4, '060010004', '060010004', 'C/ La luna, 23', '06001', 'Barcarrota', '06', '54656', 1),
(5, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(6, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(7, '636362000', '636362000', '', '', '636362', '', '', 1),
(8, '636362000', '636362000', '', '', '636362', '', '', 1),
(9, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(10, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(11, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(12, '252525000', '252525000', 'C/ el sol, 33', 'Badal', '252525', 'Badalona', 'España', 1),
(13, '060010004', '060010004', '', '', '06001', '', '', 1),
(14, '060010005', '060010005', '', '', '06001', '', '', 1),
(15, '060110001', '060110001', '', '', '06011', '', '', 1),
(16, '060110002', '060110002', '', '', '06011', '', '', 1),
(17, '060110001', '060110001', '', '', '06011', '', '', 1),
(18, '060110002', '060110002', '', '', '06011', '', '', 1),
(19, '060110003', '060110003', '', '', '06011', '', '', 1),
(20, '060110004', '060110004', '', '', '06011', '', '', 1),
(21, '060110005', '060110005', '', '', '06011', '', '', 1),
(22, '060110006', '060110006', '', '', '06011', '', '', 1),
(23, '060110007', '060110007', '', '', '06011', '', '', 1),
(24, '060110008', '060110008', '', '', '06011', '', '', 1),
(25, '060110009', '060110009', '', '', '06011', '', '', 1),
(26, '060110010', '060110010', '', '', '06011', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_empleado` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `id_departamento` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nif` text COLLATE utf8_spanish2_ci NOT NULL,
  `numcta` char(24) COLLATE utf8_spanish2_ci NOT NULL,
  `movil` char(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_postal` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ruta_foto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias_productos`
--

CREATE TABLE `familias_productos` (
  `id` int(11) NOT NULL,
  `id_familia` char(4) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `familias_productos`
--

INSERT INTO `familias_productos` (`id`, `id_familia`, `nombre`, `descripcion`, `activo`) VALUES
(1, '0001', 'Congelados', 'Congelados', 1),
(2, '0002', 'Verduras', 'Verduras', 1),
(3, '0003', 'Panaderia', 'Panadería', 1),
(4, '0004', 'Bebidas', 'Bebidas', 1),
(5, '0005', 'Cocidos', 'Cocidos', 1),
(6, '0006', 'Frutas', 'Frutas', 1),
(7, '0007', 'Postres', 'Postres', 1),
(8, '0008', 'Aliños', 'Aliños', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_producto` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `unidades` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `pvp` decimal(10,2) NOT NULL,
  `tipo_iva` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas_pedidos`
--

INSERT INTO `lineas_pedidos` (`id`, `id_pedido`, `id_producto`, `unidades`, `descripcion`, `pvp`, `tipo_iva`, `activo`) VALUES
(1, '2020-000001', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(2, '2020-000001', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(3, '2020-000001', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(4, '2020-000002', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(5, '2020-000002', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(6, '2020-000002', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(7, '2020-000003', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(8, '2020-000003', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(9, '2020-000003', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(10, '2020-000004', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(11, '2020-000004', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(12, '2020-000004', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(13, '2020-000005', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(14, '2020-000005', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(15, '2020-000005', '000400003', 5, 'Cerveza borda rubia', '2.00', 10, 1),
(16, '2020-000005', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(17, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(18, '2020-000006', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(19, '2020-000006', '000400003', 5, 'Cerveza borda rubia', '2.00', 10, 1),
(20, '2020-000006', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(21, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(22, '2020-000006', '000400004', 3, 'Cerveza estrella gal', '1.50', 10, 1),
(23, '2020-000007', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(24, '2020-000007', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(25, '2020-000007', '000400003', 5, 'Cerveza borda rubia', '2.00', 10, 1),
(26, '2020-000007', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(27, '2020-000007', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(28, '2020-000007', '000400004', 3, 'Cerveza estrella gal', '1.50', 10, 1),
(29, '2020-000007', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(30, '2020-000007', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(31, '2020-000008', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(32, '2020-000008', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(33, '2020-000008', '000400003', 5, 'Cerveza borda rubia', '2.00', 10, 1),
(34, '2020-000008', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(35, '2020-000008', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(36, '2020-000008', '000400004', 3, 'Cerveza estrella gal', '1.50', 10, 1),
(37, '2020-000008', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(38, '2020-000008', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(39, '2020-000008', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(40, '2020-000009', '000400001', 8, 'Caña de cerveza', '1.20', 10, 1),
(41, '2020-000009', '000400002', 12, 'Cerveza borda negra', '2.00', 10, 1),
(42, '2020-000009', '000400003', 1, 'Cerveza borda rubia', '2.00', 10, 1),
(43, '2020-000010', '000400001', 16, 'Caña de cerveza', '1.20', 10, 1),
(44, '2020-000010', '000400002', 12, 'Cerveza borda negra', '2.00', 10, 1),
(45, '2020-000010', '000400003', 4, 'Cerveza borda rubia', '2.00', 10, 1),
(46, '2020-000011', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(47, '2020-000012', '000400001', 10, 'Caña de cerveza', '1.20', 10, 1),
(48, '2020-000012', '000400002', 4, 'Cerveza borda negra', '2.00', 10, 1),
(49, '2020-000013', '000400001', 10, 'Caña de cerveza', '1.20', 10, 1),
(50, '2020-000013', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(51, '2020-000014', '000400001', 12, 'Caña de cerveza', '1.20', 10, 1),
(52, '2020-000014', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(53, '2020-000015', '000400001', 13, 'Caña de cerveza', '1.20', 10, 1),
(54, '2020-000015', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado_empaqueta` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empresa_transporte` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_envio` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `facturado` tinyint(1) NOT NULL,
  `id_factura` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_factura` date NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_pago` date NOT NULL,
  `metodo_pago` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_pedido`, `id_empleado_empaqueta`, `id_empresa_transporte`, `fecha_pedido`, `fecha_envio`, `fecha_entrega`, `facturado`, `id_factura`, `fecha_factura`, `pagado`, `fecha_pago`, `metodo_pago`, `id_cliente`, `activo`) VALUES
(1, '2020-000001', '', '', '2020-11-26', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-26', '', '060010002', 1),
(2, '2020-000002', '', '', '2020-11-26', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-26', '', '060010001', 1),
(3, '2020-000003', '', '', '2020-11-26', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-26', '', '060010001', 1),
(4, '2020-000004', '', '', '2020-11-26', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-26', '', '060010002', 1),
(5, '2020-000005', '', '', '2020-11-29', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-29', '', '060010003', 1),
(6, '2020-000006', '', '', '2020-11-30', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-30', '', '060010001', 1),
(7, '2020-000007', '', '', '2020-11-30', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-30', '', '060010003', 1),
(8, '2020-000008', '', '', '2020-11-30', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-11-30', '', '060010002', 1),
(9, '2020-000009', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010001', 1),
(10, '2020-000010', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010002', 1),
(11, '2020-000011', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010004', 1),
(12, '2020-000012', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010001', 1),
(13, '2020-000013', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010001', 1),
(14, '2020-000014', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010005', 1),
(15, '2020-000015', '', '', '2020-12-01', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-01', '', '060010001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_producto` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_familia` char(4) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_iva` decimal(10,2) NOT NULL,
  `precio_coste` decimal(10,2) NOT NULL,
  `pvp` decimal(10,2) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_barras` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_proveedor` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_maximo` int(11) NOT NULL,
  `ruta_foto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_producto`, `id_familia`, `tipo_iva`, `precio_coste`, `pvp`, `descripcion`, `codigo_barras`, `id_proveedor`, `stock_actual`, `stock_minimo`, `stock_maximo`, `ruta_foto`, `activo`) VALUES
(1, '000400001', '0004', '10.00', '0.80', '1.20', 'Caña de cerveza', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000400001.png', 1),
(2, '000400002', '0004', '10.00', '1.10', '2.00', 'Cerveza borda negra', '23132', '1', 55, 50, 60, 'fotos/productos/pro_000400002.jpg', 1),
(3, '000400003', '0004', '10.00', '1.10', '2.00', 'Cerveza borda rubia', '13212356', '1', 95, 80, 100, 'fotos/productos/pro_000400003.jpg', 1),
(4, '000400004', '0004', '10.00', '0.80', '1.50', 'Cerveza estrella galicia', '4546', '1', 110, 100, 120, 'fotos/productos/pro_000400004.png', 1),
(5, '000400005', '0004', '10.00', '1.10', '1.75', 'Cerveza mahou limón', '123123', '1', 18, 15, 20, 'fotos/productos/pro_000400005.gif', 1),
(6, '000400006', '0004', '10.00', '0.80', '1.30', 'Cervez Monts', '5646', '1', 125, 100, 150, 'fotos/productos/pro_000400006.png', 1),
(7, '000400007', '0004', '10.00', '1.10', '2.00', 'Coca cola 500 ml', '1231', '1', 125, 100, 150, 'fotos/productos/pro_000400007.jpg', 1),
(8, '000400008', '0004', '10.00', '0.80', '1.20', 'Lata coca-cola light', '3213', '1', 125, 100, 150, 'fotos/productos/pro_000400008.png', 1),
(9, '000400009', '0004', '10.00', '1.00', '1.75', 'Jarra de cerveza', '23123', '1', 158, 120, 250, 'fotos/productos/pro_000100001.png', 1),
(10, '000400010', '0004', '10.00', '1.00', '1.56', 'Lata coca-cola 250ml', '225654', '1', 125, 100, 150, 'fotos/productos/pro_000400010.jpg', 1),
(11, '000400011', '0004', '10.00', '3.00', '5.00', 'Mojito fresa', '21558', '1', 20, 15, 25, 'fotos/productos/pro_000400011.png', 1),
(12, '000400012', '0004', '10.00', '1.00', '1.80', 'Refresco Seven-up 25', '12135', '1', 125, 100, 150, 'fotos/productos/pro_000400012.png', 1),
(13, '000400013', '0004', '10.00', '2.00', '3.00', 'Zumo de naranja natural', '2135', '1', 12, 10, 15, 'fotos/productos/pro_000400013.png', 1),
(14, '000400014', '0004', '10.00', '1.00', '2.00', 'Zumo de tomate natural', '13288', '1', 8, 10, 15, 'fotos/productos/pro_000400014.png', 1),
(15, '000100001', '0001', '4.00', '11.00', '12.00', 'Acelgas', '11223123123', '0', 11, 12, 33, 'fotos/productos/pro_000100001.jpg', 1),
(16, '000100002', '0001', '4.00', '11.00', '12.00', 'Acelgas', '11223123123', '0', 11, 12, 33, 'fotos/productos/pro_000100002.jpg', 1),
(17, '000100003', '0001', '4.00', '11.00', '12.00', 'Rabanos', '', '0', 0, 0, 0, 'fotos/productos/pro_000100003.jpg', 1),
(18, '000300001', '0003', '10.00', '0.50', '1.00', 'Pan de molde integral', '1212121', '0', 12, 22, 222, 'fotos/productos/pro_000300001.web', 1),
(19, '000300002', '0003', '10.00', '0.50', '1.00', 'Pan de molde integral', '1212121', '0', 12, 22, 222, 'fotos/productos/pro_000300002.web', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `id_proveedor` char(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `cod_postal` char(5) NOT NULL,
  `localidad` varchar(24) NOT NULL,
  `provincia` varchar(12) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `id_proveedor`, `nombre`, `apellido1`, `apellido2`, `nif`, `cod_postal`, `localidad`, `provincia`, `activo`) VALUES
(1, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dadasd', 1),
(2, '1', 'sadadadsada', 'sad', 'Nuñez', '321321', '322', 'dsadsadas', 'dsadasd', 1),
(3, '1', 'sdadsa', 'dsadsa', 'dsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(4, '1', 'sdadsa', 'dsadsa', 'dsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(5, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(6, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(7, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(8, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(9, '1', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(10, '1', 'angel', 'Urosa ', 'Nuñez', '73547889F', '322', 'dsadasd', 'dsadasd', 1),
(11, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889T', '322', 'dsadsadas', 'dsadasd', 1),
(12, '124', 'sadadadsada', 'dsadsa', 'dsadsadsa', '73547889F', '123', 'dsadsadas', 'dsadasd', 1),
(13, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889F', '322', 'dsadsadas', 'dsadasd', 1),
(14, '323', 'sadadadsada', 'sad', 'dsa', '32132', '322', 'dsadsadas', 'dsadasd', 1),
(15, '124', 'sdadsa', 'dsadsa', 'dsadsa', '34214132', '123', 'dsadsadas', 'dsadasd', 1),
(16, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889F', '322', 'dsadsadas', 'dsadasd', 1),
(17, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889T', '322', 'dsadsadas', 'dsadasd', 1),
(18, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889F', '322', 'dsadsadas', 'dsadasd', 1),
(19, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '73547889F', '322', 'dsadasd', 'dsadasd', 1),
(20, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(21, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(22, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(23, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(24, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(25, '323', 'mal', 'mal', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(26, '323', 'mal', 'mal', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(27, '323', 'sadadadsada', 'dsadsa', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(28, '323', 'sdadsa', 'sad', 'dsadsa', '32132ds', '322', 'dsadsadas', 'dsadasd', 1),
(29, '124', 'sadadadsada', 'sad', 'dsadsa', '73547889F', '123', 'dsadsadas', 'dsadasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `id_rol` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `id_rol`, `nombre`) VALUES
(1, '01', 'Clientes Anónimos'),
(2, '02', 'Administrador'),
(3, '03', 'Empleado'),
(4, '04', 'Cliente Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_rol` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `login` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias_productos`
--
ALTER TABLE `familias_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias_productos`
--
ALTER TABLE `familias_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `finges`
--
CREATE DATABASE IF NOT EXISTS `finges` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `finges`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `id_comunidad` int(11) NOT NULL,
  `cif` varchar(9) DEFAULT NULL,
  `presidente` int(11) NOT NULL,
  `cuota` decimal(10,2) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `cp` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `registrado_por` int(11) NOT NULL,
  `asignado_a` int(11) NOT NULL,
  `resuelta` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nif` varchar(9) DEFAULT NULL,
  `id_comunidad` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `trabajador` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Indica si la persona es trabajador de la empresa. 0 indica que no es trabajador de la empresa.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nif`, `id_comunidad`, `usuario`, `contraseña`, `email`, `trabajador`) VALUES
(1, '123', 1, 'angel', '123', 'angel@gmail.com', 1),
(2, '123', 1, 'angel', '123', 'angel@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_incidencia` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `descripción` varchar(200) DEFAULT NULL,
  `id_persona` int(11) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_comunidad` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`id_comunidad`),
  ADD KEY `fk_comunidades_personas1_idx` (`presidente`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `fk_incidencias_ubicaciones1_idx` (`id_ubicacion`),
  ADD KEY `fk_incidencias_personas1_idx` (`registrado_por`),
  ADD KEY `fk_incidencias_personas2_idx` (`asignado_a`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_personas_comunidades_idx` (`id_comunidad`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_incidencia`,`id_entrada`),
  ADD KEY `fk_registro_incidencias1_idx` (`id_incidencia`),
  ADD KEY `fk_registro_personas1_idx` (`id_persona`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD KEY `fk_ubicaciones_comunidades1_idx` (`id_comunidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  MODIFY `id_comunidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD CONSTRAINT `fk_comunidades_personas1` FOREIGN KEY (`presidente`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"finges\",\"table\":\"personas\"},{\"db\":\"pmydm2209\",\"table\":\"tiendas\"},{\"db\":\"pmydm2209\",\"table\":\"juegos\"},{\"db\":\"tatuajearr\",\"table\":\"tproducto\"},{\"db\":\"tatuajearr\",\"table\":\"tfactura\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-05-23 15:16:43', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"NavigationWidth\":164}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `pmydm2209`
--
CREATE DATABASE IF NOT EXISTS `pmydm2209` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pmydm2209`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `puntuacion` float NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `puntuacion`, `descripcion`, `imagen`) VALUES
(2, 'outer worlds', 0, 'ta mal no compres', 'b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `precio` double NOT NULL,
  `plataforma` varchar(255) NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_juego` (`id_juego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD CONSTRAINT `tiendas_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`);
--
-- Base de datos: `tatuajearr`
--
CREATE DATABASE IF NOT EXISTS `tatuajearr` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tatuajearr`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tfactura`
--

CREATE TABLE `tfactura` (
  `CodFactura` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Cliente` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FechaFactura` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Borrado` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tfactura`
--

INSERT INTO `tfactura` (`CodFactura`, `Cliente`, `FechaFactura`, `Borrado`) VALUES
('cod001', 'user', '02/03/2020', '0'),
('cod002', 'user', '02/03/2020', '0'),
('cod003', 'user', '02/03/2020', '0'),
('cod004', 'user', '04/03/2020', '0'),
('cod005', 'user', '04/03/2020', '0'),
('cod006', 'a', '24/01/2022', '0'),
('cod007', 'a', '24/01/2022', '0'),
('cod008', 'user', '04/02/2022', '0'),
('cod009', 'user', '04/02/2022', '0'),
('cod010', 'user', '04/02/2022', '0'),
('cod011', 'user', '07/02/2022', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlineafactura`
--

CREATE TABLE `tlineafactura` (
  `CodFactura` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Producto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Cantidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Total` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tlineafactura`
--

INSERT INTO `tlineafactura` (`CodFactura`, `Producto`, `Cantidad`, `Total`) VALUES
('cod001', 'cod012', '1', '13.99'),
('cod001', 'cod015', '1', '13.95'),
('cod001', 'cod026', '1', '5.99'),
('cod002', 'cod026', '1', '5.99'),
('cod003', 'cod026', '1', '5.99'),
('cod004', 'cod004', '1', '16.50'),
('cod004', 'cod005', '1', '8.90'),
('cod004', 'cod006', '1', '11.95'),
('cod004', 'cod007', '1', '19.50'),
('cod005', 'cod004', '1', '16.50'),
('cod006', 'cod002', '1', '9.95'),
('cod007', 'cod002', '1', '9.95'),
('cod008', 'cod010', '1', '14.80'),
('cod009', 'cod003', '1', '14.40'),
('cod010', 'cod004', '1', '23.95'),
('cod010', 'cod007', '1', '7.95'),
('cod011', 'cod006', '1', '479'),
('cod011', 'cod010', '1', '14.80'),
('cod011', 'cod012', '1', '21.18'),
('cod011', 'cod014', '1', '18.82');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmarca`
--

CREATE TABLE `tmarca` (
  `Marca` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Borrado` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmarca`
--

INSERT INTO `tmarca` (`Marca`, `Borrado`) VALUES
('Bishop', '0'),
('Cheyenne', '0'),
('DragonHawk', '0'),
('FK Irons', '0'),
('Hawink', '0'),
('Killer Ink', '0'),
('Piranha', '0'),
('Stencil Stuff', '0'),
('Vikings', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE `tproducto` (
  `CodProducto` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Contenido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Precio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Formatouno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Formatodos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `Borrado` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tproducto`
--

INSERT INTO `tproducto` (`CodProducto`, `Nombre`, `Marca`, `Contenido`, `Precio`, `Formatouno`, `Formatodos`, `Tipo`, `Imagen`, `Borrado`) VALUES
('cod002', 'Tinta Negra', 'Vikings', '1', '9.95', 'Individual', '0', 'Tinta', 'https://m.media-amazon.com/images/I/71NbAD3odAL._SL1500_.jpg', '0'),
('cod003', 'Loción fijadora de plantillas', 'Stencil Stuff', '1', '14.40', 'Individual', '0', 'Material', 'https://www.killerinktattoo.es/media/catalog/product/cache/519a79ab657727fbe310d7fe9f7ed87f/s/t/stencill-stuff_1.jpg', '0'),
('cod004', 'Agujas 19mm', 'Killer Ink', '25', '23.95', '', 'Pack', 'Material', 'https://www.killerinktattoo.es/media/catalog/product/cache/519a79ab657727fbe310d7fe9f7ed87f/m/m/mm-08-mixed_1.jpg', '0'),
('cod005', 'Máquina Sol Nova rotativa', 'Cheyenne', '1', '1198.80', 'Individual', '0', 'Máquina', 'https://www.killerinktattoo.es/media/catalog/product/cache/519a79ab657727fbe310d7fe9f7ed87f/s/o/sol-nova-unlimited.jpg', '0'),
('cod006', 'Máquina FK Irons AL13 Roswell', 'FK Irons', '1', '479', 'Individual', '0', 'Máquina', 'https://www.killerinktattoo.es/media/catalog/product/cache/519a79ab657727fbe310d7fe9f7ed87f/f/k/fk-irons-roswell-3-v2-bubblegum.jpg', '0'),
('cod007', 'Caja agujas 9RL', 'DragonHawk', '50', '7.95', '', 'Pack', 'Material', 'https://cdn.shopify.com/s/files/1/0407/1908/9820/products/3_82aaee2f-6ab0-4b02-8b21-8f3792fad62f_1800x1800.jpg?v=1607745198', '0'),
('cod008', 'Pack tintas colores básicos', 'Hawink', '14', '60', '', 'Pack', 'Tinta', 'https://cdn.shopify.com/s/files/1/0300/5205/7220/products/TI203-15-14_14_720x.jpg?v=1623837438', '0'),
('cod009', 'Máquina LINER WAND', 'Bishop', '1', '599.99', 'Individual', '', 'Máquina', 'https://www.barberdts.com/es/media/catalog/product/cache/80146aac7f6d2eb58007cd965a9b96f4/w/a/wand_upright_black.jpg', '0'),
('cod010', 'Guantes negros de nike', 'Bishop', '100', '14.80', 'Individual', 'Pack', 'Material', 'https://www.intattooveritas.com/10439-thickbox_default/guantes-de-latex-negro-piranha-100-und.jpg', '0'),
('cod012', 'Cartucho 13Flat ', 'Cheyenne', '10', '21.18', '', 'Pack', 'Material', 'https://www.intattooveritas.com/6355-thickbox_default/cheyenne-safety-cartridges-flat-10-und.jpg', '0'),
('cod014', 'Cartucho 7Magnum', 'Cheyenne', '10', '18.82', '', 'Pack', 'Material', 'https://www.intattooveritas.com/6366-thickbox_default/cartuchos-cheyenne-safety-magnum-10-und.jpg', '0'),
('cod015', 'Guantes negros de nike', 'Killer Ink', '1', '1', 'Individual', 'N/A', 'N/A', '1', '1'),
('cod016', 'wdsafdsa', 'Cheyenne', '2', '3', 'N/A', 'Pack', 'N/A', 'ewq', '1'),
('cod017', 'fffffffff', 'Bishop', '3', '3', 'N/A', 'Pack', 'N/A', '3', '1'),
('cod018', 'vvvvvvvvvv', 'Cheyenne', '2', '3', 'N/A', 'Pack', 'N/A', '4', '1'),
('cod019', 't5555654w', 'Cheyenne', '41234', '4123', 'Individual', 'N/A', 'N/A', '2134', '1'),
('cod020', 't5555654w', 'Cheyenne', '41234', '4123', 'Individual', 'N/A', 'N/A', '2134', '1'),
('cod021', 'sssss', 'Bishop', '123', '32', 'N/A', 'Pack', 'N/A', '23', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `CodUsuario` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Nick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Rol` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`CodUsuario`, `Nick`, `Pass`, `Rol`) VALUES
('cod001', 'admin', 'admin', 'admin'),
('cod002', 'user', 'user', 'user'),
('cod005', 'Luis Manuel', 'contraseña', 'user'),
('cod006', 'a', 'a', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tfactura`
--
ALTER TABLE `tfactura`
  ADD PRIMARY KEY (`CodFactura`),
  ADD KEY `usuario` (`Cliente`);

--
-- Indices de la tabla `tlineafactura`
--
ALTER TABLE `tlineafactura`
  ADD PRIMARY KEY (`CodFactura`,`Producto`);

--
-- Indices de la tabla `tmarca`
--
ALTER TABLE `tmarca`
  ADD PRIMARY KEY (`Marca`),
  ADD UNIQUE KEY `genero` (`Marca`);

--
-- Indices de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`CodProducto`),
  ADD KEY `Genero` (`Marca`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`CodUsuario`),
  ADD UNIQUE KEY `nick` (`Nick`),
  ADD KEY `nick_2` (`Nick`);
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
