SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gtc_user
-- ----------------------------
DROP TABLE IF EXISTS `gtc_user`;
CREATE TABLE `gtc_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(64) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT ' 状态码 0:未激活 1:正常 99：删除',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户注册时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户激活时间',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `last_login_ip` varchar(60) NOT NULL DEFAULT '' COMMENT '最后登陆ip',
  `operate_user` varchar(150) NOT NULL DEFAULT '' COMMENT '操作人',
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gtc_user
-- ----------------------------
BEGIN;
INSERT INTO `gtc_user` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 1598245787, 1598245787, '127.0.0.1', 'admin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
