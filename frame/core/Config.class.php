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

class Config
{
    private static $config = [];

    /**
     * 获取配置
     * @param $configKey
     * @return bool|mixed
     */
    public static function get($configKey)
    {
        if (strpos($configKey, '.')) {
            $config_key = explode('.', $configKey);
            if (isset(self::$config[$config_key[0]][$config_key[1]])) {
                return self::$config[$config_key[0]][$config_key[1]];
            }
        } else {
            if (isset(self::$config[$configKey])) {
                return self::$config[$configKey];
            }
        }

        return false;
    }

    /**
     * 设置配置参数
     * @param $configVal1
     * @param null $configVal2
     * @return bool
     */
    public static function set($configVal1, $configVal2 = null)
    {
        if (!empty($configVal1)) {
            if (is_array($configVal1)) {
                self::$config = $configVal1;
            }

            if (is_string($configVal1) && is_string($configVal2)) {
                if (strpos($configVal1, '.')) {
                    $config_key = explode('.', $configVal1);
                    self::$config[$config_key[0]][$config_key[1]];
                } else {
                    self::$config[$configVal1] = $configVal2;
                }
            }

            return true;
        }

        return false;
    }

    /**
     * 检查配置是否存在
     * @param $configKey
     * @return bool
     */
    public static function has($configKey)
    {
        if (strpos($configKey, '.')) {
            $config_key = explode('.', $configKey);
            if (isset(self::$config[$config_key[0]][$config_key[1]])) {
                return true;
            }
        } else {
            if (isset(self::$config[$configKey])) {
                return true;
            }
        }

        return false;
    }

    /**
     * 加载配置
     * @param $file
     * @return bool
     */
    public static function load($file)
    {
        if (is_file($file)) {
            $load_config = include($file);
            $rel = self::set($load_config);
            return $rel;
        }
        return false;
    }
}