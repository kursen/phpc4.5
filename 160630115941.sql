/*
MySQL Backup
Source Server Version: 5.6.16
Source Database: fc45
Date: 30/06/2016 11:59:41
*/



-- ----------------------------
--  Table structure for `trainingtable`
-- ----------------------------
DROP TABLE IF EXISTS `trainingtable`;
CREATE TABLE `trainingtable` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `suhu_max` double(11,2) NOT NULL,
  `suhu_min` double(11,2) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `arah_angin` varchar(5) NOT NULL,
  `kecepatan_angin` double(11,2) NOT NULL,
  `cuaca` double(20,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `trainingtable` VALUES ('39','2012-01-01','31.60','23.40','82','320','0.50','0.00'),  ('40','2012-01-02','33.00','23.20','79','0','0.00','0.00'),  ('41','2012-01-03','31.40','23.40','83','0','0.00','53.00'),  ('42','2012-01-04','32.60','24.00','83','60','0.50','25.00'),  ('43','2012-01-05','33.00','23.00','87','0','0.00','39.00'),  ('44','2012-01-06','33.40','23.00','83','0','0.00','0.00'),  ('45','2012-01-07','31.80','23.20','76','300','0.50','0.00'),  ('46','2012-01-08','33.00','22.70','80','0','0.00','3.00'),  ('47','2012-01-09','27.00','23.00','88','240','0.50','29.00'),  ('48','2012-01-10','29.00','23.00','87','0','0.00','0.00'),  ('49','2012-01-11','29.00','23.20','84','0','0.00','0.00'),  ('50','2012-01-12','31.00','23.60','80','0','0.00','0.00'),  ('51','2012-01-13','31.20','23.10','84','0','0.00','0.00'),  ('52','2012-01-14','32.00','23.00','82','0','0.00','0.00'),  ('53','2012-01-15','32.60','24.00','76','270','0.50','0.00'),  ('54','2012-01-16','33.00','24.00','79','0','0.00','0.00'),  ('55','2012-01-17','33.40','24.20','79','0','0.00','11.00'),  ('56','2012-01-18','30.60','24.00','84','0','0.00','0.00'),  ('57','2012-01-19','31.60','24.00','83','0','0.00','0.00'),  ('58','2012-01-20','29.60','23.60','84','0','0.00','0.00'),  ('59','2012-01-21','31.60','23.40','83','0','0.00','20.00'),  ('60','2012-01-22','30.40','22.00','85','0','0.00','0.00'),  ('61','2012-01-23','31.60','22.20','78','0','0.00','0.00'),  ('62','2012-01-24','32.60','23.80','77','270','0.50','0.00'),  ('63','2012-01-25','33.00','23.60','77','0','0.00','0.00'),  ('64','2012-01-26','32.00','23.40','76','0','0.00','0.00'),  ('65','2012-01-27','32.80','23.40','76','0','0.00','0.00'),  ('66','2012-01-28','31.40','23.00','79','0','0.00','0.00'),  ('67','2012-01-29','33.00','23.20','76','0','0.00','0.00'),  ('68','2012-01-30','33.00','24.00','78','0','0.00','0.00'),  ('69','2012-01-31','32.00','24.20','79','0','0.00','0.00');