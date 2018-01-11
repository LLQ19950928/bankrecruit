/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : recruit

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-01-11 17:25:25
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
  `recruit_company_id` int(11) NOT NULL DEFAULT '1' COMMENT '招聘机构id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of announce
-- ----------------------------

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bonus_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '奖励类别：0表示校内奖励，1表示校外奖励',
  `bonus_belong` tinyint(4) NOT NULL DEFAULT '0' COMMENT '奖励归属：0表示个人，1表示集体',
  `bonus_company` varchar(100) NOT NULL DEFAULT '' COMMENT '奖励单位',
  `bonus_name` varchar(255) NOT NULL DEFAULT '' COMMENT '奖励名称',
  `bonus_date` int(11) NOT NULL DEFAULT '0' COMMENT '奖励时间',
  `resume_id` int(11) NOT NULL DEFAULT '0' COMMENT '简历id',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of bonus
-- ----------------------------
INSERT INTO `bonus` VALUES ('2', '0', '0', '仲恺', '三好学生', '1', '1', '1515651577', '1515651577');
INSERT INTO `bonus` VALUES ('3', '0', '0', '企业123', '三等奖', '1', '1', '1515651599', '1515651963');

-- ----------------------------
-- Table structure for certificate
-- ----------------------------
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '证书名称',
  `type_id` int(11) NOT NULL DEFAULT '1' COMMENT '语言类别的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of certificate
-- ----------------------------
INSERT INTO `certificate` VALUES ('1', 'CET4', '1');
INSERT INTO `certificate` VALUES ('2', 'CET6', '1');

-- ----------------------------
-- Table structure for credit
-- ----------------------------
DROP TABLE IF EXISTS `credit`;
CREATE TABLE `credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_count` int(11) NOT NULL DEFAULT '0' COMMENT '课程数量',
  `total_credit` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '总学分',
  `gpa` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '学分绩点',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of credit
-- ----------------------------
INSERT INTO `credit` VALUES ('2', '30', '90.00', '3.00', '1515640606', '1515640606');
INSERT INTO `credit` VALUES ('3', '30', '190.00', '6.00', '1515640749', '1515640749');
INSERT INTO `credit` VALUES ('4', '30', '190.00', '5.00', '1515640869', '1515640869');
INSERT INTO `credit` VALUES ('5', '30', '190.30', '4.70', '1515641435', '1515641435');

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
  `school_name` tinyint(4) NOT NULL DEFAULT '0' COMMENT '学校名称',
  `academy_name` varchar(20) NOT NULL DEFAULT '' COMMENT '院系',
  `profession_name` varchar(20) NOT NULL DEFAULT '' COMMENT '专业',
  `train_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '培养方式',
  `education_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教育类型',
  `resume_id` int(11) NOT NULL DEFAULT '0' COMMENT '简历id',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES ('1', '4', '2', '1515384484', '1515384484', '1', '1', '计算科学学院', '软件工程', '1', '1', '1', '1515384484', '1515557391');
INSERT INTO `education` VALUES ('7', '1', '1', '1515384484', '1515384484', '1', '1', '计算科学学院', '软件工程', '1', '1', '1', '1515398501', '1515398501');

-- ----------------------------
-- Table structure for education_type
-- ----------------------------
DROP TABLE IF EXISTS `education_type`;
CREATE TABLE `education_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '教育类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of education_type
-- ----------------------------
INSERT INTO `education_type` VALUES ('1', '全日制');
INSERT INTO `education_type` VALUES ('2', '在职');
INSERT INTO `education_type` VALUES ('3', '成人教育');
INSERT INTO `education_type` VALUES ('4', '电大');

-- ----------------------------
-- Table structure for evaluate
-- ----------------------------
DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluate` varchar(500) NOT NULL DEFAULT '' COMMENT '自我评价',
  `user_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of evaluate
-- ----------------------------

-- ----------------------------
-- Table structure for family_member
-- ----------------------------
DROP TABLE IF EXISTS `family_member`;
CREATE TABLE `family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call` tinyint(4) NOT NULL DEFAULT '0' COMMENT '家庭称谓：0表示父亲，1表示母亲，2表示其他',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `broth_at` int(11) NOT NULL DEFAULT '0' COMMENT '出生年月',
  `company` varchar(20) NOT NULL DEFAULT '' COMMENT '工作单位',
  `job` varchar(100) NOT NULL DEFAULT '' COMMENT '担任职务',
  `resume_id` int(11) NOT NULL DEFAULT '0' COMMENT '简历id',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of family_member
-- ----------------------------

-- ----------------------------
-- Table structure for h_degree
-- ----------------------------
DROP TABLE IF EXISTS `h_degree`;
CREATE TABLE `h_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '' COMMENT '最高学历名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of h_degree
-- ----------------------------
INSERT INTO `h_degree` VALUES ('1', '学士');
INSERT INTO `h_degree` VALUES ('2', '硕士');
INSERT INTO `h_degree` VALUES ('3', '博士');

-- ----------------------------
-- Table structure for h_education
-- ----------------------------
DROP TABLE IF EXISTS `h_education`;
CREATE TABLE `h_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '' COMMENT '最高学位',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of h_education
-- ----------------------------
INSERT INTO `h_education` VALUES ('1', '高中');
INSERT INTO `h_education` VALUES ('2', '高职');
INSERT INTO `h_education` VALUES ('3', '中专');
INSERT INTO `h_education` VALUES ('4', '大学本科');

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(50) NOT NULL DEFAULT '' COMMENT '职位名称',
  `work_place` varchar(200) NOT NULL DEFAULT '' COMMENT '工作地点，多个地点以“，”分隔',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '联系方式',
  `work_at_id` int(11) NOT NULL DEFAULT '1' COMMENT '招聘单位',
  `published_at` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `end_at` int(11) NOT NULL DEFAULT '0' COMMENT '截止日期',
  `job_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '招聘类型：0表示校园招聘，1表示社会招聘',
  `duty` varchar(1000) NOT NULL DEFAULT '' COMMENT '工作职责',
  `job_condition` varchar(1000) NOT NULL DEFAULT '' COMMENT '应聘条件',
  `job_people` int(11) NOT NULL DEFAULT '0' COMMENT '招聘人数',
  `recruit_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '招聘类别',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '招聘状态：0表示未发布，1表示已发布，2表示删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of job
-- ----------------------------

-- ----------------------------
-- Table structure for language
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` tinyint(4) NOT NULL DEFAULT '0' COMMENT '外语顺序：0表示第一外语，1表示第二外语',
  `type_id` tinyint(4) NOT NULL DEFAULT '1' COMMENT '外语类别：1表示英语',
  `grade` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '外语成绩',
  `acquire_date` int(11) NOT NULL DEFAULT '0' COMMENT '获证日期',
  `certificate_level_id` int(11) NOT NULL DEFAULT '1' COMMENT '证书级别的id',
  `content` varchar(500) DEFAULT NULL COMMENT '对该语种能力的描述',
  `resume_id` int(11) NOT NULL DEFAULT '1' COMMENT '简历id',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('1', '1', '1', '470', '1', '1', null, '1', '1515576838', '1515577424');

-- ----------------------------
-- Table structure for language_type
-- ----------------------------
DROP TABLE IF EXISTS `language_type`;
CREATE TABLE `language_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(10) NOT NULL DEFAULT '' COMMENT '语言名称，如：英语',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of language_type
-- ----------------------------
INSERT INTO `language_type` VALUES ('1', '英语');
INSERT INTO `language_type` VALUES ('2', '日语');
INSERT INTO `language_type` VALUES ('3', '法语');
INSERT INTO `language_type` VALUES ('4', '德语');

-- ----------------------------
-- Table structure for nation
-- ----------------------------
DROP TABLE IF EXISTS `nation`;
CREATE TABLE `nation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nation` varchar(6) NOT NULL DEFAULT '' COMMENT '民族名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of nation
-- ----------------------------
INSERT INTO `nation` VALUES ('1', '汉族');
INSERT INTO `nation` VALUES ('2', '满族');
INSERT INTO `nation` VALUES ('3', '壮族');
INSERT INTO `nation` VALUES ('4', '畲族');

-- ----------------------------
-- Table structure for polity
-- ----------------------------
DROP TABLE IF EXISTS `polity`;
CREATE TABLE `polity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `political_name` varchar(20) NOT NULL DEFAULT '' COMMENT '政治面貌',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of polity
-- ----------------------------
INSERT INTO `polity` VALUES ('1', '群众');
INSERT INTO `polity` VALUES ('2', '中共预备党员');
INSERT INTO `polity` VALUES ('3', '共青团员');
INSERT INTO `polity` VALUES ('4', '中共党员');

-- ----------------------------
-- Table structure for practice
-- ----------------------------
DROP TABLE IF EXISTS `practice`;
CREATE TABLE `practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `practice_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '实践类别',
  `start_date` int(11) NOT NULL DEFAULT '0' COMMENT '开始日期',
  `end_date` int(11) NOT NULL DEFAULT '0' COMMENT '结束日期',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '工作单位',
  `department` varchar(100) NOT NULL DEFAULT '' COMMENT '工作部门',
  `describe` varchar(500) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '求职者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of practice
-- ----------------------------

-- ----------------------------
-- Table structure for punishment
-- ----------------------------
DROP TABLE IF EXISTS `punishment`;
CREATE TABLE `punishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `punish_name` varchar(100) NOT NULL DEFAULT '' COMMENT '处分名称',
  `punish_company` varchar(255) NOT NULL DEFAULT '' COMMENT '处分单位',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `resume_id` int(11) NOT NULL DEFAULT '1' COMMENT '简历id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of punishment
-- ----------------------------
INSERT INTO `punishment` VALUES ('1', '考试作弊', '学校', '1515655091', '1515655091', '1');
INSERT INTO `punishment` VALUES ('2', '打架', '学校234', '1515655196', '1515656322', '1');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '提问内容',
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '提问者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of question
-- ----------------------------

-- ----------------------------
-- Table structure for recruit_project
-- ----------------------------
DROP TABLE IF EXISTS `recruit_project`;
CREATE TABLE `recruit_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recruit_company_id` int(11) NOT NULL DEFAULT '1' COMMENT '招聘机构',
  `recruit_option` varchar(100) NOT NULL DEFAULT '' COMMENT '招聘事项',
  `current_stage` tinyint(4) NOT NULL DEFAULT '0' COMMENT '当前阶段',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of recruit_project
-- ----------------------------

-- ----------------------------
-- Table structure for recurit_company
-- ----------------------------
DROP TABLE IF EXISTS `recurit_company`;
CREATE TABLE `recurit_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recruit_company` varchar(20) NOT NULL DEFAULT '' COMMENT '招聘机构',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of recurit_company
-- ----------------------------

-- ----------------------------
-- Table structure for school_location
-- ----------------------------
DROP TABLE IF EXISTS `school_location`;
CREATE TABLE `school_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(10) NOT NULL DEFAULT '' COMMENT '学校属地',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of school_location
-- ----------------------------
INSERT INTO `school_location` VALUES ('1', '广东省');
INSERT INTO `school_location` VALUES ('2', '北京市');
INSERT INTO `school_location` VALUES ('3', '上海市');
INSERT INTO `school_location` VALUES ('4', '江苏省');
INSERT INTO `school_location` VALUES ('5', '浙江省');

-- ----------------------------
-- Table structure for school_name
-- ----------------------------
DROP TABLE IF EXISTS `school_name`;
CREATE TABLE `school_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(20) NOT NULL DEFAULT '' COMMENT '学校名称',
  `location_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of school_name
-- ----------------------------
INSERT INTO `school_name` VALUES ('1', '中山大学', '1');
INSERT INTO `school_name` VALUES ('2', '华南理工大学', '1');
INSERT INTO `school_name` VALUES ('3', '华南农业大学', '1');
INSERT INTO `school_name` VALUES ('4', '仲恺农业工程学院', '1');

-- ----------------------------
-- Table structure for school_resume
-- ----------------------------
DROP TABLE IF EXISTS `school_resume`;
CREATE TABLE `school_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL DEFAULT '0' COMMENT '个人基本信息id',
  `credit_id` int(11) NOT NULL DEFAULT '0' COMMENT '学分绩点id',
  `practice_id` int(11) NOT NULL DEFAULT '0' COMMENT '社会实践id',
  `skill_id` int(11) NOT NULL DEFAULT '0' COMMENT '技能id',
  `evaluate_id` int(11) NOT NULL DEFAULT '0' COMMENT '自我评价id',
  `resume_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '简历类型：0表示校园招聘简历，1表示社会招聘简历',
  `resume_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '简历状态：0表示未提交，1表示提交',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of school_resume
-- ----------------------------
INSERT INTO `school_resume` VALUES ('1', '1', '5', '0', '0', '0', '0', '0', '4', '1515378130', '1515641435');

-- ----------------------------
-- Table structure for skill
-- ----------------------------
DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(100) NOT NULL DEFAULT '' COMMENT '技能名称',
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '求职者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of skill
-- ----------------------------

-- ----------------------------
-- Table structure for social_resume
-- ----------------------------
DROP TABLE IF EXISTS `social_resume`;
CREATE TABLE `social_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of social_resume
-- ----------------------------

-- ----------------------------
-- Table structure for train_type
-- ----------------------------
DROP TABLE IF EXISTS `train_type`;
CREATE TABLE `train_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT '' COMMENT '培养方式名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of train_type
-- ----------------------------
INSERT INTO `train_type` VALUES ('1', '统分');
INSERT INTO `train_type` VALUES ('2', '自筹');
INSERT INTO `train_type` VALUES ('3', '定向');

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
  `resume_type` int(11) NOT NULL DEFAULT '0' COMMENT '简历类型',
  `highest_education` int(11) NOT NULL DEFAULT '0' COMMENT '最高学位',
  `highest_degree` int(11) NOT NULL DEFAULT '0' COMMENT '最高学历',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('4', 'llq', '刘柳青', '2844019004@qq.com', '0', '18814142219', '$2y$10$umgZ14Lj5hrBAFf66USS9OObdelUECGE4WfUfsjJVEClogm2P9sgO', '0', '0', '1515378130', '1515383776', '0', '1', '1');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `borth_at` varchar(12) NOT NULL DEFAULT '' COMMENT '出生年月',
  `gender` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别：0表示男，1表示女',
  `nation` tinyint(5) NOT NULL DEFAULT '0' COMMENT '民族',
  `family_at` varchar(100) NOT NULL DEFAULT '' COMMENT '家庭常住地',
  `place_of_origin` varchar(100) NOT NULL DEFAULT '' COMMENT '籍贯',
  `marry` tinyint(4) NOT NULL DEFAULT '0' COMMENT '婚姻状况',
  `political_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '政治面貌',
  `id_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '证件类别',
  `id_number` varchar(100) NOT NULL DEFAULT '' COMMENT '证件号码',
  `phone_number` varchar(20) NOT NULL DEFAULT '' COMMENT '联系方式',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '刘柳青', '1995-09-28', '0', '1', '广东/梅州/梅江区', '广东/梅州/梅江区', '0', '0', '0', '0', '18814142219', '1515378885', '1515378885');
