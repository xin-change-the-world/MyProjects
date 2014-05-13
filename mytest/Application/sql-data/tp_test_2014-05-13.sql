# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.15)
# Database: tp_test
# Generation Time: 2014-05-13 06:58:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table think_auth_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `think_auth_group`;

CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组表';

LOCK TABLES `think_auth_group` WRITE;
/*!40000 ALTER TABLE `think_auth_group` DISABLE KEYS */;

INSERT INTO `think_auth_group` (`id`, `title`, `status`, `rules`)
VALUES
	(1,'管理组',1,'10,24,27,23,22,20,25,26,9,12,14,11,6,16,19,18,17,8,7,1,5'),
	(3,'测试组',1,'10,21,9,16');

/*!40000 ALTER TABLE `think_auth_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table think_auth_group_access
# ------------------------------------------------------------

DROP TABLE IF EXISTS `think_auth_group_access`;

CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

LOCK TABLES `think_auth_group_access` WRITE;
/*!40000 ALTER TABLE `think_auth_group_access` DISABLE KEYS */;

INSERT INTO `think_auth_group_access` (`uid`, `group_id`)
VALUES
	(1,1),
	(1,2),
	(1,3);

/*!40000 ALTER TABLE `think_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table think_auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `think_auth_rule`;

CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` char(80) NOT NULL,
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `level` tinyint(1) DEFAULT NULL COMMENT '节点级别',
  `father_id` int(5) DEFAULT '0' COMMENT '父节点id,如果是模块必须置为0',
  `is_show` tinyint(1) DEFAULT '0' COMMENT '是否显示,1显示，0隐藏',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='规则表';

LOCK TABLES `think_auth_rule` WRITE;
/*!40000 ALTER TABLE `think_auth_rule` DISABLE KEYS */;

INSERT INTO `think_auth_rule` (`id`, `name`, `title`, `status`, `type`, `condition`, `level`, `father_id`, `is_show`)
VALUES
	(1,'Home/Index/index','列表',1,'Home','',3,7,1),
	(20,'Admin/Group/index','分组管理',1,'Admin','',3,9,1),
	(3,'Home/Index/edit','编辑',1,'Home','',3,7,0),
	(4,'Home/Index/delete','删除',1,'Home','',3,7,1),
	(5,'Home/Index/menu','模块选择',1,'Home','',1,7,0),
	(6,'Admin/Index/index','节点管理',1,'Admin','',3,9,1),
	(7,'Home/Index','home-index',1,'Home','',2,8,1),
	(8,'Home','Home模块',1,'Home','',1,0,1),
	(9,'Admin/Index','权限管理',1,'Admin','',2,10,1),
	(10,'Admin','Admin模块',1,'Admin','',1,0,1),
	(11,'Admin/Index/edit','编辑',1,'Admin','',3,9,0),
	(12,'Admin/Index/addRule','新增节点',1,'Admin','',3,9,0),
	(18,'Admin/User/edit','修改用户',1,'Admin','',3,16,0),
	(14,'Admin/Index/delRule','删除规则',1,'Admin','',3,9,0),
	(16,'Admin/User','用户管理',1,'Admin','',2,10,0),
	(17,'Admin/User/index','用户管理',1,'Admin','',3,9,1),
	(19,'Admin/User/addUser','新增用户',1,'Admin','',3,16,0),
	(21,'Admin/Group','分组管理',1,'Admin','',2,10,0),
	(22,'Admin/Group/edit','分组编辑',1,'Admin','',3,21,0),
	(23,'Admin/Group/delGroup','删除分组',1,'Admin','',3,21,0),
	(24,'Admin/Group/addGroup','新增分组',1,'Admin','',3,21,0),
	(25,'Admin/Group/ruleAccess','权限分配',1,'Admin','',3,21,0),
	(26,'Admin/Group/userGroup','用户分组',1,'Admin','',3,21,0),
	(27,'Admin/Group/ajaxRules','ajax获取分组规则',1,'Admin','',3,21,0);

/*!40000 ALTER TABLE `think_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table think_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `think_user`;

CREATE TABLE `think_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `think_user` WRITE;
/*!40000 ALTER TABLE `think_user` DISABLE KEYS */;

INSERT INTO `think_user` (`id`, `username`, `password`)
VALUES
	(1,'admin','e10adc3949ba59abbe56e057f20f883e'),
	(3,'xin','bd04fcc97578ce33ca5fb331f42bc375'),
	(4,'test','e10adc3949ba59abbe56e057f20f883e');

/*!40000 ALTER TABLE `think_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
