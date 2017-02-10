/*
SQLyog v10.2 
MySQL - 5.5.40 : Database - ycranking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ycranking` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `rank_keywords` */

DROP TABLE IF EXISTS `rank_keywords`;

CREATE TABLE `rank_keywords` (
  `k_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '关键字id',
  `keyword` varchar(255) NOT NULL COMMENT '关键字',
  `l_id` int(10) DEFAULT NULL COMMENT '所属链接',
  PRIMARY KEY (`k_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `rank_keywords` */

insert  into `rank_keywords`(`k_id`,`keyword`,`l_id`) values (1,'一',1),(2,'二',1),(3,'三',2),(4,'四',2),(5,'五',3),(6,'六',4);

/*Table structure for table `rank_links` */

DROP TABLE IF EXISTS `rank_links`;

CREATE TABLE `rank_links` (
  `l_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '连接id',
  `l_link` varchar(255) NOT NULL COMMENT '链接',
  `p_id` int(10) DEFAULT NULL COMMENT '所属项目',
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `rank_links` */

insert  into `rank_links`(`l_id`,`l_link`,`p_id`) values (1,'www.1.com',1),(2,'www.2.com',1),(3,'www.3.com',2),(4,'www.4.com',3),(5,'www.5.com',4);

/*Table structure for table `rank_project` */

DROP TABLE IF EXISTS `rank_project`;

CREATE TABLE `rank_project` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '项目主键',
  `p_name` varchar(255) DEFAULT NULL COMMENT '项目名',
  `team_id` int(10) DEFAULT NULL COMMENT '所属团队',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `rank_project` */

insert  into `rank_project`(`p_id`,`p_name`,`team_id`) values (1,'项目1',1),(2,'项目2',1),(3,'项目三',2),(4,'项目四',2);

/*Table structure for table `rank_ranking` */

DROP TABLE IF EXISTS `rank_ranking`;

CREATE TABLE `rank_ranking` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '排名id',
  `p_name` varchar(255) DEFAULT NULL COMMENT '项目名',
  `p_id` int(10) DEFAULT NULL COMMENT '项目ID',
  `browser` varchar(255) DEFAULT NULL COMMENT '搜索引擎',
  `time` date DEFAULT NULL COMMENT '日期',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `link` varchar(255) DEFAULT NULL COMMENT '连接',
  `l_id` int(10) DEFAULT NULL COMMENT '链接ID',
  `rank` int(10) DEFAULT NULL COMMENT '排名',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `rank_ranking` */

insert  into `rank_ranking`(`r_id`,`p_name`,`p_id`,`browser`,`time`,`keyword`,`link`,`l_id`,`rank`) values (1,'仙姑1',NULL,'搜狗','2017-02-14',NULL,NULL,NULL,NULL);

/*Table structure for table `rank_role` */

DROP TABLE IF EXISTS `rank_role`;

CREATE TABLE `rank_role` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `r_name` varchar(255) DEFAULT NULL COMMENT '角色名',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `rank_role` */

insert  into `rank_role`(`r_id`,`r_name`) values (1,'超级管理员'),(2,'管理员'),(3,'员工');

/*Table structure for table `rank_team` */

DROP TABLE IF EXISTS `rank_team`;

CREATE TABLE `rank_team` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(255) DEFAULT NULL,
  `t_state` enum('0','1') DEFAULT NULL COMMENT '团队状态 0：禁用 1：启用',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `rank_team` */

insert  into `rank_team`(`t_id`,`t_name`,`t_state`) values (1,'团队1','1'),(2,'团队2','1');

/*Table structure for table `rank_user` */

DROP TABLE IF EXISTS `rank_user`;

CREATE TABLE `rank_user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_pwd` varchar(255) DEFAULT NULL,
  `u_state` enum('0','1') DEFAULT NULL COMMENT '用户状态 0：禁用 1：可用',
  `r_id` int(10) DEFAULT NULL COMMENT '角色',
  `team_id` int(10) DEFAULT NULL COMMENT '所属团队',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `rank_user` */

insert  into `rank_user`(`u_id`,`u_name`,`u_pwd`,`u_state`,`r_id`,`team_id`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','1',1,NULL),(2,'user','21232f297a57a5a743894a0e4a801fc3','1',2,1),(3,'user2','21232f297a57a5a743894a0e4a801fc3','1',3,1),(4,'',NULL,NULL,NULL,NULL);

/*Table structure for table `rank_user_project` */

DROP TABLE IF EXISTS `rank_user_project`;

CREATE TABLE `rank_user_project` (
  `up_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_id` int(10) DEFAULT NULL COMMENT '用户id',
  `p_id` int(10) DEFAULT NULL COMMENT '项目id',
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `rank_user_project` */

insert  into `rank_user_project`(`up_id`,`u_id`,`p_id`) values (1,3,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
