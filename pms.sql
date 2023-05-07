/*
 Navicat Premium Data Transfer

 Source Server         : Mysql-docker
 Source Server Type    : MySQL
 Source Server Version : 50742 (5.7.42)
 Source Host           : localhost:3306
 Source Schema         : pms

 Target Server Type    : MySQL
 Target Server Version : 50742 (5.7.42)
 File Encoding         : 65001

 Date: 07/05/2023 12:19:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses`  (
  `expenses_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสธุรกรรม',
  `expenses_type` int(11) NULL DEFAULT NULL COMMENT 'รหัสชนิด',
  `expenses_category_date` datetime NOT NULL COMMENT 'วันที่ทำธุรกรรม',
  `expenses_category_Fk` int(11) NULL DEFAULT NULL COMMENT 'รหัสประเภท',
  `expenses_amount` decimal(10, 2) NULL DEFAULT NULL COMMENT 'จำนวนเงิน',
  `create_time` timestamp NULL DEFAULT NULL COMMENT 'วันที่สร้าง',
  `update_time` timestamp NULL DEFAULT NULL COMMENT 'วันที่อัพเดทข้อมูล',
  PRIMARY KEY (`expenses_id`) USING BTREE,
  INDEX `fk_expenses_category`(`expenses_category_Fk`) USING BTREE,
  INDEX `fk_expenses_type`(`expenses_type`) USING BTREE,
  CONSTRAINT `fk_expenses_category` FOREIGN KEY (`expenses_category_Fk`) REFERENCES `expenses_category` (`expenses_category_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_expenses_type` FOREIGN KEY (`expenses_type`) REFERENCES `expenses_type` (`expenses_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenses
-- ----------------------------
INSERT INTO `expenses` VALUES (2, 1, '2023-05-01 00:00:00', 1, 10000.00, '2023-05-03 04:54:09', '2023-05-06 09:36:31');
INSERT INTO `expenses` VALUES (3, 1, '2023-04-26 00:00:00', 1, 1270.00, '2023-05-03 04:54:09', '2023-05-03 04:54:09');
INSERT INTO `expenses` VALUES (4, 1, '2023-05-03 00:00:00', 2, 5000.00, '2023-05-03 04:54:09', '2023-05-03 04:54:09');
INSERT INTO `expenses` VALUES (5, 1, '2023-05-03 00:00:00', 1, 600.00, '2023-05-03 11:33:12', '2023-05-03 11:33:12');
INSERT INTO `expenses` VALUES (6, 2, '2023-05-03 11:40:00', 1, 6000.00, '2023-05-03 04:54:09', '2023-05-03 04:54:09');
INSERT INTO `expenses` VALUES (7, 3, '2023-05-07 11:00:00', 2, 5000.00, '2023-05-07 04:04:44', '2023-05-07 04:04:44');

-- ----------------------------
-- Table structure for expenses_category
-- ----------------------------
DROP TABLE IF EXISTS `expenses_category`;
CREATE TABLE `expenses_category`  (
  `expenses_category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทค่าใช้จ่าย',
  `expenses_category_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อประเภทค่าใช้จ่าย',
  PRIMARY KEY (`expenses_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenses_category
-- ----------------------------
INSERT INTO `expenses_category` VALUES (1, 'เงินเดือน');
INSERT INTO `expenses_category` VALUES (2, 'ค่าเช่าห้อง');

-- ----------------------------
-- Table structure for expenses_type
-- ----------------------------
DROP TABLE IF EXISTS `expenses_type`;
CREATE TABLE `expenses_type`  (
  `expenses_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสชนิด',
  `expenses_type_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อชนิด',
  PRIMARY KEY (`expenses_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenses_type
-- ----------------------------
INSERT INTO `expenses_type` VALUES (1, 'รายรับ');
INSERT INTO `expenses_type` VALUES (2, 'รายจ่าย');
INSERT INTO `expenses_type` VALUES (3, 'หนี้สิน');

-- ----------------------------
-- Table structure for investment
-- ----------------------------
DROP TABLE IF EXISTS `investment`;
CREATE TABLE `investment`  (
  `investment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสธุรกรรม',
  `investment_date` datetime NOT NULL COMMENT 'วันที่ทำธุรกรรม',
  `investment_type_fk` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `investment_amount` decimal(10, 2) NOT NULL COMMENT 'จำนวนเงิน',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'สร้างข้อมูลเมื่อ',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'อัพเดทข้อมูลเมื่อ',
  PRIMARY KEY (`investment_id`) USING BTREE,
  INDEX `fk_investment_type`(`investment_type_fk`) USING BTREE,
  CONSTRAINT `fk_investment_type` FOREIGN KEY (`investment_type_fk`) REFERENCES `investment_type` (`investment_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'การลงทุน' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of investment
-- ----------------------------
INSERT INTO `investment` VALUES (1, '2023-05-03 13:14:00', 1, 24000.00, '2023-05-03 06:14:26', '2023-05-03 06:25:49');
INSERT INTO `investment` VALUES (2, '2023-05-03 13:31:00', 2, 5000.00, '2023-05-03 06:32:04', '2023-05-03 06:32:04');

-- ----------------------------
-- Table structure for investment_type
-- ----------------------------
DROP TABLE IF EXISTS `investment_type`;
CREATE TABLE `investment_type`  (
  `investment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `investment_type_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ประเภทการลงทุน',
  PRIMARY KEY (`investment_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'ประเภทการลงทุน' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of investment_type
-- ----------------------------
INSERT INTO `investment_type` VALUES (1, 'ประกัน');
INSERT INTO `investment_type` VALUES (2, 'หุ้น');
INSERT INTO `investment_type` VALUES (3, 'กองทุน');

-- ----------------------------
-- Table structure for learning
-- ----------------------------
DROP TABLE IF EXISTS `learning`;
CREATE TABLE `learning`  (
  `learning_id` int(11) NOT NULL AUTO_INCREMENT,
  `learning_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'โน๊ตการเรียน',
  `learning_status` tinyint(1) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`learning_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'การเรียน' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of learning
-- ----------------------------
INSERT INTO `learning` VALUES (1, 'Learnings Test', 0);
INSERT INTO `learning` VALUES (2, 'Test Learning 2', 1);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1682490289);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1682490292);
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1682490293);
INSERT INTO `migration` VALUES ('m220101_004717_add_profile_column_to_user', 1682490373);
INSERT INTO `migration` VALUES ('m220429_012712_alter_create_at_column_in_user', 1682490375);
INSERT INTO `migration` VALUES ('m220430_012132_insert_default_user', 1682490376);

-- ----------------------------
-- Table structure for todolist
-- ----------------------------
DROP TABLE IF EXISTS `todolist`;
CREATE TABLE `todolist`  (
  `todolist_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสิ่งที่ต้องทำ',
  `todolist_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'โน๊ต',
  `todolist_status` tinyint(1) NOT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`todolist_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'สิ่งที่ต้องทำ' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of todolist
-- ----------------------------
INSERT INTO `todolist` VALUES (1, 'Test1', 1);
INSERT INTO `todolist` VALUES (2, 'Test 2', 0);
INSERT INTO `todolist` VALUES (3, 'Test 2', 0);

-- ----------------------------
-- Table structure for treasurer
-- ----------------------------
DROP TABLE IF EXISTS `treasurer`;
CREATE TABLE `treasurer`  (
  `treasurer_id` int(11) NOT NULL AUTO_INCREMENT,
  `treasurer_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'โน๊ต',
  `treasurer_amount` decimal(10, 2) NOT NULL COMMENT 'จำนวนเงิน',
  `treasurer_expenses_type_Fk` int(11) NOT NULL COMMENT 'รหัสชนิด',
  `treasurer_date` datetime NOT NULL COMMENT 'วันที่ทำธุรกรรม',
  `treasurer_category_Fk` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'สร้างข้อมูลเมื่อ',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'อัพเดทข้อมูลเมื่อ',
  PRIMARY KEY (`treasurer_id`) USING BTREE,
  INDEX `Fk_treasurer_expenses_type`(`treasurer_expenses_type_Fk`) USING BTREE,
  INDEX `Fk_treasurer_category`(`treasurer_category_Fk`) USING BTREE,
  CONSTRAINT `Fk_treasurer_category` FOREIGN KEY (`treasurer_category_Fk`) REFERENCES `treasurer_category` (`treasurer_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Fk_treasurer_expenses_type` FOREIGN KEY (`treasurer_expenses_type_Fk`) REFERENCES `treasurer_type` (`treasurer_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'งานเหรัญญิก' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of treasurer
-- ----------------------------
INSERT INTO `treasurer` VALUES (1, 'เก็บเงินประจำเดือน เมษายน', 100.00, 1, '2023-04-01 05:35:00', 1, '2023-05-06 09:40:20', '2023-05-06 09:40:20');

-- ----------------------------
-- Table structure for treasurer_category
-- ----------------------------
DROP TABLE IF EXISTS `treasurer_category`;
CREATE TABLE `treasurer_category`  (
  `treasurer_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `treasurer_category_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`treasurer_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of treasurer_category
-- ----------------------------
INSERT INTO `treasurer_category` VALUES (1, 'เรียกเก็บค่าห้อง');
INSERT INTO `treasurer_category` VALUES (2, 'ยอดคงค้าง');
INSERT INTO `treasurer_category` VALUES (3, 'ค่าใช้จ่าย');
INSERT INTO `treasurer_category` VALUES (4, 'อื่นๆ');

-- ----------------------------
-- Table structure for treasurer_type
-- ----------------------------
DROP TABLE IF EXISTS `treasurer_type`;
CREATE TABLE `treasurer_type`  (
  `treasurer_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `treasurer_type_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อชนิด',
  PRIMARY KEY (`treasurer_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of treasurer_type
-- ----------------------------
INSERT INTO `treasurer_type` VALUES (1, 'รายรับ');
INSERT INTO `treasurer_type` VALUES (2, 'รายจ่าย');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Your fullname',
  `lname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Your lastname',
  `tel_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` int(2) NOT NULL DEFAULT 1,
  `auth_key` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `isActive` int(1) NOT NULL DEFAULT 1,
  `created_by_user_id` int(11) NOT NULL DEFAULT 1,
  `updated_by_user_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token`) USING BTREE,
  INDEX `fk_user_created_by_user_id`(`created_by_user_id`) USING BTREE,
  INDEX `fk_user_updated_by_user_id`(`updated_by_user_id`) USING BTREE,
  CONSTRAINT `fk_user_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_user_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'ผู้พัฒนา', 'ระดับสูงสุด', '0875548754', 0, 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbA_i', '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS', NULL, 'dev.default@example.com', 10, 1, 1, 1, '2023-04-26 06:26:15', '2023-04-26 06:26:15', NULL);
INSERT INTO `user` VALUES (2, 'satangza159', 'Thanaphol', 'Nantakaset', '0123456789', 0, 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbA_i', '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS', NULL, 'satangza159@gmail.com', 10, 1, 1, 1, '2023-04-26 06:26:15', '2023-04-26 06:26:15', NULL);
INSERT INTO `user` VALUES (3, 'user01', 'ผู้ใช้งาน01', 'ทดสอบ01', '0867542168', 1, 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_b', '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS', NULL, 'user01.default@example.com', 10, 1, 1, 1, '2023-04-26 06:26:15', '2023-04-26 06:26:15', NULL);
INSERT INTO `user` VALUES (4, 'user02', 'ผู้ใช้งาน02', 'ทดสอบ02', '0875554214', 1, 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_c', '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS', NULL, 'user02.default@example.com', 10, 1, 1, 1, '2023-04-26 06:26:16', '2023-04-26 06:26:16', NULL);
INSERT INTO `user` VALUES (5, 'user03', 'ผู้ใช้งาน03', 'ทดสอบ03', '0875456878', 2, 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_d', '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS', NULL, 'user03.default@example.com', 10, 1, 1, 1, '2023-04-26 06:26:16', '2023-04-26 06:26:16', NULL);

-- ----------------------------
-- Table structure for working
-- ----------------------------
DROP TABLE IF EXISTS `working`;
CREATE TABLE `working`  (
  `working_id` int(11) NOT NULL AUTO_INCREMENT,
  `working_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'โน๊ตการทำงาน',
  `working_status` tinyint(1) NOT NULL COMMENT 'สถานะการทำงาน',
  PRIMARY KEY (`working_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'การทำงาน' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of working
-- ----------------------------
INSERT INTO `working` VALUES (1, 'Test Working', 0);
INSERT INTO `working` VALUES (2, 'Test working 2', 1);

SET FOREIGN_KEY_CHECKS = 1;
