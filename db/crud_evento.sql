-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Set-2019 às 01:57
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_evento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestra`
--

CREATE TABLE `palestra` (
  `id` int(11) NOT NULL,
  `nome_palestra` varchar(255) NOT NULL,
  `palestrante` varchar(255) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palestra`
--

INSERT INTO `palestra` (`id`, `nome_palestra`, `palestrante`, `inicio`, `fim`) VALUES
(2, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Palestra2', 'Gabriel ', '2019-09-13 18:00:00', '2019-09-13 22:00:00'),
(4, 'Palestra4', 'Gabriel Schunck', '2019-09-13 22:00:00', '2019-09-14 22:31:00'),
(5, 'Palestra', 'Gabriel Schunckkkkkkkkk', '2019-09-13 22:00:00', '2019-09-14 22:31:00'),
(6, 'Palestra555', 'Gabriel 33', '2019-09-13 18:00:00', '2019-09-13 22:00:00'),
(7, 'Palestra555', 'Gabriel 33', '2019-09-13 18:00:00', '2019-09-13 22:00:00'),
(9, 'Palestra', 'Gabriel Schunckkkkkkkkk', '2019-09-13 22:00:00', '2019-09-14 22:31:00'),
(10, 'Palestra', 'Gabriel Schunckkkkkkkkk', '2019-09-13 22:00:00', '2019-09-14 22:31:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestra_pessoa`
--

CREATE TABLE `palestra_pessoa` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `id_palestra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`, `cidade`, `tipo`) VALUES
(1, 'Gabriel Schu', '95065750025', 'Porto Alegre', 'palestrante'),
(3, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'palestrante'),
(13, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'palestrante'),
(17, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(18, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(19, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(20, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(21, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(22, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4'),
(23, 'Gabriel Schunck', '95065750025', 'JoÃ£o Pessoa', 'teste4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `tipo`) VALUES
(1, 'gabriel', 'schunck', '1234', 'teste'),
(3, 'gabriel', 'schuncka', '1234', 'teste'),
(6, 'gabriel3', 'schunckaaaaaaaaaaaaaaaaaaaaa', '1234', 'teste3'),
(7, 'gabriels', 'gs', '1234', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `palestra`
--
ALTER TABLE `palestra`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `palestra_pessoa`
--
ALTER TABLE `palestra_pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`,`cpf`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `LOGIN` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `palestra`
--
ALTER TABLE `palestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `palestra_pessoa`
--
ALTER TABLE `palestra_pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
