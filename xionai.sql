-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2019 às 11:25
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xionai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorios`
--

CREATE TABLE `laboratorios` (
  `idlaboratorios` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `img` text NOT NULL,
  `capacidade` int(11) NOT NULL,
  `projetor` tinyint(1) NOT NULL,
  `caixa` int(11) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `laboratorios`
--

INSERT INTO `laboratorios` (`idlaboratorios`, `nome`, `img`, `capacidade`, `projetor`, `caixa`, `ar`) VALUES
(12, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(13, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(14, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(15, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(16, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(17, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(18, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(19, 'Lab1-134A', '134A.jpg', 20, 1, 1, 1),
(20, 'Sala do victor (ruim)', '', 20, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `idreservas` int(11) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `data` varchar(45) NOT NULL,
  `num_aulas` int(11) NOT NULL,
  `h1` int(11) NOT NULL,
  `h2` int(11) NOT NULL,
  `h3` int(11) NOT NULL,
  `h4` int(11) NOT NULL,
  `h5` int(11) NOT NULL,
  `data_hora_reserva` varchar(45) NOT NULL,
  `fk_laboratorios` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`idreservas`, `turno`, `data`, `num_aulas`, `h1`, `h2`, `h3`, `h4`, `h5`, `data_hora_reserva`, `fk_laboratorios`, `fk_usuario`) VALUES
(4, 'Tarde', '2019-11-12', 3, 1, 1, 1, 0, 0, '29-11-2019 às 09:56:44', 12, 1),
(5, 'Tarde', '', 1, 1, 0, 0, 0, 0, '29-11-2019 às 10:05:48', 12, 1),
(6, 'Manhã', '28/11/2019', 2, 0, 1, 1, 0, 0, '29-11-2019 às 10:07:04', 12, 1),
(7, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(8, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(9, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(12, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(13, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(14, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(19, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(21, 'Manhã', '28/11/2019', 2, 1, 1, 0, 0, 0, '29-11-2019 às 10:09:11', 13, 1),
(23, 'Noite', '28/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:08:06', 12, 1),
(24, 'Tarde', '15/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:08:13', 12, 1),
(25, 'Tarde', '27/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:08:36', 12, 1),
(26, 'Manhã', '13/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:08:42', 13, 1),
(27, 'Tarde', '27/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:09:22', 13, 1),
(28, 'Tarde', '27/11/2019', 0, 0, 0, 0, 0, 0, '29-11-2019 às 11:09:22', 13, 1),
(29, 'Noite', '20/11/2019', 2, 0, 0, 1, 1, 0, '29/11/2019 às 11:10:03', 14, 1),
(30, 'Noite', '20/11/2019', 2, 0, 0, 1, 1, 0, '29/11/2019 às 11:10:03', 14, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nome`, `idade`, `username`, `senha`, `email`) VALUES
(1, 'Thales ', 19, 'thales19', 'thales19', 'thales@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`idlaboratorios`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idreservas`),
  ADD KEY `fk_laboratorios` (`fk_laboratorios`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `idlaboratorios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idreservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`fk_laboratorios`) REFERENCES `laboratorios` (`idlaboratorios`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`idusuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
