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
     * 设置配置参数
     * @param $configKey
     * @param $configValue
     * @return bool
     */
    public static function set($configKey, $configValue)
    {
        if (is_null($configKey)) {
            return false;
        }

        if (is_string($configKey) && is_string($configValue)) {
            if (strpos($configKey, '.')) {
                $config_key_arr = nameConvert($configKey, '.');
                if (count($config_key_arr) == 3) {
                    self::$config[$config_key_arr[0]][$config_key_arr[1]][$config_key_arr[2]] = $configValue;
                } else if (count($config_key_arr) == 2) {
                    self::$config[$config_key_arr[0]][$config_key_arr[1]] = $configValue;
                }
            } else {
                self::$config[$configKey] = $configValue;
            }

            return true;
        }

        return false;
    }

    /**
     * 加载配置
     * @param $configArr
     * @param $field
     * @return bool
     */
    public static function load($configArr, $field)
    {
        if (is_array($configArr) && !empty($configArr)) {
            if (!empty($field)) {
                self::$config[$field] = $configArr;
            } else {
                self::$config = array_merge(self::$config, $configArr);
            }

            return true;
        }

        return false;
    }

    /**
     * 获取配置
     * @param $configKey
     * @return bool|mixed
     */
    public static function get($configKey)
    {
        if (strpos($configKey, '.')) {
            $config_key = explode('.', $configKey);
            $config = self::$config;
            do {
                if (isset($config[current($config_key)])) {
                    $config = $config[current($config_key)];
                } else {
                    $config = null;
                }
            } while (next($config_key));
            return $config;
        } else {
            if (isset(self::$config[$configKey])) {
                return self::$config[$configKey];
            }
        }

        return null;
    }
}
