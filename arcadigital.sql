-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 03:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arcadigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `path`, `data_upload`) VALUES
(48, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6653c84b0bd23.png', '2024-05-27 00:39:55'),
(49, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6653d521cd306.png', '2024-05-27 01:34:41'),
(50, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6653d67ada04d.png', '2024-05-27 01:40:26'),
(51, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6653d77e716a3.png', '2024-05-27 01:44:46'),
(52, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/665473c50ebef.png', '2024-05-27 12:51:33'),
(53, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/665476f430a42.png', '2024-05-27 13:05:08'),
(54, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6655d480d2a9e.png', '2024-05-28 13:56:32'),
(55, 'Captura de ecrã 2023-07-03 165346.png', 'uploads/6655d91a2c4a6.png', '2024-05-28 14:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `arquivospriv`
--

CREATE TABLE `arquivospriv` (
  `id_priv` int(11) NOT NULL,
  `nome` varchar(160) NOT NULL,
  `path` varchar(160) NOT NULL,
  `data_upload` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arquivospriv`
--

INSERT INTO `arquivospriv` (`id_priv`, `nome`, `path`, `data_upload`) VALUES
(1, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6653d3b45cdd4.png', '2024-05-27 01:28:36'),
(2, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6653d4293f5c8.png', '2024-05-27 01:30:33'),
(3, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6653d4c57f671.png', '2024-05-27 01:33:09'),
(4, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6653d4d8aa3c6.png', '2024-05-27 01:33:28'),
(5, 'Captura de ecrã 2023-09-18 221813.png', 'uploads_priv/6653d631ea4d8.png', '2024-05-27 01:39:13'),
(6, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6653d694a54bb.png', '2024-05-27 01:40:52'),
(7, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/66546f974ad7f.png', '2024-05-27 12:33:43'),
(8, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6654715f30833.png', '2024-05-27 12:41:19'),
(9, 'Captura de ecrã 2023-07-03 165346.png', 'uploads_priv/6654770c91a0a.png', '2024-05-27 13:05:32'),
(10, 'Captura de ecrã 2023-09-18 221813.png', 'uploads_priv/6655d93340d24.png', '2024-05-28 14:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `senha`) VALUES
(36, 'vera', '1234'),
(37, 'laura', '1234'),
(38, 'maria', '1234'),
(39, 'luany', '4321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arquivospriv`
--
ALTER TABLE `arquivospriv`
  ADD PRIMARY KEY (`id_priv`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `arquivospriv`
--
ALTER TABLE `arquivospriv`
  MODIFY `id_priv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
