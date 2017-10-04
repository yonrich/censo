-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2017 at 10:57 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pv`
--
CREATE DATABASE IF NOT EXISTS `pv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pv`;

-- --------------------------------------------------------

--
-- Table structure for table `agente`
--

CREATE TABLE `agente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `apellidoPaterno` varchar(35) NOT NULL,
  `apellidoMaterno` varchar(35) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `clave_documento` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `proveedores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL COMMENT 'Este campo almacena el id del jefe/encargado de almacen',
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pasteles', 1, '2017-04-22 10:08:53', '2017-04-22 10:08:54'),
(2, 'Refrescos', 1, '2017-04-22 17:55:54', '2017-04-22 17:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apaterno` varchar(45) NOT NULL,
  `amaterno` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `movil` varchar(14) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tiposcliente_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apaterno`, `amaterno`, `rfc`, `direccion`, `movil`, `status`, `created_at`, `updated_at`, `tiposcliente_id`, `sucursal_id`) VALUES
(1, 'Heriberto', 'Rodriguez', 'Davila', 'CUPU800825569', 'Temoaya', '7224324009', 1, '2017-04-22 04:40:24', '2017-04-22 04:40:24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_entrada`
--

CREATE TABLE `detalle_entrada` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `entradas_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tipo_producto_id` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `detalle_entradacol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ubicacion`
--

CREATE TABLE `detalle_ubicacion` (
  `id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `seccion` varchar(15) NOT NULL,
  `anaquel_estante` varchar(4) NOT NULL,
  `fila` varchar(4) NOT NULL,
  `posicion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `ventas_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `productos_id`, `ventas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-04-22 00:00:00', '2017-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `documento_entrada`
--

CREATE TABLE `documento_entrada` (
  `id` int(11) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `numero_documento` varchar(45) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `documento_entrada_id` int(11) NOT NULL,
  `agente_id` int(11) NOT NULL,
  `impuestos_entrada_id` varchar(45) NOT NULL,
  `sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Efectivo', 1, '2017-05-06 00:00:00', '2017-05-06 00:00:00'),
(2, 'Tarjeta', 1, '2017-05-06 00:00:00', '2017-05-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `impuestos_entrada`
--

CREATE TABLE `impuestos_entrada` (
  `id` int(11) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `ieps` decimal(10,2) NOT NULL,
  `isr` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `impuestos_producto`
--

CREATE TABLE `impuestos_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `porcentaje` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `impuestos_producto`
--

INSERT INTO `impuestos_producto` (`id`, `descripcion`, `porcentaje`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IVA', '16.00', 1, '2017-04-22 09:46:09', '2017-05-05 02:14:08'),
(3, 'ISR', '35.60', 1, '2017-04-22 09:53:01', '2017-04-22 09:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gamesa', 1, '2017-04-22 10:08:27', '2017-04-22 10:08:27'),
(2, 'Coca Cola', 1, '2017-04-22 16:02:51', '2017-04-22 16:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `ventaPublico` decimal(9,2) DEFAULT NULL,
  `costo_compra` decimal(10,2) DEFAULT NULL,
  `unidad_medida` varchar(15) DEFAULT NULL,
  `stockInicial` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `iva` tinyint(1) DEFAULT NULL,
  `isr` tinyint(1) DEFAULT NULL,
  `ieps` tinyint(1) DEFAULT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `proveedores_id` int(11) DEFAULT NULL,
  `categorias_id` int(11) DEFAULT NULL,
  `impuestos_producto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca_id`, `ventaPublico`, `costo_compra`, `unidad_medida`, `stockInicial`, `imagen`, `iva`, `isr`, `ieps`, `descuento`, `status`, `created_at`, `updated_at`, `proveedores_id`, `categorias_id`, `impuestos_producto_id`) VALUES
(1, 'Gansito', 1, '14.23', '11.23', 'pieza', 100, 'cuando-un-perro-te-quiere-morder-pero-agarras-una-piedra-5685533.png', 1, 0, 0, '50', 1, '2017-04-22 15:51:12', '2017-05-06 16:51:00', 3, 1, 1),
(2, 'coca cola 600 ml', 2, '13.50', '11.00', 'pieza', 150, 'choco.jpg', 1, 0, 1, '50', 1, '2017-04-22 16:03:32', '2017-05-06 16:51:01', 1, 2, 1),
(7, 'fanta', 2, '8.00', '16.00', 'litros', 10, '4847876.jpg', 1, 0, 1, '50', 1, '2017-04-22 21:16:11', '2017-05-06 16:51:01', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `giroEmpresa` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `movil` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `empresa`, `razon_social`, `giroEmpresa`, `direccion`, `movil`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola', 'Coca Cola FEMSA S.A. de C.V.', 'Bebidas y Alimentos', 'Toluca', '7224324009', 'cocacola@contacto.com', '1', '2017-04-22 05:09:54', '2017-04-22 05:14:32'),
(2, 'Bimbo', 'Coca Cola FEMSA S.A. de C.V.', 'Panaderia', 'Temoaya', '5582347892', 'evelyn.hernandez@ber-it.com', '1', '2017-04-22 18:10:54', '2017-04-22 18:10:54'),
(3, 'Gamesa', 'Coca Cola FEMSA S.A. de C.V.', 'Reposteria', 'Lerma', '7324563221', 'maraya_09@live.com', '1', '2017-04-22 18:11:31', '2017-04-22 18:11:31'),
(4, 'Cariocas', 'Cariocas  S.A. de C.V.', 'Tostadas', 'San Pablo temextipan', '7222040117', 'heri@gmail.com', '1', '2017-04-22 18:12:46', '2017-04-22 18:12:46'),
(5, 'Barcel', 'Barcel  S.A. de C.V.', 'Frituras', 'Toluca Colonia Independencia', '7222040117', 'barcel@contacto.com', '1', '2017-05-06 04:54:21', '2017-05-06 04:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin', 1, '2017-04-22 01:12:44', '2017-04-22 02:11:23'),
(2, 'Ventas', 'Vendedor', 1, '2017-04-22 01:15:32', '2017-04-22 01:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `precio`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mano de Obra', 150, 1, '2017-04-22 02:27:20', '2017-04-22 02:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `delegacion_municipio` varchar(45) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sucursal`
--

INSERT INTO `sucursal` (`id`, `nombre`, `calle`, `colonia`, `delegacion_municipio`, `codigoPostal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Toluca', 'Independencia', 'Sanchez', 'Toluca', 52104, 1, '2017-04-22 04:27:25', '2017-04-22 04:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `tiposcliente`
--

CREATE TABLE `tiposcliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiposcliente`
--

INSERT INTO `tiposcliente` (`id`, `nombre`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General', 'Generales', 1, '2017-04-22 04:16:06', '2017-04-22 04:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `tipo` varchar(35) NOT NULL,
  `descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apaterno` varchar(45) DEFAULT NULL,
  `amaterno` varchar(45) DEFAULT NULL,
  `movil` varchar(14) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `sucursal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apaterno`, `amaterno`, `movil`, `email`, `status`, `direccion`, `username`, `password`, `foto`, `created_at`, `updated_at`, `roles_id`, `sucursal_id`) VALUES
(1, 'uriel', 'Palomares', 'Elias', '7224324009', 'urilias_2602@hotmail.com', '1', 'Toluca', 'uriel', '$2y$10$fqtlTNl2k743eMujz.qiaOVuJwMbKB9FuonYasebh42HqRs9DsDkq', 'C:\\laragon\\tmp\\phpB5AB.tmp', '2017-04-22 02:25:47', '2017-04-22 02:25:47', 1, NULL),
(2, 'admin', '', '', '', 'admin@gmail.com', '', '', 'admin', '$2y$10$Iig/cBq2MGbQZ8kL1SHyIOpMPdh2YAH9/GLmqXlANRZcRut0PgOyy', '', '2017-05-05 02:26:09', '2017-05-05 02:26:09', 1, NULL),
(3, 'Santiago', 'Palomares', 'Davila', '7224324009', 'santiago@gmail.com', '1', 'San Mateo Atenco', 'santiago', '$2y$10$AnsatjstdHcGoDD9Cd4Ngu.pABuuRFsLXdvauDXFrO6Cbcfhr1UB2', '../images/user-sin-foto.png', '2017-05-06 05:10:54', '2017-05-06 05:10:54', 1, NULL),
(5, 'Erik', 'Rodriguez', 'Hernandez', '7224324009', 'erick8amxman@hotmail.com', '1', 'San Pablo temextipan', 'erikramos', '$2y$10$IoYCJH67DZweH80UDafKgeL/y4bKTxMoqO2YfY683B5//uet875eq', '../images/user-sin-foto.png', '2017-05-06 20:44:23', '2017-05-06 20:44:23', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `facturado` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `clientes_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `forma_pago_id` int(10) NOT NULL,
  `sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `total`, `facturado`, `created_at`, `updated_at`, `clientes_id`, `usuario_id`, `forma_pago_id`, `sucursal_id`) VALUES
(1, 100, 0, '2017-04-22 00:00:00', '2017-04-22 00:00:00', 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agente`
--
ALTER TABLE `agente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_ubicacion`
--
ALTER TABLE `detalle_ubicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_ubicacion_almacen1_idx` (`almacen_id`),
  ADD KEY `fk_detalle_ubicacion_productos1_idx` (`productos_id`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta_producto_productos1_idx` (`productos_id`),
  ADD KEY `fk_venta_producto_ventas1_idx` (`ventas_id`);

--
-- Indexes for table `documento_entrada`
--
ALTER TABLE `documento_entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impuestos_entrada`
--
ALTER TABLE `impuestos_entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impuestos_producto`
--
ALTER TABLE `impuestos_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiposcliente`
--
ALTER TABLE `tiposcliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agente`
--
ALTER TABLE `agente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detalle_ubicacion`
--
ALTER TABLE `detalle_ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documento_entrada`
--
ALTER TABLE `documento_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impuestos_entrada`
--
ALTER TABLE `impuestos_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `impuestos_producto`
--
ALTER TABLE `impuestos_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tiposcliente`
--
ALTER TABLE `tiposcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
