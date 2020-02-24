-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-02-24 13:06:33
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `tl`
--

-- --------------------------------------------------------

--
-- 表的结构 `addition`
--

CREATE TABLE `addition` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `addition_date` date DEFAULT NULL COMMENT '补领日期',
  `addition_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '补领型号',
  `addition_volume` int(11) DEFAULT NULL COMMENT '补领数量',
  `addition_applicant` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '申请者',
  `addition_reason` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '补领原因',
  `addition_leader` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '组长确认',
  `addition_price` float DEFAULT NULL COMMENT '物料单价',
  `addition_controller` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '物管员确认'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `addition`
--

INSERT INTO `addition` (`order_id`, `addition_date`, `addition_type`, `addition_volume`, `addition_applicant`, `addition_reason`, `addition_leader`, `addition_price`, `addition_controller`) VALUES
('TL230001', '2020-02-12', '1', 1, '1111', '1', '1', 1.5, '1');

-- --------------------------------------------------------

--
-- 表的结构 `cleaning`
--

CREATE TABLE `cleaning` (
  `order_id` varchar(20) NOT NULL COMMENT '订单号',
  `cleaning_get` date DEFAULT NULL COMMENT '领料日期',
  `cleaning_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `cleaning_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `cleaning_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `cleaning_end` date DEFAULT NULL COMMENT '批次完成时间',
  `cleaning_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `cleaning_turn_volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cleaning`
--

INSERT INTO `cleaning` (`order_id`, `cleaning_get`, `cleaning_readiness`, `cleaning_opertor`, `cleaning_completion`, `cleaning_end`, `cleaning_turn_date`, `cleaning_turn_volume`) VALUES
('TL230001', '2020-02-04', '2', '2', 2, '2020-02-07', '2020-02-08', '2');

-- --------------------------------------------------------

--
-- 表的结构 `code`
--

CREATE TABLE `code` (
  `order_id` varchar(20) NOT NULL COMMENT '订单号',
  `code_get` date DEFAULT NULL COMMENT '领料日期',
  `code_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `code_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `code_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `code_end` date DEFAULT NULL COMMENT '批次完成时间',
  `code_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `code_turn_volume` int(11) DEFAULT NULL COMMENT '转序量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `code`
--

INSERT INTO `code` (`order_id`, `code_get`, `code_readiness`, `code_opertor`, `code_completion`, `code_end`, `code_turn_date`, `code_turn_volume`) VALUES
('TL230001', '2020-02-14', '2', 's', 430000, '2020-02-15', '2020-02-18', 43);

-- --------------------------------------------------------

--
-- 表的结构 `dip`
--

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
  `dip_turn_volume` int(11) DEFAULT NULL COMMENT '转序量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dip`
--

INSERT INTO `dip` (`order_id`, `dip_get`, `dip_recipient`, `dip_readiness`, `dip_first_start`, `dip_first_opertor`, `dip_batch_completion`, `dip_batch_end`, `dip_opertor`, `dip_turn_date`, `dip_turn_volume`) VALUES
('TL230001', '2020-02-01', '1', '1', '2020-02-12', '1', 1, '2020-02-19', '1', '2020-02-21', 1);

-- --------------------------------------------------------

--
-- 表的结构 `glue`
--

CREATE TABLE `glue` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `glue_get` date DEFAULT NULL COMMENT '领料日期',
  `glue_readiness` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '准备时间',
  `glue_opertor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作者',
  `glue_completion` int(11) DEFAULT NULL COMMENT '批次完成量',
  `glue_end` date DEFAULT NULL COMMENT '批次完成时间',
  `glue_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `glue_turn_volume` int(11) DEFAULT NULL COMMENT '转序量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `glue`
--

INSERT INTO `glue` (`order_id`, `glue_get`, `glue_readiness`, `glue_opertor`, `glue_completion`, `glue_end`, `glue_turn_date`, `glue_turn_volume`) VALUES
('TL230001', '2020-02-05', '2', '3', 3, '2020-02-13', '2020-02-21', 333);

-- --------------------------------------------------------

--
-- 表的结构 `material`
--

CREATE TABLE `material` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `material_come` date DEFAULT NULL COMMENT '来料日期',
  `material_volume` int(20) DEFAULT NULL COMMENT '数量',
  `material_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '品种',
  `material_okng` tinyint(1) DEFAULT NULL COMMENT '是否合格',
  `material_kitting` tinyint(1) DEFAULT NULL COMMENT '是否齐套',
  `material_admin` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '物管员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `material`
--

INSERT INTO `material` (`order_id`, `material_come`, `material_volume`, `material_type`, `material_okng`, `material_kitting`, `material_admin`) VALUES
('TL20190001', '2019-12-24', 200, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `operator`
--

CREATE TABLE `operator` (
  `operator_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `operator_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `operator`
--

INSERT INTO `operator` (`operator_id`, `operator_name`) VALUES
('1', '订单管理员'),
('2', '物料管理员'),
('3', '工艺管理员'),
('4', '仓库管理员'),
('5', 'smt首件管理员'),
('6', 'smt管理员'),
('7', 'dip首件管理员'),
('8', 'dip管理员'),
('9', 'cleaning管理员'),
('10', 'glue管理员'),
('11', '打码员');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_client` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `order_start` date DEFAULT NULL,
  `order_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_type`, `order_volume`, `order_client`, `order_start`, `order_end`) VALUES
('TL20190001', 'PCB', '件', '3123', '十四所', '2019-12-19', '2019-12-19'),
('TL2020000', '航天电子板', '2000', 'AAA2', '十四所', '2019-10-30', '2019-10-15'),
('TL230001', 'AA', '件', '10000', '十四所', '2019-12-10', '2019-12-13');

-- --------------------------------------------------------

--
-- 表的结构 `problem`
--

CREATE TABLE `problem` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `feedback_date` date DEFAULT NULL COMMENT '反馈日期',
  `feedback` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '反馈者',
  `problem_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '问题类型',
  `problem_description` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '问题描述',
  `solving_time` date DEFAULT NULL COMMENT '要求解决时间',
  `solution` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '解决措施',
  `problem_responsible` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '相关责任人'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `problem`
--

INSERT INTO `problem` (`order_id`, `feedback_date`, `feedback`, `problem_type`, `problem_description`, `solving_time`, `solution`, `problem_responsible`) VALUES
('TL230001', '2020-02-12', 's', 'ssss', '一二三', '2020-02-14', 'ssssssss', 'ssss');

-- --------------------------------------------------------

--
-- 表的结构 `process`
--

CREATE TABLE `process` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `bom` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'bom版本',
  `stencil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '网板号',
  `tooling` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '工装',
  `personal_allocation` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '人力配置',
  `process_confirmation_data` date DEFAULT NULL COMMENT '确认日期',
  `process_confirmor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '确认者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `process`
--

INSERT INTO `process` (`order_id`, `bom`, `stencil`, `tooling`, `personal_allocation`, `process_confirmation_data`, `process_confirmor`) VALUES
('TL20190001', '2', '1', '1', '3', '2019-10-10', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `product_receive_date` date DEFAULT NULL COMMENT '接料日期',
  `product_receiver` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '接收者',
  `product_pack_date` date DEFAULT NULL COMMENT '包装日期',
  `product_packer` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '包装者',
  `product_pack_volume` int(11) DEFAULT NULL COMMENT '包装数量',
  `product_deliver` date DEFAULT NULL COMMENT '出库日期',
  `product_deliver_volume` int(11) DEFAULT NULL COMMENT '出库量',
  `product_shipper` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '发货人'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`order_id`, `product_receive_date`, `product_receiver`, `product_pack_date`, `product_packer`, `product_pack_volume`, `product_deliver`, `product_deliver_volume`, `product_shipper`) VALUES
('TL230001', '2020-02-14', 'AS', '2020-02-15', 'AS', 12, '2020-02-20', 23, 'AS');

-- --------------------------------------------------------

--
-- 表的结构 `quality`
--

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
  `quality_inspection_date` date DEFAULT NULL COMMENT '检验确认日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `quality`
--

INSERT INTO `quality` (`order_id`, `quality_first_date`, `quality_first_inspection`, `quality_first_confirm`, `quality_batch_inspect`, `quality_inspection`, `quality_OK_volume`, `quality_NG_volume`, `quality_inspection_confirm`, `quality_inspection_date`) VALUES
('TL230001', '2020-02-20', '2', '2', '2020-02-22', '2', 2, 2, '2', '2020-02-27');

-- --------------------------------------------------------

--
-- 表的结构 `smt`
--

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
  `smt_turn_volume` int(11) DEFAULT NULL COMMENT '转序量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `smt`
--

INSERT INTO `smt` (`order_id`, `smt_get`, `smt_readiness`, `smt_line`, `smt_classes`, `smt_first_start`, `smt_first_end`, `smt_first_opertor`, `smt_batch_completion`, `smt_batch_end`, `smt_opertor`, `smt_turn_department`, `smt_turn_volume`) VALUES
('TL230001', '2020-02-04', '1', '2', '1', '2020-02-06', '2020-02-12', '2', '1', '2020-02-21', '1', '1', 1),
('TL2020000', '2020-02-11', '1', '1', '1', '2020-02-07', '2020-02-08', '1', '1', '2020-02-14', '1', '1', 1),
('TL20190001', '2020-02-03', '2', '2', '2', '2020-02-05', '2020-02-07', '2', '2', '2020-02-14', '2', '2', 2),
('3', '2020-02-05', '3', '3', '3', NULL, NULL, '3', '3', NULL, '3', '3', 3),
('4', NULL, '4', '4', '4', NULL, NULL, '4', '4', NULL, '4', '4', 4),
('5', NULL, '5', '5', '5', NULL, NULL, '5', '5', NULL, '5', '5', 5);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `admin` bit(1) DEFAULT b'0',
  `order` bit(1) DEFAULT b'0',
  `usable` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `admin`, `order`, `usable`) VALUES
(1, 'admin', 'admin', b'1', b'1', b'1'),
(2, '1', '1', b'0', b'0', b'1'),
(3, '123', '123', b'0', b'0', b'1'),
(4, '12', '123', b'0', b'0', b'0'),
(5, 'test', '1', b'0', b'0', b'0'),
(6, '物料管理', '1', b'0', b'0', b'1');

-- --------------------------------------------------------

--
-- 表的结构 `usertable`
--

CREATE TABLE `usertable` (
  `id` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `warehouse`
--

CREATE TABLE `warehouse` (
  `order_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `warehouse_place` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '存放货位号',
  `warehouse_kitting` tinyint(1) DEFAULT NULL COMMENT '是否齐套',
  `warehouse_preprocessing` tinyint(1) DEFAULT NULL COMMENT '有无预处理',
  `warehouse_keeper` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '库管员',
  `warehouse_turn_department` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序部门',
  `warehouse_turn_volume` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序量',
  `warehouse_turn_date` date DEFAULT NULL COMMENT '转序日期',
  `warehouse_turn_group` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '转序班组'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `warehouse`
--

INSERT INTO `warehouse` (`order_id`, `warehouse_place`, `warehouse_kitting`, `warehouse_preprocessing`, `warehouse_keeper`, `warehouse_turn_department`, `warehouse_turn_volume`, `warehouse_turn_date`, `warehouse_turn_group`) VALUES
('TL20190001', '1800', 1, 0, '2019-10-19', 'SMT', 'DIP', '2019-12-25', '1800');

--
-- 转储表的索引
--

--
-- 表的索引 `addition`
--
ALTER TABLE `addition`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `dip`
--
ALTER TABLE `dip`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `glue`
--
ALTER TABLE `glue`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE;

--
-- 表的索引 `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `smt`
--
ALTER TABLE `smt`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- 表的索引 `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`order_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
