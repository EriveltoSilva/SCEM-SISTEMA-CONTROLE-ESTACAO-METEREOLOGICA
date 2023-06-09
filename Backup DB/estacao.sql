-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/06/2023 às 06:12
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
-- Banco de dados: `estacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_dados_sensores`
--

CREATE TABLE `tbl_dados_sensores` (
  `id` int(11) NOT NULL,
  `nivel_chuva` varchar(20) NOT NULL,
  `sensor_chuva` varchar(20) NOT NULL,
  `nivel_solo` varchar(20) NOT NULL,
  `sensor_solo` varchar(20) NOT NULL,
  `nivel_temperatura` varchar(20) NOT NULL,
  `sensor_temperatura` varchar(20) NOT NULL,
  `nivel_humidade` varchar(20) NOT NULL,
  `sensor_humidade` varchar(20) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_dados_sensores`
--

INSERT INTO `tbl_dados_sensores` (`id`, `nivel_chuva`, `sensor_chuva`, `nivel_solo`, `sensor_solo`, `nivel_temperatura`, `sensor_temperatura`, `nivel_humidade`, `sensor_humidade`, `data`) VALUES
(1, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:10:34'),
(2, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:10:44'),
(3, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:10:55'),
(4, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:11:06'),
(5, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:11:17'),
(6, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:11:28'),
(7, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:11:39'),
(8, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:11:49'),
(9, 'INTENSA', '~100%', 'ALAGADO', '~100%', 'AMENA', '~28.50ºC', 'AMENA', '~68.00%', '2023-06-05 05:12:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) NOT NULL,
  `ultimoNome` varchar(75) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `genero` char(1) DEFAULT 'M',
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `ultimoNome`, `email`, `username`, `telefone`, `genero`, `senha`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '+244940811141', 'M', 'admin'),
(2, 'Kelvio', 'Eduardo', 'kelvio@gmail.com', NULL, '922222222', 'M', 'kelvio'),
(3, 'Erivelto', 'Silva', 'eriveltoclenio@gmail.com', NULL, '912868486', 'M', 'erivelto'),
(4, 'nathan', 'nathan', 'nathan@gmail.com', NULL, '926566848', 'M', 'nathan'),
(5, 'Domingas', 'Domingas', 'domingas@gmail.com', 'domingas', '900000000', 'o', 'domingas');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_dados_sensores`
--
ALTER TABLE `tbl_dados_sensores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idc_email` (`email`),
  ADD UNIQUE KEY `idc_telefone` (`telefone`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_dados_sensores`
--
ALTER TABLE `tbl_dados_sensores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
