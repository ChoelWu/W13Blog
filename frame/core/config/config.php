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
function getConfig($configName, $default = null) {
    $config_box = explode('.', $configName);
    $config = null;
    $config_array = include(CONFIG_PATH . '/' . $config_box[0] . '.php');
    if(count($config_box) == 2) {
        $config = $config_array[$config_box[1]];
    } else if(count($config_box) == 3) {
        $config = $config_array[$config_box[1]][$config_box[2]];
    }
    $config = is_null($config) ? $default : $config;
    return $config;
}