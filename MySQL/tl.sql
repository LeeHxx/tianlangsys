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

 Date: 04/03/2020 04:00:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for addition
-- ----------------------------
DROP TABLE IF EXISTS `addition`;
CREATE TABLE `addition` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `addition_date` date DEFAULT NULL COMMENT '补领日期',
  `addition_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '补领型号',
  `addition_volume` int(11) DEFAULT NULL COMMENT '补领数量',
  `addition_applicant` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '申请者',
  `addition_reason` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '补领原因',
  `addition_leader` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '组长确认',
  `addition_price` float DEFAULT NULL COMMENT '物料单价',
  `addition_controller` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '物管员确认',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of addition
-- ----------------------------
BEGIN;
INSERT INTO `addition` VALUES ('TL230001', '2020-02-12', '1', 1, '1111', '1', '1', 1.5, '1');
COMMIT;

-- ----------------------------
-- Table structure for cleaning
-- ----------------------------
DROP TABLE IF EXISTS `cleaning`;
CREATE TABLE `cleaning` (
  `order_id` varchar(20) NOT NULL COMMENT '订单号',
  `cleaning_get` date DEFAULT NULL COMMENT '领料日期',
  `cleaning_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `cleaning_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `cleaning_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `cleaning_end` date DEFAULT NULL COMMENT '批次完成时间',
  `cleaning_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `cleaning_turn_volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序量',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cleaning
-- ----------------------------
BEGIN;
INSERT INTO `cleaning` VALUES ('TL230001', '2020-02-04', '2', '2', 2, '2020-02-07', '2020-02-08', '2');
COMMIT;

-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `order_id` varchar(20) NOT NULL COMMENT '订单号',
  `code_get` date DEFAULT NULL COMMENT '领料日期',
  `code_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `code_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `code_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `code_end` date DEFAULT NULL COMMENT '批次完成时间',
  `code_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `code_turn_volume` int(11) DEFAULT NULL COMMENT '转序量',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of code
-- ----------------------------
BEGIN;
INSERT INTO `code` VALUES ('TL230001', '2020-02-14', '2', 's', 430000, '2020-02-15', '2020-02-18', 43);
COMMIT;

-- ----------------------------
-- Table structure for dip
-- ----------------------------
DROP TABLE IF EXISTS `dip`;
CREATE TABLE `dip` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `dip_get` date DEFAULT NULL COMMENT '领料日期',
  `dip_recipient` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '领料者',
  `dip_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `dip_first_start` date DEFAULT NULL COMMENT '首件生产日期',
  `dip_first_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '首件操作者',
  `dip_batch_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `dip_batch_end` date DEFAULT NULL COMMENT '批次完成时间',
  `dip_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `dip_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `dip_turn_volume` int(11) DEFAULT NULL COMMENT '转序量',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dip
-- ----------------------------
BEGIN;
INSERT INTO `dip` VALUES ('TL230001', '2020-02-01', '1', '1', '2020-02-12', '1', 1, '2020-02-19', '1', '2020-02-21', 1);
COMMIT;

-- ----------------------------
-- Table structure for glue
-- ----------------------------
DROP TABLE IF EXISTS `glue`;
CREATE TABLE `glue` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `glue_get` date DEFAULT NULL COMMENT '领料日期',
  `glue_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `glue_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `glue_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `glue_end` date DEFAULT NULL COMMENT '批次完成时间',
  `glue_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `glue_turn_volume` int(11) DEFAULT NULL COMMENT '转序量',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of glue
-- ----------------------------
BEGIN;
INSERT INTO `glue` VALUES ('TL230001', '2020-02-05', '2', '3', 3, '2020-02-13', '2020-02-21', 333);
COMMIT;

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_come` date DEFAULT NULL,
  `material_volume` int(20) DEFAULT NULL,
  `material_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material_okng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material_kitting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of material
-- ----------------------------
BEGIN;
INSERT INTO `material` VALUES (7, 'dd0001', '2020-03-03', 100, 'PCB', '合格', '1', '小张');
COMMIT;

-- ----------------------------
-- Table structure for operator
-- ----------------------------
DROP TABLE IF EXISTS `operator`;
CREATE TABLE `operator` (
  `operator_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `operator_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`operator_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of operator
-- ----------------------------
BEGIN;
INSERT INTO `operator` VALUES ('1', '订单管理员');
INSERT INTO `operator` VALUES ('2', '物料管理员');
INSERT INTO `operator` VALUES ('3', '工艺管理员');
INSERT INTO `operator` VALUES ('4', '仓库管理员');
INSERT INTO `operator` VALUES ('5', 'smt首件管理员');
INSERT INTO `operator` VALUES ('6', 'smt管理员');
INSERT INTO `operator` VALUES ('7', 'dip首件管理员');
INSERT INTO `operator` VALUES ('8', 'dip管理员');
INSERT INTO `operator` VALUES ('9', 'cleaning管理员');
INSERT INTO `operator` VALUES ('10', 'glue管理员');
INSERT INTO `operator` VALUES ('11', '打码员');
COMMIT;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_volume` int(20) DEFAULT NULL,
  `order_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_start` date DEFAULT NULL,
  `order_end` date DEFAULT NULL,
  PRIMARY KEY (`id`,`order_id`) USING BTREE,
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES (5, 'dd0001', '航天电子板', '个', 100, '十三所', '2020-03-03', '2020-03-06');
INSERT INTO `orders` VALUES (6, 'dd0002', 'PCB', '个', 12, '十三所', '2020-03-06', '2020-03-08');
INSERT INTO `orders` VALUES (7, 'dd0003', 'PCB', '个', 18, '十三所', '2020-03-10', '2020-03-15');
INSERT INTO `orders` VALUES (15, 'dd0004', 'PCB', '条', 2000, '十四所', '2020-03-03', '2020-03-08');
COMMIT;

-- ----------------------------
-- Table structure for problem
-- ----------------------------
DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `feedback_date` date DEFAULT NULL COMMENT '反馈日期',
  `feedback` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '反馈者',
  `problem_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '问题类型',
  `problem_description` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '问题描述',
  `solving_time` date DEFAULT NULL COMMENT '要求解决时间',
  `solution` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '解决措施',
  `problem_responsible` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '相关责任人',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of problem
-- ----------------------------
BEGIN;
INSERT INTO `problem` VALUES ('TL230001', '2020-02-12', 's', 'ssss', '一二三', '2020-02-14', 'ssssssss', 'ssss');
COMMIT;

-- ----------------------------
-- Table structure for process
-- ----------------------------
DROP TABLE IF EXISTS `process`;
CREATE TABLE `process` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `bom` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'bom版本',
  `stencil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '网板号',
  `tooling` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '工装',
  `personal_allocation` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '人力配置',
  `process_confirmation_data` date DEFAULT NULL COMMENT '确认日期',
  `process_confirmor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '确认者',
  PRIMARY KEY (`id`,`order_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of process
-- ----------------------------
BEGIN;
INSERT INTO `process` VALUES (1, 'dd0001', '1.1', '0', '0', '0', '2019-10-10', '小李');
INSERT INTO `process` VALUES (2, 'dd0002', '1', '1', '1', '1', '2020-03-03', '1');
INSERT INTO `process` VALUES (3, 'dd0003', '1', '1', '1', '1', '2020-03-03', '1');
COMMIT;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `product_receive_date` date DEFAULT NULL COMMENT '接料日期',
  `product_receiver` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '接收者',
  `product_pack_date` date DEFAULT NULL COMMENT '包装日期',
  `product_packer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '包装者',
  `product_pack_volume` int(11) DEFAULT NULL COMMENT '包装数量',
  `product_deliver` date DEFAULT NULL COMMENT '出库日期',
  `product_deliver_volume` int(11) DEFAULT NULL COMMENT '出库量',
  `product_shipper` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '发货人',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES ('TL230001', '2020-02-14', 'AS', '2020-02-15', 'AS', 12, '2020-02-20', 23, 'AS');
COMMIT;

-- ----------------------------
-- Table structure for quality
-- ----------------------------
DROP TABLE IF EXISTS `quality`;
CREATE TABLE `quality` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `quality_first_date` date DEFAULT NULL COMMENT '首件送检日期',
  `quality_first_inspection` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '首件送检者',
  `quality_first_confirm` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '首件确认',
  `quality_batch_inspect` date DEFAULT NULL COMMENT '批次送检日期',
  `quality_inspection` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '送检者',
  `quality_OK_volume` int(11) DEFAULT NULL COMMENT '合格数',
  `quality_NG_volume` int(11) DEFAULT NULL COMMENT 'NG数',
  `quality_inspection_confirm` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '检验确认',
  `quality_inspection_date` date DEFAULT NULL COMMENT '检验确认日期',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of quality
-- ----------------------------
BEGIN;
INSERT INTO `quality` VALUES ('TL230001', '2020-02-20', '2', '2', '2020-02-22', '2', 2, 2, '2', '2020-02-27');
COMMIT;

-- ----------------------------
-- Table structure for smt
-- ----------------------------
DROP TABLE IF EXISTS `smt`;
CREATE TABLE `smt` (
  `order_id` varchar(20) NOT NULL COMMENT '订单号',
  `smt_get` date DEFAULT NULL COMMENT '领料日期',
  `smt_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `smt_line` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '产线号',
  `smt_classes` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '班次',
  `smt_first_start` date DEFAULT NULL COMMENT '首件生产日期',
  `smt_first_end` date DEFAULT NULL COMMENT '首件完成时间',
  `smt_first_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '首件操作者',
  `smt_batch_completion` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '批次完成量',
  `smt_batch_end` date DEFAULT NULL COMMENT '批次完成时间',
  `smt_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `smt_turn_department` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序部门',
  `smt_turn_volume` int(11) DEFAULT NULL COMMENT '转序量',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of smt
-- ----------------------------
BEGIN;
INSERT INTO `smt` VALUES ('TL230001', '2020-02-04', '1', '2', '1', '2020-02-06', '2020-02-12', '2', '1', '2020-02-21', '1', '1', 1);
INSERT INTO `smt` VALUES ('TL2020000', '2020-02-11', '1', '1', '1', '2020-02-07', '2020-02-08', '1', '1', '2020-02-14', '1', '1', 1);
INSERT INTO `smt` VALUES ('TL20190001', '2020-02-03', '2', '2', '2', '2020-02-05', '2020-02-07', '2', '2', '2020-02-14', '2', '2', 2);
INSERT INTO `smt` VALUES ('3', '2020-02-05', '3', '3', '3', NULL, NULL, '3', '3', NULL, '3', '3', 3);
INSERT INTO `smt` VALUES ('4', NULL, '4', '4', '4', NULL, NULL, '4', '4', NULL, '4', '4', 4);
INSERT INTO `smt` VALUES ('5', NULL, '5', '5', '5', NULL, NULL, '5', '5', NULL, '5', '5', 5);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `usable` bit(1) DEFAULT b'1',
  `job` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `admin` bit(1) DEFAULT b'0',
  `orders` bit(1) DEFAULT b'0',
  `material` bit(1) DEFAULT b'0',
  `process` bit(1) DEFAULT b'0',
  `warehouse` bit(1) DEFAULT b'0',
  `making` bit(1) DEFAULT b'0',
  `quality` bit(1) DEFAULT b'0',
  `product` bit(1) DEFAULT b'0',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'admin', 'admin', b'1', '超级管理员', NULL, b'1', b'1', b'0', b'0', b'0', b'0', b'0', b'0');
INSERT INTO `user` VALUES (2, 'ceo', 'ceo', b'1', '总经理', '8888', b'0', b'1', b'1', b'1', b'1', b'1', b'1', b'1');
INSERT INTO `user` VALUES (3, 'SC', '123', b'1', '生产主管', '123321', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0');
INSERT INTO `user` VALUES (4, 'WL', '999', b'1', '物料管理', '0000', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0');
INSERT INTO `user` VALUES (5, 'test', '1', b'1', '成品管理', '123124', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0');
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
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `warehouse_place` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '存放货位号',
  `warehouse_kitting` tinyint(1) DEFAULT NULL COMMENT '是否齐套',
  `warehouse_preprocessing` tinyint(1) DEFAULT NULL COMMENT '有无预处理',
  `warehouse_keeper` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '库管员',
  `warehouse_turn_department` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序部门',
  `warehouse_turn_volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序量',
  `warehouse_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `warehouse_turn_group` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序班组',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of warehouse
-- ----------------------------
BEGIN;
INSERT INTO `warehouse` VALUES ('TL20190001', '1800', 1, 0, '2019-10-19', 'SMT', 'DIP', '2019-12-25', '1800');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
