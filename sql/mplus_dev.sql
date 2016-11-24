/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016/11/24 14:28:00                          */
/* Description:    Mplus.Admin开发数据库脚本                      */
/*==============================================================*/

DROP TABLE IF EXISTS bl_admin;

/*==============================================================*/
/* Table: bl_admin                                              */
/* 管理员表                                                      */
/*==============================================================*/
CREATE TABLE bl_admin
(
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  uuid INT(15) NOT NULL,
  account VARCHAR(20) NOT NULL COMMENT '帐号',
  password VARCHAR(32) NOT NULL COMMENT '密码',
  nickname VARCHAR(10) COMMENT '昵称',
  email VARCHAR(30) COMMENT '邮箱',
  state TINYINT(1) NOT NULL COMMENT '状态：0-禁用  1-启用',
  create_time DATETIME COMMENT '创建时间',
  update_time DATETIME COMMENT '最近修改时间'
);