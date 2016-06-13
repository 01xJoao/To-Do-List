-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2016 at 01:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `tipo_departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `tipo_departamento`) VALUES
(1, 'Design'),
(2, 'Programação'),
(34, 'Vendas'),
(71, 'Testes'),
(72, 'TEste1'),
(73, 'TEste2');

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `nome_lista` varchar(255) NOT NULL,
  `texto_lista` text NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lista`
--

INSERT INTO `lista` (`id`, `nome_lista`, `texto_lista`, `id_utilizador`) VALUES
(6, 'listateste', 'listas', 9),
(9, 'Lista de compras', 'O mercado continente', 1),
(12, 'List Final', 'teste', 10),
(13, 'Trabalhos', 'Trabalhos para entregar', 1),
(14, 'Lista de Compras', 'O que comprar no mercado.', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nome_tarefa` varchar(255) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `completa` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome_tarefa`, `id_lista`, `completa`) VALUES
(37, 'daaa', 9, 0),
(38, 'aaa', 9, 0),
(39, 'ww', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `primeiro_nome` varchar(255) NOT NULL,
  `ultimo_nome` varchar(255) NOT NULL,
  `Departamento` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `primeiro_nome`, `ultimo_nome`, `Departamento`, `email`, `username`, `password`) VALUES
(1, 'Manuel', 'Vieira', 1, 'manel@outlook.com', 'manel', '123abc'),
(2, 'Vitor', 'Barbosa', 2, 'vitorbarbosa@yahoo.com', 'vitorb', 'aaabbb'),
(3, 'Maria', 'Fatima', 1, 'maria@gmail.com', 'maria1', 'afaf'),
(4, 'joao', 'palma', 2, 'joao@gmail.com', 'joaowd', '123'),
(5, 'carla', 'esteves', 1, 'carlas@gmail.com', 'carlas', '123'),
(6, 'joaquim', 'pereira', 2, 'jokas@lol.com', 'jokas', '123'),
(7, 'catarina', 'feras', 2, 'catarina@outlook.com', 'catarina', 'qwe'),
(8, 'maria', 'lafa', 2, 'oioi@yahoo.com', 'oioi', '123'),
(10, 'Admin', 'admin', 2, 'admin@admin.com', 'admin', 'admin'),
(11, 'joao', 'palma', 34, 'awdad@dawd.com', 'joaopalma', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `lista`
--
ALTER TABLE `lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
