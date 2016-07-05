-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Maio-2014 às 16:34
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mova`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cod_evento`, `EidLocal`, `nomeEvento`, `dataEvento`, `horario`, `atracao`, `preco`) VALUES
(1, 3, 'Festa do Pijama', '2013-05-21', '00h00', '', ''),
(2, 4, 'EstaÃ§Ã£o Pedreira', '2014-04-26', '14:00', 'Shows', ''),
(5, 4, 'Rock in Rio', '2016-11-11', '13h30', '', ''),
(6, 3, 'Tequila Party', '2014-10-20', '23h30', '', ''),
(7, 4, 'Warung Day Festival', '2015-09-26', '17h00', '', ''),
(8, 7, 'Meu querido Wood', '2014-07-30', '20:30', '', '45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`imagemPK`, `usuarioPK`, `imagem`) VALUES
(39, 60, 'Chrysanthemum.jpg'),
(41, 61, '229834_345987882164489_368094118_n.jpg'),
(42, 62, 'gay-2-e1305835729910.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`localPK`, `LtipoLocal`, `nomeLocal`, `telefone`, `email`, `endereco`, `informacoes`, `outroTipodeLocal`) VALUES
(3, 2, 'Caribbean', '(41) 3032-6565', 'osdkopfsd', 'fghfghfg', 'fghfghfghfghgf', ''),
(4, 4, 'Pedreira Paulo Leminsky', '(41) 3565-6989', 'fghfghfghfgh', 'fghfghfg', 'fghfghfghfg', 'IUASHUDASD'),
(5, 5, 'UAHUA', '(54) 5468-4894', 'SDF4S6DG48DF4SGD', 'A6D5F4SD4', '6S8D48DSF48G4FD8G', 'dfgdfgf'),
(6, 4, 'Testando', '(41) 2568-9863', '', '', '', ''),
(7, 5, 'Teatro Lala Schneider', '(41) 3232-8108', '', 'R. Treze de Maio, 629, Centro, Curitiba', '', 'Teatro');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioPK`, `nivel`, `nome`, `email`, `senha`, `data_nasc`, `telefone`, `sexo`, `popularidade`, `nivel_conf`) VALUES
(15, 1, 'Andre Mateus', 'adm@adm', '123', '0000-00-00', '', 1, 0, 0),
(17, 0, 'Carlos', 'andre_kourt@hotmail.com', 'senha', '1998-04-25', '(41) 6598-9897', 1, 0, 0),
(60, 0, 'TesteImagem', 'TesteImagem@imagem', 'a', '1970-01-01', '(34) 5345-3453', 2, 0, 0),
(61, 0, 'Joao Carlos', 'joaocarlos@gmail.com', '123', '1998-09-26', '(41) 9568-9898', 1, 0, 0),
(62, 0, 'Rodrigo Augusto', 'rod_gu@hotmail.com', 'a', '1999-05-15', '(47) 9898-7896', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioeusuario`
--

CREATE TABLE IF NOT EXISTS `usuarioeusuario` (
  `codUsuario` int(11) NOT NULL,
  `codAmigo` int(11) NOT NULL,
  `statusAmizade` int(11) NOT NULL,
  PRIMARY KEY (`codUsuario`,`codAmigo`),
  KEY `codUsuario` (`codUsuario`),
  KEY `codAmigo` (`codAmigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarioeusuario`
--

INSERT INTO `usuarioeusuario` (`codUsuario`, `codAmigo`, `statusAmizade`) VALUES
(17, 17, 1),
(17, 60, 1),
(17, 61, 1),
(17, 62, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioevento`
--

CREATE TABLE IF NOT EXISTS `usuarioevento` (
  `usuarioPK` int(11) NOT NULL,
  `eventoPK` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`usuarioPK`,`eventoPK`),
  KEY `usuarioPK` (`usuarioPK`,`eventoPK`),
  KEY `eventoPK` (`eventoPK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarioevento`
--

INSERT INTO `usuarioevento` (`usuarioPK`, `eventoPK`, `status`) VALUES
(17, 5, 1),
(17, 7, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `classificacao_ibfk_1` FOREIGN KEY (`ClocalPK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classificacao_ibfk_2` FOREIGN KEY (`CfrequenciaPK`) REFERENCES `frequencia` (`frequenciaPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classificacao_ibfk_3` FOREIGN KEY (`CsegurancaPK`) REFERENCES `seguranca` (`segurancaPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`EidLocal`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`usuarioPK`) REFERENCES `usuario` (`usuarioPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`LtipoLocal`) REFERENCES `tipolocal` (`tipoLocalPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `parcerias`
--
ALTER TABLE `parcerias`
  ADD CONSTRAINT `parcerias_ibfk_1` FOREIGN KEY (`Llocal1PK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parcerias_ibfk_2` FOREIGN KEY (`Llocal2PK`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`LlocalPromocao`) REFERENCES `local` (`localPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`TtipoCadastro`) REFERENCES `tipocadastro` (`tipoCadastroPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `tipocadastro` (`tipoCadastroPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarioeusuario`
--
ALTER TABLE `usuarioeusuario`
  ADD CONSTRAINT `usuarioeusuario_ibfk_2` FOREIGN KEY (`codAmigo`) REFERENCES `usuario` (`usuarioPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioeusuario_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`usuarioPK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarioevento`
--
ALTER TABLE `usuarioevento`
  ADD CONSTRAINT `usuarioevento_ibfk_1` FOREIGN KEY (`usuarioPK`) REFERENCES `usuario` (`usuarioPK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioevento_ibfk_2` FOREIGN KEY (`eventoPK`) REFERENCES `evento` (`cod_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
