-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2017 às 00:24
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_guildmanager`
--
CREATE DATABASE IF NOT EXISTS `bd_guildmanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_guildmanager`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `dinheiro` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`nome`) VALUES
('classe 1'),
('classe 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario_nick` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `usuario_nick`, `descricao`, `data`) VALUES
(24, 'lanÃ§amento guild manasddger', 'admin', 'entrega do trabalho haha', '3333-03-31 03:33:00'),
(25, 'sdsdf', 'aaa', 'sdfsd', '2222-02-22 22:22:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `posse` varchar(20) NOT NULL,
  `personagem_nome` varchar(45) NOT NULL,
  `personagem_usuario_nick` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `nome`, `tipo`, `valor`, `posse`, `personagem_nome`, `personagem_usuario_nick`) VALUES
(1, 'sfddasf', 'assd', '123', 'aaaa', 'aaaa', 'gla123'),
(2, 'aaaa', 'aaa', '111', 'safsafsa', 'safsafsa', 'gla123'),
(3, 'aaa', '111', '111', 'safsafsa', 'safsafsa', 'gla123'),
(4, 'itemv 3', 'aa', '333', 'safsafsa', 'safsafsa', 'gla123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemguild`
--

CREATE TABLE `itemguild` (
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `posse` varchar(45) NOT NULL,
  `personagem_usuario_nick` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins`
--

CREATE TABLE `logins` (
  `usuario_nick` varchar(45) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logins`
--

INSERT INTO `logins` (`usuario_nick`, `data`) VALUES
('gla123', '2017-06-20 15:44:46'),
('gla123', '2017-06-20 15:45:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `nome` varchar(45) NOT NULL,
  `dinheiro` double NOT NULL,
  `raca` varchar(45) NOT NULL,
  `usuario_nick` varchar(45) NOT NULL,
  `classe_nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`nome`, `dinheiro`, `raca`, `usuario_nick`, `classe_nome`) VALUES
('aaaa', 2332, 'awa', 'gla123', 'classe 1'),
('guilda', 11, 'guild', 'admin', 'classe 1'),
('rainha', 25000, 'nobre', 'admin', 'classe 1'),
('rei', 56, 'mto nobre', 'admin', 'classe 3'),
('safsafsa', 123, 'sdss', 'gla123', 'classe 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `sobrenome`, `nick`, `senha`, `tipo`, `email`) VALUES
('aaa', 'admin', 'aaa', '12345', 'Sub Lider', 'guild@admin.com'),
('Administrador', 'admin', 'admin', '12354', 'Sub Lider', 'guild@admin.com'),
('Glauber', 'Gomes de Souza', 'gla123', '1q2w3e4r', 'Membro Comum', 'sglauber26@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`dinheiro`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`,`usuario_nick`),
  ADD KEY `fk_evento_usuario1_idx` (`usuario_nick`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`,`posse`),
  ADD KEY `fk_item_personagem1_idx` (`personagem_nome`,`personagem_usuario_nick`);

--
-- Indexes for table `itemguild`
--
ALTER TABLE `itemguild`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personagem_usuario_nick` (`personagem_usuario_nick`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD KEY `nick_fk` (`usuario_nick`);

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`nome`,`usuario_nick`),
  ADD KEY `fk_personagem_usuario1_idx` (`usuario_nick`),
  ADD KEY `fk_personagem_classe1_idx` (`classe_nome`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nick`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `itemguild`
--
ALTER TABLE `itemguild`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_usuario1` FOREIGN KEY (`usuario_nick`) REFERENCES `usuario` (`nick`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_personagem1` FOREIGN KEY (`personagem_nome`,`personagem_usuario_nick`) REFERENCES `personagem` (`nome`, `usuario_nick`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itemguild`
--
ALTER TABLE `itemguild`
  ADD CONSTRAINT `personagem_usuario_nick` FOREIGN KEY (`personagem_usuario_nick`) REFERENCES `usuario` (`nick`);

--
-- Limitadores para a tabela `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `nick_fk` FOREIGN KEY (`usuario_nick`) REFERENCES `usuario` (`nick`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `personagem`
--
ALTER TABLE `personagem`
  ADD CONSTRAINT `fk_personagem_classe1` FOREIGN KEY (`classe_nome`) REFERENCES `classe` (`nome`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personagem_usuario1` FOREIGN KEY (`usuario_nick`) REFERENCES `usuario` (`nick`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
