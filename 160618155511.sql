/*
MySQL Backup
Source Server Version: 5.6.16
Source Database: fc45
Date: 18/06/2016 15:55:11
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
  `dataran_tinggi` varchar(10) NOT NULL,
  `cuaca` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `faktor1` VALUES ('1','cerah','85','85','biasa','tidak'),  ('2','Cerah','80','90','Kencang','Tidak'),  ('3','mendung','83','78','biasa','Ya'),  ('4','Hujan','70','96','biasa','Ya'),  ('5','hujan','68','80','Biasa','Ya'),  ('6','Hujan','65','70','kencang','Tidak'),  ('7','mendung','64','65','Kencang','Tidak'),  ('8','cerah','72','95','Biasa','Tidak'),  ('9','cerah','69','70','Biasa','Ya'),  ('10','Hujan','75','80','biasa','ya'),  ('11','cerah','75','70','kencang','ya'),  ('12','mendung','72','90','kencang','ya'),  ('13','Mendung','81','75','Biasa','ya'),  ('14','Hujan','71','80','Kencang','tidak');
INSERT INTO `faktorcuaca` VALUES ('1','Pandan','33','22','79','barat data/10 kt','ya','berawan'),  ('2','Tarutung','31','18','86','barat daya/10 kt','ya','hujan'),  ('3','Sipirok','33','23','84','barat daya/10 kt','ya','cerah');
