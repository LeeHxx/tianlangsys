/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : localhost:3306
 Source Schema         : tl

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 23/12/2019 16:24:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bz/rk/ckbk
-- ----------------------------
DROP TABLE IF EXISTS `bz/rk/ckbk`;
CREATE TABLE `bz/rk/ckbk` (
  `jieliaodate` date NOT NULL,
  `baozhuangSL` int(11) NOT NULL,
  `qualified` varchar(10) NOT NULL,
  `NG` varchar(10) NOT NULL,
  `fahuori` date NOT NULL,
  `fahuoliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cleaning
-- ----------------------------
DROP TABLE IF EXISTS `cleaning`;
CREATE TABLE `cleaning` (
  `jieliaoriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `jieliaoriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dip
-- ----------------------------
DROP TABLE IF EXISTS `dip`;
CREATE TABLE `dip` (
  `jieliaoriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `shifouqitao` varchar(10) NOT NULL,
  `shoujianriqi` date NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for glue
-- ----------------------------
DROP TABLE IF EXISTS `glue`;
CREATE TABLE `glue` (
  `jieliaoriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for incoming
-- ----------------------------
DROP TABLE IF EXISTS `incoming`;
CREATE TABLE `incoming` (
  `lailiaoriqi` date NOT NULL,
  `shuliang` int(11) NOT NULL,
  `hege` int(11) NOT NULL,
  `NG` int(11) NOT NULL,
  `zhixubumen` char(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incoming
-- ----------------------------
BEGIN;
INSERT INTO `incoming` VALUES ('2019-10-17', 1800, 1800, 0, '仓库', 1800);
COMMIT;

-- ----------------------------
-- Table structure for inspection
-- ----------------------------
DROP TABLE IF EXISTS `inspection`;
CREATE TABLE `inspection` (
  `jianyanriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `hege` varchar(10) NOT NULL,
  `NG` varchar(10) NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_client` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_start` date DEFAULT NULL,
  `order_end` date DEFAULT NULL,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
BEGIN;
INSERT INTO `order` VALUES ('TL2020000', '航天电子板', '十四所', 'AAA2', '2000', '2019-10-30', '2019-10-15');
COMMIT;

-- ----------------------------
-- Table structure for process
-- ----------------------------
DROP TABLE IF EXISTS `process`;
CREATE TABLE `process` (
  `querenriqi` date NOT NULL,
  `BOM` varchar(10) NOT NULL,
  `wangban` varchar(10) NOT NULL,
  `gongzhuang` varchar(10) NOT NULL,
  `renlipeizhi` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for smt
-- ----------------------------
DROP TABLE IF EXISTS `smt`;
CREATE TABLE `smt` (
  `jieliaoriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `shifouqitao` varchar(10) NOT NULL,
  `shoujianriqi` date NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxubumen` varchar(10) NOT NULL,
  `zhuanxuliang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` bit(1) DEFAULT b'0',
  `order` bit(1) DEFAULT b'0',
  `usable` bit(1) DEFAULT b'1',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'admin', 'admin', b'1', b'1', b'1');
INSERT INTO `user` VALUES (2, '1', '1', b'0', b'0', b'1');
INSERT INTO `user` VALUES (3, '123', '123', b'0', b'0', b'1');
INSERT INTO `user` VALUES (4, '1', '123', b'0', b'0', b'0');
INSERT INTO `user` VALUES (5, 'test', '1', b'0', b'0', b'0');
INSERT INTO `user` VALUES (6, '物料管理', '1', b'0', b'0', b'1');
COMMIT;

-- ----------------------------
-- Table structure for usertable
-- ----------------------------
DROP TABLE IF EXISTS `usertable`;
CREATE TABLE `usertable` (
  `id` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for warehouse
-- ----------------------------
DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse` (
  `rukuriqi` date NOT NULL,
  `lailiaoshuliang` int(11) NOT NULL,
  `queliao（pinzhong/shuliang）` varchar(10) NOT NULL,
  `qitaozhuangtai` int(11) NOT NULL,
  `zhuanxuriqi` date NOT NULL,
  `zhuanxuA` char(10) NOT NULL,
  `zhuanxuB` char(10) NOT NULL,
  `zhuanxuliangA` int(11) NOT NULL,
  `zhuanxuliangB` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of warehouse
-- ----------------------------
BEGIN;
INSERT INTO `warehouse` VALUES ('2019-10-17', 1800, '', 1800, '2019-10-19', 'SMT', 'DIP', 1800, 1800);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
