<?php
/**
 *
 * User: Zachary Liang
 * Date: 16-11-22
 * Time: 下午4:30
 */

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

// 定义配置文件目录和应用目录同级
define('CONF_PATH', __DIR__.'/../config/');

// 绑定当前访问到manage模块
define('BIND_MODULE','manage');

// 定义日志目录
define('LOG_PATH', __DIR__.'/../runtime/log/'.BIND_MODULE.'/');

// 定义项目模板缓存目录
define('CACHE_PATH', __DIR__.'/../runtime/cache/'.BIND_MODULE.'/');

// 定义应用缓存目录
define('TEMP_PATH', __DIR__.'/../runtime/cache/'.BIND_MODULE.'/');

// 定义SESSION保存目录
define('SESSION_PATH', __DIR__.'/../runtime/session/'.BIND_MODULE.'/');

// 加载框架引导文件
require (__DIR__ . '/../main/start.php');