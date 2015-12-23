/*
Navicat MySQL Data Transfer

Source Server         : XAMPP
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : db_uploads

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-24 22:50:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_image`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_image`;
CREATE TABLE `tbl_image` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_image
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_images`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_images`;
CREATE TABLE `tbl_images` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_images
-- ----------------------------
