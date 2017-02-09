<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);


//框架全局设置
define('PHP_GPC',true);     //自动转义引号

define('BUILD_DIR_SECURE', false);
// 定义ThinkPHP框架路径
$host = $_SERVER['SERVER_NAME'];
date_default_timezone_set('Asia/Shanghai');

// Server params
$scriptName = $_SERVER['SCRIPT_NAME']; // <-- "/foo/index.php"
$requestUri = $_SERVER['REQUEST_URI']; // <-- "/foo/bar?test=abc" or "/foo/index.php/bar?test=abc"
// 物理路径
if (strpos($requestUri, $scriptName) !== false) {
    // 没有重写
    $physicalPath = $scriptName;
} else {
    // 有重写
    $physicalPath = str_replace('\\', '', dirname($scriptName));
}
$script_name = rtrim($physicalPath, '/');

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
