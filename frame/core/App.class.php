<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | File: App.class.php
// +----------------------------------------------------------------------
// | Date: 2019/1/17
// +----------------------------------------------------------------------
// | Author: Choel
// +----------------------------------------------------------------------

namespace frame\core;

class App
{
    public static function run()
    {
        $request = new Request();
        $request->create();
        $request->route();
        self::request($request);
    }

    public static function request(Request $request)
    {
        $obj = new $request->route['controller_namespace'];
        $method = $request->route['method'];
        $obj->$method();
    }
}