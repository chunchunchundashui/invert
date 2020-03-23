/*
 Navicat Premium Data Transfer

 Source Server         : changchun
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : inver

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 23/03/2020 13:22:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `teacher_id` smallint(3) NOT NULL COMMENT '老师id',
  `local_id` smallint(3) NOT NULL COMMENT '班级id',
  `personnel_id` smallint(3) NOT NULL COMMENT '调查类型id',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '评论类荣',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 124 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for local
-- ----------------------------
DROP TABLE IF EXISTS `local`;
CREATE TABLE `local`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `teacher_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '关联任课老师id',
  `teacher_class` tinyint(4) NOT NULL COMMENT '班主任关联id',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '班级' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for main
-- ----------------------------
DROP TABLE IF EXISTS `main`;
CREATE TABLE `main`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `mname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '这个是他的老师分类的名字',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '老师的类型' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for manag
-- ----------------------------
DROP TABLE IF EXISTS `manag`;
CREATE TABLE `manag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `mname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '查询分组',
  `personnel_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '状态',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '学校分类的各种管理,主要用于调查题目分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personnel
-- ----------------------------
DROP TABLE IF EXISTS `personnel`;
CREATE TABLE `personnel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '人员类型',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = '这个是人员类型' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `pname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '职位名称',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '老师的类型' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tanswer
-- ----------------------------
DROP TABLE IF EXISTS `tanswer`;
CREATE TABLE `tanswer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `topic_id` int(11) NOT NULL COMMENT '题目名称(外键)',
  `personnel_id` int(11) NOT NULL DEFAULT 0 COMMENT '类型名称(外键)',
  `local_id` int(11) NOT NULL COMMENT '班级名称(外键)',
  `teacher_id` int(11) NOT NULL DEFAULT 0 COMMENT '老师名称(外键)',
  `achievement` int(11) NOT NULL COMMENT '成绩',
  `browse` int(11) NOT NULL DEFAULT 0 COMMENT '浏览人数',
  `status` tinyint(4) NOT NULL COMMENT '状态',
  `time` int(4) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `personnel_id`(`personnel_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1251 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '学生综合管理表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `tname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名称',
  `main_id` tinyint(4) NOT NULL COMMENT '老师的类型：是不是班主任或者任课老师还是员工 1：班主任 2：任课老师 3：员工',
  `position_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '老师职位外键',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '是否显示@radio|1=是,0=否',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '老师' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for topic
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `personnel_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '人员类型ID',
  `manag_id` int(11) NULL DEFAULT NULL COMMENT '题目的分类表',
  `topic` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '题目',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '调查的题目添加' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号',
  `pwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '密码',
  `status` smallint(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1000000 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
