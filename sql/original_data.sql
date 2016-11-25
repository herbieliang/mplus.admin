/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016/11/25 16:50:35                          */
/* Description:    Mplus.Admin初始数据脚本                       */
/*==============================================================*/

/*==============================================================*/
/* Table: bl_admin                                              */
/*==============================================================*/
INSERT INTO bolong_mplus.bl_admin (uuid, account, password, nickname, email, state, create_time, update_time) VALUES ('000000000000000', 'bolong', '5ba3b684e0a010470e26936fa866e94e', '博龍工作室', 'admin@bolong.com', 1, now(), now());