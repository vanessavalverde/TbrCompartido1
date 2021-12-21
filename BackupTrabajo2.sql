-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.6.5-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para trabajo2
CREATE DATABASE IF NOT EXISTS `trabajo2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `trabajo2`;

-- Volcando estructura para tabla trabajo2.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Apellido` varchar(200) NOT NULL DEFAULT '0',
  `Edad` int(11) NOT NULL DEFAULT 0,
  `Genero` char(2) NOT NULL DEFAULT '0',
  `idPrograma` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idEstudiante`) USING BTREE,
  KEY `FK_estudiante_programa` (`idPrograma`),
  CONSTRAINT `FK_estudiante_programa` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`IdPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla trabajo2.estudiante: ~0 rows (aproximadamente)
DELETE FROM `estudiante`;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`idEstudiante`, `Nombre`, `Apellido`, `Edad`, `Genero`, `idPrograma`) VALUES
	(1, 'pepe', 'perez', 19, 'M', 1);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla trabajo2.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `idInstructor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Apellido` varchar(200) NOT NULL DEFAULT '0',
  `Edad` int(11) NOT NULL DEFAULT 0,
  `Genero` char(2) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idInstructor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla trabajo2.instructor: ~0 rows (aproximadamente)
DELETE FROM `instructor`;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` (`idInstructor`, `Nombre`, `Apellido`, `Edad`, `Genero`, `titulo`) VALUES
	(1, 'andres', 'lopez', 30, 'M', '1');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;

-- Volcando estructura para tabla trabajo2.materia
CREATE TABLE IF NOT EXISTS `materia` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `Materia` varchar(100) NOT NULL,
  `Semestre` varchar(100) DEFAULT NULL,
  `idPrograma` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idMateria`),
  KEY `FKMateriaPrograma` (`idPrograma`),
  CONSTRAINT `FKMateriaPrograma` FOREIGN KEY (`idPrograma`) REFERENCES `programa` (`IdPrograma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla trabajo2.materia: ~1 rows (aproximadamente)
DELETE FROM `materia`;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`idMateria`, `Materia`, `Semestre`, `idPrograma`) VALUES
	(1, 'Logica Matematica', '1', 1);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;

-- Volcando estructura para tabla trabajo2.programa
CREATE TABLE IF NOT EXISTS `programa` (
  `IdPrograma` int(11) NOT NULL AUTO_INCREMENT,
  `Programa` varchar(100) NOT NULL,
  `Activo` binary(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IdPrograma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla trabajo2.programa: ~3 rows (aproximadamente)
DELETE FROM `programa`;
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
INSERT INTO `programa` (`IdPrograma`, `Programa`, `Activo`) VALUES
	(1, 'Ingenieria sistemas 2', _binary 0x31),
	(3, 'Ingenieria Civil', _binary 0x31),
	(4, 'Ingenieria Civil dss', _binary 0x34),
	(5, 'prueba n', _binary 0x33);
/*!40000 ALTER TABLE `programa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
