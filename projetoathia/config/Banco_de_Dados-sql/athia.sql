-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2025 às 15:39
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `athia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razao_social`, `nome_fantasia`, `cnpj`) VALUES
(1, 'Empresa Alpha Ltda', 'Alpha', '12.345.678/0001-99'),
(2, 'Beta Comércio SA', 'Beta', '98.765.432/0001-55'),
(3, 'Gamma Serviços ME', 'Gamma', '11.222.333/0001-44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_setor`
--

CREATE TABLE `empresa_setor` (
  `setor_id` int(10) UNSIGNED NOT NULL,
  `empresa_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa_setor`
--

INSERT INTO `empresa_setor` (`setor_id`, `empresa_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 2),
(4, 1),
(5, 3),
(6, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` longtext NOT NULL,
  `setor_pai_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `descricao`, `setor_pai_id`) VALUES
(1, 'Tecnologia', NULL),
(2, 'Recursos Humanos', NULL),
(3, 'Financeiro', NULL),
(4, 'Desenvolvimento de Software', 1),
(5, 'Suporte Técnico', 1),
(6, 'Recrutamento', 2),
(7, 'Contabilidade', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa_setor`
--
ALTER TABLE `empresa_setor`
  ADD PRIMARY KEY (`setor_id`,`empresa_id`),
  ADD KEY `fk_empresa_setor_empresa1_idx` (`empresa_id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setor_pai` (`setor_pai_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empresa_setor`
--
ALTER TABLE `empresa_setor`
  ADD CONSTRAINT `fk_empresa_setor_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empresa_setor_setor` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `setor`
--
ALTER TABLE `setor`
  ADD CONSTRAINT `fk_setor_pai` FOREIGN KEY (`setor_pai_id`) REFERENCES `setor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
