-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Abr-2021 às 17:41
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `deividsilva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `idVeiculo` int NOT NULL AUTO_INCREMENT,
  `chassi` int NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int NOT NULL,
  `placa` varchar(100) NOT NULL,
  `caracteristicas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idVeiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`idVeiculo`, `chassi`, `marca`, `modelo`, `ano`, `placa`, `caracteristicas`) VALUES
(7, 253642, 'Fiat', 'Palio', 2020, 'IOR5231', 'Economico, Classico'),
(9, 625262, 'Fiat', 'Uno', 2015, 'BRF6325', 'Classico, Turbo'),
(10, 589631, 'Volkswagen', 'Gol', 2008, 'OOR8496', 'Turbo, Economico'),
(11, 563428, 'Hyundai', 'HB20', 2021, 'GTR2346', 'Para longas viagens, Turbo'),
(13, 634659, 'Volkswagen', 'Fox', 2017, 'AFQ3980', 'Economico, Classico');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
