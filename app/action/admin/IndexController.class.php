<?php
/**
 * Created by PhpStorm.
 * User: Choel
 * Date: 2019/1/8
 * Time: 9:26
 */

include ACTION_PATH . '/CommonController.class.php';

class IndexController extends CommonController
{
    public function index()
    {
        $this->display('tpl/default/admin/index/index.html');
    }
}