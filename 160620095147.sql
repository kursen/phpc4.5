/*
MySQL Backup
Source Server Version: 5.6.16
Source Database: fc45
Date: 20/06/2016 09:51:47
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
--  Records 
-- ----------------------------
INSERT INTO `faktor1` VALUES ('1','cerah','85','85','biasa','tidak'),  ('2','Cerah','80','90','Kencang','Tidak'),  ('3','mendung','83','78','biasa','Ya'),  ('4','Hujan','70','96','biasa','Ya'),  ('5','hujan','68','80','Biasa','Ya'),  ('6','Hujan','65','70','kencang','Tidak'),  ('7','mendung','64','65','Kencang','Tidak'),  ('8','cerah','72','95','Biasa','Tidak'),  ('9','cerah','69','70','Biasa','Ya'),  ('10','Hujan','75','80','biasa','ya'),  ('11','cerah','75','70','kencang','ya'),  ('12','mendung','72','90','kencang','ya'),  ('13','Mendung','81','75','Biasa','ya'),  ('14','Hujan','71','80','Kencang','tidak');
INSERT INTO `faktorcuaca` VALUES ('1','Pandan','33','22','79','barat data/10 kt','berawan'),  ('2','Tarutung','31','18','86','barat daya/10 kt','hujan'),  ('3','Sipirok','33','23','84','barat daya/10 kt','cerah'),  ('4','Gunung sitoli','33','23','85','barat daya/10 kt','cerah'),  ('5','Stabat','34','24','85','barat daya/10 kt','cerah'),  ('6','Kabanjahe','29','17','80','barat daya/10 kt','hujan'),  ('7','Lubuk pakam','34','24','80','barat daya/10 kt','cerah'),  ('8','Pematang raya','31','18','80','barat daya/10 kt','hujan'),  ('9','Kisaran','34','23','80','barat daya/10 kt','cerah'),  ('10','Rantau prapat','34','23','80','barat daya/10 kt','berawan'),  ('11','Sidikalang','29','18','80','barat daya/10 kt','hujan'),  ('12','Balige','30','17','80','barat daya/10 kt','hujan'),  ('13','Panyabungan','33','23','80','barat daya/10 kt','berawan'),  ('14','Teluk dalam','33','23','82','barat daya/10 kt','cerah'),  ('15','Salak','30','18','85','barat daya/10 kt','hujan'),  ('16','Dolok sanggul','29','17','87','barat daya/10 kt','hujan'),  ('17','Pangururan','29','17','87','barat daya/10 kt','hujan'),  ('18','Sei rampah','34','24','75','barat daya/10 kt','cerah'),  ('19','Lima puluh','34','24','78','barat daya/10 kt','cerah'),  ('20','Medan','35','24','76','barat daya/10 kt','cerah'),  ('21','Pematang siantar','32','21','82','barat daya/10 kt','hujan'),  ('22','Sibolga','33','21','78','barat daya/10 kt','berawan'),  ('23','Tanjung balai','34','24','85','barat daya/10 kt','cerah'),  ('24','Binjai kota','34','24','75','barat daya/10 kt','cerah'),  ('25','Tebing tinggi','33','23','76','barat daya/10 kt','cerah'),  ('26','Padang sidempuan','34','23','75','barat daya/10 kt','berawan'),  ('27','Kota pinang','34','23','75','barat daya/10 kt','berawan'),  ('28','Aek kanopan','33','23','75','barat daya/10 kt','berawan'),  ('29','Lahomi','33','23','75','barat daya/10 kt','cerah'),  ('30','Lotu','33','23','75','barat daya/10 kt','cerah'),  ('31','Sibuhan','31','23','80','barat daya/10 kt','hujan'),  ('32','Gunung tua','31','23','80','barat daya/10 kt','hujan');
