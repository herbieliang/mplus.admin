<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');

// 定义配置文件目录和应用目录同级
define('CONF_PATH', __DIR__.'/../config/');

// 绑定当前访问到index模块
define('BIND_MODULE','index');

// 定义日志目录
define('LOG_PATH', __DIR__.'/../runtime/log/'.BIND_MODULE.'/');

// 定义项目模板缓存目录
define('CACHE_PATH', __DIR__.'/../runtime/cache/'.BIND_MODULE.'/');

// 定义应用缓存目录
define('TEMP_PATH', __DIR__.'/../runtime/cache/'.BIND_MODULE.'/');

// 加载框架引导文件
require (__DIR__ . '/../main/start.php');
