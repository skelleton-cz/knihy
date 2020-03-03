-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                10.4.11-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win64
-- HeidiSQL Verze:               10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Exportování struktury databáze pro
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `test`;

-- Exportování struktury pro tabulka test.autor
DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(50) NOT NULL,
  `prijmeni` varchar(50) NOT NULL,
  `rokNarozeni` year(4) DEFAULT NULL,
  `pridan` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='SEznam autorů';

-- Exportování dat pro tabulku test.autor: ~0 rows (přibližně)
DELETE FROM `autor`;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` (`id`, `jmeno`, `prijmeni`, `rokNarozeni`, `pridan`) VALUES
	(1, 'Stephan', 'King', '1950', '2020-03-03 18:55:04');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;

-- Exportování struktury pro tabulka test.knihy
DROP TABLE IF EXISTS `knihy`;
CREATE TABLE IF NOT EXISTS `knihy` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(250) NOT NULL,
  `rokVydani` year(4) DEFAULT NULL,
  `autor_id` int(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_knihy_autor` (`autor_id`),
  CONSTRAINT `FK_knihy_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='Informace o knihach.';

-- Exportování dat pro tabulku test.knihy: ~0 rows (přibližně)
DELETE FROM `knihy`;
/*!40000 ALTER TABLE `knihy` DISABLE KEYS */;
INSERT INTO `knihy` (`id`, `nazev`, `rokVydani`, `autor_id`) VALUES
	(1, 'Farma zvířátek', '1970', 1),
	(2, 'test 1', '2020', 1),
	(3, 'test 2', '2020', 1),
	(4, 'test 3', '2020', 1);
/*!40000 ALTER TABLE `knihy` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
