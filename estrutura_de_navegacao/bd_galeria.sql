-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para galeria
CREATE DATABASE IF NOT EXISTS `galeria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `galeria`;

-- Copiando estrutura para tabela galeria.cartao_credito
CREATE TABLE IF NOT EXISTS `cartao_credito` (
  `cod_cartao_credito` int(11) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `numero_cartao` int(12) NOT NULL,
  `data_validade` date NOT NULL,
  `cod_seguranca` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.cartao_credito: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cartao_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartao_credito` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.cartao_debito
CREATE TABLE IF NOT EXISTS `cartao_debito` (
  `cod_cartao_debito` int(11) NOT NULL,
  `apelido` varchar(50) NOT NULL DEFAULT '',
  `numero_cartao` int(12) NOT NULL,
  `data_validade` date NOT NULL,
  `codigo_seguranca` int(11) NOT NULL,
  `cpf` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.cartao_debito: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cartao_debito` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartao_debito` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `cod_endereco` int(11) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` varchar(50) NOT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `complemento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`cod_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.endereco: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.obras
CREATE TABLE IF NOT EXISTS `obras` (
  `cod_obra` int(11) NOT NULL AUTO_INCREMENT,
  `nome_obra` varchar(50) NOT NULL,
  `conteudo` varchar(50) NOT NULL,
  `descricao_obra` varchar(250) NOT NULL,
  `valor_obra` float NOT NULL DEFAULT '0',
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_obra`),
  KEY `cod_usuario` (`cod_usuario`),
  CONSTRAINT `cod_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.obras: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `obras` DISABLE KEYS */;
INSERT INTO `obras` (`cod_obra`, `nome_obra`, `conteudo`, `descricao_obra`, `valor_obra`, `cod_usuario`) VALUES
	(8, 'SP11', 'obras/obras-25/SP11.png', 'SP11 - asjdbhsa  asdsa as dsa ea ', 0, 25),
	(16, 'Esferas do Dragão', 'obras/obras-27/Esferas do Dragão.jpg', 'DBZ esferasas msa kdjosaod askd', 0, 27),
	(23, 'z', 'obras/obras-28/PWII-QUA(25-11).png', 'z', 0, 28),
	(24, 'k', 'obras/obras-29/k.png', 'k', 0, 29),
	(25, 't', 'obras/obras-29/t.png', 't', 0, 29),
	(27, 'y', 'obras/obras-25/y.jpg', 'y', 0, 25),
	(28, 's', 'obras/obras-34/s.png', 's', 0, 34),
	(29, 'sh', 'obras/obras-34/sh.jpg', 'sh', 0, 34),
	(31, 'enma', 'obras/obras-28/enma.jpg', 'espada enma de koziki oden dada a zoro por hyiori', 0, 28),
	(35, 'espadachim', 'obras/obras-28/espadachim.png', 'o maior espadachim do mundo', 0, 28),
	(36, 'gol', 'obras/obras-25/gol.jpg', 'golaço', 0, 25),
	(37, 'pirata', 'obras/obras-28/pirata.png', 'pirata e espadachim', 0, 28),
	(38, 'n', 'obras/obras-35/n.png', 'aasdasdsadsa ewqr a sad dsad ', 0, 35),
	(39, '3', 'obras/obras-28/3.png', '3', 0, 28),
	(40, 'Zoro - Espada Enma', 'obras/obras-28/Zoro - Espada Enma.jpeg', 'Nova espada de Zoro, Enma.', 0, 28),
	(43, 'O Brabo', 'obras/obras-28/O Brabo.png', 'Zoro após receber a dor e cansaço do capita...', 0, 28),
	(44, 'Nakamas', 'obras/obras-28/Nakamas.jpg', 'companheiros integrantes dos Chapéus de Palha...', 0, 28),
	(45, 'velhinho', 'obras/obras-28/velhinho.jpg', 'vvvvvv', 0, 28),
	(46, 'OP', 'obras/obras-28/OP.jpg', 'One Piece', 0, 28),
	(47, 'Mugiwaras', 'obras/obras-28/Mugiwaras.jpg', 'Mugiwaras - Os famosos "Chapéus de Palha"...', 0, 28);
/*!40000 ALTER TABLE `obras` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.pagamento
CREATE TABLE IF NOT EXISTS `pagamento` (
  `tipo_pagamento` int(11) NOT NULL,
  `cod_pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.pagamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.rating_info
CREATE TABLE IF NOT EXISTS `rating_info` (
  `cod_usuario` int(11) NOT NULL,
  `cod_obra` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL,
  UNIQUE KEY `UC_rating_info` (`cod_usuario`,`cod_obra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.rating_info: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `rating_info` DISABLE KEYS */;
INSERT INTO `rating_info` (`cod_usuario`, `cod_obra`, `rating_action`) VALUES
	(28, 8, 'like'),
	(34, 40, 'like'),
	(35, 25, 'dislike'),
	(35, 40, 'like');
/*!40000 ALTER TABLE `rating_info` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.tipo_pagamento
CREATE TABLE IF NOT EXISTS `tipo_pagamento` (
  `cartao_credito` int(11) NOT NULL,
  `cartao_debito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.tipo_pagamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `cod_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.tipo_usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` (`cod_tipo`, `nome_tipo`) VALUES
	(1, 'Administrador'),
	(2, 'Criador'),
	(3, 'Comum');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela galeria.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL DEFAULT '',
  `dt_nasc` date NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `cod_tipo` (`cod_tipo`),
  CONSTRAINT `cod_tipo` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_usuario` (`cod_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela galeria.usuario: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`cod_usuario`, `nome`, `cpf`, `email`, `senha`, `dt_nasc`, `avatar`, `cod_tipo`) VALUES
	(1, 'Marlon', '01234567890', 'm@m.com', '12345', '2003-06-18', 'avatar/Marlon.jpg', 1),
	(9, 'aaa', '11111111111', 'a@a.com', 'abc', '1991-01-01', 'avatar/aaa.jpg', 3),
	(19, 'BBB', '22222222222', 'b@b.com', 'BBB', '2022-02-02', 'avatar/BBB.jpg', 2),
	(20, 'Zé Ninguém', '56456418941', 'ze@ninguem.com', 'rua', '1986-01-05', 'avatar/Zé Ninguém.jpg', 3),
	(25, 'Endo', '85498498014', 'super@onze.com', 'gol', '1999-06-10', 'avatar/Endo.jpg', 2),
	(27, 'Goku', '56850950945', 'dragon@ball.com', 'esfera4', '1975-12-12', 'avatar/Goku.jpg', 2),
	(28, 'Zoro', '78798494867', 'roronoa@zoro.com', 'santoryu', '1997-06-01', 'avatar/Zoro.jpg', 2),
	(29, 'Oden', '54685468468', 'kozuki@oden.com', 'piratasamurai', '1980-12-15', 'avatar/Oden.jpg', 2),
	(34, 'Shiki', '95698468468', 'edens@zero.com', 'gravidade', '1997-08-30', 'avatar/Shiki.jpg', 2),
	(35, 'Naruto', '54516546846', 'naruto@uzumaki.com', 'hokage', '1997-02-15', 'avatar/Naruto.jpg', 2),
	(36, 'Stan Lee', '15484654874', 'stan@lee.com', 'miranha', '1922-12-28', 'avatar/Stan Lee.jpg', 2),
	(38, 'Q', '89766748548', 'q@q.com', 'qq', '1982-02-02', 'avatar/Q.png', 2),
	(40, 'Leonardo', '85746874867', 'leo@leo.com', 'l', '1991-01-01', 'avatar/Leonardo.jpg', 2),
	(44, 'u', '55555555555', 'u@u.com', 'u', '5555-05-05', 'avatar/u.png', 3),
	(45, 'w', '66666666666', 'w@w.com', 'w', '6666-06-06', 'avatar/w.png', 2),
	(46, 'x', '77777777777', 'x@x.com', 'x', '7777-07-07', 'avatar/x.png', 3),
	(51, 'Jhon', '54674684674', 'jhon@astro.com', 'o astro', '2003-08-02', 'avatar/Jhon.jpg', 2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
