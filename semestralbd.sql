-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 02:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semestralbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad_proyecto`
--

CREATE TABLE `actividad_proyecto` (
  `id_actividad` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `tiempo` decimal(10,0) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `materiales` varchar(100) DEFAULT NULL,
  `docente` varchar(30) DEFAULT NULL,
  `descripcion_lugar` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estado_de_proyecto`
--

CREATE TABLE `estado_de_proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `apellido` varchar(10) DEFAULT NULL,
  `id_facultad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estudiante_proyecto`
--

CREATE TABLE `estudiante_proyecto` (
  `cedula` varchar(10) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facultades`
--

CREATE TABLE `facultades` (
  `id_facultad` int(11) NOT NULL,
  `nombre_facultad` varchar(30) DEFAULT NULL,
  `Sede` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organizador`
--

CREATE TABLE `organizador` (
  `id_organizador` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `proponente` varchar(30) DEFAULT NULL,
  `responsable` varchar(30) DEFAULT NULL,
  `telefono_organizador` varchar(10) DEFAULT NULL,
  `celular_organizador` varchar(10) DEFAULT NULL,
  `Supervisor` varchar(30) DEFAULT NULL,
  `correo_electronico` varchar(30) DEFAULT NULL,
  `telefono_supervisor` varchar(10) DEFAULT NULL,
  `celular_supervisor` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Titulo` varchar(30) DEFAULT NULL,
  `Objetivo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `NivelProyecto` varchar(10) DEFAULT NULL,
  `Modalidad` varchar(10) DEFAULT NULL,
  `Cantidad_Maxima` int(11) DEFAULT NULL,
  `Facultad` varchar(30) DEFAULT NULL,
  `Perfil_estudiante` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_estado`
--

CREATE TABLE `tipo_estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_estado`
--

INSERT INTO `tipo_estado` (`id_estado`, `descripcion`) VALUES
(1, 'pendiente'),
(2, 'Aprobado'),
(3, 'Rechazado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad_proyecto`
--
ALTER TABLE `actividad_proyecto`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indexes for table `estado_de_proyecto`
--
ALTER TABLE `estado_de_proyecto`
  ADD PRIMARY KEY (`id_proyecto`,`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `id_facultad` (`id_facultad`);

--
-- Indexes for table `estudiante_proyecto`
--
ALTER TABLE `estudiante_proyecto`
  ADD PRIMARY KEY (`id_proyecto`,`cedula`),
  ADD KEY `cedula` (`cedula`);

--
-- Indexes for table `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indexes for table `organizador`
--
ALTER TABLE `organizador`
  ADD PRIMARY KEY (`id_organizador`);

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indexes for table `tipo_estado`
--
ALTER TABLE `tipo_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad_proyecto`
--
ALTER TABLE `actividad_proyecto`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
