CREATE TABLE `cliente` (
  `idcliente` int(15) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` char(14) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `datanascimento` date NOT NULL,
  `cep` char(9) NOT NULL,
  `numerocasa` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `telefone`, `cpf`, `rg`, `datanascimento`, `cep`, `numerocasa`, `email`, `status`) VALUES
(1, 'William Costa', '(21)97070-7070', '120157142-10', '15425798', '1987-04-15', '23036-060', 900, 'william@gmail.com', 'C'),
(2, 'Sue Costa', '21989247323', '17548215745', '12578954', '1994-02-15', '23036060', 96, 'sue@gmail.com', ''),
(3, 'Caio Luiz', '21980804545', '12315942012', '15632478', '2001-02-13', '23036060', 14, 'caio@outlook.com', ''),
(4, 'Gustavo Tarde', '21956842145', '15412315640', '42156387', '2001-05-24', '23036060', 154, 'gusta@outlook.com', '');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(15) NOT NULL,
  `cpffuncionario` char(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `datanascimento` date DEFAULT NULL,
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

INSERT INTO `funcionario` (
  `idfuncionario`, 
  `cpffuncionario`, 
  `nome`, 
  `datanascimento`, 
  `telefone`, 
  `rg`, 
  `cep`, 
  `numerocasa`, 
  `foto`, 
  `email`
) VALUES (
  1, 
  '14715412470', 
  'João Santos', 
  '1990-09-06', 
  '21985746525', 
  '15425798', 
  '21512170', 
  11, 
  NULL, 
  'joaosantos@gmail.com'
  ), (
    2, 
    '13215716310', 
    'Paula Luz', 
    '1981-12-08', 
    '21978495424', 
    '12034587', 
    '23036060', 
    10, 
    NULL, 
    'paula@outlook.com'
    );

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemservico`
--

CREATE TABLE `itemservico` (
  `iditem` int(15) NOT NULL,
  `idservico` int(15) NOT NULL,
  `idprodecimento` int(15) NOT NULL,
  `data` date NOT NULL,
  `horario` varchar(30) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itemservico`
--

INSERT INTO `itemservico` (`iditem`, `idservico`, `idprodecimento`, `data`, `horario`, `valor`) VALUES
(1, 2, 2, '2023-03-20', 'de 15:00 às 15:30h', 1000),
(2, 3, 1, '2023-04-25', 'de 15:00 às 15:30h', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idprocedimento` int(11) NOT NULL,
  `nomeprocedimento` varchar(60) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`idprocedimento`, `nomeprocedimento`, `descricao`, `categoria`) VALUES
(1, 'Preenchimento Facial', 'É realizado com a aplicação do ácido hialurônico na pele.', 'Facial'),
(2, 'Radiofrequência', 'Tratamento eficaz contra flacidez e estimula o colágeno da pele.', 'Facial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idservico` int(15) NOT NULL,
  `valor` double NOT NULL,
  `idcliente` int(15) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idservico`, `valor`, `idcliente`, `idfuncionario`) VALUES
(1, 0, 1, 1),
(2, 0, 2, 1),
(3, 0, 3, 2);

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
  ADD KEY `fk_servico` (`idservico`),
  ADD KEY `fk_procedimento` (`idprodecimento`);

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
  ADD KEY `fk_funcionario` (`idfuncionario`),
  ADD KEY `fk_cliente` (`idcliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itemservico`
--
ALTER TABLE `itemservico`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idservico` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD CONSTRAINT `fk_procedimento` FOREIGN KEY (`idprodecimento`) REFERENCES `procedimento` (`idprocedimento`),
  ADD CONSTRAINT `fk_servico` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idservico`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`idfuncionario`);
COMMIT;