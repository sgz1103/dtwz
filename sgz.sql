/*
 Navicat Premium Data Transfer

 Source Server         : admin
 Source Server Type    : MySQL
 Source Server Version : 80300 (8.3.0)
 Source Host           : localhost:3306
 Source Schema         : sgz

 Target Server Type    : MySQL
 Target Server Version : 80300 (8.3.0)
 File Encoding         : 65001

 Date: 31/10/2024 16:05:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `type` int NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES (1, '新闻1', '12345678', 1, '2024-09-12 13:45:36');
INSERT INTO `message` VALUES (2, '新闻2', '987465123', 1, '2024-09-12 13:45:47');
INSERT INTO `message` VALUES (14, '音乐2', '95271435614', 2, '2024-10-10 13:20:56');
INSERT INTO `message` VALUES (13, '音乐1', '11034011', 2, '2024-09-28 09:45:18');
INSERT INTO `message` VALUES (6, '孙贵尊', '学习动态网站设计，深感其魅力与挑战并存。从技术的探索到创意的展现，过程虽充满困难，但每一次突破都带来巨大成就感。它让我明白不断学习和创新的重要性，也激发了我对互联网世界的更多好奇与探索热情。', 1, '2024-09-14 16:23:14');
INSERT INTO `message` VALUES (7, '新闻4', '99656', 1, '2024-09-28 09:45:08');
INSERT INTO `message` VALUES (18, '1', '21', 1, '2024-10-10 15:11:42');
INSERT INTO `message` VALUES (19, '2', '312', 1, '2024-10-10 15:11:46');
INSERT INTO `message` VALUES (20, '3', '32134', 1, '2024-10-10 15:11:49');
INSERT INTO `message` VALUES (21, '234', '4132', 1, '2024-10-10 15:11:52');
INSERT INTO `message` VALUES (22, '4324', '342', 1, '2024-10-10 15:11:54');
INSERT INTO `message` VALUES (23, '4234', '234', 1, '2024-10-10 15:11:57');
INSERT INTO `message` VALUES (24, '2434', '324', 1, '2024-10-10 15:11:59');
INSERT INTO `message` VALUES (25, '4234', '324', 1, '2024-10-10 15:12:02');
INSERT INTO `message` VALUES (26, '32423', '32423', 1, '2024-10-10 15:12:05');
INSERT INTO `message` VALUES (27, '342', '', 1, '2024-10-10 15:12:07');
INSERT INTO `message` VALUES (28, '2434', '2342', 1, '2024-10-10 15:12:11');
INSERT INTO `message` VALUES (29, '1', '1', 2, '2024-10-14 09:26:15');
INSERT INTO `message` VALUES (30, '2', '2', 2, '2024-10-14 09:26:17');
INSERT INTO `message` VALUES (31, '3', '3', 2, '2024-10-14 09:26:20');
INSERT INTO `message` VALUES (32, '4', '4', 2, '2024-10-14 09:26:23');
INSERT INTO `message` VALUES (33, '5', '5', 2, '2024-10-14 09:26:28');
INSERT INTO `message` VALUES (34, '6', '6', 2, '2024-10-14 09:26:31');
INSERT INTO `message` VALUES (35, '7', '7', 2, '2024-10-14 09:26:34');
INSERT INTO `message` VALUES (36, '8', '8', 2, '2024-10-14 09:26:36');
INSERT INTO `message` VALUES (37, '9', '9', 2, '2024-10-14 09:26:40');
INSERT INTO `message` VALUES (38, '10', '10', 2, '2024-10-14 09:26:46');
INSERT INTO `message` VALUES (39, '11', '11', 2, '2024-10-14 09:26:49');
INSERT INTO `message` VALUES (40, '12', '12', 2, '2024-10-14 09:26:52');
INSERT INTO `message` VALUES (41, '13', '13', 2, '2024-10-14 09:26:56');
INSERT INTO `message` VALUES (47, 'wqw', 'ewfW', 1, '2024-10-20 22:06:06');
INSERT INTO `message` VALUES (43, '1', '1', 1, '2024-10-18 16:17:01');
INSERT INTO `message` VALUES (44, '1', '1', 1, '2024-10-18 16:17:05');
INSERT INTO `message` VALUES (45, '2', '2', 1, '2024-10-18 16:17:08');
INSERT INTO `message` VALUES (46, '21', '12', 1, '2024-10-18 16:17:11');
INSERT INTO `message` VALUES (48, 'FEWFW', 'RFW', 1, '2024-10-20 22:06:09');

SET FOREIGN_KEY_CHECKS = 1;
