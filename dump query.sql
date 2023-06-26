/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_tugas_ims
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tugas_ims` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_tugas_ims`;

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_total` int(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id_pemesanan`,`nama`,`tanggal`,`email`,`phone`,`size`,`amount`,`payment_total`,`payment_method`) values 
(1,'Mirah Wardhana','2023-04-11 22:23:48','mirah.wardhana@ims.com','082548264997','XS',1,100000,'E-Wallet'),
(8,'Logan Roy','2023-04-16 01:51:02','loganroy@waystar.com','08321635155','L',1,100000,'E-Wallet'),
(9,'Ramsay Snow','2023-04-16 01:52:06','ramsay@snow.com','082531674367','L',2,200000,'Debit or Credit Cards'),
(10,'Tom Marvolo Riddle','2023-04-16 08:13:08','voldemort@hogwarts.com','0423278465362','XL',2,200000,'E-Wallet'),
(11,'Taylor Alison Swift','2023-04-16 21:58:17','taylor.swift@red.com','07542646317','XS',3,300000,'E-Wallet'),
(12,'Forrest Gump','2023-04-16 22:00:03','forrest.gump@example.com','08264365235','L',5,500000,'E-Wallet'),
(14,'Jack Sparrow','2023-04-17 10:44:13','jack.sparrow@example.com','08726314541','L',1,100000,'E-Wallet');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
