/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : zhongyao

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-06-19 15:18:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chufang
-- ----------------------------
DROP TABLE IF EXISTS `chufang`;
CREATE TABLE `chufang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `content` text COMMENT '病情',
  `sign_at` int(10) unsigned DEFAULT NULL COMMENT '登记日期',
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chufang
-- ----------------------------

-- ----------------------------
-- Table structure for chufang_yao
-- ----------------------------
DROP TABLE IF EXISTS `chufang_yao`;
CREATE TABLE `chufang_yao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chufang_id` int(10) unsigned DEFAULT NULL,
  `yao` varchar(255) DEFAULT NULL COMMENT '药名',
  `weight` decimal(10,1) DEFAULT NULL COMMENT '用量(克)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chufang_yao
-- ----------------------------

-- ----------------------------
-- Table structure for yao
-- ----------------------------
DROP TABLE IF EXISTS `yao`;
CREATE TABLE `yao` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `yao` varchar(255) DEFAULT NULL COMMENT '药名',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价(元/克)',
  `stock` decimal(10,2) DEFAULT NULL COMMENT '库存(克)',
  `created_at` int(11) unsigned DEFAULT NULL,
  `updated_at` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yao
-- ----------------------------
INSERT INTO `yao` VALUES ('1', '党参', '0.20', '600.00', '1466235364', '1466242409');
INSERT INTO `yao` VALUES ('2', '白术', '0.30', '1000.00', '1466235384', '1466241768');
INSERT INTO `yao` VALUES ('3', '干姜', '0.10', '500.00', '1466235393', '1466235558');
INSERT INTO `yao` VALUES ('4', '炙甘草', '0.02', null, '1466235401', '1466235566');

-- ----------------------------
-- Table structure for yao_log
-- ----------------------------
DROP TABLE IF EXISTS `yao_log`;
CREATE TABLE `yao_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `yao` varchar(255) DEFAULT NULL COMMENT '药材',
  `weight` decimal(10,2) DEFAULT NULL COMMENT '药品变化量',
  `chufang_id` int(11) unsigned DEFAULT '0',
  `content` varchar(255) DEFAULT NULL COMMENT '说明',
  `created_at` int(11) unsigned DEFAULT NULL,
  `updated_at` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yao_log
-- ----------------------------
INSERT INTO `yao_log` VALUES ('1', '干姜', '500.00', '0', '进货', '1466241768', '1466241768');
INSERT INTO `yao_log` VALUES ('2', '白术', '1000.00', '0', '进货', '1466241768', '1466241768');
INSERT INTO `yao_log` VALUES ('3', '党参', '600.00', '0', '进货', '1466242409', '1466242409');
