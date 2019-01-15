<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */
include ACTION_PATH . '/CommonController.class.php';

class UserInfoController extends CommonController
{
    public function index()
    {
//        echo '<pre>';
//        print_r(($this->menu)[0]['name']);
//        echo '<pre>';
////        var_dump($this->smarty);
        $this->display('tpl/default/admin/index/index.html');
    }

    public function home() {
        $this->display('tpl/default/admin/index/index.html');
    }

//    public function getMenu()
//    {
//        $rel = include CONFIG_PATH . '/menu.php';
//        echo json_encode($rel);
//    }
}