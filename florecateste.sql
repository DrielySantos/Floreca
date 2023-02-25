-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Fev-2023 às 14:07
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `florecateste`
--
CREATE DATABASE IF NOT EXISTS `florecateste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `florecateste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` char(14) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `datanascimento` date NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `telefone`, `cpf`, `rg`, `datanascimento`, `cep`, `numerocasa`, `email`) VALUES
(1, 'William Costa', '(21)97070-7070', '120157142-10', '', '1987-04-15', '23036-060', 900, 'william@gmail.com'),
(2, 'Sue Costa', '21989247323', '17548215745', '12578954', '1994-02-15', '23036060', 96, 'sue@gmail.com'),
(3, 'Maria Vaz', '21985474521', '12515412470', '12024589', '1987-04-25', '23036060', 52, 'mariavaz@gmail.com'),
(4, 'Pedro Rodrigo', '21975854121', '16423025410', '1632048', '1990-03-16', '21512170', 18, 'pedro@gmail.com'),
(5, 'Caio Luiz', '21985746521', '14715412476', '15425797', '2000-04-15', '21512110', 78, 'caio@outlook.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('sended','readed','responded','deleted') DEFAULT 'sended'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`nome`, `telefone`, `email`, `message`, `status`) VALUES
('João Santos', '21985746526', 'joaosantos@gmail.com', 'Preenchimento Facial', 'sended');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `cep` char(9) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`cep`, `rua`, `bairro`, `cidade`, `uf`) VALUES
('23085-610', 'Rua Padre Pauwels', 'Campo Grande', 'Rio de Janeiro', 'RJ'),
('26551-090', 'Travessa Elpidio', 'Cruzeiro do Sul', 'Mesquita', 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `cpffuncionario` char(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` smallint(6) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `cpffuncionario`, `nome`, `telefone`, `rg`, `cep`, `numerocasa`, `foto`, `email`) VALUES
(1, '10112412014', 'Mário Silva', '(21)9999-8888', '0001', '23085-610', 40, NULL, 'mariosilva@outlook.com'),
(2, '14520135478', 'Gabriel Silva', '(21)9999-7777', '0002', '26551-090', 100, NULL, 'silva@gmail.com'),
(3, '14715412470', 'Nelly Vasquez', '21985746520', '15425798', '21512110', 80, NULL, 'nelly@outlook.com'),
(4, '12015612444', 'Diná Costa', '21977776666', '15425793', '23036060', 900, NULL, 'dina@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemservico`
--

CREATE TABLE `itemservico` (
  `iditem` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `idprocedimento` int(11) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `valor` double NOT NULL,
  `categoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itemservico`
--

INSERT INTO `itemservico` (`iditem`, `idfuncionario`, `idservico`, `idprocedimento`, `horario`, `valor`, `categoria`) VALUES
(7, 4, 9, 1, '', 500, 'facial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idprocedimento` int(11) NOT NULL,
  `nomeprocedimento` varchar(60) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`idprocedimento`, `nomeprocedimento`, `descricao`, `valor`) VALUES
(1, 'Preenchimento Facial', 'É realizado com a aplicação do ácido hialurônico na pele.', 500),
(2, 'Radiofrequência', 'Tratamento eficaz contra flacidez e estimula o colágeno da pele.', 350);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idservico` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idservico`, `data`, `valor`, `idcliente`) VALUES
(1, '2023-02-24', 850, 2),
(2, '2023-02-24', 850, 2),
(3, '2023-02-24', 850, 2),
(4, '2023-02-24', 850, 2),
(5, '2023-02-24', 850, 2),
(6, '2023-02-24', 500, 1),
(7, '2023-02-25', 700, 4),
(8, '2023-02-25', 500, 5),
(9, '2023-02-25', 500, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_temp`
--

CREATE TABLE `servico_temp` (
  `idcliente` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `idprocedimento` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` varchar(30) NOT NULL,
  `valor` double NOT NULL,
  `nomeproced` varchar(60) NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `nomecli` varchar(60) NOT NULL,
  `nomefunc` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Índices para tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `fk_idservico` (`idservico`),
  ADD KEY `fk_procedimento` (`idprocedimento`),
  ADD KEY `fk_idfuncionario` (`idfuncionario`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`idprocedimento`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idservico`),
  ADD KEY `fk-cliente` (`idcliente`);

--
-- Índices para tabela `servico_temp`
--
ALTER TABLE `servico_temp`
  ADD KEY `fk_idprocedimento` (`idprocedimento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `itemservico`
--
ALTER TABLE `itemservico`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idservico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD CONSTRAINT `fk_idfuncionario` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`),
  ADD CONSTRAINT `fk_procedimento` FOREIGN KEY (`idprocedimento`) REFERENCES `procedimento` (`idprocedimento`),
  ADD CONSTRAINT `fk_servico` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idservico`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk-cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `servico_temp`
--
ALTER TABLE `servico_temp`
  ADD CONSTRAINT `fk_idprocedimento` FOREIGN KEY (`idprocedimento`) REFERENCES `procedimento` (`idprocedimento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
