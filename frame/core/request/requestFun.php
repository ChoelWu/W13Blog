<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 17:10
 */

/**
 * get方法
 * @param $param
 * @param $default
 * @return string
 */
function get($param, $default = '')
{
    $data = isset($_GET[$param]) ? $_GET[$param] : $default;
    return $data;
}

/**
 * 设置驼峰命名法
 * @param $arr
 * @return string
 */
function setCamelType($arr)
{
    $return = '';
    foreach ($arr as $key => $value) {
        $return .= ucfirst($value);
    }
    return $return;
}