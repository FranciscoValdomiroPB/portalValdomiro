-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/05/2023 às 02:43
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pousadas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliação_da_pousada`
--

CREATE TABLE `avaliação_da_pousada` (
  `id_avaliacao_pousada` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_pousada` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliação_do_restaurante`
--

CREATE TABLE `avaliação_do_restaurante` (
  `id_avaliacao_restaurante` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_restaurante` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `codigo_login` int(11) NOT NULL,
  `nome_completo_login` varchar(100) DEFAULT NULL,
  `nome_login` varchar(50) DEFAULT NULL,
  `senha_login` varchar(50) DEFAULT NULL,
  `tipo_login` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`codigo_login`, `nome_completo_login`, `nome_login`, `senha_login`, `tipo_login`) VALUES
(1, 'FRANCISCO VALDOMIRO PINTO BEZERRA', 'francisco', '202cb962ac59075b964b07152d234b70', '1'),
(5, 'lucivan', 'lucivan', '202cb962ac59075b964b07152d234b70', '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pousada`
--

CREATE TABLE `pousada` (
  `id_pousada` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `numero_quartos` int(11) DEFAULT NULL,
  `preco_noite` decimal(10,2) DEFAULT NULL,
  `fotos` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pousada`
--

INSERT INTO `pousada` (`id_pousada`, `id_administrador`, `nome`, `descricao`, `endereco`, `cidade`, `estado`, `pais`, `numero_quartos`, `preco_noite`, `fotos`) VALUES
(1, NULL, 'POUSADA TUCANO', 'Localizada bem no centro de Presidente Figueiredo-AM, a Pousada Tucanos oferece conforto e\n					tranquilidade\n					para os seus hóspedes. São diversos quartos com ar-condicionado, TV, Wi-fi e\n					fri', ' Av. Maçaranduba, 606-704 - Honório Roldão', 'PRESIDENTE FIGUEIREDO', 'AMAZONAS', 'BRASIL', 1, 100.00, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/89/2e/2f/pousada-tucano.jpg?w=400&amp;h=-1&amp;s=1 1x,https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/89/2e/2f/pousada-tucano.jpg?'),
(2, NULL, 'Local Hostel', 'O hostel é uma delícia, o atendimento e café da manhã bem completo, a Local Hostel é o lugar perfeito para quem busca descanso e diversão. São diversos quartos, equipados com ar-condicionado, TV e fri', 'Av. Pe Calleri, 60 - Tancredo Neves', 'Presidente Figueiredo', 'Amazonas', 'Brasil', NULL, NULL, 'https://media-cdn.tripadvisor.com/media/photo-s/14/ec/fb/e2/local-hostel-figueiredo.jpg'),
(3, NULL, 'Pousada 1 lugar', 'Ambiente bem instagramaveis, a Pousada 1 lugar oferece um clima agradável e uma vista deslumbrante. São diversos chalés equipados com ar-condicionado, TV e frigobar. Além disso, a pousada conta com Wi', 'BR 174 - KM 1004', 'PRESIDENTE FIGUEIREDO', 'AMAZONAS', 'BRASIL', NULL, NULL, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/1f/ce/26/hotel-1-lugar.jpg?w=1200&amp;h=-1&amp;s=1 1x,https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/1f/ce/26/hotel-1-lugar.jpg?w');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_pousada` int(11) DEFAULT NULL,
  `data_checkin` date DEFAULT NULL,
  `data_checkout` date DEFAULT NULL,
  `numero_hospedes` int(11) DEFAULT NULL,
  `preco_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `restaurante`
--

CREATE TABLE `restaurante` (
  `id_restaurante` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `tipo_cozinha` varchar(100) DEFAULT NULL,
  `faixa_preco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuário`
--

CREATE TABLE `usuário` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Índices de tabela `avaliação_da_pousada`
--
ALTER TABLE `avaliação_da_pousada`
  ADD PRIMARY KEY (`id_avaliacao_pousada`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pousada` (`id_pousada`);

--
-- Índices de tabela `avaliação_do_restaurante`
--
ALTER TABLE `avaliação_do_restaurante`
  ADD PRIMARY KEY (`id_avaliacao_restaurante`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_restaurante` (`id_restaurante`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`codigo_login`);

--
-- Índices de tabela `pousada`
--
ALTER TABLE `pousada`
  ADD PRIMARY KEY (`id_pousada`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pousada` (`id_pousada`);

--
-- Índices de tabela `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`id_restaurante`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Índices de tabela `usuário`
--
ALTER TABLE `usuário`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliação_da_pousada`
--
ALTER TABLE `avaliação_da_pousada`
  MODIFY `id_avaliacao_pousada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliação_do_restaurante`
--
ALTER TABLE `avaliação_do_restaurante`
  MODIFY `id_avaliacao_restaurante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `codigo_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pousada`
--
ALTER TABLE `pousada`
  MODIFY `id_pousada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuário`
--
ALTER TABLE `usuário`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliação_da_pousada`
--
ALTER TABLE `avaliação_da_pousada`
  ADD CONSTRAINT `avaliação_da_pousada_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuário` (`id_usuario`),
  ADD CONSTRAINT `avaliação_da_pousada_ibfk_2` FOREIGN KEY (`id_pousada`) REFERENCES `pousada` (`id_pousada`);

--
-- Restrições para tabelas `avaliação_do_restaurante`
--
ALTER TABLE `avaliação_do_restaurante`
  ADD CONSTRAINT `avaliação_do_restaurante_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuário` (`id_usuario`),
  ADD CONSTRAINT `avaliação_do_restaurante_ibfk_2` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id_restaurante`);

--
-- Restrições para tabelas `pousada`
--
ALTER TABLE `pousada`
  ADD CONSTRAINT `pousada_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`);

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuário` (`id_usuario`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_pousada`) REFERENCES `pousada` (`id_pousada`);

--
-- Restrições para tabelas `restaurante`
--
ALTER TABLE `restaurante`
  ADD CONSTRAINT `restaurante_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
