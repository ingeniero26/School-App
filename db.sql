/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.32-MariaDB : Database - larabooks_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`larabooks_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `larabooks_dev`;

/*Table structure for table `assign_class_teacher` */

DROP TABLE IF EXISTS `assign_class_teacher`;

CREATE TABLE `assign_class_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `assign_class_teacher` */

insert  into `assign_class_teacher`(`id`,`class_id`,`teacher_id`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (19,12,3,0,0,1,'2024-03-06 19:09:23','2024-03-06 19:09:23'),(20,13,3,0,0,1,'2024-09-05 16:41:50','2024-09-05 16:41:50');

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_description` varchar(512) DEFAULT NULL,
  `meta_keywords` varchar(512) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_publish` tinyint(4) DEFAULT 1,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='blogs para frontend';

/*Data for the table `blog` */

insert  into `blog`(`id`,`title`,`slug`,`category_id`,`image_file`,`description`,`meta_description`,`meta_keywords`,`created_by`,`status`,`is_publish`,`is_delete`,`created_at`,`updated_at`) values (16,'Desarrollo web','desarrollo-web',5,'20240926044724rgdhligy4bh44esjel8a.jpg','<p>desarrollos&nbsp;<br></p>','desarrollos','desarrollos',1,0,1,0,'2024-09-26 16:47:23','2024-09-26 16:47:24'),(17,'Sistemas hibridos','sistemas-hibridos',5,'sistemas-hibridos.jpg','Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar','Sistemas hibridos','Sistemas hibridos',1,0,1,0,'2024-09-26 16:48:52','2024-09-26 21:11:08'),(18,'Programacion web','programacion-web',2,'programacion-web.jpg','<p>hola esto es una prueba</p>','hola esto es una prueba','hola esto es una prueba',1,0,1,0,'2024-09-27 13:13:34','2024-09-27 13:13:34'),(19,'SISTEMAS COMPUTACIONALES','sistemas-computacionales',4,'sistemas-computacionales.jpg','Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi delen','SISTEMAS','Lorem ipsum',1,0,1,0,'2024-09-27 13:17:00','2024-09-27 16:16:07'),(20,'desarrollo java junior','desarrollo-java-junior',7,'desarrollo-java-junior.jpg','<p>desarrollo de sistemas  en java</p>','java','test test',1,0,1,0,'2024-09-27 17:58:44','2024-09-27 18:43:10');

/*Table structure for table `blog_comment` */

DROP TABLE IF EXISTS `blog_comment`;

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_comment` */

insert  into `blog_comment`(`id`,`user_id`,`blog_id`,`comment`,`created_at`,`updated_at`) values (1,NULL,18,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?','2024-10-01 01:44:37','2024-10-01 01:44:37');

/*Table structure for table `blog_tags` */

DROP TABLE IF EXISTS `blog_tags`;

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_tags` */

insert  into `blog_tags`(`id`,`blog_id`,`name`,`created_at`,`updated_at`) values (29,17,'POO','2024-09-26 21:31:18','2024-09-26 21:31:18'),(30,17,'JAVA','2024-09-26 21:31:19','2024-09-26 21:31:19'),(31,19,'SISTEMAS','2024-09-27 16:16:08','2024-09-27 16:16:08'),(32,19,'PHP','2024-09-27 16:16:08','2024-09-27 16:16:08'),(33,19,'JAVA','2024-09-27 16:16:08','2024-09-27 16:16:08'),(34,19,'WEB','2024-09-27 16:16:08','2024-09-27 16:16:08'),(35,20,'java','2024-09-27 18:43:10','2024-09-27 18:43:10'),(36,20,'php','2024-09-27 18:43:10','2024-09-27 18:43:10'),(37,20,'db','2024-09-27 18:43:10','2024-09-27 18:43:10'),(38,20,'backend','2024-09-27 18:43:10','2024-09-27 18:43:10');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `meta_keywords` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_menu` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='categorias del blog';

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`title`,`meta_title`,`meta_description`,`meta_keywords`,`created_by`,`status`,`is_menu`,`is_delete`,`created_at`,`updated_at`) values (1,'Lorem Ipsum','lorem-ipsum','Desarrollo web','Desarrollo web','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.','test test',1,0,0,1,'2024-09-15 15:14:21','2024-09-26 01:48:42'),(2,'Diseño Mobile','test2-test2','test','Desarrollo','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.','Lorem ipsum',1,0,1,0,'2024-09-15 22:23:50','2024-09-16 00:36:10'),(4,'Desarrollo web','desarrollo-web','Desarrollo web','Desarrollo web','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.','Desarrollo web',1,0,0,0,'2024-09-17 15:30:12','2024-09-17 15:30:12'),(5,'Servidores AWS','servidores-aws','Servidores','Servidores','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.','Servidores',1,0,0,0,'2024-09-17 21:15:34','2024-09-17 21:15:34'),(6,'SERVICIOS PROFESIONALES','servicios-profesionales','SERVICIOS PROFESIONALES','SERVICIOS PROFESIONALES','SERVICIOS PROFESIONALES','SERVICIOS PROFESIONALES',1,0,0,0,'2024-09-19 16:20:31','2024-09-19 16:20:31'),(7,'DESARROLLO BACKEND','desarrollo-backend','DESARROLLO BACKEND','DESARROLLO BACKEND','DESARROLLO BACKEND','DESARROLLO BACKEND',1,0,0,0,'2024-09-27 17:55:18','2024-09-27 17:55:18');

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_date` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `chat` */

insert  into `chat`(`id`,`sender_id`,`receiver_id`,`message`,`file`,`status`,`created_date`,`created_at`,`updated_at`) values (1,1,14,'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker',NULL,0,NULL,'2024-07-16 00:16:09','2024-07-16 00:16:09'),(2,1,14,'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ej',NULL,0,1721089244,'2024-07-16 00:20:44','2024-07-16 00:20:44'),(3,1,21,'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',NULL,0,1721089324,'2024-07-16 00:22:04','2024-07-22 19:35:55'),(4,1,21,'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus Pag',NULL,0,1721242961,'2024-07-17 19:02:41','2024-07-22 19:35:55'),(5,1,21,'otra prueba para ver la hora exacta',NULL,0,1721248988,'2024-07-17 20:43:08','2024-07-22 19:35:55'),(6,21,1,'testeando el chat',NULL,0,NULL,NULL,'2024-07-22 19:35:08'),(7,1,21,'hola',NULL,0,1721255294,'2024-07-17 22:28:14','2024-07-22 19:35:55'),(8,1,21,'hola',NULL,0,1721255392,'2024-07-17 22:29:52','2024-07-22 19:35:55'),(9,1,21,'hola dos',NULL,0,1721258581,'2024-07-17 23:23:01','2024-07-22 19:35:55'),(10,1,21,'hola',NULL,0,1721258802,'2024-07-17 23:26:42','2024-07-22 19:35:55'),(11,1,21,'hola',NULL,0,1721259055,'2024-07-17 23:30:55','2024-07-22 19:35:55'),(12,1,14,'test',NULL,0,1721307555,'2024-07-18 12:59:15','2024-07-18 12:59:15'),(13,1,23,'test',NULL,0,1721307688,'2024-07-18 13:01:28','2024-07-18 13:01:28'),(14,1,22,'pruebas del sistema',NULL,0,1721314583,'2024-07-18 14:56:23','2024-07-22 19:37:16'),(15,1,22,'test',NULL,0,1721664001,'2024-07-22 16:00:01','2024-07-22 19:37:16'),(16,1,20,'test de pruebas',NULL,0,1721664741,'2024-07-22 16:12:21','2024-07-22 16:12:21'),(17,1,14,'hola',NULL,0,1721668114,'2024-07-22 17:08:34','2024-07-22 17:08:34'),(18,22,1,'desde otro modulo',NULL,1,1721668419,'2024-07-22 17:13:39','2024-09-19 01:32:07'),(19,1,22,'hola esto es  una prueba',NULL,0,1721677104,'2024-07-22 19:38:24','2024-07-22 19:38:33'),(20,1,21,'hols',NULL,0,1721766851,'2024-07-23 20:34:11','2024-07-23 20:34:11'),(21,1,14,'hola',NULL,0,1721766872,'2024-07-23 20:34:32','2024-07-23 20:34:32'),(22,1,30,'test',NULL,0,1726696485,'2024-09-18 21:54:45','2024-09-18 21:55:17'),(23,30,1,'test 2',NULL,1,1726696524,'2024-09-18 21:55:24','2024-09-19 01:31:57'),(24,30,1,'test',NULL,1,1726696918,'2024-09-18 22:01:58','2024-09-19 01:31:57'),(25,30,1,'test',NULL,1,1726697020,'2024-09-18 22:03:40','2024-09-19 01:31:57'),(26,1,30,'test',NULL,0,1726697783,'2024-09-18 22:16:23','2024-09-18 22:17:17'),(27,30,1,'test',NULL,1,1726697794,'2024-09-18 22:16:34','2024-09-19 01:31:57'),(28,1,30,'hola','20240919120558m0sespzuqvdviovkvkav.pdf',0,1726704358,'2024-09-19 00:05:58','2024-09-19 00:05:58'),(29,1,30,'holaaaa','202409191222497b0abpi7p4a2d1okh23o.jpeg',0,1726705369,'2024-09-19 00:22:49','2024-09-19 00:22:49'),(30,1,23,'??',NULL,0,1726748641,'2024-09-19 12:24:01','2024-09-19 12:24:01'),(31,1,23,'? ddfffd?eee',NULL,0,1726748706,'2024-09-19 12:25:06','2024-09-19 12:25:06'),(32,1,23,'?sdsds',NULL,0,1726748804,'2024-09-19 12:26:44','2024-09-19 12:26:44'),(33,1,23,'?ddd',NULL,0,1726749001,'2024-09-19 12:30:01','2024-09-19 12:30:01'),(34,1,23,'ddd',NULL,0,1726749016,'2024-09-19 12:30:16','2024-09-19 12:30:16');

/*Table structure for table `class` */

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headquater_id` int(11) DEFAULT NULL COMMENT 'codigo sede',
  `name` varchar(250) DEFAULT NULL,
  `program_type` enum('1','2','3') DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0,no, 1:si',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='programas';

/*Data for the table `class` */

insert  into `class`(`id`,`headquater_id`,`name`,`program_type`,`amount`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (11,3,'Auxiliar Contable','3',450000,0,0,1,'2024-03-01 11:28:04','2024-04-28 10:01:09'),(12,3,'Auxiliar Administrativo','3',450000,0,0,1,'2024-03-01 11:28:16','2024-04-28 10:01:18'),(13,3,'Caja Registradora','2',350000,0,0,1,'2024-03-01 11:28:32','2024-04-28 10:00:46'),(14,3,'Mercadeo  y Ventas','2',500000,0,0,1,'2024-03-01 11:28:45','2024-04-28 10:00:24'),(15,3,'Auxiliar de Enfermeria','3',500000,0,0,1,'2024-03-01 11:29:04','2024-04-28 10:08:17'),(16,1,'Ingles','2',450000,0,0,1,'2024-03-01 11:29:13','2024-04-28 10:08:00'),(17,3,'Mecanica de Motos','2',350000,0,0,1,'2024-04-28 09:59:36','2024-04-28 10:07:49'),(18,3,'Auxiliar Psicología infantil','3',450000,0,0,1,'2024-06-09 15:59:22','2024-06-09 15:59:22'),(19,3,'Belleza Integral','2',600000,0,0,1,'2024-09-23 13:48:11','2024-09-23 13:48:11');

/*Table structure for table `class_subject` */

DROP TABLE IF EXISTS `class_subject`;

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `headquarter_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `class_subject` */

insert  into `class_subject`(`id`,`class_id`,`exam_id`,`subject_id`,`headquarter_id`,`created_by`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,12,6,16,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(2,12,6,17,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(3,12,6,18,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(4,12,6,19,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(5,12,6,20,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(6,12,6,21,3,1,0,0,'2024-09-11 20:57:00','2024-09-11 20:57:00'),(7,11,6,16,3,1,0,0,'2024-09-11 20:57:32','2024-09-11 20:57:32'),(8,11,6,18,3,1,0,0,'2024-09-11 20:57:33','2024-09-11 20:57:33'),(9,11,6,19,3,1,0,0,'2024-09-11 20:57:33','2024-09-11 20:57:33'),(10,11,6,20,3,1,0,0,'2024-09-11 20:57:33','2024-09-11 20:57:33'),(11,11,6,21,3,1,0,0,'2024-09-11 20:57:33','2024-09-11 20:57:33'),(12,12,4,22,3,1,0,0,'2024-09-11 20:58:48','2024-09-11 20:58:48'),(13,12,4,23,3,1,0,0,'2024-09-11 20:58:48','2024-09-11 20:58:48'),(14,12,4,24,3,1,0,0,'2024-09-11 20:58:48','2024-09-11 20:58:48'),(15,12,4,30,3,1,0,0,'2024-09-11 20:58:48','2024-09-11 20:58:48'),(16,12,4,27,3,1,0,0,'2024-09-11 20:58:48','2024-09-11 20:58:48'),(17,11,4,22,3,1,0,0,'2024-09-11 21:00:49','2024-09-11 21:00:49'),(18,11,4,23,3,1,0,0,'2024-09-11 21:00:49','2024-09-11 21:00:49'),(19,11,4,24,3,1,0,0,'2024-09-11 21:00:49','2024-09-11 21:00:49'),(20,11,4,30,3,1,0,0,'2024-09-11 21:00:49','2024-09-11 21:00:49'),(21,11,4,27,3,1,0,0,'2024-09-11 21:00:49','2024-09-11 21:00:49'),(22,12,3,43,3,1,0,0,'2024-09-11 21:03:59','2024-09-11 21:03:59'),(23,12,3,28,3,1,0,0,'2024-09-11 21:03:59','2024-09-11 21:03:59'),(24,12,3,42,3,1,0,0,'2024-09-11 21:04:00','2024-09-11 21:04:00'),(25,12,3,29,3,1,0,0,'2024-09-11 21:04:00','2024-09-11 21:04:00'),(26,12,3,25,3,1,0,0,'2024-09-11 21:04:00','2024-09-11 21:04:00'),(27,12,2,36,3,1,0,0,'2024-09-11 21:05:01','2024-09-11 21:05:01'),(28,12,2,37,3,1,0,0,'2024-09-11 21:05:01','2024-09-11 21:05:01'),(29,12,2,32,3,1,0,0,'2024-09-11 21:05:02','2024-09-11 21:05:02'),(30,12,2,39,3,1,0,0,'2024-09-11 21:05:02','2024-09-11 21:05:02'),(31,12,2,34,3,1,0,0,'2024-09-11 21:05:02','2024-09-11 21:05:02'),(32,11,3,43,3,1,0,0,'2024-09-11 21:11:58','2024-09-11 21:11:58'),(33,11,3,28,3,1,0,0,'2024-09-11 21:11:58','2024-09-11 21:11:58'),(34,11,3,42,3,1,0,0,'2024-09-11 21:11:59','2024-09-11 21:11:59'),(35,11,3,29,3,1,0,0,'2024-09-11 21:11:59','2024-09-11 21:11:59'),(36,11,3,25,3,1,0,0,'2024-09-11 21:11:59','2024-09-11 21:11:59'),(37,11,2,35,3,1,0,0,'2024-09-11 21:13:09','2024-09-11 21:13:09'),(38,11,2,36,3,1,0,0,'2024-09-11 21:13:09','2024-09-11 21:13:09'),(39,11,2,37,3,1,0,0,'2024-09-11 21:13:09','2024-09-11 21:13:09'),(40,11,2,33,3,1,0,0,'2024-09-11 21:13:10','2024-09-11 21:13:10'),(41,11,2,39,3,1,0,0,'2024-09-11 21:13:10','2024-09-11 21:13:10'),(42,11,2,34,3,1,0,0,'2024-09-11 21:13:10','2024-09-11 21:13:10'),(43,12,3,45,3,1,0,0,'2024-09-11 22:13:53','2024-09-11 22:13:53'),(44,11,3,46,3,1,0,0,'2024-09-11 22:15:01','2024-09-11 22:15:01'),(45,12,3,47,3,1,0,0,'2024-09-11 22:27:53','2024-09-11 22:27:53'),(46,11,4,47,3,1,0,0,'2024-09-11 22:28:12','2024-09-11 22:28:12');

/*Table structure for table `class_subject_timetable` */

DROP TABLE IF EXISTS `class_subject_timetable`;

CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `class_subject_timetable` */

insert  into `class_subject_timetable`(`id`,`class_id`,`subject_id`,`week_id`,`start_time`,`end_time`,`room_number`,`created_at`,`updated_at`) values (72,12,20,6,'08:00','08:00','2','2024-03-01 12:33:37','2024-03-01 12:33:37');

/*Table structure for table `exam` */

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exam` */

insert  into `exam`(`id`,`name`,`note`,`start_date`,`end_date`,`created_by`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,'Quinto Ciclo 2024','Ciclo No 5 Semestre 1',NULL,NULL,1,0,0,'2024-01-31 07:47:13','2024-02-29 12:43:19'),(2,'Cuarto Semestre','Ciclo No 4 Semestre 1',NULL,NULL,1,0,0,'2024-02-02 11:41:00','2024-03-01 11:16:05'),(3,'Tercer Semestre','Ciclo N3 -Semestre I',NULL,NULL,1,0,0,'2024-02-02 12:54:47','2024-03-01 11:15:54'),(4,'Segundo Semestre','Ciclo No 2  Primer Semestre',NULL,NULL,1,0,0,'2024-02-02 16:50:21','2024-03-01 11:15:41'),(5,'eliminame','eliminame',NULL,NULL,1,1,0,'2024-02-02 16:50:43','2024-02-02 17:04:54'),(6,'Primer Semestre','Ciclo No -Semestre I',NULL,NULL,1,0,0,'2024-02-12 07:17:34','2024-03-01 11:15:28');

/*Table structure for table `exam_schedule` */

DROP TABLE IF EXISTS `exam_schedule`;

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `full_marks` varchar(50) DEFAULT NULL,
  `passing_mark` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exam_schedule` */

insert  into `exam_schedule`(`id`,`exam_id`,`class_id`,`subject_id`,`exam_date`,`start_time`,`end_time`,`room_number`,`full_marks`,`passing_mark`,`created_by`,`created_at`,`updated_at`) values (115,6,12,25,'2024-12-21','08:00','20:00','1','20','12',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(116,6,12,29,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(117,6,12,42,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(118,6,12,28,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(119,6,12,43,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(120,6,12,21,'2024-06-15','08:00','13:38','2','100','60',1,'2024-09-11 22:12:39','2024-09-11 22:12:39'),(121,6,12,20,'2024-06-15','08:00','13:00','10','100','60',1,'2024-09-11 22:12:40','2024-09-11 22:12:40'),(122,6,12,19,'2024-06-15','08:00','13:37','10','100','60',1,'2024-09-11 22:12:40','2024-09-11 22:12:40'),(123,6,12,18,'2024-06-15','08:00','13:00','10','100','60',1,'2024-09-11 22:12:40','2024-09-11 22:12:40'),(124,6,12,17,'2024-06-23','08:00','13:00','10','100','60',1,'2024-09-11 22:12:40','2024-09-11 22:12:40'),(125,6,12,16,'2024-06-29','08:00','13:00','10','100','60',1,'2024-09-11 22:12:40','2024-09-11 22:12:40'),(126,4,11,46,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(127,4,11,27,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(128,4,11,30,'2024-12-21','07:00','22:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(129,4,11,24,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(130,4,11,23,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(131,4,11,22,'2024-12-21','08:00','22:00','1','20','12',1,'2024-09-11 22:16:54','2024-09-11 22:16:54'),(132,3,11,25,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:23:01','2024-09-11 22:23:01'),(133,3,11,29,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:23:02','2024-09-11 22:23:02'),(134,3,11,42,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:23:02','2024-09-11 22:23:02'),(135,3,11,28,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:23:02','2024-09-11 22:23:02'),(136,3,11,43,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-11 22:23:02','2024-09-11 22:23:02'),(154,4,12,25,'2024-06-15','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(155,4,12,27,'2024-05-18','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(156,4,12,30,'2024-12-21','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(157,4,12,24,'2024-06-15','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(158,4,12,23,'2024-06-15','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(159,4,12,22,'2024-06-15','08:00','13:00','10','20','12',1,'2024-09-23 16:39:51','2024-09-23 16:39:51'),(166,3,12,47,'2024-12-21','08:02','13:09','1','20','12',1,'2024-09-23 17:12:43','2024-09-23 17:12:43'),(167,3,12,29,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-23 17:12:43','2024-09-23 17:12:43'),(168,3,12,42,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-23 17:12:43','2024-09-23 17:12:43'),(169,3,12,28,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-23 17:12:43','2024-09-23 17:12:43'),(170,3,12,43,'2024-12-21','08:00','13:00','1','20','12',1,'2024-09-23 17:12:43','2024-09-23 17:12:43');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `headquarters` */

DROP TABLE IF EXISTS `headquarters`;

CREATE TABLE `headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `headquarters` */

insert  into `headquarters`(`id`,`name`,`address`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'SEDE PRINCIPAL','EL CARMEN DE BOLIVAR',0,0,1,'2023-12-30 10:45:13','2023-12-30 10:45:13'),(2,'SEDE DOS','SAN JACINTO BOLIVAR',0,0,1,'2023-12-30 11:09:00','2023-12-30 11:16:43'),(3,'Mahates','Municipio de Mahates Bolivar',0,0,1,'2024-01-09 08:30:47','2024-01-09 08:34:50');

/*Table structure for table `homework` */

DROP TABLE IF EXISTS `homework`;

CREATE TABLE `homework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `document_file` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `homework` */

insert  into `homework`(`id`,`class_id`,`subject_id`,`homework_date`,`submission_date`,`document_file`,`description`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,12,20,'2024-03-30','2024-04-06',NULL,'prueba de tarea',1,1,'2024-03-30 09:11:06','2024-03-30 11:50:29'),(2,12,20,'2024-03-31','2024-04-07','202403300316192pu4mukjfd3wdbig1tzv.pdf','&nbsp;testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',0,1,'2024-03-30 09:16:19','2024-03-31 12:16:39'),(3,11,21,'2024-03-31','2024-04-07','20240331071902imbbqlqkij4rfglyl95a.pdf','testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',0,1,'2024-03-31 12:19:02','2024-03-31 12:19:02'),(4,12,31,'2024-04-01','2024-04-09','202404010402499bipzgoflaigmt2irsfs.pdf','test&nbsp;',0,1,'2024-04-01 09:02:49','2024-04-01 09:18:59'),(5,12,27,'2024-04-05','2024-04-06','20240405110722lmnfyinb6lz1kxslckxe.pdf','test&nbsp;',0,3,'2024-04-05 11:35:41','2024-04-05 16:07:22'),(6,12,19,'2024-04-05','2024-04-06',NULL,'test',1,3,'2024-04-05 11:37:08','2024-04-05 15:53:06'),(7,12,25,'2024-04-05','2024-04-12',NULL,'Taller 01',1,3,'2024-04-05 15:42:07','2024-04-05 15:53:01'),(8,12,36,'2024-07-30','2024-08-06',NULL,'tarea de ejemplo',0,1,'2024-07-30 15:42:44','2024-07-30 15:42:44');

/*Table structure for table `homework_submit` */

DROP TABLE IF EXISTS `homework_submit`;

CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `document_file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `homework_submit` */

insert  into `homework_submit`(`id`,`homework_id`,`student_id`,`description`,`document_file`,`created_at`,`updated_at`) values (1,4,21,'test de repuesta de tarea','20240407102521wi22bkxjfwfv5ocdn11h.pdf','2024-04-07 15:25:21','2024-04-07 15:25:21'),(2,4,21,'test','20240407102812mgsvkejjqvon6blmzrvn.pdf','2024-04-07 15:28:12','2024-04-07 15:28:12'),(3,2,21,'test&nbsp;','20240407110248wxbthcj64xqd8151swsw.pdf','2024-04-07 16:02:48','2024-04-07 16:02:48'),(4,5,21,'test','20240407110321fry4cspgryibhcthynze.pdf','2024-04-07 16:03:21','2024-04-07 16:03:21'),(5,2,14,'test','20240616122916haignhiwdnvnfwbpo2su.docx','2024-06-15 17:29:16','2024-06-15 17:29:16');

/*Table structure for table `journeys` */

DROP TABLE IF EXISTS `journeys`;

CREATE TABLE `journeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `abbreviation` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `journeys` */

insert  into `journeys`(`id`,`name`,`abbreviation`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'Lunes Mañana','LM',0,0,1,'2023-12-14 08:19:51','2023-12-14 08:19:51'),(2,'Sabado Tarde','ST',0,0,1,'2023-12-14 12:37:17','2023-12-14 12:37:17'),(3,'eliminar antes editar',NULL,0,1,1,'2023-12-14 12:37:29','2023-12-14 12:37:46'),(4,'Viernes Mañana','VM',0,0,1,'2023-12-14 19:03:03','2023-12-14 19:06:05'),(5,'Domingo Mañana','DM',0,0,1,'2023-12-31 12:52:15','2023-12-31 12:52:15'),(6,'Sabado Mañana','SM',0,0,1,'2024-09-23 16:55:09','2024-09-23 16:55:09');

/*Table structure for table `marks_grade` */

DROP TABLE IF EXISTS `marks_grade`;

CREATE TABLE `marks_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `percent_from` int(11) DEFAULT NULL,
  `percent_to` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `marks_grade` */

insert  into `marks_grade`(`id`,`name`,`percent_from`,`percent_to`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'A',90,100,0,1,'2024-03-05 12:28:44','2024-03-06 17:49:12'),(2,'B',80,89,0,1,'2024-03-05 12:30:07','2024-03-06 17:49:28'),(3,'C',70,79,0,1,'2024-03-05 15:12:07','2024-03-06 17:49:40'),(4,'nombre',50,50,1,1,'2024-03-06 10:39:20','2024-03-06 10:39:23'),(5,'D',60,69,0,1,'2024-03-06 10:53:39','2024-03-06 17:50:03'),(6,'E',50,59,0,1,'2024-03-06 17:50:32','2024-03-06 17:50:32'),(7,'F',0,58,0,1,'2024-03-06 17:50:56','2024-03-06 17:50:56');

/*Table structure for table `marks_register` */

DROP TABLE IF EXISTS `marks_register`;

CREATE TABLE `marks_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_work` double NOT NULL DEFAULT 0,
  `home_work` double NOT NULL DEFAULT 0,
  `test_work` double NOT NULL DEFAULT 0,
  `exam` double NOT NULL DEFAULT 0,
  `full_marks` double NOT NULL DEFAULT 0,
  `passing_mark` double NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `marks_register` */

insert  into `marks_register`(`id`,`student_id`,`exam_id`,`class_id`,`subject_id`,`class_work`,`home_work`,`test_work`,`exam`,`full_marks`,`passing_mark`,`created_by`,`created_at`,`updated_at`) values (30,21,6,12,21,20,20,20,20,100,60,1,'2024-03-01 20:41:55','2024-03-01 20:42:56'),(31,21,6,12,20,20,20,20,20,100,60,1,'2024-03-01 20:42:00','2024-03-01 21:00:09'),(32,21,6,12,19,10,20,20,20,100,60,1,'2024-03-01 20:42:00','2024-03-06 11:45:41'),(33,21,6,12,18,15,20,10,20,100,60,1,'2024-03-01 20:42:00','2024-03-06 11:45:41'),(34,21,6,12,17,10,20,20,20,100,60,1,'2024-03-01 20:42:00','2024-03-06 11:45:41'),(35,21,6,12,16,20,20,20,20,100,60,1,'2024-03-01 20:42:01','2024-03-06 11:45:41'),(36,21,4,12,27,20,15,20,20,100,60,1,'2024-03-04 10:55:10','2024-03-04 10:55:10'),(37,21,4,12,26,20,10,20,20,100,60,1,'2024-03-04 10:55:12','2024-03-04 10:55:12'),(38,21,4,12,25,20,20,20,20,100,60,1,'2024-03-04 10:55:12','2024-03-04 12:08:22'),(39,21,4,12,24,15,20,20,20,100,60,1,'2024-03-04 10:55:12','2024-03-04 12:08:22'),(40,21,4,12,23,20,20,20,10,100,60,1,'2024-03-04 10:55:12','2024-03-04 12:08:23'),(41,21,4,12,22,20,20,15,20,100,60,1,'2024-03-04 10:55:12','2024-03-04 12:08:23'),(42,17,6,12,16,5,5,5,5,100,60,1,'2024-03-06 17:51:38','2024-03-06 17:51:41'),(43,17,6,12,21,20,20,20,20,100,60,1,'2024-03-06 17:51:41','2024-07-27 00:19:20'),(44,17,6,12,20,0,0,0,0,100,60,1,'2024-03-06 17:51:41','2024-03-06 17:51:41'),(45,17,6,12,19,0,0,0,0,100,60,1,'2024-03-06 17:51:41','2024-03-06 17:51:41'),(46,17,6,12,18,0,0,0,0,100,60,1,'2024-03-06 17:51:41','2024-03-06 17:51:41'),(47,17,6,12,17,0,0,0,0,100,60,1,'2024-03-06 17:51:41','2024-03-06 17:51:41'),(48,14,6,12,21,20,20,20,20,100,60,1,'2024-07-24 20:37:07','2024-07-24 20:37:07'),(49,14,6,12,20,20,20,20,20,100,60,1,'2024-07-24 20:37:07','2024-07-24 20:37:07'),(50,14,6,12,19,20,20,20,20,100,60,1,'2024-07-24 20:37:08','2024-07-24 20:37:08'),(51,14,6,12,18,20,20,20,20,100,60,1,'2024-07-24 20:37:08','2024-07-24 20:37:08'),(52,14,6,12,17,20,20,20,20,100,60,1,'2024-07-24 20:37:08','2024-07-24 20:37:08'),(53,14,6,12,16,20,20,20,20,100,60,1,'2024-07-24 20:37:08','2024-07-24 20:37:08'),(54,14,4,12,27,20,20,20,20,100,60,1,'2024-07-24 20:37:51','2024-07-24 20:37:51'),(55,14,4,12,26,20,20,20,20,100,60,1,'2024-07-24 20:37:51','2024-07-24 20:37:51'),(56,14,4,12,25,20,20,20,20,100,60,1,'2024-07-24 20:37:51','2024-07-24 20:37:51'),(57,14,4,12,24,20,20,20,20,100,60,1,'2024-07-24 20:37:51','2024-07-24 20:37:51'),(58,14,4,12,23,20,20,20,20,100,60,1,'2024-07-24 20:37:51','2024-07-24 20:37:51'),(59,14,4,12,22,20,20,20,20,100,60,1,'2024-07-24 20:37:52','2024-07-24 20:37:52'),(60,24,4,11,27,4,4.2,3.8,0,20,12,1,'2024-09-11 21:47:03','2024-09-11 21:47:03'),(61,24,4,11,27,4,4.2,3.8,0,0,0,1,'2024-09-11 21:47:03','2024-09-11 21:47:03'),(62,24,4,11,30,4.2,4.5,4.5,0,20,12,1,'2024-09-11 21:47:03','2024-09-30 19:14:46'),(63,24,4,11,24,0,0,0,0,20,12,1,'2024-09-11 21:47:03','2024-09-11 21:47:03'),(64,24,4,11,23,0,0,0,0,20,12,1,'2024-09-11 21:47:03','2024-09-11 21:47:03'),(65,24,4,11,22,0,0,0,0,20,12,1,'2024-09-11 21:47:03','2024-09-11 21:47:03'),(66,35,3,11,25,4.2,4.2,3.8,0,20,12,1,'2024-09-11 22:33:40','2024-09-11 22:33:40'),(67,35,3,11,29,3.5,4.2,0,0,20,12,1,'2024-09-11 22:33:40','2024-09-30 19:31:57'),(68,35,3,11,42,4.2,4.5,4,0,20,12,1,'2024-09-11 22:33:40','2024-09-30 19:32:08'),(69,35,3,11,28,4,3.8,4,0,20,12,1,'2024-09-11 22:33:40','2024-09-30 19:32:33'),(70,35,3,11,43,4.3,4,4,0,20,12,1,'2024-09-11 22:33:40','2024-09-30 19:32:33'),(71,39,3,11,42,4.2,0,4.5,0,20,12,1,'2024-09-23 15:48:23','2024-09-23 15:48:24'),(72,39,3,11,25,4.2,4.4,0,0,20,12,1,'2024-09-23 15:48:24','2024-09-30 19:18:41'),(73,39,3,11,29,4.2,4.5,0,0,20,12,1,'2024-09-23 15:48:24','2024-09-23 15:51:00'),(74,39,3,11,28,4.6,4.5,0,0,20,12,1,'2024-09-23 15:48:24','2024-09-23 15:50:50'),(75,39,3,11,43,0,0,0,0,20,12,1,'2024-09-23 15:48:24','2024-09-23 15:48:24'),(76,38,3,11,25,4.2,4.2,0,0,20,12,1,'2024-09-23 15:51:26','2024-09-23 15:51:26'),(77,38,3,11,25,4.2,4.2,0,0,0,0,1,'2024-09-23 15:51:26','2024-09-23 15:51:26'),(78,38,3,11,29,4.3,4.2,0,0,20,12,1,'2024-09-23 15:51:26','2024-09-23 15:51:37'),(79,38,3,11,42,4.2,4.5,0,0,20,12,1,'2024-09-23 15:51:26','2024-09-23 15:52:25'),(80,38,3,11,28,4.3,4.2,0,0,20,12,1,'2024-09-23 15:51:26','2024-09-23 15:52:25'),(81,38,3,11,43,4.5,4.6,0,0,20,12,1,'2024-09-23 15:51:26','2024-09-23 15:52:25'),(82,31,3,12,25,4.7,4.7,0,0,20,12,1,'2024-09-23 15:57:12','2024-09-23 15:59:37'),(83,31,3,12,42,4.4,4.3,0,0,20,12,1,'2024-09-23 15:57:12','2024-09-23 15:58:15'),(84,31,3,12,28,4.7,4.6,0,0,20,12,1,'2024-09-23 15:57:12','2024-09-23 15:58:15'),(85,31,3,12,43,4.7,4.4,0,0,20,12,1,'2024-09-23 15:57:12','2024-09-23 15:58:58'),(86,31,3,12,29,4.6,4.5,0,0,20,12,1,'2024-09-23 15:57:19','2024-09-23 15:57:19'),(87,29,3,12,25,4.2,4.4,0,0,20,12,1,'2024-09-23 16:10:42','2024-09-23 16:10:42'),(88,29,3,12,29,4.6,4.3,0,0,20,12,1,'2024-09-23 16:10:43','2024-09-23 16:10:56'),(89,29,3,12,42,4.2,4.5,4.5,0,20,12,1,'2024-09-23 16:10:43','2024-09-25 17:21:23'),(90,29,3,12,28,4.3,4.2,0,0,20,12,1,'2024-09-23 16:10:43','2024-09-25 17:22:02'),(91,29,3,12,43,0,0,0,0,20,12,1,'2024-09-23 16:10:43','2024-09-23 16:10:43'),(92,36,4,12,25,4.2,4.3,0,0,100,60,1,'2024-09-23 16:11:36','2024-09-23 16:11:36'),(93,36,4,12,27,3.8,4.2,0,0,20,60,1,'2024-09-23 16:11:36','2024-09-23 16:13:52'),(94,36,4,12,30,4.2,3.9,0,0,20,12,1,'2024-09-23 16:11:36','2024-09-23 16:13:53'),(95,36,4,12,24,4.2,3.8,0,0,20,12,1,'2024-09-23 16:11:36','2024-09-23 16:14:08'),(96,36,4,12,23,3.8,4.2,0,0,20,12,1,'2024-09-23 16:11:36','2024-09-23 16:14:36'),(97,36,4,12,22,4.3,3.8,0,0,20,12,1,'2024-09-23 16:11:37','2024-09-23 16:14:45'),(98,31,4,12,27,4.6,4.2,4.5,4.6,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:38:15'),(99,31,4,12,25,4.2,4.3,4.7,4.8,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:38:47'),(100,31,4,12,30,4.4,4.5,4.6,4.6,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:39:00'),(101,31,4,12,24,4.6,4.4,4.6,4.7,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:31:31'),(102,31,4,12,23,4.8,4.7,4.2,4.6,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:39:17'),(103,31,4,12,22,4.6,4.5,4.4,4.7,20,12,1,'2024-09-23 16:12:22','2024-09-23 16:39:26'),(104,30,4,12,25,4.2,4,0,0,100,60,1,'2024-09-23 16:12:37','2024-09-23 16:12:53'),(105,30,4,12,27,3.8,3.9,0,0,20,60,1,'2024-09-23 16:12:37','2024-09-23 16:12:53'),(106,30,4,12,30,0,0,0,0,20,12,1,'2024-09-23 16:12:37','2024-09-23 16:12:37'),(107,30,4,12,24,0,0,0,0,20,12,1,'2024-09-23 16:12:37','2024-09-23 16:12:37'),(108,30,4,12,23,0,0,0,0,20,12,1,'2024-09-23 16:12:37','2024-09-23 16:12:37'),(109,30,4,12,22,0,0,0,0,20,12,1,'2024-09-23 16:12:37','2024-09-23 16:12:37'),(110,34,4,12,25,3.7,3.8,0,0,100,60,1,'2024-09-23 16:15:44','2024-09-23 16:15:44'),(111,34,4,12,27,3.5,3.8,0,0,20,60,1,'2024-09-23 16:15:44','2024-09-23 16:15:44'),(112,34,4,12,30,4.2,3.2,0,0,20,12,1,'2024-09-23 16:15:44','2024-09-23 16:27:43'),(113,34,4,12,24,3.4,4.2,0,0,20,12,1,'2024-09-23 16:15:44','2024-09-23 16:28:00'),(114,34,4,12,23,3.8,3.6,0,0,20,12,1,'2024-09-23 16:15:44','2024-09-23 16:27:43'),(115,34,4,12,22,4,3.5,0,0,20,12,1,'2024-09-23 16:15:44','2024-09-23 16:28:03'),(116,33,4,12,25,3.4,3.2,0,0,100,60,1,'2024-09-23 16:28:36','2024-09-23 16:28:36'),(117,33,4,12,27,3.5,3.8,0,0,20,60,1,'2024-09-23 16:28:36','2024-09-23 16:28:51'),(118,33,4,12,30,3.4,3.6,0,0,20,12,1,'2024-09-23 16:28:36','2024-09-23 16:29:04'),(119,33,4,12,24,3.6,3.5,0,0,20,12,1,'2024-09-23 16:28:36','2024-09-23 16:29:20'),(120,33,4,12,23,3.5,3.7,0,0,20,12,1,'2024-09-23 16:28:36','2024-09-23 16:29:33'),(121,33,4,12,22,3.8,3.7,0,0,20,12,1,'2024-09-23 16:28:36','2024-09-23 16:29:42'),(122,39,4,11,46,4.5,4.7,4.7,4.6,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:40:52'),(123,39,4,11,27,4.6,4.2,4.6,4.8,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:41:09'),(124,39,4,11,30,4.2,4.5,4.5,4.4,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:41:28'),(125,39,4,11,24,4.5,4.4,4.6,4.5,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:41:51'),(126,39,4,11,23,4.6,4.2,4.7,4.6,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:44:37'),(127,39,4,11,22,4.6,4.5,4.8,4.6,20,12,1,'2024-09-23 16:40:52','2024-09-23 16:44:54'),(128,35,4,11,46,4.2,4.3,4.7,4,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:49:49'),(129,35,4,11,27,4.6,4.2,4,4.1,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:51:20'),(130,35,4,11,30,4.2,4.5,4.5,3.8,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:51:33'),(131,35,4,11,24,4.3,4.2,4.1,4,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:51:49'),(132,35,4,11,23,4.3,4.2,4.3,4,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:52:05'),(133,35,4,11,22,4.3,4.2,4.5,4.2,20,12,1,'2024-09-23 16:49:49','2024-09-23 16:52:25'),(134,31,3,12,47,4.2,4.3,0,0,0,0,1,'2024-09-23 17:13:17','2024-09-23 17:13:17'),(135,31,3,12,47,4.2,4.3,0,0,20,12,1,'2024-09-23 17:13:17','2024-09-23 17:13:17'),(136,36,3,12,47,4.2,4.3,0,0,20,12,1,'2024-09-23 17:13:28','2024-09-23 17:13:28'),(137,36,3,12,29,0,0,0,0,20,12,1,'2024-09-23 17:13:28','2024-09-23 17:13:28'),(138,36,3,12,42,0,0,0,0,20,12,1,'2024-09-23 17:13:28','2024-09-23 17:13:28'),(139,36,3,12,28,0,0,0,0,20,12,1,'2024-09-23 17:13:28','2024-09-23 17:13:28'),(140,36,3,12,43,0,0,0,0,20,12,1,'2024-09-23 17:13:28','2024-09-23 17:13:28'),(141,25,4,12,25,4.2,4.3,4.7,4.2,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:23:12'),(142,25,4,12,27,4.6,4.2,4,4,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:23:25'),(143,25,4,12,30,4.2,4.5,4.6,4,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:25:27'),(144,25,4,12,24,4.4,4.5,4.3,4.5,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:25:47'),(145,25,4,12,23,4.3,4.6,4.4,4,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:26:07'),(146,25,4,12,22,4,4.5,4.3,4.2,20,12,1,'2024-09-23 17:23:12','2024-09-23 17:26:24'),(147,29,3,12,47,4.2,4.4,0,0,20,12,1,'2024-09-25 17:21:15','2024-09-25 17:21:16'),(148,25,3,12,47,4.2,4.4,0,0,20,12,1,'2024-09-25 17:22:12','2024-09-25 17:22:12'),(149,25,3,12,29,4.6,4.2,0,0,20,12,1,'2024-09-25 17:22:12','2024-09-25 17:22:19'),(150,25,3,12,42,4.2,4.5,0,0,20,12,1,'2024-09-25 17:22:12','2024-09-25 17:22:25'),(151,25,3,12,28,4.2,4.3,0,0,20,12,1,'2024-09-25 17:22:12','2024-09-25 17:22:42'),(152,25,3,12,43,4.3,4.4,0,0,20,12,1,'2024-09-25 17:22:12','2024-09-25 17:22:52'),(153,29,4,12,25,4.2,4.4,4.7,4.6,20,12,1,'2024-09-25 17:29:11','2024-09-25 17:29:11'),(154,29,4,12,27,4.6,4.2,4.3,4,20,12,1,'2024-09-25 17:29:12','2024-09-25 17:29:23'),(155,29,4,12,30,4.2,4.5,4.5,4.4,20,12,1,'2024-09-25 17:29:12','2024-09-25 17:29:36'),(156,29,4,12,24,4.3,4.2,4.4,4.3,20,12,1,'2024-09-25 17:29:12','2024-09-25 17:29:50'),(157,29,4,12,23,4.2,4.3,4.5,4,20,12,1,'2024-09-25 17:29:12','2024-09-25 17:30:07'),(158,29,4,12,22,4.3,4.2,4.6,4.1,20,12,1,'2024-09-25 17:29:12','2024-09-25 17:30:21'),(159,26,4,12,25,4.2,4.2,3.8,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:00'),(160,26,4,12,27,4.6,4.2,0,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:10'),(161,26,4,12,30,4.2,4.5,0,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:19'),(162,26,4,12,24,0,0,0,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:00'),(163,26,4,12,23,0,0,0,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:00'),(164,26,4,12,22,0,0,0,0,20,12,1,'2024-09-25 17:42:00','2024-09-25 17:42:00'),(165,27,4,12,25,4.2,4.7,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:29'),(166,27,4,12,27,4.6,4.2,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:35'),(167,27,4,12,30,0,0,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:29'),(168,27,4,12,24,0,0,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:29'),(169,27,4,12,23,0,0,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:29'),(170,27,4,12,22,0,0,0,0,20,12,1,'2024-09-25 17:42:29','2024-09-25 17:42:29'),(171,28,4,12,25,3.7,4,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:43:30'),(172,28,4,12,27,3.5,3.8,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:42:54'),(173,28,4,12,30,3.9,3.8,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:43:30'),(174,28,4,12,24,0,0,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:42:45'),(175,28,4,12,23,0,0,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:42:45'),(176,28,4,12,22,0,0,0,0,20,12,1,'2024-09-25 17:42:45','2024-09-25 17:42:45'),(177,46,4,11,46,4.2,4.3,4.7,4.2,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:51:55'),(178,46,4,11,27,4.6,4.2,4.3,4.5,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:52:11'),(179,46,4,11,30,4.2,4.5,4.5,4.4,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:52:27'),(180,46,4,11,24,4.3,4.6,4.4,4.2,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:52:47'),(181,46,4,11,23,4.2,4,4.1,4.3,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:53:15'),(182,46,4,11,22,4.3,4.2,4,4.5,20,12,1,'2024-09-30 18:51:55','2024-09-30 18:53:33'),(183,38,4,11,46,4.2,4.3,3.8,4.6,20,12,1,'2024-09-30 18:57:09','2024-09-30 18:57:09'),(184,38,4,11,27,4.5,4.2,4.3,4,20,12,1,'2024-09-30 18:57:09','2024-09-30 18:57:50'),(185,38,4,11,30,4.3,4.5,4.4,4.2,20,12,1,'2024-09-30 18:57:09','2024-09-30 19:13:08'),(186,38,4,11,24,4.2,4.3,4,4.1,20,12,1,'2024-09-30 18:57:09','2024-09-30 19:13:28'),(187,38,4,11,23,4.2,4.4,4.5,4.3,20,12,1,'2024-09-30 18:57:10','2024-09-30 19:13:45'),(188,38,4,11,22,4.3,4.2,4.3,4.2,20,12,1,'2024-09-30 18:57:10','2024-09-30 19:13:57'),(189,24,4,11,46,4.2,4.3,3.8,0,20,12,1,'2024-09-30 19:14:24','2024-09-30 19:14:24'),(190,37,4,11,46,3.7,4,3.8,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:16:21'),(191,37,4,11,27,3.5,4.2,3.8,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:15:21'),(192,37,4,11,30,4.2,4.5,0,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:15:34'),(193,37,4,11,24,4,3.5,3.6,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:15:46'),(194,37,4,11,23,4.3,4,3.6,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:16:01'),(195,37,4,11,22,3.8,4.3,4,0,20,12,1,'2024-09-30 19:15:11','2024-09-30 19:16:21'),(196,46,3,11,25,4.2,4.3,0,0,20,12,1,'2024-09-30 19:18:34','2024-09-30 19:18:34'),(197,46,3,11,29,0,0,0,0,20,12,1,'2024-09-30 19:18:34','2024-09-30 19:18:34'),(198,46,3,11,42,0,0,0,0,20,12,1,'2024-09-30 19:18:34','2024-09-30 19:18:34'),(199,46,3,11,28,0,0,0,0,20,12,1,'2024-09-30 19:18:34','2024-09-30 19:18:34'),(200,46,3,11,43,0,0,0,0,20,12,1,'2024-09-30 19:18:34','2024-09-30 19:18:34'),(201,32,4,11,46,3.7,0,0,0,20,12,1,'2024-09-30 19:34:23','2024-09-30 19:34:23'),(202,32,4,11,27,3.5,0,0,0,20,12,1,'2024-09-30 19:34:23','2024-09-30 19:34:23'),(203,32,4,11,30,0,0,0,0,20,12,1,'2024-09-30 19:34:23','2024-09-30 19:34:23'),(204,32,4,11,24,0,0,0,0,20,12,1,'2024-09-30 19:34:23','2024-09-30 19:34:23'),(205,32,4,11,23,0,0,0,0,20,12,1,'2024-09-30 19:34:24','2024-09-30 19:34:24'),(206,32,4,11,22,0,0,0,0,20,12,1,'2024-09-30 19:34:24','2024-09-30 19:34:24');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `notice_board` */

DROP TABLE IF EXISTS `notice_board`;

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `message` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `notice_board` */

insert  into `notice_board`(`id`,`title`,`notice_date`,`publish_date`,`message`,`created_by`,`created_at`,`updated_at`) values (2,'test','2024-03-21','2024-03-21','lorem Ipsum  lorem Ipsum lorem Ipsum lorem Ipsum',1,'2024-03-21 13:28:46','2024-03-25 16:43:11'),(6,'prueba editada','2024-03-25','2024-03-25','esto es una prueba editada',1,'2024-03-21 16:20:46','2024-03-25 16:29:50'),(7,'test','2024-03-21','2024-03-21','test',1,'2024-03-21 16:48:13','2024-03-21 16:48:13'),(8,'Taller contabilidad 1','2024-03-22','2024-03-21','Realizar taller No 1',1,'2024-03-21 16:57:43','2024-03-21 16:57:43');

/*Table structure for table `notice_board_message` */

DROP TABLE IF EXISTS `notice_board_message`;

CREATE TABLE `notice_board_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_board_id` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `notice_board_message` */

insert  into `notice_board_message`(`id`,`notice_board_id`,`message_to`,`created_at`,`updated_at`) values (3,7,3,'2024-03-21 16:48:13','2024-03-21 16:48:13'),(4,7,4,'2024-03-21 16:48:14','2024-03-21 16:48:14'),(5,7,2,'2024-03-21 16:48:14','2024-03-21 16:48:14'),(6,8,3,'2024-03-21 16:57:44','2024-03-21 16:57:44'),(7,8,4,'2024-03-21 16:57:44','2024-03-21 16:57:44'),(8,6,4,'2024-03-25 16:29:52','2024-03-25 16:29:52'),(9,2,3,'2024-03-25 16:43:11','2024-03-25 16:43:11'),(10,2,2,'2024-03-25 16:43:11','2024-03-25 16:43:11');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `registration` */

DROP TABLE IF EXISTS `registration`;

CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `headquater_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: matriculado, 2: graduado, 3:  retirado, 4: cancelado, 5: expulsado',
  `date_of_entry` date DEFAULT NULL,
  `retirement_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `registration` */

insert  into `registration`(`id`,`student_id`,`headquater_id`,`class_id`,`status`,`date_of_entry`,`retirement_date`,`remarks`,`created_at`,`updated_at`) values (1,48,3,19,2,'2024-10-15',NULL,NULL,'2024-10-15 18:26:15','2024-10-18 13:28:37');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(250) DEFAULT NULL,
  `exam_description` varchar(250) DEFAULT NULL,
  `operating_license` varchar(250) DEFAULT NULL,
  `legal_representative` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `paypal_email` varchar(250) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='configuraciones pasarelas de pagos';

/*Data for the table `setting` */

insert  into `setting`(`id`,`school_name`,`exam_description`,`operating_license`,`legal_representative`,`address`,`phone`,`paypal_email`,`logo`,`favicon_icon`,`created_at`,`updated_at`) values (1,'TEST','Comprometidos con la Educación','0001','TEST-TEST','El Carmen de Bolivar','3013230867','ingjerson2014@gmail.com','202410110407235f1fcwsssnsunk7ro4jk.jpg','2024101104072328xwtlbrbgx7glic5ypl.jpg','2024-05-28 00:14:34','2024-10-11 16:07:23');

/*Table structure for table `student_add_fees` */

DROP TABLE IF EXISTS `student_add_fees`;

CREATE TABLE `student_add_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT 0 COMMENT 'valor total',
  `paid_amount` float DEFAULT 0 COMMENT 'valor pagado',
  `remaning_amount` float DEFAULT 0 COMMENT 'cantidad restante',
  `payment_date` datetime DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL COMMENT 'tipo de pagos',
  `remark` text DEFAULT NULL,
  `receipt_number` text DEFAULT NULL,
  `is_payment` tinyint(4) DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla para pagos de semestres';

/*Data for the table `student_add_fees` */

insert  into `student_add_fees`(`id`,`student_id`,`class_id`,`total_amount`,`paid_amount`,`remaning_amount`,`payment_date`,`payment_type`,`remark`,`receipt_number`,`is_payment`,`payment_data`,`created_by`,`created_at`,`updated_at`) values (20,21,11,450000,200000,250000,'2024-05-13 00:00:00','Cash',NULL,NULL,1,NULL,1,'2024-05-13 14:14:48','2024-05-13 14:14:48'),(24,21,11,250000,100000,150000,'2024-05-21 00:00:00','Paypal','test',NULL,0,NULL,21,'2024-05-21 05:20:50','2024-05-21 05:20:50'),(25,21,11,150000,150000,0,'2024-05-21 00:00:00','Paypal','test',NULL,0,NULL,21,'2024-05-21 05:21:38','2024-05-21 05:21:38'),(26,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 18:44:39','2024-06-02 18:44:39'),(27,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 18:45:30','2024-06-02 18:45:30'),(28,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 18:46:44','2024-06-02 18:46:44'),(29,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 18:50:16','2024-06-02 18:50:16'),(30,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal','test',NULL,0,NULL,21,'2024-06-02 18:52:39','2024-06-02 18:52:39'),(31,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 18:55:26','2024-06-02 18:55:26'),(32,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 19:03:24','2024-06-02 19:03:24'),(33,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-02 19:06:00','2024-06-02 19:06:00'),(34,21,11,250000,20,249980,'2024-06-03 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-03 17:21:22','2024-06-03 17:21:22'),(35,14,12,450000,100000,350000,'2024-06-09 00:00:00','Cash',NULL,NULL,1,NULL,1,'2024-06-09 14:42:11','2024-06-09 14:42:11'),(36,14,12,350000,50000,300000,'2024-06-09 00:00:00','Cash',NULL,NULL,1,NULL,1,'2024-06-09 15:18:34','2024-06-09 15:18:34'),(37,21,11,250000,100000,150000,'2024-06-09 00:00:00','Cash',NULL,NULL,1,NULL,1,'2024-06-09 15:23:36','2024-06-09 15:23:36'),(38,17,12,450000,100000,350000,'2024-06-10 00:00:00','Cash',NULL,NULL,1,NULL,1,'2024-06-10 17:22:01','2024-06-10 17:22:01'),(39,15,12,450000,450000,0,'2024-06-10 00:00:00','transfer','pago por nequi',NULL,1,NULL,1,'2024-06-10 18:22:08','2024-06-10 18:22:08'),(40,21,11,150000,100000,50000,'2024-06-13 00:00:00','Paypal',NULL,NULL,0,NULL,21,'2024-06-13 18:16:59','2024-06-13 18:16:59'),(41,14,12,300000,100000,200000,'2024-06-14 00:00:00','Cash','test',NULL,1,NULL,1,'2024-06-14 17:50:28','2024-06-14 17:50:28'),(42,25,12,450000,20000,430000,'2024-09-18 00:00:00','Cash',NULL,NULL,1,NULL,40,'2024-09-18 16:36:15','2024-09-18 16:36:15'),(43,25,12,430000,20000,410000,'2024-09-18 00:00:00','Cash',NULL,NULL,1,NULL,40,'2024-09-18 20:58:20','2024-09-18 20:58:20'),(44,25,12,410000,10000,400000,'2024-09-18 00:00:00','Cash',NULL,NULL,1,NULL,40,'2024-09-18 20:59:16','2024-09-18 20:59:16'),(45,24,11,450000,100000,350000,'2024-09-18 00:00:00','Cash',NULL,NULL,1,NULL,40,'2024-09-18 21:10:44','2024-09-18 21:10:44'),(46,25,12,400000,100000,300000,'2024-09-22 00:00:00','Cash',NULL,'C012',1,NULL,1,'2024-09-22 12:36:11','2024-09-22 12:36:11');

/*Table structure for table `student_attendance` */

DROP TABLE IF EXISTS `student_attendance`;

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attendance_type` int(11) DEFAULT NULL COMMENT '1:Present, 2:Late, 3:Ausent, 4:hALF dAY',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `student_attendance` */

insert  into `student_attendance`(`id`,`class_id`,`attendance_date`,`student_id`,`attendance_type`,`created_by`,`created_at`,`updated_at`) values (1,12,'2024-03-11',21,1,1,'2024-03-15 16:44:36','2024-03-15 16:44:36'),(5,12,'2024-03-11',17,3,1,'2024-03-15 16:50:46','2024-03-15 17:37:05'),(6,12,'2024-03-11',15,1,1,'2024-03-15 16:50:49','2024-03-15 16:50:49'),(7,12,'2024-03-11',14,1,1,'2024-03-15 16:50:53','2024-03-15 16:50:53'),(8,12,'2024-03-15',21,3,1,'2024-03-17 11:55:46','2024-03-17 11:55:46'),(9,12,'2024-03-17',21,4,3,'2024-03-17 21:02:11','2024-03-18 10:53:05'),(10,12,'2024-03-17',17,3,3,'2024-03-17 21:02:17','2024-03-17 21:02:17'),(11,12,'2024-03-17',15,3,3,'2024-03-17 21:02:19','2024-03-17 21:02:19'),(12,12,'2024-03-17',14,3,3,'2024-03-17 21:02:22','2024-03-17 21:02:22'),(13,12,'2024-04-03',21,1,3,'2024-04-03 10:13:07','2024-04-03 10:13:07'),(14,12,'2024-04-03',17,2,3,'2024-04-03 10:13:55','2024-04-03 10:13:55');

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `semester` enum('I','II','III','IV') DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subject` */

insert  into `subject`(`id`,`name`,`type`,`semester`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (16,'Administracion I','Theory','I',0,0,1,'2024-03-01 11:30:58','2024-03-01 11:30:58'),(17,'Contabilidad I','Theory','I',0,0,1,'2024-03-01 11:31:11','2024-03-01 11:31:11'),(18,'Economia I','Theory','I',0,0,1,'2024-03-01 11:31:26','2024-03-01 11:31:26'),(19,'Etica','Theory','I',0,0,1,'2024-03-01 11:31:40','2024-03-01 11:31:40'),(20,'Matematicas I','Theory','I',0,0,1,'2024-03-01 11:31:53','2024-03-01 11:31:53'),(21,'Metodología Educación','Theory','I',0,0,1,'2024-03-01 11:32:07','2024-03-01 11:32:07'),(22,'Constitucional','Theory','II',0,0,1,'2024-03-01 11:32:23','2024-03-01 11:32:23'),(23,'Contabilidad II','Theory','II',0,0,1,'2024-03-01 11:32:36','2024-03-01 11:32:36'),(24,'Derecho Laboral','Theory','II',0,0,1,'2024-03-01 11:32:50','2024-03-01 11:32:50'),(25,'Estadistica','Theory','II',0,0,1,'2024-03-01 11:33:04','2024-03-01 11:33:04'),(26,'Informatica I','Practical','II',0,0,1,'2024-03-01 11:33:18','2024-03-01 11:33:18'),(27,'Matematicas Financieras','Theory','II',0,0,1,'2024-03-01 11:33:31','2024-03-01 11:33:31'),(28,'Analisis Financiero','Theory','III',0,0,1,'2024-03-01 11:33:48','2024-03-01 11:33:48'),(29,'Costos','Theory','III',0,0,1,'2024-03-01 11:34:00','2024-03-01 11:34:00'),(30,'Derecho Tributario','Theory','III',0,0,1,'2024-03-01 11:34:13','2024-03-01 11:34:13'),(31,'Informatica II','Theory','III',0,0,1,'2024-03-01 11:34:24','2024-03-01 11:34:24'),(32,'Practicas Empresariales','Theory','III',0,0,1,'2024-03-01 11:34:37','2024-03-01 11:34:37'),(33,'Presupuesto','Theory','III',0,0,1,'2024-03-01 11:34:48','2024-03-01 11:34:48'),(34,'Proyecto I','Theory','III',0,0,1,'2024-03-01 11:34:59','2024-03-01 11:34:59'),(35,'Auditoria','Theory','IV',0,0,1,'2024-03-01 11:35:18','2024-03-01 11:35:18'),(36,'Contabilidad IV','Theory','IV',0,0,1,'2024-03-01 11:35:31','2024-03-01 11:35:31'),(37,'Derecho Tributario II','Theory','IV',0,0,1,'2024-03-01 11:35:45','2024-03-01 11:35:45'),(38,'Informatica III','Practical','IV',0,0,1,'2024-03-01 11:36:04','2024-03-01 11:36:04'),(39,'Proyecto de grado','Practical','IV',0,0,1,'2024-03-01 11:36:18','2024-03-01 11:36:18'),(40,'Ingles I','Theory','I',0,0,1,'2024-03-01 11:37:11','2024-03-01 11:37:11'),(41,'Ingles II','Theory',NULL,0,0,1,'2024-06-09 15:58:22','2024-06-09 15:58:22'),(42,'Contabilidad III','Theory',NULL,0,0,1,'2024-09-11 21:02:04','2024-09-11 21:02:04'),(43,'Administracion Financiera','Theory',NULL,0,0,1,'2024-09-11 21:02:24','2024-09-11 21:02:24'),(44,'Administracion II Y III','Theory','I',0,0,1,'2024-09-11 21:02:37','2024-09-11 21:02:45'),(45,'Finanzas I','Theory',NULL,0,0,1,'2024-09-11 22:13:34','2024-09-11 22:13:34'),(46,'Gestion Financiera','Theory',NULL,0,0,1,'2024-09-11 22:14:39','2024-09-11 22:14:39'),(47,'Etica Empresarial','Theory',NULL,0,0,1,'2024-09-11 22:27:27','2024-09-11 22:27:27');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `document_type` enum('CEDULA','TI','REGISTRO_CIVIL','PASAPORTE','OTRO') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `headquarter_id` int(11) DEFAULT NULL,
  `journey_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `social_stratum` int(11) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `eps` varchar(50) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `permanent_address` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `work_experiencie` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT 3 COMMENT '0: pre-registered, 1, admin, 3:student , 2:teacher, 4:parent, 5: coordinator, 6:visitante',
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0, no eliminado, 1: eliminado',
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`parent_id`,`name`,`last_name`,`document_type`,`email`,`email_verified_at`,`password`,`remember_token`,`admission_number`,`roll_number`,`class_id`,`headquarter_id`,`journey_id`,`gender`,`date_of_birth`,`caste`,`religion`,`social_stratum`,`mobile_number`,`admission_date`,`profile_pic`,`blood_group`,`eps`,`height`,`weight`,`address`,`occupation`,`marital_status`,`permanent_address`,`qualification`,`work_experiencie`,`notes`,`user_type`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,NULL,'Jerson Batista Vega','batista','CEDULA','ingjerson2014@gmail.com','2023-12-03 10:11:02','$2y$12$N6UMi3P79UUaPyC.LnALJOD3jiWZ8cAaRsrAnd6lQ74iGigPfGu7S','HMtWLokuNDkvsrhGjFJAsYuZpxe6R186kuMiCnuv52BHjaHg3bLtPvOFB78o',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20240618124924h1svjyh2uuemr510rx1x.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-03 10:11:10','2024-10-18 13:34:01'),(2,NULL,'student','',NULL,'student@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','6AhJK4foGDkX4ZE4wKTdOY4lfCqzQ86xFuBcTKcnPh08hecezEkD7Y5S00t3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-04 01:41:19','2024-01-02 11:02:07'),(3,NULL,'Pedro','Vezquez','CEDULA','teacher@gmail.com',NULL,'$2y$12$oZJ1uuqblfPbpkwG8TQaWeMYW5Dh536bBMEFLo6C3ZAPMGkaEuqGS','DOHcWOXhJoZrGfrfsFGKWFQ90L3ERDxZw9xA61IY7hXexBR2BaNGl6kM9nAG','','767887',NULL,NULL,NULL,'Male','2024-01-03','lorem ipsum','lorem ipsum',1,'lorem ipsum','2024-01-04','20240104074857y5jco07jcnqgdijk9lxf.jpg','O+','',NULL,NULL,'test','Ingeniero','casado','test',NULL,'test','test',2,0,0,'2023-12-04 01:42:25','2024-09-25 17:16:09'),(4,NULL,'school','lorem ipsum','CEDULA','scholl@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','ZSZbolcNeCcu2vS1OOyMYlmtL9oNvTPSzTFa8lI1JpTWV1pRQFjYHBWMSN5h',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'El carmen de bolivar','Ingeniero',NULL,'lorem ipsum',NULL,'lorem ipsum','lorem ipsum',5,1,0,'2023-12-04 01:43:13','2024-09-18 20:04:33'),(5,NULL,'parent','vega','CEDULA','parent@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','N9A8bxzxDTTk7kpp0qr4VwFi6VZBaRfaMHa1k77jJOQhnc2ckzRTTXjF62xM',NULL,'45345345',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'988978989',NULL,NULL,NULL,NULL,NULL,'6','CARMEN DE BOLIVAR','INDEPENDIENTE',NULL,NULL,NULL,NULL,NULL,4,1,0,'2023-12-04 01:43:40','2024-01-05 16:59:42'),(6,NULL,'prueba','',NULL,'prueba@gmail.com',NULL,'$2y$12$w4TeF8qxs6Zvi0YirqkWN.yXRlYGUeGOxnq86JX31ufFf7jqEn45i',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-07 07:06:57','2024-01-02 11:01:15'),(7,NULL,'prueba222','',NULL,'prueba22222@gmail.com',NULL,'$2y$12$Dt7H7SicqF7RmvSEZKAdaercl9nR2BCaFmERR3E7o9sgp1k0jghqe','QQTwjxOef5j1DCfu2nzTQXeHuran4uzTuXjOUaHbmWFd64qT9pVbcG1XwfNd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,'2023-12-07 07:18:19','2023-12-07 11:55:30'),(8,NULL,'eliminame','',NULL,'eliminame@gmail.com',NULL,'$2y$12$/.ziljuXErQQHWwhOeh/A.VKta6SZQ5C0U1rTqWbdvebb5iHVWQZa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,'2023-12-07 11:53:23','2023-12-07 11:53:29'),(9,NULL,'pruebas 3','',NULL,'sistemas_pruebas@gmail.com',NULL,'$2y$12$zoEYT6ExcaoTOQUXMCkJguRGakB6ZuYBsOnKtcqH7qKvNVFflq/cG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-07 12:20:22','2023-12-07 12:20:22'),(10,NULL,'juan pedro','',NULL,'juanito2333333@gmail.com',NULL,'$2y$12$pxH7VK/IVrJmJkwuwinJCe04WjjuDOyHGzIusM7m/qu1mO7QBf.12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20240617115045u5qguxc8fqp5wxwcieqv.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-10 12:54:11','2024-06-17 16:50:45'),(13,NULL,'juanito','Batista',NULL,'juanito021@gmail.com',NULL,'$2y$12$BTZsCZFCjeQDrn15YxMRQuTPD0CQhElZ8wpSZbGlN7xg.rbI4VVDC',NULL,'6756','78',12,2,1,'Male','2023-12-31','raizal',NULL,3,'6756756767','2023-12-31','20231231102210uofehecbr4tjxnvwligm.jpg','','MUTUAL',NULL,'77',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-31 16:22:10','2024-01-02 11:22:02'),(16,NULL,'Jerson Batista','Hernandez Torres','CEDULA','sistemas_pruebas777@gmail.com',NULL,'$2y$12$SIJdpgXxNvfGPDiptN43T.Es4FXp3yNPaCzm.gYdN7e6fIl0J3UYO','osKLjInLfFgut8FANbK17oJEjLI7KqA68Atnw8GiHsY9kqj5zk4MeymSD1iP',NULL,'677777777777777777',NULL,NULL,NULL,'Male',NULL,NULL,NULL,NULL,'6756756767',NULL,'20240105111113yqaahya2yuzvzk40enps.jpg','O+','test',NULL,NULL,'EL CARMEN DE BOLIVAR','independiente',NULL,NULL,NULL,NULL,NULL,4,0,0,'2024-01-03 11:24:43','2024-02-13 06:55:49'),(19,NULL,'juan','Hernandez Torres','CEDULA','test@gmail.com',NULL,'$2y$12$/fCr2lcncwuIG.ZiXuE4p.g0FKfmY9h/6fTgAoPjdIPWC5IKl9JZi',NULL,'','10473987447',NULL,NULL,NULL,'Male','2024-01-04',NULL,NULL,NULL,'6756756767','2024-01-04','202401040721363glczsylqeldmb3su6wv.jpg',NULL,NULL,NULL,NULL,'test','independiente','casado','test',NULL,'test','test testtesttesttesttest',2,1,0,'2024-01-04 13:21:36','2024-01-04 13:24:05'),(20,NULL,'juan pedro','Batista VEGA','CEDULA','gmai@gmail.com',NULL,'$2y$12$gNLRKpcIjjdgQIngz4HHYOrrwg2StVEORfS9OmaAiovSV16ZYaNhm',NULL,'','78999',NULL,NULL,NULL,'Male','2024-01-04',NULL,NULL,NULL,'6756756767','2024-01-04',NULL,'O-','MUTUAL',NULL,NULL,'el carmen de bolivar','independiente','casado','test',NULL,'test','test',2,0,1,'2024-01-04 13:55:16','2024-01-04 14:47:51'),(22,NULL,'Alcira','Batista VEGA','CEDULA','alcira2023@gmail.com',NULL,'$2y$12$g3A1anNezuVEvh5zi96HkOHul2BnKMPdNdjqj0evEJ0gJVtAbsTZa','deemgLAEYMWb9S5Bepjm64fr4ksZ35wj0zQQFSWOudTGRd8OlFZ7mJ55XFUx','','8678678676',NULL,NULL,NULL,'Female','2024-01-08',NULL,NULL,NULL,'6756756767','2024-01-08',NULL,'O+','MUTUAL',NULL,NULL,'test','independiente','casado','test',NULL,'test','test',2,0,0,'2024-01-08 15:23:49','2024-09-05 16:31:21'),(23,NULL,'Elizabeth','Vega Batista','CEDULA','elizabeth@gmail.com',NULL,'$2y$12$uabr5qOlAZrVz1/M4ai4.ua37tBUNvpjj2b5tRUTSy3hOAmw8OXbq','isjGsYyIuYQujLtZlLqCrejtU03nuPuZC5hq4FEboDkpjWt374tm0uhQRLVw','','45879555',NULL,NULL,NULL,'Female','2023-06-02',NULL,NULL,NULL,'6756756767','2024-01-05',NULL,'O+','MUTUAL',NULL,NULL,'test','independiente','casado','test',NULL,'test','test',2,0,0,'2024-01-10 09:51:20','2024-01-11 10:48:47'),(24,NULL,'Endry Manuel','Pájaro  Bolaño','TI','endryepbg@gmail.com',NULL,'$2y$12$rgC3QnizNkGQtFVc4CZNRORk6PVtQ8SDqiFjz2.8bVelufKc.mS/K',NULL,'1047513331','1047513331',11,3,2,'Male','2000-02-25','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:38:04','2024-09-11 21:38:04'),(25,NULL,'Adriana','Guerrero Camargo','CEDULA','adrianaguerrerocamargo@gmail.com',NULL,'$2y$12$PGoYuSuXhbjmXb9EhMUCL.893D1KcKn7QhC1iU1gPZAH8ujibRX/i',NULL,'1048933414','1048933414',12,3,2,'Female','2001-05-21','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:48:56','2024-09-11 21:48:56'),(26,NULL,'Victor Manuel','Torres Marrugo','CEDULA','torresmarrugov@gmail.com',NULL,'$2y$12$.efi0Y6V/JaSDfPXfnbe1.BKOOENvrjA26m4V4BuFMIms28ralBTq',NULL,'1048942797','1048942797',12,3,2,'Male','2000-10-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:50:51','2024-09-11 21:50:51'),(27,NULL,'Eder Luis','Herrera Ospino','TI','ederherreraospino@gmail.com',NULL,'$2y$12$./3/bpwFgMJuOFoYW0o7degAY3uMWG9sjn052wWwkQdH3B4AoQ2mC',NULL,'1045306866','1045306866',12,3,2,'Male','2003-10-28','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:52:38','2024-09-11 21:52:38'),(28,NULL,'Natasha','Torres Rodelo','CEDULA','sinemail@gmail.com',NULL,'$2y$12$9t/5PPlHl1V/gCCvF0crgu5iR5oe1qA1pU43EyNFPSh12lZOoE8Vy',NULL,'1048936899','1048936899',12,3,2,'Female','2000-02-10','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:55:11','2024-09-11 21:55:11'),(29,NULL,'Aris Manuel','Esalas Cantillo','CEDULA','asmec31@hotmail.com',NULL,'$2y$12$4qaxrg/RRYODYD/nPie.3OIB/MWYYxj2orNiopmwiTIOyAu4ktQs6',NULL,'73508422','73508422',12,3,2,'Male','1985-02-25','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:56:43','2024-09-12 12:54:52'),(30,NULL,'Erika Maria','Machado Sarabia','CEDULA','erikamariamachado10@gmail.com',NULL,'$2y$12$TCrMzoql2xk.teZrFYgKx.L15WDxXwoJwUYoKmbOChRscsQbJpavS',NULL,'1038933904','1038933904',12,3,2,'Male','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:58:04','2024-09-18 22:17:17'),(31,NULL,'Andres Armando','Agamez Martelo','CEDULA','andresagamez3@gmail.com',NULL,'$2y$12$LIiPl8pZNWOQaUYSqp3aUObJHfm4oP7hyCCCTnC1Cu7ya8HPJDS2a',NULL,'1048941750','1048941750',12,3,2,'Male','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 21:59:54','2024-09-25 17:27:00'),(32,NULL,'Luis','Antonio Blanco','CEDULA','luisantonioblanco0601@gmail.com',NULL,'$2y$12$vaBm7g5.U291ODYcGSbque9OHtBHja8A.dIjfzaKeP4wk/2GKKiDy',NULL,'1341427','1341427',11,3,2,'Male','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 22:00:59','2024-09-11 22:00:59'),(33,NULL,'Yulieth Paola','Guardo Lopez','CEDULA','yuliethpaola@gmail.com',NULL,'$2y$12$bDy3OQ51/rFMiGImg10ToecIZ3maPEWvzdQU/S4rRSMXQOgUboeMi',NULL,'1048937063','1048937063',12,3,2,'Male','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 22:02:37','2024-09-11 22:02:37'),(34,NULL,'Leidys del Carmen','Altahona Ospino','CEDULA','altahonaospinoleidysdelcarmen@gmail.com',NULL,'$2y$12$JevDWyp1xhEMHDlo1sL4C.pj9IYw.RjIPPIzcV4c0UKt8haG/T/Fe',NULL,'1048933006','1048933006',12,3,2,'Female','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 22:03:33','2024-09-11 22:03:33'),(35,NULL,'Pedro Luis','Polo Cervantes','CEDULA','ppolocervantes@gmail.com',NULL,'$2y$12$zqlc0KPdHWr1DEoUpx2h6OJKvociI.zgdf6yLtJ1SQFn5wYqmvKJa',NULL,'100002333','100002333',11,3,2,'Male','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-11 22:31:04','2024-09-11 22:31:04'),(36,NULL,'Dayana','Pantoja Mendoza','CEDULA','dayanapaolapantojamendoza@gmail.com',NULL,'$2y$12$xJIAaNh1wuj607MqHm9ppe/q5SEKF4.LgoVvXfFEFlrvjCQlNpNJS',NULL,'1048933888','1048933888',12,3,2,'Female','2024-09-11','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-12 00:58:52','2024-09-12 00:58:52'),(37,NULL,'Carlos Mario','Navarro Martinez','CEDULA','carlosmarionavarromartinez@gmail.com',NULL,'$2y$12$IZmoTgSiluBPVZdk55iTS.bnzIQbf6jgQ0FJ7wly9joRNTPGipQ5.',NULL,'1048934596','1048934596',11,3,5,'Male','2024-09-12','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-12 12:41:45','2024-09-12 12:41:45'),(38,NULL,'Juan David','Ramirez Beltran','CEDULA','ramirezbeltranjuandavid279@gmail.com',NULL,'$2y$12$86U5/0yVQMIrX6hib6ffb.bOlpcQcwIoz9ocE0lV4udDY1AumtZka',NULL,'1048933256','1048933256',11,3,2,'Male','2024-09-12','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-12 12:43:23','2024-09-12 12:43:23'),(39,NULL,'Kelly Jhoana','Acosta Santana','CEDULA','acostakelly2014@gmail.com',NULL,'$2y$12$qDttN6QYEOQkDpHvHOHgF.ZeSVwfY.n3AQHq97hdIveyLT2kEveui',NULL,'1048939244','1048939244',11,3,2,'Female','2024-09-12','','',1,'','2024-09-11',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-12 12:45:25','2024-09-12 12:45:25'),(40,NULL,'Jair','Fernandez','CEDULA','jair@gmail.com',NULL,'$2y$12$eqPWi6gOepZsUsyUrsl.EOrI3SexzW5Srn5eCRpCLHR5w23zGo2..',NULL,NULL,'5645645645',NULL,NULL,NULL,'Male',NULL,NULL,NULL,NULL,'5456666777',NULL,NULL,'o','no',NULL,NULL,'El Carmen de Bolivar','no',NULL,NULL,NULL,NULL,NULL,5,0,0,'2024-09-18 16:24:52','2024-09-18 21:10:58'),(41,NULL,'ELIMINAR','batista','CEDULA','eliminane@gmail.com',NULL,'$2y$12$m2h.8SAShMREhKrVMnI5OeIHXVfHt.evP4waKnaT3cjm2ezwwpjYK',NULL,'0236555555','0236555555',16,3,5,'Male','2024-09-18','','',1,'','2024-09-18',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2024-09-18 16:29:41','2024-09-18 16:30:16'),(42,NULL,'JUANES','VEGA',NULL,'juanes@gmail.com',NULL,'$2y$12$FR/Jkm2buAiFgaktxZQE6OPF6FTk3cNDuHjepvHyXPW8jN.b4tk.i',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,0,0,'2024-09-18 19:46:14','2024-09-18 19:46:14'),(43,NULL,'test','batista','CEDULA','dekolac6121111@obisims.com',NULL,'$2y$12$0tvgeI3sxNuYZ2vX2W.MDOTLmDzvEksJc8D8AzBEYJ/M1A.fkJdKm',NULL,NULL,'645645645',NULL,NULL,NULL,'Male',NULL,NULL,NULL,NULL,'5456666666',NULL,NULL,'','no',NULL,NULL,'kra 45','no',NULL,NULL,NULL,NULL,NULL,5,1,0,'2024-09-18 19:54:24','2024-09-18 20:04:29'),(44,NULL,'test','batista','CEDULA','test023@gmail.com',NULL,'$2y$12$nbaY1U2EJSapC0gCkn4k0OGrnV3VmJEWPUYoHSAB/FPEVbgoL41m6',NULL,'564545465','564545465',13,3,5,'Male','2024-09-18','no','no',1,'6756756','2024-09-18',NULL,'o','no','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2024-09-18 20:09:34','2024-09-18 20:31:46'),(45,NULL,'test','batista','CEDULA','lesogi1630@jofuso.com',NULL,'$2y$12$JDW6cReYtic5azcMEicSK./.WixVvk5d0CZTNLVc33YdFTk5YJCkS',NULL,'645456456','645456456',16,1,2,'Male','2024-09-23','no','no',1,'5456','2024-09-23',NULL,'o','no','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-23 13:14:05','2024-09-23 13:14:05'),(46,NULL,'Rosmery Carolina','Torrealba Torrealba','PASAPORTE','torrealbatorrealbarosmerycarol@gmail.com',NULL,'$2y$12$HfWIKuC.BpgXncKRlzddxuh1lwqFIEiRNpMiUOEt.O.LYi8RsAGQC',NULL,'6835185','6835185',11,3,6,'Female','1995-06-13','no','no',1,'','2024-09-30',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-09-30 18:48:34','2024-09-30 18:50:37'),(48,NULL,'ELIMINAR','Pájaro  Bolaño','CEDULA','jerson13455@gmail.com',NULL,'$2y$12$O96/L.zKDfuT.4gr4PTRxuB3yanKk/SC2ML6//OUdQtaYcuMTuS92',NULL,'10000000','10000000',19,3,5,'Male','2024-10-15','no','no',1,'5456','2024-10-15',NULL,'o','no','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-10-15 18:26:15','2024-10-15 18:26:15');

/*Table structure for table `week` */

DROP TABLE IF EXISTS `week`;

CREATE TABLE `week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `fullcalendar_day` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `week` */

insert  into `week`(`id`,`name`,`fullcalendar_day`,`created_at`,`updated_at`) values (1,'Lunes',1,'2024-01-11 14:39:18','2024-01-11 14:39:19'),(2,'Martes',2,'2024-01-11 14:40:18','2024-01-11 14:40:19'),(3,'Miercoles',3,'2024-01-11 14:40:38','2024-01-11 14:40:39'),(4,'Jueves',4,'2024-01-11 14:40:51','2024-01-11 14:40:52'),(5,'Viernes',5,'2024-01-11 14:41:03','2024-01-11 14:41:04'),(6,'Sabado',6,'2024-01-11 14:41:14','2024-01-11 14:41:15'),(7,'Domingo',7,'2024-01-11 14:41:28','2024-01-11 14:41:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
