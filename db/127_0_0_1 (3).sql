-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/04/2025 às 05:13
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_condominio`
--
CREATE DATABASE IF NOT EXISTS `db_condominio` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `db_condominio`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `pontoEncontro` varchar(100) NOT NULL,
  `duracao` time NOT NULL,
  `informacoes` varchar(150) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dataCriacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`idEvento`, `nome`, `dataInicio`, `horaInicio`, `pontoEncontro`, `duracao`, `informacoes`, `imagem`, `status`, `dataCriacao`) VALUES
(2, 'Batata1', '2025-04-06', '23:12:00', 'TEste1', '04:50:00', 'TEste2', '../imagensEventos/c8006cf1ef3a25be836a7733b1ff394e.jpg', 1, '2025-04-06 22:46:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticia`
--

CREATE TABLE `noticia` (
  `idNoticia` int(11) NOT NULL,
  `manchete` varchar(50) NOT NULL,
  `informacao` varchar(150) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `dataNoticia` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `noticia`
--

INSERT INTO `noticia` (`idNoticia`, `manchete`, `informacao`, `imagem`, `dataNoticia`, `status`) VALUES
(1, 'TESTE Felipe', 'TEste3', '../imagemNoticia/d9c01826a4d82ceab09eeb93908ca043.jpg', '2025-04-06', 1),
(2, 'Teste', 'Teste', '../imagemNoticia/467d37d4f8b268b8ebe9e4b396792d4f.jpg', '2025-04-06', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissao`
--

CREATE TABLE `profissao` (
  `idProfissao` int(11) NOT NULL,
  `nomeProfissao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `profissao`
--

INSERT INTO `profissao` (`idProfissao`, `nomeProfissao`) VALUES
(1, 'Zelador'),
(2, 'Porteiro'),
(3, 'Faxineiro'),
(4, 'Jardineiro'),
(5, 'Piscineiro'),
(6, 'Eletricista'),
(7, 'Encanador'),
(8, 'Pedreiro'),
(9, 'Vigilante'),
(10, 'Técnico de manutenção predial'),
(11, 'Mecânico'),
(12, 'Teste'),
(13, 'Teste 002'),
(14, 'Adestrador'),
(15, 'Veterinário'),
(16, 'Pedreiro'),
(17, 'Engenheiro Civil'),
(18, 'Arquiteto'),
(19, 'Carpinteiro'),
(20, 'Adestrador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `idProfissao` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `profissional`
--

INSERT INTO `profissional` (`id`, `nome`, `telefone`, `email`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `cnpj`, `idProfissao`, `status`) VALUES
(1, 'Limpa tudo', '(11) 95470-6234', 'limpatudo@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '00.098.356/0001-00', 15, 1),
(2, 'Jonas', '(11) 11111-1111', 'jonas@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '30.666.956/0001-98', 4, 1),
(3, 'Pedro', '(11) 11111-1111', 'pedro@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', 11, 1),
(4, 'Lucas Santos', '(11) 99593-7887', 'Lucas@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '55.313.301/0001-67', 3, 1),
(5, 'Julia', '(11) 11111-1111', 'Julia@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', 3, 1),
(6, 'Joana', '(11) 11111-1111', 'joana@gmail.com', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL,
  `caminhoFoto` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `nivel` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `telefone`, `email`, `senha`, `dataNascimento`, `caminhoFoto`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `complemento`, `numero`, `nivel`, `ip`, `dataCadastro`, `status`) VALUES
(5, 'MARIA', '730.858.990-06', '(10) 02020-2202', 'Maria@gmail.com', '$2y$10$TFXZqJ0MsLfdS6WbjJ6Ltusp4Wfai3gdKa1BOOLGilhjub2bzpCGu', '0000-00-00', '../fotoUsuarios/6053b18ee509b40dd00fbf2fa27bba3b.jpg', '', 'DPDDPDODP', 'DKJDD', 'JJKJJJ', 'JJ', 'JJJJ', '', 0, '', '0000-00-00 00:00:00', 0),
(11, 'Julia5554', '076.087.170-17', '(33) 33333-3333', 'Julia@gmail.com', '$2y$10$3FfbAWwNXKbskUwtO.riS.KRgsZI.OZMcOAOI5T3RiBrMx1gCHsqS', '2025-02-27', '../fotoUsuarios/adec2d32c3faab46385b6c18f4771869.jpg', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', '', 1, '127.0.0.1', '2025-03-23 19:02:54', 1),
(12, 'Miguel', '442.530.780-10', '(33) 33333-3333', 'Miguel@gmail.com', '$2y$10$E7dGUvhM4gY/PzB61QBOsuvURtfcvffdrorzryNbn/dJdbALNY8.2', '2025-03-07', '../fotoUsuarios/10776beb864a7304519c3ab82f39ba83.jpg', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', '', 1, '127.0.0.1', '2025-03-23 20:10:24', 1),
(13, 'Richard', '674.189.430-67', '(11) 99593-7887', 'richard@gmail.com', '$2y$10$T1iicByNAHR3E6biKbbrye/lN5JfK2UjfYuva5ZrqMUfneOKEZpWa', '2025-03-07', '../fotoUsuarios/52243221d61b0a89ec50879ac4d1be66.jpg', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', 'Casa Branca', '666', 1, '127.0.0.1', '2025-03-25 21:17:08', 1),
(14, 'Admin Ontimenet', '673.475.500-25', '(11) 45088-005', 'suporte@ontimenet.com.br', '$2y$10$Xfxtre2S8FVFQL39YJn2PeWGoKibxJ6ghlpA/sSQBQCF9SXh5.OoG', '2005-09-02', '../fotoUsuarios/6670e7b054da34d9c7d5d636bb8523d5.jpg', '03077-000', 'Rua Ulisses Cruz', 'Tatuapé', 'São Paulo', 'SP', 'Empresa de Informatica', '28', 5, '127.0.0.1', '2025-03-25 21:24:54', 1),
(15, 'Fernando Almeida', '987.654.321-00', '(11) 98765-4321', 'famclub@gmail.com', '$2y$10$UbFvdeSXhmgMVziqfdCcdOahryOsFc6I9kV0wDPxOYHxaokLGUHZK', '1980-11-29', '../fotoUsuarios/cc9ee3b50eb770c9253ff82131051ccf.jpg', '03077-000', 'Rua Ulisses Cruz', 'Tatuapé', 'São Paulo', 'SP', '', '28', 1, '177.32.133.30', '2025-03-31 10:39:44', 1),
(16, 'RODRIGO', '278.225.448-02', '(11) 98119-5846', 'rodrigo@ontimenet.com.br', '$2y$10$SOuifGKtzJaWgeo.ZejyJucp1zJWDcJwHtmwQ8v9SwPsxnEgiV58i', '1979-04-10', '../fotoUsuarios/7793344e6b213f0cde31605644f83ddb.jpg', '', '', '', '', '', '', '', 1, '177.62.178.218', '2025-04-01 17:12:04', 1),
(17, 'Felipe Silva', '658.349.710-75', '(11) 11111-1111', 'felipescerqueira2005@gmail.com', '$2y$10$CjhFR50PLmkfrsJ8MDfWxe7t7XwDeSmD9RQuwiPpw9c13DvScmhaq', '2025-03-05', '../fotoUsuarios/02ce1726ae27358faff4ccf0d9b0c232.jpg', '03581-160', 'Rua Laranja da Bahia', 'Jardim Fernandes', 'São Paulo', 'SP', '', '6b', 1, '127.0.0.1', '2025-04-02 10:41:01', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Índices de tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Índices de tabela `profissao`
--
ALTER TABLE `profissao`
  ADD PRIMARY KEY (`idProfissao`);

--
-- Índices de tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profissional_profissao` (`idProfissao`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `profissao`
--
ALTER TABLE `profissao`
  MODIFY `idProfissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `fk_profissional_profissao` FOREIGN KEY (`idProfissao`) REFERENCES `profissao` (`idProfissao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
