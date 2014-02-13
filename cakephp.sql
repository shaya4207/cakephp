/*
SQLyog Professional v11.33 (64 bit)
MySQL - 5.1.50-community-log : Database - cakephp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `attire` */

DROP TABLE IF EXISTS `attire`;

CREATE TABLE `attire` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `attire` */

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `countries` */

insert  into `countries`(`id`,`name`,`abbreviation`) values (1,'United States Of America','US');

/*Table structure for table `cuisines` */

DROP TABLE IF EXISTS `cuisines`;

CREATE TABLE `cuisines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cuisines` */

insert  into `cuisines`(`id`,`name`) values (1,'Chinese'),(2,'Israeli');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`body`,`created`,`modified`,`user_id`) values (1,'The title','This is the post body.','2014-02-10 17:25:39',NULL,NULL),(2,'A title once again','And the post body follows.','2014-02-10 17:25:39',NULL,NULL),(3,'Title strikes back','This is really exciting! Not.','2014-02-10 17:25:39',NULL,NULL),(6,'sadf','dasfdsfa','2014-02-11 23:41:25','2014-02-11 23:41:25',1);

/*Table structure for table `restaurants` */

DROP TABLE IF EXISTS `restaurants`;

CREATE TABLE `restaurants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` int(5) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `supervision` int(5) DEFAULT NULL,
  `hours` varchar(150) DEFAULT NULL,
  `notes` text,
  `cuisine` varchar(250) DEFAULT NULL,
  `attire` int(5) DEFAULT NULL,
  `entered_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `restaurants` */

insert  into `restaurants`(`id`,`name`,`address`,`city`,`state`,`zip`,`phone`,`fax`,`website`,`email`,`supervision`,`hours`,`notes`,`cuisine`,`attire`,`entered_by`,`created`,`modified`) values (15,'Ottimo Cafe','6794 Route 9 South','Lakewood',31,'08701','','','','',1,'','','',NULL,1,'2014-02-13 17:09:52','2014-02-13 17:09:52');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(100) DEFAULT NULL,
  `country` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `states` */

insert  into `states`(`id`,`name`,`abbreviation`,`country`) values (1,'Alabama','AL',1),(2,'Alaska','AK',1),(3,'Arizona','AZ',1),(4,'Arkansas','AR',1),(5,'California','CA',1),(6,'Colorado','CO',1),(7,'Connecticut','CT',1),(8,'Delaware','DE',1),(9,'District of Columbia','DC',1),(10,'Florida','FL',1),(11,'Georgia','GA',1),(12,'Hawaii','HI',1),(13,'Idaho','ID',1),(14,'Illinois','IL',1),(15,'Indiana','IN',1),(16,'Iowa','IA',1),(17,'Kansas','KS',1),(18,'Kentucky','KY',1),(19,'Louisiana','LA',1),(20,'Maine','ME',1),(21,'Maryland','MD',1),(22,'Massachusetts','MA',1),(23,'Michigan','MI',1),(24,'Minnesota','MN',1),(25,'Mississippi','MS',1),(26,'Missouri','MO',1),(27,'Montana','MT',1),(28,'Nebraska','NE',1),(29,'Nevada','NV',1),(30,'New Hampshire','NH',1),(31,'New Jersey','NJ',1),(32,'New Mexico','NM',1),(33,'New York','NY',1),(34,'North Carolina','NC',1),(35,'North Dakota','ND',1),(36,'Ohio','OH',1),(37,'Oklahoma','OK',1),(38,'Oregon','OR',1),(39,'Pennsylvania','PA',1),(40,'Rhode Island','RI',1),(41,'South Carolina','SC',1),(42,'South Dakota','SD',1),(43,'Tennessee','TN',1),(44,'Texas','TX',1),(45,'Utah','UT',1),(46,'Vermont','VT',1),(47,'Virginia','VA',1),(48,'Washington','WA',1),(49,'West Virginia','WV',1),(50,'Wisconsin','WI',1),(51,'Wyoming','WY',1);

/*Table structure for table `supervisions` */

DROP TABLE IF EXISTS `supervisions`;

CREATE TABLE `supervisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `name_long` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `supervisions` */

insert  into `supervisions`(`id`,`name`,`logo`,`name_long`) values (1,'KCL',NULL,'KASHRUS COUNCIL OF LAKEWOOD');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`role`,`created`,`modified`) values (1,'skrauss','cb51d01d4a1e05e53b4732c4a8382d7f596602b3',NULL,'admin','2014-02-11 14:27:51','2014-02-11 14:27:51'),(2,'test','3bdf8fb98b3a7d23c3b106efcf20ec4cc1d2fbe7',NULL,'author','2014-02-11 14:30:44','2014-02-11 14:30:44'),(3,'asdf','f154864c90c7bea099521534ab40a4b47664b6c0',NULL,'admin','2014-02-13 18:04:56','2014-02-13 18:04:56'),(4,'tees','3bdf8fb98b3a7d23c3b106efcf20ec4cc1d2fbe7','shaya@integriaws.com','admin','2014-02-13 18:08:14','2014-02-13 18:08:14'),(5,'moshe','ae4e9e7b6dad50d1abd5e3f286b9ffb6f5a5a466','moseh@moshe.com','admin','2014-02-13 18:08:45','2014-02-13 18:08:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
