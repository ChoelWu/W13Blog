<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: autoload_function.php
// +----------------------------------------------------------------------
// | Date: 19-1-17
// +----------------------------------------------------------------------
// | Author: choel
// +----------------------------------------------------------------------
namespace frame;

// 文件目录引入函数
function includeFiles($dir_name, $call = '')
{
    $files = scandir(APP_PATH . DS . $dir_name);
    unset($files[0]);
    unset($files[1]);
    foreach ($files as $file) {
        include(APP_PATH . DS . 'function' . DS . $file);
        if (is_string($call)) {
            $call();
        }
    }
}
