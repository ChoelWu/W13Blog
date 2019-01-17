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

$function_dir = scandir(APP_PATH . DS . 'function');
unset($function_dir[0]);
unset($function_dir[1]);
foreach ($function_dir as $function) {
    include(APP_PATH . DS . 'function' . DS . $function);
}

$config_dir = scandir(ROOT_PATH . DS . 'configs');
unset($config_dir[0]);
unset($config_dir[1]);
foreach ($config_dir as $config) {
    frame\core\Config::set(include(ROOT_PATH . DS . 'configs' . DS . $config));
}