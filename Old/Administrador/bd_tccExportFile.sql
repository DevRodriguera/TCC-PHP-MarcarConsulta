-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2019 às 10:48
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_tcc`
--
CREATE DATABASE IF NOT EXISTS `bd_tcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradorlogin`
--

CREATE TABLE `administradorlogin` (
  `adm_id` int(11) NOT NULL,
  `adm_usuario` varchar(50) DEFAULT NULL,
  `adm_senha` varchar(50) DEFAULT NULL,
  `FK_posto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administradorlogin`
--

INSERT INTO `administradorlogin` (`adm_id`, `adm_usuario`, `adm_senha`, `FK_posto`) VALUES
(1, 'sao_benedito', '123', 1),
(2, 'jd_maringa', '123', 2),
(3, 'vila_aparecida', '123', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `age_id` int(11) NOT NULL,
  `age_data` date DEFAULT NULL,
  `age_horaInicio` time DEFAULT NULL,
  `age_horaFim` time DEFAULT NULL,
  `FK_posto` int(11) DEFAULT NULL,
  `FK_paciente` int(11) DEFAULT NULL,
  `FK_profissional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(50) DEFAULT NULL,
  `pac_sexo` char(1) DEFAULT NULL,
  `pac_data_nasc` varchar(10) DEFAULT NULL,
  `pac_cpf` varchar(20) DEFAULT NULL,
  `pac_celular` varchar(15) DEFAULT NULL,
  `pac_email` varchar(50) DEFAULT NULL,
  `pac_senha` varchar(50) DEFAULT NULL,
  `pac_cep` char(9) DEFAULT NULL,
  `pac_estado` char(2) DEFAULT NULL,
  `pac_cidade` varchar(50) DEFAULT NULL,
  `pac_bairro` varchar(50) DEFAULT NULL,
  `pac_rua` varchar(50) DEFAULT NULL,
  `pac_numeroCasa` int(11) DEFAULT NULL,
  `pac_complemento` varchar(255) DEFAULT NULL,
  `FK_posto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`pac_id`, `pac_nome`, `pac_sexo`, `pac_data_nasc`, `pac_cpf`, `pac_celular`, `pac_email`, `pac_senha`, `pac_cep`, `pac_estado`, `pac_cidade`, `pac_bairro`, `pac_rua`, `pac_numeroCasa`, `pac_complemento`, `FK_posto`) VALUES
(1, 'Rodrigo SouzaFogaÃ§a', 'm', '2002-04-07', '495.513.728-83', '(15) 99632-9654', 'souzarodrigo7@hotmail.com', 'cm9kcmlnbw==', '18405-215', 'SP', 'Itapeva', 'Jardim Brasil', 'Rua JosÃ© Rodrigues Jardim', 114, '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto`
--

CREATE TABLE `posto` (
  `posto_id` int(11) NOT NULL,
  `posto_nome` varchar(100) DEFAULT NULL,
  `posto_telefone` varchar(15) DEFAULT NULL,
  `posto_endereco` varchar(100) DEFAULT NULL,
  `posto_bairro` varchar(100) DEFAULT NULL,
  `posto_numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posto`
--

INSERT INTO `posto` (`posto_id`, `posto_nome`, `posto_telefone`, `posto_endereco`, `posto_bairro`, `posto_numero`) VALUES
(1, 'UBS São Benedito', '(15)3521-6326', 'Rua São Benedito', 'Vila São Benedito', 674),
(2, 'UBS Jd. Maringá', '(15)3521-6371', 'Rua Euclide de Campos', 'Jardim Maringá', 215),
(3, 'UBS Vila Aparecida', '(15)3521-6370', 'Rua Matãoo', 'Vila Aparecida', 750);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `pro_id` int(11) NOT NULL,
  `pro_nome` varchar(30) DEFAULT NULL,
  `pro_funcao` varchar(20) DEFAULT NULL,
  `FK_posto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradorlogin`
--
ALTER TABLE `administradorlogin`
  ADD PRIMARY KEY (`adm_id`),
  ADD KEY `FK_posto` (`FK_posto`);

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`age_id`),
  ADD KEY `FK_posto` (`FK_posto`),
  ADD KEY `FK_paciente` (`FK_paciente`),
  ADD KEY `FK_profissional` (`FK_profissional`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`pac_id`),
  ADD KEY `FK_posto` (`FK_posto`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`posto_id`);

--
-- Indexes for table `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `FK_posto` (`FK_posto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradorlogin`
--
ALTER TABLE `administradorlogin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `posto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profissional`
--
ALTER TABLE `profissional`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administradorlogin`
--
ALTER TABLE `administradorlogin`
  ADD CONSTRAINT `administradorlogin_ibfk_1` FOREIGN KEY (`FK_posto`) REFERENCES `posto` (`posto_id`);

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`FK_posto`) REFERENCES `posto` (`posto_id`),
  ADD CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`FK_paciente`) REFERENCES `paciente` (`pac_id`),
  ADD CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`FK_profissional`) REFERENCES `profissional` (`pro_id`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`FK_posto`) REFERENCES `posto` (`posto_id`);

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `profissional_ibfk_1` FOREIGN KEY (`FK_posto`) REFERENCES `posto` (`posto_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
