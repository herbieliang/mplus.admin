# mplus.admin

## 项目介绍
Mplus.Admin是基于ThinkPHP5开发的后台框架，目前完成了用户管理、权限管理功能，权限管理功能使用ThinkPHP的auth验证方式，有很高的扩展性。

## 安装说明
1. 执行项目`sql`目录下的两个脚本文件，将数据库结构及初始数据恢复的你的数据库中，`mplus_dev.sql`文件为数据库结构脚本，先导入这个，`original_data.sql`为初始数据脚本。
2. 修改`config/database.php`中的数据库连接信息。
3. 建立站点，将站点的根目录指向`public`目录。
4. 访问网站，初始的帐号密码均为`bolong`。