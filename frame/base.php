<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: base.php
// +----------------------------------------------------------------------
// | Date: 2019/1/17
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame;

// 预定义常量
define('FRAME_VERSION', '1.0.0');
define('FRAME_NAME', 'Choel');
define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(APP_PATH));
define('ENV_FILE', ROOT_PATH . DS . '.env');
define('CORE_PATH', FRAME_PATH . DS . 'core');

// 加载环境变量
if (is_file(ENV_FILE)) {
    $env_arr = parse_ini_file(ENV_FILE, true);
    foreach ($env_arr as $key => $env) {
        if (!is_array($env)) {
            putenv('PHP_' . $key . '=' . $env);
        }
    }
}

// 引入类文件自动加载类
include CORE_PATH . DS . 'Loader.class.php';

//
core\Loader::register();

core\Error::register();

// 引入自动加载函数
include FRAME_PATH . DS . 'autoload.php';

// 引入函数和配置文件
includeFiles(CORE_PATH . DS . 'function');  // 框架函数
includeFiles(CORE_PATH . DS . 'config', 'loadConfig');  // 框架配置文件

includeFiles(APP_PATH . DS . 'function');  // 应用函数
includeFiles(ROOT_PATH . DS . 'config', 'loadConfig');  // 应用配置文件
