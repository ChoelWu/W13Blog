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
    $files = scandir($dir_name);
    unset($files[0]);
    unset($files[1]);
    foreach ($files as $file) {
        if (is_file($dir_name . DS . $file)) {
            include($dir_name . DS . $file);
            if (is_string($call) && !empty($call)) {
                $call($dir_name . DS . $file);
            }
        }
    }
}
