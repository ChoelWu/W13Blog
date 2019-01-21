<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: config.php
// +----------------------------------------------------------------------
// | Date: 2019/1/21
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

/**
 * 获取、设置配置
 * @param $key
 * @param null $value
 * @return bool|mixed
 */
function config($key, $value = null)
{
    if (is_null($value)) {
        $rel = \frame\core\Config::get($key);
    } else {
        $rel = \frame\core\Config::set($key, $value);
    }
    return $rel;
}

/**
 * 加载配置文件
 * @param $configFile
 * @param null $field
 * @return bool
 */
function loadConfig($configFile, $field = null)
{
    if (is_file($configFile)) {

        $config_arr = include($configFile);

        if (is_null($field)) {
            $basename = basename($configFile, '.php');
            $rel = \frame\core\Config::load($config_arr, $basename);
        } else {
            $rel = \frame\core\Config::load($config_arr, $field);
        }

        return $rel;
    }

    return false;
}
