-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Out-2017 às 20:51
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtrailers`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idTrailer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `rank`
--

INSERT INTO `rank` (`id`, `idUser`, `idTrailer`) VALUES
(2, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 2),
(6, 1, 3),
(7, 5, 3),
(8, 5, 2),
(9, 5, 1),
(10, 4, 3),
(11, 4, 2),
(12, 6, 3),
(13, 6, 2),
(14, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trailer`
--

CREATE TABLE `trailer` (
  `cod` int(11) NOT NULL,
  `titulo` varchar(35) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(256) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `trailer`
--

INSERT INTO `trailer` (`cod`, `titulo`, `descricao`, `link`) VALUES
(1, 'Pacific Rim 2', 'soco foguete', 'https://www.youtube.com/watch?v=kXAXZ6Y95GI'),
(2, 'Old Boy', 'vingança', 'https://www.youtube.com/watch?v=Vw5aOQcKBIo'),
(3, 'beyond good and evil 2', 'porco falante', 'https://www.youtube.com/watch?v=L449s9bVdeM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(32) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'shwggar', 'shwggar@gmail.com', 'a384b6463fc216a5f8ecb6670f86456a'),
(4, 'eric', 'eric@email.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'jessica', 'jaozin@email.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'felipe', 'felipe@email.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avaliacao_idUser_fk` (`idUser`),
  ADD KEY `avaliacao_idTrailer_fk` (`idTrailer`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `avaliacao_idTrailer_fk` FOREIGN KEY (`idTrailer`) REFERENCES `trailer` (`cod`),
  ADD CONSTRAINT `avaliacao_idUser_fk` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
