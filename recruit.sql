/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : recruit

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-01-04 17:00:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for announce
-- ----------------------------
DROP TABLE IF EXISTS `announce`;
CREATE TABLE `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '公告标题',
  `content` varchar(7000) NOT NULL DEFAULT '' COMMENT '公告内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '公告状态：0表示未发布，1表示发布，2表示删除',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '公告创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `published_at` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of announce
-- ----------------------------

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acquire_education` tinyint(4) NOT NULL DEFAULT '0' COMMENT '取得学历',
  `acquire_degree` tinyint(4) NOT NULL DEFAULT '0' COMMENT '获得学位',
  `entrance_time` int(11) NOT NULL DEFAULT '0' COMMENT '入学时间',
  `graduation_time` int(11) NOT NULL DEFAULT '0' COMMENT '毕业时间',
  `school_location` tinyint(4) NOT NULL DEFAULT '0' COMMENT '学校属地',
  `academy_name` varchar(20) DEFAULT NULL COMMENT '院系',
  `profession_name` varchar(20) DEFAULT NULL COMMENT '专业',
  `train_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '培养方式',
  `education_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教育类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of education
-- ----------------------------

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(50) NOT NULL DEFAULT '' COMMENT '职位名称',
  `work_place` varchar(200) NOT NULL DEFAULT '' COMMENT '工作地点，多个地点以“，”分隔',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '联系方式',
  `work_at` varchar(100) NOT NULL DEFAULT '' COMMENT '招聘单位',
  `published_at` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `end_at` int(11) NOT NULL DEFAULT '0' COMMENT '截止日期',
  `job_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '招聘类型：0表示校园招聘，1表示社会招聘',
  `duty` varchar(1000) NOT NULL DEFAULT '' COMMENT '工作职责',
  `job_condition` varchar(1000) NOT NULL DEFAULT '' COMMENT '应聘条件',
  `job_people` int(11) NOT NULL DEFAULT '0' COMMENT '招聘人数',
  `recruit_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '招聘类别',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of job
-- ----------------------------

-- ----------------------------
-- Table structure for resume
-- ----------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `borth_at` varchar(12) NOT NULL DEFAULT '' COMMENT '出生年月',
  `gender` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别：0表示男，1表示女',
  `nation` varchar(5) NOT NULL DEFAULT '' COMMENT '民族',
  `family_at` varchar(20) NOT NULL DEFAULT '' COMMENT '家庭常住地',
  `place_of_origin` varchar(20) NOT NULL DEFAULT '' COMMENT '籍贯',
  `marry` tinyint(4) NOT NULL DEFAULT '0' COMMENT '婚姻状况',
  `political_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '政治面貌',
  `id_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '证件类别',
  `id_number` varchar(100) NOT NULL DEFAULT '' COMMENT '证件类别',
  `phone_number` varchar(20) NOT NULL DEFAULT '' COMMENT '联系方式',
  `highest_education` tinyint(4) NOT NULL DEFAULT '0' COMMENT '最高学历',
  `highest_degree` tinyint(4) NOT NULL DEFAULT '0' COMMENT '最高学位',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of resume
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(40) NOT NULL DEFAULT '' COMMENT '邮箱地址',
  `gender` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别，0表示女，1表示男',
  `phone` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `password` varchar(70) NOT NULL DEFAULT '' COMMENT '密码',
  `certificates_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0表示身份证，1表示护照，2表示港澳身份证',
  `certificates_number` varchar(18) NOT NULL DEFAULT '' COMMENT '证件号码',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
