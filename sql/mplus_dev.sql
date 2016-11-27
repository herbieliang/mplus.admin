/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016/11/24 14:28:00                          */
/* Description:    Mplus.Admin开发数据库脚本                      */
/*==============================================================*/

DROP TABLE IF EXISTS bl_admin;

DROP TABLE IF EXISTS bl_auth_rule;

DROP TABLE IF EXISTS bl_auth_group;

DROP TABLE IF EXISTS bl_auth_group_access;

/*==============================================================*/
/* Table: bl_admin                                              */
/* 管理员表                                                      */
/*==============================================================*/
CREATE TABLE bl_admin
(
  id INT(11) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  uuid VARCHAR(15) NOT NULL,
  account VARCHAR(20) NOT NULL COMMENT '帐号',
  password VARCHAR(32) NOT NULL COMMENT '密码',
  nickname VARCHAR(10) COMMENT '昵称',
  email VARCHAR(30) COMMENT '邮箱',
  state TINYINT(1) NOT NULL COMMENT '状态：0-禁用  1-启用',
  create_time DATETIME COMMENT '创建时间',
  update_time DATETIME COMMENT '最近修改时间'
);

/*==============================================================*/
/* Table: bl_auth_rule                                          */
/* 规则表                                                        */
/*==============================================================*/
CREATE TABLE bl_auth_rule
(
  id MEDIUMINT(8) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(80) UNIQUE NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  title VARCHAR(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  type TINYINT(1) NOT NULL DEFAULT '1',
  relation VARCHAR(100) DEFAULT '' COMMENT '规则附件条件,满足附加条件的规则,才认为是有效的规则',
  status TINYINT(1) NOT NULL DEFAULT '1' COMMENT '状态：1-正常  0-禁用',
  create_time DATETIME COMMENT '创建时间',
  update_time DATETIME COMMENT '最近修改时间'
);

/*==============================================================*/
/* Table: bl_auth_group                                         */
/* 规则表                                                        */
/*==============================================================*/
CREATE TABLE bl_auth_group (
  id MEDIUMINT(8) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL DEFAULT '' COMMENT '用户组名称',
  rules VARCHAR(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则","隔开',
  status TINYINT(1) NOT NULL DEFAULT '1' COMMENT '状态：1-正常  0-禁用',
  create_time DATETIME COMMENT '创建时间',
  update_time DATETIME COMMENT '最近修改时间'
);

/*==============================================================*/
/* Table: bl_auth_group_access                                  */
/* 用户组关系表                                                  */
/*==============================================================*/
CREATE TABLE bl_auth_group_access (
  uid MEDIUMINT(8) UNSIGNED KEY NOT NULL COMMENT '用户id',
  group_id MEDIUMINT(8) UNSIGNED NOT NULL COMMENT '用户组id',
  create_time DATETIME COMMENT '创建时间',
  update_time DATETIME COMMENT '最近修改时间'
);