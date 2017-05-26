/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : shopcuatui

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-05-26 10:01:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_infor_sale
-- ----------------------------
DROP TABLE IF EXISTS `web_infor_sale`;
CREATE TABLE `web_infor_sale` (
  `infor_sale_id` int(12) NOT NULL AUTO_INCREMENT,
  `infor_sale_uid` int(12) DEFAULT NULL,
  `infor_sale_name` varchar(255) DEFAULT NULL,
  `infor_sale_phone` varchar(255) DEFAULT NULL,
  `infor_sale_mail` varchar(255) DEFAULT NULL,
  `infor_sale_skype` varchar(255) DEFAULT NULL,
  `infor_sale_address` varchar(255) DEFAULT NULL,
  `infor_sale_sotaikhoan` text,
  `infor_sale_vanchuyen` text,
  PRIMARY KEY (`infor_sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_infor_sale
-- ----------------------------
