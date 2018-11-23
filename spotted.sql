-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Nov-2018 às 23:14
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotted`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizades`
--

DROP TABLE IF EXISTS `amizades`;
CREATE TABLE IF NOT EXISTS `amizades` (
  `ID_1` int(11) NOT NULL,
  `ID_2` int(11) NOT NULL,
  PRIMARY KEY (`ID_1`,`ID_2`),
  KEY `fk_id2` (`ID_2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `ID` int(11) NOT NULL,
  `ARQUIVO` varchar(60) NOT NULL,
  `COD_IMG` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`COD_IMG`),
  KEY `fk_id` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `ID` int(11) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `PRIVILEGIOS` int(11) NOT NULL,
  KEY `fk_id` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `legal`
--

DROP TABLE IF EXISTS `legal`;
CREATE TABLE IF NOT EXISTS `legal` (
  `COD_POST` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `COD_LEGAL` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`COD_LEGAL`),
  KEY `fk_id` (`ID`),
  KEY `fk_post` (`COD_POST`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(11) NOT NULL,
  `TEXTO` text NOT NULL,
  `COD_POST` int(11) NOT NULL AUTO_INCREMENT,
  `ARQUIVO` varchar(60) NOT NULL,
  PRIMARY KEY (`COD_POST`),
  KEY `fk_id` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sussurros`
--

DROP TABLE IF EXISTS `sussurros`;
CREATE TABLE IF NOT EXISTS `sussurros` (
  `ID` int(11) NOT NULL,
  `TEXTO` text NOT NULL,
  `COD_SUSSURRO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`COD_SUSSURRO`),
  KEY `fk_id` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  `DATA_NASC` date NOT NULL,
  `E_MAIL` varchar(50) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `TIPO` int(11) NOT NULL,
  `VALIDADE` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
