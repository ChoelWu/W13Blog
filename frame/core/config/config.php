<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/9
 * Time: 17:19
 */

/**
 * @param $configName
 * @param null $default
 * @return null
 */
function getConfig($configName, $default = null)
{
    $config_box = explode('.', $configName);
    $config = include(CONFIG_PATH . '/' . $config_box[0] . '.php');
    if (count($config_box) > 1) {
        for ($i = 1; $i < count($config_box); $i++) {
            $config = $config[$config_box[$i]];
        }
    }

    $config = empty($config) ? $default : $config;
    return $config;
}