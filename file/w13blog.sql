/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : w13blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-01-09 17:04:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `article_title` varchar(200) NOT NULL COMMENT '文章标题',
  `channel_id` int(11) NOT NULL COMMENT '文章推送栏目',
  `article_cover_img` varchar(200) NOT NULL COMMENT '封面图片',
  `is_top` char(1) NOT NULL COMMENT '是否置顶',
  `is_secret` char(1) NOT NULL COMMENT '私密类型 1-私密文章 2-公开文章',
  `article_status` char(1) NOT NULL COMMENT '文章状态 1-已发布 2-未发布',
  `article_type` char(1) NOT NULL COMMENT '文章类型 1-原创 2-转载 3-翻译',
  `article_category` char(1) NOT NULL COMMENT '文章分类 1-JAVA 2-PHP ...',
  `articel_tags` varchar(200) NOT NULL COMMENT '文章标签',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_channel_id` (`channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------

-- ----------------------------
-- Table structure for blog_channel
-- ----------------------------
DROP TABLE IF EXISTS `blog_channel`;
CREATE TABLE `blog_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `channel_name` varchar(100) NOT NULL COMMENT '栏目名称',
  `channel_index` int(3) NOT NULL COMMENT '栏目序号',
  `channel_type` char(1) NOT NULL DEFAULT '2' COMMENT '栏目类型 1-超链接栏目 2-列表栏目 3-文章栏目 4-轮播图',
  `channel_cover_img` varchar(200) DEFAULT NULL COMMENT '栏目封面图片',
  `channel_summary` varchar(100) DEFAULT NULL COMMENT '栏目简介',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_channel_name` (`channel_name`),
  KEY `idx_channel_index` (`channel_index`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_comment
-- ----------------------------
DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `article_id` varchar(50) NOT NULL COMMENT '文章ID',
  `comment_index` char(5) NOT NULL COMMENT '评论编号',
  `comment_parent_index` char(5) DEFAULT NULL COMMENT '父评论编号',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_article_id` (`article_id`),
  KEY `idx_comment_index` (`comment_index`),
  KEY `idx_comment_parent_index` (`comment_parent_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_comment
-- ----------------------------

-- ----------------------------
-- Table structure for blog_photo
-- ----------------------------
DROP TABLE IF EXISTS `blog_photo`;
CREATE TABLE `blog_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `media_path` varchar(200) NOT NULL COMMENT '多媒体路径',
  `media_extension` varchar(5) NOT NULL COMMENT '文件扩展名',
  `media_type` char(1) NOT NULL COMMENT '多媒体类型 1-照片 2-视频 3-素材 4-垃圾箱',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_media_extension` (`media_extension`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_photo
-- ----------------------------

-- ----------------------------
-- Table structure for blog_sensitive_words
-- ----------------------------
DROP TABLE IF EXISTS `blog_sensitive_words`;
CREATE TABLE `blog_sensitive_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `sensitive_word` varchar(50) NOT NULL COMMENT '敏感词',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_sensitive_word` (`sensitive_word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_sensitive_words
-- ----------------------------

-- ----------------------------
-- Table structure for blog_slide_pic
-- ----------------------------
DROP TABLE IF EXISTS `blog_slide_pic`;
CREATE TABLE `blog_slide_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `slide_pic_title` varchar(200) NOT NULL COMMENT '轮播图标题',
  `channel_id` int(11) NOT NULL COMMENT '轮播图推送栏目',
  `slide_pic_url` varchar(200) NOT NULL COMMENT '轮播图链接地址',
  `slide_pic_img` varchar(200) NOT NULL COMMENT '轮播图图片',
  `is_top` char(1) NOT NULL COMMENT '是否置顶',
  `slide_pic_summary` tinytext NOT NULL COMMENT '轮播图简介',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_slide_pic_title` (`slide_pic_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_slide_pic
-- ----------------------------
