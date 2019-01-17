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

include ACTION_PATH . '/CommonController.class.php';

class MigrationController extends CommonController
{
    public function index()
    {
        $this->display('tpl/default/admin/index/index.html');
    }

    public function home() {
        $this->display('tpl/default/admin/index/index.html');
    }
}