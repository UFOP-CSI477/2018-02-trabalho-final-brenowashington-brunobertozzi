-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Dez-2018 às 21:59
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`id`, `id_1`, `id_2`, `created_at`, `updated_at`) VALUES
(5, 3, 1, '2018-12-12 21:41:23', '2018-12-12 21:41:23'),
(6, 1, 3, '2018-12-12 21:41:23', '2018-12-12 21:41:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

DROP TABLE IF EXISTS `denuncias`;
CREATE TABLE IF NOT EXISTS `denuncias` (
  `id_denuncia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `cod_sussurro` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_denuncia`),
  KEY `denuncias_cod_sussurro_foreign` (`cod_sussurro`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`id_denuncia`, `id`, `cod_sussurro`, `created_at`, `updated_at`) VALUES
(5, 1, 38, '2018-12-12 21:52:36', '2018-12-12 21:52:36');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`cod_img`, `arquivo`, `id_usuario`, `created_at`, `updated_at`) VALUES
(3, '../imagem/3/15443126035c0c571b9515d.jpg', 3, '2018-12-08 23:43:23', '2018-12-08 23:43:23'),
(4, '../imagem/1/15444677155c0eb503a92f7.jpg', 1, '2018-12-10 18:48:35', '2018-12-10 18:48:35'),
(5, '../imagem/1/15444754545c0ed33e45390.jpg', 1, '2018-12-10 20:57:34', '2018-12-10 20:57:34');

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`cod_post`, `id`, `texto`, `cod_img`, `created_at`, `updated_at`) VALUES
(1, 1, 'O dia estÃ¡ lindo!!', NULL, '2018-12-08 21:40:56', '2018-12-08 21:40:56'),
(2, 3, 'O dia hoje está um lixo, até porque eu sou um!', NULL, '2018-12-08 22:40:27', '2018-12-08 22:48:27'),
(3, 3, 'Rainhaaaaaaaa!', 3, '2018-12-08 23:43:23', '2018-12-08 23:43:23'),
(38, 1, 'Rainhaaaaaaaaaaa', 5, '2018-12-10 20:57:34', '2018-12-10 20:57:34'),
(37, 1, 'Gretchen!!!!!!!!!', 4, '2018-12-10 18:48:35', '2018-12-10 18:48:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_amizade`
--

DROP TABLE IF EXISTS `solicitacao_amizade`;
CREATE TABLE IF NOT EXISTS `solicitacao_amizade` (
  `id_pedinte` int(11) NOT NULL,
  `id_convidado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedinte`,`id_convidado`),
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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sussurros`
--

INSERT INTO `sussurros` (`cod_sussurro`, `texto`, `id_remetente`, `id_dest`, `id_post`, `valido`, `created_at`, `updated_at`) VALUES
(2, 'Pau no cu', 1, 3, NULL, 2, '2018-12-10 18:36:51', '2018-12-12 11:43:30'),
(3, 'Pau no cu', 1, 3, NULL, 1, '2018-12-10 20:55:55', '2018-12-12 11:45:59'),
(4, 'AAA', 1, 1, 1, 0, '2018-12-12 16:44:11', '2018-12-12 16:44:11'),
(5, 'AAAAA', 1, 1, 1, 0, '2018-12-12 16:53:40', '2018-12-12 16:53:40'),
(6, 'AAAAA', 1, 1, 1, 0, '2018-12-12 16:53:52', '2018-12-12 16:53:52'),
(7, 'AAAAA', 1, 1, 1, 0, '2018-12-12 16:53:53', '2018-12-12 16:53:53'),
(8, 'AA', 1, 1, 1, 0, '2018-12-12 16:54:43', '2018-12-12 16:54:43'),
(9, 'AA', 1, 1, 1, 0, '2018-12-12 16:54:45', '2018-12-12 16:54:45'),
(10, 'AA', 1, 1, 1, 0, '2018-12-12 16:54:45', '2018-12-12 16:54:45'),
(11, 'AA', 1, 1, 1, 0, '2018-12-12 16:54:45', '2018-12-12 16:54:45'),
(12, 'AA', 1, 1, 1, 0, '2018-12-12 16:54:45', '2018-12-12 16:54:45'),
(13, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:55:38', '2018-12-12 16:55:38'),
(14, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:55:41', '2018-12-12 16:55:41'),
(15, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:55:47', '2018-12-12 16:55:47'),
(16, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:55:48', '2018-12-12 16:55:48'),
(17, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:57:24', '2018-12-12 16:57:24'),
(18, 'AAAA', 1, 1, 1, 0, '2018-12-12 16:57:27', '2018-12-12 16:57:27'),
(19, 'AAA', 1, 1, 1, 0, '2018-12-12 16:57:53', '2018-12-12 16:57:53'),
(20, 'AAA', 1, 1, 1, 0, '2018-12-12 16:58:22', '2018-12-12 16:58:22'),
(21, 'AAAAAA', 1, 1, 1, 0, '2018-12-12 17:00:37', '2018-12-12 17:00:37'),
(22, 'AAAAA', 1, 1, 1, 0, '2018-12-12 17:01:54', '2018-12-12 17:01:54'),
(23, 'AAAAAAA', 1, 1, 1, 0, '2018-12-12 17:05:02', '2018-12-12 17:05:02'),
(24, 'AAAAAAA', 1, 1, 1, 0, '2018-12-12 17:05:21', '2018-12-12 17:05:21'),
(25, 'AAAAAAAAAA', 1, 1, 1, 0, '2018-12-12 17:05:34', '2018-12-12 17:05:34'),
(26, 'AAAAAAAAAA', 1, 1, 1, 0, '2018-12-12 17:07:51', '2018-12-12 17:07:51'),
(27, 'AAAAAAAAAA', 1, 1, 1, 0, '2018-12-12 17:07:53', '2018-12-12 17:07:53'),
(28, 'AAAAA', 1, 1, 1, 0, '2018-12-12 17:20:17', '2018-12-12 17:20:17'),
(29, 'BaS', 1, 1, 37, 0, '2018-12-12 17:37:36', '2018-12-12 17:37:36'),
(30, 'Me reponde mais rapido da proxima', 3, 1, 37, 0, '2018-12-12 21:41:42', '2018-12-12 21:41:42'),
(31, 'Pau no cu', 3, 1, 37, 0, '2018-12-12 21:42:46', '2018-12-12 21:42:46'),
(32, 'Um beijÃ£o', 3, 1, 37, 0, '2018-12-12 21:43:28', '2018-12-12 21:43:28'),
(33, 'AAA', 3, 1, 38, 0, '2018-12-12 21:43:42', '2018-12-12 21:43:42'),
(34, 'BBBB', 3, 1, 38, 0, '2018-12-12 21:43:47', '2018-12-12 21:43:47'),
(35, 'T', 3, 3, 3, 0, '2018-12-12 21:43:54', '2018-12-12 21:43:54'),
(36, 'Pau no cu', 3, 3, 3, 0, '2018-12-12 21:44:04', '2018-12-12 21:44:04'),
(37, 'Pau no seu cu', 1, 3, NULL, 0, '2018-12-12 21:51:40', '2018-12-12 21:51:40'),
(38, 'Pau no seu cu', 1, 3, NULL, 1, '2018-12-12 21:51:58', '2018-12-12 21:52:36');

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
(1, 'Breno Washington Lage de AraÃºjo', '1997-05-27', 'brenowla@gmail.com', '123456', 0, 0, 5, '2018-12-07 19:27:12', '2018-12-12 10:05:31'),
(3, 'Bruno', '2000-02-22', 'bruno@paunocu.com', '123456', 0, 0, 3, '2018-12-08 22:24:58', '2018-12-10 22:11:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
