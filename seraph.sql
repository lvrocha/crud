-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para seraph
DROP DATABASE IF EXISTS `seraph`;
CREATE DATABASE IF NOT EXISTS `seraph` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `seraph`;

-- Copiando estrutura para tabela seraph.funcionarios
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET latin1 NOT NULL,
  `data_nasc` date NOT NULL,
  `end_cep` int(8) NOT NULL,
  `end_logradouro` varchar(250) CHARACTER SET latin1 NOT NULL,
  `end_bairro` varchar(150) CHARACTER SET latin1 NOT NULL,
  `end_cidade` varchar(150) CHARACTER SET latin1 NOT NULL,
  `end_estado` varchar(150) CHARACTER SET latin1 NOT NULL,
  `end_numero` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `email` varchar(250) CHARACTER SET latin1 NOT NULL,
  `tel_fixo` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `tel_cel` varchar(11) CHARACTER SET latin1 NOT NULL,
  `competencia_tec` text CHARACTER SET latin1 NOT NULL,
  `competencia_compor` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela seraph.funcionarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` (`id`, `nome`, `data_nasc`, `end_cep`, `end_logradouro`, `end_bairro`, `end_cidade`, `end_estado`, `end_numero`, `email`, `tel_fixo`, `tel_cel`, `competencia_tec`, `competencia_compor`) VALUES
	(10, 'LUCAS VILHENA ROCHA', '2019-08-20', 33400000, 'Alameda Dos Botânicos 625', 'lundceia', 'Lagoa Santa', 'MG', '101', 'lucasvilhenaenator@gmail.com', '', '31992687645', '31992687645', '31992687645'),
	(11, 'Lucas Rocha', '2019-08-18', 33400000, 'aquiles de lisboa', 'lundceia', 'lagoa santa', 'MG', '289', 'teste@teste.com', '3136812259', '31992687645', 'askdjfasdjfakjsdfkjaçsdjf çaskjdfaksdjfaksjdfçkaj', 'açskdjfaçksdfjçaksdjfk açskdjfaçksdjfçaksdjf'),
	(12, 'Tamiris Freitas', '2019-08-01', 12345678, 'lasjdflkj', 'açskldjf', 'asçkdjf', 'açlslkdjf', '123', 'email@email.com', '', '1234231234', 'askjdfçaksdjf\r\nasçdfkjaçlsdfjaçllskjdfçlkajsdf\r\nçaksjdfçlkasjdfç\r\n', 'asçdlkfjaçskdjfçalk\r\naçlskdjfçlaksdjf\r\nçalskjdfçlaksdjf\r\n'),
	(14, 'Lucas Rocha', '1990-12-01', 33400000, 'Alameda dos botanicos', 'lundceia', 'lagoa santa', 'MG', '625', 'contato@lucasvilhena.com.br', '36812259', '31992687645', 'açklsdjfaksjdfka', 'aksjdfçakjsdfkjaskasdf');
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;

-- Copiando estrutura para tabela seraph.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela seraph.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nome`, `email`, `senha`) VALUES
	(1, 'Lucas', 'contato@lucasvilhena.com.br', 'ada3c39413b4f6284c8301257812190e');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
