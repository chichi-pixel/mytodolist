CREATE TABLE IF NOT EXISTS `mytodos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT '0',
  KEY `id` (`id`)
) AUTO_INCREMENT=4;


DELETE FROM `mytodos`;

INSERT INTO `mytodos` (`id`, `title`, `status`) VALUES
	(1, 'Abschlussarbeit Projekt IHK 2021', 0),
	(2, 'JavaScript Code üben', 1),
	(3, 'Praktikum', 2),
	(4, 'Schlafen', 3);


    