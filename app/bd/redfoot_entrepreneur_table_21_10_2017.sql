CREATE TABLE `entrepreneur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `startup_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `document1` varchar(11) DEFAULT '',
  `graduation` varchar(150) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `voluntary` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
