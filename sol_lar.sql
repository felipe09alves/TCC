-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2018 às 03:20
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sol lar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(10) NOT NULL,
  `id_os` int(10) NOT NULL,
  `descricao` varchar(75) COLLATE utf8_bin NOT NULL,
  `duracao` float NOT NULL,
  `duracao_real` float NOT NULL,
  `justificativa` varchar(75) COLLATE utf8_bin NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `id_estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `id_estado`) VALUES
(1, 'Brasília', 7),
(2, 'João Pinheiro', 13),
(8, 'Taguatinga', 7),
(12, 'Ceilândia', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) COLLATE utf8_bin NOT NULL,
  `nome` varchar(75) COLLATE utf8_bin NOT NULL,
  `email` varchar(75) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_estado` int(10) NOT NULL,
  `id_cidade` int(10) NOT NULL,
  `endereco` longtext COLLATE utf8_bin NOT NULL,
  `imovel` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `cpf`, `nome`, `email`, `telefone`, `id_estado`, `id_cidade`, `endereco`, `imovel`) VALUES
(1, '00000000000', 'Fulano da Silva', 'fulano.s@domail.com', '6100000000', 7, 1, 'SQN 202, Bloco D, Apt 403', 'Residencial'),
(2, '11111111111', 'Ciclano Soares', 'ciclano@domail.com', '2199999999', 13, 2, 'SQN 202, Bloco D, Apt 403', 'Residencial'),
(3, '12345678912', 'José das Couves', 'email@email.com', '6199999999', 7, 1, 'rua das laranjeiras 42', 'comercial'),
(11, '12315654987', 'nome', 'email@email.com', '6181818181', 13, 2, 'qwe', 'rural'),
(13, '34234234', 'nome', 'fulano.s@domail.com', '1213', 14, 1, 'SQSW 305 Bloco F Apt 301', 'residencial'),
(14, '1222', 'ASD', 'ASD', '12', 7, 12, 'SQSW 305 Bloco F Apt 301', 'comercial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id` int(10) NOT NULL,
  `id_orcamento` int(10) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id`, `id_orcamento`, `data`) VALUES
(1, 1, '2018-09-25 01:20:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `sigla` varchar(2) COLLATE utf8_bin NOT NULL,
  `nome` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `sigla`, `nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(10) NOT NULL,
  `id_perfil` int(10) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `cargo` varchar(40) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(40) COLLATE utf8_bin NOT NULL,
  `senha` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `id_perfil`, `nome`, `cargo`, `email`, `login`, `senha`) VALUES
(1, 1, 'Admin', 'ADMIN', 'admin@domain.com', 'admin', '*4ACFE3202');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inversor`
--

CREATE TABLE `inversor` (
  `id` int(10) NOT NULL,
  `potencia` float NOT NULL COMMENT '(kWp)',
  `marca` varchar(40) COLLATE utf8_bin NOT NULL,
  `modelo` varchar(40) COLLATE utf8_bin NOT NULL,
  `garantia` float NOT NULL COMMENT 'Anos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `inversor`
--

INSERT INTO `inversor` (`id`, `potencia`, `marca`, `modelo`, `garantia`) VALUES
(1, 8, 'Fronius', '4210069', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `irradiacao`
--

CREATE TABLE `irradiacao` (
  `id` int(10) NOT NULL,
  `indice` int(8) NOT NULL,
  `id_cidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `irradiacao`
--

INSERT INTO `irradiacao` (`id`, `indice`, `id_cidade`) VALUES
(1, 5583, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `id` int(10) NOT NULL,
  `potencia` float NOT NULL COMMENT 'Wp',
  `marca` varchar(40) COLLATE utf8_bin NOT NULL,
  `modelo` varchar(40) COLLATE utf8_bin NOT NULL,
  `tamanho` float NOT NULL COMMENT 'm2',
  `peso` float NOT NULL COMMENT 'kg',
  `garantia_eficiencia` float NOT NULL COMMENT 'Anos',
  `garantia_defeito` float NOT NULL COMMENT 'Anos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id`, `potencia`, `marca`, `modelo`, `tamanho`, `peso`, `garantia_eficiencia`, `garantia_defeito`) VALUES
(1, 260, 'Canadian', 'CS6U-315B', 1.6, 15.5, 25, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_modulo` int(10) NOT NULL,
  `id_inversor` int(10) NOT NULL,
  `consumo` int(10) NOT NULL,
  `prazo_instalacao` float NOT NULL,
  `tarifa` float NOT NULL,
  `fase` varchar(10) COLLATE utf8_bin NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `id_cliente`, `id_modulo`, `id_inversor`, `consumo`, `prazo_instalacao`, `tarifa`, `fase`, `status`, `data`) VALUES
(1, 1, 1, 1, 200, 15, 0.4, 'mono', 'pronto', '2018-09-17 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `data_abertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_conclusão` date NOT NULL,
  `prazo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(10) NOT NULL,
  `descricao` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Funcionário');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inversor`
--
ALTER TABLE `inversor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irradiacao`
--
ALTER TABLE `irradiacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inversor`
--
ALTER TABLE `inversor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `irradiacao`
--
ALTER TABLE `irradiacao`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
