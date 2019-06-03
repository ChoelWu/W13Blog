/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : w13blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-03 09:44:52
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
  `article_category` char(1) NOT NULL COMMENT '文章分类 1-JAVA 2-PHP ...',
  `article_content` longtext COMMENT '文章内容',
  `article_cover_img` varchar(200) NOT NULL COMMENT '封面图片',
  `article_tag` varchar(200) NOT NULL COMMENT '文章标签',
  `article_summary` tinytext COMMENT '文章简介',
  `is_top` char(1) NOT NULL COMMENT '是否置顶',
  `is_secret` char(1) NOT NULL COMMENT '私密类型 1-私密文章 2-公开文章',
  `article_status` char(1) NOT NULL COMMENT '文章状态 1-已发布 2-未发布',
  `article_type` char(1) NOT NULL COMMENT '文章类型 1-原创 2-转载 3-翻译',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_channel_id` (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '1', '10', '1', null, 'upload/aa64034f78f0f73636642acf0155b319eac41361.jpg', '1', '1', '1', '1', '1', '1', '0000-00-00 00:00:00', null);
INSERT INTO `blog_article` VALUES ('2', '张雪迎', '10', '1', null, 'upload/aa64034f78f0f73636642acf0155b319eac41361.jpg', '张雪迎', '张雪迎张雪迎', '1', '1', '1', '1', null, null);

-- ----------------------------
-- Table structure for blog_channel
-- ----------------------------
DROP TABLE IF EXISTS `blog_channel`;
CREATE TABLE `blog_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `channel_name` varchar(100) NOT NULL COMMENT '栏目名称',
  `channel_parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目id',
  `channel_level` int(1) NOT NULL DEFAULT '1' COMMENT '栏目级别',
  `channel_index` int(3) NOT NULL COMMENT '栏目序号',
  `channel_type` char(1) NOT NULL DEFAULT '2' COMMENT '栏目类型 1-超链接栏目 2-列表栏目 3-文章栏目 4-轮播图',
  `channel_status` char(1) DEFAULT '1' COMMENT '栏目状态 1-启用 2-禁用',
  `channel_cover_img` varchar(200) DEFAULT NULL COMMENT '栏目封面图片',
  `channel_summary` varchar(100) DEFAULT NULL COMMENT '栏目简介',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_channel_name` (`channel_name`),
  KEY `idx_channel_index` (`channel_index`),
  KEY `idx_channel_parent_id` (`channel_parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_channel
-- ----------------------------
INSERT INTO `blog_channel` VALUES ('9', '栏目一', '0', '1', '1', '1', '1', 'upload/code-wallpaper-18.png', '你可以仅仅通过 data 属性 API 就能使用所有的 Bootstrap 插件，无需写一行 JavaScript 代码。这是 Bootstrap 中的一等 API，也应该是你的首选方式。', null, null);
INSERT INTO `blog_channel` VALUES ('10', '栏目二', '9', '2', '2', '2', '2', 'upload/life-code-typography-hd-wallpaper-1920x1080-7168.jpg', 'PHP将查询一个匹配的catch代码块。如果有多个catch代码块，传递给每一个catch代码块的对象必须具有不同类型(或者可以用同一父类去捕获，这样只要一个catch就可以了)，这样PHP可以找到需', null, null);
INSERT INTO `blog_channel` VALUES ('11', '栏目三', '0', '1', '3', '3', '1', 'upload/code-wallpaper-15.jpg', '又弄了一个第三版。主要功能有：博客备份到本地、浏览备份到本地的博客、关键字搜索本地的博客和转发博客可以选择个人分类 填写Tag标签。其实想了想，转发博客干嘛非要在本地客户端转发，直接在博客园的页面用j', null, null);

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
-- Table structure for blog_media
-- ----------------------------
DROP TABLE IF EXISTS `blog_media`;
CREATE TABLE `blog_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `media_path` varchar(200) NOT NULL COMMENT '多媒体路径',
  `media_extension` varchar(5) NOT NULL COMMENT '文件扩展名',
  `media_type` char(1) NOT NULL COMMENT '多媒体类型 1-照片 2-视频 3-素材 4-垃圾箱',
  `media_origin_type` char(1) DEFAULT '0' COMMENT '删除之前的类型',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_media_extension` (`media_extension`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_media
-- ----------------------------
INSERT INTO `blog_media` VALUES ('1', 'upload/4b90f603738da977da49ab00bc51f8198618e3b3.jpg', 'jpg', '1', '0', null, null);
INSERT INTO `blog_media` VALUES ('2', 'upload/header.jpg', 'jpg', '1', '0', null, null);

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
  `slide_pic_url` varchar(200) DEFAULT NULL COMMENT '推荐位链接地址',
  `channel_id` int(11) NOT NULL COMMENT '轮播图推送栏目',
  `slide_pic_img` varchar(200) NOT NULL COMMENT '轮播图图片',
  `is_top` char(1) NOT NULL COMMENT '是否置顶',
  `slide_pic_status` char(1) NOT NULL DEFAULT '1' COMMENT '滚动图状态 1-启用 2-禁用',
  `slide_pic_summary` tinytext NOT NULL COMMENT '轮播图简介',
  `updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_slide_pic_title` (`slide_pic_title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_slide_pic
-- ----------------------------
INSERT INTO `blog_slide_pic` VALUES ('1', '2', null, '3', 'upload/4781442-d6a8c2e5714b4c44.png', '2', '1', '7', '2019-01-08 11:50:26', '2019-01-11 11:50:29');
INSERT INTO `blog_slide_pic` VALUES ('3', '百度百科——张雪迎', 'https://baike.baidu.com/item/%E5%BC%A0%E9%9B%AA%E8%BF%8E/6327516?fr=aladdin', '9', 'upload/aa64034f78f0f73636642acf0155b319eac41361.jpg', '2', '1', '张雪迎，1997年6月18日出生于浙江义乌，中国内地女演员，就读于中央戏剧学院。2003年，张雪迎出演个人首部电视剧《永乐英雄儿女》', null, null);
INSERT INTO `blog_slide_pic` VALUES ('4', '张雪迎', 'https://baike.baidu.com/item/%E5%BC%A0%E9%9B%AA%E8%BF%8E/6327516?fr=aladdin', '10', 'upload/4b90f603738da977da49ab00bc51f8198618e3b3.jpg', '1', '2', '代表作品：泡沫之夏、白发王妃、神雕侠侣、旋风少女、十', null, null);
