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

class ChannelController extends CommonController
{
    public function index() {
        $this->display('tpl/default/index/index.html');
    }
}