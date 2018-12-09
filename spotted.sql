-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 09-Dez-2018 às 01:17
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
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_1` int(11) NOT NULL,
  `id_2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_1` (`id_1`),
  KEY `id_2` (`id_2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

DROP TABLE IF EXISTS `denuncias`;
CREATE TABLE IF NOT EXISTS `denuncias` (
  `id_denuncia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `cod_post` int(10) UNSIGNED DEFAULT NULL,
  `cod_sussurro` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_denuncia`),
  KEY `denuncias_cod_post_foreign` (`cod_post`),
  KEY `denuncias_cod_sussurro_foreign` (`cod_sussurro`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `cod_img` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_img`),
  KEY `fotos_id_usuario_foreign` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`cod_img`, `arquivo`, `id_usuario`, `created_at`, `updated_at`) VALUES
(3, '../imagem/3/15443126035c0c571b9515d.jpg', 3, '2018-12-08 23:43:23', '2018-12-08 23:43:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `cod_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `texto` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_img` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_post`),
  KEY `post_id_foreign` (`id`),
  KEY `post_cod_img_foreign` (`cod_img`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`cod_post`, `id`, `texto`, `cod_img`, `created_at`, `updated_at`) VALUES
(1, 1, 'O dia estÃ¡ lindo!!', NULL, '2018-12-08 21:40:56', '2018-12-08 21:40:56'),
(2, 3, 'O dia hoje está um lixo, até porque eu sou um!', NULL, '2018-12-08 22:40:27', '2018-12-08 22:48:27'),
(3, 3, 'Rainhaaaaaaaa!', 3, '2018-12-08 23:43:23', '2018-12-08 23:43:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_amizade`
--

DROP TABLE IF EXISTS `solicitacao_amizade`;
CREATE TABLE IF NOT EXISTS `solicitacao_amizade` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pedinte` int(11) NOT NULL,
  `id_convidado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_pedinte` (`id_pedinte`),
  KEY `id_convidado` (`id_convidado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sussurros`
--

DROP TABLE IF EXISTS `sussurros`;
CREATE TABLE IF NOT EXISTS `sussurros` (
  `cod_sussurro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `texto` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_remetente` int(11) NOT NULL,
  `id_dest` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `valido` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_sussurro`),
  KEY `id_remetente` (`id_remetente`),
  KEY `id_dest` (`id_dest`),
  KEY `id_post` (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `e_mail` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `validade` tinyint(4) NOT NULL DEFAULT '0',
  `foto_perfil` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`e_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `data_nasc`, `e_mail`, `senha`, `type`, `validade`, `foto_perfil`, `created_at`, `updated_at`) VALUES
(1, 'Breno Washington Lage de AraÃºjo', '1997-05-27', 'brenowla@gmail.com', '123456', 0, 0, NULL, '2018-12-07 19:27:12', '2018-12-07 21:31:59'),
(3, 'Bruno', '2000-02-22', 'bruno@paunocu.com', '123456', 0, 0, NULL, '2018-12-08 22:24:58', '2018-12-08 22:24:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
