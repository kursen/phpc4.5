/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: fc45
Date: 20/08/2016 11:22:08
*/


-- ----------------------------
--  Table structure for `faktor1`
-- ----------------------------
DROP TABLE IF EXISTS `faktor1`;
CREATE TABLE `faktor1` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cuaca` varchar(50) NOT NULL,
  `suhu` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `angin` varchar(20) NOT NULL,
  `bermain` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `faktorcuaca`
-- ----------------------------
DROP TABLE IF EXISTS `faktorcuaca`;
CREATE TABLE `faktorcuaca` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(50) NOT NULL,
  `suhu_max` int(11) NOT NULL,
  `suhu_min` int(11) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `arah_angin` varchar(50) NOT NULL,
  `cuaca` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tblogin`
-- ----------------------------
DROP TABLE IF EXISTS `tblogin`;
CREATE TABLE `tblogin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `testingtable`
-- ----------------------------
DROP TABLE IF EXISTS `testingtable`;
CREATE TABLE `testingtable` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `suhu_max` double(11,2) NOT NULL,
  `suhu_min` double(11,2) NOT NULL,
  `kelembapan` int(11) NOT NULL,
  `arah_angin` varchar(5) NOT NULL,
  `kecepatan_angin` double(11,2) NOT NULL,
  `cuaca` double(20,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
--  View definition for `groupsuhumax`
-- ----------------------------
DROP VIEW IF EXISTS `groupsuhumax`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `groupsuhumax` AS select `trainingtable`.`suhu_max` AS `suhu_max` from `trainingtable` group by `trainingtable`.`suhu_max` order by `trainingtable`.`suhu_max`;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `faktor1` VALUES ('1','cerah','85','85','biasa','tidak'),  ('2','Cerah','80','90','Kencang','Tidak'),  ('3','mendung','83','78','biasa','Ya'),  ('4','Hujan','70','96','biasa','Ya'),  ('5','hujan','68','80','Biasa','Ya'),  ('6','Hujan','65','70','kencang','Tidak'),  ('7','mendung','64','65','Kencang','Tidak'),  ('8','cerah','72','95','Biasa','Tidak'),  ('9','cerah','69','70','Biasa','Ya'),  ('10','Hujan','75','80','biasa','ya'),  ('11','cerah','75','70','kencang','ya'),  ('12','mendung','72','90','kencang','ya'),  ('13','Mendung','81','75','Biasa','ya'),  ('14','Hujan','71','80','Kencang','tidak');
INSERT INTO `faktorcuaca` VALUES ('1','Pandan','33','22','79','barat data/10 kt','berawan'),  ('2','Tarutung','31','18','86','barat daya/10 kt','hujan'),  ('3','Sipirok','33','23','84','barat daya/10 kt','cerah'),  ('4','Gunung sitoli','33','23','85','barat daya/10 kt','cerah'),  ('5','Stabat','34','24','85','barat daya/10 kt','cerah'),  ('6','Kabanjahe','29','17','80','barat daya/10 kt','hujan'),  ('7','Lubuk pakam','34','24','80','barat daya/10 kt','cerah'),  ('8','Pematang raya','31','18','80','barat daya/10 kt','hujan'),  ('9','Kisaran','34','23','80','barat daya/10 kt','cerah'),  ('10','Rantau prapat','34','23','80','barat daya/10 kt','berawan'),  ('11','Sidikalang','29','18','80','barat daya/10 kt','hujan'),  ('12','Balige','30','17','80','barat daya/10 kt','hujan'),  ('13','Panyabungan','33','23','80','barat daya/10 kt','berawan'),  ('14','Teluk dalam','33','23','82','barat daya/10 kt','cerah'),  ('15','Salak','30','18','85','barat daya/10 kt','hujan'),  ('16','Dolok sanggul','29','17','87','barat daya/10 kt','hujan'),  ('17','Pangururan','29','17','87','barat daya/10 kt','hujan'),  ('18','Sei rampah','34','24','75','barat daya/10 kt','cerah'),  ('19','Lima puluh','34','24','78','barat daya/10 kt','cerah'),  ('20','Medan','35','24','76','barat daya/10 kt','cerah'),  ('21','Pematang siantar','32','21','82','barat daya/10 kt','hujan'),  ('22','Sibolga','33','21','78','barat daya/10 kt','berawan'),  ('23','Tanjung balai','34','24','85','barat daya/10 kt','cerah'),  ('24','Binjai kota','34','24','75','barat daya/10 kt','cerah'),  ('25','Tebing tinggi','33','23','76','barat daya/10 kt','cerah'),  ('26','Padang sidempuan','34','23','75','barat daya/10 kt','berawan'),  ('27','Kota pinang','34','23','75','barat daya/10 kt','berawan'),  ('28','Aek kanopan','33','23','75','barat daya/10 kt','berawan'),  ('29','Lahomi','33','23','75','barat daya/10 kt','cerah'),  ('30','Lotu','33','23','75','barat daya/10 kt','cerah'),  ('31','Sibuhan','31','23','80','barat daya/10 kt','hujan'),  ('32','Gunung tua','31','23','80','barat daya/10 kt','hujan');
INSERT INTO `tblogin` VALUES ('1','dian','12345'),  ('2','root','12345');
INSERT INTO `testingtable` VALUES ('2','2012-01-01','31.60','23.40','82','320','0.50','0.00'),  ('3','2012-01-02','33.00','23.20','79','0','0.00','0.00'),  ('4','2012-01-03','31.40','23.40','83','0','0.00','53.00'),  ('5','2012-01-04','32.60','24.00','83','60','0.50','25.00'),  ('6','2012-01-05','33.00','23.00','87','0','0.00','39.00'),  ('7','2012-01-06','33.40','23.00','83','0','0.00','0.00'),  ('8','2012-01-07','31.80','23.20','76','300','0.50','0.00'),  ('9','2012-01-08','33.00','22.70','80','0','0.00','3.00'),  ('10','2012-01-09','27.00','23.00','88','240','0.50','29.00'),  ('11','2012-01-10','29.00','23.00','87','0','0.00','0.00'),  ('12','2012-01-11','29.00','23.20','84','0','0.00','0.00'),  ('13','2012-01-12','31.00','23.60','80','0','0.00','0.00'),  ('14','2012-01-13','31.20','23.10','84','0','0.00','0.00'),  ('15','2012-01-14','32.00','23.00','82','0','0.00','0.00'),  ('16','2012-01-15','32.60','24.00','76','270','0.50','0.00'),  ('17','2012-01-16','33.00','24.00','79','0','0.00','0.00'),  ('18','2012-01-17','33.40','24.20','79','0','0.00','11.00'),  ('19','2012-01-18','30.60','24.00','84','0','0.00','0.00'),  ('20','2012-01-19','31.60','24.00','83','0','0.00','0.00'),  ('21','2012-01-20','29.60','23.60','84','0','0.00','0.00'),  ('22','2012-01-21','31.60','23.40','83','0','0.00','20.00'),  ('23','2012-01-22','30.40','22.00','85','0','0.00','0.00'),  ('24','2012-01-23','31.60','22.20','78','0','0.00','0.00'),  ('25','2012-01-24','32.60','23.80','77','270','0.50','0.00'),  ('26','2012-01-25','33.00','23.60','77','0','0.00','0.00'),  ('27','2012-01-26','32.00','23.40','76','0','0.00','0.00'),  ('28','2012-01-27','32.80','23.40','76','0','0.00','0.00'),  ('29','2012-01-28','31.40','23.00','79','0','0.00','0.00'),  ('30','2012-01-29','33.00','23.20','76','0','0.00','0.00'),  ('31','2012-01-30','33.00','24.00','78','0','0.00','0.00'),  ('32','2012-01-31','32.00','24.20','79','0','0.00','0.00');
INSERT INTO `trainingtable` VALUES ('39','2012-01-01','31.60','23.40','82','320','0.50','0.00'),  ('40','2012-01-02','33.00','23.20','79','0','0.00','0.00'),  ('41','2012-01-03','31.40','23.40','83','0','0.00','53.00'),  ('42','2012-01-04','32.60','24.00','83','60','0.50','25.00'),  ('43','2012-01-05','33.00','23.00','87','0','0.00','39.00'),  ('44','2012-01-06','33.40','23.00','83','0','0.00','0.00'),  ('45','2012-01-07','31.80','23.20','76','300','0.50','0.00'),  ('46','2012-01-08','33.00','22.70','80','0','0.00','3.00'),  ('47','2012-01-09','27.00','23.00','88','240','0.50','29.00'),  ('48','2012-01-10','29.00','23.00','87','0','0.00','0.00'),  ('49','2012-01-11','29.00','23.20','84','0','0.00','0.00'),  ('50','2012-01-12','31.00','23.60','80','0','0.00','0.00'),  ('51','2012-01-13','31.20','23.10','84','0','0.00','0.00'),  ('52','2012-01-14','32.00','23.00','82','0','0.00','0.00'),  ('53','2012-01-15','32.60','24.00','76','270','0.50','0.00'),  ('54','2012-01-16','33.00','24.00','79','0','0.00','0.00'),  ('55','2012-01-17','33.40','24.20','79','0','0.00','11.00'),  ('56','2012-01-18','30.60','24.00','84','0','0.00','0.00'),  ('57','2012-01-19','31.60','24.00','83','0','0.00','0.00'),  ('58','2012-01-20','29.60','23.60','84','0','0.00','0.00'),  ('59','2012-01-21','31.60','23.40','83','0','0.00','20.00'),  ('60','2012-01-22','30.40','22.00','85','0','0.00','0.00'),  ('61','2012-01-23','31.60','22.20','78','0','0.00','0.00'),  ('62','2012-01-24','32.60','23.80','77','270','0.50','0.00'),  ('63','2012-01-25','33.00','23.60','77','0','0.00','0.00'),  ('64','2012-01-26','32.00','23.40','76','0','0.00','0.00'),  ('65','2012-01-27','32.80','23.40','76','0','0.00','0.00'),  ('66','2012-01-28','31.40','23.00','79','0','0.00','0.00'),  ('67','2012-01-29','33.00','23.20','76','0','0.00','0.00'),  ('68','2012-01-30','33.00','24.00','78','0','0.00','0.00'),  ('69','2012-01-31','32.00','24.20','79','0','0.00','0.00');
