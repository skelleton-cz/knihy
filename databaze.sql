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
CREATE TABLE `autor` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(50) NOT NULL,
  `prijmeni` varchar(50) NOT NULL,
  `rokNarozeni` datetime DEFAULT NULL,
  `pridan` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Seznam autorů';


-- Exportování struktury pro tabulka test.knihy
CREATE TABLE `knihy` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(250) NOT NULL,
  `rokVydani` datetime DEFAULT NULL,
  `autor_id` int(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_knihy_autor` (`autor_id`),
  CONSTRAINT `FK_knihy_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Informace o knihach.';



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
