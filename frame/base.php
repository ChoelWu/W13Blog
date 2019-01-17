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

define('FRAME_VERSION', '1.0.0');
define('FRAME_NAME', 'Choel');
define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(APP_PATH));
define('ENV_FILE', ROOT_PATH . DS . '.env');
define('CORE_PATH', FRAME_PATH . DS . 'core');

if (is_file(ENV_FILE)) {
    $env_arr = parse_ini_file(ENV_FILE, true);
    foreach ($env_arr as $key => $env) {
        if (!is_array($env)) {
            putenv('PHP_' . $key . '=' . $env);
        }
    }
}

include CORE_PATH . DS . 'Loader.class.php';

frame\core\Loader::register();

frame\core\Error::register();

frame\core\Config::set(include(FRAME_PATH . DS . 'config.php'));

include FRAME_PATH . DS . 'autoload.php';
