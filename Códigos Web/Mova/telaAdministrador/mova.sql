-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `mova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE IF NOT EXISTS `classificacao` (
  `ClocalPK` int(11) NOT NULL,
  `CfrequenciaPK` int(11) NOT NULL,
  `CsegurancaPK` int(11) NOT NULL,
  KEY `ClocalPK` (`ClocalPK`),
  KEY `CfrequenciaPK` (`CfrequenciaPK`),
  KEY `CsegurancaPK` (`CsegurancaPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `EidLocal` int(11) NOT NULL,
  `nomeEvento` varchar(500) NOT NULL,
  `dataEvento` date NOT NULL,
  `horario` varchar(5) NOT NULL,
  `atracao` varchar(150) NOT NULL,
  `preco` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_evento`),
  KEY `EidLocal` (`EidLocal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `EidLocal`, `nomeEvento`, `dataEvento`, `horario`, `atracao`, `preco`) VALUES
(1, 3, 'hjgh', '2013-05-21', '05h96', '', ''),
(2, 4, 'EstaÃ§Ã£o Pedreira', '2014-04-26', '14:00', 'Altos', ''),
(4, 4, 'ghgfhfgh', '2014-01-04', '00:00', '', ''),
(5, 4, 'dfsdf', '1970-01-01', '10h20', '', ''),
(6, 6, 'Tequila Party', '1970-01-01', '', '', ''),
(7, 4, 'sadfsdf', '2015-09-26', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE IF NOT EXISTS `frequencia` (
  `frequenciaPK` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`frequenciaPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `imagemPK` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioPK` int(11) NOT NULL,
  `imagem` text NOT NULL,
  PRIMARY KEY (`imagemPK`),
  KEY `usuarioPK` (`usuarioPK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`imagemPK`, `usuarioPK`, `imagem`) VALUES
(42, 63, ''),
(43, 64, 'Penguins.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `localPK` int(11) NOT NULL AUTO_INCREMENT,
  `LtipoLocal` int(11) NOT NULL,
  `nomeLocal` varchar(150) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `informacoes` varchar(150) NOT NULL,
  `outroTipodeLocal` varchar(100) NOT NULL,
  PRIMARY KEY (`localPK`),
  KEY `LtipoLocal` (`LtipoLocal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`localPK`, `LtipoLocal`, `nomeLocal`, `telefone`, `email`, `endereco`, `informacoes`, `outroTipodeLocal`) VALUES
(3, 2, 'Caribbean', '(41) 3032-6565', 'osdkopfsd', 'fghfghfg', 'fghfghfghfghgf', ''),
(4, 4, 'Pedreira Paulo Leminsky', '(41) 3565-6989', 'fghfghfghfgh', 'fghfghfg', 'fghfghfghfg', 'IUASHUDASD'),
(5, 5, 'UAHUA', '(54) 5468-4894', 'SDF4S6DG48DF4SGD', 'A6D5F4SD4', '6S8D48DSF48G4FD8G', 'dfgdfgf'),
(6, 4, 'Testando', '(41) 2568-9863', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `mensagemPK` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`mensagemPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcerias`
--

CREATE TABLE IF NOT EXISTS `parcerias` (
  `parceriaPK` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  `Llocal1PK` int(11) NOT NULL,
  `Llocal2PK` int(11) NOT NULL,
  PRIMARY KEY (`parceriaPK`),
  KEY `Llocal1PK` (`Llocal1PK`),
  KEY `Llocal2PK` (`Llocal2PK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE IF NOT EXISTS `promocao` (
  `promocaoPK` int(11) NOT NULL AUTO_INCREMENT,
  `LlocalPromocao` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`promocaoPK`),
  KEY `LlocalPromocao` (`LlocalPromocao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `scorePK` int(11) NOT NULL AUTO_INCREMENT,
  `TtipoCadastro` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataScore` date NOT NULL,
  `descricao` varchar(500) NOT NULL,
  PRIMARY KEY (`scorePK`),
  KEY `TtipoCadastro` (`TtipoCadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguranca`
--

CREATE TABLE IF NOT EXISTS `seguranca` (
  `segurancaPK` int(11) NOT NULL AUTO_INCREMENT,
  `quant_briga` int(11) NOT NULL,
  `quant_acidentes` int(11) NOT NULL,
  `confusoes` varchar(150) NOT NULL,
  PRIMARY KEY (`segurancaPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocadastro`
--

CREATE TABLE IF NOT EXISTS `tipocadastro` (
  `tipoCadastroPK` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`tipoCadastroPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipocadastro`
--

INSERT INTO `tipocadastro` (`tipoCadastroPK`, `descricao`) VALUES
(0, 'Padrao'),
(1, 'Moderador'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipolocal`
--

CREATE TABLE IF NOT EXISTS `tipolocal` (
  `tipoLocalPK` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `informacoes` varchar(200) NOT NULL,
  PRIMARY KEY (`tipoLocalPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipolocal`
--

INSERT INTO `tipolocal` (`tipoLocalPK`, `descricao`, `informacoes`) VALUES
(1, 'balada', ''),
(2, 'bar', ''),
(3, 'parque', ''),
(4, 'praça', ''),
(5, 'outro', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioPK` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `sexo` int(1) NOT NULL,
  `popularidade` int(11) NOT NULL,
  `nivel_conf` int(11) NOT NULL,
  PRIMARY KEY (`usuarioPK`),
  UNIQUE KEY `email` (`email`),
  KEY `nivel` (`nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioPK`, `nivel`, `nome`, `email`, `senha`, `data_nasc`, `telefone`, `sexo`, `popularidade`, `nivel_conf`) VALUES
(15, 1, 'Andre Mateus', 'adm@adm', '123', '0000-00-00', '', 1, 0, 0),
(17, 0, 'Andre Lara', 'andre_kourt@hotmail.com', 'senha', '1995-09-26', '(41) 9984-4657', 1, 0, 0),
(63, 0, '', 'aa', 'a', '1970-01-01', '', 0, 0, 0),
(64, 0, 'DWFS', 'j@j', 'a', '1970-01-01', '', 0, 0, 0);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `classificacao_ibfk_1` FOREIGN KEY (`ClocalPK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classificacao_ibfk_2` FOREIGN KEY (`CfrequenciaPK`) REFERENCES `frequencia` (`frequenciaPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classificacao_ibfk_3` FOREIGN KEY (`CsegurancaPK`) REFERENCES `seguranca` (`segurancaPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`EidLocal`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`usuarioPK`) REFERENCES `usuario` (`usuarioPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`LtipoLocal`) REFERENCES `tipolocal` (`tipoLocalPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `parcerias`
--
ALTER TABLE `parcerias`
  ADD CONSTRAINT `parcerias_ibfk_1` FOREIGN KEY (`Llocal1PK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcerias_ibfk_2` FOREIGN KEY (`Llocal2PK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`LlocalPromocao`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`TtipoCadastro`) REFERENCES `tipocadastro` (`tipoCadastroPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `tipocadastro` (`tipoCadastroPK`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
