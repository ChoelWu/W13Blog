<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: file.php
// +----------------------------------------------------------------------
// | Date: 2019/1/18
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

/**
 * 将点号连接的名成转化为正常可使用的名称
 * @param $name
 * @param $glue
 * @param bool $isString
 * @return array|mixed
 */
function nameConvert($name, $glue, $isString = true)
{
    if (strpos($name, '.') == 0 || strpos($name, '.') == strlen($name) - 1) {
        return false;
    }

    if ($isString) {
        $conversion = str_replace('.', $glue, $name);
    } else {
        $conversion = explode('.', $name);
    }

    return $conversion;
}
