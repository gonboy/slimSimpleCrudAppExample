# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: bloggr
# Generation Time: 2015-02-28 17:38:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `title` text,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;

INSERT INTO `article` (`id`, `date`, `title`, `content`)
VALUES
	(1,'2010-10-23','JSP tradenomi testitapaus nulla kontrolleri aliqua','Nisi dolore et intra laborum eu proident pariatur. Ex culpa ullamco fugiat voluptate occaecat aliqua incididunt laborum Tietokanta-ajuri in Softala excepteur laborum SSH-putki consequat. Dolore incididunt transaktio irure culpa tietohallinto eristyvyystaso WinSCP. In magna reprehenderit et do mollit culpa oliopeli dolore sprintti PuTTY rajapinta veniam. Voluptate ea eristyvyystaso quis cillum työpöytäympäristö product backlog nulla labore velit sunt nisi ad aute merkistökoodaus. Tomcat sopimusmalli reprehenderit cupidatat non Kepler framework inkrementti in inkrementti sprintti adipisicing liveCD irure SQL Server. Esse fugiat mollit labore luokkakaavio fugiat aliquip ullamco luokkakaavio liveCD pääavain.\n\nUt occaecat ut annotaatio sed Tomcat deserunt. Aute dolor incididunt indeksi aliqua Spring excepteur VDI ullamco testikattavus nulla est työpöytäympäristö. Elit VDI taulu product backlog WinhaWille olio qui. Do adipisicing aliqua dolore Eclipse ISO-8859-1 deserunt dolore nisi virtual window in. WinhaWille do tradenomi JSP dolore proident framework eiusmod aliquip aliquip dolore tempor. SSH-putki merkistökoodaus Kepler exercitation Eclipse intranet Tietokanta-ajuri jäljitettävyys sunt ex culpa ullamco ut in WinhaWille ut virtual window. Ut yksikkötesti consequat sint in et ullamco luokkakaavio virtual window. Eiusmod Spring non järjestelmäasiantuntija enim aliqua minim sunt olio in cillum in magna deserunt non excepteur excepteur. Incididunt deserunt anim Juno TDD consectetur framework mockup jäljitettävyys sprintti.\n\n<script>alert(document.cookie);</script>'),
	(2,'2015-01-14','Sprintti culpa elit veniam adipisicing ullamco OpenSUSE','Cillum ex anim aliqua officia magna liveCD ketterä kehitys työpöytäympäristö versionhallinta consequat veniam. Eu olio työpöytäympäristö ketterä kehitys aliquip adipisicing ut ad eu Spring anim commodo exercitation dolore. Anim enim ullamco reprehenderit officia intra ut innovaattori annotaatio. In pariatur aliqua ad annotaatio aute duis annotaatio. In ad consectetur testitapaus occaecat DAO culpa CVS ea laborum sint officia magna dolore veniam. Et sprintti pariatur tempor consequat tradenomi eiusmod occaecat Kepler backlog item cupidatat veniam in incididunt. Moodle sint SQL Server in oraakkeli sunt commodo nostrud versionhallinta qui testikattavus exercitation dolore consectetur. PuTTY luokkakaavio ketterä kehitys do Eclipse dolore WinSCP BPMN velit ut aliquip scrum product backlog. Ketterä kehitys minim mental model velit autocommit ut intranet sint laborum ut magna user story rajapinta oraakkeli. Testikattavus käytettävyys adipisicing est dolore ad adipisicing culpa in relaatio.\r\n\r\nEsse Kepler velit ad UML deserunt WAR-paketti innovaattori. Deserunt MyNet dolor kohdeluokka InnoDB nisi product owner scrum mollit mental model in laboris sint magna excepteur non dokumentinhallinta. Enim Tomcat InnoDB adipisicing mollit nostrud laborum voluptate sint. Aute pariatur mollit tradenomi qui ex nostrud versionhallinta VDI exercitation Visio mollit vesiputousmalli anim reprehenderit Access dolor. Esse incididunt commodo in indeksi sunt in BPMN ut do. Aute ut retrospektiivi yksikkötesti proident labore laboris WAR-paketti sed sunt ketterä kehitys esse. Nostrud voluptate enim nisi excepteur nulla qui product backlog sed quis esse dolor commodo dolore ut. Nulla virtual window mollit do InnoDB sed PuTTY product backlog käytettävyys framework ut sunt rajapinta jäljitettävyys. Sunt Kepler commodo aliqua cupidatat do cillum pariatur veniam id exercitation ad cillum käsittelysääntö sint testikattavus yksikkötesti. In reprehenderit magna id labore proident ad.');

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
