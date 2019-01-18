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

namespace frame\core;

class Loader
{
    public static function autoload($class)
    {
        $static_namespace = [
            'frame' => FRAME_PATH,
            'app' => APP_PATH
        ];
        $namespace_arr = explode('\\', $class);
        $namespace_prefix = $namespace_arr[0];
        $base_dir = $static_namespace[$namespace_prefix];
        unset($namespace_arr[0]);
        $file_path = $base_dir . DS . implode(DS, $namespace_arr) . '.class.php';
        if (is_file($file_path)) {
            include($file_path);
        }
    }

    public static function Smarty_Autoloader($class)
    {
        echo 'Smarty_Autoloader ';
    }

    public static function register()
    {
        spl_autoload_register('frame\core\Loader::autoload', true, true);
    }
}