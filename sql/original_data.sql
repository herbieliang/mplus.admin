/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016/11/25 16:50:35                          */
/* Description:    Mplus.Admin初始数据脚本                       */
/*==============================================================*/

/*==============================================================*/
/* Table: bl_admin                                              */
/*==============================================================*/
INSERT INTO bl_admin (uuid, account, password, nickname, email, state, create_time, update_time) VALUES ('000000000000000', 'bolong', '5ba3b684e0a010470e26936fa866e94e', '博龍工作室', 'admin@bolong.com', 1, now(), now());

/*==============================================================*/
/* Table: bl_auth_rule                                          */
/*==============================================================*/
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('Admin-Add', '添加用户', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('Admin-Edit', '编辑用户', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('Admin-Delete', '删除用户', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('Admin-UpdatePassword', '更改用户密码', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthGroup-Add', '添加角色', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthGroup-Edit', '编辑角色', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthGroup-Delete', '删除角色', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthRule-Add', '添加权限节点', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthRule-Edit', '编辑权限节点', 1, '', 1, now(), now());
INSERT INTO bl_auth_rule (name, title, type, relation, status, create_time, update_time) VALUES ('AuthRule-Delete', '删除权限节点', 1, '', 1, now(), now());

/*==============================================================*/
/* Table: bl_auth_group                                         */
/*==============================================================*/
INSERT INTO bl_auth_group (title, rules, status, create_time, update_time) VALUES ('超级管理员', '1,2,3,4', 1, now(), now());

/*==============================================================*/
/* Table: bl_auth_group_accress                                 */
/*==============================================================*/
INSERT INTO bl_auth_group_access (uid, group_id, create_time, update_time) VALUES (1, 1, now(), now());