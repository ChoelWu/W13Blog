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
//        $request->pathInfo();
        echo '<pre>';
        var_dump($request);
        echo '<pre>';
    }
}