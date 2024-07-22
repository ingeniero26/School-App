/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - larabooks
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`larabooks` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `larabooks`;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `assign_class_teacher` */

insert  into `assign_class_teacher`(`id`,`class_id`,`teacher_id`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (19,12,3,0,0,1,'2024-03-07 01:09:23','2024-03-07 01:09:23');

/*Table structure for table `class` */

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0,no, 1:si',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `class` */

insert  into `class`(`id`,`name`,`amount`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (11,'Auxiliar Contable',450000,0,0,1,'2024-03-01 17:28:04','2024-04-28 17:01:09'),(12,'Auxiliar Administrativo',450000,0,0,1,'2024-03-01 17:28:16','2024-04-28 17:01:18'),(13,'Caja Registradora',350000,0,0,1,'2024-03-01 17:28:32','2024-04-28 17:00:46'),(14,'Mercadeo  y Ventas',500000,0,0,1,'2024-03-01 17:28:45','2024-04-28 17:00:24'),(15,'Auxiliar de Enfermeria',500000,0,0,1,'2024-03-01 17:29:04','2024-04-28 17:08:17'),(16,'Ingles',450000,0,0,1,'2024-03-01 17:29:13','2024-04-28 17:08:00'),(17,'Mecanica de Motos',350000,0,0,1,'2024-04-28 16:59:36','2024-04-28 17:07:49'),(18,'Auxiliar Psicología infantil',450000,0,0,1,'2024-06-09 22:59:22','2024-06-09 22:59:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `class_subject` */

insert  into `class_subject`(`id`,`class_id`,`exam_id`,`subject_id`,`headquarter_id`,`created_by`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,12,6,16,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(2,12,6,17,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(3,12,6,18,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(4,12,6,19,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(5,12,6,20,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(6,12,6,21,3,1,0,0,'2024-04-07 18:03:07','2024-04-07 18:03:07'),(7,12,4,22,3,1,0,0,'2024-04-07 18:04:45','2024-04-07 18:04:45'),(8,12,4,23,3,1,0,0,'2024-04-07 18:04:45','2024-04-07 18:04:45'),(9,12,4,24,3,1,0,0,'2024-04-07 18:04:45','2024-04-07 18:04:45'),(10,12,4,25,3,1,0,0,'2024-04-07 18:04:45','2024-04-07 18:04:45'),(11,12,4,26,3,1,0,0,'2024-04-07 18:04:45','2024-04-07 18:04:45'),(12,12,4,27,3,1,0,0,'2024-04-07 18:04:46','2024-04-07 18:04:46'),(13,12,3,28,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(14,12,3,29,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(15,12,3,30,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(16,12,3,31,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(17,12,3,32,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(18,12,3,33,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(19,12,3,34,3,1,0,0,'2024-04-07 18:06:35','2024-04-07 18:06:35'),(20,12,2,35,3,1,0,0,'2024-04-07 18:07:52','2024-04-07 18:07:52'),(21,12,2,36,3,1,0,0,'2024-04-07 18:07:52','2024-04-07 18:07:52'),(22,12,2,37,3,1,0,0,'2024-04-07 18:07:52','2024-04-07 18:07:52'),(23,12,2,38,3,1,0,0,'2024-04-07 18:07:52','2024-04-07 18:07:52'),(24,12,2,39,3,1,0,0,'2024-04-07 18:07:52','2024-04-07 18:07:52'),(25,11,6,16,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(26,11,6,17,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(27,11,6,18,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(28,11,6,19,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(29,11,6,20,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(30,11,6,21,3,1,0,0,'2024-04-07 18:09:45','2024-04-07 18:09:45'),(31,11,4,22,3,1,0,0,'2024-04-07 18:11:28','2024-04-07 18:11:28'),(32,11,4,23,3,1,0,0,'2024-04-07 18:11:29','2024-04-07 18:11:29'),(33,11,4,24,3,1,0,0,'2024-04-07 18:11:29','2024-04-07 18:11:29'),(34,11,4,25,3,1,0,0,'2024-04-07 18:11:29','2024-04-07 18:11:29'),(35,11,4,26,3,1,0,0,'2024-04-07 18:11:29','2024-04-07 18:11:29'),(36,11,4,27,3,1,0,0,'2024-04-07 18:11:29','2024-04-07 18:11:29'),(37,11,3,28,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(38,11,3,29,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(39,11,3,30,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(40,11,3,31,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(41,11,3,32,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(42,11,3,33,3,1,0,0,'2024-04-07 18:12:15','2024-04-07 18:12:15'),(43,11,3,34,3,1,0,0,'2024-04-07 18:12:16','2024-04-07 18:12:16'),(44,11,2,35,3,1,0,0,'2024-04-07 18:13:13','2024-04-07 18:13:13'),(45,11,2,36,3,1,0,0,'2024-04-07 18:13:13','2024-04-07 18:13:13'),(46,11,2,37,3,1,0,0,'2024-04-07 18:13:13','2024-04-07 18:13:13'),(47,11,2,38,3,1,0,0,'2024-04-07 18:13:13','2024-04-07 18:13:13'),(48,11,2,39,3,1,0,0,'2024-04-07 18:13:13','2024-04-07 18:13:13');

/*Table structure for table `class_subject_timetable` */

DROP TABLE IF EXISTS `class_subject_timetable`;

CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `class_subject_timetable` */

insert  into `class_subject_timetable`(`id`,`class_id`,`subject_id`,`week_id`,`start_time`,`end_time`,`room_number`,`created_at`,`updated_at`) values (72,12,20,6,'08:00','08:00','2','2024-03-01 18:33:37','2024-03-01 18:33:37');

/*Table structure for table `exam` */

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exam` */

insert  into `exam`(`id`,`name`,`note`,`created_by`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,'Quinto Ciclo 2024','Ciclo No 5 Semestre 1',1,0,0,'2024-01-31 13:47:13','2024-02-29 18:43:19'),(2,'Cuarto Semestre','Ciclo No 4 Semestre 1',1,0,0,'2024-02-02 17:41:00','2024-03-01 17:16:05'),(3,'Tercer Semestre','Ciclo N3 -Semestre I',1,0,0,'2024-02-02 18:54:47','2024-03-01 17:15:54'),(4,'Segundo Semestre','Ciclo No 2  Primer Semestre',1,0,0,'2024-02-02 22:50:21','2024-03-01 17:15:41'),(5,'eliminame','eliminame',1,1,0,'2024-02-02 22:50:43','2024-02-02 23:04:54'),(6,'Primer Semestre','Ciclo No -Semestre I',1,0,0,'2024-02-12 13:17:34','2024-03-01 17:15:28');

/*Table structure for table `exam_schedule` */

DROP TABLE IF EXISTS `exam_schedule`;

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_marks` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passing_mark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exam_schedule` */

insert  into `exam_schedule`(`id`,`exam_id`,`class_id`,`subject_id`,`exam_date`,`start_time`,`end_time`,`room_number`,`full_marks`,`passing_mark`,`created_by`,`created_at`,`updated_at`) values (88,6,12,21,'2024-06-15','08:00','13:38','2','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(89,6,12,20,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(90,6,12,19,'2024-06-15','08:00','13:37','10','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(91,6,12,18,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(92,6,12,17,'2024-06-23','08:00','13:00','10','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(93,6,12,16,'2024-06-29','08:00','13:00','10','100','60',1,'2024-03-01 18:38:31','2024-03-01 18:38:31'),(98,4,12,27,'2024-05-18','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52'),(99,4,12,26,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52'),(100,4,12,25,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52'),(101,4,12,24,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52'),(102,4,12,23,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52'),(103,4,12,22,'2024-06-15','08:00','13:00','10','100','60',1,'2024-03-01 18:43:52','2024-03-01 18:43:52');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `headquarters` */

DROP TABLE IF EXISTS `headquarters`;

CREATE TABLE `headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `headquarters` */

insert  into `headquarters`(`id`,`name`,`address`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'SEDE PRINCIPAL','EL CARMEN DE BOLIVAR',0,0,1,'2023-12-30 16:45:13','2023-12-30 16:45:13'),(2,'SEDE DOS','SAN JACINTO BOLIVAR',0,0,1,'2023-12-30 17:09:00','2023-12-30 17:16:43'),(3,'Mahates','Municipio de Mahates Bolivar',0,0,1,'2024-01-09 14:30:47','2024-01-09 14:34:50');

/*Table structure for table `homework` */

DROP TABLE IF EXISTS `homework`;

CREATE TABLE `homework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `document_file` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `homework` */

insert  into `homework`(`id`,`class_id`,`subject_id`,`homework_date`,`submission_date`,`document_file`,`description`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,12,20,'2024-03-30','2024-04-06',NULL,'prueba de tarea',1,1,'2024-03-30 15:11:06','2024-03-30 17:50:29'),(2,12,20,'2024-03-31','2024-04-07','202403300316192pu4mukjfd3wdbig1tzv.pdf','&nbsp;testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',0,1,'2024-03-30 15:16:19','2024-03-31 19:16:39'),(3,11,21,'2024-03-31','2024-04-07','20240331071902imbbqlqkij4rfglyl95a.pdf','testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',0,1,'2024-03-31 19:19:02','2024-03-31 19:19:02'),(4,12,31,'2024-04-01','2024-04-09','202404010402499bipzgoflaigmt2irsfs.pdf','test&nbsp;',0,1,'2024-04-01 16:02:49','2024-04-01 16:18:59'),(5,12,27,'2024-04-05','2024-04-06','20240405110722lmnfyinb6lz1kxslckxe.pdf','test&nbsp;',0,3,'2024-04-05 18:35:41','2024-04-05 23:07:22'),(6,12,19,'2024-04-05','2024-04-06',NULL,'test',1,3,'2024-04-05 18:37:08','2024-04-05 22:53:06'),(7,12,25,'2024-04-05','2024-04-12',NULL,'Taller 01',1,3,'2024-04-05 22:42:07','2024-04-05 22:53:01');

/*Table structure for table `homework_submit` */

DROP TABLE IF EXISTS `homework_submit`;

CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `document_file` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `homework_submit` */

insert  into `homework_submit`(`id`,`homework_id`,`student_id`,`description`,`document_file`,`created_at`,`updated_at`) values (1,4,21,'test de repuesta de tarea','20240407102521wi22bkxjfwfv5ocdn11h.pdf','2024-04-07 22:25:21','2024-04-07 22:25:21'),(2,4,21,'test','20240407102812mgsvkejjqvon6blmzrvn.pdf','2024-04-07 22:28:12','2024-04-07 22:28:12'),(3,2,21,'test&nbsp;','20240407110248wxbthcj64xqd8151swsw.pdf','2024-04-07 23:02:48','2024-04-07 23:02:48'),(4,5,21,'test','20240407110321fry4cspgryibhcthynze.pdf','2024-04-07 23:03:21','2024-04-07 23:03:21'),(5,2,14,'test','20240616122916haignhiwdnvnfwbpo2su.docx','2024-06-16 00:29:16','2024-06-16 00:29:16');

/*Table structure for table `journeys` */

DROP TABLE IF EXISTS `journeys`;

CREATE TABLE `journeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `journeys` */

insert  into `journeys`(`id`,`name`,`abbreviation`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'Lunes Mañana','LM',0,0,1,'2023-12-14 14:19:51','2023-12-14 14:19:51'),(2,'Sabado Tarde','ST',0,0,1,'2023-12-14 18:37:17','2023-12-14 18:37:17'),(3,'eliminar antes editar',NULL,0,1,1,'2023-12-14 18:37:29','2023-12-14 18:37:46'),(4,'Viernes Mañana','VM',0,0,1,'2023-12-15 01:03:03','2023-12-15 01:06:05'),(5,'Domingo Mañana','DM',0,0,1,'2023-12-31 18:52:15','2023-12-31 18:52:15');

/*Table structure for table `marks_grade` */

DROP TABLE IF EXISTS `marks_grade`;

CREATE TABLE `marks_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent_from` int(11) DEFAULT NULL,
  `percent_to` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `marks_grade` */

insert  into `marks_grade`(`id`,`name`,`percent_from`,`percent_to`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (1,'A',90,100,0,1,'2024-03-05 18:28:44','2024-03-06 23:49:12'),(2,'B',80,89,0,1,'2024-03-05 18:30:07','2024-03-06 23:49:28'),(3,'C',70,79,0,1,'2024-03-05 21:12:07','2024-03-06 23:49:40'),(4,'nombre',50,50,1,1,'2024-03-06 16:39:20','2024-03-06 16:39:23'),(5,'D',60,69,0,1,'2024-03-06 16:53:39','2024-03-06 23:50:03'),(6,'E',50,59,0,1,'2024-03-06 23:50:32','2024-03-06 23:50:32'),(7,'F',0,58,0,1,'2024-03-06 23:50:56','2024-03-06 23:50:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `marks_register` */

insert  into `marks_register`(`id`,`student_id`,`exam_id`,`class_id`,`subject_id`,`class_work`,`home_work`,`test_work`,`exam`,`full_marks`,`passing_mark`,`created_by`,`created_at`,`updated_at`) values (30,21,6,12,21,20,20,20,20,100,60,1,'2024-03-02 02:41:55','2024-03-02 02:42:56'),(31,21,6,12,20,20,20,20,20,100,60,1,'2024-03-02 02:42:00','2024-03-02 03:00:09'),(32,21,6,12,19,10,20,20,20,100,60,1,'2024-03-02 02:42:00','2024-03-06 17:45:41'),(33,21,6,12,18,15,20,10,20,100,60,1,'2024-03-02 02:42:00','2024-03-06 17:45:41'),(34,21,6,12,17,10,20,20,20,100,60,1,'2024-03-02 02:42:00','2024-03-06 17:45:41'),(35,21,6,12,16,20,20,20,20,100,60,1,'2024-03-02 02:42:01','2024-03-06 17:45:41'),(36,21,4,12,27,20,15,20,20,100,60,1,'2024-03-04 16:55:10','2024-03-04 16:55:10'),(37,21,4,12,26,20,10,20,20,100,60,1,'2024-03-04 16:55:12','2024-03-04 16:55:12'),(38,21,4,12,25,20,20,20,20,100,60,1,'2024-03-04 16:55:12','2024-03-04 18:08:22'),(39,21,4,12,24,15,20,20,20,100,60,1,'2024-03-04 16:55:12','2024-03-04 18:08:22'),(40,21,4,12,23,20,20,20,10,100,60,1,'2024-03-04 16:55:12','2024-03-04 18:08:23'),(41,21,4,12,22,20,20,15,20,100,60,1,'2024-03-04 16:55:12','2024-03-04 18:08:23'),(42,17,6,12,16,5,5,5,5,100,60,1,'2024-03-06 23:51:38','2024-03-06 23:51:41'),(43,17,6,12,21,0,0,0,0,100,60,1,'2024-03-06 23:51:41','2024-03-06 23:51:41'),(44,17,6,12,20,0,0,0,0,100,60,1,'2024-03-06 23:51:41','2024-03-06 23:51:41'),(45,17,6,12,19,0,0,0,0,100,60,1,'2024-03-06 23:51:41','2024-03-06 23:51:41'),(46,17,6,12,18,0,0,0,0,100,60,1,'2024-03-06 23:51:41','2024-03-06 23:51:41'),(47,17,6,12,17,0,0,0,0,100,60,1,'2024-03-06 23:51:41','2024-03-06 23:51:41');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `notice_board` */

DROP TABLE IF EXISTS `notice_board`;

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `notice_board` */

insert  into `notice_board`(`id`,`title`,`notice_date`,`publish_date`,`message`,`created_by`,`created_at`,`updated_at`) values (2,'test','2024-03-21','2024-03-21','lorem Ipsum  lorem Ipsum lorem Ipsum lorem Ipsum',1,'2024-03-21 19:28:46','2024-03-25 22:43:11'),(6,'prueba editada','2024-03-25','2024-03-25','esto es una prueba editada',1,'2024-03-21 22:20:46','2024-03-25 22:29:50'),(7,'test','2024-03-21','2024-03-21','test',1,'2024-03-21 22:48:13','2024-03-21 22:48:13'),(8,'Taller contabilidad 1','2024-03-22','2024-03-21','Realizar taller No 1',1,'2024-03-21 22:57:43','2024-03-21 22:57:43');

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

insert  into `notice_board_message`(`id`,`notice_board_id`,`message_to`,`created_at`,`updated_at`) values (3,7,3,'2024-03-21 22:48:13','2024-03-21 22:48:13'),(4,7,4,'2024-03-21 22:48:14','2024-03-21 22:48:14'),(5,7,2,'2024-03-21 22:48:14','2024-03-21 22:48:14'),(6,8,3,'2024-03-21 22:57:44','2024-03-21 22:57:44'),(7,8,4,'2024-03-21 22:57:44','2024-03-21 22:57:44'),(8,6,4,'2024-03-25 22:29:52','2024-03-25 22:29:52'),(9,2,3,'2024-03-25 22:43:11','2024-03-25 22:43:11'),(10,2,2,'2024-03-25 22:43:11','2024-03-25 22:43:11');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paypal_email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='configuraciones pasarelas de pagos';

/*Data for the table `setting` */

insert  into `setting`(`id`,`paypal_email`,`logo`,`favicon_icon`,`created_at`,`updated_at`) values (1,'ingjerson2014@gmail.com','20240618015847a3iwy6baxdyhqsxsxwdy.png','20240618015847h2p2wfrop1wcidcvrdbj.png','2024-05-28 07:14:34','2024-06-18 01:58:47');

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
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tipo de pagos',
  `remark` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_payment` tinyint(4) DEFAULT 0,
  `payment_data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla para pagos de semestres';

/*Data for the table `student_add_fees` */

insert  into `student_add_fees`(`id`,`student_id`,`class_id`,`total_amount`,`paid_amount`,`remaning_amount`,`payment_date`,`payment_type`,`remark`,`is_payment`,`payment_data`,`created_by`,`created_at`,`updated_at`) values (20,21,11,450000,200000,250000,'2024-05-13 00:00:00','Cash',NULL,1,NULL,1,'2024-05-13 21:14:48','2024-05-13 21:14:48'),(24,21,11,250000,100000,150000,'2024-05-21 00:00:00','Paypal','test',0,NULL,21,'2024-05-21 12:20:50','2024-05-21 12:20:50'),(25,21,11,150000,150000,0,'2024-05-21 00:00:00','Paypal','test',0,NULL,21,'2024-05-21 12:21:38','2024-05-21 12:21:38'),(26,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 01:44:39','2024-06-03 01:44:39'),(27,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 01:45:30','2024-06-03 01:45:30'),(28,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 01:46:44','2024-06-03 01:46:44'),(29,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 01:50:16','2024-06-03 01:50:16'),(30,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal','test',0,NULL,21,'2024-06-03 01:52:39','2024-06-03 01:52:39'),(31,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 01:55:26','2024-06-03 01:55:26'),(32,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 02:03:24','2024-06-03 02:03:24'),(33,21,11,250000,20,249980,'2024-06-02 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-03 02:06:00','2024-06-03 02:06:00'),(34,21,11,250000,20,249980,'2024-06-03 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-04 00:21:22','2024-06-04 00:21:22'),(35,14,12,450000,100000,350000,'2024-06-09 00:00:00','Cash',NULL,1,NULL,1,'2024-06-09 21:42:11','2024-06-09 21:42:11'),(36,14,12,350000,50000,300000,'2024-06-09 00:00:00','Cash',NULL,1,NULL,1,'2024-06-09 22:18:34','2024-06-09 22:18:34'),(37,21,11,250000,100000,150000,'2024-06-09 00:00:00','Cash',NULL,1,NULL,1,'2024-06-09 22:23:36','2024-06-09 22:23:36'),(38,17,12,450000,100000,350000,'2024-06-10 00:00:00','Cash',NULL,1,NULL,1,'2024-06-11 00:22:01','2024-06-11 00:22:01'),(39,15,12,450000,450000,0,'2024-06-10 00:00:00','transfer','pago por nequi',1,NULL,1,'2024-06-11 01:22:08','2024-06-11 01:22:08'),(40,21,11,150000,100000,50000,'2024-06-13 00:00:00','Paypal',NULL,0,NULL,21,'2024-06-14 01:16:59','2024-06-14 01:16:59'),(41,14,12,300000,100000,200000,'2024-06-14 00:00:00','Cash','test',1,NULL,1,'2024-06-15 00:50:28','2024-06-15 00:50:28');

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

insert  into `student_attendance`(`id`,`class_id`,`attendance_date`,`student_id`,`attendance_type`,`created_by`,`created_at`,`updated_at`) values (1,12,'2024-03-11',21,1,1,'2024-03-15 22:44:36','2024-03-15 22:44:36'),(5,12,'2024-03-11',17,3,1,'2024-03-15 22:50:46','2024-03-15 23:37:05'),(6,12,'2024-03-11',15,1,1,'2024-03-15 22:50:49','2024-03-15 22:50:49'),(7,12,'2024-03-11',14,1,1,'2024-03-15 22:50:53','2024-03-15 22:50:53'),(8,12,'2024-03-15',21,3,1,'2024-03-17 17:55:46','2024-03-17 17:55:46'),(9,12,'2024-03-17',21,4,3,'2024-03-18 03:02:11','2024-03-18 16:53:05'),(10,12,'2024-03-17',17,3,3,'2024-03-18 03:02:17','2024-03-18 03:02:17'),(11,12,'2024-03-17',15,3,3,'2024-03-18 03:02:19','2024-03-18 03:02:19'),(12,12,'2024-03-17',14,3,3,'2024-03-18 03:02:22','2024-03-18 03:02:22'),(13,12,'2024-04-03',21,1,3,'2024-04-03 17:13:07','2024-04-03 17:13:07'),(14,12,'2024-04-03',17,2,3,'2024-04-03 17:13:55','2024-04-03 17:13:55');

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `semester` enum('I','II','III','IV') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subject` */

insert  into `subject`(`id`,`name`,`type`,`semester`,`status`,`is_delete`,`created_by`,`created_at`,`updated_at`) values (16,'Administracion I','Theory','I',0,0,1,'2024-03-01 17:30:58','2024-03-01 17:30:58'),(17,'Contabilidad I','Theory','I',0,0,1,'2024-03-01 17:31:11','2024-03-01 17:31:11'),(18,'Economia I','Theory','I',0,0,1,'2024-03-01 17:31:26','2024-03-01 17:31:26'),(19,'Etica','Theory','I',0,0,1,'2024-03-01 17:31:40','2024-03-01 17:31:40'),(20,'Matematicas I','Theory','I',0,0,1,'2024-03-01 17:31:53','2024-03-01 17:31:53'),(21,'Metodología Educación','Theory','I',0,0,1,'2024-03-01 17:32:07','2024-03-01 17:32:07'),(22,'Constitucional','Theory','II',0,0,1,'2024-03-01 17:32:23','2024-03-01 17:32:23'),(23,'Contabilidad II','Theory','II',0,0,1,'2024-03-01 17:32:36','2024-03-01 17:32:36'),(24,'Derecho Laboral','Theory','II',0,0,1,'2024-03-01 17:32:50','2024-03-01 17:32:50'),(25,'Estadistica','Theory','II',0,0,1,'2024-03-01 17:33:04','2024-03-01 17:33:04'),(26,'Informatica I','Practical','II',0,0,1,'2024-03-01 17:33:18','2024-03-01 17:33:18'),(27,'Matematicas Financieras','Theory','II',0,0,1,'2024-03-01 17:33:31','2024-03-01 17:33:31'),(28,'Analisis Financiero','Theory','III',0,0,1,'2024-03-01 17:33:48','2024-03-01 17:33:48'),(29,'Costos','Theory','III',0,0,1,'2024-03-01 17:34:00','2024-03-01 17:34:00'),(30,'Derecho Tributario','Theory','III',0,0,1,'2024-03-01 17:34:13','2024-03-01 17:34:13'),(31,'Informatica II','Theory','III',0,0,1,'2024-03-01 17:34:24','2024-03-01 17:34:24'),(32,'Practicas Empresariales','Theory','III',0,0,1,'2024-03-01 17:34:37','2024-03-01 17:34:37'),(33,'Presupuesto','Theory','III',0,0,1,'2024-03-01 17:34:48','2024-03-01 17:34:48'),(34,'Proyecto I','Theory','III',0,0,1,'2024-03-01 17:34:59','2024-03-01 17:34:59'),(35,'Auditoria','Theory','IV',0,0,1,'2024-03-01 17:35:18','2024-03-01 17:35:18'),(36,'Contabilidad IV','Theory','IV',0,0,1,'2024-03-01 17:35:31','2024-03-01 17:35:31'),(37,'Derecho Tributario II','Theory','IV',0,0,1,'2024-03-01 17:35:45','2024-03-01 17:35:45'),(38,'Informatica III','Practical','IV',0,0,1,'2024-03-01 17:36:04','2024-03-01 17:36:04'),(39,'Proyecto de grado','Practical','IV',0,0,1,'2024-03-01 17:36:18','2024-03-01 17:36:18'),(40,'Ingles I','Theory','I',0,0,1,'2024-03-01 17:37:11','2024-03-01 17:37:11'),(41,'Ingles II','Theory',NULL,0,0,1,'2024-06-09 22:58:22','2024-06-09 22:58:22');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` enum('CEDULA','TI','REGISTRO_CIVIL','PASAPORTE','OTRO') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `headquarter_id` int(11) DEFAULT NULL,
  `journey_id` int(11) DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_stratum` int(11) DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eps` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experiencie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT 3 COMMENT '1, admin, 3:student , 2:teacher, 4:parent',
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0, no eliminado, 1: eliminado',
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`parent_id`,`name`,`last_name`,`document_type`,`email`,`email_verified_at`,`password`,`remember_token`,`admission_number`,`roll_number`,`class_id`,`headquarter_id`,`journey_id`,`gender`,`date_of_birth`,`caste`,`religion`,`social_stratum`,`mobile_number`,`admission_date`,`profile_pic`,`blood_group`,`eps`,`height`,`weight`,`address`,`occupation`,`marital_status`,`permanent_address`,`qualification`,`work_experiencie`,`notes`,`user_type`,`is_delete`,`status`,`created_at`,`updated_at`) values (1,NULL,'Jerson Batista Vega','batista','CEDULA','ingjerson2014@gmail.com','2023-12-03 16:11:02','$2y$12$N6UMi3P79UUaPyC.LnALJOD3jiWZ8cAaRsrAnd6lQ74iGigPfGu7S','DznFCbEZL9AS0VhxN1vTAGUqF10poaetRTegKKOLZXRjnZE2sQssuZRmYRXl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20240618124924h1svjyh2uuemr510rx1x.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-03 16:11:10','2024-06-18 00:49:24'),(2,NULL,'student','',NULL,'student@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','6AhJK4foGDkX4ZE4wKTdOY4lfCqzQ86xFuBcTKcnPh08hecezEkD7Y5S00t3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-04 07:41:19','2024-01-02 17:02:07'),(3,NULL,'Pedro','Vezquez','CEDULA','teacher@gmail.com',NULL,'$2y$12$G8ctAlcZ9igaeOctSl697eFUT9x6KxyWwTh5YLVRVelr8qAWYDan6','VDXDyrnRx1r1C5kUZMUuFuPJNPe1ff1cXfjT3qE0iLSymlk01M7QOJedqLql','','767887',NULL,NULL,NULL,'Male','2024-01-03','lorem ipsum','lorem ipsum',1,'lorem ipsum','2024-01-04','20240104074857y5jco07jcnqgdijk9lxf.jpg','O+','',NULL,NULL,'test','Ingeniero','casado','test',NULL,'test','test',2,0,0,'2023-12-04 07:42:25','2024-02-12 13:51:35'),(4,NULL,'school','lorem ipsum','CEDULA','scholl@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','ZSZbolcNeCcu2vS1OOyMYlmtL9oNvTPSzTFa8lI1JpTWV1pRQFjYHBWMSN5h',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'El carmen de bolivar','Ingeniero',NULL,'lorem ipsum',NULL,'lorem ipsum','lorem ipsum',5,0,0,'2023-12-04 07:43:13','2023-12-04 07:43:14'),(5,NULL,'parent','vega','CEDULA','parent@gmail.com',NULL,'$2y$10$Bbe0sR00N7js3DNcolmHBe52hdxsxSE47gxzWBjJonWgOeDufN2VW','N9A8bxzxDTTk7kpp0qr4VwFi6VZBaRfaMHa1k77jJOQhnc2ckzRTTXjF62xM',NULL,'45345345',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'988978989',NULL,NULL,NULL,NULL,NULL,'6','CARMEN DE BOLIVAR','INDEPENDIENTE',NULL,NULL,NULL,NULL,NULL,4,1,0,'2023-12-04 07:43:40','2024-01-05 22:59:42'),(6,NULL,'prueba','',NULL,'prueba@gmail.com',NULL,'$2y$12$w4TeF8qxs6Zvi0YirqkWN.yXRlYGUeGOxnq86JX31ufFf7jqEn45i',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-07 13:06:57','2024-01-02 17:01:15'),(7,NULL,'prueba222','',NULL,'prueba22222@gmail.com',NULL,'$2y$12$Dt7H7SicqF7RmvSEZKAdaercl9nR2BCaFmERR3E7o9sgp1k0jghqe','QQTwjxOef5j1DCfu2nzTQXeHuran4uzTuXjOUaHbmWFd64qT9pVbcG1XwfNd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,'2023-12-07 13:18:19','2023-12-07 17:55:30'),(8,NULL,'eliminame','',NULL,'eliminame@gmail.com',NULL,'$2y$12$/.ziljuXErQQHWwhOeh/A.VKta6SZQ5C0U1rTqWbdvebb5iHVWQZa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,'2023-12-07 17:53:23','2023-12-07 17:53:29'),(9,NULL,'pruebas 3','',NULL,'sistemas_pruebas@gmail.com',NULL,'$2y$12$zoEYT6ExcaoTOQUXMCkJguRGakB6ZuYBsOnKtcqH7qKvNVFflq/cG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-07 18:20:22','2023-12-07 18:20:22'),(10,NULL,'juan pedro','',NULL,'juanito2333333@gmail.com',NULL,'$2y$12$pxH7VK/IVrJmJkwuwinJCe04WjjuDOyHGzIusM7m/qu1mO7QBf.12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'20240617115045u5qguxc8fqp5wxwcieqv.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,'2023-12-10 18:54:11','2024-06-17 23:50:45'),(13,NULL,'juanito','Batista',NULL,'juanito021@gmail.com',NULL,'$2y$12$BTZsCZFCjeQDrn15YxMRQuTPD0CQhElZ8wpSZbGlN7xg.rbI4VVDC',NULL,'6756','78',12,2,1,'Male','2023-12-31','raizal',NULL,3,'6756756767','2023-12-31','20231231102210uofehecbr4tjxnvwligm.jpg','','MUTUAL',NULL,'77',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,1,0,'2023-12-31 22:22:10','2024-01-02 17:22:02'),(14,16,'Karen','Hernandez Torres','CEDULA','kamaheto@gmail.com',NULL,'$2y$12$wAvheuEoTK2J1AcCoc.BUubv5VHHnL1ueWNhMfSEqsTYPXSJ0zGRe','58M7NxP4hM6f1sJptiHbR1MJiNAN7gQ3w8DzDBKXcVIpipm8ZSlXsq0D9uMc','12312','1047398744',12,1,5,'Female','2024-01-02','raizal','IPUC',1,'3013794981','2024-01-02','202401020629284b4xpoegeip3troowrub.jpg','O+','MUTUAL','1.60','55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-01-02 17:21:35','2024-06-14 01:31:06'),(15,16,'juan pedro','Batista VEGA','REGISTRO_CIVIL','prueba222220111@gmail.com',NULL,'$2y$12$qCx3iZA7yn600xk0fwQD7er3wWKi5CsUQ3aZYkZXUFPriyi2bGRtS',NULL,'7876','789996456',12,2,2,'Male','2024-01-03','raizal','pruebas',1,'6756756767','2024-01-03',NULL,'O+','MUTUAL','1.78','444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-01-03 12:50:51','2024-01-04 13:16:52'),(16,NULL,'Jerson Batista','Hernandez Torres','CEDULA','sistemas_pruebas777@gmail.com',NULL,'$2y$12$SIJdpgXxNvfGPDiptN43T.Es4FXp3yNPaCzm.gYdN7e6fIl0J3UYO','osKLjInLfFgut8FANbK17oJEjLI7KqA68Atnw8GiHsY9kqj5zk4MeymSD1iP',NULL,'677777777777777777',NULL,NULL,NULL,'Male',NULL,NULL,NULL,NULL,'6756756767',NULL,'20240105111113yqaahya2yuzvzk40enps.jpg','O+','test',NULL,NULL,'EL CARMEN DE BOLIVAR','independiente',NULL,NULL,NULL,NULL,NULL,4,0,0,'2024-01-03 17:24:43','2024-02-13 12:55:49'),(17,16,'DENIS','Batista VEGA','TI','denis@gmail.com',NULL,'$2y$12$z0tO14uCbQfGzELorWEhve8jWdkRNtRHJXtOdCsr9U2oT62v/QG7S','22kA8uEeKGlDDgmcSqbus6HCKSYjffA5M1Y2FVFciNhW1JaDI51spCNaDIyO','7876','543454545',12,3,2,'Male','2005-01-05','raizal','pruebas',1,'6756756767','2024-01-04',NULL,'O+','','887','444',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-01-04 13:19:16','2024-02-25 19:49:49'),(18,NULL,'juan pedro','Batista VEGA','CEDULA','teacher2012@mail.com',NULL,'$2y$12$oNMP23hZT7i0kp1KAl/M/uuw8kpjG9I7.afmm3oThXywuIEdSNJ1.',NULL,'','787878',NULL,NULL,NULL,'Male','2024-01-04',NULL,NULL,NULL,'6756756767','2024-01-04',NULL,NULL,NULL,NULL,NULL,'teacher','independiente','casado','teacher',NULL,'teacher','teacher',2,1,0,'2024-01-04 19:20:04','2024-01-04 19:24:53'),(19,NULL,'juan','Hernandez Torres','CEDULA','test@gmail.com',NULL,'$2y$12$/fCr2lcncwuIG.ZiXuE4p.g0FKfmY9h/6fTgAoPjdIPWC5IKl9JZi',NULL,'','10473987447',NULL,NULL,NULL,'Male','2024-01-04',NULL,NULL,NULL,'6756756767','2024-01-04','202401040721363glczsylqeldmb3su6wv.jpg',NULL,NULL,NULL,NULL,'test','independiente','casado','test',NULL,'test','test testtesttesttesttest',2,1,0,'2024-01-04 19:21:36','2024-01-04 19:24:05'),(20,NULL,'juan pedro','Batista VEGA','CEDULA','gmai@gmail.com',NULL,'$2y$12$gNLRKpcIjjdgQIngz4HHYOrrwg2StVEORfS9OmaAiovSV16ZYaNhm',NULL,'','78999',NULL,NULL,NULL,'Male','2024-01-04',NULL,NULL,NULL,'6756756767','2024-01-04',NULL,'O-','MUTUAL',NULL,NULL,'el carmen de bolivar','independiente','casado','test',NULL,'test','test',2,0,1,'2024-01-04 19:55:16','2024-01-04 20:47:51'),(21,16,'Daniel','Vega Batista','CEDULA','daniel@gmail.com',NULL,'$2y$12$1.rU5KWx2iRbdUdAEgsGT.li0LU1y6PdmzHUgq0l2c3MGIEn26Bve','aTSjtht6LcopynDIZGnOlucUorQmRfPBywmbVj2ehIl7YwfHhnYriC2fxgpa','5445545','3205789541',11,1,5,'Male','2024-01-05','raizal','pruebas',1,'6756756767','2024-01-05','20240105085349eb8evnqp4bpvecpgeffx.jpg','O+','MUTUAL','1.78','55','EL CARMEN DE BOLIVAR','',NULL,NULL,NULL,NULL,NULL,3,0,0,'2024-01-05 15:10:47','2024-04-28 21:24:00'),(22,NULL,'Alcira','Batista VEGA','CEDULA','alcira2023@gmail.com',NULL,'$2y$12$w.qfUn.JCeeSLMTu/wvSCeZD3CYwMI3Towr7O3jfq6TpLfgUMAQiS','zK7TwKCeAZ847hPPb5dc9KkbVez31g5IUhR424wqNhOKOdGwYRJy6CKMb1VZ','','8678678676',NULL,NULL,NULL,'Female','2024-01-08',NULL,NULL,NULL,'6756756767','2024-01-08',NULL,'O+','MUTUAL',NULL,NULL,'test','independiente','casado','test',NULL,'test','test',2,0,0,'2024-01-08 21:23:49','2024-02-17 00:52:14'),(23,NULL,'Elizabeth','Vega Batista','CEDULA','elizabeth@gmail.com',NULL,'$2y$12$uabr5qOlAZrVz1/M4ai4.ua37tBUNvpjj2b5tRUTSy3hOAmw8OXbq','isjGsYyIuYQujLtZlLqCrejtU03nuPuZC5hq4FEboDkpjWt374tm0uhQRLVw','','45879555',NULL,NULL,NULL,'Female','2023-06-02',NULL,NULL,NULL,'6756756767','2024-01-05',NULL,'O+','MUTUAL',NULL,NULL,'test','independiente','casado','test',NULL,'test','test',2,0,0,'2024-01-10 15:51:20','2024-01-11 16:48:47');

/*Table structure for table `week` */

DROP TABLE IF EXISTS `week`;

CREATE TABLE `week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullcalendar_day` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `week` */

insert  into `week`(`id`,`name`,`fullcalendar_day`,`created_at`,`updated_at`) values (1,'Lunes',1,'2024-01-11 20:39:18','2024-01-11 20:39:19'),(2,'Martes',2,'2024-01-11 20:40:18','2024-01-11 20:40:19'),(3,'Miercoles',3,'2024-01-11 20:40:38','2024-01-11 20:40:39'),(4,'Jueves',4,'2024-01-11 20:40:51','2024-01-11 20:40:52'),(5,'Viernes',5,'2024-01-11 20:41:03','2024-01-11 20:41:04'),(6,'Sabado',6,'2024-01-11 20:41:14','2024-01-11 20:41:15'),(7,'Domingo',7,'2024-01-11 20:41:28','2024-01-11 20:41:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
