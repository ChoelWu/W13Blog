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

namespace app\action\index;

use app\action\CommonController;

class IndexController extends CommonController
{
    public function index() {
        echo 'get index/index/index';
        $this->display('admin.index.index');
    }
}