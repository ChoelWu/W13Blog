<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:32
 */
// 开启错误输出
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

define('ROOT_PATH', __DIR__);

define('APP_PATH', ROOT_PATH . '/app');

define('FRAME_PATH', ROOT_PATH . '/frame');

define('CONFIG_PATH', ROOT_PATH . '/configs');

define('ACTION_PATH', APP_PATH . '/action');

define('CORE_PATH', FRAME_PATH . '/core');

include FRAME_PATH . '/init.php';


