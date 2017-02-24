
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `rank_keyword` */

DROP TABLE IF EXISTS `rank_keyword`;

CREATE TABLE `rank_keyword` (
  `k_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '关键字id',
  `keyword` varchar(255) NOT NULL COMMENT '关键字',
  `p_id` int(10) DEFAULT NULL COMMENT '所属项目',
  PRIMARY KEY (`k_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `rank_keyword` */

insert  into `rank_keyword`(`k_id`,`keyword`,`p_id`) values (1,'一',1),(2,'二',1),(3,'三',2),(4,'四',2),(5,'五',3),(6,'六',4),(7,'11111',1),(8,'1',1),(9,'2',1),(10,'3',1),(11,'11',1),(12,'4',1),(13,'5',1),(14,'6',1),(15,'9',1),(16,'445',1),(17,'556',1),(18,'22',1),(19,'33',1),(20,'112',1),(21,'445',1);

/*Table structure for table `rank_links` */

DROP TABLE IF EXISTS `rank_links`;

CREATE TABLE `rank_links` (
  `l_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '连接id',
  `l_link` varchar(255) NOT NULL COMMENT '链接',
  `p_id` int(10) DEFAULT NULL COMMENT '所属项目',
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;

/*Data for the table `rank_links` */

insert  into `rank_links`(`l_id`,`l_link`,`p_id`) values (1,'www.1.com',1),(2,'www.22.com',1),(3,'www.3.com',2),(4,'www.4.com',3),(5,'www.5.com',4),(219,'445',1),(218,'112',1),(217,'33',1),(216,'22',1),(215,'556',1),(214,'445',1),(213,'9',1),(212,'6',1),(211,'5',1),(210,'4',1),(209,'11',1),(208,'3',1),(207,'2',1),(206,'1',1),(205,'11111',1);

/*Table structure for table `rank_project` */

DROP TABLE IF EXISTS `rank_project`;

CREATE TABLE `rank_project` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '项目主键',
  `p_name` varchar(255) DEFAULT NULL COMMENT '项目名',
  `p_card` varchar(255) DEFAULT NULL COMMENT '项目简称',
  `team_id` int(10) DEFAULT NULL COMMENT '所属团队',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `rank_project` */

insert  into `rank_project`(`p_id`,`p_name`,`p_card`,`team_id`) values (1,'项目1','xm1',1),(2,'项目2','xm2',1),(3,'项目三','xm3',2),(4,'项目四','xm4',2),(5,'项目五','xm5',3),(6,'项目六','xm6',3);

/*Table structure for table `rank_ranking` */

DROP TABLE IF EXISTS `rank_ranking`;

CREATE TABLE `rank_ranking` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '排名id',
  `p_name` varchar(255) DEFAULT NULL COMMENT '项目名',
  `p_id` int(10) DEFAULT NULL COMMENT '项目ID',
  `browser` varchar(255) DEFAULT NULL COMMENT '搜索引擎',
  `time` date DEFAULT NULL COMMENT '日期',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `k_id` int(10) DEFAULT NULL COMMENT '关键字排名',
  `link` varchar(255) DEFAULT NULL COMMENT '连接',
  `l_id` int(10) DEFAULT NULL COMMENT '链接ID',
  `rank` int(10) DEFAULT NULL COMMENT '排名',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `rank_ranking` */

insert  into `rank_ranking`(`r_id`,`p_name`,`p_id`,`browser`,`time`,`keyword`,`k_id`,`link`,`l_id`,`rank`) values (1,'仙姑1',1,'搜狗','2017-02-15','一',1,'www.1.com',1,33),(2,'一哈',1,'搜狗','2017-02-21','二',2,'www.4.com',1,22),(3,'而哈',3,'搜狗','2017-02-14','一',1,'www.1.com',1,33),(4,'三合',1,'搜狗','2017-02-20','二',2,'www.3.com',3,44),(5,'死哈',1,'搜狗','2017-02-20','一',4,'www.1.com',2,55),(6,'呜啊',1,'百度','2017-02-20','一',3,'www.2.com',1,22),(7,'仙姑1',1,'百度','2017-02-13','一',1,'www.1.com',1,11),(9,NULL,1,NULL,'2017-02-18',NULL,1,NULL,2,74),(10,NULL,1,NULL,'2017-02-19',NULL,1,NULL,2,14),(11,NULL,1,NULL,'2017-02-20',NULL,1,NULL,3,23),(12,NULL,1,NULL,'2017-02-21','一',1,'www.1.com',1,41),(13,NULL,1,NULL,'2017-02-19','11',10,NULL,2,2),(14,NULL,1,NULL,'2017-02-20','11',10,NULL,5,44),(15,NULL,1,NULL,'2017-02-21',NULL,10,NULL,7,25),(16,NULL,1,NULL,'2017-03-08',NULL,1,NULL,8,32);

/*Table structure for table `rank_rankno` */

DROP TABLE IF EXISTS `rank_rankno`;

CREATE TABLE `rank_rankno` (
  `n_id` int(10) NOT NULL COMMENT 'id',
  `l_no` int(10) NOT NULL COMMENT '连接id',
  `k_no` int(10) NOT NULL COMMENT '关键字id',
  PRIMARY KEY (`n_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `rank_rankno` */

insert  into `rank_rankno`(`n_id`,`l_no`,`k_no`) values (1,1,3);

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
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `t_name` (`t_name`)
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
