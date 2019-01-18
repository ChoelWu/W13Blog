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
namespace app\action\admin;

use app\action\CommonController;

class IndexController extends CommonController
{
    public function index()
    {
        echo 'OK';
//        echo '<pre>';
//        print_r(($this->menu)[0]['name']);
//        echo '<pre>';
//        $this->display('tpl/default/admin/index/index.html');
    }
//
//    public function home() {
////        $this->display('tpl/default/admin/index/index.html');
//    }

//    public function getMenu()
//    {
//        $rel = include CONFIG_PATH . '/menu.php';
//        echo json_encode($rel);
//    }
}